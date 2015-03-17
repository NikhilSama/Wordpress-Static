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
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );


	// Primary color
	wp.customize('primary_color',function( value ) {
		value.bind( function( newval ) {
			$('.entry-title a, .just-icons li a::before, .transp-square li a::before, .transp-round li a::before, .social-navigation li:hover > a::before, .entry-meta .fa, .entry-footer .fa, .main-navigation li:after, a, a:active, a:focus, .recipe-hero article.recipe .recipe-single-meta .dashicons-testimonial, .recipe-hero-recipe-rating').css('color', newval );
			$('.chef_courses_list li, .chef_cuisines_list li, .block-title, .widget-title, .social-navigation li').css('border-color', newval );
			$('.featured-area, .site-footer, .transp-square li:hover, .transp-round li:hover, .social-navigation li').css('background-color', newval );
			$('.featured-svg .svg-container path, .svg-container.svg-up path').css('fill', newval );
		} );
	});
	// Header
	wp.customize('header_color',function( value ) {
		value.bind( function( newval ) {
			$('.site-branding, .main-navigation, .main-navigation li').css('background-color', newval );
			$('.svg-container path').css('fill', newval );
		} );
	});	
	// Site title
	wp.customize('site_title_color',function( value ) {
		value.bind( function( newval ) {
			$('.site-title a').css('color', newval );
		} );
	});
	// Site description
	wp.customize('site_desc_color',function( value ) {
		value.bind( function( newval ) {
			$('.site-description').css('color', newval );
		} );
	});
	// Nav color
	wp.customize('nav_color',function( value ) {
		value.bind( function( newval ) {
			$('.main-navigation a').css('color', newval );
		} );
	});	
	// Body text color
	wp.customize('body_text_color',function( value ) {
		value.bind( function( newval ) {
			$('body').css('color', newval );
		} );
	});
	// Font sizes
	wp.customize('h1_size',function( value ) {
		value.bind( function( newval ) {
			$('h1').css('font-size', newval + 'px' );
		} );
	});	
    wp.customize('h2_size',function( value ) {
        value.bind( function( newval ) {
            $('h2').css('font-size', newval + 'px' );
        } );
    });	
    wp.customize('h3_size',function( value ) {
        value.bind( function( newval ) {
            $('h3').css('font-size', newval + 'px' );
        } );
    });
    wp.customize('h4_size',function( value ) {
        value.bind( function( newval ) {
            $('h4').css('font-size', newval + 'px' );
        } );
    });
    wp.customize('h5_size',function( value ) {
        value.bind( function( newval ) {
            $('h5').css('font-size', newval + 'px' );
        } );
    });
    wp.customize('h6_size',function( value ) {
        value.bind( function( newval ) {
            $('h6').css('font-size', newval + 'px' );
        } );
    });
    wp.customize('body_size',function( value ) {
        value.bind( function( newval ) {
            $('body').css('font-size', newval + 'px' );
        } );
    });

} )( jQuery );
