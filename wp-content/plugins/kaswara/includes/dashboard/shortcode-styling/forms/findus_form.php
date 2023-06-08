<?php 
//Find us Default Shorcode Styling Form
$findusDefaults = kswr_shortcode_form_values('findus');
$findusSection = new kswr_global_section(
			$name = "Find Us",
			$id = "findus",
			$elements = 'sf_size,sf_backsize,sf_borderradius,sf_style,sf_backcolor,sf_iconcolor,sf_iconhovercolor,sf_align,sf_margins',
			$tabsname = array(
				array(
					'id'	=>	'general',
					'name'	=>	'general',	
					'situation'	=>	'active'
				)
			),
			$sections = array(
				array(
					'id'	=>	'general',
					'situation'	=>	'active',
					'form' => array(
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'sf_size',
								'name' => 'sf_size',
								'default' => 26,
								'value' => $findusDefaults['sf_size'],
								'title' => esc_html__('Icon Size','kaswara'),
								'description' => esc_html__('Choose the icon size.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'sf_backsize',
								'name' => 'sf_backsize',
								'default' => 35,
								'value' => $findusDefaults['sf_backsize'],
								'title' => esc_html__('Background Size','kaswara'),
								'description' => esc_html__('Choose the background icon size.','kaswara'),
							)
						),

						array(
							'type' => 'number',
							'values' => array(
								'id' => 'sf_borderradius',
								'name' => 'sf_borderradius',
								'default' => 0,
								'value' => $findusDefaults['sf_borderradius'],
								'title' => esc_html__('Border Radius','kaswara'),
								'description' => esc_html__('Choose the background border radius.','kaswara'),
							)
						),

						
						array(
				            'type' => 'select',
				            'values' => array(					            
					            'name' => 'sf_style',
					            'value' => $findusDefaults['sf_style'],
					            'default' => 'hoverColorScheme',
					            'options' => array(
					                'hoverColorScheme' => esc_html__("Hover Color Scheme",'kaswara') ,
		                			'hoverBackScheme' =>	esc_html__("Hover Background Scheme",'kaswara') ,
		                			'hoverShowBottom' =>	esc_html__("Show From Background Bottom",'kaswara') ,
		                			'hoverShowLeft' =>	esc_html__("Show From Background Left",'kaswara') ,
		                			'hoverShowTop' =>	esc_html__("Show From Background Top",'kaswara') ,
		                			'hoverShowRight' =>	esc_html__("Show From Background Right",'kaswara') ,
		                			'hoverShowScale' =>	esc_html__("Show From Background Scaled",'kaswara') ,
		                			'hoverShowTada' =>	esc_html__("Show From Background Tada",'kaswara') ,
					            ),
					            'title' => esc_html__('Icon Style','kaswara'),
								'description' => '',    
				            )  
				        ),

						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'sf_backcolor',
								'name' => 'sf_backcolor',
								'default' => 'transparent',
								'value' => $findusDefaults['sf_backcolor'],
								'title' => esc_html__('Icon Background Color','kaswara'),
								'description' => esc_html__('Apply color for the icon background.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'sf_iconcolor',
								'name' => 'sf_iconcolor',
								'default' => '#888',
								'value' => $findusDefaults['sf_iconcolor'],
								'title' => esc_html__('Icon Color','kaswara'),
								'description' => esc_html__('Apply color for the icon.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'sf_iconhovercolor',
								'name' => 'sf_iconhovercolor',
								'default' => '#fff',
								'value' => $findusDefaults['sf_iconhovercolor'],
								'title' => esc_html__('Icon Hover Color','kaswara'),
								'description' => esc_html__('Apply color for the hover action.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'sf_margins',
								'name' => 'sf_margins',
								'default' => 0,
								'value' => $findusDefaults['sf_margins'],
								'title' => esc_html__('Icon Margins','kaswara'),
								'description' => esc_html__('Choose margin btw two icons.','kaswara'),
							)
						),
						array(
				            'type' => 'select',
				            'values' => array(					            
					            'name' => 'sf_align',
					            'value' => $findusDefaults['sf_align'],
					            'default' => 'left',
					            'options' => array(
					                'left' => esc_html__("Left",'kaswara'),
					                'center' => esc_html__("Center",'kaswara'),
					                'right' => esc_html__("Right",'kaswara'),
					            ),
					            'title' => esc_html__('Icons Alignement','kaswara'),
								'description' => esc_html__('Choose the alignement for your elements.','kaswara'),    
				            )  
				        ),


					)
				)
			)	
		);	
$findusSection->create_maker();

?>