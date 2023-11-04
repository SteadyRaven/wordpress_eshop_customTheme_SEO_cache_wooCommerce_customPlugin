<?php
/**
 * Slider options.
 *
 * @package Prime Interior Designer
 */

$default = prime_interior_designer_get_default_theme_options();

//  Slider Section
$wp_customize->add_section( 'section_featured_slider',
	array(
	'title'      => __( 'Slider Section', 'prime-interior-designer' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'home_page_panel',
	)
);

// Enable Section
$wp_customize->add_setting('theme_options[enable_featured_slider_section]', 
	array(
	'default' 			=> $default['enable_featured_slider_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_featured_slider_section]', 
	array(		
	'label' 	=> __('Enable Section', 'prime-interior-designer'),
	'section' 	=> 'section_featured_slider',
	'settings'  => 'theme_options[enable_featured_slider_section]',
	'type' 		=> 'checkbox',	
	)
);

// Items
$wp_customize->add_setting('theme_options[number_of_featured_slider_items]', 
	array(
	'default' 			=> $default['number_of_featured_slider_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'prime_interior_designer_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_featured_slider_items]', 
	array(
	'label'       => __('Items (Max: 6)', 'prime-interior-designer'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[number_of_featured_slider_items]',		
	'type'        => 'number',
	'active_callback' => 'prime_interior_designer_featured_slider_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 6,
			'step'	=> 1,
		),
	)
);

// Content Type
$wp_customize->add_setting('theme_options[featured_slider_content_type]', 
	array(
	'default' 			=> $default['featured_slider_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'prime_interior_designer_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[featured_slider_content_type]', 
	array(
	'label'       => __('Content Type', 'prime-interior-designer'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[featured_slider_content_type]',		
	'type'        => 'select',
	'active_callback' => 'prime_interior_designer_featured_slider_active',
	'choices'	  => array(
			'featured_slider_page'	   => __('Page','prime-interior-designer'),
			'featured_slider_post'	   => __('Post','prime-interior-designer'),
		),
	)
);

$number_of_featured_slider_items = prime_interior_designer_get_option( 'number_of_featured_slider_items' );

for( $i=1; $i<=$number_of_featured_slider_items; $i++ ) {

	// Page
	$wp_customize->add_setting('theme_options[featured_slider_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'prime_interior_designer_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[featured_slider_page_'.$i.']', 
		array(
		'label'       	  => __('Select Page #', 'prime-interior-designer').$i,
		'section'     	  => 'section_featured_slider',   
		'settings'    	  => 'theme_options[featured_slider_page_'.$i.']',		
		'type'        	  => 'dropdown-pages',
		'active_callback' => 'prime_interior_designer_featured_slider_page',
		)
	);

	// Posts
	$wp_customize->add_setting('theme_options[featured_slider_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'prime_interior_designer_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[featured_slider_post_'.$i.']', 
		array(
		'label'       	  => __('Select Post #', 'prime-interior-designer').$i,
		'section'     	  => 'section_featured_slider',   
		'settings'    	  => 'theme_options[featured_slider_post_'.$i.']',		
		'type'        	  => 'select',
		'choices'	  	  => prime_interior_designer_dropdown_posts(),
		'active_callback' => 'prime_interior_designer_featured_slider_post',
		)
	);
}

$wp_customize->add_setting( 'theme_options[featured_slider_readmore_text]',
	array(
	'default'           => $default['featured_slider_readmore_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'prime_interior_designer_sanitize_textarea_content',
	'transport'         => 'refresh',
	)
);

$wp_customize->add_control( 'theme_options[featured_slider_readmore_text]',
	array(
	'label'    => __( 'Button Label', 'prime-interior-designer' ),
	'section'  => 'section_featured_slider',
	'type'     => 'text',
	)
);

// Slider Speed
$wp_customize->add_setting('theme_options[data_slick_speed]', 
	array(
	'default' 			=> $default['data_slick_speed'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'prime_interior_designer_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[data_slick_speed]', 
	array(
	'label'       		=> __('Delay Speed (Max: 5000)', 'prime-interior-designer'),
	'section'     		=> 'section_featured_slider',   
	'settings'    		=> 'theme_options[data_slick_speed]',		
	'type'        		=> 'number',
	'active_callback' 	=> 'prime_interior_designer_featured_slider_active',
	'input_attrs' => array(
			'min'	=> 0,
			'max'	=> 5000,
			'step'	=> 100,
		),
	)
);

// Slider Infinite
$wp_customize->add_setting('theme_options[data_slick_infinite]', 
	array(
	'default' 			=> $default['data_slick_infinite'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[data_slick_infinite]', 
	array(		
	'label' 	        => __('Infinite', 'prime-interior-designer'),
	'section' 	        => 'section_featured_slider',
	'settings'          => 'theme_options[data_slick_infinite]',
	'type' 		        => 'checkbox',	
	'active_callback' 	=> 'prime_interior_designer_featured_slider_active',
	)
);

// Slider Arrows
$wp_customize->add_setting('theme_options[data_slick_arrows]', 
	array(
	'default' 			=> $default['data_slick_arrows'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[data_slick_arrows]', 
	array(		
	'label' 	        => __('Arrows', 'prime-interior-designer'),
	'section' 	        => 'section_featured_slider',
	'settings'          => 'theme_options[data_slick_arrows]',
	'type' 		        => 'checkbox',	
	'active_callback' 	=> 'prime_interior_designer_featured_slider_active',
	)
);

// Slider Autoplay
$wp_customize->add_setting('theme_options[data_slick_autoplay]', 
	array(
	'default' 			=> $default['data_slick_autoplay'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[data_slick_autoplay]', 
	array(		
	'label' 	        => __('Autoplay', 'prime-interior-designer'),
	'section' 	        => 'section_featured_slider',
	'settings'          => 'theme_options[data_slick_autoplay]',
	'type' 		        => 'checkbox',	
	'active_callback' 	=> 'prime_interior_designer_featured_slider_active',
	)
);

// Slider Draggable
$wp_customize->add_setting('theme_options[data_slick_draggable]', 
	array(
	'default' 			=> $default['data_slick_draggable'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[data_slick_draggable]', 
	array(		
	'label' 	        => __('Draggable', 'prime-interior-designer'),
	'section' 	        => 'section_featured_slider',
	'settings'          => 'theme_options[data_slick_draggable]',
	'type' 		        => 'checkbox',	
	'active_callback' 	=> 'prime_interior_designer_featured_slider_active',
	)
);

// Slider Fade
$wp_customize->add_setting('theme_options[data_slick_fade]', 
	array(
	'default' 			=> $default['data_slick_fade'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[data_slick_fade]', 
	array(		
	'label' 	        => __('Fade', 'prime-interior-designer'),
	'section' 	        => 'section_featured_slider',
	'settings'          => 'theme_options[data_slick_fade]',
	'type' 		        => 'checkbox',	
	'active_callback' 	=> 'prime_interior_designer_featured_slider_active',
	)
);