<?php

$cinematic_photographer_tp_theme_css = '';

//theme-color
$cinematic_photographer_tp_color_option = get_theme_mod('cinematic_photographer_tp_color_option');

if($cinematic_photographer_tp_color_option != false){
$cinematic_photographer_tp_theme_css .='button[type="submit"],.top-header,.main-navigation .menu > ul > li.highlight,.more-btn a,.box:before,.box:after,a.added_to_cart.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,a.added_to_cart.wc-forward,.page-numbers,.prev.page-numbers,.next.page-numbers,span.meta-nav,#theme-sidebar button[type="submit"],#footer button[type="submit"],#comments input[type="submit"],.site-info,.book-tkt-btn a.register-btn,#slider .carousel-control-prev-icon, #slider .carousel-control-next-icon,.main-navigation ul ul,.toggle-nav i , #return-to-top:hover,.main-navigation ul ul li:last-child {';
$cinematic_photographer_tp_theme_css .='background: '.esc_attr($cinematic_photographer_tp_color_option).';';
$cinematic_photographer_tp_theme_css .='}';
}
if($cinematic_photographer_tp_color_option != false){
$cinematic_photographer_tp_theme_css .='a,#theme-sidebar .textwidget a,#footer .textwidget a,.comment-body a,.entry-content a,.entry-summary a,.page-template-front-page .media-links a:hover,.topbar-home i.fas.fa-phone-volume,#theme-sidebar h3,#main-content a,
.more-btn a:hover,#slider .carousel-control-prev-icon:hover,#slider .carousel-control-next-icon:hover,.page-box h4 a,.readmore-btn a,.box-content a,code,#theme-sidebar button[type="submit"]:hover,.woocommerce #respond input#submit:hover,.woocommerce #respond input#submit:hover,#comments input[type="submit"]:hover, .main-navigation a:hover,#theme-sidebar a:hover,#footer a:hover,#theme-sidebar h3, #theme-sidebar h1.wp-block-heading, #theme-sidebar h2.wp-block-heading, #theme-sidebar h3.wp-block-heading,#theme-sidebar h4.wp-block-heading, #theme-sidebar h5.wp-block-heading, #theme-sidebar h6.wp-block-heading ,#theme-sidebar h3  {';
$cinematic_photographer_tp_theme_css .='color: '.esc_attr($cinematic_photographer_tp_color_option).';';
$cinematic_photographer_tp_theme_css .='}';
}
if($cinematic_photographer_tp_color_option != false){
$cinematic_photographer_tp_theme_css .='#theme-sidebar a:hover ,#footer a:hover {';
$cinematic_photographer_tp_theme_css .='border-color: '.esc_attr($cinematic_photographer_tp_color_option).';';
$cinematic_photographer_tp_theme_css .='}';
}


//preloader//

$cinematic_photographer_tp_preloader_color1_option = get_theme_mod('cinematic_photographer_tp_preloader_color1_option');
$cinematic_photographer_tp_preloader_color2_option = get_theme_mod('cinematic_photographer_tp_preloader_color2_option');
$cinematic_photographer_tp_preloader_bg_option = get_theme_mod('cinematic_photographer_tp_preloader_bg_option');


if($cinematic_photographer_tp_preloader_color1_option != false){
$cinematic_photographer_tp_theme_css .='.center1{';
	$cinematic_photographer_tp_theme_css .='border-color: '.esc_attr($cinematic_photographer_tp_preloader_color1_option).' !important;';
$cinematic_photographer_tp_theme_css .='}';
}
if($cinematic_photographer_tp_preloader_color1_option != false){
$cinematic_photographer_tp_theme_css .='.center1 .ring::before{';
	$cinematic_photographer_tp_theme_css .='background: '.esc_attr($cinematic_photographer_tp_preloader_color1_option).' !important;';
$cinematic_photographer_tp_theme_css .='}';
}
if($cinematic_photographer_tp_preloader_color2_option != false){
$cinematic_photographer_tp_theme_css .='.center2{';
	$cinematic_photographer_tp_theme_css .='border-color: '.esc_attr($cinematic_photographer_tp_preloader_color2_option).' !important;';
$cinematic_photographer_tp_theme_css .='}';
}
if($cinematic_photographer_tp_preloader_color2_option != false){
$cinematic_photographer_tp_theme_css .='.center2 .ring::before{';
	$cinematic_photographer_tp_theme_css .='background: '.esc_attr($cinematic_photographer_tp_preloader_color2_option).' !important;';
$cinematic_photographer_tp_theme_css .='}';
}
if($cinematic_photographer_tp_preloader_bg_option != false){
$cinematic_photographer_tp_theme_css .='.loader{';
	$cinematic_photographer_tp_theme_css .='background: '.esc_attr($cinematic_photographer_tp_preloader_bg_option).';';
$cinematic_photographer_tp_theme_css .='}';
}

// footer-bg-color
$cinematic_photographer_tp_footer_bg_color_option = get_theme_mod('cinematic_photographer_tp_footer_bg_color_option');

if($cinematic_photographer_tp_footer_bg_color_option != false){
$cinematic_photographer_tp_theme_css .='#footer{';
	$cinematic_photographer_tp_theme_css .='background: '.esc_attr($cinematic_photographer_tp_footer_bg_color_option).' !important;';
$cinematic_photographer_tp_theme_css .='}';
}
