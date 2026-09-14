<section class="section">
  <div class="container">
    <div class="section-header">
      <p class="eyebrow"><?php esc_html_e('Who We Work With', 'mca'); ?></p>
      <h2 class="section-title"><?php esc_html_e('Accounting That Fits How You Do Business', 'mca'); ?></h2>
    </div>
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
