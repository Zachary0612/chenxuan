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
$solution_primary_case_slugs = function_exists('chenxuan_solution_primary_case_slugs') ? chenxuan_solution_primary_case_slugs() : [];
$pattern_url = function_exists('chenxuan_home_asset_url') ? chenxuan_home_asset_url('pattern/impgbg.png') : '';

$solution_case_industry_map = [
    'engineering-machinery' => chenxuan_l('工程机械'),
    'automotive-parts' => chenxuan_l('汽车及零部件'),
    'metal-fabrication' => chenxuan_l('金属加工'),
    'ship-steel-structure' => chenxuan_l('船舶和钢结构行业'),
    'environmental-cleaning' => chenxuan_l('环保清洁行业'),
];

$solution_by_slug = [];
foreach ($solutions as $solution) {
    $solution_by_slug[$solution[2]] = $solution;
}

$requested_industry = isset($_GET['solution_industry']) ? sanitize_key(wp_unslash($_GET['solution_industry'])) : '';
$requested_application = isset($_GET['solution_application']) ? sanitize_text_field(wp_unslash($_GET['solution_application'])) : '';
$requested_application = in_array($requested_application, $case_applications, true) ? $requested_application : '';

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
$solution_page_title = $active_solution ? $active_solution[0] : ($requested_application ?: jaka_t('pg_solutions_title'));
$detail_mode = $active_solution ? 'industry' : ($requested_application ? 'application' : 'overview');

$clip_text = static function($text, $length = 126) {
    $text = trim(wp_strip_all_tags((string) $text));
    if (function_exists('mb_strlen') && function_exists('mb_substr') && mb_strlen($text) > $length) {
        return mb_substr($text, 0, $length) . '...';
    }

    return $text;
};

$first_char = static function($text) {
    $text = (string) $text;
    return function_exists('mb_substr') ? mb_substr($text, 0, 1) : substr($text, 0, 1);
};

$case_url = static function($case) {
    return add_query_arg('case', $case['slug'], home_url('/cases/'));
};

$case_industry_lookup = [];
$case_by_slug = [];
$video_cases = [];
foreach ($cases as $case) {
    if (!empty($case['slug'])) {
        $case_by_slug[$case['slug']] = $case;
    }

    if (!empty($case['industry'])) {
        $case_industry_lookup[$case['industry']][] = $case;
    }

    if (!empty($case['media']['video'])) {
        $video_cases[] = $case;
    }
}

$active_case_industry = $active_solution ? ($solution_case_industry_map[$active_solution[2]] ?? $active_solution[0]) : '';
$industry_cases = $active_case_industry ? ($case_industry_lookup[$active_case_industry] ?? []) : [];
$primary_case_slug = $active_solution ? ($solution_primary_case_slugs[$active_solution[2]] ?? '') : '';
$industry_primary_case = $primary_case_slug && isset($case_by_slug[$primary_case_slug]) ? $case_by_slug[$primary_case_slug] : ($industry_cases[0] ?? null);
$industry_media = $industry_primary_case['media'] ?? ($solution_media_map[$active_solution[2] ?? ''] ?? []);
$industry_image = $industry_media['poster'] ?? '';
$industry_case_url = $industry_primary_case ? $case_url($industry_primary_case) : (add_query_arg('case_industry', $active_case_industry, home_url('/cases/')) . '#case-results');

$industry_scene_cases = array_values(array_filter($industry_cases, static function($case) {
    return !empty($case['media']['poster']);
}));
if (!$industry_scene_cases && $industry_primary_case) {
    $industry_scene_cases[] = $industry_primary_case;
}
$industry_scene_cases = array_slice($industry_scene_cases, 0, 7);
$industry_case_cards = array_slice($industry_cases, 0, 8);

$application_video_cases = $requested_application ? array_values(array_filter($video_cases, static function($case) use ($requested_application) {
    return ($case['application'] ?? '') === $requested_application;
})) : [];
$application_primary_case = $application_video_cases[0] ?? null;
$application_intro_text = $application_primary_case['desc'] ?? chenxuan_lx('围绕真实项目视频展示工艺应用，帮助客户快速判断现场自动化改造路径。', 'Real project videos show the process application and help customers evaluate automation upgrade paths.');

$related_industry_cases = [];
$seen_related_industries = [];
foreach ($application_video_cases as $case) {
    $industry = $case['industry'] ?? '';
    if (!$industry || isset($seen_related_industries[$industry])) {
        continue;
    }

    $seen_related_industries[$industry] = true;
    $related_industry_cases[] = $case;
}
$related_industry_cases = array_slice($related_industry_cases, 0, 4);

$overview_video_cases = array_slice($video_cases, 0, 6);
$overview_solutions = $solutions;
?>

<div class="solutions-page-shell is-<?php echo esc_attr($detail_mode); ?>-page<?php echo $detail_mode !== 'overview' ? ' is-detail-page' : ''; ?>" style="<?php echo $pattern_url ? '--solutions-pattern:url(' . esc_url($pattern_url) . ');' : ''; ?>">
    <section class="page-hero solutions-hero solutions-hero-light">
        <div class="page-hero-bg">
            <div class="hero-overlay"></div>
        </div>
        <div class="container">
            <div class="page-hero-content" data-aos="fade-up">
                <span class="section-label"><?php echo esc_html($requested_application ? chenxuan_lx('应用工艺', 'Application') : chenxuan_lx('解决方案', 'Solutions')); ?></span>
                <h1><?php echo esc_html($solution_page_title); ?></h1>
                <p><?php echo esc_html($requested_application ? chenxuan_lx('按工艺查看真实项目视频。', 'View real project videos by process.') : jaka_t('pg_solutions_desc')); ?></p>
            </div>
        </div>
    </section>

    <?php if ($active_solution) : ?>
    <section class="cx-solution-intro">
        <div class="cx-solution-container">
            <div class="cx-intro-layout" data-aos="fade-up">
                <div class="cx-intro-copy">
                    <h2><?php echo esc_html(chenxuan_lx('行业简介', 'Industry Overview')); ?></h2>
                    <p><?php echo esc_html($active_solution[1]); ?></p>
                    <?php if ($industry_primary_case) : ?>
                    <p><?php echo esc_html($clip_text($industry_primary_case['desc'], 150)); ?></p>
                    <?php endif; ?>
                </div>
                <figure class="cx-intro-media">
                    <?php if ($industry_image) : ?>
                    <img src="<?php echo esc_url($industry_image); ?>" alt="<?php echo esc_attr($active_solution[0]); ?>" loading="lazy">
                    <?php endif; ?>
                </figure>
            </div>
        </div>
    </section>

    <section class="cx-solution-compare">
        <div class="cx-solution-container">
            <div class="cx-section-heading" data-aos="fade-up">
                <span><?php echo esc_html(chenxuan_lx('方案价值', 'Solution Value')); ?></span>
                <h2><?php echo esc_html(chenxuan_lx('帮助用户解决痛点问题，实现产能升级', 'Solve pain points and upgrade capacity')); ?></h2>
            </div>
            <div class="cx-compare-grid" data-aos="fade-up">
                <article class="cx-compare-card cx-compare-card--advantage">
                    <span><?php echo esc_html(chenxuan_lx('方案优势', 'Advantages')); ?></span>
                    <h3><?php echo esc_html(chenxuan_lx('稳定、柔性、高效的自动化单元', 'Stable, flexible and efficient automation units')); ?></h3>
                    <ul>
                        <li><?php echo esc_html(chenxuan_lx('结合工件、节拍与现场空间输出可落地方案', 'Plans are built around workpieces, takt time and site space')); ?></li>
                        <li><?php echo esc_html(chenxuan_lx('机器人、夹具、变位机与控制系统协同运行', 'Robots, fixtures, positioners and controls work together')); ?></li>
                        <li><?php echo esc_html(chenxuan_lx('减少人工依赖，提升一致性和交付效率', 'Reduces labor dependence and improves consistency')); ?></li>
                    </ul>
                </article>
                <div class="cx-vs-badge">VS</div>
                <article class="cx-compare-card cx-compare-card--pain">
                    <span><?php echo esc_html(chenxuan_lx('痛点问题', 'Pain Points')); ?></span>
                    <h3><?php echo esc_html(chenxuan_lx('传统产线效率和品质波动明显', 'Traditional lines fluctuate in efficiency and quality')); ?></h3>
                    <ul>
                        <li><?php echo esc_html(chenxuan_lx('人工焊接、搬运或喷涂强度高且稳定性不足', 'Manual welding, handling or spraying is demanding and unstable')); ?></li>
                        <li><?php echo esc_html(chenxuan_lx('多型号切换慢，返修和停线成本高', 'Model changeovers are slow and rework cost is high')); ?></li>
                        <li><?php echo esc_html(chenxuan_lx('危险工位对安全管理提出更高要求', 'Hazardous stations require stricter safety control')); ?></li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    <section class="cx-scenes-section cx-scenes" id="industry-scenarios">
        <div class="cx-solution-container">
            <div class="cx-section-heading" data-aos="fade-up">
                <span><?php echo esc_html(chenxuan_lx('应用场景', 'Application Scenarios')); ?></span>
                <h2><?php echo esc_html(chenxuan_lx('覆盖真实制造现场的自动化场景', 'Automation scenarios for real manufacturing sites')); ?></h2>
            </div>
            <?php if ($industry_scene_cases) : ?>
            <div class="cx-scene-tabs" data-aos="fade-up">
                <?php foreach ($industry_scene_cases as $index => $case) : ?>
                <button class="cx-tab-button<?php echo $index === 0 ? ' is-active' : ''; ?>" type="button" data-cx-scene-tab="<?php echo esc_attr($index); ?>">
                    <span><?php echo esc_html($case['application']); ?></span>
                    <strong><?php echo esc_html($clip_text($case['title'], 10)); ?></strong>
                </button>
                <?php endforeach; ?>
            </div>
            <div class="cx-scene-panels" data-aos="fade-up">
                <?php foreach ($industry_scene_cases as $index => $case) : ?>
                <article class="cx-scene-panel<?php echo $index === 0 ? ' is-active' : ''; ?>" data-cx-scene-panel="<?php echo esc_attr($index); ?>">
                    <div class="cx-scene-media">
                        <?php if (!empty($case['media']['poster'])) : ?>
                        <img src="<?php echo esc_url($case['media']['poster']); ?>" alt="<?php echo esc_attr($case['title']); ?>" loading="lazy">
                        <?php endif; ?>
                    </div>
                    <div class="cx-scene-copy">
                        <div class="cx-scene-icon"><?php echo esc_html($first_char($case['application'])); ?></div>
                        <h3><?php echo esc_html($case['title']); ?></h3>
                        <ul>
                            <li><?php echo esc_html($clip_text($case['desc'], 52)); ?></li>
                            <li><?php echo esc_html(chenxuan_lx('通过项目视频和现场案例验证工艺可行性。', 'Project videos and site cases verify process feasibility.')); ?></li>
                            <li><?php echo esc_html(chenxuan_lx('支持机器人本体、工装夹具与系统集成联动。', 'Supports robot, fixture and system integration.')); ?></li>
                        </ul>
                        <a href="<?php echo esc_url($case_url($case)); ?>" class="btn btn-primary btn-sm">
                            <?php echo esc_html(chenxuan_lx('应用详情', 'Application Details')); ?> <?php echo jaka_svg_icon('arrow-right'); ?>
                        </a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <?php if ($industry_case_cards) : ?>
    <section class="cx-case-strip-section">
        <div class="cx-solution-container">
            <div class="cx-section-heading" data-aos="fade-up">
                <span><?php echo esc_html(chenxuan_lx('案例展示', 'Cases')); ?></span>
                <h2><?php echo esc_html(chenxuan_lx('应用案例', 'Application Cases')); ?></h2>
            </div>
            <div class="cx-case-strip" data-aos="fade-up">
                <?php foreach ($industry_case_cards as $case) : ?>
                <a class="cx-case-tile" href="<?php echo esc_url($case_url($case)); ?>">
                    <?php if (!empty($case['media']['poster'])) : ?>
                    <img src="<?php echo esc_url($case['media']['poster']); ?>" alt="<?php echo esc_attr($case['title']); ?>" loading="lazy">
                    <?php endif; ?>
                    <span><?php echo esc_html($case['application']); ?></span>
                    <strong><?php echo esc_html($case['title']); ?></strong>
                </a>
                <?php endforeach; ?>
            </div>
            <a class="cx-more-link" href="<?php echo esc_url(add_query_arg('case_industry', $active_case_industry, home_url('/cases/')) . '#case-results'); ?>">
                <?php echo esc_html(chenxuan_lx('更多案例', 'More Cases')); ?> <?php echo jaka_svg_icon('arrow-right'); ?>
            </a>
        </div>
    </section>
    <?php endif; ?>

    <?php elseif ($requested_application) : ?>
    <section class="cx-application-intro" id="application-videos">
        <div class="cx-solution-container">
            <div class="cx-app-layout" data-aos="fade-up">
                <div class="cx-app-copy">
                    <h2><?php echo esc_html(chenxuan_lx('应用简介', 'Application Overview')); ?></h2>
                    <p><?php echo esc_html($clip_text($application_intro_text, 190)); ?></p>
                    <p><?php echo esc_html(chenxuan_lx('以下内容按真实项目视频组织，方便快速查看同类工艺的现场效果。', 'The following content is organized by real project videos for quick review of process effects.')); ?></p>
                </div>
                <div class="cx-app-video">
                    <?php if ($application_primary_case && !empty($application_primary_case['media']['video'])) : ?>
                    <video controls playsinline preload="metadata" poster="<?php echo esc_url($application_primary_case['media']['poster'] ?? ''); ?>">
                        <source src="<?php echo esc_url($application_primary_case['media']['video']); ?>" type="video/mp4">
                    </video>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="cx-case-strip-section cx-application-cases">
        <div class="cx-solution-container">
            <div class="cx-section-heading" data-aos="fade-up">
                <span><?php echo esc_html(chenxuan_lx('真实项目视频', 'Project Videos')); ?></span>
                <h2><?php echo esc_html(chenxuan_lx('应用案例', 'Application Cases')); ?></h2>
            </div>
            <div class="cx-video-case-grid" data-aos="fade-up">
                <?php foreach ($application_video_cases as $case) : ?>
                <a class="cx-video-case" href="<?php echo esc_url($case_url($case)); ?>">
                    <?php if (!empty($case['media']['poster'])) : ?>
                    <img src="<?php echo esc_url($case['media']['poster']); ?>" alt="<?php echo esc_attr($case['title']); ?>" loading="lazy">
                    <?php endif; ?>
                    <span><?php echo esc_html($case['application']); ?></span>
                    <strong><?php echo esc_html($case['title']); ?></strong>
                    <em><?php echo esc_html(chenxuan_lx('查看视频', 'View Video')); ?></em>
                </a>
                <?php endforeach; ?>
            </div>
            <a class="cx-more-link" href="<?php echo esc_url(add_query_arg('case_application', $requested_application, home_url('/cases/')) . '#case-results'); ?>">
                <?php echo esc_html(chenxuan_lx('更多案例', 'More Cases')); ?> <?php echo jaka_svg_icon('arrow-right'); ?>
            </a>
        </div>
    </section>

    <?php if ($related_industry_cases) : ?>
    <section class="cx-enable-section">
        <div class="cx-solution-container">
            <div class="cx-section-heading" data-aos="fade-up">
                <span><?php echo esc_html(chenxuan_lx('赋能行业', 'Industries Empowered')); ?></span>
                <h2><?php echo esc_html(chenxuan_lx('同类工艺在多行业落地', 'The same process lands across industries')); ?></h2>
            </div>
            <div class="cx-enable-grid" data-aos="fade-up">
                <?php foreach ($related_industry_cases as $case) : ?>
                <a class="cx-enable-card" href="<?php echo esc_url($case_url($case)); ?>">
                    <?php if (!empty($case['media']['poster'])) : ?>
                    <img src="<?php echo esc_url($case['media']['poster']); ?>" alt="<?php echo esc_attr($case['industry']); ?>" loading="lazy">
                    <?php endif; ?>
                    <span><?php echo esc_html($case['industry']); ?></span>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php else : ?>
    <section class="cx-overview-section" id="industry-scenarios">
        <div class="cx-solution-container">
            <div class="cx-section-heading" data-aos="fade-up">
                <span><?php echo esc_html(chenxuan_lx('细分行业', 'Industries')); ?></span>
                <h2><?php echo esc_html(jaka_t('pg_industry_title')); ?></h2>
            </div>
            <div class="cx-overview-grid" data-aos="fade-up">
                <?php foreach ($overview_solutions as $solution) : ?>
                <?php
                $media = $solution_media_map[$solution[2]] ?? [];
                $image = $media['poster'] ?? '';
                ?>
                <a class="cx-overview-card" href="<?php echo esc_url(add_query_arg('solution_industry', $solution[2], home_url('/solutions/'))); ?>">
                    <?php if ($image) : ?>
                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($solution[0]); ?>" loading="lazy">
                    <?php endif; ?>
                    <span><?php echo esc_html($solution[0]); ?></span>
                    <p><?php echo esc_html($clip_text($solution[1], 52)); ?></p>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="cx-overview-section cx-overview-section--process" id="application-videos">
        <div class="cx-solution-container">
            <div class="cx-section-heading" data-aos="fade-up">
                <span><?php echo esc_html(chenxuan_lx('应用工艺', 'Applications')); ?></span>
                <h2><?php echo esc_html(chenxuan_lx('典型应用', 'Typical Applications')); ?></h2>
            </div>
            <div class="solution-application-pills" data-aos="fade-up">
                <?php foreach ($case_applications as $application) : ?>
                <a href="<?php echo esc_url(add_query_arg('solution_application', $application, home_url('/solutions/'))); ?>"><?php echo esc_html($application); ?></a>
                <?php endforeach; ?>
            </div>
            <div class="cx-video-case-grid" data-aos="fade-up">
                <?php foreach ($overview_video_cases as $case) : ?>
                <a class="cx-video-case" href="<?php echo esc_url(add_query_arg('solution_application', $case['application'], home_url('/solutions/'))); ?>">
                    <?php if (!empty($case['media']['poster'])) : ?>
                    <img src="<?php echo esc_url($case['media']['poster']); ?>" alt="<?php echo esc_attr($case['title']); ?>" loading="lazy">
                    <?php endif; ?>
                    <span><?php echo esc_html($case['application']); ?></span>
                    <strong><?php echo esc_html($case['title']); ?></strong>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
