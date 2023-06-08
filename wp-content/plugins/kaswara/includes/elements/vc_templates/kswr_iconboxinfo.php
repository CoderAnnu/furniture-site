<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============     I C O N    B O X    I N F O  	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_iconboxinfo_shortC($atts, $content) {  
	//Icon Box Info Attributes
 	extract(shortcode_atts(array(						
		//Icon Attributes
		'ibi_style_default'			=> '1',
		'ibi_bgsize' 				=> 	'35',	
		'ibi_border_radius'			=> 	'0',	
		'ibi_effect'				=> 	'none',	
		'ibi_rotation'				=> 	'false',	

		'ibi_icon'					=> 	'',	
		'ibi_iconsize' 				=> 	'18',	
		
		'ibi_ic_color' 				=> 	'{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',	
		'ibi_ic_color_hover'		=> 	'{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',	
		'ibi_back' 					=> 	'{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',	
		'ibi_back_hover'			=> 	'{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',	
		'ibi_border'				=> 	'{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',

		//Check if image is enable
		'ibi_image_enable'			=> 	'0',	
		'ibi_image'					=> 	'0',	
		'ibi_image_width'			=> 	'35',	
		'ibi_image_height'			=> 	'35',	

		//Layout Settings 
		'ibi_layout'				=> 	'icontop',	
		'ibi_align'					=> 	'center',	
		//Text and Fonts		
		'ibi_font_default'			=>	'1',	
		//Title
		'ibi_title'					=> 	'',	
		'ibi_title_fsize'			=> 	'',	
		'ibi_title_fstyle'			=> 	'',	
		'ibi_title_color'			=> 	'',	
		//SubTitle
		'ibi_subtitle'				=> 	'',	
		'ibi_subtitle_fsize'		=> 	'',	
		'ibi_subtitle_fstyle'		=> 	'',	
		'ibi_subtitle_color'		=> 	'',	
		//Content
		'ibi_content_fsize'			=> 	'',	
		'ibi_content_fstyle'		=> 	'',	
		'ibi_content_color'		=> 	'',	
		//Elements Marings			
		'ibi_icon_margins'			=> 	'',	
		'ibi_title_margins'			=> 	'',	
		'ibi_subtitle_margins'		=> 	'',	
		'ibi_content_margins'		=> 	'',	


 	), $atts));
 	$outPut = $iconArea = $iconSettings = $iconStyle = $titleStyle = $subTitleStyle = $contentStyle = '';

 	//Icon Styling
 	$iconStyle = $ibi_icon_margins;
 	//Title Setyling
 	$ibi_title_fsize = kswr_shortcode_attribute_value('ibi_title_fsize',$ibi_font_default, $ibi_title_fsize,'iconboxinfo');
	$ibi_title_fstyle = kswr_shortcode_attribute_value('ibi_title_fstyle',$ibi_font_default, $ibi_title_fstyle,'iconboxinfo');
	$titleStyle = $ibi_title_fsize .' '. $ibi_title_fstyle. ' color:'. $ibi_title_color.';'.$ibi_title_margins;
	//SubTitle Setyling
 	$ibi_subtitle_fsize = kswr_shortcode_attribute_value('ibi_subtitle_fsize',$ibi_font_default, $ibi_subtitle_fsize,'iconboxinfo');
	$ibi_subtitle_fstyle = kswr_shortcode_attribute_value('ibi_subtitle_fstyle',$ibi_font_default, $ibi_subtitle_fstyle,'iconboxinfo');
	$subTitleStyle = $ibi_subtitle_fsize .' '. $ibi_subtitle_fstyle. ' color:'. $ibi_subtitle_color.';'.$ibi_subtitle_margins;
	//Content Setyling
 	$ibi_content_fsize = kswr_shortcode_attribute_value('ibi_content_fsize',$ibi_font_default, $ibi_content_fsize,'iconboxinfo');
	$ibi_content_fstyle = kswr_shortcode_attribute_value('ibi_content_fstyle',$ibi_font_default, $ibi_content_fstyle,'iconboxinfo');
	$contentStyle = $ibi_content_fsize .' '. $ibi_content_fstyle. ' color:'. $ibi_content_color.';'.$ibi_content_margins;

	kswr_load_the_font_front($ibi_title_fstyle);
	kswr_load_the_font_front($ibi_subtitle_fstyle);
	kswr_load_the_font_front($ibi_content_fstyle);

$additional_title_fstyle = $additional_subtitle_fstyle = $additional_content_fstyle = ''; 

fix_kaswara_font_styles($ibi_title_fstyle, $additional_title_fstyle);
fix_kaswara_font_styles($ibi_subtitle_fstyle, $additional_subtitle_fstyle);
fix_kaswara_font_styles($ibi_content_fstyle, $additional_content_fstyle);

 	$iconSettings = array(
 		'si_bgsize'				=> kswr_shortcode_attribute_value('ibi_bgsize',$ibi_style_default, $ibi_bgsize,'iconboxinfo'),
		'si_border_radius'		=> kswr_shortcode_attribute_value('ibi_border_radius',$ibi_style_default, $ibi_border_radius,'iconboxinfo'),
		'si_effect'				=> $ibi_effect,
		'si_rotation'			=> $ibi_rotation,
		'si_icon'				=> $ibi_icon,
		'si_iconsize'			=> kswr_shortcode_attribute_value('ibi_iconsize',$ibi_style_default, $ibi_iconsize,'iconboxinfo'),
		'si_ic_color'			=> kswr_shortcode_attribute_value('ibi_ic_color',$ibi_style_default, $ibi_ic_color,'iconboxinfo'),
		'si_ic_color_hover'		=> kswr_shortcode_attribute_value('ibi_ic_color_hover',$ibi_style_default, $ibi_ic_color_hover,'iconboxinfo'),
		'si_back'				=> kswr_shortcode_attribute_value('ibi_back',$ibi_style_default, $ibi_back,'iconboxinfo'),
		'si_back_hover'			=> kswr_shortcode_attribute_value('ibi_back_hover',$ibi_style_default, $ibi_back_hover,'iconboxinfo'),
		'si_border'				=> kswr_shortcode_attribute_value('ibi_border',$ibi_style_default, $ibi_border,'iconboxinfo'),
		'si_link'				=> '',
		'si_openlink'			=> ''
 	);
	$iconArea = kaswara_icon_element_output($iconSettings);
 	if(trim($ibi_image_enable) == '1'){
		$img_src = wp_get_attachment_image_src($ibi_image,'full');
		$iconArea = '<img src="'.esc_url($img_src[0]).'" style="width:'.$ibi_image_width.'px; height:'.$ibi_image_height.'px;">';		
 	}




 	$outPut .= '<div class="kswr-ibi-container kswr-icon-thatc kswr-theelement"  data-layout="'.esc_attr($ibi_layout).'" data-icolayout="'.esc_attr($ibi_align).'" data-hover="'.esc_attr($ibi_effect).'" ><div class="kswr-ibi-icon-ct" style="'.$iconStyle.'">'.$iconArea.'</div>';
 	if($ibi_layout == 'iconleft' || $ibi_layout == 'iconright')
 		$outPut .= '<div class="kswr-ibi-ct-leftright">' ;

 	$outPut .= '<div class="kswr-ibi-title-ct "><div class="kswr-ibi-title kswr-shortcode-element ' . $additional_title_fstyle . '" data-fontsettings="'.esc_attr($ibi_title_fsize).'" style="'.$titleStyle.'">'.$ibi_title.'</div><div class="kswr-ibi-subtitle kswr-shortcode-element ' . $additional_subtitle_fstyle . '" data-fontsettings="'.esc_attr($ibi_subtitle_fsize).'" style="'.$subTitleStyle.'">'.$ibi_subtitle.'</div></div><div class="kswr-ibi-bottom"><div class="kswr-ibi-content kswr-shortcode-element ' . $additional_content_fstyle . '" data-fontsettings="'.esc_attr($ibi_content_fsize).'" style="'.$contentStyle.'">'.do_shortcode($content).'</div></div>';

	if($ibi_layout == 'iconleft' || $ibi_layout == 'iconright')
 		$outPut .= '</div>' ;	

 	$outPut .= '</div>' ;					
 	return $outPut;
 }
add_shortcode( 'kswr_iconboxinfo', 'kswr_iconboxinfo_shortC' );


?>