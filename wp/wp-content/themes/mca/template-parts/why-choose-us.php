<section class="section">
  <div class="container">
    <div class="section-header">
      <p class="eyebrow"><?php esc_html_e('Why My Chartered Accountants', 'mca'); ?></p>
      <h2 class="section-title"><?php esc_html_e('More Than Accounting', 'mca'); ?></h2>
    </div>
    <div class="why-grid">
      <?php foreach (mca_why_items() as $item) : ?>
        <article class="why-item">
          <div class="num"><?php echo esc_html($item['num']); ?></div>
          <h3><?php echo esc_html($item['title']); ?></h3>
          <p><?php echo esc_html($item['text']); ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
