<?php
/**
 * MCA theme functions.
 *
 * @package MCA
 */

if (!defined('ABSPATH')) {
    exit;
}

define('MCA_VERSION', '1.0.4');
define('MCA_DIR', get_template_directory());
define('MCA_URI', get_template_directory_uri());

require_once MCA_DIR . '/inc/helpers.php';
require_once MCA_DIR . '/inc/setup.php';
require_once MCA_DIR . '/inc/enqueue.php';
require_once MCA_DIR . '/inc/menus.php';
require_once MCA_DIR . '/inc/acf.php';
require_once MCA_DIR . '/inc/defaults.php';
require_once MCA_DIR . '/inc/seed.php';
