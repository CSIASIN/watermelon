<?php

/**
 * Enqueue styles & scripts
 *
 * @package Bootscore 
 * @version 6.0.3
 */


// Exit if accessed directly
defined('ABSPATH') || exit;



/**
 * Enqueue scripts and styles
 */
function wm_scripts_enqueue() {
  $bootstrapjs    = date('YmdHi', filemtime(get_template_directory() . '/js/bootstrap.bundle.min.js'));
  $colormodes        = date('YmdHi', filemtime(get_template_directory() . '/js/color-modes.js'));
  // Bootstrap JS
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js',  array(), '5.3.8',  array('in_footer' => true, 'strategy'  => 'defer',), $bootstrapjs, true);

  // Color Modes JS
  wp_enqueue_script('color-modes', get_template_directory_uri() . '/js/color-modes.js',array(), '1.0.0',  array('in_footer' => true, 'strategy'  => 'defer',), $colormodes, true);
}

add_action('wp_enqueue_scripts', 'wm_scripts_enqueue');
