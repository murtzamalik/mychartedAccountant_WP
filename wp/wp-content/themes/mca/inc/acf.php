<?php
/**
 * ACF configuration.
 *
 * @package MCA
 */

if (!defined('ABSPATH')) {
    exit;
}

add_filter('acf/settings/save_json', function () {
    return MCA_DIR . '/acf-json';
});

add_filter('acf/settings/load_json', function ($paths) {
    $paths[] = MCA_DIR . '/acf-json';
    return $paths;
});

add_action('acf/init', function () {
    if (!function_exists('acf_add_options_page')) {
        return;
    }
    acf_add_options_page(array(
        'page_title' => __('MCA Site Settings', 'mca'),
        'menu_title' => __('MCA Settings', 'mca'),
        'menu_slug'  => 'mca-settings',
        'capability' => 'edit_theme_options',
        'redirect'   => false,
        'icon_url'   => 'dashicons-building',
        'position'   => 59,
    ));
});
