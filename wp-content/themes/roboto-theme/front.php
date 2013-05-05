<?php
/*
Template Name: Front
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="lead">
<?php 

$todayDate = date(Ymd);
$leadargs = array(
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

$my_query = new WP_Query( $leadargs );
  while ( $my_query->have_posts() ) { 
    $my_query->the_post(); ?>
    <?php $attachment_id = get_field('lead_image'); echo wp_get_attachment_image( $attachment_id, full ); ?>
    <section class="lead-content">
      <date class="lead-show-date">
        <span class="month">
          <?php $date = DateTime::createFromFormat('Ymd', get_field('date')); echo $date->format('M'); ?>
        </span>
        <span class="day">
          <?php $date = DateTime::createFromFormat('Ymd', get_field('date')); echo $date->format('j'); ?>
        </span>
      </date>

      <h2 class="show-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    </section>

<?php } wp_reset_postdata(); ?>
</div><!-- end .lead -->

<div class="section upcoming">
  <h2 class="section-title">Upcoming Shows</h2>
  <ul class="post-list">
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

  <li class="post-list-item">
    <div class="date">
      <span class="month">
        <?php $date = DateTime::createFromFormat('Ymd', get_field('date')); echo $date->format('M'); ?>
      </span>
      <span class="day">
        <?php $date = DateTime::createFromFormat('Ymd', get_field('date')); echo $date->format('j'); ?>
      </span>
    </div>
    <a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  </li>

<?php } wp_reset_postdata(); ?>
  </ul>
  <span><a href="shows">...More Shows</a></span>
</div><!-- end .upcoming -->

<div class="section blurb-news">
  <p class="front-blurb"><?php the_field( 'blurb' ); ?></p>

<div class="news">
  <h2 class="section-title">News</h2>
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
  <div class="section">
    <div class="front-mail">
      <p><?php the_field( 'mailing_list' ); ?>
      <form>
        <input class="mail-input" type="email" placeholder="email@example.com">
        <input class="btn" type="submit" value="Join">
      </form>
    </div><!-- end .mail -->
  </div>

  <div class="section">
    <a class="book-link" href="<?php the_field( 'book_link') ?>">
      <p class="front-book">
        <?php the_field( 'book' ); ?>
      </p><!-- end .book -->
    </a>
  </div>
</aside><!-- end .mail-book -->

<?php endwhile; ?>

<?php get_footer(); ?>
