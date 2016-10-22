<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div id="content" <?php post_class(); ?>>
			
		<div class="padder">

			<h1 class="page-title"><?php the_title(); ?></h1>

			<?php the_content(); ?>

			<div class="clear"></div>			
		
		</div>

	</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>