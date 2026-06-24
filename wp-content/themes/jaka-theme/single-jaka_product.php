<?php
get_header();

$cx_text = static function($zh, $en = '') {
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

$cx_legacy = static function ($text, $context = '') use ($cx_auto) {
    $text = trim((string) $text);
    if ($text === '') {
        return '';
    }

    return function_exists('chenxuan_legacy_localize') ? chenxuan_legacy_localize($text, $context) : $cx_auto($text);
};

$post_id = get_the_ID();
$terms = get_the_terms($post_id, 'product_category');
$category_name = (!is_wp_error($terms) && !empty($terms)) ? $terms[0]->name : $cx_text('产品中心', 'Products');
$category_name = $cx_auto($category_name);
$raw_category_name = (!is_wp_error($terms) && !empty($terms)) ? $terms[0]->name : 'Products';
$raw_product_title = get_the_title($post_id);
$raw_excerpt = get_the_excerpt($post_id);
if (!$raw_excerpt) {
    $raw_excerpt = wp_trim_words(wp_strip_all_tags(get_the_content(null, false, $post_id)), 38, '...');
}
$mapped_series = function_exists('chenxuan_legacy_product_category_series') ? chenxuan_legacy_product_category_series($raw_category_name, $raw_product_title, $raw_excerpt) : 'welding';
$legacy_context = trim($mapped_series . ' ' . $raw_category_name);
$is_legacy_product = (bool) get_post_meta($post_id, '_legacy_source_url', true);
$category_name = $cx_legacy($raw_category_name, $legacy_context . ' category');
$product_title = $cx_legacy($raw_product_title, $legacy_context . ' title');
$featured_image = get_the_post_thumbnail_url($post_id, 'large');
if (!$featured_image) {
    $featured_image = get_post_meta($post_id, '_legacy_featured_image', true);
}
if (!$featured_image) {
    $featured_image = get_post_meta($post_id, '_legacy_listing_image', true);
}

$excerpt = $cx_legacy($raw_excerpt, $legacy_context . ' excerpt');

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
                <h1><?php echo esc_html($product_title); ?></h1>
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
                <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($product_title); ?>">
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
                    $localized_content = apply_filters('the_content', get_the_content());
                    if ($is_legacy_product) :
                        preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $localized_content, $legacy_image_matches);
                        $legacy_gallery_images = !empty($legacy_image_matches[1]) ? array_values(array_unique($legacy_image_matches[1])) : [];
                        if ($featured_image) {
                            array_unshift($legacy_gallery_images, $featured_image);
                            $legacy_gallery_images = array_values(array_unique($legacy_gallery_images));
                        }
                        $legacy_gallery_images = array_slice(array_filter($legacy_gallery_images), 0, 8);
                        ?>
                        <div class="product-detail-auto-layout">
                            <div class="product-detail-auto-intro">
                                <span><?php echo esc_html($category_name); ?></span>
                                <h3><?php echo esc_html($product_title); ?></h3>
                                <p><?php echo esc_html($excerpt); ?></p>
                            </div>
                            <div class="product-detail-feature-grid">
                                <div class="product-detail-feature-card">
                                    <strong><?php echo esc_html($cx_text('工艺适配', 'Process Fit')); ?></strong>
                                    <p><?php echo esc_html($cx_text('围绕焊接、搬运、切割、喷涂等生产场景，匹配机器人本体、变位机、导轨与控制系统。', 'Match robot bodies, positioners, rails and controls for welding, handling, cutting and spraying scenarios.')); ?></p>
                                </div>
                                <div class="product-detail-feature-card">
                                    <strong><?php echo esc_html($cx_text('系统集成', 'System Integration')); ?></strong>
                                    <p><?php echo esc_html($cx_text('根据工件尺寸、节拍和现场布局完成夹具、工位、安全防护和产线联调。', 'Build fixtures, stations, safety protection and line commissioning around workpiece size, takt and layout.')); ?></p>
                                </div>
                                <div class="product-detail-feature-card">
                                    <strong><?php echo esc_html($cx_text('交付支持', 'Delivery Support')); ?></strong>
                                    <p><?php echo esc_html($cx_text('提供方案评估、安装调试、操作培训与售后维护，帮助项目稳定落地。', 'Provide solution evaluation, installation, training and after-sales support for stable project delivery.')); ?></p>
                                </div>
                            </div>
                            <?php if (!empty($legacy_gallery_images)) : ?>
                            <div class="product-detail-gallery">
                                <?php foreach ($legacy_gallery_images as $gallery_image) : ?>
                                <figure>
                                    <img src="<?php echo esc_url($gallery_image); ?>" alt="<?php echo esc_attr($product_title); ?>" loading="lazy">
                                </figure>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php
                    else :
                        echo wp_kses_post(function_exists('chenxuan_localize_html') ? chenxuan_localize_html($localized_content) : $localized_content);
                    endif;
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
                $rel_terms = get_the_terms(get_the_ID(), 'product_category');
                $rel_term_name = (!is_wp_error($rel_terms) && !empty($rel_terms)) ? $rel_terms[0]->name : '';
                $rel_raw_title = get_the_title();
                $rel_excerpt = get_the_excerpt();
                if (!$rel_excerpt) {
                    $rel_excerpt = wp_trim_words(wp_strip_all_tags(get_the_content(null, false, get_the_ID())), 38, '...');
                }
                $rel_series = function_exists('chenxuan_legacy_product_category_series') ? chenxuan_legacy_product_category_series($rel_term_name, $rel_raw_title, $rel_excerpt) : 'welding';
                $rel_title = $cx_legacy($rel_raw_title, $rel_series . ' title');
                ?>
                <a class="product-detail-related-card" href="<?php the_permalink(); ?>">
                    <span class="product-detail-related-img">
                        <?php if ($rel_img) : ?>
                        <img src="<?php echo esc_url($rel_img); ?>" alt="<?php echo esc_attr($rel_title); ?>" loading="lazy">
                        <?php else : ?>
                        <span class="robot-silhouette"></span>
                        <?php endif; ?>
                    </span>
                    <strong><?php echo esc_html($rel_title); ?></strong>
                    <em><?php echo esc_html($cx_text('查看详情', 'View Details')); ?> <?php echo jaka_svg_icon('arrow-right'); ?></em>
                </a>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
