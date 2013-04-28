<?php while (have_posts()) : the_post(); //Start the Loop ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>
        <?php the_content('Continue reading...'); ?>
		<div class="divider"></div>
	</article>	
<?php endwhile; //End the loop ?>