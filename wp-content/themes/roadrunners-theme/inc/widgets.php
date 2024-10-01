<?php
/**
 * Theme Name: 		Roadrunners - A One-Page Music Theme
 * Theme Author: 	Dan Richardson - Subatomic Themes
 * Theme URI: 		http://themeforest.net
 * Author URI: 		http://themeforest.net/user/SubatomicThemes
 * File:			widgets.php
 * ============================================================================
 *
 * @package roadrunners
 *
 * V1.1.0
 *
 *  - Improved sanitization output.
 *
 */

/**
 * WIDGET NAME: Roadrunners - Contact Details
 * WIDGET DESC: Displays some intro text followed by an address, phone number,
 *              and email address.
 * ============================================================================
 *
 */
class Roadrunners_Contact_Details extends WP_Widget {

	/**
	 * Constructor function to set up the widget's name etc.
	 */
	public function __construct() {
		
		parent::__construct( 'widget_roadrunners_contact' , esc_html__( 'Roadrunners - Contact Details', 'roadrunners' ), array(
		
			'classname'   => 'widget_roadrunners_contact',
			'description' => esc_html__( 'Use this widget to provide contact details for the visitor including address, telephone number, and email address.', 'roadrunners' )
			
		) );
		
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args , $instance ) {
	
		extract( $args );
		
		$title 		= apply_filters( 'widget_title', $instance['title'] );
		
		$message 	= $instance['message'];
		$address	= $instance['address'];
		$tel		= $instance['tel'];
		$email		= $instance['email'];
		
		/**
		 * Run the message through wp_kses().
		 */
		$sanitized_message = wp_kses( $message,
		
			array(
			
				'a' 		=> array( 'href' ),
				'strong' 	=> array(),
				'em'		=> array()
				
			)
		
		);
		
		?>
		<?php echo $before_widget; 
		
		if ( $title ){ echo $before_title . $title . $after_title; } 
		if ( $message ){ echo '<p>' . $sanitized_message . '</p>'; }
		
		?>
		
		<?php if( $address ) : ?>
		
			<!-- START Address Details -->
			<div class="roadrunners-contact-box">
				<div class="roadrunners-contact-box-icon">
					<i class="fa fa-home"></i>
				</div>
				<div class="roadrunners-contact-box-content">
					<address><span><?php echo wp_kses_post( $address ); ?></span></address>
				</div>
				<br class="clear" />
			</div>
			<!-- END Address Details -->
		
		<?php endif; ?>
		
		<?php if( $tel ) : ?>
		
			<!-- START Phone Number Details -->
			<div class="roadrunners-contact-box">
				<div class="roadrunners-contact-box-icon">
					<i class="fa fa-phone-square"></i>
				</div>
				<div class="roadrunners-contact-box-content">
					<span><?php echo esc_html( $tel ); ?></span>
				</div>
				<br class="clear" />
			</div>
			<!-- END Phone Number Details -->
		
		<?php endif; ?>
		
		<?php if( $email ) : ?>
		
			<!-- START Email Details -->
			<div class="roadrunners-contact-box">
				<div class="roadrunners-contact-box-icon">
					<i class="fa fa-envelope-o"></i>
				</div>
				<div class="roadrunners-contact-box-content">
					<span><a href="mailto:<?php echo sanitize_email( $email ); ?>"><?php echo esc_html( $email ); ?></a></span>
				</div>
				<br class="clear" />
			</div>
			<!-- END Email Details -->
		
		<?php endif; ?>
		<?php echo $after_widget; 
	
	}
 
    /**
	 * Process widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
    function update( $new_instance , $old_instance ) {
	
		$instance 				= $old_instance;
		$instance['title'] 		= strip_tags( $new_instance['title'] );
		$instance['message'] 	= wp_kses_post( $new_instance['message'] );
		$instance['address']	= strip_tags( $new_instance['address'] );
		$instance['tel']		= strip_tags( $new_instance['tel'] );
		$instance['email']		= strip_tags( $new_instance['email'] );
		
        return $instance;
		
    }
 
    /**
	 * Ouputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	function form( $instance ) {

		$title  	= empty( $instance['title'] )   ? '' : $instance['title'];
		$message	= empty( $instance['message'] ) ? '' : $instance['message'];
		$address	= empty( $instance['address'] ) ? '' : $instance['address'];
		$tel		= empty( $instance['tel'] )     ? '' : $instance['tel'];
		$email		= empty( $instance['email'] )   ? '' : $instance['email'];
		
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' , 'roadrunners' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'message' ) ); ?>"><?php esc_html_e( 'Enter an Intro Message:' , 'roadrunners' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'message' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'message' ) ); ?>" type="text" value="<?php echo wp_kses_post( $message ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php esc_html_e( 'Enter an Address:' , 'roadrunners' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tel' ) ); ?>"><?php esc_html_e( 'Enter a Phone Number:' , 'roadrunners' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tel' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tel' ) ); ?>" type="text" value="<?php echo esc_attr( $tel ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_html_e( 'Enter an Email Address:' , 'roadrunners' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
		</p>
		<?php 
	}
}
?>