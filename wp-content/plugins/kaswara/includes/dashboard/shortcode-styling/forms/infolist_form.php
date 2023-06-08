<?php 
//INfo List Default Shorcode Styling Form
$infolistDefaults = kswr_shortcode_form_values('infolist');
$infolistSection = new kswr_global_section(
			$name = "Info List",
			$id = "infolist",
			$elements = 'iibl_align,iibl_margin,iibl_border_list,iibl_back,iibl_back_hover,iibl_ic_color_hover,iibl_ic_color,iibl_border_radius,iibl_bgsize,iibl_iconsize,iibl_border,iibl_title_fsize,iibl_title_fstyle,iibl_subtitle_fsize,iibl_subtitle_fstyle,iibl_content_fsize,iibl_content_fstyle',
			$tabsname = array(
				array(
					'id'	=>	'general',
					'name'	=>	'General',	
					'situation'	=>	'active'
				),
				array(
					'id'	=>	'icon',
					'name'	=>	'Icon',	
					'situation'	=>	'noactive'
				),
				array(
					'id'	=>	'typography',
					'name'	=>	'Typography',	
					'situation'	=>	'noactive'
				),
				
			),
			$sections = array(
				//General 
				array(
					'id'	=>	'general',
					'situation'	=>	'active',
					'form' => array(
						
						array(
				            'type' => 'select',
				            'values' => array(					            
					            'name' => 'iibl_align',
					            'value' => $infolistDefaults['iibl_align'],
					            'default' => 'left',
					            'options' => array(
					               'left' =>  esc_html__("Left",'kaswara'),
					               'right' =>  esc_html__("Right",'kaswara')
					            ),
					            'title' => esc_html__('Elements Alignement','kaswara'),
								'description' => esc_html__('Choose the layout of single elements.','kaswara'),    
				            )  
				        ),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'iibl_margin',
								'name' => 'iibl_margin',
								'default' => 30,
								'value' => $infolistDefaults['iibl_margin'],
								'title' => esc_html__('Maring Bottom','kaswara'),
								'description' => esc_html__('Margin bottom between elements.','kaswara'),
							)
						),
						array(
							'type' => 'border',
							'values' => array(
								'id' => 'iibl_border_list',
								'name' => 'iibl_border_list',
								'default' => '',
								'value' => $infolistDefaults['iibl_border_list'],
								'title' => esc_html__('Connector Styling','kaswara'),
								'description' => esc_html__('Line elements connector styling.','kaswara'),
							)
						),
						
						
					)
				),
				//Icon
				array(
					'id'	=>	'icon',
					'situation'	=>	'noactive',
					'form' => array(
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'iibl_iconsize',
								'name' => 'iibl_iconsize',
								'default' => 18,
								'value' => $infolistDefaults['iibl_iconsize'],
								'title' => esc_html__('Icon Size (px)','kaswara'),
								'description' => esc_html__('Choose the icon size.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'iibl_bgsize',
								'name' => 'iibl_bgsize',
								'default' => 35,
								'value' => $infolistDefaults['iibl_bgsize'],
								'title' => esc_html__('Icon Background Size (px)','kaswara'),
								'description' => esc_html__('Choose the icon background size.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'iibl_border_radius',
								'name' => 'iibl_border_radius',
								'default' => 0,
								'value' => $infolistDefaults['iibl_border_radius'],
								'title' => esc_html__('Border Radius','kaswara'),
								'description' => esc_html__('Choose the icon border radius.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'iibl_ic_color',
								'name' => 'iibl_ic_color',
								'default' => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
								'value' => $infolistDefaults['iibl_ic_color'],
								'title' => esc_html__('Icon Color','kaswara'),
								'description' => esc_html__('Apply color for the icon.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'iibl_ic_color_hover',
								'name' => 'iibl_ic_color_hover',
								'default' => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
								'value' => $infolistDefaults['iibl_ic_color_hover'],
								'title' => esc_html__('Icon Color onHover','kaswara'),
								'description' => esc_html__('Apply color for the icon on hover actions.','kaswara'),
							)
						),

						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'iibl_back',
								'name' => 'iibl_back',
								'default' => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
								'value' => $infolistDefaults['iibl_back'],
								'title' => esc_html__('Background Color','kaswara'),
								'description' => esc_html__('Apply background for the icon.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'iibl_back_hover',
								'name' => 'iibl_back_hover',
								'default' => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
								'value' => $infolistDefaults['iibl_back_hover'],
								'title' => esc_html__('Background Color onHover','kaswara'),
								'description' => esc_html__('Apply background for the icon on hover actions.','kaswara'),
							)
						),


						array(
							'type' => 'border',
							'values' => array(
								'id' => 'iibl_border',
								'name' => 'iibl_border',
								'default' => '',
								'value' => $infolistDefaults['iibl_border'],
								'title' => esc_html__('Border Styling','kaswara'),
								'description' => esc_html__('Icon border styling.','kaswara'),
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
					            "name" => "iibl_title_fstyle",				           
					            "value" => $infolistDefaults['iibl_title_fstyle'],
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
					            "name" => "iibl_title_fsize",				           
					            "value" => $infolistDefaults['iibl_title_fsize'],
					            "defaults"=> array("font-size" => "17px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
								'description' => esc_html__('Sub Title Font Settings','kaswara'),
							)
						),	
				        array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "iibl_subtitle_fstyle",				           
					            "value" => $infolistDefaults['iibl_subtitle_fstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('SubTitle Font Style','kaswara'),
								'description' => esc_html__('Apply values for the subtitle font.','kaswara'),
				            )	
				        ),
				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "iibl_subtitle_fsize",				           
					            "value" => $infolistDefaults['iibl_subtitle_fsize'],
					            "defaults"=> array("font-size" => "12px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
					               esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
					               esc_html__("Phone Font Size","kaswara") => "--phone-font-size",                
					            ),
								'title' => esc_html__('SubTitle Font Size','kaswara'),
								'description' => esc_html__('Apply values for the subtitle font size.','kaswara'),
				            )	
				        ),

				        //Content Font Settings
				        array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Content Font Settings','kaswara'),
							)
						),	
				        array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "iibl_content_fstyle",				           
					            "value" => $infolistDefaults['iibl_content_fstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Content Info Font Style','kaswara'),
								'description' => esc_html__('Apply values for the content font.','kaswara'),
				            )	
				        ),
				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "iibl_content_fsize",				           
					            "value" => $infolistDefaults['iibl_content_fsize'],
					            "defaults"=> array("font-size" => "14px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
					               esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
					               esc_html__("Phone Font Size","kaswara") => "--phone-font-size",                
					            ),
								'title' => esc_html__('Content Info Font Size','kaswara'),
								'description' => esc_html__('Apply values for the content font size.','kaswara'),
				            )	
				        ),
					)
				),


			)	
		);	
$infolistSection->create_maker();

?>