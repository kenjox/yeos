<?php
//---------------------------------------------------------------------------------
//	Require Files for Houston
//---------------------------------------------------------------------------------
require_once(TEMPLATEPATH.'/lib/houston/houston_functions.php');

//---------------------------------------------------------------------------------
//	Activate WP Core functionality
//---------------------------------------------------------------------------------
function houston_setup() {
	//add_theme_support('post-thumbnails');
	//add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
	add_theme_support('menus');
	register_nav_menus(array(
		'primary_navigation' => __('Primary Navigation'),
		'mobile_primary_navigation' => __('Mobile Primary Navigation'),
	));	
	
	
}
add_action('after_setup_theme', 'houston_setup');


//---------------------------------------------------------------------------------
//	Remove WP Core Profilefields
//---------------------------------------------------------------------------------
function remove_profile_fields( $contactmethods ) {
  unset($contactmethods['aim']);
  unset($contactmethods['jabber']);
  unset($contactmethods['yim']);
  return $contactmethods;
}
add_filter('user_contactmethods','remove_profile_fields',10,1);

function admin_del_options() {
   global $_wp_admin_css_colors;
   $_wp_admin_css_colors = 0;
}

add_action('admin_head', 'admin_del_options');
//---------------------------------------------------------------------------------
//	Remove unneccesarry menu options in the wordpress backend.
//	Note: Be careful with this when cloning sites
//---------------------------------------------------------------------------------
function houston_remove_menus () {
	global $menu;
	global $user_level;
	if($user_level < 10) {
		$restricted = array(__('Dashboard'), __('Links'), __('Comments'), __('Tools'), __('Media'), __('Posts'));
		remove_menu_page('edit.php?post_type=memberfields'); // Posts

	} else {
		$restricted = array();
	}
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'houston_remove_menus');


if( function_exists( 'register_field' ) ){ 
	register_field('Tax_field', dirname(__File__) . '/fields/acf-tax-master/acf-tax.php'); 
	require_once(dirname(__File__) . '/fields/acf-taxonomy-field-master/taxonomy-field.php');
    register_field('acf_Separator' , dirname(__File__) . '/fields/acf-separator/separator.php' );
}


//---------------------------------------------------------------------------------
//	Custom Post Types
//---------------------------------------------------------------------------------
/*
$labels = array(
    'name' => _x('Books', 'post type general name', 'your_text_domain'),
    'singular_name' => _x('Book', 'post type singular name', 'your_text_domain'),
    'add_new' => _x('Add New', 'book', 'your_text_domain'),
    'add_new_item' => __('Add New Book', 'your_text_domain'),
    'edit_item' => __('Edit Book', 'your_text_domain'),
    'new_item' => __('New Book', 'your_text_domain'),
    'all_items' => __('All Books', 'your_text_domain'),
    'view_item' => __('View Book', 'your_text_domain'),
    'search_items' => __('Search Books', 'your_text_domain'),
    'not_found' =>  __('No books found', 'your_text_domain'),
    'not_found_in_trash' => __('No books found in Trash', 'your_text_domain'), 
    'parent_item_colon' => '',
    'menu_name' => __('Books', 'your_text_domain')

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => _x( 'book', 'URL slug', 'your_text_domain' ) ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  ); 
$book = new Custom_Post_Type( 'Book', array('hierarchical' => "true") ); 
*/
$member_data = new Custom_Post_Type( 'memberfields', array('hierarchical' => "false"), array('name' => 'Medlemsfält', 'menu_name' => 'Medlemsfält') ); 
$member_data->add_taxonomy('memberfields_area', array('hierarchical' => "false"), array('name' => 'Områden', 'singular_name' => 'Område', 'menu_name' => 'Områden'));




//---------------------------------------------------------------------------------
//	Change user slug
//---------------------------------------------------------------------------------
add_action('init', 'cng_author_base');
function cng_author_base() {
    global $wp_rewrite;
    $author_slug = 'medlem'; // change slug name
    $wp_rewrite->author_base = $author_slug;
}

//---------------------------------------------------------------------------------
//	Set gravity form btuton
//---------------------------------------------------------------------------------
add_filter("gform_submit_button", "form_submit_button", 10, 2);
function form_submit_button($button, $form){
    return "<button class='btn btn-success' id='gform_submit_button_{$form["id"]}'>Submit</button>";
}


//---------------------------------------------------------------------------------
//	Concatenate all user-meta for free text search
//---------------------------------------------------------------------------------
add_action( 'profile_update', 'my_profile_update' );
function my_profile_update( $user_id, $old_user_data ) {
	$merged = "";
	$merged .= " lax";
    update_user_meta($user_id, 'member_merged_data', $merged);
}
