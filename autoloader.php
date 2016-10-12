<?php
namespace KVS;
set_include_path(__DIR__ . DIRECTORY_SEPARATOR . 'classes' . PATH_SEPARATOR . __DIR__ . DIRECTORY_SEPARATOR . 'config');
spl_autoload_register('spl_autoload');
define('DEBUG_MODE', is_admin());

if (
	defined('\BLOCKED_AGENTS') and is_array(\BLOCKED_AGENTS)
	and in_array($_SERVER['HTTP_USER_AGENT'], \BLOCKED_AGENTS)
) {
	http_response_code(404);
	exit();
}

function is_admin()
{
	return function_exists('is_user_logged_in') and is_user_logged_in()
		and in_array('administrator', wp_get_current_user()->roles);
}

new \shgysk8zer0\Core\Tracker('tracker', 'kernvalleysun');

