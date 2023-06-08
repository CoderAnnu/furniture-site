<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============     I C O N B O X    B U T T O N 	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_iconboxaction_shortC($atts) {  
	//IconBox Attributes Attributes
 	extract(shortcode_atts(array(		
 		//Check if image is enable
		'icbb_image_enable'			=> 	'0',	
		'icbb_image'					=> 	'0',	
		'icbb_image_width'			=> 	'35',	
		'icbb_image_height'			=> 	'35',					
		'icbb_icon'			 			=> 		'',	
		'icbb_height'			 		=> 		'',			
		'icbb_icon_style_def'			=>		'1',
		'icbb_icon_color' 				=> 		'#bbb',	
		'icbb_icon_size' 				=> 		'36',	
		'icbb_icon_hover_color' 		=> 		'#bbb',	
		'icbb_icon_bb_height'	 		=> 		'0',	
		'icbb_icon_bb_width' 			=> 		'0',	
		'icbb_icon_bb_color' 			=> 		'#eee',		
		'icbb_title' 					=> 		'',			
		'icbb_title_font_def'			=>		'1',
		'icbb_title_style'				=>		'',
		'icbb_title_size'				=>		'',
		'icbb_title_color' 				=> 		'',	
		'icbb_title_bb_height'	 		=> 		'',	
		'icbb_title_bb_width' 			=> 		'',	
		'icbb_title_bb_color' 			=> 		'',	
		'icbb_subtitle' 				=> 		'',				
		'icbb_subtitle_font_def'		=>		'1',
		'icbb_subtitle_style'			=>		'',
		'icbb_subtitle_size'			=>		'',		
		'icbb_subtitle_color' 			=> 		'',	
		'icbb_info' 					=> 		'',					
		'icbb_info_font_def'			=>		'1',
		'icbb_info_style'				=>		'',
		'icbb_info_size'				=>		'',
		'icbb_info_color' 				=> 		'',
		'icbb_button_text'				=> 		'',	
		'icbb_button_link'				=> 		'',	
		'icbb_button_font_def'			=>		'',
		'icbb_button_style'				=>		'',
		'icbb_button_size'				=>		'',			
		'icbb_button_hover_enabled'		=> 		'on',	
		'icbb_style' 					=> 		'effect1',	
		'icbb_icon_hover_style_2' 		=> 		'scale',	
		'icbb_icon_hover_style_3' 		=> 		'scaleup',
		'icbb_icon_padding'				=>		'',
		'icbb_title_padding'			=>		'',
		'icbb_info_padding'				=>		'',	
		'icbb_button_style_def'			=>		'1',
		'icbb_button_height'			=> 		'32',	
		'icbb_button_color' 			=> 		'#ddd',	
		'icbb_button_bg' 				=> 		'#121212',		
		'icbb_button_border_color'		=> 		'#111',	
		'icbb_button_border_size'		=> 		'1',	
		'icbb_button_color_hover' 		=> 		'#fff',	
		'icbb_button_bg_hover' 			=> 		'#111',	
		'icbb_button_border_hover'		=> 		'#111',	
 	), $atts));

 
 	
 	//Info Style
	$icbb_info_style = kswr_shortcode_attribute_value('icbb_info_style',$icbb_info_font_def, $icbb_info_style,'iconboxaction');
	$icbb_info_size = kswr_shortcode_attribute_value('icbb_info_size',$icbb_info_font_def, $icbb_info_size,'iconboxaction');
 	$info_font = $icbb_info_style. ' '.$icbb_info_size; 
 	$info_style = 'color:'.$icbb_info_color.';'.$info_font.''.$icbb_info_padding;
 
 	//Title Style
 	$icbb_title_style = kswr_shortcode_attribute_value('icbb_title_style',$icbb_title_font_def, $icbb_title_style,'iconboxaction');
	$icbb_title_size = kswr_shortcode_attribute_value('icbb_title_size',$icbb_title_font_def, $icbb_title_size,'iconboxaction');

 	$title_font = $icbb_title_style .' '. $icbb_title_size;
 	$title_style = 'color:'.$icbb_title_color.';'.$title_font;
 	//SubTitle Style
 	$icbb_subtitle_style = kswr_shortcode_attribute_value('icbb_subtitle_style',$icbb_subtitle_font_def, $icbb_subtitle_style,'iconboxaction');
	$icbb_subtitle_size = kswr_shortcode_attribute_value('icbb_subtitle_size',$icbb_subtitle_font_def, $icbb_subtitle_size,'iconboxaction');
 	$subtitle_font = $icbb_subtitle_style .' '. $icbb_subtitle_size;
 	$subtitle_style = 'color:'.$icbb_subtitle_color.';'.$subtitle_font; 
 
 	
 	//Button Style
 	$icbb_button_size = kswr_shortcode_attribute_value('icbb_button_size',$icbb_button_font_def, $icbb_button_size,'iconboxaction');
 	$icbb_button_style = kswr_shortcode_attribute_value('icbb_button_style',$icbb_button_font_def, $icbb_button_style,'iconboxaction');
 	$button_font = $icbb_button_size . ' '. $icbb_button_style; 	
	$icbb_button_color	= kswr_shortcode_attribute_value('icbb_button_color',$icbb_button_style_def, $icbb_button_color,'iconboxaction');
	$icbb_button_bg	= kswr_shortcode_attribute_value('icbb_button_bg',$icbb_button_style_def, $icbb_button_bg,'iconboxaction');
	$icbb_button_border_color	= kswr_shortcode_attribute_value('icbb_button_border_color',$icbb_button_style_def, $icbb_button_border_color,'iconboxaction');
	$icbb_button_border_size	= kswr_shortcode_attribute_value('icbb_button_border_size',$icbb_button_style_def, $icbb_button_border_size,'iconboxaction');
	$icbb_button_color_hover	= kswr_shortcode_attribute_value('icbb_button_color_hover',$icbb_button_style_def, $icbb_button_color_hover,'iconboxaction');
	$icbb_button_bg_hover	= kswr_shortcode_attribute_value('icbb_button_bg_hover',$icbb_button_style_def, $icbb_button_bg_hover,'iconboxaction');
	$icbb_button_border_hover	= kswr_shortcode_attribute_value('icbb_button_border_hover',$icbb_button_style_def, $icbb_button_border_hover,'iconboxaction');
	$icbb_button_height	= kswr_shortcode_attribute_value('icbb_button_height',$icbb_button_style_def, $icbb_button_height,'iconboxaction');

 	$button_style = 'color:'.$icbb_button_color.'; background:'.$icbb_button_bg.'; height:'.$icbb_button_height.'px; line-height:'.$icbb_button_height.'px;'.$button_font.' border:'.$icbb_button_border_size.'px solid '.$icbb_button_border_color.'; --button-hover-bg:'.$icbb_button_bg_hover.'; --button-hover-color:'.$icbb_button_color_hover.'; --button-hover-border-color:'.$icbb_button_border_hover.';';



 	//Icon Style 
 	$icbb_icon_color	= kswr_shortcode_attribute_value('icbb_icon_color',$icbb_icon_style_def, $icbb_icon_color,'iconboxaction');
	$icbb_icon_size	= kswr_shortcode_attribute_value('icbb_icon_size',$icbb_icon_style_def, $icbb_icon_size,'iconboxaction');
	$icbb_icon_hover_color	= kswr_shortcode_attribute_value('icbb_icon_hover_color',$icbb_icon_style_def, $icbb_icon_hover_color,'iconboxaction');
	$icbb_icon_bb_height	= kswr_shortcode_attribute_value('icbb_icon_bb_height',$icbb_icon_style_def, $icbb_icon_bb_height,'iconboxaction');
	$icbb_icon_bb_width	= kswr_shortcode_attribute_value('icbb_icon_bb_width',$icbb_icon_style_def, $icbb_icon_bb_width,'iconboxaction');
	$icbb_icon_bb_color	= kswr_shortcode_attribute_value('icbb_icon_bb_color',$icbb_icon_style_def, $icbb_icon_bb_color,'iconboxaction');


	$icon_style = 'color:'.$icbb_icon_color.'; font-size:'.$icbb_icon_size.'px; --icon-hover-color:'.$icbb_icon_hover_color.';'. $icbb_icon_padding;	
	//Container Style 
	$container_style = 'height:'.$icbb_height.'px; min-height:'.$icbb_height.'px; --icon-hover-color:'.$icbb_icon_hover_color.';';

	$icbb_icon_hover_style = '';
	if($icbb_style == "effect2")
		$icbb_icon_hover_style = $icbb_icon_hover_style_2;
	if($icbb_style == "effect3")	
		$icbb_icon_hover_style = $icbb_icon_hover_style_3;

	$iconArea = '<i class="'.$icbb_icon.'"></i>';
 	if(trim($icbb_image_enable) == '1'){
		$img_src = wp_get_attachment_image_src($icbb_image,'full');
		$iconArea = '<img src="'.$img_src[0].'" style="width:'.$icbb_image_width.'px; height:'.$icbb_image_height.'px;">';		
 	}
 	
  	$href = vc_build_link($icbb_button_link);

 	kswr_load_the_font_front($icbb_title_style);
	kswr_load_the_font_front($icbb_subtitle_style);
	kswr_load_the_font_front($icbb_button_style);
	kswr_load_the_font_front($icbb_info_style);

$additional_title_style =  $additional_subtitle_style = $additional_button_style = $additional_info_style = ''; 

fix_kaswara_font_styles($icbb_title_style, $additional_title_style);
fix_kaswara_font_styles($icbb_subtitle_style, $additional_subtitle_style);
fix_kaswara_font_styles($icbb_button_style, $additional_button_style);
fix_kaswara_font_styles($icbb_info_style, $additional_info_style);


 	$classRandom = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,8);
	$settings = array(
		'shortcode' => 'iconboxaction',
		'classname' => '.km-iconbox-with-button-'.$classRandom,
		'--icon-hover-color' => $icbb_icon_hover_color,
		'--button-hover-bg' => $icbb_button_bg_hover,
		'--button-hover-color' => $icbb_button_color_hover,
		'--button-hover-border-color' => $icbb_button_border_hover
	);
	kaswara_style_ms_maker($settings);


 	$outPut = '<div class="km-iconbox-with-button km-iconbox-with-button-'.$classRandom.' kswr-theelement"  style="'.$container_style.'" data-style="'.esc_attr($icbb_style).'" data-hover-icon="'.esc_attr($icbb_icon_hover_style).'" data-activehover-button="'.esc_attr($icbb_button_hover_enabled).'" >
					<div class="km-inter-insider">
						<div class="km-iconboxb-iconc" style="'.$icon_style.'">
							'.$iconArea.'
							<div class="km-icbb-bbottom" style="height:'.$icbb_icon_bb_height.'px; width:'.$icbb_icon_bb_width.'px; background:'.$icbb_icon_bb_color.'"></div>
						</div>	
						<div class="km-iconboxb-title-c" style="'.$icbb_title_padding.'">
							<div class="km-iconboxb-title kswr-shortcode-element  ' .$additional_title_style. '  " data-fontsettings="'.esc_attr($icbb_title_size).'" style="'.$title_style.'">'.$icbb_title.'</div>
							<div class="km-iconboxb-subtitle kswr-shortcode-element   ' .$additional_subtitle_style. '  " data-fontsettings="'.esc_attr($icbb_subtitle_size).'" style="'.$subtitle_style.'">'.$icbb_subtitle.'</div>
							<div class="km-icbb-bbottom" style="height:'.$icbb_title_bb_height.'px; width:'.$icbb_title_bb_width.'px; background:'.$icbb_title_bb_color.'"></div>
						</div>
						<div class="km-iconboxb-info kswr-shortcode-element ' .$additional_info_style. '  " data-fontsettings="'.esc_attr($icbb_info_size).'" style="'.$info_style.'">'.$icbb_info.'</div>
						<div class="km-iconboxb-buttonc">
							<a href="'.esc_url($href['url']).'" target="'.esc_attr($href['target']).'" class="km-iconboxb-button kswr-shortcode-element ' .$additional_button_style. '  " data-fontsettings="'.esc_attr($icbb_button_size).'" style="'.$button_style.'">'.$icbb_button_text.'</a>
						</div>			
					</div>
				</div>';

 	return $outPut;
 }
add_shortcode( 'kswr_iconboxaction', 'kswr_iconboxaction_shortC' );
?>