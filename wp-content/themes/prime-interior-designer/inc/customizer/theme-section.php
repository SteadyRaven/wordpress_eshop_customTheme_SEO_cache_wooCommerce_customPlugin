<?php
/**
 * Theme Options.
 *
 * @package Prime Interior Designer
 */

$default = prime_interior_designer_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => __( 'Theme Options', 'prime-interior-designer' ),
	'priority'   => 30,
	'capability' => 'edit_theme_options',
	)
);

// Single Post Setting Title
$wp_customize->add_section('section_single_post_setting', 
	array(    
	'title'       => __('Single Post Setting', 'prime-interior-designer'),
	'panel'       => 'theme_option_panel'    
	)
);

//Author Setting control
$wp_customize->add_setting( 
    'theme_options[prime_interior_designer_post_author_setting]', 
    array(
        'default'           => $default['prime_interior_designer_post_author_setting'],
        'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[prime_interior_designer_post_author_setting]',
    array(
        'label'       => __( 'Show Author', 'prime-interior-designer' ),
        'section'     => 'section_single_post_setting',
        'type'        => 'checkbox',
    )
);

//Date Setting control
$wp_customize->add_setting( 
    'theme_options[prime_interior_designer_post_date_setting]', 
    array(
        'default'           => $default['prime_interior_designer_post_date_setting'],
        'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[prime_interior_designer_post_date_setting]',
    array(
        'label'       => __( 'Show Date', 'prime-interior-designer' ),
        'section'     => 'section_single_post_setting',
        'type'        => 'checkbox',
    )
);

//Categories Setting control
$wp_customize->add_setting( 
    'theme_options[prime_interior_designer_post_categories_setting]', 
    array(
        'default'           => $default['prime_interior_designer_post_categories_setting'],
        'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[prime_interior_designer_post_categories_setting]',
    array(
        'label'       => __( 'Show Categories', 'prime-interior-designer' ),
        'section'     => 'section_single_post_setting',
        'type'        => 'checkbox',
    )
);

//Comments Setting control
$wp_customize->add_setting( 
    'theme_options[prime_interior_designer_post_comment_setting]', 
    array(
        'default'           => $default['prime_interior_designer_post_comment_setting'],
        'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[prime_interior_designer_post_comment_setting]',
    array(
        'label'       => __( 'Show Comments', 'prime-interior-designer' ),
        'section'     => 'section_single_post_setting',
        'type'        => 'checkbox',
    )
);

//Post Setting
$wp_customize->add_section('section_post_setting', 
	array(    
	'title'       => __('Post Setting', 'prime-interior-designer'),
	'panel'       => 'theme_option_panel'    
	)
);

//Title Setting control
$wp_customize->add_setting( 
    'theme_options[prime_interior_designer_post_title_setting]', 
    array(
        'default'           => $default['prime_interior_designer_post_title_setting'],
        'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[prime_interior_designer_post_title_setting]',
    array(
        'label'       => __( 'Show Title', 'prime-interior-designer' ),
        'section'     => 'section_post_setting',
        'type'        => 'checkbox',
    )
);

//meta Setting control
$wp_customize->add_setting( 
    'theme_options[prime_interior_designer_post_meta_setting]', 
    array(
        'default'           => $default['prime_interior_designer_post_meta_setting'],
        'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[prime_interior_designer_post_meta_setting]',
    array(
        'label'       => __( 'Show Meta', 'prime-interior-designer' ),
        'section'     => 'section_post_setting',
        'type'        => 'checkbox',
    )
);

//Content Setting control
$wp_customize->add_setting( 
    'theme_options[prime_interior_designer_post_content_setting]', 
    array(
        'default'           => $default['prime_interior_designer_post_content_setting'],
        'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[prime_interior_designer_post_content_setting]',
    array(
        'label'       => __( 'Show Content', 'prime-interior-designer' ),
        'section'     => 'section_post_setting',
        'type'        => 'checkbox',
    )
);

//Button Setting control
$wp_customize->add_setting( 
    'theme_options[prime_interior_designer_post_button_setting]', 
    array(
        'default'           => $default['prime_interior_designer_post_button_setting'],
        'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[prime_interior_designer_post_button_setting]',
    array(
        'label'       => __( 'Show Button', 'prime-interior-designer' ),
        'section'     => 'section_post_setting',
        'type'        => 'checkbox',
    )
);

//Featured Image Setting control
$wp_customize->add_setting( 
    'theme_options[prime_interior_designer_post_feature_image_setting]', 
    array(
        'default'           => $default['prime_interior_designer_post_feature_image_setting'],
        'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[prime_interior_designer_post_feature_image_setting]',
    array(
        'label'       => __( 'Show Featured Image', 'prime-interior-designer' ),
        'section'     => 'section_post_setting',
        'type'        => 'checkbox',
    )
);

// Page Title
$wp_customize->add_section('section_page_title', 
	array(    
	'title'       => __('Page Title', 'prime-interior-designer'),
	'panel'       => 'theme_option_panel'    
	)
);

// Show / Hide Page Title
$wp_customize->add_setting( 'theme_options[show_page_title]', array(
	'default'           => $default['show_page_title'],
	'sanitize_callback' => 'prime_interior_designer_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[show_page_title]', array(
	'label'              => esc_html__( 'Display Page Title', 'prime-interior-designer' ),
	'section'            => 'section_page_title',
	'type'               => 'select',
	'choices' 	         => array(		
		'page-title-enable' 	 => 'Yes',						
		'page-title-disable'     => 'No',
	),	
) );

// Sidebar Layout
$wp_customize->add_section('section_sidebar_layout', array(    
	'title'       => __('Sidebar Layout', 'prime-interior-designer'),
	'panel'       => 'theme_option_panel'    
));

// Blog Layout
$wp_customize->add_setting('theme_options[layout_options_blog]', 
	array(
	'default' 			=> $default['layout_options_blog'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'prime_interior_designer_sanitize_select'
	)
);

$wp_customize->add_control(new prime_interior_designer_Image_Radio_Control($wp_customize, 'theme_options[layout_options_blog]', 
	array(		
	'label' 	=> __('Blog Layout', 'prime-interior-designer'),
	'section' 	=> 'section_sidebar_layout',
	'settings'  => 'theme_options[layout_options_blog]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> get_template_directory_uri() . '/assets/images/left-sidebar.png',						
		'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
		),	
	))
);

// Archive Layout
$wp_customize->add_setting('theme_options[layout_options_archive]', 
	array(
	'default' 			=> $default['layout_options_archive'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'prime_interior_designer_sanitize_select'
	)
);

$wp_customize->add_control(new prime_interior_designer_Image_Radio_Control($wp_customize, 'theme_options[layout_options_archive]', 
	array(		
	'label' 	=> __('Archive Layout', 'prime-interior-designer'),
	'section' 	=> 'section_sidebar_layout',
	'settings'  => 'theme_options[layout_options_archive]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> get_template_directory_uri() . '/assets/images/left-sidebar.png',						
		'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
		),	
	))
);


// Page Layout
$wp_customize->add_setting('theme_options[layout_options_page]', 
	array(
	'default' 			=> $default['layout_options_page'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'prime_interior_designer_sanitize_select'
	)
);

$wp_customize->add_control(new prime_interior_designer_Image_Radio_Control($wp_customize, 'theme_options[layout_options_page]', 
	array(		
	'label' 	=> __('Page Layout', 'prime-interior-designer'),
	'section' 	=> 'section_sidebar_layout',
	'settings'  => 'theme_options[layout_options_page]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> get_template_directory_uri() . '/assets/images/left-sidebar.png',						
		'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
		),	
	))
);

// Single Post Layout
$wp_customize->add_setting('theme_options[layout_options_single]', 
	array(
	'default' 			=> $default['layout_options_single'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'prime_interior_designer_sanitize_select'
	)
);

$wp_customize->add_control(new prime_interior_designer_Image_Radio_Control($wp_customize, 'theme_options[layout_options_single]', 
	array(		
	'label' 	=> __('Single Post Layout', 'prime-interior-designer'),
	'section' 	=> 'section_sidebar_layout',
	'settings'  => 'theme_options[layout_options_single]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> get_template_directory_uri() . '/assets/images/left-sidebar.png',						
		'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
		),	
	))
);

// Excerpt Length
$wp_customize->add_section('section_excerpt_length', 
	array(    
	'title'       => __('Excerpt Length', 'prime-interior-designer'),
	'panel'       => 'theme_option_panel'    
	)
);

$wp_customize->add_setting( 'theme_options[excerpt_length]', array(
	'default'           => $default['excerpt_length'],
	'sanitize_callback' => 'prime_interior_designer_sanitize_number_range',
) );
$wp_customize->add_control( 'theme_options[excerpt_length]', array(
	'label'       => esc_html__( 'Excerpt Length', 'prime-interior-designer' ),
	'section'     => 'section_excerpt_length',
	'type'        => 'number',
	'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 80px;' ),
) );

// Blog Settings
$wp_customize->add_section('section_blog_setting', 
	array(    
	'title'       => __('Blog / Archive Settings', 'prime-interior-designer'),
	'panel'       => 'theme_option_panel'    
	)
);

// Blog Title
$wp_customize->add_setting( 'theme_options[your_latest_posts_title]',
	array(
	'default'           => $default['your_latest_posts_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'prime_interior_designer_sanitize_textarea_content',
	'transport'         => 'refresh',
	)
);
$wp_customize->add_control( 'theme_options[your_latest_posts_title]',
	array(
	'label'    => __( 'Blog Title', 'prime-interior-designer' ),
	'section'  => 'section_blog_setting',
	'type'     => 'text',
	)
);

// Blog Button Label
$wp_customize->add_setting( 'theme_options[readmore_text]',
	array(
	'default'           => $default['readmore_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'prime_interior_designer_sanitize_textarea_content',
	'transport'         => 'refresh',
	)
);

$wp_customize->add_control( 'theme_options[readmore_text]',
	array(
	'label'    => __( 'Button Label', 'prime-interior-designer' ),
	'section'  => 'section_blog_setting',
	'type'     => 'text',
	)
);

// Footer Setting Section starts
$wp_customize->add_section('section_footer', 
	array(    
	'title'       => __('Footer Setting', 'prime-interior-designer'),
	'panel'       => 'theme_option_panel'    
	)
);

/** Footer Copyright control */
$wp_customize->add_setting( 
    'theme_options[prime_interior_designer_footer_setting]', 
    array(
        'default'           => $default['prime_interior_designer_footer_setting'],
        'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[prime_interior_designer_footer_setting]',
    array(
        'label'       => __( 'Show Footer Copyright', 'prime-interior-designer' ),
        'section'     => 'section_footer',
        'type'        => 'checkbox',
    )
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'refresh',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => __( 'Copyright Text', 'prime-interior-designer' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);

// General Setting Section starts
$wp_customize->add_section('section_general_setting', 
	array(    
	'title'       => __('General Setting', 'prime-interior-designer'),
	'panel'       => 'theme_option_panel'    
	)
);

/** Scroll to top control */
$wp_customize->add_setting( 
    'theme_options[header_donate_scroll_to_top]', 
    array(
        'default'           => $default['header_donate_scroll_to_top'],
        'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[header_donate_scroll_to_top]',
    array(
        'label'       => __( 'Show Scroll To Top', 'prime-interior-designer' ),
        'section'     => 'section_general_setting',
        'type'        => 'checkbox',
    )
);

/** Preloder control */
$wp_customize->add_setting( 
    'theme_options[header_donate_preloader_setting]', 
    array(
        'default'           => $default['header_donate_preloader_setting'],
        'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[header_donate_preloader_setting]',
    array(
        'label'       => __( 'Show Preloader', 'prime-interior-designer' ),
        'section'     => 'section_general_setting',
        'type'        => 'checkbox',
    )
);

/** Sticky Header control */
$wp_customize->add_setting( 
    'theme_options[prime_interior_designer_sticky_header]', 
    array(
        'default'           => $default['prime_interior_designer_sticky_header'],
        'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[prime_interior_designer_sticky_header]',
    array(
        'label'       => __( 'Show Sticky Header', 'prime-interior-designer' ),
        'section'     => 'section_general_setting',
        'type'        => 'checkbox',
    )
);

// Homepage Static setting and control.
$wp_customize->add_setting( 'theme_options[enable_frontpage_content]', array(
	'default'             => $default['enable_frontpage_content'],
	'sanitize_callback'   => 'prime_interior_designer_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[enable_frontpage_content]', array(
	'label'       	=> __( 'Enable Content', 'prime-interior-designer' ),
	'description' 	=> __( 'Click to enable content on static front page only.', 'prime-interior-designer' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
) );

// Show / Hide Frontpage Content
$wp_customize->add_setting( 'theme_options[enable_frontpage_content]', array(
	'default'             => $default['enable_frontpage_content'],
	'sanitize_callback'   => 'prime_interior_designer_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Homepage Content', 'prime-interior-designer' ),
	'description' 	=> esc_html__( 'Enable content on A static page.', 'prime-interior-designer' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
) );

// Show / Hide Header Image
$wp_customize->add_setting( 'theme_options[show_header_image]', array(
	'default'           => $default['show_header_image'],
	'sanitize_callback' => 'prime_interior_designer_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[show_header_image]', array(
	'label'              => esc_html__( 'Display Header Image', 'prime-interior-designer' ),
	'section'            => 'header_image',
	'type'               => 'select',
	'choices' 	         => array(		
		'header-image-enable' 	   => 'Yes',						
		'header-image-disable'     => 'No',
	),	
) );