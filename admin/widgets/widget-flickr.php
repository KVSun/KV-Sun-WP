<?php
/*******************************************************************************
  Plugin Name: ThemePacific Flickr Widget
  Description: Flickr Widget will display your Flickr Photos.
  Author: ThemePacific
  Author URI: http://www.themePacific.com

 **********************************************************************************/

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'bresponZive_themepacific_flickr_widget' );

/**
 * Register our widget.
 * 'Example_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function bresponZive_themepacific_flickr_widget() {
	register_widget( 'bresponZive_themepacific_flickr' );
}

/**
 * Example Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class bresponZive_themepacific_flickr extends \WP_Widget {

	/**
	 * Widget setup.
	 */
	function bresponZive_themepacific_flickr() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'tpcrn-flickr-widget', 'description' => __('A Flickr widget to Display flickr photo streams', 'bresponZive'));

		/* Widget control settings. */
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'tpcrn-flickr-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'tpcrn-flickr-widget', __('ThemePacific : Flickr','bresponZive'), $widget_ops, $control_ops );
	}

	/**
	 *  display the widget
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('Flickr', $instance['title'] );
		$flickrid = $instance['flickrid'];
 		$fphtos = $instance['fphtos'];
		$type = $instance['type'];
		$display = $instance['display'];

		/* Before widget (defined by themes). */
		echo $before_widget;
		if($title)
			echo $before_title . $title . $after_title;
		/* Display the widget title if one was input (before and after defined by themes). */
		?>

			<div class="tpcrn-flickr clearfix">

					<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $fphtos; ?>&amp;display=<?php echo $display; ?>&amp;size=s&amp;layout=x&amp;source=<?php echo $type ?>&amp;<?php echo $type; ?>=<?php echo $flickrid; ?>"></script>

			</div>
		<?php
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = $new_instance['title'] ;
		$instance['flickrid'] = strip_tags( $new_instance['flickrid'] );
		$instance['fphtos'] = $new_instance['fphtos'] ;
		$instance['display'] = $new_instance['display'];
		$instance['type'] = $new_instance['type'];

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Flickr ', 'bresponZive'), 'flickrid' => '', 'fphtos' => '6','type' => 'user','display' => 'latest');
		$instance = wp_parse_args( (array) $instance, $defaults );
		$idget_url='http://idgettr.com/';				?>

		<!-- Widget Title: Text Input -->

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'bresponZive'); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>



		<p>
			<label for="<?php echo $this->get_field_id('flickrid'); ?>"><?php _e('Flickr ID:', 'bresponZive'); ?></label>
			<small><a href="<?php echo $idget_url; ?>">idGettr</a></small>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('flickrid'); ?>" name="<?php echo $this->get_field_name('flickrid'); ?>" value="<?php echo $instance['flickrid']; ?>" />
		</p>



			<p>
			<label for="<?php echo $this->get_field_id('fphtos'); ?>"><?php _e('Number of Photos to Display:', 'bresponZive'); ?></label>
			<input type="text" maxlength="2" size="3" id="<?php echo $this->get_field_id('fphtos'); ?>" name="<?php echo $this->get_field_name('fphtos'); ?>" value="<?php echo $instance['fphtos']; ?>" />
		    </p>

				<p>
		<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e('Type (user or group):', 'bresponZive') ?></label>
		<select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" class="widefat">
			<option <?php if ( 'user' == $instance['type'] ) echo 'selected="selected"'; ?>>user</option>
			<option <?php if ( 'group' == $instance['type'] ) echo 'selected="selected"'; ?>>group</option>
		</select>
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'display' ); ?>"><?php _e('Display (random or latest):', 'bresponZive') ?></label>
		<select id="<?php echo $this->get_field_id( 'display' ); ?>" name="<?php echo $this->get_field_name( 'display' ); ?>" class="widefat">
			<option <?php if ( 'random' == $instance['display'] ) echo 'selected="selected"'; ?>>random</option>
			<option <?php if ( 'latest' == $instance['display'] ) echo 'selected="selected"'; ?>>latest</option>
		</select>
	</p>


	<?php
	}
}

?>
