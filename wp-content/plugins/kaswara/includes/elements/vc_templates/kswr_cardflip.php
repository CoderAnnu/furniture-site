<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============         C A R D     F L I P	 	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_cardflip_shortC($atts) {  
	//Card Flip  Attributes
 	extract(shortcode_atts(array(	
 		//General Setting					
		'cflp_minheight'					=> '300',
		'cflp_layout'						=> 'toleft',
		'cflp_transition'					=> '0',
		'cflp_container_radius'				=> '0',	
		'cflp_front_backgroundimage'		=> '',	
		'cflp_front_bg_type'				=> 'color',
		'cflp_back_backgroundimage'		=> '',	
		'cflp_back_bg_type'				=> 'color',
		'cflp_front_backgroundimage_img' => '',
		'cflp_back_backgroundimage_img' => '',
		'cflp_columnposition'			=>	'center',
		'cflp_rowposition'				=>	'middle',
		//Front Settings
		'cflp_front_title'					=> '',
		'cflp_front_subtitle' 				=> '',		
		'cflp_img_enable' 					=> '0',
		'cflp_img' 							=> '',
		'cflp_icon' 						=> '',
		'cflp_img_width'					=> '50',
		'cflp_img_height'					=> '50',
		//Check if Default Front
		'cflp_front_style_def'		 		=> '1',
		'cflp_front_background' 			=> '{"type":"color", "color1":"#fafafa", "color2":"transparent", "direction":"to left"}',
		'cflp_front_border'					=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'cflp_front_title_color' 			=> '#333',
		'cflp_front_subtitle_color' 		=> '#888',
		'cflp_icon_color' 					=> '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
		'cflp_icon_bgcolor'					=> '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
		'cflp_icon_size'					=> '32',
		'cflp_icon_bgsize'					=> '52',
		'cflp_icon_br'						=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'cflp_icon_br_radius' 				=> '0',
		


		'cflp_back_title' 					=> '',
		'cflp_back_subtitle' 				=> '',
		'cflp_back_button'					=> '',
		'cflp_back_button_link'				=> '',		
		//Check if Default For Back
		'cflp_back_style_def'		 		=> '1',
		'cflp_back_background' 				=> '{"type":"color", "color1":"#fafafa", "color2":"transparent", "direction":"to left"}',
		'cflp_back_border'					=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'cflp_back_title_color'				=> '#333',
		'cflp_back_subtitle_color'			=> '#888',
		'cflp_back_button_height'			=> '45',	
		'cflp_back_button_color' 			=> '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
		'cflp_back_button_bgcolor' 			=> '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
		'cflp_back_button_border'			=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'cflp_back_button_br_radius'		=> '',

		///////////////////////////////////
		//Margins
		//Front Margins
		'cflp_front_title_mr'				=> '',
		'cflp_front_subtitle_mr' 			=> '',	
		'cflp_front_icon_mr'	 			=> '',	

		//Back Margins
		'cflp_back_title_mr'				=> '',
		'cflp_back_subtitle_mr' 			=> '',	
		'cflp_back_button_mr'	 			=> '',
		'cflp_back_button_pd'				=> '',
		'cflp_cnt_padding'	 				=> '',

		//Font Settings
		'cflp_font_def'				 				=> '1',		
		'cflp_front_title_fsize' 					=> '',
		'cflp_front_title_fstyle' 					=> '',
		'cflp_front_subtitle_fsize' 				=> '',
		'cflp_front_subtitle_fstyle' 				=> '',		
		'cflp_back_title_fsize' 					=> '',
		'cflp_back_title_fstyle' 					=> '',		
		'cflp_back_subtitle_fsize' 					=> '',
		'cflp_back_subtitle_fstyle' 				=> '',
		'cflp_back_button_fsize' 					=> '',
		'cflp_back_button_fstyle' 					=> '',
		


 	), $atts));
 	
 	//Front Default
	$cflp_front_background			= kswr_shortcode_attribute_value('cflp_front_background',$cflp_front_style_def, $cflp_front_background,'cardflip');
	$cflp_front_border				= kswr_shortcode_attribute_value('cflp_front_border',$cflp_front_style_def, $cflp_front_border,'cardflip');
	$cflp_front_title_color			= kswr_shortcode_attribute_value('cflp_front_title_color',$cflp_front_style_def, $cflp_front_title_color,'cardflip');
	$cflp_front_subtitle_color		= kswr_shortcode_attribute_value('cflp_front_subtitle_color',$cflp_front_style_def, $cflp_front_subtitle_color,'cardflip');
	$cflp_icon_color				= kswr_shortcode_attribute_value('cflp_icon_color',$cflp_front_style_def, $cflp_icon_color,'cardflip');
	$cflp_icon_bgcolor				= kswr_shortcode_attribute_value('cflp_icon_bgcolor',$cflp_front_style_def, $cflp_icon_bgcolor,'cardflip');
	$cflp_icon_size					= kswr_shortcode_attribute_value('cflp_icon_size',$cflp_front_style_def, $cflp_icon_size,'cardflip');
	$cflp_icon_bgsize				= kswr_shortcode_attribute_value('cflp_icon_bgsize',$cflp_front_style_def, $cflp_icon_bgsize,'cardflip');
	$cflp_icon_br					= kswr_shortcode_attribute_value('cflp_icon_br',$cflp_front_style_def, $cflp_icon_br,'cardflip');
	$cflp_icon_br_radius			= kswr_shortcode_attribute_value('cflp_icon_br_radius',$cflp_front_style_def, $cflp_icon_br_radius,'cardflip');

	//Back Default
	$cflp_back_background			= kswr_shortcode_attribute_value('cflp_back_background',$cflp_back_style_def, $cflp_back_background,'cardflip');
	$cflp_back_border				= kswr_shortcode_attribute_value('cflp_back_border',$cflp_back_style_def, $cflp_back_border,'cardflip');
	$cflp_back_title_color			= kswr_shortcode_attribute_value('cflp_back_title_color',$cflp_back_style_def, $cflp_back_title_color,'cardflip');
	$cflp_back_subtitle_color		= kswr_shortcode_attribute_value('cflp_back_subtitle_color',$cflp_back_style_def, $cflp_back_subtitle_color,'cardflip');
	$cflp_back_button_color			= kswr_shortcode_attribute_value('cflp_back_button_color',$cflp_back_style_def, $cflp_back_button_color,'cardflip');
	$cflp_back_button_bgcolor		= kswr_shortcode_attribute_value('cflp_back_button_bgcolor',$cflp_back_style_def, $cflp_back_button_bgcolor,'cardflip');
	$cflp_back_button_border		= kswr_shortcode_attribute_value('cflp_back_button_border',$cflp_back_style_def, $cflp_back_button_border,'cardflip');
	$cflp_back_button_br_radius		= kswr_shortcode_attribute_value('cflp_back_button_br_radius',$cflp_back_style_def, $cflp_back_button_br_radius,'cardflip');

	//Font Default 
	$cflp_front_title_fsize			= kswr_shortcode_attribute_value('cflp_front_title_fsize',$cflp_font_def, $cflp_front_title_fsize,'cardflip');
	$cflp_front_title_fstyle		= kswr_shortcode_attribute_value('cflp_front_title_fstyle',$cflp_font_def, $cflp_front_title_fstyle,'cardflip');
	$cflp_front_subtitle_fsize		= kswr_shortcode_attribute_value('cflp_front_subtitle_fsize',$cflp_font_def, $cflp_front_subtitle_fsize,'cardflip');
	$cflp_front_subtitle_fstyle		= kswr_shortcode_attribute_value('cflp_front_subtitle_fstyle',$cflp_font_def, $cflp_front_subtitle_fstyle,'cardflip');
	$cflp_back_title_fsize			= kswr_shortcode_attribute_value('cflp_back_title_fsize',$cflp_font_def, $cflp_back_title_fsize,'cardflip');
	$cflp_back_title_fstyle			= kswr_shortcode_attribute_value('cflp_back_title_fstyle',$cflp_font_def, $cflp_back_title_fstyle,'cardflip');
	$cflp_back_subtitle_fsize		= kswr_shortcode_attribute_value('cflp_back_subtitle_fsize',$cflp_font_def, $cflp_back_subtitle_fsize,'cardflip');
	$cflp_back_subtitle_fstyle		= kswr_shortcode_attribute_value('cflp_back_subtitle_fstyle',$cflp_font_def, $cflp_back_subtitle_fstyle,'cardflip');
	$cflp_back_button_fsize			= kswr_shortcode_attribute_value('cflp_back_button_fsize',$cflp_font_def, $cflp_back_button_fsize,'cardflip');
	$cflp_back_button_fstyle		= kswr_shortcode_attribute_value('cflp_back_button_fstyle',$cflp_font_def, $cflp_back_button_fstyle,'cardflip');
	$cflp_back_button_height   		= kswr_shortcode_attribute_value('cflp_back_button_height',$cflp_font_def, $cflp_back_button_height,'cardflip');
	//Styles
	$frontContainerStyle = $backContainerStyle = $iconStyle = $titleFrontStyle = $subtitleFrontStyle = $titleBackStyle = $subtitleBackStyle = $buttonBackStyle = $isButton = '';

	kswr_load_the_font_front($cflp_front_title_fstyle);
	kswr_load_the_font_front($cflp_front_subtitle_fstyle);
	kswr_load_the_font_front($cflp_back_title_fstyle);
	kswr_load_the_font_front($cflp_back_subtitle_fstyle);
	kswr_load_the_font_front($cflp_back_button_fstyle);

$additional_front_title_fstyle =  $additional_front_subtitle_fstyle = $additional_back_title_fstyle = $additional_back_subtitle_fstyle = $back_button_fstyle = ''; 

fix_kaswara_font_styles($cflp_front_title_fstyle, $additional_front_title_fstyle);
fix_kaswara_font_styles($cflp_front_subtitle_fstyle, $additional_front_subtitle_fstyle);
fix_kaswara_font_styles($cflp_back_title_fstyle, $additional_back_title_fstyle);
fix_kaswara_font_styles($cflp_back_subtitle_fstyle, $additional_back_subtitle_fstyle);
fix_kaswara_font_styles($cflp_back_button_fstyle, $back_button_fstyle);



	 //Front Styling 
	 if($cflp_front_bg_type == 'color')
	 	$frontContainerStyle .= kswr_gradient_color_maker('background-color' ,$cflp_front_background);
	
	 
	$frontContainerStyle .= kswr_gradient_border_maker($cflp_front_border,'border').' '.$cflp_cnt_padding.'border-radius:'.$cflp_container_radius.'px;min-height:'.$cflp_minheight.'px;';

	$iconStyle = 'font-size:'.$cflp_icon_size.'px; width:'.$cflp_icon_bgsize.'px; height:'.$cflp_icon_bgsize.'px; line-height:'.$cflp_icon_bgsize.'px; border-radius:'.$cflp_icon_br_radius.'px;' .' '. kswr_gradient_color_maker('background-color' ,$cflp_icon_bgcolor).''.kswr_gradient_border_maker($cflp_icon_br,'border');
	$titleFrontStyle = $cflp_front_title_fsize .' '. $cflp_front_title_fstyle .'color:'. $cflp_front_title_color .'; '. $cflp_front_title_mr;
	$subtitleFrontStyle = $cflp_front_subtitle_fsize .' '. $cflp_front_subtitle_fstyle .' color:'. $cflp_front_subtitle_color .'; '. $cflp_front_subtitle_mr;

	//Back Styling
	if($cflp_back_bg_type == 'color')
	 	$backContainerStyle .= kswr_gradient_color_maker('background-color' ,$cflp_back_background);
	 

	 $backContainerStyle .= kswr_gradient_border_maker($cflp_back_border,'border').' '.$cflp_cnt_padding.'border-radius:'.$cflp_container_radius.'px';
	 $titleBackStyle = $cflp_back_title_fsize .' '. $cflp_back_title_fstyle .'color:'. $cflp_back_title_color .';'. $cflp_back_title_mr;
	$subtitleBackStyle = $cflp_back_subtitle_fsize .' '. $cflp_back_subtitle_fstyle .'color:'. $cflp_back_subtitle_color .';'. $cflp_back_subtitle_mr;
	 if(trim($cflp_back_button) != ''){
	 	$buttonBackStyle = kswr_gradient_color_maker('color' ,$cflp_back_button_color) .' '. kswr_gradient_color_maker('background-color' ,$cflp_back_button_bgcolor).''.kswr_gradient_border_maker($cflp_back_button_border,'border').'border-radius:'.$cflp_back_button_br_radius.'px;'.'height:'.$cflp_back_button_height.'px; line-height:'.$cflp_back_button_height.'px;'.$cflp_back_button_fsize .''.$cflp_back_button_fstyle.''.$cflp_back_button_pd;
	 
	 	$href = vc_build_link($cflp_back_button_link);

	 	$isButton = '<div class="kswr-cflp-back-button" style="'.$cflp_back_button_mr.'">
	 		<a href="'.esc_url($href['url']).'" target="'.esc_attr($href['target']).'" style="'.$buttonBackStyle.'" class="kswr-cflp-back-button kswr-shortcode-element ' .$back_button_fstyle. ' " data-fontsettings="'.esc_attr($cflp_back_button_fsize).'">'.$cflp_back_button.'</a>
		 </div>';
	 	
	 }


 	$iconArea = '<div class="cflp-front-iconar" style="'.$iconStyle.'"><i style="'.kswr_gradient_color_maker('color' ,$cflp_icon_color).'" class="'.esc_attr($cflp_icon).'"></i></div>';
 	if(trim($cflp_img_enable) == '1'){
		$img_src = wp_get_attachment_image_src($cflp_img,'full');
		$iconArea = '<img src="'.esc_url($img_src[0]).'" style="width:'.$cflp_img_width.'px; height:'.$cflp_img_height.'px;">';		
 	}


 	$outPut = '<div class="kswr-cflp-container kswr-theelement kswr-flip-container" data-columnposition="'.esc_attr($cflp_columnposition).'" data-rowposition="'.esc_attr($cflp_rowposition).'" data-layout="'.esc_attr($cflp_layout).'" data-smootheffect="'.esc_attr($cflp_transition).'" style="min-height:'.$cflp_minheight.'px;">
				  <div class="kswr-cflp-card">
				    <div class="kswr-cflp-front kswr-cflp-figure" style="'.$frontContainerStyle.'">';
	 if($cflp_front_bg_type == 'image')
	 	$outPut .= kswr_background_maker($cflp_front_backgroundimage_img,$cflp_front_backgroundimage);
				    	
	$outPut .='<div class="kswr-cflp-insider kswr-flip-insider">
					    	<div class="kswr-cflp-front-icon" style="'.$cflp_front_icon_mr.'">'.$iconArea.'</div>	
					    	<div class="kswr-cflp-front-title kswr-shortcode-element ' .$additional_front_title_fstyle. ' " data-fontsettings="'.esc_attr($cflp_front_title_fsize).'" style="'.$titleFrontStyle.'">'.$cflp_front_title.'</div>	
					    	<div class="kswr-cflp-front-subtitle kswr-shortcode-element ' .$additional_front_subtitle_fstyle. ' " data-fontsettings="'.esc_attr($cflp_front_subtitle_fsize).'" style="'.$subtitleFrontStyle.'">'.$cflp_front_subtitle.'</div>			    	
				    	</div>
				    </div>				    
				    <div class="kswr-cflp-back kswr-cflp-figure" style="'.$backContainerStyle.'">';
	 if($cflp_back_bg_type == 'image')
	 	$outPut .= kswr_background_maker($cflp_back_backgroundimage_img,$cflp_back_backgroundimage);			    	
	$outPut .='<div class="kswr-cflp-insider kswr-flip-insider">
					    	<div class="kswr-cflp-back-title kswr-shortcode-element ' .$additional_back_title_fstyle. ' " data-fontsettings="'.esc_attr($cflp_back_title_fsize).'" style="'.$titleBackStyle.'">'.$cflp_back_title.'</div>	
					    	<div class="kswr-cflp-back-subtitle kswr-shortcode-element ' .$additional_back_subtitle_fstyle. ' " data-fontsettings="'.esc_attr($cflp_back_subtitle_fsize).'" style="'.$subtitleBackStyle.'">'.$cflp_back_subtitle.'</div>	
					    	'.$isButton.'
					    </div>	
				    </div>
				  </div>
				</div>';
 	
 	return $outPut;
 }
add_shortcode( 'kswr_cardflip', 'kswr_cardflip_shortC' );


?>