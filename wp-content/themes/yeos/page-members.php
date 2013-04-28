<?php
/*
Template Name: Medlemsarkiv
*/
?>
<?php get_header(); ?>
<?php get_template_part('members/archive/filter-bar'); ?>

<section id="main" role="main">
	<div class="container">
		<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		    <?php the_content(); ?>
		</article>
        <div class="row">
        <?php

        require_once(get_template_directory().'/members/archive/query.php');
        require(get_template_directory().'/members/archive/loop.php');

        ?>
        </div>
	<?php endwhile; //End the loop ?>
	</div>
</section>	
<?php get_footer(); ?>