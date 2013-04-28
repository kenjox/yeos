<?php get_header(); ?>
<?php get_template_part('template-parts/nav/filter-bar'); ?>
<section id="main" class="container">
	<div id="content" class="row post-box members-box">
		<?php get_template_part('template-parts/loops/loop', 'search'); ?>
	</div>
</section>	
<?php get_footer(); ?>