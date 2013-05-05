  </main><!-- end .site-main -->
	<footer role="contentinfo" class ="footer-main">

  <ul>
  <?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
        <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
  <?php endif; ?>

    <li>
      <ul>
        <li><a href="https://www.facebook.com/robotoproject">Facebook</a></li>
        <li><a href="mailto:info@therobotoproject.org">Email</a></li>
        <li><a href="http://goo.gl/maps/88BSg">Directions</a></li>
      </ul>
    </li>

  </ul>

  <nav class="nav-main-footer" id="nav-footer">
    <h1 class="title-footer-nav">Menu</h1>  
    <?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'primary' ) ); ?>
  </nav>
</footer>

<?php wp_footer(); ?>
</body>
</html>