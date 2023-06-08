<?php 
//Pricing Plan  Default Shorcode Styling Form
$pricingplanDefaults = kswr_shortcode_form_values('pricingplan');
$pricingplanSection = new kswr_global_section(
			$name = "Pricing Plan",
			$id = "pricingplan",
			$elements = 'prpl_name_fsize,prpl_name_fstyle,prpl_price_fsize,prpl_price_fstyle,prpl_unit_fsize,prpl_unit_fstyle,prpl_info_fsize,prpl_info_fstyle,prpl_name_color,prpl_price_color,prpl_unit_color,prpl_info_color,prpl_cnt_back,prpl_cnt_border,prpl_cnt_back_h,prpl_cnt_border_h,prpl_name_color_h,prpl_price_color_h,prpl_unit_color_h,prpl_info_color_h',
			$tabsname = array(
				array(
					'id'	=>	'typography',
					'name'	=>	'Typography',	
					'situation'	=>	'active'
				),
				array(
					'id'	=>	'colors',
					'name'	=>	'Colors',	
					'situation'	=>	'noactive'
				),
				array(
					'id'	=>	'colors',
					'name'	=>	'Hover Style',	
					'situation'	=>	'noactive'
				)
			),
			$sections = array(
				array(
					'id'	=>	'typography',
					'situation'	=>	'active',
					'form' => array(
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Name Font Settings','kaswara'),
							)
						),
						array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "prpl_name_fstyle",				           
					            "value" => $pricingplanDefaults['prpl_name_fstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "700", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Font Style','kaswara'),
								'description' => '',
				            )	
				        ),
				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "prpl_name_fsize",				           
					            "value" => $pricingplanDefaults['prpl_name_fsize'],
					            "defaults"=> array("font-size" => "15px", "line-height" => "", "letter-spacing" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing"            
					            ),
								'title' => esc_html__('Font Size','kaswara'),
								'description' => '',
				            )	
				        ),
				        array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Price Font Settings','kaswara'),
							)
						),
						array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "prpl_price_fstyle",				           
					            "value" => $pricingplanDefaults['prpl_price_fstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "600", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Font Style','kaswara'),
								'description' => '',
				            )	
				        ),
				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "prpl_price_fsize",				           
					            "value" => $pricingplanDefaults['prpl_price_fsize'],
					            "defaults"=> array("font-size" => "25px", "line-height" => "", "letter-spacing" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing"            
					            ),
								'title' => esc_html__('Font Size','kaswara'),
								'description' => '',
				            )	
				        ),
				        array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Unit Font Settings','kaswara'),
							)
						),
						array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "prpl_unit_fstyle",				           
					            "value" => $pricingplanDefaults['prpl_unit_fstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "600", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Font Style','kaswara'),
								'description' => '',
				            )	
				        ),
				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "prpl_unit_fsize",				           
					            "value" => $pricingplanDefaults['prpl_unit_fsize'],
					            "defaults"=> array("font-size" => "18px", "line-height" => "", "letter-spacing" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing"            
					            ),
								'title' => esc_html__('Font Size','kaswara'),
								'description' => '',
				            )	
				        ),
				         array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Info Font Settings','kaswara'),
							)
						),
						array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "prpl_info_fstyle",				           
					            "value" => $pricingplanDefaults['prpl_info_fstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Font Style','kaswara'),
								'description' => '',
				            )	
				        ),
				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "prpl_info_fsize",				           
					            "value" => $pricingplanDefaults['prpl_info_fsize'],
					            "defaults"=> array("font-size" => "14px", "line-height" => "", "letter-spacing" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing"            
					            ),
								'title' => esc_html__('Font Size','kaswara'),
								'description' => '',
				            )	
				        ),
					)
				),
				array(
					'id'	=>	'colors',
					'situation'	=>	'noactive',
					'form' => array(
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Colors Settings','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'prpl_name_color',
								'name' => 'prpl_name_color',
								'default' => '#333',
								'value' => $pricingplanDefaults['prpl_name_color'],
								'title' => esc_html__('Name Color','kaswara'),
								'description' => esc_html__('Plan name text color.','kaswara'),
							)
						),	
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'prpl_price_color',
								'name' => 'prpl_price_color',
								'default' => '{"type":"color", "color1":"#279eca", "color2":"#279eca", "direction":"to left"}',
								'value' => $pricingplanDefaults['prpl_price_color'],
								'title' => esc_html__('Price Color','kaswara'),
								'description' => esc_html__('Plan price text color.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'prpl_unit_color',
								'name' => 'prpl_unit_color',
								'default' => '{"type":"color", "color1":"#279eca", "color2":"#279eca", "direction":"to left"}',
								'value' => $pricingplanDefaults['prpl_unit_color'],
								'title' => esc_html__('Unit Color','kaswara'),
								'description' => esc_html__('Plan unit text color.','kaswara'),
							)
						),						
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'prpl_info_color',
								'name' => 'prpl_info_color',
								'default' => '#888',
								'value' => $pricingplanDefaults['prpl_info_color'],
								'title' => esc_html__('Info Color','kaswara'),
								'description' => esc_html__('Plan info text color.','kaswara'),
							)
						),	
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'prpl_cnt_back',
								'name' => 'prpl_cnt_back',
								'default' => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
								'value' => $pricingplanDefaults['prpl_cnt_back'],
								'title' => esc_html__('Container Background','kaswara'),
								'description' => esc_html__('Container background color style.','kaswara'),
							)
						),
						array(
							'type' => 'border',
							'values' => array(
								'id' => 'prpl_cnt_border',
								'bordergradient' => 'enable',
								'name' => 'prpl_cnt_border',
								'default' => '',
								'value' => $pricingplanDefaults['prpl_cnt_border'],
								'title' => esc_html__('Border Styling','kaswara'),
								'description' => esc_html__('Container border styling.','kaswara'),
							)
						),
						
					)
				),
				array(
					'id'	=>	'colorshover',
					'situation'	=>	'noactive',
					'form' => array(
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Colors On Hover Settings','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'prpl_name_color_h',
								'name' => 'prpl_name_color_h',
								'default' => '#333',
								'value' => $pricingplanDefaults['prpl_name_color_h'],
								'title' => esc_html__('Name Color','kaswara'),
								'description' => esc_html__('Plan name text color.','kaswara'),
							)
						),	
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'prpl_price_color_h',
								'name' => 'prpl_price_color_h',
								'default' => '{"type":"color", "color1":"#279eca", "color2":"#279eca", "direction":"to left"}',
								'value' => $pricingplanDefaults['prpl_price_color_h'],
								'title' => esc_html__('Price Color','kaswara'),
								'description' => esc_html__('Plan price text color.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'prpl_unit_color_h',
								'name' => 'prpl_unit_color_h',
								'default' => '{"type":"color", "color1":"#279eca", "color2":"#279eca", "direction":"to left"}',
								'value' => $pricingplanDefaults['prpl_unit_color_h'],
								'title' => esc_html__('Unit Color','kaswara'),
								'description' => esc_html__('Plan unit text color.','kaswara'),
							)
						),						
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'prpl_info_color_h',
								'name' => 'prpl_info_color_h',
								'default' => '#888',
								'value' => $pricingplanDefaults['prpl_info_color_h'],
								'title' => esc_html__('Info Color','kaswara'),
								'description' => esc_html__('Plan info text color.','kaswara'),
							)
						),	
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'prpl_cnt_back_h',
								'name' => 'prpl_cnt_back_h',
								'default' => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
								'value' => $pricingplanDefaults['prpl_cnt_back_h'],
								'title' => esc_html__('Container Background','kaswara'),
								'description' => esc_html__('Container background color style.','kaswara'),
							)
						),
						array(
							'type' => 'border',
							'values' => array(
								'bordergradient' => 'enable',
								'id' => 'prpl_cnt_border_h',
								'name' => 'prpl_cnt_border_h',
								'default' => '',
								'value' => $pricingplanDefaults['prpl_cnt_border_h'],
								'title' => esc_html__('Border Styling','kaswara'),
								'description' => esc_html__('Container border styling.','kaswara'),
							)
						),
						
					)
				)

				


			)
	);	
$pricingplanSection->create_maker();
?>