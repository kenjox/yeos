<?php while (have_posts()) : the_post(); //Start the loop ?>
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<div class="page-content">
			<?php the_content(); ?>
		</div>
	</article>
<?php endwhile; //End the loop ?>