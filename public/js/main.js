$(function() {
	// menu button
	$('.menu-mobile').click(function() {
		if ($('.dropdown-menu').hasClass('hidden')) {
			$('.dropdown-menu').removeClass('hidden');
			$('.dropdown-menu').addClass('grid');
		} else {
			$('.dropdown-menu').removeClass('grid');
			$('.dropdown-menu').addClass('hidden');
		}
	});
});
