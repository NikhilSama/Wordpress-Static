<?php


//Dynamic styles
function chef_custom_styles($custom) {


	//__COLORS
	//Primary color
	$primary_color = get_theme_mod( 'primary_color' );
	if ( isset($primary_color) && ( $primary_color != '#DF7B7B' ) ) {
		$custom = ".entry-title a, #masthead .just-icons li a::before, #masthead .transp-square li a::before, #masthead .transp-round li a::before, .social-navigation li:hover > a::before, .entry-meta .fa, .entry-footer .fa, .main-navigation li:after, a, a:active, a:focus, .recipe-hero article.recipe .recipe-single-meta .dashicons-testimonial, .recipe-hero-recipe-rating { color:" . esc_html($primary_color) . "}"."\n";
		$custom .= ".featured-area, .site-footer, #masthead .transp-square li:hover, #masthead .transp-round li:hover, .social-navigation li { background-color:" . esc_html($primary_color) . "}"."\n";
		$custom .= ".chef_courses_list li, .chef_cuisines_list li, .block-title, .widget-title, .social-navigation li { border-color:" . esc_html($primary_color) . "}"."\n";
		$custom .= ".featured-svg .svg-container path, .svg-container.svg-up path { fill:" . esc_html($primary_color) . "}"."\n";
	}	
	//Header color
	$header_color = get_theme_mod( 'header_color' );
	if ( isset($header_color) && ( $header_color != '#fff' )) {
		$custom .= ".site-branding, .main-navigation, .main-navigation li { background-color:" . esc_html($header_color) . "}"."\n";
		$custom .= ".svg-container path { fill:" . esc_html($header_color) . "}"."\n";
	}	
	//Site title
	$site_title = get_theme_mod( 'site_title_color' );
	if ( isset($site_title) && ( $site_title != '#DF7B7B' )) {
		$custom .= ".site-title a { color:" . esc_html($site_title) . "}"."\n";
	}
	//Site description
	$site_desc = get_theme_mod( 'site_desc_color' );
	if ( isset($site_desc) && ( $site_desc != '#5e5e5e' )) {
		$custom .= ".site-description { color:" . esc_html($site_desc) . "}"."\n";
	}
	//Body text
	$nav_color = get_theme_mod( 'nav_color' );
	if ( isset($nav_color) && ( $nav_color != '#5e5e5e' )) {
		$custom .= ".main-navigation a { color:" . esc_html($nav_color) . "}"."\n";
	}		
	//Body text
	$body_text = get_theme_mod( 'body_text_color' );
	if ( isset($body_text) && ( $body_text != '#646464' )) {
		$custom .= "body { color:" . esc_html($body_text) . "}"."\n";
	}

	//Fonts
	$body_fonts = get_theme_mod('body_font_family');	
	$headings_fonts = get_theme_mod('headings_font_family');
	if ( $body_fonts !='' ) {
		$custom .= "body { font-family:" . $body_fonts . "}"."\n";
	}
	if ( $headings_fonts !='' ) {
		$custom .= "h1, h2, h3, h4, h5, h6 { font-family:" . $headings_fonts . "}"."\n";
	}
	//H1 size
	$h1_size = get_theme_mod( 'h1_size' );
	if ( get_theme_mod( 'h1_size' )) {
		$custom .= "h1 { font-size:" . intval($h1_size) . "px; }"."\n";
	}
    //H2 size
    $h2_size = get_theme_mod( 'h2_size' );
    if ( get_theme_mod( 'h2_size' )) {
        $custom .= "h2 { font-size:" . intval($h2_size) . "px; }"."\n";
    }
    //H3 size
    $h3_size = get_theme_mod( 'h3_size' );
    if ( get_theme_mod( 'h3_size' )) {
        $custom .= "h3 { font-size:" . intval($h3_size) . "px; }"."\n";
    }
    //H4 size
    $h4_size = get_theme_mod( 'h4_size' );
    if ( get_theme_mod( 'h4_size' )) {
        $custom .= "h4 { font-size:" . intval($h4_size) . "px; }"."\n";
    }
    //H5 size
    $h5_size = get_theme_mod( 'h5_size' );
    if ( get_theme_mod( 'h5_size' )) {
        $custom .= "h5 { font-size:" . intval($h5_size) . "px; }"."\n";
    }
    //H6 size
    $h6_size = get_theme_mod( 'h6_size' );
    if ( get_theme_mod( 'h6_size' )) {
        $custom .= "h6 { font-size:" . intval($h6_size) . "px; }"."\n";
    }
    //Body size
    $body_size = get_theme_mod( 'body_size' );
    if ( get_theme_mod( 'body_size' )) {
        $custom .= "body { font-size:" . intval($body_size) . "px; }"."\n";
    }
    //Widgets display on small screens
    if ( get_theme_mod( 'sidebar_widgets' ) == 1 ) {
        $custom .= "@media only screen and (max-width: 991px) { .widget-area { display: none; } }"."\n";
    }

	//Output all the styles
	wp_add_inline_style( 'chef-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'chef_custom_styles' );