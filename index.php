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
