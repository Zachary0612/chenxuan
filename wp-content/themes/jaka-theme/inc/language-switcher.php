<?php
/**
 * ChenXuan language switcher.
 *
 * Visible copy is resolved through the ChenXuan content source.
 */
if (!defined('ABSPATH')) exit;

function jaka_supported_language_codes() {
    return ['zh', 'zh_tw', 'en', 'en_eu', 'ja', 'es', 'de', 'fr', 'th', 'ko', 'it', 'vi'];
}

function jaka_language_names() {
    return [
        'zh' => '简体中文',
        'zh_tw' => '繁體中文',
        'en' => 'English Global',
        'en_eu' => 'English EU',
        'ja' => '日本語',
        'es' => 'Español',
        'de' => 'Deutsch',
        'fr' => 'Français',
        'th' => 'ไทย',
        'ko' => '한국어',
        'it' => 'Italiano',
        'vi' => 'Tiếng Việt',
    ];
}

function jaka_normalize_lang_code($lang) {
    $lang = sanitize_text_field((string) $lang);
    return in_array($lang, jaka_supported_language_codes(), true) ? $lang : 'zh';
}

function jaka_handle_language_switch() {
    if (!isset($_GET['lang'])) {
        return;
    }

    $lang = jaka_normalize_lang_code(wp_unslash($_GET['lang']));
    setcookie('jaka_lang', $lang, time() + 365 * 86400, '/');
    $_COOKIE['jaka_lang'] = $lang;

    wp_safe_redirect(remove_query_arg('lang'));
    exit;
}
add_action('template_redirect', 'jaka_handle_language_switch');

function jaka_current_lang() {
    if (isset($_COOKIE['jaka_lang']) && $_COOKIE['jaka_lang'] !== '') {
        return jaka_normalize_lang_code(wp_unslash($_COOKIE['jaka_lang']));
    }

    if (function_exists('pll_current_language') && function_exists('pll_languages_list')) {
        $langs = pll_languages_list(['fields' => 'slug']);
        if (is_array($langs) && count($langs) > 1) {
            $pll = pll_current_language('slug');
            if ($pll) {
                return jaka_normalize_lang_code($pll);
            }
        }
    }

    return 'zh';
}

function jaka_current_lang_name() {
    $names = jaka_language_names();
    $lang = jaka_current_lang();
    return $names[$lang] ?? $names['zh'];
}

function jaka_i18n_strings() {
    return array_fill_keys(jaka_supported_language_codes(), []);
}

function jaka_t($key, $fallback = '') {
    $lang = jaka_current_lang();

    if (function_exists('chenxuan_i18n_override')) {
        $override = chenxuan_i18n_override($key, $lang);
        if ($override !== null) {
            return $override;
        }
    }

    $strings = jaka_i18n_strings();
    if (isset($strings[$lang][$key])) {
        return $strings[$lang][$key];
    }

    if ($lang !== 'en' && isset($strings['en'][$key])) {
        return $strings['en'][$key];
    }

    return $fallback !== '' ? $fallback : $key;
}
