<?php 
//Alert Box  Default Shorcode Styling Form
$alertboxDefaults = kswr_shortcode_form_values('alertbox');
$alertboxSection = new kswr_global_section(
			$name = "Alert Box",
			$id = "alertbox",
			$elements = 'albx_title_ftsize,albx_title_ftstyle,albx_message_ftsize,albx_message_ftstyle',
			$tabsname = array(
				array(
					'id'	=>	'alrtbox',
					'name'	=>	'Typography',	
					'situation'	=>	'active'
				)
			),
			$sections = array(
				array(
					'id'	=>	'alrtbox',
					'situation'	=>	'active',
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
					            "name" => "albx_title_ftstyle",				           
					            "value" => $alertboxDefaults['albx_title_ftstyle'],
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
					            "name" => "albx_title_ftsize",				           
					            "value" => $alertboxDefaults['albx_title_ftsize'],
					            "defaults"=> array("font-size" => "16px","letter-spacing" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",					               
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing",                					                					                
					            ),
								'title' => esc_html__('Title Font Size','kaswara'),
								'description' => esc_html__('Apply values for the title font size.','kaswara'),
				            )	
				        ),

				        array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Message Font Settings','kaswara'),
							)
						),	
				        array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "albx_message_ftstyle",				           
					            "value" => $alertboxDefaults['albx_message_ftstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Message Font Style','kaswara'),
								'description' => esc_html__('Apply values for the message font.','kaswara'),
				            )	
				        ),
				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "albx_message_ftsize",				           
					            "value" => $alertboxDefaults['albx_message_ftsize'],
					            "defaults"=> array("font-size" => "13px", "letter-spacing" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height"               
					            ),
								'title' => esc_html__('Message Font Size','kaswara'),
								'description' => esc_html__('Apply values for the message font size.','kaswara'),
				            )	
				        ),


					)
				)


			)
	);	
$alertboxSection->create_maker();
?>