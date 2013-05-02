<?php
$mq_args = array();
if(is_tax('memberfields_area')) {
    $mq_args[] = array(
                'key' => 'geo_areas',
                'value' => get_queried_object_id(),
                'compare' => 'LIKE'
    );
}
if(is_tax('memberfields_expertise')) {
    $mq_args[] = array(
                'key' => 'expertises',
                'value' => get_query_var('memberfields_expertise'),
                'compare' => 'LIKE'
    );
}

if(isset($_GET['search'])) {
    $mq_args[] = array(
                'key' => 'nickname',
                'value' => $_GET['search'],
                'compare' => 'LIKE'
    );
}


if(isset($_GET['area'])) {
    $mq_args[] = array(
        'key' => 'geo_areas',
        'value' => $_GET['area'],
        'compare' => 'LIKE'
    );
}

if(isset($_GET['expertise'])) {
    $mq_args[] = array(
        'key' => 'expertises',
        'value' => $_GET['expertise'],
        'compare' => 'LIKE'
    );
}

$args= array(
    'relation' => 'AND',
    'meta_query' => $mq_args
);

global $wp_query;
$user_query = new WP_User_Query( $args );
