<aside class="space-pictures">
  <header>
    <h2>Pictures</h2>
  </header>
  <?php if (get_field("pictures")): ?>
    <?php while(has_sub_field("pictures")):?>
      <?php $attachment_id = get_sub_field('picture'); echo wp_get_attachment_image( $attachment_id, 'square-small' ); ?>
    <?php endwhile; ?>
  <?php endif; ?>

  <?php the_field("picture_attribution") ?>
</aside>