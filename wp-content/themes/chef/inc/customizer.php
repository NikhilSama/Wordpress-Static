<?php
/**
 * Chef Theme Customizer
 *
 * @package Chef
 */


function chef_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    //Extra titles
    class Chef_Titles extends WP_Customize_Control {
        public $type = 'titles';
        public $label = '';
        public function render_content() {
        ?>
            <h3 style="padding: 10px; border: 1px solid #DF7B7B; color: #DF7B7B;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }

    //Recipe Hero courses dropdown
    class Chef_Courses extends WP_Customize_Control {
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'chef' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                    'taxonomy'           => 'course',
                )
            );
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                esc_html($this->label),
                $dropdown
            );
        }
    }    
    //Recipe Hero cuisines dropdown
    class Chef_Cuisines extends WP_Customize_Control {
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'chef' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                    'taxonomy'           => 'cuisine',
                )
            );
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                esc_html($this->label),
                $dropdown
            );
        }
    } 

    //___General___//
    $wp_customize->add_section(
        'chef_general',
        array(
            'title' => __('General', 'chef'),
            'priority' => 9,
        )
    );
    //Logo Upload
    $wp_customize->add_setting(
        'site_logo',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',

        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_logo',
            array(
               'label'          => __( 'Upload your logo', 'chef' ),
               'type'           => 'image',
               'section'        => 'chef_general',
               'settings'       => 'site_logo',
               'priority' => 9,
            )
        )
    );
    //Favicon Upload
    $wp_customize->add_setting(
        'site_favicon',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_favicon',
            array(
               'label'          => __( 'Upload your favicon', 'chef' ),
               'type'           => 'image',
               'section'        => 'chef_general',
               'settings'       => 'site_favicon',
               'priority' => 10,
            )
        )
    );
    //Sidebar widgets
    $wp_customize->add_setting(
        'sidebar_widgets',
        array(
            'sanitize_callback' => 'chef_sanitize_checkbox',
            'default' => 0,         
        )       
    );
    $wp_customize->add_control(
        'sidebar_widgets',
        array(
            'type' => 'checkbox',
            'label' => __('Hide the sidebar widgets on screen widths below 991px', 'chef'),
            'section' => 'chef_general',
            'priority' => 11,           
        )
    );     
    //___Blog options___//
    $wp_customize->add_section(
        'blog_options',
        array(
            'title' => __('Blog options', 'chef'),
            'priority' => 12,
        )
    );
    //Full content posts
    $wp_customize->add_setting(
      'full_content',
      array(
        'sanitize_callback' => 'chef_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
        'full_content',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to display the full content of your posts on the home page.', 'chef'),
            'section' => 'blog_options',
            'priority' => 11,
        )
    );
    //Excerpt
    $wp_customize->add_setting(
        'exc_lenght',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '55',
        )       
    );
    $wp_customize->add_control( 'exc_lenght', array(
        'type'        => 'number',
        'priority'    => 12,
        'section'     => 'blog_options',
        'label'       => __('Excerpt lenght', 'chef'),
        'description' => __('Choose your excerpt length. Default: 55 words', 'chef'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
            'style' => 'padding: 15px;',
        ),
    ) );
    //Index
    $wp_customize->add_setting('chef_options[titles]', array(
            'type' => 'titles_control',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new chef_Titles( $wp_customize, 'index_meta', array(
        'label' => __('Blog page', 'chef'),
        'section' => 'blog_options',
        'settings' => 'chef_options[titles]',
        'priority' => 13
        ) )
    );    
    //Hide date
    $wp_customize->add_setting(
      'chef_date',
      array(
        'sanitize_callback' => 'chef_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'chef_date',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post date on index?', 'chef'),
        'section' => 'blog_options',
        'priority' => 14,
      )
    );
    //Hide categories
    $wp_customize->add_setting(
      'chef_cats',
      array(
        'sanitize_callback' => 'chef_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'chef_cats',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post categories on index?', 'chef'),
        'section' => 'blog_options',
        'priority' => 15,
      )
    );
    //Singles
    $wp_customize->add_setting('chef_options[titles]', array(
            'type' => 'titles_control',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new chef_Titles( $wp_customize, 'single_meta', array(
        'label' => __('Single posts', 'chef'),
        'section' => 'blog_options',
        'settings' => 'chef_options[titles]',
        'priority' => 16
        ) )
    );
    //Hide date
    $wp_customize->add_setting(
      'chef_single_date',
      array(
        'sanitize_callback' => 'chef_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'chef_single_date',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post date &amp; author on single posts?', 'chef'),
        'section' => 'blog_options',
        'priority' => 17,
      )
    );
    //Hide categories
    $wp_customize->add_setting(
      'chef_single_cats',
      array(
        'sanitize_callback' => 'chef_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'chef_single_cats',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post categories on single posts?', 'chef'),
        'section' => 'blog_options',
        'priority' => 18,
      )
    );
    //Hide tags
    $wp_customize->add_setting(
      'chef_single_tags',
      array(
        'sanitize_callback' => 'chef_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'chef_single_tags',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post tags on single posts?', 'chef'),
        'section' => 'blog_options',
        'priority' => 19,
      )
    );

    //___Social icons___//
    $wp_customize->add_section(
        'social_area',
        array(
            'title' => __('Social icons', 'chef'),
            'description' => __('Here you can choose the style for your social icons. In order to setup your social menu, go to Appearance > Menus, create a new menu with your social links and assign it to the Social position.', 'chef'),
            'priority' => 13,
        )
    );
    $wp_customize->add_setting(
        'social_style',
        array(
            'default' => 'filled-round',
            'sanitize_callback' => 'chef_sanitize_social',
        )
    );
    $wp_customize->add_control(
        'social_style',
        array(
            'type' => 'radio',
            'label' => __('Social icons style', 'chef'),
            'section' => 'social_area',
            'choices' => array(
                'filled-round'  => __( 'Filled round buttons', 'chef' ),
                'transp-round'  => __( 'Transparent round buttons', 'chef' ),
                'filled-square' => __( 'Filled square buttons', 'chef' ),
                'transp-square' => __( 'Transparent square buttons', 'chef' ),
                'just-icons'    => __( 'Just icons', 'chef' )
            ),
        )
    );
    //___Slider___//
    $wp_customize->add_section(
        'chef_slider',
        array(
            'title' => __('Slider', 'chef'),
            'priority' => 14,
        )
    );
    //Display
    $wp_customize->add_setting(
        'slider_display',
        array(
            'sanitize_callback' => 'chef_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'slider_display',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to display the slider.', 'chef'),
            'section' => 'chef_slider',
        )
    );
    
    //Courses
    $wp_customize->add_setting( 'slider_courses', array(
        'default'        => '',
        'sanitize_callback' => 'absint',
    ) );
    
    $wp_customize->add_control( new Chef_Courses( $wp_customize, 'slider_courses', array(
        'label'   => __('Select which course to show in the slider', 'chef'),
        'section' => 'chef_slider',
        'settings'   => 'slider_courses',
    ) ) );
  
    //Cuisines
    $wp_customize->add_setting( 'slider_cuisines', array(
        'default'        => '',
        'sanitize_callback' => 'absint',
    ) );
    
    $wp_customize->add_control( new Chef_Cuisines( $wp_customize, 'slider_cuisines', array(
        'label'   => __('Select which cuisine to show in the slider', 'chef'),
        'section' => 'chef_slider',
        'settings'   => 'slider_cuisines',
    ) ) );

    //Number of posts
    $wp_customize->add_setting(
        'slider_number',
        array(
            'default' => '6',
            'sanitize_callback' => 'absint',
        )
    );
        
    $wp_customize->add_control(
        'slider_number',
        array(
            'label' => __('Enter the number of posts you want to show in the slider.', 'chef'),
            'section' => 'chef_slider',
            'type' => 'text',
        )
    );
    //Slideshow speed
    $wp_customize->add_setting(
        'slideshowspeed',
        array(
            'default' => '4000',
            'sanitize_callback' => 'absint',
        )
    );     
    $wp_customize->add_control(
        'slideshowspeed',
        array(
            'label' => __('Slideshow speed [miliseconds].', 'chef'),
            'section' => 'chef_slider',
            'type' => 'text',
        )
    );
    //Animation speed
    $wp_customize->add_setting(
        'animationspeed',
        array(
            'default' => '400',
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'animationspeed',
        array(
            'label' => __('Animation speed [miliseconds]', 'chef'),
            'section' => 'chef_slider',
            'type' => 'text',
        )
    );
    //___Fonts___//
    $wp_customize->add_section(
        'chef_fonts',
        array(
            'title' => __('Fonts', 'chef'),
            'priority' => 15,
            'description' => __('You can use any Google Fonts you want for the heading and/or body. See the fonts here: google.com/fonts. See the documentation if you need help with this: flyfreemedia.com/documentation/chef', 'chef'),
        )
    );
    //Body fonts title
    $wp_customize->add_setting('chef_options[titles]', array(
            'type' => 'titles_control',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new chef_Titles( $wp_customize, 'body_fonts', array(
        'label' => __('Body fonts', 'chef'),
        'section' => 'chef_fonts',
        'settings' => 'chef_options[titles]',
        'priority' => 10
        ) )
    );     
    //Body fonts
    $wp_customize->add_setting(
        'body_font_name',
        array(
            'default' => '',
            'sanitize_callback' => 'chef_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_name',
        array(
            'label' => __( 'Font name/style/sets', 'chef' ),
            'section' => 'chef_fonts',
            'type' => 'text',
            'priority' => 11
        )
    );
    //Body fonts family
    $wp_customize->add_setting(
        'body_font_family',
        array(
            'default' => '',
            'sanitize_callback' => 'chef_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_family',
        array(
            'label' => __( 'Font family', 'chef' ),
            'section' => 'chef_fonts',
            'type' => 'text',
            'priority' => 12
        )
    );
    //Headings fonts title
    $wp_customize->add_setting('chef_options[titles]', array(
            'type' => 'titles_control',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new chef_Titles( $wp_customize, 'headings_fonts', array(
        'label' => __('Headings fonts', 'chef'),
        'section' => 'chef_fonts',
        'settings' => 'chef_options[titles]',
        'priority' => 13
        ) )
    );    
    //Headings fonts
    $wp_customize->add_setting(
        'headings_font_name',
        array(
            'default' => '',
            'sanitize_callback' => 'chef_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'headings_font_name',
        array(
            'label' => __( 'Font name/style/sets', 'chef' ),
            'section' => 'chef_fonts',
            'type' => 'text',
            'priority' => 14
        )
    );
    //Body fonts family
    $wp_customize->add_setting(
        'headings_font_family',
        array(
            'default' => '',
            'sanitize_callback' => 'chef_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'headings_font_family',
        array(
            'label' => __( 'Font family', 'chef' ),
            'section' => 'chef_fonts',
            'type' => 'text',
            'priority' => 15
        )
    );
    //Font sizes title
    $wp_customize->add_setting('chef_options[titles]', array(
            'type' => 'titles_control',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new chef_Titles( $wp_customize, 'font_sizes_title', array(
        'label' => __('Font sizes', 'chef'),
        'section' => 'chef_fonts',
        'settings' => 'chef_options[titles]',
        'priority' => 16
        ) )
    );     
    //H1 size
    $wp_customize->add_setting(
        'h1_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '36',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h1_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'chef_fonts',
        'label'       => __('H1 font size', 'chef'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H2 size
    $wp_customize->add_setting(
        'h2_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '30',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h2_size', array(
        'type'        => 'number',
        'priority'    => 18,
        'section'     => 'chef_fonts',
        'label'       => __('H2 font size', 'chef'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H3 size
    $wp_customize->add_setting(
        'h3_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '24',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h3_size', array(
        'type'        => 'number',
        'priority'    => 19,
        'section'     => 'chef_fonts',
        'label'       => __('H3 font size', 'chef'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H4 size
    $wp_customize->add_setting(
        'h4_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '18',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h4_size', array(
        'type'        => 'number',
        'priority'    => 20,
        'section'     => 'chef_fonts',
        'label'       => __('H4 font size', 'chef'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H5 size
    $wp_customize->add_setting(
        'h5_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h5_size', array(
        'type'        => 'number',
        'priority'    => 21,
        'section'     => 'chef_fonts',
        'label'       => __('H5 font size', 'chef'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H6 size
    $wp_customize->add_setting(
        'h6_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '12',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h6_size', array(
        'type'        => 'number',
        'priority'    => 22,
        'section'     => 'chef_fonts',
        'label'       => __('H6 font size', 'chef'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //Body
    $wp_customize->add_setting(
        'body_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '16',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'body_size', array(
        'type'        => 'number',
        'priority'    => 23,
        'section'     => 'chef_fonts',
        'label'       => __('Body font size', 'chef'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 24,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );    
    //___Colors___//
    //Primary color
    $wp_customize->add_setting(
        'primary_color',
        array(
            'default'           => '#DF7B7B',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label' => __('Primary color', 'chef'),
                'section' => 'colors',
                'settings' => 'primary_color',
                'priority' => 12
            )
        )
    );
    //Header
    $wp_customize->add_setting(
        'header_color',
        array(
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_color',
            array(
                'label' => __('Header background', 'chef'),
                'section' => 'colors',
                'settings' => 'header_color',
                'priority' => 13
            )
        )
    );    
    //Site title
    $wp_customize->add_setting(
        'site_title_color',
        array(
            'default'           => '#DF7B7B',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'site_title_color',
            array(
                'label' => __('Site title', 'chef'),
                'section' => 'colors',
                'settings' => 'site_title_color',
                'priority' => 14
            )
        )
    );
    //Site description
    $wp_customize->add_setting(
        'site_desc_color',
        array(
            'default'           => '#5e5e5e',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'site_desc_color',
            array(
                'label' => __('Site description', 'chef'),
                'section' => 'colors',
                'settings' => 'site_desc_color',
                'priority' => 15
            )
        )
    );
    //Nav color
    $wp_customize->add_setting(
        'nav_color',
        array(
            'default'           => '#5e5e5e',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'nav_color',
            array(
                'label' => __('Menu links', 'chef'),
                'section' => 'colors',
                'settings' => 'nav_color',
                'priority' => 16
            )
        )
    );     
    //Body
    $wp_customize->add_setting(
        'body_text_color',
        array(
            'default'           => '#646464',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'body_text_color',
            array(
                'label' => __('Body text', 'chef'),
                'section' => 'colors',
                'settings' => 'body_text_color',
                'priority' => 17
            )
        )
    );                   
}
add_action( 'customize_register', 'chef_customize_register' );

/**
 * Sanitization
 */
//Checkboxes
function chef_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}
//Text
function chef_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
//Radio
function chef_sanitize_social( $input ) {
    $valid = array(
                'filled-round'  => __( 'Filled round buttons', 'chef' ),
                'transp-round'  => __( 'Transparent round buttons', 'chef' ),
                'filled-square' => __( 'Filled square buttons', 'chef' ),
                'transp-square' => __( 'Transparent square buttons', 'chef' ),
                'just-icons'    => __( 'Just icons', 'chef' )
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function chef_customize_preview_js() {
	wp_enqueue_script( 'chef_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), true );
}
add_action( 'customize_preview_init', 'chef_customize_preview_js' );
