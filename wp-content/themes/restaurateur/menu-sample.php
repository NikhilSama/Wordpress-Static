<?php
/**
 * Template Name: Menu Sample
 * Description: A page template for the menu items
 */
get_header(); ?>

    <div id="content" class="clearfix">
        
        <div id="main" class="col620 clearfix" role="main">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

				<header class="page-header">
				  <h1 class="page-title"><?php the_title(); ?></h1>
                  <?php if (post_type_exists('menu_item')) : ?>
                    <?php $hasposts = get_posts('post_type=menu_item'); 
					  if( !empty ( $hasposts ) ) :
					?>
					<?php
                    $terms = get_terms('menu_item_category', array (
                        'orderby' => 'id'
                    ));
                     ?>
                    <div id="menu-filter-wrap">
                      <ul id="menu-filters">
                        <li><a href="#" data-filter="*" class="menu-filter-link"><?php _e('Show All', 'restaurateur'); ?></a></li>
                        <?php
                        $count = count($terms);
                            $i = 0;
                            foreach ( $terms as $term ) {
                                printf( __( '<li><a href="#" data-filter=".%1$s" class="menu-filter-link">%2$s</a></li>' ), $term->slug, $term->name );
                                $i++;
                            } ?>
                      </ul>
                    </div>
                    <?php unset($terms); ?>
                  <?php endif; ?>
                <?php endif; ?>
			  </header>
                
              <?php if (!empty($post->post_content) ) : ?>
              <div class="entry-content post-content">
              <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'restaurateur' ) ); ?>
              </div>
              <?php endif; ?>

			  <?php endwhile; ?>


			<?php endif; ?>
            
            <?php
				if ( get_query_var('paged') ) {
                        $paged = get_query_var('paged');
                } elseif ( get_query_var('page') ) {
                        $paged = get_query_var('page');
                } else {
                        $paged = 1;
                }
				$temp = $wp_query;
 				$wp_query = null;
				$wp_query = new WP_Query();
				$wp_query->query( array(
					'paged' => $paged,
				));
			?>
            
            <?php if ( $wp_query->have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>
                
                
				<?php if (function_exists("restaurateur_pagination")) {
							restaurateur_pagination(); 
				} elseif (function_exists("restaurateur_content_nav")) { 
							restaurateur_content_nav( 'nav-below' );
				}?>
				
				<?php $wp_query = null; $wp_query = $temp;?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'restaurateur' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content post-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'restaurateur' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

        </div> <!-- end #main -->

        <?php get_sidebar(); ?>

    </div> <!-- end #content -->
        
<?php get_footer(); ?>