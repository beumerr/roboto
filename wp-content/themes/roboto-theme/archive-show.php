<?php get_header(); ?>



<div class="splash">
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
    <div>
	    <?php $attachment_id = get_field('lead_image'); echo wp_get_attachment_image( $attachment_id, 'widescreen-medium' ); ?>
	    <span class="date">
	      <span class="month">
	        <?php $date = DateTime::createFromFormat('Ymd', get_field('date')); echo $date->format('M'); ?>
	      </span>
	      <span class="day">
	        <?php $date = DateTime::createFromFormat('Ymd', get_field('date')); echo $date->format('j'); ?>
	      </span>
	    </span>
	    <span class="show-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
  	</div>
<?php } wp_reset_postdata(); ?>
</div><!-- end .chrono -->


<aside class="recently-announced">
	<h3>Recently Announced</h3>
	<ul>
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
    <li>
	    <span class="date">
	      <span class="month">
	        <?php $date = DateTime::createFromFormat('Ymd', get_field('date')); echo $date->format('M'); ?>
	      </span>
	      <span class="day">
	        <?php $date = DateTime::createFromFormat('Ymd', get_field('date')); echo $date->format('j'); ?>
	      </span>
	    </span>
	    <span class="show-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
	  </li>

<?php } wp_reset_postdata(); ?>
	</ul>
</aside>

<?php get_footer(); ?>