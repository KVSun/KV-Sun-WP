
	<?php
	  $category_slug = array('news','sports','kv-life');
		  foreach($category_slug as $key => $value) :
			if($value == 'kv-life'){
				    $heading = "KV Life";

				    }
			else if($value == 'sports'){
					$heading = "Sports News";
					}
			else if($value == 'news'){
					$heading = "News";

					}
	?>
	<h2 itemprop="headline" class="blogpost-wrapper-title"><?php _e($heading,'bresponZive');?> </h2>
	<div id=<?php echo $value;?> class="blog-lists-blog clearfix">

							<div class="blogposts-wrapper clearfix">

	<div class="">
	<div class="border-shadow">
	<div class="col-sm-6 col-md-6 col-lg-6 bordr-rgt">
	<?php

		$args = array(
			'category_name' => $value,
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
	 <h3 itemprop="headline"><a itemprop="url" href="<?php  the_permalink(); ?>"><?php the_title(); ?></a> </h3>
	 </div>

	 <?php
	 if (function_exists('get_field')) {
		 $image = get_field('photo_upload');
	 } else {
		 $image = null;
		 trigger_error('Please install Advanced Custom Fields plugin. (https://wordpress.org/plugins/advanced-custom-fields/)');
	 }
	  if ( !empty($image) ) {
	?>
								<a itemprop="url" href="<?php  the_permalink(); ?>" title="<?php the_title(); ?>" class="post-thumbnail">

								<img itemprop="image" style ="background-image :url(<?php echo $image['url']; ?>); background-repeat:no-repeat; background-size:cover;  background-position: 57% 5%; height: 172px;" alt="<?php //the_title(); ?>"  />

 							</a>
					  <?php } else { ?>
							<a itemprop="url" href="<?php  the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><img itemprop="image"  style ="background-image :url(<?php echo get_template_directory_uri(); ?>/images/default-image.png);background-repeat:no-repeat; background-size:contain;   background-position: 57% center; height: 172px;" alt="<?php //the_title(); ?>" /></a>
						<?php } ?>
	 </div>
	 <p>Photo By <?php
					the_field('photo_credit');  ?>
		 </p>

	 <div class="news-description">
	 <p itemprop="text"><?php the_excerpt(); ?><br><a class="tpcrn-read-more" href="<?php  the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e('Read More','bresponZive');?></a>
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
			'category_name' => $value,
			'posts_per_page' => '5',
		);
		$query = new WP_Query( $args );
		$c = 0;
		if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
		$c++;
		if( $c ==1 ) continue;
	?>
	<li><a itemprop="url" href="<?php  the_permalink(); ?>"><b><?php the_title(); ?></b></a><span itemprop="datePublished" class="badge news-date"><?php if(get_the_date('d-m-Y') == date('d-m-Y')){ echo get_the_date('h:i A');}else{ echo get_the_date('d M,Y');} ?></span></li>
	<?php
		endwhile;

		else:
	?>
	<h2 class="noposts"><?php _e('Sorry, no posts to display!','bresponZive');?> </h2>

	<?php endif;

	?>

	</ul>
	</div>
	</div>
	</div>
	</div>
	</div>
   </div>
		<?php
		endforeach;
		?>
	</div>
