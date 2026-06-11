<?php
/**
 * ChenXuan lead capture.
 */

defined('ABSPATH') || exit;

function chenxuan_register_lead_post_type() {
    register_post_type('chenxuan_lead', [
        'labels' => [
            'name' => '辰轩留资',
            'singular_name' => '辰轩留资',
            'menu_name' => '辰轩留资',
            'add_new_item' => '新增留资',
            'edit_item' => '查看留资',
        ],
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-email-alt2',
        'supports' => ['title'],
        'capability_type' => 'post',
    ]);
}
add_action('init', 'chenxuan_register_lead_post_type');

function chenxuan_lead_text($key, $fallback) {
    return function_exists('jaka_t') ? jaka_t($key, $fallback) : $fallback;
}

function chenxuan_lead_field($key, $textarea = false) {
    if (!isset($_POST[$key])) {
        return '';
    }
    $value = wp_unslash($_POST[$key]);
    return $textarea ? sanitize_textarea_field($value) : sanitize_text_field($value);
}

function chenxuan_lead_client_ip() {
    $ip = isset($_SERVER['REMOTE_ADDR']) ? sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'])) : '';
    return $ip ?: 'unknown';
}

function chenxuan_ajax_submit_lead() {
    check_ajax_referer('jaka_nonce', 'nonce');

    if (chenxuan_lead_field('website') !== '') {
        wp_send_json_success([
            'message' => chenxuan_lead_text('lead_success', '需求已收到，辰轩工程团队将尽快与您联系。'),
        ]);
    }

    $name = chenxuan_lead_field('name');
    $company = chenxuan_lead_field('company');
    $phone = chenxuan_lead_field('phone');
    $email = chenxuan_lead_field('email');
    $industry = chenxuan_lead_field('industry');
    $application = chenxuan_lead_field('application');
    $source = chenxuan_lead_field('source');
    $scene_type = chenxuan_lead_field('type');
    $stage = chenxuan_lead_field('stage');
    $purpose = chenxuan_lead_field('purpose');
    $message = chenxuan_lead_field('message', true);
    $remark = chenxuan_lead_field('remark', true);

    if ($message === '' && $remark !== '') {
        $message = $remark;
    }

    if ($name === '' || $company === '' || $phone === '' || $message === '') {
        wp_send_json_error([
            'message' => chenxuan_lead_text('lead_err_required', '请填写姓名、公司、电话和需求描述。'),
        ]);
    }

    if ($email !== '' && !is_email($email)) {
        wp_send_json_error([
            'message' => chenxuan_lead_text('lead_err_email', '请输入有效邮箱。'),
        ]);
    }

    if (mb_strlen($phone, 'UTF-8') < 5 || mb_strlen($phone, 'UTF-8') > 40) {
        wp_send_json_error([
            'message' => chenxuan_lead_text('lead_err_phone', '请输入有效联系电话。'),
        ]);
    }

    $title = sprintf('%s - %s - %s', current_time('Y-m-d H:i'), $name, $company);
    $post_id = wp_insert_post([
        'post_type' => 'chenxuan_lead',
        'post_status' => 'private',
        'post_title' => $title,
    ], true);

    if (is_wp_error($post_id)) {
        wp_send_json_error([
            'message' => chenxuan_lead_text('lead_err_save', '提交失败，请稍后再试。'),
        ]);
    }

    $fields = [
        'name' => $name,
        'company' => $company,
        'phone' => $phone,
        'email' => sanitize_email($email),
        'industry' => $industry,
        'application' => $application,
        'source' => $source,
        'scene_type' => $scene_type,
        'stage' => $stage,
        'purpose' => $purpose,
        'message' => $message,
        'page_url' => esc_url_raw(chenxuan_lead_field('page_url')),
        'ip' => chenxuan_lead_client_ip(),
        'user_agent' => isset($_SERVER['HTTP_USER_AGENT']) ? sanitize_text_field(wp_unslash($_SERVER['HTTP_USER_AGENT'])) : '',
    ];

    foreach ($fields as $key => $value) {
        update_post_meta($post_id, '_chenxuan_lead_' . $key, $value);
    }

    $admin_email = get_option('admin_email');
    $mail_sent = false;
    if ($admin_email && is_email($admin_email)) {
        $subject = sprintf('[辰轩官网留资] %s - %s', $company, $name);
        $body_lines = [
            '辰轩官网收到新的自动化需求：',
            '',
            '姓名：' . $name,
            '公司：' . $company,
            '电话：' . $phone,
            '邮箱：' . ($email ?: '-'),
            '行业：' . ($industry ?: '-'),
            '应用工艺：' . ($application ?: '-'),
            '场景类型：' . ($scene_type ?: '-'),
            '项目阶段：' . ($stage ?: '-'),
            '咨询目的：' . ($purpose ?: '-'),
            '来源：' . ($source ?: '-'),
            '页面：' . ($fields['page_url'] ?: '-'),
            '',
            '需求描述：',
            $message,
        ];
        $headers = ['Content-Type: text/plain; charset=UTF-8'];
        $mail_sent = wp_mail($admin_email, $subject, implode("\n", $body_lines), $headers);
    }
    update_post_meta($post_id, '_chenxuan_lead_mail_sent', $mail_sent ? 'yes' : 'no');

    wp_send_json_success([
        'message' => chenxuan_lead_text('lead_success', '需求已收到，辰轩工程团队将尽快与您联系。'),
        'leadId' => $post_id,
        'mailSent' => $mail_sent,
    ]);
}
add_action('wp_ajax_chenxuan_submit_lead', 'chenxuan_ajax_submit_lead');
add_action('wp_ajax_nopriv_chenxuan_submit_lead', 'chenxuan_ajax_submit_lead');
