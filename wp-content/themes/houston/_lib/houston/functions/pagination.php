<?php
//---------------------------------------------------------------------------------
//	Foundation Pagination
//---------------------------------------------------------------------------------
function houston_pagenavi( $p = 2 ) { // pages will be show before and after current page
	if ( is_singular() ) return; // don't show in single page
	global $wp_query, $paged;
	$max_page = $wp_query->max_num_pages;
	if ( $max_page == 1 ) return; // don't show when only one page
	if ( empty( $paged ) ) $paged = 1;
	//echo '<span class="pages">Page: ' . $paged . ' of ' . $max_page . ' </span> '; // pages
	if ( $paged > $p + 1 ) p_link( 1, 'First' );
	if ( $paged > $p + 2 ) echo '<li class="unavailable"><a href="#">&hellip;</a></li>';
	for( $i = $paged - $p; $i <= $paged + $p; $i++ ) { // Middle pages
		if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<li class='current'><a href='#'>{$i}</a></li> " : p_link( $i );
	}
	if ( $paged < $max_page - $p - 1 ) echo '<li class="unavailable"><a href="#">&hellip;</a></li>';
	if ( $paged < $max_page - $p ) p_link( $max_page, 'Last' );
}
function p_link( $i, $title = '' ) {
	if ( $title == '' ) $title = "Page {$i}";
	echo "<li><a href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$i}</a></li> ";
}