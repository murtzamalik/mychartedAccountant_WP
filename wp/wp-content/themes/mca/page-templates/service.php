<?php
/**
 * Template Name: Service Detail
 *
 * @package MCA
 */

get_header();

$title = get_the_title();
?>

<section class="page-hero">
  <div class="container">
    <p class="eyebrow"><?php esc_html_e('Services', 'mca'); ?></p>
    <h1><?php echo esc_html($title); ?></h1>
    <p><?php printf(esc_html__('Expert %s from My Chartered Accountants — practical delivery with partner-level oversight.', 'mca'), esc_html($title)); ?></p>
  </div>
</section>

<section class="section">
  <div class="container content-split">
    <div class="prose">
      <?php
      while (have_posts()) :
          the_post();
          if (get_the_content()) {
              the_content();
          } else {
              echo '<p>' . esc_html__('Our specialists handle the detail so you stay focused on clients and growth. Engagements are scoped clearly, reported transparently, and supported by qualified chartered accountants.', 'mca') . '</p>';
          }
      endwhile;
      ?>
    </div>
    <div>
      <img src="<?php echo esc_url(mca_asset('img/service-1.png')); ?>" alt="" style="border-radius:4px;border:1px solid var(--mca-border);margin-bottom:24px;" loading="lazy">
      <div class="card">
        <h3><?php esc_html_e('Discuss this service', 'mca'); ?></h3>
        <p><?php esc_html_e('Tell us about your business and we’ll recommend the right scope and timeline.', 'mca'); ?></p>
        <a class="btn btn-primary" href="<?php echo esc_url(mca_consultation_url()); ?>"><?php echo esc_html(mca_opt('cta_label')); ?></a>
      </div>
    </div>
  </div>
</section>

<section class="section" style="background:#fff;">
  <div class="container">
    <div class="section-header">
      <p class="eyebrow"><?php esc_html_e('What’s Included', 'mca'); ?></p>
      <h2 class="section-title"><?php esc_html_e('Clear deliverables', 'mca'); ?></h2>
    </div>
    <div class="how-grid">
      <?php
      $bits = array(
          __('Scoped engagement letter', 'mca'),
          __('Named point of contact', 'mca'),
          __('Deadline tracking', 'mca'),
          __('Management reporting', 'mca'),
      );
      $n = 1;
      foreach ($bits as $bit) :
          ?>
        <article class="how-item">
          <div class="num">0<?php echo esc_html((string) $n++); ?></div>
          <h3><?php echo esc_html($bit); ?></h3>
          <p><?php esc_html_e('Included as standard on professional engagements with MCA.', 'mca'); ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/final-cta'); ?>

<?php
get_footer();
