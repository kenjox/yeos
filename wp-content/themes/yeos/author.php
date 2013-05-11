<?php
get_header();
global $user, $usermeta;
$user = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
$usermeta = get_user_meta( $user->ID );
$pictures = get_field('pictures', 'user_'.$user->ID);
$user_data = array(
    "id" => $user->ID,
    "username" => $user->user_login,
    "link" => get_author_posts_url($user->ID),
    "profile_picture" => $pictures[0]['profile_picture'],
    "profile_picture_ia" => $pictures[0]['profile_picture_ia'],
    "phone" => get_field('telephone', 'user_'.$user->ID),
    "hide_phone" => get_field('hide_telephone', 'user_'.$user->ID),
    "first_name" => $usermeta['first_name'][0],
    "last_name" => $usermeta['last_name'][0],
    "work_title" => $usermeta['work_title'][0],
    "work_company" => $usermeta['work_company'][0],
    "profile_description" => $usermeta['profile_description'][0],
    "speaker_public" => $usermeta['speaker_public'][0],
    "social_media" => get_field('social_media', 'user_'.$user->ID),
    "website" => get_field('website', 'user_'.$user->ID),
    "areas" => get_field('geo_areas', 'user_'.$user->ID),
    "expertises" => get_field('expertises', 'user_'.$user->ID)
);
?>

<div id="presentation" class="">
    <div class="container">
        <img class="bg" src="<?php echo houston_resize($user_data["profile_picture_ia"], 900, 450,true,false,false); ?>" alt="" title="" />
        <div class="pattern"></div>


        <div class="user-info">
                <div class="profile_wrapper">
                    <img class="profile" src="<?php echo houston_resize($user_data["profile_picture"], 250, 250,true,false,false); ?>" alt="" title="" />
                </div>
                <h1><?php echo $user_data['first_name']." ".$user_data['last_name']; ?></h1>
                <h4><?php echo $user_data['work_title'] ?> <?php echo ($user_data['work_company']) ? '('.$user_data['work_company'].')' : ''; ?></h4>
                <span class="location"><i class="icon-map-marker icon-white"></i>Göteborg</span>
        </div>



    </div>
</div>
<section id="tabs">
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">Profil</a></li>
            <li><a href="#profile" data-toggle="tab">Annat</a></li>
            <li><a href="#messages" data-toggle="tab">Skicka meddelande</a></li>
        </ul>
    </div>
</section>

<section id="main" class="">
    <div class="container">
    <div id="content" class="post-box single-member-box">

        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <?php require_once(get_template_directory().'/members/single/info.php'); ?>
            </div>
            <div class="tab-pane" id="profile">
                <?php


                ?>
            </div>
            <div class="tab-pane" id="messages">
                <div id="formrow">
                <?php echo do_shortcode('[gravityform id="1"]'); ?>
                </div>
            </div>
        </div>


    </div>
    </div>
</section>
<?php get_footer(); ?>