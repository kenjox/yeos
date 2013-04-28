<?php 
	get_header();
	global $user, $usermeta;
	$user = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));	
	$usermeta = get_user_meta( $user->ID );
	//get_template_part('template-parts/nav/member-bar'); 
?>

<figure id="presentation" class="container">
	<img class="bg hide-for-small" src="<?php echo houston_resize(get_field("profile_picture_ia","user_".$user->ID), 900, 450,true,false,false); ?>" alt="" title="" />
	<div class="pattern"></div>
	<div class="row">
		<div class="twelve columns">
			<div class="profile_wrapper">
				<img class="profile" src="<?php echo houston_resize(get_field("profile_picture","user_".$user->ID), 250, 250,true,false,false); ?>" alt="" title="" />
			</div>
			<h1><?php echo $usermeta['first_name'][0]." ".$usermeta['last_name'][0]; ?></h1>
			<h4><?php echo get_field("work_title","user_".$user->ID) ?></h4>
			<span class="location"><i class="icon-map-marker icon-white"></i>Göteborg</span>
		</div>
	</div>
	<div id="tabs" class="row">
		<div class="twelve columns">
			<dl class="tabs">
			  <dd class="active"><a href="#tab1">Om <?php echo $usermeta['first_name'][0]; ?></a></dd>
			  <dd><a href="#tab2">Simple Tab 2</a></dd>
			  <dd class="hide-for-small"><a href="#tab3">Kontakta</a></dd>
			 </dl>
		</div>
	</div>
</figure>


<section id="main" class="container">
	<div class="row">
		<div class="twelve columns">
		

		
		</div>
	</div>
	<div id="content" class="post-box single-member-box">
		<ul class="tabs-content">
			<li class="active" id="tab1Tab">
				<div class="row">
					<div class="four columns">
					<table class="dark">
						<thead>
							<tr>
								<th colspan="2">Snabbfakta</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td colspan="2">Foot</td>
							</tr>
						</tfoot>
						<tbody>
							<tr>
								<td>Body</td>
								<td>Body</td>
							</tr>
							<tr>
								<td>Body</td>
								<td>Body</td>
							</tr>
							<tr>
								<td>Body</td>
								<td>Body</td>
							</tr>							
						</tbody>
						<thead>
							<tr>
								<th colspan="2">Kontaktinformation</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Body</td>
								<td>Body</td>
							</tr>
							<tr>
								<td>Body</td>
								<td>Body</td>
							</tr>
							<tr>
								<td>Body</td>
								<td>Body</td>
							</tr>							
						</tbody>
					</table>
				</div>
					<div class="eight columns description">
					<?php echo get_field("profile_description","user_".$user->ID); ?>
				</div>
			</li>
			<li id="tab2Tab">
				<div class="row"><div class="twelve columns">Kommer snart</div></div>
			</li>
			<li id="tab3Tab">
				<div id="formrow" class="row"><div class="twelve columns"><?php echo do_shortcode('[gravityform id="1"]'); ?></div></div>
			</li>
		</ul>			
	</div>

</section>	
<?php get_footer(); ?>