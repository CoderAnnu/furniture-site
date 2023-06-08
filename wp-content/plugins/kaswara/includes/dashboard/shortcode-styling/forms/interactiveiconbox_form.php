<?php 
//INteractive ICon Box Default Shorcode Styling Form
$interactiveiconboxDefaults = kswr_shortcode_form_values('interactiveiconbox');
$interactiveiconboxSection = new kswr_global_section(
			$name = "Interactive Icon Box",
			$id = "interactiveiconbox",
			$elements = 'iib_title_font_size,iib_title_font_style,iib_subtitle_font_size,iib_subtitle_font_style,iib_info_font_size,iib_info_font_style',
			$tabsname = array(
				array(
					'id'	=>	'interactiveiconbox',
					'name'	=>	'Typography',	
					'situation'	=>	'active'
				)
			),
			$sections = array(
				array(
					'id'	=>	'interactiveiconbox',
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
					            "name" => "iib_title_font_style",				           
					            "value" => $interactiveiconboxDefaults['iib_title_font_style'],
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
					            "name" => "iib_title_font_size",				           
					            "value" => $interactiveiconboxDefaults['iib_title_font_size'],
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
					            "name" => "iib_subtitle_font_style",				           
					            "value" => $interactiveiconboxDefaults['iib_subtitle_font_style'],
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
					            "name" => "iib_subtitle_font_size",				           
					            "value" => $interactiveiconboxDefaults['iib_subtitle_font_size'],
					            "defaults"=> array("font-size" => "14px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
					            "name" => "iib_info_font_style",				           
					            "value" => $interactiveiconboxDefaults['iib_info_font_style'],
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
					            "name" => "iib_info_font_size",				           
					            "value" => $interactiveiconboxDefaults['iib_info_font_size'],
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
				)


			)
	);	
$interactiveiconboxSection->create_maker();
?>