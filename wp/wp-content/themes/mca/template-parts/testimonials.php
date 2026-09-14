<?php $items = mca_testimonials(); $feature = $items[0]; $rest = array_slice($items, 1); ?>
<section class="section">
  <div class="container">
    <div class="section-header">
      <p class="eyebrow"><?php esc_html_e('Client Stories', 'mca'); ?></p>
      <h2 class="section-title"><?php esc_html_e('Trusted by Businesses That Value Good Advice', 'mca'); ?></h2>
    </div>
    <div class="testimonials-grid">
      <article class="testimonial-feature">
        <div class="quote-icon"><?php mca_icon('quote'); ?></div>
        <blockquote><?php echo esc_html($feature['quote']); ?></blockquote>
        <div class="testimonial-person">
          <?php if (!empty($feature['avatar'])) : ?>
            <img src="<?php echo esc_url($feature['avatar']); ?>" alt="" width="56" height="56" loading="lazy">
          <?php endif; ?>
          <div>
            <strong><?php echo esc_html($feature['name']); ?></strong>
            <span><?php echo esc_html($feature['role']); ?></span>
          </div>
        </div>
      </article>
      <div class="testimonial-stack">
        <?php foreach ($rest as $t) : ?>
          <article>
            <blockquote><?php echo esc_html($t['quote']); ?></blockquote>
            <div>
              <strong><?php echo esc_html($t['name']); ?></strong>
              <span> — <?php echo esc_html($t['role']); ?></span>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
