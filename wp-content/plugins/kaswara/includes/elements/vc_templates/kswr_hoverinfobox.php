<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ===========     H O V E R    I N F O     B O X  	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_hoverinfobox_shortC($atts) {  
	//Hover info box Attributes
 	extract(shortcode_atts(array(						
		//Content
		'hvbx_icon' 				=> '',
		'hvbx_title' 				=> '',
		'hvbx_subtitle' 			=> '',
		'hvbx_content' 				=> '',
		'hvbx_link' 				=> '',
		'hvbx_hoverstyle' 			=> 'fade',
		'hvbx_height'				=> '300',
		//Fonts And Size
		'hvbx_size_def'				=> '1',
		'hvbx_icon_size'			=> '36',
		'hvbx_title_fsize'				=>	'font-size:22px;line-height:;letter-spacing:;',
		'hvbx_title_fstyle'				=>	'font-family:inherit;font-weight:inherit;font-style:inherit;',
		'hvbx_subtitle_fsize'			=>	'font-size:14px;line-height:;letter-spacing:;',
		'hvbx_subtitle_fstyle'			=>	'font-family:inherit;font-weight:inherit;font-style:inherit;',
		'hvbx_content_fsize'			=>	'font-size:15px;line-height:;letter-spacing:;',
		'hvbx_content_fstyle'			=>	'font-family:inherit;font-weight:inherit;font-style:inherit;',

		//Colors and Backgrounds Real	
		'hvbx_clr_r_def' 			=> '1',
		'hvbx_container_clr_r'			=>	'{"type":"color", "color1":"#f7f7f7", "color2":"#f7f7f7", "direction":"to left"}',
		'hvbx_container_br_r'			=>	'{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'hvbx_icon_clr_r'				=>	'{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
		'hvbx_title_clr_r'				=>	'#333',
		'hvbx_subtitle_clr_r'			=>	'#888',
		'hvbx_content_clr_r'			=>	'#555',
		
		//Colors and Backgrounds Hover
		'hvbx_clr_h_def' 			=> '1',
		'hvbx_container_clr_h'			=>	'{"type":"color", "color1":"#269AD6", "color2":"#269AD6", "direction":"to left"}',
		'hvbx_container_br_h'			=>	'{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'hvbx_icon_clr_h'				=>	'{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'hvbx_title_clr_h'				=>	'#fff',
		'hvbx_subtitle_clr_h'			=>	'#f4f4f4',
		'hvbx_content_clr_h'			=>	'#fff',
		
		//Distances
		'hvbx_container_br_radius'	=> '',
		'hvbx_container_paddins'	=> '',
		'hvbx_icon_margin' 			=> '',
		'hvbx_title_margin'			=> '',
		'hvbx_subtitle_margin' 		=> '',
		'hvbx_content_margin'		=> '',


 	), $atts));
 	$outPut = $containerStyle = $iconStyle = $titleStyle = $sutitleStyle = $contentStyle = '';
 	//Sizes 
	$hvbx_icon_size			=  kswr_shortcode_attribute_value('hvbx_icon_size',$hvbx_size_def, $hvbx_icon_size,'hoverinfobox');
	$hvbx_title_fsize		=  kswr_shortcode_attribute_value('hvbx_title_fsize',$hvbx_size_def, $hvbx_title_fsize,'hoverinfobox');
	$hvbx_subtitle_fsize	=  kswr_shortcode_attribute_value('hvbx_subtitle_fsize',$hvbx_size_def, $hvbx_subtitle_fsize,'hoverinfobox');
	$hvbx_content_fsize		=  kswr_shortcode_attribute_value('hvbx_content_fsize',$hvbx_size_def, $hvbx_content_fsize,'hoverinfobox');
	$hvbx_title_fstyle		=  kswr_shortcode_attribute_value('hvbx_title_fstyle',$hvbx_size_def, $hvbx_title_fstyle,'hoverinfobox');
	$hvbx_subtitle_fstyle	=  kswr_shortcode_attribute_value('hvbx_subtitle_fstyle',$hvbx_size_def, $hvbx_subtitle_fstyle,'hoverinfobox');
	$hvbx_content_fstyle	=  kswr_shortcode_attribute_value('hvbx_content_fstyle',$hvbx_size_def, $hvbx_content_fstyle,'hoverinfobox');

	//Colors Real	
	$hvbx_container_clr_r	= kswr_shortcode_attribute_value('hvbx_container_clr_r',$hvbx_clr_r_def, $hvbx_container_clr_r,'hoverinfobox');
	$hvbx_container_br_r	= kswr_shortcode_attribute_value('hvbx_container_br_r',$hvbx_clr_r_def, $hvbx_container_br_r,'hoverinfobox');
	$hvbx_icon_clr_r		= kswr_shortcode_attribute_value('hvbx_icon_clr_r',$hvbx_clr_r_def, $hvbx_icon_clr_r,'hoverinfobox');
	$hvbx_title_clr_r		= kswr_shortcode_attribute_value('hvbx_title_clr_r',$hvbx_clr_r_def, $hvbx_title_clr_r,'hoverinfobox');
	$hvbx_subtitle_clr_r	= kswr_shortcode_attribute_value('hvbx_subtitle_clr_r',$hvbx_clr_r_def, $hvbx_subtitle_clr_r,'hoverinfobox');
	$hvbx_content_clr_r		= kswr_shortcode_attribute_value('hvbx_content_clr_r',$hvbx_clr_r_def, $hvbx_content_clr_r,'hoverinfobox');

	//Colors Hover	
	$hvbx_container_clr_h	= kswr_shortcode_attribute_value('hvbx_container_clr_h',$hvbx_clr_h_def, $hvbx_container_clr_h,'hoverinfobox');
	$hvbx_container_br_h	= kswr_shortcode_attribute_value('hvbx_container_br_h',$hvbx_clr_h_def, $hvbx_container_br_h,'hoverinfobox');
	$hvbx_icon_clr_h		= kswr_shortcode_attribute_value('hvbx_icon_clr_h',$hvbx_clr_h_def, $hvbx_icon_clr_h,'hoverinfobox');
	$hvbx_title_clr_h		= kswr_shortcode_attribute_value('hvbx_title_clr_h',$hvbx_clr_h_def, $hvbx_title_clr_h,'hoverinfobox');
	$hvbx_subtitle_clr_h	= kswr_shortcode_attribute_value('hvbx_subtitle_clr_h',$hvbx_clr_h_def, $hvbx_subtitle_clr_h,'hoverinfobox');
	$hvbx_content_clr_h		= kswr_shortcode_attribute_value('hvbx_content_clr_h',$hvbx_clr_h_def, $hvbx_content_clr_h,'hoverinfobox');



	$containerStyle = 'min-height:'.$hvbx_height.'px;border-radius:'.$hvbx_container_br_radius.'px;'.$hvbx_container_paddins;
	$iconStyle = 'font-size:'.$hvbx_icon_size.'px; '.$hvbx_icon_margin;
	$titleStyle = $hvbx_title_fsize.''.$hvbx_title_fstyle.''.$hvbx_title_margin;
	$subtitleStyle = $hvbx_subtitle_fsize.''.$hvbx_subtitle_fstyle.''.$hvbx_subtitle_margin;
	$contentStyle = $hvbx_content_fsize.''.$hvbx_content_fstyle.''.$hvbx_content_margin;
	
	kswr_load_the_font_front($hvbx_title_fstyle);
	kswr_load_the_font_front($hvbx_subtitle_fstyle);
	kswr_load_the_font_front($hvbx_content_fstyle);

	$additional_title_fstyle = $additional_subtitle_fstyle = $additional_content_fstyle = '';

	fix_kaswara_font_styles($hvbx_title_fstyle, $additional_title_fstyle);
	fix_kaswara_font_styles($hvbx_subtitle_fstyle, $additional_subtitle_fstyle);
	fix_kaswara_font_styles($hvbx_content_fstyle, $additional_content_fstyle);

	$elemLink = '';

  	$href = vc_build_link($hvbx_link);
 	if(trim($href['url']) != '')
 		$elemLink = '<a href="'.esc_url($href['url']).'" target="'.esc_attr($href['target']).'" ></a>';

 	$outPut = '<div class="kswr-hvbx-container kswr-theelement" data-hoverstyle="'.esc_attr($hvbx_hoverstyle).'" style="'.$containerStyle.'">
				<div class="kswr-hvbx-bg-cnt">
					<div class="kswr-hvbx-bg-r kswr-hvbx-elm-back-r" style="'.kswr_gradient_color_maker('background' ,$hvbx_container_clr_r).''.kswr_gradient_border_maker($hvbx_container_br_r,'border').'"></div>
					<div class="kswr-hvbx-bg-h kswr-hvbx-elm-h" style="'.kswr_gradient_color_maker('background' ,$hvbx_container_clr_h).''.kswr_gradient_border_maker($hvbx_container_br_h,'border').'"></div>					
				</div>
				<div class="kswr-hvbx-insider">
					<div class="kswr-hvbx-icon-cnt kswr-hvbx-cnts" style="'.$iconStyle.'">
						<div class="kswr-hvbx-icon-r kswr-hvbx-elm-r"><i style="'.kswr_gradient_color_maker('color' ,$hvbx_icon_clr_r).'" class="'.$hvbx_icon.'"></i></div>
						<div class="kswr-hvbx-icon-h kswr-hvbx-elm-h"><i style="'.kswr_gradient_color_maker('color' ,$hvbx_icon_clr_h).'" class="'.$hvbx_icon.'"></i></div>	
					</div>
					<div class="kswr-hvbx-title-cnt kswr-hvbx-cnts kswr-shortcode-element ' .$additional_title_fstyle. ' " data-fontsettings="'.esc_attr($hvbx_title_fsize).'" style="'.$titleStyle.'">
						<div class="kswr-hvbx-title-r kswr-hvbx-elm-r" style="color:'.$hvbx_title_clr_r.';">'.$hvbx_title.'</div>
						<div class="kswr-hvbx-title-h kswr-hvbx-elm-h" style="color:'.$hvbx_title_clr_h.';">'.$hvbx_title.'</div>	
					</div>
					<div class="kswr-hvbx-subtitle-cnt kswr-hvbx-cnts kswr-shortcode-element ' .$additional_subtitle_fstyle. ' " data-fontsettings="'.esc_attr($hvbx_subtitle_fsize).'" style="'.$subtitleStyle.'">
						<div class="kswr-hvbx-subtitle-r kswr-hvbx-elm-r" style="color:'.$hvbx_subtitle_clr_r.';">'.$hvbx_subtitle.'</div>
						<div class="kswr-hvbx-subtitle-h kswr-hvbx-elm-h" style="color:'.$hvbx_subtitle_clr_h.';">'.$hvbx_subtitle.'</div>	
					</div>
					<div class="kswr-hvbx-content-cnt kswr-hvbx-cnts kswr-shortcode-element ' .$additional_content_fstyle. ' " data-fontsettings="'.esc_attr($hvbx_content_fsize).'" style="'.$contentStyle.'">
						<div class="kswr-hvbx-content-r kswr-hvbx-elm-r" style="color:'.$hvbx_content_clr_r.';">'.$hvbx_content.'</div>
						<div class="kswr-hvbx-content-h kswr-hvbx-elm-h" style="color:'.$hvbx_content_clr_h.';">'.$hvbx_content.'</div>	
					</div>					
				</div>
				'.$elemLink.'
			</div>';
 	return $outPut;
 }
add_shortcode( 'kswr_hoverinfobox', 'kswr_hoverinfobox_shortC' );


?>