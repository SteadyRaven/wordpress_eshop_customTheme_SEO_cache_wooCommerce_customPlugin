<?php

if ( ! defined( 'PRIME_INTERIOR_DESINGER_URL' ) ) {
    define( 'PRIME_INTERIOR_DESINGER_URL', esc_url( 'https://www.themeignite.com/products/interior-designer-wordpress-theme/', 'prime-interior-designer') );
}
if ( ! defined( 'PRIME_INTERIOR_DESINGER_TEXT' ) ) {
    define( 'PRIME_INTERIOR_DESINGER_TEXT', __( 'Prime Interior PRO','prime-interior-designer' ));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Prime_Interior_Designer_Customize {

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
		load_template( trailingslashit( get_template_directory() ) . '/inc/premium-link/button-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Prime_Interior_Designer_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Prime_Interior_Designer_Customize_Section_Pro( $manager,'prime_interior_designer_button_link', array(
			'priority'   => 1,
			'title'    => esc_html( PRIME_INTERIOR_DESINGER_TEXT, 'prime-interior-designer' ),
			'pro_text' => esc_html__( 'GO PRO', 'prime-interior-designer' ),
			'pro_url'  => esc_url( PRIME_INTERIOR_DESINGER_URL)
		) )	);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'prime-interior-designer-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/premium-link/assets/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'prime-interior-designer-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/premium-link/assets/customize-controls.css' );
	}
}

// Doing this customizer thang!
Prime_Interior_Designer_Customize::get_instance();