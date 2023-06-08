<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class FL_THEME_HELPER_Contact_Info extends SB_WP_Widget {
	protected $widget_base_id = 'FL_THEME_HELPER_Contact_Info';
	protected $widget_name = 'Custom : Contact Info';
	
	protected $options;

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
		$this->options = array(
			array(
				'title', 'text', esc_html__('Contact Info', 'fl-themes-helper'),
				'label'		=> esc_html__('Title', 'fl-themes-helper'),
				'input'		=> 'text',
				'filters'	=> 'widget_title',
				'on_update'	=> 'esc_attr'
			),

            array(
                'address_left_content', 'text', 'Address:',
                'label'		=> esc_html__('Address left content', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),

            array(
                'address_right_content', 'text', '3135  Oliver St, Fort Worth TX 76134',
                'label'		=> esc_html__('Address right content', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),

            array(
                'email_left_content', 'text', 'Email:',
                'label'		=> esc_html__('Email left content', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),

            array(
                'email_right_content', 'text', 'empelza@my-domain.com',
                'label'		=> esc_html__('Email right content', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),

            array(
                'phone_left_content', 'text', 'Phone:',
                'label'		=> esc_html__('Phone left content', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),

            array(
                'phone_right_content', 'text', '+ (123) 456 74700',
                'label'		=> esc_html__('Phone right content', 'fl-themes-helper'),
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
		
		$title = $this->getInstance('title');
        $title_about_us = $this->getInstance('title_about_us');
        $address_left = $this->getInstance('address_left_content');
        $address_right = $this->getInstance('address_right_content');
        $email_left = $this->getInstance('email_left_content');
        $email_right = $this->getInstance('email_right_content');
        $phone_left = $this->getInstance('phone_left_content');
        $phone_right = $this->getInstance('phone_right_content');
		echo (!empty($title)) ? $before_title . $title . $after_title : '';
				
		/*HTML*/


        if(isset($title_about_us) && !empty($title_about_us)) {
            echo '<h5 class="fl-author-title">'.$title_about_us.'</h5>';
        }

        if($address_left !='' or $address_right!=''){
            echo '<div class="widget-address-wrap widget-info-wrap">';
                if($address_left!=''){
                    echo '<div class="left-content">'.$address_left.'</div>';
                }
                if($address_right!=''){
                    echo '<div class="right-content">'.$address_right.'</div>';
                }

            echo '</div>';
        }

        if($email_left !='' or $email_right!=''){
            echo '<div class="widget-email-wrap widget-info-wrap">';
            if($email_left!=''){
                echo '<div class="left-content">'.$email_left.'</div>';
            }
            if($email_right!=''){
                echo '<div class="right-content"><a href="mailto:'.str_replace(" ","",$email_right).'">'.$email_right.'</a></div>';
            }

            echo '</div>';
        }

        if($phone_left !='' or $phone_right!=''){
            echo '<div class="widget-phone-wrap widget-info-wrap">';
            if($phone_left!=''){
                echo '<div class="left-content">'.$phone_left.'</div>';
            }
            if($phone_right!=''){
                echo '<div class="right-content"><a href="tel:'.str_replace(" ","",$phone_right).'">'.$phone_right.'</a></div>';
            }

            echo '</div>';
        }



        echo wp_kses($after_widget, array(
				'div' => array('id' => array(), 'class' => array()),
				'section' => array('id' => array(), 'class' => array())
			));
    }
}