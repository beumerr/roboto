<?php get_header(); ?>
 
<?php while ( have_posts() ) : the_post(); ?>
 
<?php /* How to display all other posts. */ ?>
     
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
         
    	<header>
            <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'starkers' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
 
            <?php starkers_posted_on(); ?>
        </header>

    </article>
  
<?php endwhile; // End the loop. Whew. ?>
 
<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
    <nav>
        <?php next_posts_link( __( '&larr; Older posts', 'starkers' ) ); ?>
        <?php previous_posts_link( __( 'Newer posts &rarr;', 'starkers' ) ); ?>
    </nav>
<?php endif; ?> 

<?php get_footer(); ?>