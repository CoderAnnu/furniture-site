<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============I N T E R A C T I V E    I C O N B O X============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_interactiveiconbox_shortC($atts) {  
 	extract(shortcode_atts(array(						
		'iib_height' 				=> '220',
		'iib_padding' 				=> '',				
		'iib_margin' 				=> '',
		'iib_icon_align' 			=> 'left',
		'iib_hover_style' 			=> 'toleft',
		'iib_icon_area_bg'			=> '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
		'iib_icon'					=> '',			
		'iib_icon_size'				=> '36',
		'iib_icon_color'			=> '{"type":"color", "color1":"#555", "color2":"#555", "direction":"to left"}',		
		'iib_icon_padding'			=> '25',
		//Check if image is enable
		'iib_image_enable'			=> 	'0',	
		'iib_image'					=> 	'0',	
		'iib_image_width'			=> 	'35',	
		'iib_image_height'			=> 	'35',	

		'iib_title_font_def'	 =>'1',
		'iib_title_font_style' 	 =>'',
		'iib_title_font_size' 	 =>'',
		
		'iib_title'				=> '',	
		'iib_title_color'		=> '#666',
		
		'iib_subtitle_font_def' 	=>'1',
		'iib_subtitle_font_style' =>'',
		'iib_subtitle_font_size' =>'',
		
		'iib_subtitle'			=>'',	
		'iib_subtitle_color'	=> '#999',
		'iib_info_area_bg'		=> '{"type":"color", "color1":"#f9f9f9", "color2":"#f9f9f9", "direction":"to left"}',	
		
		'iib_info_font_def'		=>'`',
		'iib_info_font_style'	=>'',
		'iib_info_font_size'	=>'',
		
		'iib_info_color'		=> '#777',
		'iib_info_align'		=> 'left',
		'iib_info_content'		=> ''

 	), $atts));

 	$iconArea = '';

 	$iib_title_font_style = kswr_shortcode_attribute_value('iib_title_font_style',$iib_title_font_def, $iib_title_font_style,'interactiveiconbox');
 	$iib_title_font_size = kswr_shortcode_attribute_value('iib_title_font_size',$iib_title_font_def, $iib_title_font_size,'interactiveiconbox');
 	$iib_title_style = $iib_title_font_style .' '. $iib_title_font_size;	

 	
	$iib_subtitle_font_style = kswr_shortcode_attribute_value('iib_subtitle_font_style',$iib_subtitle_font_def, $iib_subtitle_font_style,'interactiveiconbox');
	$iib_subtitle_font_size = kswr_shortcode_attribute_value('iib_subtitle_font_size',$iib_subtitle_font_def, $iib_subtitle_font_size,'interactiveiconbox');
 	$iib_subtitle_style = $iib_subtitle_font_style .' '.$iib_subtitle_font_size;

 	
	$iib_info_font_style = kswr_shortcode_attribute_value('iib_info_font_style',$iib_info_font_def, $iib_info_font_style,'interactiveiconbox');
	$iib_info_font_size = kswr_shortcode_attribute_value('iib_info_font_size',$iib_info_font_def, $iib_info_font_size,'interactiveiconbox');
 	$iib_info_style = $iib_info_font_style .' '. $iib_info_font_size;
 	
 	kswr_load_the_font_front($iib_title_font_style);
	kswr_load_the_font_front($iib_subtitle_font_style);
	kswr_load_the_font_front($iib_info_font_style);

$additional_title_font_style = $additional_subtitle_font_style = $additional_info_font_style = ''; 

fix_kaswara_font_styles($iib_title_font_style, $additional_title_font_style);
fix_kaswara_font_styles($iib_subtitle_font_style, $additional_subtitle_font_style);
fix_kaswara_font_styles($iib_info_font_style, $additional_info_font_style);


 	$containerStyle = kswr_gradient_color_maker('background-color' ,$iib_icon_area_bg).'height:'.$iib_height.'px; min-height:'.$iib_height.'px;'.$iib_margin;
 	$thatPadding = $iib_padding;

 	$iconArea = '<i class="'.$iib_icon.'"></i>';
 	if(trim($iib_image_enable) == '1'){
		$img_src = wp_get_attachment_image_src($iib_image,'full');
		$iconArea = '<img src="'.$img_src[0].'" style="width:'.$iib_image_width.'px; height:'.$iib_image_height.'px;">';		
 	}


 	$outPut = '<div class="km-interactive-iconbox-container kswr-theelement" data-icon-style="'.esc_attr($iib_icon_align).'" data-hover-style="'.esc_attr($iib_hover_style).'" style="'.$containerStyle.'">
				<div class="km-inter-i-area1" style="'.kswr_gradient_color_maker('background-color' ,$iib_icon_area_bg).''.$thatPadding.'">
					<div class="km-inter-insider">
						<div class="km-inter-i-a1-icon" style="font-size:'.$iib_icon_size.'px;'.kswr_gradient_color_maker('color' ,$iib_icon_color).'">
							'.$iconArea.'
						</div>			
						<div class="km-inter-i-a1-title-c" style="padding-'.$iib_icon_align.':'.intval($iib_icon_padding+$iib_icon_padding).'px;">
							<div class="km-inter-i-title kswr-shortcode-element ' .$additional_title_font_style. ' " data-fontsettings="'.esc_attr($iib_title_font_size).'" style="color:'.$iib_title_color.';'.$iib_title_style.'">'.$iib_title.'</div>
							<div class="km-inter-i-subtitle kswr-shortcode-element ' .$additional_subtitle_font_style. ' " data-fontsettings="'.esc_attr($iib_subtitle_font_size).'" style="color:'.$iib_subtitle_color.';'.$iib_subtitle_style.'">'.$iib_subtitle.'</div>
						</div>				
					</div>
				</div>		
				
				<div class="km-inter-i-area2" style="'.kswr_gradient_color_maker('background-color' ,$iib_info_area_bg).''.$iib_info_style.' color:'.$iib_info_color.'; text-align:'.$iib_info_align.'; '.$thatPadding.'">
					<div class="km-inter-insider kswr-shortcode-element ' .$additional_info_font_style. ' " data-fontsettings="'.esc_attr($iib_info_font_size).'">'.$iib_info_content.'</div>
				</div>		
			</div>';

 	return $outPut;
 }
add_shortcode( 'kswr_interactiveiconbox', 'kswr_interactiveiconbox_shortC' );


?>