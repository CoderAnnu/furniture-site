<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ========= S I D E    B Y    S I D E    C O N T A I N E R ========= 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

if(!class_exists('Kaswara_sidebyside_container')){
	class Kaswara_sidebyside_container{
		function __construct(){
			add_action('init',array($this,'Kaswara_sidebyside_container_init'));
			add_shortcode('kswrsidebyside_container',array($this,'Kaswara_sidebyside_container_shortcode'));
			add_shortcode('kswrsidebyside_left',array($this,'Kaswara_sidebyside_left_shortcode'));
			add_shortcode('kswrsidebyside_right',array($this,'Kaswara_sidebyside_right_shortcode'));
			add_shortcode('kswrsidebyside_element_container',array($this,'Kaswara_sidebyside_element_container_shortcode'));

		}
		function Kaswara_sidebyside_container_init(){
			if(function_exists('vc_map')){
				//Big Container
				vc_map(
					array(
						"name" => esc_html__("Screen Splitter","kaswara"),
						"base" => "kswrsidebyside_container",
 				       'icon' => KASWARA_IMAGES.'small/sidebyside.jpg',  
    					"category" => "Kaswara",        
						"description" => esc_html__("Side By Side Container.","kaswara"),
						"as_parent" => array('only' => 'kswrsidebyside_left,kswrsidebyside_right'), 
						"content_element" => true,
						"show_settings_on_create" => true,						
						"js_view" => 'VcColumnView',
						"params" => array(
								
							array(
								'type' => 'checkbox',
								'heading' => esc_html__( 'Enable CSS3', 'kaswara' ),
								'param_name' => 'sbs_c_css3',						
								'value' => array( esc_html__( 'Yes', 'kaswara' ) => 'true' ),
							),
							array(
								'type' => 'checkbox',
								'heading' => esc_html__( 'Enable Loop', 'kaswara' ),
								'param_name' => 'sbs_c_loop',
								'value' => array( esc_html__( 'Yes', 'kaswara' ) => 'true' ),
							),
							array(
								'type' => 'checkbox',
								'heading' => esc_html__( 'Enable Navigation', 'kaswara' ),
								'param_name' => 'sbs_c_navigation',							
								'value' => array( esc_html__( 'Yes', 'kaswara' ) => 'true' ),
							),
							array(
						        "type" => "kswr_number",
						        "value" => 500,
						        "max" => 5000,
						        "min" => 100,
						        "step" => 100,
						        "heading" => esc_html__( "Scrolling Speed", "kaswara" ),						     
						        "param_name" => "sbs_c_speed"
						    ), 
						    array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Easing Animation', 'kaswara' ),
				                'description' => esc_html__( 'Applied only if CSS3 is disabled', 'kaswara' ),
				                'param_name' => 'sbs_c_easing',			               				
				                'value' => array(
				                    'easeOutQuad'	=>'easeOutQuad','jswing'	=>'jswing','def'	=>'def','easeInQuad'	=>'easeInQuad','easeInOutQuad'	=>'easeInOutQuad','easeInCubic'	=>'easeInCubic','easeOutCubic'	=>'easeOutCubic','easeInOutCubic'	=>'easeInOutCubic','easeInQuart'	=>'easeInQuart','easeOutQuart'	=>'easeOutQuart','easeInOutQuart'	=>'easeInOutQuart','easeInQuint'	=>'easeInQuint','easeOutQuint'	=>'easeOutQuint','easeInOutQuint'	=>'easeInOutQuint','easeInSine'	=>'easeInSine','easeOutSine'	=>'easeOutSine','easeInOutSine'	=>'easeInOutSine','easeInExpo'	=>'easeInExpo','easeOutExpo'	=>'easeOutExpo','easeInOutExpo'	=>'easeInOutExpo','easeInCirc'	=>'easeInCirc','easeOutCirc'	=>'easeOutCirc','easeInOutCirc'	=>'easeInOutCirc','easeInElastic'	=>'easeInElastic','easeOutElastic'	=>'easeOutElastic','easeInOutElastic'	=>'easeInOutElastic','easeInBack'	=>'easeInBack','easeOutBack'	=>'easeOutBack','easeInOutBack'	=>'easeInOutBack','easeInBounce'	=>'easeInBounce','easeOutBounce'	=>'easeOutBounce','easeInOutBounce'	=>'easeInOutBounce',           )               
				            ),
				            array(
					            "type" => "colorpicker",				                
					            "heading" => esc_html__( "Navigation Color", "kaswara" ),
               					"dependency" => Array("element" => "sbs_c_navigation","value" => array("true")),                
					            "param_name" => "sbs_c_color",
					            "value" => '#000', 
					        ),
					         array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Navigation Position', 'kaswara' ),
               					"dependency" => Array("element" => "sbs_c_navigation","value" => array("true")),                
				                'param_name' => 'sbs_c_position',
				                'value' => array(
				                   'right' => 'right',
				                   'left' => 'left',
								)               
				            ),
							array(
				                "type" => "textfield",
				                "heading" => esc_html__( "CSS Class", "kaswara" ),
				                "description" => esc_html__( "Add custom CSS classes", "kaswara" ),
				                "param_name" => "sbs_c_classes"
				            ),	


						)
					)
				);	

				//Left Side
				vc_map(
					array(
						"name" => esc_html__("Left Side Container","kaswara"),
						"base" => "kswrsidebyside_left",
						"class" => "",
 				       	'icon' => KASWARA_IMAGES.'small/sideleft.jpg',  						
						"description" => esc_html__("Side By Side Left Container.","kaswara"),
						'as_parent' => array('only' => 'kswrsidebyside_element_container'),
						'as_child' => array('only' => 'kswrsidebyside_container'),
						"content_element" => true,
						"show_settings_on_create" => false,						
						"js_view" => 'VcColumnView',
						"params" => array(
							array(
				                "type" => "textfield",
				                "heading" => esc_html__( "CSS Class", "kaswara" ),
				                "description" => esc_html__( "Add custom CSS classes", "kaswara" ),
				                "param_name" => "sbs_le_classes"
				            ),	
						)
					)
				);	

				//Right Side
				vc_map(
					array(
						"name" => esc_html__("Right Side Container","kaswara"),
						"base" => "kswrsidebyside_right",
						"class" => "",
 				       'icon' => KASWARA_IMAGES.'small/sideright.jpg',  
						"description" => esc_html__("Side By Side Right Container.","kaswara"),
						'as_parent' => array('only' => 'kswrsidebyside_element_container'),
						'as_child' => array('only' => 'kswrsidebyside_container'),
						"content_element" => true,
						"show_settings_on_create" => false,						
						"js_view" => 'VcColumnView',
						"params" => array(
							array(
				                "type" => "textfield",
				                "heading" => esc_html__( "CSS Class", "kaswara" ),
				                "description" => esc_html__( "Add custom CSS classes", "kaswara" ),
				                "param_name" => "sbs_ri_classes"
				            ),	
						)
					)
				);	

				//Elements Container
				vc_map(
					array(
						"name" => esc_html__("Side Element Container","kaswara"),
						"base" => "kswrsidebyside_element_container",
						"class" => "",
 				       'icon' => KASWARA_IMAGES.'small/postgrid.jpg',  						
						"description" => esc_html__("Side By Side Elements Container.","kaswara"),
						'as_parent' => array('except' => 'kswrsidebyside_element_container,kswrsidebyside_left,kswrsidebyside_right,kswrsidebyside_container'),
						'as_child' => array('only' => 'kswrsidebyside_left,kswrsidebyside_right'),
						"content_element" => true,
						"show_settings_on_create" => false,						
						"js_view" => 'VcColumnView',
						"params" => array(
							array(
				                "type" => "textfield",
				                "heading" => esc_html__( "CSS Class", "kaswara" ),
				                "description" => esc_html__( "Add custom CSS classes", "kaswara" ),
				                "param_name" => "sbs_elc_classes"
				            ),	
				            array(
								'type' => 'css_editor',
								//'edit_field_class' => 'vc_col-xs-12 vc_column',
								'heading' => esc_html__( 'CSS box', 'kaswara' ),
								'param_name' => 'sbs_elc_css',
								'group' => 'Design Options'
							),
						)
					)
				);	
				
			}
		}

			//ShortCode Function
			function Kaswara_sidebyside_container_shortcode($atts,$content = null){
				extract(shortcode_atts(array(								
					"sbs_c_classes" 			=> '',		
					"sbs_c_css3"				=> 'false',
					"sbs_c_loop"				=> 'false',
					"sbs_c_navigation"			=> 'false',
					"sbs_c_speed"				=> '500',
					"sbs_c_easing"				=> 'easeInQuart',
					"sbs_c_color"				=> '#000',
					"sbs_c_position"			=> 'right',
			 	), $atts));
			 	$outPut = '';
			 	$data_attr = 'data-css3="'.esc_attr($sbs_c_css3).'"  data-loop="'.esc_attr($sbs_c_loop).'" data-navigation="'.esc_attr($sbs_c_navigation).'" data-speed="'.esc_attr($sbs_c_speed).'" data-easing="'.esc_attr($sbs_c_easing).'" data-color="'.esc_attr($sbs_c_color).'" data-position="'.esc_attr($sbs_c_position).'"';
			 	$outPut .='<div class="km-sidebyside-container '.esc_attr($sbs_c_classes).'" '.$data_attr.'>';
			 	$outPut .= do_shortcode($content);
				$outPut .= '</div>';
			 	return $outPut;
			}

			function Kaswara_sidebyside_left_shortcode($atts,$content = null){
				extract(shortcode_atts(array(								
					"sbs_le_classes" => '',				
			 	), $atts));
			 	$outPut = '';
			 	$outPut .='<div class="km-sidebyside-left ms-left '.esc_attr($sbs_le_classes).'">';
			 	$outPut .= do_shortcode($content);
				$outPut .= '</div>';
			 	return $outPut;
			}

			function Kaswara_sidebyside_right_shortcode($atts,$content = null){
				extract(shortcode_atts(array(								
					"sbs_ri_classes" => '',				
				), $atts));
				$outPut = '';
				$outPut .='<div class="km-sidebyside-right ms-right '.esc_attr($sbs_ri_classes).'">';
				$outPut .= do_shortcode($content);
				$outPut .= '</div>';
				return $outPut;
			}

			function Kaswara_sidebyside_element_container_shortcode($atts,$content = null){
				extract(shortcode_atts(array(								
					"sbs_elc_classes" => '',				
					"sbs_elc_css" => '',									
				), $atts));
				$classes_c = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $sbs_elc_classes . vc_shortcode_custom_css_class( $sbs_elc_css, ' ' ), $atts );
				$outPut = '';
				$outPut .='<div class="km-sidebyside-element-container ms-section '.esc_attr($classes_c).'">';
				$outPut .= do_shortcode($content);
				$outPut .= '</div>';
				return $outPut;
			}

			
	}
}
if(class_exists('Kaswara_sidebyside_container')){
	$Kaswara_sidebyside_container = new Kaswara_sidebyside_container;
}
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_kswrsidebyside_container extends WPBakeryShortCodesContainer {}
    class WPBakeryShortCode_kswrsidebyside_left extends WPBakeryShortCodesContainer {}
    class WPBakeryShortCode_kswrsidebyside_right extends WPBakeryShortCodesContainer {}
    class WPBakeryShortCode_kswrsidebyside_element_container extends WPBakeryShortCodesContainer {}


}


?>