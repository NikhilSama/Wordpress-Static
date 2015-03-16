<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php wp_title('|', true, 'left'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="container">

	<div id="search-box-wrap">
        <div id="search-box">
           <div id="close-x"><?php _e( 'x', 'restaurateur' ); ?></div>
           <?php get_search_form(); ?>
        </div>
    </div>

	<header id="branding" role="banner">
      <div id="inner-header" class="clearfix">
		<div id="site-heading">
			<?php if ( get_theme_mod( 'restaurateur_logo' ) ) : ?>
            <div id="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'restaurateur_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a></div>
            <?php else : ?>
			<div id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
            <?php endif; ?>
		</div>
        
        <div id="social-media" class="clearfix">
        
        	<?php if ( get_theme_mod( 'restaurateur_facebook' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'restaurateur_facebook' ) ); ?>" class="social-fb" title="<?php echo esc_url( get_theme_mod( 'restaurateur_facebook' ) ); ?>"><?php _e('Facebook', 'restaurateur') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'restaurateur_twitter' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'restaurateur_twitter' ) ); ?>" class="social-tw" title="<?php echo esc_url( get_theme_mod( 'restaurateur_twitter' ) ); ?>"><?php _e('Twitter', 'restaurateur') ?></a>
            <?php endif; ?>
			
            <?php if ( get_theme_mod( 'restaurateur_google' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'restaurateur_google' ) ); ?>" class="social-gp" title="<?php echo esc_url( get_theme_mod( 'restaurateur_google' ) ); ?>"><?php _e('Google+', 'restaurateur') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'restaurateur_pinterest' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'restaurateur_pinterest' ) ); ?>" class="social-pi" title="<?php echo esc_url( get_theme_mod( 'restaurateur_pinterest' ) ); ?>"><?php _e('Pinterest', 'restaurateur') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'restaurateur_linkedin' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'restaurateur_linkedin' ) ); ?>" class="social-li" title="<?php echo esc_url( get_theme_mod( 'restaurateur_linkedin' ) ); ?>"><?php _e('Linkedin', 'restaurateur') ?></a>
            <?php endif; ?>
            
			<?php if ( get_theme_mod( 'restaurateur_youtube' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'restaurateur_youtube' ) ); ?>" class="social-yt" title="<?php echo esc_url( get_theme_mod( 'restaurateur_youtube' ) ); ?>"><?php _e('Youtube', 'restaurateur') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'restaurateur_tumblr' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'restaurateur_tumblr' ) ); ?>" class="social-tu" title="<?php echo esc_url( get_theme_mod( 'restaurateur_tumblr' ) ); ?>"><?php _e('Tumblr', 'restaurateur') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'restaurateur_instagram' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'restaurateur_instagram' ) ); ?>" class="social-in" title="<?php echo esc_url( get_theme_mod( 'restaurateur_instagram' ) ); ?>"><?php _e('Instagram', 'restaurateur') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'restaurateur_flickr' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'restaurateur_flickr' ) ); ?>" class="social-fl" title="<?php echo esc_url( get_theme_mod( 'restaurateur_flickr' ) ); ?>"><?php _e('Instagram', 'restaurateur') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'restaurateur_vimeo' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'restaurateur_vimeo' ) ); ?>" class="social-vi" title="<?php echo esc_url( get_theme_mod( 'restaurateur_vimeo' ) ); ?>"><?php _e('Vimeo', 'restaurateur') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'restaurateur_yelp' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'restaurateur_yelp' ) ); ?>" class="social-ye" title="<?php echo esc_url( get_theme_mod( 'restaurateur_yelp' ) ); ?>"><?php _e('Yelp', 'restaurateur') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'restaurateur_opentable' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'restaurateur_opentable' ) ); ?>" class="social-ot" title="<?php echo esc_url( get_theme_mod( 'restaurateur_opentable' ) ); ?>"><?php _e('Open Table', 'restaurateur') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'restaurateur_rss' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'restaurateur_rss' ) ); ?>" class="social-rs" title="<?php echo esc_url( get_theme_mod( 'restaurateur_rss' ) ); ?>"><?php _e('RSS', 'restaurateur') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'restaurateur_email' ) ) : ?>
            <a href="<?php _e('mailto:', 'restaurateur'); echo sanitize_email( get_theme_mod( 'restaurateur_email' ) ); ?>" class="social-em" title="<?php _e('mailto:', 'restaurateur'); echo sanitize_email( get_theme_mod( 'restaurateur_email' ) ); ?>"><?php _e('Email', 'restaurateur') ?></a>
            <?php endif; ?>
			
			
			<?php if ( get_theme_mod( 'restaurateur_foursquare' ) ) : ?>
				<a href="<?php echo esc_url( get_theme_mod( 'restaurateur_foursquare' ) ); ?>" class="social-four" title="<?php echo esc_url( get_theme_mod( 'restaurateur_foursquare' ) ); ?>"><?php _e('Foursquare', 'restaurateur') ?></a>
            <?php endif; ?>
			
			<?php if ( get_theme_mod( 'restaurateur_tripadvisor' ) ) : ?>
				<a href="<?php echo esc_url( get_theme_mod( 'restaurateur_tripadvisor' ) ); ?>" class="social-trip" title="<?php echo esc_url( get_theme_mod( 'restaurateur_tripadvisor' ) ); ?>"><?php _e('Tripadvisor', 'restaurateur') ?></a>
            <?php endif; ?>
			
            
            <div id="search-icon"></div>
          </div>
	    </div>
      
        <nav id="access" role="navigation">
            <h1 class="assistive-text section-heading"><?php _e( 'Main menu', 'restaurateur' ); ?></h1>
            <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'restaurateur' ); ?>"><?php _e( 'Skip to content', 'restaurateur' ); ?></a></div>
            <?php restaurateur_main_nav(); // Adjust using Menus in Wordpress Admin ?>
        </nav><!-- #access -->
      
	</header><!-- #branding -->
