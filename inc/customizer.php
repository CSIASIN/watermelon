<?php

/**
 * Watermelon Wordpress Theme Theme Customizer
 *
 * @package Watermelon_Wordpress_Theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function wm_customize_register($wp_customize)
{
	$wp_customize->remove_panel("widgets");
	$wp_customize->remove_section("colors"); // colors
	$wp_customize->remove_section("header_image"); // header image
	$wp_customize->remove_section("background_image"); // background image
	$wp_customize->remove_section("static_front_page");  // homepage settings
}
add_action('customize_register', 'wm_customize_register');

function wm_site_logo($wp_customize)
{
	//Settings
	$wp_customize->add_setting(
		'site_logo',
		array(
			'type' => 'theme_mod',
			'default' => '',
			'transport' => 'postMessage'
		)
	); //Setting for logo uploader

	//Controls
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'site_logo',
			array(
				'label'      => 'Upload a logo here of the site',
				'section'    => 'title_tagline',
				'settings'   => 'site_logo'
			)
		)
	);
}
add_action('customize_register', 'wm_site_logo');




require_once('customizer/header_js.php');
require_once('customizer/footer_js.php');
// require_once('customizer/layout.php');

require_once('customizer/theme_mode_toggle.php');

// require_once('customizer/responsive.php');
require_once('customizer/colors.php');
// require_once('customizer/menu.php');
// require_once('customizer/logo.php');

require_once('customizer/page-settings.php');
require_once('customizer/navbar.php');




function wm_customizer_settings_panel($wp_customize)
{

	$wp_customize->add_panel(
		'global_settings_panel',
		array(
			'title' => __('Global Settings'),
			'description' => esc_html__('Adjust your sections.'),
			'priority' => 1,
			'capability' => 'edit_theme_options',
		)
	);
}

add_action('customize_register', 'wm_customizer_settings_panel');
