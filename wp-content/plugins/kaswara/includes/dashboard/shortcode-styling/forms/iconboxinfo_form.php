<?php 
//Find us Default Shorcode Styling Form
$iconboxinfoDefaults = kswr_shortcode_form_values('iconboxinfo');
$iconboxinfoSection = new kswr_global_section(
			$name = "Icon Box Info",
			$id = "iconboxinfo",
			$elements = 'ibi_back,ibi_back_hover,ibi_ic_color_hover,ibi_ic_color,ibi_border_radius,ibi_bgsize,ibi_iconsize,ibi_border,ibi_title_fsize,ibi_title_fstyle,ibi_subtitle_fsize,ibi_subtitle_fstyle,ibi_content_fsize,ibi_content_fstyle',
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
				)
			),
			$sections = array(
				//Icon
				array(
					'id'	=>	'icon',
					'situation'	=>	'active',
					'form' => array(
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'ibi_iconsize',
								'name' => 'ibi_iconsize',
								'default' => 18,
								'value' => $iconboxinfoDefaults['ibi_iconsize'],
								'title' => esc_html__('Icon Size (px)','kaswara'),
								'description' => esc_html__('Choose the icon size.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'ibi_bgsize',
								'name' => 'ibi_bgsize',
								'default' => 35,
								'value' => $iconboxinfoDefaults['ibi_bgsize'],
								'title' => esc_html__('Icon Background Size (px)','kaswara'),
								'description' => esc_html__('Choose the icon background size.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'ibi_border_radius',
								'name' => 'ibi_border_radius',
								'default' => 0,
								'value' => $iconboxinfoDefaults['ibi_border_radius'],
								'title' => esc_html__('Border Radius','kaswara'),
								'description' => esc_html__('Choose the icon border radius.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'ibi_ic_color',
								'name' => 'ibi_ic_color',
								'default' => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
								'value' => $iconboxinfoDefaults['ibi_ic_color'],
								'title' => esc_html__('Icon Color','kaswara'),
								'description' => esc_html__('Apply color for the icon.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'ibi_ic_color_hover',
								'name' => 'ibi_ic_color_hover',
								'default' => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
								'value' => $iconboxinfoDefaults['ibi_ic_color_hover'],
								'title' => esc_html__('Icon Color onHover','kaswara'),
								'description' => esc_html__('Apply color for the icon on hover actions.','kaswara'),
							)
						),

						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'ibi_back',
								'name' => 'ibi_back',
								'default' => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
								'value' => $iconboxinfoDefaults['ibi_back'],
								'title' => esc_html__('Background Color','kaswara'),
								'description' => esc_html__('Apply background for the icon.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'ibi_back_hover',
								'name' => 'ibi_back_hover',
								'default' => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
								'value' => $iconboxinfoDefaults['ibi_back_hover'],
								'title' => esc_html__('Background Color onHover','kaswara'),
								'description' => esc_html__('Apply background for the icon on hover actions.','kaswara'),
							)
						),


						array(
							'type' => 'border',
							'values' => array(
								'bordergradient' => 'enable',
								'id' => 'ibi_border',
								'name' => 'ibi_border',
								'default' => '',
								'value' => $iconboxinfoDefaults['ibi_border'],
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
					            "name" => "ibi_title_fstyle",				           
					            "value" => $iconboxinfoDefaults['ibi_title_fstyle'],
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
					            "name" => "ibi_title_fsize",				           
					            "value" => $iconboxinfoDefaults['ibi_title_fsize'],
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
					            "name" => "ibi_subtitle_fstyle",				           
					            "value" => $iconboxinfoDefaults['ibi_subtitle_fstyle'],
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
					            "name" => "ibi_subtitle_fsize",				           
					            "value" => $iconboxinfoDefaults['ibi_subtitle_fsize'],
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
					            "name" => "ibi_content_fstyle",				           
					            "value" => $iconboxinfoDefaults['ibi_content_fstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Content Info Font Style','kaswara'),
								'description' => esc_html__('Apply values for the subtitle font.','kaswara'),
				            )	
				        ),
				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "ibi_content_fsize",				           
					            "value" => $iconboxinfoDefaults['ibi_content_fsize'],
					            "defaults"=> array("font-size" => "14px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
					               esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
					               esc_html__("Phone Font Size","kaswara") => "--phone-font-size",                
					            ),
								'title' => esc_html__('Content Info Font Size','kaswara'),
								'description' => esc_html__('Apply values for the subtitle font size.','kaswara'),
				            )	
				        ),
					)
				),


			)	
		);	
$iconboxinfoSection->create_maker();

?>