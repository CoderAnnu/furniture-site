<?php 
//Social Share Default Shorcode Styling Form
$socialshareDefaults = kswr_shortcode_form_values('socialshare');
$socialshareSection = new kswr_global_section(
			$name = "Social Share",
			$id = "socialshare",
			$elements = 'ss_size,ss_backsize,ss_borderradius,ss_style,ss_backcolor,ss_iconcolor,ss_iconhovercolor,ss_align,ss_margins',
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
								'id' => 'ss_size',
								'name' => 'ss_size',
								'default' => 26,
								'value' => $socialshareDefaults['ss_size'],
								'title' => esc_html__('Icon Size','kaswara'),
								'description' => esc_html__('Choose the icon size.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'ss_backsize',
								'name' => 'ss_backsize',
								'default' => 35,
								'value' => $socialshareDefaults['ss_backsize'],
								'title' => esc_html__('Background Size','kaswara'),
								'description' => esc_html__('Choose the background icon size.','kaswara'),
							)
						),

						array(
							'type' => 'number',
							'values' => array(
								'id' => 'ss_borderradius',
								'name' => 'ss_borderradius',
								'default' => 0,
								'value' => $socialshareDefaults['ss_borderradius'],
								'title' => esc_html__('Border Radius','kaswara'),
								'description' => esc_html__('Choose the background border radius.','kaswara'),
							)
						),

						
						array(
				            'type' => 'select',
				            'values' => array(					            
					            'name' => 'ss_style',
					            'value' => $socialshareDefaults['ss_style'],
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
								'id' => 'ss_backcolor',
								'name' => 'ss_backcolor',
								'default' => 'transparent',
								'value' => $socialshareDefaults['ss_backcolor'],
								'title' => esc_html__('Icon Background Color','kaswara'),
								'description' => esc_html__('Apply color for the icon background.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'ss_iconcolor',
								'name' => 'ss_iconcolor',
								'default' => '#888',
								'value' => $socialshareDefaults['ss_iconcolor'],
								'title' => esc_html__('Icon Color','kaswara'),
								'description' => esc_html__('Apply color for the icon.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'ss_iconhovercolor',
								'name' => 'ss_iconhovercolor',
								'default' => '#fff',
								'value' => $socialshareDefaults['ss_iconhovercolor'],
								'title' => esc_html__('Icon Hover Color','kaswara'),
								'description' => esc_html__('Apply color for the hover action.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'ss_margins',
								'name' => 'ss_margins',
								'default' => 0,
								'value' => $socialshareDefaults['ss_margins'],
								'title' => esc_html__('Icon Margins','kaswara'),
								'description' => esc_html__('Choose margin btw two icons.','kaswara'),
							)
						),
						array(
				            'type' => 'select',
				            'values' => array(					            
					            'name' => 'ss_align',
					            'value' => $socialshareDefaults['ss_align'],
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
$socialshareSection->create_maker();

?>