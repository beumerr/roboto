<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  <header>
    <h1><?php the_title(); ?></h1>
    <?php $attachment_id = get_field('lead_image'); echo wp_get_attachment_image( $attachment_id, 'widescreen-large' ); ?>
  </header>

  <article class="show-info">
    <span class="date"><?php $date = DateTime::createFromFormat('Ymd', get_field( 'date' ) ); echo $date->format('l, F n, Y'); ?></span>
    <span class="time">Doors: <?php the_field( 'time' ); ?></span>
    <span class="price">Price: $<?php the_field( 'price' ) ?></span>
    <p class="description"><?php the_field( 'description' ); ?></p>

    <?php if(get_field('band')): ?>
    <h2 class="band-details-header">Band Details</h2>
    <ul class="bands">
      <?php while(has_sub_field('band')): ?>
      <li>
        <h3><?php the_sub_field('band_name'); ?></h3>
        <?php $attachment_id = get_sub_field('band_photo'); echo wp_get_attachment_image( $attachment_id, 'widescreen-small' ); ?>
        
        <?php if( 
          get_sub_field( 'band') ||
          get_sub_field( 'band_bc') ||
          get_sub_field( 'band_fb') ||
          get_sub_field( 'band_ms' ) ||
          get_sub_field( 'band_tw')  
        ) { ?>
        <ul class="band-social">
          <?php if( get_sub_field( 'band') ) { ?>
          <li class="website"><a href="<?php the_sub_field( 'band'); ?>">Official Website</a></li>
          <?php } ?>
          <?php if( get_sub_field( 'band_bc') ) { ?>
          <li class="bandcamp"><a href="<?php the_sub_field( 'band_bc'); ?>">Bandcamp</a></li>
          <?php } ?>
          <?php if( get_sub_field( 'band_fb') ) { ?>
          <li class="facebook"><a href="<?php the_sub_field( 'band_fb'); ?>">Facebook</a></li>
          <?php } ?>
          <?php if( get_sub_field( 'band_ms' ) ) { ?>
          <li class="myspace"><a href="<?php the_sub_field( 'band_ms' ); ?>">Twitter</a></li>
          <?php } ?>
          <?php if( get_sub_field( 'band_tw') ) { ?>
          <li class="twitter"><a href="<?php the_sub_field( 'band_tw'); ?>">Myspace</a></li>
          <?php } ?>
        </ul>
        <?php } ?>

        <p><?php the_sub_field('band_bio'); ?></p>
        <div><?php the_sub_field('band_media'); ?></div>
      </li>
      <?php endwhile; ?>
    </ul><!-- end .bands -->
    <?php endif; ?>

  </article><!-- end .show-info -->

  <aside class="show-meta">
    <ul class="show-social">
      <?php if( get_field( "facebook_rsvp" ) ): ?>
      <li><a href="<?php the_field( "facebook_rsvp" ); ?>">Facebook RSVP</a></li>
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