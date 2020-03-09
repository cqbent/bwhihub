export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    var wpos = 0;
    // JavaScript to be fired on all pages, after page specific JS is fired
    $('#navbar ul.nav > .menu-item').click(function () {
      if ($(this).hasClass('active')) {
        $(this).removeClass('active');
      }
      else {
        $(this).addClass('active');
      }
    });
    /*
    window scroll function to control size of header when users scrolls up or down
     */
    $(window).scroll(function() {
      // if > 0 then add 'scroll' to page class; else remove page class
      wpos = $(window).scrollTop();
      //console.log(wpos);

      if (wpos > 40) {
        if (!$('body').hasClass('scroll')) {
          $('body').addClass('scroll');
        }
      }
      else {
        if ($('body').hasClass('scroll')) {
          $('body').removeClass('scroll');
        }
      }
    });
  },
};
