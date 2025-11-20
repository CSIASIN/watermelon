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
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'wm_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'wm_customize_partial_blogdescription',
			)
		);
		
	}
	
}
add_action('customize_register', 'wm_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function wm_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function wm_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wm_customize_preview_js()
{
	wp_enqueue_script('wm-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview', 'jquery'), '', true);
}
add_action('customize_preview_init', 'wm_customize_preview_js');



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






// function wm_navbar_customizer_settings($wp_customize)
// {

// 	$wp_customize->add_section('navbar_settings', array(
// 		'title'       => __('Navigation Bar', 'watermelon'),
// 	));

// 	$wp_customize->add_setting('navbar_bg_color', array(
// 		'default'           => '#ffffff',
// 	));

// 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'navbar_bg_color', array(
// 		'label'    => __('Navigation Background Color', 'watermelon'),
// 		'section'  => 'navbar_settings',
// 		'settings' => 'navbar_bg_color',
// 	)));
// }
// add_action('customize_register', 'wm_navbar_customizer_settings');

