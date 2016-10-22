<?php
$mp_profit_sections = array();
if ( ! ( get_theme_mod( 'mp_profit_slider_show', false ) || get_theme_mod( 'mp_profit_slider_show' ) ) ):
	$mp_profit_sections["slider.php"] = esc_html( get_theme_mod( 'mp_profit_slider_position', 10 ) );
endif;
if ( ! ( get_theme_mod( 'mp_profit_stock_ticker_show', false ) || get_theme_mod( 'mp_profit_stock_ticker_show' ) ) ):
	$mp_profit_sections["stock-ticker.php"] = esc_html( get_theme_mod( 'mp_profit_stock_ticker_position', 20 ) );
endif;
if ( ! ( get_theme_mod( 'mp_profit_features_show', false ) || get_theme_mod( 'mp_profit_features_show' ) ) ):
	$mp_profit_sections["features.php"] = esc_html( get_theme_mod( 'mp_profit_features_position', 30 ) );
endif;
if ( ! ( get_theme_mod( 'mp_profit_records_show', false ) || get_theme_mod( 'mp_profit_records_show' ) ) ):
	$mp_profit_sections["records.php"] = esc_html( get_theme_mod( 'mp_profit_records_position', 40 ) );
endif;
if ( ! ( get_theme_mod( 'mp_profit_first_action_show', false ) || get_theme_mod( 'mp_profit_first_action_show' ) ) ):
	$mp_profit_sections["first-call-to-action.php"] = esc_html( get_theme_mod( 'mp_profit_first_action_position', 50 ) );
endif;
if ( ! ( get_theme_mod( 'mp_profit_calculator_show', false ) || get_theme_mod( 'mp_profit_calculator_show' ) ) ):
	$mp_profit_sections["calculator.php"] = esc_html( get_theme_mod( 'mp_profit_calculator_position', 60 ) );
endif;
if ( ! ( get_theme_mod( 'mp_profit_second_action_show', false ) || get_theme_mod( 'mp_profit_second_action_show' ) ) ):
	$mp_profit_sections["second-call-to-action.php"] = esc_html( get_theme_mod( 'mp_profit_second_action_position', 70 ) );
endif;
if ( ! ( get_theme_mod( 'mp_profit_services_show', false ) || get_theme_mod( 'mp_profit_services_show' ) ) ):
	$mp_profit_sections["services.php"] = esc_html( get_theme_mod( 'mp_profit_services_position', 80 ) );
endif;
if ( ! ( get_theme_mod( 'mp_profit_team_show', false ) || get_theme_mod( 'mp_profit_team_show' ) ) ):
	$mp_profit_sections["team.php"] = esc_html( get_theme_mod( 'mp_profit_team_position', 90 ) );
endif;
if ( ! ( get_theme_mod( 'mp_profit_news_show', false ) || get_theme_mod( 'mp_profit_news_show' ) ) ):
	$mp_profit_sections["news.php"] = esc_html( get_theme_mod( 'mp_profit_news_position', 100 ) );
endif;
if ( ! ( get_theme_mod( 'mp_profit_pricing_show', false ) || get_theme_mod( 'mp_profit_pricing_show' ) ) ):
	$mp_profit_sections["pricing.php"] = esc_html( get_theme_mod( 'mp_profit_pricing_position', 110 ) );
endif;
if ( ! ( get_theme_mod( 'mp_profit_newsletter_show', false ) || get_theme_mod( 'mp_profit_newsletter_show' ) ) ):
	$mp_profit_sections["newsletter.php"] = esc_html( get_theme_mod( 'mp_profit_newsletter_position', 120 ) );
endif;
if ( ! ( get_theme_mod( 'mp_profit_service_show', false ) || get_theme_mod( 'theme_sevice_show' ) ) ):
	$mp_profit_sections["service.php"] = esc_html( get_theme_mod( 'mp_profit_service_position', 130 ) );
endif;
if ( ! ( get_theme_mod( 'mp_profit_testimonials_show', false ) || get_theme_mod( 'mp_profit_testimonials_show' ) ) ):
	$mp_profit_sections["testimonials.php"] = esc_html( get_theme_mod( 'mp_profit_testimonials_position', 140 ) );
endif;
if ( ! ( get_theme_mod( 'mp_profit_contactus_show', false ) || get_theme_mod( 'mp_profit_contactus_show' ) ) ):
	$mp_profit_sections["contact.php"] = esc_html( get_theme_mod( 'mp_profit_contactus_position', 150 ) );
endif;
if ( ! ( get_theme_mod( 'mp_profit_location_show', false ) || get_theme_mod( 'mp_profit_location_show' ) ) ):
	$mp_profit_sections["map.php"] = esc_html( get_theme_mod( 'mp_profit_location_position', 160 ) );
endif;

asort( $mp_profit_sections );
foreach ( $mp_profit_sections as $mp_profit_key => $mp_profit_val ) {
	include get_template_directory() . "/sections/" . $mp_profit_key;
}