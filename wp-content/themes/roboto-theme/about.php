<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>
<div class="about-info">
  
<section class="mission section">
  <h1 class="section-title">Mission</h1>
  <?php the_field("mission"); ?>
</section>

<section class="board section">
  <h1 class="section-title">Board</h1>
  <?php if (get_field("board_members")): ?>
    <?php while(has_sub_field("board_members")): ?>
      <ul>
        <li>
          <?php the_sub_field("name"); ?>
          <?php the_sub_field("position"); ?>
        </li>
      </ul>
    <?php endwhile; ?>
  <?php endif; ?>
</section>

<section class="history-section section">
  <h1 class="section-title">History</h2>
  <?php the_field("history"); ?>
</section>

<section class="space-description section">
  <h1 class="section-title">Space</h1>
  <?php the_field("space"); ?>
</section>
</div>

<div class="space-pictures-container">
  <?php get_template_part("picturetour"); ?>
</div>

<?php get_footer(); ?>
