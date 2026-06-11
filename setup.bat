@echo off
chcp 65001 >nul
setlocal enabledelayedexpansion

echo ==========================================
echo  ChenXuan Robotics WordPress Setup
echo ==========================================
echo.

if not exist ".env" (
  echo No .env file found. Creating one from .env.example...
  copy ".env.example" ".env" >nul
  echo Please edit .env and set strong passwords before running setup again.
  echo Required keys: WORDPRESS_DB_PASSWORD, MYSQL_ROOT_PASSWORD, CHENXUAN_ADMIN_USER, CHENXUAN_ADMIN_PASSWORD, CHENXUAN_ADMIN_EMAIL
  exit /b 1
)

for /f "usebackq tokens=1,* delims==" %%A in (".env") do (
  if not "%%A"=="" if not "%%B"=="" set "%%A=%%B"
)

if "%CHENXUAN_SITE_URL%"=="" set "CHENXUAN_SITE_URL=http://localhost:8082"
if "%CHENXUAN_SITE_TITLE%"=="" set "CHENXUAN_SITE_TITLE=辰轩机器人"

if "%CHENXUAN_ADMIN_USER%"=="" (
  echo Missing CHENXUAN_ADMIN_USER in .env
  exit /b 1
)
if "%CHENXUAN_ADMIN_PASSWORD%"=="" (
  echo Missing CHENXUAN_ADMIN_PASSWORD in .env
  exit /b 1
)
if "%CHENXUAN_ADMIN_EMAIL%"=="" (
  echo Missing CHENXUAN_ADMIN_EMAIL in .env
  exit /b 1
)

echo %WORDPRESS_DB_PASSWORD% | findstr /c:"replace_" >nul
if not errorlevel 1 (
  echo WORDPRESS_DB_PASSWORD still contains a placeholder value. Edit .env first.
  exit /b 1
)
echo %MYSQL_ROOT_PASSWORD% | findstr /c:"replace_" >nul
if not errorlevel 1 (
  echo MYSQL_ROOT_PASSWORD still contains a placeholder value. Edit .env first.
  exit /b 1
)
echo %CHENXUAN_ADMIN_USER% | findstr /c:"replace_" >nul
if not errorlevel 1 (
  echo CHENXUAN_ADMIN_USER still contains a placeholder value. Edit .env first.
  exit /b 1
)
echo %CHENXUAN_ADMIN_PASSWORD% | findstr /c:"replace_" >nul
if not errorlevel 1 (
  echo CHENXUAN_ADMIN_PASSWORD still contains a placeholder value. Edit .env first.
  exit /b 1
)

echo [1/6] Starting Docker containers...
docker compose up -d db wordpress
if errorlevel 1 exit /b 1

echo [2/6] Waiting for WordPress...
timeout /t 30 /nobreak >nul

echo [3/6] Installing WordPress core if needed...
docker compose run --rm wpcli core is-installed >nul 2>nul
if errorlevel 1 (
  docker compose run --rm wpcli core install ^
    --url="%CHENXUAN_SITE_URL%" ^
    --title="%CHENXUAN_SITE_TITLE%" ^
    --admin_user="%CHENXUAN_ADMIN_USER%" ^
    --admin_password="%CHENXUAN_ADMIN_PASSWORD%" ^
    --admin_email="%CHENXUAN_ADMIN_EMAIL%" ^
    --skip-email
)

echo [4/6] Configuring language, timezone, permalinks...
docker compose run --rm wpcli language core install zh_CN
docker compose run --rm wpcli site switch-language zh_CN
docker compose run --rm wpcli option update timezone_string "Asia/Shanghai"
docker compose run --rm wpcli option update date_format "Y年n月j日"
docker compose run --rm wpcli option update blogdescription "定制化工业机器人自动化系统集成方案"
docker compose run --rm wpcli rewrite structure "/%%postname%%/"

echo [5/6] Activating ChenXuan theme and required plugins...
docker compose run --rm wpcli theme activate jaka-theme
docker compose run --rm wpcli plugin install custom-post-type-ui --activate
docker compose run --rm wpcli plugin install duplicate-page --activate
docker compose run --rm wpcli plugin install polylang --activate
docker compose run --rm wpcli plugin install wp-mail-smtp
docker compose run --rm wpcli plugin install all-in-one-seo-pack

echo [6/6] Creating theme pages and flushing rewrite rules...
docker compose exec -T wordpress php /var/www/html/wp-content/themes/fix-pages.php
docker compose exec -T wordpress php /var/www/html/wp-content/themes/fix-permalinks.php
docker compose run --rm wpcli rewrite flush

echo.
echo Setup complete.
echo Frontend: %CHENXUAN_SITE_URL%
echo Admin:    %CHENXUAN_SITE_URL%/wp-admin
echo.
echo Configure SMTP before production so lead notification emails can be delivered.
endlocal
