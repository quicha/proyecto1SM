/**
 * Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Customizer preview reload changes asynchronously.
 * Things like site title and description changes.
 */

(function ($) {
    function menu_align() {
        var headerWrap = $('.site-header');
        var navWrap = $('.navbar');
        var logoWrap = $('.site-logo');
        var containerWrap = $('.container');
        var classToAdd = 'header-align-center';
        if (headerWrap.hasClass(classToAdd)) {
            headerWrap.removeClass(classToAdd);
        }
        var logoWidth = logoWrap.outerWidth();
        var menuWidth = navWrap.outerWidth();
        var containerWidth = containerWrap.width();
        if (menuWidth + logoWidth > containerWidth) {
            headerWrap.addClass(classToAdd);
        } else {
            if (headerWrap.hasClass(classToAdd)) {
                headerWrap.removeClass(classToAdd);
            }
        }

    }

    wp.customize('blogdescription', function (value) {
        value.bind(function (to) {
            $('.site-logo').text('');
            var text = '';
            if ((wp.customize.instance('mp_profit_logo').get() !== '') || (to !== '') || (wp.customize.instance('blogname').get() !== '')) {
                text += '<a class="home-link" href="#" title="" rel="home">';
                if (wp.customize.instance('mp_profit_logo').get() !== '') {
                    text += '<div class="header-logo "><img src="' + wp.customize.instance('mp_profit_logo').get() + '" alt=""></div>';
                }

                text += '<div class="site-description">';
                text += '<h1 class="site-title';
                if (to !== '') {
                    text += ' empty-tagline';
                }
                text += '">' + wp.customize.instance('blogname').get() + '</h1>';
                if (to !== '') {
                    text += '<p class="site-tagline">' + to + '</p>';
                }
                text += '</div>';
                text += '</a>';
            }
            $('.site-logo').append(text);
            menu_align();
        });
    });
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('.site-logo').text('');
            var text = '';
            if ((wp.customize.instance('mp_profit_logo').get() !== '') || (wp.customize.instance('blogdescription').get() !== '') || (to !== '')) {
                text += '<a class="home-link" href="#" title="" rel="home">';
                if (wp.customize.instance('mp_profit_logo').get() !== '') {
                    text += '<div class="header-logo "><img src="' + wp.customize.instance('mp_profit_logo').get() + '" alt=""></div>';
                }

                text += '<div class="site-description">';
                text += '<h1 class="site-title';
                if (wp.customize.instance('blogdescription').get() !== '') {
                    text += ' empty-tagline';
                }
                text += '">' + to + '</h1>';
                if (wp.customize.instance('blogdescription').get() !== '') {
                    text += '<p class="site-tagline">' + wp.customize.instance('blogdescription').get() + '</p>';
                }
                text += '</div>';
                text += '</a>';
            }
            $('.site-logo').append(text);
            menu_align();
        });
    });
    wp.customize('mp_profit_facebook_link', function (value) {
        value.bind(function (to) {
            $('.main-header .social-profile').text('');
            $('.site-footer .social-profile').text('');
            var text = '';
            if (to !== '') {
                text += '<a href="' + to + '" class="button-facebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>';
            }
            if (wp.customize.instance('mp_profit_twitter_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_twitter_link').get() + '" class="button-twitter" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>';
            }
            if (wp.customize.instance('mp_profit_linkedin_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_linkedin_link').get() + '" class="button-linkedin" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>';
            }
            if (wp.customize.instance('mp_profit_google_plus_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_google_plus_link').get() + '" class="button-google" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a>';
            }
            if (wp.customize.instance('mp_profit_instagram_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_instagram_link').get() + '" class="button-instagram" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>';
            }
            if (wp.customize.instance('mp_profit_rss_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_rss_link').get() + '" class="button-rss" title="Rss" target="_blank"><i class="fa fa-rss"></i></a>';
            }

            $('.main-header .social-profile').append(text);
            $('.site-footer .social-profile').append(text);
        });
    });
    wp.customize('mp_profit_twitter_link', function (value) {
        value.bind(function (to) {
            $('.main-header .social-profile').text('');
            $('.site-footer .social-profile').text('');
            var text = '';
            if (wp.customize.instance('mp_profit_facebook_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_facebook_link').get() + '" class="button-facebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>';
            }
            if (to !== '') {
                text += '<a href="' + to + '" class="button-twitter" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>';
            }
            if (wp.customize.instance('mp_profit_linkedin_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_linkedin_link').get() + '" class="button-linkedin" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>';
            }
            if (wp.customize.instance('mp_profit_google_plus_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_google_plus_link').get() + '" class="button-google" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a>';
            }
            if (wp.customize.instance('mp_profit_instagram_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_instagram_link').get() + '" class="button-instagram" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>';
            }
            if (wp.customize.instance('mp_profit_pinterest_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_pinterest_link').get() + '" class="button-pinterest" title="pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>';
            }
            if (wp.customize.instance('mp_profit_tumblr_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_tumblr_link').get() + '" class="button-tumblr" title="tumblr" target="_blank"><i class="fa fa-tumblr"></i></a>';
            }
            if (wp.customize.instance('mp_profit_youtube_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_youtube_link').get() + '" class="button-youtube" title="youtube" target="_blank"><i class="fa fa-youtube"></i></a>';
            }
            if (wp.customize.instance('mp_profit_rss_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_rss_link').get() + '" class="button-rss" title="Rss" target="_blank"><i class="fa fa-rss"></i></a>';
            }
            $('.main-header .social-profile').append(text);
            $('.site-footer .social-profile').append(text);
        });
    });
    wp.customize('mp_profit_linkedin_link', function (value) {
        value.bind(function (to) {
            $('.main-header .social-profile').text('');
            $('.site-footer .social-profile').text('');
            var text = '';
            if (wp.customize.instance('mp_profit_facebook_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_facebook_link').get() + '" class="button-facebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>';
            }
            if (wp.customize.instance('mp_profit_twitter_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_twitter_link').get() + '" class="button-twitter" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>';
            }
            if (to !== '') {
                text += '<a href="' + to + '" class="button-linkedin" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>';
            }
            if (wp.customize.instance('mp_profit_google_plus_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_google_plus_link').get() + '" class="button-google" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a>';
            }
            if (wp.customize.instance('mp_profit_instagram_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_instagram_link').get() + '" class="button-instagram" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>';
            }
            if (wp.customize.instance('mp_profit_pinterest_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_pinterest_link').get() + '" class="button-pinterest" title="pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>';
            }
            if (wp.customize.instance('mp_profit_tumblr_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_tumblr_link').get() + '" class="button-tumblr" title="tumblr" target="_blank"><i class="fa fa-tumblr"></i></a>';
            }
            if (wp.customize.instance('mp_profit_youtube_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_youtube_link').get() + '" class="button-youtube" title="youtube" target="_blank"><i class="fa fa-youtube"></i></a>';
            }
            if (wp.customize.instance('mp_profit_rss_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_rss_link').get() + '" class="button-rss" title="Rss" target="_blank"><i class="fa fa-rss"></i></a>';
            }
            $('.main-header .social-profile').append(text);
            $('.site-footer .social-profile').append(text);
        });
    });
    wp.customize('mp_profit_google_plus_link', function (value) {
        value.bind(function (to) {
            $('.main-header .social-profile').text('');
            $('.site-footer .social-profile').text('');
            var text = '';
            if (wp.customize.instance('mp_profit_facebook_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_facebook_link').get() + '" class="button-facebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>';
            }
            if (wp.customize.instance('mp_profit_twitter_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_twitter_link').get() + '" class="button-twitter" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>';
            }
            if (wp.customize.instance('mp_profit_linkedin_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_linkedin_link').get() + '" class="button-linkedin" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>';
            }
            if (to !== '') {
                text += '<a href="' + to + '" class="button-google" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a>';
            }
            if (wp.customize.instance('mp_profit_instagram_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_instagram_link').get() + '" class="button-instagram" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>';
            }
            if (wp.customize.instance('mp_profit_pinterest_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_pinterest_link').get() + '" class="button-pinterest" title="pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>';
            }
            if (wp.customize.instance('mp_profit_tumblr_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_tumblr_link').get() + '" class="button-tumblr" title="tumblr" target="_blank"><i class="fa fa-tumblr"></i></a>';
            }
            if (wp.customize.instance('mp_profit_youtube_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_youtube_link').get() + '" class="button-youtube" title="youtube" target="_blank"><i class="fa fa-youtube"></i></a>';
            }
            if (wp.customize.instance('mp_profit_rss_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_rss_link').get() + '" class="button-rss" title="Rss" target="_blank"><i class="fa fa-rss"></i></a>';
            }
            $('.main-header .social-profile').append(text);
            $('.site-footer .social-profile').append(text);
        });
    });
    wp.customize('mp_profit_rss_link', function (value) {
        value.bind(function (to) {
            $('.main-header .social-profile').text('');
            $('.site-footer .social-profile').text('');
            var text = '';
            if (wp.customize.instance('mp_profit_facebook_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_facebook_link').get() + '" class="button-facebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>';
            }
            if (wp.customize.instance('mp_profit_twitter_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_twitter_link').get() + '" class="button-twitter" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>';
            }
            if (wp.customize.instance('mp_profit_linkedin_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_linkedin_link').get() + '" class="button-linkedin" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>';
            }
            if (wp.customize.instance('mp_profit_google_plus_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_google_plus_link').get() + '" class="button-google" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a>';
            }
            if (wp.customize.instance('mp_profit_instagram_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_instagram_link').get() + '" class="button-instagram" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>';
            }
            if (wp.customize.instance('mp_profit_pinterest_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_pinterest_link').get() + '" class="button-pinterest" title="pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>';
            }
            if (wp.customize.instance('mp_profit_tumblr_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_tumblr_link').get() + '" class="button-tumblr" title="tumblr" target="_blank"><i class="fa fa-tumblr"></i></a>';
            }
            if (wp.customize.instance('mp_profit_youtube_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_youtube_link').get() + '" class="button-youtube" title="youtube" target="_blank"><i class="fa fa-youtube"></i></a>';
            }
            if (to !== '') {
                text += '<a href="' + to + '" class="button-rss" title="Rss" target="_blank"><i class="fa fa-rss"></i></a>';
            }
            $('.main-header .social-profile').append(text);
            $('.site-footer .social-profile').append(text);
        });
    });
    wp.customize('mp_profit_instagram_link', function (value) {
        value.bind(function (to) {
            $('.main-header .social-profile').text('');
            $('.site-footer .social-profile').text('');
            var text = '';
            if (wp.customize.instance('mp_profit_facebook_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_facebook_link').get() + '" class="button-facebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>';
            }
            if (wp.customize.instance('mp_profit_twitter_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_twitter_link').get() + '" class="button-twitter" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>';
            }
            if (wp.customize.instance('mp_profit_linkedin_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_linkedin_link').get() + '" class="button-linkedin" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>';
            }
            if (wp.customize.instance('mp_profit_google_plus_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_google_plus_link').get() + '" class="button-google" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a>';
            }
            if (to !== '') {
                text += '<a href="' + to + '" class="button-instagram" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>';
            }
            if (wp.customize.instance('mp_profit_pinterest_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_pinterest_link').get() + '" class="button-pinterest" title="pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>';
            }
            if (wp.customize.instance('mp_profit_tumblr_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_tumblr_link').get() + '" class="button-tumblr" title="tumblr" target="_blank"><i class="fa fa-tumblr"></i></a>';
            }
            if (wp.customize.instance('mp_profit_youtube_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_youtube_link').get() + '" class="button-youtube" title="youtube" target="_blank"><i class="fa fa-youtube"></i></a>';
            }
            if (wp.customize.instance('mp_profit_rss_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_rss_link').get() + '" class="button-rss" title="Rss" target="_blank"><i class="fa fa-rss"></i></a>';
            }
            $('.main-header .social-profile').append(text);
            $('.site-footer .social-profile').append(text);
        });
    });
    wp.customize('mp_profit_pinterest_link', function (value) {
        value.bind(function (to) {
            $('.main-header .social-profile').text('');
            $('.site-footer .social-profile').text('');
            var text = '';
            if (wp.customize.instance('mp_profit_facebook_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_facebook_link').get() + '" class="button-facebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>';
            }
            if (wp.customize.instance('mp_profit_twitter_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_twitter_link').get() + '" class="button-twitter" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>';
            }
            if (wp.customize.instance('mp_profit_linkedin_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_linkedin_link').get() + '" class="button-linkedin" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>';
            }
            if (wp.customize.instance('mp_profit_google_plus_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_google_plus_link').get() + '" class="button-google" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a>';
            }
            if (wp.customize.instance('mp_profit_instagram_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_instagram_link').get() + '" class="button-instagram" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>';
            }
            if (to !== '') {
                text += '<a href="' + to + '" class="button-pinterest" title="pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>';
            }
            if (wp.customize.instance('mp_profit_tumblr_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_tumblr_link').get() + '" class="button-tumblr" title="tumblr" target="_blank"><i class="fa fa-tumblr"></i></a>';
            }
            if (wp.customize.instance('mp_profit_youtube_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_youtube_link').get() + '" class="button-youtube" title="youtube" target="_blank"><i class="fa fa-youtube"></i></a>';
            }
            if (wp.customize.instance('mp_profit_rss_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_rss_link').get() + '" class="button-rss" title="Rss" target="_blank"><i class="fa fa-rss"></i></a>';
            }
            $('.main-header .social-profile').append(text);
            $('.site-footer .social-profile').append(text);
        });
    });
    wp.customize('mp_profit_tumblr_link', function (value) {
        value.bind(function (to) {
            $('.main-header .social-profile').text('');
            $('.site-footer .social-profile').text('');
            var text = '';
            if (wp.customize.instance('mp_profit_facebook_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_facebook_link').get() + '" class="button-facebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>';
            }
            if (wp.customize.instance('mp_profit_twitter_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_twitter_link').get() + '" class="button-twitter" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>';
            }
            if (wp.customize.instance('mp_profit_linkedin_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_linkedin_link').get() + '" class="button-linkedin" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>';
            }
            if (wp.customize.instance('mp_profit_google_plus_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_google_plus_link').get() + '" class="button-google" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a>';
            }
            if (wp.customize.instance('mp_profit_instagram_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_instagram_link').get() + '" class="button-instagram" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>';
            }
            if (wp.customize.instance('mp_profit_pinterest_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_pinterest_link').get() + '" class="button-pinterest" title="pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>';
            }
            if (to !== '') {
                text += '<a href="' + to + '" class="button-tumblr" title="tumblr" target="_blank"><i class="fa fa-tumblr"></i></a>';
            }
            if (wp.customize.instance('mp_profit_youtube_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_youtube_link').get() + '" class="button-youtube" title="youtube" target="_blank"><i class="fa fa-youtube"></i></a>';
            }
            if (wp.customize.instance('mp_profit_rss_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_rss_link').get() + '" class="button-rss" title="Rss" target="_blank"><i class="fa fa-rss"></i></a>';
            }
            $('.main-header .social-profile').append(text);
            $('.site-footer .social-profile').append(text);
        });
    });
    wp.customize('mp_profit_youtube_link', function (value) {
        value.bind(function (to) {
            $('.main-header .social-profile').text('');
            $('.site-footer .social-profile').text('');
            var text = '';
            if (wp.customize.instance('mp_profit_facebook_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_facebook_link').get() + '" class="button-facebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>';
            }
            if (wp.customize.instance('mp_profit_twitter_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_twitter_link').get() + '" class="button-twitter" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>';
            }
            if (wp.customize.instance('mp_profit_linkedin_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_linkedin_link').get() + '" class="button-linkedin" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>';
            }
            if (wp.customize.instance('mp_profit_google_plus_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_google_plus_link').get() + '" class="button-google" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a>';
            }
            if (wp.customize.instance('mp_profit_instagram_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_instagram_link').get() + '" class="button-instagram" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>';
            }
            if (wp.customize.instance('mp_profit_pinterest_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_pinterest_link').get() + '" class="button-pinterest" title="pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>';
            }
            if (wp.customize.instance('mp_profit_tumblr_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_tumblr_link').get() + '" class="button-tumblr" title="tumblr" target="_blank"><i class="fa fa-tumblr"></i></a>';
            }
            if (to !== '') {
                text += '<a href="' + to + '" class="button-youtube" title="youtube" target="_blank"><i class="fa fa-youtube"></i></a>';
            }
            if (wp.customize.instance('mp_profit_rss_link').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_rss_link').get() + '" class="button-rss" title="Rss" target="_blank"><i class="fa fa-rss"></i></a>';
            }
            $('.main-header .social-profile').append(text);
            $('.site-footer .social-profile').append(text);
        });
    });
    wp.customize('header_image', function (value) {
        value.bind(function (to) {
            if (to === '') {
                $('.header-image-wrapper').hide();
            } else {
                $('.header-image-wrapper').show();
                $('.header-image-wrapper .header-image').css('background-image', to);
            }
        });
    });
    wp.customize('header_textcolor', function (value) {
        value.bind(function (to) {
            if ('blank' == to) {
                $('.site-description').hide();
            } else {
                $('.site-description').show();
            }
        });
    });
    wp.customize('mp_profit_features_title', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.features-section .section-title').text('');
            if (to !== '') {
                if ($('.features-section .section-title').length) {
                    $('.features-section .section-title').text(to);
                } else {
                    $('.features-section .section-content').prepend('<h2 class="section-title">' + to + '</h2>');
                }
            }

        });
    });
    wp.customize('mp_profit_features_subtitle', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.features-section .section-subtitle').text('');
            if (to !== '') {
                if ($('.features-section .section-subtitle').length) {
                    $('.features-section .section-subtitle').text(to);
                } else {
                    if ($('.features-section .section-title').length) {
                        $('.features-section .section-title').after('<div class="section-subtitle">' + to + '</div>');
                    } else {
                        $('.features-section .section-content').prepend('<div class="section-subtitle">' + to + '</div>');

                    }
                }
            }
        });
    });
    wp.customize('mp_profit_calculator_title', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.calculator-section .section-title').text('');
            if (to !== '') {
                if ($('.calculator-section .section-title').length) {
                    $('.calculator-section .section-title').text(to);
                } else {
                    $('.calculator-section .section-content').prepend('<h2 class="section-title">' + to + '</h2>');
                }
            }

        });
    });
    wp.customize('mp_profit_calculator_subtitle', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.calculator-section .section-subtitle').text('');
            if (to !== '') {
                if ($('.calculator-section .section-subtitle').length) {
                    $('.calculator-section .section-subtitle').text(to);
                } else {
                    if ($('.calculator-section .section-title').length) {
                        $('.calculator-section .section-title').after('<div class="section-subtitle">' + to + '</div>');
                    } else {
                        $('.calculator-section .section-content').prepend('<div class="section-subtitle">' + to + '</div>');

                    }
                }
            }
        });
    });
    wp.customize('mp_profit_first_action_title', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.first-action-section .section-content').text('');
            if (to !== '') {
                text += '<h2 class="section-title">' + to + '</h2>';
            }
            if (wp.customize.instance('mp_profit_first_action_description').get() !== '') {
                text += '<div class="section-description">' + wp.customize.instance('mp_profit_first_action_description').get() + '</div>';
            }
            text += '<div class="section-buttons">';
            if (wp.customize.instance('mp_profit_first_action_brandbutton_label').get() !== '' && wp.customize.instance('mp_profit_first_action_brandbutton_url').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_first_action_brandbutton_url').get() + '" title="' + wp.customize.instance('mp_profit_first_action_brandbutton_label').get() + '" class="button btn-size-middle">' + wp.customize.instance('mp_profit_first_action_brandbutton_label').get() + '</a> ';
            }
            text += '</div>';
            $('.first-action-section .section-content').append(text);
        });
    });
    wp.customize('mp_profit_first_action_description', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.first-action-section .section-content').text('');
            if (wp.customize.instance('mp_profit_first_action_title').get() !== '') {

                text += '<h2 class="section-title">' + wp.customize.instance('mp_profit_first_action_title').get() + '</h2>';
            }
            if (to !== '') {
                text += '<div class="section-description">' + to + '</div>';
            }

            text += '<div class="section-buttons">';
            if (wp.customize.instance('mp_profit_first_action_brandbutton_label').get() !== '' && wp.customize.instance('mp_profit_first_action_brandbutton_url').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_first_action_brandbutton_url').get() + '" title="' + wp.customize.instance('mp_profit_first_action_brandbutton_label').get() + '" class="button btn-size-middle">' + wp.customize.instance('mp_profit_first_action_brandbutton_label').get() + '</a> ';
            }
            text += '</div>';
            $('.first-action-section .section-content').append(text);
        });
    });
    wp.customize('mp_profit_first_action_brandbutton_label', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.first-action-section .section-content').text('');
            if (wp.customize.instance('mp_profit_first_action_title').get() !== '') {

                text += '<h2 class="section-title">' + wp.customize.instance('mp_profit_first_action_title').get() + '</h2>';
            }
            if (wp.customize.instance('mp_profit_first_action_description').get() !== '') {
                text += '<div class="section-description">' + wp.customize.instance('mp_profit_first_action_description').get() + '</div>';
            }

            text += '<div class="section-buttons">';
            if (to !== '' && wp.customize.instance('mp_profit_first_action_brandbutton_url').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_first_action_brandbutton_url').get() + '" title="' + to + '" class="button btn-size-middle">' + to + '</a> ';
            }
            text += '</div>';
            $('.first-action-section .section-content').append(text);
        });
    });
    wp.customize('mp_profit_first_action_brandbutton_url', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.first-action-section .section-content').text('');
            if (wp.customize.instance('mp_profit_first_action_title').get() !== '') {

                text += '<h2 class="section-title">' + wp.customize.instance('mp_profit_first_action_title').get() + '</h2>';
            }
            if (wp.customize.instance('mp_profit_first_action_description').get() !== '') {
                text += '<div class="section-description">' + wp.customize.instance('mp_profit_first_action_description').get() + '</div>';
            }

            text += '<div class="section-buttons">';
            if (wp.customize.instance('mp_profit_first_action_brandbutton_label').get() !== '' && to !== '') {
                text += '<a href="' + to + '" title="' + wp.customize.instance('mp_profit_first_action_brandbutton_label').get() + '" class="button btn-size-middle">' + wp.customize.instance('mp_profit_first_action_brandbutton_label').get() + '</a> ';
            }
            text += '</div>';
            $('.first-action-section .section-content').append(text);
        });
    });
    wp.customize('mp_profit_services_title', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.services-section .section-title').text('');
            if (to !== '') {
                if ($('.services-section .section-title').length) {
                    $('.services-section .section-title').text(to);
                } else {
                    $('.services-section .section-content').prepend('<h2 class="section-title">' + to + '</h2>');
                }
            }

        });
    });
    wp.customize('mp_profit_services_subtitle', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.services-section .section-subtitle').text('');
            if (to !== '') {
                if ($('.services-section .section-subtitle').length) {
                    $('.services-section .section-subtitle').text(to);
                } else {
                    if ($('.services-section .section-title').length) {
                        $('.services-section .section-title').after('<div class="section-subtitle">' + to + '</div>');
                    } else {
                        $('.services-section .section-content').prepend('<div class="section-subtitle">' + to + '</div>');

                    }
                }
            }
        });
    });
    wp.customize('mp_profit_services_button_url', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.services-section .section-buttons').text('');
            if (wp.customize.instance('mp_profit_services_button_label').get() !== '' && to !== '') {
                text += '<a href="' + to + '" title="' + wp.customize.instance('mp_profit_services_button_label').get() + '" class="button white-button">' + wp.customize.instance('mp_profit_services_button_label').get() + '</a>';
            }
            $('.services-section .section-buttons').append(text);
        });
    });
    wp.customize('mp_profit_services_button_label', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.services-section .section-buttons').text('');
            if (wp.customize.instance('mp_profit_services_button_url').get() !== '' && to !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_services_button_url').get() + '" title="' + to + '" class="button white-button">' + to + '</a>';
            }
            $('.services-section .section-buttons').append(text);
        });
    });
    wp.customize('mp_profit_second_action_title', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.second-action-section .section-content').text('');
            if (to !== '') {
                text += '<h2 class="section-title">' + to + '</h2>';
            }
            if (wp.customize.instance('mp_profit_second_action_subtitle').get() !== '') {
                text += '<div class="section-subtitle">' + wp.customize.instance('mp_profit_second_action_subtitle').get() + '</div>';
            }
            if (wp.customize.instance('mp_profit_second_action_description').get() !== '') {
                text += '<div class="section-description">' + wp.customize.instance('mp_profit_second_action_description').get() + '</div>';
            }
            text += '<div class="section-buttons">';
            if (wp.customize.instance('mp_profit_second_action_brandbutton_label').get() !== '' && wp.customize.instance('mp_profit_second_action_brandbutton_url').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_second_action_brandbutton_url').get() + '" title="' + wp.customize.instance('mp_profit_second_action_brandbutton_label').get() + '" class="button btn-size-middle">' + wp.customize.instance('mp_profit_second_action_brandbutton_label').get() + '</a> ';
            }
            text += '</div>';
            $('.second-action-section .section-content').append(text);
        });
    });
    wp.customize('mp_profit_second_action_subtitle', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.second-action-section .section-content').text('');
            if (wp.customize.instance('mp_profit_second_action_title').get() !== '') {

                text += '<h2 class="section-title">' + wp.customize.instance('mp_profit_second_action_title').get() + '</h2>';
            }
            if (to !== '') {
                text += '<div class="section-subtitle">' + to + '</div>';
            }
            if (wp.customize.instance('mp_profit_second_action_description').get() !== '') {
                text += '<div class="section-description">' + wp.customize.instance('mp_profit_second_action_description').get() + '</div>';
            }
            text += '<div class="section-buttons">';
            if (wp.customize.instance('mp_profit_second_action_brandbutton_label').get() !== '' && wp.customize.instance('mp_profit_second_action_brandbutton_url').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_second_action_brandbutton_url').get() + '" title="' + wp.customize.instance('mp_profit_second_action_brandbutton_label').get() + '" class="button btn-size-middle">' + wp.customize.instance('mp_profit_second_action_brandbutton_label').get() + '</a> ';
            }
            text += '</div>';
            $('.second-action-section .section-content').append(text);
        });
    });
    wp.customize('mp_profit_second_action_description', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.second-action-section .section-content').text('');
            if (wp.customize.instance('mp_profit_second_action_title').get() !== '') {

                text += '<h2 class="section-title">' + wp.customize.instance('mp_profit_second_action_title').get() + '</h2>';
            }
            if (wp.customize.instance('mp_profit_second_action_subtitle').get() !== '') {
                text += '<div class="section-subtitle">' + wp.customize.instance('mp_profit_second_action_subtitle').get() + '</div>';
            }

            if (to !== '') {
                text += '<div class="section-description">' + to + '</div>';
            }

            text += '<div class="section-buttons">';
            if (wp.customize.instance('mp_profit_second_action_brandbutton_label').get() !== '' && wp.customize.instance('mp_profit_second_action_brandbutton_url').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_second_action_brandbutton_url').get() + '" title="' + wp.customize.instance('mp_profit_second_action_brandbutton_label').get() + '" class="button btn-size-middle">' + wp.customize.instance('mp_profit_second_action_brandbutton_label').get() + '</a> ';
            }
            text += '</div>';
            $('.second-action-section .section-content').append(text);
        });
    });
    wp.customize('mp_profit_second_action_brandbutton_label', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.second-action-section .section-content').text('');
            if (wp.customize.instance('mp_profit_second_action_title').get() !== '') {

                text += '<h2 class="section-title">' + wp.customize.instance('mp_profit_second_action_title').get() + '</h2>';
            }
            if (wp.customize.instance('mp_profit_second_action_subtitle').get() !== '') {
                text += '<div class="section-subtitle">' + wp.customize.instance('mp_profit_second_action_subtitle').get() + '</div>';
            }
            if (wp.customize.instance('mp_profit_second_action_description').get() !== '') {
                text += '<div class="section-description">' + wp.customize.instance('mp_profit_second_action_description').get() + '</div>';
            }

            text += '<div class="section-buttons">';
            if (to !== '' && wp.customize.instance('mp_profit_second_action_brandbutton_url').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_second_action_brandbutton_url').get() + '" title="' + to + '" class="button btn-size-middle">' + to + '</a> ';
            }
            text += '</div>';
            $('.second-action-section .section-content').append(text);
        });
    });
    wp.customize('mp_profit_second_action_brandbutton_url', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.second-action-section .section-content').text('');
            if (wp.customize.instance('mp_profit_second_action_title').get() !== '') {

                text += '<h2 class="section-title">' + wp.customize.instance('mp_profit_second_action_title').get() + '</h2>';
            }
            if (wp.customize.instance('mp_profit_second_action_subtitle').get() !== '') {
                text += '<div class="section-subtitle">' + wp.customize.instance('mp_profit_second_action_subtitle').get() + '</div>';
            }
            if (wp.customize.instance('mp_profit_second_action_description').get() !== '') {
                text += '<div class="section-description">' + wp.customize.instance('mp_profit_second_action_description').get() + '</div>';
            }

            text += '<div class="section-buttons">';
            if (wp.customize.instance('mp_profit_second_action_brandbutton_label').get() !== '' && to !== '') {
                text += '<a href="' + to + '" title="' + wp.customize.instance('mp_profit_second_action_brandbutton_label').get() + '" class="button btn-size-middle">' + wp.customize.instance('mp_profit_second_action_brandbutton_label').get() + '</a> ';
            }
            text += '</div>';
            $('.second-action-section .section-content').append(text);
        });
    });
    wp.customize('mp_profit_team_title', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.team-section .section-title').text('');
            if (to !== '') {
                if ($('.team-section .section-title').length) {
                    $('.team-section .section-title').text(to);
                } else {
                    $('.team-section .section-content').prepend('<h2 class="section-title">' + to + '</h2>');
                }
            }

        });
    });
    wp.customize('mp_profit_team_subtitle', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.team-section .section-subtitle').text('');
            if (to !== '') {
                if ($('.team-section .section-subtitle').length) {
                    $('.team-section .section-subtitle').text(to);
                } else {
                    if ($('.team-section .section-title').length) {
                        $('.team-section .section-title').after('<div class="section-subtitle">' + to + '</div>');
                    } else {
                        $('.team-section .section-content').prepend('<div class="section-subtitle">' + to + '</div>');

                    }
                }
            }
        });
    });
    wp.customize('mp_profit_news_title', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.news-section .section-title').text('');
            if (to !== '') {
                if ($('.news-section .section-title').length) {
                    $('.news-section .section-title').text(to);
                } else {
                    $('.news-section .section-content').prepend('<h2 class="section-title">' + to + '</h2>');
                }
            }

        });
    });
    wp.customize('mp_profit_news_subtitle', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.news-section .section-subtitle').text('');
            if (to !== '') {
                if ($('.news-section .section-subtitle').length) {
                    $('.news-section .section-subtitle').text(to);
                } else {
                    if ($('.news-section .section-title').length) {
                        $('.news-section .section-title').after('<div class="section-subtitle">' + to + '</div>');
                    } else {
                        $('.news-section .section-content').prepend('<div class="section-subtitle">' + to + '</div>');

                    }
                }
            }
        });
    });
    wp.customize('mp_profit_news_button_url', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.news-section .section-buttons').text('');
            if (wp.customize.instance('mp_profit_news_button_label').get() !== '' && to !== '') {
                text += '<a href="' + to + '" title="' + wp.customize.instance('mp_profit_news_button_label').get() + '" class="button white-button">' + wp.customize.instance('mp_profit_news_button_label').get() + '</a>';
            }
            $('.news-section .section-buttons').append(text);
        });
    });
    wp.customize('mp_profit_news_button_label', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.news-section .section-buttons').text('');
            if (wp.customize.instance('mp_profit_news_button_url').get() !== '' && to !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_news_button_url').get() + '" title="' + to + '" class="button white-button">' + to + '</a>';
            }
            $('.news-section .section-buttons').append(text);
        });
    });
    wp.customize('mp_profit_pricing_title', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.pricing-section .section-title').text('');
            if (to !== '') {
                if ($('.pricing-section .section-title').length) {
                    $('.pricing-section .section-title').text(to);
                } else {
                    $('.pricing-section .section-content').prepend('<h2 class="section-title">' + to + '</h2>');
                }
            }

        });
    });
    wp.customize('mp_profit_pricing_subtitle', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.pricing-section .section-subtitle').text('');
            if (to !== '') {
                if ($('.pricing-section .section-subtitle').length) {
                    $('.pricing-section .section-subtitle').text(to);
                } else {
                    if ($('.pricing-section .section-title').length) {
                        $('.pricing-section .section-title').after('<div class="section-subtitle">' + to + '</div>');
                    } else {
                        $('.pricing-section .section-content').prepend('<div class="section-subtitle">' + to + '</div>');

                    }
                }
            }
        });
    });
    wp.customize('mp_profit_newsletter_title', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.newsletter-section .section-title').text('');
            if (to !== '') {
                if ($('.newsletter-section .section-title').length) {
                    $('.newsletter-section .section-title').text(to);
                } else {
                    $('.newsletter-section .section-content').prepend('<h2 class="section-title">' + to + '</h2>');
                }
            }

        });
    });
    wp.customize('mp_profit_newsletter_subtitle', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.newsletter-section .section-subtitle').text('');
            if (to !== '') {
                if ($('.newsletter-section .section-subtitle').length) {
                    $('.newsletter-section .section-subtitle').text(to);
                } else {
                    if ($('.newsletter-section .section-title').length) {
                        $('.newsletter-section .section-title').after('<div class="section-subtitle">' + to + '</div>');
                    } else {
                        $('.newsletter-section .section-content').prepend('<div class="section-subtitle">' + to + '</div>');

                    }
                }
            }
        });
    });
    wp.customize('mp_profit_service_title', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.service-section .section-content').text('');
            if (to !== '') {
                text += '<h2 class="section-title">' + to + '</h2>';
            }
            if (wp.customize.instance('mp_profit_service_subtitle').get() !== '') {
                text += '<div class="section-subtitle">' + wp.customize.instance('mp_profit_service_subtitle').get() + '</div>';
            }
            if (wp.customize.instance('mp_profit_service_description').get() !== '') {
                text += '<div class="section-description">' + wp.customize.instance('mp_profit_service_description').get() + '</div>';
            }
            text += '<div class="section-buttons">';
            if (wp.customize.instance('mp_profit_service_button_label').get() !== '' && wp.customize.instance('mp_profit_service_button_url').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_service_button_url').get() + '" title="' + wp.customize.instance('mp_profit_service_button_label').get() + '" class="button">' + wp.customize.instance('mp_profit_service_button_label').get() + '</a> ';
            }
            text += '</div>';
            $('.service-section .section-content').append(text);
        });
    });
    wp.customize('mp_profit_service_description', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.service-section .section-content').text('');
            if (wp.customize.instance('mp_profit_service_title').get() !== '') {
                text += '<h2 class="section-title">' + wp.customize.instance('mp_profit_service_title').get() + '</h2>';
            }
            if (wp.customize.instance('mp_profit_service_subtitle').get() !== '') {
                text += '<div class="section-subtitle">' + wp.customize.instance('mp_profit_service_subtitle').get() + '</div>';
            }
            if (to !== '') {
                text += '<div class="section-description">' + to + '</div>';
            }
            text += '<div class="section-buttons">';
            if (wp.customize.instance('mp_profit_service_button_label').get() !== '' && wp.customize.instance('mp_profit_service_button_url').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_service_button_url').get() + '" title="' + wp.customize.instance('mp_profit_service_button_label').get() + '" class="button">' + wp.customize.instance('mp_profit_service_button_label').get() + '</a> ';
            }
            text += '</div>';
            $('.service-section .section-content').append(text);
        });
    });
    wp.customize('mp_profit_service_button_label', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.service-section .section-content').text('');
            if (wp.customize.instance('mp_profit_service_title').get() !== '') {
                text += '<h2 class="section-title">' + wp.customize.instance('mp_profit_service_title').get() + '</h2>';
            }
            if (wp.customize.instance('mp_profit_service_subtitle').get() !== '') {
                text += '<div class="section-subtitle">' + wp.customize.instance('mp_profit_service_subtitle').get() + '</div>';
            }
            if (wp.customize.instance('mp_profit_service_description').get() !== '') {
                text += '<div class="section-description">' + wp.customize.instance('mp_profit_service_description').get() + '</div>';
            }

            text += '<div class="section-buttons">';
            if (to !== '' && wp.customize.instance('mp_profit_service_button_url').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_service_button_url').get() + '" title="' + to + '" class="button">' + to + '</a> ';
            }
            text += '</div>';
            $('.service-section .section-content').append(text);
        });
    });
    wp.customize('mp_profit_service_button_url', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.service-section .section-content').text('');
            if (wp.customize.instance('mp_profit_service_title').get() !== '') {
                text += '<h2 class="section-title">' + wp.customize.instance('mp_profit_service_title').get() + '</h2>';
            }
            if (wp.customize.instance('mp_profit_service_subtitle').get() !== '') {
                text += '<div class="section-subtitle">' + wp.customize.instance('mp_profit_service_subtitle').get() + '</div>';
            }
            if (wp.customize.instance('mp_profit_service_description').get() !== '') {
                text += '<div class="section-description">' + wp.customize.instance('mp_profit_service_description').get() + '</div>';
            }
            text += '<div class="section-buttons">';
            if (wp.customize.instance('mp_profit_service_button_label').get() !== '' && to !== '') {
                text += '<a href="' + to + '" title="' + wp.customize.instance('mp_profit_service_button_label').get() + '" class="button">' + wp.customize.instance('mp_profit_service_button_label').get() + '</a> ';
            }
            text += '</div>';
            $('.service-section .section-content').append(text);
        });
    });
    wp.customize('mp_profit_service_subtitle', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.service-section .section-content').text('');
            if (wp.customize.instance('mp_profit_service_title').get() !== '') {
                text += '<h2 class="section-title">' + wp.customize.instance('mp_profit_service_title').get() + '</h2>';
            }
            if (to !== '') {
                text += '<div class="section-subtitle">' + to + '</div>';
            }
            if (wp.customize.instance('mp_profit_service_description').get() !== '') {
                text += '<div class="section-description">' + wp.customize.instance('mp_profit_service_description').get() + '</div>';
            }
            text += '<div class="section-buttons">';
            if (wp.customize.instance('mp_profit_service_button_label').get() !== '' && wp.customize.instance('mp_profit_service_button_url').get() !== '') {
                text += '<a href="' + wp.customize.instance('mp_profit_service_button_url').get() + '" title="' + wp.customize.instance('mp_profit_service_button_label').get() + '" class="button">' + wp.customize.instance('mp_profit_service_button_label').get() + '</a> ';
            }
            text += '</div>';
            $('.service-section .section-content').append(text);
        });
    });
    wp.customize('mp_profit_testimonials_title', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.testimonials-section .section-title').text('');
            if (to !== '') {
                if ($('.testimonials-section .section-title').length) {
                    $('.testimonials-section .section-title').text(to);
                } else {
                    $('.testimonials-section .section-content').prepend('<h2 class="section-title">' + to + '</h2>');
                }
            }

        });
    });
    wp.customize('mp_profit_testimonials_subtitle', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.testimonials-section .section-subtitle').text('');
            if (to !== '') {
                if ($('.testimonials-section .section-subtitle').length) {
                    $('.testimonials-section .section-subtitle').text(to);
                } else {
                    if ($('.testimonials-section .section-title').length) {
                        $('.testimonials-section .section-title').after('<div class="section-subtitle">' + to + '</div>');
                    } else {
                        $('.testimonials-section .section-content').prepend('<div class="section-subtitle">' + to + '</div>');

                    }
                }
            }
        });
    });
    wp.customize('mp_profit_contactus_title', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.contact-section .section-title').text('');
            if (to !== '') {
                if ($('.contact-section .section-title').length) {
                    $('.contact-section .section-title').text(to);
                } else {
                    $('.contact-section .section-content').prepend('<h2 class="section-title">' + to + '</h2>');
                }
            }

        });
    });
    wp.customize('mp_profit_contactus_subtitle', function (value) {
        value.bind(function (to) {
            var text = '';
            $('.contact-section .section-subtitle').text('');
            if (to !== '') {
                if ($('.contact-section .section-subtitle').length) {
                    $('.contact-section .section-subtitle').text(to);
                } else {
                    if ($('.contact-section .section-title').length) {
                        $('.contact-section .section-title').after('<div class="section-subtitle">' + to + '</div>');
                    } else {
                        $('.contact-section .section-content').prepend('<div class="section-subtitle">' + to + '</div>');

                    }
                }
            }
        });
    });
    wp.customize('mp_profit_copyright', function (value) {
        value.bind(function (to) {
            var text = '<span class="copyright-date">' + $('.site-footer .copyright-date').text() + '</span>';
            $('.site-footer .copyright').text('');
            if (to !== '') {
                text += to;
            }
            $('.site-footer .copyright').html(text);
        });

    });
})(jQuery);
