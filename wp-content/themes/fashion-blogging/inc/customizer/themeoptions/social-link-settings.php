<?php
Kirki::add_section( 'fashion_blogging_theme_social_settings', array(
    'title'          => esc_html__( 'Social Media Settings', 'fashion-blogging' ),
    'panel'          => 'fashion_blogging_global_panel',
) );

Kirki::add_field( 'fashion_blogging_config', [
    'type'        => 'text',
    'settings'    => 'social_facebook',
    'label'       => esc_html__( 'Facebook Link', 'fashion-blogging' ),
    'section'     => 'fashion_blogging_theme_social_settings',
    'default'     => esc_html__( 'https://facebook.com/', 'fashion-blogging' ),
    'transport'   => 'refresh',
] );
Kirki::add_field( 'fashion_blogging_config', [
    'type'        => 'text',
    'settings'    => 'social_instagram',
    'label'       => esc_html__( 'Instagram Link', 'fashion-blogging' ),
    'section'     => 'fashion_blogging_theme_social_settings',
    'default'     => esc_html__( 'https://instagram.com/', 'fashion-blogging' ),
    'transport'   => 'refresh',
] );
Kirki::add_field( 'fashion_blogging_config', [
    'type'        => 'text',
    'settings'    => 'social_linkedin',
    'label'       => esc_html__( 'LinkedIn Link', 'fashion-blogging' ),
    'section'     => 'fashion_blogging_theme_social_settings',
    'default'     => esc_html__( 'https://linkedin.com/', 'fashion-blogging' ),
    'transport'   => 'refresh',
] );
Kirki::add_field( 'fashion_blogging_config', [
    'type'        => 'text',
    'settings'    => 'social_twitter',
    'label'       => esc_html__( 'Twitter Link', 'fashion-blogging' ),
    'section'     => 'fashion_blogging_theme_social_settings',
    'default'     => esc_html__( 'https://twitter.com/', 'fashion-blogging' ),
    'transport'   => 'refresh',
] );

Kirki::add_field( 'fashion_blogging_config', [
    'type'        => 'color',
    'settings'    => 'social_link_color',
    'label'       => esc_html__( 'Social Media Link Color', 'fashion-blogging' ),
    'section'     => 'fashion_blogging_theme_social_settings',
    'default'     => '#ffffff',
    'transport'   => 'auto',
    'output' => array(
        array(
            'element'  => '.top-social #cssmenu ul.social-links li a',
            'property' => 'color',
        ),
    ),
] );

Kirki::add_field( 'fashion_blogging_config', [
    'type'        => 'color',
    'settings'    => 'social_link_color_hover',
    'label'       => esc_html__( 'Social Media Link Color Hover', 'fashion-blogging' ),
    'section'     => 'fashion_blogging_theme_social_settings',
    'default'     => '#484848',
    'transport'   => 'auto',
    'output' => array(
        array(
            'element'  => '.top-social #cssmenu ul.social-links li a:hover',
            'property' => 'color',
        ),
    ),
] );
?>