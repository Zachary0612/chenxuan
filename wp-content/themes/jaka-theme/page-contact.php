<?php
/**
 * Template Name: 联系辰轩
 */
get_header();

$solutions = function_exists('chenxuan_solutions') ? chenxuan_solutions() : [];
$applications = function_exists('chenxuan_applications') ? chenxuan_applications() : [];
$chenxuan_phone = '13802728597';
$chenxuan_email = 'info@industry-robots.com';
$chenxuan_address = chenxuan_lx('山东省济南市历城区工业北路中电建能源谷4-B-4', '4-B-4, Zhongdian Energy Valley, Gongye North Road, Licheng District, Jinan City, Shandong Province');
?>

<section class="page-hero contact-hero">
    <div class="page-hero-bg">
        <div class="hero-overlay" style="background: linear-gradient(135deg, rgba(0,5,20,0.92), rgba(15,118,110,0.75))"></div>
    </div>
    <div class="container">
        <div class="page-hero-content" data-aos="fade-up">
            <span class="section-label"><?php echo esc_html(jaka_t('mega_contact')); ?></span>
            <h1><?php echo esc_html(jaka_t('pg_contact_title')); ?></h1>
            <p><?php echo esc_html(jaka_t('pg_contact_desc')); ?></p>
        </div>
    </div>
</section>

<section class="contact-info-section section-dark">
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
                        <div class="benefit-check">✓</div>
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
                            <label for="contact-application"><?php echo esc_html(chenxuan_l('应用工艺')); ?></label>
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

<section class="offices-section section-dark">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-label"><?php echo esc_html(jaka_t('ct_offices')); ?></span>
            <h2 class="section-title"><?php echo esc_html(jaka_t('ct_offices')); ?></h2>
        </div>
        <div class="offices-grid">
            <?php foreach (array_slice($solutions, 0, 4) as $i => $solution) : ?>
            <div class="office-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr(($i + 1) * 100); ?>">
                <h3><?php echo esc_html($solution[0]); ?></h3>
                <p class="office-address"><?php echo esc_html($solution[1]); ?></p>
                <p class="office-phone"><?php echo jaka_svg_icon('phone'); ?> <?php echo esc_html(jaka_t('btn_consult')); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
