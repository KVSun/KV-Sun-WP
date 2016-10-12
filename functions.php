<?php
/*
Author: RAJA CRN
URL: ThemePacific.com
*/
/*===================================================================================*/
/*  Load ThemePacific FrameWork Assets
/*==================================================================================*/

define('TPACIFIC_DIR', get_template_directory());
define('TPACIFIC_URI', get_template_directory_uri());
define('TPACIFIC_ADMIN', TPACIFIC_DIR . '/admin');
define('TPACIFIC_ADMINURI', TPACIFIC_URI . '/admin');
define('TPACIFIC_JS', TPACIFIC_URI . '/js');
define('TPACIFIC_CSS', TPACIFIC_URI . '/css');
define('TPACIFIC_IMG', TPACIFIC_URI . '/images');
define('TPACIFIC_WIDGET', TPACIFIC_ADMIN . '/widgets');
include_once (TPACIFIC_ADMIN.'/index.php');
$themename="bresponZive";
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


/*===================================================================================*/
/* Theme Support
/*==================================================================================*/

/*-- Post thumbnail + Menu Support + Formats + Feeds --*/
function bresponZive_themepacific_theme_support_image()
{

 		add_theme_support('post-thumbnails' );
		add_image_size('mag-image', 340, 160,true);
 		add_image_size('blog-image', 220, 180,true);
		add_image_size('sb-post-thumbnail', 70, 70,true);
		add_image_size('sb-post-big-thumbnail', 365, 180,true);
		add_theme_support( 'automatic-feed-links' );
		 load_theme_textdomain( 'bresponZive', get_template_directory() . '/languages' );
 			register_nav_menus(
			array(
 				'topNav' => __('Top Menu','bresponZive' ),
 				'mainNav' => __('Cat Menu','bresponZive' ),
				'Restrict_menu' => __('Cat Menu','bresponZive' ),
			)
		);
 }
 add_action( 'after_setup_theme', 'bresponZive_themepacific_theme_support_image' );

/*===================================================================================*/
/* Functions
/*==================================================================================*/

/*-- Load Custom Theme Scripts using Enqueue --*/
function bresponZive_themepacific_tpcrn_scripts_method() {
	if ( !is_admin() ) {
		global $bresponZive_tpcrn_data;
        wp_enqueue_style( 'style', get_stylesheet_uri());
 		wp_enqueue_style('camera', get_stylesheet_directory_uri().'/css/camera.css');
		wp_enqueue_style('skeleton', get_stylesheet_directory_uri().'/css/skeleton.css');

  		wp_register_script('easing', get_template_directory_uri(). '/js/jquery.easing.1.3.js');
  		wp_register_script('jquery.mobilemenu.min', get_template_directory_uri(). '/js/jquery.mobilemenu.min.js');
 		wp_register_script('themepacific.script', get_template_directory_uri(). '/js/tpcrn_scripts.js', array('jquery'), '1.0', true);
 		wp_register_script('camera', get_template_directory_uri(). '/js/camera.min.js',array('jquery'), '2.0',true);
  		wp_register_script('jquery.mobile.customized.min', get_template_directory_uri(). '/js/jquery.mobile.customized.min.js',array('jquery'), '2.0',true);
		   $protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
		   'family' => 'Oswald|Arimo|Open+Sans',

		);

		wp_enqueue_style('google-webfonts',
        add_query_arg($query_args, "$protocol://fonts.googleapis.com/css" ),
        array(), null);
		wp_enqueue_script('jquery');
		wp_enqueue_script('camera');
		wp_enqueue_script('jquery.mobile.customized.min');
    	wp_enqueue_script('jquery-ui-widget');
  		wp_enqueue_script('jquery.mobilemenu.min');
  		wp_enqueue_script('easing');
		wp_enqueue_script('themepacific.script');
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	}

}

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function bresponZive_themepacific_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'tpcrn' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'bresponZive_themepacific_wp_title', 10, 2 );


 /*-----------------------------------------------------------------------------------*/
/* Register sidebars
/*-----------------------------------------------------------------------------------*/
 function bresponZive_themepacific_widgets_init() {

 	register_sidebar(array(
		'name' => 'Default Sidebar',
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-head">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'Magazine Style Widgets',
		'before_widget' => '<div id="%1$s" class="%2$s blogposts-wrapper clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));


	register_sidebar(array(
		'name' => 'Footer Block 1',
		'before_widget' => '<div id="%1$s" class="%2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'Footer Block 2',
		'before_widget' => '<div id="%1$s" class="%2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'Footer Block 3',
		'before_widget' => '<div id="%1$s" class="%2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer Block 4',
		'before_widget' => '<div id="%1$s" class="%2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'bresponZive_themepacific_widgets_init' );


/*-- Pagination --*/

function bresponZive_themepacific_tpcrn_pagination() {

		global $wp_query;
		$big = 999999999;
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			'format' => '?paged=%#%',
			'prev_next'    => false,
			'prev_text'    => '<i class="icon-double-angle-left"></i>',
	        'next_text'    => '<i class="icon-double-angle-right"></i>',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages )
		);
	}

  /*-- Custom Excerpts--*/

function bresponZive_themepacific_custom_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'bresponZive_themepacific_custom_excerpt_length', 999 );
function bresponZive_themepacific_new_excerpt_more( $more ) {
	return '..';
}
add_filter('excerpt_more', 'bresponZive_themepacific_new_excerpt_more');

if (!isset( $content_width )) $content_width = 580;
 function bresponZive_themepacific_themepacific_breadcrumb() {
	if (!is_home()) {

		echo '<ul id="tpcrn-breadcrumbs"><li><a href="'.esc_url(home_url()).'">Home &raquo;</a> </li>';
		if (is_category() || is_single()) {

$category = get_the_category();
$brecat_title = $category[0]-> cat_ID;
$category_link = get_category_link($brecat_title);
echo '<li><a id="" class="vca" href="'. esc_url( $category_link ) . '">' . $category[0]->cat_name . ' &raquo;</a></li>';

			if (is_single()) {
				echo '<li class="current">';
				the_title();
				echo '</li>';
			}
		} elseif (is_page()) {
			echo '<li class="current">';
				the_title();
				echo '</li>';
		}
	echo '</ul>';
	}
}

/*-- Multiple Page Nav--*/

function bresponZive_themepacific_single_split_page_links($defaults) {
	$args = array(
	'before' => '<div class="single-split-page"><p>' . __('<strong>Pages</strong>','bresponZive'),
	'after' => '</p></div>',
	'pagelink' => '%',
	);
	$r = wp_parse_args($args, $defaults);
	return $r;
	}



/*===================================================================================*/
/*  Actions + Filters + Translation
/*==================================================================================*/


/*-- Multiple Page Nav tweak --*/
add_filter('wp_link_pages_args','bresponZive_themepacific_single_split_page_links');

/*-- Register and enqueue  javascripts--*/
add_action('wp_enqueue_scripts', 'bresponZive_themepacific_tpcrn_scripts_method');
add_action( 'bresponZive_themepacific_tpcrn_cre_def_call', 'bresponZive_themepacific_tpcrn_cre_def');




 /*-- Breadcrumbs--*/
 function bresponZive_themepacific_breadcrumb() {
	if (!is_home()) {

		echo '<ul id="tpcrn-breadcrumbs"><li><a href="'.esc_url(home_url()).'">Home &raquo;</a> </li>';
		if (is_category() || is_single()) {
		if ( !is_attachment() ) {
$category = get_the_category();
$brecat_title = $category[0]-> cat_ID;
$category_link = get_category_link($brecat_title);
echo '<li><a class="vca" href="'. esc_url( $category_link ) . '">' . $category[0]->cat_name . ' &raquo;</a></li>';
 	 }
			if (is_single()) {
				echo '<li class="current">';
				the_title();
				echo '</li>';
			}
		} elseif (is_page()) {
			echo '<li class="current">';
				the_title();
				echo '</li>';
		}
	echo '</ul>';
	}
}


/*===================================================================================*/
/*  Comments
/*==================================================================================*/

function bresponZive_themepacific_themepacific_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'bresponZive' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'bresponZive' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li id="comment-<?php comment_ID(); ?>">
		<div <?php comment_class('comment-wrapper'); ?> >
 				<div class="comment-avatar">
					<?php
						$avatar_size = 65;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 65;

						echo get_avatar( $comment, $avatar_size );?>
				</div>
				<!--comment avatar-->
				<div class="comment-meta">
					<?php
						printf( '%1$s  %2$s  ',
							sprintf( '<div class="author">%s</div>', get_comment_author_link() ),
							sprintf( '%4$s<a href="%1$s"><span class="time" style="border:none;">%3$s</span></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),get_comment_date(),
								sprintf('<span class="time">%1$s </span>' ,   get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'bresponZive' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- /comment-meta -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'bresponZive' ); ?></em>
					<br />
				<?php endif; ?>


			<div class="comment-content">
				<?php comment_text(); ?>
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'bresponZive' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div> <!--/reply -->
			</div><!--/comment-content -->
		</div>	<!--/Comment-wrapper -->

 	<?php
			break;
	endswitch;
}


function html_schema()
{
    $schema = 'http://schema.org/';

    // Is single post
    if(is_single())
    {
        $type = "Article";
    }
    // Is blog home, archive or category
    else if(is_home()||is_archive()||is_category())
    {
        $type = "Blog";
    }
    // Is static front page
    else if(is_front_page())
    {
        $type = "Website";
    }
    // Is a general page
     else
    {
        $type = 'WebPage';
    }

    echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}

function is_bot($uUserAgent)
{
	// Could use `REMOTE_ADDR` instead
	return in_array($uUserAgent, ALLOWED_AGENTS);
}
function add_taxonomies_to_pages() {
 register_taxonomy_for_object_type( 'post_tag', 'page' );
 register_taxonomy_for_object_type( 'category', 'page' );
 }
add_action( 'init', 'add_taxonomies_to_pages' );


?>
