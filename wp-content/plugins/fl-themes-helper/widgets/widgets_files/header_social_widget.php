<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class FL_THEME_HELPER_Header_Social extends SB_WP_Widget {
	protected $widget_base_id = 'FL_THEME_HELPER_Header_Social';
	protected $widget_name = 'Custom : Header Social Profiles';
	
	protected $options;

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
		$this->options = array(

            array(
                'social_text', 'text', 'Follow us:',
                'label'		=> esc_html__('Social Text', 'fl-themes-helper'),
                'input'		=> 'text',
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

        $social_text = $this->getInstance('social_text');
        $fb = $this->getInstance('fb');
        $tw = $this->getInstance('tw');
        $pt = $this->getInstance('pt');
        $vk = $this->getInstance('vk');
        $bh = $this->getInstance('bh');
        $in = $this->getInstance('in');

		/*HTML*/
        if(isset($social_text) && !empty($social_text)) {
            echo '<div class="social-left-text">'.$social_text.'</div>';
        }
        echo '<ul class="fl-header-social-link">';

        if(isset($fb) && !empty($fb)) {
            echo '<li class="header-sc-lnk"><a href="'.$fb.'" class="social-link fl-primary-color-hv"><i class="fa fa-facebook"></i></a></li>';
        }
        if(isset($tw) && !empty($tw)) {
            echo '<li class="header-sc-lnk"><a href="'.$tw.'" class="social-link fl-primary-color-hv"><i class="fa fa-twitter"></i></a></li>';
        }
        if(isset($pt) && !empty($pt)) {
            echo '<li class="header-sc-lnk"><a href="'.$pt.'" class="social-link fl-primary-color-hv"><i class="fa fa-pinterest-p"></i></a></li>';
        }
        if(isset($in) && !empty($in)) {
            echo '<li class="header-sc-lnk"><a href="'.$in.'" class="social-link fl-primary-color-hv"><i class="fa fa-instagram"></i></a></li>';
        }
        if(isset($vk) && !empty($vk)) {
            echo '<li class="header-sc-lnk"><a href="'.$vk.'" class="social-link fl-primary-color-hv"><i class="fa fa-vk"></i></a></li>';
        }
        if(isset($bh) && !empty($bh)) {
            echo '<li class="header-sc-lnk"><a href="'.$bh.'" class="social-link fl-primary-color-hv"><i class="fa fa-behance"></i></a></li>';
        }
        echo '</ul>';

        echo wp_kses($after_widget, array(
				'div' => array('id' => array(), 'class' => array()),
				'section' => array('id' => array(), 'class' => array())
			));
    }
}