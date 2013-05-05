<?php
/*
Template Name: Membership
*/
?>

<?php get_header(); ?>

<section class="section membership-info">
  <?php the_field("memberships") ?>
</section>

<aside class="affiliate-aside section">
  <section class="affiliate-description section">

  <h1 class="section-title">Affiliate Program</h1>
  <?php the_field("roboto_affiliate_program") ?>
  </section>
    
  <?php if(get_field("affiliates")): ?>
  <section class="affiliates section">
    <h1 class="section-title">Affiliates</h1>
    <ul>
    <?php while(has_sub_field("affiliates")): ?>
    
      <li>
        <?php the_sub_field("affiliate_name") ?>
        <?php the_sub_field("affiliate_website") ?>
        <?php $affiliate_attachment_id = get_sub_field("affiliate_image"); echo wp_get_attachment_image( $affiliate_attachment_id, full ); ?>
      </li>

    <?php endwhile; ?>
    </ul>
  </section>
  <?php endif; ?>
</aside>

<?php get_footer(); ?>
