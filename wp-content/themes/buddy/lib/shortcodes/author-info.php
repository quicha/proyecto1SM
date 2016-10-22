<?php

if ( ! function_exists( 'ghostpool_author_info_panel' ) ) {

	function ghostpool_author_info_panel( $atts, $content = null ) {

		$gp_output_string = '';	
		$gp_output_string .=
	
		'<div class="author-info">' .
	
			get_avatar( get_the_author_meta( 'ID' ), 50 ) . '
	
			<div class="author-meta">
		
				<div class="author-meta-top">
				
					<div class="author-name">'. esc_html__( 'By', 'buddy' ) . ' <a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '">' . get_the_author() . '</a></div>
			
				</div>
			
				<div class="author-desc">' . get_the_author_meta( 'description' ) . '</div>
		
			</div>
		
		</div>
		';
				
	   return $gp_output_string;
   
	}
	
}

add_shortcode( 'author', 'ghostpool_author_info_panel' );

?>