<?php get_header(); ?>

<?php fkidd_show_page_header_section(); ?>

<div id="main-content-wrapper">
	<div id="main-content">
	<?php if (have_posts()) :

			while (have_posts()) :
			
				the_post();
				
				/*
				 * includes a post format-specific template for single content
				 */
				get_template_part( 'content', get_post_format() );
				
				// if comments are open or there's at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'fkidd') . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );

?>
					<div class="post-links">
						<div class="left">
							<?php previous_post_link(); ?>
						</div>
						<div class="right">
							<?php next_post_link(); ?>
						</div>
					</div>

		<?php
				
				endwhile;
	?>
	<?php else :

				// if no content is loaded, show the 'no found' template
				get_template_part( 'content', 'none' );

		  endif; ?>
	</div>

	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>