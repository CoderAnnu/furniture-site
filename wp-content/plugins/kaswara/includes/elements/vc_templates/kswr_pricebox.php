<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============        P R I C E    B O X      	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_pricebox_shortC($atts, $content = null) {  
	//Price Box Attributes
 	extract(shortcode_atts(array(						
 		//Content
 		'prbx_style'					=> 'style1',
 		'prbx_name' 					=> '',
 		'prbx_subtitle'					=> '',
 		'prbx_price' 					=> '',
 		'prbx_currency'					=> '',
 		'prbx_unit'						=> '',
 		
 		//Fonts
 		'prbx_name_fsize' 				=> 'font-size:15px;line-height:;letter-spacing:;',
 		'prbx_name_fstyle' 				=> 'font-family:inherit;font-weight:inherit;font-style:inherit;',
 		'prbx_subtitle_fsize'			=> 'font-size:13px;line-height:;letter-spacing:;',
 		'prbx_subtitle_fstyle'			=> 'font-family:inherit;font-weight:inherit;font-style:inherit;',
 		'prbx_price_fsize' 				=> 'font-size:21px;line-height:;letter-spacing:;',
 		'prbx_price_fstyle' 			=> 'font-family:inherit;font-weight:inherit;font-style:inherit;',
 		'prbx_currency_fsize' 			=> 'font-size:13px;line-height:;letter-spacing:;',
 		'prbx_currency_fstyle' 			=> 'font-family:inherit;font-weight:inherit;font-style:inherit;',
 		'prbx_unit_fsize' 				=> 'font-size:12px;line-height:;letter-spacing:;',
 		'prbx_unit_fstyle' 				=> 'font-family:inherit;font-weight:inherit;font-style:inherit;',
 		'prbx_content_fsize'			=> 'font-size:14px;line-height:;letter-spacing:;',
 		'prbx_content_fstyle'			=> 'font-family:inherit;font-weight:inherit;font-style:inherit;',

 		//Colors
 		'prbx_name_clr' 				=> '#333',
 		'prbx_subtitle_clr' 			=> '#333',
 		'prbx_price_clr' 				=> '#333',
 		'prbx_currency_clr' 			=> '#333',
 		'prbx_unit_clr' 				=> '#333',
 		'prbx_content_clr' 				=> '#333',
 		

 		//Backgrounds
 		'prbx_container_background'		=> '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
 		'prbx_name_ar_bg'				=> '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
 		'prbx_price_ar_bg'				=> '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
 		'prbx_price_round_bg'			=> '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
 		'prbx_content_ar_bg'			=> '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
 		'prbx_button_ar_bg'				=> '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
 		
 		
 		//Borders
 		'prbx_container_br'				=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
 		'prbx_name_ar_br'				=> '',
 		'prbx_price_ar_br'				=> '',
 		'prbx_price_round_br'			=> '',
 		'prbx_content_ar_br'			=> '',
 		'prbx_button_ar_br'				=> '',
 		
 		//Borders Color 	
 		'prbx_name_ar_br_clr'			=> 'transparent',
 		'prbx_price_ar_br_clr'			=> 'transparent',
 		'prbx_price_round_br_clr'		=> 'transparent',
 		'prbx_content_ar_br_clr'		=> 'transparent',
 		'prbx_button_ar_br_clr'			=> 'transparent',

 		//Paddings
 		'prbx_name_paddings'			=> '',
 		'prbx_price_paddings'			=> '',
 		'prbx_price_round_size'			=> '',
 		'prbx_content_ar_paddings'		=> '',
 		'prbx_button_ar_paddings'		=> '',

 		//Box Shadow
 		'prbx_boxshadow_enabled'		=> 'off',
		'prbx_boxshadow_hover_enabled' 	=> 'off',
		'prbx_boxshadow_color' 			=> 'rgba(0,0,0,0.8)',
		'prbx_boxshadow_style' 			=> 'style2',	

		//Button
		'prbx_btn_link'					=>'',		
 		'prbx_btn_full_width'			=> 'false',		
 		'prbx_btn_width'				=> '75',
		'prbx_btn_height'				=> '28',
		'prbx_btn_border_radius'		=> '0',
		'prbx_btn_align'				=> 'left',
		'prbx_btn_margins'				=> 'margin-top:0px; margin-bottom:0px;',	
		'prbx_btn_bg'					=> '{"type":"color", "color1":"#111", "color2":"#111", "direction":"to left"}',
		'prbx_btn_bg_hover'				=> '{"type":"color", "color1":"#111", "color2":"#111", "direction":"to left"}',
		'prbx_btn_clr'					=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'prbx_btn_clr_hover'			=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'prbx_btn_ftsize'				=> 'font-size:13px;line-height:;letter-spacing:;--tablet-font-size:;--phone-font-size:;',
		'prbx_btn_ftstyle'				=> 'font-family:inherit;font-weight:inherit;font-style:inherit;',
		'prbx_btn_style'				=> 'none',
		'prbx_btn_layout'				=> 'noicon',
		'prbx_btn_hover_action'			=> 'none',
		'prbx_btn_paddings'				=> 'padding-top:0px; padding-bottom:0px;',	
		'prbx_btn_bdr'					=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'prbx_btn_bdr_hover'			=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'prbx_btn_txt'					=> '',
		'prbx_btn_icon'					=> '',
		'prbx_btn_icon_position'		=> 'left',
		'prbx_btn_icon_clr'				=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'prbx_btn_icon_clr_hover'		=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',	
		'prbx_btn_icon_size'			=> '26',
		'prbx_btn_icon_paddings'		=> 'padding-top:0px; padding-bottom:0px;',



 	), $atts));


	kswr_load_the_font_front($prbx_name_fstyle);
	kswr_load_the_font_front($prbx_subtitle_fstyle);
	kswr_load_the_font_front($prbx_price_fstyle);
	kswr_load_the_font_front($prbx_currency_fstyle);
	kswr_load_the_font_front($prbx_unit_fstyle);
	kswr_load_the_font_front($prbx_content_fstyle);
 	//Styles 
 	$outPut = $containerStyle = $topStyle = $middleStyle = $roundMiddleStyle = $bottomStyle = $buttonAreaStyle = '';

 	$containerStyle = '--box-shadow-color:'.$prbx_boxshadow_color.'; color:'.$prbx_boxshadow_color.'; '.kswr_gradient_color_maker('background-color' ,$prbx_container_background).''. kswr_gradient_border_maker($prbx_container_br,'border');
 	$topStyle = $prbx_name_paddings .''. kswr_gradient_color_maker('background-color' ,$prbx_name_ar_bg) .''. kswr_border_simple_maker($prbx_name_ar_br , $prbx_name_ar_br_clr);
 	$middleStyle = $prbx_price_paddings .''. kswr_gradient_color_maker('background-color' ,$prbx_price_ar_bg) .''. kswr_border_simple_maker($prbx_price_ar_br , $prbx_price_ar_br_clr); 	
 	$roundMiddleStyle = 'height:'.$prbx_price_round_size.'px; width:'.$prbx_price_round_size.'px;'.''.kswr_gradient_color_maker('background-color' ,$prbx_price_round_bg) .''. kswr_border_simple_maker($prbx_price_round_br , $prbx_price_round_br_clr);
 	if($prbx_style == 'style4')
 		$roundMiddleStyle .= 'margin-top:-'.(intval($prbx_price_round_size)/2).'px;';
	
	$bottomStyle = $prbx_content_ar_paddings .''. kswr_gradient_color_maker('background-color' ,$prbx_content_ar_bg) .''. kswr_border_simple_maker($prbx_content_ar_br , $prbx_content_ar_br_clr).''.$prbx_content_fsize.''.$prbx_content_fstyle.'color:'.$prbx_content_clr; 	

 	$buttonAreaStyle = $prbx_button_ar_paddings .''. kswr_gradient_color_maker('background-color' ,$prbx_button_ar_bg) .''. kswr_border_simple_maker($prbx_button_ar_br , $prbx_button_ar_br_clr); 

	
 	//elementContainers
 	$topContainer = $middleContainer = $middleContainer = $bottomContainer = $buttonContainer ='';

 	



 	//********Top Container
 	$topContainer = '<div class="kswr-pricebox-top" style="'.$topStyle.'">
				<div class="kswr-pricebox-name kswr-shortcode-element" data-fontsettings="'.esc_attr($prbx_name_fsize).'" style="'.$prbx_name_fsize.''.$prbx_name_fstyle.';color:'.$prbx_name_clr.';">'.$prbx_name.'</div>
				<div class="kswr-pricebox-subtitle kswr-shortcode-element" data-fontsettings="'.esc_attr($prbx_subtitle_fsize).'" style="'.$prbx_subtitle_fsize.''.$prbx_subtitle_fstyle.';color:'.$prbx_subtitle_clr.';">'.$prbx_subtitle.'</div>
			</div>';


	//********Middle Price Container		
	$roundStyles = array('style3','style4','style7');	
	$middleContainer = '<div class="kswr-pricebox-middle" style="'.$middleStyle.'"><div class="kswr-pricebox-pricecontainer">';
	if(in_array($prbx_style, $roundStyles))
		$middleContainer .= '<div class="kswr-pricebox-pricecontainer-s" style="'.$roundMiddleStyle.'"><div class="kswr-pricebox-pricecontainer-s-inf">';

	$middleContainer .= '<span class="kswr-pricebox-curency kswr-shortcode-element" data-fontsettings="'.esc_attr($prbx_currency_fsize).'" style="'.$prbx_currency_fsize.''.$prbx_currency_fstyle.';color:'.$prbx_currency_clr.';">'.$prbx_currency.'</span>
							<span class="kswr-pricebox-price kswr-shortcode-element" data-fontsettings="'.esc_attr($prbx_price_fsize).'" style="'.$prbx_price_fsize.''.$prbx_price_fstyle.';color:'.$prbx_price_clr.';">'.$prbx_price.'</span>
							<span class="kswr-pricebox-unit kswr-shortcode-element" data-fontsettings="'.esc_attr($prbx_unit_fsize).'" style="'.$prbx_unit_fsize.''.$prbx_unit_fstyle.';color:'.$prbx_unit_clr.';">'.$prbx_unit.'</span>';

		if(in_array($prbx_style, $roundStyles))
			$middleContainer .= '</div>';					


	if(in_array($prbx_style, $roundStyles))
		$middleContainer .= '</div>';

	$middleContainer .=	'</div></div>';			


	//********Bottom Content Area
	$bottomContainer = '<div class="kswr-pricebox-bottom kswr-shortcode-element" data-fontsettings="'.esc_attr($prbx_content_fsize).'" style="'.$bottomStyle.'">'.do_shortcode($content).'</div>';


	//********Button Area Container
	$btnLink  = '';
	$href = vc_build_link($prbx_btn_link);
 	if(trim($href['url']) != '')
 		$btnLink = '<a href="'.esc_url($href['url']).'" target="'.esc_attr($href['target']).'" ></a>';
 	$btnSettings = array(
  			'btn_trigger'=> 'link','btn_trigger_action' => $btnLink ,'btn_txt' => $prbx_btn_txt,'btn_icon' => $prbx_btn_icon,
  			'btn_full_width' => $prbx_btn_full_width,  			
  			'btn_width' => $prbx_btn_width,'btn_height' => $prbx_btn_height,
			'btn_bg' => $prbx_btn_bg,'btn_border_radius' => $prbx_btn_border_radius,
			'btn_align' => $prbx_btn_align,'btn_margins' => $prbx_btn_margins,
			'btn_bg_hover' => $prbx_btn_bg_hover,'btn_clr' => $prbx_btn_clr,
			'btn_clr_hover' => $prbx_btn_clr_hover,'btn_ftsize' => $prbx_btn_ftsize,'btn_ftstyle' => $prbx_btn_ftstyle,
			'btn_style' => $prbx_btn_style,'btn_layout' => $prbx_btn_layout,
			'btn_hover_action' => $prbx_btn_hover_action,'btn_paddings' => $prbx_btn_paddings,
			'btn_bdr' => $prbx_btn_bdr,
			'btn_bdr_hover' => $prbx_btn_bdr_hover,			
			'btn_icon_position' => $prbx_btn_icon_position,'btn_icon_clr' => $prbx_btn_icon_clr,
			'btn_icon_clr_hover' => $prbx_btn_icon_clr_hover,'btn_icon_size' => $prbx_btn_icon_size,'btn_icon_paddings' => $prbx_btn_icon_paddings
  	);

	$buttonContainer = '<div class="kswr-pricebox-button-container" style="'.$buttonAreaStyle.'">'.kaswara_btn_element_output($btnSettings).'</div>';



	//The Output;
	$normalOrder = array('style1','style2','style3','style4');
 	$outPut = '<div class="kswr-pricebox-container km-element-box-shadow kswr-theelement" style="'.$containerStyle.'" data-layout="'.esc_attr($prbx_style).'" data-boxshadow="'.esc_attr($prbx_boxshadow_enabled).'" data-boxshadow-hover="'.esc_attr($prbx_boxshadow_hover_enabled).'" data-boxshadow-style="'.esc_attr($prbx_boxshadow_style).'">';
 	$outPut .= $topContainer;
 	if(in_array($prbx_style, $normalOrder))
 		$outPut .=  $middleContainer .''. $bottomContainer .''. $buttonContainer;
 	if($prbx_style == 'style5' || $prbx_style == 'style7')
 		$outPut .=  $middleContainer .''. $buttonContainer .''. $bottomContainer;
 	if($prbx_style == 'style6')
 		$outPut .=  $bottomContainer .''. $middleContainer .''. $buttonContainer;




 	$outPut .= '</div>' ;
 	return $outPut;
 }
add_shortcode( 'kswr_pricebox', 'kswr_pricebox_shortC' );


?>