<?php
/**
 * Search Results Template (ChenXuan layout)
 */
get_header();

$search_query = get_search_query();

// Categorize results
$wp_results = [];
if ($search_query) {
    $q = new WP_Query([
        's' => $search_query,
        'posts_per_page' => 50,
        'post_type' => ['post', 'page', 'jaka_product', 'jaka_solution', 'jaka_case'],
    ]);
    if ($q->have_posts()) {
        while ($q->have_posts()) {
            $q->the_post();
            $type = get_post_type();
            $wp_results[$type][] = [
                'id'    => get_the_ID(),
                'title' => get_the_title(),
                'link'  => get_permalink(),
                'excerpt' => wp_trim_words(get_the_excerpt(), 30),
                'date'  => get_the_date('Y-m-d'),
            ];
        }
        wp_reset_postdata();
    }
}

$tab_map = [
    'download' => ['label' => jaka_t('search_tab_download', '资料下载'), 'types' => []],
    'faq'      => ['label' => jaka_t('search_tab_faq', '常见问题'), 'types' => ['post']],
    'product'  => ['label' => jaka_t('search_tab_product', '产品中心'), 'types' => ['jaka_product']],
    'solution' => ['label' => jaka_t('search_tab_solution', '解决方案'), 'types' => ['jaka_solution', 'jaka_case']],
    'news'     => ['label' => jaka_t('search_tab_news', '新闻中心'), 'types' => ['page']],
];

$tab_counts = [];
foreach ($tab_map as $key => $info) {
    $count = 0;
    foreach ($info['types'] as $t) {
        $count += isset($wp_results[$t]) ? count($wp_results[$t]) : 0;
    }
    $tab_counts[$key] = $count;
}
$total_count = array_sum($tab_counts);
$active_tab = 'download';
foreach ($tab_counts as $key => $count) {
    if ($count > 0) {
        $active_tab = $key;
        break;
    }
}
?>

<section class="search-page">
    <div class="search-page-inner">
        <!-- 搜索框 -->
        <div class="search-form-bar">
            <form action="<?php echo home_url('/'); ?>" method="get" class="search-form-inner">
                <svg class="search-form-icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                    <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.5"/>
                    <path d="M21 21l-4.35-4.35" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
                <input type="text" name="s" class="search-form-input"
                    placeholder="<?php echo esc_attr(jaka_t('search_placeholder', '输入您想要搜索的内容，如Zu 3...')); ?>"
                    value="<?php echo esc_attr($search_query); ?>" autofocus>
                <button type="submit" class="search-form-submit">
                    <?php echo jaka_t('btn_search', '搜索'); ?>
                </button>
            </form>
        </div>

        <div class="search-container container">
            <!-- 分类 tabs -->
            <div class="search-tabs">
                <?php
                foreach ($tab_map as $key => $info) :
                    $active = ($key === $active_tab) ? ' act' : '';
                ?>
                <div class="search-tab-item<?php echo $active; ?>" data-tab="<?php echo $key; ?>">
                    <?php echo esc_html($info['label']); ?>(<?php echo $tab_counts[$key]; ?>)
                </div>
                <?php endforeach; ?>
            </div>

            <!-- 搜索结果 -->
            <div class="search-results">
                <?php if ($search_query) : ?>
                <div class="search-tip">
                    <?php echo sprintf(jaka_t('search_found_tip', '为您找到 %s 个 "%s" 搜索结果'),
                        '<strong>' . $total_count . '</strong>',
                        '<span>' . esc_html($search_query) . '</span>'
                    ); ?>
                </div>
                <?php endif; ?>

                <?php foreach ($tab_map as $key => $info) :
                    $items = [];
                    foreach ($info['types'] as $t) {
                        if (isset($wp_results[$t])) {
                            $items = array_merge($items, $wp_results[$t]);
                        }
                    }
                ?>
                <div class="search-result-panel<?php echo $key === $active_tab ? ' active' : ''; ?>" data-panel="<?php echo esc_attr($key); ?>">
                    <?php if (empty($items)) : ?>
                    <div class="search-empty">
                        <svg width="100" height="100" viewBox="0 0 100 100" fill="none">
                            <circle cx="45" cy="45" r="28" stroke="#d0d6e0" stroke-width="3"/>
                            <path d="M65 65L85 85" stroke="#d0d6e0" stroke-width="3" stroke-linecap="round"/>
                            <line x1="35" y1="40" x2="55" y2="50" stroke="#d0d6e0" stroke-width="2"/>
                            <line x1="55" y1="40" x2="35" y2="50" stroke="#d0d6e0" stroke-width="2"/>
                        </svg>
                        <p><?php echo jaka_t('search_no_results', '暂无搜索结果'); ?></p>
                    </div>
                    <?php else : ?>
                    <ul class="search-result-list">
                        <?php foreach ($items as $item) : ?>
                        <li class="search-result-item">
                            <a href="<?php echo esc_url($item['link']); ?>" class="search-result-link">
                                <h3 class="search-result-title"><?php echo esc_html($item['title']); ?></h3>
                                <?php if (!empty($item['excerpt'])) : ?>
                                <p class="search-result-excerpt"><?php echo esc_html($item['excerpt']); ?></p>
                                <?php endif; ?>
                                <span class="search-result-date"><?php echo esc_html($item['date']); ?></span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var tabs = document.querySelectorAll('.search-tab-item');
    var panels = document.querySelectorAll('.search-result-panel');
    tabs.forEach(function(tab) {
        tab.addEventListener('click', function() {
            tabs.forEach(function(t) { t.classList.remove('act'); });
            panels.forEach(function(p) { p.classList.remove('active'); });
            tab.classList.add('act');
            var key = tab.dataset.tab;
            var panel = document.querySelector('.search-result-panel[data-panel="' + key + '"]');
            if (panel) panel.classList.add('active');
        });
    });
});
</script>

<?php get_footer(); ?>
