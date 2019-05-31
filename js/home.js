// Make iPhone iOS 10 scroll ??? not working
jQuery(function( $ ){
  $('.slick-slider').on('init', function() {
    console.log('delegating child events');
    $(this).children.each(function(child) {
      child.delegateEvents();
    });
  });
});


/*
 * Cards Carousel
 *
**/
jQuery(function( $ ){
  $('.cards').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 5,
    speed: 300,
    responsive: [
      {breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4,
      }},
      {breakpoint: 769,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }},
      {breakpoint: 601,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: true
      }},
      {breakpoint: 321,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true
      }}
    ]
  });
});


/*
 * FadeIn Selected Projects
 *
**/
jQuery(function( $ ){
  $('.home-completed-projects .card').mouseover(function() {
    var data_id = $(this).data('slick-index');
    $('.home1').hide();
    $('.card').removeClass('card-active');
    $(this).addClass('card-active');
    $('.cslide'+data_id).show();
  });
  $('.home-new-projects .card').mouseover(function() {
    var data_id = $(this).data('slick-index');
    $('.home3').hide();
    $('.card').removeClass('card-active');
    $(this).addClass('card-active');
    $('.nslide'+data_id).show();
  });
});

// Scroll like Mater - that's Mater as in tamater without the ta.
jQuery(function( $ ){
  $( window ).scroll(function() {
    $('.h-panel-l').css('transform', 'translate3d(0,' + $(this).scrollTop()*2 + 'px, 0)');
  }).scroll();
});


// Hide Show Hide the left menu
jQuery(function( $ ){
  $('.header-left').hide();
  $( window ).scroll(function() {
    var scrollAmount = $(document).scrollTop();
    var setPoint = 1;

    if ( scrollAmount > setPoint ) {
      $('.header-left').fadeIn();
      $(".h-panel-content").fadeOut();
      setTimeout(function() {
        $("body").removeClass('pre-anim');
      });
    }
    else if ( scrollAmount < setPoint ) {
      $('.header-left').fadeOut();
      $(".h-panel-content").fadeIn();
      setTimeout(function() {
        $("body").addClass('pre-anim');
      });
    }
  });
});



// Override the global headroom settings
var homePage = document.querySelector("header");
var headroom2  = new Headroom(homePage, {
  "offset": 1200,
  "tolerance": 5
});
headroom2.init();
