<section class="section" style="background:#fff;">
  <div class="container">
    <div class="section-header">
      <p class="eyebrow"><?php esc_html_e('Our Expertise', 'mca'); ?></p>
      <h2 class="section-title"><?php esc_html_e('A Full Back Office, Built Around Your Business', 'mca'); ?></h2>
    </div>
    <div class="card-grid">
      <?php foreach (mca_services_preview() as $card) : ?>
        <article class="card service-card">
          <img src="<?php echo esc_url($card['image']); ?>" alt="" width="800" height="480" loading="lazy">
          <div class="service-card-body">
            <h3><?php echo esc_html($card['title']); ?></h3>
            <p><?php echo esc_html($card['text']); ?></p>
            <a class="link-arrow" href="<?php echo esc_url($card['url']); ?>">
              <?php esc_html_e('Explore Service →', 'mca'); ?>
            </a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
    <div class="section-cta" style="margin-top:48px;">
      <a class="btn btn-primary" href="<?php echo esc_url(home_url('/services/')); ?>"><?php esc_html_e('View All Services', 'mca'); ?></a>
    </div>
  </div>
</section>
