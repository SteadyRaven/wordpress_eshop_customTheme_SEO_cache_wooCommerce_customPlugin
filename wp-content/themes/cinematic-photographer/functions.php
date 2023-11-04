<?php
/**
 * Cinematic Photographer functions and definitions
 *
 * @package Cinematic Photographer
 * @subpackage cinematic_photographer
 */

function cinematic_photographer_setup() {

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'cinematic-photographer-featured-image', 2000, 1200, true );
	add_image_size( 'cinematic-photographer-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu'    => __( 'Primary Menu', 'cinematic-photographer' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', cinematic_photographer_fonts_url() ) );
}
add_action( 'after_setup_theme', 'cinematic_photographer_setup' );

/**
 * Register custom fonts.
 */
function cinematic_photographer_fonts_url(){
	$cinematic_photographer_font_url = '';
	$cinematic_photographer_font_family = array();
	$cinematic_photographer_font_family[] = 'Outfit:wght@100;200;300;400;500;600;700;800;900';
	$cinematic_photographer_font_family[] = 'Satisfy:wght@400';

	$cinematic_photographer_query_args = array(
		'family'	=> rawurlencode(implode('|',$cinematic_photographer_font_family)),
	);
	$cinematic_photographer_font_url = add_query_arg($cinematic_photographer_query_args,'//fonts.googleapis.com/css');
	return $cinematic_photographer_font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $cinematic_photographer_font_url ) );
}

/**
 * Register widget area.
 */
function cinematic_photographer_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'cinematic-photographer' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'cinematic-photographer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'cinematic-photographer' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'cinematic-photographer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'cinematic-photographer' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'cinematic-photographer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'cinematic-photographer' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'cinematic-photographer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'cinematic-photographer' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'cinematic-photographer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'cinematic-photographer' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'cinematic-photographer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'cinematic-photographer' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'cinematic-photographer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'cinematic_photographer_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cinematic_photographer_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'cinematic-photographer-fonts', cinematic_photographer_fonts_url(), array(), null );

	// Bootstrap
	wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

	// Bootstrap
	wp_enqueue_style( 'owl-carousel-css', get_theme_file_uri( '/assets/css/owl.carousel.css' ) );

	// Theme stylesheet.
	wp_enqueue_style( 'cinematic-photographer-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/tp-body-width-layout.php' );
	wp_add_inline_style( 'cinematic-photographer-style',$cinematic_photographer_tp_theme_css );
	wp_enqueue_style( 'cinematic-photographer-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/tp-theme-color.php' );
	wp_add_inline_style( 'cinematic-photographer-style',$cinematic_photographer_tp_theme_css );
	wp_style_add_data('cinematic-photographer-style', 'rtl', 'replace');

	// Theme stylesheet.
	wp_enqueue_style( 'cinematic-photographer-style', get_stylesheet_uri() );

	// Theme block stylesheet.
	wp_enqueue_style( 'cinematic-photographer-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'cinematic-photographer-style' ), '1.0' );

	// Fontawesome
	wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( '/assets/css/fontawesome-all.css' ) );

	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ), true );

	wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array( 'jquery' ), true );
	
	wp_enqueue_script( 'cinematic-photographer-custom-scripts', esc_url( get_template_directory_uri() ) . '/assets/js/custom.js', array('jquery'), true );

	wp_enqueue_script( 'cinematic-photographer-focus-nav', esc_url( get_template_directory_uri() ) . '/assets/js/focus-nav.js', array('jquery'), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cinematic_photographer_scripts' );

//Admin Enqueue for Admin
function cinematic_photographer_admin_enqueue_scripts(){
	wp_enqueue_style('cinematic-photographer-admin-style', esc_url( get_template_directory_uri() ) . '/assets/css/admin.css');
	wp_enqueue_script( 'cinematic-photographer-custom-scripts', esc_url( get_template_directory_uri() ). '/assets/js/custom.js', array('jquery'), true);
}
add_action( 'admin_enqueue_scripts', 'cinematic_photographer_admin_enqueue_scripts' );

function cinematic_photographer_activation_notice() { ?>
    <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="cinematic-photographer-getting-started-notice clearfix">
            <div class="cinematic-photographer-theme-notice-content">
                <h2 class="cinematic-photographer-notice-h2">
                    <?php
                printf(
                /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                    esc_html__( 'Welcome! Thank you for choosing %1$s!', 'cinematic-photographer' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                ?>
                </h2>

                <p class="plugin-install-notice"><?php echo sprintf(__('Click here to get started with the theme set-up.', 'cinematic-photographer')) ?></p>

                <a class="cinematic-photographer-btn-get-started button button-primary button-hero cinematic-photographer-button-padding" href="<?php echo esc_url( admin_url( 'themes.php?page=cinematic-photographer-about' )); ?>" ><?php esc_html_e( 'Get started', 'cinematic-photographer' ) ?></a><span class="cinematic-photographer-push-down">
                <?php
                    /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                    printf(
                        'or %1$sCustomize theme%2$s</a></span>',
                        '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                        '</a>'
                    );
                ?>
            </div>
        </div>
    </div>
<?php }

add_action( 'admin_notices', 'cinematic_photographer_activation_notice' );


/*radio button sanitization*/
function cinematic_photographer_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function cinematic_photographer_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'cinematic_photographer_loop_columns');
if (!function_exists('cinematic_photographer_loop_columns')) {
	function cinematic_photographer_loop_columns() {
		$columns = get_theme_mod( 'cinematic_photographer_per_columns', 3 );
		return $columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'cinematic_photographer_per_page', 20 );
function cinematic_photographer_per_page( $cols ) {
  	$cols = get_theme_mod( 'cinematic_photographer_product_per_page', 9 );
	return $cols;
}

function cinematic_photographer_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function cinematic_photographer_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function cinematic_photographer_sanitize_number_range( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 */
function cinematic_photographer_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'cinematic_photographer_front_page_template' );

/**
 * Logo Custamization.
 */

function cinematic_photographer_logo_width(){

	$cinematic_photographer_logo_width   = get_theme_mod( 'cinematic_photographer_logo_width', 150 );

	echo "<style type='text/css' media='all'>"; ?>
		img.custom-logo{
		    width: <?php echo absint( $cinematic_photographer_logo_width ); ?>px;
		    max-width: 100%;
		}
	<?php echo "</style>";
}

add_action( 'wp_head', 'cinematic_photographer_logo_width' );

define('CINEMATIC_PHOTOGRAPHER_CREDIT',__('https://www.themespride.com/themes/free-photographer-wordpress-theme/','cinematic-photographer') );
if ( ! function_exists( 'cinematic_photographer_credit' ) ) {
	function cinematic_photographer_credit(){
		echo "<a href=".esc_url(CINEMATIC_PHOTOGRAPHER_CREDIT)." target='_blank'>".esc_html__(get_theme_mod('cinematic_photographer_footer_text',__('Cinematic Photographer WordPress Theme','cinematic-photographer')))."</a>";
	}
}

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * Load Theme About Page
 */
require get_parent_theme_file_path( '/inc/about-theme.php' );

/**
 * Load Theme Web File
 */
require get_parent_theme_file_path('/inc/wptt-webfont-loader.php' );
/**
 * Load Toggle file
 */
require get_parent_theme_file_path( '/inc/customize-control-toggle.php' );
