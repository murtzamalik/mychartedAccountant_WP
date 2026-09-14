<?php
/**
 * 404 template.
 *
 * @package MCA
 */

get_header();
?>

<section class="page-hero">
  <div class="container">
    <p class="eyebrow"><?php esc_html_e('404', 'mca'); ?></p>
    <h1><?php esc_html_e('Page not found', 'mca'); ?></h1>
    <p><?php esc_html_e('The page you requested doesn’t exist or has moved.', 'mca'); ?></p>
    <p style="margin-top:24px;"><a class="btn btn-primary" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back to Home', 'mca'); ?></a></p>
  </div>
</section>

<?php
get_footer();
