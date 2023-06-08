<?php 
//Modal Window Default Shorcode Styling Form
$dropcapsDefaults = kswr_shortcode_form_values('dropcaps');
$dropcapsSection = new kswr_global_section(
			$name = "Drop Caps",
			$id = "dropcaps",
			$elements = 'drpcp_letter_fstyle,drpcp_letter_fsize,drpcp_content_fstyle,drpcp_content_fsize,drpcp_letter_color,drpcp_letter_bgsize,drpcp_letter_br_radius,drpcp_letter_bgcolor,drpcp_letter_br_normal,drpcp_letter_br_top,drpcp_letter_br_bottom,drpcp_letter_br_left,drpcp_letter_br_right,drpcp_letter_margins',
			$tabsname = array(
				array(
					'id'	=>	'typography',
					'name'	=>	'Typography',	
					'situation'	=>	'active'
				),
				array(
					'id'	=>	'styling',
					'name'	=>	'Styling',	
					'situation'	=>	'noactive'
				),
				array(
					'id'	=>	'borders',
					'name'	=>	'Borders',	
					'situation'	=>	'noactive'
				)
			),
			$sections = array(
				array(
					'id'	=>	'typography',
					'situation'	=>	'active',
					'form' => array(
						//Letter Font Settings
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Letter Font Settings','kaswara'),
							)
						),
						array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "drpcp_letter_fstyle",				           
					            "value" => $dropcapsDefaults['drpcp_letter_fstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Letter Font Style','kaswara'),
								'description' => esc_html__('Apply values for the letter font.','kaswara'),
				            )	
				        ),
				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "drpcp_letter_fsize",				           
					            "value" => $dropcapsDefaults['drpcp_letter_fsize'],
					            "defaults"=> array("font-size" => "17px"),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size"
					            ),
								'title' => esc_html__('Letter Font Size','kaswara'),
								'description' => esc_html__('Apply values for the letter font size.','kaswara'),
				            )	
				        ),
				        array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'drpcp_letter_color',
								'name' => 'drpcp_letter_color',
								'default' => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
								'value' => $dropcapsDefaults['drpcp_letter_color'],
								'title' => esc_html__('Letter Color','kaswara'),
								'description' => esc_html__('Apply color for the letter cap.','kaswara'),
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
					            "name" => "drpcp_content_fstyle",				           
					            "value" => $dropcapsDefaults['drpcp_content_fstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Content Font Style','kaswara'),
								'description' => esc_html__('Apply values for the content font.','kaswara'),
				            )	
				        ),
				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "drpcp_content_fsize",				           
					            "value" => $dropcapsDefaults['drpcp_content_fsize'],
					            "defaults"=> array("font-size" => "14px"),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size"
					            ),
								'title' => esc_html__('Content Font Size','kaswara'),
								'description' => esc_html__('Apply values for the content font size.','kaswara'),
				            )	
				        ),

					)
				),
				array(
					'id'	=>	'styling',
					'situation'	=>	'noactive',
					'form' => array(
						//Background Sizing
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Background Settings','kaswara'),
							)
						),	
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'drpcp_letter_bgsize',
								'name' => 'drpcp_letter_bgsize',
								'default' => 35,
								'value' => $dropcapsDefaults['drpcp_letter_bgsize'],
								'title' => esc_html__('Background Size (px)','kaswara'),
								'description' => esc_html__('Choose the background size.','kaswara'),
							)
						),
						array(
				            "type" => "distance",
				            "values" => array(
					            "distance" => "margin",            
					            "id" => "drpcp_letter_margins",	
					            'default' => 'margin-top:0px; margin-bottom:0px; margin-right:0px; margin-left:0px;',			         
								'value' => $dropcapsDefaults['drpcp_letter_margins'],
					            "name" => "drpcp_letter_margins",				         
					            "title" => esc_html__( "Letter Margins", "kaswara" ),
								'description' => esc_html__('Apply margins for the caps element','kaswara'),    
					            "positions" => array(
					                 esc_html__("Top","kameleon") => "top",
					                 esc_html__("Left","kameleon") => "left",
					                 esc_html__("Right","kameleon") => "right",
					                 esc_html__("Bottom","kameleon") => "bottom"
					            ),
				            )				         
				        ),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'drpcp_letter_br_radius',
								'name' => 'drpcp_letter_br_radius',
								'default' => 35,
								'value' => $dropcapsDefaults['drpcp_letter_br_radius'],
								'title' => esc_html__('Border Radius (px)','kaswara'),
								'description' => esc_html__('Choose the border radius.','kaswara'),
							)
						),
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Settings For Background Color','kaswara'),
							)
						),	
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'drpcp_letter_bgcolor',
								'name' => 'drpcp_letter_bgcolor',
								'default' => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
								'value' => $dropcapsDefaults['drpcp_letter_bgcolor'],
								'title' => esc_html__('Background Color','kaswara'),
								'description' => esc_html__('Apply color for the element background.','kaswara'),
							)
						),
					)
				),
				array(
					'id'	=>	'borders',
					'situation'	=>	'noactive',
					'form' => array(
						//Border Settings
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Bodrer Settings','kaswara'),
							)
						),
						array(
							'type' => 'border',
							'values' => array(
								'bordergradient' => 'enable',
								'id' => 'drpcp_letter_br_normal',
								'name' => 'drpcp_letter_br_normal',
								'default' => '',
								'value' => $dropcapsDefaults['drpcp_letter_br_normal'],
								'title' => esc_html__('Border Settings','kaswara'),
								'description' => esc_html__('Border Settings.','kaswara'),
							)
						),
						 //Advanced Border Settings
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Advanced Bodrer Settings','kaswara'),
							)
						),
						array(
							'type' => 'border',
							'values' => array(
								'id' => 'drpcp_letter_br_top',
								'name' => 'drpcp_letter_br_top',
								'default' => '',
								'value' => $dropcapsDefaults['drpcp_letter_br_top'],
								'title' => esc_html__('Border Top','kaswara'),
								'description' => esc_html__('Border top settings.','kaswara'),
							)
						),
						array(
							'type' => 'border',
							'values' => array(
								'id' => 'drpcp_letter_br_left',
								'name' => 'drpcp_letter_br_left',
								'default' => '',
								'value' => $dropcapsDefaults['drpcp_letter_br_left'],
								'title' => esc_html__('Border Left','kaswara'),
								'description' => esc_html__('Border Left settings.','kaswara'),
							)
						),
						array(
							'type' => 'border',
							'values' => array(
								'id' => 'drpcp_letter_br_bottom',
								'name' => 'drpcp_letter_br_bottom',
								'default' => '',
								'value' => $dropcapsDefaults['drpcp_letter_br_bottom'],
								'title' => esc_html__('Border Bottom','kaswara'),
								'description' => esc_html__('Border bottom settings.','kaswara'),
							)
						),
						array(
							'type' => 'border',
							'values' => array(
								'id' => 'drpcp_letter_br_right',
								'name' => 'drpcp_letter_br_right',
								'default' => '',
								'value' => $dropcapsDefaults['drpcp_letter_br_right'],
								'title' => esc_html__('Border Right','kaswara'),
								'description' => esc_html__('Border right settings.','kaswara'),
							)
						),

					)
				),


			)
	);	
$dropcapsSection->create_maker();
?>