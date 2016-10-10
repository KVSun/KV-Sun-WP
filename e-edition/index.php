<?php
/**
 * @todo Add login check before loading E-Edition. Redirect to login if needed.
 */
namespace KVSun\WP_E_Edition;
use \shgysk8zer0\Core as Core;
use \shgysk8zer0\DOM as DOM;

const ROOT      = __DIR__ . DIRECTORY_SEPARATOR . 'E-Editions';
const PUB_DAY   = 'Wednesday';
const DATE_KEY  = 'date';
const ISSUE_KEY = 'section';
const SCAN_BACK = 4;

ob_start();
set_include_path(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'classes');
spl_autoload_register('spl_autoload');

function list_weeks(Week $week, DOM\HTMLElement $container, $scan = SCAN_BACK)
{
	$url = Core\URL::getInstance();
	$scanner = $week->scan();
	$weeks = 0;

	while ($weeks++ < $scan) {
		$details = $container->append('details');
		$details->append('summary')->append('b', $week->format('F j, Y'));
		$list = $details->append('ul');

		foreach ($scanner as $file) {
			$url->query = [
				DATE_KEY    => $week->format('Y-m-d'),
				ISSUE_KEY   => "$file"
			];
			$list->append('li')->append('a', $file, ['href' => "$url"] );
		}
		try {
			$week->modify('-1 week');
		} catch (\Exception $e) {
			Core\Console::getInstance()->error($e->getMessage());
			break;
		}
	}
	$container->getElementsByTagName('details')->item(0)->open = 'true';
}

$console = Core\Console::getInstance();
$console->asErrorHandler()->asExceptionHandler();
$timer = new Core\Timer();

try {
	$header = Core\Headers::getInstance();
	$url    = Core\URL::getInstance();

	$date = new \DateTime(array_key_exists(DATE_KEY, $_GET) ? $_GET[DATE_KEY] : null);
	if ($date->format('l') !== PUB_DAY) {
		$date->modify(PUB_DAY);
	}

	if ($date > new \DateTime()) {
		$date->modify('-1 week');
	}

	$week = new Week(ROOT, $date->format($date::W3C));
	unset($date);

	if (array_key_exists(ISSUE_KEY, $_GET)) {
		if (isset($week->{$_GET[ISSUE_KEY]})) {
			$week->{$_GET[ISSUE_KEY]}->out();
		} else {
			trigger_error(
				"No section '{$_GET['section']}' found for {$week->format('M j, Y')}."
			);
		}
	}

	$header->content_type = 'text/html';
	$dom = new DOM\HTML();
	$dom->head->append('title', __NAMESPACE__);
	$dom->body->append('a', null, [
		'href' => '/'
	])->append('img', null, [
		'src' => '/images/sun.svg',
		'alt' => 'Kern Valley Sun homepage'
	]);

	$form = $dom->body->append('form', null, ['name' => 'edition-date']);
	$form->append('input', null, [
		'type' => 'date',
		'name' => DATE_KEY,
		'placeholder' => 'YYYY-mm-dd',
		'required' => '',
		'autofocus' => ''
	]);
	$form->append('button', 'Search', ['type' => 'submit]']);

	$dom->body->append('h1', 'Read an E-Edition')->append('svg', null, [
		'height'      => 64,
		'width'       => 64,
		'xmlns'       => 'http://www.w3.org/2000/svg',
		'xmlns:xlink' => 'http://www.w3.org/1999/xlink'
	])->append('use', null, [
		'xlink:href' => '/images/icons.svg#book'
	]);;

	$dom->body->append('hr');

	list_weeks($week, $dom->body);

	exit($dom);
} catch(\Exception $e) {
	http_response_code($e->getCode());
	$header->content_type = 'text/plain';
	$console->error($e);
	exit($e->getMessage());
}
