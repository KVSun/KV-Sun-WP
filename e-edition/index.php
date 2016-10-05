<?php
/**
 * @todo Add login check before loading E-Edition. Redirect to login if needed.
 */
namespace KVSun\WP_E_Edition;
use \shgysk8zer0\Core as Core;
use \shgysk8zer0\DOM as DOM;

ob_start();
set_include_path(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'classes');
spl_autoload_register('spl_autoload');

$console = Core\Console::getInstance();
$console->asErrorHandler()->asExceptionHandler();
$timer = new Core\Timer();

try {
	$header = Core\Headers::getInstance();
	$url    = Core\URL::getInstance();

	$root = __DIR__ . DIRECTORY_SEPARATOR . 'E-Editions';

	if (array_key_exists('section', $_GET)) {
		if (array_key_exists('date', $_GET)) {
			$week = new Week($root, $_GET['date']);
		} else {
			$week = new Week($root, 'Wednesday');
			if ($week->getOffset() > time()) {
				$week->modify('-1 week');
			}
		}

		if (isset($week->{$_GET['section']})) {
			$week->{$_GET['section']}->out();
		} else {
			trigger_error(
				"No section '{$_GET['section']}' found for {$week->format('M j, Y')}."
			);
		}
	} else {
		$week = new Week($root, array_key_exists('date', $_GET) ? $_GET['date'] : 'Wednesday');
		if ($week->getTimestamp() > time()) {
			$week->modify('-1 week');
		}
	}

	$scanner = $week->scan();

	$header->content_type = 'text/html';
	$dom = new DOM\HTML();
	$dom->head->append('title', __NAMESPACE__);
	$dom->body->append('h1', 'Read an E-Edition');
	$list = $dom->body->append('ul');

	foreach ($scanner as $file) {
		$url->query = [
			'date' => $week->format('Y-m-d'),
			'section' => "$file"
		];
		$list->append('li')->append(
			'a',
			"{$week->format('F j, Y')} | $file Section",
			['href' => "$url"]
		);
	}

	$console->info($week);
	$console->log("Loaded in $timer seconds.");

	$console->sendLogHeader();
	echo $dom;
} catch(\Exception $e) {
	http_response_code($e->getCode());
	$header->content_type = 'text/plain';
	$console->error($e);
	$console->sendLogHeader();
	echo $e->getMessage();
}
