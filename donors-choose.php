<?php
/**
 * @package Donors_Choose
 * @version 1.0
 */
/*
Plugin Name: Donors Choose
Plugin URI: https://github.com/48Web/Donors-Choose-WordPress-Plugin
Description: Place a Donors Choose widget in your sidebar to promote projects from your local schools.
Author: Andy Brudtkuhl
Version: 1.0
Author URI: http://youmetandy.com
**/

function register_scripts() {
	wp_register_script( 'donors-choose-script', plugins_url( 'donors-choose.js', __FILE__ ), array( 'jquery' ) );  
	wp_enqueue_script( 'donors-choose-script' );
}

add_action( 'wp_enqueue_scripts', 'register_scripts' );  

class DonorsChooseWidget extends WP_Widget {
  function DonorsChooseWidget() {
    parent::WP_Widget( false, $name = 'Donors Choose Widget' );
  }
	
  function widget( $args, $instance ) {
    extract( $args );
    $zip = apply_filters( 'widget_title', $instance['zip'] );
    ?>

    <?php
	  echo $before_widget;
    ?>

    <input id="hZip" type="hidden" value="<?php echo $zip; ?>" />
    <div id="donors-choose-widget"></div>
    
     <?php
       echo $after_widget;
     ?>
     <?php
  }

  function update( $new_instance, $old_instance ) {
    return $new_instance;
  }

  function form( $instance ) {
    $zip = esc_attr( $instance['zip'] );
    ?>

    <p>
      <label for="<?php echo $this->get_field_id( 'zip' ); ?>"><?php _e( 'Zip Code:' ); ?>
      <input class="widefat" id="<?php echo $this->get_field_id( 'zip' ); ?>" name="<?php echo $this->get_field_name( 'zip' ); ?>" type="text" value="<?php echo $zip; ?>" />
      </label>
    </p>
    <?php
  }
}

add_action( 'widgets_init', 'DonorsChooseWidgetInit' );
function DonorsChooseWidgetInit() {
  register_widget( 'DonorsChooseWidget' );
}