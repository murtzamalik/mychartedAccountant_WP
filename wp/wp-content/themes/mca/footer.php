</main>

<footer class="site-footer">
  <div class="container footer-grid">
    <div class="footer-col">
      <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>">
        <span class="logo-mark">M</span>
        <span class="logo-text">
          <strong>MY CHARTERED</strong>
          <span>ACCOUNTANTS</span>
        </span>
      </a>
      <div class="footer-social">
        <a href="<?php echo esc_url(mca_opt('linkedin')); ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><?php mca_icon('linkedin'); ?></a>
        <a href="<?php echo esc_url(mca_opt('twitter')); ?>" target="_blank" rel="noopener" aria-label="Twitter"><?php mca_icon('twitter'); ?></a>
        <a href="<?php echo esc_url(mca_opt('facebook')); ?>" target="_blank" rel="noopener" aria-label="Facebook"><?php mca_icon('facebook'); ?></a>
      </div>
    </div>

    <div class="footer-col">
      <h4><?php esc_html_e('Services', 'mca'); ?></h4>
      <?php
      if (has_nav_menu('footer_services')) {
          wp_nav_menu(array('theme_location' => 'footer_services', 'container' => false, 'depth' => 1));
      } else {
          foreach (array_slice(mca_services_preview(), 0, 6) as $s) {
              echo '<a href="' . esc_url($s['url']) . '">' . esc_html($s['title']) . '</a>';
          }
      }
      ?>
    </div>

    <div class="footer-col">
      <h4><?php esc_html_e('Quick Links', 'mca'); ?></h4>
      <a href="<?php echo esc_url(home_url('/about-us/')); ?>"><?php esc_html_e('About Us', 'mca'); ?></a>
      <a href="<?php echo esc_url(home_url('/who-we-help/')); ?>"><?php esc_html_e('Who We Help', 'mca'); ?></a>
      <a href="<?php echo esc_url(home_url('/news/')); ?>"><?php esc_html_e('News', 'mca'); ?></a>
      <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Us', 'mca'); ?></a>
    </div>

    <div class="footer-col">
      <h4><?php esc_html_e('Contact', 'mca'); ?></h4>
      <p><?php echo nl2br(esc_html(mca_opt('address'))); ?></p>
      <a href="<?php echo esc_url(mca_tel_href(mca_opt('phone'))); ?>"><?php echo esc_html(mca_opt('phone')); ?></a>
      <a href="mailto:<?php echo esc_attr(mca_opt('email')); ?>"><?php echo esc_html(mca_opt('email')); ?></a>
    </div>
  </div>

  <div class="container footer-bottom">
    <p>&copy; <?php echo esc_html(gmdate('Y')); ?> My Chartered Accountants. <?php esc_html_e('All rights reserved.', 'mca'); ?></p>
    <div class="footer-legal">
      <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy', 'mca'); ?></a>
      <a href="<?php echo esc_url(home_url('/cookie-policy/')); ?>"><?php esc_html_e('Cookies', 'mca'); ?></a>
      <a href="<?php echo esc_url(home_url('/terms/')); ?>"><?php esc_html_e('Terms', 'mca'); ?></a>
    </div>
  </div>
</footer>

<a class="whatsapp-float" href="<?php echo esc_url(mca_opt('whatsapp_url')); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e('Chat on WhatsApp', 'mca'); ?>">
  <?php mca_icon('whatsapp'); ?>
</a>

<?php wp_footer(); ?>
</body>
</html>
