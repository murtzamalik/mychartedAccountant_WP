<?php
/**
 * Theme helpers.
 *
 * @package MCA
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Safe ACF field getter with fallback.
 *
 * @param string $key Field key.
 * @param mixed  $default Default value.
 * @param mixed  $post_id Post ID or 'option'.
 * @return mixed
 */
function mca_field($key, $default = '', $post_id = false) {
    if (function_exists('get_field')) {
        $value = get_field($key, $post_id);
        if ($value !== null && $value !== false && $value !== '') {
            return $value;
        }
    }
    return $default;
}

/**
 * Theme asset URL.
 *
 * @param string $path Relative path under assets/.
 * @return string
 */
function mca_asset($path) {
    return MCA_URI . '/assets/' . ltrim($path, '/');
}

/**
 * Echo SVG icon markup or img fallback.
 *
 * @param string $name Icon filename without extension.
 * @param string $class CSS class.
 */
function mca_icon($name, $class = '') {
    $path = MCA_DIR . '/assets/icons/' . $name . '.svg';
    if (!file_exists($path)) {
        return;
    }
    $svg = file_get_contents($path);
    if ($class) {
        $svg = preg_replace('/<svg/', '<svg class="' . esc_attr($class) . '"', $svg, 1);
    }
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    echo $svg;
}

/**
 * Primary CTA URL.
 *
 * @return string
 */
function mca_consultation_url() {
    $page = get_page_by_path('contact-us');
    if ($page) {
        return get_permalink($page);
    }
    return home_url('/contact-us/');
}

/**
 * Format phone for tel: link.
 *
 * @param string $phone Phone display string.
 * @return string
 */
function mca_tel_href($phone) {
    return 'tel:' . preg_replace('/[^0-9+]/', '', $phone);
}
