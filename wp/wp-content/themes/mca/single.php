<?php
/**
 * Single post — article detail.
 *
 * @package MCA
 */

get_header();
?>

<article class="container single-article">
  <?php
  while (have_posts()) :
      the_post();
      ?>
    <p class="meta"><time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date('j F Y')); ?></time></p>
    <h1><?php the_title(); ?></h1>
    <?php if (has_post_thumbnail()) : ?>
      <div class="featured"><?php the_post_thumbnail('large'); ?></div>
    <?php else : ?>
      <div class="featured"><img src="<?php echo esc_url(mca_asset('img/insight-1.png')); ?>" alt=""></div>
    <?php endif; ?>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
      <?php
  endwhile;
  ?>
</article>

<?php get_template_part('template-parts/final-cta'); ?>

<?php
get_footer();
