<?php
	namespace KVS;
	require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoloader.php';
	is_user_logged_in() and in_array('administrator', wp_get_current_user()->roles)
		? define('DEBUG_MODE', true) : define('DEBUG_MODE', false);

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
	if (\Autoloader\DEBUG_MODE) {
		$console->log("Loaded in {$timer} ms.");
		$console->sendLogHeader();
	}
?>
