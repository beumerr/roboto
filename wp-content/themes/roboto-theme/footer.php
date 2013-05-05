</main><!-- end .site-main -->
<footer role="contentinfo" class ="section footer-main">
    <ul class="footer-links">
      <li class="footer-link"><a href="https://www.facebook.com/robotoproject"><svg class="footer-icon footer-facebook" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><style>.style1{fill:  #403F40;}</style><path d="M50 0C22.4 0 0 22.4 0 50s22.4 50 50 50c4.1 0 8-0.5 11.8-1.4V65.1H50V51.5h11.8v-10 c0-11.7 7.1-18 17.5-18c5 0 9.3 0.4 10.5 0.5v12.2l-7.2 0c-5.7 0-6.7 2.7-6.7 6.6v8.7h13.5l-1.8 13.6H75.8v27.8 C90.3 84.1 100 68.2 100 50C100 22.4 77.6 0 50 0z" class="style1"/></svg>Facebook</a></li>
      <li class="footer-link"><a href="mailto:info@therobotoproject.org"><svg class="footer-icon footer-mail" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><style>.style1{fill:  #403F40;}</style><g><polygon points="18.8,34.9 18.8,65.1 34,50" class="style1"/><polygon points="75.5,29.2 24.5,29.2 50,54.7" class="style1"/><path d="M52.8 63.2C52 64 51 64.4 50 64.4s-2-0.4-2.8-1.2l-7.6-7.6L24.5 70.8h51L60.4 55.7L52.8 63.2z" class="style1"/><path d="M50 0C22.4 0 0 22.4 0 50s22.4 50 50 50s50-22.4 50-50S77.6 0 50 0z M80.1 78.8H19.9c-5 0-9-4.1-9-9 V30.3c0-5 4.1-9 9-9h60.3c5 0 9 4.1 9 9v39.5C89.2 74.7 85.1 78.8 80.1 78.8z" class="style1"/><polygon points="81.2,65.1 81.2,34.9 66,50" class="style1"/></g></svg>Email</a></li>
      <li class="footer-link"><a href="http://goo.gl/maps/88BSg"><svg class="footer-icon footer-map" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><style>.style1{fill:  #403F40;}</style><g><path d="M50 0C22.4 0 0 22.4 0 50s22.4 50 50 50s50-22.4 50-50S77.6 0 50 0z M50 90c0 0-26.7-34.7-26.7-53.3 C23.3 21.9 35.3 10 50 10s26.7 11.9 26.7 26.7C76.7 55.3 50 90 50 90z" class="style1"/><circle cx="50" cy="36.7" r="13.3" class="style1"/></g></svg>Directions</a></li>
    </ul>
  <nav class="nav-main-footer" id="nav-footer">
    <h1 class="title-footer-nav">Menu</h1>  
    <?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'primary' ) ); ?>
  </nav>
</footer>

<?php wp_footer(); ?>
<script src="<?php bloginfo( 'template_directory' ) ?>/main.js"></script>
</body>
</html>