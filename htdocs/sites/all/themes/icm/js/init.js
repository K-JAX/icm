jQuery( document ).ready(function() {

	jQuery('#array div div').click(function() {
		jQuery(this).addClass('active');
	});
	
	jQuery('#more span, #engage').click(function() {
		jQuery('#engage, #more span').hide();

		
		// Show lines
		setTimeout(function(){
			jQuery('#path1').css('stroke-dashoffset','0');
			jQuery('text').attr("filter","url(#filter2)");		
		}, 100);
		setTimeout(function(){
			jQuery('#path2').css('stroke-dashoffset','0');
			jQuery('text').attr("filter","url(#filter3)");		
		
		}, 500);
		setTimeout(function(){
			jQuery('#path3').css('stroke-dashoffset','0');
			jQuery('text').attr("filter","url(#filter4)");		

		
		}, 700);
		
		setTimeout(function(){
			jQuery('#path4').css('stroke-dashoffset','0');
			jQuery('text').attr("filter","url(#filter5)");		

		}, 800);
		
		
		
		//squggle
		
	
		setTimeout(function(){
			jQuery('#path1').css('stroke-dasharray','0');
			jQuery('text').attr("filter","url(#filter6)");		

		}, 1100);
		setTimeout(function(){
			jQuery('#path2').css('stroke-dasharray','0');
			jQuery('text').attr("filter","url(#filter7)");		

		}, 1500);
		setTimeout(function(){
			jQuery('#path3').css('stroke-dasharray','0');
			jQuery('text').attr("filter","url(#filter8)");		

		}, 1700);
		setTimeout(function(){
			jQuery('#path4').css('stroke-dasharray','0');
		}, 1800);
			
		
		//go away and clear	
		
		setTimeout(function(){
			jQuery('.bottomleft').show();
		}, 1600);
		
		setTimeout(function(){
			jQuery('.topleft').show();
			jQuery('text').attr("filter","url(#filter9)");		
		}, 2000);
		
		
		setTimeout(function(){
			jQuery('.bottomright').show();
		}, 2400);
		
		
		
		setTimeout(function(){
			jQuery('#path1').css('stroke-dashoffset','950');
			jQuery('#path1').css('stroke-dasharray','950');
			jQuery('.topright').show();
			jQuery('text').attr("filter","url(#filter10)");		
		}, 2200);
		
			setTimeout(function(){
			jQuery('#path2').css('stroke-dashoffset','1437');
			jQuery('#path2').css('stroke-dasharray','1437');
			jQuery('.phase2').show();
		}, 2600);
		
		setTimeout(function(){
			jQuery('#path3').css('stroke-dashoffset','2549');
			jQuery('#path3').css('stroke-dasharray','2549');
			jQuery('.phase3').show();
			jQuery('text').attr("filter","url(#filter11)");		


		}, 2700);
		
		setTimeout(function(){
			jQuery('#path4').css('stroke-dashoffset','1241');
			jQuery('#path4').css('stroke-dasharray','1241');
			jQuery('.phase4').show();
		}, 2800);
		
		setTimeout(function(){
				jQuery('.phase5').show();		
		}, 3200);
		
		
		
		setTimeout(function(){
				jQuery('text').attr("filter","none");
				jQuery('#topimage').attr("filter","none");		
				jQuery('.seemore').show();
		}, 3600);
		
	});
	
	jQuery('#startbutton').click(function(event) {
		event.preventDefault();
		
		
		setTimeout(function(){
				jQuery('#startbutton').hide();
		}, 3600);
		
		
		jQuery('html, body').animate({
    		scrollTop: jQuery("#article-1").offset().top - 100
 		}, 3300);
	});
	
	
});
