<?php get_header(); ?>
<section id="main" class="container">
	<div class="row">
		<div id="content" class="twelve columns" role="main">
			<div class="post-box">
				<?php get_template_part('template-parts/loops/loop', 'index'); ?>
			</div>
		</div><!-- End Content row -->
	</div>
</section>	
<?php get_footer(); ?>