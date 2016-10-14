<?php
	namespace KVSun;
	begin_file(__FILE__);
?>
		<div class="blog-lists-blog clearfix">
			<div class="blogposts-wrapper clearfix">
		<?php
			$cat = trim($_SERVER['REQUEST_URI'], '/');
			$cat = end(explode('/', $cat));
			$query = new \WP_Query( "category_name={$cat}" );
			\shgysk8zer0\Core\Console::getInstance()->log($query);
			unset($cat);
			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
		?>
		<div class="blogposts-inner">
			<ul>
				<li class="full-left clearfix">
					<div <?php post_class();?>>
						<?php if ( has_post_thumbnail() ) { ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post-thumbnail">
								<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'mag-image'); ?>
								<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"  />
							</a>
						<?php } else { ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
								<img class="post-thumbnail" src="<?= get_template_directory_uri() . DEFAULT_IMG; ?>" width="128" height="128" alt="<?php the_title(); ?>" />
							</a>
						<?php } ?>
					</div>
					<div class="list-block clearfix">
						<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
						<div class="post-meta-blog">
						<span class="meta_author"><?php _e('by', 'bresponZive'); ?> <?php the_author_posts_link(); ?></span>
						<span class="meta_date"><?php _e('On', 'bresponZive'); ?> <?php the_time('F d, Y'); ?></span>
						<span class="meta_comments">  <a href="<?php comments_link(); ?>"><?php comments_number('0 Comment', '1 Comment', '% Comments'); ?></a></span>
						</div>
						<div class="maga-excerpt clearfix">
						<?php the_excerpt(); ?>
						</div>
							<div class="themepacific-read-more"><a class="tpcrn-read-more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e('Read More','bresponZive');?></a>
						</div>
				</div>
			</li>
		</ul>
		<br class="clear" />
		</div>
		<?php endwhile;?>
		<?php else: ?>
			<h2 class="noposts"><?php _e('Sorry, no posts to display!','bresponZive');?> </h2>
		<?php endif; ?>
		</div>
		<?php wp_reset_query();?>
		</div>
		<div class="pagination clearfix">
			<?php bresponZive_themepacific_tpcrn_pagination();?>
		</div>
<?php end_file(__FILE__);?>
