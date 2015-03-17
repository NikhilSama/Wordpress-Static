<?php

/**
 * Recent_Posts widget class
 *
 * @since 2.8.0
 */
class Chef_Recipes_A extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'chef_recipes_a', 'description' => __( "Show recipes", "chef") );
		parent::__construct('recipes-type-a', __( "Chef: Recipes Type A", "chef"), $widget_ops);
		$this->alt_option_name = 'widget_recipes_a';

		add_action( 'save_post', array($this, 'flush_widget_cache') );
		add_action( 'deleted_post', array($this, 'flush_widget_cache') );
		add_action( 'switch_theme', array($this, 'flush_widget_cache') );
	}

	public function widget($args, $instance) {
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'widget_recipes', 'widget' );
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$course = isset( $instance['course'] ) ? esc_attr($instance['course']) : '';
		$cuisine = isset( $instance['cuisine'] ) ? esc_attr($instance['cuisine']) : '';

		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
			'post_type' 		  => 'recipe',
			'course' 			  => $course,
			'cuisine' 			  => $cuisine,	
		) ) );

		if ($r->have_posts()) :
?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
		<?php
			$counter = 1;
			global $post;
			while ( $r->have_posts() ) : $r->the_post();
			
			//Check if Recipe Hero is active and get the custom fields values
			if ( class_exists( 'RecipeHero' ) ) {
				$serves 		= get_post_meta( $post->ID, '_recipe_hero_detail_serves', true );
				$serves_type 	= get_post_meta( $post->ID, '_recipe_hero_detail_serves_type', true );
				$prep_time 		= recipe_hero_convert_minute_hour( get_post_meta( $post->ID, '_recipe_hero_detail_prep_time', true ) );
				$cook_time 		= recipe_hero_convert_minute_hour( get_post_meta( $post->ID, '_recipe_hero_detail_cook_time', true ) );	
			}		
		?>

		<?php if( $counter == 1 ) : ?>
			<div class="recipe-item first-recipe clearfix">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="recipe-thumb col-md-6">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
							<?php the_post_thumbnail('chef-featured-big'); ?>
						</a>			
					</div>	
				<?php endif; ?>
				<div class="recipe-content col-md-6">
					<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
					<?php echo wp_trim_words( get_the_content(), 25, '<a href="'. get_permalink() .'">&nbsp;<i class="fa fa-long-arrow-right"></i></a>' ); ?>
				</div>

				<?php if ( class_exists( 'RecipeHero' ) ) : ?>
				<div class="recipe-data col-md-6 clearfix">
					<?php if ( $serves ) { ?>

					<div class="serves col-md-4 col-sm-4 col-xs-4">
						<strong><?php echo apply_filters( 'rh_label_serves', __( 'Serves', 'recipe-hero' ) ); ?></strong><br>
						<span itemprop="recipeYield"><?php echo $serves; ?> <?php echo $serves_type; ?></span>
					</div>

					<?php } ?>

					<?php if ( $prep_time ) { ?>
						<div class="prep-time col-md-4 col-sm-4 col-xs-4">
							<strong>
								<?php echo apply_filters( 'rh_label_preptime', __( 'Prep time', 'recipe-hero' ) ); ?>
							</strong> <meta itemprop="prepTime" content="<?php echo recipe_hero_schema_prep_time(); ?>">
							<div class="the-time"><span class="dashicons dashicons-clock"></span> <?php echo $prep_time; ?></div>
						</div>
					<?php } ?>

					<?php if ( $cook_time ) { ?>

						<div class="cook-time unit col-md-4 col-sm-4 col-xs-4">
							<strong>
								<?php echo apply_filters( 'rh_label_cooktime', __( 'Cook Time', 'recipe-hero' ) ); ?>
							</strong> <meta itemprop="cookTime" content="<?php echo recipe_hero_schema_cook_time(); ?>">
							<div class="the-time"><span class="dashicons dashicons-clock"></span> <?php echo $cook_time; ?></div>
							<meta itemprop="totalTime" content="<?php echo recipe_hero_schema_total_time(); ?>">
						</div>

					<?php } ?>	
				</div>
				<?php endif; ?>
			</div>	
		<?php else : ?>
			<div class="recipe-item col-md-3 col-sm-3 col-xs-3">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="recipe-thumb">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
							<?php the_post_thumbnail('chef-featured-big'); ?>
						</a>			
					</div>	
				<?php endif; ?>
				<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
			</div>
		<?php endif; ?>



		<?php  $counter++; ?>
		<?php endwhile; ?>
		<?php echo $args['after_widget']; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;

		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'widget_recipes', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['course'] 	= strip_tags($new_instance['course']);
		$instance['cuisine']	= strip_tags($new_instance['cuisine']);

		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['chef_recipes']) )
			delete_option('chef_recipes');

		return $instance;
	}

	public function flush_widget_cache() {
		wp_cache_delete('widget_recipes', 'widget');
	}

	public function form( $instance ) {
		$title     		= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$course   	   	= isset( $instance['course'] ) ? esc_attr( $instance['course'] ) : '';
		$cuisine   	   	= isset( $instance['cuisine'] ) ? esc_attr( $instance['cuisine'] ) : '';
?>
		<p style="font-style: italic;"><?php _e( 'This widget shows recipes items created with the recommended Recipe Hero plugin.', 'chef' ); ?></p>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'chef' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'course' ); ?>"><?php _e( 'Enter the slug for your Course or leave empty to show from all courses.', 'chef' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'course' ); ?>" name="<?php echo $this->get_field_name( 'course' ); ?>" type="text" value="<?php echo $course; ?>" size="3" /></p>

		<p><label for="<?php echo $this->get_field_id( 'cuisine' ); ?>"><?php _e( 'Enter the slug for your Cuisine or leave empty to show from all cuisines.', 'chef' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'cuisine' ); ?>" name="<?php echo $this->get_field_name( 'cuisine' ); ?>" type="text" value="<?php echo $cuisine; ?>" size="3" /></p>
		

<?php
	}
}