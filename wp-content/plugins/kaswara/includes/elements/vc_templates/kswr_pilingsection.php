<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============       Page  Pilling  Shortcode       ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */


if(!class_exists('Kaswara_pilingsection'))
{
	class Kaswara_pilingsection
	{
		function __construct()
		{
			add_action('init',array($this,'kaswara_pilingsection_init'));
			add_shortcode('kswr_pilingsection',array($this,'kaswara_pilingsection_shortcode'));	
			add_shortcode('kswr_pilingsection_elementcontainer',array($this,'Kaswara_pilingsection_elements_container_shortcode'));		
		}
		
		function kaswara_pilingsection_init(){
			if(function_exists('vc_map')){
				//VC map Piling Section
				vc_map(
					array(
						"name" => esc_html__("Piling Section","kaswara"),
						"base" => "kswr_pilingsection",
				        "description" => esc_html__("Piling section parent.", "kaswara"),         						
        				'as_parent' => array('only' => 'kswr_pilingsection_elementcontainer'),
 				        'icon' => KASWARA_IMAGES.'small/piling.jpg',  
						"class" => "",
      					"category" => "Kaswara",        
						"content_element" => true,
						"show_settings_on_create" => true,						
						"js_view" => 'VcColumnView',
						"params" => array(							
							array(
				                "type" => "kswr_number",
				                "heading" => esc_html__( "Scrolling Speed", "kaswara" ),
				                "param_name" => "plsec_speed",
				                "value" => 700,
				                "step" => 100,
				            ),							
							array(
				                "type" => "kswr_switcher",
				                "heading" => esc_html__( "Enable CSS3", "kaswara" ),
				                "param_name" => "plsec_css3",
				                'default' => 'true',
				                'on' => array('text' => 'ON','val' => 'true' ),
				                'off'=> array('text' => 'OFF','val' => 'false') 
				            ), 
				            array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Transition Animation', 'kaswara' ),				               
				                'param_name' => 'plsec_transanimation',
				                'value' => array(
				                    esc_html__( 'Normal','kaswara') => 'normal',
				                    esc_html__( 'Scale','kaswara') => 'scale',
				                    esc_html__( 'Modern','kaswara') => 'modern',
				                    esc_html__( 'Parallax','kaswara') => 'parallax',
				                )               
				            ),
							array(
				                "type" => "kswr_switcher",
				                "heading" => esc_html__( "Loop Top", "kaswara" ),
				                "param_name" => "plsec_looptop",
				                'default' => 'false',
				                'on' => array('text' => 'ON','val' => 'true' ),
				                'off'=> array('text' => 'OFF','val' => 'false') 
				            ), 
				            array(
				                "type" => "kswr_switcher",
				                "heading" => esc_html__( "Loop Bottom", "kaswara" ),
				                "param_name" => "plsec_loopbottom",
				                'default' => 'false',
				                'on' => array('text' => 'ON','val' => 'true' ),
				                'off'=> array('text' => 'OFF','val' => 'false') 
				            ), 
							
							array(
				                "type" => "colorpicker",
				                "value" => "#333",
				                "heading" => esc_html__( "Navigation Bullet Color", "kaswara" ),
				                "param_name" => "plsec_navbulletcolor"
				            ),
				            array(
				                "type" => "colorpicker",
				                "value" => "#333",
				                "heading" => esc_html__( "Navigation Tooltip Color", "kaswara" ),
				                "param_name" => "plsec_navtooltipcolor"
				            ),
							array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Navigation Position', 'kaswara' ),				               
				                'param_name' => 'plsec_navposition',
				                'value' => array(
				                    esc_html__( 'Right','kaswara') => 'right',
				                    esc_html__( 'Left','kaswara') => 'left'
				                )               
				            ),
							array(
				                "type" => "kswr_switcher",
				                "heading" => esc_html__( "Vertical Centered", "kaswara" ),
				                "param_name" => "plsec_verticalcentered",
				                'default' => 'true',
				                'on' => array('text' => 'ON','val' => 'true' ),
				                'off'=> array('text' => 'OFF','val' => 'false') 
				            ), 
				            
														
						)
					)
				);

				//VC map Piling Element Contaier Section
				vc_map(
					array(
						"name" => esc_html__("Piling Elements Container","kaswara"),
						"base" => "kswr_pilingsection_elementcontainer",
				        "description" => esc_html__("Piling section elements container.", "kaswara"),         						
        				'as_parent' => array('except' => 'kswr_pilingsection,kswrsidebyside_element_container,kswrsidebyside_left,kswrsidebyside_right,kswrsidebyside_container'),
						'as_child' => array('only' => 'kswr_pilingsection'),
 				       'icon' => KASWARA_IMAGES.'small/piling-content.jpg',  
						"class" => "",
      					"category" => "Kaswara",        
						"content_element" => true,
						"show_settings_on_create" => true,						
						"js_view" => 'VcColumnView',
						"params" => array(
							array(
				                "type" => "kswr_switcher",
				                "heading" => esc_html__( "Enable Overlay", "kaswara" ),
				                "param_name" => "pl_elc_overlay_enabled",
				                'default' => 'false',
				                'on' => array('text' => 'ON','val' => 'true' ),
				                'off'=> array('text' => 'OFF','val' => 'false') 
				            ), 
				            array(
				                "type" => "colorpicker",
				                "heading" => esc_html__( "Overlay Color", "kaswara" ),
				                "dependency" => Array("element" => "pl_elc_overlay_enabled","value" => array('true')),            
				                "param_name" => "pl_elc_overlay_color"
				            ),
				            array(
				                "type" => "kswr_number",
				                "heading" => esc_html__( "Overlay Opacity", "kaswara" ),
				                "param_name" => "pl_elc_overlay_opacity",
				                "dependency" => Array("element" => "pl_elc_overlay_enabled","value" => array('true')),            
				                "value" => 0,
				                "min" => 0,
				                "max" => 1,
				                "step" => '0.1',
				             ),
							array(
								"type" => "textfield",
							    "heading" => esc_html__( "CSS Class", "kaswara" ),
							    "description" => esc_html__( "Add custom CSS classes", "kaswara" ),
							    "param_name" => "pl_elc_classes"
							),	
							array(
								"type" => "textfield",
							    "heading" => esc_html__( "Tooltip name", "kaswara" ),
							    "description" => esc_html__( "Add a tooltip for section (optional)", "kaswara" ),
							    "param_name" => "pl_elc_tooltip"
							),	
							array(
								'type' => 'css_editor',								
								'heading' => esc_html__( 'CSS box', 'kaswara' ),
								'param_name' => 'pl_elc_css',
								'group' => 'Design Options'
							),			

						)
					)
				);

			
				
			}
		}	

		function kaswara_pilingsection_shortcode($atts,$content = null){				
			extract(shortcode_atts(array(		
				'plsec_speed'				=>	'700',
				'plsec_css3'				=>	'true',
				'plsec_looptop'				=>	'false',
				'plsec_loopbottom'			=>	'false',
				'plsec_navbulletcolor'		=>	'#333',
				'plsec_navtooltipcolor'		=>	'#333',
				'plsec_navposition'			=>	'right',
				'plsec_verticalcentered'	=>	'true',		
				'plsec_transanimation'		=>	'normal'	
								
		 	), $atts));
		 	
		 	$outPut = '<div class="kswr-piling-container" data-transanimation="'.esc_attr($plsec_transanimation).'"   data-speed="'.esc_attr($plsec_speed).'" data-css3="'.esc_attr($plsec_css3).'" data-looptop="'.esc_attr($plsec_looptop).'" data-loopbottom="'.esc_attr($plsec_loopbottom).'" data-navbulletcolor="'.esc_attr($plsec_navbulletcolor).'" data-navtooltipcolor="'.esc_attr($plsec_navtooltipcolor).'" data-navposition="'.esc_attr($plsec_navposition).'" data-verticalcentered="'.esc_attr($plsec_verticalcentered).'" >'.do_shortcode($content).'</div>';

		 	return $outPut;			
		}

		function Kaswara_pilingsection_elements_container_shortcode($atts,$content = null){
				extract(shortcode_atts(array(								
					"pl_elc_classes" => '',				
					"pl_elc_css" => '',									
					"pl_elc_tooltip" => '',		
					'pl_elc_overlay_enabled'	=>	'false',
					'pl_elc_overlay_color'	=>	'',
					'pl_elc_overlay_opacity'	=>	'0',							
				), $atts));
				$classes_c = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $pl_elc_classes . vc_shortcode_custom_css_class( $pl_elc_css, ' ' ), $atts );
				$outPut = '';
				$isOverlay = ($pl_elc_overlay_enabled =='true') ? '<div class="kswr-piling-section-overlay" style="background:'.$pl_elc_overlay_color.'; opacity:'.$pl_elc_overlay_opacity.';"></div>' :'' ;
				$outPut .='<div class="kswr-piling-section '.esc_attr($classes_c).'" data-tooltip="'.esc_attr($pl_elc_tooltip).'">'.$isOverlay ;
				$outPut .= do_shortcode($content);
				$outPut .= '</div>';
				return $outPut;
			}

	}
}
if(class_exists('Kaswara_pilingsection')){
	$Kaswara_animation_block = new Kaswara_pilingsection;
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_kswr_pilingsection extends WPBakeryShortCodesContainer {}
     class WPBakeryShortCode_kswr_pilingsection_elementcontainer extends WPBakeryShortCodesContainer {}
}



?>