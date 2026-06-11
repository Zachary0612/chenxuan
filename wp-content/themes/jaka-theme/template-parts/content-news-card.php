<?php
/**
 * Template Part: News Card (for AJAX load more)
 */
?>
<article class="blog-card" data-aos="fade-up">
    <div class="blog-card-img">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('news-thumb'); ?>
        <?php else : ?>
            <div class="news-placeholder-img"></div>
        <?php endif; ?>
    </div>
    <div class="blog-card-body">
        <div class="blog-card-meta">
            <span class="news-date"><?php echo get_the_date('Y.m.d'); ?></span>
            <?php the_category(', '); ?>
        </div>
        <h2 class="blog-card-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <p class="blog-card-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
        <a href="<?php the_permalink(); ?>" class="news-readmore">
            阅读更多 <?php echo jaka_svg_icon('arrow-right'); ?>
        </a>
    </div>
</article>
