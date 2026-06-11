<?php
/**
 * Performance optimizations for local/Docker development
 * Blocks external HTTP requests that cause 5-7 second delays
 */

// Disable WP Cron on frontend (use system cron instead)
if (!defined('DISABLE_WP_CRON')) {
    define('DISABLE_WP_CRON', true);
}

// Block external update checks on every page load
function jaka_block_update_checks() {
    // Remove update checks from frontend requests
    if (!is_admin()) {
        remove_action('wp_version_check', 'wp_version_check');
        remove_action('update_option_active_plugins', 'update_option_active_plugins');
    }
}
add_action('init', 'jaka_block_update_checks', 1);

// Reduce HTTP request timeout for external calls
function jaka_reduce_http_timeout($timeout) {
    if (!is_admin()) {
        return 3; // 3 seconds max for external calls on frontend
    }
    return $timeout;
}
add_filter('http_request_timeout', 'jaka_reduce_http_timeout');

// Block unnecessary external HTTP requests
function jaka_block_external_requests($preempt, $parsed_args, $url) {
    // Block update checks on frontend
    if (!is_admin()) {
        $blocked_hosts = [
            'api.wordpress.org',
            'downloads.wordpress.org',
            'planet.wordpress.org',
        ];
        foreach ($blocked_hosts as $host) {
            if (strpos($url, $host) !== false) {
                return new WP_Error('blocked', 'External request blocked for performance');
            }
        }
    }
    return $preempt;
}
add_filter('pre_http_request', 'jaka_block_external_requests', 10, 3);

// Disable Elementor completely on frontend if not needed by theme
function jaka_disable_elementor_frontend() {
    if (!is_admin() && class_exists('\Elementor\Plugin')) {
        // Prevent Elementor from initializing on frontend
        remove_action('wp_enqueue_scripts', [\Elementor\Plugin::instance()->frontend, 'enqueue_styles'], 999);
        remove_action('wp_enqueue_scripts', [\Elementor\Plugin::instance()->frontend, 'enqueue_scripts'], 999);
    }
}
add_action('wp', 'jaka_disable_elementor_frontend', 1);
