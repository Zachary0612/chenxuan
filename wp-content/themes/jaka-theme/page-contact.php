<?php
/**
 * Template Name: 联系我们
 */
get_header();

$solutions = function_exists('chenxuan_solutions') ? chenxuan_solutions() : [];
$applications = function_exists('chenxuan_applications') ? chenxuan_applications() : [];
$chenxuan_phone = '13802728597';
$chenxuan_email = 'info@industry-robots.com';
$cx = static function($zh, $en) {
    return function_exists('chenxuan_lx') ? chenxuan_lx($zh, $en) : $zh;
};

$chenxuan_address = $cx(
    '山东济南历城区工业北路5577号中电建能源谷4-B-4',
    '4-B-4, Zhongdian Energy Valley, Gongye North Road, Licheng District, Jinan City, Shandong Province'
);

$offices = [
    [
        'id' => 'jinan',
        'city' => $cx('济南', 'Jinan'),
        'label' => $cx('中国济南', 'Jinan, China'),
        'address' => $cx('山东济南历城区工业北路5577号中电建能源谷4-B-4', '4-B-4, Zhongdian Energy Valley, Gongye North Road, Licheng District, Jinan City, Shandong Province'),
        'pin_x' => '78.8%',
        'pin_y' => '36.9%',
        'map_x' => '0%',
        'map_y' => '0%',
    ],
    [
        'id' => 'xian',
        'city' => $cx('西安', "Xi'an"),
        'label' => $cx('中国西安', "Xi'an, China"),
        'address' => $cx('西安市灞桥区秦汉大道2288号创新产业基地1期4号楼102', "Room 102, Building 4, Phase 1 Innovation Industrial Base, No. 2288 Qinhan Avenue, Baqiao District, Xi'an"),
        'pin_x' => '77.2%',
        'pin_y' => '38.1%',
        'map_x' => '0%',
        'map_y' => '0%',
    ],
    [
        'id' => 'hangzhou',
        'city' => $cx('杭州', 'Hangzhou'),
        'label' => $cx('中国杭州', 'Hangzhou, China'),
        'address' => $cx('杭州市余杭区五常街道郭家兜路8号', 'No. 8 Guojiadou Road, Wuchang Subdistrict, Yuhang District, Hangzhou'),
        'pin_x' => '80.2%',
        'pin_y' => '38.7%',
        'map_x' => '0%',
        'map_y' => '0%',
    ],
];
?>

<section class="page-hero contact-hero contact-hero-light">
    <div class="page-hero-bg"></div>
    <div class="container">
        <div class="page-hero-content" data-aos="fade-up">
            <span class="section-label"><?php echo esc_html(jaka_t('mega_contact')); ?></span>
            <h1><?php echo esc_html(jaka_t('pg_contact_title')); ?></h1>
            <p><?php echo esc_html(jaka_t('pg_contact_desc')); ?></p>
        </div>
    </div>
</section>

<section class="contact-info-section">
    <div class="container">
        <div class="contact-cards-grid">
            <div class="contact-info-card" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-icon"><?php echo jaka_svg_icon('phone'); ?></div>
                <h3><?php echo esc_html(jaka_t('ct_phone')); ?></h3>
                <p class="contact-value"><a href="<?php echo esc_url('tel:' . $chenxuan_phone); ?>"><?php echo esc_html($chenxuan_phone); ?></a></p>
                <p class="contact-note"><?php echo esc_html(jaka_t('ct_phone_note')); ?></p>
            </div>
            <div class="contact-info-card" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-icon"><?php echo jaka_svg_icon('email'); ?></div>
                <h3><?php echo esc_html(jaka_t('ct_email')); ?></h3>
                <p class="contact-value"><a href="<?php echo esc_url('mailto:' . $chenxuan_email); ?>"><?php echo esc_html($chenxuan_email); ?></a></p>
                <p class="contact-note"><?php echo esc_html(jaka_t('ct_email_note')); ?></p>
            </div>
            <div class="contact-info-card" data-aos="fade-up" data-aos-delay="300">
                <div class="contact-icon"><?php echo jaka_svg_icon('globe'); ?></div>
                <h3><?php echo esc_html(jaka_t('ct_address')); ?></h3>
                <p class="contact-value contact-address-value"><?php echo esc_html($chenxuan_address); ?></p>
                <p class="contact-note"><?php echo esc_html(jaka_t('ct_address_note')); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="contact-form-section">
    <div class="container">
        <div class="contact-form-grid">
            <div class="contact-form-intro" data-aos="fade-right">
                <span class="section-label"><?php echo esc_html(jaka_t('ct_form_title')); ?></span>
                <h2 class="section-title"><?php echo esc_html(jaka_t('ct_form_title')); ?></h2>
                <p><?php echo esc_html(jaka_t('ct_form_desc')); ?></p>
                <div class="contact-benefits">
                    <?php foreach ([jaka_t('ct_benefit1'), jaka_t('ct_benefit2'), jaka_t('ct_benefit3'), jaka_t('ct_benefit4')] as $benefit) : ?>
                    <div class="benefit-item">
                        <div class="benefit-check">&#10003;</div>
                        <span><?php echo esc_html($benefit); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="contact-form-wrap" data-aos="fade-left">
                <form class="contact-form" id="contact-form" method="post">
                    <input type="hidden" name="source" value="contact-page">
                    <input type="text" name="website" class="lead-hp" tabindex="-1" autocomplete="off">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-name"><?php echo esc_html(jaka_t('ct_name')); ?> <span class="required">*</span></label>
                            <input type="text" id="contact-name" name="name" required placeholder="<?php echo esc_attr(jaka_t('ct_name_ph')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="contact-company"><?php echo esc_html(jaka_t('ct_company')); ?> <span class="required">*</span></label>
                            <input type="text" id="contact-company" name="company" required placeholder="<?php echo esc_attr(jaka_t('ct_company_ph')); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-phone"><?php echo esc_html(jaka_t('ct_phone_label')); ?> <span class="required">*</span></label>
                            <input type="tel" id="contact-phone" name="phone" required placeholder="<?php echo esc_attr(jaka_t('ct_phone_ph')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="contact-email"><?php echo esc_html(jaka_t('ct_email_label')); ?></label>
                            <input type="email" id="contact-email" name="email" placeholder="<?php echo esc_attr(jaka_t('ct_email_ph')); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-industry"><?php echo esc_html(jaka_t('ct_industry')); ?></label>
                            <select id="contact-industry" name="industry">
                                <option value=""><?php echo esc_html(jaka_t('ct_select')); ?></option>
                                <?php foreach ($solutions as $solution) : ?>
                                <option value="<?php echo esc_attr($solution[0]); ?>"><?php echo esc_html($solution[0]); ?></option>
                                <?php endforeach; ?>
                                <option value="other"><?php echo esc_html(jaka_t('ct_other')); ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="contact-application"><?php echo esc_html($cx('应用工艺', 'Application Process')); ?></label>
                            <select id="contact-application" name="application">
                                <option value=""><?php echo esc_html(jaka_t('ct_select')); ?></option>
                                <?php foreach ($applications as $application) : ?>
                                <option value="<?php echo esc_attr($application); ?>"><?php echo esc_html($application); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact-message"><?php echo esc_html(jaka_t('ct_message')); ?> <span class="required">*</span></label>
                        <textarea id="contact-message" name="message" rows="5" required placeholder="<?php echo esc_attr(jaka_t('ct_message_ph')); ?>"></textarea>
                    </div>
                    <div class="form-group form-checkbox">
                        <label>
                            <input type="checkbox" name="agree" required>
                            <span><?php echo esc_html(jaka_t('ct_agree')); ?> <a href="<?php echo esc_url(chenxuan_legal_url('privacy-policy')); ?>"><?php echo esc_html(jaka_t('privacy_policy')); ?></a> <?php echo esc_html(jaka_t('ct_and')); ?> <a href="<?php echo esc_url(chenxuan_legal_url('user-agreement')); ?>"><?php echo esc_html(jaka_t('user_agreement')); ?></a></span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-full"><?php echo esc_html(jaka_t('ct_submit')); ?></button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="offices-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-label"><?php echo esc_html($cx('服务网络', 'Service Network')); ?></span>
            <h2 class="section-title"><?php echo esc_html($cx('覆盖重点城市，快速响应自动化项目需求', 'Key Service Locations for Automation Projects')); ?></h2>
        </div>
        <div class="contact-network-stage" data-office-map style="--office-map-bg: url('<?php echo esc_url(add_query_arg('v', JAKA_VERSION, trailingslashit(JAKA_URI) . 'assets/images/about/world-map.png')); ?>');">
            <div class="contact-network-map" aria-hidden="true">
                <div class="contact-network-map-layer"></div>
                <div class="contact-network-pins">
                    <?php foreach ($offices as $i => $office) : ?>
                    <span
                        class="contact-network-pin <?php echo $i === 0 ? 'is-active' : ''; ?>"
                        data-office-pin="<?php echo esc_attr($office['id']); ?>"
                        style="--pin-x: <?php echo esc_attr($office['pin_x']); ?>; --pin-y: <?php echo esc_attr($office['pin_y']); ?>;"
                    >
                        <span><?php echo esc_html($office['label']); ?></span>
                    </span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="offices-grid contact-network-cards">
            <?php foreach ($offices as $i => $office) : ?>
            <button
                type="button"
                class="office-card <?php echo $i === 0 ? 'is-active' : ''; ?>"
                data-office-card="<?php echo esc_attr($office['id']); ?>"
                data-map-x="<?php echo esc_attr($office['map_x']); ?>"
                data-map-y="<?php echo esc_attr($office['map_y']); ?>"
                aria-pressed="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                aria-expanded="false"
                data-aos="fade-up"
                data-aos-delay="<?php echo esc_attr(($i + 1) * 100); ?>"
            >
                <span class="office-card-index"><?php echo esc_html(str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT)); ?></span>
                <h3><?php echo esc_html($office['city']); ?></h3>
                <div class="office-card-detail">
                    <p class="office-address"><?php echo jaka_svg_icon('globe'); ?> <?php echo esc_html($office['address']); ?></p>
                    <p class="office-phone"><?php echo jaka_svg_icon('phone'); ?> <?php echo esc_html($chenxuan_phone); ?></p>
                    <p class="office-email"><?php echo jaka_svg_icon('email'); ?> <?php echo esc_html($chenxuan_email); ?></p>
                </div>
            </button>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
