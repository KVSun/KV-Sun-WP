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
	get_header();
?>
<div id="blocks-wrapper" class="clearfix">
	<div id="blocks-left" class="eleven columns clearfix">
		<!--Search Results content-->
		<h2 class="blogpost-wrapper-title">
			<?php printf(__('Search results for "%s" ', 'bresponZive'), get_search_query()); ?>
		</h2>
		<?php   get_template_part( 'includes/blog', 'loop' );?>
		<!--/.blogposts-wrapper-->
	</div>
<?php
	if (DEBUG_MODE) {
		$console->log("Loaded in {$timer} ms.");
		$console->info(get_included_files());
		$console->sendLogHeader();
	}
?>
