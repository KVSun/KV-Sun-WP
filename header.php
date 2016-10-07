<?php
	namespace KVS;
	const MANIFEST = __DIR__ . DIRECTORY_SEPARATOR . 'manifest.json';

	$url = \shgysk8zer0\Core\URL::getInstance();
?>
<!DOCTYPE html>
<html <?php html_schema(); ?> <?php language_attributes(); ?>>
<head>
<!-- Meta info -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="referrer" content="origin-when-cross-origin"/>
<meta name="viewport" content="width=device-width, height=device-height" />
<meta name="robots" content="index,noarchive">
<base href="/" />
<?php if (file_exists(MANIFEST)): $manifest = json_decode(file_get_contents(MANIFEST));?>
	<meta name="mobile-web-app-capable" content="yes" />
	<meta name="theme-color" content="<?=$manifest->theme_color?>" />
	<meta property="fb:app_id" content="" />
	<meta name="og:title" content="<?php the_title();?>" />
	<meta name="og:description" content="<?=$manifest->description?>" />
	<meta name="og:image" content="<?=get_template_directory_uri(); ?>/images/sun-icons/32.png" />
	<meta name="twitter:site" content="@kvsun" />
	<meta name="twitter:title" content="<?php the_title();?>" />
	<meta name="twitter:description" content="<?=$manifest->description?>" />
	<meta name="twitter:image" content="<?=get_template_directory_uri(); ?>/images/sun-icons/32.png" />
	<meta name="twitter:card" content="summary_large_image" />
	<link rel="manifest" href="<?=get_template_directory_uri() . '/' . basename(MANIFEST)?>" />
	<?php if(@is_array($manifest->icons)) : foreach($manifest->icons as $icon):?>
		<link rel="icon" sizes="<?=$icon->sizes?>" href="<?=$icon->src?>" type="<?=$icon->type?>" />
		<link rel="apple-touch-icon" sizes="<?=$icon->sizes?>" href="<?=$icon->src?>" type="<?=$icon->type?>" />
	<?php endforeach; endif;?>
<?php endif;?>
<?php if(is_single()) { ?>
	<meta itemprop="name" content="<?php the_title(); ?>" />
	<meta itemprop="url" name="url" content="<?=$url?>" />
<?php } else { ?>
	<meta itemprop="name" content="<?php the_title()?>" />
<?php } ?>
<!-- Title -->
<?php global $bresponZive_tpcrn_data;?>
<title><?php is_home() ? wp_title( '|', true, 'right' ) : the_title();?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php if($bresponZive_tpcrn_data['custom_favicon']): ?>
	<link rel="shortcut icon" href="<?=esc_url($bresponZive_tpcrn_data['custom_favicon']); ?>" />
<?php endif;?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!-- CSS + jQuery + JavaScript -->
<script src="<?=get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<?php wp_head();?>
</head>
<body <?php body_class();?>>
<!-- #wrapper -->
<div id="wrapper" class="container-fluid clearfix">
<!-- /#Header -->
<div id="">
<div id="header">
<div id="head-content" class="clearfix ">
	<!-- Logo -->
	<div id="logo">
	<?php
		if($bresponZive_tpcrn_data['custom_logo'] !='') {
			if($bresponZive_tpcrn_data['custom_logo']) {
				$logo = $bresponZive_tpcrn_data['custom_logo'];
			} else {
				$logo = get_template_directory_uri() . '/images/logo.png';
			}
	?>
	<a href="<?=esc_url( home_url( '/' ) );?>" title="<?php bloginfo( 'name' ); ?>" rel="home">
		<img src="<?=esc_url($logo); ?>" alt="<?php bloginfo( 'name' ) ?>" />
	</a>
	<?php } else { ?>
	<?php if (is_home()) { ?>
	<h1><a href="<?=esc_url( home_url( '/' ) );?>" title="<?php bloginfo( 'name' ); ?>" rel="home">
		<?php bloginfo( 'name' ); ?>
		</a></h1>
	<span>
	<?php bloginfo( 'description' ); ?>
	</span>
	<?php } else { ?>
	<h2><a href="<?=esc_url( home_url( '/' ) );?>" title="<?php bloginfo( 'name' ); ?>" rel="home">
		<?php bloginfo( 'name' ); ?>
		</a></h2>
	<?php } } ?>
	</div>
	<?php

	 if ( has_nav_menu('topNav') ){
 ?>
<!-- #CatNav -->
<div id="btn-nav" class="top-right-nav mobile-nav">
<?php
	if ( is_user_logged_in() ) {
		wp_nav_menu(array(
			'menu' => 'Restrict_menu',
			'theme_location' => 'restrictMenu',
			'container'=> '',
			'menu_id'=> '',
			'menu_class'=> 'container clearfix',
			'fallback_cb' => 'false',
			'depth' => 3
		));
	} else {
		wp_nav_menu(array(
			'menu' => 'Top Menu',
			'theme_location' => 'topNav',
			'container'=> '',
			'menu_id'=> '',
			'menu_class'=> ' container clearfix',
			'fallback_cb' => 'false',
			'depth' => 3
		));
	}
?>
</div>
<!-- /#CatNav --->
<?php } ?>
<!-- /#Logo -->
</div>
</div>
<!-- /#Header -->
</div>
</div>
<?php if (is_home()) { ?>
<div id="catnav" class="secondary sticky mobile-nav container-fluid menu-part" itemscope itemtype="http://schema.org/SiteNavigationElement">
<?php wp_nav_menu(array(
	'theme_location' => 'mainNav',
	'container'      => '',
	'menu_id'        => 'catmenu',
	'menu_class'     => 'catnav clearfix',
	'fallback_cb'    => 'false',
	'depth'          => 3
));?>
</div>
<!-- Slider start ---->
<div class="slide-top">
	<img src ="<?=get_template_directory_uri(); ?>/images/sun.svg" />
</div>
<?php } else { if ( has_nav_menu('mainNav') ){ ?>
	<!-- #CatNav -->
	<div id="catnav" class="secondary mobile-nav container-fluid">
	<?php wp_nav_menu(array(
		'theme_location' => 'mainNav',
		'container'      => '',
		'menu_id'        => 'catmenu',
		'menu_class'     => 'catnav clearfix',
		'fallback_cb'    => 'false',
		'depth'          => 3
	));?>
	<!-- /#CatNav -->
</div>
<?php }} ?>
<div class="container-fluid clearfix"><div>
