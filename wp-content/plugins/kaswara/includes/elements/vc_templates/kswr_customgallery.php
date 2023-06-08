<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============       Custom Gallery Shortcode       ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */



if(!class_exists('Kaswara_customgallery')){
	class Kaswara_customgallery{
		function __construct(){
			add_action('init',array($this,'kaswara_customgallery_init'));
			add_shortcode('kswr_customgallery',array($this,'kaswara_customgallery_shortcode'));		
		}

		function kaswara_customgallery_init(){
			if(function_exists('vc_map')){
				//Gallery Container
				vc_map(
					array(
						"name" => esc_html__("Custom Gallery","kaswara"),
 				       'icon' => KASWARA_IMAGES.'small/customgallery.jpg',  
						"base" => "kswr_customgallery",
						"class" => "",
      					"category" => "Kaswara",        
						"description" => esc_html__("Modern images gallery with multiple layouts and effects","kaswara"),				
						"params" => array(			 											
				            array(
				                'type' => 'dropdown',
				                'heading' => esc_html__("Columns Number",'kaswara'),
				                'group' => 'General',
				                'param_name' => 'cusgall_columns_number',
				                'value' => array(                    
				                    esc_html__("3 Columns",'kaswara') => '3',
				                    esc_html__("1 Column",'kaswara')  => '1',
				                    esc_html__("2 Columns",'kaswara') => '2',
				                    esc_html__("4 Columns",'kaswara') => '4',
				                    esc_html__("5 Columns",'kaswara') => '5'
				                )            
				            ),	
				            array(
				                'type' => 'dropdown',
				                'heading' => esc_html__("Gallery Type",'kaswara'),
				                'group' => 'General',
				                'param_name' => 'cusgall_type',
				                'value' => array(                    
				                    esc_html__("Grid",'kaswara') => 'grid',
				                    esc_html__("Masonry",'kaswara') => 'masonry',
				                    esc_html__("Metro",'kaswara') => 'metro'
				                )            
				            ),	
				             array(
				                'type' => 'dropdown',
				                'heading' => esc_html__("Enable Gutter",'kaswara'),
				                'description' => esc_html__("Enable space between elements.",'kaswara'),
				                'group' => 'General',
				                'param_name' => 'cusgall_gutterenabled',
				                'value' => array(                    
				                    esc_html__("Yes, Please",'kaswara') => 'enabled',
				                    esc_html__("No",'kaswara') => 'disabled',				                    
				                )            
				            ),	
				            
				             array(
				                'type' => 'dropdown',
				                'heading' => esc_html__("Show Effect",'kaswara'),
				                'group' => 'General',
				                'param_name' => 'cusgall_showeffect',
				                'value' => array(                    
				                  		esc_html__('None','rahyass') =>'none',										
										'Fade' =>'fade',										
										'Fade Up' =>'fadeup',										
										'Fade Down' =>'fadedown',										
										'Fade Left' =>'fadeleft',										
										'Fade Right' =>'faderight',										
										'Zoom In' =>'zoomin',										
										'Zoom Out' =>'zoomout',										
										'Slide Up' =>'slideup',										
										'Slide Down' =>'slidedown',										
										'Slide Left' =>'slideleft',										
										'Slide Right' =>'slideright',										
										'Fall Perspective' =>'isotope_fallperspective',										
										'Fly' =>'isotope_fly',										
										'Flip' =>'isotope_flip',										
										'Popup' =>'isotope_popup',
				                )            
				            ),					            
				            //Filter Sctions
				            array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Enable Filter', 'kaswara' ),
				                'group' => 'Filter Section',
				                'param_name' => 'cusgall_filterenabled',
				                'value' => array(
				                    esc_html__('Yes Please','kaswara') => 'enabled',
				                    esc_html__('No','kaswara') => 'disabled',
				                )               
				            ),  
				            array(
				                "type" => "textfield",
				                "group" => "Filter Section", 
				                'dependency' => Array("element" => "cusgall_filterenabled","value" => array('enabled')),    
				                "heading" => esc_html__( "Categories", "kaswara" ),
				                "heading" => esc_html__( "Filter Categories separated with comma(,)", "kaswara" ),
				                "param_name" => "cusgall_categories"
				            ),				            				           
				            array(
				                'type' => 'dropdown',
				                'dependency' => Array("element" => "cusgall_filterenabled","value" => array('enabled')),    
				                'heading' => esc_html__( 'Filter Link Align', 'kaswara' ),
				                'group' => 'Filter Section',				                
				                'param_name' => 'cusgall_align',
				                'value' => array(
				                    esc_html__( 'Center','kaswara') => 'center',
				                    esc_html__( 'Left','kaswara') => 'left',
				                    esc_html__( 'Right','kaswara') => 'right',
				                )               
				            ),					      
						    array(
				                'type' => 'dropdown',
				                'dependency' => Array("element" => "cusgall_filterenabled","value" => array('enabled')),    
				                'heading' => esc_html__( 'Filter Style', 'kaswara' ),
				                'group' => 'Filter Section',
				                'param_name' => 'cusgall_style',
				                'value' => array(
				                    esc_html__( 'Style 3','kaswara') => 'style3',
				                    esc_html__( 'Style 1','kaswara') => 'style1',
				                    esc_html__( 'Style 2','kaswara') => 'style2',
				                    esc_html__( 'Style 4','kaswara') => 'style4',
				                    esc_html__( 'Style 5','kaswara') => 'style5',
				                )               
				            ),
				            
				            array(
						        "type" => "kswr_number",
				                'group' => 'Filter Section',
						        "value" => 13,
				                'dependency' => Array("element" => "cusgall_filterenabled","value" => array('enabled')),    
						        "heading" => esc_html__( "Link Font Size", "kaswara" ),						     
						        "param_name" => "cusgall_size"
						    ), 
						    array(
						        "type" => "kswr_number",
				                'group' => 'Filter Section',
						        "value" => 34,
				                'dependency' => Array("element" => "cusgall_filterenabled","value" => array('enabled')),    
						        "heading" => esc_html__( "Link Height", "kaswara" ),						     
						        "param_name" => "cusgall_height"
						    ), 

						    array(
						        "type" => "kswr_number",
				                'group' => 'Filter Section',
						        "value" => 0,
						        "min" => 0,
						        "max" => 3,
				                'dependency' => Array("element" => "cusgall_filterenabled","value" => array('enabled')),    
						        "heading" => esc_html__( "Font Spacing", "kaswara" ),						     
						        "param_name" => "cusgall_spacing"
						    ), 

						    array(
					            "type" => "colorpicker",
				                'group' => 'Filter Section',
				                'dependency' => Array("element" => "cusgall_filterenabled","value" => array('enabled')),    
					            "heading" => esc_html__( "Color", "kaswara" ),
					            "param_name" => "cusgall_color",
					            "value" => '#888', 
					        ),
					        array(
					            "type" => "colorpicker",
				                'group' => 'Filter Section',					            
				                'dependency' => Array("element" => "cusgall_filterenabled","value" => array('enabled')),    
					            "heading" => esc_html__( "Color onHover", "kaswara" ),
					            "param_name" => "cusgall_color_hover",
					            "value" => '#289fca', 
					        ),
					        array(
					            "type" => "colorpicker",
				                'group' => 'Filter Section',
				                'dependency' => Array("element" => "cusgall_filterenabled","value" => array('enabled')),    
					            "heading" => esc_html__( "Color Scheme", "kaswara" ),
					            "param_name" => "cusgall_scheme",
					            "value" => '#888', 
					        ),
					        array(
					            "type" => "colorpicker",
				                'group' => 'Filter Section',
				                'dependency' => Array("element" => "cusgall_filterenabled","value" => array('enabled')),    
					            "heading" => esc_html__( "Color Scheme onHover", "kaswara" ),
					            "param_name" => "cusgall_scheme_hover",
					            "value" => '#289fca', 
					        ),
							
						    array(
				                'type' => 'dropdown',
				                'group' => 'Filter Section',				                
				                'dependency' => Array("element" => "cusgall_filterenabled","value" => array('enabled')),    
				                'heading' => esc_html__( 'Font Weight', 'kaswara' ),
				                'group' => 'Filter Section',
				                'param_name' => 'cusgall_weight',
				                'value' => array(
				                    esc_html__( '500','kaswara') => '500',
				                    esc_html__( '300','kaswara') => '300',
				                    esc_html__( '400','kaswara') => '400',
				                    esc_html__( '600','kaswara') => '600',
				                    esc_html__( '700','kaswara') => '700',
				                )               
				            ),  
						    
						    array(
				                'type' => 'dropdown',
				                'group' => 'Filter Section',				                
				                'dependency' => Array("element" => "cusgall_filterenabled","value" => array('enabled')),    
				                'heading' => esc_html__( 'Font Style', 'kaswara' ),
				                'param_name' => 'cusgall_transform',
				                'value' => array(
				                    esc_html__( 'Uppercase','kaswara') => 'uppercase',
				                    esc_html__( 'Capitalize','kaswara') => 'capitalize',
				                    esc_html__( 'Lowercase','kaswara') => 'lowercase',
				                )               
				            ), 
				            array(
					            "type" => "kswr_distance",
					            "distance" => "margin",
				                'dependency' => Array("element" => "cusgall_filterenabled","value" => array('enabled')),    
					            "heading" => esc_html__( 'Filter Margins', 'kaswara' ),
					            "param_name" => "cusgall_margins",
					            "positions" => array(
					                esc_html__("Top","kaswara") => "top",
					                esc_html__("Bottom","kaswara") => "bottom"
					            ),
					            "group" => "Filter Section"
					        ),

				            //Single Modern Image Styling
				            array(
				           	    'type' => 'dropdown',
				                'heading' => esc_html__( 'Hover Style', 'kaswara' ),    
				                'group' => 'Image Styling',
				                'param_name' => 'cusgall_imagestyle',
				                'value' => array(
				                    esc_html__( 'Mercury','kaswara') => 'mercury',
				                    esc_html__( 'Venus','kaswara') => 'venus',
				                    esc_html__( 'Neptune','kaswara') => 'neptune',
				                    esc_html__( 'Uranus','kaswara') => 'uranus',
				                    esc_html__( 'Pluto','kaswara') => 'pluto',                   
				                )               
				            ),  	
				            array(
				                "type" => "kswr_fontsize",
				                "param_name" => "cusgall_titlefont",
				                "heading" => esc_html__( "Title Font Size", "kaswara" ),      
				                "group" => "Image Styling"  ,
				                "defaults"=> array("font-size" => "20px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
				                "param_name" => "cusgall_titlefontstyle",
				                "heading" => esc_html__( "Title Font Style", "kaswara" ),             
				                "defaults"=> array("font-family" => "Inherit", "font-weight" => "700", "font-style" => ""),
				                "group" => "Image Styling",
				                'elements'  => array(
				                   esc_html__("Font Family","kaswara") => "font-family",
				                   esc_html__("Font Weight","kaswara") => "font-weight",                
				                   esc_html__("Font Style","kaswara") => "font-style",
				                ),
				            ), 
				            array(
				                "type" => "colorpicker",
				                "heading" => esc_html__( "Title Color", "kaswara" ),
				                "param_name" => "cusgall_titlecolor",
				                "value" => '#fff',
				                "group" => "Image Styling" 
				            ),
				            array(
				                "type" => "kswr_number",
				                "heading" => esc_html__( "Title Padding", "kaswara" ),
				                "param_name" => "cusgall_titlepadding",              
				                "value" => 6,
				                "min" => 0,
				                "max" => 30,
				                "group" => "Image Styling" 
				             ), 
				            array(
				                "type" => "kswr_fontsize",
				                "param_name" => "cusgall_subtitlefont",
				                "heading" => esc_html__( "SubTitle Font Size", "kaswara" ),      
				                "group" => "Image Styling"  ,
				                "defaults"=> array("font-size" => "14px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
				                "param_name" => "cusgall_subtitlefontstyle",
				                "heading" => esc_html__( "SubTitle Font Style", "kaswara" ),             
				                "defaults"=> array("font-family" => "Inherit", "font-weight" => "400", "font-style" => ""),
				                "group" => "Image Styling",
				                'elements'  => array(
				                   esc_html__("Font Family","kaswara") => "font-family",
				                   esc_html__("Font Weight","kaswara") => "font-weight",                
				                   esc_html__("Font Style","kaswara") => "font-style",
				                ),
				            ), 
				            array(
				                "type" => "colorpicker",
				                "heading" => esc_html__( "SubTitle Color", "kaswara" ),
				                "param_name" => "cusgall_subtitlecolor",
				                "value" => '#ccc',
				                "group" => "Image Styling" 
				            ),
				            
				            //Styling
				            array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Content Show Effect', 'kaswara' ),
				                'group' => 'Image Styling',
				                'param_name' => 'cusgall_contentshoweffect',
				                'value' => array(
				                    esc_html__('Fade','kaswara') => 'fade' ,
				                    esc_html__('Slide Left','kaswara') => 'slideleft' ,
				                    esc_html__('Slide Top','kaswara') => 'slidetop' ,
				                    esc_html__('Slide Right','kaswara') => 'slideright' ,
				                    esc_html__('Slide Bottom','kaswara') => 'slidebottom' ,
				                    esc_html__('Zoom In','kaswara') => 'zoomin' ,
				                    esc_html__('Zoom Out','kaswara') => 'zoomout' ,
				                    esc_html__('Reveal Top','kaswara') => 'revealtop' ,
				                    esc_html__('Reveal Bottom','kaswara') => 'revealbottom' ,
				                    esc_html__('Pop Up','kaswara') => 'popup' ,

				                )               
				            ),
				            array(
				                "type" => "colorpicker",
				                "heading" => esc_html__( "Overlay Color", "kaswara" ),
				                "param_name" => "cusgall_overlaycolor",
				                "value" => 'rgba(0, 0, 0, 0.7)',
				                "group" => "Image Styling" 
				            ),
				            array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Overlay Show Effect', 'kaswara' ),
				                'group' => 'Image Styling',
				                'param_name' => 'cusgall_overlayshoweffect',
				                'value' => array(
				                    esc_html__('Fade','kaswara') => 'fade',
				                    esc_html__('Slide Left','kaswara') => 'slideleft',
				                    esc_html__('Slide Top','kaswara') => 'slidetop',
				                    esc_html__('Slide Right','kaswara') => 'slideright',
				                    esc_html__('Slide Bottom','kaswara') => 'slidebottom',
				                    esc_html__('Fade Left','kaswara') => 'fadeleft',
				                    esc_html__('Fade Right','kaswara') => 'faderight',
				                    esc_html__('Fade Top','kaswara') => 'fadetop',
				                    esc_html__('Fade Bottom','kaswara') => 'fadebottom',
				                    esc_html__('Zoom In','kaswara') => 'zoomin',
				                    esc_html__('Rotate Zoom','kaswara') => 'rotatezoom',
				                    //esc_html__('Follow Me','kaswara') => 'followme'
				                )               
				            ),     
				            array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Enable Frame', 'kaswara' ),
				                'group' => 'Image Styling',
				                'param_name' => 'cusgall_overlayframe',
				                'value' => array(
				                    esc_html__('No','kaswara') => 'disabled',
				                    esc_html__('Yes Please','kaswara') => 'enabled',
				                )               
				            ),       
				            array(
				                "type" => "colorpicker",
				                "heading" => esc_html__( "Color Scheme", "kaswara" ),
				                "param_name" => "cusgall_colorscheme",
				                "value" => '#fff',
				                "group" => "Image Styling" 
				            ),            
				            array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Enable Box Shadow onHover', 'kaswara' ),
				                'group' => 'Image Styling',
				                'param_name' => 'cusgall_boxshadow',
				                'value' => array(
				                    esc_html__('Yes Please','kaswara') => 'enabled',
				                    esc_html__('No','kaswara') => 'disabled',
				                )               
				            ),
				            array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( '3D hover Effect', 'kaswara' ),
				                'group' => 'Image Styling',
				                'param_name' => 'cusgall_3dhover',
				                'value' => array(
				                    esc_html__('No','kaswara') => 'disabled',
				                    esc_html__('Yes Please','kaswara') => 'enabled',
				                )               
				            ),
				            
				            array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Content Rown Position', 'kaswara' ),
				                'group' => 'Image Styling',
				                'dependency' => Array("element" => "cusgall_imagestyle","value" => array('mercury')),    
				                'param_name' => 'cusgall_rowposition',
				                'value' => array(
				                    esc_html__( 'Middle','kaswara') => 'middle',
				                    esc_html__( 'Top','kaswara') => 'top',
				                    esc_html__( 'Bottom','kaswara') => 'bottom',
				              
				                )               
				            ),
				            array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Content Column Position', 'kaswara' ),
				                'group' => 'Image Styling',
				                'param_name' => 'cusgall_columnposition',
				                'dependency' => Array("element" => "cusgall_imagestyle","value" => array('mercury')),    
				                'value' => array(
				                    esc_html__( 'Center','kaswara') => 'center',
				                    esc_html__( 'Left','kaswara') => 'left',
				                    esc_html__( 'Right','kaswara') => 'right',
				              
				                )               
				            ),
				            /*array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Image Effect', 'kaswara' ),
				                'group' => 'Image Styling',
				                'param_name' => 'cusgall_imageeffect',
				                'value' => array(
				                    esc_html__('None','kaswara') => 'none',
				                    esc_html__('Zoom In','kaswara') => 'zoomin',
				                    esc_html__('Zoom In Rotate','kaswara') => 'zoominrotate',
				                    esc_html__('Zoom Out','kaswara') => 'zoomout',
				                    esc_html__('Zoom Out Rotate','kaswara') => 'zoomoutrotate',
				                    esc_html__('Blur','kaswara') => 'blur',
				                    esc_html__('Zoom Blur','kaswara') => 'zoomblur',
				                    esc_html__('Zoom Follow','kaswara') => 'zoomfollow',
				                    esc_html__('Zoom Blur Follow','kaswara') => 'zoomblurfollow',

				                )               
				            ),*/  
				            //Content Image
				            array(
								'type'				=> 'param_group',
								'heading'			=> esc_html__('Images', 'kaswara'),
				                'group' 			=> 'Images',
								'param_name'		=> 'cusgall_images',							
								'params'			=> array(
									array(
						                "type" => "attach_image",
						                "heading" => esc_html__( "Background Image", "kaswara" ),
						                "param_name" => "cusgallmdim_image"
						            ),
						            array(
						                "type" => "vc_link",
						                "heading" => esc_html__( "Link", "kaswara" ),
						                "param_name" => "cusgallmdim_link",
						                "value" => '',
						            ),
									array(
						                "type" => "textfield",
						                "heading" => esc_html__( "Title", "kaswara" ),
						                "param_name" => "cusgallmdim_title",            
						            ),  
									array(
						                "type" => "textfield",
						                "heading" => esc_html__( "SubTitle", "kaswara" ),
						                "param_name" => "cusgallmdim_subtitle",            
						            ), 
								  	array(
						                "type" => "textfield",
						                "heading" => esc_html__( "Custom Classes", "kaswara" ),
						                "param_name" => "cusgallmdim_classes",            
						            ),
						            array(
						                'type' => 'dropdown',
						                'heading' => esc_html__( 'Image Masonry Size', 'kaswara' ),
						                "dependency" => Array("element" => "cusgall_type","value" => array("masonry")), 
						                'group' => 'Image Styling',
						                'param_name' => 'cusgallmdim_masonrysize',
						                'value' => array(
						                	'Extra Small' => 'kaswara-modernimage-masonryextrasmall',
											'Small' => 'kaswara-modernimage-masonrysmall',
											'Medium' => 'kaswara-modernimage-masonrymedium',
											'Tall' => 'kaswara-modernimage-masonrytall',
						                )               
						            ),
						            array(
						                'type' => 'dropdown',
						                'heading' => esc_html__( 'Image Metro Size', 'kaswara' ),
						                "dependency" => Array("element" => "cusgall_type","value" => array("metro")), 
						                'group' => 'Image Styling',
						                'param_name' => 'cusgallmdim_metrosize',
						                'value' => array(
						                	'Square' => 'kaswara-modernimage-metrosquare',
											'Wide' => 'kaswara-modernimage-metrowide',											
											'Tall' => 'kaswara-modernimage-metrotall',
						                )               
						            ),
						            
									

								)
							)


						)
					)
				);				
			}
		}
		
		function kaswara_customgallery_shortcode($atts,$content = null){								
			extract(shortcode_atts(array(	
				'cusgall_columns_number'		=> '3',							
				'cusgall_type'					=> 'grid',	
				'cusgall_showeffect'			=> 'none',
				'cusgall_gutterenabled'			=>	'enabled',
				//Filter
				'cusgall_filterenabled'			=>	'enabled',
				'cusgall_style'					=> 'style1',
				"cusgall_categories"			=> '',						
				"cusgall_size"					=> '13',				
				"cusgall_height"				=> '34',				
				"cusgall_color"					=> '#888',				
				"cusgall_color_hover"			=> '#289fca',				
				"cusgall_scheme"				=> '#888',				
				"cusgall_scheme_hover"			=> '#289fca',				
				"cusgall_transform"				=> 'uppercase',				
				"cusgall_weight"				=> '500',				
				"cusgall_spacing"				=> '1',				
				"cusgall_align"					=> 'center',
				"cusgall_margins"				=> '',	
				//Image Styling
				'cusgall_imagestyle'			=>	'mercury',
				'cusgall_titlefont'				=>	'font-size:20px;line-height:;letter-spacing:;--tablet-font-size:;--phone-font-size:;',
				'cusgall_titlefontstyle'		=>	'',
				'cusgall_titlecolor'			=>	'#fff',
				'cusgall_subtitlefont'			=>	'font-size:14px;line-height:;letter-spacing:;--tablet-font-size:;--phone-font-size:;',
				'cusgall_subtitlefontstyle'		=>	'',
				'cusgall_subtitlecolor'			=>	'#ccc',
				'cusgall_titlepadding'			=>	'6',
				'cusgall_contentshoweffect'		=>	'fade',
				'cusgall_overlaycolor'			=>	'rgba(0, 0, 0, 0.7)',
				'cusgall_overlayshoweffect'		=>	'fade',
				'cusgall_overlayframe'			=>	'disabled',
				'cusgall_colorscheme'			=>	'#fff',
				'cusgall_boxshadow'				=>	'enabled',
				'cusgall_3dhover'				=>	'disabled',
				'cusgall_imageeffect'			=>	'none',
				'cusgall_columnposition'		=>	'center',
				'cusgall_rowposition'			=>	'middle',
				'cusgall_bordersize'			=>	'medium',
				//Images 		
				'cusgall_images'				=>	'',
		 	), $atts));
			$outPut = $catsoutPut = $imagesOutput = $filterOutput =  '';
			$link_style = 'font-size:'.$cusgall_size.'px; color:'.$cusgall_color.'; text-transform:'.$cusgall_transform.'; font-weight:'.$cusgall_weight.'; letter-spacing:'.$cusgall_spacing.'px; --color-hover:'.$cusgall_color_hover.'; --scheme-color:'.$cusgall_scheme.'; --scheme-color-hover:'.$cusgall_scheme_hover.'; '.$cusgall_margins;			

			$classRandom = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,8);
			$settings = array(
				'shortcode' => 'filterimages',
				'classname' => '.km-filter-it-container-c-'.$classRandom,
				'--color-hover' => $cusgall_color_hover,
				'--scheme-color' => $cusgall_scheme,
				'--scheme-color-hover' => $cusgall_scheme_hover
			);
			kaswara_style_ms_maker($settings);			
			$edge_border = '';
			if($cusgall_style == "style3"){
				$edge_border = '<div class="km-filter-it-link-edge filteri-edgeright"></div><div class="km-filter-it-link-edge filteri-edgeleft"></div>';
			}

			if($cusgall_filterenabled == 'enabled'){
				$categories = explode(',',$cusgall_categories); 
				if(is_array($categories)){
					foreach ($categories as $cat) {
						if(trim($cat) != "")
							$catsoutPut .=  '<div class="km-filteri-link km-filter-it-link" data-active="false" data-filter=".'.esc_attr($cat).'" style="height:'.$cusgall_height.'px; line-height:'.$cusgall_height.'px;">'.ucfirst($cat).''.$edge_border.'</div>';
					}
				}
				$filterOutput = '<div class="km-filteri-cats" data-style="'.esc_attr($cusgall_style).'" style="text-align:'.$cusgall_align.'; '.$link_style.' ">
									<div class="km-filteri-link km-filter-it-link" data-filter=".km-filteri-item" data-active="true" style="height:'.$cusgall_height.'px; line-height:'.$cusgall_height.'px;">All'.$edge_border.'</div>
									'.$catsoutPut.'
								</div>';
				
			}
			//Getting the IMAGES
			$elementOptions = array(
				'titlefont'				=> $cusgall_titlefont,
				'titlefontstyle'		=> $cusgall_titlefontstyle,
				'titlecolor'			=> $cusgall_titlecolor,
				'subtitlefont'			=> $cusgall_subtitlefont,
				'subtitlefontstyle'		=> $cusgall_subtitlefontstyle,
				'subtitlecolor'			=> $cusgall_subtitlecolor,
				'titlepadding'			=> $cusgall_titlepadding,
				'contentshoweffect'		=> $cusgall_contentshoweffect,
				'overlaycolor'			=> $cusgall_overlaycolor,
				'overlayshoweffect'		=> $cusgall_overlayshoweffect,
				'colorscheme'			=> $cusgall_colorscheme,
				'boxshadow'				=> $cusgall_boxshadow,
				'3dhover'				=> $cusgall_3dhover,
				'imageeffect'			=> $cusgall_imageeffect,
				'columnposition'		=> $cusgall_columnposition,
				'rowposition'			=> $cusgall_rowposition,
				'overlayframe'			=> $cusgall_overlayframe,
				'bordersize'			=> $cusgall_bordersize
		 	);
			$cusgall_images = (array) vc_param_group_parse_atts($cusgall_images);
			$imagesOutput = '';
			foreach ($cusgall_images as $singleimage) {
				$elementOptions['title'] = (isset($singleimage['cusgallmdim_title'])) ? $singleimage['cusgallmdim_title'] : '';
				$elementOptions['subtitle'] = (isset($singleimage['cusgallmdim_subtitle'])) ? $singleimage['cusgallmdim_subtitle'] : '';
		 		$elementOptions['customclasses'] = (isset($singleimage['cusgallmdim_classes'])) ? $singleimage['cusgallmdim_classes'].' km-filteri-item ' : ' km-filteri-item ';
		 		$imageLink ='';
 				$imageUrl = (isset($singleimage['cusgallmdim_image'])) ? wp_get_attachment_image_src($singleimage['cusgallmdim_image'],'full')[0] : '';
 				if($cusgall_type == 'grid') $imageUrl =  kaswara_image_maker($imageUrl, 'kaswara-modernimage-grid', '', 'url'); 
 				if($cusgall_type == 'masonry') $imageUrl =  kaswara_image_maker($imageUrl, $singleimage['cusgallmdim_masonrysize'], '', 'url'); 
 				if($cusgall_type == 'metro') $imageUrl =  kaswara_image_maker($imageUrl, $singleimage['cusgallmdim_metrosize'], '', 'url'); 

 				if((isset($singleimage['cusgallmdim_link']) && $singleimage['cusgallmdim_link']!= '') ){
 					$href =  vc_build_link($singleimage['cusgallmdim_link']); 	
 					if(trim($href['url']) != '') $imageLink = '<a class="syn-full-link" href="'.esc_url($href['url']).'" target="'.esc_attr($href['target']).'" ></a>'; 					
 				}

		 		switch ($cusgall_imagestyle) {
			 		case 'mercury':
			 			$imagesOutput .= kswr_modernimage_mecury($elementOptions,$imageUrl,$imageLink);
			 		break;
			 		case 'venus':
			 			$imagesOutput .= kswr_modernimage_venus($elementOptions,$imageUrl,$imageLink);
			 		break;
					case 'neptune':
						$imagesOutput .= kswr_modernimage_neptune($elementOptions,$imageUrl,$imageLink);
					break;	
					case 'uranus':
						$imagesOutput .= kswr_modernimage_uranus($elementOptions,$imageUrl,$imageLink);
					break;	
					case 'pluto':
						$imagesOutput .= kswr_modernimage_pluto($elementOptions,$imageUrl,$imageLink);
					break;	 	
			 	}				
			}
			

			//Container Attributes
			$containerAttributes = 'data-gutter-enabled="off" data-gutter="0" ';
			if($cusgall_gutterenabled == 'enabled')
				$containerAttributes = 'data-gutter-enabled="on" data-gutter="25" ';
			//Check for Style and Layout
			if($cusgall_type == 'metro')	$cusgall_columns_number = 'none';
			$containerAttributes .= 'data-columns="'.esc_attr($cusgall_columns_number).'" data-layout="'.esc_attr($cusgall_type).'"';				

			$outPut .= '<div class="km-filteri-image-c km-filter-it-container-c km-filter-it-container-c-'.$classRandom.'"  data-align="'.esc_attr($cusgall_align).'" >
			'.$filterOutput.'		
			<div class="kswr-full-section syn-isotope-container" '.$containerAttributes.' data-animation="'.esc_attr($cusgall_showeffect).'">
							'.$imagesOutput.'
							</div>
						</div>';
			return $outPut;						
		}

	}
}
if(class_exists('Kaswara_customgallery')){
	$Kaswara_customgallery = new Kaswara_customgallery;
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_kswr_customgallery extends WPBakeryShortCode {
    }
}


?>