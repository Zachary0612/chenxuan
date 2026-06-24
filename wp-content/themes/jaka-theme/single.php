<?php
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
?>

<main class="news-detail-page" id="site-content">
    <?php while (have_posts()) : the_post(); ?>
    <header class="news-detail-header">
        <div class="container container-narrow">
            <nav class="news-detail-breadcrumb" aria-label="<?php echo esc_attr($cx_text('面包屑导航', 'Breadcrumb')); ?>">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($cx_text('首页', 'Home')); ?></a>
                <span>/</span>
                <a href="<?php echo esc_url(home_url('/news/')); ?>"><?php echo esc_html($cx_text('新闻中心', 'News Center')); ?></a>
            </nav>
            <span class="section-label"><?php echo esc_html($cx_text('新闻', 'News')); ?></span>
            <h1><?php echo esc_html($cx_auto(get_the_title())); ?></h1>
            <div class="news-detail-meta">
                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
                <span><?php echo esc_html(implode(' / ', array_map(static function ($category) use ($cx_auto) {
                    return $cx_auto($category->name);
                }, get_the_category()))); ?></span>
            </div>
        </div>
    </header>

    <section class="news-detail-section">
        <div class="container container-narrow">
            <article class="news-detail-article">
                <div class="news-detail-content">
                    <?php
                    $localized_content = apply_filters('the_content', get_the_content());
                    echo wp_kses_post(function_exists('chenxuan_localize_html') ? chenxuan_localize_html($localized_content) : $localized_content);
                    ?>
                </div>
            </article>

            <nav class="news-detail-pagination" aria-label="<?php echo esc_attr($cx_text('上一篇和下一篇', 'Previous and next article')); ?>">
                <div class="news-detail-prev">
                    <span><?php echo esc_html($cx_text('上一篇', 'Previous')); ?></span>
                    <?php
                    $prev_post = get_previous_post();
                    if ($prev_post) :
                    ?>
                    <a href="<?php echo esc_url(get_permalink($prev_post)); ?>"><?php echo esc_html($cx_auto(get_the_title($prev_post))); ?></a>
                    <?php endif; ?>
                </div>
                <a class="news-detail-back" href="<?php echo esc_url(home_url('/news/')); ?>"><?php echo esc_html($cx_text('返回新闻中心', 'Back to News')); ?></a>
                <div class="news-detail-next">
                    <span><?php echo esc_html($cx_text('下一篇', 'Next')); ?></span>
                    <?php
                    $next_post = get_next_post();
                    if ($next_post) :
                    ?>
                    <a href="<?php echo esc_url(get_permalink($next_post)); ?>"><?php echo esc_html($cx_auto(get_the_title($next_post))); ?></a>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
    </section>

    <?php
    $related = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post__not_in' => [get_the_ID()],
        'category__in' => wp_get_post_categories(get_the_ID()),
        'ignore_sticky_posts' => true,
    ]);
    ?>
    <?php if ($related->have_posts()) : ?>
    <section class="news-related-section">
        <div class="container">
            <div class="news-related-heading">
                <span class="section-label"><?php echo esc_html($cx_text('更多资讯', 'More News')); ?></span>
                <h2><?php echo esc_html($cx_text('相关新闻', 'Related News')); ?></h2>
            </div>
            <div class="news-related-grid">
                <?php while ($related->have_posts()) : $related->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="news-related-card">
                    <span class="news-related-image">
                        <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('news-thumb'); ?>
                        <?php else : ?>
                        <span class="news-placeholder-img"></span>
                        <?php endif; ?>
                    </span>
                    <span class="news-feature-date"><?php echo esc_html(get_the_date('Y.m.d')); ?></span>
                    <strong><?php echo esc_html($cx_auto(get_the_title())); ?></strong>
                </a>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); endif; ?>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
