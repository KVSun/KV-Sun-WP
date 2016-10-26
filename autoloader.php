<?php
namespace KVSun;

if (! array_key_exists('SERVER_ADDR', $_SERVER)) {
	$_SERVER['SERVER_ADDR'] = 'localhost';
}
if (! array_key_exists('REMOTE_ADDR', $_SERVER)) {
	$_SERVER['REMOTE_ADDR'] = $_SERVER['SERVER_ADDR'];
}

require_once __DIR__ . DIRECTORY_SEPARATOR . 'consts.php';

if (defined(__NAMESPACE__ . '\INCLUDE_PATH') and is_array(INCLUDE_PATH)) {
	set_include_path(join(PATH_SEPARATOR, array_map(function($path)
	{
		return __DIR__ . DIRECTORY_SEPARATOR . $path;
	}, INCLUDE_PATH)). PATH_SEPARATOR . get_include_path());
}

if (defined(__NAMESPACE__ . '\AUTOLOAD_FUNC')) {
	spl_autoload_register(AUTOLOAD_FUNC);
}

if (
	defined(__NAMESPACE__ . '\BLOCKED_AGENTS') and is_array(BLOCKED_AGENTS)
	and in_array($_SERVER['HTTP_USER_AGENT'], BLOCKED_AGENTS)
) {
	http_response_code(404);
	exit();
}

if (
	defined(__NAMESPACE__ . '\BLOCKED_IPS') and is_array(BLOCKED_IPS)
	and in_array($_SERVER['REMOTE_ADDR'], BLOCKED_IPS)
) {
	http_response_code(404);
	exit();
}

function is_admin()
{
	return function_exists('is_user_logged_in') and is_user_logged_in()
		and in_array('administrator', wp_get_current_user()->roles);
}

if (DEBUG_MODE) {
	ob_start();
	\shgysk8zer0\Core\Console::getInstance()->asErrorHandler()->asExceptionHandler();
} elseif (file_exists('tracker.json')) {
	new \shgysk8zer0\Core\Tracker('tracker', 'kernvalleysun');
}

