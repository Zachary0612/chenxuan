<?php
/**
 * Template Name: 新闻
 */
get_header();

$cx_text = static function ($zh, $en = '') {
    if (function_exists('chenxuan_lx')) {
        return chenxuan_lx($zh, $en !== '' ? $en : $zh);
    }

    return $zh;
};

$cx_auto = static function ($text) {
    $text = trim((string) $text);
    if ($text === '') {
        return '';
    }

    return function_exists('chenxuan_l') ? chenxuan_l($text) : $text;
};

$filter_labels = [
    'all' => $cx_text('全部', 'All'),
    'project' => $cx_text('项目洞察', 'Project Insights'),
    'solution' => $cx_text('方案观察', 'Solution Notes'),
    'industry' => $cx_text('行业场景', 'Industry Scenarios'),
    'commerce' => $cx_text('智慧商业', 'Smart Commerce'),
];

$classify_news = static function ($title, $excerpt = '', $content = '') {
    $haystack = strtolower(wp_strip_all_tags($title . ' ' . $excerpt . ' ' . $content));
    $contains_any = static function ($needles) use ($haystack) {
        foreach ($needles as $needle) {
            if (strpos($haystack, strtolower($needle)) !== false) {
                return true;
            }
        }
        return false;
    };

    if ($contains_any([
        'exhibition', 'expo', 'messe', 'trade show', 'booth', 'showcase', 'debut',
        'invite', 'delegation', 'client visit', 'customer visit', 'cooperation',
        'thailand', 'vietnam', 'korea', 'bangkok', '展会', '参展', '客户来访',
    ])) {
        return 'commerce';
    }

    if ($contains_any([
        'delivered', 'delivery', 'accepted', 'acceptance', 'commissioned', 'installed',
        'launched', 'shipped', 'completed', 'production line', 'put into operation',
        '交付', '验收', '投产', '发货', '落地', '项目',
    ])) {
        return 'project';
    }

    if ($contains_any([
        'solution', 'system integration', 'automation system', 'welding line',
        'positioner', 'palletizing', 'sorting', 'spraying', 'cutting', 'cleaning',
        'application', '解决方案', '系统集成', '自动化', '焊接线', '码垛', '喷涂',
    ])) {
        return 'solution';
    }

    return 'industry';
};

$news_items = function_exists('chenxuan_news_items') ? chenxuan_news_items() : [];
$legacy_news = new WP_Query([
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 80,
    'orderby' => 'date',
    'order' => 'DESC',
    'meta_key' => '_legacy_source_url',
]);

if ($legacy_news->have_posts()) {
    $news_items = [];

    while ($legacy_news->have_posts()) {
        $legacy_news->the_post();

        $post_id = get_the_ID();
        $excerpt = get_the_excerpt($post_id);
        $content = get_the_content(null, false, $post_id);
        if (!$excerpt) {
            $excerpt = wp_trim_words(wp_strip_all_tags($content), 38, '...');
        }

        $legacy_image = get_the_post_thumbnail_url($post_id, 'large');
        if (!$legacy_image) {
            $legacy_image = get_post_meta($post_id, '_legacy_featured_image', true);
        }

        $title = get_the_title($post_id);
        $filter = $classify_news($title, $excerpt, $content);
        $news_items[] = [
            'title' => $cx_auto($title),
            'excerpt' => $cx_auto($excerpt),
            'date' => get_the_date('Y.m.d', $post_id),
            'category' => $filter_labels[$filter],
            'filter' => $filter,
            'image' => $legacy_image,
            'url' => get_permalink($post_id),
        ];
    }
    wp_reset_postdata();
} else {
    foreach ($news_items as &$news_item) {
        $news_item['filter'] = $classify_news(
            $news_item['title'] ?? '',
            $news_item['excerpt'] ?? ''
        );
        $news_item['category'] = $filter_labels[$news_item['filter']];
    }
    unset($news_item);
}

$news_link_attrs = static function ($url) {
    $url_host = wp_parse_url((string) $url, PHP_URL_HOST);
    $home_host = wp_parse_url(home_url(), PHP_URL_HOST);

    return ($url_host && $home_host && strcasecmp($url_host, $home_host) !== 0)
        ? ' target="_blank" rel="noopener"'
        : '';
};

$news_search_text = static function ($item) {
    return strtolower(wp_strip_all_tags(
        ($item['title'] ?? '') . ' ' .
        ($item['excerpt'] ?? '') . ' ' .
        ($item['category'] ?? '')
    ));
};
?>

<main class="news-center-page" id="site-content">
    <section class="news-center-intro">
        <div class="container">
            <header class="news-center-heading" data-aos="fade-up">
                <span class="section-label"><?php echo esc_html($cx_text('新闻', 'News')); ?></span>
                <h1><?php echo esc_html($cx_text('新闻中心', 'News Center')); ?></h1>
            </header>

            <?php if (!empty($news_items)) : $featured = $news_items[0]; ?>
            <?php $featured_url = $featured['url'] ?? home_url('/news'); ?>
            <article
                class="news-feature-story"
                data-news-filter="<?php echo esc_attr($featured['filter']); ?>"
                data-news-search="<?php echo esc_attr($news_search_text($featured)); ?>"
                data-aos="fade-up"
                data-aos-delay="80"
            >
                <div class="news-feature-copy">
                    <span class="news-feature-date"><?php echo esc_html($featured['date']); ?></span>
                    <span class="news-category-tag"><?php echo esc_html($featured['category']); ?></span>
                    <h2><a href="<?php echo esc_url($featured_url); ?>"<?php echo $news_link_attrs($featured_url); ?>><?php echo esc_html($featured['title']); ?></a></h2>
                    <p><?php echo esc_html($featured['excerpt']); ?></p>
                    <a href="<?php echo esc_url($featured_url); ?>" class="news-feature-link"<?php echo $news_link_attrs($featured_url); ?>>
                        <?php echo esc_html($cx_text('探索详情', 'Explore More')); ?>
                        <?php echo jaka_svg_icon('arrow-right'); ?>
                    </a>
                </div>
                <div class="news-feature-media" aria-hidden="true">
                    <?php if (!empty($featured['image'])) : ?>
                    <img src="<?php echo esc_url($featured['image']); ?>" alt="" loading="eager">
                    <?php endif; ?>
                    <span>CHENXUAN</span>
                </div>
            </article>
            <?php endif; ?>

            <div class="news-toolbar" data-aos="fade-up" data-aos-delay="120">
                <div class="news-filter" role="tablist" aria-label="<?php echo esc_attr($cx_text('新闻分类', 'News categories')); ?>">
                    <?php foreach ($filter_labels as $filter_key => $filter_label) : ?>
                    <button class="filter-btn <?php echo $filter_key === 'all' ? 'active' : ''; ?>" type="button" data-filter="<?php echo esc_attr($filter_key); ?>" role="tab" aria-selected="<?php echo $filter_key === 'all' ? 'true' : 'false'; ?>">
                        <?php echo esc_html($filter_label); ?>
                    </button>
                    <?php endforeach; ?>
                </div>
                <label class="news-search" for="news-search-input">
                    <?php echo jaka_svg_icon('search'); ?>
                    <input id="news-search-input" type="search" placeholder="<?php echo esc_attr($cx_text('搜索新闻', 'Search news')); ?>" autocomplete="off">
                </label>
            </div>
        </div>
    </section>

    <section class="news-center-results">
        <div class="container">
            <div class="news-editorial-grid" id="news-grid">
                <?php foreach (array_slice($news_items, 1) as $i => $item) : ?>
                <?php $item_url = $item['url'] ?? home_url('/news'); ?>
                <article
                    class="news-editorial-card"
                    data-news-filter="<?php echo esc_attr($item['filter']); ?>"
                    data-news-search="<?php echo esc_attr($news_search_text($item)); ?>"
                    data-aos="fade-up"
                    data-aos-delay="<?php echo esc_attr(($i % 2 + 1) * 70); ?>"
                >
                    <a class="news-editorial-image" href="<?php echo esc_url($item_url); ?>"<?php echo $news_link_attrs($item_url); ?>>
                        <?php if (!empty($item['image'])) : ?>
                        <img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['title']); ?>" loading="lazy">
                        <?php else : ?>
                        <span class="news-placeholder-img"></span>
                        <?php endif; ?>
                    </a>
                    <div class="news-editorial-body">
                        <span class="news-feature-date"><?php echo esc_html($item['date']); ?></span>
                        <h2><a href="<?php echo esc_url($item_url); ?>"<?php echo $news_link_attrs($item_url); ?>><?php echo esc_html($item['title']); ?></a></h2>
                        <div class="news-editorial-footer">
                            <span class="news-category-tag"><?php echo esc_html($item['category']); ?></span>
                            <a href="<?php echo esc_url($item_url); ?>" class="news-readmore"<?php echo $news_link_attrs($item_url); ?>>
                                <?php echo esc_html($cx_text('探索详情', 'Explore More')); ?>
                                <?php echo jaka_svg_icon('arrow-right'); ?>
                            </a>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            <p class="news-empty-state" hidden><?php echo esc_html($cx_text('没有找到符合条件的新闻。', 'No matching news found.')); ?></p>
        </div>
    </section>
</main>

<?php get_footer(); ?>
