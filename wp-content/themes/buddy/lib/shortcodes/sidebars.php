<?php

if ( ! function_exists( 'ghostpool_sidebar' ) ) {

	function ghostpool_sidebar( $atts, $content = null ) {
	
		extract( shortcode_atts( array( 
			'name' => 'default',
			'width' => '',
			'align' => 'alignnone',
			'text' => ''
		 ), $atts ) );
	
		ob_start(); ?>
	
		<div class="sc-sidebar <?php echo sanitize_html_class( $align ); ?>" style="width: <?php echo esc_attr( $width ); ?>px;">
	
			<?php if ( is_active_sidebar( sanitize_html_class( $name ) ) ) { ?>
				<?php dynamic_sidebar( sanitize_html_class( $name ) ); ?>
			<?php } else { ?>
				<p><strong><?php echo esc_attr( $text ); ?></strong></p>			
			<?php } ?>
		
		</div>

		<?php 

		$gp_output_string = ob_get_contents();
		ob_end_clean();
		return $gp_output_string;

	}
	
}

add_shortcode( 'sidebar', 'ghostpool_sidebar' );

?>