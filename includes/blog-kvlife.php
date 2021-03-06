<?php
	namespace KVSun;

	begin_file(__FILE__);
	$url = \shgysk8zer0\Core\URL::getInstance();
	$url = clone($url);
	foreach(CATEGORY_SLUGS as $heading => $slug) : $url->path = "category/{$slug}/";
?>
<h2 itemprop="headline" class="blogpost-wrapper-title">
	<a href="<?=$url?>"><?php _e($heading,'bresponZive');?></a>
</h2>
<div id=<?=$slug;?> class="blog-lists-blog clearfix">
	<div class="blogposts-wrapper clearfix">
		<div>
			<div class="border-shadow">
				<div class="col-sm-6 col-md-6 col-lg-6 bordr-rgt">
<?php
	$args = array(
		'category_name' => $slug,
		'posts_per_page' => '1',
	);
	$query = new \WP_Query( $args );
	while ($query->have_posts()) : $query->the_post();
?>
<div class="news-img">
	<div class="news-heading">
		<div class="date-time clearfix">
			<p itemprop="datePublished" class="pull-left badge"><?php echo get_the_date('d M,Y'); ?></p>
			<p class="pull-right badge"><?php echo get_the_date('h:i A'); ?></p>
		</div>
		<h3 itemprop="headline">
			<a itemprop="url" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
 </div>
<?php
$image = get_the_post_thumbnail_url();
if (isset($image) and trim($image) !== '' )  {  ?>
	<a itemprop="url" href="<?php  the_permalink(); ?>" title="<?php the_title(); ?>" class="post-thumbnail">
		<img class="post-thumbnail" itemprop="image" src="<?=$image?>" alt=""  />
	</a>
<?php } else { ?>
	<a itemprop="url" href="<?php  the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
		<img class="post-thumbnail" itemprop="image" src="<?=get_template_directory_uri() . DEFAULT_IMG; ?>" alt="" />
	</a>
<?php } ?>
</div>
<p>Photo By <?php the_field('photo_credit');?></p>
<div class="news-description">
	<p itemprop="text">
		<?php the_excerpt(); ?><br>
		<a class="tpcrn-read-more" href="<?php  the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e('Read More','bresponZive');?></a>
		<span class="pull-right" style="font-size: 14px; margin-top: 7px;">By
			<?php
				if(get_field('author') == "") {
					echo ucfirst(get_the_author());
				} else {
					the_field('author');
				}
			?>
		</span>
	</p>
</div>
<?php endwhile;?>
</div>
<div class="col-sm-6 col-md-6 col-lg-6">
<div class="news-list">
<ul>
<?php
	$args = array(
		'category_name' => $slug,
		'posts_per_page' => POSTS_PER_PAGE,
	);
	$query = new \WP_Query( $args );
	$c = 0;
	if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
	$c++;
	if( $c ==1 ) continue;
?>
<li>
	<a itemprop="url" href="<?php  the_permalink(); ?>"><b><?php the_title(); ?></b></a>
	<span itemprop="datePublished" class="badge news-date">
		<?= get_the_date('d-m-Y') == date('d-m-Y') ? get_the_date('h:i A'): get_the_date('d M,Y')?>
	</span>
</li>
<?php endwhile; else: ?>
<h2 class="noposts"><?php _e('Sorry, no posts to display!','bresponZive');?> </h2>
<?php endif;?>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
<?php endforeach;?>
</div>
<?php end_file(__FILE__);?>
