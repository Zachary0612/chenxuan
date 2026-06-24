</main><!-- #site-content -->

<?php
$solutions = function_exists('chenxuan_solutions') ? chenxuan_solutions() : [];
$services = function_exists('chenxuan_services') ? chenxuan_services() : [];
$applications = function_exists('chenxuan_applications') ? chenxuan_applications() : [];
$products = function_exists('chenxuan_product_families') ? chenxuan_product_families() : [];
$social_links = function_exists('chenxuan_social_links') ? chenxuan_social_links() : [];
$cx_footer_zh = static function($escaped) {
    $decoded = json_decode('"' . $escaped . '"');
    return is_string($decoded) ? $decoded : $escaped;
};
$chenxuan_phone = '13802728597';
$chenxuan_email = 'yanmei@chenxuanrobot.net';
$chenxuan_address = chenxuan_lx('山东省济南市历城区工业北路5577号中电建能源谷4-B-4', '4-B-4, Zhongdian Energy Valley, No. 5577 Gongye North Road, Licheng District, Jinan, Shandong');
?>

<div class="fixed-sidebar" id="fixed-sidebar">
    <div class="sidebar-brand" aria-label="<?php echo esc_attr(chenxuan_brand_name()); ?>">
        <?php echo esc_html(chenxuan_short_name()); ?>
    </div>
    <button class="sidebar-btn sidebar-consult" id="open-consult" title="<?php echo esc_attr(jaka_t('sidebar_consult')); ?>">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        <span><?php echo esc_html(jaka_t('sidebar_consult')); ?></span>
    </button>
    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="sidebar-btn sidebar-demo" title="<?php echo esc_attr(jaka_t('sidebar_sample')); ?>">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><polyline points="14,2 14,8 20,8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        <span><?php echo esc_html(jaka_t('sidebar_sample')); ?></span>
    </a>
    <button class="sidebar-btn sidebar-top" id="back-to-top" title="<?php echo esc_attr(jaka_t('back_to_top')); ?>">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M18 15l-6-6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        <span><?php echo esc_html(jaka_t('back_to_top')); ?></span>
    </button>
</div>

<footer class="site-footer">
    <div class="footer-main">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col footer-brand">
                    <div class="footer-logo">
                        <svg viewBox="0 0 150 36" fill="none" xmlns="http://www.w3.org/2000/svg" width="150">
                            <text x="0" y="27" font-family="Inter, 'Noto Sans SC', sans-serif" font-weight="800" font-size="28" fill="white"><?php echo esc_html(chenxuan_short_name()); ?></text>
                        </svg>
                    </div>
                    <p class="footer-desc"><?php echo esc_html(jaka_t('ftr_desc')); ?></p>
                    <div class="footer-contact-info">
                        <p class="footer-hotline-label"><?php echo esc_html(chenxuan_lx($cx_footer_zh('\u9879\u76ee\u54a8\u8be2'), 'Project Consultation')); ?></p>
                        <a href="<?php echo esc_url('tel:' . $chenxuan_phone); ?>" class="footer-phone">
                            <?php echo jaka_svg_icon('phone'); ?>
                            <span><?php echo esc_html($chenxuan_phone); ?></span>
                        </a>
                        <p class="footer-email-label"><?php echo esc_html(chenxuan_lx($cx_footer_zh('\u5de5\u7a0b\u6c9f\u901a'), 'Engineering Discussion')); ?></p>
                        <a href="<?php echo esc_url('mailto:' . $chenxuan_email); ?>" class="footer-email">
                            <?php echo jaka_svg_icon('email'); ?>
                            <span><?php echo esc_html($chenxuan_email); ?></span>
                        </a>
                        <p class="footer-address-label"><?php echo esc_html(chenxuan_lx($cx_footer_zh('\u516c\u53f8\u5730\u5740'), 'Company Address')); ?></p>
                        <div class="footer-addresses">
                            <p><?php echo esc_html($chenxuan_address); ?></p>
                        </div>
                    </div>
                </div>

                <div class="footer-col">
                    <h4 class="footer-title"><?php echo esc_html(jaka_t('nav_products')); ?></h4>
                    <ul class="footer-links">
                        <?php foreach (array_slice($products, 0, 2) as $product) : ?>
                        <li><a href="<?php echo esc_url(home_url('/products')); ?>"><?php echo esc_html($product['name']); ?></a></li>
                        <?php endforeach; ?>
                        <?php foreach (array_slice($applications, 0, 3) as $application) : ?>
                        <li><a href="<?php echo esc_url(home_url('/products')); ?>"><?php echo esc_html($application . chenxuan_lx($cx_footer_zh('\u81ea\u52a8\u5316\u7cfb\u7edf'), ' Automation System')); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4 class="footer-title"><?php echo esc_html(jaka_t('nav_solutions')); ?></h4>
                    <ul class="footer-links">
                        <?php foreach (array_slice($solutions, 0, 4) as $solution) : ?>
                        <li><a href="<?php echo esc_url(home_url('/solutions')); ?>"><?php echo esc_html($solution[0]); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4 class="footer-title"><?php echo esc_html(jaka_t('nav_service')); ?></h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(home_url('/service')); ?>"><?php echo esc_html(jaka_t('section_service')); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/service#after-sales')); ?>"><?php echo esc_html(chenxuan_lx($cx_footer_zh('\u552e\u540e\u670d\u52a1'), 'After-sales Service')); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/strategic-cooperation')); ?>"><?php echo esc_html(chenxuan_lx($cx_footer_zh('\u6218\u7565\u5408\u4f5c'), 'Strategic Cooperation')); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/download')); ?>"><?php echo esc_html(jaka_t('nav_download')); ?></a></li>
                    </ul>
                    <div class="footer-social-row">
                        <div class="footer-social" aria-label="<?php echo esc_attr(chenxuan_lx($cx_footer_zh('\u793e\u5a92\u8fde\u63a5'), 'Social Media')); ?>">
                            <?php foreach ($social_links as $social) : ?>
                            <a class="social-icon" href="<?php echo esc_url($social['url']); ?>" target="_blank" rel="noopener" title="<?php echo esc_attr($social['label']); ?>" aria-label="<?php echo esc_attr($social['label']); ?>" style="<?php echo !empty($social['color']) ? '--social-color:' . esc_attr($social['color']) . ';' : ''; ?>">
                                <?php if (!empty($social['icon'])) : ?>
                                <img src="<?php echo esc_url($social['icon']); ?>" alt="" loading="lazy">
                                <?php else : ?>
                                <?php echo esc_html($social['short']); ?>
                                <?php endif; ?>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="footer-col">
                    <h4 class="footer-title"><?php echo esc_html(jaka_t('nav_about')); ?></h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(home_url('/about')); ?>"><?php echo esc_html(chenxuan_lx($cx_footer_zh('\u4e86\u89e3\u8fb0\u8f69'), 'About ChenXuan')); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/news')); ?>"><?php echo esc_html(jaka_t('nav_news')); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact')); ?>"><?php echo esc_html(jaka_t('mega_contact')); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-contact">
                <a href="<?php echo esc_url('tel:' . $chenxuan_phone); ?>">
                    <?php echo jaka_svg_icon('phone'); ?>
                    <span><?php echo esc_html($chenxuan_phone); ?></span>
                </a>
                <a href="<?php echo esc_url('mailto:' . $chenxuan_email); ?>">
                    <?php echo jaka_svg_icon('email'); ?>
                    <span><?php echo esc_html($chenxuan_email); ?></span>
                </a>
            </div>
            <div class="footer-bottom-inner">
                <div class="footer-copyright">
                    <p>Copyright &copy;<?php echo esc_html(date('Y')); ?> <?php echo esc_html(chenxuan_brand_name()); ?>. All rights reserved.</p>
                </div>
                <div class="footer-legal">
                    <a href="<?php echo esc_url(chenxuan_legal_url('privacy-policy')); ?>"><?php echo esc_html(jaka_t('privacy_policy')); ?></a>
                    <a href="<?php echo esc_url(chenxuan_legal_url('user-agreement')); ?>"><?php echo esc_html(jaka_t('user_agreement')); ?></a>
                    <a href="<?php echo esc_url(chenxuan_legal_url('personal-info')); ?>"><?php echo esc_html(jaka_t('personal_info')); ?></a>
                    <a href="<?php echo esc_url(chenxuan_legal_url('cookie-policy')); ?>"><?php echo esc_html(jaka_t('cookie_policy')); ?></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="consult-overlay" id="consult-overlay">
    <div class="consult-modal">
        <div class="consult-modal-header">
            <h3><?php echo esc_html(jaka_t('sidebar_consult')); ?></h3>
            <button class="consult-close" id="consult-close" aria-label="Close">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            </button>
        </div>
        <form class="consult-form" id="consult-form">
            <input type="hidden" name="source" value="consult-modal">
            <input type="text" name="website" class="lead-hp" tabindex="-1" autocomplete="off">
            <div class="consult-form-row">
                <div class="consult-form-group">
                    <label><?php echo esc_html(jaka_t('contact_name')); ?> *</label>
                    <input type="text" name="name" required placeholder="<?php echo esc_attr(jaka_t('contact_name_ph')); ?>">
                </div>
                <div class="consult-form-group">
                    <label><?php echo esc_html(jaka_t('contact_phone')); ?> *</label>
                    <input type="tel" name="phone" required placeholder="<?php echo esc_attr(jaka_t('contact_phone_ph')); ?>">
                </div>
            </div>
            <div class="consult-form-row">
                <div class="consult-form-group">
                    <label><?php echo esc_html(jaka_t('contact_company')); ?> *</label>
                    <input type="text" name="company" required placeholder="<?php echo esc_attr(jaka_t('contact_company_ph')); ?>">
                </div>
                <div class="consult-form-group">
                    <label><?php echo esc_html(jaka_t('ct_industry')); ?></label>
                    <select name="industry">
                        <option value=""><?php echo esc_html(jaka_t('ct_select')); ?></option>
                        <?php foreach ($solutions as $solution) : ?>
                        <option value="<?php echo esc_attr($solution[0]); ?>"><?php echo esc_html($solution[0]); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="consult-form-group consult-form-full">
                <label><?php echo esc_html(jaka_t('contact_message')); ?> *</label>
                <textarea name="message" rows="4" required placeholder="<?php echo esc_attr(jaka_t('contact_message_ph')); ?>"></textarea>
            </div>
            <div class="consult-form-agree">
                <label><input type="checkbox" name="agree" required> <?php echo esc_html(jaka_t('contact_agree')); ?> <a href="<?php echo esc_url(chenxuan_legal_url('user-agreement')); ?>"><?php echo esc_html(jaka_t('user_agreement')); ?></a> &amp; <a href="<?php echo esc_url(chenxuan_legal_url('privacy-policy')); ?>"><?php echo esc_html(jaka_t('privacy_policy')); ?></a></label>
            </div>
            <button type="submit" class="btn btn-primary btn-lg consult-submit"><?php echo esc_html(jaka_t('contact_submit')); ?></button>
        </form>
    </div>
</div>

<div class="cookie-notice" id="cookie-notice">
    <div class="cookie-notice-inner">
        <p><?php echo esc_html(jaka_t('cookie_text')); ?> <a href="<?php echo esc_url(chenxuan_legal_url('cookie-policy')); ?>"><?php echo esc_html(jaka_t('cookie_policy')); ?></a></p>
        <div class="cookie-actions">
            <button class="btn btn-sm btn-primary" id="cookie-accept"><?php echo esc_html(jaka_t('cookie_accept')); ?></button>
            <button class="btn btn-sm btn-outline" id="cookie-decline"><?php echo esc_html(jaka_t('cookie_decline')); ?></button>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
