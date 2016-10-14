<?php
/************************************************************
Plugin Name: Magazine Double thumb Widget
Description: Show Magazine blog Double Thumb Posts.To display your selected category posts, recent posts in Homepage
Author: RAJA CRN
Author URI: http://themepacific.com
***************************************************************************************/

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action('widgets_init', 'bresponZive_themepacific_magazine_doublethumb_widgets');
function bresponZive_themepacific_magazine_doublethumb_widgets(){
register_widget('bresponZive_themepacific_mag_doublethumb_Widget');}
/**
 * bresponZive_themepacific_mag_doublethumb_Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class bresponZive_themepacific_mag_doublethumb_Widget extends \WP_Widget {
	function bresponZive_themepacific_mag_doublethumb_Widget(){
 		$widget_ops = array('classname' => 'tpcrn_magazine_doublethumb', 'description' => 'Show Magazine blog Two Column Posts.(For Homapage only)');
 		$control_ops = array('id_base' => 'tpcrn_magazine_doublethumb-widget');
 		$this->WP_Widget('tpcrn_magazine_doublethumb-widget', 'ThemePacific: Magazine 2 column Thumb', $widget_ops, $control_ops);
 	}
/**
* Display the widget
*/
 	function widget($args, $instance)
 	{   extract($args);
  		global $post;
 		$title = $instance['title'];
 		$get_catego = $instance['get_catego'];
 		$posts = $instance['posts'];
 		$second_title = $instance['second_title'];
 		$second_get_catego = $instance['second_get_catego'];
 		$second_posts = $instance['second_posts'];

  		echo $before_widget;
		?>
<div class="head-span-lines"></div>

 	<div class="blog-lists one-half column first"><!-- Begin First Block -->
<h2 class="blogpost-wrapper-title">
 <a href="<?php echo get_category_link($get_catego); ?>"><?php if (get_cat_name($get_catego)) echo get_cat_name($get_catego);else echo $title;?></a>

</h2>

 	<?php
 			$magazine_doub_posts = new \WP_Query(array(
 				'showposts' => $posts,
 				'cat' => $get_catego,
 			));
			$count = 1;
 			?>
 			<ul>
 				 <?php while($magazine_doub_posts->have_posts()): $magazine_doub_posts->the_post(); ?>
 			 <?php if($count == 1): ?>
 					<li class="blog-list-big">

 								<div class="sb-post-big-thumbnail">
									<?php if ( has_post_thumbnail() ) { ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('sb-post-big-thumbnail', array('title' => get_the_title())); ?></a>
									<?php } ?>
 								</div>
								<div class="blog-lists-title">
								 <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
								 <div class="time clearfix">
										<span class="meta_author"><?php the_author_posts_link(); ?></span>
										<span class="meta_date">+ <?php the_time('F d, Y'); ?></span>
										<span class="meta_comments">+ <a href="<?php comments_link(); ?>"><?php comments_number('0 Comment', '1 Comment', '% Comments'); ?></a></span>
								 </div>

									</div>
									<div class="maga-excerpt clearfix">
									<?php the_excerpt(); ?>
									</div>
									<div class="themepacific-read-more"><a class="tpcrn-read-more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e('Read More','bresponZive');?></a>
									</div>
 					</li>

					<?php else: ?>
					<li class="blog-list-small">


 									<div class="sb-post-thumbnail">
														<?php if ( has_post_thumbnail() ) { ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('sb-post-thumbnail', array('title' => get_the_title())); ?></a>
									<?php } else { ?>
										<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><img  src="<?php echo get_template_directory_uri() . \KVSun\Default_IMG; ?>" width="60" height="60" alt="<?php the_title(); ?>" /></a>
									<?php } ?>
 									</div>
									<div class="blog-lists-title">

													 <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
													 	<div class="time clearfix">
										<span class="date"><?php the_time('F d, Y'); ?></span>


									</div>

									</div>
 					</li>

				<?php endif; ?>

 								<?php  $count++; endwhile; ?>
								 <?php wp_reset_query();?>
 						</ul>
 					</div><!-- First Block Ends -->


<div class="blog-lists one-half column second"><!-- Begin Second Block -->
<h2 class="blogpost-wrapper-title">

	 <a href="<?php echo get_category_link($second_get_catego); ?>"><?php if (get_cat_name($second_get_catego)) echo get_cat_name($second_get_catego);else echo $second_title;?></a>

</h2>
<?php
 			$magazine_doub_posts = new \WP_Query(array(
 				'showposts' => $second_posts,
 				'cat' => $second_get_catego,
 			));
			$count=1;
 			?>
 			 		 			<ul>
 				 <?php while($magazine_doub_posts->have_posts()): $magazine_doub_posts->the_post(); ?>
 			 <?php if($count == 1): ?>
 					<li class="blog-list-big">

 								<div class="sb-post-big-thumbnail">
									<?php if ( has_post_thumbnail() ) { ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('sb-post-big-thumbnail', array('title' => get_the_title())); ?></a>
									<?php } ?>
 								</div>
								<div class="blog-lists-title">
								 <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
								 <div class="time clearfix">
										<span class="meta_author"><?php the_author_posts_link(); ?></span>
									<span class="meta_date">+ <?php the_time('F d, Y'); ?></span>
									<span class="meta_comments">+ <a href="<?php comments_link(); ?>"><?php comments_number('0 Comment', '1 Comment', '% Comments'); ?></a></span>
										</div>

									</div>
										<div class="maga-excerpt clearfix">
									<?php the_excerpt(); ?>
									</div>
									<div class="themepacific-read-more"><a class="tpcrn-read-more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e('Read More','bresponZive');?></a>
						</div>
 					</li>

					<?php else: ?>
					<li class="blog-list-small">


 									<div class="sb-post-thumbnail">
														<?php if ( has_post_thumbnail() ) { ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('sb-post-thumbnail', array('title' => get_the_title())); ?></a>
									<?php } else { ?>
										<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><img  src="<?php echo get_template_directory_uri() . \KVSun\Default_IMG; ?>" width="60" height="60" alt="<?php the_title(); ?>" /></a>
									<?php } ?>
 									</div>
									<div class="blog-lists-title">
										 <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
										<div class="time clearfix">
										<span class="date"><?php the_time('F d, Y'); ?></span>


									</div>


									</div>
 					</li>

				<?php endif; ?>

 								<?php  $count++; endwhile; ?>
								 <?php wp_reset_query();?>
 						</ul>
 					</div><!-- End Second Block -->
  		<?php
 		echo $after_widget;
 	}
/**
	 * Update the widget settings.
	 */
 function update($new_instance, $old_instance){
 		$instance = $old_instance;
 		$instance['title'] = $new_instance['title'];
 		$instance['get_catego'] = $new_instance['get_catego'];
 		$instance['posts'] = $new_instance['posts'];
   		$instance['second_title'] = $new_instance['second_title'];
 		$instance['second_get_catego'] = $new_instance['second_get_catego'];
 		$instance['second_posts'] = $new_instance['second_posts'];
 		return $instance;
 	}
	/* Widget form*/
 function form($instance){
 		$defaults = array('title' => 'Recent Posts', 'get_catego' => 'all', 'posts' => 3, 'second_title' => 'Recent Posts', 'second_get_catego' => 'all', 'second_posts' => 3 );
 		$instance = wp_parse_args((array) $instance, $defaults); ?>



		<h3><?php _e('First Column::','bresponZive');?></h3>
 		<p>
 			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','bresponZive');?></label>
 			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
 		</p>

 		<p>
 			<label for="<?php echo $this->get_field_id('get_catego'); ?>"><?php _e('Filter by Category:','bresponZive');?></label>
 			<select id="<?php echo $this->get_field_id('get_catego'); ?>" name="<?php echo $this->get_field_name('get_catego'); ?>" class="widefat categories" style="width:100%;">
 				<option value='all' <?php if ('all' == $instance['get_catego']) echo 'selected="selected"'; ?>><?php _e('Select categories','bresponZive');?></option>
 				<?php $get_catego = get_categories('hide_empty=0&depth=1&type=post');
 				 foreach($get_catego as $category) { ?>
 				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['get_catego']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
 				<?php } ?>
 			</select>
 		</p>
 		<p>
 			<label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e('N.O. of Posts to Show','bresponZive');?></label>
 			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo $instance['posts']; ?>" />
 		</p>

		<h3><?php _e('Second Column::','bresponZive');?></h3>
 		<p>
 			<label for="<?php echo $this->get_field_id('second_title'); ?>"><?php _e('Title','bresponZive');?></label>
 			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('second_title'); ?>" name="<?php echo $this->get_field_name('second_title'); ?>" value="<?php echo $instance['second_title']; ?>" />
 		</p>
 		<p>
 			<label for="<?php echo $this->get_field_id('second_get_catego'); ?>"><?php _e('Filter by Category:','bresponZive');?></label>
 			<select id="<?php echo $this->get_field_id('second_get_catego'); ?>" name="<?php echo $this->get_field_name('second_get_catego'); ?>" class="widefat categories" style="width:100%;">
 				<option value='all' <?php if ('all' == $instance['second_get_catego']) echo 'selected="selected"'; ?>>all categories</option>
 				<?php $get_catego = get_categories('hide_empty=0&depth=1&type=post');
 				 foreach($get_catego as $category) { ?>
 				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['second_get_catego']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
 				<?php } ?>
 			</select>
 		</p>
 		<p>
 			<label for="<?php echo $this->get_field_id('second_posts'); ?>"><?php _e('N.O. Of Posts to Show','bresponZive');?></label>
 			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('second_posts'); ?>" name="<?php echo $this->get_field_name('second_posts'); ?>" value="<?php echo $instance['second_posts']; ?>" />
 		</p>
 	<?php }
 }
 ?>
