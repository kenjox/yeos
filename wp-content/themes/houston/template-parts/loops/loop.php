<?php while (have_posts()) : the_post(); //Start the Loop ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</header>
		<div class="entry-content">
			<?php the_content('Continue reading...'); ?>
		</div>
		<footer>
			<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
		</footer>
		<div class="divider"></div>
	</article>	
<?php endwhile; //End the loop ?>

<!-- Paginering -->
<?php if ($wp_query->max_num_pages > 1) : ?>
	<nav id="post-nav">
		<ul class="pagination">
			<?php houston_pagenavi(); ?>
		</ul>
	</nav>
<?php endif; ?>