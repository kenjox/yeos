<?php if(!has_action('houston_footer_markup')): ?>
<?php do_action("houston_before_footer") ?>
<footer class="site-footer" role="contentinfo">
	<div class="container">
		<strong>&copy; 2008-<?php echo date('Y'); ?> All rights reserved.</strong> Producerad av <a href="http://www.raketwebbyra.se" title="Raket Webbyrå">Raket Webbyrå</a>
	</div>
</footer>
<?php do_action("houston_after_footer") ?>
<?php else: do_action('houston_footer_markup'); endif; ?>

<?php wp_footer(); ?>
</body>
</html>
