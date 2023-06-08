<?php 
//Modal Window Default Shorcode Styling Form
$icbbDefaults = kswr_shortcode_form_values('iconboxaction');
$icbbSection = new kswr_global_section(
			$name = "Icon Box Action",
			$id = "iconboxaction",
			$elements = 'icbb_icon_color,icbb_icon_size,icbb_icon_hover_color,icbb_icon_bb_height,icbb_icon_bb_width,icbb_icon_bb_color,icbb_title_style,icbb_title_size,icbb_subtitle_style,icbb_subtitle_size,icbb_info_style,icbb_info_size,icbb_button_height,icbb_button_color,icbb_button_color_hover,icbb_button_bg,icbb_button_bg_hover,icbb_button_border_size,icbb_button_border_color,icbb_button_border_hover,icbb_button_style,icbb_button_size',
			$tabsname = array(
				array(
					'id'	=>	'icon',
					'name'	=>	'Icon',	
					'situation'	=>	'active'
				),
				array(
					'id'	=>	'typography',
					'name'	=>	'Typography',	
					'situation'	=>	'noactive'
				),
				array(
					'id'	=>	'btn',
					'name'	=>	'Button',	
					'situation'	=>	'noactive'
				)
			),
			$sections = array(
				array(
					'id'	=>	'icon',
					'situation'	=>	'active',
					'form' => array(
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Icon Style Settings','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'icbb_icon_size',
								'name' => 'icbb_icon_size',
								'default' => 36,
								'value' => $icbbDefaults['icbb_icon_size'],
								'title' => esc_html__('Icon Size (px)','kaswara'),
								'description' => esc_html__('Icon size in pixel.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'icbb_icon_color',
								'name' => 'icbb_icon_color',
								'default' => '#bbb',
								'value' => $icbbDefaults['icbb_icon_color'],
								'title' => esc_html__('Icon Color','kaswara'),
								'description' => esc_html__('Apply color for the icon.','kaswara'),
							)
						),	
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'icbb_icon_hover_color',
								'name' => 'icbb_icon_hover_color',
								'default' => '#bbb',
								'value' => $icbbDefaults['icbb_icon_hover_color'],
								'title' => esc_html__('Icon Color onHover','kaswara'),
								'description' => esc_html__('Apply color for the icon on hover action.','kaswara'),
							)
						),	
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Icon Border Settings','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'icbb_icon_bb_height',
								'name' => 'icbb_icon_bb_height',
								'default' => 0,
								'value' => $icbbDefaults['icbb_icon_bb_height'],
								'title' => esc_html__('Border Height','kaswara'),
								'description' => esc_html__('Icon border height','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'icbb_icon_bb_width',
								'name' => 'icbb_icon_bb_width',
								'default' => 0,
								'value' => $icbbDefaults['icbb_icon_bb_width'],
								'title' => esc_html__('Border Width','kaswara'),
								'description' => esc_html__('Icon border width','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'icbb_icon_bb_color',
								'name' => 'icbb_icon_bb_color',
								'default' => '#eee',
								'value' => $icbbDefaults['icbb_icon_bb_color'],
								'title' => esc_html__('Icon Border Color','kaswara'),
								'description' => esc_html__('Apply color for the icon border.','kaswara'),
							)
						),						
					)
				),
				array(
					'id'	=>	'typography',
					'situation'	=>	'noactive',
					'form' => array(
						//Ttitle
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Title Font Settings','kaswara'),
							)
						),
						 array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "icbb_title_style",				           
					            "value" => $icbbDefaults['icbb_title_style'],
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
					            "name" => "icbb_title_size",				           
					            "value" => $icbbDefaults['icbb_title_size'],
					            "defaults"=> array("font-size" => "17px", "line-height" => "", "letter-spacing" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
					            ),
								'title' => esc_html__('Title Font Size','kaswara'),
								'description' => esc_html__('Apply values for the title font size.','kaswara'),
				            )	
				        ),
				        //SubTitle
				        array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('SubTitle Font Settings','kaswara'),
							)
						),
						 array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "icbb_subtitle_style",				           
					            "value" => $icbbDefaults['icbb_subtitle_style'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('SubTitle Font Style','kaswara'),
								'description' => esc_html__('Apply values for the SubTitle font.','kaswara'),
				            )	
				        ),

				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "icbb_subtitle_size",				           
					            "value" => $icbbDefaults['icbb_subtitle_size'],
					            "defaults"=> array("font-size" => "14px", "line-height" => "", "letter-spacing" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
					            ),
								'title' => esc_html__('SubTitle Font Size','kaswara'),
								'description' => esc_html__('Apply values for the SubTitle font size.','kaswara'),
				            )	
				        ),

				        //Info
				        array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Info Font Settings','kaswara'),
							)
						),
						 array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "icbb_info_style",				           
					            "value" => $icbbDefaults['icbb_info_style'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Info Font Style','kaswara'),
								'description' => esc_html__('Apply values for the Info font.','kaswara'),
				            )	
				        ),

				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "icbb_info_size",				           
					            "value" => $icbbDefaults['icbb_info_size'],
					            "defaults"=> array("font-size" => "14px", "line-height" => "", "letter-spacing" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
					            ),
								'title' => esc_html__('Info Font Size','kaswara'),
								'description' => esc_html__('Apply values for the Info font size.','kaswara'),
				            )	
				        ),
				        //Button
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Button Font Settings','kaswara'),
							)
						),
						 array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "icbb_button_style",				           
					            "value" => $icbbDefaults['icbb_button_style'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Button Font Style','kaswara'),
								'description' => esc_html__('Apply values for the button font.','kaswara'),
				            )	
				        ),

				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "icbb_button_size",				           
					            "value" => $icbbDefaults['icbb_button_size'],
					            "defaults"=> array("font-size" => "14px", "line-height" => "", "letter-spacing" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
					            ),
								'title' => esc_html__('Button Font Size','kaswara'),
								'description' => esc_html__('Apply values for the button font size.','kaswara'),
				            )	
				        ),
					)
				),
				array(
					'id'	=>	'btn',
					'situation'	=>	'noactive',
					'form' => array(
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Button Style Settings','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'icbb_button_height',
								'name' => 'icbb_button_height',
								'default' => 35,
								'value' => $icbbDefaults['icbb_button_height'],
								'title' => esc_html__('Button Height (px)','kaswara'),
								'description' => esc_html__('Apply height fot the button.','kaswara'),
							)
						),
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Button Text Color','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'icbb_button_color',
								'name' => 'icbb_button_color',
								'default' => '#ddd',
								'value' => $icbbDefaults['icbb_button_color'],
								'title' => esc_html__('Text Color','kaswara'),
								'description' => esc_html__('Button text color.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'icbb_button_color_hover',
								'name' => 'icbb_button_color_hover',
								'default' => '#fff',
								'value' => $icbbDefaults['icbb_button_color_hover'],
								'title' => esc_html__('Text Color onHover','kaswara'),
								'description' => esc_html__('Button text color on hover action.','kaswara'),
							)
						),
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Button Background Color','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'icbb_button_bg',
								'name' => 'icbb_button_bg',
								'default' => '#222',
								'value' => $icbbDefaults['icbb_button_bg'],
								'title' => esc_html__('Background Color','kaswara'),
								'description' => esc_html__('Button background color.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'icbb_button_bg_hover',
								'name' => 'icbb_button_bg_hover',
								'default' => '#222',
								'value' => $icbbDefaults['icbb_button_bg_hover'],
								'title' => esc_html__('Background Color onHover','kaswara'),
								'description' => esc_html__('Button background color on hover action.','kaswara'),
							)
						),

						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Button Border Settings','kaswara'),
							)
						),

						array(
							'type' => 'number',
							'values' => array(
								'id' => 'icbb_button_border_size',
								'name' => 'icbb_button_border_size',
								'default' => 0,
								'value' => $icbbDefaults['icbb_button_border_size'],
								'title' => esc_html__('Border Size (px)','kaswara'),
								'description' => esc_html__('Apply border fot the button.','kaswara'),
							)
						),

						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'icbb_button_border_color',
								'name' => 'icbb_button_border_color',
								'default' => '#1a1a1a',
								'value' => $icbbDefaults['icbb_button_border_color'],
								'title' => esc_html__('Border Color','kaswara'),
								'description' => esc_html__('Button border color.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'icbb_button_border_hover',
								'name' => 'icbb_button_border_hover',
								'default' => '#000',
								'value' => $icbbDefaults['icbb_button_border_hover'],
								'title' => esc_html__('Border Color onHover','kaswara'),
								'description' => esc_html__('Button border color on hover action.','kaswara'),
							)
						),


					)
				),

			)
	);	
$icbbSection->create_maker();
?>