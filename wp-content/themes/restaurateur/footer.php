
	<footer id="colophon" role="contentinfo">
		<div id="site-generator">

			<?php echo __('&copy; ', 'restaurateur') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
            <?php if ( is_front_page() && ! is_paged() ) : ?>
            <?php _e('- Powered by ', 'restaurateur'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'restaurateur' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'restaurateur' ); ?>"><?php _e('WordPress' ,'restaurateur'); ?></a>
			<?php _e(' and ', 'restaurateur'); ?><a href="<?php echo esc_url( __( 'http://wprestaurateur.com/', 'restaurateur' ) ); ?>"><?php _e('WP Restaurateur', 'restaurateur'); ?></a>
            <?php endif; ?>
            
		</div>
	</footer><!-- #colophon -->
</div><!-- #container -->

<?php wp_footer(); ?>


</body>
</html>