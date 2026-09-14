<?php
/**
 * Fallback index — home uses archive layout for posts page.
 *
 * @package MCA
 */

if (is_home()) {
    require MCA_DIR . '/archive.php';
    return;
}

get_header();
?>
<section class="section">
  <div class="container">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            echo '<h2><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></h2>';
            the_excerpt();
        }
    }
    ?>
  </div>
</section>
<?php
get_footer();
