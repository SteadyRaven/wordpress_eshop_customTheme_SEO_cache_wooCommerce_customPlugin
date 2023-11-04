<?php
//about theme info
add_action( 'admin_menu', 'scuba_diving_sport_gettingstarted' );
function scuba_diving_sport_gettingstarted() {
	add_theme_page( esc_html__('Scuba Diving Sport', 'scuba-diving-sport'), esc_html__('Scuba Diving Sport', 'scuba-diving-sport'), 'edit_theme_options', 'scuba_diving_sport_about', 'scuba_diving_sport_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function scuba_diving_sport_admin_theme_style() {
	wp_enqueue_style('scuba-diving-sport-custom-admin-style', esc_url(get_template_directory_uri()) . '/includes/getstart/getstart.css');
	wp_enqueue_script('scuba-diving-sport-tabs', esc_url(get_template_directory_uri()) . '/includes/getstart/js/tab.js');
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'scuba_diving_sport_admin_theme_style');

// Changelog
if ( ! defined( 'SCUBA_DIVING_SPORT_CHANGELOG_URL' ) ) {
    define( 'SCUBA_DIVING_SPORT_CHANGELOG_URL', get_template_directory() . '/readme.txt' );
}

function scuba_diving_sport_changelog_screen() {	
	global $wp_filesystem;
	$changelog_file = apply_filters( 'scuba_diving_sport_changelog_file', SCUBA_DIVING_SPORT_CHANGELOG_URL );
	if ( $changelog_file && is_readable( $changelog_file ) ) {
		WP_Filesystem();
		$changelog = $wp_filesystem->get_contents( $changelog_file );
		$changelog_list = scuba_diving_sport_parse_changelog( $changelog );
		echo wp_kses_post( $changelog_list );
	}
}

function scuba_diving_sport_parse_changelog( $content ) {
	$content = explode ( '== ', $content );
	$changelog_isolated = '';
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}
	$changelog_array = explode( '= ', $changelog_isolated );
	unset( $changelog_array[0] );
	$changelog = '<div class="changelog">';
	foreach ( $changelog_array as $value) {
		$value = preg_replace( '/\n+/', '</span><span>', $value );
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div><hr>';
		$changelog .= str_replace( '<span></span>', '', $value );
	}
	$changelog .= '</div>';
	return wp_kses_post( $changelog );
}

//guidline for about theme
function scuba_diving_sport_mostrar_guide() {
	//custom function about theme customizer
	$scuba_diving_sport_return = add_query_arg( array()) ;
	$scuba_diving_sport_theme = wp_get_theme( 'scuba-diving-sport' );
?>

    <div class="top-head">
		<div class="top-title">
			<h2><?php esc_html_e( 'Scuba Diving Sport', 'scuba-diving-sport' ); ?></h2>
		</div>
		<div class="top-right">
			<span class="version"><?php esc_html_e( 'Version', 'scuba-diving-sport' ); ?>: <?php echo esc_html($scuba_diving_sport_theme['Version']);?></span>
		</div>
    </div>

    <div class="inner-cont">

	    <div class="tab-sec">
	    	<div class="tab">
				<button class="tablinks" onclick="scuba_diving_sport_open_tab(event, 'wpelemento_importer_editor')"><?php esc_html_e( 'Setup With Elementor', 'scuba-diving-sport' ); ?></button>
				<button class="tablinks" onclick="scuba_diving_sport_open_tab(event, 'setup_customizer')"><?php esc_html_e( 'Setup With Customizer', 'scuba-diving-sport' ); ?></button>
				<button class="tablinks" onclick="scuba_diving_sport_open_tab(event, 'changelog_cont')"><?php esc_html_e( 'Changelog', 'scuba-diving-sport' ); ?></button>
			</div>

			<div id="wpelemento_importer_editor" class="tabcontent open">
				<?php if(!class_exists('WPElemento_Importer_ThemeWhizzie')){
					$plugin_ins = Scuba_Diving_Sport_Plugin_Activation_WPElemento_Importer::get_instance();
					$scuba_diving_sport_actions = $plugin_ins->recommended_actions;
					?>
					<div class="scuba-diving-sport-recommended-plugins ">
							<div class="scuba-diving-sport-action-list">
								<?php if ($scuba_diving_sport_actions): foreach ($scuba_diving_sport_actions as $key => $scuba_diving_sport_actionValue): ?>
										<div class="scuba-diving-sport-action" id="<?php echo esc_attr($scuba_diving_sport_actionValue['id']);?>">
											<div class="action-inner plugin-activation-redirect">
												<h3 class="action-title"><?php echo esc_html($scuba_diving_sport_actionValue['title']); ?></h3>
												<div class="action-desc"><?php echo esc_html($scuba_diving_sport_actionValue['desc']); ?></div>
												<?php echo wp_kses_post($scuba_diving_sport_actionValue['link']); ?>
											</div>
										</div>
									<?php endforeach;
								endif; ?>
							</div>
					</div>
				<?php }else{ ?>
					<div class="tab-outer-box">
						<h3><?php esc_html_e('Welcome to WPElemento Theme!', 'scuba-diving-sport'); ?></h3>
						<p><?php esc_html_e('Click on the quick start button to import the demo.', 'scuba-diving-sport'); ?></p>
						<div class="info-link">
							<a  href="<?php echo esc_url( admin_url('admin.php?page=wpelementoimporter-wizard') ); ?>"><?php esc_html_e('Quick Start', 'scuba-diving-sport'); ?></a>
						</div>
					</div>
				<?php } ?>
			</div>

			<div id="setup_customizer" class="tabcontent">
				<div class="tab-outer-box">
				  	<div class="lite-theme-inner">
						<h3><?php esc_html_e('Theme Customizer', 'scuba-diving-sport'); ?></h3>
						<p><?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'scuba-diving-sport'); ?></p>
						<div class="info-link">
							<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'scuba-diving-sport'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Help Docs', 'scuba-diving-sport'); ?></h3>
						<p><?php esc_html_e('The complete procedure to configure and manage a WordPress Website from the beginning is shown in this documentation .', 'scuba-diving-sport'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( SCUBA_DIVING_SPORT_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'scuba-diving-sport'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Need Support?', 'scuba-diving-sport'); ?></h3>
						<p><?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'scuba-diving-sport'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( SCUBA_DIVING_SPORT_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'scuba-diving-sport'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Reviews & Testimonials', 'scuba-diving-sport'); ?></h3>
						<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'scuba-diving-sport'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( SCUBA_DIVING_SPORT_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'scuba-diving-sport'); ?></a>
						</div>
						<hr>
						<div class="link-customizer">
							<h3><?php esc_html_e( 'Link to customizer', 'scuba-diving-sport' ); ?></h3>
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','scuba-diving-sport'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','scuba-diving-sport'); ?></a>
									</div>
								</div>
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=header_image') ); ?>" target="_blank"><?php esc_html_e('Header Image','scuba-diving-sport'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','scuba-diving-sport'); ?></a>
									</div>
								</div>
							</div>
						</div>
				  	</div>
				</div>
			</div>

			<div id="changelog_cont" class="tabcontent">
				<div class="tab-outer-box">
					<?php scuba_diving_sport_changelog_screen(); ?>
				</div>
			</div>
			
		</div>

		<div class="inner-side-content">
			<h2><?php esc_html_e('Premium Theme', 'scuba-diving-sport'); ?></h2>
			<div class="tab-outer-box">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
				<h3><?php esc_html_e('Scuba Diving Sport WordPress Theme', 'scuba-diving-sport'); ?></h3>
				<div class="iner-sidebar-pro-btn">
					<span class="premium-btn"><a href="<?php echo esc_url( SCUBA_DIVING_SPORT_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Premuim', 'scuba-diving-sport'); ?></a>
					</span>
					<span class="demo-btn"><a href="<?php echo esc_url( SCUBA_DIVING_SPORT_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'scuba-diving-sport'); ?></a>
					</span>
					<span class="doc-btn"><a href="<?php echo esc_url( SCUBA_DIVING_SPORT_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e('Theme Bundle', 'scuba-diving-sport'); ?></a>
					</span>
				</div>
				<hr>
				<div class="premium-coupon">
					<div class="premium-features">
						<h3><?php esc_html_e('premium Features', 'scuba-diving-sport'); ?></h3>
						<ul>
							<li><?php esc_html_e( 'Multilingual', 'scuba-diving-sport' ); ?></li>
							<li><?php esc_html_e( 'Drag and drop features', 'scuba-diving-sport' ); ?></li>
							<li><?php esc_html_e( 'Zero Coding Required', 'scuba-diving-sport' ); ?></li>
							<li><?php esc_html_e( 'Mobile Friendly Layout', 'scuba-diving-sport' ); ?></li>
							<li><?php esc_html_e( 'Responsive Layout', 'scuba-diving-sport' ); ?></li>
							<li><?php esc_html_e( 'Unique Designs', 'scuba-diving-sport' ); ?></li>
						</ul>
					</div>
					<div class="coupon-box">
						<h3><?php esc_html_e('Use Coupon Code', 'scuba-diving-sport'); ?></h3>
						<a class="coupon-btn" href="<?php echo esc_url( SCUBA_DIVING_SPORT_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('UPGRADE NOW', 'scuba-diving-sport'); ?></a>
						<div class="coupon-container">
							<h3><?php esc_html_e( 'elemento20', 'scuba-diving-sport' ); ?></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>