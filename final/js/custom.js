/*
* File Name: Helper Js file
* File Author: Design Arc
* File Description: This is helper javascript file. Used for activating js plugins and Other javascript effects adding. Thanks
*/


/*-------------------------------------
--------- TABLE OF CONTENT ------------
---------------------------------------

1.bannerSlider
2. galleryMasonaryLayout
3. GalleryFilter
4. fancyboxInit
5. gMap
6. testimonialCarosule
7. SmoothMenuScroll
8. OnePageMenuScroll
9. DeadMenuConfig
10. contactFormValidation
11. videoFancybox
12. sliding gallery 
13. hiddenBarMenuConfig
14. customScrollBarHiddenSidebar
15. hiddenBarToggler
16. handlePreloader
17. stickyHeader

----------------------------------------
--------------------------------------*/


"use strict";

// 1.bannerSlider
function bannerSlider () {
	if ($('.banner-one').length) {			
		$(".banner-one").vegas({
			timer: false,
			transition: [ 'fade2' ],
		    slides: [
		        { src: "img/slides/slide1.jpg" },
		        { src: "img/slides/slide2.jpg" },
		        { src: "img/slides/slide3.jpg" },
		        { src: "img/slides/slide4.jpg" }
		    ]
		});
	};
	if ($('.banner-two').length) {			
		$(".banner-two").vegas({
			timer: false,
			transition: [ 'fade2' ],
		    slides: [
		        { src: "img/banner-style-two/2.jpg" },
		        { src: "img/banner-style-two/3.jpg" }
		    ]
		});
	};
}
// 2. galleryMasonaryLayout
function galleryMasonaryLayout () {
	if ($('.masonary-gallery').length) {
		var container = $('.masonary-gallery');

	    container.on('load', function(){
	      container.masonry({
	        itemSelector : '.masonryImage'
	      });
	    });
	}
}
// 3. GalleryFilter
function GalleryFilter () {

	if ($('.image-gallery').length) {
		$('.image-gallery').each(function () {
			var filterSelector = $(this).data('filter-class');
			var showItemOnLoad = $(this).data('show-on-load');
			if (showItemOnLoad) {
				$(this).mixItUp({
					load: {
						filter: '.'+showItemOnLoad
					},
					selectors: {
						filter: '.'+filterSelector
					}
				})	
			};
			$(this).mixItUp({
				selectors: {
					filter: '.'+filterSelector
				}
			});
		});
	};
}
// 4. fancyboxInit
function fancyboxInit () {
	if ($('a.fancybox').length) {
		$('a.fancybox').fancybox();
	};
}
// 5. gMap
function gMap () {
	if ($('.google-map').length) {
        $('.google-map').each(function () {
        	// getting options from html 
        	var mapName = $(this).attr('id');
        	var mapLat = $(this).data('map-lat');
        	var mapLng = $(this).data('map-lng');
        	var iconPath = $(this).data('icon-path');
        	var mapZoom = $(this).data('map-zoom');
        	var mapTitle = $(this).data('map-title');
        	var mapOverlayClr = $(this).data('map-overlay-clr');
        	var mapInfWndw = $(this).data('info-window');

        	// if zoom not defined the zoom value will be 15;
        	if (!mapZoom) {
        		var mapZoom = 15;
        	};
        	// init map
        	var map;
            map = new GMaps({
                div: '#'+mapName,
                scrollwheel: false,
                lat: mapLat,
                lng: mapLng,
                zoom: mapZoom
            });
            // if icon path setted then show marker
            if(iconPath) {
        		map.addMarker({
	            	icon: iconPath,
	                lat: mapLat,
	                lng: mapLng,
	                title: mapTitle
	            });
        	}
        	// if overlay enabled 
        	if (mapOverlayClr) {
        		var getTile = function(coord, zoom, ownerDocument) {
					var div = ownerDocument.createElement('div');
					div.innerHTML = coord;
					div.style.width = this.tileSize.width + 'px';
					div.style.height = this.tileSize.height + 'px';
					div.style.background = mapOverlayClr;
					return div;
				};
				map.addOverlayMapType ({
			        index: 0,
			        tileSize: new google.maps.Size(256, 256),
			        getTile: getTile
				});

        	};
        	// if info window true 
        	if (mapInfWndw) {        		
        		var mapInfWndwHtml =  $('.info-window[data-map-name='+mapName+']').html();
        		map.drawOverlay({
        			lat: mapLat,
	                lng: mapLng,
	                content: mapInfWndwHtml,
	                verticalAlign: 'middle',
  					horizontalAlign: 'center'
        		})
        	};
        });  
	};
}
// 6. testimonialCarosule
function testimonialCarosule () {
	if ($('.testimonial-wrap .owl-carousel').length) {
		$('.testimonial-wrap .owl-carousel').owlCarousel({
		    loop: true,
		    margin: 0,
		    nav: false,
		    dots: true,
		    items: 1,
		    autoplayHoverPause: true
		});
	}
	if ($('.testimonial-wrap-style-two .owl-carousel').length) {
		$('.testimonial-wrap-style-two .owl-carousel').owlCarousel({
		    loop: true,
		    margin: 0,
		    nav: true,
		    dots: false,
		    items: 1,
		    navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>'
            ],
		    autoplayHoverPause: true
		});
	}
}
// 7. SmoothMenuScroll
function SmoothMenuScroll () {
	// must install jquery easein plugin

	var anchor = $('.scrollToLink');		
	if(anchor.length){
		anchor.children('a').bind('click', function (event) {
			// if ($(window).scrollTop() > 10) {
			// 	var headerH = '73';
			// }else {
			// 	var headerH = '73';
			// }

			var target = $(this);
			var anchorHeight= target.height();
			$('html, body').stop().animate({
				scrollTop: $(target.attr('href')).offset().top - anchorHeight + 'px'
			}, 1200, 'easeInOutExpo');
			anchor.removeClass('current');
			target.parent().addClass('current');
			event.preventDefault();
		});
	}
}
// 8. OnePageMenuScroll
function OnePageMenuScroll () {
    var windscroll = $(window).scrollTop();
    if (windscroll >= 100) {
    	var menuWrap = $('.navigation.scroll-menu'); // change as your menu wrap
    	menuWrap.find('.scrollToLink a').each(function (){
    		// grabing section id dynamically
    		var sections = $(this).attr('href');
	        $(sections).each(function() {
	        	// checking is scroll bar are in section
	            if ($(this).offset().top <= windscroll + 100) {
	            	// grabing the dynamic id of section
	        		var Sectionid = $(sections).attr('id');
	        		// removing current class from others
	        		menuWrap.find('li').removeClass('current');
	        		// adding current class to related navigation
	        		menuWrap.find('a[href=#'+Sectionid+']').parent().addClass('current');
	            }
	        });
    	});
    } else {
        $('.mainmenu.one-page-scroll-menu li.current').removeClass('current');
        $('.mainmenu.one-page-scroll-menu li:first').addClass('current');
    }
}
// 9. DeadMenuConfig
function DeadMenuConfig () {
	var menuWrap = $('.navigation.scroll-menu'); // change it as your menu wrapper
	var deadLink = menuWrap.find('li.deadLink');
	if(deadLink.length) {
		deadLink.each(function () {
			$(this).children('a').on('click', function() {
				return false;
			});
		});
	}
}
// 10. contactFormValidation
function contactFormValidation () {
	if($('.contact-form').length){
		$('.contact-form').validate({ // initialize the plugin
			rules: {
				name: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
				phone: {
					required: true
				},
				date: {
					required: true
				},
				message: {
					required: true
				},
				subject: {
					required: true
				}
			},
			submitHandler: function (form) { 
				// sending value with ajax request
				$.post($(form).attr('action'), $(form).serialize(), function (response) {
					$(form).parent('div').append(response);
					$(form).find('input[type="text"]').val('');
					$(form).find('input[type="email"]').val('');
					$(form).find('textarea').val('');
				});
				return false;
			}
		});
	}
}
// 11. videoFancybox
function videoFancybox () {
	if ($('.video-fancybox').length) {
		$('.video-fancybox').on('click', function () {
			$(this).fancybox({
				'padding'	: 0,
				'autoScale'	: false, 
				'transitionIn'	: 'none', 
				'transitionOut'	: 'none', 
				'title'	: this.title, 
				'width'	: 640, 
				'height'	: 385, 
				'href'	: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'), 
				'type'	: 'swf', 
				'swf'	: { 'wmode'	: 'transparent', 'allowfullscreen'	: 'true' }
			});
			return false;
		})
	};
}

// 12. sliding gallery 
function slidingGallery () {
	var galleryWrap = $('.sliding-gallery .image-gallery');
	if (galleryWrap.length) {
		galleryWrap.bxSlider({
			minSlides: 1,
			maxSlides: 4,
			slideWidth: 480,
			slideMargin: 0,
			useCSS: false,
			ticker: true,
			autoHover:true,
			tickerHover:true,
			speed: 100000,
			infiniteLoop: true
		});
	};
}
// 13. hiddenBarMenuConfig
function hiddenBarMenuConfig () {
	var menuWrap = $('.hidden-bar .main-menu');
	// appending expander button
	menuWrap.find('.dropdown').children('a').append(function () {
		return '<button type="button" class="btn expander"><i class="fa fa-chevron-down"></i></button>';
	});
	// hidding submenu 
	menuWrap.find('.dropdown').children('ul').hide();
	// toggling child ul
	menuWrap.find('.btn.expander').each(function () {
		$(this).on('click', function () {
			$(this).parent() // return parent of .btn.expander (a) 
				.parent() // return parent of a (li)
					.children('ul').slideToggle();

			// adding class to expander container
			$(this).parent().toggleClass('current');
			// toggling arrow of expander
			$(this).find('i').toggleClass('fa-chevron-up fa-chevron-down');
			

			return false;

		});
	});
}
// 14. customScrollBarHiddenSidebar
function customScrollBarHiddenSidebar () {
	if ($('.hidden-bar-wrapper').length) {
		$('.hidden-bar-wrapper').mCustomScrollbar();
	};
}
// 15. hiddenBarToggler
function hiddenBarToggler () {
	if ($('.hidden-bar-closer').length) {
		$('.hidden-bar-closer').on('click', function () {
			$('.hidden-bar').css({
				'right': '-150%'
			});
		});
	};
	if ($('.hidden-bar-opener').length) {
		$('.hidden-bar-opener').on('click', function () {
			$('.hidden-bar').css({
				'right': '0%'
			});
		});
	};
}
// 16. handlePreloader
function handlePreloader() {
	if($('.preloader').length){
		$('.preloader').fadeOut();
	}
}
// 17. stickyHeader
function stickyHeader () {
	if ($('.stricky').length) {
		var strickyScrollPos = $('.stricky').next().offset().top;
		if($(window).scrollTop() > strickyScrollPos) {
			$('.stricky').addClass('stricky-fixed'); 
		}
		else if($(this).scrollTop() <= strickyScrollPos) {
			$('.stricky').removeClass('stricky-fixed'); 
		}
	};
}
// 18. zebraDatePickerInit 
function zebraDatePickerInit () {
	if ($('input.datepicker').length) {
		$('input.datepicker').Zebra_DatePicker({
			default_position: 'below'
		});
	};
}

// 19. revolutionSliderActiver
function revolutionSliderActiver () {
	if ($('.slider-banner').length) {
		var slideHeight = $('.slider-banner').data('height');
		var fullScreenAlignForce = $('.slider-banner').data('full-screen-aling-force');
		$('.slider-banner').revolution({
			delay:5000,
			startwidth:1170,
			startheight:slideHeight,
			startWithSlide:0,

			fullScreenAlignForce: fullScreenAlignForce,
			autoHeight:"off",
			minHeight:"off",

			shuffle:"off",

			onHoverStop:"on",

			thumbWidth:100,
			thumbHeight:50,
			thumbAmount:3,

			hideThumbsOnMobile:"off",
			hideNavDelayOnMobile:1500,
			hideBulletsOnMobile:"off",
			hideArrowsOnMobile:"off",
			hideThumbsUnderResoluition:0,

			hideThumbs:0,
			hideTimerBar:"on",

			keyboardNavigation:"on",

			navigationType:"bullet",
			navigationArrows: "nexttobullets",
			navigationStyle:"preview4",

			navigationHAlign:"center",
			navigationVAlign:"bottom",
			navigationHOffset:30,
			navigationVOffset:30,

			soloArrowLeftHalign:"left",
			soloArrowLeftValign:"center",
			soloArrowLeftHOffset:20,
			soloArrowLeftVOffset:0,

			soloArrowRightHalign:"right",
			soloArrowRightValign:"center",
			soloArrowRightHOffset:20,
			soloArrowRightVOffset:0,


			touchenabled:"on",
			swipe_velocity:"0.7",
			swipe_max_touches:"1",
			swipe_min_touches:"1",
			drag_block_vertical:"false",

			parallax:"mouse",
			parallaxBgFreeze:"on",
			parallaxLevels:[10,7,4,3,2,5,4,3,2,1],
			parallaxDisableOnMobile:"off",

			stopAtSlide:-1,
			stopAfterLoops:-1,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			hideSliderAtLimit:0,

			dottedOverlay:"none",

			spinned:"spinner4",

			fullWidth:"on",
			forceFullWidth:"on",
			fullScreen:"off",
			fullScreenOffsetContainer:"#banner",
			fullScreenOffset:"0px",

			panZoomDisableOnMobile:"off",

			simplifyAll:"off",

			shadow:0

		});
	}
}

// 20. galleryModal 
function galleryModal () {
	if ($('#single-gallery-modal').length && $('.single-gallery').length) {
		$('.single-gallery .link-view').children('a').on('click', function () {
			// grabing elements
			var parentDiv = $(this).parents('.single-gallery');
			var modalContent = parentDiv.find('.modal-content');
			var itemTitle = modalContent.find('.item-name').text();
			var itemImg = modalContent.find('.item-image').attr('src');
			var itemContent = modalContent.find('.item-text').html();

			// doing reset 
			$('#single-gallery-modal').find('.item-name').empty();
			$('#single-gallery-modal').find('.img-holder img').attr('src', '');
			$('#single-gallery-modal').find('.item-text').empty();


			// adding content
			$('#single-gallery-modal').find('.item-name').text(itemTitle);			
			$('#single-gallery-modal').find('.img-holder img').attr('src', itemImg);			
			$('#single-gallery-modal').find('.item-text').append(itemContent);

			$('#single-gallery-modal').modal('show');

			return false;
		});
	};
}


// instance of fuction while Document ready event	
jQuery(document).on('ready', function () {
	(function ($) {
		bannerSlider();
		galleryMasonaryLayout();
		GalleryFilter();
		fancyboxInit();
		gMap();
		testimonialCarosule();
		DeadMenuConfig();
		contactFormValidation();
		videoFancybox();
		slidingGallery();
		hiddenBarMenuConfig();
		hiddenBarToggler();
		zebraDatePickerInit();
		revolutionSliderActiver();
		galleryModal();
	})(jQuery);
});
// instance of fuction while Window Load event
jQuery(window).on('load', function () {
	(function ($) {
		SmoothMenuScroll();
		customScrollBarHiddenSidebar();
		handlePreloader();
	})(jQuery);
});
// instance of fuction while Window Scroll event
jQuery(window).on('scroll', function () {	
	(function ($) {	
		OnePageMenuScroll();
		stickyHeader();
	})(jQuery);
});