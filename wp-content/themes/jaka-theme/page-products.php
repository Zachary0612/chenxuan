<?php
/**
 * Template Name: 产品中心
 */
get_header();

$product_tree = function_exists('chenxuan_product_tree') ? chenxuan_product_tree() : [];
$product_cards = function_exists('chenxuan_product_cards') ? chenxuan_product_cards() : [];
$legacy_category_order = [
    'Positioner and Linear Track',
    'Collaborative Robot',
    'Welding Robot',
    'Bending Robots',
    'Handling,Palletizing',
    'Loading/Unloading Robot',
    'Painting Robots',
    'Cutting Robot',
    'Engraving Robots',
    'Machine Tool Equipment',
    'Al Service Robots',
    'Parallel Robots',
];

$legacy_products = new WP_Query([
    'post_type' => 'jaka_product',
    'post_status' => 'publish',
    'posts_per_page' => 240,
    'orderby' => 'ID',
    'order' => 'ASC',
    'meta_key' => '_legacy_source_url',
]);

if ($legacy_products->have_posts()) {
    $product_cards = [];
    $product_tree_map = [];

    while ($legacy_products->have_posts()) {
        $legacy_products->the_post();

        $post_id = get_the_ID();
        $terms = get_the_terms($post_id, 'product_category');
        $term_name = (!is_wp_error($terms) && !empty($terms)) ? $terms[0]->name : chenxuan_l('导入产品');
        $excerpt = get_the_excerpt($post_id);
        if (!$excerpt) {
            $excerpt = wp_trim_words(wp_strip_all_tags(get_the_content(null, false, $post_id)), 34, '...');
        }

        $legacy_image = get_the_post_thumbnail_url($post_id, 'medium_large');
        if (!$legacy_image) {
            $legacy_image = get_post_meta($post_id, '_legacy_listing_image', true);
        }
        if (!$legacy_image) {
            $legacy_image = get_post_meta($post_id, '_legacy_featured_image', true);
        }

        $product_tree_map[$term_name] = true;
        $product_cards[] = [
            'name' => get_the_title($post_id),
            'desc' => $excerpt,
            'image' => $legacy_image,
            'series' => 'legacy-product-' . $post_id,
            'family' => sanitize_title($term_name),
            'url' => get_permalink($post_id),
        ];
    }
    wp_reset_postdata();

    $ordered_terms = [];
    foreach ($legacy_category_order as $term_name) {
        if (isset($product_tree_map[$term_name])) {
            $ordered_terms[] = $term_name;
            unset($product_tree_map[$term_name]);
        }
    }
    foreach (array_keys($product_tree_map) as $term_name) {
        $ordered_terms[] = $term_name;
    }

    $product_tree = [];
    foreach ($ordered_terms as $term_name) {
        $product_tree[] = [
            'name' => $term_name,
            'groups' => [],
        ];
    }
}

$available_families = [];
foreach ($product_tree as $category) {
    $available_families[] = sanitize_title($category['name']);
}

$selected_family = isset($_GET['product_category'])
    ? sanitize_title(wp_unslash($_GET['product_category']))
    : '';
if (!$selected_family || !in_array($selected_family, $available_families, true)) {
    $selected_family = $available_families[0] ?? 'all';
}
?>

<div class="pls-page">
    <aside class="pls-sidebar" id="pls-sidebar">
        <div class="pls-sidebar-inner">
            <?php foreach ($product_tree as $cat) : ?>
            <?php
            $category_family = sanitize_title($cat['name']);
            $category_active = $category_family === $selected_family;
            $category_url = add_query_arg('product_category', $category_family, home_url('/products/')) . '#products-list';
            ?>
            <div class="pls-first-box<?php echo $category_active ? ' active' : ''; ?>">
                <a href="<?php echo esc_url($category_url); ?>" class="pls-first<?php echo $category_active ? ' act' : ''; ?>" data-product-filter="<?php echo esc_attr($category_family); ?>" aria-current="<?php echo $category_active ? 'true' : 'false'; ?>">
                    <span class="pls-tit"><?php echo esc_html($cat['name']); ?></span>
                </a>
                <?php if (!empty($cat['groups'])) : ?>
                    <?php foreach ($cat['groups'] as $group) : ?>
                    <div class="pls-second">
                        <span class="pls-tit pls-group-title"><?php echo esc_html($group['title']); ?></span>
                    </div>
                    <?php foreach ($group['series'] as $series) : ?>
                    <div class="pls-third-item">
                        <i class="pls-expand-icon"></i>
                        <span class="pls-tit"><?php echo esc_html($series['name']); ?></span>
                    </div>
                    <div class="pls-four-list">
                        <?php foreach ($series['models'] as $model) : ?>
                        <a href="#products-list" class="pls-four-item">
                            <span class="pls-tit"><?php echo esc_html($model); ?></span>
                        </a>
                        <?php endforeach; ?>
                    </div>
                    <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </aside>

    <div class="pls-content">
        <div class="pls-banner">
            <div class="pls-banner-inner">
                <h1 class="pls-banner-title"><?php echo esc_html(jaka_t('pg_products_title')); ?></h1>
                <p class="pls-banner-desc"><?php echo esc_html(jaka_t('products_desc')); ?></p>
            </div>
        </div>

        <div class="pls-results-meta" id="products-list" data-initial-product-filter="<?php echo esc_attr($selected_family); ?>">
            <h2 id="pls-results-title">
                <?php
                foreach ($product_tree as $category) {
                    if (sanitize_title($category['name']) === $selected_family) {
                        echo esc_html($category['name']);
                        break;
                    }
                }
                ?>
            </h2>
            <span id="pls-results-count"></span>
        </div>

        <div class="pls-grid" aria-live="polite">
            <?php foreach ($product_cards as $i => $product) : ?>
            <?php $product_url = !empty($product['url']) ? $product['url'] : home_url('/contact'); ?>
            <a href="<?php echo esc_url($product_url); ?>" id="<?php echo esc_attr(sanitize_title($product['series'])); ?>" class="pls-product-box" data-product-family="<?php echo esc_attr($product['family'] ?? 'industrial'); ?>" data-product-name="<?php echo esc_attr($product['name']); ?>" data-aos="fade-up" data-aos-delay="<?php echo esc_attr(min($i * 50, 400)); ?>">
                <?php if (!empty($product['tag'])) : ?>
                <span class="pls-product-tag pls-tag-<?php echo esc_attr(strtolower($product['tag'])); ?>"><?php echo esc_html($product['tag']); ?></span>
                <?php endif; ?>
                <div class="pls-product-img">
                    <?php if (!empty($product['image'])) : ?>
                    <img src="<?php echo esc_url($product['image']); ?>" alt="<?php echo esc_attr($product['name']); ?>" loading="lazy">
                    <?php else : ?>
                    <div class="robot-silhouette"></div>
                    <?php endif; ?>
                </div>
                <div class="pls-product-name"><?php echo esc_html($product['name']); ?></div>
                <p class="pls-product-desc"><?php echo esc_html($product['desc']); ?></p>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
