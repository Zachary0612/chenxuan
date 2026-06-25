<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo esc_attr(jaka_t('mega_about_tagline')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$solutions = function_exists('chenxuan_solutions') ? chenxuan_solutions() : [];
$services = function_exists('chenxuan_services') ? chenxuan_services() : [];
$applications = function_exists('chenxuan_applications') ? chenxuan_applications() : [];
$product_families = function_exists('chenxuan_product_families') ? chenxuan_product_families() : [];
$product_cards = function_exists('chenxuan_product_cards') ? chenxuan_product_cards() : [];
$product_tree = function_exists('chenxuan_product_tree') ? chenxuan_product_tree() : [];
$languages = function_exists('chenxuan_supported_languages') ? chenxuan_supported_languages() : [];
$current_lang = function_exists('jaka_current_lang') ? jaka_current_lang() : 'zh';
$current_user = is_user_logged_in() ? wp_get_current_user() : null;
$current_user_name = $current_user ? ($current_user->display_name ?: $current_user->user_login) : '';
$logout_url = wp_logout_url(home_url('/'));
$products_url = home_url('/products/');
$industrial_products_url = add_query_arg('product_category', 'industrial', $products_url) . '#products-list';
$collaborative_products_url = add_query_arg('product_category', 'collaborative', $products_url) . '#products-list';
$cx_mega_product_asset = static function ($filename) {
    $url = function_exists('chenxuan_product_asset_url')
        ? chenxuan_product_asset_url($filename)
        : trailingslashit(JAKA_URI) . 'assets/images/products/catalog/' . ltrim($filename, '/');

    return add_query_arg('v', JAKA_VERSION, $url);
};

$product_series_slugs = [
    'welding',
    'spraying',
    'handling',
    'cutting',
    'polishing',
    'bending',
    'engraving',
    'positioner',
    'cobot-welding',
    'composite',
    'vision',
    'machine-tool',
    'coffee',
    'cleaning',
    'accessories',
];
$mega_product_image_overrides = [
    'welding' => 'custom-welding-robot.png',
    'spraying' => 'custom-spraying-robot.png',
    'handling' => 'custom-handling-robot.png',
    'polishing' => 'custom-polishing-robot.png',
    'engraving' => 'custom-engraving-robot.png',
    'positioner' => 'custom-showcase-system.png',
    'cleaning' => 'custom-cleaning-robot.png',
];
$product_card_lookup = [];
foreach ($product_cards as $product_card) {
    $lookup_key = $product_card['filter_series'] ?? ($product_card['series'] ?? '');
    if ($lookup_key) {
        $product_card_lookup[$lookup_key] = $product_card;
    }
}
$product_category_cards = [
    'industrial' => [],
    'collaborative' => [],
];
$product_series_index = 0;
foreach ($product_tree as $category_index => $category) {
    $family_key = $category_index === 1 ? 'collaborative' : 'industrial';
    foreach (($category['groups'] ?? []) as $group) {
        foreach (($group['series'] ?? []) as $series) {
            $series_slug = $product_series_slugs[$product_series_index] ?? sanitize_title($series['name'] ?? '');
            $source_card = $product_card_lookup[$series_slug] ?? [];
            $card_image = $source_card['image'] ?? '';
            if ($series_slug === 'spraying' && function_exists('chenxuan_home_asset_url')) {
                $card_image = chenxuan_home_asset_url('industries/spraying-system.jpg');
            }
            if (!empty($mega_product_image_overrides[$series_slug])) {
                $card_image = $cx_mega_product_asset($mega_product_image_overrides[$series_slug]);
            }
            $models = !empty($series['models']) && is_array($series['models']) ? implode(' / ', array_slice($series['models'], 0, 3)) : '';
            $product_category_cards[$family_key][] = [
                'name' => $series['name'] ?? ($source_card['name'] ?? ''),
                'desc' => $source_card['desc'] ?? $models,
                'tag' => $source_card['tag'] ?? '',
                'image' => $card_image,
                'url' => add_query_arg('product_category', $series_slug, home_url('/products/')) . '#products-list',
            ];
            $product_series_index++;
        }
    }
}

$product_links = [];
foreach ($product_families as $family) {
    $family_key = ($family['family'] ?? '') === 'collaborative' ? 'collaborative' : 'industrial';
    $product_links[] = [
        'label' => $family['name'],
        'url' => add_query_arg('product_category', $family_key, $products_url) . '#products-list',
    ];
}

$industrial_links = [];
$cobot_links = [];
foreach ($product_cards as $product) {
    $series_key = $product['filter_series'] ?? ($product['series'] ?? '');
    $link = [
        'label' => $product['name'],
        'url' => add_query_arg('product_category', $series_key, $products_url) . '#products-list',
    ];
    if (($product['family'] ?? '') === 'collaborative') {
        $cobot_links[] = $link;
    } else {
        $industrial_links[] = $link;
    }
}

$solution_links = array_map(function ($solution) {
    return [
        'label' => $solution[0],
        'url' => add_query_arg('solution_industry', $solution[2], home_url('/solutions/')),
    ];
}, $solutions);

$service_links = [
    ['label' => jaka_t('section_service'), 'url' => home_url('/service')],
    ['label' => function_exists('chenxuan_lx') ? chenxuan_lx('常见问题', 'FAQ') : '常见问题', 'url' => home_url('/service#faq')],
    ['label' => function_exists('chenxuan_lx') ? chenxuan_lx('售后服务', 'After-sales Service') : '售后服务', 'url' => home_url('/service#after-sales')],
    ['label' => function_exists('chenxuan_lx') ? chenxuan_lx('战略合作', 'Strategic Cooperation') : '战略合作', 'url' => home_url('/strategic-cooperation')],
    ['label' => function_exists('chenxuan_lx') ? chenxuan_lx('项目案例', 'Project Cases') : '项目案例', 'url' => home_url('/strategic-cooperation#video-cases')],
];

$application_links = array_map(function ($application) {
    return ['label' => $application, 'url' => home_url('/solutions/') . '#application-videos'];
}, array_slice($applications, 0, 8));
$solution_application_source = function_exists('chenxuan_case_applications') ? chenxuan_case_applications() : array_slice($applications, 0, 8);
$solution_application_links = array_map(function ($application) {
    return [
        'label' => $application,
        'url' => add_query_arg('solution_application', $application, home_url('/solutions/')),
    ];
}, $solution_application_source);
$solution_case_link = ['label' => jaka_t('nav_cases') . ' ›', 'url' => home_url('/cases/') . '#case-results', 'class' => 'mega-case-link'];
$solution_application_links = array_merge($solution_application_links, [$solution_case_link]);

$nav_items = [
    [
        'label' => jaka_t('nav_products'),
        'url' => $industrial_products_url,
        'badge' => 'HOT',
        'mega_variant' => 'product-cards',
        'product_cards' => $product_category_cards['industrial'],
        'columns' => [
            ['title' => chenxuan_l('Chenxuan Robot'), 'links' => array_slice($industrial_links, 0, 9)],
            ['title' => chenxuan_l('典型应用'), 'links' => $application_links],
        ],
        'feature' => [
            'title' => chenxuan_l('工业机器人产品系列'),
            'desc' => jaka_t('products_desc'),
            'url' => $industrial_products_url,
            'image' => function_exists('chenxuan_home_asset_url') ? chenxuan_home_asset_url('family/industrial-robot.jpg') : '',
        ],
    ],
    [
        'label' => jaka_t('nav_cobots'),
        'url' => $collaborative_products_url,
        'mega_variant' => 'product-cards',
        'product_cards' => $product_category_cards['collaborative'],
        'columns' => [
            ['title' => chenxuan_l('协作机器人产品系列'), 'links' => array_slice($cobot_links, 0, 9)],
            ['title' => chenxuan_l('典型应用'), 'links' => $application_links],
        ],
        'feature' => [
            'title' => chenxuan_l('协作机器人产品系列'),
            'desc' => chenxuan_l('具备安全协作、灵活部署与易于编程的特点，可与人类在同一工作空间内安全配合完成作业。'),
            'url' => $collaborative_products_url,
            'image' => function_exists('chenxuan_home_asset_url') ? chenxuan_home_asset_url('family/collaborative-robot.jpg') : '',
        ],
    ],
    [
        'label' => jaka_t('nav_solutions'),
        'url' => '#',
        'disable_nav' => true,
        'mega_variant' => 'solutions',
        'columns' => [
            ['title' => chenxuan_l('行业场景'), 'links' => $solution_links],
            ['title' => chenxuan_l('应用工艺'), 'links' => $solution_application_links],
        ],
        'mobile_limit' => 20,
        'feature' => [
            'title' => jaka_t('section_solutions'),
            'desc' => jaka_t('solutions_desc'),
            'url' => add_query_arg('solution_industry', 'engineering-machinery', home_url('/solutions/')),
            'image' => function_exists('chenxuan_home_asset_url') ? chenxuan_home_asset_url('industries/engineering-machinery.jpg') : '',
        ],
    ],
    [
        'label' => jaka_t('nav_service'),
        'url' => home_url('/service'),
        'mega_variant' => 'service',
        'columns' => [
            ['title' => jaka_t('section_service'), 'links' => $service_links],
        ],
        'feature' => [
            'title' => chenxuan_l('以客户为中心的全流程工程服务'),
            'desc' => jaka_t('service_desc'),
            'url' => home_url('/service'),
            'image' => function_exists('chenxuan_home_asset_url') ? chenxuan_home_asset_url('service/system-solution.jpg') : '',
        ],
    ],
    ['label' => jaka_t('nav_download'), 'url' => home_url('/download')],
    ['label' => jaka_t('nav_news'), 'url' => home_url('/news')],
    [
        'label' => jaka_t('nav_about'),
        'url' => home_url('/about'),
        'mega_variant' => 'about',
        'columns' => [
            ['title' => jaka_t('nav_about'), 'links' => [
                ['label' => chenxuan_l('公司介绍'), 'url' => home_url('/about')],
                ['label' => jaka_t('nav_news'), 'url' => home_url('/news')],
                ['label' => jaka_t('mega_contact'), 'url' => home_url('/contact')],
            ]],
        ],
        'feature' => [
            'title' => chenxuan_brand_name(),
            'desc' => jaka_t('mega_about_tagline'),
            'url' => home_url('/about'),
            'image' => function_exists('chenxuan_home_asset_url') ? chenxuan_home_asset_url('banner/banner-02.jpg') : '',
        ],
    ],
];
?>

<?php
$header_classes = ['site-header', 'site-header--lang-' . sanitize_html_class($current_lang)];
if (!in_array($current_lang, ['zh', 'zh_tw'], true)) {
    $header_classes[] = 'site-header--latin';
}
?>
<header id="site-header" class="<?php echo esc_attr(implode(' ', $header_classes)); ?>">
    <div class="header-inner">
        <div class="container header-container">
            <div class="site-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-text" aria-label="<?php echo esc_attr(chenxuan_brand_name()); ?>">
                    <?php echo esc_html(chenxuan_short_name()); ?>
                </a>
            </div>

            <nav class="main-nav" id="main-nav">
                <ul class="nav-menu">
                    <?php foreach ($nav_items as $item) : ?>
                    <?php $is_disabled_nav = !empty($item['disable_nav']); ?>
                    <li class="menu-item<?php echo !empty($item['columns']) ? ' has-mega-menu' : ''; ?>">
                        <a href="<?php echo esc_url($is_disabled_nav ? '#' : $item['url']); ?>"<?php echo $is_disabled_nav ? ' data-mega-trigger="true" role="button" aria-haspopup="true"' : ''; ?>>
                            <span><?php echo esc_html($item['label']); ?></span>
                            <?php if (!empty($item['badge'])) : ?>
                            <em class="nav-hot-badge"><?php echo esc_html($item['badge']); ?></em>
                            <?php endif; ?>
                        </a>
                        <?php if (!empty($item['columns'])) : ?>
                        <?php
                        $mega_panel_classes = ['mega-menu-panel'];
                        if (!empty($item['mega_variant'])) {
                            $mega_panel_classes[] = 'mega-menu-panel--' . sanitize_html_class($item['mega_variant']);
                        }
                        ?>
                        <div class="<?php echo esc_attr(implode(' ', $mega_panel_classes)); ?>">
                            <div class="mega-menu-inner">
                                <?php if (($item['mega_variant'] ?? '') === 'product-cards' && !empty($item['product_cards'])) : ?>
                                <div class="mega-product-grid">
                                    <?php foreach ($item['product_cards'] as $product_card) : ?>
                                    <a href="<?php echo esc_url($product_card['url']); ?>" class="mega-product-card">
                                        <div class="mega-product-img">
                                            <?php if (!empty($product_card['image'])) : ?>
                                            <img src="<?php echo esc_url($product_card['image']); ?>" alt="<?php echo esc_attr($product_card['name']); ?>" loading="lazy">
                                            <?php else : ?>
                                            <div class="mega-product-placeholder"><?php echo esc_html(chenxuan_short_name()); ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mega-product-body">
                                            <h4 class="mega-product-title">
                                                <span><?php echo esc_html($product_card['name']); ?></span>
                                                <?php if (!empty($product_card['tag'])) : ?>
                                                <em><?php echo esc_html($product_card['tag']); ?></em>
                                                <?php endif; ?>
                                            </h4>
                                            <span class="mega-product-brand">ChenXuan Robot</span>
                                        </div>
                                    </a>
                                    <?php endforeach; ?>
                                </div>
                                <?php else : ?>
                                <?php foreach ($item['columns'] as $column) : ?>
                                <div class="mega-col">
                                    <h4 class="mega-title"><?php echo esc_html($column['title']); ?></h4>
                                    <ul class="mega-links">
                                        <?php foreach ($column['links'] as $link) : ?>
                                        <li class="<?php echo esc_attr($link['class'] ?? ''); ?>"><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['label']); ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <?php endforeach; ?>
                                <?php if (!empty($item['feature'])) : ?>
                                <div class="mega-col mega-featured">
                                    <div class="mega-featured-card">
                                        <div class="mega-featured-img">
                                            <?php if (!empty($item['feature']['image'])) : ?>
                                            <img src="<?php echo esc_url($item['feature']['image']); ?>" alt="<?php echo esc_attr($item['feature']['title']); ?>" loading="lazy">
                                            <?php else : ?>
                                            <div class="mega-featured-placeholder"><?php echo esc_html(chenxuan_short_name()); ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <h4 class="mega-title"><?php echo esc_html($item['feature']['title']); ?></h4>
                                        <p><?php echo esc_html($item['feature']['desc']); ?></p>
                                        <a href="<?php echo esc_url($item['feature']['url']); ?>" class="mega-cta">
                                            <?php echo esc_html(jaka_t('learn_more')); ?> <?php echo jaka_svg_icon('arrow-right'); ?>
                                        </a>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <div class="header-right">
                <button class="header-search-btn" id="header-search-btn" aria-label="<?php echo esc_attr(jaka_t('btn_search')); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.5"/><path d="M21 21l-4.35-4.35" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                </button>
                <div class="language-switcher">
                    <button class="lang-btn">
                        <?php echo jaka_svg_icon('globe'); ?>
                        <span><?php echo esc_html(function_exists('jaka_current_lang_name') ? jaka_current_lang_name() : '简体中文'); ?></span>
                        <svg class="lang-arrow" width="10" height="6" viewBox="0 0 10 6"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
                    </button>
                    <div class="lang-dropdown" id="lang-dropdown">
                        <?php foreach ($languages as $lang) : ?>
                        <a href="<?php echo esc_url(add_query_arg('lang', $lang['code'])); ?>" class="<?php echo $current_lang === $lang['code'] ? 'active' : ''; ?>" data-lang="<?php echo esc_attr($lang['code']); ?>"><?php echo esc_html($lang['label']); ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php if ($current_user) : ?>
                <div class="header-auth header-auth--logged-in">
                    <span class="header-user-name"><?php echo esc_html($current_user_name); ?></span>
                    <span class="header-auth-divider"></span>
                    <a href="<?php echo esc_url($logout_url); ?>"><?php echo esc_html(jaka_t('btn_logout') ?: 'Log out'); ?></a>
                </div>
                <?php else : ?>
                <div class="header-auth">
                    <a href="<?php echo esc_url(home_url('/login')); ?>"><?php echo esc_html(jaka_t('btn_login')); ?></a>
                    <span class="header-auth-divider"></span>
                    <a href="<?php echo esc_url(home_url('/register')); ?>"><?php echo esc_html(jaka_t('btn_register')); ?></a>
                </div>
                <?php endif; ?>
                <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="Menu">
                    <span class="hamburger"><span></span><span></span><span></span></span>
                </button>
            </div>
        </div>
    </div>

    <div class="mobile-menu" id="mobile-menu">
        <div class="mobile-menu-inner">
            <div class="mobile-menu-header">
                <div class="site-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-text"><?php echo esc_html(chenxuan_short_name()); ?></a>
                </div>
                <button class="mobile-menu-close" id="mobile-menu-close">
                    <?php echo jaka_svg_icon('close'); ?>
                </button>
            </div>
            <div class="mobile-menu-body">
                <ul class="mobile-nav">
                    <?php foreach ($nav_items as $item) : ?>
                    <?php $is_disabled_nav = !empty($item['disable_nav']); ?>
                    <li class="mobile-nav-item<?php echo !empty($item['columns']) ? ' has-children' : ''; ?>">
                        <a href="<?php echo esc_url($is_disabled_nav ? '#' : $item['url']); ?>"<?php echo $is_disabled_nav ? ' data-mega-trigger="true" role="button" aria-haspopup="true"' : ''; ?>>
                            <?php echo esc_html($item['label']); ?>
                            <?php if (!empty($item['columns'])) : ?>
                            <svg class="menu-arrow" width="10" height="6" viewBox="0 0 10 6"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
                            <?php endif; ?>
                        </a>
                        <?php if (!empty($item['columns'])) : ?>
                        <ul class="mobile-submenu">
                            <?php foreach ($item['columns'] as $column) : ?>
                                <?php foreach (array_slice($column['links'], 0, $item['mobile_limit'] ?? 6) as $link) : ?>
                                <li class="<?php echo esc_attr($link['class'] ?? ''); ?>"><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['label']); ?></a></li>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="mobile-menu-footer">
                <div class="mobile-lang-switcher">
                    <div class="mobile-lang-title">
                        <?php echo jaka_svg_icon('globe'); ?>
                        <span><?php echo esc_html(chenxuan_l('语言')); ?></span>
                    </div>
                    <div class="mobile-lang-list">
                        <?php foreach ($languages as $lang) : ?>
                        <a href="<?php echo esc_url(add_query_arg('lang', $lang['code'])); ?>" class="<?php echo $current_lang === $lang['code'] ? 'active' : ''; ?>" data-lang="<?php echo esc_attr($lang['code']); ?>"><?php echo esc_html($lang['label']); ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="mobile-auth-links">
                    <?php if ($current_user) : ?>
                    <span class="btn-login-mobile mobile-auth-user"><?php echo esc_html($current_user_name); ?></span>
                    <a href="<?php echo esc_url($logout_url); ?>" class="btn-register-mobile"><?php echo esc_html(jaka_t('btn_logout') ?: 'Log out'); ?></a>
                    <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/login')); ?>" class="btn-login-mobile"><?php echo esc_html(jaka_t('btn_login')); ?></a>
                    <a href="<?php echo esc_url(home_url('/register')); ?>" class="btn-register-mobile"><?php echo esc_html(jaka_t('btn_register')); ?></a>
                    <?php endif; ?>
                </div>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn-consult-mobile"><?php echo esc_html(jaka_t('btn_consult')); ?></a>
            </div>
        </div>
    </div>
</header>

<div class="search-overlay" id="search-overlay">
    <div class="search-overlay-inner">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="search-overlay-logo">
            <svg viewBox="0 0 150 36" fill="none" xmlns="http://www.w3.org/2000/svg" style="height:34px;width:auto"><text x="0" y="27" font-family="Inter, 'Noto Sans SC', sans-serif" font-weight="800" font-size="28" fill="#d80c1e"><?php echo esc_html(chenxuan_short_name()); ?></text></svg>
        </a>
        <form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="search-overlay-form">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.5"/><path d="M21 21l-4.35-4.35" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
            <input type="text" name="s" class="search-overlay-input" placeholder="<?php echo esc_attr(jaka_t('search_placeholder')); ?>">
            <button type="submit" class="search-overlay-submit"><?php echo esc_html(jaka_t('btn_search')); ?></button>
        </form>
        <button class="search-overlay-close" id="search-overlay-close" aria-label="Close">
            <svg width="20" height="20" viewBox="0 0 20 20"><path d="M4 4l12 12M16 4L4 16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        </button>
    </div>
</div>

<main id="site-content" class="site-content">
