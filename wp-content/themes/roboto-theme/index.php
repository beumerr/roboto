<?php get_header(); ?>
<div class="section news">
  <ul>
      <?php while ( have_posts() ) : the_post(); ?>
      <li class="news-item news-page">
          <span class="news-item--date"><?php echo get_the_date('n.j'); ?></span> <a class="news-item--title" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'starkers' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
      </li>
      <?php endwhile; ?>
  </ul>
   
  <?php if (  $wp_query->max_num_pages > 1 ) : ?>
      <nav class="news--older-posts">
          <?php next_posts_link( __( '&larr; older' ) ); ?>
      </nav>
  <?php endif; wp_reset_postdata(); ?> 
</div>

<aside class="section news-upcoming">
  <h2 class="section-title">Upcoming Shows</h2>
  <ul class="post-list">
<?php $todayDate = date(Ymd); $upcomingargs = array(
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
</aside><!-- end .upcoming -->


<?php get_footer(); ?>