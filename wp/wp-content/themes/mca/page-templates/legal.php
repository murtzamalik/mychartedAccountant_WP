<?php
/**
 * Template Name: Legal Page
 *
 * @package MCA
 */

get_header();
?>

<section class="page-hero">
  <div class="container">
    <p class="eyebrow"><?php esc_html_e('Legal', 'mca'); ?></p>
    <h1><?php the_title(); ?></h1>
  </div>
</section>

<section class="section">
  <div class="container prose">
    <?php
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    ?>
  </div>
</section>

<?php
get_footer();
