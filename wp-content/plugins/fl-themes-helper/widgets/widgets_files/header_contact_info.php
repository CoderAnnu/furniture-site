<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class FL_THEME_HELPER_Header_Contact_info extends SB_WP_Widget {
	protected $widget_base_id = 'FL_THEME_HELPER_Header_Contact_info';
	protected $widget_name = 'Custom : Header Contact Info';
	
	protected $options;

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
		$this->options = array(

            array(
                'phone_text', 'text', 'Phone:',
                'label'		=> esc_html__('Phone Text', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'phone_number', 'text', '+ (123) 456 74700',
                'label'		=> esc_html__('Phone Number', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'email_text', 'text', 'Email:',
                'label'		=> esc_html__('Email Text', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'email_address', 'text', 'empelza@my-domain.com',
                'label'		=> esc_html__('Email Address', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),

		);
		
        parent::__construct();
    }
	
    /**
     * Display widget
     */
    function widget( $args, $instance ) {
		$el_class = '';
		
        extract( $args );
		$this->setInstances($instance, 'filter');
		
        echo wp_kses($before_widget, array(
				'div' => array('id' => array(), 'class' => array()),
				'section' => array('id' => array(), 'class' => array())
			));

		$phone_text = $this->getInstance('phone_text');
        $phone_number = $this->getInstance('phone_number');
        $email_text = $this->getInstance('email_text');
        $email_address = $this->getInstance('email_address');
		/*HTML*/
        // Phone Content
        if($phone_text !='' or $phone_number!=''){
            echo '<div class="widget-header-phone-wrap widget-header-info-wrap">';
            if($phone_text!=''){
                echo '<div class="left-content">'.$phone_text.'</div>';
            }
            if($phone_number!=''){
                echo '<div class="right-content"><a href="tel:'.str_replace(" ","",$phone_number).'">'.$phone_number.'</a></div>';
            }
            echo '</div>';
        }
        // Email Content
        if($email_text !='' or $email_address!=''){
            echo '<div class="widget-header-email-wrap widget-header-info-wrap">';
            if($email_text!=''){
                echo '<div class="left-content">'.$email_text.'</div>';
            }
            if($email_address!=''){
                echo '<div class="right-content"><a href="mailto:'.str_replace(" ","",$email_address).'">'.$email_address.'</a></div>';
            }
            echo '</div>';
        }

        echo wp_kses($after_widget, array(
				'div' => array('id' => array(), 'class' => array()),
				'section' => array('id' => array(), 'class' => array())
			));
    }
}