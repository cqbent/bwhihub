jQuery(window).load(function() {
  /*
  Home images slider
   */
  if (jQuery('.home-carousel').length) {
    jQuery(".home-carousel").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      dots: false,
      items: 1,
      autoplay: true,
      autoplayHoverPause: true,
	  autoplayTimeout: 5000,
      autoplaySpeed: 2000,
      navSpeed: 500,
    });
  }

});
