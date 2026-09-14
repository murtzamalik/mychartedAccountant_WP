<?php
/**
 * Template Name: About Us
 *
 * @package MCA
 */

get_header();
?>

<section class="page-hero">
  <div class="container">
    <p class="eyebrow"><?php esc_html_e('About Us', 'mca'); ?></p>
    <h1><?php esc_html_e('Chartered accountants who run your back office like a partner', 'mca'); ?></h1>
    <p><?php esc_html_e('My Chartered Accountants is a Dublin practice serving sole traders, SMEs, and corporate clients across Ireland and the UK with clear advice and dependable compliance.', 'mca'); ?></p>
  </div>
</section>

<?php get_template_part('template-parts/brand-message'); ?>

<section class="section">
  <div class="container content-split">
    <div class="prose">
      <p class="eyebrow"><?php esc_html_e('Who We Are', 'mca'); ?></p>
      <h2><?php esc_html_e('A modern practice rooted in Irish & UK expertise', 'mca'); ?></h2>
      <p><?php esc_html_e('We combine statutory excellence with proactive advisory — so you always know where you stand financially, and what to do next.', 'mca'); ?></p>
      <p><?php esc_html_e('From bookkeeping and payroll to corporate tax and cross-border structuring, our team builds processes that scale with your business.', 'mca'); ?></p>
    </div>
    <div>
      <img src="<?php echo esc_url(mca_asset('img/about-team.png')); ?>" alt="" style="border-radius:4px;border:1px solid var(--mca-border);" loading="lazy">
    </div>
  </div>
</section>

<section class="section" style="background:#fff;">
  <div class="container">
    <div class="section-header">
      <p class="eyebrow"><?php esc_html_e('Our Story', 'mca'); ?></p>
      <h2 class="section-title"><?php esc_html_e('Built for businesses that want clarity', 'mca'); ?></h2>
    </div>
    <div class="detail-features">
      <article>
        <h3><?php esc_html_e('Mission', 'mca'); ?></h3>
        <p><?php esc_html_e('To give every client a calm, transparent finance function — without the overhead of a full in-house team.', 'mca'); ?></p>
      </article>
      <article>
        <h3><?php esc_html_e('Vision', 'mca'); ?></h3>
        <p><?php esc_html_e('To be the trusted chartered accountancy partner for ambitious Irish businesses trading at home and abroad.', 'mca'); ?></p>
      </article>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-header">
      <p class="eyebrow"><?php esc_html_e('Leadership', 'mca'); ?></p>
      <h2 class="section-title"><?php esc_html_e('Meet the team', 'mca'); ?></h2>
    </div>
    <div class="team-grid">
      <?php
      $team = array(
          array('name' => 'Aisling Byrne', 'role' => 'Managing Partner'),
          array('name' => 'Conor Walsh', 'role' => 'Tax Director'),
          array('name' => 'Niamh Kelly', 'role' => 'Client Advisory Lead'),
      );
      foreach ($team as $member) :
          ?>
        <article class="team-card">
          <img src="<?php echo esc_url(mca_asset('img/about-team.png')); ?>" alt="" loading="lazy">
          <div class="team-card-body">
            <h3><?php echo esc_html($member['name']); ?></h3>
            <span><?php echo esc_html($member['role']); ?></span>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/trust-bar'); ?>
<?php get_template_part('template-parts/why-choose-us'); ?>
<?php get_template_part('template-parts/final-cta'); ?>

<?php
get_footer();
