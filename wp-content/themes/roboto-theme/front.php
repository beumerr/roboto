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
  <a class="more" href="shows">...More Shows</a>
</div><!-- end .upcoming -->

<div class="section blurb-news">
  <p class="front-blurb"><?php the_field( 'blurb' ); ?></p>

<div class="front-news">
  <h2 class="section-title">News</h2>
  <ul>
<?php $newsargs = array(
  'posts_per_page' => 5,
);

$my_query = new WP_Query( $newsargs );
  while ( $my_query->have_posts() ) { 
    $my_query->the_post();?>

  <li class="news-item">
    <span class="news-item--date"><?php echo get_the_date('n.j'); ?></span> <a class="news-item--title" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'starkers' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
  </li>

<?php } wp_reset_postdata(); ?>
  </ul>
  <a class="more" href="news">...More News</a>
</div><!-- end .news -->


</div><!-- end .blurb-news -->

<aside class="mail-book">
  <div class="section">
    <div class="front-mail">
      <?php the_field( 'mailing_list' ); ?>
      
      <!-- Begin MailChimp Signup Form -->
      <form action="http://therobotoproject.us7.list-manage1.com/subscribe/post?u=6f85833eb188a2429e00aacca&amp;id=df672c1e77" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <input type="email" value="" name="EMAIL" class="mail-input" id="mce-EMAIL" placeholder="email address" required>
        <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn">
      </form>
      <!--End mc_embed_signup-->
      
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
