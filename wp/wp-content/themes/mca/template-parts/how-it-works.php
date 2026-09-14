<section class="section" style="background:#fff;">
  <div class="container">
    <div class="section-header">
      <p class="eyebrow"><?php esc_html_e('How It Works', 'mca'); ?></p>
      <h2 class="section-title"><?php esc_html_e('Simple Support. Clear Advice.', 'mca'); ?></h2>
    </div>
    <div class="how-grid">
      <?php foreach (mca_how_steps() as $item) : ?>
        <article class="how-item">
          <div class="num"><?php echo esc_html($item['num']); ?></div>
          <h3><?php echo esc_html($item['title']); ?></h3>
          <p><?php echo esc_html($item['text']); ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
