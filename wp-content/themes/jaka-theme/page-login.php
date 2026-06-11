<?php
/**
 * Template Name: 登录页面
 */
if (is_user_logged_in()) {
    wp_safe_redirect(home_url('/'));
    exit;
}
get_header();
?>

<section class="auth-section">
    <div class="auth-container">
        <h1 class="auth-title"><?php echo esc_html(jaka_t('auth_login_title')); ?></h1>
        <div class="auth-card">
            <!-- 密码登录 -->
            <div class="auth-panel active" id="auth-panel-password">
                <form class="auth-form" id="login-pwd-form" method="post">
                    <?php wp_nonce_field('jaka_login', 'jaka_login_nonce'); ?>
                    <div class="form-group">
                        <label class="form-label">
                            <svg width="14" height="15" viewBox="0 0 14 15" fill="none"><circle cx="7" cy="4" r="3" stroke="#333" stroke-width="1"/><path d="M1 14c0-3.3 2.7-6 6-6" stroke="#333" stroke-width="1"/></svg>
                            <?php echo esc_html(jaka_t('auth_account')); ?>
                        </label>
                        <input type="text" name="account" class="form-input" placeholder="<?php echo esc_attr(jaka_t('auth_account_ph')); ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><rect x="1" y="6" width="12" height="7" rx="1" stroke="#333" stroke-width="1"/><path d="M4 6V4a3 3 0 116 0v2" stroke="#333" stroke-width="1"/></svg>
                            <?php echo esc_html(jaka_t('auth_password')); ?>
                        </label>
                        <input type="password" name="password" class="form-input" placeholder="<?php echo esc_attr(jaka_t('auth_password_ph')); ?>" required>
                    </div>
                    <div class="form-agree">
                        <label class="checkbox-label">
                            <input type="checkbox" name="agree" required>
                            <span><?php echo esc_html(jaka_t('ct_agree')); ?> <a href="<?php echo esc_url(chenxuan_legal_url('user-agreement')); ?>"><?php echo esc_html(jaka_t('user_agreement')); ?></a>、<a href="<?php echo esc_url(chenxuan_legal_url('privacy-policy')); ?>"><?php echo esc_html(jaka_t('privacy_policy')); ?></a></span>
                        </label>
                    </div>
                    <button type="submit" class="btn-auth-submit"><?php echo esc_html(jaka_t('auth_login_btn')); ?></button>
                </form>
            </div>

            <div class="auth-footer-links">
                <span><?php echo esc_html(jaka_t('auth_new_user')); ?><a href="<?php echo esc_url(home_url('/register')); ?>"><?php echo esc_html(jaka_t('auth_register_link')); ?></a></span>
                <a href="<?php echo esc_url(wp_lostpassword_url()); ?>" class="forgot-link"><?php echo esc_html(jaka_t('auth_forgot')); ?></a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
