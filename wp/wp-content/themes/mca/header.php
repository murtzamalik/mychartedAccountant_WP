<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
  <div class="container header-inner">
    <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>">
      <span class="logo-mark">M</span>
      <span class="logo-text">
        <strong>MY CHARTERED</strong>
        <span>ACCOUNTANTS</span>
      </span>
    </a>

    <nav class="site-nav" id="site-nav" aria-label="<?php esc_attr_e('Primary', 'mca'); ?>">
      <?php
      if (has_nav_menu('primary')) {
          wp_nav_menu(array(
              'theme_location' => 'primary',
              'container'      => false,
              'menu_class'     => 'nav-list',
              'fallback_cb'    => false,
              'depth'          => 2,
          ));
      } else {
          mca_primary_fallback();
      }
      ?>
    </nav>

    <div class="header-actions">
      <div class="quick-icons">
        <a href="<?php echo esc_url(mca_tel_href(mca_opt('phone'))); ?>" aria-label="<?php esc_attr_e('Phone', 'mca'); ?>">
          <?php mca_icon('phone'); ?>
        </a>
        <a href="mailto:<?php echo esc_attr(mca_opt('email')); ?>" aria-label="<?php esc_attr_e('Email', 'mca'); ?>">
          <?php mca_icon('mail'); ?>
        </a>
        <a href="<?php echo esc_url(mca_opt('whatsapp_url')); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e('WhatsApp', 'mca'); ?>">
          <?php mca_icon('whatsapp'); ?>
        </a>
      </div>
      <a class="btn btn-primary" href="<?php echo esc_url(mca_consultation_url()); ?>">
        <?php echo esc_html(mca_opt('cta_label')); ?>
      </a>
      <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav" aria-label="<?php esc_attr_e('Menu', 'mca'); ?>">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>

<main id="main">
