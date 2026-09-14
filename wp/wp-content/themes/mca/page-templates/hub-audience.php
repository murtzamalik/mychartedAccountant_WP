<?php
/**
 * Template Name: Who We Help Hub
 *
 * @package MCA
 */

get_header();
?>

<section class="page-hero">
  <div class="container">
    <p class="eyebrow"><?php esc_html_e('Who We Help', 'mca'); ?></p>
    <h1><?php esc_html_e('Accounting that fits how you do business', 'mca'); ?></h1>
    <p><?php esc_html_e('Whether you trade alone or lead a growing company, we tailor compliance and advisory to your structure.', 'mca'); ?></p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="card-grid">
      <?php foreach (mca_audiences() as $card) : ?>
        <article class="card">
          <div>
            <h3><?php echo esc_html($card['title']); ?></h3>
            <p><?php echo esc_html($card['text']); ?></p>
          </div>
          <a class="link-arrow" href="<?php echo esc_url($card['url']); ?>">
            <?php esc_html_e('Learn More', 'mca'); ?>
            <?php mca_icon('arrow-right'); ?>
          </a>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/final-cta'); ?>

<?php
get_footer();
