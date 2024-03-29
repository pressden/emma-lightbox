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
  $lightbox_library_js = plugin_dir_url( __FILE__ ) . 'vendor/lightgallery/lightgallery.min.js';
  $lightbox_library_css = plugin_dir_url( __FILE__ ) . 'vendor/lightgallery/css/lightgallery-bundle.min.css';
  $lightbox_library_version = '2.7.1';

  $lightbox_default_plugins = array(
    'thumbnail' => 'lg-thumbnail',
  );
  $lightbox_plugins = apply_filters( 'emma_lightbox_plugins', $lightbox_default_plugins );
  
  wp_enqueue_style( 'emma-lightbox-library', $lightbox_library_css, [], $lightbox_library_version );
  wp_enqueue_script( 'emma-lightbox-library', $lightbox_library_js, [], $lightbox_library_version, true );
  foreach( $lightbox_plugins as $directory => $file ) {
    $plugin_js = plugin_dir_url( __FILE__ ) . 'vendor/lightgallery/plugins/' . $directory . '/' . $file . '.min.js';
    wp_enqueue_script( 'emma-lightbox-' . $directory . '-plugin', $plugin_js, ['emma-lightbox-library'], $lightbox_library_version, true );
  }
  
  $lightbox_frontend_js = plugin_dir_url( __FILE__ ) . 'js/lightbox-frontend.js';
  $lightbox_frontend_version = '1.0.0';

  wp_enqueue_script( 'emma-lightbox-frontend', $lightbox_frontend_js, ['emma-lightbox-library', 'emma'], $lightbox_frontend_version, true );

}
add_action( 'wp_enqueue_scripts', 'emma_lightbox_enqueue_frontend' );
