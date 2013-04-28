<?php
/*
Template Name: Front
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="splash">
<?php 

$todayDate = date(Ymd);
$splashargs = array(
  'posts_per_page' => 1,
  'post_type' => 'show',
  'meta_key' => 'date',
  'orderby' => 'meta_value_num',
  'order' => 'ASC',
  'meta_query'  => array(
      array(
        'key'  => 'date' ,
        'value'  => $todayDate,
        'compare'  => '>=' ,
        'type'  => 'DATETIME' ,
      )
    )
);

$my_query = new WP_Query( $splashargs );
  while ( $my_query->have_posts() ) { 
    $my_query->the_post(); ?>
    <?php $attachment_id = get_field('lead_image'); echo wp_get_attachment_image( $attachment_id, full ); ?>
    <div class="date">
      <span class="month">
        <?php $date = DateTime::createFromFormat('Ymd', get_field('date')); echo $date->format('M'); ?>
      </span>
      <span class="day">
        <?php $date = DateTime::createFromFormat('Ymd', get_field('date')); echo $date->format('j'); ?>
      </span>
    </div>
    <span class="show-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>

<?php } wp_reset_postdata(); ?>
</div><!-- end .splash -->

<div class="upcoming">
  <h2>Upcoming Shows</h2>
  <ul class="upcoming-list">
<?php $upcomingargs = array(
  'offset' => 1,
  'posts_per_page' => 5,
  'post_type' => 'show',
  'meta_key' => 'date',
  'orderby' => 'meta_value_num',
  'order' => 'ASC',
  'meta_query'  => array(
      array(
        'key'  => 'date' ,
        'value'  => $todayDate,
        'compare'  => '>=' ,
        'type'  => 'DATETIME' ,
      )
    )
);

$my_query = new WP_Query( $upcomingargs );
  while ( $my_query->have_posts() ) { 
    $my_query->the_post();?>

  <li class="upcoming-show">
    <div class="date">
      <span class="month">
        <?php $date = DateTime::createFromFormat('Ymd', get_field('date')); echo $date->format('M'); ?>
      </span>
      <span class="day">
        <?php $date = DateTime::createFromFormat('Ymd', get_field('date')); echo $date->format('j'); ?>
      </span>
    </div>
    <span class="show-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
  </li>

<?php } wp_reset_postdata(); ?>
  </ul>
  <span><a href="shows">...More Shows</a></span>
</div><!-- end .upcoming -->

<div class="blurb-news">
  <p class="blurb"><?php the_field( 'blurb' ); ?></p>

<div class="news">
  <h2>News</h2>
  <ul>
<?php $newsargs = array(
  'posts_per_page' => 5,
);

$my_query = new WP_Query( $newsargs );
  while ( $my_query->have_posts() ) { 
    $my_query->the_post();?>

  <li>
  <?php the_title(); ?>
  </li>

<?php } wp_reset_postdata(); ?>
  </ul>
  <span><a href="news">...More News</a></span>
</div><!-- end .news -->


</div><!-- end .blurb-news -->

<aside class="mail-book">
  <div class="mail">
    <p><?php the_field( 'mailing_list' ); ?>
    <form>
      <input type="email">
      <input type="submit" value="Join">
    </form>
  </div><!-- end .mail -->

  <p class="book">
    <?php the_field( 'book' ); ?>
  </p><!-- end .book -->
</aside><!-- end .mail-book -->

<?php endwhile; ?>

<?php get_footer(); ?>
