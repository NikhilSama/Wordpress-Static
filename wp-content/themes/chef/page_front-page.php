<?php
/*
Template Name: Front Page
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="entry-content">
			<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		 		<?php dynamic_sidebar('sidebar-2'); ?>
			<?php endif; ?>	
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
