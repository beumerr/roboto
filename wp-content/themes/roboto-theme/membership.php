<?php
/*
Template Name: Membership
*/
?>

<?php get_header(); ?>

<section>
  <?php the_field("memberships") ?>
</section>

<aside>
  <?php the_field("roboto_affiliate_program") ?>

  <?php if(get_field("affiliates")): ?>
    <ul>
    <?php while(has_sub_field("affiliates")): ?>
    
      <li>
        <?php the_sub_field("affiliate_name") ?>
        <?php the_sub_field("affiliate_website") ?>
        <?php $affiliate_attachment_id = get_sub_field("affiliate_image"); echo wp_get_attachment_image( $affiliate_attachment_id, full ); ?>
      </li>

    <?php endwhile; ?>
    </ul>
  <?php endif; ?>
</aside>

<?php get_footer(); ?>
