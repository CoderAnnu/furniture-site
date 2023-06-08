<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============       ICON   INFO   BOX   LIST       ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */


if(!class_exists('Kaswara_iconinfoboxlist'))
{
	class Kaswara_iconinfoboxlist
	{
		function __construct()
		{
			add_action('init',array($this,'kaswara_iconinfoboxlist_init'));
			add_shortcode('kswr_iconinfoboxlist',array($this,'kaswara_iconinfoboxlist_shortcode'));		
			add_shortcode('kswr_infoboxitem_child',array($this,'kaswara_infoboxitem_child_shortcode'));		
		}
		
		function kaswara_iconinfoboxlist_init(){
			if(function_exists('vc_map')){
				//VC map for bundle container
				vc_map(
					array(
						"name" => esc_html__("List Info Box","kaswara"),
						"base" => "kswr_iconinfoboxlist",
 				       'icon' => KASWARA_IMAGES.'small/infolist.jpg',  
						"class" => "",
      					"category" => "Kaswara",        
						"description" => esc_html__("List of icon info boxes.","kaswara"),
						"as_parent" => array('only' => 'kswr_infoboxitem_child'), 
						"content_element" => true,
						"show_settings_on_create" => true,						
						"js_view" => 'VcColumnView',
						"params" => array(
							array(
				                "type" => "kswr_switcher",
				                "heading" => esc_html__( "Use Default Styling", "kaswara" ),
				                "param_name" => "iibl_list_default",
				                'default' => '1',
				                'on' => array('text' => 'ON','val' => '1' ),
				                'off'=> array('text' => 'OFF','val' => '0') 
				            ), 
							array(
				                "type" => "dropdown",
				                 "heading" => esc_html__( 'Elements Alignment','kaswara'),
			                	"dependency" => Array("element" => "iibl_list_default","value" => array("0")),                               
				                 "param_name" => "iibl_align",   
				                 "default" => "left",        
				                 "value" => array(
				                    esc_html__('Left','kaswara') => 'left',               
				                    esc_html__('Right','kaswara') => 'right',               
				                ),         
				            ),
				            array(
				                "type" => "kswr_border",
			              		"dependency" => Array("element" => "iibl_list_default","value" => array("0")),                               				                
				                "heading" => esc_html__( "Connector Styling", "kaswara" ),         
				                "param_name" => "iibl_border_list"
				            ),		
				            array(
					            "type" => "kswr_number",
			               		"dependency" => Array("element" => "iibl_list_default","value" => array("0")),                               
					            "value" => 30,
					            "max" => 1200,
					            "heading" => esc_html__( "Maring BW Elements", "kaswara" ),
					            "param_name" => "iibl_margin"
					        ),
				            

						)
					)
				);

				//VC map for Icon		
				vc_map( array(
			        "name" => esc_html__( "Info Box Item", "kaswara" ),
			        "description" => esc_html__("Single info box item.", "kaswara"),         
 				    'icon' => KASWARA_IMAGES.'small/infobox.jpg',  
			        "category" => "Kaswara",        
			        "as_child" => array('only' => 'kswr_iconinfoboxlist'),
			        "base" => "kswr_infoboxitem_child",      
			        "params" => array( 			                 
			            //Content Section
			            #Title Settings
			            array(
			                "type" => "kswr_message",
			                "group" => "Content", 
			                "title" => esc_html__( "Content Settings", "kaswara" ),
			                "param_name" => "iibl_content_sections",
			                "mtop" => "10px"
			            ),
			            array(
			                "type" => "textfield",
			                "heading" => esc_html__( "Title Text", "kaswara" ),
			                "param_name" => "iibl_title",
			                "value" => '',
			                "group" => "Content"   
			            ),
			            array(
			                "type" => "colorpicker",
			                "group" => "Content",            
			                "value" => "#333",
			                "heading" => esc_html__( "Title Color", "kaswara" ),
			                "param_name" => "iibl_title_color"
			            ),
			            array(
			                "type" => "textfield",
			                "heading" => esc_html__( "Sub-Title Text", "kaswara" ),
			                "param_name" => "iibl_subtitle",
			                "value" => '',
			                "group" => "Content"   
			            ),
			            array(
			                "type" => "colorpicker",
			                "group" => "Content",            
			                "value" => "#777",
			                "heading" => esc_html__( "Sub-Title Color", "kaswara" ),
			                "param_name" => "iibl_subtitle_color"
			            ),
			            array(
			                "type" => "textarea_html",
			                "heading" => esc_html__( "Content", "kaswara" ),
			                "param_name" => "content",
			                "value" => "",           
			                "group" => "Content",
			                "edit_field_class" => "ult_hide_editor_fullscreen vc_col-xs-12 vc_column wpb_el_type_textarea_html vc_wrapper-param-type-textarea_html vc_shortcode-param",  
			            ),
			            array(
			                "type" => "colorpicker",
			                "group" => "Content",            
			                "value" => "#555",
			                "heading" => esc_html__( "Content Color", "kaswara" ),
			                "param_name" => "iibl_content_color"
			            ),			            
			            //Content Font Settings
			            array(
			                "type" => "kswr_message",
			                "group" => "Content", 
			                "title" => esc_html__( "Font Settings", "kaswara" ),
			                "param_name" => "iibl_font_sections",
			                "mtop" => "10px"
			            ),
			            array(
			                "type" => "kswr_switcher",
			                "group" => "Content", 
			                "heading" => esc_html__( "Use Default Font Styling", "kaswara" ),
			                "param_name" => "iibl_font_default",
			                'default' => '1',
			                'on' => array('text' => 'ON','val' => '1' ),
			                'off'=> array('text' => 'OFF','val' => '0') 
			            ), 
			            //Title
			            array(
			                "type" => "kswr_message",
			                "group" => "Content", 
			                "dependency" => Array("element" => "iibl_font_default","value" => array("0")),                               
			                "title" => esc_html__( "Title Font Settings", "kaswara" ),
			                "param_name" => "iibl_titlefont_sections",
			                "mtop" => "10px"
			            ),
			             array(
			                "type" => "kswr_fontsize",
			                "param_name" => "iibl_title_fsize",
			                "group" => "Content",                 
			                "heading" => esc_html__( "Font Size", "kaswara" ),
			                "dependency" => Array("element" => "iibl_font_default","value" => array("0")),                               
			                "defaults"=> array("font-size" => "16px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
			                "param_name" => "iibl_title_fstyle",
			                "heading" => esc_html__( "Font Style", "kaswara" ),       
			                "dependency" => Array("element" => "iibl_font_default","value" => array("0")),                                  
			                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
			                'elements'  => array(
			                   esc_html__("Font Family","kaswara") => "font-family",
			                   esc_html__("Font Weight","kaswara") => "font-weight",                
			                   esc_html__("Font Style","kaswara") => "font-style",
			                ),
			                "group" => "Content"
			            ),
			             //Subtitle
			             array(
			                "type" => "kswr_message",
			                "group" => "Content", 
			                "dependency" => Array("element" => "iibl_font_default","value" => array("0")),                               
			                "title" => esc_html__( "Sub-Title Font Settings", "kaswara" ),
			                "param_name" => "iibl_subtitlefont_sections",
			                "mtop" => "10px"
			            ),
			             array(
			                "type" => "kswr_fontsize",
			                "param_name" => "iibl_subtitle_fsize",
			                "group" => "Content",                 
			                "heading" => esc_html__( "Font Size", "kaswara" ),
			                "dependency" => Array("element" => "iibl_font_default","value" => array("0")),                               
			                "defaults"=> array("font-size" => "12px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
			                "param_name" => "iibl_subtitle_fstyle",
			                "heading" => esc_html__( "Font Style", "kaswara" ),       
			                "dependency" => Array("element" => "iibl_font_default","value" => array("0")),                                  
			                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
			                'elements'  => array(
			                   esc_html__("Font Family","kaswara") => "font-family",
			                   esc_html__("Font Weight","kaswara") => "font-weight",                
			                   esc_html__("Font Style","kaswara") => "font-style",
			                ),
			                "group" => "Content"
			            ),

			             //Content
			             array(
			                "type" => "kswr_message",
			                "group" => "Content", 
			                "dependency" => Array("element" => "iibl_font_default","value" => array("0")),                               
			                "title" => esc_html__( "Content Font Settings", "kaswara" ),
			                "param_name" => "iibl_contentfont_sections",
			                "mtop" => "10px"
			            ),
			             array(
			                "type" => "kswr_fontsize",
			                "param_name" => "iibl_content_fsize",
			                "group" => "Content",                 
			                "heading" => esc_html__( "Font Size", "kaswara" ),
			                "dependency" => Array("element" => "iibl_font_default","value" => array("0")),                               
			                "defaults"=> array("font-size" => "13px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
			                "param_name" => "iibl_content_fstyle",
			                "heading" => esc_html__( "Font Style", "kaswara" ),       
			                "dependency" => Array("element" => "iibl_font_default","value" => array("0")),                                  
			                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
			                'elements'  => array(
			                   esc_html__("Font Family","kaswara") => "font-family",
			                   esc_html__("Font Weight","kaswara") => "font-weight",                
			                   esc_html__("Font Style","kaswara") => "font-style",
			                ),
			                "group" => "Content"
			            ),


			            //Icon Section
			            array(
			                "type" => "kswr_switcher",
			                "group" => "Icon", 
			                "heading" => esc_html__( "Use Picture", "kaswara" ),
			                "param_name" => "iibl_image_enable",
			                'default' => '0',
			                'on' => array('text' => 'ON','val' => '1' ),
			                'off'=> array('text' => 'OFF','val' => '0') 
			            ), 
			            array(
			                "type" => "attach_image",
			                'group' => 'Icon',
			                "dependency" => Array("element" => "iibl_image_enable","value" => array('1')),            
			                "heading" => esc_html__( "Upload Image", "kaswara" ),
			                "param_name" => "iibl_image"
			            ),
			            array(
			                "type" => "kswr_number",
			                "heading" => esc_html__( "Picture Width", "kaswara" ),
			                "param_name" => "iibl_image_width",
			                "dependency" => Array("element" => "iibl_image_enable","value" => array('1')),            
			                "value" => 35,
			                "group" => 'Icon' 
			             ),
			             array(
			                "type" => "kswr_number",
			                "heading" => esc_html__( "Picture Height", "kaswara" ),
			                "param_name" => "iibl_image_height",
			                "dependency" => Array("element" => "iibl_image_enable","value" => array('1')),            
			                "value" => 35,
			                "group" => 'Icon' 
             ),
			            array(
			                "type" => "kswr_iconchooser",
			                "class" => "",
			                "heading" =>esc_html__("Select Icon","kaswara"),
			                "description" =>esc_html__("Choose Your Icon","kaswara"),
			                "dependency" => Array("element" => "iibl_image_enable","value" => array('0')),            
			                "param_name" => "iibl_icon",
			                "value" => "",
			                "group" => "Icon",
			            ),                             
			            array(
			                "type" => "dropdown",
			                "dependency" => Array("element" => "iibl_image_enable","value" => array('0')),            
			                 "heading" => esc_html__( 'Icon Hover Effect','kaswara'),
			                 "param_name" => "iibl_effect",           
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
			                "group" => "Icon",
			            ),
			             array(
			                "type" => "kswr_switcher",
			                "group" => "Icon", 
			                "dependency" => Array("element" => "iibl_image_enable","value" => array('0')),            
			                "heading" => esc_html__( "Magic Rotation", "kaswara" ),
			                "description" => esc_html__( "Only if border radius 0", "kaswara" ),
			                "param_name" => "iibl_rotation",
			                'default' => 'false',
			                'on' => array('text' => 'ON','val' => 'true' ),
			                'off'=> array('text' => 'OFF','val' => 'false') 
			            ),
			             //
			             array(
			                "type" => "kswr_message",
			                "group" => "Icon", 
			                "dependency" => Array("element" => "iibl_image_enable","value" => array('0')),            
			                "title" => esc_html__( "Icon Styling Styling", "kaswara" ),
			                "param_name" => "iibl_style_default_sections",
			                "mtop" => "10px"
			             ),
			            array(
			                "type" => "kswr_switcher",
			                "group" => "Icon", 
			                "dependency" => Array("element" => "iibl_image_enable","value" => array('0')),            
			                "heading" => esc_html__( "Use Default Icon Settings", "kaswara" ),
			                "param_name" => "iibl_style_default",
			                'default' => '1',
			                'on' => array('text' => 'ON','val' => '1' ),
			                'off'=> array('text' => 'OFF','val' => '0') 
			            ),           
			            array(
			                "type" => "kswr_number",
			                "value" => 18,
			                "group" => "Icon", 
			                "max" => 1200,
			                "dependency" => Array("element" => "iibl_style_default","value" => array("0")),        
			                "heading" => esc_html__( "Icon Size", "kaswara" ),
			                "param_name" => "iibl_iconsize"
			            ),
			            array(
			                "type" => "kswr_number",
			                "value" => 25,
			                "group" => "Icon", 
			                "max" => 2200,
			                "dependency" => Array("element" => "iibl_style_default","value" => array("0")),        
			                "heading" => esc_html__( "Icon Background Size", "kaswara" ),
			                "param_name" => "iibl_bgsize"
			            ),
			            array(
			                "type" => "kswr_number",
			                "value" => 0,
			                "group" => "Icon", 
			                "max" => 500,
			                "dependency" => Array("element" => "iibl_style_default","value" => array("0")),        
			                "heading" => esc_html__( "Icon Border Radius", "kaswara" ),
			                "param_name" => "iibl_border_radius"
			            ),

			            array(
			                "type" => "kswr_gradient",
			                "group" => "Icon",            
			                "value" => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
			                "dependency" => Array("element" => "iibl_style_default","value" => array("0")),                    
			                "heading" => esc_html__( "Icon Color", "kaswara" ),
			                "param_name" => "iibl_ic_color"
			            ),
			            array(
			                "type" => "kswr_gradient",
			                "group" => "Icon",            
			                "value" => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
			                "dependency" => Array("element" => "iibl_style_default","value" => array("0")),                    
			                "heading" => esc_html__( "Icon Color onHover", "kaswara" ),
			                "param_name" => "iibl_ic_color_hover"
			            ),
			            array(
			                "type" => "kswr_gradient",
			                "group" => "Icon",            
			                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
			                "dependency" => Array("element" => "iibl_style_default","value" => array("0")),                    
			                "heading" => esc_html__( "Icon Background", "kaswara" ),
			                "param_name" => "iibl_back"
			            ),
			            array(
			                "type" => "kswr_gradient",
			                "group" => "Icon",            
			                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
			                "dependency" => Array("element" => "iibl_style_default","value" => array("0")),                    
			                "heading" => esc_html__( "Icon Background onHover", "kaswara" ),
			                "param_name" => "iibl_back_hover"
			            ),
			            array(
							'bordergradient' => 'enable',
			                "type" => "kswr_border",
			                "heading" => esc_html__( "Border Styling", "kaswara" ),         
			                "dependency" => Array("element" => "iibl_style_default","value" => array("0")),                    
			                "group" => "Icon",                 
			                "param_name" => "iibl_border"
			             ),

			            //Margins			          
			            array(
			                "type" => "kswr_distance",
			                "distance" => "margin",            
			                "param_name" => "iibl_icon_margins",
			                "heading" => esc_html__( "Icon Margins", "kaswara" ),
			                "positions" => array(
			                    esc_html__("Top","kaswara") => "top",
			                    esc_html__("Bottom","kaswara") => "bottom"
			                ),
			                "group" => "Margins"
			            ),
			            array(
			                "type" => "kswr_distance",
			                "distance" => "margin",            
			                "param_name" => "iibl_title_margins",
			                "heading" => esc_html__( "Title Margins", "kaswara" ),
			                "positions" => array(
			                    esc_html__("Top","kaswara") => "top",
			                    esc_html__("Left","kaswara") => "left",
			                    esc_html__("Right","kaswara") => "right",
			                    esc_html__("Bottom","kaswara") => "bottom"
			                ),
			                "group" => "Margins"
			            ),
			            array(
			                "type" => "kswr_distance",
			                "distance" => "margin",            
			                "param_name" => "iibl_subtitle_margins",
			                "heading" => esc_html__( "Sub-Title Margins", "kaswara" ),
			                "positions" => array(
			                    esc_html__("Top","kaswara") => "top",
			                    esc_html__("Left","kaswara") => "left",
			                    esc_html__("Right","kaswara") => "right",
			                    esc_html__("Bottom","kaswara") => "bottom"
			                ),
			                "group" => "Margins"
			            ),
			            array(
			                "type" => "kswr_distance",
			                "distance" => "margin",            
			                "param_name" => "iibl_content_margins",
			                "heading" => esc_html__( "Content Margins", "kaswara" ),
			                "positions" => array(
			                    esc_html__("Top","kaswara") => "top",
			                    esc_html__("Left","kaswara") => "left",
			                    esc_html__("Right","kaswara") => "right",
			                    esc_html__("Bottom","kaswara") => "bottom"
			                ),
			                "group" => "Margins"
			            ),                       
			        )
			    )); 	
			}
		}	

		function kaswara_iconinfoboxlist_shortcode($atts,$content = null){				
			extract(shortcode_atts(array(	
				'iibl_list_default'	=> '1',
				'iibl_align' 		=> 'left',
				'iibl_margin' 		=> '20',
				'iibl_border_list' 		=> '1px dotted #aaa'				
		 	), $atts));
		 	$iibl_align = kswr_shortcode_attribute_value('iibl_align',$iibl_list_default, $iibl_align,'infolist');
		 	$iibl_margin = kswr_shortcode_attribute_value('iibl_margin',$iibl_list_default, $iibl_margin,'infolist');
		 	$iibl_border_list = kswr_shortcode_attribute_value('iibl_border_list',$iibl_list_default, $iibl_border_list,'infolist');

			$outPut =  '<div class="iibl-list-container" data-align="'.esc_attr($iibl_align).'" style="--margin-bottom:'.$iibl_margin.'px; '.kswr_gradient_border_maker($iibl_border_list,'--border-style').'">'.do_shortcode($content).'</div>';			
			return $outPut;				
		}

		function kaswara_infoboxitem_child_shortcode($atts,$content = null){				
			extract(shortcode_atts(array(
				//Icon Attributes
				'iibl_style_default'		=> '1',
				'iibl_bgsize' 				=> '35',	
				'iibl_border_radius'		=> '0',	
				'iibl_effect'				=> 'none',	
				'iibl_rotation'				=> 	'false',	
				'iibl_icon'					=> '',	
				'iibl_iconsize' 			=> '18',	
				
				'iibl_ic_color' 			=> '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',	
				'iibl_ic_color_hover'		=> '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',	
				'iibl_back' 				=> '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',	
				'iibl_back_hover'			=> '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',	
				'iibl_border'				=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',

				//Text and Fonts		
				'iibl_font_default'			=> '1',	
				//Title
				'iibl_title'				=> '',	
				'iibl_title_fsize'			=> '',	
				'iibl_title_fstyle'			=> '',	
				'iibl_title_color'			=> '',	
				//SubTitle
				'iibl_subtitle'				=> '',	
				'iibl_subtitle_fsize'		=> '',	
				'iibl_subtitle_fstyle'		=> '',	
				'iibl_subtitle_color'		=> '',	
				//Content
				'iibl_content_fsize'		=> '',	
				'iibl_content_fstyle'		=> '',	
				'iibl_content_color'		=> '',	
				//Elements Marings		
				'iibl_icon_margins'			=> '',					
				'iibl_title_margins'		=> '',	
				'iibl_subtitle_margins'		=> '',	
				'iibl_content_margins'		=> '',	
				//Check if image is enable
				'iibl_image_enable'			=> 	'0',	
				'iibl_image'				=> 	'0',	
				'iibl_image_width'			=> 	'35',	
				'iibl_image_height'			=> 	'35',	
		 	), $atts));
			$outPut = '';
			$outPut = $iconArea = $iconSettings  = $titleStyle = $subTitleStyle = $contentStyle = '';
		 	
		 	//Title Setyling
		 	$iibl_title_fsize = kswr_shortcode_attribute_value('iibl_title_fsize',$iibl_font_default, $iibl_title_fsize,'infolist');
			$iibl_title_fstyle = kswr_shortcode_attribute_value('iibl_title_fstyle',$iibl_font_default, $iibl_title_fstyle,'infolist');
			$titleStyle = $iibl_title_fsize .' '. $iibl_title_fstyle. ' color:'. $iibl_title_color.';'.$iibl_title_margins;
			//SubTitle Setyling
		 	$iibl_subtitle_fsize = kswr_shortcode_attribute_value('iibl_subtitle_fsize',$iibl_font_default, $iibl_subtitle_fsize,'infolist');
			$iibl_subtitle_fstyle = kswr_shortcode_attribute_value('iibl_subtitle_fstyle',$iibl_font_default, $iibl_subtitle_fstyle,'infolist');
			$subTitleStyle = $iibl_subtitle_fsize .' '. $iibl_subtitle_fstyle. ' color:'. $iibl_subtitle_color.';'.$iibl_subtitle_margins;
			//Content Setyling
		 	$iibl_content_fsize = kswr_shortcode_attribute_value('iibl_content_fsize',$iibl_font_default, $iibl_content_fsize,'infolist');
			$iibl_content_fstyle = kswr_shortcode_attribute_value('iibl_content_fstyle',$iibl_font_default, $iibl_content_fstyle,'infolist');
			$contentStyle = $iibl_content_fsize .' '. $iibl_content_fstyle. ' color:'. $iibl_content_color.';'.$iibl_content_margins;

			kswr_load_the_font_front($iibl_title_fstyle);
			kswr_load_the_font_front($iibl_subtitle_fstyle);
			kswr_load_the_font_front($iibl_content_fstyle);

$additional_title_fstyle = $additional_subtitle_fstyle = $additional_content_fstyle = ''; 

fix_kaswara_font_styles($iibl_title_fstyle, $additional_title_fstyle);
fix_kaswara_font_styles($iibl_subtitle_fstyle, $additional_subtitle_fstyle);
fix_kaswara_font_styles($iibl_content_fstyle, $additional_content_fstyle);

			$iibl_bgsize = kswr_shortcode_attribute_value('iibl_bgsize',$iibl_style_default, $iibl_bgsize,'infolist');
		 	$iconSettings = array(
		 		'si_bgsize'				=> $iibl_bgsize,
				'si_border_radius'		=> kswr_shortcode_attribute_value('iibl_border_radius',$iibl_style_default, $iibl_border_radius,'infolist'),
				'si_effect'				=> $iibl_effect,
				'si_rotation'			=> $iibl_rotation,
				'si_icon'				=> $iibl_icon,
				'si_iconsize'			=> kswr_shortcode_attribute_value('iibl_iconsize',$iibl_style_default, $iibl_iconsize,'infolist'),
				'si_ic_color'			=> kswr_shortcode_attribute_value('iibl_ic_color',$iibl_style_default, $iibl_ic_color,'infolist'),
				'si_ic_color_hover'		=> kswr_shortcode_attribute_value('iibl_ic_color_hover',$iibl_style_default, $iibl_ic_color_hover,'infolist'),
				'si_back'				=> kswr_shortcode_attribute_value('iibl_back',$iibl_style_default, $iibl_back,'infolist'),
				'si_back_hover'			=> kswr_shortcode_attribute_value('iibl_back_hover',$iibl_style_default, $iibl_back_hover,'infolist'),
				'si_border'				=> kswr_shortcode_attribute_value('iibl_border',$iibl_style_default, $iibl_border,'infolist'),
				'si_link'				=> '',
				'si_openlink'			=> ''
		 	);
		 	$iconArea = kaswara_icon_element_output($iconSettings);
		 	 $bgsize= $iibl_bgsize;
		 	if(trim($iibl_image_enable) == '1'){
				$img_src = wp_get_attachment_image_src($iibl_image,'full');
				$iconArea = '<img src="'.esc_url($img_src[0]).'" style="width:'.$iibl_image_width.'px; height:'.$iibl_image_height.'px;">';	
				$bgsize	= $iibl_image_width;
		 	}
		 	
		 	$outPut .= '<div class="kswr-iibl-container kswr-icon-thatc kswr-theelement" data-hover="'.esc_attr($iibl_effect).'" style="--icon-bgsize:'.$bgsize.'px;" ><div class="kswr-iibl-icon-ct" style="'.$iibl_icon_margins.'">'.$iconArea.'</div><div class="kswr-iibl-ct-leftright">' ;
		 	
		 	$outPut .= '<div class="kswr-iibl-title-ct"><div class="kswr-iibl-title kswr-shortcode-element ' .$additional_title_fstyle. ' " data-fontsettings="'.esc_attr($iibl_title_fsize).'" style="'.$titleStyle.'">'.$iibl_title.'</div><div class="kswr-iibl-subtitle kswr-shortcode-element ' .$additional_subtitle_fstyle. ' " data-fontsettings="'.esc_attr($iibl_subtitle_fsize).'" style="'.$subTitleStyle.'">'.$iibl_subtitle.'</div></div><div class="kswr-iibl-bottom"><div class="kswr-iibl-content kswr-shortcode- ' .$additional_content_fstyle. ' " data-fontsettings="'.esc_attr($iibl_content_fsize).'" style="'.$contentStyle.'">'.do_shortcode($content).'</div></div>';

		
		 	$outPut .= '</div></div>' ;					
			return $outPut;			
		}



	
	}
}
if(class_exists('Kaswara_iconinfoboxlist')){
	$Kaswara_filter_images = new Kaswara_iconinfoboxlist;
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_kswr_iconinfoboxlist extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_kswr_infoboxitem_child extends WPBakeryShortCode {
    }
}


?>