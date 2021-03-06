<?php

if ( ! function_exists( 'ghostpool_image' ) ) {

	function ghostpool_image( $atts, $content = null ) {
	
		extract( shortcode_atts( array( 
			'url' => '',
			'width' => '',
			'height' => '',
			'crop' => 'true',
			'link' => '',
			'target' => '_self',
			'border' => 'false',
			'align' => 'alignleft',
			'margins' => '',
			'top' => '',
			'right' => '',
			'bottom' => '',
			'left' => '',		
			'alt' => '',
			'title' => '',
			'lightbox' => 'none',
			'preload' => 'false',
			'classes' => '',	
		 ), $atts ) );
	
		global $dirname;
	
		// Position
		if ( $top != '' OR $bottom != '' OR $left != '' OR $right != '' ) {
			$position = 'position: absolute; ';
		} else {
			$position = '';
		}
		if ( $top != '' ) {
			$top = 'top:' . $top . ' px; ';
		} else {
			$top = '';
		}
		if ( $right != '' ) {
			$right = 'right:' . $right . ' px; ';
		} else {
			$right = '';
		}
		if ( $bottom != '' ) {
			$bottom = 'bottom:' . $bottom . ' px; ';
		} else {
			$bottom = '';
		}
		if ( $left != '' ) {
			$left = 'left:' . $left . ' px; ';
		} else {
			$left = '';
		}
	
		// Margins	
		if ( $margins != '' ) {
			if ( preg_match( '/%/', $margins ) OR preg_match( '/em/', $margins ) OR preg_match( '/px/', $margins ) ) {
				$margins = str_replace( ',', " ", $margins );
				$margins = 'margin: ' . $margins . '; ';
			} else {
				$margins = str_replace( ',', 'px ', $margins );
				$margins = 'margin: ' . $margins . 'px; ';
			}
			$margins = str_replace( 'autopx', 'auto', $margins );
		} else {
			$margins = '';
		}	
	
		// Lightbox
		if ( $lightbox != 'none' ) {
			$rel = 'prettyPhoto';
		} else {
			$rel = '';
		}
		
		// Image Link
		if ( $link != '' ) {
			if ( $lightbox == 'video' ) {
				$link1 = '<a href="file=' . $link . '&image=' . $url . '" title="' . $title . '" data-rel="' . $rel . '" target="' . $target . ' ">';
			} else {
				$link1 = '<a href="' . $link . '" title="' . $title . '" data-rel="' . $rel . '" target="' . $target . '">';
			}
			$link2 = '</a>';
		} else {
			$link1 = '';	
			$link2 = '';
		}		
	
		// Image Border	
		if ( $border == 'true' ) {
			$border = 'image-border';
		} else {
			$border = '';
		}
	
		// Image Preloader	
		if ( $preload == 'true' ) {
			$preload = 'preload';
		} else {
			$preload = '';
		}

		// Image URL	
		if ( ! preg_match( '/http:/', $url ) && ! preg_match( '/https:/', $url ) ) { $url = site_url() . '/' . $url; }
	
		if ( ( $width OR $height ) && $crop == 'true' ) {
			$url = aq_resize( $url, $width, $height, true, true, true );
		} else {
			$url = $url;
		}		
	
		// Retina
		if ( get_option( $dirname . "_retina" ) == '0' ) { 
			$gp_retina = aq_resize( $url, $width * 2, $height * 2, true, true, true );
		} else {
			$gp_retina = '';
		}
				
		return '
	
		<div class="sc-image ' . esc_attr( $align ) . '  ' . esc_attr( $border ) . '  ' . esc_attr( $preload ) . '  ' . esc_attr( $classes ) . '" style="' . esc_attr( $position.$top.$bottom.$left.$right.$margins ) . '  width: ' . esc_attr( $width ) . 'px; height: ' . esc_attr( $height ) . 'px;">
		
			' . html_entity_decode( $link1 ) . '
		
				<img src="' . esc_url( $url ) . ' " data-rel="' . esc_url( $gp_retina ) . ' " alt="' . esc_attr( $alt ) . ' " width="' . esc_attr( $width ) . '" height="' . esc_attr( $height ) . '" /> 
			
			 ' . html_entity_decode( $link2 ) . '
		
		</div>
	
		';

	}
	
}

add_shortcode( 'image', 'ghostpool_image' );

?>