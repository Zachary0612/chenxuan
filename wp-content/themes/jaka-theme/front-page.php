<?php
get_header();

$banner_slides = function_exists('chenxuan_banner_slides') ? chenxuan_banner_slides() : [];
$product_families = function_exists('chenxuan_product_families') ? chenxuan_product_families() : [];
$solutions = function_exists('chenxuan_solutions') ? chenxuan_solutions() : [];
$solution_media_map = function_exists('chenxuan_solution_media_map') ? chenxuan_solution_media_map() : [];
$services = function_exists('chenxuan_services') ? chenxuan_services() : [];
$news_items = function_exists('chenxuan_news_items') ? chenxuan_news_items() : [];
$pattern_url = function_exists('chenxuan_home_asset_url') ? chenxuan_home_asset_url('pattern/impgbg.png') : '';
$gradients = [
    'linear-gradient(135deg, #10233f 0%, #0f766e 55%, #16325c 100%)',
    'linear-gradient(135deg, #111827 0%, #1d4ed8 52%, #0f766e 100%)',
    'linear-gradient(135deg, #172554 0%, #334155 48%, #065f46 100%)',
    'linear-gradient(135deg, #0f172a 0%, #7f1d1d 45%, #0f766e 100%)',
];

$cx_zh = static function($escaped) {
    $decoded = json_decode('"' . $escaped . '"');
    return is_string($decoded) ? $decoded : $escaped;
};

$hero_title_parts = function($title) {
    $title = (string) $title;
    if (function_exists('mb_strpos') && function_exists('mb_substr') && preg_match('/\p{Han}/u', $title)) {
        $break_word = json_decode('"\u89e3\u51b3\u65b9\u6848"');
        $break_at = is_string($break_word) ? mb_strpos($title, $break_word, 0, 'UTF-8') : false;
        if ($break_at !== false && $break_at > 0) {
            return [
                mb_substr($title, 0, $break_at, 'UTF-8'),
                mb_substr($title, $break_at, null, 'UTF-8'),
            ];
        }
    }
    return [$title];
};

$link_attrs = static function($url) {
    $url = (string) $url;
    if ($url === '') {
        return '';
    }

    $url_host = wp_parse_url($url, PHP_URL_HOST);
    $home_host = wp_parse_url(home_url(), PHP_URL_HOST);

    return ($url_host && $home_host && strcasecmp($url_host, $home_host) !== 0)
        ? ' target="_blank" rel="noopener"'
        : '';
};
?>

<section class="hero-section" id="hero">
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            <?php foreach ($banner_slides as $idx => $slide) : ?>
            <div class="swiper-slide hero-slide<?php echo !empty($slide['artwork_only']) ? ' hero-slide-artwork' : ''; ?>">
                <?php if (!empty($slide['artwork_only'])) : ?>
                <div class="hero-slide-bg">
                    <img class="hero-artwork-img" src="<?php echo esc_url($slide['bg']); ?>" alt="<?php echo esc_attr($slide['title']); ?>">
                </div>
                <div class="screen-reader-text">
                    <h2><?php echo esc_html($slide['title']); ?></h2>
                    <p><?php echo esc_html($slide['desc']); ?></p>
                </div>
                <?php else : ?>
                <div class="hero-slide-bg" style="<?php echo !empty($slide['bg']) ? 'background-image:url(' . esc_url($slide['bg']) . ');' : 'background:' . esc_attr($gradients[$idx % count($gradients)]) . ';'; ?>"></div>
                <div class="hero-slide-overlay"></div>
                <div class="hero-slide-content">
                    <div class="hero-slide-text">
                        <h2>
                            <?php foreach ($hero_title_parts($slide['title']) as $title_part) : ?>
                            <span class="hero-title-part"><?php echo esc_html($title_part); ?></span>
                            <?php endforeach; ?>
                        </h2>
                        <p><?php echo esc_html($slide['desc']); ?></p>
                        <div class="hero-slide-actions">
                            <a href="<?php echo esc_url($slide['btn1_url']); ?>" class="btn btn-primary btn-lg">
                                <?php echo esc_html($slide['btn1']); ?> <?php echo jaka_svg_icon('arrow-right'); ?>
                            </a>
                            <a href="<?php echo esc_url($slide['btn2_url']); ?>" class="btn btn-outline-light btn-lg">
                                <?php echo esc_html($slide['btn2']); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<div class="home-restore-shell" style="<?php echo $pattern_url ? '--home-pattern:url(' . esc_url($pattern_url) . ');' : ''; ?>">
    <section class="products-section home-products-section" id="products">
        <div class="container">
            <div class="section-header home-section-header" data-aos="fade-up">
                <h2 class="section-title"><?php echo esc_html(chenxuan_lx($cx_zh('\u6ee1\u8db3\u4e0d\u540c\u5e94\u7528\u573a\u666f\u9700\u6c42'), 'Meeting Diverse Application Scenario Needs')); ?></h2>
                <p class="section-desc"><?php echo esc_html(chenxuan_lx($cx_zh('\u591a\u7c7b\u4ea7\u54c1\u7cbe\u51c6\u8986\u76d6\u5168\u884c\u4e1a'), 'Multiple product lines precisely cover every industry')); ?></p>
            </div>

            <div class="product-family-grid" data-aos="fade-up" data-aos-delay="200">
                <?php foreach ($product_families as $family) : ?>
                <a href="<?php echo esc_url(home_url('/products')); ?>" class="product-family-card">
                    <div class="product-family-text">
                        <h3 class="product-family-name"><?php echo esc_html($family['name']); ?></h3>
                        <?php
                        $family_desc = (string) $family['desc'];
                        $family_desc_html = esc_html($family_desc);
                        foreach ([$cx_zh('\u7684\u5de5\u4e1a\u751f\u4ea7\u73af\u5883'), $cx_zh('\u540c\u4e00\u5de5\u4f5c\u7a7a\u95f4\u5185')] as $mobile_break_text) {
                            if ($mobile_break_text !== '' && strpos($family_desc, $mobile_break_text) !== false) {
                                $family_desc_html = str_replace(esc_html($mobile_break_text), '<br class="home-mobile-break">' . esc_html($mobile_break_text), $family_desc_html);
                                break;
                            }
                        }
                        ?>
                        <p class="product-family-desc"><?php echo $family_desc_html; ?></p>
                        <div class="product-feature-list" aria-label="<?php echo esc_attr($family['name']); ?>">
                            <?php foreach ($family['features'] as $feature) : ?>
                            <span><?php echo esc_html($feature); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="product-family-img">
                        <?php if (!empty($family['image'])) : ?>
                        <img src="<?php echo esc_url($family['image']); ?>" alt="<?php echo esc_attr($family['name']); ?>" loading="lazy">
                        <?php else : ?>
                        <div class="product-family-placeholder" data-placeholder="<?php echo esc_attr($family['placeholder']); ?>"></div>
                        <?php endif; ?>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="solutions-section home-solutions-section" id="solutions">
        <div class="container">
            <div class="section-header home-section-header" data-aos="fade-up">
                <h2 class="section-title">
                    <span><?php echo esc_html(chenxuan_lx($cx_zh('\u57fa\u4e8e\u884c\u4e1a\u548c\u573a\u666f'), 'Innovative Solutions Based on Industry')); ?></span>
                    <span><?php echo esc_html(chenxuan_lx($cx_zh('Know-how\u7684\u521b\u65b0\u89e3\u51b3\u65b9\u6848'), 'and Scenario Know-how')); ?></span>
                </h2>
            </div>
        </div>

        <div class="solutions-carousel" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper solutions-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($solutions as $solution) : ?>
                    <?php $solution_media = $solution_media_map[$solution[2]] ?? ['status' => 'missing']; ?>
                    <div class="swiper-slide">
                        <a href="<?php echo esc_url(home_url('/solutions')); ?>" class="solution-card <?php echo !empty($solution_media['poster']) ? 'has-media' : ''; ?>" style="--card-accent: <?php echo esc_attr($solution[3]); ?>">
                            <div class="solution-card-bg">
                                <?php if (!empty($solution_media['poster'])) : ?>
                                <img class="solution-media-bg" src="<?php echo esc_url($solution_media['poster']); ?>" alt="<?php echo esc_attr($solution[0]); ?>" loading="lazy">
                                <div class="solution-card-gradient"></div>
                                <?php else : ?>
                                <div class="solution-card-gradient" style="background: linear-gradient(135deg, <?php echo esc_attr($solution[3]); ?>22, <?php echo esc_attr($solution[3]); ?>88)"></div>
                                <?php endif; ?>
                            </div>
                            <div class="solution-card-content">
                                <h3 class="solution-title"><?php echo esc_html($solution[0]); ?></h3>
                                <div class="solution-solid"></div>
                                <p class="solution-desc"><?php echo esc_html($solution[1]); ?></p>
                                <span class="solution-link">
                                    <?php echo esc_html(jaka_t('explore_more')); ?> <?php echo jaka_svg_icon('arrow-right'); ?>
                                </span>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination solutions-pagination"></div>
            </div>
            <div class="swiper-nav">
                <button class="swiper-btn-prev solutions-prev" aria-label="Previous">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
                <button class="swiper-btn-next solutions-next" aria-label="Next">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
            </div>
        </div>
    </section>

    <section class="service-section home-service-section" id="service">
        <div class="container">
            <div class="section-header home-section-header" data-aos="fade-up">
                <h2 class="section-title"><?php echo esc_html(chenxuan_lx($cx_zh('\u670d\u52a1\u4e0e\u652f\u6301\u59cb\u7ec8\u5728\u60a8\u8eab\u8fb9'), 'Service and Support Are Always by Your Side')); ?></h2>
                <p class="section-desc"><?php echo esc_html(chenxuan_lx($cx_zh('\u4ee5\u5ba2\u6237\u4e3a\u4e2d\u5fc3\u7684\u670d\u52a1\u4f53\u7cfb'), 'A customer-centered service system')); ?></p>
            </div>

            <div class="service-grid">
                <?php foreach ($services as $idx => $service) : ?>
                <a href="<?php echo esc_url(home_url('/service')); ?>" class="service-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr(($idx + 1) * 100); ?>">
                    <?php
                    $service_gradient = 'linear-gradient(180deg, rgba(255,255,255,0.90) 0%, rgba(255,255,255,0.66) 30%, rgba(255,255,255,0.18) 58%, rgba(255,255,255,0.02) 100%)';
                    $service_bg = !empty($service['image'])
                        ? 'background-image:' . $service_gradient . ', url(' . esc_url($service['image']) . ');'
                        : 'background:' . ($idx % 2 === 0 ? 'linear-gradient(135deg, #0f766e, #2563eb)' : 'linear-gradient(135deg, #111827, #334155)') . ';';
                    ?>
                    <div class="service-card-bg" style="<?php echo esc_attr($service_bg); ?>"></div>
                    <div class="service-card-content">
                        <div class="service-badge"><?php echo esc_html($service['badge']); ?></div>
                        <h3><?php echo esc_html($service['title']); ?></h3>
                        <p><?php echo esc_html($service['desc']); ?></p>
                        <span class="service-link">
                            <?php echo esc_html(jaka_t('explore_more')); ?> <?php echo jaka_svg_icon('arrow-right'); ?>
                        </span>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="news-section home-news-section" id="news">
        <div class="container">
            <div class="section-header home-section-header" data-aos="fade-up">
                <h2 class="section-title"><?php echo esc_html(jaka_t('section_news')); ?></h2>
                <p class="section-desc"><?php echo esc_html(jaka_t('news_desc')); ?></p>
                <div class="section-header-action">
                    <a href="<?php echo esc_url(home_url('/news')); ?>" class="btn btn-outline">
                        <?php echo esc_html(jaka_t('view_all')); ?> <?php echo jaka_svg_icon('arrow-right'); ?>
                    </a>
                </div>
            </div>

            <div class="news-featured-grid" data-aos="fade-up" data-aos-delay="100">
                <?php foreach (array_slice($news_items, 0, 2) as $item) : ?>
                <?php $item_url = $item['url'] ?? home_url('/news'); ?>
                <a href="<?php echo esc_url($item_url); ?>" class="news-card news-card-featured"<?php echo $link_attrs($item_url); ?>>
                    <div class="news-card-img">
                        <?php if (!empty($item['image'])) : ?>
                        <img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['title']); ?>" loading="lazy">
                        <?php else : ?>
                        <div class="news-placeholder-img"></div>
                        <?php endif; ?>
                        <span class="news-tag"><?php echo esc_html($item['category']); ?></span>
                    </div>
                    <div class="news-card-body">
                        <h3 class="news-card-title"><?php echo esc_html($item['title']); ?></h3>
                        <p class="news-card-excerpt"><?php echo esc_html($item['excerpt']); ?></p>
                        <div class="news-card-meta">
                            <span class="news-date"><?php echo esc_html($item['date']); ?></span>
                            <span class="news-readmore">
                                <?php echo esc_html(jaka_t('news_read')); ?> <?php echo jaka_svg_icon('arrow-right'); ?>
                            </span>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>

            <div class="news-list-grid" data-aos="fade-up" data-aos-delay="200">
                <?php foreach (array_slice($news_items, 2) as $item) : ?>
                <?php $item_url = $item['url'] ?? home_url('/news'); ?>
                <a href="<?php echo esc_url($item_url); ?>" class="news-list-item"<?php echo $link_attrs($item_url); ?>>
                    <div class="news-list-content">
                        <h4><?php echo esc_html($item['title']); ?></h4>
                        <span class="news-date"><?php echo esc_html($item['date']); ?></span>
                    </div>
                    <span class="news-list-arrow"><?php echo jaka_svg_icon('arrow-right'); ?></span>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
