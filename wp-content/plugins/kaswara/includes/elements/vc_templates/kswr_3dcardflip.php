<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============       3D  C A R D     F L I P	 	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_threedcardflip_shortC($atts) {  
	//Card Flip  Attributes
 	extract(shortcode_atts(array(	
 		//General Setting					
		'trcflp_layout'						=> 'toleft',
		'trcflp_transition'					=> '0',
		'trcflp_container_radius'				=> '0',	
		'trcflp_front_backgroundimage'		=> '',	
		'trcflp_front_bg_type'				=> 'color',
		'trcflp_back_backgroundimage'		=> '',	
		'trcflp_back_bg_type'				=> 'color',
		'trcflp_front_backgroundimage_img'	=> '',
		'trcflp_back_backgroundimage_img'	=> '',
		//Front Settings
		'trcflp_front_title'					=> '',
		'trcflp_front_subtitle' 				=> '',		
		'trcflp_img_enable' 					=> '0',
		'trcflp_img' 							=> '',
		'trcflp_icon' 						=> '',
		'trcflp_img_width'					=> '50',
		'trcflp_img_height'					=> '50',
		//Check if Default Front
		'trcflp_front_style_def'		 		=> '1',
		'trcflp_front_background' 			=> '{"type":"color", "color1":"#fafafa", "color2":"transparent", "direction":"to left"}',
		'trcflp_front_border'					=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'trcflp_front_title_color' 			=> '#333',
		'trcflp_front_subtitle_color' 		=> '#888',
		'trcflp_icon_color' 					=> '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
		'trcflp_icon_bgcolor'					=> '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
		'trcflp_icon_size'					=> '32',
		'trcflp_icon_bgsize'					=> '52',
		'trcflp_icon_br'						=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'trcflp_icon_br_radius' 				=> '0',
		


		'trcflp_back_title' 					=> '',
		'trcflp_back_subtitle' 				=> '',
		'trcflp_back_button'					=> '',
		'trcflp_back_button_link'				=> '',		
		//Check if Default For Back
		'trcflp_back_style_def'		 		=> '1',
		'trcflp_back_background' 				=> '{"type":"color", "color1":"#fafafa", "color2":"transparent", "direction":"to left"}',
		'trcflp_back_border'					=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'trcflp_back_title_color'				=> '#333',
		'trcflp_back_subtitle_color'			=> '#888',
		'trcflp_back_button_height'			=> '45',	
		'trcflp_back_button_color' 			=> '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
		'trcflp_back_button_bgcolor' 			=> '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
		'trcflp_back_button_border'			=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'trcflp_back_button_br_radius'		=> '',

		///////////////////////////////////
		//Margins
		//Front Margins
		'trcflp_front_title_mr'				=> '',
		'trcflp_front_subtitle_mr' 			=> '',	
		'trcflp_front_icon_mr'	 			=> '',	

		//Back Margins
		'trcflp_back_title_mr'				=> '',
		'trcflp_back_subtitle_mr' 			=> '',	
		'trcflp_back_button_mr'	 			=> '',
		'trcflp_back_button_pd'				=> '',
		'trcflp_cnt_padding'	 				=> '',

		//Font Settings
		'trcflp_font_def'				 				=> '1',		
		'trcflp_front_title_fsize' 					=> '',
		'trcflp_front_title_fstyle' 					=> '',
		'trcflp_front_subtitle_fsize' 				=> '',
		'trcflp_front_subtitle_fstyle' 				=> '',		
		'trcflp_back_title_fsize' 					=> '',
		'trcflp_back_title_fstyle' 					=> '',		
		'trcflp_back_subtitle_fsize' 					=> '',
		'trcflp_back_subtitle_fstyle' 				=> '',
		'trcflp_back_button_fsize' 					=> '',
		'trcflp_back_button_fstyle' 					=> '',
		


 	), $atts));
 	
 	//Front Default
	$trcflp_front_background			= kswr_shortcode_attribute_value('trcflp_front_background',$trcflp_front_style_def, $trcflp_front_background,'threedcardflip');
	$trcflp_front_border				= kswr_shortcode_attribute_value('trcflp_front_border',$trcflp_front_style_def, $trcflp_front_border,'threedcardflip');
	$trcflp_front_title_color			= kswr_shortcode_attribute_value('trcflp_front_title_color',$trcflp_front_style_def, $trcflp_front_title_color,'threedcardflip');
	$trcflp_front_subtitle_color		= kswr_shortcode_attribute_value('trcflp_front_subtitle_color',$trcflp_front_style_def, $trcflp_front_subtitle_color,'threedcardflip');
	$trcflp_icon_color				= kswr_shortcode_attribute_value('trcflp_icon_color',$trcflp_front_style_def, $trcflp_icon_color,'threedcardflip');
	$trcflp_icon_bgcolor				= kswr_shortcode_attribute_value('trcflp_icon_bgcolor',$trcflp_front_style_def, $trcflp_icon_bgcolor,'threedcardflip');
	$trcflp_icon_size					= kswr_shortcode_attribute_value('trcflp_icon_size',$trcflp_front_style_def, $trcflp_icon_size,'threedcardflip');
	$trcflp_icon_bgsize				= kswr_shortcode_attribute_value('trcflp_icon_bgsize',$trcflp_front_style_def, $trcflp_icon_bgsize,'threedcardflip');
	$trcflp_icon_br					= kswr_shortcode_attribute_value('trcflp_icon_br',$trcflp_front_style_def, $trcflp_icon_br,'threedcardflip');
	$trcflp_icon_br_radius			= kswr_shortcode_attribute_value('trcflp_icon_br_radius',$trcflp_front_style_def, $trcflp_icon_br_radius,'threedcardflip');

	//Back Default
	$trcflp_back_background			= kswr_shortcode_attribute_value('trcflp_back_background',$trcflp_back_style_def, $trcflp_back_background,'threedcardflip');
	$trcflp_back_border				= kswr_shortcode_attribute_value('trcflp_back_border',$trcflp_back_style_def, $trcflp_back_border,'threedcardflip');
	$trcflp_back_title_color			= kswr_shortcode_attribute_value('trcflp_back_title_color',$trcflp_back_style_def, $trcflp_back_title_color,'threedcardflip');
	$trcflp_back_subtitle_color		= kswr_shortcode_attribute_value('trcflp_back_subtitle_color',$trcflp_back_style_def, $trcflp_back_subtitle_color,'threedcardflip');
	$trcflp_back_button_color			= kswr_shortcode_attribute_value('trcflp_back_button_color',$trcflp_back_style_def, $trcflp_back_button_color,'threedcardflip');
	$trcflp_back_button_bgcolor		= kswr_shortcode_attribute_value('trcflp_back_button_bgcolor',$trcflp_back_style_def, $trcflp_back_button_bgcolor,'threedcardflip');
	$trcflp_back_button_border		= kswr_shortcode_attribute_value('trcflp_back_button_border',$trcflp_back_style_def, $trcflp_back_button_border,'threedcardflip');
	$trcflp_back_button_br_radius		= kswr_shortcode_attribute_value('trcflp_back_button_br_radius',$trcflp_back_style_def, $trcflp_back_button_br_radius,'threedcardflip');

	//Font Default 
	$trcflp_front_title_fsize			= kswr_shortcode_attribute_value('trcflp_front_title_fsize',$trcflp_font_def, $trcflp_front_title_fsize,'threedcardflip');
	$trcflp_front_title_fstyle		= kswr_shortcode_attribute_value('trcflp_front_title_fstyle',$trcflp_font_def, $trcflp_front_title_fstyle,'threedcardflip');
	$trcflp_front_subtitle_fsize		= kswr_shortcode_attribute_value('trcflp_front_subtitle_fsize',$trcflp_font_def, $trcflp_front_subtitle_fsize,'threedcardflip');
	$trcflp_front_subtitle_fstyle		= kswr_shortcode_attribute_value('trcflp_front_subtitle_fstyle',$trcflp_font_def, $trcflp_front_subtitle_fstyle,'threedcardflip');
	$trcflp_back_title_fsize			= kswr_shortcode_attribute_value('trcflp_back_title_fsize',$trcflp_font_def, $trcflp_back_title_fsize,'threedcardflip');
	$trcflp_back_title_fstyle			= kswr_shortcode_attribute_value('trcflp_back_title_fstyle',$trcflp_font_def, $trcflp_back_title_fstyle,'threedcardflip');
	$trcflp_back_subtitle_fsize		= kswr_shortcode_attribute_value('trcflp_back_subtitle_fsize',$trcflp_font_def, $trcflp_back_subtitle_fsize,'threedcardflip');
	$trcflp_back_subtitle_fstyle		= kswr_shortcode_attribute_value('trcflp_back_subtitle_fstyle',$trcflp_font_def, $trcflp_back_subtitle_fstyle,'threedcardflip');
	$trcflp_back_button_fsize			= kswr_shortcode_attribute_value('trcflp_back_button_fsize',$trcflp_font_def, $trcflp_back_button_fsize,'threedcardflip');
	$trcflp_back_button_fstyle		= kswr_shortcode_attribute_value('trcflp_back_button_fstyle',$trcflp_font_def, $trcflp_back_button_fstyle,'threedcardflip');
	$trcflp_back_button_height   		= kswr_shortcode_attribute_value('trcflp_back_button_height',$trcflp_font_def, $trcflp_back_button_height,'threedcardflip');
	//Styles
	$frontContainerStyle = $backContainerStyle = $iconStyle = $titleFrontStyle = $subtitleFrontStyle = $titleBackStyle = $subtitleBackStyle = $buttonBackStyle = $isButton = '';
 	
	kswr_load_the_font_front($trcflp_front_title_fstyle);
	kswr_load_the_font_front($trcflp_front_subtitle_fstyle);
	kswr_load_the_font_front($trcflp_back_title_fstyle);
	kswr_load_the_font_front($trcflp_back_subtitle_fstyle);
	kswr_load_the_font_front($trcflp_back_button_fstyle);


$additional_front_title =  $additional_front_subtitle = $additional_back_title = $additional_back_subtitle = $additional_back_button = ''; 

fix_kaswara_font_styles($trcflp_front_title_fstyle, $additional_front_title);
fix_kaswara_font_styles($trcflp_front_subtitle_fstyle, $additional_front_subtitle);
fix_kaswara_font_styles($trcflp_back_title_fstyle, $additional_back_title);
fix_kaswara_font_styles($trcflp_back_subtitle_fstyle, $additional_back_subtitle);
fix_kaswara_font_styles($trcflp_back_button_fstyle, $additional_back_button);


	 //Front Styling 
	 if($trcflp_front_bg_type == 'color')
	 	$frontContainerStyle .= kswr_gradient_color_maker('background-color' ,$trcflp_front_background);
	 
	 
	$frontContainerStyle .= kswr_gradient_border_maker($trcflp_front_border,'border').' '.$trcflp_cnt_padding.'border-radius:'.$trcflp_container_radius.'px';

	$iconStyle = 'font-size:'.$trcflp_icon_size.'px; width:'.$trcflp_icon_bgsize.'px; height:'.$trcflp_icon_bgsize.'px; line-height:'.$trcflp_icon_bgsize.'px; border-radius:'.$trcflp_icon_br_radius.'px;'.' '. kswr_gradient_color_maker('background-color' ,$trcflp_icon_bgcolor).''.kswr_gradient_border_maker($trcflp_icon_br,'border');
	$titleFrontStyle = $trcflp_front_title_fsize .' '. $trcflp_front_title_fstyle .'color:'. $trcflp_front_title_color .'; '. $trcflp_front_title_mr;
	$subtitleFrontStyle = $trcflp_front_subtitle_fsize .' '. $trcflp_front_subtitle_fstyle .' color:'. $trcflp_front_subtitle_color .'; '. $trcflp_front_subtitle_mr;

	//Back Styling
	if($trcflp_back_bg_type == 'color')
	 	$backContainerStyle .= kswr_gradient_color_maker('background-color' ,$trcflp_back_background);
	 

	 $backContainerStyle .= kswr_gradient_border_maker($trcflp_back_border,'border').' '.$trcflp_cnt_padding.'border-radius:'.$trcflp_container_radius.'px';
	 $titleBackStyle = $trcflp_back_title_fsize .' '. $trcflp_back_title_fstyle .'color:'. $trcflp_back_title_color .';'. $trcflp_back_title_mr;
	$subtitleBackStyle = $trcflp_back_subtitle_fsize .' '. $trcflp_back_subtitle_fstyle .'color:'. $trcflp_back_subtitle_color .';'. $trcflp_back_subtitle_mr;
	 if(trim($trcflp_back_button) != ''){
	 	$buttonBackStyle = kswr_gradient_color_maker('color' ,$trcflp_back_button_color) .' '. kswr_gradient_color_maker('background-color' ,$trcflp_back_button_bgcolor).''.kswr_gradient_border_maker($trcflp_back_button_border,'border').'border-radius:'.$trcflp_back_button_br_radius.'px;'.'height:'.$trcflp_back_button_height.'px; line-height:'.$trcflp_back_button_height.'px;'.$trcflp_back_button_fsize .''.$trcflp_back_button_fstyle.''.$trcflp_back_button_pd;
	 
	 	$href = vc_build_link($trcflp_back_button_link);
	 	$isButton = '<div class="kswr-trcflp-back-button" style="'.$trcflp_back_button_mr.'">
	 		<a href="'.$href['url'].'" target="'.$href['target'].'" style="'.$buttonBackStyle.'" class="kswr-trcflp-back-button kswr-shortcode-element ' .$additional_back_button. '  " data-fontsettings="'.$trcflp_back_button_fsize.'">'.$trcflp_back_button.'</a>
		 </div>';
	 	
	 }


 	$iconArea = '<div class="trcflp-front-iconar" style="'.$iconStyle.'"><i class="'.esc_attr($trcflp_icon).'" style="'.kswr_gradient_color_maker('color' ,$trcflp_icon_color).'"></i></div>';
 	if(trim($trcflp_img_enable) == '1'){
		$img_src = wp_get_attachment_image_src($trcflp_img,'full');
		$iconArea = '<img src="'.esc_url($img_src[0]).'" style="width:'.$trcflp_img_width.'px; height:'.$trcflp_img_height.'px;">';		
 	}


 	$outPut = '<div class="kswr-trcflp-container kswr-theelement" data-layout="'.esc_attr($trcflp_layout).'">
				  <div class="kswr-trcflp-card">
				    <div class="kswr-trcflp-front kswr-trcflp-figure" style="'.$frontContainerStyle.'">';
	if($trcflp_front_bg_type == 'image')
	 	$outPut .= kswr_background_maker($trcflp_front_backgroundimage_img,$trcflp_front_backgroundimage);			    	

	$outPut .='<div class="kswr-trcflp-front-icon" style="'.$trcflp_front_icon_mr.'">'.$iconArea.'</div>	
				    	<div class="kswr-trcflp-front-title kswr-shortcode-element ' .$additional_front_title. '  " data-fontsettings="'.esc_attr($trcflp_front_title_fsize).'" style="'.$titleFrontStyle.'">'.$trcflp_front_title.'</div>	
				    	<div class="kswr-trcflp-front-subtitle kswr-shortcode-element ' .$additional_front_subtitle. '  " data-fontsettings="'.esc_attr($trcflp_front_subtitle_fsize).'" style="'.$subtitleFrontStyle.'">'.$trcflp_front_subtitle.'</div>			    	
				    </div>
				    
				    <div class="kswr-trcflp-back kswr-trcflp-figure" style="'.$backContainerStyle.'">';
	if($trcflp_back_bg_type == 'image')
	 	$outPut .= kswr_background_maker($trcflp_back_backgroundimage_img,$trcflp_back_backgroundimage);			    

	$outPut .='<div class="kswr-trcflp-back-title kswr-shortcode-element ' .$additional_back_title. '  " data-fontsettings="'.esc_attr($trcflp_back_title_fsize).'" style="'.$titleBackStyle.'">'.$trcflp_back_title.'</div>	
				    	<div class="kswr-trcflp-back-subtitle kswr-shortcode-element ' .$additional_back_subtitle. '  " data-fontsettings="'.esc_attr($trcflp_back_subtitle_fsize).'" style="'.$subtitleBackStyle.'">'.$trcflp_back_subtitle.'</div>	
				    	'.$isButton.'
				    </div>
				  </div>
				</div>';

 	return $outPut;
 }
add_shortcode( 'kswr_threedcardflip', 'kswr_threedcardflip_shortC' );


?>