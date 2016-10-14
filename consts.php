<?php
namespace KVSun;
const INCLUDE_PATH    = array('classes', 'config');
const AUTOLOAD_FUNC   = 'spl_autoload';
const DEFAULT_IMG     = '/images/sun-icons/128.png';
const POSTS_PER_PAGE  = 5;
const OLD_URL_PATTERN = '/\/[A-z]_?[A-z\d-]+\.html$/';
const COMPANY_LOGO    = '';
const MANIFEST        = __DIR__ . DIRECTORY_SEPARATOR . 'manifest.json';

const CATEGORY_SLUGS = array(
	'News'        => 'news',
	'Sports News' => 'sports',
	'KV Life'     => 'kv-life'
);

const ALLOWED_AGENTS = array(
	"Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)",
	"Mozilla/5.0 (compatible; Googlebot/2.1)",
	"Googlebot/2.1 (+http://www.googlebot.com/bot.html)",
	"Googlebot/2.1 (+http://www.google.com/bot.html)",
	"Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)",
	"msnbot-media/1.1 (+http://search.msn.com/msnbot.htm)",
	"Mozilla/5.0 (compatible; Yahoo! Slurp/3.0; http://help.yahoo.com/help/us/ysearch/slurp)",
	"Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)",
	"SAMSUNG-SGH-E250/1.0 Profile/MIDP-2.0 Configuration/CLDC-1.1 UP.Browser/6.2.3.3.c.1.101 (GUI) MMP/2.0 (compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html)",
	"DoCoMo/2.0 N905i(c100;TB;W24H16) (compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html",
	"Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)",
	"facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)",
	"Twitterbot/1.0",
	"Pinterest/0.2 (+http://www.pinterest.com/)",
	"Mozilla/5.0 (compatible; DotBot/1.1; http://www.opensiteexplorer.org/dotbot, help@moz.com)",
	"Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:28.0) Gecko/20100101 Firefox/28.0 (FlipboardProxy/1.1; +http://flipboard.com/browserproxy)",
	"Mozilla/5.0 (compatible; DotBot/1.1; http://www.opensiteexplorer.org/dotbot, help@moz.com)",
	"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/600.2.5 (KHTML, like Gecko) Version/8.0.2 Safari/600.2.5 (Applebot/0.1; +http://www.apple.com/go/applebot)",
	"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google (+https://developers.google.com/+/web/snippet/)",
	"Google-AMPHTML",
	"Googlebot-Image/1.0"
);

const BLOCKED_AGENTS = array(
	"Mozilla/4.0 (compatible; crawlx, crawler@trd.overture.com)",
	"Mozilla/5.0 Moreover/5.1 (+http://www.moreover.com; webmaster@moreover.com)",
	"Pattern/1.0 +http://www.clips.ua.ac.be/pages/pattern",
	"PHP/5.4.42",
	"Scrapy/1.0.5.post4+g4b324a8 (+http://scrapy.org)",
	"Mozilla/5.0 (compatible; linkdexbot/2.2; +http://www.linkdex.com/bots/)",
	"TrapitAgent/0.1 (feed processor; +http://trapit.com/about)",
	"Mozilla/5.0 (compatible; DomainAppender /1.0; +http://www.profound.net/domainappender)",
	"alertmix crawler/1.0 (a news crawler; http://www.alertmix.com; admin+crawler@alertmix.com)",
	"Brandpoint-Bot",
	"newsusa",
	"Mozilla/5.0 (compatible; Linux x86_64; Mail.RU_Bot/2.0; +http://go.mail.ru/help/robots)",
	"omgili/0.5 +http://omgili.com",
	"ScooperBot www.customscoop.com",
	"M",
	"LivelapBot/0.2 (http://site.livelap.com/crawler)",
	"Mozilla/5.0 (TweetmemeBot/4.0; +http://datasift.com/bot.html) Gecko/20100101 Firefox/31.0",
	"Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0); 360Spider(compatible; HaosouSpider; http://www.haosou.com/help/help_3_2.html)",
	"Screaming Frog SEO Spider/6.2",
	"Mozilla/5.0 (compatible; MJ12bot/v1.4.5; http://www.majestic12.co.uk/bot.php?+)",
	"Sogou web spider/4.0(+http://www.sogou.com/docs/help/webmasters.htm#07)",
	"Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)",
	"Mozilla/5.0 Vienna/3.1.5",
	"Mozilla/5.0 (iPhone; CPU iPhone OS 8_3 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) Version/8.0 Mobile/12F70 Safari/600.1.4 (compatible; Laserlikebot/0.1)"
);

const BLOCKED_IPS = array(
	"52.9.25.56"
);

const E_EDITION = array(
	'height' => 64,
	'width'  => 64,
	'href'   => '/e-edition/',
	'src'    => '/images/octicons/lib/svg/file-pdf.svg',
	'alt'    => 'E-Edition'
);

define(__NAMESPACE__ . '\DEBUG_MODE', is_admin() or $_SERVER['SERVER_ADDR'] === $_SERVER['REMOTE_ADDR']);
