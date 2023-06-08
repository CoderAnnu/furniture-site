<?php 
//Radial Progress Default Shorcode Styling Form
$radialprogressDefaults = kswr_shortcode_form_values('radialprogress');
$radialprogressSection = new kswr_global_section(
			$name = "Radial Progress",
			$id = "radialprogress",
			$elements = 'rad_content_background,rad_content_color,rad_content_fontsize,rad_content_fontstyle,rad_size,rad_border_size,rad_border_color,rad_color,radial_position',
			$tabsname = array(
				array(
					'id'	=>	'content',
					'name'	=>	'content',	
					'situation'	=>	'active'
				),
				array(
					'id'	=>	'radialcircle',
					'name'	=>	'radial circle',	
					'situation'	=>	'noactive'
				)	
			),
			$sections = array(
				array(
					'id'	=>	'content',
					'situation'	=>	'active',
					'form' => array(
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'rad_content_background',
								'name' => 'rad_content_background',
								'default' => '#fafafe',
								'value' => $radialprogressDefaults['rad_content_background'],
								'title' => esc_html__('Content Background','kaswara'),
								'description' => esc_html__('Apply color for the content background.','kaswara'),
							)
						),	
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'rad_content_color',
								'name' => 'rad_content_color',
								'default' => '#444',
								'value' => $radialprogressDefaults['rad_content_color'],
								'title' => esc_html__('Content Color','kaswara'),
								'description' => esc_html__('Apply color for the content.','kaswara'),
							)
						),	
						array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "rad_content_fontstyle",				           
					            "value" => $radialprogressDefaults['rad_content_fontstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Font Style','kaswara'),
								'description' => esc_html__('Apply font values.','kaswara'),
				            )	
				        ),

				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "rad_content_fontsize",				           
					            "value" => $radialprogressDefaults['rad_content_fontsize'],
					            "defaults"=> array("font-size" => "16px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
				),
				array(
					'id'	=>	'radialcircle',
					'situation'	=>	'noactive',
					'form' => array(
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'rad_size',
								'name' => 'rad_size',
								'default' => 150,
								'value' => $radialprogressDefaults['rad_size'],
								'title' => esc_html__('Radial Size','kaswara'),
								'description' => esc_html__('Choose the size of your element.','kaswara'),
							)
						),	
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'rad_border_size',
								'name' => 'rad_border_size',
								'default' => 150,
								'value' => $radialprogressDefaults['rad_border_size'],
								'title' => esc_html__('Border Size','kaswara'),
								'description' => esc_html__('Choose the border size of your element.','kaswara'),
							)
						),	
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'rad_border_color',
								'name' => 'rad_border_color',
								'default' => '#eee',
								'value' => $radialprogressDefaults['rad_border_color'],
								'title' => esc_html__('Border Color','kaswara'),
								'description' => esc_html__('Apply color for radial border.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'rad_color',
								'name' => 'rad_color',
								'default' => '#289fca',
								'value' => $radialprogressDefaults['rad_color'],
								'title' => esc_html__('Radial Color','kaswara'),
								'description' => esc_html__('Apply color for radial.','kaswara'),
							)
						),
						array(
				            'type' => 'select',
				            'values' => array(					            
					            'name' => 'radial_position',
					            'value' => $radialprogressDefaults['radial_position'],
					            'default' => 'center',
					            'options' => array(
					                'center' => esc_html__("Center",'kaswara'),
					                'left' => esc_html__("Left",'kaswara'),
					                'right' => esc_html__("Right",'kaswara'),
					            ),
					            'title' => esc_html__('Element Position','kaswara'),
								'description' => esc_html__('Choose the bar element styling.','kaswara'),    
				            )  
				        )						
					)
				)

			)
);
$radialprogressSection->create_maker();

?>