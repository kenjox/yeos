<div class="row">
    <div class="span5">
        <table id="user-table" class="table table-bordered">
            <thead>
            <tr>
                <th colspan="2"><?php _e("Om mig","yeos") ?></th>
            </tr>
            </thead>

            <tbody>
            <!-- Phone -->
            <?php if(is_user_logged_in()): ?>
            <tr>
                <td><?php _e("Telefonnummer","yeos") ?></td>
                <td><?php echo $user_data['phone']; ?></td>
            </tr>
            <?php endif; ?>

            <tr>
                <td><?php _e("Område","yeos") ?></td>
                <td><?php foreach((array)$user_data['areas'] as $area){ echo $area->name."<br />"; } ?></td>
            </tr>



            <!-- Business -->
            <thead>
            <tr>
                <th colspan="2"><?php _e("Verksamhet","yeos") ?></th>
            </tr>
            </thead>
            <tr>
                <td><?php _e("Arbetsroll","yeos") ?></td>
                <td><?php echo $user_data['work_title']; ?></td>
            </tr>
            <tr>
                <td><?php _e("Företag","yeos") ?></td>
                <td><?php echo $user_data['work_company']; ?></td>
            </tr>

            <tr>
                <td><?php _e("Verksamhetsområde","yeos") ?></td>
                <td><?php foreach(explode('<br />', nl2br($user_data['expertises'])) as $expertise){ echo $expertise."<br />"; } ?></td>
            </tr>

            </tbody>

            <!-- Websites -->
            <thead>
            <tr>
                <th colspan="2"><?php _e("Webbsidor","yeos") ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            //TODO: Make default behaviour for non exisiting.
            ?>
            <?php foreach($user_data['website'] as $media): ?>
            <tr>
                <td><?php echo $media['name']; ?></td>
                <td><a href="<?php echo $media['link']; ?>" alt="<?php echo $media['name']; ?>" title="<?php echo $media['name']; ?>"><?php echo $media['link']; ?></a></td>
            </tr>
            <?php endforeach; ?>

            <!-- Social Media -->
            <thead>
            <tr>
                <th colspan="2"><?php _e("Mer från","yeos") ?> <?php  echo $user_data['first_name']." ".$user_data['last_name']  ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            //TODO: Make default behaviour for non exisiting.
            ?>
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