<?php
/*
Template Name: Booking
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  <article class="section booking-explanation">      

      <?php the_content(); ?>           

  </article>

  <aside class="section booking-band">
    <h3 class="section-title">Band Application</h3>
    <?php the_field("band_form") ?>
    
  </aside>

  <aside class="section booking-promoter">
    <h3 class="section-title">Promoter Application</h3>
    <?php the_field("promoter_form") ?>    
  </aside>

<?php endwhile; ?>

<?php get_footer(); ?>
