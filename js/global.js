jQuery(function( $ ){
/*
 * Menus
 *
**/
	var body         = $( 'body' ),
	toggleButtons    = $( '.mobilenav-icon, .mobilenav-icon-home' );

	toggleButtons.click( function() {
		$( '.header-right' ).slideToggle(200);
		body.toggleClass( 'menu-active' );
	});

/*
 * Show / Hide the search box
**/
	$( '.search-icon-wrap' ).click(function(){
		if(window.innerWidth > 719) {
			$( '.search-wrap' ).toggleClass( 'search-open' );
			$( '.header-right .search-form' ).animate({ width: "toggle" }, 100);
		}
	});

/*
 * Remove unwanted things if device width is changed
**/
	$(window).resize(function(){
		if(window.innerWidth > 719) {
			$("body").removeClass("menu-active");
			$(".header-right").removeAttr( 'style' );
		}
		if(window.innerWidth < 719) {
			$(".search-form").removeAttr( 'style' );
		}
	});

	/*
	 * News page View More button
	**/
	$( '.view-more a' ).click( function() {
		$( '.morecards' ).slideToggle(200);
		$( '.vm' ).toggle();
		$( '.vl' ).toggle();
	});

	/*
	 * News footnote launcher
	**/
	$( '.footnote' ).click(function(){
		if(window.innerWidth < 719) {
			$( '.note' ).toggle();
		}
	});

/*
 * Show / Hide the Tags Dropdown
**/
	$( '.fb' ).click(function(){
		$( '.fb' ).toggleClass( 'taglist-open' );
		$( '.fb ul' ).animate({ height: "toggle" }, 100);
	});

});

/*
 * MY Headroom
**/
var myElement = document.querySelector("header");
var headroom  = new Headroom(myElement, {
  "offset": 100,
  "tolerance": 5
});
headroom.init();
