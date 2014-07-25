jQuery( document ).ready(function() {

	
	
	jQuery('animatescroll').click(function() {
		var body = jQuery("html, body");
			body.animate({scrollTop:1500}, '500', 'swing', function() { 
		});
	});
	
	
	
		jQuery('#array div div').click(function() {
		jQuery(this).addClass('active');
	});
	
	jQuery('#more').click(function() {
		jQuery('.seemore').show('slow');
		jQuery('#blurmatrix, #engage').hide();
		
	});
	
	jQuery('animatescroll').click(function() {
		var body = jQuery("html, body");
			body.animate({scrollTop:1500}, '500', 'swing', function() { 
		});
	});
	
	
});
