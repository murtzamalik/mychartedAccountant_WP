<?php
/**
 * Navigation menus.
 *
 * @package MCA
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('after_setup_theme', function () {
    register_nav_menus(array(
        'primary'       => __('Primary Menu', 'mca'),
        'footer_services' => __('Footer Services', 'mca'),
        'footer_quick'  => __('Footer Quick Links', 'mca'),
        'footer_legal'  => __('Footer Legal', 'mca'),
    ));
});

/**
 * Fallback primary nav when no menu assigned.
 */
function mca_primary_fallback() {
    $items = mca_default_nav_items();
    echo '<ul class="nav-list">';
    foreach ($items as $item) {
        $has_children = !empty($item['children']);
        echo '<li class="nav-item' . ($has_children ? ' has-children' : '') . '">';
        echo '<a href="' . esc_url($item['url']) . '">' . esc_html($item['label']);
        if ($has_children) {
            echo ' <span class="nav-chevron" aria-hidden="true"></span>';
        }
        echo '</a>';
        if ($has_children) {
            echo '<ul class="nav-dropdown">';
            foreach ($item['children'] as $child) {
                echo '<li><a href="' . esc_url($child['url']) . '">' . esc_html($child['label']) . '</a></li>';
            }
            echo '</ul>';
        }
        echo '</li>';
    }
    echo '</ul>';
}

/**
 * Custom walker-lite via wp_nav_menu fallback is enough; also filter for chevrons.
 */
add_filter('nav_menu_css_class', function ($classes, $item, $args) {
    if (!empty($args->theme_location) && $args->theme_location === 'primary') {
        $classes[] = 'nav-item';
        if (in_array('menu-item-has-children', $classes, true)) {
            $classes[] = 'has-children';
        }
    }
    return $classes;
}, 10, 3);
