<?php
/**
 * Template Name: Contact Us
 *
 * @package MCA
 */

get_header();
?>

<section class="page-hero">
  <div class="container">
    <p class="eyebrow"><?php esc_html_e('Contact Us', 'mca'); ?></p>
    <h1><?php esc_html_e('Let’s talk about your numbers', 'mca'); ?></h1>
    <p><?php esc_html_e('Book a consultation or send a message — we typically respond within one business day.', 'mca'); ?></p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="contact-cards">
      <article class="card">
        <h3><?php esc_html_e('Phone', 'mca'); ?></h3>
        <p><a href="<?php echo esc_url(mca_tel_href(mca_opt('phone'))); ?>"><?php echo esc_html(mca_opt('phone')); ?></a></p>
      </article>
      <article class="card">
        <h3><?php esc_html_e('Email', 'mca'); ?></h3>
        <p><a href="mailto:<?php echo esc_attr(mca_opt('email')); ?>"><?php echo esc_html(mca_opt('email')); ?></a></p>
      </article>
      <article class="card">
        <h3><?php esc_html_e('WhatsApp', 'mca'); ?></h3>
        <p><a href="<?php echo esc_url(mca_opt('whatsapp_url')); ?>" target="_blank" rel="noopener"><?php esc_html_e('Chat with us', 'mca'); ?></a></p>
      </article>
    </div>

    <div class="content-split">
      <div class="contact-form-wrap">
        <h2 style="font-size:32px;margin-bottom:20px;"><?php esc_html_e('Send a message', 'mca'); ?></h2>
        <?php
        // Prefer Contact Form 7 when installed.
        if (shortcode_exists('contact-form-7')) {
            echo do_shortcode('[contact-form-7 title="Contact form 1"]');
        } else {
            ?>
            <form action="#" method="post" onsubmit="alert('<?php echo esc_js(__('Install Contact Form 7 to enable submissions, or connect your SMTP provider.', 'mca')); ?>'); return false;">
              <label for="c-name"><?php esc_html_e('Name', 'mca'); ?></label>
              <input id="c-name" name="name" type="text" required>
              <label for="c-email"><?php esc_html_e('Email', 'mca'); ?></label>
              <input id="c-email" name="email" type="email" required>
              <label for="c-phone"><?php esc_html_e('Phone', 'mca'); ?></label>
              <input id="c-phone" name="phone" type="tel">
              <label for="c-msg"><?php esc_html_e('Message', 'mca'); ?></label>
              <textarea id="c-msg" name="message" rows="5" required></textarea>
              <button class="btn btn-primary" type="submit"><?php esc_html_e('Send Message', 'mca'); ?></button>
            </form>
            <?php
        }
        ?>
      </div>
      <div>
        <h2 style="font-size:32px;margin-bottom:16px;"><?php esc_html_e('Visit the office', 'mca'); ?></h2>
        <p><?php echo nl2br(esc_html(mca_opt('address'))); ?></p>
        <p><a class="btn btn-outline" href="<?php echo esc_url(mca_consultation_url()); ?>"><?php echo esc_html(mca_opt('cta_label')); ?></a></p>
      </div>
    </div>

    <div class="map-embed">
      <iframe title="<?php esc_attr_e('Office location map', 'mca'); ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://maps.google.com/maps?q=Fitzwilliam%20Place%20Dublin&t=&z=15&ie=UTF8&iwloc=&output=embed"></iframe>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/newsletter'); ?>

<?php
get_footer();
