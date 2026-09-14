<?php
/**
 * Blog / news archive.
 *
 * @package MCA
 */

get_header();
?>

<section class="page-hero">
  <div class="container">
    <p class="eyebrow"><?php esc_html_e('News & Insights', 'mca'); ?></p>
    <h1><?php esc_html_e('Knowledge that helps businesses move forward', 'mca'); ?></h1>
    <p><?php esc_html_e('Practical commentary on Irish tax, compliance, and running a healthier finance function.', 'mca'); ?></p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="archive-grid">
      <?php
      $fallback = array(mca_asset('img/insight-1.png'), mca_asset('img/insight-2.png'), mca_asset('img/insight-3.png'));
      $i = 0;
      if (have_posts()) :
          while (have_posts()) :
              the_post();
              $img = get_the_post_thumbnail_url(get_the_ID(), 'mca-insight');
              if (!$img) {
                  $img = $fallback[$i % 3];
              }
              $i++;
              ?>
            <article class="insight-card">
              <img src="<?php echo esc_url($img); ?>" alt="" loading="lazy">
              <div class="insight-card-body">
                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date('j F Y')); ?></time>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
                <a class="link-arrow" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more →', 'mca'); ?></a>
              </div>
            </article>
              <?php
          endwhile;
      else :
          echo '<p>' . esc_html__('No articles published yet.', 'mca') . '</p>';
      endif;
      ?>
    </div>
    <div class="section-cta" style="margin-top:48px;">
      <?php the_posts_pagination(); ?>
    </div>
  </div>
</section>

<?php
get_footer();
