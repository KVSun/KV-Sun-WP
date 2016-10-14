<?php
	namespace KVSun;
	require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoloader.php';

	begin_file(__FILE__);
	if (DEBUG_MODE) {
		ob_start();
		$console = \shgysk8zer0\Core\Console::getInstance();
		$timer = new \shgysk8zer0\Core\Timer();
		$console->asErrorHandler();
		$console->asExceptionHandler();
	}
	get_header();
?>
<!-- #blocks-wrapper-->
<div id="blocks-wrapper" class="clearfix">
  <?php
global $wp_query;
 $cat_ID = get_the_category($post->ID);
$cat_ID = $cat_ID[0]->cat_ID;
$this_post = $post->ID;
?>
	<!-- /blocks Left-->
		<div id="blocks-left" class="eleven columns post-649 page type-page status-publish hentry pmpro-has-access <?php if(is_page('calendar')){ echo 'column-left'; }?>"  <?php //post_class('eleven columns');?> >

		<!-- .post-content-->
		<div class="post-content">
   		<!--/.post-outer -->
			<div class="post-outer clearfix">
  				<!--.post-title-->
 				  <div class="post-title"><h1 class="entry-title"><?php the_title(); ?></h1></div>
				  <!--/.post-title-->
 			 <!-- .post_content -->
			  <div class = 'post_content entry-content'>
					  <?php		 // set up or arguments for our custom query
			  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			  $query_args = array('cat' => $cat_ID, 'paged' => $paged,'post__not_in' => array($this_post), 'posts_per_page' => 2, 'orderby' => 'date');
			  // create a new instance of WP_Query
			  $the_query = new \WP_Query( $query_args );
			 if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); // run the loop ?>
		  		<!-- Post Wrap Start-->
				<div class="post hentry ivycat-post">
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<?php
								echo '<div itemprop="datePublished" class="day-partition">'.get_the_date('d M,Y').'</div>';
							?>
							<!-- 	This outputs the post TITLE -->
							<h2 itemprop="headline" class="entry-title"><a itemprop="url" href="<?php
							the_permalink();
							?>"><?php the_title(); ?></a></h2>
							<!-- This will output of the featured image thumbnail  -->
							</div>
							<div class="col-sm-3 col-md-3 col-lg-3">
							<div class="featured-image">
								<?php
								  $image = get_field('photo_upload');
								  if( !empty($image) ){ ?>

												<img itemprop="image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
									<?php }else{ ?>
										 <div class="empty-img">
										  <img itemprop="image" src="<?php echo get_site_url(); ?>/wp-content/uploads/2016/06/empty1.png">
										  </div>
									<?php } ?>
							</div>
							<p style="font-size:12px;">Photo By <?php
												   the_field('photo_credit');
													?>
								 </p>
							</div>
							<div class="col-sm-9 col-md-9 col-lg-9">
							<!-- 	This outputs the post EXCERPT.  To display full content including images and html,
								replace the_excerpt(); with the_content();  below. -->
							<div itemprop="text" class="entry-summary">
								<?php the_excerpt(); ?>
							</div>
							<!--	This outputs the post META information -->
							<div class="entry-utility">
								<?php if ( count( get_the_category() ) ) : ?>
										<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'posts-in-page' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
								<?php endif; ?>
								<?php
									$tags_list = get_the_tag_list( '', ', ' );
									if ( $tags_list ):	?>

								<?php endif; ?>
								<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'posts-in-page' ), __( '1 Comment', 'posts-in-page' ), __( '% Comments', 'posts-in-page' ) ); ?></span>
								<?php edit_post_link( __( 'Edit', 'posts-in-page' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
							</div>
							<p style="padding-left:4px;font-size:12px;padding-top:8px;">By <?php
									if(get_field('author') == ""){
										echo ucfirst(get_the_author());
									}else{
										the_field('author'); }
									?></p>
							</div>
						</div>
					<div class="clearfix"></div>
				</div>
	  <?php endwhile; ?>

<?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
  <nav class="prev-next-posts">
	<div class="prev-posts-link">
	  <?php echo get_next_posts_link( 'Older Entries', $the_query->max_num_pages ); // display older posts link ?>
	</div>
	<div class="next-posts-link">
	  <?php echo get_previous_posts_link( 'Newer Entries' ); // display newer posts link ?>
	</div>
  </nav>
<?php } ?>

<?php else: ?>
	<div class = 'post_content entry-content'>
		<div class="post hentry ivycat-post">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					<h1>Sorry...</h1>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
	<div class="clear"></div>
</div>
<!-- /.post_content -->
<?php wp_link_pages(); ?>
	<div class='clear'></div>
</div>
<!--/.post-outer -->
</div>
</div>
<!-- /blocks Left -or -right -->
<?php
	get_sidebar();
	get_footer();
	end_file(__FILE__);
	if (DEBUG_MODE) {
		$console->log("Loaded in {$timer} ms.");
		$console->info(get_included_files());
		$console->sendLogHeader();
	}
?>
