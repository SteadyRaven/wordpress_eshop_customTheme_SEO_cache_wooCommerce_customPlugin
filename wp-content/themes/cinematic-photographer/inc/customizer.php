<?php
/**
 * Cinematic Photographer: Customizer
 *
 * @package Cinematic Photographer
 * @subpackage cinematic_photographer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cinematic_photographer_customize_register( $wp_customize ) {

	require get_parent_theme_file_path('/inc/range-slider-control.php');

	// Register the custom control type.
		$wp_customize->register_control_type( 'Cinematic_Photographer_Toggle_Control' );

	//add home page setting pannel
	$wp_customize->add_panel( 'cinematic_photographer_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home Page', 'cinematic-photographer' ),
	    'description' => __( 'Description of what this panel does.', 'cinematic-photographer' ),
	) );



	//TP General Option
	$wp_customize->add_section('cinematic_photographer_tp_general_settings',array(
        'title' => __('TP General Option', 'cinematic-photographer'),
        'panel' => 'cinematic_photographer_panel_id',
        'priority' => 1,
    ) );

		$wp_customize->add_setting('cinematic_photographer_tp_body_layout_settings',array(
		'default' => 'Full',
		'sanitize_callback' => 'cinematic_photographer_sanitize_choices'
	));
 	$wp_customize->add_control('cinematic_photographer_tp_body_layout_settings',array(
		'type' => 'radio',
		'label'     => __('Body Layout Setting', 'cinematic-photographer'),
		'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'cinematic-photographer'),
		'section' => 'cinematic_photographer_tp_general_settings',
		'choices' => array(
		'Full' => __('Full','cinematic-photographer'),
		'Container' => __('Container','cinematic-photographer'),
		'Container Fluid' => __('Container Fluid','cinematic-photographer')
		),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('cinematic_photographer_sidebar_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'cinematic_photographer_sanitize_choices'
	));
	$wp_customize->add_control('cinematic_photographer_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Position', 'cinematic-photographer'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'cinematic-photographer'),
        'section' => 'cinematic_photographer_tp_general_settings',
        'choices' => array(
            'full' => __('Full','cinematic-photographer'),
            'left' => __('Left','cinematic-photographer'),
            'right' => __('Right','cinematic-photographer'),
            'three-column' => __('Three Columns','cinematic-photographer'),
            'four-column' => __('Four Columns','cinematic-photographer'),
            'grid' => __('Grid Layout','cinematic-photographer')
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('cinematic_photographer_sidebar_page_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'cinematic_photographer_sanitize_choices'
	));
	$wp_customize->add_control('cinematic_photographer_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'cinematic-photographer'),
        'description'   => __('This option work for pages.', 'cinematic-photographer'),
        'section' => 'cinematic_photographer_tp_general_settings',
        'choices' => array(
            'full' => __('Full','cinematic-photographer'),
            'left' => __('Left','cinematic-photographer'),
            'right' => __('Right','cinematic-photographer')
        ),
	) );
	$wp_customize->add_setting( 'cinematic_photographer_sticky', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cinematic_photographer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cinematic_Photographer_Toggle_Control( $wp_customize, 'cinematic_photographer_sticky', array(
		'label'       => esc_html__( 'Show Sticky Header', 'cinematic-photographer' ),
		'section'     => 'cinematic_photographer_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'cinematic_photographer_sticky',
	) ) );

	//Mobile Seetings
	$wp_customize->add_section('cinematic_photographer_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'cinematic-photographer'),
		'priority' => 10,
		'panel' => 'cinematic_photographer_panel_id'
	) );

	$wp_customize->add_setting( 'cinematic_photographer_return_to_header_mob', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cinematic_photographer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cinematic_Photographer_Toggle_Control( $wp_customize, 'cinematic_photographer_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'cinematic-photographer' ),
		'section'     => 'cinematic_photographer_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'cinematic_photographer_return_to_header_mob',
	) ) );

	$wp_customize->add_setting( 'cinematic_photographer_slider_buttom_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cinematic_photographer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cinematic_Photographer_Toggle_Control( $wp_customize, 'cinematic_photographer_slider_buttom_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'cinematic-photographer' ),
		'section'     => 'cinematic_photographer_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'cinematic_photographer_slider_buttom_mob',
	) ) );

		//MENU TYPOGRAPHY
	$wp_customize->add_section( 'cinematic_photographer_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'cinematic-photographer' ),
    	'priority' => 5,
		'panel' => 'cinematic_photographer_panel_id'
	) );

	$wp_customize->add_setting('cinematic_photographer_menu_text_tranform',array(
		'default' => 'Capitalize',
		'sanitize_callback' => 'cinematic_photographer_sanitize_choices'
 	));
 	$wp_customize->add_control('cinematic_photographer_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','cinematic-photographer'),
		'section' => 'cinematic_photographer_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','cinematic-photographer'),
		   'Lowercase' => __('Lowercase','cinematic-photographer'),
		   'Capitalize' => __('Capitalize','cinematic-photographer'),
		),
	) );


	$wp_customize->add_setting('cinematic_photographer_menu_font_size', array(
	'default' => 15,
    'sanitize_callback' => 'cinematic_photographer_sanitize_number_range',
	));

	$wp_customize->add_control(new Cinematic_Photographer_Range_Slider($wp_customize, 'cinematic_photographer_menu_font_size', array(
    'section' => 'cinematic_photographer_menu_typography',
    'label' => esc_html__('Font Size', 'cinematic-photographer'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 20,
        'step' => 1
    )
	)));


	//TP Color Option
	$wp_customize->add_section('cinematic_photographer_color_option',array(
        'title' => __('TP Color Option', 'cinematic-photographer'),
        'panel' => 'cinematic_photographer_panel_id',
        'priority' => 2,
    ) );

	$wp_customize->add_setting( 'cinematic_photographer_tp_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cinematic_photographer_tp_color_option', array(
	    'description' => __('It will change the complete theme color in one click.', 'cinematic-photographer'),
	    'section' => 'cinematic_photographer_color_option',
	    'settings' => 'cinematic_photographer_tp_color_option',
  	)));

  	//TP Preloader Option
	$wp_customize->add_section('cinematic_photographer_prealoader_option',array(
		'title' => __('TP Preloader Option', 'cinematic-photographer'),
		'panel' => 'cinematic_photographer_panel_id',
		'priority' => 3,
 	) );

	$wp_customize->add_setting( 'cinematic_photographer_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cinematic_photographer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cinematic_Photographer_Toggle_Control( $wp_customize, 'cinematic_photographer_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'cinematic-photographer' ),
		'section'     => 'cinematic_photographer_prealoader_option',
		'type'        => 'toggle',
		'settings'    => 'cinematic_photographer_preloader_show_hide',
		) ) );

  	$wp_customize->add_setting( 'cinematic_photographer_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cinematic_photographer_tp_preloader_color1_option', array(
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'cinematic-photographer'),
	    'section' => 'cinematic_photographer_prealoader_option',
	    'settings' => 'cinematic_photographer_tp_preloader_color1_option',
  	)));

  	$wp_customize->add_setting( 'cinematic_photographer_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cinematic_photographer_tp_preloader_color2_option', array(
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'cinematic-photographer'),
	    'section' => 'cinematic_photographer_prealoader_option',
	    'settings' => 'cinematic_photographer_tp_preloader_color2_option',
  	)));

  	$wp_customize->add_setting( 'cinematic_photographer_tp_preloader_bg_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cinematic_photographer_tp_preloader_bg_option', array(
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'cinematic-photographer'),
	    'section' => 'cinematic_photographer_prealoader_option',
	    'settings' => 'cinematic_photographer_tp_preloader_bg_option',
  	)));

	//TP Blog Option
	$wp_customize->add_section('cinematic_photographer_blog_option',array(
        'title' => __('TP Blog Option', 'cinematic-photographer'),
        'panel' => 'cinematic_photographer_panel_id',
        'priority' => 4,
    ) );

	$wp_customize->add_setting( 'cinematic_photographer_remove_date', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cinematic_photographer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cinematic_Photographer_Toggle_Control( $wp_customize, 'cinematic_photographer_remove_date', array(
		'label'       => esc_html__( 'Show / Hide Date Option', 'cinematic-photographer' ),
		'section'     => 'cinematic_photographer_blog_option',
		'type'        => 'toggle',
		'settings'    => 'cinematic_photographer_remove_date',
	) ) );


	$wp_customize->add_setting( 'cinematic_photographer_remove_author', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cinematic_photographer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cinematic_Photographer_Toggle_Control( $wp_customize, 'cinematic_photographer_remove_author', array(
		'label'       => esc_html__( 'Show / Hide Author Option', 'cinematic-photographer' ),
		'section'     => 'cinematic_photographer_blog_option',
		'type'        => 'toggle',
		'settings'    => 'cinematic_photographer_remove_author',
	) ) );


	$wp_customize->add_setting( 'cinematic_photographer_remove_comments', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cinematic_photographer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cinematic_Photographer_Toggle_Control( $wp_customize, 'cinematic_photographer_remove_comments', array(
		'label'       => esc_html__( 'Show / Hide Comment Option', 'cinematic-photographer' ),
		'section'     => 'cinematic_photographer_blog_option',
		'type'        => 'toggle',
		'settings'    => 'cinematic_photographer_remove_comments',
	) ) );


	$wp_customize->add_setting( 'cinematic_photographer_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cinematic_photographer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cinematic_Photographer_Toggle_Control( $wp_customize, 'cinematic_photographer_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'cinematic-photographer' ),
		'section'     => 'cinematic_photographer_blog_option',
		'type'        => 'toggle',
		'settings'    => 'cinematic_photographer_remove_tags',
	) ) );


 	$wp_customize->add_setting( 'cinematic_photographer_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cinematic_photographer_sanitize_checkbox',
	) );
	 $wp_customize->add_control( new Cinematic_Photographer_Toggle_Control( $wp_customize, 'cinematic_photographer_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'cinematic-photographer' ),
		'section'     => 'cinematic_photographer_blog_option',
		'type'        => 'toggle',
		'settings'    => 'cinematic_photographer_remove_read_button',
	) ) );

    $wp_customize->add_setting('cinematic_photographer_read_more_text',array(
		'default'=> __('Read More','cinematic-photographer'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('cinematic_photographer_read_more_text',array(
		'label'	=> __('Edit Button Text','cinematic-photographer'),
		'section'=> 'cinematic_photographer_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'cinematic_photographer_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'cinematic_photographer_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'cinematic_photographer_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','cinematic-photographer' ),
		'section'     => 'cinematic_photographer_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Top bar Section
	$wp_customize->add_section( 'cinematic_photographer_topbar', array(
    	'title'      => __( 'Header Details', 'cinematic-photographer' ),
    	'description' => __( 'Add your contact details', 'cinematic-photographer' ),
		'panel' => 'cinematic_photographer_panel_id',
      'priority' => 6,
	) );

	$wp_customize->add_setting('cinematic_photographer_header_button',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('cinematic_photographer_header_button',array(
		'label'	=> __('Add Button Text','cinematic-photographer'),
		'section'=> 'cinematic_photographer_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('cinematic_photographer_header_button_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('cinematic_photographer_header_button_link',array(
		'label'	=> __('Add Button URL','cinematic-photographer'),
		'section'=> 'cinematic_photographer_topbar',
		'type'=> 'url'
	));


	//home page slider
	$wp_customize->add_section( 'cinematic_photographer_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'cinematic-photographer' ),
		'panel' => 'cinematic_photographer_panel_id',
      'priority' => 7,
	) );

	$wp_customize->add_setting( 'cinematic_photographer_slider_arrows', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cinematic_photographer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cinematic_Photographer_Toggle_Control( $wp_customize, 'cinematic_photographer_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide slider', 'cinematic-photographer' ),
		'section'     => 'cinematic_photographer_slider_section',
		'type'        => 'toggle',
		'settings'    => 'cinematic_photographer_slider_arrows',
	) ) );

	for ( $cinematic_photographer_count = 1; $cinematic_photographer_count <= 4; $cinematic_photographer_count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'cinematic_photographer_slider_page' . $cinematic_photographer_count, array(
			'default'           => '',
			'sanitize_callback' => 'cinematic_photographer_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'cinematic_photographer_slider_page' . $cinematic_photographer_count, array(
			'label'    => __( 'Select Slide Image Page', 'cinematic-photographer' ),
			'section'  => 'cinematic_photographer_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'cinematic_photographer_slider_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cinematic_photographer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cinematic_Photographer_Toggle_Control( $wp_customize, 'cinematic_photographer_slider_button', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'cinematic-photographer' ),
		'section'     => 'cinematic_photographer_slider_section',
		'type'        => 'toggle',
		'settings'    => 'cinematic_photographer_slider_button',
	) ) );

	// Capture Photo Section
		$wp_customize->add_section('cinematic_photographer_capture_photograph_section',array(
			'title'	=> __('Capture Photograph Section','cinematic-photographer'),
			'panel' => 'cinematic_photographer_panel_id',
			'priority' => 8,
		));

		$wp_customize->add_setting( 'cinematic_photographer_capture_photograph_enable', array(
		 'default'           => false,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'cinematic_photographer_sanitize_checkbox',
	 ) );
	 $wp_customize->add_control( new Cinematic_Photographer_Toggle_Control( $wp_customize, 'cinematic_photographer_capture_photograph_enable', array(
		 'label'       => esc_html__( 'Show / Hide Capture Photograph', 'cinematic-photographer' ),
		 'section'     => 'cinematic_photographer_capture_photograph_section',
		 'type'        => 'toggle',
		 'settings'    => 'cinematic_photographer_capture_photograph_enable',
	 ) ) );

		$wp_customize->add_setting('cinematic_photographer_capture_photograph_heading',array(
			'default' => '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('cinematic_photographer_capture_photograph_heading',array(
			'label'	=> __('Section Title','cinematic-photographer'),
			'section'	=> 'cinematic_photographer_capture_photograph_section',
			'type'		=> 'text'
		));
		$wp_customize->selective_refresh->add_partial( 'cinematic_photographer_capture_photograph_heading', array(
			'selector' => '#capture-photo h2',
			'render_callback' => 'cinematic_photographer_customize_partial_cinematic_photographer_capture_photograph_heading',
		) );

		$wp_customize->add_setting('cinematic_photographer_capture_photograph_sub_heading',array(
			'default' => '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('cinematic_photographer_capture_photograph_sub_heading',array(
			'label'	=> __('Section Sub Title','cinematic-photographer'),
			'section'	=> 'cinematic_photographer_capture_photograph_section',
			'type'		=> 'text'
		));

		$cinematic_photographer_categories = get_categories();
		$cats = array();
		$i = 0;
		$cinematic_photographer_offer_cat[]= 'select';
		foreach($cinematic_photographer_categories as $category){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cinematic_photographer_offer_cat[$category->slug] = $category->name;
		}

		$wp_customize->add_setting('cinematic_photographer_capture_photograph_section_category',array(
			'default'	=> 'select',
			'sanitize_callback' => 'cinematic_photographer_sanitize_choices',
		));
		$wp_customize->add_control('cinematic_photographer_capture_photograph_section_category',array(
			'type'    => 'select',
			'choices' => $cinematic_photographer_offer_cat,
			'label' => __('Select Category','cinematic-photographer'),
			'section' => 'cinematic_photographer_capture_photograph_section',
		));


	//footer
	$wp_customize->add_section('cinematic_photographer_footer_section',array(
		'title'	=> __('Footer Text','cinematic-photographer'),
		'description'	=> __('Add copyright text.','cinematic-photographer'),
		'panel' => 'cinematic_photographer_panel_id',
		'priority' => 9,
	));

	$wp_customize->add_setting('cinematic_photographer_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('cinematic_photographer_footer_text',array(
		'label'	=> __('Copyright Text','cinematic-photographer'),
		'section'	=> 'cinematic_photographer_footer_section',
		'type'		=> 'text'
	));
	
	// footer columns
	$wp_customize->add_setting('cinematic_photographer_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'cinematic_photographer_sanitize_number_absint'
	));
	$wp_customize->add_control('cinematic_photographer_footer_columns',array(
		'label'	=> __('Footer Widget Columns','cinematic-photographer'),
		'section'	=> 'cinematic_photographer_footer_section',
		'setting'	=> 'cinematic_photographer_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));

	$wp_customize->add_setting( 'cinematic_photographer_tp_footer_bg_color_option', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cinematic_photographer_tp_footer_bg_color_option', array(
			'label'     => __('Footer Widget Background Color', 'cinematic-photographer'),
			'description' => __('It will change the complete footer widget backgorund color.', 'cinematic-photographer'),
			'section' => 'cinematic_photographer_footer_section',
			'settings' => 'cinematic_photographer_tp_footer_bg_color_option',
	)));

	$wp_customize->add_setting('cinematic_photographer_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'cinematic_photographer_footer_widget_image',array(
    'label' => __('Footer Widget Background Image','cinematic-photographer'),
    'section' => 'cinematic_photographer_footer_section'
	)));

	$wp_customize->add_setting( 'cinematic_photographer_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cinematic_photographer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cinematic_Photographer_Toggle_Control( $wp_customize, 'cinematic_photographer_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'cinematic-photographer' ),
		'section'     => 'cinematic_photographer_footer_section',
		'type'        => 'toggle',
		'settings'    => 'cinematic_photographer_return_to_header',
	) ) );

	 // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('cinematic_photographer_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'cinematic_photographer_sanitize_choices'
	));
	$wp_customize->add_control('cinematic_photographer_scroll_top_position',array(
     'type' => 'radio',
     'label'     => __('Scroll to top Position', 'cinematic-photographer'),
     'description'   => __('This option work for scroll to top', 'cinematic-photographer'),
     'section' => 'cinematic_photographer_footer_section',
     'choices' => array(
         'Right' => __('Right','cinematic-photographer'),
         'Left' => __('Left','cinematic-photographer'),
         'Center' => __('Center','cinematic-photographer')
     ),
	) );

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';


	$wp_customize->add_setting( 'cinematic_photographer_site_title_text', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cinematic_photographer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cinematic_Photographer_Toggle_Control( $wp_customize, 'cinematic_photographer_site_title_text', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'cinematic-photographer' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'cinematic_photographer_site_title_text',
	) ) );

		//  site title size
		$wp_customize->add_setting('cinematic_photographer_site_title_font_size',array(
			'default'	=> 20,
			'sanitize_callback'	=> 'cinematic_photographer_sanitize_number_absint'
		));
		$wp_customize->add_control('cinematic_photographer_site_title_font_size',array(
			'label'	=> __('Site Title Font Size in PX','cinematic-photographer'),
			'section'	=> 'title_tagline',
			'setting'	=> 'cinematic_photographer_site_title_font_size',
			'type'	=> 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 50,
			),
		));

	$wp_customize->add_setting( 'cinematic_photographer_site_tagline_text', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cinematic_photographer_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cinematic_Photographer_Toggle_Control( $wp_customize, 'cinematic_photographer_site_tagline_text', array(
		'label'       => esc_html__( 'Show / Hide Site Tagline', 'cinematic-photographer' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'cinematic_photographer_site_tagline_text',
	) ) );

				//  site tagline size
		$wp_customize->add_setting('cinematic_photographer_site_tagline_font_size',array(
			'default'	=> 15,
			'sanitize_callback'	=> 'cinematic_photographer_sanitize_number_absint'
		));
		$wp_customize->add_control('cinematic_photographer_site_tagline_font_size',array(
			'label'	=> __('Site Tagline Font Size in PX','cinematic-photographer'),
			'section'	=> 'title_tagline',
			'setting'	=> 'cinematic_photographer_site_tagline_font_size',
			'type'	=> 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 50,
			),
		));


    $wp_customize->add_setting('cinematic_photographer_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'cinematic_photographer_sanitize_number_absint'
	));
	 $wp_customize->add_control('cinematic_photographer_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','cinematic-photographer'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('cinematic_photographer_logo_settings',array(
        'default' => 'Different Line',
        'sanitize_callback' => 'cinematic_photographer_sanitize_choices'
	));
   $wp_customize->add_control('cinematic_photographer_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'cinematic-photographer'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'cinematic-photographer'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','cinematic-photographer'),
            'Same Line' => __('Same Line','cinematic-photographer')
        ),
	) );

	$wp_customize->add_setting('cinematic_photographer_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'cinematic_photographer_sanitize_number_absint'
	));
	$wp_customize->add_control('cinematic_photographer_per_columns',array(
		'label'	=> __('Product Per Row','cinematic-photographer'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting('cinematic_photographer_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'cinematic_photographer_sanitize_number_absint'
	));
	$wp_customize->add_control('cinematic_photographer_product_per_page',array(
		'label'	=> __('Product Per Page','cinematic-photographer'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

   	 $wp_customize->add_setting( 'cinematic_photographer_product_sidebar', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'cinematic_photographer_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Cinematic_Photographer_Toggle_Control( $wp_customize, 'cinematic_photographer_product_sidebar', array(
			'label'       => esc_html__( 'Show / Hide Shop Page Sidebar', 'cinematic-photographer' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'cinematic_photographer_product_sidebar',
		) ) );

		$wp_customize->add_setting( 'cinematic_photographer_single_product_sidebar', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'cinematic_photographer_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Cinematic_Photographer_Toggle_Control( $wp_customize, 'cinematic_photographer_single_product_sidebar', array(
			'label'       => esc_html__( 'Show / Hide Product Page Sidebar', 'cinematic-photographer' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'cinematic_photographer_single_product_sidebar',
		) ) );

		$wp_customize->add_setting( 'cinematic_photographer_related_product', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'cinematic_photographer_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Cinematic_Photographer_Toggle_Control( $wp_customize, 'cinematic_photographer_related_product', array(
			'label'       => esc_html__( 'Show / Hide related product', 'cinematic-photographer' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'cinematic_photographer_related_product',
		) ) );
}
add_action( 'customize_register', 'cinematic_photographer_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Cinematic Photographer 1.0
 * @see cinematic_photographer_customize_register()
 *
 * @return void
 */
function cinematic_photographer_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Cinematic Photographer 1.0
 * @see cinematic_photographer_customize_register()
 *
 * @return void
 */
function cinematic_photographer_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'CINEMATIC_PHOTOGRAPHER_PRO_THEME_NAME' ) ) {
	define( 'CINEMATIC_PHOTOGRAPHER_PRO_THEME_NAME', esc_html__( ' Photographer Pro', 'cinematic-photographer' ));
}
if ( ! defined( 'CINEMATIC_PHOTOGRAPHER_PRO_THEME_URL' ) ) {
	define( 'CINEMATIC_PHOTOGRAPHER_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/cinematic-wordpress-theme/'));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Cinematic_Photographer_Customize {

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
		$manager->register_section_type( 'Cinematic_Photographer_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Cinematic_Photographer_Customize_Section_Pro(
				$manager,
				'cinematic_photographer_section_pro',
				array(
					'priority'   => 9,
					'title'    => CINEMATIC_PHOTOGRAPHER_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'cinematic-photographer' ),
					'pro_url'  => esc_url( CINEMATIC_PHOTOGRAPHER_PRO_THEME_URL, 'cinematic-photographer' ),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new Cinematic_Photographer_Customize_Section_Pro(
				$manager,
				'cinematic_photographer_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'cinematic-photographer' ),
					'pro_text' => esc_html__( 'Click Here', 'cinematic-photographer' ),
					'pro_url'  => esc_url( CINEMATIC_PHOTOGRAPHER_DOCS_URL, 'cinematic-photographer'),
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

		wp_enqueue_script( 'cinematic-photographer-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'cinematic-photographer-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Cinematic_Photographer_Customize::get_instance();
