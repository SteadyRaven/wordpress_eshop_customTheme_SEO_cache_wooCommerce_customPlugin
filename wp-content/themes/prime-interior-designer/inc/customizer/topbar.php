<?php

$default = prime_interior_designer_get_default_theme_options();
/**
* Add Header Top Panel
*/
$wp_customize->add_panel( 'header_top_panel', array(
    'title'          => __( 'Header Top', 'prime-interior-designer' ),
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
) );

/** Header contact info section */
$wp_customize->add_section(
    'header_contact_info_section',
    array(
        'title'    => __( 'Topbar Discount Text', 'prime-interior-designer' ),
        'panel'    => 'header_top_panel',
        'priority' => 10,
    )
);

/** Header contact info control */
$wp_customize->add_setting( 
    'theme_options[show_header_contact_info]', 
    array(
        'default'           => $default['show_header_contact_info'],
        'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[show_header_contact_info]',
    array(
        'label'       => __( 'Show Discount Text', 'prime-interior-designer' ),
        'section'     => 'header_contact_info_section',
        'type'        => 'checkbox',
    )
);

$wp_customize->add_setting( 'theme_options[header_discount_text]', array(
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
    'theme_options[header_discount_text]',
    array(
        'label'           => __( 'Discount Text', 'prime-interior-designer' ),
        'description'     => __( 'Enter Text.', 'prime-interior-designer' ),
        'section'         => 'header_contact_info_section',
        'active_callback' => 'prime_interior_designer_contact_info_ac',
    )
);








/** Header Button section */
$wp_customize->add_section(
    'header_button_info_section',
    array(
        'title'    => __( 'Header Button', 'prime-interior-designer' ),
        'panel'    => 'header_top_panel',
        'priority' => 10,
    )
);

/** Header contact info control */
$wp_customize->add_setting( 
    'theme_options[show_header_button_info]', 
    array(
        'default'           => $default['show_header_button_info'],
        'sanitize_callback' => 'prime_interior_designer_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[show_header_button_info]',
    array(
        'label'       => __( 'Show Button', 'prime-interior-designer' ),
        'section'     => 'header_button_info_section',
        'type'        => 'checkbox',
    )
);

$wp_customize->add_setting( 'theme_options[header_button_txt]', array(
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
    'theme_options[header_button_txt]',
    array(
        'label'           => __( 'Button Text', 'prime-interior-designer' ),
        'description'     => __( 'Enter Text.', 'prime-interior-designer' ),
        'section'         => 'header_button_info_section',
        'active_callback' => 'prime_interior_designer_button_info_ac',
    )
);

$wp_customize->add_setting( 'theme_options[header_button_url]', array(
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control(
    'theme_options[header_button_url]',
    array(
        'label'           => __( 'Button Link', 'prime-interior-designer' ),
        'description'     => __( 'Enter Link.', 'prime-interior-designer' ),
        'section'         => 'header_button_info_section',
        'active_callback' => 'prime_interior_designer_button_info_ac',
    )
);