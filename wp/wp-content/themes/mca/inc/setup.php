<?php
/**
 * Theme setup.
 *
 * @package MCA
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('custom-logo', array(
        'height'      => 76,
        'width'       => 394,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    add_image_size('mca-hero', 1120, 1240, true);
    add_image_size('mca-card', 800, 480, true);
    add_image_size('mca-insight', 640, 400, true);
    add_image_size('mca-avatar', 160, 160, true);
});

add_filter('excerpt_length', function () {
    return 22;
});

add_filter('excerpt_more', function () {
    return '…';
});
