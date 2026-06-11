<?php get_header(); ?>

<section class="error-404-section">
    <div class="container">
        <div class="error-404-content" data-aos="fade-up">
            <div class="error-404-number">
                <span class="error-4">4</span>
                <span class="error-0">
                    <div class="error-robot-circle">
                        <div class="error-robot-eye left"></div>
                        <div class="error-robot-eye right"></div>
                    </div>
                </span>
                <span class="error-4">4</span>
            </div>
            <h1><?php echo jaka_t('err_404_title'); ?></h1>
            <p><?php echo jaka_t('err_404_desc'); ?></p>
            <div class="error-actions">
                <a href="<?php echo home_url('/'); ?>" class="btn btn-primary btn-lg"><?php echo jaka_t('err_404_home'); ?></a>
                <a href="<?php echo home_url('/contact'); ?>" class="btn btn-outline-light btn-lg"><?php echo jaka_t('mega_contact'); ?></a>
            </div>
        </div>
    </div>
</section>

<style>
.error-404-section {
    min-height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding-top: var(--header-height);
}
.error-404-number {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-bottom: 30px;
}
.error-4 {
    font-family: var(--font-display);
    font-size: 140px;
    font-weight: 900;
    color: var(--color-white);
    line-height: 1;
    opacity: 0.15;
}
.error-robot-circle {
    width: 120px;
    height: 120px;
    border: 6px solid var(--color-primary);
    border-radius: 50%;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    animation: float 4s ease-in-out infinite;
}
.error-robot-eye {
    width: 16px;
    height: 16px;
    background: var(--color-primary);
    border-radius: 50%;
    animation: pulse 2s ease-in-out infinite;
}
.error-404-content h1 {
    font-size: 36px;
    font-weight: 700;
    color: var(--color-white);
    margin-bottom: 12px;
}
.error-404-content p {
    font-size: 17px;
    color: var(--color-gray-400);
    margin-bottom: 36px;
}
.error-actions { display: flex; gap: 16px; justify-content: center; }
@media (max-width: 576px) {
    .error-4 { font-size: 80px; }
    .error-robot-circle { width: 70px; height: 70px; }
    .error-robot-eye { width: 10px; height: 10px; }
    .error-404-content h1 { font-size: 26px; }
    .error-actions { flex-direction: column; }
}
</style>

<?php get_footer(); ?>
