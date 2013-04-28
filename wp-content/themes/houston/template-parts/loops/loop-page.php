<?php while (have_posts()) : the_post();	//Start the loop ?>
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<header>
			<h1 class="page-title"><?php the_title(); ?></h1>
			<?php houston_breadcrumbs(); ?>
		</header>
		<div class="page-content">
			<?php the_content(); ?>
		</div>
		<footer>
			<!-- Footer content -->
		</footer>
	</article>
<?php endwhile; //End the loop ?>