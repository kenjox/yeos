<?php get_header(); ?>
<section id="main" role="main">
	<div class="container">
		<div class="row">
			<!-- Row for main content area -->
			<div id="content" class="span8">
		
				<div class="post-box">
					<h1>Sökresultat för "<?php echo get_search_query(); ?>"</h1>
					<?php get_template_part('/loops/loop'); ?>
                    <?php get_template_part('template-parts/pagination'); ?>
				</div>
	
			</div><!-- End Content row -->
			
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>