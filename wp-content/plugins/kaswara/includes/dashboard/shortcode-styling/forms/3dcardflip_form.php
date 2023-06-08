<?php 
//Card Flip Default Shorcode Styling Form
$threedcardflipDefaults = kswr_shortcode_form_values('threedcardflip');
$threedcardflipSection = new kswr_global_section(
			$name = "3D Card Flip",
			$id = "threedcardflip",
			$elements = 'trcflp_front_background,trcflp_front_border,trcflp_front_title_color,trcflp_front_subtitle_color,trcflp_icon_color,trcflp_icon_bgcolor,trcflp_icon_size,trcflp_icon_bgsize,trcflp_icon_br,trcflp_icon_br_radius,trcflp_back_background,trcflp_back_border,trcflp_back_title_color,trcflp_back_subtitle_color,trcflp_back_button_color,trcflp_back_button_bgcolor,trcflp_back_button_border,trcflp_back_button_br_radius,trcflp_front_title_fsize,trcflp_front_title_fstyle,trcflp_front_subtitle_fsize,trcflp_front_subtitle_fstyle,trcflp_back_title_fsize,trcflp_back_title_fstyle,trcflp_back_subtitle_fsize,trcflp_back_subtitle_fstyle,trcflp_back_button_fsize,trcflp_back_button_fstyle,trcflp_back_button_height',
			$tabsname = array(
				array(
					'id'	=>	'front',
					'name'	=>	'Front',	
					'situation'	=>	'active'
				),
				array(
					'id'	=>	'back',
					'name'	=>	'Back',	
					'situation'	=>	'noactive'
				),
				array(
					'id'	=>	'typography',
					'name'	=>	'Typography',	
					'situation'	=>	'noactive'
				)
			),
			$sections = array(
				//---------------------------------
				//Front
				array(
					'id'	=>	'front',
					'situation'	=>	'active',
					'form' => array(
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'trcflp_front_background',
								'name' => 'trcflp_front_background',
								'default' => '{"type":"color", "color1":"#fafafa", "color2":"transparent", "direction":"to left"}',
								'value' => $threedcardflipDefaults['trcflp_front_background'],
								'title' => esc_html__('Container Background','kaswara'),
								'description' => esc_html__('Apply background color for the front container.','kaswara'),
							)
						),
						array(
							'type' => 'border',
							'values' => array(
								'id' => 'trcflp_front_border',
								'bordergradient' => 'enable',
								'name' => 'trcflp_front_border',
								'default' => '',
								'value' => $threedcardflipDefaults['trcflp_front_border'],
								'title' => esc_html__('Container Border Styling','kaswara'),
								'description' => esc_html__('Front container border styling.','kaswara'),
							)
						),

						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'trcflp_front_title_color',
								'name' => 'trcflp_front_title_color',
								'default' => '#333',
								'value' => $threedcardflipDefaults['trcflp_front_title_color'],
								'title' => esc_html__('Title Color','kaswara'),
								'description' => esc_html__('Apply color for the title.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'trcflp_front_subtitle_color',
								'name' => 'trcflp_front_subtitle_color',
								'default' => '#333',
								'value' => $threedcardflipDefaults['trcflp_front_subtitle_color'],
								'title' => esc_html__('Sub Title Color','kaswara'),
								'description' => esc_html__('Apply color for the sub title.','kaswara'),
							)
						),
						//Icon Styling
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Icon Styling','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'trcflp_icon_size',
								'name' => 'trcflp_icon_size',
								'default' => 32,
								'value' => $threedcardflipDefaults['trcflp_icon_size'],
								'title' => esc_html__('Icon Size (px)','kaswara'),
								'description' => esc_html__('Choose the icon size.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'trcflp_icon_bgsize',
								'name' => 'trcflp_icon_bgsize',
								'default' => 32,
								'value' => $threedcardflipDefaults['trcflp_icon_bgsize'],
								'title' => esc_html__('Icon Background Size (px)','kaswara'),
								'description' => esc_html__('Choose the icon background size.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'trcflp_icon_color',
								'name' => 'trcflp_icon_color',
								'default' => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
								'value' => $threedcardflipDefaults['trcflp_icon_color'],
								'title' => esc_html__('Icon Color','kaswara'),
								'description' => esc_html__('Apply color for the icon.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'trcflp_icon_bgcolor',
								'name' => 'trcflp_icon_bgcolor',
								'default' => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
								'value' => $threedcardflipDefaults['trcflp_icon_bgcolor'],
								'title' => esc_html__('Icon Background Color','kaswara'),
								'description' => esc_html__('Apply background color for the icon.','kaswara'),
							)
						),
						array(
							'type' => 'border',
							'values' => array(
								'id' => 'trcflp_icon_br',
								'bordergradient' => 'noenable',
								'name' => 'trcflp_icon_br',
								'default' => '',
								'value' => $threedcardflipDefaults['trcflp_icon_br'],
								'title' => esc_html__('Icon Border Styling','kaswara'),
								'description' => esc_html__('Apply settings icon border styling.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'trcflp_icon_br_radius',
								'name' => 'trcflp_icon_br_radius',
								'default' => 0,
								'value' => $threedcardflipDefaults['trcflp_icon_br_radius'],
								'title' => esc_html__('Icon Border Rdius','kaswara'),
								'description' => esc_html__('Apply border radius for the icon.','kaswara'),
							)
						),



					)
				),

				//---------------------------------	
				//Back
				array(
					'id'	=>	'back',
					'situation'	=>	'noactive',
					'form' => array(
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'trcflp_back_background',
								'name' => 'trcflp_back_background',
								'default' => '{"type":"color", "color1":"#fafafa", "color2":"transparent", "direction":"to left"}',
								'value' => $threedcardflipDefaults['trcflp_back_background'],
								'title' => esc_html__('Container Background','kaswara'),
								'description' => esc_html__('Apply background color for the front container.','kaswara'),
							)
						),
						array(
							'type' => 'border',
							'values' => array(
								'id' => 'trcflp_back_border',
								'bordergradient' => 'enable',
								'name' => 'trcflp_back_border',
								'default' => '',
								'value' => $threedcardflipDefaults['trcflp_back_border'],
								'title' => esc_html__('Container Border Styling','kaswara'),
								'description' => esc_html__('Front container border styling.','kaswara'),
							)
						),

						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'trcflp_back_title_color',
								'name' => 'trcflp_back_title_color',
								'default' => '#333',
								'value' => $threedcardflipDefaults['trcflp_back_title_color'],
								'title' => esc_html__('Title Color','kaswara'),
								'description' => esc_html__('Apply color for the title.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'trcflp_back_subtitle_color',
								'name' => 'trcflp_back_subtitle_color',
								'default' => '#333',
								'value' => $threedcardflipDefaults['trcflp_back_subtitle_color'],
								'title' => esc_html__('Sub Title Color','kaswara'),
								'description' => esc_html__('Apply color for the sub title.','kaswara'),
							)
						),
						//Button Styling
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Button Styling','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'trcflp_back_button_height',
								'name' => 'trcflp_back_button_height',
								'default' => 45,
								'value' => $threedcardflipDefaults['trcflp_back_button_height'],
								'title' => esc_html__('Icon Size (px)','kaswara'),
								'description' => esc_html__('Choose the icon size.','kaswara'),
							)
						),
		
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'trcflp_back_button_color',
								'name' => 'trcflp_back_button_color',
								'default' => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
								'value' => $threedcardflipDefaults['trcflp_back_button_color'],
								'title' => esc_html__('Button Text Color','kaswara'),
								'description' => esc_html__('Apply color for the button.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'trcflp_back_button_bgcolor',
								'name' => 'trcflp_back_button_bgcolor',
								'default' => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
								'value' => $threedcardflipDefaults['trcflp_back_button_bgcolor'],
								'title' => esc_html__('Button Background Color','kaswara'),
								'description' => esc_html__('Apply background color for the button.','kaswara'),
							)
						),
						array(
							'type' => 'border',
							'values' => array(
								'id' => 'trcflp_back_button_border',
								'bordergradient' => 'enable',
								'name' => 'trcflp_back_button_border',
								'default' => '',
								'value' => $threedcardflipDefaults['trcflp_back_button_border'],
								'title' => esc_html__('Button Border Styling','kaswara'),
								'description' => esc_html__('Apply settings button border styling.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'trcflp_back_button_br_radius',
								'name' => 'trcflp_back_button_br_radius',
								'default' => 0,
								'value' => $threedcardflipDefaults['trcflp_back_button_br_radius'],
								'title' => esc_html__('Button Border Rdius','kaswara'),
								'description' => esc_html__('Apply border radius for the button.','kaswara'),
							)
						),



					)
				),

				//---------------------------------	
				//Typography
				array(
					'id'	=>	'typography',
					'situation'	=>	'noactive',
					'form' => array(
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Front Title Font','kaswara'),
							)
						),
						array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "trcflp_front_title_fstyle",				           
					            "value" => $threedcardflipDefaults['trcflp_front_title_fstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Font Style','kaswara'),
								'description' => esc_html__('Apply values for the font.','kaswara'),
				            )	
				        ),
				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "trcflp_front_title_fsize",				           
					            "value" => $threedcardflipDefaults['trcflp_front_title_fsize'],
					            "defaults"=> array("font-size" => "21px", "line-height" => "", "letter-spacing" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing"
					            ),
								'title' => esc_html__('Title Font Size','kaswara'),
								'description' => esc_html__('Apply values for the font size.','kaswara'),
				            )	
				        ),
				        

				        array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Front Sub Title Font','kaswara'),
							)
						),
						array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "trcflp_front_subtitle_fstyle",				           
					            "value" => $threedcardflipDefaults['trcflp_front_subtitle_fstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Font Style','kaswara'),
								'description' => esc_html__('Apply values for the font.','kaswara'),
				            )	
				        ),
				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "trcflp_front_subtitle_fsize",				           
					            "value" => $threedcardflipDefaults['trcflp_front_subtitle_fsize'],
					            "defaults"=> array("font-size" => "16px", "line-height" => "", "letter-spacing" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing"
					            ),
								'title' => esc_html__('Font Size','kaswara'),
								'description' => esc_html__('Apply values for the font size.','kaswara'),
				            )	
				        ),

				        array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Back Title Font','kaswara'),
							)
						),
						array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "trcflp_back_title_fstyle",				           
					            "value" => $threedcardflipDefaults['trcflp_back_title_fstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Font Style','kaswara'),
								'description' => esc_html__('Apply values for the font.','kaswara'),
				            )	
				        ),
				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "trcflp_back_title_fsize",				           
					            "value" => $threedcardflipDefaults['trcflp_back_title_fsize'],
					            "defaults"=> array("font-size" => "21px", "line-height" => "", "letter-spacing" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing"
					            ),
								'title' => esc_html__('Font Size','kaswara'),
								'description' => esc_html__('Apply values for the font size.','kaswara'),
				            )	
				        ),

				        array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Back Sub Title Font','kaswara'),
							)
						),
						array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "trcflp_back_subtitle_fstyle",				           
					            "value" => $threedcardflipDefaults['trcflp_back_subtitle_fstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Font Style','kaswara'),
								'description' => esc_html__('Apply values for the font.','kaswara'),
				            )	
				        ),
				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "trcflp_back_subtitle_fsize",				           
					            "value" => $threedcardflipDefaults['trcflp_back_subtitle_fsize'],
					            "defaults"=> array("font-size" => "16px", "line-height" => "", "letter-spacing" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing"
					            ),
								'title' => esc_html__('Font Size','kaswara'),
								'description' => esc_html__('Apply values for the font size.','kaswara'),
				            )	
				        ),

				        array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Back Button Font','kaswara'),
							)
						),
						array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "trcflp_back_button_fstyle",				           
					            "value" => $threedcardflipDefaults['trcflp_back_button_fstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Font Style','kaswara'),
								'description' => esc_html__('Apply values for the font.','kaswara'),
				            )	
				        ),
				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "trcflp_back_button_fsize",				           
					            "value" => $threedcardflipDefaults['trcflp_back_button_fsize'],
					            "defaults"=> array("font-size" => "13px", "line-height" => "", "letter-spacing" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing"
					            ),
								'title' => esc_html__('Font Size','kaswara'),
								'description' => esc_html__('Apply values for the font size.','kaswara'),
				            )	
				        ),


				        
					)
				),
		


			)
	);	
$threedcardflipSection->create_maker();
?>