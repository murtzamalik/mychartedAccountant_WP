<section class="newsletter">
  <div class="container newsletter-inner">
    <h2><?php esc_html_e('Financial insights worth knowing', 'mca'); ?></h2>
    <form class="newsletter-form" action="#" method="post" onsubmit="return false;">
      <label class="screen-reader-text" for="mca-newsletter-email"><?php esc_html_e('Email', 'mca'); ?></label>
      <input id="mca-newsletter-email" type="email" name="email" placeholder="<?php esc_attr_e('Enter your email', 'mca'); ?>" required>
      <button class="btn btn-gold" type="submit"><?php esc_html_e('Subscribe', 'mca'); ?></button>
    </form>
    <?php
    // Replace with Contact Form 7 shortcode in WP admin when available:
    // echo do_shortcode('[contact-form-7 id="newsletter" title="Newsletter"]');
    ?>
  </div>
</section>
