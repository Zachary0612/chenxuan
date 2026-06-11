<?php
if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit('Forbidden');
}

if (!defined('ABSPATH')) {
    define('ABSPATH', '/var/www/html/');
}
require ABSPATH . 'wp-load.php';
$pages = get_pages(['post_status' => 'publish,draft,private']);
foreach ($pages as $p) {
    $tpl = get_page_template_slug($p->ID);
    echo $p->ID . ' | ' . $p->post_name . ' | ' . $p->post_title . ' | tpl=' . ($tpl ?: 'default') . "\n";
}
echo "---\nFront page: " . get_option('page_on_front') . "\n";
echo "Posts page: " . get_option('page_for_posts') . "\n";
echo "Show on front: " . get_option('show_on_front') . "\n";
