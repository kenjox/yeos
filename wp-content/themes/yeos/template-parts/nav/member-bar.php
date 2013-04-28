<?php  global $user, $usermeta; ?>
<section id="membernavcontainer" class="container">

	<div class="row">
		<div class="twelve columns">
			<h1 class="subheader">
				<strong><?php echo $usermeta['first_name'][0]." ".$usermeta['last_name'][0]; ?></strong>
				| <?php echo get_field("work_title","user_".$user->ID) ?>
			</h1>
		</div>
	</div>	

</section>