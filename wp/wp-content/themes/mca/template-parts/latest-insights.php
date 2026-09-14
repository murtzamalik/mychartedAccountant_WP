<section class="section" style="background:#fff;">
  <div class="container">
    <div class="section-header">
      <p class="eyebrow"><?php esc_html_e('News & Insights', 'mca'); ?></p>
      <h2 class="section-title"><?php esc_html_e('Knowledge That Helps Businesses Move Forward', 'mca'); ?></h2>
    </div>
    <div class="insights-grid">
      <?php
      $q = new WP_Query(array('posts_per_page' => 3, 'ignore_sticky_posts' => true));
      $fallback_images = array(mca_asset('img/insight-1.png'), mca_asset('img/insight-2.png'), mca_asset('img/insight-3.png'));
      $i = 0;
      if ($q->have_posts()) :
          while ($q->have_posts()) :
              $q->the_post();
              $img = get_the_post_thumbnail_url(get_the_ID(), 'mca-insight');
              if (!$img) {
                  $img = $fallback_images[$i % 3];
              }
              $i++;
              ?>
              <article class="insight-card">
                <img src="<?php echo esc_url($img); ?>" alt="" loading="lazy">
                <div class="insight-card-body">
                  <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date('j F Y')); ?></time>
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 18)); ?></p>
                  <a class="link-arrow" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more →', 'mca'); ?></a>
                </div>
              </article>
              <?php
          endwhile;
          wp_reset_postdata();
      else :
          for ($j = 0; $j < 3; $j++) :
              ?>
              <article class="insight-card">
                <img src="<?php echo esc_url($fallback_images[$j]); ?>" alt="" loading="lazy">
                <div class="insight-card-body">
                  <time><?php echo esc_html(gmdate('j F Y')); ?></time>
                  <h3><?php esc_html_e('Insights coming soon', 'mca'); ?></h3>
                  <p><?php esc_html_e('Practical guidance for Irish businesses on tax, compliance, and growth.', 'mca'); ?></p>
                </div>
              </article>
              <?php
          endfor;
      endif;
      ?>
    </div>
    <div class="section-cta">
      <a class="btn btn-outline" href="<?php echo esc_url(home_url('/news/')); ?>"><?php esc_html_e('View All Insights', 'mca'); ?></a>
    </div>
  </div>
</section>
