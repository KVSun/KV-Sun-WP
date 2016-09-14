<?php
	ob_start();
	set_include_path(__DIR__ . DIRECTORY_SEPARATOR . 'classes' . PATH_SEPARATOR . get_include_path());
	spl_autoload_register('spl_autoload');
	$console = \shgysk8zer0\Core\Console::getInstance();
	$console->asErrorHandler();
	$console->asExceptionHandler();
	$timer = new \shgysk8zer0\Core\Timer();
?>
<?php get_header();  ?>
<!--#blocks-wrapper-->
<div class="blocks-wrapper clearfix">
<!--#blocks-left-or-right-->
	<div class="blocks-left eleven columns clearfix">
			<div class="news-box">
			<h2 itemprop="headline" class="blogpost-wrapper-title"><?php _e('News','bresponZive');?> </h2>
			<?php   get_template_part( 'includes/blog', 'news' );?>
			</div>

			<h2 itemprop="headline" class="blogpost-wrapper-title"><?php _e('Sports News','bresponZive');?> </h2>
			<?php   get_template_part( 'includes/blog', 'sport' );?>

			<h2 itemprop="headline" class="blogpost-wrapper-title"><?php _e('KV Life','bresponZive');?> </h2>
			<?php   get_template_part( 'includes/blog', 'kvlife' );?>
<!--homepage content-->
 							<?php dynamic_sidebar('Magazine Style Widgets)'); ?>

  			</div>
 			<!-- /blocks col -->
 <?php get_sidebar();  ?>

 <?php get_footer(); ?>
 <?php
	$console->log("Loaded in {$timer} ms.");
	$console->sendLogHeader();
?>
