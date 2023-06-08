<?php 
//Card Flip Default Shorcode Styling Form
$cardflipDefaults = kswr_shortcode_form_values('cardflip');
$cardflipSection = new kswr_global_section(
			$name = "Card Flip",
			$id = "cardflip",
			$elements = 'cflp_front_background,cflp_front_border,cflp_front_title_color,cflp_front_subtitle_color,cflp_icon_color,cflp_icon_bgcolor,cflp_icon_size,cflp_icon_bgsize,cflp_icon_br,cflp_icon_br_radius,cflp_back_background,cflp_back_border,cflp_back_title_color,cflp_back_subtitle_color,cflp_back_button_color,cflp_back_button_bgcolor,cflp_back_button_border,cflp_back_button_br_radius,cflp_front_title_fsize,cflp_front_title_fstyle,cflp_front_subtitle_fsize,cflp_front_subtitle_fstyle,cflp_back_title_fsize,cflp_back_title_fstyle,cflp_back_subtitle_fsize,cflp_back_subtitle_fstyle,cflp_back_button_fsize,cflp_back_button_fstyle,cflp_back_button_height',
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
								'id' => 'cflp_front_background',
								'name' => 'cflp_front_background',
								'default' => '{"type":"color", "color1":"#fafafa", "color2":"transparent", "direction":"to left"}',
								'value' => $cardflipDefaults['cflp_front_background'],
								'title' => esc_html__('Container Background','kaswara'),
								'description' => esc_html__('Apply background color for the front container.','kaswara'),
							)
						),
						array(
							'type' => 'border',
							'values' => array(
								'id' => 'cflp_front_border',
								'bordergradient' => 'enable',
								'name' => 'cflp_front_border',
								'default' => '',
								'value' => $cardflipDefaults['cflp_front_border'],
								'title' => esc_html__('Container Border Styling','kaswara'),
								'description' => esc_html__('Front container border styling.','kaswara'),
							)
						),

						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'cflp_front_title_color',
								'name' => 'cflp_front_title_color',
								'default' => '#333',
								'value' => $cardflipDefaults['cflp_front_title_color'],
								'title' => esc_html__('Title Color','kaswara'),
								'description' => esc_html__('Apply color for the title.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'cflp_front_subtitle_color',
								'name' => 'cflp_front_subtitle_color',
								'default' => '#333',
								'value' => $cardflipDefaults['cflp_front_subtitle_color'],
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
								'id' => 'cflp_icon_size',
								'name' => 'cflp_icon_size',
								'default' => 32,
								'value' => $cardflipDefaults['cflp_icon_size'],
								'title' => esc_html__('Icon Size (px)','kaswara'),
								'description' => esc_html__('Choose the icon size.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'cflp_icon_bgsize',
								'name' => 'cflp_icon_bgsize',
								'default' => 32,
								'value' => $cardflipDefaults['cflp_icon_bgsize'],
								'title' => esc_html__('Icon Background Size (px)','kaswara'),
								'description' => esc_html__('Choose the icon background size.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'cflp_icon_color',
								'name' => 'cflp_icon_color',
								'default' => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
								'value' => $cardflipDefaults['cflp_icon_color'],
								'title' => esc_html__('Icon Color','kaswara'),
								'description' => esc_html__('Apply color for the icon.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'cflp_icon_bgcolor',
								'name' => 'cflp_icon_bgcolor',
								'default' => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
								'value' => $cardflipDefaults['cflp_icon_bgcolor'],
								'title' => esc_html__('Icon Background Color','kaswara'),
								'description' => esc_html__('Apply background color for the icon.','kaswara'),
							)
						),
						array(
							'type' => 'border',
							'values' => array(
								'id' => 'cflp_icon_br',
								'bordergradient' => 'noenable',
								'name' => 'cflp_icon_br',
								'default' => '',
								'value' => $cardflipDefaults['cflp_icon_br'],
								'title' => esc_html__('Icon Border Styling','kaswara'),
								'description' => esc_html__('Apply settings icon border styling.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'cflp_icon_br_radius',
								'name' => 'cflp_icon_br_radius',
								'default' => 0,
								'value' => $cardflipDefaults['cflp_icon_br_radius'],
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
								'id' => 'cflp_back_background',
								'name' => 'cflp_back_background',
								'default' => '{"type":"color", "color1":"#fafafa", "color2":"transparent", "direction":"to left"}',
								'value' => $cardflipDefaults['cflp_back_background'],
								'title' => esc_html__('Container Background','kaswara'),
								'description' => esc_html__('Apply background color for the front container.','kaswara'),
							)
						),
						array(
							'type' => 'border',
							'values' => array(
								'id' => 'cflp_back_border',
								'bordergradient' => 'enable',
								'name' => 'cflp_back_border',
								'default' => '',
								'value' => $cardflipDefaults['cflp_back_border'],
								'title' => esc_html__('Container Border Styling','kaswara'),
								'description' => esc_html__('Front container border styling.','kaswara'),
							)
						),

						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'cflp_back_title_color',
								'name' => 'cflp_back_title_color',
								'default' => '#333',
								'value' => $cardflipDefaults['cflp_back_title_color'],
								'title' => esc_html__('Title Color','kaswara'),
								'description' => esc_html__('Apply color for the title.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'cflp_back_subtitle_color',
								'name' => 'cflp_back_subtitle_color',
								'default' => '#333',
								'value' => $cardflipDefaults['cflp_back_subtitle_color'],
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
								'id' => 'cflp_back_button_height',
								'name' => 'cflp_back_button_height',
								'default' => 45,
								'value' => $cardflipDefaults['cflp_back_button_height'],
								'title' => esc_html__('Icon Size (px)','kaswara'),
								'description' => esc_html__('Choose the icon size.','kaswara'),
							)
						),
		
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'cflp_back_button_color',
								'name' => 'cflp_back_button_color',
								'default' => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
								'value' => $cardflipDefaults['cflp_back_button_color'],
								'title' => esc_html__('Button Text Color','kaswara'),
								'description' => esc_html__('Apply color for the button.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'cflp_back_button_bgcolor',
								'name' => 'cflp_back_button_bgcolor',
								'default' => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
								'value' => $cardflipDefaults['cflp_back_button_bgcolor'],
								'title' => esc_html__('Button Background Color','kaswara'),
								'description' => esc_html__('Apply background color for the button.','kaswara'),
							)
						),
						array(
							'type' => 'border',
							'values' => array(
								'id' => 'cflp_back_button_border',
								'bordergradient' => 'enable',
								'name' => 'cflp_back_button_border',
								'default' => '',
								'value' => $cardflipDefaults['cflp_back_button_border'],
								'title' => esc_html__('Button Border Styling','kaswara'),
								'description' => esc_html__('Apply settings button border styling.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'cflp_back_button_br_radius',
								'name' => 'cflp_back_button_br_radius',
								'default' => 0,
								'value' => $cardflipDefaults['cflp_back_button_br_radius'],
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
					            "name" => "cflp_front_title_fstyle",				           
					            "value" => $cardflipDefaults['cflp_front_title_fstyle'],
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
					            "name" => "cflp_front_title_fsize",				           
					            "value" => $cardflipDefaults['cflp_front_title_fsize'],
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
					            "name" => "cflp_front_subtitle_fstyle",				           
					            "value" => $cardflipDefaults['cflp_front_subtitle_fstyle'],
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
					            "name" => "cflp_front_subtitle_fsize",				           
					            "value" => $cardflipDefaults['cflp_front_subtitle_fsize'],
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
					            "name" => "cflp_back_title_fstyle",				           
					            "value" => $cardflipDefaults['cflp_back_title_fstyle'],
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
					            "name" => "cflp_back_title_fsize",				           
					            "value" => $cardflipDefaults['cflp_back_title_fsize'],
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
					            "name" => "cflp_back_subtitle_fstyle",				           
					            "value" => $cardflipDefaults['cflp_back_subtitle_fstyle'],
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
					            "name" => "cflp_back_subtitle_fsize",				           
					            "value" => $cardflipDefaults['cflp_back_subtitle_fsize'],
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
					            "name" => "cflp_back_button_fstyle",				           
					            "value" => $cardflipDefaults['cflp_back_button_fstyle'],
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
					            "name" => "cflp_back_button_fsize",				           
					            "value" => $cardflipDefaults['cflp_back_button_fsize'],
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
$cardflipSection->create_maker();
?>