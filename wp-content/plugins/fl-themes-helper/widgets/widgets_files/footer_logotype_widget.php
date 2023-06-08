<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class FL_THEME_HELPER_Footer_Logotype extends SB_WP_Widget {
	protected $widget_base_id = 'FL_THEME_HELPER_Footer_Logotype';
	protected $widget_name = 'Custom :Footer Logotype';
	
	protected $options;

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
		$this->options = array(
			array(
				'logotype_img', 'text', '',
				'label'		=> esc_html__('Upload image', 'fl-themes-helper'),
				'input'		=> 'upload_image',
				'on_update'	=> 'esc_attr'
			),
            array(
                'max_with_logotype', 'text', '125',
                'label'		=> esc_html__('Max Width Logotype', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'logotype_link', 'text', '',
                'label'		=> esc_html__('Logotype Link', 'fl-themes-helper'),
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

		$logotype_img = $this->getInstance('logotype_img');
        $max_with_logotype = $this->getInstance('max_with_logotype');
        $logotype_link = $this->getInstance('logotype_link');
        $logotype_css = ($max_with_logotype ) ? 'style='.'max-width:' . $max_with_logotype .  'px;' : '';



		/*HTML*/
		if(isset($logotype_img) && !empty($logotype_img)) {
			echo '<div class="footer-logotype-image">';
            if(isset($logotype_link) && !empty($logotype_link)) {
                echo '<a href="'.$logotype_link.'">';
            }
			    echo '<img src="'.esc_url($logotype_img).'" alt="'.esc_html__('Footer Logotype', 'fl-themes-helper').'" '.$logotype_css.'>';
            if(isset($logotype_link) && !empty($logotype_link)) {
                echo '</a>';
            }
			echo '</div>';
		}

        echo wp_kses($after_widget, array(
				'div' => array('id' => array(), 'class' => array()),
				'section' => array('id' => array(), 'class' => array())
			));
    }
}