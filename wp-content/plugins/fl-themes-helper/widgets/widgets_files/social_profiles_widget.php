<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class FL_THEME_HELPER_Social_Profiles extends SB_WP_Widget {
	protected $widget_base_id = 'FL_THEME_HELPER_Social_Profiles';
	protected $widget_name = 'Custom : Social Profiles';
	
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
                'gl', 'text', '',
                'label'		=> esc_html__('Google + Link:', 'fl-themes-helper'),
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
                'dr', 'text', '',
                'label'		=> esc_html__('Dribble Link:', 'fl-themes-helper'),
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
            array(
                'vm', 'text', '',
                'label'		=> esc_html__('Vimeo Link:', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'in', 'text', '',
                'label'		=> esc_html__('Instagram Link:', 'fl-themes-helper'),
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
        $fb = $this->getInstance('fb');
        $tw = $this->getInstance('tw');
        $pt = $this->getInstance('pt');
        $vk = $this->getInstance('vk');
        $bh = $this->getInstance('bh');
        $gl = $this->getInstance('gl');
        $gr = $this->getInstance('dr');
        $vm = $this->getInstance('vm');
        $in = $this->getInstance('in');
		echo (!empty($title)) ? $before_title . $title . $after_title : '';

        echo '<ul class="sidebar-social-links">';

        if(isset($fb) && !empty($fb)) {
            echo '<li class="social-links"><a href="'.$fb.'" class="social-link fl-primary-color-hv"><i class="fa fa-facebook"></i></a></li>';
        }
        if(isset($tw) && !empty($tw)) {
            echo '<li class="social-links"><a href="'.$tw.'" class="social-link fl-primary-color-hv"><i class="fa fa-twitter"></i></a></li>';
        }
        if(isset($gl) && !empty($gl)) {
            echo '<li class="social-links"><a href="'.$gl.'" class="social-link fl-primary-color-hv"><i class="fa fa-google"></i></a></li>';
        }
        if(isset($pt) && !empty($pt)) {
            echo '<li class="social-links"><a href="'.$pt.'" class="social-link fl-primary-color-hv"><i class="fa fa-pinterest-p"></i></a></li>';
        }
        if(isset($gr) && !empty($gr)) {
            echo '<li class="social-links"><a href="'.$gr.'" class="social-link fl-primary-color-hv"><i class="fa fa-dribbble"></i></a></li>';
        }
        if(isset($in) && !empty($in)) {
            echo '<li class="social-links"><a href="'.$in.'" class="social-link fl-primary-color-hv"><i class="fa fa-instagram"></i></a></li>';
        }
        if(isset($vk) && !empty($vk)) {
            echo '<li class="social-links"><a href="'.$vk.'" class="social-link fl-primary-color-hv"><i class="fa fa-vk"></i></a></li>';
        }
        if(isset($bh) && !empty($bh)) {
            echo '<li class="social-links"><a href="'.$bh.'" class="social-link fl-primary-color-hv"><i class="fa fa-behance"></i></a></li>';
        }
        if(isset($vm) && !empty($vm)) {
            echo '<li class="social-links"><a href="'.$vm.'" class="social-link fl-primary-color-hv"><i class="fa fa-vimeo"></i></a></li>';
        }
        echo '</ul>';

        echo wp_kses($after_widget, array(
				'div' => array('id' => array(), 'class' => array()),
				'section' => array('id' => array(), 'class' => array())
			));
    }
}