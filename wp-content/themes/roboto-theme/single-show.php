<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  <header class="show-header">
    <h1 class="header-primary"><?php the_title(); ?></h1>
    <?php $attachment_id = get_field('lead_image'); echo wp_get_attachment_image( $attachment_id, 'widescreen-large' ); ?>
  </header>

  <article class="section show-info">
    <span class="date"><?php $date = DateTime::createFromFormat('Ymd', get_field( 'date' ) ); echo $date->format('l, F n, Y'); ?></span>
    <span class="time">Doors: <?php the_field( 'time' ); ?></span>
    <span class="price">Price: $<?php the_field( 'price' ) ?></span>
    <p class="description"><?php the_field( 'description' ); ?></p>

    <?php if(get_field('band')): ?>
    <section>
      <h2 class="section-title">Performer Details</h2>
      <ul class="bands">
        <?php while(has_sub_field('band')): ?>
        <li class="band-info">
          <h3 class="btn toggle-btn"><?php the_sub_field('band_name'); ?><svg class="toggle-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86.6 100"><polygon style="fill:#FFFFFF;" points="86.6,100 0,50 86.6,0 "/></svg></h3>
          <div class="band-info--drawer"> 
            <?php if( 
              get_sub_field( 'band') ||
              get_sub_field( 'band_bc') ||
              get_sub_field( 'band_fb') ||
              get_sub_field( 'band_ms' ) ||
              get_sub_field( 'band_tw')  
            ) { ?>

              <div class="band-info--picture-with-social">
              <?php $attachment_id = get_sub_field('band_photo'); echo wp_get_attachment_image( $attachment_id, 'widescreen-small' ); ?>
                <ul class="band-info--social">
                  <?php if( get_sub_field( 'band_site') ) { ?>
                  <li class="social-link"><a class="social-icon social-website" href="<?php the_sub_field( 'band_site' ); ?>">Website</a></li>
                  <?php } ?>
                  <?php if( get_sub_field( 'band_bc') ) { ?>
                  <li class="social-link"><a class="social-icon social-bandcamp" href="<?php the_sub_field( 'band_bc' ); ?>">Bandcamp</a></li>
                  <?php } ?>
                  <?php if( get_sub_field( 'band_fb') ) { ?>
                  <li class="social-link"><a class="social-icon social-facebook" href="<?php the_sub_field( 'band_fb' ); ?>">Facebook</a></li>
                  <?php } ?>
                  <?php if( get_sub_field( 'band_ms' ) ) { ?>
                  <li class="social-link"><a class="social-icon social-twitter" href="<?php the_sub_field( 'band_ms' ); ?>">Twitter</a></li>
                  <?php } ?>
                  <?php if( get_sub_field( 'band_tw') ) { ?>
                  <li class="social-link"><a class="social-icon social-myspace" href="<?php the_sub_field( 'band_tw' ); ?>">Myspace</a></li>
                  <?php } ?>
                </ul>
              </div>
            <?php } else { ?>
            <?php $attachment_id = get_sub_field('band_photo'); echo wp_get_attachment_image( $attachment_id, 'widescreen-medium' ); ?>
            <?php } ?>

            <?php if(get_sub_field('band_bio')) { ?>
            <p><?php the_sub_field('band_bio'); ?></p>
            <?php } ?>
            <?php if(get_sub_field('band_media')) { ?>
            <div><?php the_sub_field('band_media'); ?></div>
            <?php } ?>
          </div>
        </li>
        <?php endwhile; ?>
      </ul><!-- end .bands -->
    </section>
    <?php endif; ?>

  </article><!-- end .section .show-info -->

  <aside class="show-meta">
    <section class="section show-social">
      <h2 class="section-title">Share</h2>
      <ul>
        <?php if( get_field( "facebook_rsvp" ) ): ?>
        <li><a class="btn" href="<?php the_field( "facebook_rsvp" ); ?>">Facebook RSVP</a></li>
        <?php endif; ?>
        <li><a class="btn" href="http://twitter.com/share">Tweet</a></li>
      </ul>
    </section>
    <section class="section flyer">
        <h2 class="section-title">Flyer</h2>
        <?php $attachment_id = get_field('flyer'); echo wp_get_attachment_image( $attachment_id, 'portrait-small' ); ?>
    </section>
  </aside>


<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>