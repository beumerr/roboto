<?php
/*
Template Name: Booking
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  <div class="section booking-explanation">      

      <?php the_content(); ?>           

  </div>

  <aside class="section show-application">
    <h3 class="section-title">Band Application</h3>
    <?php the_field("show_application") ?>
    
  </aside>

<?php endwhile; ?>

<?php get_footer(); ?>
