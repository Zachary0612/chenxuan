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
?>

<section class="service-support-hero" aria-label="<?php echo esc_attr($cx('服务与支持', 'Service and Support')); ?>">
    <img src="<?php echo esc_url($asset('banner/service-support-banner.jpg')); ?>" alt="<?php echo esc_attr($cx('辰轩服务与支持', 'ChenXuan Service and Support')); ?>" class="service-support-hero-img" width="1920" height="850" fetchpriority="high">
</section>

<section class="service-capability-section" id="service-overview">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-label"><?php echo esc_html($cx('服务能力', 'Service Capabilities')); ?></span>
            <h2 class="section-title"><?php echo esc_html($cx('辰轩专业自动化服务保障', 'ChenXuan Professional Automation Service Assurance')); ?></h2>
        </div>
        <div class="service-capability-grid">
            <?php foreach ($capabilities as $i => $item) : ?>
            <article class="service-capability-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr(($i + 1) * 70); ?>">
                <div class="service-capability-head">
                    <span class="service-capability-index"><?php echo esc_html(str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT)); ?></span>
                    <span class="service-capability-icon" aria-hidden="true"><?php echo $capability_icon($i); ?></span>
                </div>
                <h3><?php echo esc_html($item['title']); ?></h3>
                <p><?php echo esc_html($item['desc']); ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="service-guarantee-section">
    <div class="container">
        <div class="service-guarantee-layout">
            <div class="service-guarantee-media" data-aos="fade-right">
                <img src="<?php echo esc_url($asset('guarantee/robot-workstation.jpg')); ?>" alt="<?php echo esc_attr($cx('机器人工作站服务保障', 'Robot workstation service assurance')); ?>" loading="lazy">
                <div class="service-guarantee-stack">
                    <img src="<?php echo esc_url($asset('guarantee/client-discussion.jpg')); ?>" alt="<?php echo esc_attr($cx('客户方案沟通', 'Customer solution discussion')); ?>" loading="lazy">
                    <img src="<?php echo esc_url($asset('guarantee/onsite-service.jpg')); ?>" alt="<?php echo esc_attr($cx('现场技术支持', 'On-site technical support')); ?>" loading="lazy">
                </div>
            </div>
            <div class="service-guarantee-copy" data-aos="fade-left">
                <span class="section-label"><?php echo esc_html($cx('专业服务保障', 'Professional Service Assurance')); ?></span>
                <h2><?php echo esc_html($cx('一站式自动化解决方案', 'One-stop Automation Solution')); ?></h2>
                <p><?php echo esc_html($cx('可为客户提供远程技术支持、自动化方案设计、在线打样评估及全流程售后服务。公司致力于以智能化、数字化技术助力企业提升生产效率，为焊接、喷涂、打磨、搬运等行业提供高效稳定的一站式自动化解决方案。', 'ChenXuan provides remote technical support, automation solution design, online sample evaluation and full-process after-sales service. With intelligent and digital technologies, we help manufacturers improve productivity and deliver stable one-stop automation solutions for welding, spraying, grinding, handling and other applications.')); ?></p>
                <div class="service-guarantee-list">
                    <?php foreach ($guarantees as $item) : ?>
                    <div class="service-guarantee-item">
                        <strong><?php echo esc_html($item['title']); ?></strong>
                        <span><?php echo esc_html($item['desc']); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="service-solution-section">
    <div class="container">
        <div class="service-solution-layout">
            <div class="service-solution-copy" data-aos="fade-up">
                <span class="section-label"><?php echo esc_html($cx('方案流程', 'Solution Flow')); ?></span>
                <h2><?php echo esc_html($cx('标准化管理 + 非标定制', 'Standardized Management + Custom Engineering')); ?></h2>
                <p><?php echo esc_html($cx('辰轩在项目交付中兼顾标准流程与现场差异，从方案评估、工艺验证、设备集成、控制调试到现场培训，持续关注系统稳定性与生产效率。', 'ChenXuan balances standard project flow with site-specific needs, covering solution evaluation, process validation, equipment integration, control commissioning and on-site training while focusing on system stability and production efficiency.')); ?></p>
                <div class="service-process-grid">
                    <?php
                    $steps = [
                        ['需求分析', 'Requirement Analysis'],
                        ['方案设计', 'Solution Design'],
                        ['设备选型', 'Equipment Selection'],
                        ['工艺验证', 'Process Validation'],
                        ['现场交付', 'On-site Delivery'],
                        ['培训运维', 'Training and Maintenance'],
                    ];
                    foreach ($steps as $i => $step) :
                    ?>
                    <div class="service-process-item">
                        <span><?php echo esc_html($i + 1); ?></span>
                        <strong><?php echo esc_html($cx($step[0], $step[1])); ?></strong>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="service-solution-media" data-aos="fade-up" data-aos-delay="120">
                <img src="<?php echo esc_url($asset('solution/one-stop-solution.jpg')); ?>" alt="<?php echo esc_attr($cx('一站式解决方案流程图', 'One-stop solution flow diagram')); ?>" loading="lazy">
                <div class="service-qr-card">
                    <img src="<?php echo esc_url($asset('solution/tiktok-qr.jpg')); ?>" alt="<?php echo esc_attr($cx('TikTok二维码', 'TikTok QR code')); ?>" loading="lazy">
                    <div>
                        <strong><?php echo esc_html($cx('TikTok二维码', 'TikTok QR Code')); ?></strong>
                        <span><?php echo esc_html($cx('小程序入口已替换为TikTok二维码，方便海外客户了解项目动态。', 'The mini program entry is replaced with a TikTok QR code so overseas customers can follow project updates.')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="service-global-section" id="global-layout">
    <div class="container">
        <div class="service-global-layout">
            <div class="service-global-copy" data-aos="fade-right">
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
            <div class="service-global-media" data-aos="fade-left">
                <img src="<?php echo esc_url($asset('global/global-layout.jpg')); ?>" alt="<?php echo esc_attr($cx('辰轩全球布局展示', 'ChenXuan global layout showcase')); ?>" loading="lazy">
            </div>
        </div>
    </div>
</section>

<section class="service-faq-section" id="faq">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-label"><?php echo esc_html($cx('FAQ', 'FAQ')); ?></span>
            <h2 class="section-title"><?php echo esc_html($cx('常见问题', 'Frequently Asked Questions')); ?></h2>
        </div>
        <div class="service-faq-list" data-aos="fade-up">
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
        <div class="section-header" data-aos="fade-up">
            <span class="section-label"><?php echo esc_html($cx('After-sales FAQ', 'After-sales FAQ')); ?></span>
            <h2 class="section-title"><?php echo esc_html($cx('售后服务问题', 'After-sales Service Questions')); ?></h2>
        </div>
        <div class="service-faq-list compact" data-aos="fade-up">
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
        <div class="service-strategy-card" data-aos="fade-up">
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
