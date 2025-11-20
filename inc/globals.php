<?php

/**
 * Global Variables
 *
 * @package Watermelon_Wordpress_Theme
 * @version 1.0.0
 */


// Exit if directly accessed
defined('ABSPATH') || exit;

// Theme verison
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

// Home URL
if ( ! defined( 'HOMEURL' ) ) {
	define( 'HOMEURL', home_url());
}


/**
 * Excerpt support to pages
 */
add_post_type_support('page', 'excerpt');
