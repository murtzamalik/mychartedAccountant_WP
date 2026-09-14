<?php
/**
 * Front page — Figma V1 homepage.
 *
 * @package MCA
 */

get_header();
?>

<section class="hero container">
  <div class="hero-copy">
    <p class="hero-eyebrow"><?php esc_html_e('Chartered Accountants · Dublin', 'mca'); ?></p>
    <h1><?php esc_html_e('Accounting, Tax & Business Support Built Around Your Business', 'mca'); ?></h1>
    <p class="hero-lead"><?php esc_html_e('We align deep Irish & UK financial expertise with proactive advisory services, ensuring sole traders, SMEs, and corporate entities scale gracefully and remain confidently compliant.', 'mca'); ?></p>
    <div class="hero-ctas">
      <a class="btn btn-primary" href="<?php echo esc_url(mca_consultation_url()); ?>"><?php echo esc_html(mca_opt('cta_label')); ?></a>
      <a class="btn btn-outline" href="<?php echo esc_url(home_url('/services/')); ?>"><?php esc_html_e('Explore Our Services →', 'mca'); ?></a>
    </div>
    <hr class="hero-divider">
    <div class="hero-contact">
      <a href="<?php echo esc_url(mca_tel_href(mca_opt('phone'))); ?>"><?php mca_icon('phone'); ?><?php echo esc_html(mca_opt('phone')); ?></a>
      <a href="mailto:<?php echo esc_attr(mca_opt('email')); ?>"><?php mca_icon('mail'); ?><?php echo esc_html(mca_opt('email')); ?></a>
      <a href="<?php echo esc_url(mca_opt('whatsapp_url')); ?>" target="_blank" rel="noopener"><?php mca_icon('whatsapp'); ?><?php esc_html_e('Chat on WhatsApp', 'mca'); ?></a>
    </div>
  </div>
  <div class="hero-media">
    <img src="<?php echo esc_url(mca_asset('img/hero.png')); ?>" alt="<?php esc_attr_e('Professional advisors in consultation', 'mca'); ?>" width="560" height="620">
  </div>
</section>

<?php get_template_part('template-parts/trust-bar'); ?>
<?php get_template_part('template-parts/who-we-help'); ?>
<?php get_template_part('template-parts/services-preview'); ?>
<?php get_template_part('template-parts/brand-message'); ?>
<?php get_template_part('template-parts/why-choose-us'); ?>
<?php get_template_part('template-parts/how-it-works'); ?>
<?php get_template_part('template-parts/testimonials'); ?>
<?php get_template_part('template-parts/latest-insights'); ?>
<?php get_template_part('template-parts/newsletter'); ?>
<?php get_template_part('template-parts/final-cta'); ?>

<?php
get_footer();
