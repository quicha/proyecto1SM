<?php
/**
 * Implement a custom header for Profit
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @subpackage Profit
 * @since Profit 1.0
 */

/**
 * Style the header text displayed on the blog.
 *
 * get_header_textcolor() options: Hide text (returns 'blank'), or any hex value.
 *
 * @since Profit 1.0
 */
function mp_profit_header_style() {
    $mp_profit_header_text_color = get_header_textcolor();
    $mp_profit_color_text = esc_html( get_option('mp_profit_color_text') );
    $mp_profit_color_primary = esc_html( get_option('mp_profit_color_primary') );
    ?>
    <style type="text/css" id="theme-header-css">

        <?php
// Has the text been hidden?
        if (!display_header_text()) :
            ?>
            .site-description{
                display:none;
            }
        <?php endif; ?>
        <?php
        if ($mp_profit_header_text_color != '657883' && $mp_profit_header_text_color != ''):
            ?>       
            .site-tagline,
            .sf-menu > li > a{
                color:#<?php echo $mp_profit_header_text_color; ?>;
            }                          
            <?php
        endif;
        ?>
        <?php if ($mp_profit_color_text != MP_PROFIT_THEME_TEXT_COLOR && $mp_profit_color_text != '') : ?>
            body{
                color: <?php echo $mp_profit_color_text; ?>;
            }           
        <?php endif; ?>
        <?php if ($mp_profit_color_primary != MP_PROFIT_THEME_BRAND_COLOR && $mp_profit_color_primary != '') : ?>
            a,
            a:hover,
            a:focus ,
            .site-footer .widget h4 ,
            .footer-sidebar a,
            blockquote:before,
            .wpcf7-form h2,
            .required,
            .woocommerce .star-rating span,
            .site-main .tabs li.active a,
            .site-main .tabs a:hover,
            .features-subtitle,
            .section-subtitle,.team-position,.team-social,
            .plan-pricing,
            ul.stock_ticker .plus > .sqitem span,
            ul.stock_ticker .plus > .sqitem em:before,
            .testimonial-athor-position,
            .site-main .comment-list h4.fn,
            .main-slider-section .flex-direction-nav a:hover,
            .site-main .button.btn-white, .site-main button.btn-white, .site-main input[type="button"].btn-white, .site-main input[type="submit"].btn-white, .site-main .added_to_cart.btn-white, .site-footer .button.btn-white, .site-footer button.btn-white, .site-footer input[type="button"].btn-white, .site-footer input[type="submit"].btn-white, .site-footer .added_to_cart.btn-white, .main-header .button.btn-white, .main-header button.btn-white, .main-header input[type="button"].btn-white, .main-header input[type="submit"].btn-white, .main-header .added_to_cart.btn-white,
            .site-title {
                color: <?php echo $mp_profit_color_primary; ?>;
            }
            .service-empty-thumbnail,
            .site-main .button.btn-grey:hover, .site-main .button.btn-grey:focus,
            .default-features .features-icon,
            .plan-box.recommend .plan-header,
            .brand-section,
            .main-slider-section .flex-control-paging li a.flex-active,
            .wrapper-icons .qty-cart,
            .thumb-related .thumb.thumb-default a,
            .widget #today,
            table thead,
            .navigation a.page-numbers:hover, .navigation .page-numbers.current,
            .toTop,
            .site-main .button.btn-white:hover, .site-main .button.btn-white:focus, .site-main button.btn-white:hover, .site-main button.btn-white:focus, .site-main input[type="button"].btn-white:hover, .site-main input[type="button"].btn-white:focus, .site-main input[type="submit"].btn-white:hover, .site-main input[type="submit"].btn-white:focus, .site-main .added_to_cart.btn-white:hover, .site-main .added_to_cart.btn-white:focus, .site-footer .button.btn-white:hover, .site-footer .button.btn-white:focus, .site-footer button.btn-white:hover, .site-footer button.btn-white:focus, .site-footer input[type="button"].btn-white:hover, .site-footer input[type="button"].btn-white:focus, .site-footer input[type="submit"].btn-white:hover, .site-footer input[type="submit"].btn-white:focus, .site-footer .added_to_cart.btn-white:hover, .site-footer .added_to_cart.btn-white:focus, .main-header .button.btn-white:hover, .main-header .button.btn-white:focus, .main-header button.btn-white:hover, .main-header button.btn-white:focus, .main-header input[type="button"].btn-white:hover, .main-header input[type="button"].btn-white:focus, .main-header input[type="submit"].btn-white:hover, .main-header input[type="submit"].btn-white:focus, .main-header .added_to_cart.btn-white:hover, .main-header .added_to_cart.btn-white:focus,
            .site-main .button, .site-main button, .site-main input[type="button"], .site-main input[type="submit"], .site-main .added_to_cart, .site-footer .button, .site-footer button, .site-footer input[type="button"], .site-footer input[type="submit"], .site-footer .added_to_cart, .main-header .button, .main-header button, .main-header input[type="button"], .main-header input[type="submit"], .main-header .added_to_cart {
                background:<?php echo $mp_profit_color_primary; ?>;
            }
            .sf-menu > li.menu-item-object-custom.current > a,
            .sf-menu.home-menu > li.current > a,
            .sf-menu > li:hover > a, .sf-menu > li.current-menu-item > a, .sf-menu > li.current_page_item > a {
                color: <?php echo $mp_profit_color_primary; ?>;
                border-top: 3px solid <?php echo $mp_profit_color_primary; ?>;
            }
            .sf-menu > li.menu-item-object-custom > a {
                color: inherit;
                border-top: 3px solid transparent;
            }
            <?php if (is_plugin_active('motopress-content-editor/motopress-content-editor.php') || is_plugin_active('motopress-content-editor-lite/motopress-content-editor.php')) : ?>
                .profit .motopress-button-obj .mp-theme-button-brand,
                .profit .motopress-button-obj .mp-theme-button-grey:hover,
                .motopress-table-obj .motopress-table.mp-theme-table-brand thead,
                .profit .motopress-download-button-obj .mp-theme-button-brand,
                .profit .motopress-download-button-obj .mp-theme-button-grey:hover,
                .profit .motopress-button-group-obj .mp-theme-button-brand,
                .profit .motopress-button-group-obj .mp-theme-button-grey:hover,
                .profit .motopress-service-box-obj .mp-theme-button-brand,
                .motopress-cta-style-brand,
                .motopress-countdown_timer.mp-theme-countdown-timer-brand .countdown-section,
                .motopress-service-box-obj.motopress-service-box-brand .motopress-service-box-icon-holder-rounded, .motopress-service-box-obj.motopress-service-box-brand .motopress-service-box-icon-holder-square, .motopress-service-box-obj.motopress-service-box-brand .motopress-service-box-icon-holder-circle,
                .motopress-ce-icon-obj.mp-theme-icon-bg-brand.motopress-ce-icon-shape-rounded .motopress-ce-icon-bg, .motopress-ce-icon-obj.mp-theme-icon-bg-brand.motopress-ce-icon-shape-square .motopress-ce-icon-bg, .motopress-ce-icon-obj.mp-theme-icon-bg-brand.motopress-ce-icon-shape-circle .motopress-ce-icon-bg
                {
                    background:<?php echo $mp_profit_color_primary; ?>;
                }
                .profit .motopress-tabs-obj.ui-tabs.motopress-tabs-no-vertical .ui-tabs-nav li.ui-state-active a ,
                .profit .motopress-tabs-obj.ui-tabs.motopress-tabs-vertical .ui-tabs-nav li.ui-state-active a,
                .profit .motopress-tabs-obj.ui-tabs.motopress-tabs-basic .ui-tabs-nav li a:hover{
                    color: <?php echo $mp_profit_color_primary; ?>!important;
                }
                .wrapper-mce-lite .motopress-cta-obj .motopress-cta.motopress-cta-style-3d{
                    background-color:<?php echo $mp_profit_color_primary; ?>;
                }
                .motopress-accordion-obj.ui-accordion.mp-theme-accordion-brand .ui-accordion-header .ui-icon,
                .profit .motopress-posts_slider-obj .motopress-flexslider .flex-control-nav li a.flex-active, .profit .motopress-posts_slider-obj .motopress-flexslider .flex-control-nav li a:hover, .profit .motopress-image-slider-obj .flex-control-paging li a.flex-active, .profit .motopress-image-slider-obj .flex-control-paging li a:hover,
                .profit .motopress-image-slider-obj .flex-direction-nav a{
                    background-color:<?php echo $mp_profit_color_primary; ?>!important;
                }
                .mp-theme-icon-brand, .motopress-ce-icon-obj.mp-theme-icon-bg-brand .motopress-ce-icon-preview,
                .motopress-list-obj .motopress-list-type-icon .fa,
                .motopress-ce-icon-obj.mp-theme-icon-bg-brand.motopress-ce-icon-shape-outline-rounded .motopress-ce-icon-bg .motopress-ce-icon-preview, .motopress-ce-icon-obj.mp-theme-icon-bg-brand.motopress-ce-icon-shape-outline-circle .motopress-ce-icon-bg .motopress-ce-icon-preview, .motopress-ce-icon-obj.mp-theme-icon-bg-brand.motopress-ce-icon-shape-outline-square .motopress-ce-icon-bg .motopress-ce-icon-preview{
                    color: <?php echo $mp_profit_color_primary; ?>;
                }
                .motopress-ce-icon-obj.mp-theme-icon-bg-brand.motopress-ce-icon-shape-outline-rounded .motopress-ce-icon-bg, .motopress-ce-icon-obj.mp-theme-icon-bg-brand.motopress-ce-icon-shape-outline-circle .motopress-ce-icon-bg, .motopress-ce-icon-obj.mp-theme-icon-bg-brand.motopress-ce-icon-shape-outline-square .motopress-ce-icon-bg {
                    border-color: <?php echo $mp_profit_color_primary; ?>;
                }
            <?php endif; ?>
            <?php if (is_plugin_active('woocommerce/woocommerce.php')) : ?>
                .woocommerce p.stars a.active:after, .woocommerce p.stars a:hover:after,
                .cart_totals .shipping-calculator-button,
                .woocommerce-checkout-review-order-table tr.order-total th, .cart_totals table tr.order-total th{
                    color:<?php echo $mp_profit_color_primary; ?>;
                }
                .woocommerce-pagination a:hover, .woocommerce-pagination span, .woocommerce-pagination a.page-numbers:hover, .woocommerce-pagination .page-numbers.current{
                    background:<?php echo $mp_profit_color_primary; ?>;
                }
                .woocommerce span.onsale:before {
                    border-color: transparent transparent <?php echo $mp_profit_color_primary; ?> transparent;
                }
                .woocommerce .woocommerce-message, .woocommerce .woocommerce-info {
                    border-top: 2px solid <?php echo $mp_profit_color_primary; ?>;
                }
                .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
                .woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
                    background-color: <?php echo $mp_profit_color_primary; ?>;
                }
            <?php endif; ?>
            <?php if (is_plugin_active('buddypress/bp-loader.php')): ?>
                #buddypress div.pagination .pagination-links a.page-numbers:hover, #buddypress div.pagination .pagination-links .page-numbers.current, #buddypress div.pagination .pagination-links a.page-numbers:hover, #buddypress div.pagination .pagination-links .page-numbers.current ,
                #buddypress table.forum thead tr, #buddypress table.messages-notices thead tr, #buddypress table.notifications thead tr, #buddypress table.notifications-settings thead tr, #buddypress table.profile-fields thead tr, #buddypress table.profile-settings thead tr, #buddypress table.wp-profile-fields thead tr {
                    background:<?php echo $mp_profit_color_primary; ?>;
                }
            <?php endif; ?>
        <?php endif; ?>
        <?php
        $mp_profit_service_image = esc_url(get_theme_mod('mp_profit_service_image'));
        if (get_theme_mod('mp_profit_service_image', false) === false) :
            ?>
            .service-right{
                background: url("<?php echo get_template_directory_uri() . '/images/service-image.png'; ?>") no-repeat scroll left center rgba(0,0,0,0);
            }
            <?php
        else:
            if ($mp_profit_service_image != '') :
                ?>
                .service-right{
                    background: url("<?php echo $mp_profit_service_image; ?>") no-repeat scroll 0px center ;
                }
                <?php
            endif;
        endif;
        ?>

    </style>
    <?php
}
