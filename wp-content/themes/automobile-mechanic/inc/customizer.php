<?php
/**
 * Automobile Mechanic: Customizer
 *
 * @subpackage Automobile Mechanic
 * @since 1.0
 */

use WPTRT\Customize\Section\Automobile_Mechanic_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Automobile_Mechanic_Button::class );

	$manager->add_section(
		new Automobile_Mechanic_Button( $manager, 'automobile_mechanic_pro', [
			'title' => __( 'Automobile Mechanic Pro', 'automobile-mechanic' ),
			'priority' => 0,
			'button_text' => __( 'Go Pro', 'automobile-mechanic' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/automobile-mechanic-wordpress-theme', 'automobile-mechanic')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'automobile-mechanic-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'automobile-mechanic-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function automobile_mechanic_customize_register( $wp_customize ) {

	$wp_customize->add_setting('automobile_mechanic_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('automobile_mechanic_logo_padding',array(
		'label' => __('Logo Margin','automobile-mechanic'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('automobile_mechanic_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'automobile_mechanic_sanitize_float'
	));
	$wp_customize->add_control('automobile_mechanic_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','automobile-mechanic'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('automobile_mechanic_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'automobile_mechanic_sanitize_float'
	));
	$wp_customize->add_control('automobile_mechanic_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','automobile-mechanic'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('automobile_mechanic_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'automobile_mechanic_sanitize_float'
	));
	$wp_customize->add_control('automobile_mechanic_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','automobile-mechanic'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('automobile_mechanic_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'automobile_mechanic_sanitize_float'
 	));
 	$wp_customize->add_control('automobile_mechanic_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','automobile-mechanic'),
		'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('automobile_mechanic_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'automobile_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('automobile_mechanic_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','automobile-mechanic'),
		'section' => 'title_tagline'
	));
	
	$wp_customize->add_setting( 'automobile_mechanic_site_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_mechanic_site_title_color', array(
		'label' => 'Title Color',
		'section' => 'title_tagline',
	)));

	$wp_customize->add_setting('automobile_mechanic_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'automobile_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('automobile_mechanic_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','automobile-mechanic'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting( 'automobile_mechanic_site_tagline_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_mechanic_site_tagline_color', array(
		'label' => 'Tagline Color',
		'section' => 'title_tagline',
	)));

	$wp_customize->add_panel( 'automobile_mechanic_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'automobile-mechanic' ),
		'description' => __( 'Description of what this panel does.', 'automobile-mechanic' ),
	) );

	$wp_customize->add_section( 'automobile_mechanic_theme_options_section', array(
    	'title'      => __( 'General Settings', 'automobile-mechanic' ),
		'priority'   => 30,
		'panel' => 'automobile_mechanic_panel_id'
	) );

	$wp_customize->add_setting('automobile_mechanic_theme_options',array(
		'default' => 'One Column',
		'sanitize_callback' => 'automobile_mechanic_sanitize_choices'
	));
	$wp_customize->add_control('automobile_mechanic_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','automobile-mechanic'),
		'section' => 'automobile_mechanic_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','automobile-mechanic'),
		   'Right Sidebar' => __('Right Sidebar','automobile-mechanic'),
		   'One Column' => __('One Column','automobile-mechanic'),
		   'Grid Layout' => __('Grid Layout','automobile-mechanic')
		),
	));

	$wp_customize->add_setting('automobile_mechanic_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'automobile_mechanic_sanitize_choices'
	));
	$wp_customize->add_control('automobile_mechanic_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','automobile-mechanic'),
        'section' => 'automobile_mechanic_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','automobile-mechanic'),
            'Right Sidebar' => __('Right Sidebar','automobile-mechanic'),
            'One Column' => __('One Column','automobile-mechanic')
        ),
	));

	$wp_customize->add_setting('automobile_mechanic_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'automobile_mechanic_sanitize_choices'
	));
	$wp_customize->add_control('automobile_mechanic_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','automobile-mechanic'),
        'section' => 'automobile_mechanic_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','automobile-mechanic'),
            'Right Sidebar' => __('Right Sidebar','automobile-mechanic'),
            'One Column' => __('One Column','automobile-mechanic')
        ),
	));

	$wp_customize->add_setting('automobile_mechanic_archive_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'automobile_mechanic_sanitize_choices'
	));
	$wp_customize->add_control('automobile_mechanic_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','automobile-mechanic'),
        'section' => 'automobile_mechanic_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','automobile-mechanic'),
            'Right Sidebar' => __('Right Sidebar','automobile-mechanic'),
            'One Column' => __('One Column','automobile-mechanic'),
            'Grid Layout' => __('Grid Layout','automobile-mechanic')
        ),
	));

	//Header
	$wp_customize->add_section( 'automobile_mechanic_header' , array(
    	'title'    => __( 'Header Settings', 'automobile-mechanic' ),
		'priority' => null,
		'panel' => 'automobile_mechanic_panel_id'
	));


	$wp_customize->add_setting('automobile_mechanic_facebook_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('automobile_mechanic_facebook_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Facebook URL','automobile-mechanic'),
	   	'section' => 'automobile_mechanic_header',
	));

	$wp_customize->add_setting('automobile_mechanic_twitter_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('automobile_mechanic_twitter_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Twitter URL','automobile-mechanic'),
	   	'section' => 'automobile_mechanic_header',
	));

	$wp_customize->add_setting('automobile_mechanic_instagram_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('automobile_mechanic_instagram_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Instagram URL','automobile-mechanic'),
	   	'section' => 'automobile_mechanic_header',
	));

	$wp_customize->add_setting('automobile_mechanic_pinterest_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('automobile_mechanic_pinterest_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Pinterest URL','automobile-mechanic'),
	   	'section' => 'automobile_mechanic_header',
	));


	$wp_customize->add_setting( 'automobile_mechanic_topbar_text_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_mechanic_topbar_text_color', array(
		'label' => 'Text Color',
		'section' => 'automobile_mechanic_header',
	)));

	$wp_customize->add_setting( 'automobile_mechanic_topbar_notext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_mechanic_topbar_notext_color', array(
		'label' => 'Number Text Color',
		'section' => 'automobile_mechanic_header',
	)));

	$wp_customize->add_setting( 'automobile_mechanic_topbar_icon_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_mechanic_topbar_icon_color', array(
		'label' => 'Icon Color',
		'section' => 'automobile_mechanic_header',
	)));

	$wp_customize->add_setting( 'automobile_mechanic_topbar_iconbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_mechanic_topbar_iconbg_color', array(
		'label' => 'Icon Bg Color',
		'section' => 'automobile_mechanic_header',
	)));

	//home page slider
	$wp_customize->add_section( 'automobile_mechanic_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'automobile-mechanic' ),
		'priority' => null,
		'panel' => 'automobile_mechanic_panel_id'
	) );

	$wp_customize->add_setting('automobile_mechanic_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'automobile_mechanic_sanitize_checkbox'
	));
	$wp_customize->add_control('automobile_mechanic_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','automobile-mechanic'),
	   	'section' => 'automobile_mechanic_slider_section',
	));

	for ( $count = 1; $count <= 5; $count++ ) {
		$wp_customize->add_setting( 'automobile_mechanic_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'automobile_mechanic_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'automobile_mechanic_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'automobile-mechanic' ),
			'section' => 'automobile_mechanic_slider_section',
			'type' => 'dropdown-pages'
		));
	}


	$wp_customize->add_setting( 'automobile_mechanic_slidertitle_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_mechanic_slidertitle_color', array(
		'label' => 'Title Color',
		'section' => 'automobile_mechanic_slider_section',
	)));

	$wp_customize->add_setting( 'automobile_mechanic_slidertext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_mechanic_slidertext_color', array(
		'label' => 'Title Color',
		'section' => 'automobile_mechanic_slider_section',
	)));

	$wp_customize->add_setting( 'automobile_mechanic_sliderbtn_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_mechanic_sliderbtn_color', array(
		'label' => 'Button Text Color',
		'section' => 'automobile_mechanic_slider_section',
	)));

	$wp_customize->add_setting( 'automobile_mechanic_sliderbtnbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_mechanic_sliderbtnbg_color', array(
		'label' => 'Button Bg Color',
		'section' => 'automobile_mechanic_slider_section',
	)));

	//Aboutus Section
	$wp_customize->add_section('automobile_mechanic_aboutus_section',array(
		'title'	=> __('Aboutus Settings','automobile-mechanic'),
		'description'=> __('<b>Note :</b> This section will appear below the slider.','automobile-mechanic'),
		'panel' => 'automobile_mechanic_panel_id',
	));

	$wp_customize->add_setting('automobile_mechanic_aboutusheading',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automobile_mechanic_aboutusheading',array(
	   	'type' => 'text',
	   	'label' => __('Heading','automobile-mechanic'),
	   	'section' => 'automobile_mechanic_aboutus_section',
	));

	$wp_customize->add_setting('automobile_mechanic_aboutustitle',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automobile_mechanic_aboutustitle',array(
	   	'type' => 'text',
	   	'label' => __('Title','automobile-mechanic'),
	   	'section' => 'automobile_mechanic_aboutus_section',
	));

	$wp_customize->add_setting('automobile_mechanic_aboutusdescription',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automobile_mechanic_aboutusdescription',array(
	   	'type' => 'text',
	   	'label' => __('Description','automobile-mechanic'),
	   	'section' => 'automobile_mechanic_aboutus_section',
	));

	$wp_customize->add_setting('automobile_mechanic_aboutus_box1_title',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automobile_mechanic_aboutus_box1_title',array(
	   	'type' => 'text',
	   	'label' => __('Box 1 Title','automobile-mechanic'),
	   	'section' => 'automobile_mechanic_aboutus_section',
	));

	$wp_customize->add_setting('automobile_mechanic_aboutus_box1_description',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automobile_mechanic_aboutus_box1_description',array(
	   	'type' => 'text',
	   	'label' => __('Box 1 Description','automobile-mechanic'),
	   	'section' => 'automobile_mechanic_aboutus_section',
	));

	$wp_customize->add_setting('automobile_mechanic_aboutus_box2_title',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automobile_mechanic_aboutus_box2_title',array(
	   	'type' => 'text',
	   	'label' => __('Box 2 Title','automobile-mechanic'),
	   	'section' => 'automobile_mechanic_aboutus_section',
	));

	$wp_customize->add_setting('automobile_mechanic_aboutus_box2_description',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automobile_mechanic_aboutus_box2_description',array(
	   	'type' => 'text',
	   	'label' => __('Box 2 Description','automobile-mechanic'),
	   	'section' => 'automobile_mechanic_aboutus_section',
	));

	$wp_customize->add_setting('automobile_mechanic_aboutus_btnlink',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automobile_mechanic_aboutus_btnlink',array(
	   	'type' => 'text',
	   	'label' => __('Button Link','automobile-mechanic'),
	   	'section' => 'automobile_mechanic_aboutus_section',
	));


	$wp_customize->add_setting(
    	'automobile_mechanic_aboutus_rightimage',
	    array(
	        'sanitize_callback' => 'esc_url_raw'
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'automobile_mechanic_aboutus_rightimage',
	        array(
			    'label'   		=> __('Right Image','automobile-mechanic'),
	            'section' => 'automobile_mechanic_aboutus_section',
	            'settings' => 'automobile_mechanic_aboutus_rightimage',
	        )
	    )
	);


	//Features Section
	$wp_customize->add_section('automobile_mechanic_features_section',array(
		'title'	=> __('Features Settings','automobile-mechanic'),
		'description'=> __('<b>Note :</b> This section will appear below the Aboutus.','automobile-mechanic'),
		'panel' => 'automobile_mechanic_panel_id',
	));

	$wp_customize->add_setting('automobile_mechanic_featureheading',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automobile_mechanic_featureheading',array(
	   	'type' => 'text',
	   	'label' => __('Heading','automobile-mechanic'),
	   	'section' => 'automobile_mechanic_features_section',
	));

	$wp_customize->add_setting('automobile_mechanic_featuresubheading',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('automobile_mechanic_featuresubheading',array(
	   	'type' => 'text',
	   	'label' => __('Sub Heading','automobile-mechanic'),
	   	'section' => 'automobile_mechanic_features_section',
	));


	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('automobile_mechanic_features_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'automobile_mechanic_sanitize_choices',
	));
	$wp_customize->add_control('automobile_mechanic_features_category_setting',array(
		'type' => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category To Display Post','automobile-mechanic'),
		'section' => 'automobile_mechanic_features_section',
	));

	$wp_customize->add_setting('automobile_mechanic_features_number',array(
		'default'	=> '3',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('automobile_mechanic_features_number',array(
		'label'	=> __('Number Of Posts To Show In A Category','automobile-mechanic'),
		'section' => 'automobile_mechanic_features_section',
		'type'	  => 'number'
	));

	$automobile_mechanic_features_number = get_theme_mod('automobile_mechanic_features_number', 3);
	for ($i=1; $i <= $automobile_mechanic_features_number; $i++) { 
	   	$wp_customize->add_setting('automobile_mechanic_feature_icon' . $i, array(
	      	'default' => 'fas fa-chart-line',
	      	'sanitize_callback' => 'sanitize_text_field'
	   	));
	   	$wp_customize->add_control(new Automobile_Mechanic_Fontawesome_Icon_Chooser($wp_customize, 'automobile_mechanic_feature_icon' . $i, array(
	      	'section' => 'automobile_mechanic_features_section',
	      	'type' => 'icon',
	      	'label' => esc_html__('Feature Icon ', 'automobile-mechanic') . $i
	  	)));
	}


	$wp_customize->add_setting(
    	'automobile_mechanic_feature_leftimage',
	    array(
	        'sanitize_callback' => 'esc_url_raw'
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'automobile_mechanic_feature_leftimage',
	        array(
			    'label'   		=> __('Left Image','automobile-mechanic'),
	            'section' => 'automobile_mechanic_features_section',
	            'settings' => 'automobile_mechanic_feature_leftimage',
	        )
	    )
	);


	$rightcategories = get_categories();
	$rightcats = array();
	$i = 0;
	$rightcat_pst[]= 'select';
	foreach($rightcategories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$rightcat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('automobile_mechanic_features_category_settingright',array(
		'default' => 'select',
		'sanitize_callback' => 'automobile_mechanic_sanitize_choices',
	));
	$wp_customize->add_control('automobile_mechanic_features_category_settingright',array(
		'type' => 'select',
		'choices' => $rightcat_pst,
		'label' => __('Select Category To Display Right Side Posts','automobile-mechanic'),
		'section' => 'automobile_mechanic_features_section',
	));

	$wp_customize->add_setting('automobile_mechanic_features_numberright',array(
		'default'	=> '3',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('automobile_mechanic_features_numberright',array(
		'label'	=> __('Number Of Posts To Show In A Right Side Category','automobile-mechanic'),
		'section' => 'automobile_mechanic_features_section',
		'type'	  => 'number'
	));

	$automobile_mechanic_features_numberright = get_theme_mod('automobile_mechanic_features_numberright', 3);
	for ($i=1; $i <= $automobile_mechanic_features_numberright; $i++) { 
	   	$wp_customize->add_setting('automobile_mechanic_feature_iconright' . $i, array(
	      	'default' => 'fas fa-chart-line',
	      	'sanitize_callback' => 'sanitize_text_field'
	   	));
	   	$wp_customize->add_control(new Automobile_Mechanic_Fontawesome_Icon_Chooser($wp_customize, 'automobile_mechanic_feature_iconright' . $i, array(
	      	'section' => 'automobile_mechanic_features_section',
	      	'type' => 'icon',
	      	'label' => esc_html__('Feature Icon', 'automobile-mechanic') . $i
	  	)));
	}


	$wp_customize->add_setting( 'automobile_mechanic_featureicon_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_mechanic_featureicon_color', array(
		'label' => 'Icon Color',
		'section' => 'automobile_mechanic_features_section',
	)));

	$wp_customize->add_setting( 'automobile_mechanic_featureiconbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_mechanic_featureiconbg_color', array(
		'label' => 'Icon Bg Color',
		'section' => 'automobile_mechanic_features_section',
	)));

	$wp_customize->add_setting( 'automobile_mechanic_featuretitle_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_mechanic_featuretitle_color', array(
		'label' => 'Title Color',
		'section' => 'automobile_mechanic_features_section',
	)));

	$wp_customize->add_setting( 'automobile_mechanic_featuretext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_mechanic_featuretext_color', array(
		'label' => 'Text Color',
		'section' => 'automobile_mechanic_features_section',
	)));

	$wp_customize->add_setting( 'automobile_mechanic_featurelink_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_mechanic_featurelink_color', array(
		'label' => 'Button Color',
		'section' => 'automobile_mechanic_features_section',
	)));

	$wp_customize->add_setting( 'automobile_mechanic_featurebg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_mechanic_featurebg_color', array(
		'label' => ' Box Bg Color',
		'section' => 'automobile_mechanic_features_section',
	)));


	//Footer
    $wp_customize->add_section( 'automobile_mechanic_footer', array(
    	'title'  => __( 'Footer Settings', 'automobile-mechanic' ),
		'priority' => null,
		'panel' => 'automobile_mechanic_panel_id'
	) );

	$wp_customize->add_setting('automobile_mechanic_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'automobile_mechanic_sanitize_checkbox'
    ));
    $wp_customize->add_control('automobile_mechanic_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','automobile-mechanic'),
       'section' => 'automobile_mechanic_footer'
    ));

    $wp_customize->add_setting('automobile_mechanic_footer_link',array(
		'default' => 'https://www.luzuk.com/themes/free-automobile-mechanic-wordpress-theme',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('automobile_mechanic_footer_link',array(
		'label'	=> __('Copyright Link','automobile-mechanic'),
		'section' => 'automobile_mechanic_footer',
		'setting' => 'automobile_mechanic_footer_link',
		'type' => 'text'
	));

	$wp_customize->add_setting('automobile_mechanic_footer_copy',array(
		'default' => 'Automobile Mechanic WordPress Theme By Luzuk',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('automobile_mechanic_footer_copy',array(
		'label'	=> __('Copyright Text','automobile-mechanic'),
		'section' => 'automobile_mechanic_footer',
		'setting' => 'automobile_mechanic_footer_copy',
		'type' => 'text'
	));

	$wp_customize->add_setting( 'automobile_mechanic_copyright_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_mechanic_copyright_color', array(
		'label' => 'Text Color',
		'section' => 'automobile_mechanic_footer',
	)));

	$wp_customize->add_setting( 'automobile_mechanic_copyrightbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'automobile_mechanic_copyrightbg_color', array(
		'label' => 'Backgrund Color',
		'section' => 'automobile_mechanic_footer',
	)));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'automobile_mechanic_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'automobile_mechanic_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'automobile_mechanic_customize_register' );

function automobile_mechanic_customize_partial_blogname() {
	bloginfo( 'name' );
}

function automobile_mechanic_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if (class_exists('WP_Customize_Control')) {

   	class Automobile_Mechanic_Fontawesome_Icon_Chooser extends WP_Customize_Control {

      	public $type = 'icon';

      	public function render_content() { ?>
	     	<label>
	            <span class="customize-control-title">
	               <?php echo esc_html($this->label); ?>
	            </span>

	            <?php if ($this->description) { ?>
	                <span class="description customize-control-description">
	                   <?php echo wp_kses_post($this->description); ?>
	                </span>
	            <?php } ?>

	            <div class="automobile-mechanic-selected-icon">
	                <i class="fa <?php echo esc_attr($this->value()); ?>"></i>
	                <span><i class="fa fa-angle-down"></i></span>
	            </div>

	            <ul class="automobile-mechanic-icon-list clearfix">
	                <?php
	                $automobile_mechanic_font_awesome_icon_array = automobile_mechanic_font_awesome_icon_array();
	                foreach ($automobile_mechanic_font_awesome_icon_array as $automobile_mechanic_font_awesome_icon) {
	                   $icon_class = $this->value() == $automobile_mechanic_font_awesome_icon ? 'icon-active' : '';
	                   echo '<li class=' . esc_attr($icon_class) . '><i class="' . esc_attr($automobile_mechanic_font_awesome_icon) . '"></i></li>';
	                }
	                ?>
	            </ul>
	            <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
	        </label>
	        <?php
      	}
  	}
}
function automobile_mechanic_customizer_script() {
   wp_enqueue_style( 'font-awesome-1', esc_url(get_template_directory_uri()).'/assets/css/fontawesome-all.css');
}
add_action( 'customize_controls_enqueue_scripts', 'automobile_mechanic_customizer_script' );