<?php
/**
 * Virtual legal information page.
 */

$legal_page = function_exists('chenxuan_legal_page_data') ? chenxuan_legal_page_data() : null;
if (!$legal_page) {
    status_header(404);
    get_template_part('404');
    return;
}

get_header();
?>

<section class="page-hero slim-hero">
    <div class="container">
        <div class="page-hero-content">
            <span class="section-label"><?php echo esc_html(chenxuan_l('辰轩官网')); ?></span>
            <h1><?php echo esc_html($legal_page['title']); ?></h1>
            <p><?php echo esc_html(jaka_t('mega_about_tagline')); ?></p>
        </div>
    </div>
</section>

<section style="padding:70px 0;">
    <div class="container">
        <article style="max-width:860px;background:var(--color-bg);border:1px solid var(--color-border);border-radius:var(--radius-lg);padding:34px;line-height:1.9;color:var(--color-gray-700);">
            <p><?php echo esc_html($legal_page['body']); ?></p>
            <p><?php echo esc_html(jaka_t('legal_contact_note')); ?></p>
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary" style="margin-top:18px;">
                <?php echo esc_html(jaka_t('mega_contact')); ?> <?php echo jaka_svg_icon('arrow-right'); ?>
            </a>
        </article>
    </div>
</section>

<?php get_footer(); ?>
