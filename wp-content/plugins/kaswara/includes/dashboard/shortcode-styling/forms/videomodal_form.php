<?php 
//Video Modal Default Shorcode Styling Form
$videomodalDefaults = kswr_shortcode_form_values('videomodal');
$videomodalSection = new kswr_global_section(
			$name = "Video Modal",
			$id = "videomodal",
			$elements = 'modalv_overlay_bg,modalv_iframew,modalv_iframeh,modalv_close_color,modalv_close_bg,modalv_btn_width,modalv_btn_height,modalv_btn_border_radius,modalv_btn_align,modalv_btn_margins,modalv_btn_bg,modalv_btn_bg_hover,modalv_btn_clr,modalv_btn_clr_hover,modalv_btn_ftsize,modalv_btn_ftstyle,modalv_btn_paddings,modalv_btn_bdr,modalv_btn_bdr_hover,modalv_btn_icon_position,modalv_btn_icon_clr,modalv_btn_icon_clr_hover,modalv_btn_icon_size,modalv_btn_icon_paddings',
			$tabsname = array(
				array(
					'id'	=>	'general',
					'name'	=>	'general',	
					'situation'	=>	'active'
				),
				array(
					'id'	=>	'btntrigger',
					'name'	=>	'Button Trigger',	
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
								'id' => 'modalv_overlay_bg',
								'name' => 'modalv_overlay_bg',
								'default' => 'rgba(0,0,0,0.7)',
								'value' => $videomodalDefaults['modalv_overlay_bg'],
								'title' => esc_html__('Overlay Background','kaswara'),
								'description' => esc_html__('Apply color for the outside overlay.','kaswara'),
							)
						),	
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'modalv_iframew',
								'name' => 'modalv_iframew',
								'default' => 750,
								'value' => $videomodalDefaults['modalv_iframew'],
								'title' => esc_html__('Modal Width (px)','kaswara'),
								'description' => esc_html__('Choose the width of your element.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'modalv_iframeh',
								'name' => 'modalv_iframeh',
								'default' => 450,
								'value' => $videomodalDefaults['modalv_iframeh'],
								'title' => esc_html__('Modal Height (px)','kaswara'),
								'description' => esc_html__('Choose the height of your element.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'modalv_close_color',
								'name' => 'modalv_close_color',
								'default' => '#eee',
								'value' => $videomodalDefaults['modalv_close_color'],
								'title' => esc_html__('Close btn Color','kaswara'),
								'description' => esc_html__('Apply color for the close button.','kaswara'),
							)
						),	
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'modalv_close_bg',
								'name' => 'modalv_close_bg',
								'default' => '#111',
								'value' => $videomodalDefaults['modalv_close_bg'],
								'title' => esc_html__('Close btn Background','kaswara'),
								'description' => esc_html__('Apply color for the close button background.','kaswara'),
							)
						),	

					)
				),
				array(
					'id'	=>	'btntrigger',
					'situation'	=>	'noactive',
					'form' => array(
						

						
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Button Size','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'modalv_btn_width',
								'name' => 'modalv_btn_width',
								'default' => 250,
								'value' => $videomodalDefaults['modalv_btn_width'],
								'title' => esc_html__('Button Width (px)','kaswara'),
								'description' => esc_html__('Choose the width of the button.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'modalv_btn_height',
								'name' => 'modalv_btn_height',
								'default' => 45,
								'value' => $videomodalDefaults['modalv_btn_height'],
								'title' => esc_html__('Button Height (px)','kaswara'),
								'description' => esc_html__('Choose the height of the button.','kaswara'),
							)
						),
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Button Colors','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'modalv_btn_bg',
								'name' => 'modalv_btn_bg',
								'default' => '{"type":"color", "color1":"#111", "color2":"#111", "direction":"to left"}',
								'value' => $videomodalDefaults['modalv_btn_bg'],
								'title' => esc_html__('Button Background','kaswara'),
								'description' => esc_html__('Apply color for the button background.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'modalv_btn_bg_hover',
								'name' => 'modalv_btn_bg_hover',
								'default' => '{"type":"color", "color1":"#00AFD1", "color2":"#00AFD1", "direction":"to left"}',
								'value' => $videomodalDefaults['modalv_btn_bg_hover'],
								'title' => esc_html__('Hover Button Background','kaswara'),
								'description' => esc_html__('Apply color for the hovered button background.','kaswara'),
							)
						),	

						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'modalv_btn_clr',
								'name' => 'modalv_btn_clr',
								'default' => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
								'value' => $videomodalDefaults['modalv_btn_clr'],
								'title' => esc_html__('Button Color','kaswara'),
								'description' => esc_html__('Apply color for the button text color.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'modalv_btn_clr_hover',
								'name' => 'modalv_btn_clr_hover',
								'default' => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
								'value' => $videomodalDefaults['modalv_btn_clr_hover'],
								'title' => esc_html__('Hover Button Color','kaswara'),
								'description' => esc_html__('Apply color for the hovered button text color.','kaswara'),
							)
						),

						array(
							'type' => 'number',
							'values' => array(
								'id' => 'modalv_btn_border_radius',
								'name' => 'modalv_btn_border_radius',
								'default' => 0,
								'value' => $videomodalDefaults['modalv_btn_border_radius'],
								'title' => esc_html__('Border Radius (px)','kaswara'),
								'description' => esc_html__('Apply border radius of the button.','kaswara'),
							)
						),
						array(
				            'type' => 'select',
				            'values' => array(					            
					            'name' => 'modalv_btn_align',
					            'value' => $videomodalDefaults['modalv_btn_align'],
					            'default' => 'left',
					            'options' => array(
					                'left' => esc_html__("Left",'kaswara') ,
		                			'center' =>	esc_html__("Center",'kaswara') ,
		                			'right' =>	esc_html__("Right",'kaswara') ,
					            ),
					            'title' => esc_html__('Button Alignement','kaswara'),
								'description' => esc_html__('Choose the position of your button','kaswara'),    
				            )  
				        ),
						array(
				            "type" => "distance",
				            "values" => array(
					            "distance" => "margin",            
					            "id" => "modalv_btn_margins",	
					            'default' => 'margin-top:0px; margin-bottom:0px;',			         
								'value' => $videomodalDefaults['modalv_btn_margins'],
					            "name" => "modalv_btn_margins",				         
					            "title" => esc_html__( "Button Margins", "kaswara" ),
								'description' => esc_html__('Button Top & Bototm Margins','kaswara'),    
					            "positions" => array(
					                 esc_html__("Top","kameleon") => "top",
					                 esc_html__("Bottom","kameleon") => "bottom"
					            ),
				            )				         
				        ),

						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Button Text Font','kaswara'),
							)
						),
				        array(
				            "type" => "fontstyle",
				            'values' => array(
					            "name" => "modalv_btn_ftstyle",				           
					            "value" => $videomodalDefaults['modalv_btn_ftstyle'],
					            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
					            'elements'  => array(
					               esc_html__("Font Family","kaswara") => "font-family",
					               esc_html__("Font Weight","kaswara") => "font-weight",                
					               esc_html__("Font Style","kaswara") => "font-style",
					            ),
								'title' => esc_html__('Text Font Style','kaswara'),
								'description' => esc_html__('Apply values for the text font.','kaswara'),
				            )	
				        ),

				        array(
				            "type" => "fontsize",
				            'values' => array(
					            "name" => "modalv_btn_ftsize",				           
					            "value" => $videomodalDefaults['modalv_btn_ftsize'],
					            "defaults"=> array("font-size" => "15px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
					            'elements'  => array(
					               esc_html__("Font Size","kaswara") => "font-size",
					               esc_html__("Line Height","kaswara") => "line-height",
					               esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
					               esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
					               esc_html__("Phone Font Size","kaswara") => "--phone-font-size",                
					            ),
								'title' => esc_html__('Text Font Size','kaswara'),
								'description' => esc_html__('Apply values for the text font size.','kaswara'),
				            )	
				        ),

				        array(
				            "type" => "distance",
				            "values" => array(
					            "distance" => "padding",            
					            "id" => "modalv_btn_paddings",				         
					            'default' => 'padding-top:20px; padding-bottom:0px;',			         
								'value' => $videomodalDefaults['modalv_btn_paddings'],
					            "name" => "modalv_btn_paddings",				         
					            "title" => esc_html__( "Button Paddings", "kaswara" ),
					            "description" => esc_html__( "Button Left & RightPaddings", "kaswara" ),
					            "positions" => array(
					                esc_html__("Left","kameleon") => "left",
					                esc_html__("Right","kameleon") => "right"
					            ),
				            )				         
				        ),

				        array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Button Borders','kaswara'),
							)
						),
				       array(
							'type' => 'border',
							'values' => array(
								'id' => 'modalv_btn_bdr',
								'bordergradient' => 'enable',
								'name' => 'modalv_btn_bdr',
								'default' => '',
								'value' => $videomodalDefaults['modalv_btn_bdr'],
								'title' => esc_html__('Border Styling','kaswara'),
								'description' => esc_html__('Button border styling.','kaswara'),
							)
						),
				       array(
							'type' => 'border',
							'values' => array(
								'id' => 'modalv_btn_bdr_hover',
								'bordergradient' => 'enable',
								'name' => 'modalv_btn_bdr_hover',
								'default' => '',
								'value' => $videomodalDefaults['modalv_btn_bdr_hover'],
								'title' => esc_html__('Border Styling onHover','kaswara'),
								'description' => esc_html__('Button border styling on hover.','kaswara'),
							)
						),

						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Button Icon Settings','kaswara'),
							)
						),
						array(
				            'type' => 'select',
				            'values' => array(					            
					            'name' => 'modalv_btn_icon_position',
					            'value' => $videomodalDefaults['modalv_btn_icon_position'],
					            'default' => 'left',
					            'options' => array(
					                'left' => esc_html__("Left",'kaswara') ,		                	
		                			'right' =>	esc_html__("Right",'kaswara') ,
					            ),
					            'title' => esc_html__('Icon Position','kaswara'),
								'description' => esc_html__('Choose the position of the icon','kaswara'),    
				            )  
				        ),

				        array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'modalv_btn_icon_clr',
								'name' => 'modalv_btn_icon_clr',
								'default' => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
								'value' => $videomodalDefaults['modalv_btn_icon_clr'],
								'title' => esc_html__('Icon Color','kaswara'),
								'description' => esc_html__('Icon Color.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'modalv_btn_icon_clr_hover',
								'name' => 'modalv_btn_icon_clr_hover',
								'default' => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
								'value' => $videomodalDefaults['modalv_btn_icon_clr_hover'],
								'title' => esc_html__('Hover Icon Color','kaswara'),
								'description' => esc_html__('Icon Color onHover .','kaswara'),
							)
						),

						 array(
							'type' => 'number',
							'values' => array(
								'id' => 'modalv_btn_icon_size',
								'name' => 'modalv_btn_icon_size',
								'default' => 26,
								'value' => $videomodalDefaults['modalv_btn_icon_size'],
								'title' => esc_html__('Icon Size (px)','kaswara'),
								'description' => esc_html__('Apply icon size.','kaswara'),
							)
						),

						 array(
				            "type" => "distance",
				            "values" => array(
					            "distance" => "padding",            
					            'default' => 'padding-top:0px; padding-bottom:0px;',			         
					            "id" => "modalv_btn_icon_paddings",				         
								'value' => $videomodalDefaults['modalv_btn_icon_paddings'],
					            "name" => "modalv_btn_icon_paddings",				         
					            "title" => esc_html__( "Icon Paddings", "kaswara" ),
					            "description" => esc_html__( "Icon Left & RightPaddings", "kaswara" ),
					            "positions" => array(
					                esc_html__("Left","kameleon") =>"left" ,
					                 esc_html__("Right","kameleon") =>"right"
					            ),
				            )				         
				        ),

					)
				)


			)
	);	
$videomodalSection->create_maker();
?>