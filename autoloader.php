<?php
namespace KVS;
set_include_path(__DIR__ . DIRECTORY_SEPARATOR . 'classes' . PATH_SEPARATOR . get_include_path());
spl_autoload_register('spl_autoload');
define('DEBUG_MODE', is_admin());
function is_admin()
{
	return function_exists('is_user_logged_in') and is_user_logged_in()
		and in_array('administrator', wp_get_current_user()->roles);
}


