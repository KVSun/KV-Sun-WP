<?php
	namespace KVS;
	require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoloader.php';
	if (DEBUG_MODE) {
		ob_start();
		$console = \shgysk8zer0\Core\Console::getInstance();
		$timer = new \shgysk8zer0\Core\Timer();
		$console->asErrorHandler();
		$console->asExceptionHandler();
	}

	if (array_key_exists('REDIRECT_URL', $_SERVER)) {
		require_once __DIR__ . DIRECTORY_SEPARATOR . 'url_map.php';
		\KVS\redirect_check();
	}
	get_header();
?>
<!-- #blocks-wrapper-->
<div id="blocks-wrapper" class="clearfix">
	<?php

	if (have_posts()) : while (have_posts()) : the_post();  ?>
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
 					<?php the_content(); ?>
 					<div class="clear"></div>

			 </div>
			 <!-- /.post_content -->
					<?php wp_link_pages(); ?>

  					<div class='clear'></div>
			</div>
		<!--/.post-outer -->

		</div>
		<!-- post-content-->
  <?php //comments_template(); ?>

  				<?php endwhile; endif; ?>

			</div>
			<!-- /blocks Left -or -right -->



<?php get_sidebar(); ?>
<?php get_footer(); ?>
