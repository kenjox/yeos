<section id="navcontainer" class="container">
	<div class="row">
		<div class="twelve columns">
		<!-- Navigation (add "fixed" for sticky) -->
			<nav class="top-bar contain-to-grid">
				<ul>
					<li class="name">
						<a href="<?php bloginfo("home"); ?>" title="">
						YEoS Medlemmar
						</a>
					</li>
					<!-- Title Area -->
					<li class="toggle-topbar"><a href="#"></a></li>
				</ul>
				
				<section>
					<ul class="right">
					<?php
						$navigation = (is_mobile() && has_nav_menu('mobile_primary_navigation')) ? 'mobile_primary_navigation' : 'primary_navigation';
						wp_nav_menu( array(
							'theme_location' => $navigation,
							'container' =>false,
							'menu_class' => '',
							'echo' => true,
							'before' => '',
							'after' => '',
							'link_before' => '',
							'link_after' => '',
							'items_wrap' => '%3$s',
							'walker' => new houston_topbar_walker())
						); 
					?>
					</ul>
				</section>
			</nav>
		<!-- End nav -->
		</div>
	</div>
</section>