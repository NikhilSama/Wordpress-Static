<?php
/**
 * Part Name: Default Footer
 */
?>
<footer id="colophon" class="site-footer" role="contentinfo">

	<div id="footer-widgets" class="full-container">
		<?php dynamic_sidebar( 'sidebar-footer' ) ?>
	</div><!-- #footer-widgets -->

	<!-- <div class="footer_link_x">
		<a href="">Home</a> | 
		<a href="">About Us</a> | 
		<a href="">Photo Gallery</a>  | 
		<a href="">Order Online</a> |
		<a href="">Contact Us</a>
	</div> -->
	<?php $site_info_text = apply_filters('vantage_site_info', siteorigin_setting('general_site_info_text') ); if( !empty($site_info_text) ) : ?>
		<div id="site-info">
			<?php echo wp_kses_post($site_info_text) ?>
		</div><!-- #site-info -->
	<?php endif; ?>

	<?php echo apply_filters( 'vantage_footer_attribution', '<div id="theme-attribution">' . sprintf( __(' <a href="%s">© 2014 World Pizza Journey</a> ', 'vantage'), 'http://siteorigin.com') . '</div>' ) ?>

</footer><!-- #colophon .site-footer -->