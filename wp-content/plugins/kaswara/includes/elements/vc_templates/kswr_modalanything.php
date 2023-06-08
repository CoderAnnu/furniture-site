<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============       Modal Anything Shortcode       ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */


if(!class_exists('Kaswara_modalanything'))
{
	class Kaswara_modalanything
	{
		function __construct()
		{
			add_action('init',array($this,'kaswara_modalanything_init'));
			add_shortcode('kswr_modalanything',array($this,'kaswara_modalanything_shortcode'));			
		}
		
		function kaswara_modalanything_init(){
			if(function_exists('vc_map')){				
				vc_map(
					array(
						"name" => esc_html__("Modal Anything","kaswara"),
 				       'icon' => KASWARA_IMAGES.'small/modal-any.jpg',  
						"base" => "kswr_modalanything",
				        "description" => esc_html__("Modal Window tha can contain any element.", "kaswara"),         						
        				'as_parent' => array('except' => 'kswr_modalanything,kmsidebyside_element_container,kmsidebyside_left,kmsidebyside_right'),
						"class" => "",
      					"category" => "Kaswara",        
						"content_element" => true,
						"show_settings_on_create" => true,						
						"js_view" => 'VcColumnView',
						"params" => array(
							array(
					            "type" => "dropdown",
					            "heading" => esc_html__( 'Modal Trigger Type','kaswara'),
					            "param_name" => "mdlany_trigger_type",           
					            "value" => array(
					                esc_html__("Image",'kaswara') => 'image',
					                esc_html__("Button",'kaswara') => 'button',
					            ),         
					            "group" => "General",
					        ),
					        array(
					            "type" => "kswr_number",          
					            "heading" => esc_html__( "Modal Width", "kaswara" ),
					            "param_name" => "mdlany_modalw",					        
					            "value" => 750,
					            "group" => "General"     
					        ),

					        array(
					            "type" => "kswr_number",          
					            "heading" => esc_html__( "Modal Height", "kaswara" ),
					            "param_name" => "mdlany_modalh",					     
					            "value" => 550,
					            "group" => "General"     
					        ),     

					        array(
					            'type' => 'dropdown',
					            'heading' => esc_html__("Modal Window Effect",'kaswara'),
					            'param_name' => 'mdlany_effect',         
					            'value' => array(
					                esc_html__("Fade in / Scale",'kaswara') => 'km-effect-1',
					                esc_html__("Slide in (right)",'kaswara') => 'km-effect-2',
					                esc_html__("Slide in (bottom)",'kaswara') => 'km-effect-3',
					                esc_html__("Newspaper",'kaswara') => 'km-effect-4',
					                esc_html__("Fall",'kaswara') => 'km-effect-5',
					                esc_html__("Side Fall",'kaswara') => 'km-effect-6',
					                esc_html__("Sticky Up",'kaswara') => 'km-effect-7',
					                esc_html__("3D Flip (horizontal)",'kaswara') => 'km-effect-8',
					                esc_html__("3D Flip (vertical)",'kaswara') => 'km-effect-9',
					                esc_html__("3D Sign",'kaswara') => 'km-effect-10',
					                esc_html__("Super Scaled",'kaswara') => 'km-effect-11',
					                esc_html__("Just Me",'kaswara') => 'km-effect-12',
					                esc_html__("3D Slit",'kaswara') => 'km-effect-13',
					                esc_html__("3D Rotate Bottom",'kaswara') => 'km-effect-14',
					                esc_html__("3D Rotate In Left",'kaswara') => 'km-effect-15',
					                esc_html__("Blur",'kaswara') => 'km-effect-16'            
					            ),
					            "group" => "General"       
					        ), 

					        array(
					            "type" => "colorpicker",
					            "heading" => esc_html__( "Modal Background", "kaswara" ),
					            "param_name" => "mdlany_background",					    
					            "value" => '#fff', 
					            "group" => "General"     
					        ), 

					        array(
					            "type" => "colorpicker",
					            "heading" => esc_html__( "Overlay Background Color", "kaswara" ),
					            "param_name" => "mdlany_overlay_bg",					    
					            "value" => 'rgba(0,0,0,0.7)', 
					            "group" => "General"     
					        ), 
  
					        array(
					            "type" => "colorpicker",
					            "heading" => esc_html__( "Close Button Color", "kaswara" ),
					            "param_name" => "mdlany_close_color",					        
					            "value" => '#eee', 
					            "group" => "General"     
					        ), 
					        array(
					            "type" => "colorpicker",
					            "heading" => esc_html__( "Close Button Background", "kaswara" ),
					            "param_name" => "mdlany_close_bg",					        
					            "value" => '#111', 
					            "group" => "General"     
					        ), 
					        array(
				                "type" => "kswr_distance",
					            "group" => "General",     
				                "distance" => "padding",
				                "heading" => esc_html__( "Container Paddings", "kaswara" ),
				                "param_name" => "mdlany_paddings",
				                "defaults"=> array(
				                    "top" => "0px",
				                    "bottom" => "0px",
				                    "left" => "0px",
				                    "right" => "0px",
				                ),                
				                "positions" => array(
				                   esc_html__("Top","kaswara") => "top",
				                   esc_html__("Bottom","kaswara") => "bottom",
				                   esc_html__("Left","kaswara") => "left",
				                   esc_html__("Right","kaswara") => "right",
				                )
				            ),


					        array(
					            "type" => "attach_image",
					             "group" => "Image Trigger", 
					            "heading" => esc_html__( "Picture", "kaswara" ),
					            "param_name" => "mdlany_tgr_image"
					        ),
					        array(
					            "type" => "dropdown", 
					             "group" => "Image Trigger",            
					            "heading" => esc_html__("Alignement ", "kaswara"),
					            "param_name" => "mdlany_tgr_imagealign",
					            "value" => array(
					                esc_html__("Left","kaswara") => 'left',
					                esc_html__("Center","kaswara") => 'center',
					                esc_html__("Right","kaswara") => 'right',
					            )
					        ),
					        array(
					            "type" => "kswr_number",          
					            "heading" => esc_html__( "Image Width", "kaswara" ),
					            "param_name" => "mdlany_tgr_imagew",            
					            "group" => "Image Trigger"     
					        ),  
					        array(
					            "type" => "kswr_number",          
					            "heading" => esc_html__( "Image Height", "kaswara" ),
					            "param_name" => "mdlany_tgr_imageh",            
					            "group" => "Image Trigger"     
					        ),  

					        array(
					            "type" => "kswr_distance",
					            "distance" => "margin",
					            "heading" => "Image Margins",
					            "param_name" => "mdlany_tgr_imagemargin",
					            'group' => 'Image Trigger',
					            "positions" => array(
					               esc_html__("Top","kaswara") => "top",
					               esc_html__("Bottom","kaswara") => "bottom",
					            )
					        ),   

					            
					         /*------------------------------------
					            Button Trigger -----------------------
					        ------------------------------------*/
					        array(
					            "type" => "textfield",
					            "heading" => esc_html__( "Button Text", "kaswara" ),
					            "admin_label" => true,
					            "param_name" => "mdlany_btn_txt",
					            "group" => "Button Trigger"   
					        ),
					        array(
					            "type" => "dropdown",
					             "heading" => esc_html__( 'Button Layout','kaswara'),
					             "param_name" => "mdlany_btn_layout",           
					             "value" => array(
					                esc_html__('No Icon','kaswara') => 'noicon',
					                esc_html__('With Icon','kaswara') => 'withicon',
					                esc_html__('Just Icon','kaswara') => 'justicon',
					            ),         
					            "group" => "Button Trigger",
					        ),
					        array(
					            "type" => "dropdown",
					             "heading" => esc_html__( 'Button Hover Style','kaswara'),
					             "param_name" => "mdlany_btn_style",           
					             "value" => array(
                					esc_html__('None','kaswara') => 'none',
					                esc_html__('Fade','kaswara') => 'qaswara',
					                esc_html__('Push Left','kaswara') => 'pushleft',
					                esc_html__('Push Right','kaswara') => 'pushright',
					                esc_html__('Push Top','kaswara') => 'pushtop',
					                esc_html__('Push Bottom','kaswara') => 'pushbottom',
					                esc_html__('Fill Left','kaswara') => 'fillleft',
					                esc_html__('Fill Right','kaswara') => 'fillright',
					                esc_html__('Fill Top','kaswara') => 'filltop',
					                esc_html__('Fill Bottom','kaswara') => 'fillbottom',
					                esc_html__('Scale Down','kaswara') => 'scaledown',
					                esc_html__('Scale Up','kaswara') => 'scaleup',
					                esc_html__('Rotate Left','kaswara') => 'rotateleft',
					                esc_html__('Rotate Right','kaswara') => 'rotateright',
					                esc_html__('Rotate Bottom','kaswara') => 'rotatebottom',
					                esc_html__('Rotate Top','kaswara') => 'rotatetop',        
					            ),         
					            "group" => "Button Trigger",
					        ),

					        array(
					            "type" => "dropdown",
					             "heading" => esc_html__( 'Button Hover Action','kaswara'),
					             "param_name" => "mdlany_btn_hover_action",           
					             "value" => array(
					                esc_html__('None','kaswara') => 'none',
					                esc_html__('Zoom in','kaswara') => 'scaleup',
					                esc_html__('Zoom Out','kaswara') => 'scaledown',
					            ),         
					            "group" => "Button Trigger",
					        ),
					        array(
					            "type" => "kswr_iconchooser",
					            "class" => "",
					            "heading" =>esc_html__("Select Icon","kaswara"),
					            "description" =>esc_html__("Only if Icon Enbaled","kaswara"),
					            "param_name" => "mdlany_btn_icon",
					            "value" => "",
					            "group" => "Button Trigger",
					        ),

					        array(
					            "type" => "kswr_message",
					            "group" => "Button Trigger", 
					            "title" => esc_html__( "Button Trigger Styling", "kaswara" ),
					            "param_name" => "mdlany_btn_default_sections",
					            "mtop" => "10px"
					         ),
					        array(
					            "type" => "kswr_switcher",
					            "group" => "Button Trigger", 
					            "heading" => esc_html__( "Use Default Styling", "kaswara" ),
					            "param_name" => "mdlany_btn_default_style",
					            'default' => '1',
					            'on' => array('text' => 'ON','val' => '1' ),
					            'off'=> array('text' => 'OFF','val' => '0') 
					        ),
					       
					        array(
					            "type" => "kswr_switcher",
					            "group" => "Button Trigger", 
					            "heading" => esc_html__( "Enable Full Width Button", "kaswara" ),
					            "param_name" => "mdlany_btn_full_width",
					            'default' => 'false',
					            'on' => array('text' => 'ON','val' => 'true' ),
					            'off'=> array('text' => 'OFF','val' => 'false') 
					        ),
					        array(
					            "type" => "kswr_number",
					            "value" => 250,
					            "group" => "Button Trigger", 
					            "max" => 1200,
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),        
					            "heading" => esc_html__( "Button Width (px)", "kaswara" ),
					            "param_name" => "mdlany_btn_width"
					        ),
					        array(
					            "type" => "kswr_number",
					            "value" => 50,
					            "group" => "Button Trigger", 
					            "max" => 1200,
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),        
					            "heading" => esc_html__( "Button Height (px)", "kaswara" ),
					            "param_name" => "mdlany_btn_height"
					        ),
					        array(
					            "type" => "kswr_number",
					            "value" => 0,
					            "group" => "Button Trigger", 
					            "max" => 500,
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),        
					            "heading" => esc_html__( "Border Radius (px)", "kaswara" ),
					            "param_name" => "mdlany_btn_border_radius"
					        ),

					        array(
					            "type" => "kswr_gradient",
					            "group" => "Button Trigger",            
					            "value" => '{"type":"color", "color1":"#111", "color2":"#111", "direction":"to left"}',
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),                    
					            "heading" => esc_html__( "Background Color", "kaswara" ),
					            "param_name" => "mdlany_btn_bg"
					        ),
					        array(
					            "type" => "kswr_gradient",
					            "group" => "Button Trigger",            
					            "value" => '{"type":"color", "color1":"#00AFD1", "color2":"#00AFD1", "direction":"to left"}',
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),                    
					            "heading" => esc_html__( "Hover Background Color", "kaswara" ),
					            "param_name" => "mdlany_btn_bg_hover"
					        ),

					        array(
					            "type" => "kswr_gradient",
					            "group" => "Button Trigger",            
					            "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),                    
					            "heading" => esc_html__( "Text Color", "kaswara" ),
					            "param_name" => "mdlany_btn_clr"
					        ),
					        array(
					            "type" => "kswr_gradient",
					            "group" => "Button Trigger",            
					            "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),                    
					            "heading" => esc_html__( "Hover Text Color", "kaswara" ),
					            "param_name" => "mdlany_btn_clr_hover"
					        ),
					         array(
					            "type" => "kswr_distance",
					            "distance" => "margin",            
					            "param_name" => "mdlany_btn_margins",
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),                    
					            "heading" => esc_html__( "Button Margins", "kaswara" ),
					            "positions" => array(
					                esc_html__("Top","kaswara") => "top",
					                esc_html__("Bottom","kaswara") => "bottom"
					            ),
					            "group" => "Button Trigger"
					        ),
					        array(
					            "type" => "kswr_distance",
					            "distance" => "padding",            
					            "param_name" => "mdlany_btn_paddings",
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),                    
					            "heading" => esc_html__( "Button Paddings", "kaswara" ),
					            "positions" => array(
					                esc_html__("Left","kaswara") => "left",
					                esc_html__("Right","kaswara") => "right"
					            ),
					            "group" => "Button Trigger"
					        ),

					        array(
					            "type" => "dropdown",
					            "heading" => esc_html__( 'Button Alignement','kaswara'),
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),                    
					            "param_name" => "mdlany_btn_align",           
					            "value" => array(
					                "Left" => "left",
					                "Center" => "center",
					                "Right" => "right",
					            ),         
					            "group" => "Button Trigger",
					        ),

					        array(
					            "type" => "kswr_message",
					            "group" => "Button Trigger", 
					            "title" => esc_html__( "Font Settings", "kaswara" ),
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),                                
					            "param_name" => "mdlany_btn_font_sections",
					            "mtop" => "10px"
					         ),
					         array(
					            "type" => "kswr_fontsize",
					            "param_name" => "mdlany_btn_ftsize",
					            "group" => "Button Trigger",                 
					            "heading" => esc_html__( "Font Size", "kaswara" ),
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),                               
					            "defaults"=> array("font-size" => "15px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
					               esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
					               esc_html__("Phone Font Size","kaswara") => "--phone-font-size",                
					            )
					        ), 

					         array(
					            "type" => "kswr_fontstyle",
					            "param_name" => "mdlany_btn_ftstyle",
					            "heading" => esc_html__( "Font Style", "kaswara" ),       
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),                                  
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
					            "group" => "Button Trigger"
					        ),

					         array(
					            "type" => "kswr_message",
					            "group" => "Button Trigger", 
					            "title" => esc_html__( "Border Settings", "kaswara" ),
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),                                
					            "param_name" => "mdlany_btn_border_sections",
					            "mtop" => "10px"
					         ),
					         array(
					            "type" => "kswr_border",
					            'bordergradient' => 'enable',
					            "group" => "Button Trigger", 
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),        
					            "heading" => esc_html__( "Border Styling", "kaswara" ),
					            "param_name" => "mdlany_btn_bdr"
					        ),
					         array(
					            "type" => "kswr_border",
					            'bordergradient' => 'enable',
					            "group" => "Button Trigger", 
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),        
					            "heading" => esc_html__( "Border Styling onHover", "kaswara" ),
					            "param_name" => "mdlany_btn_bdr_hover"
					        ),
					        

					        array(
					            "type" => "kswr_message",
					            "group" => "Button Trigger", 
					            "title" => esc_html__( "Icon Settings", "kaswara" ),
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),                                
					            "param_name" => "mdlany_btn_icon_sections",
					            "mtop" => "10px"
					         ), 
					        array(
					            "type" => "dropdown",
					            "heading" => esc_html__( 'Icon Position','kaswara'),
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),                    
					            "param_name" => "mdlany_btn_icon_position",           
					            "value" => array(
					                "Left" => "left",             
					                "Right" => "right",
					            ),         
					            "group" => "Button Trigger",
					        ),
					        
					        array(
					            "type" => "kswr_number",
					            "value" => 26,
					            "group" => "Button Trigger", 
					            "max" => 500,
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),        
					            "heading" => esc_html__( "Icon Size (px)", "kaswara" ),
					            "param_name" => "mdlany_btn_icon_size"
					        ),

					        array(
					            "type" => "kswr_gradient",
					            "group" => "Button Trigger",            
					            "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),                    
					            "heading" => esc_html__( "Icon Color", "kaswara" ),
					            "param_name" => "mdlany_btn_icon_clr"
					        ),
					        array(
					            "type" => "kswr_gradient",
					            "group" => "Button Trigger",            
					            "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),                    
					            "heading" => esc_html__( "Hover Icon Color", "kaswara" ),
					            "param_name" => "mdlany_btn_icon_clr_hover"
					        ),
					        array(
					            "type" => "kswr_distance",
					            "distance" => "padding",            
					            "param_name" => "mdlany_btn_icon_paddings",
					            "dependency" => Array("element" => "mdlany_btn_default_style","value" => array("0")),                    
					            "heading" => esc_html__( "Icon Paddings", "kaswara" ),
					            "positions" => array(
					                esc_html__("Left","kaswara") => "left",
					                esc_html__("Right","kaswara") => "right"
					            ),
					            "group" => "Button Trigger"
					        ),
				            
						)
					)
				);

			
				
			}
		}	

		function kaswara_modalanything_shortcode($atts,$content = null){				
			//Modal Video Box Attributes
		 	extract(shortcode_atts(array(								
				'mdlany_effect'					=> 'km-effect-1',	
				'mdlany_background'				=> '#fff', 				 		
		 		'mdlany_overlay_bg'				=> 'rgba(0,0,0,0.7)',
		 		'mdlany_modal'					=> '',
		 		'mdlany_modalw'					=> '750',
		 		'mdlany_modalh'					=> '450',
		 		'mdlany_close_color'			=> '#eee',		 		
		 		'mdlany_close_bg'				=> '#111',
		 		'mdlany_tgr_image'				=> '',
		 		'mdlany_tgr_imagew'				=> '',
		 		'mdlany_tgr_imageh'				=> '',
		 		'mdlany_tgr_imagealign'			=> '',
		 		'mdlany_tgr_imagemargin'		=> '',
		 		'mdlany_paddings'				=> '',
		 		
		 		'mdlany_trigger_type'			=> 'image',
		 		//The Button Attributes
		 		//The Button Attributes 	
		 		'mdlany_btn_default_style'		=> '1',
		 		'mdlany_btn_full_width'			=> 'false',
		 		'mdlany_btn_width'				=> '250',
				'mdlany_btn_height'				=> '45',
				'mdlany_btn_border_radius'		=> '0',
				'mdlany_btn_align'				=> 'left',
				'mdlany_btn_margins'			=> 'margin-top:0px; margin-bottom:0px;',	
				'mdlany_btn_bg'					=> '{"type":"color", "color1":"#111", "color2":"#111", "direction":"to left"}',
				'mdlany_btn_bg_hover'			=> '{"type":"color", "color1":"#00AFD1", "color2":"#00AFD1", "direction":"to left"}',
				'mdlany_btn_clr'				=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
				'mdlany_btn_clr_hover'			=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
				'mdlany_btn_ftsize'				=> 'font-size:15px;line-height:;letter-spacing:;--tablet-font-size:;--phone-font-size:;',
				'mdlany_btn_ftstyle'			=> 'font-family:inherit;font-weight:inherit;font-style:inherit;',
				'mdlany_btn_style'				=> 'none',
				'mdlany_btn_layout'				=> 'noicon',
				'mdlany_btn_hover_action'		=> 'none',
				'mdlany_btn_paddings'			=> 'padding-top:0px; padding-bottom:0px;',
				'mdlany_btn_bdr'				=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
				'mdlany_btn_bdr_hover'			=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',	
				'mdlany_btn_txt'				=> '',
				'mdlany_btn_icon'				=> '',
				'mdlany_btn_icon_position'		=> 'left',
				'mdlany_btn_icon_clr'			=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
				'mdlany_btn_icon_clr_hover'		=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
				'mdlany_btn_icon_size'			=> '26',
				'mdlany_btn_icon_paddings'		=> 'padding-top:0px; padding-bottom:0px;',
		 	), $atts));
		 	$img_src = wp_get_attachment_image_src($mdlany_tgr_image,'full');
		 	$outPut = $trigger = '';
		 	//Auto Generated Id 
		 	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		 	$modal_id = substr(str_shuffle($chars),0,8);

		 	$trigger_style = 'height:'.$mdlany_tgr_imageh.'px; width:'.$mdlany_tgr_imagew.'px;'.$mdlany_tgr_imagemargin; 
		 	$closer_style = 'color:'.$mdlany_close_color.'; background:'.$mdlany_close_bg.';';

		 
			if($mdlany_trigger_type == 'image'){		
			 	$trigger = '<div class="km-modal-video-tgr-container" data-position="'.esc_attr($mdlany_tgr_imagealign).'"><div onclick="kswr_show_modalwindow(this);"  class="km-trigger km-modal-video-tgr"  data-modal="'.esc_attr($modal_id).'" style="'.$trigger_style.'"><img src="'.$img_src[0].'"/></div></div>';
			}

			if($mdlany_trigger_type == 'button'){		
				$btnSettings ='';
		  		$btnSettings = array(
		  				'btn_trigger'=> 'javascript','btn_trigger_action' => 'onclick="kswr_show_modalwindow(this);" data-modal="'.$modal_id.'" ','btn_txt' => $mdlany_btn_txt,'btn_icon' => $mdlany_btn_icon,
  						'btn_full_width' => $mdlany_btn_full_width,		  				
		  				'btn_width' => $mdlany_btn_width,'btn_height' => $mdlany_btn_height,
						'btn_bg' => $mdlany_btn_bg,'btn_border_radius' => $mdlany_btn_border_radius,
						'btn_align' => $mdlany_btn_align,'btn_margins' => $mdlany_btn_margins,
						'btn_bg_hover' => $mdlany_btn_bg_hover,'btn_clr' => $mdlany_btn_clr,
						'btn_clr_hover' => $mdlany_btn_clr_hover,'btn_ftsize' => $mdlany_btn_ftsize,'btn_ftstyle' => $mdlany_btn_ftstyle,
						'btn_style' => $mdlany_btn_style,'btn_layout' => $mdlany_btn_layout,
						'btn_hover_action' => $mdlany_btn_hover_action,'btn_paddings' => $mdlany_btn_paddings,
						'btn_bdr' => $mdlany_btn_bdr,
						'btn_bdr_hover' => $mdlany_btn_bdr_hover,			
						'btn_icon_position' => $mdlany_btn_icon_position,'btn_icon_clr' => $mdlany_btn_icon_clr,
						'btn_icon_clr_hover' => $mdlany_btn_icon_clr_hover,'btn_icon_size' => $mdlany_btn_icon_size,'btn_icon_paddings' => $mdlany_btn_icon_paddings
		  		);
		  		if($mdlany_btn_default_style == '1'){
		  			$btnSettings = array(
		  				'btn_trigger'=> 'javascript','btn_trigger_action' => 'onclick="kswr_show_modalwindow(this);" data-modal="'.$modal_id.'" ',
		  				'btn_txt' => $mdlany_btn_txt,
						'btn_icon' => $mdlany_btn_icon,
  						'btn_full_width' => $mdlany_btn_full_width,
		  				'btn_width' => kswr_shortcode_form_values_front('modalanything')['mdlany_btn_width'],
						'btn_height' => kswr_shortcode_form_values_front('modalanything')['mdlany_btn_height'],
						'btn_bg' => kswr_shortcode_form_values_front('modalanything')['mdlany_btn_bg'],
						'btn_border_radius' => kswr_shortcode_form_values_front('modalanything')['mdlany_btn_border_radius'],
						'btn_align' => kswr_shortcode_form_values_front('modalanything')['mdlany_btn_align'],
						'btn_margins' => kswr_shortcode_form_values_front('modalanything')['mdlany_btn_margins'],
						'btn_bg_hover' => kswr_shortcode_form_values_front('modalanything')['mdlany_btn_bg_hover'],
						'btn_clr' => kswr_shortcode_form_values_front('modalanything')['mdlany_btn_clr'],
						'btn_clr_hover' => kswr_shortcode_form_values_front('modalanything')['mdlany_btn_clr_hover'],
						'btn_ftsize' => kswr_shortcode_form_values_front('modalanything')['mdlany_btn_ftsize'],
						'btn_ftstyle' => kswr_shortcode_form_values_front('modalanything')['mdlany_btn_ftstyle'],
						'btn_style' => $mdlany_btn_style,
						'btn_layout' => $mdlany_btn_layout,
						'btn_hover_action' => $mdlany_btn_hover_action,
						'btn_paddings' => kswr_shortcode_form_values_front('modalanything')['mdlany_btn_paddings'],
						'btn_bdr' => kswr_shortcode_form_values_front('modalanything')['mdlany_btn_bdr'],			
						'btn_bdr_hover' => kswr_shortcode_form_values_front('modalanything')['mdlany_btn_bdr_hover'],
						'btn_icon_position' => kswr_shortcode_form_values_front('modalanything')['mdlany_btn_icon_position'],
						'btn_icon_clr' => kswr_shortcode_form_values_front('modalanything')['mdlany_btn_icon_clr'],
						'btn_icon_clr_hover' => kswr_shortcode_form_values_front('modalanything')['mdlany_btn_icon_clr_hover'],
						'btn_icon_size' => kswr_shortcode_form_values_front('modalanything')['mdlany_btn_icon_size'],
						'btn_icon_paddings' => kswr_shortcode_form_values_front('modalanything')['mdlany_btn_icon_paddings']
		  			);
		  		}

			 	$trigger = kaswara_btn_element_output($btnSettings);
			}

		 	$mdlany_style =  'min-height:'.$mdlany_modalh.'px; width:'.$mdlany_modalw.'px;';
			
		 	
		 	$outPut .= $trigger.'<div class="km-overlay" onclick="kswr_close_modalwindow(event);"  data-modal="'.esc_attr($modal_id).'" style="background-color:'.$mdlany_overlay_bg.';"><div class="km-modal-video-closer" style="'.$closer_style.'" onclick="kswr_close_modalwindow();">&#x2715;</div><div onclick="kswr_prevent_default(event)" class="km-modal km-modal-video '.$mdlany_effect.'" style="'.$mdlany_style.'" id="'.esc_attr($modal_id).'" ><div class="km-content" style=" background:'.$mdlany_background.';'.$mdlany_paddings.'" >'.do_shortcode($content).'</div></div></div>';

		 	
		 	//$trigger_classes = 'km-trigger km-modal-button';	
		 	
		 	return $outPut;
		 

		 
		}
	}
}
if(class_exists('Kaswara_modalanything')){
	$Kaswara_animation_block = new Kaswara_modalanything;
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_kswr_modalanything extends WPBakeryShortCodesContainer {
    }
}



?>