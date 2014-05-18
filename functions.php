<?php

// Typical Helpers /////////////////////////////////////////////////

// Site Title
define('SITE_TITLE', get_bloginfo('name'));

// Site Title
define('SITE_DESC', get_bloginfo('description'));

// Site URL
define('SITE_URL', get_bloginfo('url'));

// Template Path
define('TEMP_PATH', get_bloginfo('template_directory').'/resources');

// Add Classes -----------------------------------------------------
// Body Classes
add_filter('body_class', 'my_plugin_body_class');
function my_plugin_body_class($classes) {
  
  global $post;
  global $pagename;
  
  if ( is_single() ) {
      $classes[] = $post->post_name;
  }
  
  if ( isset( $pagename ) ) {
      $classes[] = $pagename;
  }
  
  return $classes;
}

// Menu Classes
add_filter('page_css_class', 'add_menu_class', 10, 2);
function add_menu_class($classes, $page){
  
  $pagelower = strtolower($page->post_name);
  $pageclass = str_replace(' ', '_', $pagelower);

  $classes[] = 'menu_' . $pageclass;
  return $classes;
}


// Nav Classes
add_filter('nav_menu_css_class', 'add_nav_class', 10, 2);
function add_nav_class($classes, $item){

  $itemlower = strtolower($item->title);
  $itemclass = str_replace(' ', '_', $itemlower);

  $classes[] = 'nav_' . $itemclass;  
  return $classes;
}

// Functions -------------------------------------------------------
// Get ID by Slug
function get_ID_by_slug($page_slug) {
  $page = get_page_by_path($page_slug);
  if ($page) {
      return $page->ID;
  } else {
      return null;
  }
}

// Turn words into class names
function classify($string) {
  $string = strtolower(str_replace(' ', '_', $string));
  $string = strtolower(str_replace('.', '', $string));
  return $string;
}


// Register WP Features ////////////////////////////////////////////

// Add Thumbnails
add_theme_support( 'post-thumbnails' );

// Register Nav
register_nav_menus( 
  array(
    'nav'       => __('Primary Nav')
  )
);



// Dashboard Features //////////////////////////////////////////////

// Adjust Menus 
/*
add_action( 'admin_menu', 'adjust_the_wp_menu', 999 );
function adjust_the_wp_menu() {
  //remove_menu_page('edit-comments.php');
  //add_menu_page( 'Lead', 'Lead', 'manage_options', 'post.php?post='.get_ID_by_slug('lead').'&action=edit', '', 'dashicons-star-filled', 5 );
}
*/


