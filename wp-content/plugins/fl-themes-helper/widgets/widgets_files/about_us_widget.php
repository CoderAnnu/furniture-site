<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class FL_THEME_HELPER_About_Us extends SB_WP_Widget {
	protected $widget_base_id = 'FL_THEME_HELPER_About_Us';
	protected $widget_name = 'Custom : About Us';
	
	protected $options;

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
		$this->options = array(
			array(
				'title', 'text', '',
				'label'		=> esc_html__('Title', 'fl-themes-helper'),
				'input'		=> 'text',
				'filters'	=> 'widget_title',
				'on_update'	=> 'esc_attr'
			),
			array(
				'about_img', 'text', '',
				'label'		=> esc_html__('Upload image', 'fl-themes-helper'),
				'input'		=> 'upload_image',
				'on_update'	=> 'esc_attr'
			),
            array(
                'title_about_us', 'text', '',
                'label'		=> esc_html__('Title About Us', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'content', 'text', '',
                'label'		=> esc_html__('Content', 'fl-themes-helper'),
                'input'		=> 'textarea',
                'on_update'	=> 'esc_attr'
            ),

            array(
                'fb', 'text', '',
                'label'		=> esc_html__('Facebook Link:', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'tw', 'text', '',
                'label'		=> esc_html__('Twitter Link:', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'pt', 'text', '',
                'label'		=> esc_html__('Pinterest Link:', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'vk', 'text', '',
                'label'		=> esc_html__('Vkontakte Link:', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'bh', 'text', '',
                'label'		=> esc_html__('Behance Link:', 'fl-themes-helper'),
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
		$about_img = $this->getInstance('about_img');
        $title_about_us = $this->getInstance('title_about_us');
        $content = $this->getInstance('content');
        $fb = $this->getInstance('fb');
        $tw = $this->getInstance('tw');
        $pt = $this->getInstance('pt');
        $vk = $this->getInstance('vk');
        $bh = $this->getInstance('bh');
		echo (!empty($title)) ? $before_title . $title . $after_title : '';
				
		/*HTML*/
		if(isset($about_img) && !empty($about_img)) {
			echo '<div class="about-image">';
				echo '<img src="'.esc_url($about_img).'" alt="">';
			echo '</div>';
		}

        if(isset($title_about_us) && !empty($title_about_us)) {
            echo '<h5 class="fl-author-title fl-text-semi-bold-style">'.$title_about_us.'</h5>';
        }


        echo '<ul class="fl-about-social-link">';

        if(isset($fb) && !empty($fb)) {
            echo '<li class="about-sc-lnk"><a href="'.$fb.'" class="social-link fl-primary-color-hv"><i class="fa fa-facebook"></i></a></li>';
        }
        if(isset($tw) && !empty($tw)) {
            echo '<li class="about-sc-lnk"><a href="'.$tw.'" class="social-link fl-primary-color-hv"><i class="fa fa-twitter"></i></a></li>';
        }
        if(isset($pt) && !empty($pt)) {
            echo '<li class="about-sc-lnk"><a href="'.$pt.'" class="social-link fl-primary-color-hv"><i class="fa fa-pinterest-p"></i></a></li>';
        }
        if(isset($vk) && !empty($vk)) {
            echo '<li class="about-sc-lnk"><a href="'.$vk.'" class="social-link fl-primary-color-hv"><i class="fa fa-vk"></i></a></li>';
        }
        if(isset($bh) && !empty($bh)) {
            echo '<li class="about-sc-lnk"><a href="'.$bh.'" class="social-link fl-primary-color-hv"><i class="fa fa-behance"></i></a></li>';
        }
        echo '</ul>';

        if(isset($content) && !empty($content)) {
            echo '<div class="text">'.$content.'</div>';
        }




        echo wp_kses($after_widget, array(
				'div' => array('id' => array(), 'class' => array()),
				'section' => array('id' => array(), 'class' => array())
			));
    }
}