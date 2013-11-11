<?php
/**
 * Custom functions
 */

/*
 * Remove unused content items from the admin sidebar menu
 */

function e9_remove_admin_menu_items () {
  $items = array(__('Posts'), __('Comments'));
  global $menu;
  end ($menu);
  while (prev($menu)) {
    $item = explode(' ', $menu[key($menu)][0]);
    if (in_array($item[0] != NULL ? $item[0] : '', $items)) {
      unset($menu[key($menu)]);
    }
  }
}
add_action('admin_menu', 'e9_remove_admin_menu_items');


/*
 * Add Interiors CPT
 */

// Create Interiors
function e9_interiors_create () {
	$labels = array(
		'name'               => _x( 'Interiors', 'post type general name' ),
		'singular_name'      => _x( 'Interior', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'interior' ),
		'add_new_item'       => __( 'Add New Interior' ),
		'edit_item'          => __( 'Edit Interior' ),
		'new_item'           => __( 'New Interior' ),
		'all_items'          => __( 'All Interiors' ),
		'view_item'          => __( 'View Interior' ),
		'search_items'       => __( 'Search Interiors' ),
		'not_found'          => __( 'No interiors found' ),
		'not_found_in_trash' => __( 'No interiors found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Interiors'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Gallery of interior images and description',
		'public'        => true,
		'menu_position' => 25,
		'supports'      => array('title', 'editor', 'thumbnail'),
    'has_archive'   => false,
    'rewrite'       => array('slug' => 'interiors'),
	);
	register_post_type('e9_interior', $args);	
}
add_action( 'init', 'e9_interiors_create' );

// Translate all messages for Interiors
function e9_interiors_messages( $messages ) {
	global $post, $post_ID;
	$messages['e9_interior'] = array(
		0 => '', 
		1 => sprintf( __('Interior updated. <a href="%s">View</a>'), esc_url( get_permalink($post_ID) ) ),
		2 => __('Interior updated.'),
		3 => __('Interior deleted.'),
		4 => __('Interior updated.'),
		5 => isset($_GET['revision']) ? sprintf( __('Interior restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Interior published. <a href="%s">View</a>'), esc_url( get_permalink($post_ID) ) ),
		7 => __('Interior saved.'),
		8 => sprintf( __('Interior submitted. <a target="_blank" href="%s">Preview</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Interior scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Interior draft updated. <a target="_blank" href="%s">Preview</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	return $messages;
}
add_filter( 'post_updated_messages', 'e9_interiors_messages' );

// Do not paginate Interiors
function e9_interiors_nopagination ($query) {
  if (is_post_type_archive('e9_interior')) {
    $query->set('nopaging', 1);
  }
}
add_action('parse_query', 'e9_interiors_nopagination');



function bastone_register ( $wp_customize ) {
  $wp_customize->add_section(
    'bastone_theme',
    array(
      'title'    => __( 'Theme Options', 'bastone' ),
      'priority' => 120,
    )
  );

  $wp_customize->add_setting('bastone_logo');
  $wp_customize->add_control(new WP_Customize_Image_Control(
     $wp_customize,
     'bastone_logo',
     array(
        'label' => __('Logo', 'bastone'),
        'section' => 'bastone_theme',
        'settings' => 'bastone_logo'
     ) 
  ));

  $wp_customize->add_setting('bastone_sidebar_bg');
  $wp_customize->add_control(new WP_Customize_Image_Control(
     $wp_customize,
     'bastone_sidebar_bg',
     array(
        'label' => __('Sidebar Background', 'bastone'),
        'section' => 'bastone_theme',
        'settings' => 'bastone_sidebar_bg'
     ) 
  ));
}

// Setup the Theme Customizer settings and controls...
add_action('customize_register', 'bastone_register');


/**
 * Helper to extract just the src from <img> html
 */
function get_img_src ($img) {
  return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}
