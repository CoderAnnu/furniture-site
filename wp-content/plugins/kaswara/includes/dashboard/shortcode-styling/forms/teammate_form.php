<?php 
//Team MAte Default Shorcode Styling Form
$teammateDefaults = kswr_shortcode_form_values('teammate');
$teammateSection = new kswr_global_section(
			$name = "Team Mate",
			$id = "teammate",
			$elements = 'tmmate_name_color,tmmate_name_ftsize,tmmate_name_ftstyle,tmmate_position_ftsize,tmmate_position_ftstyle,tmmate_position_color,tmmate_scl_color',
			$tabsname = array(
				array(
					'id'	=>	'teammate',
					'name'	=>	'General',	
					'situation'	=>	'active'
				)
			),
			$sections = array(
				array(
					'id'	=>	'teammate',
					'situation'	=>	'active',
					'form' => array(
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Name Settings','kaswara'),
							)
						),	
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'tmmate_name_color',
								'name' => 'tmmate_name_color',
								'default' => '#333',
								'value' => $teammateDefaults['tmmate_name_color'],
								'title' => esc_html__('Name Text Color','kaswara'),
								'description' => esc_html__('Apply color for the team mate name.','kaswara'),
							)
						),
						 array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "tmmate_name_ftstyle",				           
					            "value" => $teammateDefaults['tmmate_name_ftstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Name Font Style','kaswara'),
								'description' => esc_html__('Apply values for the name font.','kaswara'),
				            )	
				        ),

				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "tmmate_name_ftsize",				           
					            "value" => $teammateDefaults['tmmate_name_ftsize'],
					            "defaults"=> array("font-size" => "17px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
					               esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
					               esc_html__("Phone Font Size","kaswara") => "--phone-font-size",                
					            ),
								'title' => esc_html__('Name Font Size','kaswara'),
								'description' => esc_html__('Apply values for the name font size.','kaswara'),
				            )	
				        ),
				        //Position
				        array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Position Settings','kaswara'),
							)
						),	
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'tmmate_position_color',
								'name' => 'tmmate_position_color',
								'default' => '#888',
								'value' => $teammateDefaults['tmmate_position_color'],
								'title' => esc_html__('Position Text Color','kaswara'),
								'description' => esc_html__('Apply color for the team mate position.','kaswara'),
							)
						),
						 array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "tmmate_position_ftstyle",				           
					            "value" => $teammateDefaults['tmmate_position_ftstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Position Font Style','kaswara'),
								'description' => esc_html__('Apply values for the position font.','kaswara'),
				            )	
				        ),

				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "tmmate_position_ftsize",				           
					            "value" => $teammateDefaults['tmmate_position_ftsize'],
					            "defaults"=> array("font-size" => "14px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
					               esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
					               esc_html__("Phone Font Size","kaswara") => "--phone-font-size",                
					            ),
								'title' => esc_html__('Position Font Size','kaswara'),
								'description' => esc_html__('Apply values for the position font size.','kaswara'),
				            )	
				        ),
				        //Social
				        array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Social Settings','kaswara'),
							)
						),	
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'tmmate_scl_color',
								'name' => 'tmmate_scl_color',
								'default' => '#666',
								'value' => $teammateDefaults['tmmate_scl_color'],
								'title' => esc_html__('Social Icon Color','kaswara'),
								'description' => esc_html__('Apply color for teammate social profile icons.','kaswara'),
							)
						),


					)
				)


			)
	);	
$teammateSection->create_maker();
?>