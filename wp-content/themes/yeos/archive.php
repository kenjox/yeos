<?php get_header(); ?>
<?php get_template_part('members/archive/filter-bar'); ?>


<section id="main" role="main">
    <div class="container">
        <div class="row">
            <?php
            require_once(get_template_directory().'/members/archive/query.php');
            require(get_template_directory().'/members/archive/loop.php');

            ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>