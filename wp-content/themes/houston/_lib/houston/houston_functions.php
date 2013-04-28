<?php
$path = get_template_directory();

//---------------------------------------------------------------------------------
//	Require Files for Houston
//---------------------------------------------------------------------------------

global $pagenow; if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) { require_once($path.'/lib/houston/activate.php'); }
require_once($path."/lib/houston/fallbacks.php");

require_once($path."/lib/houston/functions/classes.php");
require_once($path."/lib/houston/functions/post_type_helper.php");
require_once($path."/lib/houston/functions/general.php");
require_once($path."/lib/houston/functions/images.php");
require_once($path."/lib/houston/functions/menu_walkers.php");
require_once($path."/lib/houston/functions/breadcrumbs.php");
require_once($path."/lib/houston/functions/pagination.php");
if (class_exists('WPBakeryShortCode')) { require_once($path."/lib/houston/functions/visual_composer.php"); }





