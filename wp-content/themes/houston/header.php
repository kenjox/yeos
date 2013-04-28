<?php
	//Set variables for performance
	$turl = get_bloginfo("template_url");
	//require files for theme INIT
	require TEMPLATEPATH.'/lib/less/lessc.inc.php';
	//Compile Less
	try { lessc::ccompile(TEMPLATEPATH.'/css/app.less', TEMPLATEPATH.'/css/app.css'); } catch (exception $ex) { exit('lessc fatal error:<br />'.$ex->getMessage()); }
?>
<!doctype html>
<!--[if lt IE 7]> 	<html class="no-js ie6 oldie" lang="en">	<![endif]-->
<!--[if IE 7]>    	<html class="no-js ie7 oldie" lang="en">	<![endif]-->
<!--[if IE 8]>    	<html class="no-js ie8 oldie" lang="en">	<![endif]-->
<!--[if gt IE 8]>	<!--> <html class="no-js" lang="en"> 		<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	
	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<!--[if lt IE 9]><link rel="stylesheet" href="<?php echo $turl; ?>/css/ie.css"><![endif]-->
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
	<!-- Favicon and Feed -->
	<link rel="shortcut icon" type="image/png" href="<?php echo $turl; ?>/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
	<?php 
		//----------------------------------------------------
		//	Include iOS touch icons if is_mobile()
		//----------------------------------------------------	
		//if(is_ios()) get_template_part('template-parts/mobile/apple-touch-icons');
	
		//----------------------------------------------------
		//	Javascriptfiles (Combined & Minified by Houston)
		//----------------------------------------------------
		wp_enqueue_script('jquery');
		wp_enqueue_script('fd_modernizr', $turl . '/lib/foundation/javascripts/modernizr.foundation.js','','',false);					
		wp_enqueue_script('fd_js', $turl . '/lib/foundation/javascripts/foundation.min.js','','',true);
		wp_enqueue_script('hoverintent', $turl . '/js/hoverIntent.js','','',true);
		wp_enqueue_script('bs_js', $turl . '/lib/bootstrap/js/bootstrap.min.js','','',true);
		wp_enqueue_script('app', $turl . '/js/app.js','','',true);			


		//----------------------------------------------------
		//	Additional CSSfiles
		//----------------------------------------------------			


		wp_head();
	?>
	<link rel="stylesheet" href="<?php echo $turl; ?>/css/app.css">
</head>
<body <?php body_class(); ?>>

	<?php if(is_page(4)): ?>
	<header id="header" class="container" role="banner">
		<div id="userwall" class="row">
			<?php 
				for($i = 0; $i < 12; $i++):
			?>	
				<div class="three columns mobile-one">
					<img src="<?php echo houston_resize(get_bloginfo("template_url")."/images/user".mt_rand(1,7).".jpg",320,200,true); ?>" alt="" title="" class="img-circle" />
				</div>		
			<?php	
				endfor;
			?>
		</div>
		
		<figure id="signin">
			<div class="row">
				<div class="twelve columns">
					
					
					
					
					
					
					<div class="btn-group right">
					<?php 
						if ( !is_user_logged_in() ) {
							echo '<a class="btn btn-primary btn-success" href="#" data-reveal-id="loginModal"><i class="icon-user icon-white"></i> '.__("Logga in").'</a>';
						} else {
							echo '<a class="btn btn-primary btn-warning" href="'.self_admin_url('profile.php').'"><i class="icon-user icon-white"></i> '.__("Redigera").'</a>';
							echo '<a class="btn btn-primary btn-inverse" href="'.wp_logout_url(home_url()).'"><i class="icon-off icon-white"></i> '.__("Logga ut").'</a>';
						}
					?>
					</div>
					
					
					
					
				</div>
			</div>
		</figure>
		<aside id="welcome" class="hide-for-small">
			<div class="row">
				<div id="logo" class="six columns">
					<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php bloginfo("template_url"); ?>/images/logo.png" alt="" title="" /></a>
				</div>
				<div id="description" class="columns six">
					<h4 class="subheader">
						Young Entrepreneurs of Sweden är ett nätverk för unga företagare där vi tillsammans löser samhällsproblem.						
					</h4>
				</div>
			</div>
		</aside>
	</header>
	<?php endif; ?>
	
	<?php
	get_template_part('template-parts/nav/top-bar');
	?>