<div class="row">
    <div class="span5">
        <table id="user-table" class="table table-bordered">
            <thead>
            <tr>
                <th colspan="2">Snabbfakta</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>Titel</td>
                <td><?php echo $user_data['work_title']; ?></td>
            </tr>
            <tr>
                <td>Företag</td>
                <td><?php echo $user_data['work_company']; ?></td>
            </tr>
            <tr>
                <td>Body</td>
                <td>Body</td>
            </tr>
            </tbody>


            <thead>
            <tr>
                <th colspan="2">Mer från <?php  echo $user_data['first_name']." ".$user_data['last_name']  ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($user_data['social_media'] as $media): ?>
            <tr>
                <td><?php echo $media['name']; ?></td>
                <td><a href="<?php echo $media['link']; ?>" alt="<?php echo $media['name']; ?>" title="<?php echo $media['name']; ?>"><?php echo $media['link']; ?></a></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="span7 description">
        <?php echo get_field("profile_description","user_".$user->ID); ?>
    </div>
</div>