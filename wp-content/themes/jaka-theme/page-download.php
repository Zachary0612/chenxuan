<?php
/**
 * Template Name: 下载中心
 */
get_header();

$can_download = is_user_logged_in();
$download_page_url = home_url('/download');
$login_url = add_query_arg('redirect_to', $download_page_url, home_url('/login'));
$register_url = add_query_arg('redirect_to', $download_page_url, home_url('/register'));

$dl_categories = [
    'all' => ['label' => chenxuan_lx('全部资料', 'All Resources'), 'children' => []],
    'robots' => ['label' => chenxuan_lx('机器人选型手册', 'Robot Catalogs'), 'children' => [
        'collaborative' => chenxuan_lx('协作机器人', 'Collaborative Robots'),
        'dual_arm' => chenxuan_lx('双臂机器人', 'Dual-arm Robots'),
        'parallel' => chenxuan_lx('并联机器人', 'Parallel Robots'),
    ]],
    'process' => ['label' => chenxuan_lx('工艺应用资料', 'Process Applications'), 'children' => [
        'spraying' => chenxuan_lx('喷涂与焊接', 'Spraying and Welding'),
        'cutting' => chenxuan_lx('激光切割', 'Laser Cutting'),
    ]],
    'project' => ['label' => chenxuan_lx('项目展示手册', 'Project Brochures'), 'children' => [
        'showcase' => chenxuan_lx('辰轩项目展示', 'ChenXuan Project Showcase'),
    ]],
];

$dl_groups = [
    'collaborative' => [
        'title' => chenxuan_lx('协作机器人选型手册', 'Collaborative Robot Catalogs'),
        'items' => [
            ['name' => 'Chenxuan Collaborative Palletizing Robot Catalog（协作码垛）', 'file' => 'collaborative-palletizing-catalog.pdf', 'date' => '2026/06/08'],
            ['name' => 'Chenxuan Collaborative Welding Robot Catalog', 'file' => 'collaborative-welding-catalog.pdf', 'date' => '2026/06/08'],
            ['name' => 'Chen Xuan Cooperative Robot User Manual V1.1', 'file' => 'cooperative-robot-user-manual.pdf', 'date' => '2026/06/08'],
        ],
    ],
    'dual_arm' => [
        'title' => chenxuan_lx('双臂机器人选型手册', 'Dual-arm Robot Catalogs'),
        'items' => [
            ['name' => 'Chenxuan Dual-Arm Robot Catalog 双臂机器人英文版', 'file' => 'dual-arm-robot-catalog-en.pdf', 'date' => '2026/06/08'],
            ['name' => '辰轩双臂助理机器人', 'file' => 'dual-arm-assistant-robot.pdf', 'date' => '2026/06/08'],
        ],
    ],
    'parallel' => [
        'title' => chenxuan_lx('并联机器人选型手册', 'Parallel Robot Catalog'),
        'items' => [
            ['name' => 'Chenxuan Parallel Robot Catalog 并联机器人目录', 'file' => 'parallel-robot-catalog.pdf', 'date' => '2026/06/08'],
        ],
    ],
    'spraying' => [
        'title' => chenxuan_lx('喷涂与焊接应用资料', 'Spraying and Welding Resources'),
        'items' => [
            ['name' => 'Catalog of Chenxuan Spraying Robots 辰轩喷涂机器人目录', 'file' => 'spraying-robot-catalog.pdf', 'date' => '2026/06/08'],
        ],
    ],
    'cutting' => [
        'title' => chenxuan_lx('激光切割选型手册', 'Laser Cutting Catalog'),
        'items' => [
            ['name' => 'Chenxuan Laser Cutting Robot（激光切割）', 'file' => 'laser-cutting-robot.pdf', 'date' => '2026/06/08'],
        ],
    ],
    'showcase' => [
        'title' => chenxuan_lx('辰轩项目展示手册', 'ChenXuan Project Showcase'),
        'items' => [
            ['name' => '山东辰轩机器人科技有限公司样册', 'file' => 'chenxuan-project-showcase.pdf', 'date' => '2026/06/08'],
        ],
    ],
];
?>

<div class="dlc-page">
    <div class="dlc-search-bar">
        <div class="dlc-search-inner">
            <svg class="dlc-search-icon" width="18" height="18" viewBox="0 0 18 18" fill="none"><circle cx="8" cy="8" r="6.5" stroke="#999" stroke-width="1.5"/><path d="M13 13l3.5 3.5" stroke="#999" stroke-width="1.5" stroke-linecap="round"/></svg>
            <input type="text" class="dlc-search-input" placeholder="<?php echo esc_attr(chenxuan_lx('输入产品、工艺或资料名称', 'Search by product, process or document name')); ?>">
        </div>
    </div>

    <div class="dlc-body">
        <aside class="dlc-sidebar">
            <div class="dlc-sidebar-inner">
                <div class="dlc-tree">
                    <?php foreach ($dl_categories as $cat_key => $cat) : ?>
                    <div class="dlc-tree-group<?php echo $cat_key === 'all' ? ' active-group expanded' : ''; ?>">
                        <div class="dlc-tree-item<?php echo $cat_key === 'all' ? ' active' : ''; ?><?php echo !empty($cat['children']) ? ' dlc-tree-parent' : ''; ?>" data-filter="<?php echo esc_attr($cat_key); ?>">
                            <span class="dlc-tree-label"><?php echo esc_html($cat['label']); ?></span>
                            <?php if (!empty($cat['children'])) : ?>
                            <svg class="dlc-tree-arrow" width="12" height="12" viewBox="0 0 12 12"><path d="M4 3l4 3-4 3" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($cat['children'])) : ?>
                        <div class="dlc-tree-children">
                            <?php foreach ($cat['children'] as $child_key => $child_label) : ?>
                            <div class="dlc-tree-item dlc-tree-child" data-filter="<?php echo esc_attr($child_key); ?>">
                                <span class="dlc-tree-label"><?php echo esc_html($child_label); ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </aside>

        <div class="dlc-content">
            <?php if (!$can_download) : ?>
            <div class="dlc-access-notice" role="status">
                <div class="dlc-access-icon">
                    <?php echo jaka_svg_icon('lock'); ?>
                </div>
                <div class="dlc-access-copy">
                    <strong><?php echo esc_html(chenxuan_lx('登录后即可预览和下载资料', 'Sign in to preview and download resources')); ?></strong>
                    <span><?php echo esc_html(chenxuan_lx('产品手册、工艺资料等文件仅向已注册用户开放。', 'Product manuals and process resources are available to registered users only.')); ?></span>
                </div>
                <div class="dlc-access-actions">
                    <a class="dlc-access-login" href="<?php echo esc_url($login_url); ?>"><?php echo esc_html(jaka_t('btn_login')); ?></a>
                    <a class="dlc-access-register" href="<?php echo esc_url($register_url); ?>"><?php echo esc_html(jaka_t('btn_register')); ?></a>
                </div>
            </div>
            <?php endif; ?>
            <?php foreach ($dl_groups as $group_key => $group) : ?>
            <div class="dlc-group" data-group="<?php echo esc_attr($group_key); ?>">
                <h3 class="dlc-group-title"><?php echo esc_html($group['title']); ?></h3>
                <div class="dlc-list">
                    <?php foreach ($group['items'] as $item) : ?>
                    <?php
                    $preview_url = $can_download ? chenxuan_protected_download_url($item['file'], 'inline') : $login_url;
                    $file_url = $can_download ? chenxuan_protected_download_url($item['file'], 'download') : $login_url;
                    ?>
                    <div class="dlc-row" data-cat="<?php echo esc_attr($group_key); ?>">
                        <div class="dlc-row-left">
                            <div class="dlc-row-info">
                                <span class="dlc-file-badge">PDF</span>
                                <span class="dlc-file-name"><?php echo esc_html(chenxuan_l($item['name'])); ?></span>
                            </div>
                            <div class="dlc-row-tools">
                                <a href="<?php echo esc_url($preview_url); ?>" class="dlc-tool-link<?php echo !$can_download ? ' is-locked' : ''; ?>"<?php echo $can_download ? ' target="_blank" rel="noopener"' : ''; ?>>
                                    <svg width="18" height="12" viewBox="0 0 21 13" fill="none"><path d="M10.4 12.4c5.5 0 9.9-5.9 9.9-5.9S15.9.5 10.4.5.5 6.4.5 6.4s4.4 6 9.9 6z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/><circle cx="10.4" cy="6.4" r="2.5" stroke="currentColor" stroke-width="1.3"/></svg>
                                    <?php echo esc_html(chenxuan_lx('预览', 'Preview')); ?>
                                </a>
                                <a href="<?php echo esc_url($file_url); ?>" class="dlc-tool-link<?php echo !$can_download ? ' is-locked' : ''; ?>"<?php echo $can_download ? ' download' : ''; ?>>
                                    <?php echo jaka_svg_icon('download'); ?>
                                    <?php echo esc_html(jaka_t('nav_download')); ?>
                                </a>
                            </div>
                        </div>
                        <div class="dlc-row-right">
                            <span class="dlc-row-date"><?php echo esc_html($item['date']); ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
