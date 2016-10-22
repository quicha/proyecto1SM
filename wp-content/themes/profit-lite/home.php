<?php
/**
 * The home template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @subpackage Profit
 * @since Profit 
 */
get_header();

$mp_profit_blog_type = esc_html(get_theme_mod('mp_profit_blog_style','masonry'));

get_template_part( 'blog', $mp_profit_blog_type );
 
get_footer();