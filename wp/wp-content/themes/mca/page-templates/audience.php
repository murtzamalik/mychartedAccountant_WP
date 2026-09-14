<?php
/**
 * Template Name: Audience Detail
 *
 * @package MCA
 */

get_header();

$title = get_the_title();
?>

<section class="page-hero">
  <div class="container">
    <p class="eyebrow"><?php esc_html_e('Who We Help', 'mca'); ?></p>
    <h1><?php echo esc_html($title); ?></h1>
    <p><?php printf(esc_html__('Dedicated accounting, tax, and advisory support designed for %s across Ireland and the UK.', 'mca'), esc_html(strtolower($title))); ?></p>
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
              echo '<p>' . esc_html__('We help you stay compliant, organise your finances, and make confident decisions — with a named advisor and clear monthly rhythms.', 'mca') . '</p>';
          }
      endwhile;
      ?>
    </div>
    <div>
      <div class="card" style="position:sticky;top:110px;">
        <h3><?php esc_html_e('Ready to talk?', 'mca'); ?></h3>
        <p><?php esc_html_e('Book a consultation and we’ll map the right package for your structure.', 'mca'); ?></p>
        <a class="btn btn-primary" href="<?php echo esc_url(mca_consultation_url()); ?>"><?php echo esc_html(mca_opt('cta_label')); ?></a>
      </div>
    </div>
  </div>
</section>

<section class="section" style="background:#fff;">
  <div class="container">
    <div class="section-header">
      <p class="eyebrow"><?php esc_html_e('How We Support You', 'mca'); ?></p>
      <h2 class="section-title"><?php esc_html_e('Practical help, not jargon', 'mca'); ?></h2>
    </div>
    <div class="detail-features">
      <article>
        <h3><?php esc_html_e('Compliance', 'mca'); ?></h3>
        <p><?php esc_html_e('Returns, filings, and statutory accounts handled on time with clear ownership.', 'mca'); ?></p>
      </article>
      <article>
        <h3><?php esc_html_e('Tax planning', 'mca'); ?></h3>
        <p><?php esc_html_e('Legitimate structuring advice that protects take-home pay and cash flow.', 'mca'); ?></p>
      </article>
      <article>
        <h3><?php esc_html_e('Reporting', 'mca'); ?></h3>
        <p><?php esc_html_e('Management figures you can actually use to run the business.', 'mca'); ?></p>
      </article>
      <article>
        <h3><?php esc_html_e('Advisory', 'mca'); ?></h3>
        <p><?php esc_html_e('A partner who anticipates deadlines and commercial decisions ahead of time.', 'mca'); ?></p>
      </article>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/final-cta'); ?>

<?php
get_footer();
