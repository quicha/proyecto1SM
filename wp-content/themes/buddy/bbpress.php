<?php get_header(); global $gp_settings; ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		

	<div id="content">
	
		<div class="padder" <?php post_class(); ?>>

			<?php if ( $gp_settings['title'] == 'Show' ) { ?><h1 class="page-title"><?php the_title(); ?></h1><?php } ?>

			<?php the_content(); ?>

			<div class="clear"></div>
			
		</div>
	
	</div>
	
<?php endwhile; endif; ?>
	
<?php get_footer(); ?>