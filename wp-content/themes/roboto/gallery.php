<?php
/*
Template Name: Gallery
*/
?>

<?php get_header(); ?>

<article class="gallery-about">
  <?php the_field("about"); ?>
</article>

<aside class="gallery-upcoming">
  <h2>Upcoming</h2>
  <?php if(get_field("upcoming")): ?>
  <section>
    <?php while(has_sub_field("upcoming")):?>
    <div>
      <header>
        <img src="" alt="">
        <h3><?php the_sub_field("exhibit_name"); ?></h3>
        <span>
          <?php $date = DateTime::createFromFormat('Ymd', get_sub_field('start_date')); echo $date->format('F jS'); ?>
           to <?php $date = DateTime::createFromFormat('Ymd', get_sub_field('end_date')); echo $date->format('F jS, o'); ?>
        </span>
      </header>
      <?php the_sub_field("description"); ?>
    </div>
    <?php endwhile; ?>
  </section>
  <?php else: ?>
  Nothing planned at the moment.
<?php endif;?>
</aside>

<aside class="gallery-pictures">
  <header>
    <h2>Pictures</h2>
  </header>
  <?php if (get_field("photos")): ?>
    <?php while(has_sub_field("photos")):?>
      <?php $attachment_id = get_sub_field('photo'); echo wp_get_attachment_image( $attachment_id, 'square-small' ); ?>
    <?php endwhile; ?>
  <?php endif; ?>
</aside>

<?php get_footer(); ?>
