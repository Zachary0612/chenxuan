<?php get_header(); ?>

<div class="page-banner page-banner-sm">
    <div class="container">
        <h1 class="page-banner-title"><?php wp_title('', true); ?></h1>
    </div>
</div>

<div class="blog-section">
    <div class="container">
        <div class="blog-grid">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
                        <p class="blog-card-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                        <a href="<?php the_permalink(); ?>" class="news-readmore">
                            阅读更多 <?php echo jaka_svg_icon('arrow-right'); ?>
                        </a>
                    </div>
                </article>
            <?php endwhile; ?>

                <div class="pagination-wrap">
                    <?php the_posts_pagination([
                        'mid_size' => 2,
                        'prev_text' => '&laquo;',
                        'next_text' => '&raquo;',
                    ]); ?>
                </div>

            <?php else : ?>
                <div class="no-posts">
                    <h2>暂无内容</h2>
                    <p>请稍后再来查看。</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
