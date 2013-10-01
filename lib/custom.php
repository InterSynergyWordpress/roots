<?php
/**
 * Custom functions
 */


function custom_scripts() {
  wp_enqueue_style('roots_custom', get_template_directory_uri() . '/bizstrap/css/app.css');
  // die(get_template_directory_uri().'/assets/css/app.css');
}
add_action('wp_enqueue_scripts', 'custom_scripts', 200);
