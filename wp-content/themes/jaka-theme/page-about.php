<?php
/**
 * Template Name: 关于辰轩
 */
get_header();

$about_asset = static function($path) {
    return add_query_arg('v', JAKA_VERSION, trailingslashit(JAKA_URI) . 'assets/images/about/' . ltrim((string) $path, '/'));
};

$values = [
    ['title' => chenxuan_lx('企业宗旨', 'Purpose'), 'body' => chenxuan_lx('以智能机器人技术推动制造业升级，为客户创造更高价值。', 'Use intelligent robot technology to upgrade manufacturing and create greater value for customers.')],
    ['title' => chenxuan_lx('发展愿景', 'Vision'), 'body' => chenxuan_lx('成为全球领先的智能制造与机器人自动化解决方案服务商。', 'Become a leading global service provider for smart manufacturing and robotic automation solutions.')],
    ['title' => chenxuan_lx('企业精神', 'Spirit'), 'body' => chenxuan_lx('创新驱动 · 客户至上 · 品质为本 · 合作共赢', 'Innovation-driven · Customer first · Quality focused · Win-win cooperation')],
];

$stats = [
    ['value' => '26', 'unit' => chenxuan_lx('年', 'Years'), 'label' => chenxuan_lx('行业资质', 'Industry Qualification')],
    ['value' => '200+', 'unit' => '', 'label' => chenxuan_lx('技术人员', 'Technical Team')],
    ['value' => '40+', 'unit' => '', 'label' => chenxuan_lx('行业覆盖', 'Industry Coverage')],
    ['value' => '100+', 'unit' => '', 'label' => chenxuan_lx('服务企业客户', 'Enterprise Customers')],
];

$offices = [
    ['city' => chenxuan_lx('济南', 'Jinan'), 'address' => chenxuan_lx('山东省济南市历城区工业北路中电建能源谷4-B-4', '4-B-4, Zhongdian Energy Valley, Gongye North Road, Licheng District, Jinan City, Shandong Province')],
    ['city' => chenxuan_lx('西安', 'Xi’an'), 'address' => chenxuan_lx('西安市灞桥区秦汉大道2288号创新产业基地1期4号楼102', 'Room 102, Building 4, Phase 1 Innovation Industrial Base, No. 2288 Qinhan Avenue, Baqiao District, Xi’an')],
    ['city' => chenxuan_lx('杭州', 'Hangzhou'), 'address' => chenxuan_lx('杭州市余杭区五常街道郭家兜路8号', 'No. 8 Guojiadou Road, Wuchang Street, Yuhang District, Hangzhou')],
];

$timeline = [
    ['year' => '2009', 'title' => chenxuan_lx('进入机器人自动化领域', 'Entered Robot Automation'), 'image' => 'factory-2009.jpg'],
    ['year' => '2016', 'title' => chenxuan_lx('机器人设备的自动化集成', 'Robot Equipment Integration'), 'image' => 'automation-2016.jpg'],
    ['year' => '2019', 'title' => chenxuan_lx('组建分部技术团队', 'Built Specialized Technical Teams'), 'image' => 'team-2019.jpg'],
    ['year' => '2021', 'title' => chenxuan_lx('进入国际市场并提供跨境服务', 'Entered International Markets'), 'image' => 'global-2021.jpg'],
    ['year' => '2022', 'title' => chenxuan_lx('中国投资扩张及产能升级', 'Investment Expansion and Capacity Upgrade'), 'image' => 'process-2022.jpg'],
    ['year' => '2023', 'title' => chenxuan_lx('深入布局海外市场', 'Expanded Overseas Market Layout'), 'image' => 'overseas-2023.jpg'],
    ['year' => '2025', 'title' => chenxuan_lx('外贸团队发展至数百人规模', 'Foreign Trade Team Grew to Hundreds'), 'image' => 'team-2025.jpg'],
];

$timeline_phases = [
    ['title' => chenxuan_lx('技术产品化', 'Technology Productization'), 'period' => '2014-2015', 'index' => 1],
    ['title' => chenxuan_lx('产品场景化', 'Scenario Productization'), 'period' => '2016-2017', 'index' => 2],
    ['title' => chenxuan_lx('市场化&规模化', 'Marketization & Scale'), 'period' => '2018-2019', 'index' => 3],
    ['title' => chenxuan_lx('全球化平台建设', 'Global Platform'), 'period' => '2020-2021', 'index' => 4],
    ['title' => chenxuan_lx('产业链生态建立', 'Industrial Ecosystem'), 'period' => '2022-至今', 'index' => 5],
];

$timeline = [
    ['year' => '2014', 'phase' => 0, 'title' => chenxuan_lx('工业机器人自动化系统集成能力成型', 'Industrial robot automation integration capability formed'), 'image' => 'building-clean.jpg'],
    ['year' => '2015', 'phase' => 0, 'title' => chenxuan_lx('机器人应用业务获得商业成功，开启新一代自动化解决方案研发工作', 'Robot application business achieved commercial success and started a new generation of automation solutions'), 'image' => 'automation-2016.jpg'],
    ['year' => '2016', 'phase' => 1, 'title' => chenxuan_lx('产品能力进入多行业场景，形成标准化应用方案', 'Product capabilities entered multi-industry scenarios with standardized applications'), 'image' => 'factory-2009.jpg'],
    ['year' => '2018', 'phase' => 2, 'title' => chenxuan_lx('自动化集成项目进入规模化交付阶段', 'Automation integration projects entered scaled delivery'), 'image' => 'team-2019.jpg'],
    ['year' => '2020', 'phase' => 3, 'title' => chenxuan_lx('完善跨区域服务网络，支持复杂项目快速响应', 'Expanded regional service network for fast response on complex projects'), 'image' => 'global-2021.jpg'],
    ['year' => '2022', 'phase' => 4, 'title' => chenxuan_lx('围绕制造场景建立产业链生态与交付体系', 'Built industrial ecosystem and delivery system around manufacturing scenarios'), 'image' => 'process-2022.jpg'],
    ['year' => '2025', 'phase' => 4, 'title' => chenxuan_lx('海外团队与服务网络持续扩展，面向全球客户交付', 'Overseas team and service network continue to expand for global customers'), 'image' => 'team-2025.jpg'],
];
?>

<section class="about-hero about-hero-video">
    <div class="about-hero-bg">
        <video autoplay muted loop playsinline poster="<?php echo esc_url($about_asset('overview.jpg')); ?>">
            <source src="<?php echo esc_url($about_asset('banner.mp4')); ?>" type="video/mp4">
        </video>
        <div class="hero-overlay"></div>
    </div>
    <div class="container">
        <div class="about-hero-content" data-aos="fade-up">
            <span class="section-label"><?php echo esc_html(jaka_t('nav_about')); ?></span>
            <h1 class="about-hero-title"><?php echo esc_html(chenxuan_lx('让智能机器人服务全球制造业', 'Intelligent Robots for Global Manufacturing')); ?></h1>
            <p class="about-hero-tagline"><?php echo esc_html(jaka_t('pg_about_tagline')); ?></p>
        </div>
    </div>
</section>

<section class="about-values">
    <div class="container">
        <div class="about-value-grid">
            <?php foreach ($values as $idx => $value) : ?>
            <article class="about-value-card" data-card-number="<?php echo esc_attr(str_pad((string) ($idx + 1), 2, '0', STR_PAD_LEFT)); ?>" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($idx * 90); ?>">
                <span><?php echo esc_html(str_pad((string) ($idx + 1), 2, '0', STR_PAD_LEFT)); ?></span>
                <h2><?php echo esc_html($value['title']); ?></h2>
                <p><?php echo esc_html($value['body']); ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="about-intro about-intro-light">
    <div class="container">
        <div class="about-intro-grid">
            <div class="about-intro-text" data-aos="fade-right">
                <span class="section-label"><?php echo esc_html(chenxuan_lx('辰轩简介', 'ChenXuan Profile')); ?></span>
                <h2 class="section-title"><?php echo esc_html(jaka_t('pg_about_intro')); ?></h2>
                <p><?php echo esc_html(chenxuan_intro_primary()); ?></p>
                <p><?php echo esc_html(chenxuan_intro_secondary()); ?></p>
                <p><?php echo esc_html(chenxuan_lx('我们的产品出口到100多个国家，已服务数千家企业。凭借多项专业认证，我们深受全球客户的信赖。我们将会为您提供专业的工业自动化一站式解决方案，真诚期待与您的合作！', 'Our products are exported to more than 100 countries and have served thousands of enterprises. With multiple professional certifications, we are trusted by global customers and look forward to providing professional one-stop industrial automation solutions.')); ?></p>
            </div>
            <div class="about-intro-visual about-intro-video-card" data-aos="fade-left">
                <video class="about-intro-video" controls preload="metadata" playsinline poster="<?php echo esc_url($about_asset('overview.jpg')); ?>">
                    <source src="<?php echo esc_url($about_asset('banner.mp4')); ?>" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
</section>

<section class="about-stats about-stats-document">
    <div class="container">
        <div class="stats-grid">
            <?php foreach ($stats as $idx => $stat) : ?>
            <?php
            $stat_count = (int) preg_replace('/[^0-9]/', '', (string) $stat['value']);
            $stat_suffix = preg_replace('/[0-9]/', '', (string) $stat['value']);
            ?>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="<?php echo esc_attr(($idx + 1) * 80); ?>">
                <div class="stat-number" data-count="<?php echo esc_attr($stat_count); ?>" data-count-suffix="<?php echo esc_attr($stat_suffix); ?>">
                    <span class="stat-count"><?php echo esc_html($stat_count); ?></span>
                    <?php if ($stat_suffix !== '') : ?><span class="stat-suffix"><?php echo esc_html($stat_suffix); ?></span><?php endif; ?>
                    <?php if ($stat['unit'] !== '') : ?><span class="stat-unit"><?php echo esc_html($stat['unit']); ?></span><?php endif; ?>
                </div>
                <div class="stat-label"><?php echo esc_html($stat['label']); ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="about-offices">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-label"><?php echo esc_html(chenxuan_lx('服务网络', 'Service Network')); ?></span>
            <h2 class="section-title"><?php echo esc_html(chenxuan_lx('用智能机器人提升效率，让生产更简单、更高效', 'Use Intelligent Robots to Make Production Simpler and More Efficient')); ?></h2>
        </div>
        <div class="about-office-layout">
            <div class="about-office-image" data-aos="fade-right">
                <img src="<?php echo esc_url($about_asset('building-clean.jpg')); ?>" alt="<?php echo esc_attr(chenxuan_lx('辰轩服务网络', 'ChenXuan service network')); ?>" loading="lazy">
            </div>
            <span class="about-office-main-pin"><?php echo esc_html(chenxuan_lx('中国济南', 'Jinan, China')); ?></span>
            <div class="about-office-list" data-aos="fade-left">
                <?php foreach ($offices as $office) : ?>
                <article class="about-office-card">
                    <h3><?php echo esc_html($office['city']); ?></h3>
                    <p><?php echo esc_html($office['address']); ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="about-timeline about-timeline-assets">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-label"><?php echo esc_html(chenxuan_lx('公司历程', 'Milestones')); ?></span>
            <h2 class="section-title"><?php echo esc_html(chenxuan_lx('持续深耕机器人自动化集成', 'Continuously Developing Robotic Automation Integration')); ?></h2>
        </div>
        <div class="about-history-tabs" data-aos="fade-up" data-aos-delay="80">
            <?php foreach ($timeline_phases as $idx => $phase) : ?>
            <button
                class="about-history-tab <?php echo $idx === 0 ? 'is-active' : ''; ?>"
                type="button"
                data-history-phase="<?php echo esc_attr($idx); ?>"
                data-timeline-index="<?php echo esc_attr($phase['index']); ?>"
                <?php echo $idx === 0 ? 'aria-current="true"' : ''; ?>
            >
                <span><?php echo esc_html($phase['title']); ?></span>
                <em>(<?php echo esc_html($phase['period']); ?>)</em>
            </button>
            <?php endforeach; ?>
        </div>
        <div class="about-timeline-stage" data-aos="fade-up" data-aos-delay="120">
            <div class="swiper about-timeline-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($timeline as $idx => $item) : ?>
                    <article class="swiper-slide about-timeline-card" data-history-phase="<?php echo esc_attr($item['phase'] ?? 0); ?>">
                        <div class="about-timeline-year"><?php echo esc_html($item['year']); ?></div>
                        <div class="about-timeline-media">
                            <img src="<?php echo esc_url($about_asset($item['image'])); ?>" alt="<?php echo esc_attr($item['year'] . ' ' . $item['title']); ?>" loading="lazy">
                        </div>
                        <div class="about-timeline-copy">
                            <span><?php echo esc_html(str_pad((string) ($idx + 1), 2, '0', STR_PAD_LEFT)); ?></span>
                            <h3><?php echo esc_html($item['title']); ?></h3>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="about-timeline-rail" aria-label="<?php echo esc_attr(chenxuan_lx('鍏徃鍘嗙▼骞翠唤', 'Milestone years')); ?>">
                <?php foreach ($timeline as $idx => $item) : ?>
                <button
                    class="<?php echo $idx === 0 ? 'is-active' : ''; ?>"
                    type="button"
                    data-timeline-index="<?php echo esc_attr($idx); ?>"
                    aria-label="<?php echo esc_attr($item['year'] . ' ' . $item['title']); ?>"
                    <?php echo $idx === 0 ? 'aria-current="true"' : ''; ?>
                >
                    <?php echo esc_html($item['year']); ?>
                </button>
                <?php endforeach; ?>
            </div>
            <div class="about-timeline-controls">
                <button class="about-timeline-btn about-timeline-prev" type="button" aria-label="Previous milestone"><?php echo jaka_svg_icon('arrow-left'); ?></button>
                <button class="about-timeline-btn about-timeline-next" type="button" aria-label="Next milestone"><?php echo jaka_svg_icon('arrow-right'); ?></button>
            </div>
        </div>
    </div>
</section>

<section class="about-certificates">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-label"><?php echo esc_html(chenxuan_lx('认证与口碑', 'Certifications and Reputation')); ?></span>
            <h2 class="section-title"><?php echo esc_html(chenxuan_lx('以专业能力赢得全球客户信赖', 'Trusted Globally Through Professional Capability')); ?></h2>
        </div>
        <div class="about-certificate-grid">
            <img src="<?php echo esc_url($about_asset('certificates.jpg')); ?>" alt="<?php echo esc_attr(chenxuan_lx('辰轩认证证书', 'ChenXuan certificates')); ?>" loading="lazy">
            <img src="<?php echo esc_url($about_asset('certificate-community.jpg')); ?>" alt="<?php echo esc_attr(chenxuan_lx('辰轩资质证明', 'ChenXuan qualification certificate')); ?>" loading="lazy">
            <img src="<?php echo esc_url($about_asset('reviews.jpg')); ?>" alt="<?php echo esc_attr(chenxuan_lx('客户好评', 'Customer reviews')); ?>" loading="lazy">
        </div>
    </div>
</section>

<section class="about-cta">
    <div class="container">
        <div class="about-cta-inner" data-aos="fade-up">
            <h2><?php echo esc_html(chenxuan_lx('辰轩机器人始终坚持技术创新与产品研发', 'ChenXuan Robotics Continues to Invest in Technology and Product Development')); ?></h2>
            <p><?php echo esc_html(chenxuan_lx('专注于工业机器人应用、智能制造及自动化集成领域，为客户提供高效、可靠、智能的一站式自动化解决方案。', 'We focus on industrial robot applications, smart manufacturing and automation integration, delivering efficient, reliable and intelligent one-stop automation solutions.')); ?></p>
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary"><?php echo esc_html(jaka_t('btn_consult')); ?> <?php echo jaka_svg_icon('arrow-right'); ?></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
