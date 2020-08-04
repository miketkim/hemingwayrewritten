<?php

add_action('wp_enqueue_scripts', 'my_parent_styles');
// This function will enable this child theme to inherit from the parent theme that we are using 
function my_parent_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
}

// Enqueue Theme JS w React Dependency
add_action( 'wp_enqueue_scripts', 'my_enqueue_theme_js' );
function my_enqueue_theme_js() {
  wp_enqueue_script(
    'my-theme-frontend',
    get_stylesheet_directory_uri() . '/build/index.js',
    ['wp-element'],
    time(), // Change this to null for production
    true
  );

  wp_enqueue_script(
    'my-theme-frontend',
    get_stylesheet_directory_uri(), '/build/index.js',
    ['wp-element'],
    time() // For production use wp_get_theme() -> get('Version')
  )
}
?>
