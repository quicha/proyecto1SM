<?php

/*
 * hook sections of front page
 */

/*
 * Features section
 *
 * @see mp_profit_after_sidebar_features_function()
 * @see mp_profit_before_sidebar_features_function()
 */
add_action('mp_profit_after_sidebar_features', 'mp_profit_after_sidebar_features_function', 10);
add_action('mp_profit_before_sidebar_features', 'mp_profit_before_sidebar_features_function', 10);
/*
 * Records section
 *
 * @see mp_profit_after_sidebar_records_function()
 * @see mp_profit_before_sidebar_records_function()
 */
add_action('mp_profit_after_sidebar_records', 'mp_profit_after_sidebar_records_function', 10);
add_action('mp_profit_before_sidebar_records', 'mp_profit_before_sidebar_records_function', 10);
/*
 * Team section
 *
 * @see mp_profit_after_sidebar_team_function()
 * @see mp_profit_before_sidebar_team_function()
 */
add_action('mp_profit_after_sidebar_team', 'mp_profit_after_sidebar_team_function', 10);
add_action('mp_profit_before_sidebar_team', 'mp_profit_before_sidebar_team_function', 10);
/*
 * Pricing section
 *
 * @see mp_profit_after_sidebar_pricing_function()
 * @see mp_profit_before_sidebar_pricing_function()
 */
add_action('mp_profit_after_sidebar_pricing', 'mp_profit_after_sidebar_pricing_function', 10);
add_action('mp_profit_before_sidebar_pricing', 'mp_profit_before_sidebar_pricing_function', 10);
/*
 * Newsletter section
 *
 * @see mp_profit_after_sidebar_newsletter_function()
 * @see mp_profit_before_sidebar_newsletter_function()
 */
add_action('mp_profit_after_sidebar_newsletter', 'mp_profit_after_sidebar_newsletter_function', 10);
add_action('mp_profit_before_sidebar_newsletter', 'mp_profit_before_sidebar_newsletter_function', 10);
/*
 * Testimonials section
 *
 * @see mp_profit_after_sidebar_testimonials_function()
 * @see mp_profit_before_sidebar_testimonials_function()
 */
add_action('mp_profit_after_sidebar_testimonials', 'mp_profit_after_sidebar_testimonials_function', 10);
add_action('mp_profit_before_sidebar_testimonials', 'mp_profit_before_sidebar_testimonials_function', 10);
/*
 * Google map section
 *
 * @see mp_profit_after_sidebar_location_function()
 * @see mp_profit_before_sidebar_location_function()
 */
add_action('mp_profit_after_sidebar_location', 'mp_profit_after_sidebar_location_function', 10);
add_action('mp_profit_before_sidebar_location', 'mp_profit_before_sidebar_location_function', 10);

