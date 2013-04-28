<?php get_header(); ?>
<section id="main" role="main">
	<div class="container">
		<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <header>
				<h1 class="page-title"><?php the_title(); ?></h1>
				<?php //houston_breadcrumbs(); ?>
            </header>
		    <?php the_content(); ?>
		</article>
	<?php endwhile; //End the loop ?>
	</div>
</section>	
<?php get_footer(); ?>