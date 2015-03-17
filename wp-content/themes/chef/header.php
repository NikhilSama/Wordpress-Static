<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Chef
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( get_theme_mod('site_favicon') ) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="loader"><div class="page-loader"></div></div>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'chef' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		
		<nav id="site-navigation" class="main-navigation clearfix" role="navigation">
			<div class="container">
				<?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
			</div>
		</nav><!-- #site-navigation -->
		<nav class="mobile-nav"></nav>		
		
		<div class="site-branding">
			<div class="container">
				<div class="branding-inner col-md-6">
					<?php if ( get_theme_mod('site_logo') ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img class="site-logo" src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>" /></a>
					<?php else : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					<?php endif; ?>
				</div>
				<?php if ( has_nav_menu( 'social' ) ) : ?>
					<?php $social_style = get_theme_mod('social_style'); //Get the social menu style ?>
					<nav class="social-navigation col-md-6 clearfix <?php echo esc_attr($social_style); ?>">
						<?php wp_nav_menu( array( 'theme_location' => 'social', 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'menu_class' => 'menu clearfix', 'fallback_cb' => false ) ); ?>
					</nav>
				<?php endif; ?>				
			</div>
		</div><!-- .site-branding -->
		<?php echo $GLOBALS['chef_svg_down']; ?>
	</header><!-- #masthead -->

	<?php if ( ( is_home() || is_front_page() ) && get_theme_mod('slider_display') ) : ?>
		<?php echo chef_slider_template(); ?>
	<?php endif; ?>

	<div id="content" class="site-content container">