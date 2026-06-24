<?php
/**
 * Template Name: 解决方案
 */
get_header();

$solutions = function_exists('chenxuan_solutions') ? chenxuan_solutions() : [];
$applications = function_exists('chenxuan_applications') ? chenxuan_applications() : [];
$case_applications = function_exists('chenxuan_case_applications') ? chenxuan_case_applications() : array_slice($applications, 0, 8);
$cases = function_exists('chenxuan_case_items') ? chenxuan_case_items() : [];
$solution_media_map = function_exists('chenxuan_solution_media_map') ? chenxuan_solution_media_map() : [];
$workstation_media_map = function_exists('chenxuan_workstation_media_map') ? chenxuan_workstation_media_map() : [];
$solution_primary_case_slugs = function_exists('chenxuan_solution_primary_case_slugs') ? chenxuan_solution_primary_case_slugs() : [];
$pattern_url = function_exists('chenxuan_home_asset_url') ? chenxuan_home_asset_url('pattern/impgbg.png') : '';
$solution_case_industry_map = [
    'engineering-machinery' => '工程机械',
    'automotive-parts' => '汽车及零部件',
    'metal-fabrication' => '金属加工',
    'ship-steel-structure' => '船舶和钢结构行业',
    'environmental-cleaning' => '环保清洁行业',
];

$solution_by_slug = [];
foreach ($solutions as $solution) {
    $solution_by_slug[$solution[2]] = $solution;
}

$requested_industry = isset($_GET['solution_industry']) ? sanitize_key(wp_unslash($_GET['solution_industry'])) : '';
if (!$requested_industry && isset($_GET['industry'])) {
    $raw_industry = sanitize_text_field(wp_unslash($_GET['industry']));
    foreach ($solutions as $solution) {
        $case_industry = $solution_case_industry_map[$solution[2]] ?? $solution[0];
        if ($raw_industry === $solution[0] || $raw_industry === $solution[2] || $raw_industry === $case_industry) {
            $requested_industry = $solution[2];
            break;
        }
    }
}
$active_solution = $solution_by_slug[$requested_industry] ?? null;
$visible_solutions = $active_solution ? [$active_solution] : $solutions;

$case_industry_lookup = [];
$case_by_slug = [];
$application_video_cases = [];
foreach ($cases as $case) {
    if (!empty($case['slug'])) {
        $case_by_slug[$case['slug']] = $case;
    }
    $industry = $case['industry'] ?? '';
    if ($industry) {
        $case_industry_lookup[$industry][] = $case;
    }
    if (!empty($case['media']['video'])) {
        $application_video_cases[] = $case;
    }
}
$application_video_cases = array_slice($application_video_cases, 0, 9);

$stations = [
    [
        'title' => chenxuan_lx('焊接自动化工作站', 'Welding Automation Workstation'),
        'desc' => chenxuan_lx('面向结构件、车身及金属工件的焊接工艺，提升节拍与焊缝一致性。', 'For structural parts, vehicle bodies and metal workpieces, improving takt time and weld consistency.'),
        'slug' => 'welding',
    ],
    [
        'title' => chenxuan_lx('打磨喷涂自动化单元', 'Grinding and Spraying Automation Unit'),
        'desc' => chenxuan_lx('适配表面处理、涂装与后处理场景，减少人工强依赖。', 'For surface treatment, coating and post-processing scenarios, reducing dependence on manual work.'),
        'slug' => 'surface',
    ],
    [
        'title' => chenxuan_lx('搬运码垛系统', 'Handling and Palletizing System'),
        'desc' => chenxuan_lx('围绕生产流转、仓储配送和包装下线实现稳定搬运。', 'Stable handling around production flow, warehousing, distribution and packaging off-line processes.'),
        'slug' => 'handling',
    ],
    [
        'title' => chenxuan_lx('机床上下料与装配系统', 'Machine Loading and Assembly System'),
        'desc' => chenxuan_lx('结合节拍、工装和控制系统，完成柔性上下料与装配作业。', 'Combines takt time, fixtures and control systems for flexible loading, unloading and assembly.'),
        'slug' => 'loading',
    ],
];
?>

<div class="solutions-page-shell" style="<?php echo $pattern_url ? '--solutions-pattern:url(' . esc_url($pattern_url) . ');' : ''; ?>">
    <section class="page-hero solutions-hero solutions-hero-light">
        <div class="page-hero-bg">
            <div class="hero-overlay"></div>
        </div>
        <div class="container">
            <div class="page-hero-content" data-aos="fade-up">
                <span class="section-label"><?php echo esc_html(chenxuan_lx('解决方案', 'Solutions')); ?></span>
                <h1><?php echo esc_html(jaka_t('pg_solutions_title')); ?></h1>
                <p><?php echo esc_html(jaka_t('pg_solutions_desc')); ?></p>
            </div>
        </div>
    </section>

    <section class="industry-section solutions-page-section" id="industry-scenarios">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-label"><?php echo esc_html(chenxuan_lx('细分行业', 'Industries')); ?></span>
                <h2 class="section-title"><?php echo esc_html(jaka_t('pg_industry_title')); ?></h2>
                <?php if ($active_solution) : ?>
                <a href="<?php echo esc_url(home_url('/solutions/') . '#industry-scenarios'); ?>" class="solution-view-all-link"><?php echo esc_html(jaka_t('view_all')); ?></a>
                <?php endif; ?>
            </div>
            <div class="solution-industry-showcase">
                <?php foreach ($visible_solutions as $i => $solution) : ?>
                <?php
                $case_industry = $solution_case_industry_map[$solution[2]] ?? $solution[0];
                $related_cases = $case_industry_lookup[$case_industry] ?? [];
                $primary_case_slug = $solution_primary_case_slugs[$solution[2]] ?? '';
                $primary_case = $primary_case_slug && isset($case_by_slug[$primary_case_slug]) ? $case_by_slug[$primary_case_slug] : ($related_cases[0] ?? null);
                $primary_case_url = $primary_case ? add_query_arg('case', $primary_case['slug'], home_url('/cases/')) : add_query_arg('case_industry', $case_industry, home_url('/cases/')) . '#case-results';
                $solution_media = $solution_media_map[$solution[2]] ?? ['status' => 'missing'];
                $poster = !empty($primary_case['media']['poster']) ? $primary_case['media']['poster'] : ($solution_media['poster'] ?? '');
                $application_label = !empty($primary_case['application']) ? $primary_case['application'] : chenxuan_lx('行业方案', 'Industry Solution');
                $headline = $primary_case ? $primary_case['title'] : $solution[0];
                $body = $primary_case ? $primary_case['desc'] : $solution[1];
                ?>
                <article class="solution-industry-row<?php echo $active_solution ? ' is-active-detail' : ''; ?>" data-aos="fade-up" data-aos-delay="<?php echo esc_attr(($i + 1) * 80); ?>" style="--industry-accent: <?php echo esc_attr($solution[3]); ?>">
                    <div class="solution-industry-copy">
                        <div class="solution-industry-tags">
                            <span><?php echo esc_html($case_industry); ?></span>
                            <span><?php echo esc_html($application_label); ?></span>
                        </div>
                        <h3><?php echo esc_html($headline); ?></h3>
                        <p><?php echo esc_html(wp_trim_words($body, $active_solution ? 96 : 54)); ?></p>
                        <?php if (!$active_solution && count($related_cases) > 1) : ?>
                        <div class="solution-related-cases">
                            <?php foreach (array_slice($related_cases, 0, 3) as $related_case) : ?>
                            <span><?php echo esc_html($related_case['title']); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        <div class="solution-industry-actions">
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary btn-sm">
                                <?php echo esc_html(jaka_t('btn_consult')); ?> <?php echo jaka_svg_icon('arrow-right'); ?>
                            </a>
                            <a href="<?php echo esc_url($primary_case_url); ?>" class="solution-link">
                                <?php echo esc_html(jaka_t('nav_cases')); ?> <?php echo jaka_svg_icon('arrow-right'); ?>
                            </a>
                        </div>
                    </div>
                    <a class="solution-industry-visual" href="<?php echo esc_url($primary_case_url); ?>">
                        <?php if ($poster) : ?>
                        <img src="<?php echo esc_url($poster); ?>" alt="<?php echo esc_attr($headline); ?>" loading="lazy">
                        <?php else : ?>
                        <div class="product-placeholder"><div class="robot-silhouette"></div></div>
                        <?php endif; ?>
                        </a>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="application-section solutions-application-section" id="application-videos">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-label"><?php echo esc_html(chenxuan_lx('应用工艺', 'Applications')); ?></span>
                <h2 class="section-title"><?php echo esc_html(jaka_t('pg_app_title')); ?></h2>
                <p class="section-desc"><?php echo esc_html(chenxuan_lx('按焊接、喷涂、搬运、切割等工艺查看真实项目视频。', 'View real project videos by welding, spraying, handling, cutting and other processes.')); ?></p>
            </div>
            <div class="solution-application-pills">
                <?php foreach ($case_applications as $application) : ?>
                <a href="<?php echo esc_url(add_query_arg('case_application', $application, home_url('/cases/')) . '#case-results'); ?>"><?php echo esc_html($application); ?></a>
                <?php endforeach; ?>
            </div>
            <div class="solution-video-grid">
                <?php foreach ($application_video_cases as $i => $case) : ?>
                <a href="<?php echo esc_url(add_query_arg('case_application', $case['application'], home_url('/cases/')) . '#case-results'); ?>" class="solution-video-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr(($i % 3) * 70); ?>">
                    <video muted playsinline preload="metadata" poster="<?php echo esc_url($case['media']['poster'] ?? ''); ?>">
                        <source src="<?php echo esc_url($case['media']['video']); ?>" type="video/mp4">
                    </video>
                    <span><?php echo esc_html($case['application']); ?></span>
                    <strong><?php echo esc_html($case['title']); ?></strong>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="workstation-section solutions-workstation-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-label"><?php echo esc_html(chenxuan_lx('自动化工作站', 'Automation Workstations')); ?></span>
                <h2 class="section-title"><?php echo esc_html(jaka_t('pg_workstation_title')); ?></h2>
            </div>
            <div class="workstation-grid">
                <?php foreach ($stations as $i => $station) : ?>
                <?php $station_media = $workstation_media_map[$station['slug']] ?? ['status' => 'missing']; ?>
                <article class="workstation-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr(($i + 1) * 100); ?>">
                    <div class="workstation-img">
                        <?php if (!empty($station_media['poster'])) : ?>
                        <img class="workstation-media" src="<?php echo esc_url($station_media['poster']); ?>" alt="<?php echo esc_attr($station['title']); ?>" loading="lazy">
                        <?php else : ?>
                        <div class="product-placeholder"><div class="robot-silhouette"></div></div>
                        <?php endif; ?>
                    </div>
                    <div class="workstation-info">
                        <h3><?php echo esc_html($station['title']); ?></h3>
                        <p><?php echo esc_html($station['desc']); ?></p>
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline btn-sm"><?php echo esc_html(jaka_t('btn_consult')); ?></a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="solutions-cta">
        <div class="container">
            <div class="solutions-cta-inner" data-aos="fade-up">
                <h2><?php echo esc_html(chenxuan_lx('需要为您的产线定制自动化方案？', 'Need a customized automation solution for your production line?')); ?></h2>
                <p><?php echo esc_html(chenxuan_lx('告诉我们工艺、产品、节拍、现场条件和自动化目标，辰轩将协助您梳理可落地的集成方案。', 'Tell us about your process, products, takt time, site conditions and automation goals. ChenXuan will help define an executable integration solution.')); ?></p>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-lg">
                    <?php echo esc_html(jaka_t('contact_submit')); ?> <?php echo jaka_svg_icon('arrow-right'); ?>
                </a>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
