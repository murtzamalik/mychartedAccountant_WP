<?php
/**
 * Enqueue assets.
 *
 * @package MCA
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'mca-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Inter:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    wp_enqueue_style('mca-tokens', mca_asset('css/tokens.css'), array(), MCA_VERSION);
    wp_enqueue_style('mca-main', mca_asset('css/main.css'), array('mca-tokens', 'mca-fonts'), MCA_VERSION);
    wp_enqueue_script('mca-main', mca_asset('js/main.js'), array(), MCA_VERSION, true);
});
