<?php

/**
 * Cuisines list
 *
 */
class Chef_Cuisines_List extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'chef_cuisines_list', 'description' => __( "Cuisines list", "chef") );
		parent::__construct('chef-cuisines-list', __( "Chef: Cuisines list", "chef"), $widget_ops);
		$this->alt_option_name = 'widget_cuisines_list';

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
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );


	    $cuisines_args = array(
		'orderby'            => 'name',
		'order'              => 'ASC',
		'title_li'           => '',
		'taxonomy'           => 'cuisine'
	    );

?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>


		<?php wp_list_categories( $cuisines_args ); ?> 


		<?php echo $args['after_widget']; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

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
?>
		<p style="font-style: italic;"><?php _e( 'This widget shows a list of your cuisines (Required: Recipe Hero plugin).', 'chef' ); ?></p>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'chef' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>	

<?php
	}
}