<?php
/**
 * Trust / credentials bar.
 *
 * @package MCA
 */

$items = mca_opt('trust_items');
if (!is_array($items) || empty($items)) {
    $items = mca_site_defaults()['trust_items'];
}
?>
<div class="trust-bar">
  <div class="container trust-bar-inner">
    <span class="trust-label"><?php esc_html_e('Memberships & Credentials', 'mca'); ?></span>
    <div class="trust-items">
      <?php foreach ($items as $item) : ?>
        <span><?php echo esc_html(is_array($item) ? ($item['label'] ?? '') : $item); ?></span>
      <?php endforeach; ?>
    </div>
  </div>
</div>
