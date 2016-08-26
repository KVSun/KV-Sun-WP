<?php

//$category = get_the_category();
//echo $category[0]->slug;

//echo $_SERVER['HTTP_USER_AGENT'];
//var_dump(is_bot($_SERVER['HTTP_USER_AGENT']));
//die;

if(is_bot($_SERVER['HTTP_USER_AGENT'])){  
	
	if (have_posts()) : while (have_posts()) : the_post(); 
		//$pmpro_levels = pmpro_getAllLevels();	 
		//echo '<pre>'; print_r($pmpro_levels);
		//$postid = get_the_ID();
		//$user_id = get_current_user_id();
		//$return_membership_levels = true;
		//echo '<pre>';
		//print_r(pmpro_has_membership_access($postid, $user_id, $pmpro_levels));

		get_header(); ?>
		
		<!-- #blocks-wrapper-->
		<style>
			.img-post {
			  background: #f0f0f0 none repeat scroll 0 0;
			  border: 1px solid #f0f0f0;
			  padding: 6px;
			  width: 58%;
			  float: left;
			  margin: 5px;
			}
			.photo-cred {
			  color: #666;
			  font-size: 12px!important;
			  font-weight: bold;
			}
			.photo-title {
			  font-weight: bold;
			  font-size: 18px!important;
			  color:#666;
			}
			.photo-caption {
			  color: #666;
			}
			@media only screen and (max-width: 480px) {
				.img-post {
			  width: 100%;
			}
			.post-meta-blog{width:100%;}
			}
		</style>

		<div id="blocks-wrapper" class="clearfix" itemprop="mainEntityOfPage">
			<!-- /blocks Left -or -right -->
			<div id="blocks-left" <?php post_class('eleven columns');?>>	 		
				<!-- .post-content-->
				<div class="post-content">
					<?php 
						if(isset($bresponZive_tpcrn_data['posts_bread'])) {
							if($bresponZive_tpcrn_data['posts_bread'] == 'On' ) {
								bresponZive_themepacific_breadcrumb(); 
							}
						}
					?>						
					
					<!--/.post-outer -->
					<div class="post-outer clearfix">
						<!--.post-title-->
						<div class="post-title"><h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1></div>
						<!--/.post-title-->
						
						<!--/#post-meta --> 
						<div class="post-meta-blog">
							<!--span class="meta_author"><?php //_e('Posted by', 'bresponZive'); ?> <?php the_author_posts_link(); ?></span-->
							<!--span class="meta_date"><?php //_e('On', 'bresponZive'); ?> <?php the_time('F d, Y'); ?></span-->
							<span class="meta_date" itemprop="datePublished" content="<?php echo get_the_date( 'Y-m-d' ); ?> <?php the_time( 'H:i:s' ); ?>"><?php _e('Posted:', 'bresponZive'); ?> <?php the_time('l, F d, Y g:i a'); ?></span><br>
							<span class="meta_author" itemprop="author" itemscope itemtype="https://schema.org/Person">
								<b><?php _e('By', 'bresponZive'); ?></b>
								<b itemprop="name"> 
									<?php 
										//the_field('author');
										if(get_field('author') == ""){ 
											echo ucfirst(get_the_author()); 
										}else{ 
											the_field('author'); 
										} 
									?>
								</b>
							</span>
							<span class="meta_comments">  <a href="<?php comments_link(); ?>"><span class="img-chat"><img src="http://design.insonix.com/kernvelly/wp-content/themes/bresponzive/images/chat.png"></span><?php comments_number('0 Comment', '1 Comment', '% Comments'); ?></a></span>
							<?php// edit_post_link( __( 'Edit', 'bresponZive' ), '<span class="edit-link">', '</span>' ); ?>
							<meta itemprop="dateModified" content="<?php the_modified_date('Y-m-d'); ?> <?php the_modified_date('H:i:s'); ?>"/>
						</div>
						<!--/#post-meta --> 
						
						<!-- .post_content -->
						<div class = 'post_content entry-content'>
							
							<!--  Photo box start -->
							<?php 
								$image = get_field('photo_upload'); 
								if(!empty($image['url'])){
							?>
							<div class="img-post" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
								<?php
									//$image = get_field('photo_upload'); //image start
									if( !empty($image) ){ ?>
										<img itemprop="url" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
										<!--meta itemprop="url" content="<?php echo $image['url']; ?>"-->
										<meta itemprop="width" content="800">
										<meta itemprop="height" content="800">
								<?php 
									}  
									//end image  
								?>  
								<p class="photo-cred" itemprop="author">Photo by <?php the_field('photo_credit');  // photo credit ?></p>
								<p class="photo-title"><?php  the_field('photo_title');  // title ?></p>
								<p class="photo-caption" itemprop="caption"><?php  the_field('caption'); // caption ?></p>
							</div>
							<!--  Photo box end -->
							<?php 
								}else{ ?>
									<div style="display:none;" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
										<img itemprop="url" src="<?php echo get_template_directory_uri(); ?>/images/default-image.png" alt="<?php echo get_template_directory_uri(); ?>/images/default-image.png" />
										<!--meta itemprop="url" content="<?php echo get_template_directory_uri(); ?>/images/default-image.png"-->  
										<meta itemprop="width" content="800">
										<meta itemprop="height" content="800">
									</div>
							<?php 
								} 
							?>
							<span><?php	the_content(); ?></span>
							<div class="clear"></div>
							<div style="display:none;" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
								<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
									<img itemprop="url" src="<?php echo get_template_directory_uri(); ?>/images/sun-icons/sun-logo.png" width="128" height="128"/>
									<meta itemprop="width" content="128">
									<meta itemprop="height" content="128">
								</div>
								<meta itemprop="name" content="Kern Valley Sun">
							</div>
						</div>	
						<?php 
							the_post_thumbnail();
							echo get_post(get_post_thumbnail_id())->post_excerpt;
						?>
					<!-- /.post_content -->
					<?php wp_link_pages(); ?>
   					<div class='clear'></div>
					<?php 
						if(isset($bresponZive_tpcrn_data['posts_tags'])){ 
							if($bresponZive_tpcrn_data['posts_tags'] == 'On'){ 
					?>
								<p class="post-tags">
									<strong><?php _e('TOPICS','bresponZive');?>  </strong><?php the_tags('',''); ?>					
								</p>
						<?php 
							}
						} 
						?>
					</div>
					<!--/.post-outer -->
				</div>
				<!-- post-content-->
				<?php 
					if(isset($bresponZive_tpcrn_data['posts_navigation'])){ 
						if($bresponZive_tpcrn_data['posts_navigation'] == 'On'){ 
				?>
							<!-- .single-navigation-->
							<div class="single-navigation clearfix">
								<div class="previous"><?php previous_post_link('%link', __( '<span>Previous: </span> %title', 'bresponZive' ) ); ?></div>
								<div class="next"><?php next_post_link('%link', __( '<span>Next: </span> %title', 'bresponZive' ) ); ?></div>
							</div>
							<!-- /single-navigation-->
				<?php 
						} 
					} 
					comments_template(); ?>
				</div>
				<!-- /blocks Left-->
				<?php  
					get_sidebar(); 
					get_footer(); 
			endwhile; 
		endif; 
	die;	

}else if (!is_user_logged_in() && ! is_page( 'login' ) ) {
	$_SESSION['post_url'] = "http://".$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	//die;
	$r_url = esc_url( home_url( '/login/' ) );
	header('location:'.$r_url);
	//wp_redirect( $return_url );
}else if(is_user_logged_in() && function_exists('pmpro_hasMembershipLevel') && pmpro_hasMembershipLevel())
{	
	global $current_user;
	$current_user->membership_level = pmpro_getMembershipLevelForUser($current_user->ID);
	//echo 'Membership Level: ' . $current_user->membership_level->name;
	if(!empty($current_user->membership_level->name)){
			if (have_posts()) : while (have_posts()) : the_post(); 


//$pmpro_levels = pmpro_getAllLevels();	 
//echo '<pre>'; print_r($pmpro_levels);
//$postid = get_the_ID();
//$user_id = get_current_user_id();
//$return_membership_levels = true;
//echo '<pre>';
//print_r(pmpro_has_membership_access($postid, $user_id, $pmpro_levels));

?>
<?php get_header(); ?>
<!-- #blocks-wrapper-->
<style>
.img-post {
  background: #f0f0f0 none repeat scroll 0 0;
  border: 1px solid #f0f0f0;
  padding: 6px;
  width: 58%;
  float: left;
  margin: 5px;
}
.photo-cred {
  color: #666;
  font-size: 12px!important;
  font-weight: bold;
}
.photo-title {
  font-weight: bold;
  font-size: 18px!important;
  color:#666;
}
.photo-caption {
  color: #666;
}
@media only screen and (max-width: 480px) {
	.img-post {
  width: 100%;
}
.post-meta-blog{width:100%;}
}
</style>

<div id="blocks-wrapper" class="clearfix" itemprop="mainEntityOfPage">
     
	
	
	
	<!-- /blocks Left -or -right -->
	<div id="blocks-left" <?php post_class('eleven columns');?>>	 		
		
		<!-- .post-content-->
		<div class="post-content">
  				<?php 
			  if(isset($bresponZive_tpcrn_data['posts_bread'])) {
			  if($bresponZive_tpcrn_data['posts_bread'] == 'On' ) {
			   bresponZive_themepacific_breadcrumb(); 
			  }}
			 ?>						
		<!--/.post-outer -->
			<div class="post-outer clearfix">
			
 				<!--.post-title-->
 				  <div class="post-title"><h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1></div>
				  <!--/.post-title-->
 		<!--/#post-meta --> 
			<div class="post-meta-blog">
			<!--span class="meta_author"><?php //_e('Posted by', 'bresponZive'); ?> <?php the_author_posts_link(); ?></span-->
			<!--span class="meta_date"><?php //_e('On', 'bresponZive'); ?> <?php the_time('F d, Y'); ?></span-->
			
			<span class="meta_date" itemprop="datePublished" content="<?php echo get_the_date( 'Y-m-d' ); ?> <?php the_time( 'H:i:s' ); ?>"><?php _e('Posted:', 'bresponZive'); ?> <?php the_time('l, F d, Y g:i a'); ?></span><br>
			<span class="meta_author" itemprop="author" itemscope itemtype="https://schema.org/Person"><b><?php _e('By', 'bresponZive'); ?></b><b itemprop="name"> <?php 
			 //the_field('author');
			if(get_field('author') == ""){ 
				echo ucfirst(get_the_author()); 
			}else{ 
				the_field('author'); } 
			?></b></span>
			<span class="meta_comments">  <a href="<?php comments_link(); ?>"><span class="img-chat"><img src="http://design.insonix.com/kernvelly/wp-content/themes/bresponzive/images/chat.png"></span><?php comments_number('0 Comment', '1 Comment', '% Comments'); ?></a></span>
 			<?php// edit_post_link( __( 'Edit', 'bresponZive' ), '<span class="edit-link">', '</span>' ); ?>
 			<meta itemprop="dateModified" content="<?php the_modified_date('Y-m-d'); ?> <?php the_modified_date('H:i:s'); ?>"/>
 			</div>
			<!--/#post-meta --> 
			
			
			
			
			



			<!-- .post_content -->
			
			  <div class = 'post_content entry-content'>
			  <!--  Photo box start -->
			  <?php $image = get_field('photo_upload'); 
			  if(!empty($image['url'])){
			  ?>
			 <div class="img-post" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
			 <?php
			 //$image = get_field('photo_upload'); //image start

					if( !empty($image) ){ ?>

						<img itemprop="url" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						 <!--meta itemprop="url" content="<?php echo $image['url']; ?>"-->
						<meta itemprop="width" content="800">
						<meta itemprop="height" content="800">

			<?php 
					}  //end image  ?>  
					<p class="photo-cred" itemprop="author">Photo by <?php the_field('photo_credit');  // photo credit ?></p>
					<p class="photo-title"><?php  the_field('photo_title');  // title ?></p>
					<p class="photo-caption" itemprop="caption"><?php  the_field('caption');      // caption
					?></p>
			 </div>
			<!--  Photo box end -->
  					<?php 
			  }else{ ?>
			  <div style="display:none;" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
					<img itemprop="url" src="<?php echo get_template_directory_uri(); ?>/images/default-image.png" alt="<?php echo get_template_directory_uri(); ?>/images/default-image.png" />
					<!--meta itemprop="url" content="<?php echo get_template_directory_uri(); ?>/images/default-image.png"-->  
					<meta itemprop="width" content="800">
					<meta itemprop="height" content="800">
			  </div>
			  <?php } ?>
				<span><?php	the_content(); ?></span>
  					<div class="clear"></div>
					<div style="display:none;" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
						<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
						
						<img itemprop="url" src="<?php echo get_template_directory_uri(); ?>/images/sun-icons/sun-logo.png" width="128" height="128"/>
						  <meta itemprop="width" content="128">
						  <meta itemprop="height" content="128">
						</div>
						<meta itemprop="name" content="Kern Valley Sun">
					</div>
 			 </div>	
			 <?php the_post_thumbnail();
                   echo get_post(get_post_thumbnail_id())->post_excerpt;?>
			 <!-- /.post_content -->
					<?php wp_link_pages(); ?>
   					<div class='clear'></div>
					<?php if(isset($bresponZive_tpcrn_data['posts_tags'])){ ?>
					<?php if($bresponZive_tpcrn_data['posts_tags'] == 'On'){ ?>
					<p class="post-tags">
						<strong><?php _e('TOPICS','bresponZive');?>  </strong><?php the_tags('',''); ?>					
						</p>
						<?php }} ?>
			</div>
		<!--/.post-outer -->
 
		</div>
		<!-- post-content-->
 
			 <?php if(isset($bresponZive_tpcrn_data['posts_navigation'])){ ?>
			 <?php if($bresponZive_tpcrn_data['posts_navigation'] == 'On'){ ?>
		 		<!-- .single-navigation-->
				<div class="single-navigation clearfix">
					<div class="previous"><?php previous_post_link('%link', __( '<span>Previous: </span> %title', 'bresponZive' ) ); ?></div>
					<div class="next"><?php next_post_link('%link', __( '<span>Next: </span> %title', 'bresponZive' ) ); ?></div>
					 <?php  ?>
				</div>
				<!-- /single-navigation-->
			<?php } } ?>
 
   					<?php comments_template(); ?>
 				
			
			</div>
			<!-- /blocks Left-->
 			
<?php  get_sidebar(); ?>
			
<?php get_footer(); ?>
<?php endwhile; endif; 
	}
	
}else{ 
	header('Location: '.get_site_url().'/membership-account/membership-levels/');
}
	/*$_SESSION['post_url'] = "http://".$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	//die;
	$r_url = esc_url( home_url( '/login/' ) );
	header('location:'.$r_url);
	//header('Location: '.get_site_url().'/membership-account/membership-levels/');
	exit();
	*/

?>
