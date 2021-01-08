<?php
/*
Plugin Name: Emma Lightbox
Plugin URI: https://github.com/pressden/emma-lightbox
Description: Emma Lightbox is a WordPress plugin that adds a responsive lightbox effect for the Emma theme. To activate, simply add the "lightgallery" class to any image or container of images, and hyperlink images to their source.
Version: 1.0.0
Author: Eric Michel
Author URI: http://pressden.com/
License: GPLv2 or later
Text Domain: emma_lightbox
*/

/**
 * Register and enqueue frontend scripts and styles
 */
function emma_lightbox_enqueue_frontend() {
  $lightbox_library_js = plugin_dir_url( __FILE__ ) . 'vendor/lightgallery/js/lightgallery.min.js';
  $lightbox_library_css = plugin_dir_url( __FILE__ ) . 'vendor/lightgallery/css/lightgallery.min.css';
  $lightbox_library_version = '1.9.0';
  
  wp_enqueue_script( 'lightbox-library', $lightbox_library_js, [], $lightbox_library_version, true );
  wp_enqueue_style( 'lightbox-library', $lightbox_library_css, [], $lightbox_library_version );
  
  $lightbox_frontend_js = plugin_dir_url( __FILE__ ) . 'js/lightbox-frontend.js';
  $lightbox_frontend_version = '1.0.0';

  wp_enqueue_script( 'lightbox-frontend', $lightbox_frontend_js, ['lightbox-library'], $lightbox_frontend_version, true );

}
add_action( 'wp_enqueue_scripts', 'emma_lightbox_enqueue_frontend' );
