<?php get_header(); ?>



<div class="shows-chrono">
  <header>
    <h2 class="shows-chrono-title">Upcoming</h2>
  </header>
<?php 

$todayDate = date(Ymd);
$chronoargs = array(
  'posts_per_page' => -1,
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

$my_query = new WP_Query( $chronoargs );
  while ( $my_query->have_posts() ) { 
    $my_query->the_post(); ?>
    <ul>
      <a href="<?php the_permalink(); ?>">
        <li class="show-item">
          <header class="show-item-header">
            <span class="date">
              <?php $date = DateTime::createFromFormat('Ymd', get_field('date')); echo $date->format('M'); ?>  <?php $date = DateTime::createFromFormat('Ymd', get_field('date')); echo $date->format('j'); ?>
            </span>
            <span class="show-title">
              <?php the_title(); ?>
            </span>
          </header>
          <?php $attachment_id = get_field('lead_image'); echo wp_get_attachment_image( $attachment_id, 'widescreen-medium' ); ?>
        </li>
      </a>
    </ul>
<?php } wp_reset_postdata(); ?>
</div><!-- end .chrono -->


<aside class="shows-recent section">
	<h2 class="section-title-grid">Recently Announced</h2>
	<ul class="post-list">
<?php 

$todayDate = date(Ymd);
$chronoargs = array(
  'posts_per_page' => 5,
  'post_type' => 'show',
  'meta_query'  => array(
      array(
        'key'  => 'date' ,
        'value'  => $todayDate,
        'compare'  => '>=' ,
        'type'  => 'DATETIME' ,
      )
    )
);

$my_query = new WP_Query( $chronoargs );
  while ( $my_query->have_posts() ) { 
    $my_query->the_post(); ?>
    <li class="post-list-item">
	    <span class="post-date date">
	      <span class="month">
	        <?php $date = DateTime::createFromFormat('Ymd', get_field('date')); echo $date->format('M'); ?>
	      </span>
	      <span class="day">
	        <?php $date = DateTime::createFromFormat('Ymd', get_field('date')); echo $date->format('j'); ?>
	      </span>
	    </span>
	    <a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	  </li>

<?php } wp_reset_postdata(); ?>
	</ul>
</aside>

<?php get_footer(); ?>