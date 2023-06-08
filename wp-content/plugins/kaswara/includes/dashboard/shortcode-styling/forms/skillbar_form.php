<?php 
//Skillbar Default Shorcode Styling Form
$skillbarDefaults = kswr_shortcode_form_values('skillbar');
$skillbarSection = new kswr_global_section(
			$name = "Skill Bar",
			$id = "skillbar",
			$elements = 'skl_bar_bg_color,skl_bar_color,skl_radius,skl_height,skl_style,skl_strips,skl_title_color,skl_font_style,skl_font_sizes',
			$tabsname = array(
				array(
					'id'	=>	'general',
					'name'	=>	'general',	
					'situation'	=>	'active'
				),
				array(
					'id'	=>	'typography',
					'name'	=>	'typography',	
					'situation'	=>	'noactive'
				)	
			),
			$sections = array(
				array(
					'id'	=>	'general',
					'situation'	=>	'active',
					'form' => array(
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'skl_bar_bg_color',
								'name' => 'skl_bar_bg_color',
								'default' => '#f6f6f6',
								'value' => $skillbarDefaults['skl_bar_bg_color'],
								'title' => esc_html__('Background Color','kaswara'),
								'description' => esc_html__('Apply color for the bar background.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'skl_bar_color',
								'name' => 'skl_bar_color',
								'default' => '{"type":"color", "color1":"#00AFD1", "color2":"#00AFD1", "direction":"to left"}',
								'value' => $skillbarDefaults['skl_bar_color'],
								'title' => esc_html__('Bar Color','kaswara'),
								'description' => esc_html__('Apply color for the bar value.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'skl_radius',
								'name' => 'skl_radius',
								'default' => 0,
								'value' => $skillbarDefaults['skl_radius'],
								'title' => esc_html__('Bar Radius','kaswara'),
								'description' => esc_html__('Apply a border radius for the bar.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'skl_height',
								'name' => 'skl_height',
								'default' => 5,
								'value' => $skillbarDefaults['skl_height'],
								'title' => esc_html__('Bar Height (px)','kaswara'),
								'description' => esc_html__('Bar element height.','kaswara'),
							)
						),

						array(
				            'type' => 'select',
				            'values' => array(					            
					            'name' => 'skl_style',
					            'value' => $skillbarDefaults['skl_style'],
					            'default' => 'style_1',
					            'options' => array(
					                'style_1' => esc_html__("Style 1",'kaswara'),
					                'style_2' => esc_html__("Style 2",'kaswara'),
					                'style_3' => esc_html__("Style 3",'kaswara'),
					            ),
					            'title' => esc_html__('Bar Style','kaswara'),
								'description' => esc_html__('Choose the bar element styling.','kaswara'),    
				            )  
				        ),
						array(
				            'type' => 'select',
				            'values' => array(					            
					            'name' => 'skl_strips',
					            'default' => 'none',					            
					            'value' => $skillbarDefaults['skl_strips'],
					            'options' => array(
					                'none' 	 => esc_html__("None",'kaswara') ,
					                'normal' => esc_html__("Normal Strips",'kaswara'),
					                'moving' => esc_html__("Moving Strips",'kaswara') ,
					            ),
					            'title' => esc_html__('Bar Strips','kaswara'),
								'description' => esc_html__('Choose the bar element strips styling.','kaswara'),    
				            )  
				        ),
					)
				),
				array(
					'id'	=>	'typography',
					'situation'	=>	'noactive',
					'form' => array(
						
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'skl_title_color',
								'name' => 'skl_title_color',
								'default' => '#333',
								'value' => $skillbarDefaults['skl_title_color'],
								'title' => esc_html__('Title Color','kaswara'),
								'description' => esc_html__('Apply color for the skill name.','kaswara'),
							)
						),

						array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "skl_font_style",				           
					            "value" => $skillbarDefaults['skl_font_style'],
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
					            "name" => "skl_font_sizes",				           
					            "value" => $skillbarDefaults['skl_font_sizes'],
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


					)
				)
			)
);

$skillbarSection->create_maker();

?>