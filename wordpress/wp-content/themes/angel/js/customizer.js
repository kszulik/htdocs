/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

	wp.customize( 'angel_top_bar_email', function( value ) {
		value.bind( function( newval ) {
			$('.top-bar-right .email_address a').html( newval );
		} );
	} );

	wp.customize( 'angel_top_bar_phone', function( value ) {
		value.bind( function( newval ) {
			$('.top-bar-right .phone_number span').html( newval );
		} );
	} );

	
} )( jQuery );
