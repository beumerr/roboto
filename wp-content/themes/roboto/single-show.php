<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  <header>
    <h1><?php the_title(); ?></h1>
    <?php $attachment_id = get_field('show_image'); echo wp_get_attachment_image( $attachment_id, 'widescreen-large' ); ?>
  </header>

  <article class="show-info">
    <span class="show-date"><?php $date = DateTime::createFromFormat('Ymd', get_field( 'date' ) ); echo $date->format('l, F n, Y'); ?></span>
    <span class="show-time">Doors: <?php the_field( 'time' ); ?></span>
    <span class="price">Price: $<?php the_field( 'price' ) ?></span>
    <p class="description"><?php the_field( 'description' ); ?></p>

    <?php if(get_field('band_info')): ?>
    <h2 class="band-details-header">Band Details</h2>
    <ul class="bands">
      <?php while(has_sub_field('band_info')): ?>
      <li>
        <h3><?php the_sub_field('band_name'); ?></h3>
        <?php $attachment_id = get_sub_field('promotional'); echo wp_get_attachment_image( $attachment_id, 'widescreen-small' ); ?>
        
        <?php if( 
          get_sub_field( 'official_website') ||
          get_sub_field( 'bandcamp') ||
          get_sub_field( 'facebook') ||
          get_sub_field( 'twitter') ||
          get_sub_field( 'myspace')  
        ) { ?>
        <ul class="band-social">
          <?php if( get_sub_field( 'official_website') ) { ?>
          <li class="website"><a href="<?php the_sub_field( 'official_website'); ?>">Official Website</a></li>
          <?php } ?>
          <?php if( get_sub_field( 'bandcamp') ) { ?>
          <li class="bandcamp"><a href="<?php the_sub_field( 'bandcamp'); ?>">Bandcamp</a></li>
          <?php } ?>
          <?php if( get_sub_field( 'facebook') ) { ?>
          <li class="facebook"><a href="<?php the_sub_field( 'facebook'); ?>">Facebook</a></li>
          <?php } ?>
          <?php if( get_sub_field( 'twitter') ) { ?>
          <li class="twitter"><a href="<?php the_sub_field( 'twitter'); ?>">Twitter</a></li>
          <?php } ?>
          <?php if( get_sub_field( 'myspace') ) { ?>
          <li class="myspace"><a href="<?php the_sub_field( 'myspace'); ?>">Myspace</a></li>
          <?php } ?>
        </ul>
        <?php } ?>

        <p><?php the_sub_field('biography'); ?></p>
        <div><?php the_sub_field('media'); ?></div>
      </li>
      <?php endwhile; ?>
    </ul><!-- end .bands -->
    <?php endif; ?>

  </article><!-- end .show-info -->

  <aside class="show-meta">
    <ul class="show-social">
      <?php if( get_field( "facebook_event_link" ) ): ?>
      <li><a href="<?php the_field( "facebook_event_link" ); ?>">Facebook RSVP</a></li>
      <?php endif; ?>
      <li><a href="http://twitter.com/share">Tweet</a></li>
    </ul>
    <div class="flyer">
      <h2>Flyer</h2>
      <?php $attachment_id = get_field('flyer'); echo wp_get_attachment_image( $attachment_id, 'portrait-small' ); ?>
    </div>
  </aside>


<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>