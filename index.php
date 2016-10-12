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
	new \shgysk8zer0\Core\Tracker('tracker');

	get_header();
	if (!is_user_logged_in()) {
		require_once __DIR__ . DIRECTORY_SEPARATOR . 'pass.html';
	}
?>
<!--#blocks-wrapper-->
<div class="blocks-wrapper clearfix">
<!--#blocks-left-or-right-->
	<div class="blocks-left eleven columns clearfix">
			<div class="news-box">
			<?php
				get_template_part( 'includes/blog', 'kvlife' );
				dynamic_sidebar('Magazine Style Widgets)');
			?>
			</div>
			<!-- /blocks col -->
<?php
	get_sidebar();
	get_footer();
	if (DEBUG_MODE) {
		$console->log("Loaded in {$timer} ms.");
		$console->info(get_included_files());
		$console->sendLogHeader();
	}
?>
