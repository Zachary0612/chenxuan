<?php
/**
 * Login / Register AJAX handlers
 * Handles SMS code requests, password login, and registration.
 */

defined('ABSPATH') || exit;

/**
 * Helper: send JSON response.
 */
function jaka_auth_json($success, $message, $extra = []) {
    wp_send_json(array_merge([
        'success' => (bool) $success,
        'message' => $message,
    ], $extra));
}

function jaka_auth_client_ip() {
    $ip = isset($_SERVER['REMOTE_ADDR']) ? sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'])) : 'unknown';
    return $ip ?: 'unknown';
}

function jaka_auth_is_phone($value) {
    return (bool) preg_match('/^1[3-9]\d{9}$/', $value);
}

function jaka_auth_is_account($value) {
    return is_email($value) || jaka_auth_is_phone($value);
}

function jaka_auth_sms_enabled() {
    return defined('CHENXUAN_ENABLE_SMS_AUTH') && CHENXUAN_ENABLE_SMS_AUTH;
}

function jaka_auth_rate_limit($scope, $subject, $limit, $window, $message = '') {
    $key = 'jaka_auth_rl_' . md5($scope . '|' . strtolower($subject) . '|' . jaka_auth_client_ip());
    $count = absint(get_transient($key));
    if ($count >= $limit) {
        jaka_auth_json(false, $message ?: jaka_t('auth_err_too_fast', '请稍后再试'));
    }
    set_transient($key, $count + 1, $window);
}

/**
 * Send SMS verification code (stub).
 * In production this would integrate with a real SMS provider (e.g. Aliyun SMS).
 */
function jaka_ajax_send_sms() {
    check_ajax_referer('jaka_nonce', 'nonce');
    if (!jaka_auth_sms_enabled()) {
        jaka_auth_json(false, jaka_t('auth_sms_disabled', '短信验证码功能暂未开放，请使用密码登录或注册。'));
    }
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';

    if (!$phone || !jaka_auth_is_phone($phone)) {
        jaka_auth_json(false, jaka_t('auth_err_phone', '请输入有效的手机号码'));
    }
    jaka_auth_rate_limit('sms_ip', 'send', 20, HOUR_IN_SECONDS);

    // Rate-limit: one request per minute per phone (uses WP transients).
    $key = 'jaka_sms_' . md5($phone);
    if (get_transient($key . '_sent')) {
        jaka_auth_json(false, jaka_t('auth_err_too_fast', '请稍后再试'));
    }

    $code = strval(wp_rand(100000, 999999));
    set_transient($key, $code, 5 * MINUTE_IN_SECONDS);
    set_transient($key . '_sent', 1, MINUTE_IN_SECONDS);

    // TODO: integrate real SMS API before production. Do not expose codes to the browser or logs.
    jaka_auth_json(true, jaka_t('auth_code_sent', '验证码已发送'));
}
add_action('wp_ajax_jaka_send_sms', 'jaka_ajax_send_sms');
add_action('wp_ajax_nopriv_jaka_send_sms', 'jaka_ajax_send_sms');

/**
 * Login by SMS code.
 */
function jaka_ajax_login_sms() {
    check_ajax_referer('jaka_nonce', 'nonce');
    if (!jaka_auth_sms_enabled()) {
        jaka_auth_json(false, jaka_t('auth_sms_disabled', '短信验证码功能暂未开放，请使用密码登录或注册。'));
    }
    $account = isset($_POST['account']) ? sanitize_text_field($_POST['account']) : '';
    $code    = isset($_POST['code']) ? sanitize_text_field($_POST['code']) : '';

    if (!$account || !$code) {
        jaka_auth_json(false, jaka_t('auth_err_required', '请填写完整信息'));
    }
    if (!jaka_auth_is_phone($account)) {
        jaka_auth_json(false, jaka_t('auth_err_phone', '请输入有效的手机号码'));
    }
    jaka_auth_rate_limit('login_sms', $account, 10, 15 * MINUTE_IN_SECONDS);

    $key = 'jaka_sms_' . md5($account);
    $stored = get_transient($key);
    if (!$stored || $stored !== $code) {
        jaka_auth_json(false, jaka_t('auth_err_code', '验证码错误或已过期'));
    }
    delete_transient($key);

    // Find or auto-create user keyed by phone.
    $user = get_user_by('login', $account);
    if (!$user) {
        $user_id = wp_insert_user([
            'user_login'   => $account,
            'user_pass'    => wp_generate_password(20, true, true),
            'display_name' => $account,
            'role'         => 'subscriber',
        ]);
        if (is_wp_error($user_id)) {
            jaka_auth_json(false, $user_id->get_error_message());
        }
        $user = get_user_by('id', $user_id);
    }

    wp_set_current_user($user->ID);
    wp_set_auth_cookie($user->ID, true);
    jaka_auth_json(true, jaka_t('auth_login_success', '登录成功'), [
        'redirect' => home_url('/'),
    ]);
}
add_action('wp_ajax_jaka_login_sms', 'jaka_ajax_login_sms');
add_action('wp_ajax_nopriv_jaka_login_sms', 'jaka_ajax_login_sms');

/**
 * Login by password.
 */
function jaka_ajax_login_pwd() {
    check_ajax_referer('jaka_nonce', 'nonce');
    $account  = isset($_POST['account']) ? sanitize_text_field($_POST['account']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (!$account || !$password) {
        jaka_auth_json(false, jaka_t('auth_err_required', '请填写完整信息'));
    }
    if (!jaka_auth_is_account($account)) {
        jaka_auth_json(false, jaka_t('auth_err_phone', '请输入有效手机号或邮箱'));
    }
    jaka_auth_rate_limit('login_pwd', $account, 10, 15 * MINUTE_IN_SECONDS);

    $login = $account;
    if (is_email($account)) {
        $user_by_email = get_user_by('email', $account);
        if ($user_by_email) {
            $login = $user_by_email->user_login;
        }
    }
    $user = wp_signon([
        'user_login'    => $login,
        'user_password' => $password,
        'remember'      => true,
    ], false);
    if (is_wp_error($user)) {
        jaka_auth_json(false, jaka_t('auth_err_credentials', '账号或密码错误'));
    }
    jaka_auth_json(true, jaka_t('auth_login_success', '登录成功'), [
        'redirect' => home_url('/'),
    ]);
}
add_action('wp_ajax_jaka_login_pwd', 'jaka_ajax_login_pwd');
add_action('wp_ajax_nopriv_jaka_login_pwd', 'jaka_ajax_login_pwd');

/**
 * Register a new user (SMS or password).
 */
function jaka_ajax_register() {
    check_ajax_referer('jaka_nonce', 'nonce');
    $type     = isset($_POST['type']) ? sanitize_text_field($_POST['type']) : 'sms';
    $account  = isset($_POST['account']) ? sanitize_text_field($_POST['account']) : '';

    if (!$account) {
        jaka_auth_json(false, jaka_t('auth_err_required', '请填写完整信息'));
    }
    if (!jaka_auth_is_account($account)) {
        jaka_auth_json(false, jaka_t('auth_err_phone', '请输入有效手机号或邮箱'));
    }
    if (get_user_by('login', $account)) {
        jaka_auth_json(false, jaka_t('auth_err_exists', '该账号已注册'));
    }
    if (is_email($account) && get_user_by('email', $account)) {
        jaka_auth_json(false, jaka_t('auth_err_exists', '该账号已注册'));
    }
    if (!in_array($type, ['sms', 'password'], true)) {
        jaka_auth_json(false, jaka_t('auth_err_required', '请填写完整信息'));
    }
    jaka_auth_rate_limit('register', $account, 5, HOUR_IN_SECONDS);

    if ($type === 'sms') {
        if (!jaka_auth_sms_enabled()) {
            jaka_auth_json(false, jaka_t('auth_sms_disabled', '短信验证码功能暂未开放，请使用密码登录或注册。'));
        }
        if (!jaka_auth_is_phone($account)) {
            jaka_auth_json(false, jaka_t('auth_err_phone', '请输入有效的手机号码'));
        }
        $code = isset($_POST['code']) ? sanitize_text_field($_POST['code']) : '';
        $key  = 'jaka_sms_' . md5($account);
        $stored = get_transient($key);
        if (!$stored || $stored !== $code) {
            jaka_auth_json(false, jaka_t('auth_err_code', '验证码错误或已过期'));
        }
        delete_transient($key);
        $password = wp_generate_password(16, true, true);
    } else {
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $confirm  = isset($_POST['password_confirm']) ? $_POST['password_confirm'] : '';
        if (strlen($password) < 6) {
            jaka_auth_json(false, jaka_t('auth_err_pwd_len', '密码至少6位'));
        }
        if ($password !== $confirm) {
            jaka_auth_json(false, jaka_t('auth_err_pwd_match', '两次密码输入不一致'));
        }
    }

    $user_id = wp_insert_user([
        'user_login'   => $account,
        'user_pass'    => $password,
        'user_email'   => is_email($account) ? sanitize_email($account) : '',
        'display_name' => $account,
        'role'         => 'subscriber',
    ]);
    if (is_wp_error($user_id)) {
        jaka_auth_json(false, $user_id->get_error_message());
    }

    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id, true);
    jaka_auth_json(true, jaka_t('auth_register_success', '注册成功'), [
        'redirect' => home_url('/'),
    ]);
}
add_action('wp_ajax_jaka_register', 'jaka_ajax_register');
add_action('wp_ajax_nopriv_jaka_register', 'jaka_ajax_register');

/**
 * Logout (called from header user menu).
 */
function jaka_ajax_logout() {
    check_ajax_referer('jaka_nonce', 'nonce');
    wp_logout();
    jaka_auth_json(true, jaka_t('auth_logout_success', '已退出登录'), [
        'redirect' => home_url('/'),
    ]);
}
add_action('wp_ajax_jaka_logout', 'jaka_ajax_logout');
