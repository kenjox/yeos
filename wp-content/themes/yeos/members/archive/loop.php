<?php
    foreach( $user_query->results as $user):

    $usermeta = get_user_meta( $user->ID );
    $pictures = get_field('pictures', 'user_'.$user->ID);
    $user_data = array(
        "id" => $user->ID,
        "username" => $user->user_login,
        "link" => get_author_posts_url($user->ID),
        "profile_picture" => $pictures[0]['profile_picture'],
        "profile_picture_ia" => $pictures[0]['profile_picture_ia'],
        "first_name" => $usermeta['first_name'][0],
        "last_name" => $usermeta['last_name'][0],
        "work_title" => $usermeta['work_title'][0],
        "work_company" => $usermeta['work_company'][0],
        "profile_description" => $usermeta['profile_description'][0],
        "speaker_public" => $usermeta['speaker_public'][0],
        "social_media" => get_field('social_media', 'user_'.$user->ID),
        "areas" => get_field('geo_areas', 'user_'.$user->ID)
    );
?>
<div class="span3 member-block">
    <div class="wrapper">
        <a href="<?php echo $user_data['link']; ?>" title="">
            <div class="img">
                <img src="<?php echo houston_resize($user_data['profile_picture'], 320, 350,true,false,false); ?>" alt="" title="" />
            </div>
            <h5 class="name"><?php echo $user_data['first_name']." ".$user_data['last_name']; ?></h5>
            <h6 class="name title"><?php echo $user_data['work_title']; ?> <?php echo ($user_data['work_company']) ? '('.$user_data['work_company'].')' : ''; ?></h6>
        </a>
        <div class="floater">
            <?php if($user_data['profile_description']): ?>
            <a href="#" title="" class="btn btn-info btn-small show-overlay"><i class="icon-info-sign icon-white"></i></a>
            <?php endif; ?>
            <?php if($user_data['speaker_public']): ?>
            <a href="#" title="Medlem håller föreläsningar" class="btn btn-success btn-small has-tip tip-top"><i class="icon-user icon-white"></i></a>
            <?php endif; ?>
        </div>

        <?php if($user_data['profile_description']): ?>
        <div class="overlay">
            <p><?php echo wp_trim_words($user_data['profile_description'],40); ?></p>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endforeach; ?>