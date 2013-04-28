<?php get_header(); ?>
<section id="main" role="main">
    <div class="container">
        <div class="row">
            <!-- Row for main content area -->
            <div id="content" class="span8">
            <?php get_template_part('template-parts/loops/loop', 'index'); ?>
            </div>
            <?php get_sidebar(); ?>
    </div>
</section>	
<?php get_footer(); ?>