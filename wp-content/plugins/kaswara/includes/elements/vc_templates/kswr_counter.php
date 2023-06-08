<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============        C  O  U  N  T  E  R      	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_counter_shortC($atts, $content) {  
	//Counter Attributes
 	extract(shortcode_atts(array(						
		//Icon Attributes
		'cnt_style_default'		=> '1',
		'cnt_bgsize' 			=> 	'35',	
		'cnt_border_radius'		=> 	'0',	
		'cnt_effect'			=> 	'none',	
		'cnt_rotation'			=> 	'false',			
		'cnt_icon'				=> 	'',	
		'cnt_iconsize' 			=> 	'18',	
		'cnt_ic_color' 				=> 	'{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',	
		'cnt_ic_color_hover'		=> 	'{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',	
		'cnt_back' 					=> 	'{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',	
		'cnt_back_hover'			=> 	'{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',	
		'cnt_border'				=> 	'{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',

		

		//Layout Settings 
		'cnt_layout'			=> 	'center',	
		'cnt_align'				=> 	'center',	
		//Text and Fonts		
		'cnt_font_default'		=>	'1',	
		//Title
		'cnt_title'				=> 	'',	
		'cnt_title_fsize'		=> 	'',	
		'cnt_title_fstyle'		=> 	'',	
		'cnt_title_color'		=> 	'',	
		//Value
		'cnt_separator'			=>	',',	
		'cnt_decimal'			=>	'.',	
		'cnt_duration'			=>	'3',	
		'cnt_value'				=> 	'',	
		'cnt_value_fsize'		=> 	'',	
		'cnt_value_fstyle'		=> 	'',	
		'cnt_value_color'		=> 	'',	
		//Prefix
		'cnt_prefix'			=> 	'',	
		'cnt_prefix_fsize'		=> 	'',	
		'cnt_prefix_fstyle'		=> 	'',	
		'cnt_prefix_color'		=> 	'',	
		//Suffix
		'cnt_suffix'			=> 	'',	
		'cnt_suffix_fsize'		=> 	'',	
		'cnt_suffix_fstyle'		=> 	'',	
		'cnt_suffix_color'		=> 	'',	

		//Elements Marings			
		'cnt_icon_margins'		=> 	'',	
		'cnt_title_margins'		=> 	'',	
		'cnt_value_margins'		=> 	'',	
		//Check if image is enable
		'cnt_image_enable'			=> 	'0',	
		'cnt_image'					=> 	'0',	
		'cnt_image_width'			=> 	'35',	
		'cnt_image_height'			=> 	'35',	


 	), $atts));
 	$outPut = $iconArea =  $iconSettings = $iconStyle = $titleStyle = $valueStyle = $prefixStyle = $suffixStyle = '';





 	//Icon Styling
 	$iconStyle = $cnt_icon_margins;
 	//Title Setyling
 	$cnt_title_fsize = kswr_shortcode_attribute_value('cnt_title_fsize',$cnt_font_default, $cnt_title_fsize,'counter');
	$cnt_title_fstyle = kswr_shortcode_attribute_value('cnt_title_fstyle',$cnt_font_default, $cnt_title_fstyle,'counter');


	$titleStyle = $cnt_title_fsize .'  '.  $cnt_title_fstyle . ' color:'. $cnt_title_color.';'.$cnt_title_margins;
	//Value Setyling
 	$cnt_value_fsize = kswr_shortcode_attribute_value('cnt_value_fsize',$cnt_font_default, $cnt_value_fsize,'counter');
	$cnt_value_fstyle = kswr_shortcode_attribute_value('cnt_value_fstyle',$cnt_font_default, $cnt_value_fstyle,'counter');
	$valueStyle = $cnt_value_fsize .' '. $cnt_value_fstyle. ' color:'. $cnt_value_color.';';
	//Prefix Setyling
 	$cnt_prefix_fsize = kswr_shortcode_attribute_value('cnt_prefix_fsize',$cnt_font_default, $cnt_prefix_fsize,'counter');
	$cnt_prefix_fstyle = kswr_shortcode_attribute_value('cnt_prefix_fstyle',$cnt_font_default, $cnt_prefix_fstyle,'counter');
	$prefixStyle = $cnt_prefix_fsize .' '. $cnt_prefix_fstyle. ' color:'. $cnt_prefix_color.';';
	//Suffix Setyling
 	$cnt_suffix_fsize = kswr_shortcode_attribute_value('cnt_suffix_fsize',$cnt_font_default, $cnt_suffix_fsize,'counter');
	$cnt_suffix_fstyle = kswr_shortcode_attribute_value('cnt_suffix_fstyle',$cnt_font_default, $cnt_suffix_fstyle,'counter');
	$suffixStyle = $cnt_suffix_fsize .' '. $cnt_suffix_fstyle. ' color:'. $cnt_suffix_color.';';
	

	$additional_title_fstyle = $additional_value_fstyle = $additional_prefix_fstyle = $additional_suffix_fstyle = ''; 

	fix_kaswara_font_styles($cnt_title_fstyle, $additional_title_fstyle);
	fix_kaswara_font_styles($cnt_value_fstyle, $additional_value_fstyle);
	fix_kaswara_font_styles($cnt_prefix_fstyle, $additional_prefix_fstyle);
	fix_kaswara_font_styles($cnt_suffix_fstyle, $additional_suffix_fstyle);

 	$iconSettings = array(
 		'si_bgsize'				=> kswr_shortcode_attribute_value('cnt_bgsize',$cnt_style_default, $cnt_bgsize,'counter'),
		'si_border_radius'		=> kswr_shortcode_attribute_value('cnt_border_radius',$cnt_style_default, $cnt_border_radius,'counter'),
		'si_effect'				=> $cnt_effect,
		'si_rotation'			=> $cnt_rotation,
		'si_icon'				=> $cnt_icon,
		'si_iconsize'			=> kswr_shortcode_attribute_value('cnt_iconsize',$cnt_style_default, $cnt_iconsize,'counter'),
		'si_ic_color'			=> kswr_shortcode_attribute_value('cnt_ic_color',$cnt_style_default, $cnt_ic_color,'counter'),
		'si_ic_color_hover'		=> kswr_shortcode_attribute_value('cnt_ic_color_hover',$cnt_style_default, $cnt_ic_color_hover,'counter'),
		'si_back'				=> kswr_shortcode_attribute_value('cnt_back',$cnt_style_default, $cnt_back,'counter'),
		'si_back_hover'			=> kswr_shortcode_attribute_value('cnt_back_hover',$cnt_style_default, $cnt_back_hover,'counter'),
		'si_border'				=> kswr_shortcode_attribute_value('cnt_border',$cnt_style_default, $cnt_border,'counter'),
		'si_link'				=> '',
		'si_openlink'			=> ''
 	);
 	$iconArea = kaswara_icon_element_output($iconSettings);
 	if(trim($cnt_image_enable) == '1'){
		$img_src = wp_get_attachment_image_src($cnt_image,'full');
		$iconArea = '<img src="'.esc_url($img_src[0]).'" style="width:'.$cnt_image_width.'px; height:'.$cnt_image_height.'px;">';		
 	}
 	
 	$outPut .= '<div class="kswr-counter-container kswr-icon-thatc kswr-theelement" data-align="'.esc_attr($cnt_align).'" data-layout="'.esc_attr($cnt_layout).'"  data-hover="'.esc_attr($cnt_effect).'" ><div class="kswr-counter-inside-container"><div class="kswr-counter-icon-ct" style="'.$cnt_icon_margins.'">'.$iconArea.'</div>							
						<div class="kswr-counter-ct-leftright"><div class="kswr-counter-title-ct"><div class="kswr-counter-title-pp" style="'.$cnt_value_margins.'">
						<span class="kswr-counter-prefix kswr-shortcode-element ' .$additional_prefix_fstyle. ' " data-fontsettings="'.esc_attr($cnt_prefix_fsize).'"  style="'.$prefixStyle.'">'.$cnt_prefix.' </span>
						<span class="kswr-counter-value kswr-shortcode-element ' .$additional_value_fstyle. ' " data-fontsettings="'.esc_attr($cnt_value_fsize).'"  style="'.$valueStyle.'" data-endVal="'.esc_attr($cnt_value).'" data-separator="'.esc_attr($cnt_separator).'" data-decimal="'.esc_attr($cnt_decimal).'" data-duration="'.esc_attr($cnt_duration).'"></span>									
						<span class="kswr-counter-suffix kswr-shortcode-element ' .$additional_suffix_fstyle. ' " data-fontsettings="'.esc_attr($cnt_suffix_fsize).'" style="'.$suffixStyle.'"> '.$cnt_suffix.'</span></div><div class="kswr-counter-subtitle ' .$additional_title_fstyle. ' " style="'.$titleStyle.'">'.$cnt_title.'</div></div></div></div></div>';

 	return $outPut;
 }
add_shortcode( 'kswr_counter', 'kswr_counter_shortC' );


?>
