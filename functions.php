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
  
  // If possible, get the Post Name
  if ( isset( $post ) ) {
    $classes[] = $post->post_name;
  }
  
  // If possible, get the Page Name, this may be the same
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
    'nav' => __('Primary Nav')
  )
);


// Custom Taxonomies ///////////////////////////////////////////////
add_action('init', 'create_taxonomy');
function create_taxonomy() {
  
  $custom_taxonomies = array(
    /*
    "my_courses" => array(
      "for"    => "my_notes", // Required
      "single" => "Course",   // Required
      "plural" => "Courses",  // Required
      "slug"   => "notes/courses"    // Recommended
    ),
    */
  );
  
  foreach ($custom_taxonomies as $tax => $val) {  
  	register_taxonomy($tax, array( $val['for'] ), array(
  	  'hierarchical'      => (array_key_exists('hierarchical', $val)) ? $val['hierarchical'] : true,
  		'show_ui'           => true,
  		'show_admin_column' => true,
  		'query_var'         => true,
  		'rewrite'           => array(
  	    'slug' => (array_key_exists('slug', $val)) ? $val['slug'] : $tax,
  	  ),
  		'labels'            => array(
    		'name'              => _x($val['plural'],  $val['single'] . ' Plural Label', 'Functions'),
    		'singular_name'     => _x($val['single'],  $val['single'] . ' Singular Label', 'Functions'),
    		'menu_name'         => _x($val['plural'],  $val['single'] . ' Plural Label', 'Functions'),
    		'search_items'      => __( 'Search ' . $val['plural']),
    		'all_items'         => __( 'All ' . $val['plural']),
    		'parent_item'       => __( 'Parent ' . $val['single']),
    		'parent_item_colon' => __( 'Parent ' . $val['single'] . ':' ),
    		'edit_item'         => __( 'Edit ' . $val['single']),
    		'update_item'       => __( 'Update ' . $val['single']),
    		'add_new_item'      => __( 'Add New ' . $val['single']),
    		'new_item_name'     => __( 'New ' . $val['single'] . ' Name' ),
    	),
    ));
  }
}


// Custom Post Types ///////////////////////////////////////////////
add_action('init', 'create_post_type');
function create_post_type() {

  $custom_post_types = array(
    /*
    "my_notes" => array(
      "single"    => "Note",  // Required
      "plural"    => "Notes", // Required
      "menu_icon" => "dashicons-pressthis", // http://melchoyce.github.io/dashicons/
      "slug"      => "notes"  // Recommended
    ),
    */
  );
  
  foreach ($custom_post_types as $type => $val) {
    register_post_type($type, array(
        'label'                 => $val["plural"],
        'description'           => '',
        'public'                => true,
        'menu_icon'             => (array_key_exists('menu_icon', $val)) ? $val['menu_icon'] : 'dashicons-star-filled',
        'capability_type'       => 'post',
        'hierarchical'          => false,
        'has_archive'           => true,
        'rewrite'               => array(
          'slug'                => (array_key_exists('slug', $val)) ? $val['slug'] : $type,
          'with_front'          => '0'
        ),
        'query_var'             => true,
        'menu_position'         => (array_key_exists('menu_position', $val)) ? $val['menu_position'] : 5,
        'supports'              => array('title','editor','excerpt','custom-fields','revisions','thumbnail','page-attributes'),
        'labels'                => array (
          'name'                => _x($val["plural"],  $val["single"] . " Singular Label", "Functions"),
          'singular_name'       => _x($val["single"],  $val["single"] . " Singular Label", "Functions"),
          'menu_name'           => _x($val["plural"],  $val["single"] . " Singular Label", "Functions"),
          'add_new'             => __('Add ' . $val["single"]),
          'add_new_item'        => __('Add New ' . $val["single"]),
          'edit'                => __('Edit'),
          'edit_item'           => __('Edit ' . $val["single"]),
          'new_item'            => __('New ' . $val["single"]),
          'view'                => __('View ' . $val["single"]),
          'view_item'           => __('View ' . $val["single"]),
          'search_items'        => __('Search ' . $val["plural"]),
          'not_found'           => __('No ' . $val["plural"] . ' Found'),
          'not_found_in_trash'  => __('No ' . $val["plural"] . ' Found in Trash'),
          'parent'              => __('Parent ' . $val["single"]),
        )
      )
    );
  }
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