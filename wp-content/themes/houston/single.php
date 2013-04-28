<?php get_header(); ?>
<section id="main" class="container">
	<div class="row">
		<div id="content" class="eight columns" role="main">
			<div class="post-box">
				<?php get_template_part('template-parts/loops/loop', 'single'); ?>
			</div>
		</div><!-- End Content row -->
		<?php get_sidebar(); ?>

	</div>
</section>	
<?php get_footer(); ?>