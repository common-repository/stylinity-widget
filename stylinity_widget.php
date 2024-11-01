
<?php

/*
Plugin Name: Stylinity Widget
Author: Katherine Eisenbrand
Version: 1
*/

class stylinity_widget extends WP_Widget {
	
	// constructor
	function __construct() {
		// Give widget name here
		parent::__construct(
			'stylinity_widget', 
			__('Stylinight Widget', 'stylinity_text_domain'), 
			array('description' => __('Widget with shoppable looks', 'stylinity_text_domain'),)
		);
	}

	// front-end widget display
	public function widget($args, $instance) {
		$title = apply_filters('widget_title', $instance['title']);
		echo $args['before_widget'];
		if (!empty($title)) {
			echo $args['before_title'].$title. $args['after_title'];
		}
		echo ("<script src=\"https://stylinitycdn.blob.core.windows.net/scripts/StylinityLookWidget.js\" type=\"text/javascript\" language=\"javascript\"></script><script type=\"text/javascript\" language=\"javascript\" id = \"stylinityLookWidgetScript\">var stylinityParams = {\"id\": \"" . $instance['id'] .  "\",\"width\": \"" . $instance['width'] . "\",\"height\": \"400\",\"color\": \"" . $instance['color'] . "\",\"borderRadius\": \"" . $instance['borderRadius'] . "\",\"numberOfLooks\": \"" . $instance['numberOfLooks'] . "\",\"columns\": \"" . $instance['columns'] . "\",\"margin\": \"" . $instance['margin'] . "\"};stylinitycreateWidget(stylinityParams);</script>");
		echo $args['after_widget'];
	}

	
	// back-end widget form
	public function form($instance) {
		if (isset($instance['title'])) {
			$title = $instance['title'];
		} else {
			$title = __('Shop my looks here!', 'stylinity_text_domain');
		}
		if (isset($instance['id'])) {
			$id = $instance['id'];
		} else {
			$id = __('Go2BuyDemoBlog', 'stylinity_text_domain');
		}
		if (isset($instance['width'])) {
			$width = $instance['width'];
		} else {
			$width = __('250', 'stylinity_text_domain');
		}
		if (isset($instance['color'])) {
			$color = $instance['color'];
		} else {
			$color = __('#bbbbbb', 'stylinity_text_domain');
		}
		if (isset($instance['borderRadius'])) {
			$borderRadius = $instance['borderRadius'];
		} else {
			$borderRadius = __('0', 'stylinity_text_domain');
		}
		if (isset($instance['numberOfLooks'])) {
			$numberOfLooks = $instance['numberOfLooks'];
		} else {
			$numberOfLooks = __('6', 'stylinity_text_domain');
		}
		if (isset($instance['columns'])) {
			$columns = $instance['columns'];
		} else {
			$columns = __('3', 'stylinity_text_domain');
		}
		if (isset($instance['margin'])) {
			$margin = $instance['margin'];
		} else {
			$margin = __('3', 'stylinity_text_domain');
		}
		?>
		<p>
			<label for = "<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this ->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"> 
		</p>
		<p>
			<label for = "<?php echo $this->get_field_id( 'id' ); ?>"><?php _e( 'Username:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this ->get_field_name( 'id' ); ?>" type="text" value="<?php echo esc_attr( $id ); ?>"> 
		</p>
		<p>
			<label for = "<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'Width:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this ->get_field_name( 'width' ); ?>" type="text" value="<?php echo esc_attr( $width ); ?>"> 
		</p>
		<p>
			<label for = "<?php echo $this->get_field_id( 'color' ); ?>"><?php _e( 'Color:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'color' ); ?>" name="<?php echo $this ->get_field_name( 'color' ); ?>" type="text" value="<?php echo esc_attr( $color ); ?>"> 
		</p>
		<p>
			<label for = "<?php echo $this->get_field_id( 'borderRadius' ); ?>"><?php _e( 'Border radius:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'borderRadius' ); ?>" name="<?php echo $this ->get_field_name( 'borderRadius' ); ?>" type="text" value="<?php echo esc_attr( $borderRadius ); ?>"> 
		</p>
		<p>
			<label for = "<?php echo $this->get_field_id( 'numberOfLooks' ); ?>"><?php _e( 'Number of looks to display:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'numberOfLooks' ); ?>" name="<?php echo $this ->get_field_name( 'numberOfLooks' ); ?>" type="text" value="<?php echo esc_attr( $numberOfLooks ); ?>"> 
		</p>
		<p>
			<label for = "<?php echo $this->get_field_id( 'columns' ); ?>"><?php _e( 'Columns:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'columns' ); ?>" name="<?php echo $this ->get_field_name( 'columns' ); ?>" type="text" value="<?php echo esc_attr( $columns ); ?>"> 
		</p>
		<p>
			<label for = "<?php echo $this->get_field_id( 'margin' ); ?>"><?php _e( 'Margin:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'margin' ); ?>" name="<?php echo $this ->get_field_name( 'margin' ); ?>" type="text" value="<?php echo esc_attr( $margin ); ?>"> 
		</p>
		<?php
	}
	

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['id'] = strip_tags($new_instance['id']);
		$instance['width'] = strip_tags($new_instance['width']);
		$instance['color'] = strip_tags($new_instance['color']);
		$instance['borderRadius'] = strip_tags($new_instance['borderRadius']);
		$instance['numberOfLooks'] = strip_tags($new_instance['numberOfLooks']);
		$instance['columns'] = strip_tags($new_instance['columns']);
		$instance['margin'] = strip_tags($new_instance['margin']);
		return $instance;
	}
}

// Register and load widget
function stylinity_load_widget() {
	register_widget('stylinity_widget');
}
add_action('widgets_init', 'stylinity_load_widget');