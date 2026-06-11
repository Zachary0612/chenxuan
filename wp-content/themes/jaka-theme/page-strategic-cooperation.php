<?php
/**
 * Template Name: 战略合作
 */
get_header();

$cx = function ($zh, $en) {
    return function_exists('chenxuan_lx') ? chenxuan_lx($zh, $en) : $zh;
};

$partnership_images = function_exists('chenxuan_partnership_images') ? chenxuan_partnership_images() : [];
$project_gallery = function_exists('chenxuan_project_gallery') ? chenxuan_project_gallery() : [];
$project_showcases = function_exists('chenxuan_project_showcases') ? chenxuan_project_showcases() : [];
?>

<section class="strategy-hero">
    <div class="container">
        <div class="strategy-hero-content" data-aos="fade-up">
            <span class="section-label"><?php echo esc_html($cx('战略合作', 'Strategic Cooperation')); ?></span>
            <h1><?php echo esc_html($cx('资源 · 战略合作 · 项目案例', 'Resources · Strategic Cooperation · Project Cases')); ?></h1>
            <p><?php echo esc_html($cx('通过国际展会、海外合作网络和真实项目案例，展示辰轩机器人在自动化集成、项目交付与全球服务方面的实践能力。', 'Through international exhibitions, overseas partner networks and real project cases, ChenXuan demonstrates its automation integration, project delivery and global service capabilities.')); ?></p>
        </div>
    </div>
</section>

<section class="strategy-main">
    <div class="container">
        <div class="strategy-layout">
            <aside class="strategy-sidebar" data-aos="fade-right">
                <nav aria-label="<?php echo esc_attr($cx('战略合作目录', 'Strategic cooperation directory')); ?>">
                    <a href="#exhibition-customers"><?php echo esc_html($cx('展会签约客户', 'Exhibition Customers')); ?></a>
                    <a href="#project-showcase"><?php echo esc_html($cx('项目展示', 'Project Showcase')); ?></a>
                    <a href="#video-cases"><?php echo esc_html($cx('项目案例视频', 'Project Case Videos')); ?></a>
                    <a href="<?php echo esc_url(home_url('/service')); ?>"><?php echo esc_html($cx('返回服务支持', 'Back to Service Support')); ?></a>
                </nav>
            </aside>

            <div class="strategy-content">
                <section class="strategy-section" id="exhibition-customers">
                    <div class="strategy-section-head" data-aos="fade-up">
                        <span class="section-label"><?php echo esc_html($cx('战略合作', 'Strategic Cooperation')); ?></span>
                        <h2><?php echo esc_html($cx('展会签约客户', 'Exhibition Customers')); ?></h2>
                        <p><?php echo esc_html($cx('持续参加国际行业展会，与全球客户和合作伙伴面对面沟通自动化项目需求。', 'ChenXuan continues to attend international industry exhibitions and communicates directly with global customers and partners about automation project needs.')); ?></p>
                    </div>
                    <div class="strategy-photo-grid exhibition-grid" data-aos="fade-up">
                        <?php foreach ($partnership_images as $i => $image) : ?>
                        <figure class="strategy-photo-card <?php echo $i % 5 === 0 ? 'wide' : ''; ?>">
                            <img src="<?php echo esc_url($image['src']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" loading="lazy">
                            <figcaption><?php echo esc_html($image['caption']); ?></figcaption>
                        </figure>
                        <?php endforeach; ?>
                    </div>
                </section>

                <section class="strategy-section" id="project-showcase">
                    <div class="strategy-section-head" data-aos="fade-up">
                        <span class="section-label"><?php echo esc_html($cx('项目展示', 'Project Showcase')); ?></span>
                        <h2><?php echo esc_html($cx('项目案例图片', 'Project Case Images')); ?></h2>
                        <p><?php echo esc_html($cx('覆盖焊接、AGV物流、自动化产线和机器人工作站等项目场景。', 'Project scenarios cover welding, AGV logistics, automation production lines and robot workstations.')); ?></p>
                    </div>
                    <div class="strategy-photo-grid project-grid" data-aos="fade-up">
                        <?php foreach ($project_gallery as $image) : ?>
                        <figure class="strategy-photo-card">
                            <img src="<?php echo esc_url($image['src']); ?>" alt="<?php echo esc_attr($image['title']); ?>" loading="lazy">
                            <figcaption><?php echo esc_html($image['title']); ?></figcaption>
                        </figure>
                        <?php endforeach; ?>
                    </div>
                </section>

                <section class="strategy-section" id="video-cases">
                    <div class="strategy-section-head" data-aos="fade-up">
                        <span class="section-label"><?php echo esc_html($cx('项目案例', 'Project Cases')); ?></span>
                        <h2><?php echo esc_html($cx('YouTube项目案例视频', 'YouTube Project Case Videos')); ?></h2>
                        <p><?php echo esc_html($cx('点击项目卡片可跳转至对应 YouTube 视频，查看设备运行和工艺应用效果。', 'Click a project card to open the corresponding YouTube video and view equipment operation and process application results.')); ?></p>
                    </div>
                    <div class="strategy-video-grid" data-aos="fade-up">
                        <?php foreach ($project_showcases as $i => $video) : ?>
                        <a class="strategy-video-card" href="<?php echo esc_url($video['url']); ?>" target="_blank" rel="noopener">
                            <span class="strategy-video-index"><?php echo esc_html(str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT)); ?></span>
                            <span class="strategy-video-play" aria-hidden="true"></span>
                            <h3><?php echo esc_html($video['title']); ?></h3>
                            <span class="strategy-video-link"><?php echo esc_html($cx('查看视频', 'Watch Video')); ?> <?php echo jaka_svg_icon('arrow-right'); ?></span>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
