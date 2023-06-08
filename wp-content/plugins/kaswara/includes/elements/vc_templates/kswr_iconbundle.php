<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============       I C O N S       B U N D L E    ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */


if(!class_exists('Kaswara_iconbundle'))
{
	class Kaswara_iconbundle
	{
		function __construct()
		{
			add_action('init',array($this,'kaswara_iconbundle_init'));
			add_shortcode('kswr_iconbundle',array($this,'kaswara_iconbundle_shortcode'));		
			add_shortcode('kswr_singleicon_child',array($this,'kaswara_singleicon_child_shortcode'));		
		}
		
		function kaswara_iconbundle_init(){
			if(function_exists('vc_map')){
				//VC map for bundle container
				vc_map(
					array(
						"name" => esc_html__("Icons Bundle","kaswara"),
						"base" => "kswr_iconbundle",
						"class" => "",
 				       'icon' => KASWARA_IMAGES.'small/iconbundle.jpg',  
      					"category" => "Kaswara",        
						"description" => esc_html__("Multiple icons list.","kaswara"),
						"as_parent" => array('only' => 'kswr_singleicon_child'), 
						"content_element" => true,
						"show_settings_on_create" => true,						
						"js_view" => 'VcColumnView',
						"params" => array(
							array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Layout Type', 'kaswara' ),
				                'group' => 'General',
				                'param_name' => 'ib_layout',
				                'value' => array(
				                    esc_html__( 'Side by Side ','kaswara') => 'line',
				                    esc_html__( 'One Under One','kaswara') => 'column'
				                )               
				            ),
				             array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Icons Alignment', 'kaswara' ),
				                'group' => 'General',
				                'param_name' => 'ib_align',
				                'value' => array(
					            	esc_html__( 'Left','kaswara') => 'left',
				                	esc_html__( 'Center','kaswara') => 'center',
					            	esc_html__( 'Right','kaswara') => 'right',					            
				                )               
				            ),


						)
					)
				);

				//VC map for Icon		
				vc_map( array(
			        "name" => esc_html__( "Single Icon", "kaswara" ),
			        "description" => esc_html__("Single icon with hover effect.", "kaswara"),         
 				       'icon' => KASWARA_IMAGES.'small/icon.jpg',  
			        "category" => "Kaswara",        
			        "as_child" => array('only' => 'kswr_iconbundle'),
			        "base" => "kswr_singleicon_child",      
			        "params" => array( 
			             array(
			                "type" => "kswr_iconchooser",
			                "class" => "",
			                "heading" =>esc_html__("Select Icon","kaswara"),
			                "description" =>esc_html__("Choose Your Icon","kaswara"),
			                "param_name" => "siib_icon",
			                "value" => "",
			                "group" => "General",
			            ),                             
			            array(
			                "type" => "dropdown",
			                 "heading" => esc_html__( 'Icon Hover Effect','kaswara'),
			                 "param_name" => "siib_effect",           
			                 "value" => array(
			                    esc_html__('None','kaswara') => 'none',
			                    esc_html__('Fade','kaswara') => 'fade',                   
			                    esc_html__('Zoom in','kaswara') => 'zoomin',
			                    esc_html__('Zoom out','kaswara') => 'zoomout',
			                    esc_html__('Sasuki','kaswara') => 'sasuki',
			                    esc_html__('Hiroshi','kaswara') => 'hiroshi',
			                    esc_html__('Haruki','kaswara') => 'haruki',
			                    esc_html__('Haruki','kaswara') => 'haruki',
			                    esc_html__('Murawa','kaswara') => 'murawa',
			                    esc_html__('Sisawa','kaswara') => 'sisawa',          
			                ),         
			                "group" => "General",
			            ),
			            array(
			                "type" => "kswr_switcher",
			                "group" => "General", 
			                "heading" => esc_html__( "Magic Rotation", "kaswara" ),
			                "description" => esc_html__( "Only if border radius 0", "kaswara" ),
			                "param_name" => "siib_rotation",
			                'default' => 'false',
			                'on' => array('text' => 'ON','val' => 'true' ),
			                'off'=> array('text' => 'OFF','val' => 'false') 
			            ), 
			             //
			             array(
			                "type" => "kswr_message",
			                "group" => "General", 
			                "title" => esc_html__( "Icon Styling Styling", "kaswara" ),
			                "param_name" => "siib_style_default_sections",
			                "mtop" => "10px"
			             ),
			            array(
			                "type" => "kswr_switcher",
			                "group" => "General", 
			                "heading" => esc_html__( "Use Default Icon Styling", "kaswara" ),
			                "param_name" => "siib_style_default",
			                'default' => '1',
			                'on' => array('text' => 'ON','val' => '1' ),
			                'off'=> array('text' => 'OFF','val' => '0') 
			            ),           
			            array(
			                "type" => "kswr_number",
			                "value" => 18,
			                "group" => "General", 
			                "max" => 1200,
			                "dependency" => Array("element" => "siib_style_default","value" => array("0")),        
			                "heading" => esc_html__( "Icon Size", "kaswara" ),
			                "param_name" => "siib_iconsize"
			            ),
			            array(
			                "type" => "kswr_number",
			                "value" => 25,
			                "group" => "General", 
			                "max" => 2200,
			                "dependency" => Array("element" => "siib_style_default","value" => array("0")),        
			                "heading" => esc_html__( "Icon Background Size", "kaswara" ),
			                "param_name" => "siib_bgsize"
			            ),
			            array(
			                "type" => "kswr_number",
			                "value" => 0,
			                "group" => "General", 
			                "max" => 500,
			                "dependency" => Array("element" => "siib_style_default","value" => array("0")),        
			                "heading" => esc_html__( "Icon Border Radius", "kaswara" ),
			                "param_name" => "siib_border_radius"
			            ),

			            array(
			                "type" => "kswr_gradient",
			                "group" => "General",            
			                "value" => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
			                "dependency" => Array("element" => "siib_style_default","value" => array("0")),                    
			                "heading" => esc_html__( "Icon Color", "kaswara" ),
			                "param_name" => "siib_ic_color"
			            ),
			            array(
			                "type" => "kswr_gradient",
			                "group" => "General",            
			                "value" => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
			                "dependency" => Array("element" => "siib_style_default","value" => array("0")),                    
			                "heading" => esc_html__( "Icon Color onHover", "kaswara" ),
			                "param_name" => "siib_ic_color_hover"
			            ),
			            array(
			                "type" => "kswr_gradient",
			                "group" => "General",            
			                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
			                "dependency" => Array("element" => "siib_style_default","value" => array("0")),                    
			                "heading" => esc_html__( "Icon Background", "kaswara" ),
			                "param_name" => "siib_back"
			            ),
			            array(
			                "type" => "kswr_gradient",
			                "group" => "General",            
			                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
			                "dependency" => Array("element" => "siib_style_default","value" => array("0")),                    
			                "heading" => esc_html__( "Icon Background onHover", "kaswara" ),
			                "param_name" => "siib_back_hover"
			            ),
			            array(
			                "type" => "kswr_border",
							'bordergradient' => 'enable',
			                "heading" => esc_html__( "Border Styling", "kaswara" ),         
			                "dependency" => Array("element" => "siib_style_default","value" => array("0")),                    
			                "group" => "General",                 
			                "param_name" => "siib_border"
			             ),

			            array(
			                "type" => "textfield",
			                "heading" => esc_html__( "Icon Link", "kaswara" ),
			                "param_name" => "siib_link",
			                "value" => '',
			                "group" => "General"   
			            ),
			            array(
			                "type" => "dropdown",
			                 "heading" => esc_html__( 'Open Link in','kaswara'),
			                 "param_name" => "siib_openlink",           
			                 "value" => array(
			                    esc_html__('Same Window','kaswara') => '_self',
			                    esc_html__('New tab','kaswara') => '_blank'            
			                ),         
			                "group" => "General",
			            ),			          
			            array(
			                "type" => "kswr_distance",
			                "distance" => "margin",            
			                "param_name" => "siib_elem_margins",
			                "heading" => esc_html__( "Icon Margins", "kaswara" ),
			                "positions" => array(
			                    esc_html__("Top","kaswara") => "top",
			                    esc_html__("Right","kaswara") => "right",
			                    esc_html__("Bottom","kaswara") => "bottom",
			                    esc_html__("Left","kaswara") => "left"
			                ),
			                "group" => "Margins"
			            ),




			        )
			    )); 	
			}
		}	

		function kaswara_iconbundle_shortcode($atts,$content = null){				
			extract(shortcode_atts(array(	
				'ib_layout' => 'line',
				'ib_align'	=>'left'					
		 	), $atts));
			$outPut =  '<div class="kswr-iconbundle-container kswr-theelement" data-layout="'.esc_attr($ib_layout).'" data-align="'.esc_attr($ib_align).'" style="text-align:'.$ib_align.';">'.do_shortcode($content).'</div>';
			
			return $outPut;				
		}

		function kaswara_singleicon_child_shortcode($atts,$content = null){				
			extract(shortcode_atts(array(
				'siib_bgsize' 					=> 	'35',	
				'siib_border_radius'			=> 	'0',	
				'siib_effect'					=> 	'none',	
				'siib_rotation'					=> 'false',
				'siib_icon'						=> 	'',	
				'siib_iconsize' 				=> 	'18',	
				'siib_ic_color' 				=> 	'{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',	
				'siib_ic_color_hover'			=> 	'{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',	
				'siib_back' 					=> 	'{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',	
				'siib_back_hover'				=> 	'{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',	
				'siib_border'					=> 	'{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',	



				'siib_link' 					=> 	'',	
				'siib_openlink'					=> 	'_self',	
				'siib_style_default'			=> '1',	
				'siib_elem_margins'				=> '',							
		 	), $atts));
			$outPut = '';
			$iconSettings = array(
		 		'si_bgsize'				=> kswr_shortcode_attribute_value('si_bgsize',$siib_style_default, $siib_bgsize,'singleicon'),
				'si_border_radius'		=> kswr_shortcode_attribute_value('si_border_radius',$siib_style_default, $siib_border_radius,'singleicon'),
				'si_effect'				=> $siib_effect,
				'si_rotation'			=> $siib_rotation,
				'si_icon'				=> $siib_icon,
				'si_iconsize'			=> kswr_shortcode_attribute_value('si_iconsize',$siib_style_default, $siib_iconsize,'singleicon'),
				'si_ic_color'			=> kswr_shortcode_attribute_value('si_ic_color',$siib_style_default, $siib_ic_color,'singleicon'),
				'si_ic_color_hover'		=> kswr_shortcode_attribute_value('si_ic_color_hover',$siib_style_default, $siib_ic_color_hover,'singleicon'),
				'si_back'				=> kswr_shortcode_attribute_value('si_back',$siib_style_default, $siib_back,'singleicon'),
				'si_back_hover'			=> kswr_shortcode_attribute_value('si_back_hover',$siib_style_default, $siib_back_hover,'singleicon'),
				'si_border'				=> kswr_shortcode_attribute_value('si_border',$siib_style_default, $siib_border,'singleicon'),
				'si_link'				=> $siib_link,
				'si_openlink'			=> $siib_openlink
		 	);
			$outPut .= '<div class="kswr-singleicon-iconbundle kswr-theelement" style="'.$siib_elem_margins.';">'.kaswara_icon_element_output($iconSettings).'</div>'; 	
			return $outPut;				
		}



	
	}
}
if(class_exists('Kaswara_iconbundle')){
	$Kaswara_filter_images = new Kaswara_iconbundle;
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_kswr_iconbundle extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_kswr_singleicon_child extends WPBakeryShortCode {
    }
}


?>