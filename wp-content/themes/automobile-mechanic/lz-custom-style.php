<?php 

	$automobile_mechanic_custom_style = '';

	// Logo Size
	$automobile_mechanic_logo_top_padding = get_theme_mod('automobile_mechanic_logo_top_padding');
	$automobile_mechanic_logo_bottom_padding = get_theme_mod('automobile_mechanic_logo_bottom_padding');
	$automobile_mechanic_logo_left_padding = get_theme_mod('automobile_mechanic_logo_left_padding');
	$automobile_mechanic_logo_right_padding = get_theme_mod('automobile_mechanic_logo_right_padding');

	if( $automobile_mechanic_logo_top_padding != '' || $automobile_mechanic_logo_bottom_padding != '' || $automobile_mechanic_logo_left_padding != '' || $automobile_mechanic_logo_right_padding != ''){
		$automobile_mechanic_custom_style .=' .logo {';
			$automobile_mechanic_custom_style .=' padding-top: '.esc_attr($automobile_mechanic_logo_top_padding).'px; padding-bottom: '.esc_attr($automobile_mechanic_logo_bottom_padding).'px; padding-left: '.esc_attr($automobile_mechanic_logo_left_padding).'px; padding-right: '.esc_attr($automobile_mechanic_logo_right_padding).'px;';
		$automobile_mechanic_custom_style .=' }';
	}

	// Header Image
	$header_image_url = automobile_mechanic_banner_image( $image_url = '' );
	if( $header_image_url != ''){
		$automobile_mechanic_custom_style .=' #inner-pages-header {';
			$automobile_mechanic_custom_style .=' background-image: url('. esc_url( $header_image_url ).'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;';
		$automobile_mechanic_custom_style .=' }';
	} else {
		$automobile_mechanic_custom_style .=' #inner-pages-header {';
			$automobile_mechanic_custom_style .=' background: radial-gradient(circle at center, rgba(0,0,0,0) 0%, #000000 100%); ';
		$automobile_mechanic_custom_style .=' }';
	}

	$automobile_mechanic_slider_hide_show = get_theme_mod('automobile_mechanic_slider_hide_show',false);
	if( $automobile_mechanic_slider_hide_show == true){
		$automobile_mechanic_custom_style .=' .page-template-custom-home-page #inner-pages-header {';
			$automobile_mechanic_custom_style .=' display:none;';
		$automobile_mechanic_custom_style .=' }';
	}

	$automobile_mechanic_site_title_color = get_theme_mod('automobile_mechanic_site_title_color');
	if ( $automobile_mechanic_site_title_color != '') {
		$automobile_mechanic_custom_style .=' h1.site-title a, p.site-title a {';
			$automobile_mechanic_custom_style .=' color:'.esc_attr($automobile_mechanic_site_title_color).';';
		$automobile_mechanic_custom_style .=' }';
	}

	$automobile_mechanic_site_tagline_color = get_theme_mod('automobile_mechanic_site_tagline_color');
	if ( $automobile_mechanic_site_tagline_color != '') {
		$automobile_mechanic_custom_style .=' p.site-description{';
			$automobile_mechanic_custom_style .=' color:'.esc_attr($automobile_mechanic_site_tagline_color).';';
		$automobile_mechanic_custom_style .=' }';
	}

	//Topbar color
	$automobile_mechanic_topbar_text_color = get_theme_mod('automobile_mechanic_topbar_text_color');
	if ( $automobile_mechanic_topbar_text_color != '') {
		$automobile_mechanic_custom_style .=' p.topbar-text {';
			$automobile_mechanic_custom_style .=' color:'.esc_attr($automobile_mechanic_topbar_text_color).';';
		$automobile_mechanic_custom_style .=' }';
	}

	$automobile_mechanic_topbar_notext_color = get_theme_mod('automobile_mechanic_topbar_notext_color');
	if ( $automobile_mechanic_topbar_notext_color != '') {
		$automobile_mechanic_custom_style .=' .phone span ,phone a {';
			$automobile_mechanic_custom_style .=' color:'.esc_attr($automobile_mechanic_topbar_notext_color).';';
		$automobile_mechanic_custom_style .=' }';
	}

	$automobile_mechanic_topbar_icon_color = get_theme_mod('automobile_mechanic_topbar_icon_color');
	$automobile_mechanic_topbar_iconbg_color = get_theme_mod('automobile_mechanic_topbar_iconbg_color');

	if ( $automobile_mechanic_topbar_icon_color != '') {
		$automobile_mechanic_custom_style .=' .phone i {';
			$automobile_mechanic_custom_style .=' color:'.esc_attr($automobile_mechanic_topbar_icon_color).'; background-color:'.esc_attr($automobile_mechanic_topbar_iconbg_color).';';
		$automobile_mechanic_custom_style .=' }';
	}

	//Slider color
	$automobile_mechanic_slidertitle_color = get_theme_mod('automobile_mechanic_slidertitle_color');
	if ( $automobile_mechanic_slidertitle_color != '') {
		$automobile_mechanic_custom_style .=' #slider h2 a {';
			$automobile_mechanic_custom_style .=' color:'.esc_attr($automobile_mechanic_slidertitle_color).';';
		$automobile_mechanic_custom_style .=' }';
	}

	$automobile_mechanic_slidertext_color = get_theme_mod('automobile_mechanic_slidertext_color');
	if ( $automobile_mechanic_slidertext_color != '') {
		$automobile_mechanic_custom_style .=' #slider p {';
			$automobile_mechanic_custom_style .=' color:'.esc_attr($automobile_mechanic_slidertext_color).';';
		$automobile_mechanic_custom_style .=' }';
	}

	$automobile_mechanic_sliderbtn_color = get_theme_mod('automobile_mechanic_sliderbtn_color');
	$automobile_mechanic_sliderbtnbg_color = get_theme_mod('automobile_mechanic_sliderbtnbg_color');

	if ( $automobile_mechanic_sliderbtn_color != '') {
		$automobile_mechanic_custom_style .=' #slider a.read-btn, #service-section .service-content a.service-btn {';
			$automobile_mechanic_custom_style .=' color:'.esc_attr($automobile_mechanic_sliderbtn_color).'; background-color:'.esc_attr($automobile_mechanic_sliderbtnbg_color).';';
		$automobile_mechanic_custom_style .=' }';
	}

	//Feature color
	$automobile_mechanic_featureicon_color = get_theme_mod('automobile_mechanic_featureicon_color');
	if ( $automobile_mechanic_featureicon_color != '') {
		$automobile_mechanic_custom_style .=' .feature-icon i {';
			$automobile_mechanic_custom_style .=' color:'.esc_attr($automobile_mechanic_featureicon_color).';';
		$automobile_mechanic_custom_style .=' }';
	}

	$automobile_mechanic_featureiconbg_color = get_theme_mod('automobile_mechanic_featureiconbg_color');
	if ( $automobile_mechanic_featureiconbg_color != '') {
		$automobile_mechanic_custom_style .=' .feature-icon {';
			$automobile_mechanic_custom_style .=' background-color:'.esc_attr($automobile_mechanic_featureiconbg_color).';';
		$automobile_mechanic_custom_style .=' }';
	}

	$automobile_mechanic_featuretitle_color = get_theme_mod('automobile_mechanic_featuretitle_color');
	if ( $automobile_mechanic_featuretitle_color != '') {
		$automobile_mechanic_custom_style .=' .feature-box h3 a {';
			$automobile_mechanic_custom_style .=' color:'.esc_attr($automobile_mechanic_featuretitle_color).';';
		$automobile_mechanic_custom_style .=' }';
	}

	$automobile_mechanic_featuretext_color = get_theme_mod('automobile_mechanic_featuretext_color');
	if ( $automobile_mechanic_featuretext_color != '') {
		$automobile_mechanic_custom_style .=' .feature-box p {';
			$automobile_mechanic_custom_style .=' color:'.esc_attr($automobile_mechanic_featuretext_color).';';
		$automobile_mechanic_custom_style .=' }';
	}

	$automobile_mechanic_featurelink_color = get_theme_mod('automobile_mechanic_featurelink_color');
	if ( $automobile_mechanic_featurelink_color != '') {
		$automobile_mechanic_custom_style .=' .feature-box p a {';
			$automobile_mechanic_custom_style .=' color:'.esc_attr($automobile_mechanic_featurelink_color).';';
		$automobile_mechanic_custom_style .=' }';
	}

	$automobile_mechanic_featurebg_color = get_theme_mod('automobile_mechanic_featurebg_color');
	if ( $automobile_mechanic_featurebg_color != '') {
		$automobile_mechanic_custom_style .=' .feature-box {';
			$automobile_mechanic_custom_style .=' background-color:'.esc_attr($automobile_mechanic_featurebg_color).';';
		$automobile_mechanic_custom_style .=' }';
	}

	//Service color
	$automobile_mechanic_service_color = get_theme_mod('automobile_mechanic_service_color');
	if ( $automobile_mechanic_service_color != '') {
		$automobile_mechanic_custom_style .=' #service-section h3 {';
			$automobile_mechanic_custom_style .=' color:'.esc_attr($automobile_mechanic_service_color).';';
		$automobile_mechanic_custom_style .=' }';
	}

	$automobile_mechanic_servicetitle_color = get_theme_mod('automobile_mechanic_servicetitle_color');
	if ( $automobile_mechanic_servicetitle_color != '') {
		$automobile_mechanic_custom_style .=' #service-section .service-content h4 a {';
			$automobile_mechanic_custom_style .=' color:'.esc_attr($automobile_mechanic_servicetitle_color).';';
		$automobile_mechanic_custom_style .=' }';
	}

	$automobile_mechanic_servicetext_color = get_theme_mod('automobile_mechanic_servicetext_color');
	if ( $automobile_mechanic_servicetext_color != '') {
		$automobile_mechanic_custom_style .=' #service-section .service-content p {';
			$automobile_mechanic_custom_style .=' color:'.esc_attr($automobile_mechanic_servicetext_color).';';
		$automobile_mechanic_custom_style .=' }';
	}

	$automobile_mechanic_servicebg_color = get_theme_mod('automobile_mechanic_servicebg_color');
	if ( $automobile_mechanic_servicebg_color != '') {
		$automobile_mechanic_custom_style .=' #service-section .service-content {';
			$automobile_mechanic_custom_style .=' background-color:'.esc_attr($automobile_mechanic_servicebg_color).';';
		$automobile_mechanic_custom_style .=' }';
	}

	$automobile_mechanic_servicebtn_color = get_theme_mod('automobile_mechanic_servicebtn_color');
	$automobile_mechanic_servicebtnbg_color = get_theme_mod('automobile_mechanic_servicebtnbg_color');

	if ( $automobile_mechanic_servicebtn_color != '') {
		$automobile_mechanic_custom_style .=' #service-section .service-content a.service-btn {';
			$automobile_mechanic_custom_style .='color:'.esc_attr($automobile_mechanic_servicebtn_color).'; background-color:'.esc_attr($automobile_mechanic_servicebtnbg_color).';';
		$automobile_mechanic_custom_style .=' }';
	}