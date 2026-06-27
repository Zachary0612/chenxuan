<?php
/**
 * Template Name: 服务体系
 */
get_header();

$cx = function ($zh, $en) {
    return function_exists('chenxuan_lx') ? chenxuan_lx($zh, $en) : $zh;
};

$services = function_exists('chenxuan_services') ? chenxuan_services() : [];
$capabilities = function_exists('chenxuan_service_capabilities') ? chenxuan_service_capabilities() : [];
$guarantees = function_exists('chenxuan_service_guarantees') ? chenxuan_service_guarantees() : [];
$stats = function_exists('chenxuan_global_stats') ? chenxuan_global_stats() : [];
$faqs = function_exists('chenxuan_service_faqs') ? chenxuan_service_faqs() : [];
$after_sales = function_exists('chenxuan_after_sales_faqs') ? chenxuan_after_sales_faqs() : [];
$asset = function ($path) {
    return function_exists('chenxuan_service_asset_url') ? chenxuan_service_asset_url($path) : '';
};

$capability_icon = function ($index) {
    $icons = [
        '<svg viewBox="0 0 64 64" aria-hidden="true" focusable="false"><path d="M17 34v-5c0-9.2 6.7-16.5 15-16.5S47 19.8 47 29v5" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"/><path d="M14 32h7v12h-7zM43 32h7v12h-7z" fill="none" stroke="currentColor" stroke-width="3" stroke-linejoin="round"/><path d="M47 44c-1.8 5.2-6 7.8-12.5 7.8H29" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"/><path d="M25.5 51.8h7" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"/><circle cx="49" cy="17" r="8.5" fill="none" stroke="var(--color-primary)" stroke-width="3"/><text x="49" y="20.8" text-anchor="middle" font-size="10.5" font-weight="800" fill="var(--color-primary)" font-family="Arial, sans-serif">24</text></svg>',
        '<svg viewBox="0 0 64 64" aria-hidden="true" focusable="false"><path d="M13 17h38v30H13zM13 25h38M20 33h11M20 40h17" fill="none" stroke="currentColor" stroke-width="3"/><path d="m42 32 4 4-4 4M35 40l-4-4 4-4" fill="none" stroke="var(--color-primary)" stroke-width="3"/><path d="m39 30-4 12" fill="none" stroke="var(--color-primary)" stroke-width="3"/></svg>',
        '<svg viewBox="0 0 64 64" aria-hidden="true" focusable="false"><path d="M21 15h23v36H21zM27 15v-4h11v4M27 25h11M27 33h8M27 41h7" fill="none" stroke="currentColor" stroke-width="3"/><path d="M41.5 38.5a8.5 8.5 0 1 0 17 0 8.5 8.5 0 0 0-17 0z" fill="none" stroke="var(--color-primary)" stroke-width="3"/><path d="M50 33.8v5.1l3.6 2.2" fill="none" stroke="var(--color-primary)" stroke-width="3"/><path d="M15 50c0-5 2-8 6-10" fill="none" stroke="currentColor" stroke-width="3"/></svg>',
        '<svg viewBox="0 0 64 64" aria-hidden="true" focusable="false"><path d="M12 16h40v30H12zM20 52h24M28 46v6M36 46v6M18 24h8" fill="none" stroke="currentColor" stroke-width="3"/><path d="m19 38 8-8 7 6 10-12" fill="none" stroke="var(--color-primary)" stroke-width="3"/><path d="M43 24h5v5" fill="none" stroke="var(--color-primary)" stroke-width="3"/></svg>',
        '<svg viewBox="0 0 64 64" aria-hidden="true" focusable="false"><path d="M15 17h34v23H15zM22 47h20M27 40v7M37 40v7" fill="none" stroke="currentColor" stroke-width="3"/><path d="M22 25h16M22 32h11" fill="none" stroke="currentColor" stroke-width="3"/><path d="M49 24h5v16" fill="none" stroke="var(--color-primary)" stroke-width="3"/><path d="M52 46a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM45 54c.8-4.2 3.4-6.4 7-6.4s6.2 2.2 7 6.4" fill="none" stroke="var(--color-primary)" stroke-width="3"/></svg>',
    ];

    return $icons[$index] ?? $icons[0];
};

$service_entries = [
    [
        'title' => $cx('7x24技术响应', '24/7 Technical Response'),
        'desc' => $cx('电话、远程与现场多通道支持，快速定位设备与工艺问题。', 'Phone, remote and on-site channels help locate equipment and process issues quickly.'),
        'target' => 'service-care',
    ],
    [
        'title' => $cx('工艺验证打样', 'Process Validation'),
        'desc' => $cx('围绕焊接、喷涂、搬运、打磨等场景做方案验证。', 'Validate welding, spraying, handling and grinding scenarios before delivery.'),
        'target' => 'service-care',
    ],
    [
        'title' => $cx('现场安装调试', 'On-site Commissioning'),
        'desc' => $cx('工程师到场交付，完成设备集成、联调与节拍优化。', 'Engineers complete integration, commissioning and cycle-time optimization on site.'),
        'target' => 'service-digital',
    ],
    [
        'title' => $cx('备件维护保障', 'Spare Parts Service'),
        'desc' => $cx('关键部件与维护建议同步跟进，降低产线停机风险。', 'Critical parts and maintenance support reduce production downtime risk.'),
        'target' => 'service-digital',
    ],
    [
        'title' => $cx('培训知识赋能', 'Training Enablement'),
        'desc' => $cx('操作、维护、工艺培训同步推进，帮助团队稳定量产。', 'Operator, maintenance and process training help teams reach stable production.'),
        'target' => 'service-academy',
    ],
];

$service_nav = [
    ['id' => 'service-care', 'label' => $cx('客户赋能', 'Enablement')],
    ['id' => 'service-digital', 'label' => $cx('远程运维', 'Digital')],
    ['id' => 'service-academy', 'label' => $cx('培训赋能', 'Academy')],
];

$care_points = [
    [$cx('响应', 'Response'), $cx('7x24小时技术支持，快速建立问题闭环。', '24/7 technical support builds a fast issue loop.')],
    [$cx('验证', 'Validation'), $cx('根据工件、节拍和工艺需求完成方案验证。', 'Validate the plan around workpiece, cycle time and process needs.')],
    [$cx('交付', 'Delivery'), $cx('现场安装、联调、培训同步推进。', 'Installation, commissioning and training move together on site.')],
    [$cx('维护', 'Maintenance'), $cx('维保建议、备件和巡检降低停线风险。', 'Maintenance advice, parts and inspection reduce line downtime.')],
];

$digital_cards = [
    [$cx('需求诊断', 'Diagnosis'), $cx('梳理产线痛点、节拍、工件与安全边界。', 'Clarify line pain points, takt, workpieces and safety limits.')],
    [$cx('方案建模', 'Planning'), $cx('输出机器人、夹具、变位机与控制系统组合。', 'Plan robot, fixture, positioner and control-system combinations.')],
    [$cx('工艺验证', 'Validation'), $cx('完成打样、路径、参数与质量稳定性评估。', 'Verify samples, paths, parameters and quality stability.')],
    [$cx('集成交付', 'Integration'), $cx('设备入场、安装联调、节拍优化一次推进。', 'Deliver installation, commissioning and cycle optimization together.')],
    [$cx('远程诊断', 'Remote'), $cx('通过远程沟通和数据回传快速定位异常。', 'Use remote communication and data feedback to locate issues quickly.')],
];
$digital_total = count($digital_cards) + 1;

$care_album_images = [
    'guarantee/robot-workstation.jpg',
    'guarantee/client-discussion.jpg',
    'guarantee/onsite-service.jpg',
];

$digital_visuals = [
    'guarantee/onsite-service.jpg',
    'projects/project-automation-line.jpg',
    'projects/project-robot-workstation.jpg',
];

$academy_metrics = [
    ['value' => '7x24', 'label' => $cx('技术响应', 'Response')],
    ['value' => '200+', 'label' => $cx('工程经验', 'Engineering Cases')],
    ['value' => '40+', 'label' => $cx('行业覆盖', 'Industries')],
];
?>

<section class="service-support-hero" aria-label="<?php echo esc_attr($cx('服务与支持', 'Service and Support')); ?>">
    <img src="<?php echo esc_url($asset('banner/service-support-banner.jpg')); ?>" alt="<?php echo esc_attr($cx('辰轩服务与支持', 'ChenXuan Service and Support')); ?>" class="service-support-hero-img" width="1920" height="850" fetchpriority="high">
</section>

<section class="service-gateway-section" id="service-overview">
    <div class="container">
        <div class="service-gateway-grid">
            <?php foreach ($service_entries as $i => $item) : ?>
            <a class="service-gateway-item" href="#<?php echo esc_attr($item['target']); ?>">
                <span class="service-gateway-icon" aria-hidden="true"><?php echo $capability_icon($i); ?></span>
                <strong><?php echo esc_html($item['title']); ?></strong>
                <small><?php echo esc_html($item['desc']); ?></small>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="service-care-section service-scroll-panel" id="service-care" data-service-panel>
    <nav class="service-stage-nav" aria-label="<?php echo esc_attr($cx('服务模块导航', 'Service section navigation')); ?>">
        <?php foreach ($service_nav as $item) : ?>
        <a href="#<?php echo esc_attr($item['id']); ?>" data-service-nav="<?php echo esc_attr($item['id']); ?>"><?php echo esc_html($item['label']); ?></a>
        <?php endforeach; ?>
    </nav>
    <div class="container">
        <div class="service-care-layout">
            <div class="service-care-copy">
                <span class="section-label"><?php echo esc_html($cx('ChenXuan Care', 'ChenXuan Care')); ?></span>
                <h2><?php echo esc_html($cx('专业创新服务', 'Professional Innovative Service')); ?></h2>
                <p><?php echo esc_html($cx('从方案评估、工艺验证、设备交付到售后维护，辰轩用标准化流程和快速响应机制保障客户产线持续运行。', 'From solution evaluation, process validation and equipment delivery to after-sales maintenance, ChenXuan uses standardized workflows and fast response to keep customer lines running.')); ?></p>
                <div class="service-care-points">
                    <?php foreach ($care_points as $point) : ?>
                    <div>
                        <strong><?php echo esc_html($point[0]); ?></strong>
                        <span><?php echo esc_html($point[1]); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <figure class="service-care-media">
                <div class="service-care-stack" data-service-album>
                    <?php foreach ($care_album_images as $i => $image_path) : ?>
                    <img src="<?php echo esc_url($asset($image_path)); ?>" alt="" loading="lazy" class="<?php echo $i === 0 ? 'is-active' : ($i === 1 ? 'is-next' : 'is-prev'); ?>" data-service-album-image>
                    <?php endforeach; ?>
                </div>
                <figcaption>
                    <strong><?php echo esc_html($cx('基于行业经验的现场服务', 'Field service based on industry experience')); ?></strong>
                    <span><?php echo esc_html($cx('覆盖焊接、喷涂、搬运、打磨及非标自动化场景。', 'Covering welding, spraying, handling, grinding and custom automation scenarios.')); ?></span>
                </figcaption>
            </figure>
        </div>
    </div>
</section>

<section class="service-digital-section service-scroll-panel" id="service-digital" data-service-panel>
    <div class="container">
        <div class="service-section-heading">
            <span class="section-label"><?php echo esc_html($cx('远程运维与交付闭环', 'Digital Service Loop')); ?></span>
            <h2><?php echo esc_html($cx('从需求到量产的数字化服务流程', 'A digital service workflow from request to production')); ?></h2>
            <p><?php echo esc_html($cx('通过滚动分层呈现，把辰轩的方案、交付、维护和培训能力集中展示。', 'A layered presentation focused on ChenXuan solution, delivery, maintenance and training capabilities.')); ?></p>
        </div>
        <div class="service-digital-layout">
            <div class="service-digital-visual">
                <div class="service-digital-visual-stack" data-service-digital-visual>
                    <?php foreach ($digital_visuals as $i => $image_path) : ?>
                    <img src="<?php echo esc_url($asset($image_path)); ?>" alt="" loading="lazy" class="<?php echo $i === 0 ? 'is-active' : ''; ?>" data-service-digital-image>
                    <?php endforeach; ?>
                </div>
                <div class="service-live-panel">
                    <span><?php echo esc_html($cx('在线服务状态', 'Service Status')); ?></span>
                    <strong><?php echo esc_html($cx('响应中', 'Online')); ?></strong>
                    <small><?php echo esc_html($cx('方案评估 · 工艺验证 · 现场交付', 'Planning · Validation · Delivery')); ?></small>
                </div>
            </div>
            <div class="service-digital-grid">
                <?php foreach ($digital_cards as $i => $card) : ?>
                <div class="service-digital-card">
                    <span><?php echo esc_html(str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT)); ?><em>/<?php echo esc_html((string) $digital_total); ?></em></span>
                    <strong><?php echo esc_html($card[0]); ?></strong>
                    <p><?php echo esc_html($card[1]); ?></p>
                </div>
                <?php endforeach; ?>
                <div class="service-digital-card service-digital-card-qr">
                    <div class="service-digital-qr-media">
                        <img src="<?php echo esc_url($asset('solution/tiktok-qr.jpg')); ?>" alt="<?php echo esc_attr($cx('TikTok二维码', 'TikTok QR Code')); ?>" loading="lazy">
                    </div>
                    <strong><?php echo esc_html($cx('TikTok二维码', 'TikTok QR Code')); ?></strong>
                    <p><?php echo esc_html($cx('扫码关注ChenXuan Robot，查看项目视频与服务动态。', 'Scan to follow ChenXuan Robot for project videos and service updates.')); ?></p>
                    <span><?php echo esc_html(str_pad((string) $digital_total, 2, '0', STR_PAD_LEFT)); ?><em>/<?php echo esc_html((string) $digital_total); ?></em></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="service-academy-section service-scroll-panel" id="service-academy" data-service-panel>
    <div class="container">
        <div class="service-academy-layout">
            <div class="service-academy-media">
                <img src="<?php echo esc_url($asset('guarantee/client-discussion.jpg')); ?>" alt="<?php echo esc_attr($cx('客户培训与方案沟通', 'Customer training and solution communication')); ?>" loading="lazy">
                <img src="<?php echo esc_url($asset('guarantee/onsite-service.jpg')); ?>" alt="<?php echo esc_attr($cx('现场技术支持', 'On-site technical support')); ?>" loading="lazy">
            </div>
            <div class="service-academy-copy">
                <span class="section-label"><?php echo esc_html($cx('辰轩学院知识赋能', 'ChenXuan Academy Enablement')); ?></span>
                <h2><?php echo esc_html($cx('让客户团队真正掌握自动化产线', 'Help customer teams master automation lines')); ?></h2>
                <p><?php echo esc_html($cx('围绕操作、维保、工艺与安全标准开展培训，把项目经验沉淀为客户团队可持续使用的生产能力。', 'Training covers operation, maintenance, process and safety standards, turning project experience into sustainable production capability.')); ?></p>
                <div class="service-academy-metrics">
                    <?php foreach ($academy_metrics as $metric) : ?>
                    <div>
                        <strong><?php echo esc_html($metric['value']); ?></strong>
                        <span><?php echo esc_html($metric['label']); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="service-global-section service-network-section" id="global-layout">
    <div class="container">
        <div class="service-global-layout">
            <div class="service-global-copy">
                <span class="section-label"><?php echo esc_html($cx('辰轩全球布局', 'ChenXuan Global Layout')); ?></span>
                <h2><?php echo esc_html($cx('坚持全球化发展战略', 'Committed to a Global Development Strategy')); ?></h2>
                <p><?php echo esc_html($cx('产品与解决方案已服务欧洲、俄罗斯、中东、东南亚、南美等多个国家和地区。通过持续参加国际展会和建立海外合作网络，为全球客户提供专业、高效的自动化解决方案。', 'Products and solutions serve Europe, Russia, the Middle East, Southeast Asia, South America and other regions. Through international exhibitions and overseas partner networks, ChenXuan provides professional and efficient automation solutions for global customers.')); ?></p>
                <div class="service-global-stats">
                    <?php foreach ($stats as $stat) : ?>
                    <div>
                        <strong><?php echo esc_html($stat['value']); ?></strong>
                        <span><?php echo esc_html($stat['label']); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
                <a href="<?php echo esc_url(home_url('/strategic-cooperation')); ?>" class="btn btn-primary"><?php echo esc_html($cx('探索更多', 'Explore More')); ?> <?php echo jaka_svg_icon('arrow-right'); ?></a>
            </div>
            <div class="service-global-media">
                <img src="<?php echo esc_url($asset('global/global-layout.jpg')); ?>" alt="<?php echo esc_attr($cx('辰轩全球布局展示', 'ChenXuan global layout showcase')); ?>" loading="lazy">
            </div>
        </div>
    </div>
</section>

<section class="service-faq-section" id="faq">
    <div class="container">
        <div class="section-header">
            <span class="section-label"><?php echo esc_html($cx('FAQ', 'FAQ')); ?></span>
            <h2 class="section-title"><?php echo esc_html($cx('常见问题', 'Frequently Asked Questions')); ?></h2>
        </div>
        <div class="service-faq-list">
            <?php foreach ($faqs as $i => $faq) : ?>
            <details class="service-faq-item" <?php echo $i === 0 ? 'open' : ''; ?>>
                <summary><?php echo esc_html($faq['q']); ?></summary>
                <p><?php echo esc_html($faq['a']); ?></p>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="service-faq-section service-after-section" id="after-sales">
    <div class="container">
        <div class="section-header">
            <span class="section-label"><?php echo esc_html($cx('After-sales FAQ', 'After-sales FAQ')); ?></span>
            <h2 class="section-title"><?php echo esc_html($cx('售后服务问题', 'After-sales Service Questions')); ?></h2>
        </div>
        <div class="service-faq-list compact">
            <?php foreach ($after_sales as $faq) : ?>
            <details class="service-faq-item">
                <summary><?php echo esc_html($faq['q']); ?></summary>
                <p><?php echo esc_html($faq['a']); ?></p>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="service-strategy-cta" id="strategic-entry">
    <div class="container">
        <div class="service-strategy-card">
            <div>
                <span class="section-label"><?php echo esc_html($cx('资源 · 战略合作 · 项目案例', 'Resources · Strategic Cooperation · Project Cases')); ?></span>
                <h2><?php echo esc_html($cx('查看展会签约客户与项目展示', 'View Exhibition Customers and Project Showcases')); ?></h2>
                <p><?php echo esc_html($cx('战略合作页面展示海外展会签约客户、项目图片和项目案例视频，帮助客户更直观了解辰轩自动化项目能力。', 'The strategic cooperation page presents overseas exhibition customers, project images and project videos to show ChenXuan automation capabilities more clearly.')); ?></p>
            </div>
            <div class="service-strategy-actions">
                <a href="<?php echo esc_url(home_url('/strategic-cooperation')); ?>" class="btn btn-primary"><?php echo esc_html($cx('战略合作', 'Strategic Cooperation')); ?> <?php echo jaka_svg_icon('arrow-right'); ?></a>
                <a href="tel:13802728597" class="service-phone-link"><?php echo jaka_svg_icon('phone'); ?> 13802728597</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
