(function ($) {
     /*
     * center menu 
     */
    function menu_align() {
        var headerWrap = $('.site-header');
        var navWrap = $('.navbar');
        var logoWrap = $('.site-logo');
        var iconWrap = $('.wrapper-icons');
        var containerWrap = $('.container');
        var classToAdd = 'header-align-center';
        if (headerWrap.hasClass(classToAdd))
        {
            headerWrap.removeClass(classToAdd);
        }
        var logoWidth = logoWrap.outerWidth();
        var menuWidth = navWrap.outerWidth();
        var iconWidth = iconWrap.outerWidth() + 20;
        var containerWidth = containerWrap.width();
        if (menuWidth + logoWidth + iconWidth > containerWidth) {
            headerWrap.addClass(classToAdd);
        } else {
            if (headerWrap.hasClass(classToAdd))
            {
                headerWrap.removeClass(classToAdd);
            }
        }
    }
    function ifraimeResize() {
        $('.entry-video iframe:visible , .entry-content iframe:visible').each(function () {
            var parentWidth = $(this).parent().width();
            var thisWidth = $(this).attr('width');
            var thisHeight = $(this).attr('height');
            $(this).css('width', parentWidth);
            var newHeight = thisHeight * parentWidth / thisWidth;
            $(this).css('height', newHeight);
        });
    }
    function flexsliderInit() {
        $('.gallery.flexslider').each(function () {
            var columns = $(this).attr('data-columns');
            var width = $(this).width() / columns - 3 * columns;
            $(this).flexslider({
                animation: "slide",
                controlNav: false,
                prevText: "",
                nextText: "",
                slideshow: false,
                animationLoop: false,
                minItems: 1,
                maxItems: columns,
                itemWidth: width,
                itemMargin: 0,
				keyboard: false,
                start: function () {
                    if ($('.masonry-blog').length) {
                        var container = $('.masonry-blog');
                        container.masonry('layout');
                    }
                }
            });
        });
    }
    function resizeSlider() {
        $('.middle-wrapper').css('height', 'auto');
        $('.flex-main-slider .slides .slide-wrapper').css('height', 'auto');
        var elementHeights = $('.flex-main-slider .container').map(function () {
            return $(this).height();
        }).get();
        var maxHeight = Math.max.apply(null, elementHeights) + 51 + 70;
        $('.flex-main-slider .slides .slide-wrapper').css('height', (maxHeight + 'px'));
        $('.middle-wrapper').css('height', (maxHeight + 'px'));
        $('.slide-wrapper').css('opacity', '1');

    }
    function stikyMenu() {
        /*
         * Sticky menu
         */
        if ($('.main-header').attr('data-sticky-menu') === 'on') {
            $('.main-header').css('min-height', $('.site-header').outerHeight());
        }
    }
    var top = 0;
    if ($('.main-header').length) {
        top = $('.main-header').offset().top;
    }
    $(document).ready(function () {
        menu_align();
        ifraimeResize();
        /*
         * Superfish menu
         */

        var example = $('#main-menu').superfish({
            speed: 'ease',
            onBeforeShow: function () {
                $(this).removeClass('toleft');
                if ($(this).parent().offset()) {
                    if (($(this).parent().offset().left + $(this).parent().width() - $(window).width() + 170) > 0) {
                        $(this).addClass('toleft');
                    }
                }
            }
        });
        /*
         * Back to top
         */
        $('body').on('click', '.toTop', function (e) {
            e.preventDefault();
            var mode = (window.opera) ? ((document.compatMode == "CSS1Compat") ? $('html') : $('body')) : $('html,body');
            mode.animate({
                scrollTop: 0
            }, 800);
            return false;
        });

        /*
         * style select 
         */
        $("select").each(function () {
            if ($(this).parent('.select-wrapper').length === 0) {
                $(this).wrap("<div class='select-wrapper'></div>");
            }
        });
        var container = $('.masonry-blog');

        $('#main-menu .current').removeClass('current');
        $('#main-menu a[href$="' + window.location.hash + '"]').parent('li').addClass('current');
		
		
		if (mp_profit_script_data && mp_profit_script_data.menu_smooth_scroll == "1") {
			
			$('body').on('click', '.main-header a[href*="#"]:not([href="#"])', function () {

				var addTo = 0;
				var headerHeight = 0;
				if ($('.main-header').attr('data-sticky-menu') === 'on' && $(window).width() > 767) {
					if ($('.main-header').hasClass('fixed-small')) {
						addTo = $('.site-header').outerHeight();
					} else {
						addTo = $('.main-header').outerHeight();
					}
				}

				var hash = this.hash;
				var idName = hash.substring(1);
				var alink = this;
				if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
					var target = $(this.hash);
					target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
					
					if (target.length) {
						$('html,body').animate(
							{scrollTop: target.offset().top - headerHeight - addTo},
							{
								duration:1000,
								complete:function(){
									$('body').removeClass('mp-scrolling');
									$('#main-menu .current').removeClass('current');
									$('#main-menu a[href$="' + idName + '"]').parent('li').addClass('current');
								},
								start:function(){
									$('body').addClass('mp-scrolling');
								}
							});
						return false;
					}
				}
			});
		}

        $(window).load(function () {
            ifraimeResize();
            menu_align();
            stikyMenu();
            if ($.isFunction($.fn.masonry)) {
                var container = $('.masonry-blog');
                container.masonry({
                    itemSelector: '.post',
                    columnWidth: function (containerWidth) {
                        return containerWidth / 3;
                    },
                    animationOptions: {
                        duration: 400
                    },
                    isRTL: $('body').is('.rtl')
                });
                container.infinitescroll({
                    navSelector: ".navigation",
                    nextSelector: ".navigation a:last-child",
                    itemSelector: ".masonry-blog .post",
                    loading: {
                        finishedMsg: '',
                        img: (mp_profit_script_data.url + '/images/loader.svg'),
                        msgText: ''
                    }
                }, function (newElements) {
                    var newElems = $(newElements).css({opacity: 0});
                    flexsliderInit();
                    newElems.imagesLoaded(function () {
                        flexsliderInit();
                        ifraimeResize();
                        newElems.animate({opacity: 1});
                        container.masonry('appended', newElems, true);
                    });
                });
            }
            flexsliderInit();
            /*
             * Main flex slider 
             */
            if ($('.flex-main-slider').length) {
                var slideshow = $('.flex-main-slider').attr('data-slideshow');
                if (slideshow === "1" || slideshow === "true"){
                    slideshow =true;
                }else{
                    slideshow =false;
                }
                var animation = $('.flex-main-slider').attr('data-animation');
                var speed = parseInt($('.flex-main-slider').attr('data-slideshowSpeed'));
                $('.flex-main-slider').flexslider({
                    animation: animation,
                    slideshow: slideshow,
                    slideshowSpeed: speed,
                    animationLoop: true,
                    pauseOnHover: true,
                    start: function () {
                        $('.main-slider-section').css('background', 'transparent');

                        resizeSlider();
                    },
                    before: function () {
                        resizeSlider();
                    }
                });
            }


        });
        /*
         *Search modal 
         */
        $('body').on("click", ".search-icon", function (e) {
            e.preventDefault();
            $(".modal-search-modal").slideDown(300);
        });
        $('body').on("click", ".close-search-modal", function (e) {
            e.preventDefault();
            $(".modal-search-modal").slideUp('fast');
        });
        stikyMenu();
        $(window).resize(function () {
            menu_align();
            resizeSlider();
            ifraimeResize();
            stikyMenu();
        });
    });
    $(window).scroll(function () {
        if ( ($(window).scrollTop() > 1000) && ($( window ).width() > 768) ) {
            $('.toTop').show(100);
        } else {
            $('.toTop').hide("fast");
        }
        if ($(window).scrollTop() > 120) {
            if ($('.main-header').attr('data-sticky-menu') === 'on') {
                $('.main-header').addClass('fixed-small');
            }
        } else {
            $('.main-header').removeClass('fixed-small');
        }
		
		// select menu
		
		if ( $('body').hasClass('mp-scrolling') ) {
			return false;
		}

        var addTo = 0;
        if ($('.main-header').attr('data-sticky-menu') === 'on' && $(window).width() > 767) {
            if ($('.main-header').hasClass('fixed')) {
                addTo = $('.main-header').outerHeight();
            } else {
                addTo = $('.main-header').outerHeight() + $('.site-header').outerHeight();
            }
        }
        var theme_scrollTop = $(window).scrollTop();
        var headerHeight = $('.main-header').outerHeight();
        var isInOneSection = 'no';
        $("section").each(function () {
            var thisID = '#' + jQuery(this).attr('id');
            var theme_offset = jQuery(this).offset().top;
            var thisHeight = jQuery(this).outerHeight();
            var thisBegin = theme_offset - headerHeight;
            var thisEnd = theme_offset + thisHeight - headerHeight - addTo;
            if (theme_scrollTop >= thisBegin && theme_scrollTop <= thisEnd) {
                isInOneSection = 'yes';
                $('#main-menu .current').removeClass('current');

                $('#main-menu a[href$="' + thisID + '"]').parent('li').addClass('current');
                return false;
            }
            if (isInOneSection == 'no') {
                $('#main-menu .current').removeClass('current');
            }
        });
    });

})(jQuery);