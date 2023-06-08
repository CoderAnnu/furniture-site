<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============         H O V E R   I M A GE     	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_hoverimage_shortC($atts) {  
	
 	extract(shortcode_atts(array(								
		"hover_image_style"							=>	'style1',
		"hover_image_bxshadow_enabled"				=>	'off',
		"hover_image_bxshadow_hover_enabled"		=>	'on',
		"hover_image_bxshadow_style"				=>	'style1',
		"hover_image_bxshadow_color"				=>	'rgba(0,0,0,0.5)',	
		"hover_image_button_enabled"				=>	'on',
		"hover_image_button_color"					=>	'#fff',		
		"himg_button_font"							=>	'',
		"himg_button_style"							=>	'',
		"himg_button_size"							=>	'',				
		"hover_image_button_bg"						=>	'#111',
		"hover_image_button_height"					=>	'32',
		"hover_image_info_enabled"					=>	'on',
		"hover_image_info_subtitle_enabled"			=>	'on',
		"hover_image_image"							=>	'',
		"hover_image_overlay_bg"					=>	'rgba(0,0,0,0.5)',
		"hover_image_overlay_enabled"				=>	'on',
		"hover_image_button_text"					=>	'Go Button',
		"hover_image_info_align"					=>	'center',
		"hover_image_title"							=>	'My title',
		"hover_image_title_color"					=>	'#333',
		"himg_title_style"							=>	'',
		"himg_title_size"							=>	'',				
		"hover_image_subtitle"						=>	'My Subtitle',
		"hover_image_subtitle_color"				=>	'#777',		
		"himg_subtitle_style"						=>	'',
		"himg_subtitle_size"						=>	'',	
		"hover_image_border_width"					=> 	'0',
		"hover_image_border_color"					=> 	'transparent',
		"hover_image_background"					=> 	'#fff',
		"hover_image_link"							=> 	'',		
		"hover_image_el_margin"						=> 	'',
		"hover_image_classes"						=> 	'',

 	), $atts));
 	$button_font =  $himg_button_size .' '. $himg_button_style;
 	$title_font =  $himg_title_size .' '. $himg_title_style;
 	$subtitle_font =  $himg_subtitle_size .' '. $himg_subtitle_style;


	$additional_button_style = $additional_title_style = $additional_subtitle_style = ''; 

	fix_kaswara_font_styles($himg_button_style, $additional_button_style);
	fix_kaswara_font_styles($himg_title_style, $additional_title_style);
	fix_kaswara_font_styles($himg_subtitle_style, $additional_subtitle_style);

 	$img_src = wp_get_attachment_image_src($hover_image_image,'full');

 	//Creating The ELements Style
 	$container_style = 'border:'.$hover_image_border_width.'px solid '.$hover_image_border_color.';';
 	$container_style .= $hover_image_el_margin;
 	$button_style = 'height:'.$hover_image_button_height.'px; line-height:'.$hover_image_button_height.'px; color:'.$hover_image_button_color.'; background:'.$hover_image_button_bg.';'.$button_font;
 	
 	$info_style = 'color:'.$hover_image_title_color.'; background:'.$hover_image_background.'; ';
 	$subtitle_style = 'color:'.$hover_image_subtitle_color.';'.$subtitle_font;
 	$link = '';
  	$href = vc_build_link($hover_image_link);
 	
 	if(trim($href['url']) != '')
 		$link =  '<a href="'.$href['url'].'" target="'.$href['target'].'"></a>';
 	
 	$outPut = '<div class="km-hover-image-container km-masonry-item km-masonry-item-hidden km-filteri-item km-element-box-shadow '.$hover_image_classes.'" data-style="'.esc_attr($hover_image_style).'" data-boxshadow="'.esc_attr($hover_image_bxshadow_enabled).'" data-boxshadow-hover="'.esc_attr($hover_image_bxshadow_hover_enabled).'" data-boxshadow-style="'.esc_attr($hover_image_bxshadow_style).'" style="--box-shadow-color:'.$hover_image_bxshadow_color.'; color:'.$hover_image_bxshadow_color.'; '.$container_style.'" data-overlay="'.esc_attr($hover_image_overlay_enabled).'" data-button="'.esc_attr($hover_image_button_enabled).'" data-info="'.esc_attr($hover_image_info_enabled).'" data-info-subtitle="'.esc_attr($hover_image_info_subtitle_enabled).'" >
			<div class="km-hover-image">
				<img src="'.$img_src[0].'">
				<div class="km-hover-image-overlay" style="background:'.$hover_image_overlay_bg.';"></div>
				<div class="km-hover-image-button kswr-shortcode-element ' .$additional_button_style. '  " data-fontsettings="'.esc_attr($himg_button_size).'" style="'.$button_style.'">'.$hover_image_button_text.'</div>
			</div>
			<div class="km-hover-image-info" data-align="'.esc_attr($hover_image_info_align).'" style="'.$info_style.'">
				<div class="km-hover-image-title kswr-shortcode-element ' .$additional_title_style. '  " data-fontsettings="'.esc_attr($himg_title_size).'" style="'.$title_font.'">'.$hover_image_title.'</div>
				<div class="km-hover-image-subtitle kswr-shortcode-element ' .$additional_subtitle_style. '  " data-fontsettings="'.esc_attr($himg_subtitle_size).'" style="'.$subtitle_style.'">'.$hover_image_subtitle.'</div>
			</div>
				'.$link.'
		</div>';

 	return $outPut;
 }
add_shortcode( 'kswr_hoverimage', 'kswr_hoverimage_shortC' );


?>