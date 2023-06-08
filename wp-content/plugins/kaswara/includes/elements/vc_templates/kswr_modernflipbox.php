<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==========      M O D E R N    F L I P     B O X	 	   ========== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_modernflipbox_shortC($atts) {  
	//Modern Flip Box  Attributes mdnflb
 	extract(shortcode_atts(array(	
 		//General Setting					
		'mdnflb_minheight'					=> '300',
		'mdnflb_layout'						=> 'toleft',		
		'mdnflb_container_radius'				=> '0',	
		'mdnflb_front_backgroundimage'		=> '',	
		'mdnflb_front_bg_type'				=> 'color',
		'mdnflb_back_backgroundimage'		=> '',	
		'mdnflb_back_bg_type'				=> 'color',
		'mdnflb_front_backgroundimage_img'	=>'',
		'mdnflb_back_backgroundimage_img'	=>'',
		'mdnflb_columnposition'			=>	'center',
		'mdnflb_rowposition'				=>	'middle',
		//Front Settings
		'mdnflb_front_title'					=> '',
		'mdnflb_front_subtitle' 				=> '',		
		'mdnflb_img_enable' 					=> '0',
		'mdnflb_img' 							=> '',
		'mdnflb_icon' 						=> '',
		'mdnflb_img_width'					=> '50',
		'mdnflb_img_height'					=> '50',
		//Check if Default Front
		'mdnflb_front_style_def'		 		=> '1',
		'mdnflb_front_background' 			=> '{"type":"color", "color1":"#fafafa", "color2":"transparent", "direction":"to left"}',
		'mdnflb_front_border'					=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'mdnflb_front_title_color' 			=> '#333',
		'mdnflb_front_subtitle_color' 		=> '#888',
		'mdnflb_icon_color' 					=> '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
		'mdnflb_icon_bgcolor'					=> '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
		'mdnflb_icon_size'					=> '32',
		'mdnflb_icon_bgsize'					=> '52',
		'mdnflb_icon_br'						=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'mdnflb_icon_br_radius' 				=> '0',
		


		'mdnflb_back_title' 					=> '',
		'mdnflb_back_subtitle' 				=> '',
		'mdnflb_back_button'					=> '',
		'mdnflb_back_button_link'				=> '',		
		//Check if Default For Back
		'mdnflb_back_style_def'		 		=> '1',
		'mdnflb_back_background' 				=> '{"type":"color", "color1":"#fafafa", "color2":"transparent", "direction":"to left"}',
		'mdnflb_back_border'					=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'mdnflb_back_title_color'				=> '#333',
		'mdnflb_back_subtitle_color'			=> '#888',
		'mdnflb_back_button_height'			=> '45',	
		'mdnflb_back_button_color' 			=> '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
		'mdnflb_back_button_bgcolor' 			=> '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
		'mdnflb_back_button_border'			=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'mdnflb_back_button_br_radius'		=> '',

		///////////////////////////////////
		//Margins
		//Front Margins
		'mdnflb_front_title_mr'				=> '',
		'mdnflb_front_subtitle_mr' 			=> '',	
		'mdnflb_front_icon_mr'	 			=> '',	

		//Back Margins
		'mdnflb_back_title_mr'				=> '',
		'mdnflb_back_subtitle_mr' 			=> '',	
		'mdnflb_back_button_mr'	 			=> '',
		'mdnflb_back_button_pd'				=> '',
		'mdnflb_cnt_padding'	 				=> '',

		//Font Settings
		'mdnflb_font_def'				 				=> '1',		
		'mdnflb_front_title_fsize' 					=> '',
		'mdnflb_front_title_fstyle' 					=> '',
		'mdnflb_front_subtitle_fsize' 				=> '',
		'mdnflb_front_subtitle_fstyle' 				=> '',		
		'mdnflb_back_title_fsize' 					=> '',
		'mdnflb_back_title_fstyle' 					=> '',		
		'mdnflb_back_subtitle_fsize' 					=> '',
		'mdnflb_back_subtitle_fstyle' 				=> '',
		'mdnflb_back_button_fsize' 					=> '',
		'mdnflb_back_button_fstyle' 					=> '',
		


 	), $atts));
 	
 	//Front Default
	$mdnflb_front_background			= kswr_shortcode_attribute_value('mdnflb_front_background',$mdnflb_front_style_def, $mdnflb_front_background,'modernflipbox');
	$mdnflb_front_border				= kswr_shortcode_attribute_value('mdnflb_front_border',$mdnflb_front_style_def, $mdnflb_front_border,'modernflipbox');
	$mdnflb_front_title_color			= kswr_shortcode_attribute_value('mdnflb_front_title_color',$mdnflb_front_style_def, $mdnflb_front_title_color,'modernflipbox');
	$mdnflb_front_subtitle_color		= kswr_shortcode_attribute_value('mdnflb_front_subtitle_color',$mdnflb_front_style_def, $mdnflb_front_subtitle_color,'modernflipbox');
	$mdnflb_icon_color				= kswr_shortcode_attribute_value('mdnflb_icon_color',$mdnflb_front_style_def, $mdnflb_icon_color,'modernflipbox');
	$mdnflb_icon_bgcolor				= kswr_shortcode_attribute_value('mdnflb_icon_bgcolor',$mdnflb_front_style_def, $mdnflb_icon_bgcolor,'modernflipbox');
	$mdnflb_icon_size					= kswr_shortcode_attribute_value('mdnflb_icon_size',$mdnflb_front_style_def, $mdnflb_icon_size,'modernflipbox');
	$mdnflb_icon_bgsize				= kswr_shortcode_attribute_value('mdnflb_icon_bgsize',$mdnflb_front_style_def, $mdnflb_icon_bgsize,'modernflipbox');
	$mdnflb_icon_br					= kswr_shortcode_attribute_value('mdnflb_icon_br',$mdnflb_front_style_def, $mdnflb_icon_br,'modernflipbox');
	$mdnflb_icon_br_radius			= kswr_shortcode_attribute_value('mdnflb_icon_br_radius',$mdnflb_front_style_def, $mdnflb_icon_br_radius,'modernflipbox');

	//Back Default
	$mdnflb_back_background			= kswr_shortcode_attribute_value('mdnflb_back_background',$mdnflb_back_style_def, $mdnflb_back_background,'modernflipbox');
	$mdnflb_back_border				= kswr_shortcode_attribute_value('mdnflb_back_border',$mdnflb_back_style_def, $mdnflb_back_border,'modernflipbox');
	$mdnflb_back_title_color			= kswr_shortcode_attribute_value('mdnflb_back_title_color',$mdnflb_back_style_def, $mdnflb_back_title_color,'modernflipbox');
	$mdnflb_back_subtitle_color		= kswr_shortcode_attribute_value('mdnflb_back_subtitle_color',$mdnflb_back_style_def, $mdnflb_back_subtitle_color,'modernflipbox');
	$mdnflb_back_button_color			= kswr_shortcode_attribute_value('mdnflb_back_button_color',$mdnflb_back_style_def, $mdnflb_back_button_color,'modernflipbox');
	$mdnflb_back_button_bgcolor		= kswr_shortcode_attribute_value('mdnflb_back_button_bgcolor',$mdnflb_back_style_def, $mdnflb_back_button_bgcolor,'modernflipbox');
	$mdnflb_back_button_border		= kswr_shortcode_attribute_value('mdnflb_back_button_border',$mdnflb_back_style_def, $mdnflb_back_button_border,'modernflipbox');
	$mdnflb_back_button_br_radius		= kswr_shortcode_attribute_value('mdnflb_back_button_br_radius',$mdnflb_back_style_def, $mdnflb_back_button_br_radius,'modernflipbox');

	//Font Default 
	$mdnflb_front_title_fsize			= kswr_shortcode_attribute_value('mdnflb_front_title_fsize',$mdnflb_font_def, $mdnflb_front_title_fsize,'modernflipbox');
	$mdnflb_front_title_fstyle		= kswr_shortcode_attribute_value('mdnflb_front_title_fstyle',$mdnflb_font_def, $mdnflb_front_title_fstyle,'modernflipbox');
	$mdnflb_front_subtitle_fsize		= kswr_shortcode_attribute_value('mdnflb_front_subtitle_fsize',$mdnflb_font_def, $mdnflb_front_subtitle_fsize,'modernflipbox');
	$mdnflb_front_subtitle_fstyle		= kswr_shortcode_attribute_value('mdnflb_front_subtitle_fstyle',$mdnflb_font_def, $mdnflb_front_subtitle_fstyle,'modernflipbox');
	$mdnflb_back_title_fsize			= kswr_shortcode_attribute_value('mdnflb_back_title_fsize',$mdnflb_font_def, $mdnflb_back_title_fsize,'modernflipbox');
	$mdnflb_back_title_fstyle			= kswr_shortcode_attribute_value('mdnflb_back_title_fstyle',$mdnflb_font_def, $mdnflb_back_title_fstyle,'modernflipbox');
	$mdnflb_back_subtitle_fsize		= kswr_shortcode_attribute_value('mdnflb_back_subtitle_fsize',$mdnflb_font_def, $mdnflb_back_subtitle_fsize,'modernflipbox');
	$mdnflb_back_subtitle_fstyle		= kswr_shortcode_attribute_value('mdnflb_back_subtitle_fstyle',$mdnflb_font_def, $mdnflb_back_subtitle_fstyle,'modernflipbox');
	$mdnflb_back_button_fsize			= kswr_shortcode_attribute_value('mdnflb_back_button_fsize',$mdnflb_font_def, $mdnflb_back_button_fsize,'modernflipbox');
	$mdnflb_back_button_fstyle		= kswr_shortcode_attribute_value('mdnflb_back_button_fstyle',$mdnflb_font_def, $mdnflb_back_button_fstyle,'modernflipbox');
	$mdnflb_back_button_height   		= kswr_shortcode_attribute_value('mdnflb_back_button_height',$mdnflb_font_def, $mdnflb_back_button_height,'modernflipbox');
	//Styles
	 $frontContainerStyle = $backContainerStyle = $iconStyle = $titleFrontStyle = $subtitleFrontStyle = $titleBackStyle = $subtitleBackStyle = $buttonBackStyle = $isButton = '';

	 
	kswr_load_the_font_front($mdnflb_front_title_fstyle);
	kswr_load_the_font_front($mdnflb_front_subtitle_fstyle);
	kswr_load_the_font_front($mdnflb_back_title_fstyle);
	kswr_load_the_font_front($mdnflb_back_subtitle_fstyle);
	kswr_load_the_font_front($mdnflb_back_button_fstyle);

$additional_front_title_fstyle =  $additional_front_subtitle_fstyle = $additional_back_title_fstyle = $additional_subtitle_fstyle = $additional_back_button_fstyle = ''; 

fix_kaswara_font_styles($mdnflb_front_title_fstyle, $additional_front_title_fstyle);
fix_kaswara_font_styles($mdnflb_front_subtitle_fstyle, $additional_front_subtitle_fstyle);
fix_kaswara_font_styles($mdnflb_back_title_fstyle, $additional_back_title_fstyle);
fix_kaswara_font_styles($mdnflb_back_subtitle_fstyle, $additional_subtitle_fstyle);
fix_kaswara_font_styles($mdnflb_back_button_fstyle, $additional_back_button_fstyle);




	 //Front Styling 
	 if($mdnflb_front_bg_type == 'color')
	 	$frontContainerStyle .= kswr_gradient_color_maker('background-color' ,$mdnflb_front_background);
	
	 
	$frontContainerStyle .= kswr_gradient_border_maker($mdnflb_front_border,'border').' '.$mdnflb_cnt_padding.'border-radius:'.$mdnflb_container_radius.'px;min-height:'.$mdnflb_minheight.'px;';

	$iconStyle = 'font-size:'.$mdnflb_icon_size.'px; width:'.$mdnflb_icon_bgsize.'px; height:'.$mdnflb_icon_bgsize.'px; line-height:'.$mdnflb_icon_bgsize.'px; border-radius:'.$mdnflb_icon_br_radius.'px;'.' '. kswr_gradient_color_maker('background-color' ,$mdnflb_icon_bgcolor).''.kswr_gradient_border_maker($mdnflb_icon_br,'border');
	$titleFrontStyle = $mdnflb_front_title_fsize .' '. $mdnflb_front_title_fstyle .'color:'. $mdnflb_front_title_color .'; '. $mdnflb_front_title_mr;
	$subtitleFrontStyle = $mdnflb_front_subtitle_fsize .' '. $mdnflb_front_subtitle_fstyle .' color:'. $mdnflb_front_subtitle_color .'; '. $mdnflb_front_subtitle_mr;

	//Back Styling
	if($mdnflb_back_bg_type == 'color')
	 	$backContainerStyle .= kswr_gradient_color_maker('background-color' ,$mdnflb_back_background);
	 

	 $backContainerStyle .= kswr_gradient_border_maker($mdnflb_back_border,'border').' '.$mdnflb_cnt_padding.'border-radius:'.$mdnflb_container_radius.'px';
	 $titleBackStyle = $mdnflb_back_title_fsize .' '. $mdnflb_back_title_fstyle .'color:'. $mdnflb_back_title_color .';'. $mdnflb_back_title_mr;
	$subtitleBackStyle = $mdnflb_back_subtitle_fsize .' '. $mdnflb_back_subtitle_fstyle .'color:'. $mdnflb_back_subtitle_color .';'. $mdnflb_back_subtitle_mr;
	 if(trim($mdnflb_back_button) != ''){
	 	$buttonBackStyle = kswr_gradient_color_maker('color' ,$mdnflb_back_button_color) .' '. kswr_gradient_color_maker('background-color' ,$mdnflb_back_button_bgcolor).''.kswr_gradient_border_maker($mdnflb_back_button_border,'border').'border-radius:'.$mdnflb_back_button_br_radius.'px;'.'height:'.$mdnflb_back_button_height.'px; line-height:'.$mdnflb_back_button_height.'px;'.$mdnflb_back_button_fsize .''.$mdnflb_back_button_fstyle.''.$mdnflb_back_button_pd;
	 
	 	
	 	$href = vc_build_link($mdnflb_back_button_link);
	 	$isButton = '<div class="kswr-mdnflb-back-button" style="'.$mdnflb_back_button_mr.'">
	 		<a href="'.esc_url($href['url']).'" target="'.esc_attr($href['target']).'" style="'.$buttonBackStyle.'" class="kswr-mdnflb-back-button kswr-shortcode-element ' .$additional_back_button_fstyle. ' " data-fontsettings="'.esc_attr($mdnflb_back_button_fsize).'">'.$mdnflb_back_button.'</a>
		 </div>';
	 	
	 }


 	$iconArea = '<div class="mdnflb-front-iconar" style="'.$iconStyle.'"><i class="'.esc_attr($mdnflb_icon).'"  style="'.kswr_gradient_color_maker('color' ,$mdnflb_icon_color) .'"></i></div>';
 	if(trim($mdnflb_img_enable) == '1'){
		$img_src = wp_get_attachment_image_src($mdnflb_img,'full');
		$iconArea = '<img src="'.esc_url($img_src[0]).'" style="width:'.$mdnflb_img_width.'px; height:'.$mdnflb_img_height.'px;">';		
 	}

 	





 	$outPut = '<div class="kswr-mdnflb-container kswr-flip-container"  data-columnposition="'.esc_attr($mdnflb_columnposition).'" data-rowposition="'.esc_attr($mdnflb_rowposition).'"  data-layout="'.esc_attr($mdnflb_layout).'" style="min-height:'.$mdnflb_minheight.'px;">
				  <div class="kswr-mdnflb-card">
				    <div class="kswr-mdnflb-front kswr-mdnflb-figure" style="'.$frontContainerStyle.'">';
	if($mdnflb_front_bg_type == 'image')
	 	$outPut .= kswr_background_maker($mdnflb_front_backgroundimage_img,$mdnflb_front_backgroundimage);   	
	$outPut .='<div class="kswr-mdnflb-insider kswr-flip-insider kswr-flipmodern-insider">
					    	<div class="kswr-mdnflb-front-icon" style="'.$mdnflb_front_icon_mr.'">'.$iconArea.'</div>	
					    	<div class="kswr-mdnflb-front-title kswr-shortcode-element ' .$additional_front_title_fstyle. ' " data-fontsettings="'.esc_attr($mdnflb_front_title_fsize).'" style="'.$titleFrontStyle.'">'.$mdnflb_front_title.'</div>	
					    	<div class="kswr-mdnflb-front-subtitle kswr-shortcode-element ' .$additional_front_subtitle_fstyle. ' " data-fontsettings="'.esc_attr($mdnflb_front_subtitle_fsize).'" style="'.$subtitleFrontStyle.'">'.$mdnflb_front_subtitle.'</div>			    	
				    	</div>
				    </div>
				    
				    <div class="kswr-mdnflb-back kswr-mdnflb-figure" style="'.$backContainerStyle.'">';

	  if($mdnflb_back_bg_type == 'image')
	 	$outPut .= kswr_background_maker($mdnflb_back_backgroundimage_img,$mdnflb_back_backgroundimage);  	
	$outPut .='<div class="kswr-mdnflb-insider kswr-flip-insider kswr-flipmodern-insider">
					    	<div class="kswr-mdnflb-back-title kswr-shortcode-element ' .$additional_back_title_fstyle. ' " data-fontsettings="'.esc_attr($mdnflb_back_title_fsize).'" style="'.$titleBackStyle.'">'.$mdnflb_back_title.'</div>	
					    	<div class="kswr-mdnflb-back-subtitle kswr-shortcode-element ' .$additional_subtitle_fstyle. ' " data-fontsettings="'.esc_attr($mdnflb_back_subtitle_fsize).'" style="'.$subtitleBackStyle.'">'.$mdnflb_back_subtitle.'</div>	
					    	'.$isButton.'
					    </div>	
				    </div>
				  </div>
				</div>';
 	
 	return $outPut;
 }
add_shortcode( 'kswr_modernflipbox', 'kswr_modernflipbox_shortC' );


?>