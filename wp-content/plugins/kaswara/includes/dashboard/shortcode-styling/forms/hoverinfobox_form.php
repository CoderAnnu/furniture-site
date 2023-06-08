<?php 
//Card Flip Default Shorcode Styling Form
$hoverinfoboxDefaults = kswr_shortcode_form_values('hoverinfobox');
$hoverinfoboxSection = new kswr_global_section(
			$name = "Hover Info Box",
			$id = "hoverinfobox",
			$elements = 'hvbx_icon_size,hvbx_title_fsize,hvbx_title_fstyle,hvbx_subtitle_fstyle,hvbx_subtitle_fsize,hvbx_content_fstyle,hvbx_content_fsize,hvbx_container_clr_r,hvbx_container_br_r,hvbx_icon_clr_r,hvbx_title_clr_r,hvbx_subtitle_clr_r,hvbx_content_clr_r,hvbx_container_clr_h,hvbx_container_br_h,hvbx_icon_clr_h,hvbx_title_clr_h,hvbx_subtitle_clr_h,hvbx_content_clr_h',
			$tabsname = array(				
				array(
					'id'	=>	'colors',
					'name'	=>	'Colors',	
					'situation'	=>	'active'
				),
				array(
					'id'	=>	'hover',
					'name'	=>	'Hover',	
					'situation'	=>	'noactive'
				),
				array(
					'id'	=>	'sizes',
					'name'	=>	'Sizes',	
					'situation'	=>	'noactive'
				)
			),
			$sections = array(
				//Sizes
				array(
					'id'	=>	'sizes',
					'situation'	=>	'noactive',
					'form' => array(
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Icon Size Settings','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'hvbx_icon_size',
								'name' => 'hvbx_icon_size',
								'default' => 36,
								'value' => $hoverinfoboxDefaults['hvbx_icon_size'],
								'title' => esc_html__('Icon Size (px)','kaswara'),
								'description' => esc_html__('Choose the icon size.','kaswara'),
							)
						),
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Title Font Settings','kaswara'),
							)
						),
						array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "hvbx_title_fstyle",				           
					            "value" => $hoverinfoboxDefaults['hvbx_title_fstyle'],
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
					            "name" => "hvbx_title_fsize",				           
					            "value" => $hoverinfoboxDefaults['hvbx_title_fsize'],
					            "defaults"=> array("font-size" => "22px", "line-height" => "", "letter-spacing" => ""),
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
								'description' => esc_html__('Sub Title Font Settings','kaswara'),
							)
						),
						array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "hvbx_subtitle_fstyle",				           
					            "value" => $hoverinfoboxDefaults['hvbx_subtitle_fstyle'],
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
					            "name" => "hvbx_subtitle_fsize",				           
					            "value" => $hoverinfoboxDefaults['hvbx_subtitle_fsize'],
					            "defaults"=> array("font-size" => "14px", "line-height" => "", "letter-spacing" => ""),
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
								'description' => esc_html__('Content Font Settings','kaswara'),
							)
						),
						array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "hvbx_content_fstyle",				           
					            "value" => $hoverinfoboxDefaults['hvbx_content_fstyle'],
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
					            "name" => "hvbx_content_fsize",				           
					            "value" => $hoverinfoboxDefaults['hvbx_content_fsize'],
					            "defaults"=> array("font-size" => "15px", "line-height" => "", "letter-spacing" => ""),
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

				//Colors
				array(
					'id'	=>	'colors',
					'situation'	=>	'active',
					'form' => array(
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Normal Container Colors','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'hvbx_container_clr_r',
								'name' => 'hvbx_container_clr_r',
								'default' => '{"type":"color", "color1":"#f7f7f7", "color2":"#f7f7f7", "direction":"to left"}',
								'value' => $hoverinfoboxDefaults['hvbx_container_clr_r'],
								'title' => esc_html__('Container Background','kaswara'),
								'description' => esc_html__('Apply background color for the container.','kaswara'),
							)
						),
						array(
							'type' => 'border',
							'values' => array(
								'id' => 'hvbx_container_br_r',
								'bordergradient' => 'noenable',
								'name' => 'hvbx_container_br_r',
								'default' => '',
								'value' => $hoverinfoboxDefaults['hvbx_container_br_r'],
								'title' => esc_html__('Container Border Styling','kaswara'),
								'description' => esc_html__('Apply settings container border styling.','kaswara'),
							)
						),

						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'hvbx_icon_clr_r',
								'name' => 'hvbx_icon_clr_r',
								'default' => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
								'value' => $hoverinfoboxDefaults['hvbx_icon_clr_r'],
								'title' => esc_html__('Icon Color','kaswara'),
								'description' => esc_html__('Apply icon color.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'hvbx_title_clr_r',
								'name' => 'hvbx_title_clr_r',
								'default' => '#333',
								'value' => $hoverinfoboxDefaults['hvbx_title_clr_r'],
								'title' => esc_html__('Title Color','kaswara'),
								'description' => esc_html__('Apply color for the title.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'hvbx_subtitle_clr_r',
								'name' => 'hvbx_subtitle_clr_r',
								'default' => '#888',
								'value' => $hoverinfoboxDefaults['hvbx_subtitle_clr_r'],
								'title' => esc_html__('Sub Title Color','kaswara'),
								'description' => esc_html__('Apply color for the subtitle.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'hvbx_content_clr_r',
								'name' => 'hvbx_content_clr_r',
								'default' => '#555',
								'value' => $hoverinfoboxDefaults['hvbx_content_clr_r'],
								'title' => esc_html__('Content Color','kaswara'),
								'description' => esc_html__('Apply color for the content.','kaswara'),
							)
						),


					)
				),
				//Hover
				array(
					'id'	=>	'hover',
					'situation'	=>	'noactive',
					'form' => array(
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Hover Container Colors','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'hvbx_container_clr_h',
								'name' => 'hvbx_container_clr_h',
								'default' => '{"type":"color", "color1":"#269AD6", "color2":"#269AD6", "direction":"to left"}',
								'value' => $hoverinfoboxDefaults['hvbx_container_clr_h'],
								'title' => esc_html__('Container Background','kaswara'),
								'description' => esc_html__('Apply background color for the container.','kaswara'),
							)
						),
						array(
							'type' => 'border',
							'values' => array(
								'id' => 'hvbx_container_br_h',
								'bordergradient' => 'noenable',
								'name' => 'hvbx_container_br_h',
								'default' => '',
								'value' => $hoverinfoboxDefaults['hvbx_container_br_h'],
								'title' => esc_html__('Container Border Styling','kaswara'),
								'description' => esc_html__('Apply settings container border styling.','kaswara'),
							)
						),

						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'hvbx_icon_clr_h',
								'name' => 'hvbx_icon_clr_h',
								'default' => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
								'value' => $hoverinfoboxDefaults['hvbx_icon_clr_h'],
								'title' => esc_html__('Icon Color','kaswara'),
								'description' => esc_html__('Apply icon color.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'hvbx_title_clr_h',
								'name' => 'hvbx_title_clr_h',
								'default' => '#fff',
								'value' => $hoverinfoboxDefaults['hvbx_title_clr_h'],
								'title' => esc_html__('Title Color','kaswara'),
								'description' => esc_html__('Apply color for the title.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'hvbx_subtitle_clr_h',
								'name' => 'hvbx_subtitle_clr_h',
								'default' => '#f4f4f4',
								'value' => $hoverinfoboxDefaults['hvbx_subtitle_clr_h'],
								'title' => esc_html__('Sub Title Color','kaswara'),
								'description' => esc_html__('Apply color for the subtitle.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'hvbx_content_clr_h',
								'name' => 'hvbx_content_clr_h',
								'default' => '#fff',
								'value' => $hoverinfoboxDefaults['hvbx_content_clr_h'],
								'title' => esc_html__('Content Color','kaswara'),
								'description' => esc_html__('Apply color for the content.','kaswara'),
							)
						),


					)
				)


			)
	);	
$hoverinfoboxSection->create_maker();
?>