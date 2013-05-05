<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="section news-article--header">
			<h1 class="header-primary"><?php the_title(); ?></h1>
		</header>
		<div class="section news-article--content words">
			<?php the_content(); ?>
		</div>				
	</article>
<?php endwhile; // end of the loop. ?>