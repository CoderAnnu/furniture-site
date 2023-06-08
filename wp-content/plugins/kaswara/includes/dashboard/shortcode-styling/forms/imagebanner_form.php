<?php 
//Image Banner Default Shorcode Styling Form
$imagebannerDefaults = kswr_shortcode_form_values('imagebanner');
$imagebannerSection = new kswr_global_section(
			$name = "Modal Window",
			$id = "imagebanner",
			$elements = 'imban_title_fsize,imban_title_fstyle,imban_content_fsize,imban_content_fstyle,imban_btn_width,imban_btn_height,imban_btn_border_radius,imban_btn_align,imban_btn_margins,imban_btn_bg,imban_btn_bg_hover,imban_btn_clr,imban_btn_clr_hover,imban_btn_ftsize,imban_btn_ftstyle,imban_btn_paddings,imban_btn_bdr,imban_btn_bdr_hover,imban_btn_icon_position,imban_btn_icon_clr,imban_btn_icon_clr_hover,imban_btn_icon_size,imban_btn_icon_paddings',
			$tabsname = array(
				array(
					'id'	=>	'btntrigger',
					'name'	=>	'Button',	
					'situation'	=>	'active'
				),
				array(
					'id'	=>	'typography',
					'name'	=>	'Typography',	
					'situation'	=>	'noactive'
				)
			),
			$sections = array(
				array(
					'id'	=>	'btntrigger',
					'situation'	=>	'active',
					'form' => array(

						
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Button Size','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'imban_btn_width',
								'name' => 'imban_btn_width',
								'default' => 250,
								'value' => $imagebannerDefaults['imban_btn_width'],
								'title' => esc_html__('Button Width (px)','kaswara'),
								'description' => esc_html__('Choose the width of the button.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'imban_btn_height',
								'name' => 'imban_btn_height',
								'default' => 45,
								'value' => $imagebannerDefaults['imban_btn_height'],
								'title' => esc_html__('Button Height (px)','kaswara'),
								'description' => esc_html__('Choose the height of the button.','kaswara'),
							)
						),
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Button Colors','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'imban_btn_bg',
								'name' => 'imban_btn_bg',
								'default' => '{"type":"color", "color1":"#111", "color2":"#111", "direction":"to left"}',
								'value' => $imagebannerDefaults['imban_btn_bg'],
								'title' => esc_html__('Button Background','kaswara'),
								'description' => esc_html__('Apply color for the button background.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'imban_btn_bg_hover',
								'name' => 'imban_btn_bg_hover',
								'default' => '{"type":"color", "color1":"#00AFD1", "color2":"#00AFD1", "direction":"to left"}',
								'value' => $imagebannerDefaults['imban_btn_bg_hover'],
								'title' => esc_html__('Hover Button Background','kaswara'),
								'description' => esc_html__('Apply color for the hovered button background.','kaswara'),
							)
						),	

						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'imban_btn_clr',
								'name' => 'imban_btn_clr',
								'default' => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
								'value' => $imagebannerDefaults['imban_btn_clr'],
								'title' => esc_html__('Button Color','kaswara'),
								'description' => esc_html__('Apply color for the button text color.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'imban_btn_clr_hover',
								'name' => 'imban_btn_clr_hover',
								'default' => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
								'value' => $imagebannerDefaults['imban_btn_clr_hover'],
								'title' => esc_html__('Hover Button Color','kaswara'),
								'description' => esc_html__('Apply color for the hovered button text color.','kaswara'),
							)
						),

						array(
							'type' => 'number',
							'values' => array(
								'id' => 'imban_btn_border_radius',
								'name' => 'imban_btn_border_radius',
								'default' => 0,
								'value' => $imagebannerDefaults['imban_btn_border_radius'],
								'title' => esc_html__('Border Radius (px)','kaswara'),
								'description' => esc_html__('Apply border radius of the button.','kaswara'),
							)
						),
						array(
				            'type' => 'select',
				            'values' => array(					            
					            'name' => 'imban_btn_align',
					            'value' => $imagebannerDefaults['imban_btn_align'],
					            'default' => 'left',
					            'options' => array(
					                'left' => esc_html__("Left",'kaswara') ,
		                			'center' =>	esc_html__("Center",'kaswara') ,
		                			'right' =>	esc_html__("Right",'kaswara') ,
					            ),
					            'title' => esc_html__('Button Alignement','kaswara'),
								'description' => esc_html__('Choose the position of your button','kaswara'),    
				            )  
				        ),
						array(
				            "type" => "distance",
				            "values" => array(
					            "distance" => "margin",            
					            "id" => "btn_margins",	
					            'default' => 'margin-top:0px; margin-bottom:0px;',			         
								'value' => $imagebannerDefaults['imban_btn_margins'],
					            "name" => "btn_margins",				         
					            "title" => esc_html__( "Button Margins", "kaswara" ),
								'description' => esc_html__('Button Top & Bototm Margins','kaswara'),    
					            "positions" => array(
					                 esc_html__("Top","kameleon") => "top",
					                 esc_html__("Bottom","kameleon") => "bottom"
					            ),
				            )				         
				        ),

						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Button Text Font','kaswara'),
							)
						),
				        array(
				            "type" => "fontstyle",
				            'values' => array(
					            "id" => "imban_btn_ftstyle",				           
					            "name" => "imban_btn_ftstyle",				           
					            "value" => $imagebannerDefaults['imban_btn_ftstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Text Font Style','kaswara'),
								'description' => esc_html__('Apply values for the text font.','kaswara'),
				            )	
				        ),

				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "btn_ftsize",				           
					            "value" => $imagebannerDefaults['imban_btn_ftsize'],
					            "defaults"=> array("font-size" => "15px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
					               esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
					               esc_html__("Phone Font Size","kaswara") => "--phone-font-size",                
					            ),
								'title' => esc_html__('Text Font Size','kaswara'),
								'description' => esc_html__('Apply values for the text font size.','kaswara'),
				            )	
				        ),

				        array(
				            "type" => "distance",
				            "values" => array(
					            "distance" => "padding",            
					            "id" => "btn_paddings",				         
					            'default' => 'padding-top:20px; padding-bottom:0px;',			         
								'value' => $imagebannerDefaults['imban_btn_paddings'],
					            "name" => "btn_paddings",				         
					            "title" => esc_html__( "Button Paddings", "kaswara" ),
					            "description" => esc_html__( "Button Left & RightPaddings", "kaswara" ),
					            "positions" => array(
					                esc_html__("Left","kameleon") => "left",
					                esc_html__("Right","kameleon") => "right"
					            ),
				            )				         
				        ),

				        array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Button Borders','kaswara'),
							)
						),
				       array(
							'type' => 'border',
							'values' => array(
								'id' => 'imban_btn_bdr',
								'bordergradient' => 'enable',
								'name' => 'imban_btn_bdr',
								'default' => '',
								'value' => $imagebannerDefaults['imban_btn_bdr'],
								'title' => esc_html__('Border Styling','kaswara'),
								'description' => esc_html__('Button border styling.','kaswara'),
							)
						),
				       array(
							'type' => 'border',
							'values' => array(
								'id' => 'imban_btn_bdr_hover',
								'bordergradient' => 'enable',
								'name' => 'imban_btn_bdr_hover',
								'default' => '',
								'value' => $imagebannerDefaults['imban_btn_bdr_hover'],
								'title' => esc_html__('Border Styling onHover','kaswara'),
								'description' => esc_html__('Button border styling on hover.','kaswara'),
							)
						),

						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Button Icon Settings','kaswara'),
							)
						),
						array(
				            'type' => 'select',
				            'values' => array(					            
					            'name' => 'imban_btn_icon_position',
					            'value' => $imagebannerDefaults['imban_btn_icon_position'],
					            'default' => 'left',
					            'options' => array(
					                'left' => esc_html__("Left",'kaswara') ,		                	
		                			'right' =>	esc_html__("Right",'kaswara') ,
					            ),
					            'title' => esc_html__('Icon Position','kaswara'),
								'description' => esc_html__('Choose the position of the icon','kaswara'),    
				            )  
				        ),

				        array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'imban_btn_icon_clr',
								'name' => 'imban_btn_icon_clr',
								'default' => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
								'value' => $imagebannerDefaults['imban_btn_icon_clr'],
								'title' => esc_html__('Icon Color','kaswara'),
								'description' => esc_html__('Icon Color.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'imban_btn_icon_clr_hover',
								'name' => 'imban_btn_icon_clr_hover',
								'default' => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
								'value' => $imagebannerDefaults['imban_btn_icon_clr_hover'],
								'title' => esc_html__('Hover Icon Color','kaswara'),
								'description' => esc_html__('Icon Color onHover .','kaswara'),
							)
						),

						 array(
							'type' => 'number',
							'values' => array(
								'id' => 'imban_btn_icon_size',
								'name' => 'imban_btn_icon_size',
								'default' => 26,
								'value' => $imagebannerDefaults['imban_btn_icon_size'],
								'title' => esc_html__('Icon Size (px)','kaswara'),
								'description' => esc_html__('Apply icon size.','kaswara'),
							)
						),

						 array(
				            "type" => "distance",
				            "values" => array(
					            "distance" => "padding",            
					            'default' => 'padding-top:0px; padding-bottom:0px;',			         
					            "id" => "btn_icon_paddings",				         
								'value' => $imagebannerDefaults['imban_btn_icon_paddings'],
					            "name" => "btn_icon_paddings",				         
					            "title" => esc_html__( "Icon Paddings", "kaswara" ),
					            "description" => esc_html__( "Icon Left & RightPaddings", "kaswara" ),
					            "positions" => array(
					                esc_html__("Left","kameleon") =>"left" ,
					                 esc_html__("Right","kameleon") =>"right"
					            ),
				            )				         
				        ),
					)
				),
								//typography
				array(
					'id'	=>	'typography',
					'situation'	=>	'noactive',
					'form' => array(
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Title Font Settings','kaswara'),
							)
						),
						array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "imban_title_fstyle",				           
					            "value" => $imagebannerDefaults['imban_title_fstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Title Font Style','kaswara'),
								'description' => esc_html__('Apply values for the title font.','kaswara'),
				            )	
				        ),
				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "imban_title_fsize",				           
					            "value" => $imagebannerDefaults['imban_title_fsize'],
					            "defaults"=> array("font-size" => "28px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
					               esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
					               esc_html__("Phone Font Size","kaswara") => "--phone-font-size",                
					            ),
								'title' => esc_html__('Title Font Size','kaswara'),
								'description' => esc_html__('Apply values for the title font size.','kaswara'),
				            )	
				        ),

				        array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Value Font Settings','kaswara'),
							)
						),	
				        array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "imban_content_fstyle",				           
					            "value" => $imagebannerDefaults['imban_content_fstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Value Font Style','kaswara'),
								'description' => esc_html__('Apply values for the value font.','kaswara'),
				            )	
				        ),
				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "imban_content_fsize",				           
					            "value" => $imagebannerDefaults['imban_content_fsize'],
					            "defaults"=> array("font-size" => "20px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
					               esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
					               esc_html__("Phone Font Size","kaswara") => "--phone-font-size",                
					            ),
								'title' => esc_html__('Value Font Size','kaswara'),
								'description' => esc_html__('Apply values for the value font size.','kaswara'),
				            )	
				        ),
				    )
				)
			


			)
	);	
$imagebannerSection->create_maker();
?>