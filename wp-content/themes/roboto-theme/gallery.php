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
        <?php $attachment_id = get_sub_field('image'); echo wp_get_attachment_image( $attachment_id, 'cinema-medium' ); ?>
        <h1><?php the_sub_field("exhibit_title"); ?></h1>
        <h2>
        <?php the_sub_field("artist_name") ?>
        </h2>
        <h2>
        <?php the_sub_field("artist_website") ?>
        </h2>
        <span>
          <?php $date = DateTime::createFromFormat('Ymd', get_sub_field('start_date')); echo $date->format('F jS'); ?> to <?php $date = DateTime::createFromFormat('Ymd', get_sub_field('end_date')); echo $date->format('F jS'); ?>
        </span>

        <p><?php the_sub_field("exhibit_description") ?></p>
      </header>
      <?php the_sub_field("description"); ?>
    </div>
    <?php endwhile; ?>
  </section>
  <?php else: ?>
  Nothing planned at the moment.
<?php endif;?>
</aside>

<?php get_template_part( 'picturetour' ); ?>

<?php get_footer(); ?>
