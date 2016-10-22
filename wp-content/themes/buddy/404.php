<?php get_header(); ?>

<div id="content">

	<div class="padder">

		<h1 class="page-title"><?php esc_html_e( 'Page Not Found', 'buddy' ); ?></h1>

		<h2><?php esc_html_e( 'Oops, it looks like this page does not exist.', 'buddy' ); ?></h2>

		<div class="gp-search">
		
			<p><?php wp_kses( _e( 'If you are lost use the search form below or visit our <a href="' . esc_url( get_home_url( '/' ) ) . '">homepage</a>.', 'socialize' ), array( 'a' => array() ) ); ?></p>
	
			<?php get_search_form(); ?>
	
		</div>

		<div class="clear"></div>

	</div>

</div>

<?php get_footer(); ?>