<header class="banner">
  <div class="container">
    <a class="brand" href="{{ home_url('/') }}">
      <img src="{{ get_stylesheet_directory_uri() }}/assets/images/ihub_logo.svg" alt="{{ get_bloginfo('name', 'display') }}" />
    </a>
    <div class="toplinks">
      <div class="social">
        <a href="https://twitter.com/BWHiHub" class="twitter-link" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a>
        <a href="http://instagram.com/bwhihub" class="instagram-link" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a>
      </div>
      <div class="contact">
        <a class="btn btn-primary" href="/who-we-are/contact-us">Contact Us</a>
      </div>
    </div>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'container_id' => 'navbar', 'container_class' => 'menu-primary collapse fade']) !!}
      @endif
    </nav>
	  <?php print get_search_form(); ?>
  </div>
</header>
