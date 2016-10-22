<?php

if ( ! function_exists( 'ghostpool_columns' ) ) {

	function ghostpool_columns( $atts, $content = null, $code ) {
	
		extract( shortcode_atts( array( 
			'type' => 'blank',
			'text_align' => 'text-left',
			'height' => '',
			'padding' => '',
			'margins' => '',
			'background' => '',
			'border' => 'true',
		 ), $atts ) );
	
		// Unique Name
		STATIC $gp_i = 0;
		$gp_i++;
		$gp_name = 'gp_columns_' . $gp_i;
	
		// Column classes
		if ( $code == 'one' ) {
			$gp_classes = 'one first last';	
		} elseif ( $code =='two' ) {
			$gp_classes = 'two first';	
		} elseif ( $code =='two_last' ) {
			$gp_classes = 'two last';	
		} elseif ( $code =='three' ) {
			$gp_classes = 'three first';	
		} elseif ( $code == 'three_middle' ) {
			$gp_classes = 'three middle';
		} elseif ( $code == 'three_last' ) {
			$gp_classes = 'three last'; 
		} elseif ( $code == 'four' ) {
			$gp_classes = 'four first'; 
		} elseif ( $code == 'four_middle' ) {
			$gp_classes = 'four middle'; 
		} elseif ( $code == 'four_last' ) {
			$gp_classes = 'four last'; 
		} elseif ( $code == 'five' ) {	
			$gp_classes = 'five first'; 
		} elseif ( $code == 'five_middle' ) {
			$gp_classes = 'five middle'; 
		} elseif ( $code == 'five_last' ) {
			$gp_classes = 'five last'; 	
		} elseif ( $code == 'onethird' ) {
			$gp_classes = 'onethird first';
		} elseif ( $code == 'onethird_last' ) {
			$gp_classes = 'onethird last'; 
		} elseif ( $code == 'twothirds' ) {
			$gp_classes = 'twothirds first'; 
		} elseif ( $code == 'twothirds_last' ) {
			$gp_classes = 'twothirds last';
		} elseif ( $code == 'onefourth' ) {
			$gp_classes = 'onefourth first'; 
		} elseif ( $code == 'onefourth_last' ) {
			$gp_classes = 'onefourth last';
		} elseif ( $code == 'threefourths' ) {
			$gp_classes = 'threefourths'; 	
		} elseif ( $code == 'threefourths_last' ) {
			$gp_classes = 'threefourths last'; 	
		}
	
		if ( $type == 'blank' ) {
			$col_type = 'blank';
		} elseif ( $type == 'joint' ) {
			$col_type = 'joint';
		} elseif ( $type == 'separate' ) {
			$col_type = 'separate';
		}
	
		$clear = strpos( $gp_classes, 'last' );

		// Height
		if ( $height != '' ) {
			if ( preg_match( '/%/', $height ) OR preg_match( '/em/', $height ) OR preg_match( '/px/', $height ) ) {
				$height = 'height: ' . $height . '; ';		
			} else {
				$height = 'height: ' . $height . 'px; ';		
			}
		} else {
			$height = '';
		}

		// Padding
		if ( $padding != '' ) {
			if ( preg_match( '/%/', $padding ) OR preg_match( '/em/', $padding ) OR preg_match( '/px/', $padding ) ) {
				$padding = str_replace( ',', ' ', $padding );
				$padding = 'padding: ' . $padding.'; ';	
			} else {
				$padding = str_replace( ',', 'px ', $padding );
				$padding = 'padding: ' . $padding.'px; ';		
			}
		} else {
			$padding = '';
		}
	
		// Margins
		if ( $margins != '' ) {
			if ( preg_match( '/%/', $margins ) OR preg_match( '/em/', $margins ) OR preg_match( '/px/', $margins ) ) {
				$margins = str_replace( ",", " ", $margins );
				$margins = 'margin: ' . $margins . '; ';	
			} else {
				$margins = str_replace( ",", "px ", $margins );
				$margins = 'margin: ' . $margins . 'px; ';		
			}
		} else {
			$margins = '';
		}

		// Background
		if ( $background != '' ) {
			$background = 'background: ' . $background.'; ';
		} else {
			$background = '';
		}

		// Border
		if ( $border == 'false' ) {
			$border_width = 'border: 0 !important; ';
		} else {
			$border_width = '';
		}
		
		$gp_output_string = '';	
	
		if ( $clear === false ) {		
			
			$gp_output_string .= '<div class="columns ' . $gp_classes . ' ' . $col_type . ' ' . $gp_name . ' ' . $text_align.'" style="' . $margins . '"><div style="' . $height . $padding . $background . $border_width.'">' . do_shortcode( $content ) . '<div class="clear"></div></div></div>';
			
		} else {
			
			$gp_output_string .= '<div class="columns ' . $gp_classes . ' ' . $col_type . ' ' . $gp_name . ' ' . $text_align.'" style="' . $margins . '"><div style="' . $height . $padding . $background . $border_width.'">' . do_shortcode( $content ) . '<div class="clear"></div></div></div><div class="clear"></div>';
			
			if ( $type === "joint" && $border === 'true' ) { 
				$gp_output_string .= '<div class="sc-divider small"></div>';
			}
			
		}
	
		return $gp_output_string;
		
	}
	
}
add_shortcode( 'one', 'ghostpool_columns' );
add_shortcode( 'two', 'ghostpool_columns' );
add_shortcode( 'two_last', 'ghostpool_columns' );
add_shortcode( 'three', 'ghostpool_columns' );
add_shortcode( 'three_middle', 'ghostpool_columns' );
add_shortcode( 'three_last', 'ghostpool_columns' );
add_shortcode( 'four', 'ghostpool_columns' );
add_shortcode( 'four_middle', 'ghostpool_columns' );
add_shortcode( 'four_last', 'ghostpool_columns' );
add_shortcode( 'five', 'ghostpool_columns' );
add_shortcode( 'five_middle', 'ghostpool_columns' );
add_shortcode( 'five_last', 'ghostpool_columns' );
add_shortcode( 'onethird', 'ghostpool_columns' );
add_shortcode( 'onethird_last', 'ghostpool_columns' );
add_shortcode( 'twothirds', 'ghostpool_columns' );
add_shortcode( 'twothirds_last', 'ghostpool_columns' );
add_shortcode( 'onefourth', 'ghostpool_columns' );
add_shortcode( 'onefourth_last', 'ghostpool_columns' );
add_shortcode( 'threefourths', 'ghostpool_columns' );
add_shortcode( 'threefourths_last', 'ghostpool_columns' );

?>