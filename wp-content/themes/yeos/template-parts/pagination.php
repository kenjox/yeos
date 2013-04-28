<?php 

    do_action("before_pagination");
        $paged = $wp_query->get( 'paged' );
        if ( $paged || $paged < 2 ) { bootstrap_pagination(); }
    do_action("after_pagination");

?>