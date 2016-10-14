<?php
	namespace KVSun;
	require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoloader.php';

	if (DEBUG_MODE) {
		ob_start();
		$console = \shgysk8zer0\Core\Console::getInstance();
		$timer = new \shgysk8zer0\Core\Timer();
		$console->asErrorHandler();
		$console->asExceptionHandler();
	}
	global $bresponZive_tpcrn_data;
	get_header();
?>
<div id="blocks-wrapper" class="clearfix">
	<div id="blocks-left" class="eleven columns clearfix">
		<!--Archive content-->
		<!-- .blogposts-wrapper-->
		<h2 class="blogpost-wrapper-title" style="margin-top:30px;">
		<?php
			if(is_day()) {
				printf(__('Daily Archives: %s', 'bresponZive'), get_the_date());
			} elseif(is_month()) {
				printf(__('Monthly Archives: %s', 'bresponZive'), get_the_date('F Y'));
			} elseif(is_year()) {
				printf(__('Yearly Archives: %s', 'bresponZive'), get_the_date('Y'));
			} elseif(is_category() || is_tag()) {
				printf(__('Articles Posted in the "%s" Category', 'bresponZive'), single_cat_title('', false));
			} elseif(is_author()) {
				printf(__('Articles Posted by the Author: %s', 'bresponZive'), $curauth->nickname);
			} else {
				_e('Blog Archives', 'bresponZive');
			}
		?>
		</h2>
		<?php get_template_part( 'includes/blog', 'loop' );?>
	</div>
	<!-- END MAIN -->
<?php
	get_sidebar();
	get_footer();
	if (DEBUG_MODE) {
		$console->log("Loaded in {$timer} ms.");
		$console->info(get_included_files());
		$console->sendLogHeader();
	}
?>
