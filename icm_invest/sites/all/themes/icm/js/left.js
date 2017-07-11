setTimeout(function() {
    jQuery('#rightcluster1').show();
    skrollr.init({
        forceHeight: false,
        mobileCheck: function() { return false; }
    });
}, 500);

jQuery(function($) {
    /*
     * Pop-ups
     */
    
    var openPopUp = function($popup) {
        $popup.css({
            'display': 'block'
        });
        setTimeout(function() {
            $popup.addClass('open');
        }, 10);
        $('#skrollr-body').addClass('blur');
    };
    
    $('#block-block-1, #block-block-2').addClass('info-popup').wrapInner('<div class="info-popup-content"></div>');
    $('#block-block-1, #block-block-2').children('.info-popup-content').prepend('<i class="info-popup-close fa fa-close"></i>');

    $('#openequipped').click(function() {
        openPopUp($('#block-block-1'));
    });

    $('#opencollective').click(function() {
        openPopUp($('#block-block-2'));
    });
    
    $('.laylay').click(function(e) {
        e.preventDefault();
        $('#thedialog').attr('src', $(this).attr('href'));
        openPopUp($('#somediv'));
        return false;
    });

    $('.info-popup-close').click(function() {
        var $popup = $(this).parents('.info-popup');
        $popup.removeClass('open');
        $('#skrollr-body').removeClass('blur');

        if ($popup.attr('id') === 'somediv') {
            $('#thedialog').attr('src', 'about:blank');
        }
        
        setTimeout(function() {
            $popup.css({
                'display': 'none'
            });
        }, 1000);
    });
    
    /*
     * Accordions
     */
    
    var toggleAccordion = function($accordions) {
        $.each($accordions, function() {
            var $accordion = $(this),
                $hiddenContent = $accordion.find('.hidden-content'),
                accordionPosition = $accordion.offset().top,
                scrollTop = $(window).scrollTop(),
                windowHeight = $(window).height(),
                openPoint = accordionPosition - windowHeight/3*2;
                
            if (scrollTop > openPoint && $hiddenContent.css('padding-bottom') === '0px') {
                $hiddenContent.css('height', 'auto');
                var hiddenContentHeight = $hiddenContent.height();
                $hiddenContent.css('height', 0);
                $hiddenContent.css('padding-bottom', hiddenContentHeight);
            } else if (scrollTop <= openPoint) {
                $hiddenContent.css('padding-bottom', 0);
            }
        });
    };
    
    setTimeout(function() {
        toggleAccordion($('.accordion'));
        $(window).scroll(function() {
            toggleAccordion($('.accordion'));
        });
    }, 100);
    
    /*
     * Audio
     */
    
    $('.playing').hide();
    
    $('audio').bind('ended', function () { //should trigger once on any play and ended event
        $('svg .playing').hide();
        $(this).removeClass('showaudio');
    });

    $('#openlincoln').click(function() {
        if (!$('#abelincolnaudio')[0].paused){
            $('#openlincoln .playing').hide();
            $('#abelincolnaudio')[0].pause();
            $('#abelincolnaudio').removeClass('showaudio');
        } else{
            $('#openlincoln .playing').show();
            $('#abelincolnaudio')[0].play();
            $('#abelincolnaudio').addClass('showaudio');
        }
    });

    $('#openprocess1').click(function() {
        if (!$('#portfolioconstaudio')[0].paused){
            $('#openprocess1 svg g').hide();
            $('#portfolioconstaudio')[0].pause();
            $('#portfolioconstaudio').removeClass('showaudio');
        } else {
            $('#openprocess1 svg g').show();
            $('#portfolioconstaudio')[0].play();
            $('#portfolioconstaudio').addClass('showaudio');
        }
    });

    $('#openprocess2').click(function() {
        if (!$('#strategicaudio')[0].paused){
            $('#openprocess2 svg g').hide();
            $('#strategicaudio')[0].pause();
            $('#strategicaudio').removeClass('showaudio');
        } else {
            $('#openprocess2 svg g').show();
            $('#strategicaudio')[0].play();
            $('#strategicaudio').addClass('showaudio');
        }
    });

    $('#openprocess3').click(function() {
        if (!$('#mgrselectionaudio')[0].paused){
            $('#openprocess3 svg g').hide();
            $('#mgrselectionaudio')[0].pause();
            $('#mgrselectionaudio').removeClass('showaudio');
        } else {
            $('#openprocess3 svg g').show();
            $('#mgrselectionaudio')[0].play();
            $('#mgrselectionaudio').addClass('showaudio');
        }
    });
});