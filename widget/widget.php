<?php

add_action( 'widgets_init', 'studio_widget' );

function studio_widget() {
	register_widget( 'STUDIO_Widget' );
}

class STUDIO_Widget extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'studio', 'description' => __('', 'studio') );
		
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'studio-widget' );
		
		parent::__construct( 'studio-widget', __('Studio Widget', 'studio'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title  = apply_filters('widget_title', $instance['title'] );
		$mapid  = (int)$instance['mapid'];
		$width  = (int)$instance['mapwidth'];
		$height = (int)$instance['mapheight'];
		
		$show_map = isset( $instance['show_map'] ) ? $instance['show_map'] : false;
		
		echo $before_widget;

		// Display the widget title 
		if ( $title )
			echo $before_title . $title . $after_title;
		
		if ($show_map) {
			$atts = array();
			
			$atts['mapid']  = $mapid;
			$atts['height'] = ($height == 0)? '300' : $height;
			$atts['width']  = ($width  == 0)? '300' : $width;
			
			require dirname(__FILE__).'/../include/shortcode/shortcode.php';
		}
		
		echo $after_widget;
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and apikey to remove HTML 
		$instance['title']     = strip_tags( $new_instance['title'] );
		$instance['mapid']     = (int)$new_instance['mapid'];
		$instance['mapheight'] = ((int)$new_instance['mapheight'] == 0)? '' : (int)$new_instance['mapheight'];
		$instance['mapwidth']  = ((int)$new_instance['mapwidth'] == 0)? '' : (int)$new_instance['mapwidth'];
		$instance['show_map']  = isset($new_instance['show_map']);

		return $instance;
	}

	
	function form( $instance ) {
		//Set up some default widget settings.
		global $wpdb;
		$maps = $wpdb->get_results( "SELECT * FROM wp_studio_map" );
		
		$defaults = array( 'title' => __('Studio', 'studio'), 'show_map' => true );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'studio'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'mapid' ); ?>"><?php _e('Select Map:', 'studio'); ?></label>
			<select id="<?php echo $this->get_field_id( 'mapid' ); ?>" name="<?php echo $this->get_field_name( 'mapid' ); ?>" style="width:100%;">
				<?php foreach($maps as $map){ ?>
					<option value="<?php echo $map->id;?>" <?php selected($instance['mapid'], $map->id);?>><?php echo $map->title;?></option>
				<?php } ?>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'mapheight' ); ?>"><?php _e('Map Height (in px) - Default 300px:', 'studio'); ?></label>
			<input type="number" id="<?php echo $this->get_field_id( 'mapheight' ); ?>" name="<?php echo $this->get_field_name( 'mapheight' ); ?>" value="<?php echo $instance['mapheight']; ?>" style="width:100%;" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'mapwidth' ); ?>"><?php _e('Map Width (in px) - Default 400px:', 'studio'); ?></label>
			<input type="number" id="<?php echo $this->get_field_id( 'mapwidth' ); ?>" name="<?php echo $this->get_field_name( 'mapwidth' ); ?>" value="<?php echo $instance['mapwidth']; ?>" style="width:100%;" />
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_map'], true ); ?> id="<?php echo $this->get_field_id( 'show_map' ); ?>" name="<?php echo $this->get_field_name( 'show_map' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'show_map' ); ?>"><?php _e('Display Map publicly?', 'studio'); ?></label>
		</p>
	<?php
	}
}

?>