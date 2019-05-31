jQuery(window).load(function() {
	var container = document.querySelector('.masonrycards');
	var msnry = new Masonry( container, {
		itemSelector: '.card',
		columnWidth: '.card',
	});
});
