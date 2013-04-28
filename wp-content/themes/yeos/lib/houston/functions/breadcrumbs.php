<?php
//---------------------------------------------------------------------------------
//	Generate Foundationlike breadcrumbs, houstonstyle! (moddad från: http://bacsoftwareconsulting.com/blog/index.php/wordpress-cat/adding-wordpress-breadcrumbs-without-a-plugin/)
//---------------------------------------------------------------------------------
function houston_breadcrumbs($echo = true) {

    $delimiter = '<li><span class="divider">/</span></li>';
    $delimiter1 = '<li><span class="delimiter1"> &bull; </span></li>';

    //text link for the 'Home' page
    $main = get_the_title(get_option( 'page_on_front' ));
    $maxLength= 30;
    $arc_year = get_the_time('Y');
    $arc_month = get_the_time('F');
    $arc_day = get_the_time('d');
    $arc_day_full = get_the_time('l');  
 
    $url_year = get_year_link($arc_year);
    $url_month = get_month_link($arc_year,$arc_month);
    
    $output = "";
    
    if (!is_front_page()) {
        //If Breadcrump exists, wrap it up in a div container for styling.
        $output .= '<ul class="breadcrumbs breadcrumb">';
        global $post, $cat;
        $homeLink = get_option('home'); //same as: $homeLink = get_bloginfo('url');
        $output .= '<li><a href="' . $homeLink . '">' . $main . '</a></li>' . $delimiter;    
 
        //Display breadcrumb for single post
        if (is_single()) { //check if any single post is being displayed.
            $category = get_the_category();
            $num_cat = count($category); //counts the number of categories the post is listed in.
            if ($num_cat <=1)  //I put less or equal than 1 just in case the variable is not set (a catch all).
            {
                $output .= '<li>'.get_category_parents($category[0],  true,' ' . $delimiter . ' ').'</li>';
                //Display the full post title.
                $output .= '<li class="current active"><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            }
            //then the post is listed in more than 1 category.
            else {
                //Put bullets between categories, since they are at the same level in the hierarchy.
                $output .= "<li>"; the_category( $delimiter1, multiple)."</li>";
                    //Display partial post title, in order to save space.
                    if (strlen(get_the_title()) >= $maxLength) { //If the title is long, then don't display it all.
                        $output .= '<li class="current active">' . $delimiter . trim(substr(get_the_title(), 0, $maxLength)) . ' ...';
                        $output .= '<li class="current active"><a href="' . get_permalink() . '">' . trim(substr(get_the_title(), 0, $maxLength)) . ' ...</a></li>';
                    }
                    else { //the title is short, display all post title.
                        $output .= '<li class="current active"><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                    }
                $output .= "</li>";
            }
        }
        //Display breadcrumb for category and sub-category archive
        elseif (is_category()) { //Check if Category archive page is being displayed.
            //returns the category title for the current page.
            //If it is a subcategory, it will display the full path to the subcategory.
            //Returns the parent categories of the current category with links separated by '»'
            $output .= __("Archive category: ") . get_category_parents($cat, true,' ' . $delimiter . ' ') ;
        }
        //Display breadcrumb for tag archive
        elseif ( is_tag() ) { //Check if a Tag archive page is being displayed.
            //returns the current tag title for the current page.
            $output .= __("Post tagged: ") . single_tag_title("", false);
        }
        //Display breadcrumb for calendar (day, month, year) archive
        elseif ( is_day()) { //Check if the page is a date (day) based archive page.
            $output .= '<li><a href="' . $url_year . '">' . $arc_year . '</a></li> ' . $delimiter . ' ';
            $output .= '<li><a href="' . $url_month . '">' . $arc_month . '</a></li> ' . $delimiter . $arc_day . ' (' . $arc_day_full . ')';
        }
        elseif ( is_month() ) {  //Check if the page is a date (month) based archive page.
            $output .= '<li><a href="' . $url_year . '">' . $arc_year . '</a></li> ' . $delimiter . $arc_month;
        }
        elseif ( is_year() ) {  //Check if the page is a date (year) based archive page.
            $output .= $arc_year;
        }
        //Display breadcrumb for search result page
        elseif ( is_search() ) {  //Check if search result page archive is being displayed.
            $output .= __("Search Results for: ").get_search_query();
        }
        //Display breadcrumb for top-level pages (top-level menu)
        elseif ( is_page() && !$post->post_parent ) { //Check if this is a top Level page being displayed.
            $output .= '<li class="current active"><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
        }
        //Display breadcrumb trail for multi-level subpages (multi-level submenus)
        elseif ( is_page() && $post->post_parent ) {  //Check if this is a subpage (submenu) being displayed.
            //get the ancestor of the current page/post_id, with the numeric ID
            //of the current post as the argument.
            //get_post_ancestors() returns an indexed array containing the list of all the parent categories.
            $post_array = get_post_ancestors($post);
 
            //Sorts in descending order by key, since the array is from top category to bottom.
            krsort($post_array); 
 
            //Loop through every post id which we pass as an argument to the get_post() function.
            //$post_ids contains a lot of info about the post, but we only need the title.
            foreach($post_array as $key=>$postid){
                //returns the object $post_ids
                $post_ids = get_post($postid);
                //returns the name of the currently created objects
                $title = $post_ids->post_title;
                //Create the permalink of $post_ids
                $output .= '<li><a href="' . get_permalink($post_ids) . '">' . $title . '</a></li>' . $delimiter;
            }
            $output .= '<li class="current active"><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>'; //returns the title of the current page.
        }
        //Display breadcrumb for author archive
        elseif ( is_author() ) {//Check if an Author archive page is being displayed.
            global $author;
            //returns the user's data, where it can be retrieved using member variables.
            $user_info = get_userdata($author);
            $output .=  'Archived Article(s) by Author: ' . $user_info->display_name ;
        }
        //Display breadcrumb for 404 Error
        elseif ( is_404() ) {//checks if 404 error is being displayed
            $output .=  'Error 404 - Not Found.';
        }
        else {
            //All other cases that I missed. No Breadcrumb trail.
        }
       $output .= '</ul>';
    }
    
    if($echo) {
	    echo $output;
    } else {
	    return $output;
    }
}