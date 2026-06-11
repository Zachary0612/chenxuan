<?php
/**
 * Template Name: 注册页面
 */
if (is_user_logged_in()) {
    wp_safe_redirect(home_url('/'));
    exit;
}
get_header();
?>

<section class="auth-section">
    <div class="auth-container">
        <h1 class="auth-title"><?php echo esc_html(jaka_t('auth_register_title')); ?></h1>

        <div class="auth-card">
            <!-- 密码注册 -->
            <div class="auth-panel active" id="auth-panel-reg-password">
                <form class="auth-form" id="register-pwd-form" method="post">
                    <?php wp_nonce_field('jaka_register', 'jaka_register_nonce'); ?>
                    <div class="form-group">
                        <label class="form-label"><?php echo esc_html(jaka_t('auth_account')); ?></label>
                        <input type="text" name="account" class="form-input" placeholder="<?php echo esc_attr(jaka_t('auth_account_reg_ph')); ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label"><?php echo esc_html(jaka_t('auth_password')); ?></label>
                        <input type="password" name="password" class="form-input" placeholder="<?php echo esc_attr(jaka_t('auth_set_pwd_ph')); ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label"><?php echo esc_html(jaka_t('auth_confirm_pwd')); ?></label>
                        <input type="password" name="password_confirm" class="form-input" placeholder="<?php echo esc_attr(jaka_t('auth_confirm_pwd_ph')); ?>" required>
                    </div>
                    <div class="form-agree" style="margin-top: 16px;">
                        <label class="checkbox-label">
                            <input type="checkbox" name="agree" required>
                            <span><?php echo esc_html(jaka_t('ct_agree')); ?> <a href="<?php echo esc_url(chenxuan_legal_url('user-agreement')); ?>"><?php echo esc_html(jaka_t('user_agreement')); ?></a>、<a href="<?php echo esc_url(chenxuan_legal_url('privacy-policy')); ?>"><?php echo esc_html(jaka_t('privacy_policy')); ?></a></span>
                        </label>
                    </div>
                    <button type="submit" class="btn-auth-submit"><?php echo esc_html(jaka_t('auth_register_btn')); ?></button>
                </form>
            </div>

            <div class="auth-footer-links">
                <span><?php echo esc_html(jaka_t('auth_has_account')); ?><a href="<?php echo esc_url(home_url('/login')); ?>"><?php echo esc_html(jaka_t('auth_login_link')); ?></a></span>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
