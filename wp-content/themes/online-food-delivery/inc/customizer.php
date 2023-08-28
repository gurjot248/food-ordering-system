<?php
/**
 * Online Food Delivery Theme Customizer
 *
 * @package Online Food Delivery
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function online_food_delivery_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.site-title a',
			'render_callback' => 'online_food_delivery_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => 'online_food_delivery_customize_partial_blogdescription',
		)
	);

	//About Section
		$wp_customize->add_section( 'online_food_delivery_about_theme' , array(
	    	'title' => esc_html__( 'About Theme', 'online-food-delivery' ),
	    	'priority' => 10,
		) );

		$wp_customize->add_setting('online_food_delivery_demo_link',array(
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('online_food_delivery_demo_link',array(
			'type'=> 'hidden',
			'description' => "<h3>Theme Demo</h3>Our premium version of Online Food Delivery has unlimited sections with advanced control fields. Dedicated support and no limititation in any field.<br> <a target='_blank' href='". esc_url('https://www.themescaliber.com/online-food-delivery-pro/') ." '>View Demo</a>",
			'section'=> 'online_food_delivery_about_theme'
		));
		
		$wp_customize->add_setting('online_food_delivery_doc_link',array(
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('online_food_delivery_doc_link',array(
			'type'=> 'hidden',
			'description' => "<h3>Theme Documentation</h3>We have well prepared documentation that provides the general guidelines and suggestions needed for this theme.<br> <a target='_blank' href='". esc_url('https://themescaliber.com/demo/doc/free-online-food-delivery/') ." '>View Documentation</a>",
			'section'=> 'online_food_delivery_about_theme'
		));

		$wp_customize->add_setting('online_food_delivery_forum_link',array(
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('online_food_delivery_forum_link',array(
			'type'=> 'hidden',
			'description' => "<h3>Theme Support</h3>Regarding any theme issue, we offer 24/7 support. You can get assistance from our support staff in resolving any problem. Please get in touch with us.<br><a target='_blank' href='". esc_url('https://wordpress.org/support/theme/online-food-delivery/') ." '>Support Forum</a>",
			'section'=> 'online_food_delivery_about_theme'
		));

	//add home page setting pannel
		$wp_customize->add_panel( 'online_food_delivery_panel_id', array(
		    'priority' => 20,
		    'capability' => 'edit_theme_options',
		    'theme_supports' => '',
		    'title' => __( 'Theme Settings', 'online-food-delivery' ),
		) );

    $online_food_delivery_font_array= array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Kavoon' =>'Kavoon',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

	//Color / Font Pallete
	$wp_customize->add_section( 'online_food_delivery_typography', array(
    	'title'      => __( 'Color / Font Pallete', 'online-food-delivery' ),
		'priority'   => 30,
		'panel' => 'online_food_delivery_panel_id'
	) );

	// This is Body Color setting
	$wp_customize->add_setting( 'online_food_delivery_body_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_food_delivery_body_color', array(
		'label' => __('Body Color', 'online-food-delivery'),
		'section' => 'online_food_delivery_typography',
		'settings' => 'online_food_delivery_body_color',
	)));

	//This is Body FontFamily  setting
	$wp_customize->add_setting('online_food_delivery_body_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control(
		'online_food_delivery_body_font_family', array(
		'section'  => 'online_food_delivery_typography',
		'label'    => __( 'Body Fonts','online-food-delivery'),
		'type'     => 'select',
		'choices'  => $online_food_delivery_font_array,
	));

    //This is Body Fontsize setting
	$wp_customize->add_setting('online_food_delivery_body_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('online_food_delivery_body_font_size',array(
		'label'	=> __('Body Font Size','online-food-delivery'),
		'section'	=> 'online_food_delivery_typography',
		'setting'	=> 'online_food_delivery_body_font_size',
		'type'	=> 'text'
	));

	// Add the Theme Color Option section.
	$wp_customize->add_setting( 'online_food_delivery_first_theme_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_food_delivery_first_theme_color', array(
  		'label' => __('Theme Color Option1','online-food-delivery'),
	    'section' => 'online_food_delivery_typography',
	    'settings' => 'online_food_delivery_first_theme_color',
  	)));

  	$wp_customize->add_setting( 'online_food_delivery_second_theme_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_food_delivery_second_theme_color', array(
  		'label' => __('Theme Color Option2','online-food-delivery'),
	    'section' => 'online_food_delivery_typography',
	    'settings' => 'online_food_delivery_second_theme_color',
  	)));
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'online_food_delivery_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_food_delivery_paragraph_color', array(
		'label' => __('Paragraph Color', 'online-food-delivery'),
		'section' => 'online_food_delivery_typography',
		'settings' => 'online_food_delivery_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('online_food_delivery_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control(
	    'online_food_delivery_paragraph_font_family', array(
	    'section'  => 'online_food_delivery_typography',
	    'label'    => __( 'Paragraph Fonts','online-food-delivery'),
	    'type'     => 'select',
	    'choices'  => $online_food_delivery_font_array,
	));

	$wp_customize->add_setting('online_food_delivery_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('online_food_delivery_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','online-food-delivery'),
		'section'	=> 'online_food_delivery_typography',
		'setting'	=> 'online_food_delivery_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'online_food_delivery_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_food_delivery_atag_color', array(
		'label' => __('"a" Tag Color', 'online-food-delivery'),
		'section' => 'online_food_delivery_typography',
		'settings' => 'online_food_delivery_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('online_food_delivery_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control(
	    'online_food_delivery_atag_font_family', array(
	    'section'  => 'online_food_delivery_typography',
	    'label'    => __( '"a" Tag Fonts','online-food-delivery'),
	    'type'     => 'select',
	    'choices'  => $online_food_delivery_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'online_food_delivery_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_food_delivery_li_color', array(
		'label' => __('"li" Tag Color', 'online-food-delivery'),
		'section' => 'online_food_delivery_typography',
		'settings' => 'online_food_delivery_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('online_food_delivery_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control(
	    'online_food_delivery_li_font_family', array(
	    'section'  => 'online_food_delivery_typography',
	    'label'    => __( '"li" Tag Fonts','online-food-delivery'),
	    'type'     => 'select',
	    'choices'  => $online_food_delivery_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'online_food_delivery_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_food_delivery_h1_color', array(
		'label' => __('h1 Color', 'online-food-delivery'),
		'section' => 'online_food_delivery_typography',
		'settings' => 'online_food_delivery_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('online_food_delivery_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control(
	    'online_food_delivery_h1_font_family', array(
	    'section'  => 'online_food_delivery_typography',
	    'label'    => __( 'h1 Fonts','online-food-delivery'),
	    'type'     => 'select',
	    'choices'  => $online_food_delivery_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('online_food_delivery_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('online_food_delivery_h1_font_size',array(
		'label'	=> __('h1 Font Size','online-food-delivery'),
		'section'	=> 'online_food_delivery_typography',
		'setting'	=> 'online_food_delivery_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'online_food_delivery_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_food_delivery_h2_color', array(
		'label' => __('h2 Color', 'online-food-delivery'),
		'section' => 'online_food_delivery_typography',
		'settings' => 'online_food_delivery_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('online_food_delivery_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control(
	    'online_food_delivery_h2_font_family', array(
	    'section'  => 'online_food_delivery_typography',
	    'label'    => __( 'h2 Fonts','online-food-delivery'),
	    'type'     => 'select',
	    'choices'  => $online_food_delivery_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('online_food_delivery_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('online_food_delivery_h2_font_size',array(
		'label'	=> __('h2 Font Size','online-food-delivery'),
		'section'	=> 'online_food_delivery_typography',
		'setting'	=> 'online_food_delivery_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'online_food_delivery_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_food_delivery_h3_color', array(
		'label' => __('h3 Color', 'online-food-delivery'),
		'section' => 'online_food_delivery_typography',
		'settings' => 'online_food_delivery_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('online_food_delivery_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control(
	    'online_food_delivery_h3_font_family', array(
	    'section'  => 'online_food_delivery_typography',
	    'label'    => __( 'h3 Fonts','online-food-delivery'),
	    'type'     => 'select',
	    'choices'  => $online_food_delivery_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('online_food_delivery_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('online_food_delivery_h3_font_size',array(
		'label'	=> __('h3 Font Size','online-food-delivery'),
		'section'	=> 'online_food_delivery_typography',
		'setting'	=> 'online_food_delivery_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'online_food_delivery_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_food_delivery_h4_color', array(
		'label' => __('h4 Color', 'online-food-delivery'),
		'section' => 'online_food_delivery_typography',
		'settings' => 'online_food_delivery_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('online_food_delivery_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control(
	    'online_food_delivery_h4_font_family', array(
	    'section'  => 'online_food_delivery_typography',
	    'label'    => __( 'h4 Fonts','online-food-delivery'),
	    'type'     => 'select',
	    'choices'  => $online_food_delivery_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('online_food_delivery_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('online_food_delivery_h4_font_size',array(
		'label'	=> __('h4 Font Size','online-food-delivery'),
		'section'	=> 'online_food_delivery_typography',
		'setting'	=> 'online_food_delivery_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'online_food_delivery_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_food_delivery_h5_color', array(
		'label' => __('h5 Color', 'online-food-delivery'),
		'section' => 'online_food_delivery_typography',
		'settings' => 'online_food_delivery_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('online_food_delivery_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control(
	    'online_food_delivery_h5_font_family', array(
	    'section'  => 'online_food_delivery_typography',
	    'label'    => __( 'h5 Fonts','online-food-delivery'),
	    'type'     => 'select',
	    'choices'  => $online_food_delivery_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('online_food_delivery_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('online_food_delivery_h5_font_size',array(
		'label'	=> __('h5 Font Size','online-food-delivery'),
		'section'	=> 'online_food_delivery_typography',
		'setting'	=> 'online_food_delivery_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'online_food_delivery_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_food_delivery_h6_color', array(
		'label' => __('h6 Color', 'online-food-delivery'),
		'section' => 'online_food_delivery_typography',
		'settings' => 'online_food_delivery_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('online_food_delivery_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control(
	    'online_food_delivery_h6_font_family', array(
	    'section'  => 'online_food_delivery_typography',
	    'label'    => __( 'h6 Fonts','online-food-delivery'),
	    'type'     => 'select',
	    'choices'  => $online_food_delivery_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('online_food_delivery_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('online_food_delivery_h6_font_size',array(
		'label'	=> __('h6 Font Size','online-food-delivery'),
		'section'	=> 'online_food_delivery_typography',
		'setting'	=> 'online_food_delivery_h6_font_size',
		'type'	=> 'text'
	));

	//Layouts
	$wp_customize->add_section( 'online_food_delivery_left_right', array(
    	'title'      => __( 'Theme Layout Settings', 'online-food-delivery' ),
		'priority'   => 30,
		'panel' => 'online_food_delivery_panel_id'
	) );

	$wp_customize->add_setting('online_food_delivery_width_options',array(
        'default' => 'Full Layout',
        'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control('online_food_delivery_width_options',array(
        'type' => 'select',
        'label' => __('Select Site Layout','online-food-delivery'),
        'section' => 'online_food_delivery_left_right',
        'choices' => array(
            'Full Layout' => __('Full Layout','online-food-delivery'),
            'Contained Layout' => __('Contained Layout','online-food-delivery'),
            'Boxed Layout' => __('Boxed Layout','online-food-delivery'),
        ),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('online_food_delivery_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	) );
	$wp_customize->add_control('online_food_delivery_theme_options', array(
        'type' => 'radio',
        'label' => __('Sidebar Layout','online-food-delivery'),
        'section' => 'online_food_delivery_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','online-food-delivery'),
            'Right Sidebar' => __('Right Sidebar','online-food-delivery'),
            'One Column' => __('One Column','online-food-delivery'),
            'Three Columns' => __('Three Columns','online-food-delivery'),
            'Four Columns' => __('Four Columns','online-food-delivery'),
            'Grid Layout' => __('Grid Layout','online-food-delivery')
        ),
    ));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('online_food_delivery_single_post_sidebar',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	) );
	$wp_customize->add_control('online_food_delivery_single_post_sidebar', array(
        'type' => 'radio',
        'label' => __('Single Post Sidebar Layout','online-food-delivery'),
        'section' => 'online_food_delivery_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','online-food-delivery'),
            'Right Sidebar' => __('Right Sidebar','online-food-delivery'),
            'One Column' => __('One Column','online-food-delivery'),
        ),
    ));

    $wp_customize->add_setting('online_food_delivery_single_page_sidebar_layout', array(
		'default'           => 'One Column',
		'sanitize_callback' => 'online_food_delivery_sanitize_choices',
	));
	$wp_customize->add_control('online_food_delivery_single_page_sidebar_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Page Layouts', 'online-food-delivery'),
		'section'        => 'online_food_delivery_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'online-food-delivery'),
			'Right Sidebar' => __('Right Sidebar', 'online-food-delivery'),
			'One Column'    => __('One Column', 'online-food-delivery'),
		),
	));

    $wp_customize->add_setting( 'online_food_delivery_single_page_breadcrumb',array(
		'default' => true,
      	'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ) );
    $wp_customize->add_control('online_food_delivery_single_page_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Page Breadcrumb','online-food-delivery' ),
        'section' => 'online_food_delivery_left_right'
    ));

    $wp_customize->add_setting('online_food_delivery_breadcrumb_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_food_delivery_breadcrumb_color', array(
		'label'    => __('Breadcrumb Color', 'online-food-delivery'),
		'section'  => 'online_food_delivery_left_right',
	)));

	$wp_customize->add_setting('online_food_delivery_breadcrumb_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_food_delivery_breadcrumb_background_color', array(
		'label'    => __('Breadcrumb Background Color', 'online-food-delivery'),
		'section'  => 'online_food_delivery_left_right',
	)));

	$wp_customize->add_setting('online_food_delivery_breadcrumb_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_food_delivery_breadcrumb_hover_color', array(
		'label'    => __('Breadcrumb Hover Color', 'online-food-delivery'),
		'section'  => 'online_food_delivery_left_right',
	)));

	$wp_customize->add_setting('online_food_delivery_breadcrumb_hover_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_food_delivery_breadcrumb_hover_bg_color', array(
		'label'    => __('Breadcrumb Hover Background Color', 'online-food-delivery'),
		'section'  => 'online_food_delivery_left_right',
	)));

	// Preloader
	$wp_customize->add_setting( 'online_food_delivery_preloader_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ) );
    $wp_customize->add_control('online_food_delivery_preloader_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Preloader','online-food-delivery' ),
        'section' => 'online_food_delivery_left_right'
    ));

    $wp_customize->add_setting('online_food_delivery_preloader_type',array(
        'default'   => 'center-square',
        'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control( 'online_food_delivery_preloader_type', array(
		'label' => __( 'Preloader Type','online-food-delivery' ),
		'section' => 'online_food_delivery_left_right',
		'type'  => 'select',
		'settings' => 'online_food_delivery_preloader_type',
		'choices' => array(
		    'center-square' => __('Center Square','online-food-delivery'),
		    'chasing-square' => __('Chasing Square','online-food-delivery'),
	    ),
	));

	$wp_customize->add_setting( 'online_food_delivery_preloader_color', array(
	    'default' => '#333333',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_food_delivery_preloader_color', array(
  		'label' => 'Preloader Color',
	    'section' => 'online_food_delivery_left_right',
	    'settings' => 'online_food_delivery_preloader_color',
  	)));

  	$wp_customize->add_setting( 'online_food_delivery_preloader_bg_color', array(
	    'default' => '#fff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_food_delivery_preloader_bg_color', array(
  		'label' => 'Preloader Background Color',
	    'section' => 'online_food_delivery_left_right',
	    'settings' => 'online_food_delivery_preloader_bg_color',
  	)));

	//Header
	$wp_customize->add_section('online_food_delivery_header',array(
		'title'	=> __('Header','online-food-delivery'),
		'priority'	=> null,
		'panel' => 'online_food_delivery_panel_id',
	));

	//Sticky Header
	$wp_customize->add_setting( 'online_food_delivery_sticky_header',array(
      	'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ) );
    $wp_customize->add_control('online_food_delivery_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Sticky Header','online-food-delivery' ),
        'section' => 'online_food_delivery_header'
    ));

    $wp_customize->add_setting('online_food_delivery_sticky_header_padding', array(
		'default'=> '',
		'sanitize_callback'	=> 'online_food_delivery_sanitize_float'
	));
	$wp_customize->add_control('online_food_delivery_sticky_header_padding', array(
		'label'	=> __('Sticky Header Padding','online-food-delivery'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'online_food_delivery_header',
		'type'=> 'number',
	));

    $wp_customize->add_setting('online_food_delivery_topbar_phoneno',array(
		'default'	=> '',
		'sanitize_callback'	=> 'online_food_delivery_sanitize_phone_number'
	));	
	$wp_customize->add_control('online_food_delivery_topbar_phoneno',array(
		'label'	=> __('Add Phone Number','online-food-delivery'),
		'section' => 'online_food_delivery_header',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('online_food_delivery_navigation_case',array(
        'default' => 'capitalize',
        'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control('online_food_delivery_navigation_case',array(
        'type' => 'select',
        'label' => __('Navigation Case','online-food-delivery'),
        'section' => 'online_food_delivery_header',
        'choices' => array(
            'uppercase' => __('Uppercase','online-food-delivery'),
            'capitalize' => __('Capitalize','online-food-delivery'),
        ),
	) );

	$wp_customize->add_setting( 'online_food_delivery_nav_font_size', array(
		'default'           => 15,
		'sanitize_callback' => 'online_food_delivery_sanitize_float',
	) );
	$wp_customize->add_control( 'online_food_delivery_nav_font_size', array(
		'label' => __( 'Navigation Font Size','online-food-delivery' ),
		'section'     => 'online_food_delivery_header',
		'type'        => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 50,
		),
	) );

	$wp_customize->add_setting('online_food_delivery_font_weight_menu_option',array(
        'default' => '600',
        'sanitize_callback' => 'online_food_delivery_sanitize_choices'
    ));
    $wp_customize->add_control('online_food_delivery_font_weight_menu_option',array(
        'type' => 'select',
        'label' => __('Navigation Font Weight','online-food-delivery'),
        'section' => 'online_food_delivery_header',
        'choices' => array(
            '100' => __('100','online-food-delivery'),
            '200' => __('200','online-food-delivery'),
            '300' => __('300','online-food-delivery'),
            '400' => __('400','online-food-delivery'),
            '500' => __('500','online-food-delivery'),
            '600' => __('600','online-food-delivery'),
            '700' => __('700','online-food-delivery'),
            '800' => __('800','online-food-delivery'),
            '900' => __('900','online-food-delivery'),
        ),
	) );

	$wp_customize->add_setting('online_food_delivery_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_food_delivery_menu_color', array(
		'label'    => __('Menu Color', 'online-food-delivery'),
		'section'  => 'online_food_delivery_header',
		'settings' => 'online_food_delivery_menu_color',
	)));

	$wp_customize->add_setting('online_food_delivery_menu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_food_delivery_menu_hover_color', array(
		'label'    => __('Menu Hover Color', 'online-food-delivery'),
		'section'  => 'online_food_delivery_header',
		'settings' => 'online_food_delivery_menu_hover_color',
	)));

	$wp_customize->add_setting('online_food_delivery_submenu_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_food_delivery_submenu_menu_color', array(
		'label'    => __('Submenu Color', 'online-food-delivery'),
		'section'  => 'online_food_delivery_header',
		'settings' => 'online_food_delivery_submenu_menu_color',
	)));
	
	$wp_customize->add_setting( 'online_food_delivery_submenu_hover_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_food_delivery_submenu_hover_color', array(
  		'label' => __('Submenu Hover Color', 'online-food-delivery'),
	    'section' => 'online_food_delivery_header',
	    'settings' => 'online_food_delivery_submenu_hover_color',
  	)));

    //Topbar
	$wp_customize->add_section('online_food_delivery_social_icons',array(
		'title'	=> __('Social Icons','online-food-delivery'),
		'priority'	=> null,
		'panel' => 'online_food_delivery_panel_id',
	));

	$wp_customize->add_setting('online_food_delivery_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('online_food_delivery_facebook_url',array(
		'label'	=> __('Add Facebook URL','online-food-delivery'),
		'section' => 'online_food_delivery_social_icons',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('online_food_delivery_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('online_food_delivery_twitter_url',array(
		'label'	=> __('Add Twitter URL','online-food-delivery'),
		'section' => 'online_food_delivery_social_icons',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('online_food_delivery_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('online_food_delivery_linkedin_url',array(
		'label'	=> __('Add Linkedin URL','online-food-delivery'),
		'section' => 'online_food_delivery_social_icons',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('online_food_delivery_instagram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('online_food_delivery_instagram_url',array(
		'label'	=> __('Add Instagram URL','online-food-delivery'),
		'section' => 'online_food_delivery_social_icons',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('online_food_delivery_whatsapp_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('online_food_delivery_whatsapp_url',array(
		'label'	=> __('Add WhatsApp URL','online-food-delivery'),
		'section' => 'online_food_delivery_social_icons',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('online_food_delivery_pinterest_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('online_food_delivery_pinterest_url',array(
		'label'	=> __('Add Pinterest URL','online-food-delivery'),
		'section' => 'online_food_delivery_social_icons',
		'type'	=> 'text'
	));

	//home page slider
	$wp_customize->add_section( 'online_food_delivery_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'online-food-delivery' ),
		'priority'   => null,
		'panel' => 'online_food_delivery_panel_id'
	) );

	$wp_customize->selective_refresh->add_partial(
		'online_food_delivery_slider_hide_show',
		array(
			'selector'        => '#slider .inner_carousel h1',
			'render_callback' => 'online_food_delivery_customize_partial_online_food_delivery_slider_hide_show',
		)
	);

	$wp_customize->add_setting('online_food_delivery_slider_hide_show',array(
       'default' => false,
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
	));
	$wp_customize->add_control('online_food_delivery_slider_hide_show',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider','online-food-delivery'),
	   'description' => __('Image size (1080px x 600px)','online-food-delivery'),
	   'section' => 'online_food_delivery_slidersettings',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'online_food_delivery_slider_page' . $count, array(
			'default'  => '',
			'sanitize_callback' => 'online_food_delivery_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'online_food_delivery_slider_page' . $count, array(
			'label' => __( 'Select Slide Image Page', 'online-food-delivery' ),
			'section' => 'online_food_delivery_slidersettings',
			'type'    => 'dropdown-pages'
		) );
	}

    $wp_customize->add_setting('online_food_delivery_slider_title',array(
       'default' => 'true',
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
	));
	
	$wp_customize->add_control('online_food_delivery_slider_title',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider Title','online-food-delivery'),
	   'section' => 'online_food_delivery_slidersettings',
	));

	$wp_customize->add_setting('online_food_delivery_slider_content',array(
       'default' => 'true',
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
	));
	$wp_customize->add_control('online_food_delivery_slider_content',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider Content','online-food-delivery'),
	   'section' => 'online_food_delivery_slidersettings',
	));

	//content layout
	$wp_customize->add_setting('online_food_delivery_slider_content_alignment',array(
    	'default' => 'Left',
        'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control('online_food_delivery_slider_content_alignment',array(
        'type' => 'radio',
        'label' => __('Slider Content Alignment','online-food-delivery'),
        'section' => 'online_food_delivery_slidersettings',
        'choices' => array(
            'Center' => __('Center','online-food-delivery'),
            'Left' => __('Left','online-food-delivery'),
            'Right' => __('Right','online-food-delivery'),
        ),
	) );

	//Slider excerpt
	$wp_customize->add_setting( 'online_food_delivery_slider_excerpt_length', array(
		'default'              => 20,
		'sanitize_callback'    => 'online_food_delivery_sanitize_float',
	) );
	$wp_customize->add_control( 'online_food_delivery_slider_excerpt_length', array(
		'label'       => esc_html__( 'Slider Excerpt length','online-food-delivery' ),
		'section'     => 'online_food_delivery_slidersettings',
		'type'        => 'number',
		'settings'    => 'online_food_delivery_slider_excerpt_length',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'online_food_delivery_slider_height', array(
		'default'          => '',
		'sanitize_callback'	=> 'online_food_delivery_sanitize_float'
	) );
	$wp_customize->add_control( 'online_food_delivery_slider_height', array(
		'label' => esc_html__( 'Slider Height','online-food-delivery' ),
		'section' => 'online_food_delivery_slidersettings',
		'type'    => 'number',
		'description' => __('Measurement is in pixel.','online-food-delivery'),
		'input_attrs' => array(
			'step' => 1,
			'min'  => 500,
			'max'  => 1000,
		),
	) );

	//Food Category Section
	$wp_customize->add_section('online_food_delivery_food_category_section',array(
		'title'	=> __('Food Category Section','online-food-delivery'),
		'panel' => 'online_food_delivery_panel_id',
	));

	$wp_customize->add_setting('online_food_delivery_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('online_food_delivery_section_title',array(
		'label'	=> esc_html__('Section Title','online-food-delivery'),
		'section'=> 'online_food_delivery_food_category_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('online_food_delivery_section_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('online_food_delivery_section_text',array(
		'label'	=> esc_html__('Section Text','online-food-delivery'),
		'section'=> 'online_food_delivery_food_category_section',
		'type'=> 'text'
	));

	$args = array(
       'type'             => 'product',
        'child_of'        => 0,
        'parent'          => '',
        'orderby'         => 'term_group',
        'order'           => 'ASC',
        'hide_empty'      => false,
        'hierarchical'    => 1,
        'number'          => '',
        'taxonomy'        => 'product_cat',
        'pad_counts'      => false
    );
	$categories = get_categories($args);
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('online_food_delivery_product_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'online_food_delivery_sanitize_choices',
	));	
	$wp_customize->add_control('online_food_delivery_product_category',array(
		'type'    => 'select',
		'choices' => $cat_post,		
		'label' => __('Select Category to display products','online-food-delivery'),
		'section' => 'online_food_delivery_food_category_section',
	));

	//Blog Post
	$wp_customize->add_section('online_food_delivery_blog_post',array(
		'title'	=> __('Post Settings','online-food-delivery'),
		'panel' => 'online_food_delivery_panel_id',
	));	

	$wp_customize->add_setting('online_food_delivery_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Date','online-food-delivery'),
       'section' => 'online_food_delivery_blog_post'
    ));

    $wp_customize->add_setting('online_food_delivery_author_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Author','online-food-delivery'),
       'section' => 'online_food_delivery_blog_post'
    ));

    $wp_customize->add_setting('online_food_delivery_comment_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Comments','online-food-delivery'),
       'section' => 'online_food_delivery_blog_post'
    ));

    $wp_customize->add_setting('online_food_delivery_time_hide',array(
       'default' => false,
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_time_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Time','online-food-delivery'),
       'section' => 'online_food_delivery_blog_post'
    ));

    $wp_customize->add_setting('online_food_delivery_feature_image_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_feature_image_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Featured Image','online-food-delivery'),
       'section' => 'online_food_delivery_blog_post'
    ));

    $wp_customize->add_setting( 'online_food_delivery_featured_image_border_radius', array(
		'default' => '',
		'sanitize_callback'	=> 'online_food_delivery_sanitize_float'
	) );
	$wp_customize->add_control( 'online_food_delivery_featured_image_border_radius', array(
		'label' => __( 'Featured image border radius','online-food-delivery' ),
		'section' => 'online_food_delivery_blog_post',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 50,
		),
	) );

    $wp_customize->add_setting( 'online_food_delivery_featured_image_box_shadow', array(
		'default' => 0,
		'sanitize_callback'	=> 'online_food_delivery_sanitize_float'
	) );
	$wp_customize->add_control( 'online_food_delivery_featured_image_box_shadow', array(
		'label' => __( 'Featured image box shadow','online-food-delivery' ),
		'section' => 'online_food_delivery_blog_post',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 50,
		),
	) );

	$wp_customize->add_setting('online_food_delivery_metabox_seperator',array(
       'default' => '|',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('online_food_delivery_metabox_seperator',array(
       'type' => 'text',
       'label' => __('Metabox Seperator','online-food-delivery'),
       'description' => __('Ex: "/", "|", "-", ...','online-food-delivery'),
       'section' => 'online_food_delivery_blog_post'
    ));

    $wp_customize->add_setting('online_food_delivery_post_content',array(
    	'default' => 'Excerpt Content',
        'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control('online_food_delivery_post_content',array(
        'type' => 'radio',
        'label' => __('Post Content Type','online-food-delivery'),
        'section' => 'online_food_delivery_blog_post',
        'choices' => array(
            'No Content' => __('No Content','online-food-delivery'),
            'Full Content' => __('Full Content','online-food-delivery'),
            'Excerpt Content' => __('Excerpt Content','online-food-delivery'),
        ),
	) );

    $wp_customize->add_setting( 'online_food_delivery_post_excerpt_length', array(
		'default'              => 20,
		'sanitize_callback'	=> 'online_food_delivery_sanitize_float'
	) );
	$wp_customize->add_control( 'online_food_delivery_post_excerpt_length', array(
		'label' => esc_html__( 'Post Excerpt Length','online-food-delivery' ),
		'section'  => 'online_food_delivery_blog_post',
		'type'  => 'number',
		'settings' => 'online_food_delivery_post_excerpt_length',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'online_food_delivery_button_excerpt_suffix', array(
		'default'   => __('[...]','online-food-delivery' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'online_food_delivery_button_excerpt_suffix', array(
		'label'       => esc_html__( 'Excerpt Suffix','online-food-delivery' ),
		'section'     => 'online_food_delivery_blog_post',
		'type'        => 'text',
		'settings' => 'online_food_delivery_button_excerpt_suffix'
	) );

	$wp_customize->add_setting( 'online_food_delivery_post_button_text', array(
		'default'   => esc_html__('Read More','online-food-delivery' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'online_food_delivery_post_button_text', array(
		'label' => esc_html__('Post Button Text','online-food-delivery' ),
		'section'     => 'online_food_delivery_blog_post',
		'type'        => 'text',
		'settings'    => 'online_food_delivery_post_button_text'
	) );

	$wp_customize->add_setting('online_food_delivery_top_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'online_food_delivery_sanitize_float'
	));
	$wp_customize->add_control('online_food_delivery_top_button_padding',array(
		'label'	=> __('Top Bottom Button Padding','online-food-delivery'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'online_food_delivery_blog_post',
		'type'=> 'number',
	));

	$wp_customize->add_setting('online_food_delivery_left_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'online_food_delivery_sanitize_float'
	));
	$wp_customize->add_control('online_food_delivery_left_button_padding',array(
		'label'	=> __('Left Right Button Padding','online-food-delivery'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'online_food_delivery_blog_post',
		'type'=> 'number',
	));

	$wp_customize->add_setting( 'online_food_delivery_button_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'online_food_delivery_sanitize_float'
	) );
	$wp_customize->add_control('online_food_delivery_button_border_radius', array(
        'label'  => __('Button Border Radius','online-food-delivery'),
        'type'=> 'number',
        'section'  => 'online_food_delivery_blog_post',
        'input_attrs' => array(
        	'step' => 1,
            'min' => 0,
            'max' => 50,
        ),
    ));

    $wp_customize->add_setting( 'online_food_delivery_post_blocks', array(
        'default'			=> 'Without box',
        'sanitize_callback'	=> 'online_food_delivery_sanitize_choices'
    ));
    $wp_customize->add_control( 'online_food_delivery_post_blocks', array(
        'section' => 'online_food_delivery_blog_post',
        'type' => 'select',
        'label' => __( 'Post blocks', 'online-food-delivery' ),
        'choices' => array(
            'Within box'  => __( 'Within box', 'online-food-delivery' ),
            'Without box' => __( 'Without box', 'online-food-delivery' ),
    )));

    $wp_customize->add_setting('online_food_delivery_navigation_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_navigation_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Navigation','online-food-delivery'),
       'section' => 'online_food_delivery_blog_post'
    ));

    $wp_customize->add_setting( 'online_food_delivery_post_navigation_type', array(
        'default'			=> 'numbers',
        'sanitize_callback'	=> 'online_food_delivery_sanitize_choices'
    ));
    $wp_customize->add_control( 'online_food_delivery_post_navigation_type', array(
        'section' => 'online_food_delivery_blog_post',
        'type' => 'select',
        'label' => __( 'Post Navigation Type', 'online-food-delivery' ),
        'choices' => array(
            'numbers'  => __( 'Number', 'online-food-delivery' ),
            'next-prev' => __( 'Next/Prev Button', 'online-food-delivery' ),
    )));

    $wp_customize->add_setting( 'online_food_delivery_post_navigation_position', array(
        'default'			=> 'bottom',
        'sanitize_callback'	=> 'online_food_delivery_sanitize_choices'
    ));
    $wp_customize->add_control( 'online_food_delivery_post_navigation_position', array(
        'section' => 'online_food_delivery_blog_post',
        'type' => 'select',
        'label' => __( 'Post Navigation Position', 'online-food-delivery' ),
        'choices' => array(
            'top'  => __( 'Top', 'online-food-delivery' ),
            'bottom' => __( 'Bottom', 'online-food-delivery' ),
            'both' => __( 'Both', 'online-food-delivery' ),
    )));

    //Single Post Settings
	$wp_customize->add_section('online_food_delivery_single_post',array(
		'title'	=> __('Single Post Settings','online-food-delivery'),
		'panel' => 'online_food_delivery_panel_id',
	));	

	$wp_customize->add_setting( 'online_food_delivery_single_post_breadcrumb',array(
		'default' => true,
		'transport' => 'refresh',
      	'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ) );
    $wp_customize->add_control('online_food_delivery_single_post_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Post Breadcrumb','online-food-delivery' ),
        'section' => 'online_food_delivery_single_post'
    ));	

	$wp_customize->add_setting('online_food_delivery_single_post_date',array(
       'default' => 'true',
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Date','online-food-delivery'),
       'section' => 'online_food_delivery_single_post'
    ));

    $wp_customize->add_setting('online_food_delivery_single_post_author',array(
       'default' => 'true',
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Author','online-food-delivery'),
       'section' => 'online_food_delivery_single_post'
    ));

    $wp_customize->add_setting('online_food_delivery_single_post_comment_no',array(
       'default' => 'true',
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_single_post_comment_no',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Comment Number','online-food-delivery'),
       'section' => 'online_food_delivery_single_post'
    ));

    $wp_customize->add_setting('online_food_delivery_single_post_time',array(
       'default' => 'true',
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Time','online-food-delivery'),
       'section' => 'online_food_delivery_single_post'
    ));

    $wp_customize->add_setting('online_food_delivery_feature_image',array(
       'default' => true,
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_feature_image',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Feature Image','online-food-delivery'),
       'section' => 'online_food_delivery_single_post'
    ));

     $wp_customize->add_setting( 'online_food_delivery_single_post_img_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'online_food_delivery_sanitize_float',
	) );
	$wp_customize->add_control( 'online_food_delivery_single_post_img_border_radius', array(
		'label'       => esc_html__( 'Single Post Image Border Radius','online-food-delivery' ),
		'section'     => 'online_food_delivery_single_post',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting( 'online_food_delivery_single_post_img_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'online_food_delivery_sanitize_float',
	));
	$wp_customize->add_control('online_food_delivery_single_post_img_box_shadow',array(
		'label' => esc_html__( 'Single Post Image Shadow','online-food-delivery' ),
		'section' => 'online_food_delivery_single_post',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number'
	));

	$wp_customize->add_setting('online_food_delivery_single_post_metabox_seperator',array(
       'default' => '|',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('online_food_delivery_single_post_metabox_seperator',array(
       'type' => 'text',
       'label' => __('Metabox Seperator','online-food-delivery'),
       'description' => __('Ex: "/", "|", "-", ...','online-food-delivery'),
       'section' => 'online_food_delivery_single_post'
    ));

	 $wp_customize->add_setting('online_food_delivery_show_hide_single_post_categories',array(
		'default' => true,
		'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
 	));
 	$wp_customize->add_control('online_food_delivery_show_hide_single_post_categories',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Categories','online-food-delivery'),
		'section' => 'online_food_delivery_single_post'
	));

	$wp_customize->add_setting('online_food_delivery_category_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_food_delivery_category_color', array(
		'label'    => __('Category Color', 'online-food-delivery'),
		'section'  => 'online_food_delivery_single_post',
	)));

	$wp_customize->add_setting('online_food_delivery_category_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_food_delivery_category_background_color', array(
		'label'    => __('Category Background Color', 'online-food-delivery'),
		'section'  => 'online_food_delivery_single_post',
	)));

    $wp_customize->add_setting('online_food_delivery_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Tags','online-food-delivery'),
       'section' => 'online_food_delivery_single_post'
    ));

    $wp_customize->add_setting('online_food_delivery_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_comment',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Comment','online-food-delivery'),
       'section' => 'online_food_delivery_single_post'
    ));	

    $wp_customize->add_setting( 'online_food_delivery_comment_width', array(
		'default' => 100,
		'sanitize_callback'	=> 'online_food_delivery_sanitize_float'
	) );
	$wp_customize->add_control( 'online_food_delivery_comment_width', array(
		'label' => __( 'Comment Textarea Width', 'online-food-delivery'),
		'section' => 'online_food_delivery_single_post',
		'type' => 'number',
		'settings' => 'online_food_delivery_comment_width',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

    $wp_customize->add_setting('online_food_delivery_comment_title',array(
       'default' => __('Leave a Reply','online-food-delivery'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('online_food_delivery_comment_title',array(
       'type' => 'text',
       'label' => __('Comment form Title','online-food-delivery'),
       'section' => 'online_food_delivery_single_post'
    ));

    $wp_customize->add_setting('online_food_delivery_comment_submit_text',array(
       'default' => __('Post Comment','online-food-delivery'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('online_food_delivery_comment_submit_text',array(
       'type' => 'text',
       'label' => __('Comment Button Text','online-food-delivery'),
       'section' => 'online_food_delivery_single_post'
    ));

    $wp_customize->add_setting('online_food_delivery_nav_links',array(
       'default' => true,
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_nav_links',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Nav Links','online-food-delivery'),
       'section' => 'online_food_delivery_single_post'
    ));

    $wp_customize->add_setting('online_food_delivery_prev_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('online_food_delivery_prev_text',array(
       'type' => 'text',
       'label' => __('Previous Navigation Text','online-food-delivery'),
       'section' => 'online_food_delivery_single_post'
    ));

    $wp_customize->add_setting('online_food_delivery_next_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('online_food_delivery_next_text',array(
       'type' => 'text',
       'label' => __('Next Navigation Text','online-food-delivery'),
       'section' => 'online_food_delivery_single_post'
    ));

    $wp_customize->add_setting('online_food_delivery_related_posts',array(
       'default' => true,
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_related_posts',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related Posts','online-food-delivery'),
       'section' => 'online_food_delivery_single_post'
    ));

    $wp_customize->add_setting('online_food_delivery_related_posts_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('online_food_delivery_related_posts_title',array(
       'type' => 'text',
       'label' => __('Related Posts Title','online-food-delivery'),
       'section' => 'online_food_delivery_single_post'
    ));

    $wp_customize->add_setting( 'online_food_delivery_related_post_count', array(
		'default' => 3,
		'sanitize_callback'	=> 'online_food_delivery_sanitize_float'
	) );
	$wp_customize->add_control( 'online_food_delivery_related_post_count', array(
		'label' => esc_html__( 'Related Posts Count','online-food-delivery' ),
		'section' => 'online_food_delivery_single_post',
		'type' => 'number',
		'settings' => 'online_food_delivery_related_post_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

    $wp_customize->add_setting( 'online_food_delivery_post_order', array(
        'default' => 'categories',
        'sanitize_callback'	=> 'online_food_delivery_sanitize_choices'
    ));
    $wp_customize->add_control( 'online_food_delivery_post_order', array(
        'section' => 'online_food_delivery_single_post',
        'type' => 'radio',
        'label' => __( 'Related Posts Order By', 'online-food-delivery' ),
        'choices' => array(
            'categories' => __('Categories', 'online-food-delivery'),
            'tags' => __( 'Tags', 'online-food-delivery' ),
    )));

    //404 page settings
	$wp_customize->add_section('online_food_delivery_404_page',array(
		'title'	=> __('404 & No Result Page Settings','online-food-delivery'),
		'priority'	=> null,
		'panel' => 'online_food_delivery_panel_id',
	));

	$wp_customize->add_setting('online_food_delivery_404_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('online_food_delivery_404_title',array(
       'type' => 'text',
       'label' => __('404 Page Title','online-food-delivery'),
       'section' => 'online_food_delivery_404_page'
    ));

    $wp_customize->add_setting('online_food_delivery_404_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('online_food_delivery_404_text',array(
       'type' => 'text',
       'label' => __('404 Page Text','online-food-delivery'),
       'section' => 'online_food_delivery_404_page'
    ));

    $wp_customize->add_setting('online_food_delivery_404_button_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('online_food_delivery_404_button_text',array(
       'type' => 'text',
       'label' => __('404 Page Button Text','online-food-delivery'),
       'section' => 'online_food_delivery_404_page'
    ));

    $wp_customize->add_setting('online_food_delivery_no_result_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('online_food_delivery_no_result_title',array(
       'type' => 'text',
       'label' => __('No Result Page Title','online-food-delivery'),
       'section' => 'online_food_delivery_404_page'
    ));

    $wp_customize->add_setting('online_food_delivery_no_result_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('online_food_delivery_no_result_text',array(
       'type' => 'text',
       'label' => __('No Result Page Text','online-food-delivery'),
       'section' => 'online_food_delivery_404_page'
    ));

    $wp_customize->add_setting('online_food_delivery_show_search_form',array(
        'default' => true,
        'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
	));
	$wp_customize->add_control('online_food_delivery_show_search_form',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Search Form','online-food-delivery'),
      	'section' => 'online_food_delivery_404_page',
	));

	//Footer
	$wp_customize->add_section('online_food_delivery_footer_section',array(
		'title'	=> __('Footer Section','online-food-delivery'),
		'priority'	=> null,
		'panel' => 'online_food_delivery_panel_id',
	));

	$wp_customize->selective_refresh->add_partial(
		'online_food_delivery_show_back_to_top',
		array(
			'selector'        => '.scrollup',
			'render_callback' => 'online_food_delivery_customize_partial_online_food_delivery_show_back_to_top',
		)
	);

	$wp_customize->add_setting('online_food_delivery_show_back_to_top',array(
        'default' => 'true',
        'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
	));
	$wp_customize->add_control('online_food_delivery_show_back_to_top',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Back to Top Button','online-food-delivery'),
      	'section' => 'online_food_delivery_footer_section',
	));

	$wp_customize->add_setting('online_food_delivery_back_to_top_icon',array(
		'default'	=> 'fas fa-arrow-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Online_Food_Delivery_Icon_Changer(
        $wp_customize, 'online_food_delivery_back_to_top_icon',array(
		'label'	=> __('Back to Top Icon','online-food-delivery'),
		'section'	=> 'online_food_delivery_footer_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('online_food_delivery_scroll_icon_font_size',array(
		'default'=> 18,
		'sanitize_callback' => 'online_food_delivery_sanitize_float'
	));
	$wp_customize->add_control('online_food_delivery_scroll_icon_font_size',array(
		'label'	=> __('Back To Top Icon Font Size','online-food-delivery'),
		'section'=> 'online_food_delivery_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	));

	$wp_customize->add_setting('online_food_delivery_scroll_icon_color', array(
		'default'           => '#ffab01',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_food_delivery_scroll_icon_color', array(
		'label'    => __('Back To Top Icon Color', 'online-food-delivery'),
		'section'  => 'online_food_delivery_footer_section',
	)));

	$wp_customize->add_setting('online_food_delivery_back_to_top_text',array(
		'default'	=> __('Back to Top','online-food-delivery'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('online_food_delivery_back_to_top_text',array(
		'label'	=> __('Back to Top Button Text','online-food-delivery'),
		'section'	=> 'online_food_delivery_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('online_food_delivery_back_to_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control('online_food_delivery_back_to_top_alignment',array(
        'type' => 'select',
        'label' => __('Back to Top Button Alignment','online-food-delivery'),
        'section' => 'online_food_delivery_footer_section',
        'choices' => array(
            'Left' => __('Left','online-food-delivery'),
            'Right' => __('Right','online-food-delivery'),
            'Center' => __('Center','online-food-delivery'),
        ),
	) );

	$wp_customize->add_setting( 'online_food_delivery_footer_hide_show',array(
      'default' => 'true',
      'sanitize_callback' => 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_footer_hide_show',array(
    	'type' => 'checkbox',
      'label' => esc_html__( 'Show / Hide Footer','online-food-delivery' ),
      'section' => 'online_food_delivery_footer_section'
    ));

	$wp_customize->add_setting('online_food_delivery_footer_background_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_food_delivery_footer_background_color', array(
		'label'    => __('Footer Background Color', 'online-food-delivery'),
		'section'  => 'online_food_delivery_footer_section',
	)));

	$wp_customize->add_setting('online_food_delivery_footer_background_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'online_food_delivery_footer_background_img',array(
        'label' => __('Footer Background Image','online-food-delivery'),
        'section' => 'online_food_delivery_footer_section'
	)));

	$wp_customize->add_setting('online_food_delivery_footer_widget_layout',array(
        'default'           => '4',
        'sanitize_callback' => 'online_food_delivery_sanitize_choices',
    ));
    $wp_customize->add_control('online_food_delivery_footer_widget_layout',array(
        'type' => 'radio',
        'label'  => __('Footer widget layout', 'online-food-delivery'),
        'section'     => 'online_food_delivery_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'online-food-delivery'),
        'choices' => array(
            '1'     => __('One', 'online-food-delivery'),
            '2'     => __('Two', 'online-food-delivery'),
            '3'     => __('Three', 'online-food-delivery'),
            '4'     => __('Four', 'online-food-delivery')
        ),
    ));

    $wp_customize->add_setting('online_food_delivery_footer_widgets_heading',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control('online_food_delivery_footer_widgets_heading',array(
    'type' => 'select',
    'label' => __('Footer Widget Heading Alignment','online-food-delivery'),
    'section' => 'online_food_delivery_footer_section',
    'choices' => array(
    	'Left' => __('Left','online-food-delivery'),
        'Center' => __('Center','online-food-delivery'),
        'Right' => __('Right','online-food-delivery')
      ),
	) );

	$wp_customize->add_setting('online_food_delivery_footer_widgets_content',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control('online_food_delivery_footer_widgets_content',array(
    'type' => 'select',
    'label' => __('Footer Widget Content Alignment','online-food-delivery'),
    'section' => 'online_food_delivery_footer_section',
    'choices' => array(
    	'Left' => __('Left','online-food-delivery'),
        'Center' => __('Center','online-food-delivery'),
        'Right' => __('Right','online-food-delivery')
        ),
	) );

    $wp_customize->add_setting( 'online_food_delivery_copyright_hide_show',array(
      'default' => 'true',
      'sanitize_callback' => 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_copyright_hide_show',array(
    	'type' => 'checkbox',
      'label' => esc_html__( 'Show / Hide Copyright','online-food-delivery' ),
      'section' => 'online_food_delivery_footer_section'
    ));

    $wp_customize->add_setting('online_food_delivery_copyright_alignment',array(
        'default' => 'Center',
        'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control('online_food_delivery_copyright_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Alignment','online-food-delivery'),
        'section' => 'online_food_delivery_footer_section',
        'choices' => array(
            'Left' => __('Left','online-food-delivery'),
            'Right' => __('Right','online-food-delivery'),
            'Center' => __('Center','online-food-delivery'),
        ),
	) );

	$wp_customize->add_setting('online_food_delivery_copyright_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_food_delivery_copyright_color', array(
		'label'    => __('Copyright Color', 'online-food-delivery'),
		'section'  => 'online_food_delivery_footer_section',
	)));

	$wp_customize->add_setting('online_food_delivery_copyright__hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_food_delivery_copyright__hover_color', array(
		'label'    => __('Copyright Hover Color', 'online-food-delivery'),
		'section'  => 'online_food_delivery_footer_section',
	)));

	$wp_customize->add_setting('online_food_delivery_copyright_background_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_food_delivery_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'online-food-delivery'),
		'section'  => 'online_food_delivery_footer_section',
	)));

	$wp_customize->add_setting('online_food_delivery_copyright_fontsize',array(
		'default'	=> 16,
		'sanitize_callback'	=> 'online_food_delivery_sanitize_float',
	));	
	$wp_customize->add_control('online_food_delivery_copyright_fontsize',array(
		'label'	=> __('Copyright Font Size','online-food-delivery'),
		'section'	=> 'online_food_delivery_footer_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('online_food_delivery_copyright_top_bottom_padding',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'online_food_delivery_sanitize_float',
	));	
	$wp_customize->add_control('online_food_delivery_copyright_top_bottom_padding',array(
		'label'	=> __('Copyright Top Bottom Padding','online-food-delivery'),
		'section'	=> 'online_food_delivery_footer_section',
		'type'		=> 'number'
	));

    $wp_customize->selective_refresh->add_partial(
		'online_food_delivery_footer_copy',
		array(
			'selector'        => '#footer p',
			'render_callback' => 'online_food_delivery_customize_partial_online_food_delivery_footer_copy',
		)
	);
	
	$wp_customize->add_setting('online_food_delivery_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('online_food_delivery_footer_copy',array(
		'label'	=> __('Copyright Text','online-food-delivery'),
		'section'	=> 'online_food_delivery_footer_section',
		'type'		=> 'text'
	));

	//Mobile Media Section
	$wp_customize->add_section( 'online_food_delivery_mobile_media_options' , array(
    	'title'      => __( 'Mobile Media Options', 'online-food-delivery' ),
		'priority'   => null,
		'panel' => 'online_food_delivery_panel_id'
	) );

	$wp_customize->add_setting('online_food_delivery_responsive_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Online_Food_Delivery_Icon_Changer(
        $wp_customize, 'online_food_delivery_responsive_open_menu_icon',array(
		'label'	=> __('Open Menu Icon','online-food-delivery'),
		'section'	=> 'online_food_delivery_mobile_media_options',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('online_food_delivery_responsive_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Online_Food_Delivery_Icon_Changer(
        $wp_customize, 'online_food_delivery_responsive_close_menu_icon',array(
		'label'	=> __('Close Menu Icon','online-food-delivery'),
		'section'	=> 'online_food_delivery_mobile_media_options',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('online_food_delivery_responsive_sticky_header',array(
        'default' => false,
        'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
	));
	$wp_customize->add_control('online_food_delivery_responsive_sticky_header',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Sticky Header','online-food-delivery'),
      	'section' => 'online_food_delivery_mobile_media_options',
	));

	$wp_customize->add_setting('online_food_delivery_slider_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
	));
	$wp_customize->add_control('online_food_delivery_slider_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider','online-food-delivery'),
      	'section' => 'online_food_delivery_mobile_media_options',
	));

    $wp_customize->add_setting('online_food_delivery_responsive_show_back_to_top',array(
        'default' => true,
        'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
	));
	$wp_customize->add_control('online_food_delivery_responsive_show_back_to_top',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Back to Top Button','online-food-delivery'),
      	'section' => 'online_food_delivery_mobile_media_options',
	));

	$wp_customize->add_setting( 'online_food_delivery_responsive_preloader_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ) );
    $wp_customize->add_control('online_food_delivery_responsive_preloader_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Preloader','online-food-delivery' ),
        'section' => 'online_food_delivery_mobile_media_options'
    ));

     $wp_customize->add_setting( 'online_food_delivery_sidebar_hide_show',array(
      'default' => true,
      'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_sidebar_hide_show',array(
      'type' => 'checkbox',
      'label' => esc_html__( 'Enable Sidebar','online-food-delivery' ),
      'section' => 'online_food_delivery_mobile_media_options'
    ));

	//Woocommerce Section
	$wp_customize->add_section( 'online_food_delivery_woocommerce_options' , array(
    	'title'      => __( 'Additional WooCommerce Options', 'online-food-delivery' ),
		'priority'   => null,
		'panel' => 'online_food_delivery_panel_id'
	) );

	// Product Columns
	$wp_customize->add_setting( 'online_food_delivery_products_per_row' , array(
		'default'           => '3',
		'sanitize_callback' => 'online_food_delivery_sanitize_choices',
	) );

	$wp_customize->add_control('online_food_delivery_products_per_row', array(
		'label' => __( 'Product per row', 'online-food-delivery' ),
		'section'  => 'online_food_delivery_woocommerce_options',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
		),
	) );

	$wp_customize->add_setting('online_food_delivery_product_per_page',array(
		'default'	=> '9',
		'sanitize_callback'	=> 'online_food_delivery_sanitize_float'
	));	
	$wp_customize->add_control('online_food_delivery_product_per_page',array(
		'label'	=> __('Product per page','online-food-delivery'),
		'section'	=> 'online_food_delivery_woocommerce_options',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('online_food_delivery_shop_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_shop_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Shop page sidebar','online-food-delivery'),
       'section' => 'online_food_delivery_woocommerce_options',
    ));

    // shop page sidebar alignment
    $wp_customize->add_setting('online_food_delivery_shop_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'online_food_delivery_sanitize_choices',
	));
	$wp_customize->add_control('online_food_delivery_shop_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Shop Page layout', 'online-food-delivery'),
		'section'        => 'online_food_delivery_woocommerce_options',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'online-food-delivery'),
			'Right Sidebar' => __('Right Sidebar', 'online-food-delivery'),
		),
	));

	$wp_customize->add_setting( 'online_food_delivery_wocommerce_single_page_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ) );
    $wp_customize->add_control('online_food_delivery_wocommerce_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Enable / Disable Single Product Page Sidebar','online-food-delivery'),
		'section' => 'online_food_delivery_woocommerce_options'
    ));

    // single product page sidebar alignment
    $wp_customize->add_setting('online_food_delivery_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'online_food_delivery_sanitize_choices',
	));
	$wp_customize->add_control('online_food_delivery_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single product Page layout', 'online-food-delivery'),
		'section'        => 'online_food_delivery_woocommerce_options',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'online-food-delivery'),
			'Right Sidebar' => __('Right Sidebar', 'online-food-delivery'),
		),
	));

	$wp_customize->add_setting('online_food_delivery_shop_page_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_shop_page_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Shop page pagination','online-food-delivery'),
       'section' => 'online_food_delivery_woocommerce_options',
    ));

    $wp_customize->add_setting('online_food_delivery_product_page_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_product_page_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Product page sidebar','online-food-delivery'),
       'section' => 'online_food_delivery_woocommerce_options',
    ));

    $wp_customize->add_setting('online_food_delivery_related_product',array(
       'default' => true,
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_related_product',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','online-food-delivery'),
       'section' => 'online_food_delivery_woocommerce_options',
    ));

	$wp_customize->add_setting( 'online_food_delivery_woocommerce_button_padding_top',array(
		'default' => 10,
		'sanitize_callback' => 'online_food_delivery_sanitize_float'
	));
	$wp_customize->add_control( 'online_food_delivery_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding','online-food-delivery' ),
		'type' => 'number',
		'section' => 'online_food_delivery_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'online_food_delivery_woocommerce_button_padding_right',array(
	 	'default' => 20,
	 	'sanitize_callback' => 'online_food_delivery_sanitize_float'
	));
	$wp_customize->add_control('online_food_delivery_woocommerce_button_padding_right',	array(
	 	'label' => esc_html__( 'Button Right Left Padding','online-food-delivery' ),
		'type' => 'number',
		'section' => 'online_food_delivery_woocommerce_options',
	 	'input_attrs' => array(
			'min' => 0,
			'max' => 50,
	 		'step' => 1,
		),
	));

	$wp_customize->add_setting( 'online_food_delivery_woocommerce_button_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'online_food_delivery_sanitize_float'
	));
	$wp_customize->add_control('online_food_delivery_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius','online-food-delivery' ),
		'type' => 'number',
		'section' => 'online_food_delivery_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

    $wp_customize->add_setting('online_food_delivery_woocommerce_product_border',array(
       'default' => false,
       'sanitize_callback'	=> 'online_food_delivery_sanitize_checkbox'
    ));
    $wp_customize->add_control('online_food_delivery_woocommerce_product_border',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product border','online-food-delivery'),
       'section' => 'online_food_delivery_woocommerce_options',
    ));

	$wp_customize->add_setting( 'online_food_delivery_woocommerce_product_padding_top',array(
		'default' => 0,
		'sanitize_callback' => 'online_food_delivery_sanitize_float'
	));
	$wp_customize->add_control('online_food_delivery_woocommerce_product_padding_top', array(
		'label' => esc_html__( 'Product Top Bottom Padding','online-food-delivery' ),
		'type' => 'number',
		'section' => 'online_food_delivery_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'online_food_delivery_woocommerce_product_padding_right',array(
		'default' => 0,
		'sanitize_callback' => 'online_food_delivery_sanitize_float'
	));
	$wp_customize->add_control('online_food_delivery_woocommerce_product_padding_right', array(
		'label' => esc_html__( 'Product Right Left Padding','online-food-delivery' ),
		'type' => 'number',
		'section' => 'online_food_delivery_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'online_food_delivery_woocommerce_product_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'online_food_delivery_sanitize_float'
	));
	$wp_customize->add_control('online_food_delivery_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','online-food-delivery' ),
		'type' => 'number',
		'section' => 'online_food_delivery_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'online_food_delivery_woocommerce_product_box_shadow',array(
		'default' => 0,
		'sanitize_callback' => 'online_food_delivery_sanitize_float'
	));
	$wp_customize->add_control( 'online_food_delivery_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow','online-food-delivery' ),
		'type' => 'number',
		'section' => 'online_food_delivery_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('online_food_delivery_sale_position',array(
        'default' => 'left',
        'sanitize_callback' => 'online_food_delivery_sanitize_choices'
	));
	$wp_customize->add_control('online_food_delivery_sale_position',array(
        'type' => 'select',
        'label' => __('Sale badge Position','online-food-delivery'),
        'section' => 'online_food_delivery_woocommerce_options',
        'choices' => array(
            'left' => __('Left','online-food-delivery'),
            'right' => __('Right','online-food-delivery'),
        ),
	) );

	$wp_customize->add_setting( 'online_food_delivery_woocommerce_sale_top_padding',array(
		'default' => 5,
		'sanitize_callback' => 'online_food_delivery_sanitize_float'
	));
	$wp_customize->add_control( 'online_food_delivery_woocommerce_sale_top_padding',	array(
		'label' => esc_html__( 'Sale Top Bottom Padding','online-food-delivery' ),
		'type' => 'number',
		'section' => 'online_food_delivery_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'online_food_delivery_woocommerce_sale_left_padding',array(
	 	'default' => 8,
	 	'sanitize_callback' => 'online_food_delivery_sanitize_float'
	));
	$wp_customize->add_control('online_food_delivery_woocommerce_sale_left_padding',	array(
	 	'label' => esc_html__( 'Sale Right Left Padding','online-food-delivery' ),
		'type' => 'number',
		'section' => 'online_food_delivery_woocommerce_options',
	 	'input_attrs' => array(
			'min' => 0,
			'max' => 50,
	 		'step' => 1,
		),
	));

	$wp_customize->add_setting( 'online_food_delivery_woocommerce_sale_border_radius',array(
		'default' => 5,
		'sanitize_callback' => 'online_food_delivery_sanitize_float'
	));
	$wp_customize->add_control('online_food_delivery_woocommerce_sale_border_radius',array(
		'label' => esc_html__( 'Sale Border Radius','online-food-delivery' ),
		'type' => 'number',
		'section' => 'online_food_delivery_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'online_food_delivery_product_sale_font_size',array(
		'default' => '',
		'sanitize_callback' => 'online_food_delivery_sanitize_float'
	));
	$wp_customize->add_control('online_food_delivery_product_sale_font_size',array(
		'label' => esc_html__( 'Sale Font Size','online-food-delivery' ),
		'type' => 'number',
		'section' => 'online_food_delivery_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));
}
add_action( 'customize_register', 'online_food_delivery_customize_register' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-width.php' );


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Online_Food_Delivery_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );
		
		// Register custom section types.
		$manager->register_section_type( 'Online_Food_Delivery_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Online_Food_Delivery_Customize_Section_Pro(
				$manager,
				'online_food_delivery_example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Online Food Delivery Pro', 'online-food-delivery' ),
					'pro_text' => esc_html__( 'Go Pro','online-food-delivery' ),
					'pro_url'  => esc_url( 'https://www.themescaliber.com/themes/food-ordering-wordpress-theme/' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'online-food-delivery-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'online-food-delivery-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Online_Food_Delivery_Customize::get_instance();