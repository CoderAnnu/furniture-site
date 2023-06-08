<?php 
//Modal Window Default Shorcode Styling Form
$singleiconDefaults = kswr_shortcode_form_values('singleicon');
$singleiconSection = new kswr_global_section(
			$name = "Single Icon",
			$id = "singleicon",
			$elements = 'si_back,si_back_hover,si_ic_color_hover,si_ic_color,si_border_radius,si_bgsize,si_iconsize,si_border',
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
							'type' => 'number',
							'values' => array(
								'id' => 'si_iconsize',
								'name' => 'si_iconsize',
								'default' => 18,
								'value' => $singleiconDefaults['si_iconsize'],
								'title' => esc_html__('Icon Size (px)','kaswara'),
								'description' => esc_html__('Choose the icon size.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'si_bgsize',
								'name' => 'si_bgsize',
								'default' => 35,
								'value' => $singleiconDefaults['si_bgsize'],
								'title' => esc_html__('Icon Background Size (px)','kaswara'),
								'description' => esc_html__('Choose the icon background size.','kaswara'),
							)
						),
						array(
							'type' => 'number',
							'values' => array(
								'id' => 'si_border_radius',
								'name' => 'si_border_radius',
								'default' => 0,
								'value' => $singleiconDefaults['si_border_radius'],
								'title' => esc_html__('Border Radius','kaswara'),
								'description' => esc_html__('Choose the icon border radius.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'si_ic_color',
								'name' => 'si_ic_color',
								'default' => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
								'value' => $singleiconDefaults['si_ic_color'],
								'title' => esc_html__('Icon Color','kaswara'),
								'description' => esc_html__('Apply color for the icon.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'si_ic_color_hover',
								'name' => 'si_ic_color_hover',
								'default' => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
								'value' => $singleiconDefaults['si_ic_color_hover'],
								'title' => esc_html__('Icon Color onHover','kaswara'),
								'description' => esc_html__('Apply color for the icon on hover actions.','kaswara'),
							)
						),

						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'si_back',
								'name' => 'si_back',
								'default' => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
								'value' => $singleiconDefaults['si_back'],
								'title' => esc_html__('Background Color','kaswara'),
								'description' => esc_html__('Apply background for the icon.','kaswara'),
							)
						),
						array(
							'type' => 'gradientpicker',
							'values' => array(
								'id' => 'si_back_hover',
								'name' => 'si_back_hover',
								'default' => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
								'value' => $singleiconDefaults['si_back_hover'],
								'title' => esc_html__('Background Color onHover','kaswara'),
								'description' => esc_html__('Apply background for the icon on hover actions.','kaswara'),
							)
						),


						array(
							'type' => 'border',
							'values' => array(
								'bordergradient' => 'enable',
								'id' => 'si_border',
								'name' => 'si_border',
								'default' => '',
								'value' => $singleiconDefaults['si_border'],
								'title' => esc_html__('Border Styling','kaswara'),
								'description' => esc_html__('Icon border styling.','kaswara'),
							)
						),

					)
				)


			)
	);	
$singleiconSection->create_maker();
?>