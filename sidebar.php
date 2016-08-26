<?php global $bresponZive_tpcrn_data;?>
<!--#Sidebar-->

<div id="sidebar" class="six columns  clearfix <?php if(is_page('calendar')){ echo 'column-right'; }?>">


<!-- Upcomming event widget code Start -->
<?php if(!is_page('calendar')){ ?>
	<div class="event-widget"> 
<h3 class="widget-head">Upcoming Events</h3>  <!-- Heading of event widget -->
 
 
<!--<script class="ai1ec-widget-placeholder" data-widget="ai1ec_agenda_widget" data-events_seek_type="events">
  (function(){var d=document,s=d.createElement('script'),
  i='ai1ec-script';if(d.getElementById(i))return;s.async=1;
  s.id=i;s.src='/?ai1ec_js_widget';
  d.getElementsByTagName('head')[0].appendChild(s);})();
</script>-->
<!-- Upcomming event widget code End -->
</div>
<?php }  ?>


<?php  dynamic_sidebar ("Default Sidebar");  	?>
</div> 
<!-- /#Sidebar-->						
