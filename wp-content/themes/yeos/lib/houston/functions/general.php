<?php

//---------------------------------------------------------------------------------
//	Clean up WP_head
//---------------------------------------------------------------------------------
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'noindex', 1);

// remove WordPress version from RSS feeds
function wp_no_generator() { return ''; }
add_filter('the_generator', 'wp_no_generator');

function remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );



//---------------------------------------------------------------------------------
//	Add appropriate classes to Body depending on browser.
//	Note: Be careful with this on Cached sites.
//---------------------------------------------------------------------------------
function browser_body_class($classes) {
		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	
		if($is_lynx) $classes[] = 'lynx';
		elseif($is_gecko) $classes[] = 'gecko';
		elseif($is_opera) $classes[] = 'opera';
		elseif($is_NS4) $classes[] = 'ns4';
		elseif($is_safari) $classes[] = 'safari';
		elseif($is_chrome) $classes[] = 'chrome';
		elseif($is_IE) $classes[] = 'ie';

		else $classes[] = 'unknown';

		return $classes;
}
add_filter('body_class','browser_body_class');


//---------------------------------------------------------------------------------
//	Only show update notifications for Admins
//---------------------------------------------------------------------------------
global $user_login;
	get_currentuserinfo();
	if (!current_user_can('update_plugins')) { // checks to see if current user can update plugins 
		add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
		add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
}


//---------------------------------------------------------------------------------
//	Add IE notice after nav
//---------------------------------------------------------------------------------
function houston_old_browser() {
    global $is_IE;
    if(!$is_IE) { return; }
    header('X-UA-Compatible: IE=edge,chrome=1');
    echo '
    <!--[if lt IE 7]>
        <p class="chromeframe">
            You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.
        </p>
    <![endif]-->
    ';
}
add_action( 'houston_after_nav', 'houston_old_browser' );

//---------------------------------------------------------------------------------
//	Better SEO title
//---------------------------------------------------------------------------------
add_filter( 'wp_title', 'filter_wp_title' );
function filter_wp_title( $title ) {
    global $page, $paged;

    if ( is_feed() )
        return $title;

    $site_description = get_bloginfo( 'description' );

    $filtered_title = $title . get_bloginfo( 'name' );
    $filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
    $filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) ) : '';

    return $filtered_title;
}

add_filter('post_class','add_worpdresscontent_class',10,1);
function add_worpdresscontent_class($classes){
    $classes[] = "wordpress-content";
    return $classes;
}