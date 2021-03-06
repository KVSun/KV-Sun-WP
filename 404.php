<?php
	namespace KVSun;
	require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoloader.php';
	if (DEBUG_MODE) {
		$timer = new \shgysk8zer0\Core\Timer();
	}

	if (array_key_exists('REDIRECT_URL', $_SERVER)) {
		require_once __DIR__ . DIRECTORY_SEPARATOR . 'url_map.php';
		redirect_check();
	}
	get_header();
?>
<!--#blocks-wrapper-->
<div id="blocks-wrapper" class="clearfix">
<!--#blocks-left-or-right-->
	<div id="blocks-left" class="eleven columns">
		<div class="post-content">
			<div class="post-title clearfix">
				<h1><?php _e('Page Not Found', 'bresponZive'); ?></h1>
			</div>
			<div class='post_content' ><!-- Begin post entry -->
				<?php get_search_form(); ?>
			<div class="clear"></div>
			</div><div class='clear'></div></div>
			<!--Post Content ends-->
	</div>
	<!-- BEGIN SIDEBAR -->
	<?php
	get_sidebar();
	get_footer();
	if (DEBUG_MODE) {
		$console = \shgysk8zer0\Core\Console::getInstance();
		$console->info($_SERVER);
		$console->log("Loaded in {$timer} ms.");
		$console->sendLogHeader();
	}
?>
