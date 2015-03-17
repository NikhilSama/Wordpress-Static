<?php
	function chef_slider_scripts() {
			wp_enqueue_style( 'flex-style', get_template_directory_uri() . '/inc/slider/flexslider.css' );
			wp_enqueue_script( 'flex-script', get_template_directory_uri() .  '/inc/slider/js/jquery.flexslider-min.js', array( 'jquery' ), true );	
			wp_enqueue_script( 'slider-init', get_template_directory_uri() .  '/inc/slider/js/slider-init.js', array(), true );						
			
			//Slider speed options
			if ( ! get_theme_mod('slideshowspeed') ) {
				$slideshowspeed = 4000;
			} else {
				$slideshowspeed = absint(get_theme_mod('slideshowspeed'));
			}			
			if ( ! get_theme_mod('animationspeed') ) {
				$animationspeed = 400;
			} else {
				$animationspeed = absint(get_theme_mod('animationspeed'));
			}			
			$slider_options = array(
				'slideshowspeed' => $slideshowspeed,
				'animationspeed' => $animationspeed,
			);			
			wp_localize_script('slider-init', 'sliderOptions', $slider_options);			
	}
	add_action( 'wp_enqueue_scripts', 'chef_slider_scripts' );
	function chef_slider_template() {

		//Get the number of slides
		if (get_theme_mod('slider_number')) {	
			$number = absint(get_theme_mod('slider_number'));
		} else {
			$number = 6;
		}
		//Get the selected course
		$course = get_theme_mod('slider_courses');
		if ( $course != 0 ) {
			$course = get_term( $course, 'course');
			$course_slug = $course->slug;
		} else {
			$course_slug = '';
		}
		//Get the selected cuisine	
		$cuisine = get_theme_mod('slider_cuisines');
		if ( $cuisine != 0 ) {
			$cuisine = get_term( $cuisine, 'cuisine');
			$cuisine_slug = $cuisine->slug;	
		} else {
			$cuisine_slug = '';
		}	

		$args = array(
			'posts_per_page'=> $number,
			'post_status'   => 'publish',
			'post_type' 	=> 'recipe',
			'course'		=> $course_slug,
			'cuisine'		=> $cuisine_slug
		);
		$query = new WP_Query( $args );	
		if ( $query->have_posts() ) {
		?>
		<div class="featured-area clearfix">
			<div class="container">		
				<div class="flexslider loading">
					<ul class="slides">	
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
							<?php if ( has_post_thumbnail() ) : ?>	
								<li class="slide">
									<div class="slide-thumb col-md-6 col-sm-6">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php the_post_thumbnail( 'chef-featured-big' ); ?>
										</a>
									</div>
									<div class="slide-info col-md-6 col-sm-6">
										<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
										<div class="entry-summary">
											<?php the_excerpt(); ?>
										</div>
									</div>									
								</li>
							<?php endif; ?>
						<?php endwhile; ?>	
					</ul>
				</div>
			</div>
		</div>
		<div class="featured-svg">
			<?php echo $GLOBALS['chef_svg_down']; ?>
		</div>		
		<?php }
		wp_reset_postdata();
	}