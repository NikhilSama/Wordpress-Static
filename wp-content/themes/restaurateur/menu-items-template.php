<?php
/**
 * Template Name: Menu Items, w/ Sidebar
 * Description: A page template for the menu items
 */
get_header(); ?>

    <div id="content" class="clearfix">
        
        <div id="main" class="col700 clearfix" role="main">
        	<?php while ( have_posts() ) : the_post(); ?>

				<header class="page-header">
				  <h1 class="page-title"><?php the_title(); ?></h1>
                  <?php if (post_type_exists('menu_item')) : ?>
                    <?php $hasposts = get_posts('post_type=menu_item'); 
					  if( !empty ( $hasposts ) ) :
					?>
					<?php $terms = get_terms('menu_item_category'); ?>
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

			<?php endwhile; // end of the loop. ?>
            
		  <?php if (post_type_exists('menu_item')) : ?>
          
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
					'post_type' => 'menu_item',
					'posts_per_page' => -1,
					//'paged' => $paged
				));
			?>

			<?php if ( $wp_query->have_posts() ) : ?>
                
				<div id="grid-wrap" class="clearfix">

				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                    <?php   // Get terms for post
					 $terms = get_the_terms( $post->ID , 'menu_item_category' );
					 $menu =  array();
					 // Loop over each item since it's an array
					 if ( $terms != null ){
					 foreach( $terms as $term ) {
					 // Print the name method from $term which is an OBJECT
					 $menu[] = $term->slug ;
					 $menu_term = implode(" ", $menu);
					 // Get rid of the other data stored in the object, since it's not needed
					 unset($term);
					} } ?>
					<div class="grid-box isotope-item <?php echo $menu_term; ?>">
					<?php
						get_template_part( 'content', 'menu' );
					?>
					</div>

				<?php endwhile; ?>

				</div>
               
                
                <?php $wp_query = null; $wp_query = $temp; ?>
                
                <?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h2><?php _e( 'No Menu Items Found!', 'restaurateur' ); ?></h2>
					</header><!-- .entry-header -->

					<div class="entry-content post-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'restaurateur' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
			

			<?php endif; ?>
          
        <?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h2><?php _e( 'No Menu Items Found!', 'restaurateur' ); ?></h2>
					</header><!-- .entry-header -->

					<div class="entry-content post-content">
						<p><?php _e( 'Please make sure that the Restaurateur Menu Item CPT Plugin is installed and activated.', 'restaurateur' ); ?></p>
						
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
            
        <?php endif; ?>
        

        </div> <!-- end #main -->

        <?php get_sidebar('menu-item'); ?>

    </div> <!-- end #content -->
        
<?php get_footer(); ?>