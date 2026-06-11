<?php
get_header();

$cx_text = static function($zh, $en = '') {
    if (function_exists('chenxuan_lx')) {
        return chenxuan_lx($zh, $en !== '' ? $en : $zh);
    }

    return $zh;
};

$post_id = get_the_ID();
$terms = get_the_terms($post_id, 'product_category');
$category_name = (!is_wp_error($terms) && !empty($terms)) ? $terms[0]->name : $cx_text('产品中心', 'Products');
$featured_image = get_the_post_thumbnail_url($post_id, 'large');
if (!$featured_image) {
    $featured_image = get_post_meta($post_id, '_legacy_featured_image', true);
}
if (!$featured_image) {
    $featured_image = get_post_meta($post_id, '_legacy_listing_image', true);
}

$excerpt = get_the_excerpt($post_id);
if (!$excerpt) {
    $excerpt = wp_trim_words(wp_strip_all_tags(get_the_content(null, false, $post_id)), 38, '...');
}

$related_args = [
    'post_type' => 'jaka_product',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'post__not_in' => [$post_id],
];

if (!is_wp_error($terms) && !empty($terms)) {
    $related_args['tax_query'] = [[
        'taxonomy' => 'product_category',
        'field' => 'term_id',
        'terms' => wp_list_pluck($terms, 'term_id'),
    ]];
}

$related = new WP_Query($related_args);
?>

<main class="product-detail-page">
    <section class="product-detail-hero">
        <div class="container product-detail-hero-inner">
            <div class="product-detail-hero-copy" data-aos="fade-right">
                <a class="product-detail-back" href="<?php echo esc_url(home_url('/products/')); ?>">
                    <?php echo jaka_svg_icon('arrow-left'); ?> <?php echo esc_html($cx_text('返回产品中心', 'Back to Products')); ?>
                </a>
                <span class="product-detail-category"><?php echo esc_html($category_name); ?></span>
                <h1><?php the_title(); ?></h1>
                <p><?php echo esc_html($excerpt); ?></p>
                <div class="product-detail-actions">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">
                        <?php echo esc_html($cx_text('在线咨询', 'Consult Now')); ?> <?php echo jaka_svg_icon('arrow-right'); ?>
                    </a>
                    <a href="#product-detail-content" class="btn btn-outline">
                        <?php echo esc_html($cx_text('查看详情', 'View Details')); ?>
                    </a>
                </div>
            </div>
            <div class="product-detail-hero-media" data-aos="fade-left">
                <?php if ($featured_image) : ?>
                <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                <?php else : ?>
                <div class="robot-silhouette"></div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="product-detail-content-section" id="product-detail-content">
        <div class="container">
            <div class="product-detail-section-title" data-aos="fade-up">
                <span><?php echo esc_html($cx_text('产品介绍', 'Product Detail')); ?></span>
                <h2><?php echo esc_html($cx_text('面向工业机器人与自动化集成场景的产品能力', 'Product capability for robotic automation scenarios')); ?></h2>
            </div>
            <article class="product-detail-body" data-aos="fade-up" data-aos-delay="80">
                <?php
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </article>
        </div>
    </section>

    <?php if ($related->have_posts()) : ?>
    <section class="product-detail-related">
        <div class="container">
            <div class="product-detail-section-title">
                <span><?php echo esc_html($cx_text('相关产品', 'Related Products')); ?></span>
                <h2><?php echo esc_html($cx_text('继续了解同类产品', 'Explore more products')); ?></h2>
            </div>
            <div class="product-detail-related-grid">
                <?php while ($related->have_posts()) : $related->the_post(); ?>
                <?php
                $rel_img = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                if (!$rel_img) {
                    $rel_img = get_post_meta(get_the_ID(), '_legacy_listing_image', true);
                }
                ?>
                <a class="product-detail-related-card" href="<?php the_permalink(); ?>">
                    <span class="product-detail-related-img">
                        <?php if ($rel_img) : ?>
                        <img src="<?php echo esc_url($rel_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" loading="lazy">
                        <?php else : ?>
                        <span class="robot-silhouette"></span>
                        <?php endif; ?>
                    </span>
                    <strong><?php the_title(); ?></strong>
                    <em><?php echo esc_html($cx_text('查看详情', 'View Details')); ?> <?php echo jaka_svg_icon('arrow-right'); ?></em>
                </a>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
