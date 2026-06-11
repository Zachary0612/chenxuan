<?php
/**
 * Template Name: 解决方案
 */
get_header();

$solutions = function_exists('chenxuan_solutions') ? chenxuan_solutions() : [];
$applications = function_exists('chenxuan_applications') ? chenxuan_applications() : [];
$solution_media_map = function_exists('chenxuan_solution_media_map') ? chenxuan_solution_media_map() : [];
$workstation_media_map = function_exists('chenxuan_workstation_media_map') ? chenxuan_workstation_media_map() : [];
$pattern_url = function_exists('chenxuan_home_asset_url') ? chenxuan_home_asset_url('pattern/impgbg.png') : '';

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

    <section class="industry-section solutions-page-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-label"><?php echo esc_html(chenxuan_lx('细分行业', 'Industries')); ?></span>
                <h2 class="section-title"><?php echo esc_html(jaka_t('pg_industry_title')); ?></h2>
            </div>
            <div class="industry-grid">
                <?php foreach ($solutions as $i => $solution) : ?>
                <?php $solution_media = $solution_media_map[$solution[2]] ?? ['status' => 'missing']; ?>
                <article class="industry-card <?php echo !empty($solution_media['poster']) ? 'has-media' : ''; ?>" data-aos="fade-up" data-aos-delay="<?php echo esc_attr(($i + 1) * 80); ?>">
                    <div class="industry-card-accent" style="background: <?php echo esc_attr($solution[3]); ?>"></div>
                    <?php if (!empty($solution_media['poster'])) : ?>
                    <div class="industry-card-media">
                        <img src="<?php echo esc_url($solution_media['poster']); ?>" alt="<?php echo esc_attr($solution[0]); ?>" loading="lazy">
                    </div>
                    <?php endif; ?>
                    <div class="industry-card-content">
                        <h3><?php echo esc_html($solution[0]); ?></h3>
                        <p><?php echo esc_html($solution[1]); ?></p>
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="solution-link">
                            <?php echo esc_html(jaka_t('btn_consult')); ?> <?php echo jaka_svg_icon('arrow-right'); ?>
                        </a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="application-section solutions-application-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-label"><?php echo esc_html(chenxuan_lx('应用工艺', 'Applications')); ?></span>
                <h2 class="section-title"><?php echo esc_html(jaka_t('pg_app_title')); ?></h2>
                <p class="section-desc"><?php echo esc_html(jaka_t('pg_app_desc')); ?></p>
            </div>
            <div class="application-grid stagger-children">
                <?php foreach ($applications as $application) : ?>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="application-tag">
                    <span><?php echo esc_html($application); ?></span>
                    <?php echo jaka_svg_icon('arrow-right'); ?>
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
