<?php
namespace Autoloader;
set_include_path(__DIR__ . DIRECTORY_SEPARATOR . 'classes' . PATH_SEPARATOR . get_include_path());
spl_autoload_register('spl_autoload');

function_exists('is_user_logged_in') and is_user_logged_in()
and in_array('administrator', wp_get_current_user()->roles)
	? define('DEBUG_MODE', true) : define('DEBUG_MODE', false);

$url = \shgysk8zer0\Core\URL::getInstance();
$headers = \shgysk8zer0\Core\Headers::getInstance();

if (DEBUG_MODE) {
	ob_start();
	$console = \shgysk8zer0\Core\Console::getInstance();
	$console->asErrorHandler();
	$console->asExceptionHandler();
	$timer = new \shgysk8zer0\Core\Timer();
}
