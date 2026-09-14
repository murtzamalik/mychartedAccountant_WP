<?php
/**
 * Seed pages, menus, and demo posts on theme activation.
 *
 * @package MCA
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('after_switch_theme', 'mca_seed_content');

/**
 * Create site structure once.
 */
function mca_seed_content() {
    if (get_option('mca_seeded_v1')) {
        return;
    }

    $home_id = mca_ensure_page('Home', 'home', '');
    update_option('show_on_front', 'page');
    update_option('page_on_front', $home_id);

    $news_id = mca_ensure_page('News & Insights', 'news', '');
    update_option('page_for_posts', $news_id);

    $about = mca_ensure_page('About Us', 'about-us', 'page-templates/about.php');
    $contact = mca_ensure_page('Contact Us', 'contact-us', 'page-templates/contact.php');
    $who = mca_ensure_page('Who We Help', 'who-we-help', 'page-templates/hub-audience.php');
    $services = mca_ensure_page('Services', 'services', 'page-templates/hub-services.php');

    foreach (mca_all_audiences_list() as $item) {
        mca_ensure_page($item['title'], $item['slug'], 'page-templates/audience.php', $who);
    }
    foreach (mca_all_services_list() as $item) {
        mca_ensure_page($item['title'], $item['slug'], 'page-templates/service.php', $services);
    }

    mca_ensure_page('Privacy Policy', 'privacy-policy', 'page-templates/legal.php');
    mca_ensure_page('Cookie Policy', 'cookie-policy', 'page-templates/legal.php');
    mca_ensure_page('Terms of Use', 'terms', 'page-templates/legal.php');

    mca_seed_posts();
    mca_seed_menus($about, $contact, $who, $services, $news_id);
    flush_rewrite_rules();

    update_option('mca_seeded_v1', 1);
}

/**
 * Ensure a page exists.
 *
 * @param string $title Title.
 * @param string $slug Slug.
 * @param string $template Relative template path under theme.
 * @param int    $parent Parent page ID.
 * @return int
 */
function mca_ensure_page($title, $slug, $template = '', $parent = 0) {
    $existing = get_page_by_path(($parent ? get_post($parent)->post_name . '/' : '') . $slug);
    if ($existing) {
        $id = $existing->ID;
    } else {
        $id = wp_insert_post(array(
            'post_title'   => $title,
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_parent'  => $parent ? (int) $parent : 0,
            'post_content' => mca_default_page_content($slug, $title),
        ));
    }

    if ($template && !is_wp_error($id)) {
        update_post_meta($id, '_wp_page_template', $template);
    }

    return (int) $id;
}

/**
 * Default body content for legal / generic pages.
 *
 * @param string $slug Slug.
 * @param string $title Title.
 * @return string
 */
function mca_default_page_content($slug, $title) {
    $intros = array(
        'privacy-policy' => '<p>This Privacy Policy explains how My Chartered Accountants collects, uses, and protects your personal data in accordance with GDPR and Irish data protection law.</p><h2>Information We Collect</h2><p>We collect information you provide when contacting us, engaging our services, or subscribing to updates — including name, email, phone, and business details.</p><h2>How We Use Information</h2><p>We use your information to deliver accounting services, respond to enquiries, meet legal obligations, and improve our communications.</p><h2>Contact</h2><p>For privacy requests, email info@mychartered.ie.</p>',
        'cookie-policy'  => '<p>This Cookie Policy describes how My Chartered Accountants uses cookies and similar technologies on our website.</p><h2>What Are Cookies</h2><p>Cookies are small text files stored on your device to help the site function and understand usage.</p><h2>Managing Cookies</h2><p>You can control cookies through your browser settings. Disabling some cookies may affect site functionality.</p>',
        'terms'          => '<p>These Terms of Use govern your access to the My Chartered Accountants website.</p><h2>Use of Site</h2><p>Content is provided for general information and does not constitute professional advice unless given under a client engagement.</p><h2>Liability</h2><p>We take care to keep information accurate but do not accept liability for decisions made solely on website content.</p>',
        'about-us'       => '',
        'contact-us'     => '',
    );

    if (isset($intros[$slug])) {
        return $intros[$slug];
    }

    return '<p>' . esc_html($title) . ' support from My Chartered Accountants — Dublin-based chartered accountants serving sole traders, SMEs, and corporate clients across Ireland and the UK.</p><p>Book a consultation to discuss how we can support your compliance, tax, and growth goals.</p>';
}

/**
 * Seed demo news posts.
 */
function mca_seed_posts() {
    $posts = array(
        array(
            'title'   => 'Irish Budget Highlights for SMEs',
            'content' => '<p>A practical summary of Budget measures that matter for Irish small and medium businesses — tax reliefs, compliance deadlines, and planning tips.</p>',
        ),
        array(
            'title'   => 'VAT for Cross-Border Traders',
            'content' => '<p>How Irish businesses selling into the UK and EU can stay compliant without overcomplicating day-to-day operations.</p>',
        ),
        array(
            'title'   => 'Contractor Structures Explained',
            'content' => '<p>Umbrella vs limited company: when each structure makes sense, and what to watch for on take-home pay and compliance.</p>',
        ),
    );

    foreach ($posts as $p) {
        $exists = get_page_by_title($p['title'], OBJECT, 'post');
        if ($exists) {
            continue;
        }
        wp_insert_post(array(
            'post_title'   => $p['title'],
            'post_content' => $p['content'],
            'post_status'  => 'publish',
            'post_type'    => 'post',
        ));
    }
}

/**
 * Create primary and footer menus.
 *
 * @param int $about About page ID.
 * @param int $contact Contact page ID.
 * @param int $who Who we help ID.
 * @param int $services Services ID.
 * @param int $news News page ID.
 */
function mca_seed_menus($about, $contact, $who, $services, $news) {
    $menu_id = wp_create_nav_menu('Primary');
    if (is_wp_error($menu_id)) {
        return;
    }

    $order = 1;
    foreach (mca_default_nav_items() as $item) {
        $parent = wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title'  => $item['label'],
            'menu-item-url'    => $item['url'],
            'menu-item-status' => 'publish',
            'menu-item-position' => $order++,
        ));
        if (!empty($item['children']) && !is_wp_error($parent)) {
            foreach ($item['children'] as $child) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title'     => $child['label'],
                    'menu-item-url'       => $child['url'],
                    'menu-item-status'    => 'publish',
                    'menu-item-parent-id' => $parent,
                    'menu-item-position'  => $order++,
                ));
            }
        }
    }

    $locations = get_theme_mod('nav_menu_locations');
    if (!is_array($locations)) {
        $locations = array();
    }
    $locations['primary'] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);
}

// Allow manual re-seed via WP-CLI or ?mca_seed=1 for admins.
add_action('init', function () {
    if (!is_admin() && isset($_GET['mca_seed']) && current_user_can('manage_options')) {
        delete_option('mca_seeded_v1');
        mca_seed_content();
        wp_safe_redirect(remove_query_arg('mca_seed'));
        exit;
    }
});
