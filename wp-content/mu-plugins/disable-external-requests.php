<?php
/**
 * Must-Use Plugin: Block slow external HTTP requests & disable heavy plugins on frontend
 * This loads before all plugins and themes, catching requests early.
 */

// ═══ 1. Block external API calls on frontend to eliminate TTFB delays ═══
add_filter('pre_http_request', function($preempt, $parsed_args, $url) {
    if (is_admin() || (defined('DOING_CRON') && DOING_CRON) || (defined('WP_CLI') && WP_CLI)) {
        return $preempt;
    }
    $blocked = ['api.wordpress.org', 'downloads.wordpress.org', 'planet.wordpress.org'];
    foreach ($blocked as $host) {
        if (strpos($url, $host) !== false) {
            return new WP_Error('blocked', 'Blocked for performance: ' . $url);
        }
    }
    return $preempt;
}, 1, 3);

// Reduce HTTP timeout for all non-admin requests
add_filter('http_request_timeout', function($timeout) {
    if (!is_admin()) return 3;
    return $timeout;
}, 1);

// ═══ 2. Disable unused heavy plugins on frontend ═══
add_filter('option_active_plugins', function($plugins) {
    $is_ajax = defined('DOING_AJAX') && DOING_AJAX;
    $ajax_action = $is_ajax && isset($_REQUEST['action']) ? sanitize_key(wp_unslash($_REQUEST['action'])) : '';
    $lightweight_ajax_actions = [
        'jaka_send_sms',
        'jaka_login_sms',
        'jaka_login_pwd',
        'jaka_register',
        'jaka_logout',
        'chenxuan_submit_lead',
    ];
    $is_theme_ajax = $is_ajax && in_array($ajax_action, $lightweight_ajax_actions, true);

    // Keep plugins in wp-admin/editor/CLI, but skip them for the theme's own AJAX endpoints.
    if ((is_admin() && !$is_theme_ajax) || ($is_ajax && !$is_theme_ajax) || (defined('WP_CLI') && WP_CLI)) {
        return $plugins;
    }
    // Also keep if REST API request (Elementor editor uses REST)
    if (defined('REST_REQUEST') && REST_REQUEST) {
        return $plugins;
    }

    $disable_on_frontend = [
        'elementor/elementor.php',
        'polylang/polylang.php',
    ];

    return array_values(array_diff($plugins, $disable_on_frontend));
}, 1);

// ═══ 3. Optimize Polylang: skip heavy operations on frontend when no translations exist ═══
add_filter('pll_is_cache_active', '__return_true');
