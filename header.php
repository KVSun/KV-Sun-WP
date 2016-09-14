<!DOCTYPE html>

<html <?php html_schema(); ?> <?php language_attributes(); ?>>
<head>
<!-- Meta info -->

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<base href="/"/>
	<meta charset="utf-8" />

	<meta name="referrer" content="origin-when-cross-origin"/>
	<meta name="viewport" content="width=device-width, height=device-height" />
	<meta name="mobile-web-app-capable" content="yes" />
	<meta name="theme-color" content="#EA5708" />
	<?php if(is_single()){ ?>
		<meta itemprop="name" content="<?php the_title(); ?>" />
		<meta itemprop="url" name="url" content="<?php echo $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />

	<?php }else{ ?>
		<meta itemprop="name" content="KVSun-WP-Theme" />
	<?php } ?>
	<meta property="fb:app_id" content="" />
	<meta name="og:title" content="KVSun-WP-Theme" />
	<meta name="og:description" content="A custom theme for the Kern Valley Sun Wordpress site." />
	<meta name="og:image" content="<?php echo get_template_directory_uri(); ?>/images/sun-icons/32.png" />
	<meta name="twitter:site" content="@kvsun" />
	<meta name="twitter:title" content="KVSun-WP-Theme" />
	<meta name="twitter:description" content="A custom theme for the Kern Valley Sun Wordpress site." />
	<meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/images/sun-icons/32.png" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="robots" content="index,noarchive">


		<link rel="apple-touch-icon" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/images/sun-icons/16.png" />
	<link rel="icon" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/images/sun-icons/16.png" type="image/png" />
		<link rel="apple-touch-icon" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/images/sun-icons/32.png" />
	<link rel="icon" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/images/sun-icons/32.png" type="image/png" />
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/sun-icons/72.png" />
	<link rel="icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/sun-icons/72.png" type="image/png" />
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/sun-icons/144.png" />
	<link rel="icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/sun-icons/144.png" type="image/png" />
		<link rel="apple-touch-icon" sizes="256x256" href="<?php echo get_template_directory_uri(); ?>/images/sun-icons/256.png" />
	<link rel="icon" sizes="256x256" href="<?php echo get_template_directory_uri(); ?>/images/sun-icons/256.png" type="image/png" />

	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/manifest.json" />

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<!-- Title -->

<?php global $bresponZive_tpcrn_data;?>
<title>

<?php   if (is_home()) {
   wp_title( '|', true, 'right' );
   }
   else { the_title();} ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php if($bresponZive_tpcrn_data['custom_favicon']): ?>
<link rel="shortcut icon" href="<?php echo esc_url($bresponZive_tpcrn_data['custom_favicon']); ?>" />
<?php endif;  ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- CSS + jQuery + JavaScript -->
 <script  src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>


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
      <?php if($bresponZive_tpcrn_data['custom_logo'] !='') {

				if($bresponZive_tpcrn_data['custom_logo']) {  $logo = $bresponZive_tpcrn_data['custom_logo'];

				} else { $logo = get_template_directory_uri() . '/images/logo.png';

				} ?>
      <a href="<?php echo esc_url( home_url( '/' ) );  ?>" title="<?php bloginfo( 'name' ); ?>" rel="home"><img  src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo( 'name' ) ?>" /></a>
      <?php } else { ?>
      <?php if (is_home()) { ?>
      <h1><a href="<?php echo esc_url( home_url( '/' ) );  ?>" title="<?php bloginfo( 'name' ); ?>" rel="home">
        <?php bloginfo( 'name' ); ?>
        </a></h1>
      <span>
      <?php bloginfo( 'description' ); ?>
      </span>
      <?php } else { ?>
      <h2><a href="<?php echo esc_url( home_url( '/' ) );  ?>" title="<?php bloginfo( 'name' ); ?>" rel="home">
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
			wp_nav_menu(array( 'menu' => 'Restrict_menu','theme_location' => 'restrictMenu','container'=> '','menu_id'=> '','menu_class'=> 'container clearfix','fallback_cb' => 'false','depth' => 3));
		} else {
			wp_nav_menu(array( 'menu' => 'Top Menu','theme_location' => 'topNav','container'=> '','menu_id'=> '','menu_class'=> ' container clearfix','fallback_cb' => 'false','depth' => 3));
		};
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
  <?php wp_nav_menu(array('theme_location' => 'mainNav','container'=> '','menu_id'=> 'catmenu','menu_class'=> 'catnav clearfix','fallback_cb' => 'false','depth' => 3));
		?>
</div>
<!-- Slider start ---->
	<div class="slide-top">
	<img src ="<?php echo get_template_directory_uri(); ?>/images/sun.svg" />
	</div>
	<style>



</style>
	 <?php } else { if ( has_nav_menu('mainNav') ){  ?>
<!-- #CatNav -->
<div id="catnav" class="secondary mobile-nav container-fluid">
  <?php wp_nav_menu(array('theme_location' => 'mainNav','container'=> '','menu_id'=> 'catmenu','menu_class'=> 'catnav clearfix','fallback_cb' => 'false','depth' => 3));
		?>
<!-- /#CatNav -->
</div>
<?php }} ?>


<div class="container-fluid clearfix">
<div>
