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
			// 'type' => 'theme_mod',
			// 'default' => '',
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





function wm_navbar_customizer_settings($wp_customize)
{
	$wp_customize->add_panel(
		'header_navigation_panel', // corrected spelling
		array(
			'title' => __('Header & Navigation'),
			'description' => esc_html__('Adjust your Header and Navigation sections.'), // Include html tags such as 
			'priority' => 160, // Not typically needed. Default is 160
			'capability' => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
			'theme_supports' => '', // Rarely needed
			'active_callback' => '', // Rarely needed
		)
	);

	// Then add the section inside that panel
	$wp_customize->add_section(
		'sample_custom_controls_section',
		array(
			'title' => __('Sample Custom Controls'),
			'description' => esc_html__('These are an example of Customizer Custom Controls.'),
			'panel' => 'header_navigation_panel', // Only needed if adding your Section to a Panel
			'priority' => 160, // Not typically needed. Default is 160
			'capability' => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
			'theme_supports' => '', // Rarely needed
			'active_callback' => '', // Rarely needed
			'description_hidden' => 'false', // Rarely needed. Default is False
		)
	);

	$wp_customize->add_setting(
		'sample_default_text',
		array(
			'default' => '',
			'transport' => 'refresh',
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
		)
	);

	// And a control
	$wp_customize->add_control(
		'sample_default_text',
		array(
			'default' => '',
			'transport' => 'refresh',
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'validate_callback' => '',
			'sanitize_callback' => '',
			'sanitize_js_callback' => '',
			'dirty' => false,
		)
	);
	$wp_customize->add_control(
		'sample_default_text',
		array(
			'label' => __('Sample Text Input'),
			'section' => 'sample_custom_controls_section',
			'type' => 'text',
		)
	);
}
add_action('customize_register', 'wm_navbar_customizer_settings');

