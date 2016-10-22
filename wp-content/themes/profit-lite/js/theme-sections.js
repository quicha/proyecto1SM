(function ($) {
    $(document).ready(function () {
        var h = 0;

        $('body').on('click', '.accordion-section-title', function () {

            if ($('#customize-preview').hasClass('iframe-ready')) {
                var parentid = $(this).parent().attr('id');
                var iframe = $('#customize-preview iframe');
                var iframeContents = iframe.contents();

                if (iframeContents.find('.main-header').hasClass('fixed-small')) {
                    h = iframeContents.find('.site-header').height();
                } else {
                    h = 0;
                }
                if (parentid === 'accordion-section-mp_profit_slider_section' && iframeContents.find('#main-slider').length) {
                    iframeContents.find('html, body').animate({
                        scrollTop: iframeContents.find("#main-slider").offset().top - h
                    }, 1000);
                    return;
                }
                if (parentid === 'accordion-section-mp_profit_stock_ticker_section' && iframeContents.find('#stock-ticker').length) {
                    iframeContents.find('html, body').animate({
                        scrollTop: iframeContents.find("#stock-ticker").offset().top - h
                    }, 1000);
                    return;
                }
                if (parentid === 'accordion-section-mp_profit_features_section' && iframeContents.find('#features').length) {
                    iframeContents.find('html, body').animate({
                        scrollTop: iframeContents.find("#features").offset().top - h
                    }, 1000);
                    return;
                }
                if (parentid === 'accordion-section-mp_profit_records_section' && iframeContents.find('#records').length) {
                    iframeContents.find('html, body').animate({
                        scrollTop: iframeContents.find("#records").offset().top - h
                    }, 1000);
                    return;
                }
                if (parentid === 'accordion-section-mp_profit_first_action_section' && iframeContents.find('#first-action').length) {
                    iframeContents.find('html, body').animate({
                        scrollTop: iframeContents.find("#first-action").offset().top - h
                    }, 1000);
                    return;
                }

                if (parentid === 'accordion-section-mp_profit_calculator_section' && iframeContents.find('#calculator').length) {
                    iframeContents.find('html, body').animate({
                        scrollTop: iframeContents.find("#calculator").offset().top - h
                    }, 1000);
                    return;
                }
                if (parentid === 'accordion-section-mp_profit_second_action_section' && iframeContents.find('#second-action').length) {
                    iframeContents.find('html, body').animate({
                        scrollTop: iframeContents.find("#second-action").offset().top - h
                    }, 1000);
                    return;
                }
                if (parentid === 'accordion-section-mp_profit_services_section' && iframeContents.find('#services').length) {
                    iframeContents.find('html, body').animate({
                        scrollTop: iframeContents.find("#services").offset().top - h
                    }, 1000);
                    return;
                }
                if (parentid === 'accordion-section-mp_profit_team_section' && iframeContents.find('#team').length) {
                    iframeContents.find('html, body').animate({
                        scrollTop: iframeContents.find("#team").offset().top - h
                    }, 1000);
                    return;
                }
                if (parentid === 'accordion-section-mp_profit_newsletter_section' && iframeContents.find('#newsletter').length) {
                    iframeContents.find('html, body').animate({
                        scrollTop: iframeContents.find("#newsletter").offset().top - h
                    }, 1000);
                    return;
                }
                if (parentid === 'accordion-section-mp_profit_service_section' && iframeContents.find('#service').length) {
                    iframeContents.find('html, body').animate({
                        scrollTop: iframeContents.find("#service").offset().top - h
                    }, 1000);
                    return;
                }

                if (parentid === 'accordion-section-mp_profit_news_section' && iframeContents.find('#news').length) {
                    iframeContents.find('html, body').animate({
                        scrollTop: iframeContents.find("#news").offset().top - h
                    }, 1000);
                    return;
                }
                if (parentid === 'accordion-section-mp_profit_pricing_section' && iframeContents.find('#pricing').length) {
                    iframeContents.find('html, body').animate({
                        scrollTop: iframeContents.find("#pricing").offset().top - h
                    }, 1000);
                    return;
                }

                if (parentid === 'accordion-section-mp_profit_testimonials_section' && iframeContents.find('#testimonials').length) {
                    iframeContents.find('html, body').animate({
                        scrollTop: iframeContents.find("#testimonials").offset().top - h
                    }, 1000);
                    return;
                }
                if (parentid === 'accordion-section-mp_profit_contactus_section' && iframeContents.find('#contact').length) {
                    iframeContents.find('html, body').animate({
                        scrollTop: iframeContents.find("#contact").offset().top - h
                    }, 1000);
                    return;
                }
                if (parentid === 'accordion-section-mp_profit_location_section' && iframeContents.find('#location').length) {
                    iframeContents.find('html, body').animate({
                        scrollTop: iframeContents.find("#location").offset().top - h
                    }, 1000);
                    return;
                }
            }
        });
    });
})(jQuery);
