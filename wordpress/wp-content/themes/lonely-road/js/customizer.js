/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	wp.customize( 'lonely_road_color1', function( value ) {
		value.bind( function( to ) {
			$( '.header-wrapper, .main-navigation ul ul li, #secondary, .entry-content .date' ).css( 'background-color', to );
			$( '.sticky' ).css( 'border', ' 3px solid ' + to );
		} );
	} );
	wp.customize( 'lonely_road_color2', function( value ) {
		value.bind( function( to ) {
			$( '.navigation-wrapper' ).css( 'background-color', to );
			$( '.social li a' ).css( 'color', to );
		} );
	} );
	wp.customize( 'lonely_road_main_font', function( value ) {
		value.bind( function( to ) {
			$( 'body, button, input, select, textarea' ).css( 'font-family', '"' + to.replace("+", " ") + '", sans-serif' );
		} );
	} );
	wp.customize( 'lonely_road_logo', function( value ) {
		value.bind( function( to ) {
			if( to == '' ) {
				$('.site-branding .site-title, .site-branding .site-description').show();
				$('.site-branding .site-logo').hide();
			} else {
				$('.site-branding .site-title, .site-branding .site-description').hide();
				$('.site-branding .site-logo').html('<a href="/" rel="home" class="site-logo"><img src="' + to + '"/></a>').show();
			}
		} );
	} );

} )( jQuery );
