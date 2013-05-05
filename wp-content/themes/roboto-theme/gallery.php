<?php
/*
Template Name: Gallery
*/
?>

<?php get_header(); ?>

<article class="section gallery-about">
  <?php the_field("about"); ?>
</article>

<aside class="section gallery-upcoming">
  <h2 class="section-title-grid">Upcoming</h2>
  <?php if(get_field("upcoming")): ?>
  <section>
    <?php while(has_sub_field("upcoming")):?>
    <section class="gallery-upcoming--item">
      <header>
        <?php $attachment_id = get_sub_field('image'); echo wp_get_attachment_image( $attachment_id, 'cinema-medium' ); ?>
        <h1 class="gallery-upcoming--title"><?php the_sub_field("exhibit_title"); ?></h1>
        <h2>
          <?php the_sub_field("artist_name") ?>
          <?php if(get_sub_field("artist_website")): ?>
            (<a href="<?php the_sub_field("artist_website") ?>"><?php the_sub_field("artist_website") ?></a>)
          <?php endif; ?>
        </h2>
        <span class="gallery-upcoming--date">
          <?php $date = DateTime::createFromFormat('Ymd', get_sub_field('start_date')); echo $date->format('F jS'); ?> to <?php $date = DateTime::createFromFormat('Ymd', get_sub_field('end_date')); echo $date->format('F jS'); ?>
        </span>

      </header>
        <?php the_sub_field("exhibit_description") ?>
    </section>
    <?php endwhile; ?>
  </section>
  <?php else: ?>
  Nothing planned at the moment.
<?php endif;?>
</aside>

<aside class="gallery-pictures">
  <?php get_template_part( 'picturetour' ); ?>
</aside>

<?php get_footer(); ?>
