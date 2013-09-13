<?php

// Nav Menus ///////////////////////////////////////////////////////

register_nav_menus( 
  array(
    'nav'       => __('Primary Nav')
  )
);




// Typical Helpers /////////////////////////////////////////////////

// Add Thumbnails
add_theme_support( 'post-thumbnails' );

// Saving a path
define('TEMPPATH', get_bloginfo('template_directory').'/resources');

// Brand Name
define('SITE_TITLE', 'cutPRESS');


// Body Classes
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

add_filter('body_class', 'my_plugin_body_class');


// Adjust Menus ////////////////////////////////////////////////////

add_action( 'admin_menu', 'adjust_the_wp_menu', 999 );
function adjust_the_wp_menu() {
  //remove_menu_page('edit-comments.php');
  //remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
  //remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
  
  // This file doesn’t exist, it serves only as a hook to put custom posts in
  add_menu_page( 'More Posts', 'More Posts', 'manage_options', 'custom-posts.php', '', '', 6 );
}


// Custom Post Types ///////////////////////////////////////////////

add_action('init', 'create_post_type');
function create_post_type() {
  register_post_type('custom-post', array( 
      'label' => __('Custom Posts'),
      'description' => '',
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => 'custom-posts.php',
      'capability_type' => 'post',
      'hierarchical' => false,
      'rewrite' => array('slug' => 'custom-post', 'with_front' => '1'),
      'query_var' => true,
      'exclude_from_search' => false,
      'menu_position' => 15,
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
}



// Custom Taxonomies ///////////////////////////////////////////////


register_taxonomy('custom-category',
  array(  
    0 => 'custom-post'
  ),
  array(
    'label' => __('Custom Categories'),
    'singular_label' => 'Custom Category',
    'hierarchical' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'custom-category')
  )
);