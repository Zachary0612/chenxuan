<?php
/**
 * JAKA Starter 子主题 - Functions
 * 
 * 基于 Hello Elementor，所有页面内容通过 Elementor 可视化编辑
 * 此文件仅处理：品牌字体加载、自定义文章类型、全局工具函数
 */

if (!defined('ABSPATH')) exit;

define('JAKA_STARTER_VERSION', '1.0.0');

/* ── 加载父主题 + 子主题样式 ── */
function jaka_starter_enqueue_styles() {
    // Google Fonts
    wp_enqueue_style('jaka-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Noto+Sans+SC:wght@300;400;500;700;900&display=swap',
        [], null
    );

    // 父主题
    wp_enqueue_style('hello-elementor', get_template_directory_uri() . '/style.css');

    // 子主题品牌样式
    wp_enqueue_style('jaka-starter', get_stylesheet_uri(), ['hello-elementor'], JAKA_STARTER_VERSION);
}
add_action('wp_enqueue_scripts', 'jaka_starter_enqueue_styles');

/* ── 主题支持 ── */
function jaka_starter_setup() {
    load_theme_textdomain('jaka-starter', get_stylesheet_directory() . '/languages');

    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo', [
        'height'      => 60,
        'width'       => 180,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    add_image_size('product-card', 600, 400, true);
    add_image_size('news-thumb', 400, 260, true);
    add_image_size('hero-banner', 1920, 1080, true);
    add_image_size('solution-card', 800, 500, true);

    register_nav_menus([
        'primary' => __('主导航菜单', 'jaka-starter'),
        'footer'  => __('页脚菜单', 'jaka-starter'),
    ]);
}
add_action('after_setup_theme', 'jaka_starter_setup');

/* ── 自定义文章类型：产品 ── */
function jaka_register_product_cpt() {
    register_post_type('jaka_product', [
        'labels' => [
            'name'               => '产品',
            'singular_name'      => '产品',
            'add_new'            => '添加产品',
            'add_new_item'       => '添加新产品',
            'edit_item'          => '编辑产品',
            'view_item'          => '查看产品',
            'all_items'          => '所有产品',
            'search_items'       => '搜索产品',
            'not_found'          => '未找到产品',
            'menu_name'          => '产品管理',
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'products'],
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'menu_icon'    => 'dashicons-hammer',
        'show_in_rest' => true,
    ]);

    register_taxonomy('product_category', 'jaka_product', [
        'labels' => [
            'name'          => '产品分类',
            'singular_name' => '产品分类',
            'add_new_item'  => '添加产品分类',
            'menu_name'     => '产品分类',
        ],
        'hierarchical' => true,
        'rewrite'      => ['slug' => 'product-cat'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'jaka_register_product_cpt');

/* ── 自定义文章类型：解决方案 ── */
function jaka_register_solution_cpt() {
    register_post_type('jaka_solution', [
        'labels' => [
            'name'               => '解决方案',
            'singular_name'      => '解决方案',
            'add_new'            => '添加方案',
            'add_new_item'       => '添加解决方案',
            'edit_item'          => '编辑方案',
            'all_items'          => '所有方案',
            'menu_name'          => '解决方案',
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'solutions'],
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'menu_icon'    => 'dashicons-lightbulb',
        'show_in_rest' => true,
    ]);

    register_taxonomy('industry', 'jaka_solution', [
        'labels' => [
            'name'          => '行业',
            'singular_name' => '行业',
            'add_new_item'  => '添加行业',
            'menu_name'     => '行业分类',
        ],
        'hierarchical' => true,
        'rewrite'      => ['slug' => 'industry'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'jaka_register_solution_cpt');

/* ── 自定义文章类型：案例 ── */
function jaka_register_case_cpt() {
    register_post_type('jaka_case', [
        'labels' => [
            'name'               => '案例',
            'singular_name'      => '案例',
            'add_new'            => '添加案例',
            'add_new_item'       => '添加新案例',
            'edit_item'          => '编辑案例',
            'all_items'          => '所有案例',
            'menu_name'          => '案例中心',
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'cases'],
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'menu_icon'    => 'dashicons-portfolio',
        'show_in_rest' => true,
    ]);
}
add_action('init', 'jaka_register_case_cpt');

/* ── Elementor 支持：让自定义文章类型可用 Elementor 编辑 ── */
function jaka_add_elementor_cpt_support() {
    if (!is_admin()) return;

    $cpt_support = get_option('elementor_cpt_support', ['page', 'post']);
    $jaka_types  = ['jaka_product', 'jaka_solution', 'jaka_case'];

    $updated = false;
    foreach ($jaka_types as $type) {
        if (!in_array($type, $cpt_support)) {
            $cpt_support[] = $type;
            $updated = true;
        }
    }

    if ($updated) {
        update_option('elementor_cpt_support', $cpt_support);
    }
}
add_action('admin_init', 'jaka_add_elementor_cpt_support');

/* ── Elementor 全局色盘：注入 JAKA 品牌色 ── */
function jaka_elementor_default_colors() {
    return [
        [
            '_id'   => 'jaka-primary',
            'title' => 'JAKA 品牌红',
            'color' => '#d80c1e',
        ],
        [
            '_id'   => 'jaka-dark',
            'title' => 'JAKA 深色',
            'color' => '#1a1a2e',
        ],
        [
            '_id'   => 'jaka-gray',
            'title' => 'JAKA 浅灰',
            'color' => '#f5f5f7',
        ],
        [
            '_id'   => 'jaka-text',
            'title' => 'JAKA 正文',
            'color' => '#333333',
        ],
    ];
}
// add_filter('elementor/schemes/default_colors', 'jaka_elementor_default_colors');

/* ── 后台仪表盘自定义 ── */
function jaka_admin_custom_styles() {
    echo '<style>
        #wpadminbar { background: #1a1a2e; }
        .wp-admin #adminmenuback, .wp-admin #adminmenuwrap { background: #1a1a2e; }
        #adminmenu .wp-has-current-submenu .wp-submenu, 
        #adminmenu a.wp-has-current-submenu:focus+.wp-submenu { background: #252540; }
        #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu { background: #d80c1e; }
    </style>';
}
add_action('admin_head', 'jaka_admin_custom_styles');

/* ── 登录页面品牌化 ── */
function jaka_login_styles() {
    echo '<style>
        body.login { background: #f5f5f7; }
        .login h1 a { 
            background-image: none !important; 
            font-size: 32px; font-weight: 800; 
            color: #d80c1e; width: auto; height: auto;
            text-indent: 0;
        }
        .login h1 a::after { content: "JAKA Robotics"; }
        .login form { border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .wp-core-ui .button-primary { background: #d80c1e; border-color: #d80c1e; }
        .wp-core-ui .button-primary:hover { background: #b00a18; border-color: #b00a18; }
    </style>';
}
add_action('login_enqueue_scripts', 'jaka_login_styles');

function jaka_login_logo_url() {
    return home_url('/');
}
add_filter('login_headerurl', 'jaka_login_logo_url');
