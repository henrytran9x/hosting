/*
 # HTML - JV Hosting
 # @version		1.0.0
 # ------------------------------------------------------------------------
 # author    Open Source Code Solutions Co
 # copyright Copyright (C) 2011 joomlavi.com. All Rights Reserved.
 # @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL or later.
 # Websites: http://www.joomlavi.com
 # Technical Support:  http://www.joomlavi.com/my-tickets.html
-------------------------------------------------------------------------*/

(function($){
	$(function(){

		// Tooltip ============================	
		$('[data-toggle="tooltip"], .hasTooltip').tooltip();

		// Nav ============================

		$('nav').each(function(){
			var el = $(this),
				drop = el.find('.drop');
			// Nav fixed
			el.scrollToFixed({
	            minWidth: el.data('responsive')
	        });
	        // Nav hover
	        drop.hover(
				function() {
					var s = $(this);
					s.stop().addClass('show');
				},
				function() { 
					var s = $(this);
					s.stop().removeClass('show');
				}
			)
		});

		// Menu mobile =========================
		$('.drop > .fa').click(function(){
			var el = $(this),
				wrap = el.parent('.drop'),
				other = el.parents('.menu-mobile').find('.drop'),
				othersub = el.parents('.menu-mobile').find('.slideDown'),
				elsub = el.parent('.drop').find('.slideDown');
				if (!wrap.hasClass('active')) {
					other.removeClass('active');
					wrap.addClass('active');
					othersub.slideUp(200);
					elsub.slideDown(200);
				} else {
					wrap.removeClass('active');
					elsub.slideUp(200);
				}
		});

		
		// Parallax ============================	
		$('.parallax').each(function(){
			var el = $(this);
			el.parallax({
			    speed: el.data('speed')?el.data('speed'):0.15
		    });	
		});
		
		// Padding section ======================
		
		$('.dexp-section').each(function(index, el) {
			
			$(this).hasClass('custompadding')
			{
               $(this).css({
               	padding:  $(this).attr('data-padding'),
               });
			}
		});
		// Back to top ============================	
		var offset = 220,
			duration = 500,
			backtotop = $('.back-to-top');
		$(window).scroll(function() {
			if ($(this).scrollTop() > offset) {
				backtotop.fadeIn(duration);
			} else {
				backtotop.fadeOut(duration);
			}
		});
		backtotop.click(function(event) {
			event.preventDefault();
			$('html, body').animate({scrollTop: 0}, duration);
			return false;
		})

		// Carousel ============================
		$(".carouselOwl").each(function(){ 

			var el = $(this),

				items = 			(el.data('items') != "")?parseInt(el.data('items')):5,
		        itemsCustom = 		(el.data('itemscustom') != "")?el.data('itemscustom'):true,
		        itemsDesktop = 		(el.data('itemsdesktop') != "")?parseInt(el.data('itemsdesktop')):4,
		        itemsDesktopSmall = (el.data('itemsdesktopsmall') != "")?parseInt(el.data('itemsdesktopsmall')):3,
		        itemsTablet = 		(el.data('itemstablet') != "")?parseInt(el.data('itemstablet')):2,
		        itemsTabletSmall = 	(el.data('itemstabletsmall') != "")?parseInt(el.data('itemstabletsmall')):2,
		        itemsMobile = 		(el.data('itemsmobile') != "")?parseInt(el.data('itemsmobile')):1,
		        singleItem = 		(el.data('singleitem') != "")?el.data('singleitem'):false,
		        
		        slideSpeed = 		(el.data('slidespeed') != "")?el.data('slidespeed'):200,
		        paginationSpeed = 	(el.data('paginationspeed') != "")?el.data('paginationspeed'):800,
		        rewindSpeed = 		(el.data('rewindspeed') != "")?el.data('rewindspeed'):1000,

		        autoPlay = 			(el.data('autoplay') != "")?(el.data('autoplay')):false,
		        stopOnHover = 		(el.data('stoponhover') != "")?el.data('stoponhover'):false,

		        navigation = 		(el.data('navigation') != "")?el.data('navigation'):false,
		        navigationText = 	(el.data('navigationtext') != "")?el.data('navigationtext'):["prev", "next"],
		        rewindNav = 		(el.data('rewindnav') != "")?el.data('rewindnav'):true,
		        scrollPerPage = 	(el.data('scrollperpage') != "")?el.data('scrollperpage'):false,

		        pagination = 		(el.data('pagination') == "") ? el.data('pagination') : true,
		        paginationNumbers = (el.data('paginationnumbers') != "")?el.data('paginationnumbers'):false;

			el.owlCarousel({
				items : items,
		        itemsCustom : itemsCustom,
		        itemsDesktop : [1199, itemsDesktop],
		        itemsDesktopSmall : [992, itemsDesktopSmall],
		        itemsTablet : [768, itemsTablet],
		        itemsTabletSmall : [560, itemsTabletSmall],
		        itemsMobile : [479, itemsMobile],
		        singleItem : singleItem,

		        slideSpeed : slideSpeed,
		        paginationSpeed : paginationSpeed,
		        rewindSpeed : rewindSpeed,

		        autoPlay : autoPlay,
		        stopOnHover : stopOnHover,

		        navigation : navigation,
		        navigationText : navigationText,
		        rewindNav : rewindNav,
		        scrollPerPage : scrollPerPage,

		        pagination : pagination,
		        paginationNumbers : paginationNumbers
			});
		});

	});
})(jQuery);	