<?php
//---------------------------------------------------------------------------------
//	Menu walker 
//---------------------------------------------------------------------------------
class houston_dd_walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth, $args){
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';
		
		$output .= $indent . '<dd id="menu-item-'. $item->ID . '-dd"' . $value . $class_names .'>';
		
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		
		$prepend = '';
		$append = '';
		$description  = ! empty( $item->description ) ? '' : '';
		
		if($depth != 0)
		{
			$description = $append = $prepend = "";
		}
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
		$item_output .= $description.$args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	function end_el(&$output, $item, $depth) {
		$output .= "</dd>\n";
	}
}


class houston_ul_walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth, $args){
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		
		
		global $wpdb;
		  $children_count = $wpdb->get_var(
		    $wpdb->prepare("
		      SELECT COUNT(*) FROM $wpdb->postmeta
		      WHERE meta_key = %s
		      AND meta_value = %d
		    ", '_menu_item_menu_item_parent', $item->ID)
		  );
		
		  if( $children_count > 0 ) {
		    // has children
		    $classes[] = 'has-flyout';
		    $has_childs = true;
		  }
		
		
		
		
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';
		
		$output .= $indent . '<li id="menu-item-'. $item->ID . '-dd"' . $value . $class_names .'>';
		
			
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		
		$prepend = '';
		$append = '';
		$description  = ! empty( $item->description ) ? '' : '';
		
		if($depth != 0)
		{
			$description = $append = $prepend = "";
		}
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .' class="main">';
		$item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
		$item_output .= $description.$args->link_after;
		$item_output .= '</a>';
				
		if($has_childs)
			$item_output .= '<a href="#" class="flyout-toggle show-on-phones"><span></span></a>';
		
		$item_output .= $args->after;
		
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	function end_el(&$output, $item, $depth) {
		$output .= "</li>\n";
	}
	
	function start_lvl(&$output, $depth) {
   		$indent = str_repeat("\t", $depth);
   		$output .= "\n$indent<ul class=\"flyout sub-menu\">\n";
    }
	
	function end_lvl(&$output, $depth) {
   		$indent = str_repeat("\t", $depth);
   		$output .= "\n$indent</ul>\n";
    }



}


class houston_topbar_walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth, $args){
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		
		
		global $wpdb;
		  $children_count = $wpdb->get_var(
		    $wpdb->prepare("
		      SELECT COUNT(*) FROM $wpdb->postmeta
		      WHERE meta_key = %s
		      AND meta_value = %d
		    ", '_menu_item_menu_item_parent', $item->ID)
		  );
		
		  if( $children_count > 0 ) {
		    // has children
		    $classes[] = 'has-dropdown';
		    $has_childs = true;
		  }
		
		
		
		
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';
		
		$output .= $indent . '<li id="menu-item-'. $item->ID . '-dd"' . $value . $class_names .'>';
		
			
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		
		$prepend = '';
		$append = '';
		$description  = ! empty( $item->description ) ? '' : '';
		
		if($depth != 0)
		{
			$description = $append = $prepend = "";
		}
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .' class="main">';
		$item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
		$item_output .= $description.$args->link_after;
		$item_output .= '</a>';
				

		$item_output .= $args->after;
		
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	function end_el(&$output, $item, $depth) {
		$output .= "</li>\n";
	}
	
	function start_lvl(&$output, $depth) {
   		$indent = str_repeat("\t", $depth);
   		$output .= "\n$indent<ul class=\"dropdown sub-menu\">\n";
    }
	
	function end_lvl(&$output, $depth) {
   		$indent = str_repeat("\t", $depth);
   		$output .= "\n$indent</ul>\n";
    }



}
