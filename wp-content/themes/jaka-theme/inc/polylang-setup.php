<?php
/**
 * Polylang 多语言初始化配置
 * 首次激活后自动创建所有语言
 */

if (!defined('ABSPATH')) exit;

function jaka_polylang_setup_languages() {
    if (!function_exists('pll_languages_list') || !function_exists('PLL')) return;
    
    // 如果已经有语言配置，跳过
    $existing = pll_languages_list(['fields' => 'slug']);
    if (count($existing) > 1) return;

    $languages = [
        ['name' => '简体中文',       'slug' => 'zh',    'locale' => 'zh_CN', 'flag' => 'cn'],
        ['name' => '繁体中文',       'slug' => 'zh_tw', 'locale' => 'zh_TW', 'flag' => 'tw'],
        ['name' => 'English Global','slug' => 'en',    'locale' => 'en_US', 'flag' => 'us'],
        ['name' => 'English US',    'slug' => 'en_us', 'locale' => 'en_US', 'flag' => 'us'],
        ['name' => 'English EU',    'slug' => 'en_eu', 'locale' => 'en_GB', 'flag' => 'gb'],
        ['name' => '日本語',         'slug' => 'ja',    'locale' => 'ja',    'flag' => 'jp'],
        ['name' => 'Español',       'slug' => 'es',    'locale' => 'es_ES', 'flag' => 'es'],
        ['name' => 'Deutsch',       'slug' => 'de',    'locale' => 'de_DE', 'flag' => 'de'],
        ['name' => 'Français',      'slug' => 'fr',    'locale' => 'fr_FR', 'flag' => 'fr'],
        ['name' => 'русский',       'slug' => 'ru',    'locale' => 'ru_RU', 'flag' => 'ru'],
        ['name' => 'ไทย',           'slug' => 'th',    'locale' => 'th',    'flag' => 'th'],
        ['name' => '한국어',         'slug' => 'ko',    'locale' => 'ko_KR', 'flag' => 'kr'],
        ['name' => 'Italiano',      'slug' => 'it',    'locale' => 'it_IT', 'flag' => 'it'],
        ['name' => 'Tiếng Việt',    'slug' => 'vi',    'locale' => 'vi',    'flag' => 'vn'],
    ];

    $pll_admin = PLL()->model;
    $order = 0;

    foreach ($languages as $lang) {
        if (in_array($lang['slug'], $existing)) continue;

        $args = [
            'name'       => $lang['name'],
            'slug'       => $lang['slug'],
            'locale'     => $lang['locale'],
            'rtl'        => 0,
            'term_group' => $order,
            'flag'       => $lang['flag'],
        ];

        $pll_admin->add_language($args);
        $order++;
    }

    // 设置简体中文为默认语言
    $options = get_option('polylang');
    if ($options && isset($options['default_lang'])) {
        $options['default_lang'] = 'zh';
        update_option('polylang', $options);
    }
}
add_action('admin_init', 'jaka_polylang_setup_languages');
