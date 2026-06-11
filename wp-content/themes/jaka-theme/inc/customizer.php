<?php
/**
 * ChenXuan Theme Customizer - 主题后台设置
 * 
 * 通过 WordPress 自定义器管理所有首页内容
 * 后台路径：外观 > 自定义
 */

if (!defined('ABSPATH')) exit;

function jaka_customizer_register($wp_customize) {

    // ═══════════════════════════════════════
    // 面板：首页设置
    // ═══════════════════════════════════════
    $wp_customize->add_panel('jaka_homepage', [
        'title'    => '首页内容管理',
        'priority' => 20,
    ]);

    // ─── Banner轮播区域（最多5张）───
    $wp_customize->add_section('jaka_banner', [
        'title' => 'Banner轮播',
        'panel' => 'jaka_homepage',
        'priority' => 10,
        'description' => '设置首页轮播Banner，最多5张。标题中用 &lt;em&gt;文字&lt;/em&gt; 标记红色高亮。',
    ]);

    for ($s = 1; $s <= 5; $s++) {
        $wp_customize->add_setting("banner_{$s}_bg", ['default' => '', 'sanitize_callback' => 'absint']);
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, "banner_{$s}_bg", [
            'label' => "Banner {$s} - 背景图片",
            'section' => 'jaka_banner',
            'mime_type' => 'image',
        ]));

        $wp_customize->add_setting("banner_{$s}_title", ['default' => '', 'sanitize_callback' => 'wp_kses_post']);
        $wp_customize->add_control("banner_{$s}_title", [
            'label' => "Banner {$s} - 标题（<em>高亮</em>）",
            'section' => 'jaka_banner',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("banner_{$s}_desc", ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control("banner_{$s}_desc", [
            'label' => "Banner {$s} - 副标题",
            'section' => 'jaka_banner',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("banner_{$s}_btn1_text", ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control("banner_{$s}_btn1_text", [
            'label' => "Banner {$s} - 按钮1文字",
            'section' => 'jaka_banner',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("banner_{$s}_btn1_url", ['default' => '#', 'sanitize_callback' => 'esc_url_raw']);
        $wp_customize->add_control("banner_{$s}_btn1_url", [
            'label' => "Banner {$s} - 按钮1链接",
            'section' => 'jaka_banner',
            'type' => 'url',
        ]);

        $wp_customize->add_setting("banner_{$s}_btn2_text", ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control("banner_{$s}_btn2_text", [
            'label' => "Banner {$s} - 按钮2文字",
            'section' => 'jaka_banner',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("banner_{$s}_btn2_url", ['default' => '#', 'sanitize_callback' => 'esc_url_raw']);
        $wp_customize->add_control("banner_{$s}_btn2_url", [
            'label' => "Banner {$s} - 按钮2链接",
            'section' => 'jaka_banner',
            'type' => 'url',
        ]);
    }

    // ─── 产品展示区域 ───
    $wp_customize->add_section('jaka_products', [
        'title' => '产品展示',
        'panel' => 'jaka_homepage',
        'priority' => 20,
    ]);

    $wp_customize->add_setting('products_label', ['default' => 'PRODUCTS', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('products_label', [
        'label' => '英文标签',
        'section' => 'jaka_products',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('products_title', ['default' => '产品中心', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('products_title', [
        'label' => '板块标题',
        'section' => 'jaka_products',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('products_desc', ['default' => '围绕工业机器人与协作机器人，交付匹配工艺现场的自动化系统。', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('products_desc', [
        'label' => '板块描述',
        'section' => 'jaka_products',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('products_source', ['default' => 'custom', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('products_source', [
        'label' => '产品数据来源',
        'section' => 'jaka_products',
        'type' => 'select',
        'choices' => [
            'custom' => '自定义产品（在"产品"文章中管理）',
            'static' => '使用模板静态数据',
        ],
    ]);

    // ─── 解决方案区域 ───
    $wp_customize->add_section('jaka_solutions', [
        'title' => '解决方案',
        'panel' => 'jaka_homepage',
        'priority' => 30,
    ]);

    $wp_customize->add_setting('solutions_label', ['default' => 'SOLUTIONS', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('solutions_label', [
        'label' => '英文标签',
        'section' => 'jaka_solutions',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('solutions_title', ['default' => '解决方案', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('solutions_title', [
        'label' => '板块标题',
        'section' => 'jaka_solutions',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('solutions_desc', ['default' => '深耕行业应用场景，为客户提供全方位智能解决方案', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('solutions_desc', [
        'label' => '板块描述',
        'section' => 'jaka_solutions',
        'type' => 'text',
    ]);

    // ─── 服务与支持区域 ───
    $wp_customize->add_section('jaka_service', [
        'title' => '服务与支持',
        'panel' => 'jaka_homepage',
        'priority' => 50,
    ]);

    $wp_customize->add_setting('service_label', ['default' => 'SERVICE', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('service_label', [
        'label' => '英文标签',
        'section' => 'jaka_service',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('service_title', ['default' => '服务与支持', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('service_title', [
        'label' => '板块标题',
        'section' => 'jaka_service',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('service_desc', ['default' => '始终在您身边，7×24小时为您提供优质服务与技术支持', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('service_desc', [
        'label' => '板块描述',
        'section' => 'jaka_service',
        'type' => 'text',
    ]);

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("service_{$i}_badge", ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control("service_{$i}_badge", [
            'label' => "服务卡片{$i} - 标签",
            'section' => 'jaka_service',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("service_{$i}_title", ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control("service_{$i}_title", [
            'label' => "服务卡片{$i} - 标题",
            'section' => 'jaka_service',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("service_{$i}_desc", ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control("service_{$i}_desc", [
            'label' => "服务卡片{$i} - 描述",
            'section' => 'jaka_service',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("service_{$i}_url", ['default' => '#', 'sanitize_callback' => 'esc_url_raw']);
        $wp_customize->add_control("service_{$i}_url", [
            'label' => "服务卡片{$i} - 链接",
            'section' => 'jaka_service',
            'type' => 'url',
        ]);

        $wp_customize->add_setting("service_{$i}_bg_image", ['default' => '', 'sanitize_callback' => 'absint']);
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, "service_{$i}_bg_image", [
            'label' => "服务卡片{$i} - 背景图",
            'section' => 'jaka_service',
            'mime_type' => 'image',
        ]));
    }

    // ─── 新闻动态区域 ───
    $wp_customize->add_section('jaka_news', [
        'title' => '新闻动态',
        'panel' => 'jaka_homepage',
        'priority' => 60,
    ]);

    $wp_customize->add_setting('news_desc', ['default' => '辰轩与您分享每一个智能制造升级瞬间。', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('news_desc', [
        'label' => '板块描述',
        'section' => 'jaka_news',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('news_label', ['default' => 'NEWS', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('news_label', [
        'label' => '英文标签',
        'section' => 'jaka_news',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('news_title', ['default' => '智汇新闻 眼界大开', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('news_title', [
        'label' => '板块标题',
        'section' => 'jaka_news',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('news_count', ['default' => '4', 'sanitize_callback' => 'absint']);
    $wp_customize->add_control('news_count', [
        'label' => '显示文章数量',
        'section' => 'jaka_news',
        'type' => 'number',
        'input_attrs' => ['min' => 2, 'max' => 8],
    ]);

    // ═══════════════════════════════════════
    // 面板：全局设置
    // ═══════════════════════════════════════
    $wp_customize->add_panel('jaka_global', [
        'title'    => '全局设置',
        'priority' => 21,
    ]);

    // ─── 联系信息 ───
    $wp_customize->add_section('jaka_contact', [
        'title' => '联系信息',
        'panel' => 'jaka_global',
        'priority' => 10,
    ]);

    $wp_customize->add_setting('contact_phone', ['default' => '在线提交需求', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('contact_phone', [
        'label' => '客服电话',
        'section' => 'jaka_contact',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('contact_email', ['default' => '', 'sanitize_callback' => 'sanitize_email']);
    $wp_customize->add_control('contact_email', [
        'label' => '联系邮箱',
        'section' => 'jaka_contact',
        'type' => 'email',
    ]);

    $wp_customize->add_setting('contact_address', ['default' => '面向制造企业自动化升级项目', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('contact_address', [
        'label' => '公司地址',
        'section' => 'jaka_contact',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('icp_number', ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('icp_number', [
        'label' => 'ICP备案号',
        'section' => 'jaka_contact',
        'type' => 'text',
    ]);

    // ─── 社交媒体 ───
    $wp_customize->add_section('jaka_social', [
        'title' => '社交媒体',
        'panel' => 'jaka_global',
        'priority' => 20,
    ]);

    $social_links = ['wechat' => '微信二维码图片', 'weibo' => '微博链接', 'linkedin' => 'LinkedIn链接', 'youtube' => 'YouTube链接'];
    foreach ($social_links as $key => $label) {
        if ($key === 'wechat') {
            $wp_customize->add_setting("social_{$key}", ['default' => '', 'sanitize_callback' => 'absint']);
            $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, "social_{$key}", [
                'label' => $label,
                'section' => 'jaka_social',
                'mime_type' => 'image',
            ]));
        } else {
            $wp_customize->add_setting("social_{$key}", ['default' => '#', 'sanitize_callback' => 'esc_url_raw']);
            $wp_customize->add_control("social_{$key}", [
                'label' => $label,
                'section' => 'jaka_social',
                'type' => 'url',
            ]);
        }
    }

    // ─── 页脚CTA ───
    $wp_customize->add_section('jaka_footer_cta', [
        'title' => '页脚行动号召',
        'panel' => 'jaka_global',
        'priority' => 30,
    ]);

    $wp_customize->add_setting('footer_cta_title', ['default' => '准备好开始了吗？', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('footer_cta_title', [
        'label' => 'CTA标题',
        'section' => 'jaka_footer_cta',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('footer_cta_desc', ['default' => '联系我们，获取专属自动化解决方案', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('footer_cta_desc', [
        'label' => 'CTA描述',
        'section' => 'jaka_footer_cta',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('footer_cta_btn1_text', ['default' => '联系我们', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('footer_cta_btn1_text', [
        'label' => '按钮1文字',
        'section' => 'jaka_footer_cta',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('footer_cta_btn2_text', ['default' => '申请样机', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('footer_cta_btn2_text', [
        'label' => '按钮2文字',
        'section' => 'jaka_footer_cta',
        'type' => 'text',
    ]);

    // ─── 顶部通知栏 ───
    $wp_customize->add_section('jaka_topbar', [
        'title' => '顶部通知栏',
        'panel' => 'jaka_global',
        'priority' => 5,
    ]);

    $wp_customize->add_setting('topbar_show', ['default' => '1', 'sanitize_callback' => 'absint']);
    $wp_customize->add_control('topbar_show', [
        'label' => '显示顶部通知栏',
        'section' => 'jaka_topbar',
        'type' => 'checkbox',
    ]);

    $wp_customize->add_setting('topbar_text', ['default' => '辰轩定制化工业机器人自动化系统集成方案', 'sanitize_callback' => 'wp_kses_post']);
    $wp_customize->add_control('topbar_text', [
        'label' => '通知文字',
        'section' => 'jaka_topbar',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('topbar_link_text', ['default' => '立即了解', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('topbar_link_text', [
        'label' => '链接文字',
        'section' => 'jaka_topbar',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('topbar_link_url', ['default' => '#', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control('topbar_link_url', [
        'label' => '链接地址',
        'section' => 'jaka_topbar',
        'type' => 'url',
    ]);
}
add_action('customize_register', 'jaka_customizer_register');
