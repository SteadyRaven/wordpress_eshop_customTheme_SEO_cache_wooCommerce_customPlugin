<?php
/*Blog Page Settings*/

Kirki::add_section( 'sidebar_settings_section', array(
    'title'          => esc_html__( 'Sidebar Settings', 'fashion-blogging' ),
    'description'          => esc_html__( 'Control Sidebar Of Your Website', 'fashion-blogging' ),
    'panel'          => 'fashion_blogging_global_panel',
) );

Kirki::add_field( 'fashion_blogging_config', [
	'type'        => 'select',
	'settings'    => 'blog_page_sidebar',
	'label'       => esc_html__( 'Blog Page Sidebar', 'fashion-blogging' ),
	'section'     => 'sidebar_settings_section',
	'default'     => 'no',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'left' => esc_html__( 'left Sidebar', 'fashion-blogging' ),
		'right' => esc_html__( 'Right Sidebar', 'fashion-blogging' ),
		'no' => esc_html__( 'No Sidebar', 'fashion-blogging' ),
	],
] );

Kirki::add_field( 'fashion_blogging_config', [
	'type'        => 'select',
	'settings'    => 'archive_page_sidebar',
	'label'       => esc_html__( 'Archive Page Sidebar', 'fashion-blogging' ),
	'section'     => 'sidebar_settings_section',
	'default'     => 'no',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'left' => esc_html__( 'left Sidebar', 'fashion-blogging' ),
		'right' => esc_html__( 'Right Sidebar', 'fashion-blogging' ),
		'no' => esc_html__( 'No Sidebar', 'fashion-blogging' ),
	],
] );

Kirki::add_field( 'fashion_blogging_config', [
	'type'        => 'select',
	'settings'    => 'page_sidebar',
	'label'       => esc_html__( 'Page Sidebar', 'fashion-blogging' ),
	'section'     => 'sidebar_settings_section',
	'default'     => 'right',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'left' => esc_html__( 'left Sidebar', 'fashion-blogging' ),
		'right' => esc_html__( 'Right Sidebar', 'fashion-blogging' ),
		'no' => esc_html__( 'No Sidebar', 'fashion-blogging' ),
	],
] );

Kirki::add_field( 'fashion_blogging_config', [
	'type'        => 'select',
	'settings'    => 'post_sidebar',
	'label'       => esc_html__( 'Post Sidebar', 'fashion-blogging' ),
	'section'     => 'sidebar_settings_section',
	'default'     => 'no',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'left' => esc_html__( 'left Sidebar', 'fashion-blogging' ),
		'right' => esc_html__( 'Right Sidebar', 'fashion-blogging' ),
		'no' => esc_html__( 'No Sidebar', 'fashion-blogging' ),
	],
] );
