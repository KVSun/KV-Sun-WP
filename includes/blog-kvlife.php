<style>
	.day-partition {
		background: #711C1A;
		color: #fff;
		font-size: 14px;
		font-weight: 700;
		line-height: 20px;
		padding: 0 5px;
		-moz-border-radius: 0 0 4px 4px;
		-webkit-border-radius: 0 0 4px 4px;
		border-radius: 0 0 4px 4px;
	}
	.news-img img{width:100%;}
	.news-list ul{margin:0px; padding:0px;}
	.news-list ul li {
		  border-bottom: 1px solid #ccc;
		  padding: 15px 0;
     }
	 .news-list a {
  font-size: 12px;
  font-weight: bold;
}
	 .news-date{float:right; background:transparent; color:#000;}
.news-description > p {
  font-size: 12px;
  padding: 11px 0;
}
.date-time.clearfix {
  margin: 6px 0;
}
.bordr-rgt{border-right:1px solid #ccc;}
.border-shadow{
	 border: 1px solid #ccc;
    box-shadow: 5px 0 10px #ccc;
    float: left;
    margin: 0;
    width: 100%;
	padding:10px;
}

@media only screen and (max-width: 767px) {
  .bordr-rgt{border-right:none;}
}
	
</style>		
	<div id="kv-life" class="blog-lists-blog clearfix">
	
							<div class="blogposts-wrapper clearfix"> 
							
  
	 <?php /* 
		 
			 $query = new WP_Query( 'cat=24' );
			 //echo '<pre>'; print_r($query);
			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
				<?php 
		
				if( $current_date != get_the_date('d-m-Y') ){
					$tTimeHtml = '<div class="day-partition">'.get_the_date('d M,Y').'</div>';
					$current_date = get_the_date('d-m-Y');
				}else{
					$tTimeHtml = '';
				}
				//echo $tTimeHtml;
				*/?>
		<!--<div class="blogposts-inner box-news">
<ul>	 		
			
			<li class="full-left clearfix ">					
				<div <?php //post_class('magbig-thumb');?>>
						 
						 
					  <?php /*if ( has_post_thumbnail() ) { ?>
								<a href="<?php if ( ! is_user_logged_in() && ! is_page( 'login' ) ) {
												echo $r_url = esc_url( home_url( '/login/' ) );
											}else{
												the_permalink();
											} ?>" title="<?php the_title(); ?>" class="post-thumbnail">
								
								<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'mag-image'); ?>
								<img style ="background-image :url(<?php echo $image[0]; ?>); background-repeat:no-repeat; background-size:cover;  background-position: 57% 5%;" alt="<?php //the_title(); ?>"  />
 		 
 							</a>
					  <?php } else { ?>
							<a href="<?php if ( ! is_user_logged_in() && ! is_page( 'login' ) ) {
												echo $r_url = esc_url( home_url( '/login/' ) );
											}else{
												the_permalink();
											} ?>" rel="bookmark" title="<?php the_title(); ?>"><img   style ="background-image :url(<?php echo get_template_directory_uri(); ?>/images/default-image.png);background-repeat:no-repeat; background-size:contain;   background-position: 57% center;" alt="<?php //the_title(); ?>" /></a>
						<?php }*/ ?>
						 
   				</div>
						 
				<div class="list-block clearfix">
					<h3><a href="<?php /*if ( ! is_user_logged_in() && ! is_page( 'login' ) ) {
												echo $r_url = esc_url( home_url( '/login/' ) );
											}else{
												the_permalink();
											} ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3> 
					<span class="meta_comments">  <a href="<?php comments_link(); ?>"><?php comments_number('0 Comment', '1 Comment', '% Comments'); ?></a></span>
							<div class="post-meta-blog">
					<!--span class="meta_author"><?php _e('by', 'bresponZive'); ?> <?php the_author_posts_link(); ?></span>
					<span class="meta_date"><?php _e('On', 'bresponZive'); ?> <?php the_time('F d, Y'); ?></span>
					<span class="meta_comments">  <a href="<?php comments_link(); ?>"><?php comments_number('0 Comment', '1 Comment', '% Comments'); ?></a></span-->
					<?php the_excerpt(); ?>
					<!--</div>
							
														
						
					<!--<div class="themepacific-read-more"><a class="tpcrn-read-more" href="<?php if ( ! is_user_logged_in() && ! is_page( 'login' ) ) {
												echo $r_url = esc_url( home_url( '/login/' ) );
											}else{
												the_permalink();
											} ?>" title="<?php the_title(); ?>"><?php _e('Read More','bresponZive');?></a>
					</div>	

			</div>
		</li></ul>
<br class="clear" /> <!--	
<div class="pagination clearfix">
		  <?php //bresponZive_themepacific_tpcrn_pagination();  */ ?>
		</div>
		</div>-->		
		
		<?php// endwhile;?>
		 		 
		<?php/* 
				
		else: ?>
					
				<h2 class="noposts"><?php _e('Sorry, no posts to display!','bresponZive');?> </h2> 
					
					
		  <?php endif; 

		  
		  */?>
		 
						 <?php // wp_reset_query();?>
	<div class="">
	<div class="border-shadow">
	<div class="col-sm-6 col-md-6 col-lg-6 bordr-rgt">
	<?php 
		$args = array(
			'cat' => '25',
			'posts_per_page' => '1',
		);
		$query = new WP_Query( $args );
		while ($query->have_posts()) : $query->the_post(); 
		
	?>
     <div class="news-img">
	 <div class="news-heading">
	 <div class="date-time clearfix">
	 <p itemprop="datePublished" class="pull-left badge"><?php echo get_the_date('d M,Y'); ?></p>
	 <p class="pull-right badge"><?php echo get_the_date('h:i A'); ?></p>
	 </div>
	 <h3 itemprop="headline"><a itemprop="url" href="<?php /*if ( ! is_user_logged_in() && ! is_page( 'login' ) ) {
												echo $r_url = esc_url( home_url( '/login/' ) );
											}else{
												the_permalink();
											}*/ the_permalink(); ?>"><?php the_title(); ?></a> </h3>
	 </div>
	 <!--a href="<?php if ( ! is_user_logged_in() && ! is_page( 'login' ) ) {
												echo $r_url = esc_url( home_url( '/login/' ) );
											}else{
												the_permalink();
											} ?>">
	 <img src="http://design.insonix.com/kernvelly/wp-content/uploads/2016/05/kolkata-minister-narendra-rally-addresses-campaign-election_9bdf0166-1bf6-11e6-a451-36c3a3fdf989-340x160.jpg" alt="img-news"></a-->
	 <?php 
	 $image = get_field('photo_upload');
	// if ( has_post_thumbnail() ) { 
	  if ( !empty($image) ) { 
	?>
								<a itemprop="url" href="<?php /*if ( ! is_user_logged_in() && ! is_page( 'login' ) ) {
												echo $r_url = esc_url( home_url( '/login/' ) );
											}else{
												the_permalink();
											}*/ the_permalink(); ?>" title="<?php the_title(); ?>" class="post-thumbnail">
								
								<?php //$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'mag-image'); // Featured image ?>
								<img itemprop="image" style ="background-image :url(<?php echo $image['url']; ?>); background-repeat:no-repeat; background-size:cover;  background-position: 57% 5%; height: 172px;" alt="<?php //the_title(); ?>"  />
 		 
 							</a>
					  <?php } else { ?>
							<a itemprop="url" href="<?php /*if ( ! is_user_logged_in() && ! is_page( 'login' ) ) {
												echo $r_url = esc_url( home_url( '/login/' ) );
											}else{
												the_permalink();
											}*/ the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><img itemprop="image"  style ="background-image :url(<?php echo get_template_directory_uri(); ?>/images/default-image.png);background-repeat:no-repeat; background-size:contain;   background-position: 57% center; height: 172px;" alt="<?php //the_title(); ?>" /></a>
						<?php } ?>
	 </div>
	 <p>Photo By <?php 
					the_field('photo_credit');
	                            /*$post = get_the_ID();
								$post_thumbnail_id = get_post_thumbnail_id( $post );
							    //echo '<pre>';
							    //print_r($meta = wp_get_attachment_metadata($post_thumbnail_id));
								$meta = wp_get_attachment_metadata($post_thumbnail_id);
								  if($meta[image_meta][credit] == ""){
									  echo "-";
								  }else{
									 echo $meta[image_meta][credit];	 
								  } 
								  */
							?>
		 </p>
	 
	 <div class="news-description">
	 <p itemprop="text"><?php the_excerpt(); ?><br><a class="tpcrn-read-more" href="<?php /*if ( ! is_user_logged_in() && ! is_page( 'login' ) ) {
												echo $r_url = esc_url( home_url( '/login/' ) );
											}else{
												the_permalink();
											}*/ the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e('Read More','bresponZive');?></a>
											<span class="pull-right" style="font-size: 14px; margin-top: 7px;">By <?php 
			if(get_field('author') == ""){ 
				echo ucfirst(get_the_author()); 
			}else{ 
				the_field('author'); } 
			?></span></p>
	 </div>
	 <?php
		endwhile;
	?>
	</div>
	<div class="col-sm-6 col-md-6 col-lg-6">
	<div class="news-list">
	<ul>
	<?php 
		$args = array(
			'cat' => '25',
			'posts_per_page' => '5',
		);
		$query = new WP_Query( $args );
		$c = 0;
		if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); 
		$c++;
		if( $c ==1 ) continue;
	?>
	<li><a itemprop="url" href="<?php /*if ( ! is_user_logged_in() && ! is_page( 'login' ) ) {
												echo $r_url = esc_url( home_url( '/login/' ) );
											}else{
												the_permalink();
											}*/ the_permalink(); ?>"><b><?php the_title(); ?></b></a><span itemprop="datePublished" class="badge news-date"><?php if(get_the_date('d-m-Y') == date('d-m-Y')){ echo get_the_date('h:i A');}else{ echo get_the_date('d M,Y');} ?></span></li>
	<!--li><a href="#"><b>The Kern Valley Sun held Coffee with a Cop on </b></a><span class="badge news-date">13 July 2016</span></li-->
	<?php
		endwhile;
		else:
	?>
	<h2 class="noposts"><?php _e('Sorry, no posts to display!','bresponZive');?> </h2> 
					
	<?php endif; ?>
	
	</ul>
	</div>
	</div>
	</div>
	</div>
	</div>				 
</div>
		
		  
 
