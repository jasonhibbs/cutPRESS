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

// Add Page Excerpts
add_action( 'init', 'add_excerpts_to_pages' );
function add_excerpts_to_pages() {
  add_post_type_support( 'page', 'excerpt' );
}

// Excerpt Ellipsis
add_filter('excerpt_more', 'excerpt_ellipsis');
function excerpt_ellipsis( $more ) {
  return '…';
}

/*
// Edit Excerpts
add_filter( 'excerpt_length', 'limit_excerpt');
function limit_excerpt( $length ) {
  return 40;
}

// First Paragraph Excerpt
add_filter( 'wp_trim_excerpt', 'excerpt_first_p', 10, 2 );
function excerpt_first_p($text, $raw_excerpt) {
  if( ! $raw_excerpt ) {
      $content = apply_filters( 'the_content', get_the_content() );
      $text = substr( $content, 0, strpos( $content, '</p>' ) + 4 );
  }
  return $text;
}
*/

// Register WP Features ////////////////////////////////////////////

// Add Thumbnails
add_theme_support( 'post-thumbnails' );

// Register Nav
register_nav_menus( 
  array(
    'nav'       => __('Primary Nav')
  )
);


// Custom Post Types ///////////////////////////////////////////////
add_action('init', 'create_post_type');
function create_post_type() {

  // Custom Posts --------------------------------------------------------
  /*
  register_post_type('custom_post', array( 
      'label' => __('Custom Posts'),
      'description' => '',
      'public' => true,
      'menu_icon'=> 'dashicons-star',
      'capability_type' => 'post',
      'hierarchical' => false,
      'rewrite' => array('slug' => 'custom_post', 'with_front' => '1'),
      'query_var' => true,
      'menu_position' => 5,
      'supports' => array('title','editor','excerpt','custom-fields','revisions','thumbnail','page-attributes'),
      'labels' => array (
        'name' => 'Custom Posts',
        'singular_name' => 'Custom Post',
        'menu_name' => 'Custom Posts',
        'add_new' => 'Add Custom Post',
        'add_new_item' => 'Add New Custom Post',
        'edit' => 'Edit',
        'edit_item' => 'Edit Custom Post',
        'new_item' => 'New Custom Post',
        'view' => 'View Custom Post',
        'view_item' => 'View Custom Post',
        'search_items' => 'Search Custom Posts',
        'not_found' => 'No Custom Posts Found',
        'not_found_in_trash' => 'No Custom Posts Found in Trash',
        'parent' => 'Parent Custom Post',
      )
    )
  );
  */
}


// Dashboard Features //////////////////////////////////////////////

if( function_exists('acf_add_options_sub_page') ) {
  /*
  acf_add_options_sub_page(array(
    'title' => 'Custom Settings',
    'parent' => 'options-general.php',
    'capability' => 'manage_options'
  ));
  */
}