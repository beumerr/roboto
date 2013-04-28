<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>

<h2>Mission</h2>
<?php the_field("mission"); ?>

<h3>Board</h3>
<?php if (get_field("board_members")): ?>
  <?php while(has_sub_field("board_members")): ?>
    <?php the_sub_field("name"); ?>
    <?php the_sub_field("position"); ?>
  <?php endwhile; ?>
<?php endif; ?>

<h2>History</h2>
<?php the_field("history"); ?>

<h2>Space</h2>
<?php the_field("space"); ?>

<?php get_template_part("picturetour"); ?>

<?php get_footer(); ?>
