<?php 
//INfo List Default Shorcode Styling Form
$counterDefaults = kswr_shortcode_form_values('counter');
$counterSection = new kswr_global_section(
			$name = "Counter",
			$id = "counter",
			$elements = '',
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
								'id' => 'cnt_iconsize',
								'name' => 'cnt_iconsize',
								'default' => 18,
								'value' => $counterDefaults['cnt_iconsize'],
								'title' => esc_html__('Icon Size (px)','kaswara'),
								'description' => esc_html__('Choose the icon size.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'cnt_bgsize',
								'name' => 'cnt_bgsize',
								'default' => 35,
								'value' => $counterDefaults['cnt_bgsize'],
								'title' => esc_html__('Icon Background Size (px)','kaswara'),
								'description' => esc_html__('Choose the icon background size.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'cnt_border_radius',
								'name' => 'cnt_border_radius',
								'default' => 0,
								'value' => $counterDefaults['cnt_border_radius'],
								'title' => esc_html__('Border Radius','kaswara'),
								'description' => esc_html__('Choose the icon border radius.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'cnt_ic_color',
								'name' => 'cnt_ic_color',
								'default' => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
								'value' => $counterDefaults['cnt_ic_color'],
								'title' => esc_html__('Icon Color','kaswara'),
								'description' => esc_html__('Apply color for the icon.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'cnt_ic_color_hover',
								'name' => 'cnt_ic_color_hover',
								'default' => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
								'value' => $counterDefaults['cnt_ic_color_hover'],
								'title' => esc_html__('Icon Color onHover','kaswara'),
								'description' => esc_html__('Apply color for the icon on hover actions.','kaswara'),
							)
						),

						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'cnt_back',
								'name' => 'cnt_back',
								'default' => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
								'value' => $counterDefaults['cnt_back'],
								'title' => esc_html__('Background Color','kaswara'),
								'description' => esc_html__('Apply background for the icon.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'cnt_back_hover',
								'name' => 'cnt_back_hover',
								'default' => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
								'value' => $counterDefaults['cnt_back_hover'],
								'title' => esc_html__('Background Color onHover','kaswara'),
								'description' => esc_html__('Apply background for the icon on hover actions.','kaswara'),
							)
						),


						array(
							'type' => 'border',
							'values' => array(
								'id' => 'cnt_border',
								'bordergradient' => 'enable',
								'name' => 'cnt_border',
								'default' => '',
								'value' => $counterDefaults['cnt_border'],
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
					            "name" => "cnt_title_fstyle",				           
					            "value" => $counterDefaults['cnt_title_fstyle'],
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
					            "name" => "cnt_title_fsize",				           
					            "value" => $counterDefaults['cnt_title_fsize'],
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
								'description' => esc_html__('Value Font Settings','kaswara'),
							)
						),	
				        array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "cnt_value_fstyle",				           
					            "value" => $counterDefaults['cnt_value_fstyle'],
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
					            "name" => "cnt_value_fsize",				           
					            "value" => $counterDefaults['cnt_value_fsize'],
					            "defaults"=> array("font-size" => "12px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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

				        //Prefix Font Settings
				        array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Prefix Font Settings','kaswara'),
							)
						),	
				        array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "cnt_prefix_fstyle",				           
					            "value" => $counterDefaults['cnt_prefix_fstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Prefix Info Font Style','kaswara'),
								'description' => esc_html__('Apply values for the prefix font.','kaswara'),
				            )	
				        ),
				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "cnt_prefix_fsize",				           
					            "value" => $counterDefaults['cnt_prefix_fsize'],
					            "defaults"=> array("font-size" => "14px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
					               esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
					               esc_html__("Phone Font Size","kaswara") => "--phone-font-size",                
					            ),
								'title' => esc_html__('Prefix Info Font Size','kaswara'),
								'description' => esc_html__('Apply values for the prefix font size.','kaswara'),
				            )	
				        ),

				         array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Suffix Font Settings','kaswara'),
							)
						),	
				        array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "cnt_suffix_fstyle",				           
					            "value" => $counterDefaults['cnt_suffix_fstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Suffix Info Font Style','kaswara'),
								'description' => esc_html__('Apply values for the suffix font.','kaswara'),
				            )	
				        ),
				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "cnt_suffix_fsize",				           
					            "value" => $counterDefaults['cnt_suffix_fsize'],
					            "defaults"=> array("font-size" => "14px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
					               esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
					               esc_html__("Phone Font Size","kaswara") => "--phone-font-size",                
					            ),
								'title' => esc_html__('Suffix Info Font Size','kaswara'),
								'description' => esc_html__('Apply values for the suffix font size.','kaswara'),
				            )	
				        ),
					)
				),


			)	
		);	
$counterSection->create_maker();

?>