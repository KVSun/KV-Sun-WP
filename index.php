<?php //get_header();  ?>

<!------------------------------------ Custom Header function Start 2016-05-17  --------------------------->

<!DOCTYPE html>

<html <?php html_schema(); ?> <?php language_attributes(); ?>>
<head>

<!-- Meta info -->

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />



	<base href="/"/>
	<meta charset="utf-8" />
	<!--meta name="description" content="A custom theme for the Kern Valley Sun Wordpress site." />
	<meta name="keywords" content="Wordpress theme, KV Sun, flex" /-->
	<meta name="referrer" content="origin-when-cross-origin"/>
	<meta name="viewport" content="width=device-width, height=device-height" />
	<meta name="mobile-web-app-capable" content="yes" />
	<meta name="theme-color" content="#EA5708" />
	<meta itemprop="name" content="KVSun-WP-Theme" />
	<!--meta itemprop="description" content="A custom theme for the Kern Valley Sun Wordpress site." />
	<meta itemprop="keywords" content="Wordpress theme, KV Sun, flex" /-->
	<!--meta itemprop="image" content="<?php echo get_template_directory_uri(); ?>/images/sun-icons/32.png" /-->		
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
	
	
		<link rel="apple-touch-icon" sizes="any" href="/images/sun-icons/any.svg" />
	<link rel="icon" sizes="any" href="/images/sun-icons/any.svg" type="image/svg+xml" />
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
		<link rel="manifest" href="/kernvelly/wp-content/themes/bresponzive/manifest.json" />

<?php global $bresponZive_tpcrn_data;?>
<title >
<?php wp_title( '|', true, 'right' ); ?>
</title>

<!--link rel="profile" href="http://gmpg.org/xfn/11" />
<?php if($bresponZive_tpcrn_data['custom_favicon']): ?>
<link rel="shortcut icon" href="<?php echo esc_url($bresponZive_tpcrn_data['custom_favicon']); ?>" />
<?php endif;  ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" /-->

<!-- CSS + jQuery + JavaScript -->

<!--[if lt IE 9]> 

<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/ie8.css' type='text/css' media='all' />

<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script> 

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/css3-mediaqueries.js"></script>

<![endif]-->

<!--[if  IE 9]>

<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/ie9.css' type='text/css' media='all' /> 

<![endif]-->
<script>
function logoutConfirm(){
	var x = confirm("Are you sure you want to log out?");
	if(x == false)
		return false;
 }
 

 
</script>

<?php wp_head();?>

<style>
.head-top{height:13vh;}
.slide-top{height:80vh;}
.slide-top img{max-height:100%; max-width:100%;}
.menu-part{height:7vh;}
.slide-top{max-height:100%;}
.catnav{
  width: 100%;
  background-color:#fff;
}
.sticky {
  padding: 0px 8px;
  position: fixed !important;
  top: 0;
  width: 100%;
}
@media only screen and (max-width:1200px) {
.slide-top{height:82;}
.menu-part{height:5vh;}
}
@media only screen and (max-width:767px) {
  .head-top{height:auto;}
.slide-top{height:auto;}
.menu-part{height:auto;}
}



</style>

</head>

<body <?php body_class();?>>


<!-- #wrapper -->
<div class="wdth-100vh">
<div   class="container-fluid clearfix head-top"> <!--id="wrapper" -->

<!-- /#Header -->

<div><!--<div id="wrapper-container">-->

<div id="header">
  <div id="head-content" class="clearfix "> 
    
    <!-- Logo -->
    
    <div id="logo">
      <?php if($bresponZive_tpcrn_data['custom_logo'] !='') { 

				if($bresponZive_tpcrn_data['custom_logo']) {  $logo = $bresponZive_tpcrn_data['custom_logo']; 		

				} else { $logo = get_template_directory_uri() . '/images/logo.png'; 	

				} ?>
      <a href="<?php echo esc_url( home_url( '/' ) );  ?>" title="<?php bloginfo( 'name' ); ?>" rel="home" itemprop="url"><img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo( 'name' ) ?>" /></a>
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

<div id="btn-nav" class="top-right-nav mobile-nav" itemscope itemtype="http://schema.org/SiteNavigationElement">
  <?php //wp_nav_menu(array('theme_location' => 'topNav','container'=> '','menu_id'=> 'catmenu','menu_class'=> '','fallback_cb' => 'false','depth' => 3));

		if ( is_user_logged_in() ) {

			wp_nav_menu(array( 'menu' => 'Restrict_menu','theme_location' => 'restrictMenu','container'=> '','menu_id'=> '','menu_class'=> ' container clearfix','fallback_cb' => 'false','depth' => 3));

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

<div id="catnav" class="secondary mobile-nav container-fluid menu-part" itemscope itemtype="http://schema.org/SiteNavigationElement">
  <?php wp_nav_menu(array('theme_location' => 'mainNav','container'=> '','menu_id'=> 'catmenu','menu_class'=> 'catnav clearfix','fallback_cb' => 'false','depth' => 3)); 

		

		

		?>



</div>
	<!-- Slider start ---->
	<div class="slide-top">
	<img src ="/wp-content/themes/bresponzive/images/sun.svg" />
	</div>
			<?php   
		/*if(isset($bresponZive_tpcrn_data['offline_feat_slide'])) { if($bresponZive_tpcrn_data['offline_feat_slide'] =='1')  include_once('includes/flex-slider.php'); } */?>
									
									
	<!-- Slider End ---->


<?php 

     if ( has_nav_menu('mainNav') ){ 

   ?>

<!-- #CatNav -->

<!--below div end of 100vh-->

<!-- /#CatNav -->
<?php } ?>
</div>

<div class="clearfix"></div>
<div  class="container-fluid clearfix"> <!-- id="wrapper" -->
<div>
<!--[if lt IE 8]>

		<div class="msgnote"> 

			Your browser is <em>too old!</em> <a rel="nofollow" href="http://browsehappy.com/">Upgrade to a different browser</a> to experience this site. 

		</div>

	<![endif]--> 


<!------------------------------------ Custom Header function End 2016-05-17  --------------------------->
  
<!--#blocks-wrapper-->
<div class="blocks-wrapper clearfix">
<!--#blocks-left-or-right-->

	<div class="blocks-left eleven columns clearfix">	
   			<?php   
		/*if(isset($bresponZive_tpcrn_data['offline_feat_slide'])) { if($bresponZive_tpcrn_data['offline_feat_slide'] =='1')  include_once('includes/flex-slider.php'); } */?>
									
									<!-- Slider End ---->
			<div class="news-box">
			<h2 itemprop="headline" class="blogpost-wrapper-title"><?php _e('News','bresponZive');?> </h2>	
			<?php   get_template_part( 'includes/blog', 'news' );?>
			</div>
			
			<h2 itemprop="headline" class="blogpost-wrapper-title"><?php _e('Sports News','bresponZive');?> </h2>	
			<?php   get_template_part( 'includes/blog', 'sport' );?>
			
			<h2 itemprop="headline" class="blogpost-wrapper-title"><?php _e('KV Life','bresponZive');?> </h2>	
			<?php   get_template_part( 'includes/blog', 'kvlife' );?>
			<!--
			<h2 class="blogpost-wrapper-title"><?php _e('Obituaries','bresponZive');?> </h2>	
			<?php   get_template_part( 'includes/blog', 'obituaries' );?>
			
			<h2 class="blogpost-wrapper-title"><?php _e('Opinion','bresponZive');?> </h2>	
			<?php   get_template_part( 'includes/blog', 'opinion' );?>
			
			<h2 class="blogpost-wrapper-title"><?php _e('Gallery ','bresponZive');?> </h2>	
			<?php   get_template_part( 'includes/blog', 'galleries' );?>
			-->
			
<!--homepage content-->
 							<?php dynamic_sidebar('Magazine Style Widgets)'); ?>
 
  			</div>
 			<!-- /blocks col -->
 <?php get_sidebar();  ?>

 <?php get_footer(); ?>
 
 
 <script  src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
 <script>
 $(document).ready(function(){
	$(window).scroll(function() {
		if ($(this).scrollTop() > 1){
			$('.secondary').addClass("sticky");
		  }
		  else{
			$('.secondary').removeClass("sticky");
		  }
		});	
 });

 </script>
