<?php
namespace KVSun\Classifieds;

use \shgysk8zer0\Core as Core;
use \shgysk8zer0\DOM as DOM;

const BASE = __DIR__;
const COLS = 5;
const IMG_PATH = 'current' . DIRECTORY_SEPARATOR . '01 Current Graphics';
const ALLOWED_TAGS = '<b><p><div><br><hr>';
const DISP_AD_PATTERN = '/^\s*\*+\s*DISPLAY\s+AD\s*\*+/i';
const EXT = '.html';
const CSV_FEED = 'display ad feed.5.1.csv';

ini_set('auto_detect_line_endings', true);
error_reporting(0);

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'autoloader.php';
if ($_SERVER['SERVER_NAME'] === 'localhost') {
	$console = \shgysk8zer0\Core\Console::getInstance();
	$console->asErrorHandler();
	$console->asExceptionHandler();
}

function build_classifieds(Array $files, DOM\HTMLElement $container, CSV $csv)
{
	$csv = array_filter($csv->getArrayCopy(), function($row)
	{
		$now = new \DateTime();
		return $now >= new \DateTime($row['Start Date']) and $now <= new \DateTime($row['End Date']);
	});
	\shgysk8zer0\Core\Console::getInstance()->table($csv);
	foreach ($files as $file) {
		$cat = basename($file, EXT);
		if (!is_numeric($cat) or ! array_key_exists($cat, Codes::CATEGORIES)) continue;
		$details = $container->append('details');
		$details->append('summary', htmlentities(Codes::CATEGORIES[$cat]));
		$file = file_get_contents($file);
		$file = strip_tags($file, ALLOWED_TAGS);
		$file = str_replace(["\r", "\r\n", "\n"], null, $file);
		$details->importHTML($file);

		foreach ($csv as $ad) {
			if ((int)$ad['Category Code'] === (int)$cat) {
				$details->append('img', null, [
					'src' => IMG_PATH . "/{$ad['Filename']}",
					'alt' => htmlentities($ad['Ad Text']),
					'title' => htmlentities($ad['Ad Text']),
					'class' => 'ad'
				]);
			}
			$details->append('br');
		}


		foreach($details->getElementsByTagName('div') as $div) {
			$title = $div->getElementsByTagName('b')[0];
			if (isset($title) and preg_match(DISP_AD_PATTERN, $title->textContent)) {
				$details->removeChild($div);
			} else {
				unset($div->align);
			}
		}
	}
}
if (defined('KVSun\DEBUG_MODE') and \KVSun\DEBUG_MODE) {
	$console = Core\Console::getInstance();
	$console->asErrorHandler()->asExceptionHandler();
}
$header = Core\Headers::getInstance();

$classifieds = glob('current' . DIRECTORY_SEPARATOR . '*' . EXT);
$csv = new CSV(__DIR__ . DIRECTORY_SEPARATOR . IMG_PATH . DIRECTORY_SEPARATOR . CSV_FEED);
$dom = DOM\HTML::getInstance();
$dom->head->append('title', 'Classifieds');
$dom->body->append('link', null, ['rel' => 'stylesheet', 'href' => 'import.css']);
$dom->body->append('h1', 'Classifieds');
$dom->body->append('a', 'Home', ['href' => '/']);
$dom->body->append('br');

$dom->body->append('p')->append('b', 'Click on a category to show its entries.');

build_classifieds($classifieds, $dom->body->append('div', null, [
	'class' => 'classified-list',
	'id' => 'classifieds'
]), $csv);

if (isset($console)) {
	$console->sendLogHeader();
}

exit($dom);
