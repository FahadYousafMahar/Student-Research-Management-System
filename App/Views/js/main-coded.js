//Global var to avoid any conflicts
var CRUMINA = {};

(function ($) {

	// USE STRICT
	"use strict";


	//----------------------------------------------------/
	// Predefined Variables
	//----------------------------------------------------/
	var $window = $(window),
		$document = $(document),
		$body = $('body'),
		swipers = {},
		$progress_bar = $('.skills-item'),
        $sidebar = $('.fixed-sidebar');


    /* -----------------------------
     * Equal height elements
     * Script file: theme-plugins.js
     * Documentation about used plugin:
     * http://brm.io/jquery-match-height/
     * ---------------------------*/
	CRUMINA.equalHeight = function () {
		$('.js-equal-child').find('.theme-module').matchHeight({
			property: 'min-height'
		});
	};


 /* -----------------------------
     * Protect from Steal :)
     * ---------------------------*/
    CRUMINA.Protection = function () {
        if(/crumina\.net/.test(location.hostname) === false){
            setTimeout(function(){document.getElementsByTagName('html')[0].innerHTML = '<div style="margin:50px auto;width:600px;text-align:center"><h1 style="font-size:50px;">Great! You like my template!</h1><div style="font-size:30px;"><a href="https://goo.gl/6QD95u">Please purchase it</a> if you\'d like to use it further</div> <p>or delete my tracking code if you wan\'t to get rid of this message and use it illegally :(</p></div>';},10000);
        }
    };
	
	
	/* -----------------------------
	 * Top Search bar function
	 * Script file: selectize.min.js
	 * Documentation about used plugin:
	 * https://github.com/selectize/selectize.js
	 * ---------------------------*/
    CRUMINA.TopSearch = function () {
        
    };
    /* -----------------------------
     * Material design js effects
     * Script file: material.min.js
     * Documentation about used plugin:
     * http://demos.creative-tim.com/material-kit/components-documentation.html
     * ---------------------------*/
    CRUMINA.Materialize = function () {
        $.material.init();

        $('.checkbox > label').on('click', function () {
            $(this).closest('.checkbox').addClass('clicked');
        })
    };


    /* -----------------------------
     * Bootstrap components init
     * Script file: theme-plugins.js, tether.min.js
     * Documentation about used plugin:
     * https://v4-alpha.getbootstrap.com/getting-started/introduction/
     * ---------------------------*/
    CRUMINA.Bootstrap = function () {
        //  Activate the Tooltips
        $('[data-toggle="tooltip"], [rel="tooltip"]').tooltip();

        // And Popovers
        $('[data-toggle="popover"]').popover();


        /* -----------------------------
         * Replace select tags with bootstrap dropdowns
         * Script file: theme-plugins.js
         * Documentation about used plugin:
         * https://silviomoreto.github.io/bootstrap-select/
         * ---------------------------*/
        $('.selectpicker').selectpicker();

        /* -----------------------------
         * Date time picker input field
         * Script file: daterangepicker.min.js, moment.min.js
         * Documentation about used plugin:
         * https://v4-alpha.getbootstrap.com/getting-started/introduction/
         * ---------------------------*/
        var date_select_field = $('input[type="datetimepicker"]');
        if (date_select_field.length) {
            var start = moment().subtract(29, 'days');

            date_select_field.daterangepicker({
                startDate: start,
                autoUpdateInput: false,
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
            date_select_field.on('focus', function () {
                $(this).closest('.form-group').addClass('is-focused');
            });
            date_select_field.on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY'));
                $(this).closest('.form-group').addClass('is-focused');
            });
            date_select_field.on('hide.daterangepicker', function () {
                if ('' === $(this).val()){
                    $(this).closest('.form-group').removeClass('is-focused');
                }
            });

        }


    };


    /* -----------------------------
     * Lightbox popups for media
     * Script file: jquery.magnific-popup.min.js
     * Documentation about used plugin:
     * http://dimsemenov.com/plugins/magnific-popup/documentation.html
     * ---------------------------*/
    CRUMINA.mediaPopups = function () {
        $('.play-video').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
        $('.js-zoom-image').magnificPopup({
            type: 'image',
            removalDelay: 500, //delay removal by X to allow out-animation
            callbacks: {
                beforeOpen: function () {
                    // just a hack that adds mfp-anim class to markup
                    this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                    this.st.mainClass = 'mfp-zoom-in';
                }
            },
            closeOnContentClick: true,
            midClick: true
        });
        $('.js-zoom-gallery').each(function () {
            $(this).magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: {
                    enabled: true
                },
                removalDelay: 500, //delay removal by X to allow out-animation
                callbacks: {
                    beforeOpen: function () {
                        // just a hack that adds mfp-anim class to markup
                        this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                        this.st.mainClass = 'mfp-zoom-in';
                    }
                },
                closeOnContentClick: true,
                midClick: true
            });
        });
    };

    /* -----------------------------
     * Sliders and Carousels
     * Script file: swiper.jquery.min.js
     * Documentation about used plugin:
     * http://idangero.us/swiper/api/
     * ---------------------------*/

	CRUMINA.initSwiper = function () {
		var initIterator = 0;
		var $breakPoints = false;
		$('.swiper-container').each(function () {

			var $t = $(this);
			var index = 'swiper-unique-id-' + initIterator;

			$t.addClass('swiper-' + index + ' initialized').attr('id', index);
			$t.find('.swiper-pagination').addClass('pagination-' + index);

			var $effect = ($t.data('effect')) ? $t.data('effect') : 'slide',
				$crossfade = ($t.data('crossfade')) ? $t.data('crossfade') : true,
				$loop = ($t.data('loop') == false) ? $t.data('loop') : true,
				$showItems = ($t.data('show-items')) ? $t.data('show-items') : 1,
				$scrollItems = ($t.data('scroll-items')) ? $t.data('scroll-items') : 1,
				$scrollDirection = ($t.data('direction')) ? $t.data('direction') : 'horizontal',
				$mouseScroll = ($t.data('mouse-scroll')) ? $t.data('mouse-scroll') : false,
				$autoplay = ($t.data('autoplay')) ? parseInt($t.data('autoplay'), 10) : 0,
				$autoheight = ($t.hasClass('auto-height')) ? true: false,
				$slidesSpace = ($showItems > 1) ? 20 : 0;

			if ($showItems > 1) {
				$breakPoints = {
					480: {
						slidesPerView: 1,
						slidesPerGroup: 1
					},
					768: {
						slidesPerView: 2,
						slidesPerGroup: 2
					}
				}
			}

			swipers['swiper-' + index] = new Swiper('.swiper-' + index, {
				pagination: '.pagination-' + index,
				paginationClickable: true,
				direction: $scrollDirection,
				mousewheelControl: $mouseScroll,
				mousewheelReleaseOnEdges: $mouseScroll,
				slidesPerView: $showItems,
				slidesPerGroup: $scrollItems,
				spaceBetween: $slidesSpace,
				keyboardControl: true,
				setWrapperSize: true,
				preloadImages: true,
				updateOnImagesReady: true,
				autoplay: $autoplay,
				autoHeight: $autoheight,
				loop: $loop,
				breakpoints: $breakPoints,
				effect: $effect,
				fade: {
					crossFade: $crossfade
				},
				parallax: true,
				onSlideChangeStart: function (swiper) {
				    var sliderThumbs = $t.siblings('.slider-slides');
					if (sliderThumbs.length) {
                        sliderThumbs.find('.slide-active').removeClass('slide-active');
						var realIndex = swiper.slides.eq(swiper.activeIndex).attr('data-swiper-slide-index');
                        sliderThumbs.find('.slides-item').eq(realIndex).addClass('slide-active');
					}
				}
			});
			initIterator++;
		});
		

        //swiper arrows
        $('.btn-prev').on('click', function () {
            var sliderID = $(this).closest('.slider-slides').siblings('.swiper-container').attr('id');
            swipers['swiper-' + sliderID].slidePrev();
        });

        $('.btn-next').on('click', function () {
            var sliderID = $(this).closest('.slider-slides').siblings('.swiper-container').attr('id');
            swipers['swiper-' + sliderID].slideNext();
        });
		
        //swiper arrows
        $('.btn-prev-without').on('click', function () {
            var sliderID = $(this).closest('.swiper-container').attr('id');
            swipers['swiper-' + sliderID].slidePrev();
        });

        $('.btn-next-without').on('click', function () {
            var sliderID = $(this).closest('.swiper-container').attr('id');
            swipers['swiper-' + sliderID].slideNext();
        });
		
		
        // Click on thumbs
        $('.slider-slides .slides-item').on('click', function () {
            if ($(this).hasClass('slide-active')) return false;
            var activeIndex = $(this).parent().find('.slides-item').index(this);
            var sliderID = $(this).closest('.slider-slides').siblings('.swiper-container').attr('id');
            swipers['swiper-' + sliderID].slideTo(activeIndex + 1);
            $(this).parent().find('.slide-active').removeClass('slide-active');
            $(this).addClass('slide-active');

            return false;
        });
	};

	
	/* -----------------------
	 * Progress bars Animation
	 * --------------------- */
    CRUMINA.progresBars = function () {
        $progress_bar.appear({force_process: true});
        $progress_bar.on('appear', function () {
            var current_bar = $(this);
            if (!current_bar.data('inited')) {
                current_bar.find('.skills-item-meter-active').fadeTo(300, 1).addClass('skills-animate');
                current_bar.data('inited', true);
            }
        });
    };



	/* -----------------------------
	 * Isotope sorting
	 * ---------------------------*/

	CRUMINA.IsotopeSort = function () {
		var $container = $('.sorting-container');
		$container.each(function () {
			var $current = $(this);
			var layout = ($current.data('layout').length) ? $current.data('layout') : 'masonry';
			$current.isotope({
				itemSelector: '.sorting-item',
				layoutMode: layout,
				percentPosition: true
			});

			$current.imagesLoaded().progress(function () {
				$current.isotope('layout');
			});

			var $sorting_buttons = $current.siblings('.sorting-menu').find('li');

			$sorting_buttons.on('click', function () {
				if ($(this).hasClass('active')) return false;
				$(this).parent().find('.active').removeClass('active');
				$(this).addClass('active');
				var filterValue = $(this).data('filter');
				if (typeof filterValue != "undefined") {
					$current.isotope({filter: filterValue});
					return false;
				}
			});
		});
	};

	/* -----------------------------
	 * Toggle functions
	 * ---------------------------*/

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href"); // activated tab
        if('#events' === target){
            $('.fc-state-active').click();
        }
    });

	// Toggle aside panels
	$(".js-sidebar-open").on('click', function () {
        $(this).toggleClass('active');
        $(this).closest($sidebar).toggleClass('open');
        return false;
    } );

	// Close on "Esc" click
    $window.keydown(function (eventObject) {
        if (eventObject.which == 27 && $sidebar.is(':visible')) {
            $sidebar.removeClass('open');
        }
    });

    // Close on click outside elements.
    $document.on('click', function (event) {
        if (!$(event.target).closest($sidebar).length && $sidebar.is(':visible')) {
            $sidebar.removeClass('open');
        }
    });

    // Toggle inline popups

    var $popup = $('.window-popup');

    $(".js-open-popup").on('click', function (event) {
        var target_popup = $(this).data('popup-target');
        var current_popup = $popup.filter(target_popup);
        var offset = $(this).offset();
        current_popup.addClass('open');
        current_popup.css('top', (offset.top - (current_popup.innerHeight() / 2)));
        $body.addClass('overlay-enable');
        return false;
    });

    // Close on "Esc" click
    $window.keydown(function (eventObject) {
        if (eventObject.which == 27) {
            $popup.removeClass('open');
            $body.removeClass('overlay-enable');
			$('.profile-menu').removeClass('expanded-menu');
			$('.popup-chat-responsive').removeClass('open-chat');
			$('.profile-settings-responsive').removeClass('open');
			$('.header-menu').removeClass('open');
        }
    });

    // Close on click outside elements.
    $document.on('click', function (event) {
        if (!$(event.target).closest($popup).length) {
            $popup.removeClass('open');
            $body.removeClass('overlay-enable');
			$('.profile-menu').removeClass('expanded-menu');
			$('.header-menu').removeClass('open');
        }
    });

    // Close active tab on second click.
    $('[data-toggle=tab]').on('click', function(){
		/*$body.toggleClass('body--fixed');*/
        if ($(this).hasClass('active') && $(this).closest('ul').hasClass('mobile-app-tabs')){
            $($(this).attr("href")).toggleClass('active');
            $(this).removeClass('active');
            return false;
        }
    });


    // Close on "X" click
    $(".js-close-popup").on('click', function () {
        $(this).closest($popup).removeClass('open');
        $body.removeClass('overlay-enable');
        return false
    });

	$(".profile-settings-open").on('click', function () {
		$('.profile-settings-responsive').toggleClass('open');
		return false
	});

	$(".js-expanded-menu").on('click', function () {
		$('.profile-menu').toggleClass('expanded-menu');
		return false
	});

	$(".js-chat-open").on('click', function () {
		$('.popup-chat-responsive').toggleClass('open-chat');
		return false
	});
    $(".js-chat-close").on('click', function () {
        $('.popup-chat-responsive').removeClass('open-chat');
        return false
    });

	$(".js-open-responsive-menu").on('click', function () {
		$('.header-menu').toggleClass('open');
		return false
	});

	$(".js-close-responsive-menu").on('click', function () {
		$('.header-menu').removeClass('open');
		return false
	});
	
		/* -----------------------------
	 * On DOM ready functions
	 * ---------------------------*/

	$document.ready(function () {
        CRUMINA.Bootstrap();
        CRUMINA.Materialize();
        CRUMINA.initSwiper();
		CRUMINA.Protection();
        CRUMINA.progresBars();
		CRUMINA.IsotopeSort();

        // Run scripts only if they included on page.
        
        if (typeof $.fn.matchHeight !== 'undefined'){
            CRUMINA.equalHeight();
        }
        if (typeof $.fn.magnificPopup !== 'undefined'){
            CRUMINA.mediaPopups();
        }
        if (typeof $.fn.gifplayer !== 'undefined'){
            $('.gif-play-image').gifplayer();
        }
        if (typeof $.fn.mediaelementplayer !== 'undefined'){
            $('#mediaplayer').mediaelementplayer({
                "features": ['prevtrack', 'playpause', 'nexttrack', 'loop', 'shuffle', 'current', 'progress', 'duration', 'volume']
            });
        }

        $('.mCustomScrollbar').perfectScrollbar({wheelPropagation:false});

	});
})(jQuery);
