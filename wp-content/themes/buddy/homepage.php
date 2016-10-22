<?php
/*
Template Name: Homepage
*/
get_header(); global $post; ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div id="content">

		<?php the_content(); ?>

	</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>