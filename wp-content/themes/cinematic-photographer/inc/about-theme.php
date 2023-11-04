<?php
/**
 * Cinematic Photographer Theme Page
 *
 * @package Cinematic Photographer
 */

function cinematic_photographer_admin_scripts() {
	wp_dequeue_script('cinematic-photographer-custom-scripts');
}
add_action( 'admin_enqueue_scripts', 'cinematic_photographer_admin_scripts' );

if ( ! defined( 'CINEMATIC_PHOTOGRAPHER_FREE_THEME_URL' ) ) {
	define( 'CINEMATIC_PHOTOGRAPHER_FREE_THEME_URL', 'https://www.themespride.com/themes/free-photographer-wordpress-theme/' );
}
if ( ! defined( 'CINEMATIC_PHOTOGRAPHER_PRO_THEME_URL' ) ) {
	define( 'CINEMATIC_PHOTOGRAPHER_PRO_THEME_URL', 'https://www.themespride.com/themes/cinematic-wordpress-theme/' );
}
if ( ! defined( 'CINEMATIC_PHOTOGRAPHER_DEMO_THEME_URL' ) ) {
	define( 'CINEMATIC_PHOTOGRAPHER_DEMO_THEME_URL', 'https://www.themespride.com/cinematic-photographer-pro/' );
}
if ( ! defined( 'CINEMATIC_PHOTOGRAPHER_DOCS_THEME_URL' ) ) {
    define( 'CINEMATIC_PHOTOGRAPHER_DOCS_THEME_URL', 'https://www.themespride.com/demo/docs/cinematic-photographer/' );
}
if ( ! defined( 'CINEMATIC_PHOTOGRAPHER_DOCS_URL' ) ) {
    define( 'CINEMATIC_PHOTOGRAPHER_DOCS_URL', 'https://www.themespride.com/demo/docs/cinematic-photographer/' );
}
if ( ! defined( 'CINEMATIC_PHOTOGRAPHER_RATE_THEME_URL' ) ) {
    define( 'CINEMATIC_PHOTOGRAPHER_RATE_THEME_URL', 'https://wordpress.org/support/theme/cinematic-photographer/reviews/#new-post' );
}
if ( ! defined( 'CINEMATIC_PHOTOGRAPHER_SUPPORT_THEME_URL' ) ) {
    define( 'CINEMATIC_PHOTOGRAPHER_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/cinematic-photographer' );
}

if ( ! defined( 'CINEMATIC_PHOTOGRAPHER_CHANGELOG_THEME_URL' ) ) {
    define( 'CINEMATIC_PHOTOGRAPHER_CHANGELOG_THEME_URL', get_template_directory() . '/readme.txt' );
}

/**
 * Add theme page
 */
function cinematic_photographer_menu() {
	add_theme_page( esc_html__( 'About Theme', 'cinematic-photographer' ), esc_html__( 'About Theme', 'cinematic-photographer' ), 'edit_theme_options', 'cinematic-photographer-about', 'cinematic_photographer_about_display' );
}
add_action( 'admin_menu', 'cinematic_photographer_menu' );

/**
 * Display About page
 */
function cinematic_photographer_about_display() {
	$cinematic_photographer_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $cinematic_photographer_theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$cinematic_photographer_description = explode( '. ', $cinematic_photographer_theme->get( 'Description' ) );

					array_pop( $cinematic_photographer_description );

					$cinematic_photographer_description = implode( '. ', $cinematic_photographer_description );

					echo esc_html( $cinematic_photographer_description . '.' );
				?></p>
				<p class="actions">
					<a href="<?php echo esc_url( CINEMATIC_PHOTOGRAPHER_FREE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'cinematic-photographer' ); ?></a>

					<a href="<?php echo esc_url( CINEMATIC_PHOTOGRAPHER_DEMO_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'cinematic-photographer' ); ?></a>

					<a href="<?php echo esc_url( CINEMATIC_PHOTOGRAPHER_DOCS_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'cinematic-photographer' ); ?></a>

					<a href="<?php echo esc_url( CINEMATIC_PHOTOGRAPHER_RATE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Rate this theme', 'cinematic-photographer' ); ?></a>

					<a href="<?php echo esc_url( CINEMATIC_PHOTOGRAPHER_PRO_THEME_URL ); ?>" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'cinematic-photographer' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $cinematic_photographer_theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'cinematic-photographer' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'cinematic-photographer-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'cinematic-photographer-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'cinematic-photographer' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'cinematic-photographer-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'cinematic-photographer' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'cinematic-photographer-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'cinematic-photographer' ); ?></a>
		</nav>

		<?php
			cinematic_photographer_main_screen();

			cinematic_photographer_changelog_screen();

			cinematic_photographer_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'cinematic-photographer' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'cinematic-photographer' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'cinematic-photographer' ) : esc_html_e( 'Go to Dashboard', 'cinematic-photographer' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function cinematic_photographer_main_screen() {
	if ( isset( $_GET['page'] ) && 'cinematic-photographer-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'cinematic-photographer' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'cinematic-photographer' ) ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'cinematic-photographer' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'cinematic-photographer' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'cinematic-photographer' ) ?></p>
				<p><a href="<?php echo esc_url( CINEMATIC_PHOTOGRAPHER_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'cinematic-photographer' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Upgrade To Premium With Straight 20% OFF.', 'cinematic-photographer' ); ?></h2>
				<p><?php esc_html_e( 'Get our amazing WordPress theme with exclusive 20% off use the coupon', 'cinematic-photographer' ) ?>"<input type="text" value="GETPro20" id="myInput">".</p>
				<button class="button button-primary" onclick="cinematic_photographer_text_copyied()"><?php esc_html_e( 'GETPro20', 'cinematic-photographer' ); ?></button>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function cinematic_photographer_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'cinematic-photographer' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'cinematic_photographer_changelog_file', CINEMATIC_PHOTOGRAPHER_CHANGELOG_THEME_URL );

				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = cinematic_photographer_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
	<?php
	}
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function cinematic_photographer_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';

	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function cinematic_photographer_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'cinematic-photographer' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'cinematic-photographer' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'cinematic-photographer' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'Theme Demo Set Up', 'cinematic-photographer' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Templates, Color options and Fonts', 'cinematic-photographer' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Included Demo Content', 'cinematic-photographer' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Section Ordering', 'cinematic-photographer' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Multiple Sections', 'cinematic-photographer' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Plugins', 'cinematic-photographer' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Premium Technical Support', 'cinematic-photographer' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access to Support Forums', 'cinematic-photographer' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Free updates', 'cinematic-photographer' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Unlimited Domains', 'cinematic-photographer' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'cinematic-photographer' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Live Customizer', 'cinematic-photographer' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn" href="<?php echo esc_url(CINEMATIC_PHOTOGRAPHER_PRO_THEME_URL);?>"><?php esc_html_e( 'Go for Premium', 'cinematic-photographer' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}
