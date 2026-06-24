<?php
/**
 * Template Name: 产品中心
 */
get_header();

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

$cx_product_lang = function_exists('chenxuan_current_lang_code') ? chenxuan_current_lang_code() : 'zh';
$cx_product_title_limit = 15;
$cx_product_card_title = static function ($text) use ($cx_product_title_limit, $cx_product_lang) {
    $text = trim((string) $text);
    if ($text === '') {
        return '';
    }

    if (!in_array($cx_product_lang, ['zh', 'zh_tw'], true)) {
        return $text;
    }

    if (function_exists('mb_strlen') && function_exists('mb_substr')) {
        if (mb_strlen($text, 'UTF-8') <= $cx_product_title_limit) {
            return $text;
        }

        return mb_substr($text, 0, $cx_product_title_limit - 1, 'UTF-8') . '…';
    }

    if (strlen($text) <= $cx_product_title_limit) {
        return $text;
    }

    return substr($text, 0, max(0, $cx_product_title_limit - 3)) . '...';
};

$product_tree = function_exists('chenxuan_product_tree') ? chenxuan_product_tree() : [];
$product_cards = function_exists('chenxuan_product_cards') ? chenxuan_product_cards() : [];
$fallback_product_cards = $product_cards;
$industrial_family = 'industrial';
$collaborative_family = 'collaborative';
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
$series_to_family = [];
$product_filter_labels = [];
$product_filter_labels[$industrial_family] = $product_tree[0]['name'] ?? chenxuan_l('工业机器人产品系列');
$product_filter_labels[$collaborative_family] = $product_tree[1]['name'] ?? chenxuan_l('协作机器人产品系列');

$series_index = 0;
foreach ($product_tree as $category_index => $category) {
    $family_slug = $category_index === 1 ? $collaborative_family : $industrial_family;
    if (!empty($category['groups'])) {
        foreach ($category['groups'] as $group) {
            foreach (($group['series'] ?? []) as $series) {
                $series_slug = $product_series_slugs[$series_index] ?? sanitize_title($series['name']);
                $product_filter_labels[$series_slug] = $series['name'];
                $series_to_family[$series_slug] = $family_slug;
                $series_index++;
            }
        }
    }
}

$legacy_products = new WP_Query([
    'post_type' => 'jaka_product',
    'post_status' => 'publish',
    'posts_per_page' => 240,
    'orderby' => 'ID',
    'order' => 'ASC',
    'meta_key' => '_legacy_source_url',
]);

if ($legacy_products->have_posts()) {
    $legacy_series_counts = [];
    $product_cards = [];

    while ($legacy_products->have_posts()) {
        $legacy_products->the_post();

        $post_id = get_the_ID();
        $legacy_title = get_the_title($post_id);
        $terms = get_the_terms($post_id, 'product_category');
        $term_name = (!is_wp_error($terms) && !empty($terms)) ? $terms[0]->name : 'Imported Products';
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

        $mapped_series = function_exists('chenxuan_legacy_product_category_series') ? chenxuan_legacy_product_category_series($term_name, $legacy_title, $excerpt) : 'welding';
        $mapped_family = $series_to_family[$mapped_series] ?? $industrial_family;
        $legacy_series_counts[$mapped_series] = ($legacy_series_counts[$mapped_series] ?? 0) + 1;
        $product_cards[] = [
            'name' => $cx_legacy($legacy_title, $mapped_series . ' title'),
            'desc' => $cx_legacy($excerpt, $mapped_series . ' excerpt'),
            'image' => $legacy_image,
            'series' => 'legacy-product-' . $post_id,
            'filter_series' => $mapped_series,
            'family' => $mapped_family,
            'url' => get_permalink($post_id),
        ];
    }
    wp_reset_postdata();

    foreach ($fallback_product_cards as $fallback_card) {
        $fallback_series = $fallback_card['filter_series'] ?? ($fallback_card['series'] ?? '');
        if (!$fallback_series || in_array($fallback_series, [$industrial_family, $collaborative_family], true)) {
            continue;
        }
        if (!isset($series_to_family[$fallback_series]) || !empty($legacy_series_counts[$fallback_series])) {
            continue;
        }

        $fallback_card['filter_series'] = $fallback_series;
        $fallback_card['family'] = $fallback_card['family'] ?? $series_to_family[$fallback_series];
        if (empty($fallback_card['url'])) {
            $fallback_card['url'] = home_url('/contact');
        }

        $product_cards[] = $fallback_card;
        $legacy_series_counts[$fallback_series] = 1;
    }
}

$available_filters = array_keys($product_filter_labels);
$selected_filter = isset($_GET['product_category'])
    ? sanitize_title(wp_unslash($_GET['product_category']))
    : '';
if (!$selected_filter || !in_array($selected_filter, $available_filters, true)) {
    $selected_filter = $industrial_family;
}
?>

<div class="pls-page" data-product-lang="<?php echo esc_attr($cx_product_lang); ?>">
    <aside class="pls-sidebar" id="pls-sidebar">
        <div class="pls-sidebar-inner">
            <?php $sidebar_series_index = 0; ?>
            <?php foreach ($product_tree as $cat_index => $cat) : ?>
            <?php
            $category_family = $cat_index === 1 ? $collaborative_family : $industrial_family;
            $category_active = $category_family === $selected_filter;
            $category_url = add_query_arg('product_category', $category_family, home_url('/products/')) . '#products-list';
            ?>
            <div class="pls-first-box<?php echo $category_active ? ' active' : ''; ?>">
                <a href="<?php echo esc_url($category_url); ?>" class="pls-first<?php echo $category_active ? ' act' : ''; ?>" data-product-filter="<?php echo esc_attr($category_family); ?>" data-product-filter-mode="family" data-product-filter-label="<?php echo esc_attr($cat['name']); ?>" aria-current="<?php echo $category_active ? 'true' : 'false'; ?>">
                    <span class="pls-tit"><?php echo esc_html($cat['name']); ?></span>
                </a>
                <?php if (!empty($cat['groups'])) : ?>
                    <?php foreach ($cat['groups'] as $group) : ?>
                    <div class="pls-second">
                        <span class="pls-tit pls-group-title"><?php echo esc_html($group['title']); ?></span>
                    </div>
                    <?php foreach ($group['series'] as $series) : ?>
                    <?php
                    $series_slug = $product_series_slugs[$sidebar_series_index] ?? sanitize_title($series['name']);
                    $series_active = $series_slug === $selected_filter;
                    $series_url = add_query_arg('product_category', $series_slug, home_url('/products/')) . '#products-list';
                    $sidebar_series_index++;
                    ?>
                    <div class="pls-third-item<?php echo $series_active ? ' act expanded' : ''; ?>" data-product-filter="<?php echo esc_attr($series_slug); ?>" data-product-filter-mode="series" data-product-filter-label="<?php echo esc_attr($series['name']); ?>" role="button" tabindex="0" aria-current="<?php echo $series_active ? 'true' : 'false'; ?>" aria-expanded="<?php echo $series_active ? 'true' : 'false'; ?>">
                        <i class="pls-expand-icon"></i>
                        <span class="pls-tit"><?php echo esc_html($series['name']); ?></span>
                    </div>
                    <div class="pls-four-list"<?php echo $series_active ? ' style="display: block;"' : ' hidden'; ?>>
                        <?php foreach ($series['models'] as $model) : ?>
                        <a href="<?php echo esc_url($series_url); ?>" class="pls-four-item" data-product-filter="<?php echo esc_attr($series_slug); ?>" data-product-filter-mode="series" data-product-filter-label="<?php echo esc_attr($series['name']); ?>">
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

        <div class="pls-results-meta" id="products-list" data-initial-product-filter="<?php echo esc_attr($selected_filter); ?>">
            <h2 id="pls-results-title">
                <?php echo esc_html($product_filter_labels[$selected_filter] ?? jaka_t('pg_products_title')); ?>
            </h2>
            <span id="pls-results-count"></span>
        </div>

        <div class="pls-grid" aria-live="polite">
            <?php foreach ($product_cards as $i => $product) : ?>
            <?php $product_url = !empty($product['url']) ? $product['url'] : home_url('/contact'); ?>
            <?php $product_filter_series = $product['filter_series'] ?? ($product['series'] ?? ''); ?>
            <?php $product_name = $product['name'] ?? ''; ?>
            <?php $product_card_name = $cx_product_card_title($product_name); ?>
            <a href="<?php echo esc_url($product_url); ?>" id="<?php echo esc_attr(sanitize_title($product['series'])); ?>" class="pls-product-box" data-product-family="<?php echo esc_attr($product['family'] ?? $industrial_family); ?>" data-product-series="<?php echo esc_attr($product_filter_series); ?>" data-product-name="<?php echo esc_attr($product_name); ?>">
                <?php if (!empty($product['tag'])) : ?>
                <span class="pls-product-tag pls-tag-<?php echo esc_attr(strtolower($product['tag'])); ?>"><?php echo esc_html($product['tag']); ?></span>
                <?php endif; ?>
                <div class="pls-product-img">
                    <?php if (!empty($product['image'])) : ?>
                    <img src="<?php echo esc_url($product['image']); ?>" alt="<?php echo esc_attr($product_name); ?>" loading="lazy">
                    <?php else : ?>
                    <div class="robot-silhouette"></div>
                    <?php endif; ?>
                </div>
                <div class="pls-product-name" title="<?php echo esc_attr($product_name); ?>"><span class="pls-product-name-text"><?php echo esc_html($product_card_name); ?></span></div>
                <?php if (!empty($product['desc'])) : ?>
                <p class="pls-product-desc"><?php echo esc_html($product['desc']); ?></p>
                <?php endif; ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
