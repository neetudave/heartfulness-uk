/**
 * Oceanic Theme Custom Functionality
 *
 */
( function( $ ) {
    
    jQuery( document ).ready( function() {
        
        // Search Show / Hide
        $(".search-btn").toggle(function(){
            $("header .search-block").animate( { top: '+=50' }, 150 );
            $("header .search-block .search-field").focus();
        },function(){
            $("header .search-block").animate( { top: '-=50' }, 150 );
        });
        
        // Don't search if no keywords have been entered
        $(".search-submit").bind('click', function(event) {
        	if ( $(this).parents(".search-form").find(".search-field").val() == "") event.preventDefault();
        });
        
        // Scroll To Top Button Functionality
        $('.scroll-to-top').bind('click', function() {
            $('html, body').animate( { scrollTop: 0 }, 800 );
        });
        $(window).scroll(function(){
            if ($(this).scrollTop() > 400) {
                $('.scroll-to-top').fadeIn();
            } else {
                $('.scroll-to-top').fadeOut();
            }
        });
		
    });
    
    $(window).resize(function () {
        
        
        
    }).resize();
    
    $(window).load(function() {
        oceanic_home_slider();
        oceanic_blog_list_carousel();
    });
    
    function oceanic_blog_list_carousel() {
        $('.post-loop-images-carousel-wrapper').each(function(c) {
            var this_blog_carousel = $(this);
            var this_blog_carousel_id = 'post-loop-images-carousel-id-'+c;
            this_blog_carousel.attr('id', this_blog_carousel_id);
            $('#'+this_blog_carousel_id+' .post-loop-images-carousel').carouFredSel({
                responsive: true,
                circular: false,
                width: 580,
                height: "variable",
                items: {
                    visible: 1,
                    width: 580,
                    height: 'variable'
                },
                onCreate: function(items) {
                    $('#'+this_blog_carousel_id).removeClass('post-loop-images-carousel-wrapper-remove');
                    $('#'+this_blog_carousel_id+' .post-loop-images-carousel').removeClass('post-loop-images-carousel-remove');
                },
                scroll: 500,
                auto: false,
                prev: '#'+this_blog_carousel_id+' .post-loop-images-prev',
                next: '#'+this_blog_carousel_id+' .post-loop-images-next'
            });
        });
    }
    
    function oceanic_home_slider() {
        $(".home-slider").carouFredSel({
            responsive: true,
            circular: true,
            infinite: false,
            width: 1200,
            height: 'variable',
            items: {
                visible: 1,
                width: 1200,
                height: 'variable'
            },
            onCreate: function(items) {
                $(".home-slider-wrap").removeClass("home-slider-remove");
            },
            scroll: {
                fx: 'uncover-fade',
                duration: oceanicSliderTransitionSpeed
            },
            auto: false,
            pagination: '.home-slider-pager',
            prev: ".home-slider-prev",
            next: ".home-slider-next"
        });
    }
    
} )( jQuery );