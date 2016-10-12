<?php
 	namespace KVS\Sidebar;
	const E_EDITION = array(
		'height' => 64,
		'width'  => 64,
		'href'   => '/e-edition/',
		'src'    => '/images/octicons/lib/svg/file-pdf.svg',
		'alt'    => 'E-Edition'
	);

	global $bresponZive_tpcrn_data;
?>
<!--#Sidebar-->

<div id="sidebar" class="six columns  clearfix <?php if(is_page('calendar')){ echo 'column-right'; }?>">
	<?php if (is_user_logged_in()) :?>
	<a href="<?=get_template_directory_uri() . E_EDITION['href']?>">
		<h3>E-Edtion</h3>
		<img src="<?=get_template_directory_uri() . E_EDITION['src']?>" alt="<?=E_EDITION['alt']?>" width="<?=E_EDITION['width']?>" height="<?=E_EDITION['height']?>">
	</a>
	<?php endif;?>

<!-- Upcomming event widget code Start -->
<?php if(!is_page('calendar')){ ?>
	<div class="event-widget">
<h3 class="widget-head">Upcoming Events</h3>  <!-- Heading of event widget -->


<script class="ai1ec-widget-placeholder" data-widget="ai1ec_agenda_widget" data-events_seek_type="events">
  (function(){var d=document,s=d.createElement('script'),
  i='ai1ec-script';
	if(d.getElementById(i))return;s.async=1;
  s.id=i;s.src='<?= get_bloginfo("url"); ?>/?ai1ec_js_widget';
  d.getElementsByTagName('head')[0].appendChild(s);})();
</script>
<!-- Upcomming event widget code End -->
</div>
<?php }  ?>


<?php  dynamic_sidebar ("Default Sidebar");  	?>
</div>
<!-- /#Sidebar-->
