# 辰轩机器人官网 WordPress 项目

这是辰轩机器人官网的 WordPress 主题与本地 Docker 运行环境。当前主题还原自参考站结构，前台内容已切换为辰轩机器人相关文案、案例、解决方案与服务内容。

## 运行环境

1. 安装并启动 Docker Desktop。
2. 复制 `.env.example` 为 `.env`。
3. 在 `.env` 中填写强密码和管理员信息。
4. 运行：

```bat
setup.bat
```

常用命令：

```bash
docker compose up -d
docker compose down
docker compose logs wordpress
docker compose run --rm wpcli theme list
docker compose run --rm wpcli rewrite flush
```

默认本地访问地址由 `.env` 中的 `CHENXUAN_SITE_URL` 与 `WORDPRESS_PORT` 控制，示例为 `http://localhost:8082`。

## 交付页面

- 首页：`/`
- 工业机器人：`/products`
- 协作机器人：`/products`
- 解决方案：`/solutions`
- 案例中心：`/cases`
- 服务与支持：`/service`
- 下载中心：`/download`
- 新闻：`/news`
- 关于辰轩：`/about`
- 联系辰轩：`/contact`
- 智慧商业：`/smart-commerce`

旧路径 `/jaka-plus` 会 301 跳转到 `/smart-commerce`。

## 生产配置

- 不要在代码中写入数据库密码、后台账号或短信服务密钥。
- 数据库与管理员配置通过 `.env` 注入。
- 联系表单会保存为后台“辰轩留资”，并通过 `wp_mail` 给管理员邮箱发通知。
- 生产上线前必须配置 SMTP，例如 WP Mail SMTP，确保留资邮件能送达。
- 短信验证码登录/注册默认关闭；如需启用，需要接入真实短信服务并显式配置。

## 内容与素材

- 核心内容源位于 `wp-content/themes/jaka-theme/inc/chenxuan-content.php`。
- 案例素材位于 `wp-content/uploads/chenxuan/solution-cases`。
- 当前案例中心保留 47 个案例；无视频案例按“图片案例”展示；缺素材案例使用统一占位展示。

## 上线验收

上线前至少检查：

- Docker/WordPress 能正常启动，`/wp-admin` 可登录。
- 首页、产品、解决方案、案例、新闻、下载、服务、关于、联系页面可访问。
- 语言切换、搜索、筛选、移动菜单、案例详情、表单提交可用。
- 前台不出现旧品牌文案。
- 页面在 390、768、1280、1366、1920 宽度无横向溢出和导航裁切。
