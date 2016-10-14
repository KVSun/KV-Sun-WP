<?php
namespace KVSun;

/**
 * Checks if URL matches URL pattern of old site
 *
 * @param  shgysk8zer0\Core\URL $url URL object
 * @return bool                 Whether or not it matches the patten
 */
function is_old_url(\shgysk8zer0\Core\URL $url)
{
	return preg_match(OLD_URL_PATTERN, $url->path);
}

/**
 * Redirect from old site URL to new one
 * The new URL may or may not exist.
 *
 * @param  shgysk8zer0\Core\URL $url URL object
 * @return void
 * @todo Check before redirect if new URL exists
 */
function redirect_old_url(\shgysk8zer0\Core\URL $url)
{
	$headers = \shgysk8zer0\Core\Headers::getInstance();
	$url->path = preg_replace(OLD_URL_PATTERN, null, $url->path);
	$headers->Location = "$url";
	http_response_code(\shgysk8zer0\Core_API\Abstracts\HTTPStatusCodes::MOVED_PERMANENTLY);
	exit();
}

/**
 * Takes a URL object from old website and returns a new one with updated path
 *
 * @param  shgysk8zer0\Core\URL $url URL object
 * @return shgysk8zer0\Core\URL $url Modified URL object / clone
 */
function get_new_url(\shgysk8zer0\Core\URL $url)
{
	$new = clone($url);
	$new->path = trim(preg_replace(OLD_URL_PATTERN, null, $new->path), '/');
	return $new;
}

/**
 * Checks if a redirect is needed to convert old site URL to new site URL
 * Redirects if necessary
 *
 * @param void
 * @return void
 */
function redirect_check()
{
	$url = \shgysk8zer0\Core\URL::getInstance();
	if (is_old_url($url)) {
		redirect_old_url($url);
	}
}
