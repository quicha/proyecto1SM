<?php require( ghostpool_inc . 'options.php' ); global $gp_settings; ?>

<?php if ( $gp_settings['layout'] == 'sb-left' OR $gp_settings['layout'] == 'sb-both' ) { ?>
	
	<aside id="sidebar-left" class="sidebar" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
			
		<?php if ( is_active_sidebar( $gp_settings['sidebar_left'] ) ) { ?>
			<?php dynamic_sidebar( $gp_settings['sidebar_left'] ); ?>
		<?php } ?>
				
	</aside>

<?php } ?>	