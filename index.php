<?php
	define('DEBUG_MODE', true);
	if (DEBUG_MODE) {
		ob_start();
		set_include_path(__DIR__ . DIRECTORY_SEPARATOR . 'classes' . PATH_SEPARATOR . get_include_path());
		spl_autoload_register('spl_autoload');
		$console = \shgysk8zer0\Core\Console::getInstance();
		$console->asErrorHandler();
		$console->asExceptionHandler();
		$timer = new \shgysk8zer0\Core\Timer();
	}
	get_header();
?>
<!--#blocks-wrapper-->
<div class="blocks-wrapper clearfix">
<!--#blocks-left-or-right-->

	<div class="blocks-left eleven columns clearfix">	   			
			<div class="news-box">		
			<?php   get_template_part( 'includes/blog', 'kvlife' );?>		
 							<?php dynamic_sidebar('Magazine Style Widgets)'); ?>

  			</div>
 			<!-- /blocks col -->
 <?php
 	get_sidebar();
	get_footer();
	if (DEBUG_MODE) {
		$console->log("Loaded in {$timer} ms.");
		$console->sendLogHeader();
	}
?>
