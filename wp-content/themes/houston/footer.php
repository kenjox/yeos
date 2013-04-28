
		<footer id="content-info"  class="container" role="contentinfo">
			<div class="row">
				<div class="twelve columns">&copy; 2008-<?php echo date('Y'); ?> All rights reserved.</div>
			</div>
		</footer>
		<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
		     chromium.org/developers/how-tos/chrome-frame-getting-started -->
		<!--[if lt IE 7]>
			<script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
			<script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
<?php 
	get_template_part('template-parts/modal/modal','login');
	wp_footer();
?>
</body>
</html>