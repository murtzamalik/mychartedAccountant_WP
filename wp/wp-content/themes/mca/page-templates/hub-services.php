<?php
/**
 * Template Name: Services Hub
 *
 * @package MCA
 */

get_header();
?>

<section class="page-hero">
  <div class="container">
    <p class="eyebrow"><?php esc_html_e('Services', 'mca'); ?></p>
    <h1><?php esc_html_e('A full back office, built around your business', 'mca'); ?></h1>
    <p><?php esc_html_e('From day-to-day bookkeeping to complex tax and corporate work — one accountable team.', 'mca'); ?></p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="card-grid">
      <?php
      $all = mca_all_services_list();
      $preview = mca_services_preview();
      $images = array();
      foreach ($preview as $p) {
          $images[$p['title']] = $p['image'];
      }
      foreach ($all as $svc) :
          $url = home_url('/services/' . $svc['slug'] . '/');
          $img = isset($images[$svc['title']]) ? $images[$svc['title']] : mca_asset('img/service-1.png');
          ?>
        <article class="card service-card">
          <img src="<?php echo esc_url($img); ?>" alt="" loading="lazy">
          <div class="service-card-body">
            <h3><?php echo esc_html($svc['title']); ?></h3>
            <p><?php printf(esc_html__('Specialist %s support from qualified chartered accountants in Dublin.', 'mca'), esc_html($svc['title'])); ?></p>
            <a class="link-arrow" href="<?php echo esc_url($url); ?>"><?php esc_html_e('Explore Service →', 'mca'); ?></a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/final-cta'); ?>

<?php
get_footer();
