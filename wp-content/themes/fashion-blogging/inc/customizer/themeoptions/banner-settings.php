<?php

Kirki::add_section( 'banner_section', array(
    'title'          => esc_html__( 'Banner Settings', 'fashion-blogging' ),
    'description'    => esc_html__( 'Customize Banner section', 'fashion-blogging' ),
    'panel'          => 'fashion_blogging_global_panel',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'fashion_blogging_config', [
    'type'        => 'switch',
    'settings'    => 'banner_section_on_off',
    'label'       => esc_html__( 'Show/Hide Banner Section', 'fashion-blogging' ),
    'section'     => 'banner_section',
    'default'     => 0,
    'choices'     => [
        'on'  => esc_html__( 'Show', 'fashion-blogging' ),
        'off' => esc_html__( 'Hide', 'fashion-blogging' ),
    ],
] );

Kirki::add_field('fashion_blogging_config', [
    'type'        => 'select',
    'settings'    => 'select_post_types',
    'label'       => esc_html__( 'Select Post Type', 'fashion-blogging' ),
    'section'     => 'banner_section',
    'default'     => 'post',
    'placeholder' => esc_html__( 'Choose an option', 'fashion-blogging' ),
    'choices'     => array(
        'post' => esc_html__( 'Post', 'fashion-blogging' ),
        'products' => esc_html__( 'Products', 'fashion-blogging' )
    ),
] );

Kirki::add_field( 'fashion_blogging_config', [
    'type'        => 'typography',
    'settings'    => 'banner_title_typography',
    'label'       => esc_html__( 'Banner Title Typography', 'fashion-blogging' ),
    'section'     => 'banner_section',
    'default'     => [
        'font-family'    => 'Roboto',
        'variant'        => '700',
        'font-size'      => '3.375rem',
        'line-height'    => '1.6',
        'letter-spacing' => '0px',
        'color'          => '#000000',
        'text-transform' => 'none',
        'text-align'     => 'left',
    ],

    'transport'   => 'auto',
    'output'      => [
        [
            'element' => '.banner-title',
        ],
    ],
] );

Kirki::add_field( 'fashion_blogging_config', [
    'type'        => 'typography',
    'settings'    => 'banner_paragraph_typography',
    'label'       => esc_html__( 'Banner Paragraph Typography', 'fashion-blogging' ),
    'section'     => 'banner_section',
    'default'     => [
        'font-family'    => 'Roboto',
        'variant'        => 'regular',
        'font-size'      => '1rem',
        'line-height'    => '1.6',
        'letter-spacing' => '0px',
        'color'          => '#000000',
        'text-transform' => 'none',
        'text-align'     => 'left',
    ],
    'transport'   => 'auto',
    'output'      => [
        [
            'element' => '.banner-descriptions',
        ],
    ],
] );

Kirki::add_field( 'fashion_blogging_config', [
    'type'        => 'multicolor',
    'settings'    => 'banner_button_colors',
    'label'       => esc_html__( 'Button Color', 'fashion-blogging' ),
    'section'     => 'banner_section',
    'choices'     => [
        'btn_bg'    => esc_html__( 'Background Color', 'fashion-blogging' ),
        'btn_text'   => esc_html__( 'Text Color', 'fashion-blogging' ),
        'btn_hover_bg'   => esc_html__( 'Background Hover Color', 'fashion-blogging' ),
        'btn_hover_text'   => esc_html__( 'Text Hover Color', 'fashion-blogging' ),
    ],
    'transport' => 'auto',
    'default'     => [
        'btn_bg'    => '#ffbb67',
        'btn_text'   => '#ffffff',
        'btn_hover_bg'   => '#000000',
        'btn_hover_text'   => '#ffffff',
    ],
] );

