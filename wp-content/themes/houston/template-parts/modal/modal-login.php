<div id="loginModal" class="reveal-modal small">
	<a class="close-reveal-modal">&#215;</a>
	<div class="row headrow">
		<div class="twelve columns leftcol">
				<section class="row middle">
					<div class="eleven columns centered">

						<?php 
							function custom_login_footer() {
							    return '</div>
									</section>
									<section class="row footer">
										<div class="twelve columns">
												<input type="submit" name="submit" value="'.__("Logga in").'" class="btn btn-success" id="submit"/>
												<input type="submit" name="submit" value="'.__("Använd facebook").'" class="btn btn-info" id="submit"/>
												<a href="#" title="" class="btn btn-primary right"><i class="icon-plus-sign icon-white"></i></a>
										</div>
									</secttion>';
							}
							add_filter('login_form_bottom', 'custom_login_footer');
							wp_login_form(array("value_remember" => true)); 
						?>

					
		</div>
	</div>
</div>