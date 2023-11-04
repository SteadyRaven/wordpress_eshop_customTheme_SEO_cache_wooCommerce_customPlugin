<?php
/**
 * Enqueue scripts and styles.
 */
function fashion_blogging_scripts() {
	wp_enqueue_style( 'fontawesome', esc_url(get_theme_file_uri('assets/css/fontawesome.css')) );
	wp_enqueue_style( 'slick-theme', esc_url(get_theme_file_uri('assets/slick-1.8.1/slick/slick-theme.css')) );
	wp_enqueue_style( 'slick', esc_url(get_theme_file_uri('assets/slick-1.8.1/slick/slick.css')) );
	wp_enqueue_style( 'fashion-blogging-style', get_stylesheet_uri() );
	$buttonDColors = array(
        'btn_bg'    => '#ffbb67',
        'btn_text'   => '#ffffff',
        'btn_hover_bg'   => '#000000',
        'btn_hover_text'   => '#ffffff',
    );
	$buttonColors = get_theme_mod('banner_button_colors', $buttonDColors);
	$inline_style_data = '
	.hero-content .discover-me-button a{
        background-color: '.$buttonColors['btn_bg'].';
        color: '.$buttonColors['btn_text'].';
    }
    .hero-content .discover-me-button a:hover{
        background-color: '.$buttonColors['btn_hover_bg'].';
        color: '.$buttonColors['btn_hover_text'].';
    }
	';
	wp_add_inline_style('fashion-blogging-style', $inline_style_data);
	wp_enqueue_script( 'fashion-blogging-slick-js', esc_url( get_template_directory_uri() ) . '/assets/slick-1.8.1/slick/slick.js', array( 'jquery' ), NULL, true );
	wp_enqueue_script( 'imagesloaded.pkgd', esc_url( get_template_directory_uri() ) . '/assets/js/imagesloaded.pkgd.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'fashion-blogging-menu', esc_url( get_template_directory_uri() ) . '/assets/js/menu.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'fashion-blogging-active', esc_url( get_template_directory_uri() ) . '/assets/js/active.js', array( 'jquery' ), '1.0', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fashion_blogging_scripts' );

add_action('customize_controls_enqueue_scripts', 'fashion_blogging_customizer_scripts');
function fashion_blogging_customizer_scripts(){
	wp_enqueue_style('customizer-style', esc_url(get_theme_file_uri('inc/customizer/customizer-style.css')), array(), '49879', 'all');
}
