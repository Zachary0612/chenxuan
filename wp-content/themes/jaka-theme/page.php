<?php get_header(); ?>

<div class="page-banner page-banner-sm">
    <div class="container">
        <h1 class="page-banner-title"><?php the_title(); ?></h1>
        <?php if (function_exists('yoast_breadcrumb')) : ?>
            <?php yoast_breadcrumb('<nav class="breadcrumb">', '</nav>'); ?>
        <?php endif; ?>
    </div>
</div>

<div class="page-content-section">
    <div class="container container-narrow">
        <?php while (have_posts()) : the_post(); ?>
            <article class="page-article">
                <?php the_content(); ?>
            </article>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>
