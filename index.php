<?php
	namespace KVSun;
	require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoloader.php';

	begin_file(__FILE__);

	if (DEBUG_MODE) {
		$timer = new \shgysk8zer0\Core\Timer();
	}

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
	end_file(__FILE__);
	if (DEBUG_MODE) {
		\shgysk8zer0\Core\Console::getInstance()->log("Loaded in {$timer} ms.");
		\shgysk8zer0\Core\Console::getInstance()->sendLogHeader();
	}
?>
