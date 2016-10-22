<?php get_header(); ?>

<div id="content">

	<div class="padder">

		<h1 class="page-title"><?php the_title(); ?></h1>

		<?php the_attachment_link( get_the_ID(), true ) ?>

		<div id="post-content">
		
			<?php the_content(); ?>
			
		</div>

		<div class="clear"></div>
			
	</div>
	
</div>

<?php get_footer(); ?>