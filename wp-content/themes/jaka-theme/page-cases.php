<?php
/**
 * Template Name: 案例中心
 */
get_header();

$industries = function_exists('chenxuan_case_industries') ? chenxuan_case_industries() : [];
$case_fields = $industries;
$applications = function_exists('chenxuan_case_applications') ? chenxuan_case_applications() : [];
$cases = function_exists('chenxuan_case_items') ? chenxuan_case_items() : [];
$allowed_case_industries = array_flip($industries);
$cases = array_values(array_filter($cases, static function($case) {
    return ($case['slug'] ?? '') !== 'agricultural-frame-welding-repeat';
}));
$cases = array_values(array_filter($cases, static function($case) use ($allowed_case_industries) {
    return isset($allowed_case_industries[$case['industry'] ?? '']);
}));
$active_slug = isset($_GET['case']) ? sanitize_title(wp_unslash($_GET['case'])) : '';
$active_case = null;

foreach ($cases as $case) {
    if ($case['slug'] === $active_slug) {
        $active_case = $case;
        break;
    }
}

$fallback_hero = function_exists('chenxuan_home_asset_url')
    ? chenxuan_home_asset_url('fit/industries/automotive-parts.jpg')
    : trailingslashit(JAKA_URI) . 'assets/images/service-support/projects/project-automation-line.jpg';
$case_center_banner = add_query_arg(
    'v',
    JAKA_VERSION,
    trailingslashit(JAKA_URI) . 'assets/images/service-support/banner/case-center-banner-1920x850.png'
);
$case_hero_image = $active_case && !empty($active_case['media']['poster'])
    ? $active_case['media']['poster']
    : ($active_case ? $fallback_hero : $case_center_banner);

$pattern_url = function_exists('chenxuan_home_asset_url') ? chenxuan_home_asset_url('pattern/impgbg.png') : '';
$cx = static function($zh, $en) {
    return function_exists('chenxuan_lx') ? chenxuan_lx($zh, $en) : $zh;
};
?>

<div class="case-page-shell" style="<?php echo $pattern_url ? '--case-pattern:url(' . esc_url($pattern_url) . ');' : ''; ?>">
    <section class="case-hero-official<?php echo $active_case ? ' is-detail' : ' is-list'; ?>">
        <div class="case-hero-bg">
            <img src="<?php echo esc_url($case_hero_image); ?>" alt="<?php echo esc_attr($active_case ? $active_case['title'] : jaka_t('pg_cases_title')); ?>" fetchpriority="high">
        </div>
        <div class="case-hero-overlay"></div>
        <div class="container">
            <div class="case-hero-content">
                <span class="section-label"><?php echo esc_html(jaka_t('pg_cases_title')); ?></span>
                <h1><?php echo esc_html($active_case ? $active_case['title'] : jaka_t('pg_cases_title')); ?></h1>
                <p><?php echo esc_html($active_case ? $active_case['industry'] . ' · ' . $active_case['application'] : jaka_t('pg_cases_desc')); ?></p>
            </div>
        </div>
    </section>

    <?php if ($active_case) : ?>
    <section class="case-detail-section">
        <div class="container">
            <a href="<?php echo esc_url(home_url('/cases')); ?>" class="btn btn-outline case-back-link">
                <?php echo esc_html(jaka_t('view_all')); ?>
            </a>
            <div class="case-detail-layout">
                <article class="case-detail-card">
                    <div class="case-detail-tags">
                        <span><?php echo esc_html($active_case['industry']); ?></span>
                        <span><?php echo esc_html($active_case['application']); ?></span>
                    </div>
                    <h2><?php echo esc_html($active_case['title']); ?></h2>
                    <div class="case-detail-body">
                        <?php foreach (($active_case['body'] ?? [$active_case['desc']]) as $paragraph) : ?>
                        <p><?php echo esc_html($paragraph); ?></p>
                        <?php endforeach; ?>
                    </div>
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">
                        <?php echo esc_html(jaka_t('btn_consult')); ?> <?php echo jaka_svg_icon('arrow-right'); ?>
                    </a>
                </article>
                <aside>
                    <?php $active_media = $active_case['media'] ?? ['status' => 'missing']; ?>
                    <div class="case-detail-media">
                        <?php if (!empty($active_media['video'])) : ?>
                        <video controls preload="metadata" playsinline poster="<?php echo esc_url($active_media['poster'] ?? ''); ?>">
                            <source src="<?php echo esc_url($active_media['video']); ?>" type="video/mp4">
                        </video>
                        <?php elseif (!empty($active_media['poster'])) : ?>
                        <img src="<?php echo esc_url($active_media['poster']); ?>" alt="<?php echo esc_attr($active_case['title']); ?>" loading="lazy">
                        <span class="case-media-type"><?php echo esc_html($cx('图片案例', 'Image Case')); ?></span>
                        <?php else : ?>
                        <div class="case-detail-placeholder"><?php echo esc_html(chenxuan_short_name()); ?></div>
                        <span class="case-media-type"><?php echo esc_html($cx('素材待补充', 'Media Pending')); ?></span>
                        <?php endif; ?>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <?php else : ?>
    <section class="case-filter-section">
        <div class="container">
            <div class="case-intro-block" data-aos="fade-up">
                <span class="section-label"><?php echo esc_html(jaka_t('pg_cases_title')); ?></span>
                <h1><?php echo esc_html(jaka_t('pg_cases_title')); ?></h1>
                <p><?php echo esc_html(jaka_t('pg_cases_desc')); ?></p>
            </div>
            <div class="case-filter-layout" data-aos="fade-up">
                <div class="case-brand-name"><?php echo esc_html(chenxuan_short_name()); ?></div>
                <div class="case-filter-panel">
                    <div class="case-filter-group">
                        <strong><?php echo esc_html($cx('行业', 'Industry')); ?></strong>
                        <div class="case-filter-row">
                            <button class="case-chip active" data-case-filter-type="industry" data-case-filter="all"><?php echo esc_html($cx('全部', 'All')); ?></button>
                            <?php foreach ($case_fields as $field) : ?>
                            <button class="case-chip" data-case-filter-type="industry" data-case-filter="<?php echo esc_attr($field); ?>"><?php echo esc_html($field); ?></button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="case-filter-group">
                        <strong><?php echo esc_html($cx('应用', 'Application')); ?></strong>
                        <div class="case-filter-row">
                            <button class="case-chip active" data-case-filter-type="application" data-case-filter="all"><?php echo esc_html($cx('全部', 'All')); ?></button>
                            <?php foreach ($applications as $application) : ?>
                            <button class="case-chip" data-case-filter-type="application" data-case-filter="<?php echo esc_attr($application); ?>"><?php echo esc_html($application); ?></button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="case-results-section">
        <div class="container">
            <div class="case-results-head" data-aos="fade-up">
                <h2><?php echo esc_html($cx('筛选', 'Filter')); ?></h2>
            </div>
            <div class="case-grid">
                <?php foreach ($cases as $i => $case) : ?>
                <?php $card_media = $case['media'] ?? ['status' => 'missing']; ?>
                <a class="case-card" href="<?php echo esc_url(add_query_arg('case', $case['slug'], home_url('/cases'))); ?>" data-case-industry="<?php echo esc_attr($case['industry']); ?>" data-case-application="<?php echo esc_attr($case['application']); ?>" data-aos="fade-up" data-aos-delay="<?php echo esc_attr(($i % 3) * 70); ?>">
                    <div class="case-card-media">
                        <?php if (!empty($card_media['poster'])) : ?>
                        <img src="<?php echo esc_url($card_media['poster']); ?>" alt="<?php echo esc_attr($case['title']); ?>" loading="lazy">
                        <?php else : ?>
                        <div class="case-card-placeholder"><?php echo esc_html(chenxuan_short_name()); ?></div>
                        <?php endif; ?>
                        <span class="case-card-tag"><?php echo esc_html($case['industry']); ?></span>
                    </div>
                    <div class="case-card-body">
                        <span><?php echo esc_html($case['application']); ?></span>
                        <h3><?php echo esc_html($case['title']); ?></h3>
                        <p><?php echo esc_html(wp_trim_words($case['desc'], 34)); ?></p>
                        <em><?php echo esc_html(jaka_t('btn_view_detail')); ?> <?php echo jaka_svg_icon('arrow-right'); ?></em>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
            <div class="case-empty"><?php echo esc_html(jaka_t('search_no_results')); ?></div>
        </div>
    </section>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
