
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    <?php if ( has_post_thumbnail()) : ?>
        <div class="imgthumb"><?php the_post_thumbnail( array(600, 300) ); ?></div> 
        <?php else : ?>
        <div class="grid-box-noimg"><p><?php _e('No Featured Image', 'restaurateur'); ?></p></div>
    <?php endif; ?>
	
	<header class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?></h2>
	</header><!-- .entry-header -->

	<div class="entry-content post-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'restaurateur' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->


	<footer class="entry-meta">
		<?php   // Get terms for post
		 $terms = get_the_terms( $post->ID , 'menu_item_category' );
		 // Loop over each item since it's an array
		 if ( $terms != null ){
		 foreach( $terms as $term ) {
		 // Print the name method from $term which is an OBJECT
		  $menu[] = $term->slug ;
		  $menu_term = implode(", ", $menu);
		 // Get rid of the other data stored in the object, since it's not needed
		 unset($term);
		} } ?>
        <span class="cat-links">
            <?php printf( __( '<span class="meta-eat">In</span> <strong>%s</strong>', 'restaurateur' ), $menu_term ); ?>
        </span>
	</footer><!-- #entry-meta -->
    
    <?php  $price = get_post_meta( $post->ID, 'menu_price', true ); 
	if ($price != null) : ?> 
	<div class="menu-price"><?php echo $price ?></div>
    <?php endif; ?>
    
</article><!-- #post-<?php the_ID(); ?> -->
