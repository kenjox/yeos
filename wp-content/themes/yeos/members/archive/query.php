<?php
if(is_tax('memberfields_area')) {
    $args = array(
        'meta_query' => array(
            array(
                'key' => 'geo_areas',
                'value' => get_queried_object_id(),
                'compare' => 'LIKE'
            )
        )
    );
} elseif(is_tax('memberfields_expertise')) {
    $args = array(
        'meta_query' => array(
            array(
                'key' => 'expertises',
                'value' => get_query_var('memberfields_expertise'),
                'compare' => 'LIKE'
            )
        )
    );
} else {
    $args = array(
        'number'
    );
}

if(isset($_GET['search'])) {
    $args = array(
        'relation' => 'AND',
        'meta_query' => array(
            array(
                'key' => 'nickname',
                'value' => $_GET['search'],
                'compare' => 'LIKE'
            ), $args['meta_query'][0]
        )
    );
}

global $wp_query;
$user_query = new WP_User_Query( $args );
