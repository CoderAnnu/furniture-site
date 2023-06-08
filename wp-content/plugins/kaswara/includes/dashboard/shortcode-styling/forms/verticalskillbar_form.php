<?php 
//Vertical Skillbar Default Shorcode Styling Form
$verticalskillbarDefaults = kswr_shortcode_form_values('verticalskillbar');
$verticalskillbarSection = new kswr_global_section(
			$name = "Vertical Skillbar",
			$id = "verticalskillbar",
			$elements = 'vsklbr_namefsize,vsklbr_namecolor,vsklbr_percentcolor,vsklbr_bar_bg_color,vsklbr_bar_color,vsklbr_bar_height,vsklbr_bar_width,vsklbr_strips,vsklbr_layout,vsklbr_percentpos,vsklbr_align,vsklbr_bord_radius,vsklbr_border',
			$tabsname = array(
				array(
					'id'	=>	'styling',
					'name'	=>	'Styling',	
					'situation'	=>	'active'
				)
			),
			$sections = array(
				array(
					'id'	=>	'styling',
					'situation'	=>	'active',
					'form' => array(
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Skill Name Styling','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'vsklbr_namefsize',
								'name' => 'vsklbr_namefsize',
								'default' => 16,
								'value' => $verticalskillbarDefaults['vsklbr_namefsize'],
								'title' => esc_html__('Name Font Size (px)','kaswara'),
								'description' => esc_html__('Skill name font size.','kaswara'),
							)
						),

						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'vsklbr_namecolor',
								'name' => 'vsklbr_namecolor',
								'default' => '#333',
								'value' => $verticalskillbarDefaults['vsklbr_namecolor'],
								'title' => esc_html__('Name Color','kaswara'),
								'description' => esc_html__('Apply color for the skill name.','kaswara'),
							)
						),	
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Bar Colors Styling','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'vsklbr_percentcolor',
								'name' => 'vsklbr_percentcolor',
								'default' => '#00AFD1',
								'value' => $verticalskillbarDefaults['vsklbr_percentcolor'],
								'title' => esc_html__('Percent Color','kaswara'),
								'description' => esc_html__('Apply color for the skill percent value.','kaswara'),
							)
						),	
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'vsklbr_bar_bg_color',
								'name' => 'vsklbr_bar_bg_color',
								'default' => '#f6f6f6',
								'value' => $verticalskillbarDefaults['vsklbr_bar_bg_color'],
								'title' => esc_html__('Bar Background Color','kaswara'),
								'description' => esc_html__('Apply color for the skill bar background value.','kaswara'),
							)
						),	
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'vsklbr_bar_color',
								'name' => 'vsklbr_bar_color',
								'default' => '{"type":"color", "color1":"#00AFD1", "color2":"#00AFD1", "direction":"to left"}',
								'value' => $verticalskillbarDefaults['vsklbr_bar_color'],
								'title' => esc_html__('Bar Value Background','kaswara'),
								'description' => esc_html__('Apply color for the filled bar value.','kaswara'),
							)
						),
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Bar Sizes','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'vsklbr_bar_height',
								'name' => 'vsklbr_bar_height',
								'default' => 200,
								'value' => $verticalskillbarDefaults['vsklbr_bar_height'],
								'title' => esc_html__('Bar Height (px)','kaswara'),
								'description' => esc_html__('Skill bar height.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'vsklbr_bar_width',
								'name' => 'vsklbr_bar_width',
								'default' => 6,
								'value' => $verticalskillbarDefaults['vsklbr_bar_width'],
								'title' => esc_html__('Bar Width (px)','kaswara'),
								'description' => esc_html__('Skill bar width.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'vsklbr_bord_radius',
								'name' => 'vsklbr_bord_radius',
								'default' => 0,
								'value' => $verticalskillbarDefaults['vsklbr_bord_radius'],
								'title' => esc_html__('Bar Border Radius','kaswara'),
								'description' => esc_html__('Apply border radius for the bar container.','kaswara'),
							)
						),
						array(
							'type' => 'border',
							'values' => array(
								'id' => 'vsklbr_border',
								'bordergradient' => 'noenable',
								'name' => 'vsklbr_border',
								'default' => '',
								'value' => $verticalskillbarDefaults['vsklbr_border'],
								'title' => esc_html__('Border Styling','kaswara'),
								'description' => esc_html__('Bar conatiner border styling.','kaswara'),
							)
						),
						array(
							'type' => 'message',
							'values' => array(						
								'description' => esc_html__('Bar Layout Styling','kaswara'),
							)
						),
						array(
				            'type' => 'select',
				            'values' => array(					            
					            'name' => 'vsklbr_align',
					            'value' => $verticalskillbarDefaults['vsklbr_align'],
					            'default' => 'center',
					            'options' => array(
					                'center' => esc_html__("Cnter",'kaswara') ,		                	
					                'left' => esc_html__("Left",'kaswara') ,		                	
		                			'right' =>	esc_html__("Right",'kaswara') ,
					            ),
					            'title' => esc_html__('Elements Align','kaswara'),
								'description' => esc_html__('Choose the position of the skill bar','kaswara'),    
				            )  
				        ),
				        array(
				            'type' => 'select',
				            'values' => array(					            
					            'name' => 'vsklbr_percentpos',
					            'value' => $verticalskillbarDefaults['vsklbr_percentpos'],
					            'default' => 'left',
					            'options' => array(
					                'left' => esc_html__("Left",'kaswara') ,		                	
		                			'right' =>	esc_html__("Right",'kaswara') ,
					            ),
					            'title' => esc_html__('Percent Position','kaswara'),
								'description' => esc_html__('Percentage text position','kaswara'),    
				            )  
				        ),
				        array(
				            'type' => 'select',
				            'values' => array(					            
					            'name' => 'vsklbr_layout',
					            'value' => $verticalskillbarDefaults['vsklbr_layout'],
					            'default' => 'none',
					            'options' => array(
					                "none" => esc_html__("Normal","kaswara") ,
                   					"left" => esc_html__("Left","kaswara") ,
                   					"right" => esc_html__("Right","kaswara") ,
                   					"centerleft" => esc_html__("Rotate Left","kaswara") ,
                   					"centerright" => esc_html__("Rotate Right","kaswara") ,
					            ),
					            'title' => esc_html__('Layout Style','kaswara'),
								'description' => esc_html__('Bar layout styling','kaswara'),    
				            )  
				        ),
				        array(
				            'type' => 'select',
				            'values' => array(					            
					            'name' => 'vsklbr_strips',
					            'value' => $verticalskillbarDefaults['vsklbr_strips'],
					            'default' => 'left',
					            'options' => array(
					                'none' => esc_html__("None",'kaswara') ,
				                    'normal' => esc_html__("Normal Strips",'kaswara') ,
				                    'moving' => esc_html__("Moving Strips",'kaswara') ,
					            ),
					            'title' => esc_html__('Bar Strips','kaswara'),
								'description' => esc_html__('Skill bar strips styling','kaswara'),    
				            )  
				        ),

					)
				)


			)
	);	
$verticalskillbarSection->create_maker();
?>