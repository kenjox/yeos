<?php get_header(); ?>
<section id="main">
<div class="container">
	<div class="row">
		<div id="content" class="span8" role="main">
			<?php while (have_posts()) : the_post();	//Start the loop ?>
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<header>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
					<footer>
						<p><?php the_tags(); ?></p>
					</footer>
					<?php comments_template(); ?>
				</article>
			<?php endwhile; // End the loop ?>
		</div>
		
		<?php get_sidebar(); ?>

	</div>
</div>
</section>	
<?php get_footer(); ?>