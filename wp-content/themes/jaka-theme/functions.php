<?php
/**
 * Chenxuan Robotics Theme Functions
 */

if (!defined('ABSPATH')) exit;

define('JAKA_VERSION', '2.0.9');
define('JAKA_DIR', get_template_directory());
define('JAKA_URI', get_template_directory_uri());

/* ── Theme Setup ── */
function jaka_theme_setup() {
    load_theme_textdomain('jaka-theme', JAKA_DIR . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption']);
    add_theme_support('custom-logo', [
        'height'      => 60,
        'width'       => 180,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    add_theme_support('menus');

    add_image_size('hero-banner', 1920, 1080, true);
    add_image_size('product-card', 600, 400, true);
    add_image_size('news-thumb', 400, 260, true);
    add_image_size('solution-card', 800, 500, true);

    register_nav_menus([
        'primary'   => __('主导航菜单', 'jaka-theme'),
        'footer'    => __('页脚菜单', 'jaka-theme'),
        'mobile'    => __('移动端菜单', 'jaka-theme'),
    ]);
}
add_action('after_setup_theme', 'jaka_theme_setup');

/* ── Enqueue Assets ── */
function jaka_enqueue_assets() {
    $current_path = function_exists('chenxuan_current_request_path') ? chenxuan_current_request_path() : '';
    $is_service_surface = is_page_template('page-service.php') || $current_path === 'service';

    // Google Fonts - 只加载必要的字重，减少下载体积
    wp_enqueue_style('jaka-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Noto+Sans+SC:wght@400;500;700&display=swap',
        [], null
    );

    // Theme core styles (always loaded)
    wp_enqueue_style('jaka-main', JAKA_URI . '/assets/css/main.css', [], JAKA_VERSION);
    wp_enqueue_style('jaka-responsive', JAKA_URI . '/assets/css/responsive.css', [], JAKA_VERSION);
    wp_enqueue_style('jaka-overlays', JAKA_URI . '/assets/css/overlays.css', ['jaka-main'], JAKA_VERSION);
    wp_enqueue_style('jaka-style', get_stylesheet_uri(), [], JAKA_VERSION);

    // 按需加载页面专属CSS
    if (is_front_page() || $is_service_surface || is_page_template('page-products.php') || is_page_template('page-about.php')) {
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], '11.0');
    }
    if (is_front_page()) {
        wp_enqueue_style('jaka-animations', JAKA_URI . '/assets/css/animations.css', [], JAKA_VERSION);
    }
    // pages.css & service.css only on sub-pages
    if (!is_front_page()) {
        wp_enqueue_style('jaka-pages', JAKA_URI . '/assets/css/pages.css', [], JAKA_VERSION);
    }
    if ($is_service_surface) {
        wp_enqueue_style('jaka-service', JAKA_URI . '/assets/css/service.css', [], JAKA_VERSION);
    }

    // Navigation (always)
    wp_enqueue_script('jaka-navigation', JAKA_URI . '/assets/js/navigation.js', [], JAKA_VERSION, true);

    // 按需加载重型JS库
    $main_deps = [];
    $needs_swiper = is_front_page() || $is_service_surface || is_page_template('page-products.php') || is_page_template('page-about.php');
    if ($needs_swiper) {
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], '11.0', true);
        $main_deps[] = 'swiper-js';
    }
    // AOS (lightweight, used on all pages for fade-in animations)
    wp_enqueue_style('aos-css', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css', [], '2.3.4');
    wp_enqueue_script('aos-js', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js', [], '2.3.4', true);
    $main_deps[] = 'aos-js';

    // GSAP only on homepage (heavy, only used for parallax)
    if (is_front_page()) {
        wp_enqueue_script('gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', [], '3.12.5', true);
        wp_enqueue_script('gsap-scroll', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', ['gsap-js'], '3.12.5', true);
        $main_deps[] = 'gsap-scroll';
    }

    wp_enqueue_script('jaka-main', JAKA_URI . '/assets/js/main.js', $main_deps, JAKA_VERSION, true);

    // Auth JS only on login/register pages
    if (is_page_template('page-login.php') || is_page_template('page-register.php')) {
        wp_enqueue_script('jaka-auth', JAKA_URI . '/assets/js/auth.js', ['jaka-main'], JAKA_VERSION, true);
    }

    wp_localize_script('jaka-main', 'jakaData', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'themeUrl' => JAKA_URI,
        'nonce'    => wp_create_nonce('jaka_nonce'),
        'lang'     => function_exists('jaka_current_lang') ? jaka_current_lang() : 'zh',
        'formSuccess' => function_exists('jaka_t') ? jaka_t('lead_success') : '需求已收到，辰轩工程团队将尽快与您联系。',
        'formError' => function_exists('jaka_t') ? jaka_t('lead_err_save') : '提交失败，请稍后再试。',
        'formSubmitting' => function_exists('jaka_t') ? jaka_t('lead_submitting') : '提交中...',
        'authAgreeRequired' => function_exists('jaka_t') ? jaka_t('auth_err_agree') : '请阅读并同意协议',
        'authNetworkError' => function_exists('jaka_t') ? jaka_t('auth_err_network') : '网络错误',
    ]);
}
add_action('wp_enqueue_scripts', 'jaka_enqueue_assets');

function chenxuan_legal_pages() {
    return [
        'privacy-policy' => [
            'title_key' => 'privacy_policy',
            'body_key' => 'legal_privacy_body',
        ],
        'user-agreement' => [
            'title_key' => 'user_agreement',
            'body_key' => 'legal_user_body',
        ],
        'personal-info' => [
            'title_key' => 'personal_info',
            'body_key' => 'legal_personal_body',
        ],
        'cookie-policy' => [
            'title_key' => 'cookie_policy',
            'body_key' => 'legal_cookie_body',
        ],
    ];
}

function chenxuan_legal_url($slug) {
    return home_url('/' . trim($slug, '/'));
}

function chenxuan_legal_page_data($path = '') {
    $path = $path ?: (function_exists('chenxuan_current_request_path') ? chenxuan_current_request_path() : '');
    $pages = chenxuan_legal_pages();
    if (!isset($pages[$path])) {
        return null;
    }
    $page = $pages[$path];
    $page['slug'] = $path;
    $page['title'] = function_exists('jaka_t') ? jaka_t($page['title_key']) : $page['title_key'];
    $page['body'] = function_exists('jaka_t') ? jaka_t($page['body_key']) : '';
    return $page;
}

/* ── ChenXuan localized document titles ── */
function jaka_chenxuan_document_title($title) {
    $brand = function_exists('chenxuan_brand_name') ? chenxuan_brand_name() : get_bloginfo('name');

    if (function_exists('chenxuan_legal_page_data')) {
        $legal_page = chenxuan_legal_page_data();
        if ($legal_page) {
            return trim($legal_page['title'] . ' - ' . $brand);
        }
    }

    if (function_exists('chenxuan_current_request_path') && chenxuan_current_request_path() === 'strategic-cooperation') {
        return trim((function_exists('chenxuan_lx') ? chenxuan_lx('战略合作', 'Strategic Cooperation') : 'Strategic Cooperation') . ' - ' . $brand);
    }

    if (function_exists('chenxuan_current_request_path') && chenxuan_current_request_path() === 'smart-commerce') {
        return trim((function_exists('chenxuan_l') ? chenxuan_l('智慧商业场景') : 'Smart Commerce') . ' - ' . $brand);
    }

    if (is_front_page()) {
        $tagline = function_exists('jaka_t') ? jaka_t('mega_about_tagline') : get_bloginfo('description');
        return trim($brand . ' - ' . $tagline);
    }

    if (!is_page()) {
        return $title;
    }

    $slug = get_post_field('post_name', get_queried_object_id());
    $page_titles = [
        'products' => function_exists('jaka_t') ? jaka_t('pg_products_title') : 'Products',
        'solutions' => function_exists('jaka_t') ? jaka_t('pg_solutions_title') : 'Solutions',
        'service' => function_exists('jaka_t') ? jaka_t('pg_service_title') : 'Service',
        'download' => function_exists('jaka_t') ? jaka_t('pg_download_title') : 'Download Center',
        'news' => function_exists('jaka_t') ? jaka_t('pg_news_title') : 'News',
        'about' => function_exists('jaka_t') ? jaka_t('nav_about') : 'About',
        'cases' => function_exists('jaka_t') ? jaka_t('pg_cases_title') : 'Cases',
        'contact' => function_exists('jaka_t') ? jaka_t('pg_contact_title') : 'Contact',
        'smart-commerce' => function_exists('chenxuan_l') ? chenxuan_l('智慧商业场景') : 'Smart Commerce',
        'strategic-cooperation' => function_exists('chenxuan_lx') ? chenxuan_lx('战略合作', 'Strategic Cooperation') : 'Strategic Cooperation',
        'login' => function_exists('jaka_t') ? jaka_t('auth_login_title') : 'Login',
        'register' => function_exists('jaka_t') ? jaka_t('auth_register_title') : 'Register',
    ];

    if (isset($page_titles[$slug])) {
        return trim($page_titles[$slug] . ' - ' . $brand);
    }

    return $title;
}
add_filter('pre_get_document_title', 'jaka_chenxuan_document_title');

function chenxuan_current_request_path() {
    $path = isset($_SERVER['REQUEST_URI']) ? wp_parse_url(wp_unslash($_SERVER['REQUEST_URI']), PHP_URL_PATH) : '';
    return trim((string) $path, '/');
}

function chenxuan_redirect_legacy_paths() {
    if (chenxuan_current_request_path() === 'jaka-plus') {
        wp_safe_redirect(home_url('/smart-commerce'), 301);
        exit;
    }
}
add_action('template_redirect', 'chenxuan_redirect_legacy_paths', 1);

function chenxuan_mark_virtual_page_request() {
    if (!in_array(chenxuan_current_request_path(), ['smart-commerce', 'strategic-cooperation'], true)) {
        return;
    }

    status_header(200);
    global $wp_query;
    if ($wp_query) {
        $wp_query->is_404 = false;
        $wp_query->is_page = true;
    }

    if (isset($_SERVER['REQUEST_METHOD']) && strtoupper((string) $_SERVER['REQUEST_METHOD']) === 'HEAD') {
        exit;
    }
}
add_action('template_redirect', 'chenxuan_mark_virtual_page_request', 2);

function chenxuan_smart_commerce_template($template) {
    if (chenxuan_current_request_path() === 'smart-commerce') {
        status_header(200);
        global $wp_query;
        if ($wp_query) {
            $wp_query->is_404 = false;
            $wp_query->is_page = true;
        }
        return JAKA_DIR . '/page-smart-commerce.php';
    }
    return $template;
}
add_filter('template_include', 'chenxuan_smart_commerce_template', 20);

function chenxuan_strategic_cooperation_template($template) {
    if (chenxuan_current_request_path() === 'strategic-cooperation') {
        status_header(200);
        global $wp_query;
        if ($wp_query) {
            $wp_query->is_404 = false;
            $wp_query->is_page = true;
        }
        return JAKA_DIR . '/page-strategic-cooperation.php';
    }
    return $template;
}
add_filter('template_include', 'chenxuan_strategic_cooperation_template', 20);

function chenxuan_legal_template($template) {
    if (chenxuan_legal_page_data()) {
        status_header(200);
        global $wp_query;
        if ($wp_query) {
            $wp_query->is_404 = false;
            $wp_query->is_page = true;
        }
        return JAKA_DIR . '/page-legal.php';
    }
    return $template;
}
add_filter('template_include', 'chenxuan_legal_template', 21);

/* ── Preconnect hints for CDN ── */
function jaka_resource_hints($urls, $relation_type) {
    if ($relation_type === 'preconnect') {
        $urls[] = ['href' => 'https://cdn.jsdelivr.net', 'crossorigin' => ''];
    }
    return $urls;
}
add_filter('wp_resource_hints', 'jaka_resource_hints', 10, 2);

/* ── Disable WordPress default bloat ── */
function jaka_disable_bloat() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
}
add_action('init', 'jaka_disable_bloat');

/* ── Remove unnecessary frontend assets ── */
function jaka_dequeue_unnecessary() {
    if (!is_admin()) {
        // Remove jQuery on frontend (theme uses vanilla JS)
        wp_deregister_script('jquery');
        // Remove Gutenberg block CSS if not using blocks
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('global-styles');
        // Remove Elementor frontend assets (theme doesn't use Elementor)
        wp_dequeue_style('elementor-frontend');
        wp_dequeue_style('elementor-common');
        wp_dequeue_style('elementor-icons');
        wp_dequeue_style('elementor-animations');
        wp_dequeue_script('elementor-frontend');
        wp_dequeue_script('elementor-common');
    }
}
add_action('wp_enqueue_scripts', 'jaka_dequeue_unnecessary', 100);

/* ── Custom Post Types ── */
function jaka_register_post_types() {
    // Products
    register_post_type('jaka_product', [
        'labels' => [
            'name' => '产品',
            'singular_name' => '产品',
            'add_new' => '添加产品',
            'add_new_item' => '添加新产品',
            'edit_item' => '编辑产品',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'product'],
        'supports' => ['title','editor','thumbnail','excerpt','custom-fields'],
        'menu_icon' => 'dashicons-hammer',
        'show_in_rest' => true,
    ]);

    // Solutions
    register_post_type('jaka_solution', [
        'labels' => [
            'name' => '解决方案',
            'singular_name' => '解决方案',
            'add_new' => '添加方案',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'solution'],
        'supports' => ['title','editor','thumbnail','excerpt','custom-fields'],
        'menu_icon' => 'dashicons-lightbulb',
        'show_in_rest' => true,
    ]);

    // Cases
    register_post_type('jaka_case', [
        'labels' => [
            'name' => '案例',
            'singular_name' => '案例',
            'add_new' => '添加案例',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'case'],
        'supports' => ['title','editor','thumbnail','excerpt','custom-fields'],
        'menu_icon' => 'dashicons-portfolio',
        'show_in_rest' => true,
    ]);
}
add_action('init', 'jaka_register_post_types');

/* ── Custom Taxonomies ── */
function jaka_register_taxonomies() {
    register_taxonomy('product_category', 'jaka_product', [
        'labels' => ['name' => '产品分类', 'singular_name' => '产品分类'],
        'hierarchical' => true,
        'rewrite' => ['slug' => 'product-cat'],
        'show_in_rest' => true,
    ]);

    register_taxonomy('industry', 'jaka_solution', [
        'labels' => ['name' => '行业', 'singular_name' => '行业'],
        'hierarchical' => true,
        'rewrite' => ['slug' => 'industry'],
        'show_in_rest' => true,
    ]);

    register_taxonomy('application', 'jaka_case', [
        'labels' => ['name' => '应用类型', 'singular_name' => '应用类型'],
        'hierarchical' => true,
        'rewrite' => ['slug' => 'application'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'jaka_register_taxonomies');

/* ── Widgets ── */
function jaka_widgets_init() {
    register_sidebar([
        'name'          => '页脚第一列',
        'id'            => 'footer-1',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
    ]);
    register_sidebar([
        'name'          => '页脚第二列',
        'id'            => 'footer-2',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
    ]);
    register_sidebar([
        'name'          => '页脚第三列',
        'id'            => 'footer-3',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
    ]);
}
add_action('widgets_init', 'jaka_widgets_init');

/* ── Performance Optimizations ── */
require_once JAKA_DIR . '/inc/performance.php';

/* ── Auth (Login / Register AJAX) ── */
require_once JAKA_DIR . '/inc/auth.php';

/* ── Customizer (后台内容管理) ── */
require_once JAKA_DIR . '/inc/customizer.php';

/* ── Polylang 多语言配置 ── */
require_once JAKA_DIR . '/inc/polylang-setup.php';

/* ── 辰轩官网内容源 ── */
require_once JAKA_DIR . '/inc/chenxuan-content.php';

/* ── 语言切换器（Cookie + 翻译字符串）── */
require_once JAKA_DIR . '/inc/language-switcher.php';

/* ── Lead capture (AJAX + admin notification) ── */
require_once JAKA_DIR . '/inc/leads.php';

/* ── Mega Menu Walker ── */
class Jaka_Mega_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $classes = ($depth === 0) ? 'mega-menu-dropdown' : 'mega-submenu';
        $output .= "\n$indent<div class=\"$classes\"><ul class=\"mega-menu-list\">\n";
    }

    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = implode(' ', $item->classes);
        $has_children = in_array('menu-item-has-children', $item->classes);

        $output .= '<li class="' . esc_attr($classes) . '">';
        $output .= '<a href="' . esc_url($item->url) . '"';
        if ($has_children && $depth === 0) {
            $output .= ' class="has-mega-menu"';
        }
        $output .= '>' . esc_html($item->title);
        if ($has_children && $depth === 0) {
            $output .= '<svg class="menu-arrow" width="10" height="6" viewBox="0 0 10 6"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>';
        }
        $output .= '</a>';
    }
}

/* ── Helper Functions ── */
function jaka_get_theme_option($key, $default = '') {
    return get_theme_mod($key, $default);
}

function jaka_svg_icon($name) {
    $icons = [
        'arrow-right' => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M4 10h12M12 6l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'arrow-left' => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M16 10H4M8 6l-4 4 4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'phone' => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" stroke="currentColor" stroke-width="1.5"/></svg>',
        'email' => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" fill="currentColor"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" fill="currentColor"/></svg>',
        'menu' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M3 12h18M3 6h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
        'close' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
        'globe' => '<svg width="18" height="18" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="7.5" stroke="currentColor" stroke-width="1.5"/><path d="M1.5 9h15M9 1.5c2.07 2.34 3.24 5.37 3.24 7.5s-1.17 5.16-3.24 7.5c-2.07-2.34-3.24-5.37-3.24-7.5S6.93 3.84 9 1.5z" stroke="currentColor" stroke-width="1.5"/></svg>',
    ];
    return isset($icons[$name]) ? $icons[$name] : '';
}

/* ── AJAX: Load More News ── */
function jaka_load_more_news() {
    check_ajax_referer('jaka_nonce', 'nonce');
    $page = intval($_POST['page'] ?? 1);
    $posts = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 6,
        'paged' => $page,
    ]);

    if ($posts->have_posts()) {
        while ($posts->have_posts()) {
            $posts->the_post();
            get_template_part('template-parts/content', 'news-card');
        }
        wp_reset_postdata();
    }
    wp_die();
}
add_action('wp_ajax_jaka_load_more', 'jaka_load_more_news');
add_action('wp_ajax_nopriv_jaka_load_more', 'jaka_load_more_news');
