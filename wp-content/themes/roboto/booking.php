<?php
/*
Template Name: Booking
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  <article class="booking-explanation">      

      <?php the_content(); ?>           

  </article>

  <aside class="booking-band">
    <h3>Band Application</h3>
    <?php echo do_shortcode( '[contact-form-7 id="40" title="Band Form"]' ); ?>
  </aside>

  <aside class="booking-promoter">
    <h3>Promoter Application</h3>
    <?php echo do_shortcode( '[contact-form-7 id="40" title="Band Form"]' ); ?>
  </aside>

<?php endwhile; ?>

<?php get_footer(); ?>
