<?php 
//Before & After Image Default Shorcode Styling Form
$bfimageDefaults = kswr_shortcode_form_values('bfimage');
$bfimageSection = new kswr_global_section(
			$name = "Before / After Image",
			$id = "bfimage",
			$elements = 'bai_colorscheme,bai_overlay_bg,bai_overlay_button_color,bai_overlay_button_bg',
			$tabsname = array(
				array(
					'id'	=>	'bfimage',
					'name'	=>	'General',	
					'situation'	=>	'active'
				)
			),
			$sections = array(
				array(
					'id'	=>	'bfimage',
					'situation'	=>	'active',
					'form' => array(
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'bai_colorscheme',
								'name' => 'bai_colorscheme',
								'default' => '#fff',
								'value' => $bfimageDefaults['bai_colorscheme'],
								'title' => esc_html__('Color Scheme','kaswara'),
								'description' => esc_html__('Color scheme for the element.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'bai_overlay_bg',
								'name' => 'bai_overlay_bg',
								'default' => 'rgba(0,0,0,0.5)',
								'value' => $bfimageDefaults['bai_overlay_bg'],
								'title' => esc_html__('Overlay Background','kaswara'),
								'description' => esc_html__('Apply color for the overlay background.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'bai_overlay_button_bg',
								'name' => 'bai_overlay_button_bg',
								'default' => '#269ac1',
								'value' => $bfimageDefaults['bai_overlay_button_bg'],
								'title' => esc_html__('Button Background','kaswara'),
								'description' => esc_html__('Apply color for the button background.','kaswara'),
							)
						),
						array(
							'type' => 'colorpicker',
							'values' => array(
								'id' => 'bai_overlay_button_color',
								'name' => 'bai_overlay_button_color',
								'default' => '#fff',
								'value' => $bfimageDefaults['bai_overlay_button_color'],
								'title' => esc_html__('Button Color','kaswara'),
								'description' => esc_html__('Apply color for the button text.','kaswara'),
							)
						),

					)
				)


			)
	);	
$bfimageSection->create_maker();
?>