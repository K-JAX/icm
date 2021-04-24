jQuery( function( $ ) {
    
    // if(!jQuery.cookie('visits')){
    //     jQuery.cookie('visits',1, {expires: 30});
    // }
    // jQuery.cookie('visits', (parseInt(jQuery.cookie('visits')) + 1), {expires: 30})
    // will expire after 30 days
    
    var overlayContact = function(){
        if (parseInt(jQuery.cookie('visits')) > 2) {
            $('.seemore, .l-footer').show();
            $('text').attr("filter","none");
            $('#topimage').attr("filter","none");
            $('#engage, #more span').hide();
            greenLight = true;
        }
    };
    setTimeout(overlayContact, 180);
    
    
    $('#array div div').click(function() {
        $(this).addClass('active');
    });
    
    $('#more span, #engage').click(function() {
        $('#engage, #more span').hide();

        
        // Show lines
        setTimeout(function(){
            $('#path1').css('stroke-dashoffset','0');
        }, 300);
        
        setTimeout(function(){
            $('#path2').css('stroke-dashoffset','0');
            $('.math1').show();
        }, 600);
        
        setTimeout(function(){
            $('#path3').css('stroke-dashoffset','0');
            $('text').attr("filter","url(#filter2)");
            $('.math2').show();
        
        }, 900);
        
        setTimeout(function(){
            $('#path4').css('stroke-dashoffset','0');
            $('text').attr("filter","url(#filter3)");
        }, 1000);
        
        
        //go away and clear
        setTimeout(function(){
            $('.bottomleft').show();
            $('text').attr("filter","url(#filter4)");
            $('.math3').show();

        }, 1200);
        
        setTimeout(function(){
            $('.topleft').show();
            $('.math4').show();
            $('text').attr("filter","url(#filter5)");

        }, 2000);
        
        setTimeout(function(){
            $('.bottomright').show();
            $('text').attr("filter","url(#filter6)");
        }, 2300);
        
        setTimeout(function(){
            $('#path1').css('stroke-dashoffset','950');
            $('#path1').css('stroke-dasharray','950');
            $('.topright').show();
            $('text').attr("filter","url(#filter7)");

        }, 2500);
        
        setTimeout(function(){
            $('#path2').css('stroke-dashoffset','1437');
            $('#path2').css('stroke-dasharray','1437');
            $('.phase2').show();
            $('.math1').hide();
            $('text').attr("filter","url(#filter8)");

        }, 2700);
        
        setTimeout(function(){
            $('#path3').css('stroke-dashoffset','2549');
            $('#path3').css('stroke-dasharray','2549');
            $('.phase3').show();
            $('text').attr("filter","url(#filter9)");
        }, 3000);
        
        setTimeout(function(){
            $('.math4').hide();
            $('text').attr("filter","url(#filter10)");
            $('#path4').css('stroke-dashoffset','1241');
            $('#path4').css('stroke-dasharray','1241');
            $('.phase4').show();
        }, 3300);
        
        setTimeout(function(){
            $('.math2,.math3').hide();
            $('text').attr("filter","url(#filter11)");
            $('.phase5').show();
        }, 3500);
        
        setTimeout(function(){
            $('text').attr("filter","none");
            $('#topimage').attr("filter","none");
            $('.seemore, .l-footer').show();
        }, 3900);
        
    });
    
    $('#startbutton').click(function(event) {
        event.preventDefault();
        
        $('html, body').animate({
            scrollTop: $("#article-1").offset().top - 100
         }, 3300);
    });
    
    // Menu pops open after login
    if ($('body').hasClass('logged-in') && $('body').hasClass('section-users')) {
        $('.gn-icon').addClass('gn-selected');
        $('.gn-menu-wrapper').addClass('gn-open-all');
    }
    
    // Make background take up full window
    var bodyHeightCheck = function() {
        var windowHeight = $(window).height(),
            bodyHeight = $('body').height();
        
            $('body').css('height', '');
        
        if (bodyHeight < windowHeight) {
            $('body').css('height', windowHeight);
        }
    };
    
    bodyHeightCheck();
    $(window).resize(bodyHeightCheck);
});
