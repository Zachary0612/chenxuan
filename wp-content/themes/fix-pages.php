<?php
if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit('Forbidden');
}

if (!defined('ABSPATH')) {
    define('ABSPATH', '/var/www/html/');
}
require ABSPATH . 'wp-load.php';

$needed = [
    'home' => '首页',
    'products' => '产品中心',
    'solutions' => '解决方案',
    'cases' => '案例中心',
    'service' => '服务与支持',
    'download' => '下载中心',
    'news' => '新闻',
    'about' => '关于辰轩',
    'contact' => '联系辰轩',
    'smart-commerce' => '智慧商业',
    'login' => '登录',
    'register' => '注册',
];

foreach ($needed as $slug => $title) {
    $page = get_page_by_path($slug);
    if ($page) {
        wp_update_post([
            'ID' => $page->ID,
            'post_title' => $title,
            'post_status' => 'publish',
        ]);
        echo "Updated: {$title} -> {$slug}\n";
        continue;
    }

    $id = wp_insert_post([
        'post_title' => $title,
        'post_name' => $slug,
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_content' => '',
    ]);
    echo "Created: {$title} (ID={$id}) -> {$slug}\n";
}

$legacy = get_page_by_path('jaka-plus');
if ($legacy) {
    wp_update_post([
        'ID' => $legacy->ID,
        'post_status' => 'draft',
    ]);
    echo "Drafted legacy plus page: {$legacy->ID}\n";
}

$home_page = get_page_by_path('home');
if ($home_page) {
    update_option('show_on_front', 'page');
    update_option('page_on_front', $home_page->ID);
    echo "Front page set to: {$home_page->ID}\n";
}

echo "\nCurrent pages:\n";
foreach (get_pages() as $page) {
    echo "  ID={$page->ID} slug={$page->post_name} title={$page->post_title}\n";
}
