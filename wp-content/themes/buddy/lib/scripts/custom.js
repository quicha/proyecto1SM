/*--------------------------------------------------------------
Image Preloader
--------------------------------------------------------------*/

jQuery( function( $ ) {
	$( '.preload' ).hide();
} );

var i = 0;
var int = 0;
jQuery( window ).bind( 'load', function( $ ) {
	var int = setInterval( 'doThis( i )', 100 );
} );

function doThis() {
	var images = jQuery( '.preload' ).length;
	if ( i >= images ) {
		clearInterval( int );
	}
	jQuery( '.preload:hidden ' ).eq( 0 ).fadeIn( 400 );
	i++;
}

jQuery( document ).ready( function( $ ) {

	'use strict';
	
	/*--------------------------------------------------------------
	Screen size class
	--------------------------------------------------------------*/

	function gpScreenSizeClass() {
	
		if ( $( window ).innerWidth() <= 767 ) {
		
			$( 'body' ).addClass( 'gp-mobile' ).removeClass( 'gp-desktop' ).removeClass( 'gp-tablet-portrait' ).removeClass( 'gp-tablet-landscape' );
			
		} else if ( $( window ).innerWidth() <= 982 ) {
			
			$( 'body' ).addClass( 'gp-tablet-portrait' ).removeClass( 'gp-desktop' ).removeClass( 'gp-tablet-landscape' ).removeClass( 'gp-mobile' );
			
		} else if ( $( window ).innerWidth() <= 1082 ) {
			
			$( 'body' ).addClass( 'gp-tablet-landscape' ).removeClass( 'gp-desktop' ).removeClass( 'gp-tablet-portrait' ).removeClass( 'gp-mobile' );	
		
		} else {
			
			$( 'body' ).addClass( 'gp-desktop' ).removeClass( 'gp-tablet-landscape' ).removeClass( 'gp-tablet-portrait' ).removeClass( 'gp-mobile' );
		
		}
		
	}
	
	gpScreenSizeClass();
	$( window ).resize( gpScreenSizeClass );
	
	
	/*--------------------------------------------------------------
	Retina images
	--------------------------------------------------------------*/
	
	if ( $( 'body' ).hasClass( 'gp-retina' ) ) {
		window.devicePixelRatio >= 2 && $( '.post-thumbnail img' ).each( function() {
			$( this ).attr( { src: $( this ).attr( 'data-rel' ) } );
		} );
	}
	
	
	/*--------------------------------------------------------------
	Remove "|" from BuddyPress item options
	--------------------------------------------------------------*/

	$( '.item-options' ).contents().filter( function() {
		return this.nodeType == 3;
	} ).remove();

	
	/*--------------------------------------------------------------
	Slide up/down header mobile navigation
	--------------------------------------------------------------*/

	function gpHeaderMobileNav() {

		$( '#mobile-nav-button' ).toggle( function() {
			$( '#mobile-nav' ).stop().slideDown().removeClass( 'auto-height' );
		}, function() {
			$( '#mobile-nav' ).stop().slideUp().removeClass( 'auto-height' );
			$( '#mobile-nav-button' ).removeClass( 'gp-active' );
		} );
		
	}
	
	gpHeaderMobileNav();


	/*--------------------------------------------------------------
	Slide up/down header mobile dropdown menus
	--------------------------------------------------------------*/

	$( '#mobile-nav .menu li' ).each( function() {
		if ( $( this ).find( 'ul' ).length > 0 ) {
			$( '<i class="mobile-dropdown-icon" />' ).insertAfter( $( this ).children( ':first' ) );		
		}		
	} );
	
	function gpHeaderMobileTopNav() {

		$( '#mobile-nav ul > li' ).each( function() {
			
			var navItem = $( this );
			
			if ( $( navItem ).find( 'ul' ).length > 0 ) {	
		
				$( navItem ).children( '.mobile-dropdown-icon' ).toggle( function() {
					$( navItem ).addClass( 'gp-active' );
					$( navItem ).children( '.sub-menu' ).stop().slideDown()
					$( '#mobile-nav' ).addClass( 'auto-height' );
				}, function() {
					$( navItem ).removeClass( 'gp-active' );
					$( navItem ).children( '.sub-menu' ).stop().slideUp();
				} );
		
			}
					
		} );
	
	}
	
	gpHeaderMobileTopNav();
	
	
	/*--------------------------------------------------------------
	prettyPhoto lightbox
	--------------------------------------------------------------*/

	if ( ! $( 'body' ).hasClass( 'gp-lightbox-disabled' ) ) {
		$( 'a[rel^="prettyPhoto"], a[data-rel^="prettyPhoto"]' ).prettyPhoto( {
			hook: 'data-rel',
			theme: 'pp_default',
			deeplinking: false,
			social_tools: '',
			default_width: '768'
		} );
	}
	
	
	/*--------------------------------------------------------------
	Image Hover
	--------------------------------------------------------------*/

	$( '.lightbox-hover' ).css( { 'opacity':'0' } );
	$( 'a[data-rel^="prettyPhoto"]' ).hover( 
		function() {
			$( this ).find( '.lightbox-hover' ).stop().fadeTo( 750, 1 );
		},
		function() {
			$( this ).find( '.lightbox-hover' ).stop().fadeTo( 750, 0 );
		}
	 );


	/*--------------------------------------------------------------
	Back to top button
	--------------------------------------------------------------*/

	if ( $( 'body' ).hasClass( 'gp-back-to-top' ) ) {
		$().UItoTop( { 
			containerID: 'gp-to-top',
			containerHoverID: 'gp-to-top-hover',
			text: '<i class="fa fa-chevron-up"></i>',
			scrollSpeed: 600
		} );
	}


	/*--------------------------------------------------------------
	Prevent Empty Search - Thomas Scholz http://toscho.de 
	--------------------------------------------------------------*/

	$.fn.preventEmptySubmit = function( options ) {
		var settings = {
			inputselector: '#searchbar',
			msg          : ghostpool_script.emptySearchText
		};
		if ( options ) {
			$.extend( settings, options );
		}
		this.submit( function() {
			var s = $( this ).find( settings.inputselector );
			if ( !s.val() ) {
				alert( settings.msg );
				s.focus();
				return false;
			}
			return true;
		} );
		return this;
	};

	$( '#searchform' ).preventEmptySubmit();

	
	/*--------------------------------------------------------------
	Switch navigation position if near edge
	--------------------------------------------------------------*/

	function gpSwitchNavPosition() {
		$( '#nav .menu > li' ).each( function() {
			$( this ).on( 'mouseenter mouseleave', function( e ) {
				if ( $( this ).find( 'ul' ).length > 0 ) {
					var menuElement = $( 'ul:first', this ),
						pageWrapper = $( '#header' ),
						pageWrapperOffset = pageWrapper.offset(),
						menuOffset = menuElement.offset(),
						menuLeftOffset = menuOffset.left - pageWrapperOffset.left,
						pageWrapperWidth = pageWrapper.width(),
						menuWidth = menuElement.width() + 200,
						isEntirelyVisible = ( menuLeftOffset + menuWidth <= pageWrapperWidth );	
					if ( ! isEntirelyVisible ) {
						$( this ).addClass( 'gp-nav-edge' );
					} else {
						$( this ).removeClass( 'gp-nav-edge' );
					}
				}   
			} );
		} );	
	}

	gpSwitchNavPosition();
	$( window ).resize( gpSwitchNavPosition )


	/*--------------------------------------------------------------
	Resize header upon scrolling
	--------------------------------------------------------------*/

	function gpResizeHeader() {

		var headerHeight = $( '#header' ).height();
		
		$( '#gp-fixed-padding' ).css( 'height', headerHeight );

		$( window ).scroll( function() {
		
			if ( $( window ).width() > 1082 && $( 'body' ).hasClass( 'gp-fixed-header' ) ) {

				if ( $( document ).scrollTop() > ( headerHeight + 50 ) ) {
				
					$( 'body' ).addClass( 'gp-scrolling' );
					$( '#header' ).fadeIn( 'slow' );
					$( '#gp-fixed-padding' ).css( 'position', 'relative' );

				} else {
				
					$( 'body' ).removeClass( 'gp-scrolling' );
					$( '#header' ).css( 'display', '' );
					$( '#gp-fixed-padding' ).css( 'position', 'absolute' );
				
				}
			
			} else {
			
				$( 'body' ).removeClass( 'gp-scrolling' );
				$( '#gp-fixed-padding' ).css( 'position', 'absolute' );
			
			}

		});				

	}

	gpResizeHeader();
	$( window ).resize( gpResizeHeader );
	

} );