<?php
//---------------------------------------------------------------------------------
//	Require Files for Houston (Load with hook to be able to use with child theme)
//---------------------------------------------------------------------------------
add_action( 'after_setup_theme', 'parent_theme_setup', 9 );
function parent_theme_setup() {    
    require_once(get_template_directory().'/lib/houston/houston_functions.php');
}

//---------------------------------------------------------------------------------
//	Activate WP Core functionality
//---------------------------------------------------------------------------------
function houston_setup() {
	add_theme_support('post-thumbnails');
	//add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
	add_theme_support('menus');
	register_nav_menus(array(
		'primary_navigation' => __('Primary Navigation'),
		'mobile_primary_navigation' => __('Mobile Primary Navigation'),
	));

//    $member_data = new Custom_Post_Type( 'memberfields', array('hierarchical' => "false"), array('name' => 'Medlemsfält', 'menu_name' => 'Medlemsfält') );
//    $member_data->add_taxonomy('memberfields_area', array('hierarchical' => "false"), array('name' => 'Områden', 'singular_name' => 'Område', 'menu_name' => 'Områden'));
    $labels = array(
        'name'                => _x( 'Område', 'taxonomy general name' ),
        'singular_name'       => _x( 'Område', 'taxonomy singular name' ),
        'search_items'        => __( 'Sök område' ),
        'all_items'           => __( 'Alla områden' ),
        'parent_item'         => __( 'Huvudområden' ),
        'parent_item_colon'   => __( 'Huvudområden:' ),
        'edit_item'           => __( 'Redigera' ),
        'update_item'         => __( 'Updatera' ),
        'add_new_item'        => __( 'Skapa ny' ),
        'new_item_name'       => __( 'Skapa ny' ),
        'menu_name'           => __( 'Område' )
    );

    $args = array(
        'hierarchical'        => true,
        'labels'              => $labels,
        'show_ui'             => true,
        'show_admin_column'   => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'area' )
    );

    register_taxonomy( 'memberfields_area', array( 'post' ), $args );



    $labels = array(
        'name'                => _x( 'Expertis', 'taxonomy general name' ),
        'singular_name'       => _x( 'Expertis', 'taxonomy singular name' ),
        'search_items'        => __( 'Sök Expertis' ),
        'all_items'           => __( 'Alla Expertiser' ),
        'parent_item'         => __( 'Expertiser' ),
        'parent_item_colon'   => __( 'Expertiser:' ),
        'edit_item'           => __( 'Redigera' ),
        'update_item'         => __( 'Updatera' ),
        'add_new_item'        => __( 'Skapa ny' ),
        'new_item_name'       => __( 'Skapa ny' ),
        'menu_name'           => __( 'Expertiser' )
    );

    $args = array(
        'hierarchical'        => true,
        'labels'              => $labels,
        'show_ui'             => true,
        'show_admin_column'   => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'expertis' )
    );

    register_taxonomy( 'memberfields_expertise', array( 'post' ), $args );


}
add_action('after_setup_theme', 'houston_setup');

register_sidebar(array('name'=> 'Sidebar',
	'before_widget' => '<ul id="%1$s" class="nav nav-tabs nav-stacked %2$s">',
	'after_widget' => '</ul>',
    'class' => '',
	'before_title' => '<li class="nav-header">',
	'after_title' => '</li>'
));

//---------------------------------------------------------------------------------
//	Remove unneccesarry user fields
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
	$restricted = array(__('Dashboard'), __('Links'), __('Comments'), __('Media'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
if(!is_user_admin()) {
add_action('admin_menu', 'houston_remove_menus');
}

//---------------------------------------------------------------------------------
//	Custom Post Fields for ACF
//---------------------------------------------------------------------------------
if( function_exists( 'register_field' ) ){
    register_field('Tax_field', get_template_directory() . '/fields/acf-tax-master/acf-tax.php');
    require_once(get_template_directory() . '/fields/acf-taxonomy-field-master/taxonomy-field.php');
    register_field('acf_Separator' , get_template_directory() . '/fields/acf-separator/separator.php' );
}


add_action( 'profile_update', 'tgm_custom_profile_redirect', 12 );


//---------------------------------------------------------------------------------
//	Make terms from Expertise-fields
//---------------------------------------------------------------------------------
add_action( 'profile_update', 'expertis_profile_update' );
function expertis_profile_update( $user_id, $old_user_data ) {
    // Do something
    $expertis = get_field('expertises','user_'.$user_id);
    if($expertis){
    $expertises = explode('<br />', nl2br($expertis));
    foreach($expertises as $area){
        wp_insert_term($area,'memberfields_expertise');
    }
    }
}

if (!function_exists('disableAdminBar')) {

    function disableAdminBar(){

            remove_action( 'admin_footer', 'wp_admin_bar_render', 1000 );
    }

}

add_filter('admin_head','remove_admin_bar_style_backend');

