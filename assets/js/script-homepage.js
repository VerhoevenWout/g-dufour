// var mq = window.matchMedia( "(min-width: 1100px)" );
var mq = window.matchMedia( "(min-width: 100px)" );
if (mq.matches) {
  // window width is at least 1100px
  var scrollPosition = (window.pageYOffset || document.scrollTop)  - (document.clientTop || 0);
  $(window).scroll(function() {
    scrollPosition = (window.pageYOffset || document.scrollTop)  - (document.clientTop || 0);
    if (scrollPosition >= 200) {
      $('.nav-bar').addClass('nav-bar-reveal');
      $('.main-logo').addClass('main-logo-animate-up');
      $('.main-logo svg').attr('class', 'main-logo-svg-animate-up');
      $('.nav-content').addClass('nav-content-animate-up');
    } else{
      $('.nav-bar').removeClass('nav-bar-reveal');
      $('.main-logo').removeClass('main-logo-animate-up');
      $('.main-logo svg').attr('class', '');
      $('.nav-content').removeClass('nav-content-animate-up');
    }
  });

} else {
  // window width is less than 1100px
}
