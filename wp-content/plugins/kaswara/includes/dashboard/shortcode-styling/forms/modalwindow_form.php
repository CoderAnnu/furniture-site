<?php 
//Modal Window Default Shorcode Styling Form
$modalwindowDefaults = kswr_shortcode_form_values('modalwindow');
$modalwindowSection = new kswr_global_section(
			$name = "Modal Window",
			$id = "modalwindow",
			$elements = 'mdlw_btn_width,mdlw_btn_height,mdlw_btn_border_radius,mdlw_btn_align,mdlw_btn_margins,mdlw_btn_bg,mdlw_btn_bg_hover,mdlw_btn_clr,mdlw_btn_clr_hover,mdlw_btn_ftsize,mdlw_btn_ftstyle,mdlw_btn_paddings,mdlw_btn_bdr,mdlw_btn_bdr_hover,mdlw_btn_icon_position,mdlw_btn_icon_clr,mdlw_btn_icon_clr_hover,mdlw_btn_icon_size,mdlw_btn_icon_paddings',
			$tabsname = array(
				array(
					'id'	=>	'btntrigger',
					'name'	=>	'Button Trigger',	
					'situation'	=>	'active'
				)
			),
			$sections = array(
				array(
					'id'	=>	'btntrigger',
					'situation'	=>	'active',
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
								'id' => 'mdlw_btn_width',
								'name' => 'mdlw_btn_width',
								'default' => 250,
								'value' => $modalwindowDefaults['mdlw_btn_width'],
								'title' => esc_html__('Button Width (px)','kaswara'),
								'description' => esc_html__('Choose the width of the button.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'mdlw_btn_height',
								'name' => 'mdlw_btn_height',
								'default' => 45,
								'value' => $modalwindowDefaults['mdlw_btn_height'],
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
								'id' => 'mdlw_btn_bg',
								'name' => 'mdlw_btn_bg',
								'default' => '{"type":"color", "color1":"#111", "color2":"#111", "direction":"to left"}',
								'value' => $modalwindowDefaults['mdlw_btn_bg'],
								'title' => esc_html__('Button Background','kaswara'),
								'description' => esc_html__('Apply color for the button background.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'mdlw_btn_bg_hover',
								'name' => 'mdlw_btn_bg_hover',
								'default' => '{"type":"color", "color1":"#00AFD1", "color2":"#00AFD1", "direction":"to left"}',
								'value' => $modalwindowDefaults['mdlw_btn_bg_hover'],
								'title' => esc_html__('Hover Button Background','kaswara'),
								'description' => esc_html__('Apply color for the hovered button background.','kaswara'),
							)
						),	

						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'mdlw_btn_clr',
								'name' => 'mdlw_btn_clr',
								'default' => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
								'value' => $modalwindowDefaults['mdlw_btn_clr'],
								'title' => esc_html__('Button Color','kaswara'),
								'description' => esc_html__('Apply color for the button text color.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'mdlw_btn_clr_hover',
								'name' => 'mdlw_btn_clr_hover',
								'default' => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
								'value' => $modalwindowDefaults['mdlw_btn_clr_hover'],
								'title' => esc_html__('Hover Button Color','kaswara'),
								'description' => esc_html__('Apply color for the hovered button text color.','kaswara'),
							)
						),

						array(
							'type' => 'number',
							'values' => array(
								'id' => 'mdlw_btn_border_radius',
								'name' => 'mdlw_btn_border_radius',
								'default' => 0,
								'value' => $modalwindowDefaults['mdlw_btn_border_radius'],
								'title' => esc_html__('Border Radius (px)','kaswara'),
								'description' => esc_html__('Apply border radius of the button.','kaswara'),
							)
						),
						array(
				            'type' => 'select',
				            'values' => array(					            
					            'name' => 'mdlw_btn_align',
					            'value' => $modalwindowDefaults['mdlw_btn_align'],
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
					            "id" => "btn_margins",	
					            'default' => 'margin-top:0px; margin-bottom:0px;',			         
								'value' => $modalwindowDefaults['mdlw_btn_margins'],
					            "name" => "btn_margins",				         
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
					            "id" => "mdlw_btn_ftstyle",				           
					            "name" => "mdlw_btn_ftstyle",				           
					            "value" => $modalwindowDefaults['mdlw_btn_ftstyle'],
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
					            "name" => "btn_ftsize",				           
					            "value" => $modalwindowDefaults['mdlw_btn_ftsize'],
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
					            "id" => "btn_paddings",				         
					            'default' => 'padding-top:20px; padding-bottom:0px;',			         
								'value' => $modalwindowDefaults['mdlw_btn_paddings'],
					            "name" => "btn_paddings",				         
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
								'id' => 'mdlw_btn_bdr',
								'bordergradient' => 'enable',
								'name' => 'mdlw_btn_bdr',
								'default' => '',
								'value' => $modalwindowDefaults['mdlw_btn_bdr'],
								'title' => esc_html__('Border Styling','kaswara'),
								'description' => esc_html__('Button border styling.','kaswara'),
							)
						),
				       array(
							'type' => 'border',
							'values' => array(
								'id' => 'mdlw_btn_bdr_hover',
								'bordergradient' => 'enable',
								'name' => 'mdlw_btn_bdr_hover',
								'default' => '',
								'value' => $modalwindowDefaults['mdlw_btn_bdr_hover'],
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
					            'name' => 'mdlw_btn_icon_position',
					            'value' => $modalwindowDefaults['mdlw_btn_icon_position'],
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
								'id' => 'mdlw_btn_icon_clr',
								'name' => 'mdlw_btn_icon_clr',
								'default' => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
								'value' => $modalwindowDefaults['mdlw_btn_icon_clr'],
								'title' => esc_html__('Icon Color','kaswara'),
								'description' => esc_html__('Icon Color.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'mdlw_btn_icon_clr_hover',
								'name' => 'mdlw_btn_icon_clr_hover',
								'default' => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
								'value' => $modalwindowDefaults['mdlw_btn_icon_clr_hover'],
								'title' => esc_html__('Hover Icon Color','kaswara'),
								'description' => esc_html__('Icon Color onHover .','kaswara'),
							)
						),

						 array(
							'type' => 'number',
							'values' => array(
								'id' => 'mdlw_btn_icon_size',
								'name' => 'mdlw_btn_icon_size',
								'default' => 26,
								'value' => $modalwindowDefaults['mdlw_btn_icon_size'],
								'title' => esc_html__('Icon Size (px)','kaswara'),
								'description' => esc_html__('Apply icon size.','kaswara'),
							)
						),

						 array(
				            "type" => "distance",
				            "values" => array(
					            "distance" => "padding",            
					            'default' => 'padding-top:0px; padding-bottom:0px;',			         
					            "id" => "btn_icon_paddings",				         
								'value' => $modalwindowDefaults['mdlw_btn_icon_paddings'],
					            "name" => "btn_icon_paddings",				         
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
$modalwindowSection->create_maker();
?>