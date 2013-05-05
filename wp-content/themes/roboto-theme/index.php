<?php get_header(); ?>
 
<ul>
    <?php while ( have_posts() ) : the_post(); ?>
    <li class="news-item">
        <span class="news-item--date"><?php echo get_the_date('n.j'); ?></span> <a class="news-item--title" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'starkers' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    </li>
    <?php endwhile; ?>
</ul>

<aside
 
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
    <nav>
        <?php next_posts_link( __( '&larr; Older posts', 'starkers' ) ); ?>
        <?php previous_posts_link( __( 'Newer posts &rarr;', 'starkers' ) ); ?>
    </nav>
<?php endif; ?> 

<?php get_footer(); ?>