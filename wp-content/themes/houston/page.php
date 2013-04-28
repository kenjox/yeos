<?php get_header(); ?>
<?php get_template_part('template-parts/nav/filter-bar'); ?>
<section id="main" class="container">
	<div id="content" class="row post-box members-box">

	<?php for($i = 0; $i < 3 ; $i++): ?>				
			<?php foreach(get_users() as $user): ?>
			<?php $usermeta = get_user_meta( $user->ID ); ?>
				<div class="three end columns member-block">
					<div class="wrapper">
						<a href="<?php echo get_author_posts_url($user->ID); ?>" title="">
							<div class="img">
								<img src="<?php echo houston_resize(get_field("profile_picture","user_".$user->ID), 320, 350,true,false,false); ?>" alt="" title="" />							
							</div>
							<h5 class="name"><?php echo $usermeta['first_name'][0]." ".$usermeta['last_name'][0]; ?></h5>
							<h6 class="name title"><?php echo get_field("work_title","user_".$user->ID) ?></h6>
						</a>
						<div class="floater">
							<?php if(get_field("profile_description","user_".$user->ID)): ?>
								<a href="#" title="" class="btn btn-info btn-small show-overlay"><i class="icon-info-sign icon-white"></i></a>
							<?php endif; ?>
							<?php if(get_field("speaker_public","user_".$user->ID)): ?>
								<a href="#" title="Medlem håller föreläsningar" class="btn btn-success btn-small has-tip tip-top"><i class="icon-user icon-white"></i></a>
							<?php endif; ?>
						</div>
						
						<?php if(get_field("profile_description","user_".$user->ID)): ?>
						<div class="overlay">
								<p><?php echo wp_trim_words(get_field("profile_description","user_".$user->ID),40); ?></p>
						</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
	<?php endfor; ?>
	</div>
</section>	
<?php get_footer(); ?>