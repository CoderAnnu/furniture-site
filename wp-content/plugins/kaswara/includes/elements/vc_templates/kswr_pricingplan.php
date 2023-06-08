<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============      P R I C I N G     P L A N 	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_pricingplan_shortC($atts) {  
 	extract(shortcode_atts(array(						
		//Text Info
		'prpl_name' 			=> '',	
		'prpl_price'			=> '',	
		'prpl_unit'				=> '',	
		'prpl_info'				=> '',	
		
		//Box Shadow 
		"prpl_bxshadow_enabled"				=>	'off',
		"prpl_bxshadow_hover_enabled"		=>	'off',
		"prpl_bxshadow_style"				=>	'style1',
		"prpl_bxshadow_color"				=>	'rgba(0,0,0,0.5)',

		//Font Settings
		'prpl_font_default'		=> '1',	
		'prpl_name_fsize'		=> 'font-size:15px;line-height:;letter-spacing:;',
		'prpl_name_fstyle'		=> 'font-family:inherit;font-weight:700;font-style:inherit;',
		'prpl_price_fsize'		=> 'font-size:25px;line-height:;letter-spacing:;',
		'prpl_price_fstyle'		=> 'font-family:inherit;font-weight:600;font-style:inherit;',
		'prpl_unit_fsize'		=> 'font-size:18px;line-height:;letter-spacing:;',
		'prpl_unit_fstyle'		=> 'font-family:inherit;font-weight:600;font-style:inherit;',
		'prpl_info_fsize'		=> 'font-size:14px;line-height:;letter-spacing:;',
		'prpl_info_fstyle'		=> 'font-family:inherit;font-weight:inherit;font-style:inherit;',
		
		//Margins & Paddings
		'prpl_name_margin'		=> '',	
		'prpl_price_margin'		=> '',	
		'prpl_unit_margin'		=> '',	
		'prpl_info_margin'		=> '',	

		//CSS Layout For Container
		'prpl_color_default'	=> '1',			
		'prpl_name_color'		=> '#333',
		'prpl_price_color'		=> '{"type":"color", "color1":"#279eca", "color2":"#279eca", "direction":"to left"}',
		'prpl_unit_color'		=> '{"type":"color", "color1":"#279eca", "color2":"#279eca", "direction":"to left"}',
		'prpl_info_color'		=> '#888',
		'prpl_cnt_back'			=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'prpl_cnt_border'		=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		
		//Container Margins
		'prpl_cnt_margin'		=> '',	
		'prpl_cnt_paddings'		=> '',	

		//Hover Change Color
		'prpl_hover_translate'	=> 'on',	
		'prpl_hover_cl_enable'	=> '0',	
		'prpl_color_default_h'	=> '1',					
		'prpl_cnt_back_h'		=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'prpl_cnt_border_h'		=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'prpl_name_color_h'		=> '#333',
		'prpl_price_color_h'	=> '{"type":"color", "color1":"#279eca", "color2":"#279eca", "direction":"to left"}',
		'prpl_unit_color_h'		=> '{"type":"color", "color1":"#279eca", "color2":"#279eca", "direction":"to left"}',
		'prpl_info_color_h'		=> '#888',

		//Link
		'prpl_link'				=> '',			

 	), $atts));
 	$outPut = $containerStyle = $nameStyle = $priceStyle = $unitStyle = $infoStyle = '';
	
	$prpl_cnt_back 	= kswr_shortcode_attribute_value('prpl_cnt_back',$prpl_color_default, $prpl_cnt_back,'pricingplan');
	$prpl_cnt_border 	= kswr_shortcode_attribute_value('prpl_cnt_border',$prpl_color_default, $prpl_cnt_border,'pricingplan');
 	$containerStyle = kswr_gradient_border_maker($prpl_cnt_border,'border').' '.$prpl_cnt_margin.' '.$prpl_cnt_paddings .'--box-shadow-color:'.$prpl_bxshadow_color.'; color:'.$prpl_bxshadow_color.';'; 


 	//nameStyle 
 	$prpl_name_fsize 	= kswr_shortcode_attribute_value('prpl_name_fsize',$prpl_font_default, $prpl_name_fsize,'pricingplan');
	$prpl_name_fstyle 	= kswr_shortcode_attribute_value('prpl_name_fstyle',$prpl_font_default, $prpl_name_fstyle,'pricingplan');
	$prpl_name_color 	= kswr_shortcode_attribute_value('prpl_name_color',$prpl_color_default, $prpl_name_color,'pricingplan');
	$nameStyle = $prpl_name_fsize .' '. $prpl_name_fstyle. ' '.$prpl_name_margin.' color:'.$prpl_name_color.';';
	$nameStyleHover = $prpl_name_fsize .' '. $prpl_name_fstyle. ' '.$prpl_name_margin.' color:'.$prpl_name_color_h.';';

	//Price Style
	$prpl_price_fsize 	= kswr_shortcode_attribute_value('prpl_price_fsize',$prpl_font_default, $prpl_price_fsize,'pricingplan');
	$prpl_price_fstyle 	= kswr_shortcode_attribute_value('prpl_price_fstyle',$prpl_font_default, $prpl_price_fstyle,'pricingplan');
	$prpl_price_color 	= kswr_shortcode_attribute_value('prpl_price_color',$prpl_color_default, $prpl_price_color,'pricingplan');
	$priceStyle = $prpl_price_fsize .' '. $prpl_price_fstyle. ' '.$prpl_price_margin.' '.kswr_gradient_color_maker('color' ,$prpl_price_color);
	$priceStyleHover = $prpl_price_fsize .' '. $prpl_price_fstyle. ' '.$prpl_price_margin.' '.kswr_gradient_color_maker('color' ,$prpl_price_color_h);
	
	//Unit Style
	$prpl_unit_fsize 	= kswr_shortcode_attribute_value('prpl_unit_fsize',$prpl_font_default, $prpl_unit_fsize,'pricingplan');
	$prpl_unit_fstyle 	= kswr_shortcode_attribute_value('prpl_unit_fstyle',$prpl_font_default, $prpl_unit_fstyle,'pricingplan');
	$prpl_unit_color 	= kswr_shortcode_attribute_value('prpl_unit_color',$prpl_color_default, $prpl_unit_color,'pricingplan');
	$unitStyle = $prpl_unit_fsize .' '. $prpl_unit_fstyle. ' '.$prpl_unit_margin.' '.kswr_gradient_color_maker('color' ,$prpl_unit_color);
	$unitStyleHover = $prpl_unit_fsize .' '. $prpl_unit_fstyle. ' '.$prpl_unit_margin.' '.kswr_gradient_color_maker('color' ,$prpl_unit_color_h);
	
	//Info Style
	$prpl_info_fsize 	= kswr_shortcode_attribute_value('prpl_info_fsize',$prpl_font_default, $prpl_info_fsize,'pricingplan');
	$prpl_info_fsize 	= kswr_shortcode_attribute_value('prpl_info_fstyle',$prpl_font_default, $prpl_info_fstyle,'pricingplan');
	$prpl_info_color 	= kswr_shortcode_attribute_value('prpl_info_color',$prpl_color_default, $prpl_info_color,'pricingplan');
	$infoStyle = $prpl_info_fsize .' '. $prpl_info_fsize. ' '.$prpl_info_margin.' color:'. $prpl_info_color.';';
	$infoStyleHover = $prpl_info_fsize .' '. $prpl_info_fsize. ' '.$prpl_info_margin.' color:'. $prpl_info_color_h.';';
	

	kswr_load_the_font_front($prpl_name_fstyle);
	kswr_load_the_font_front($prpl_price_fstyle);
	kswr_load_the_font_front($prpl_unit_fstyle);
	kswr_load_the_font_front($prpl_info_fstyle);

	$additional_name_fstyle =  $additional_price_fstyle = $additional_unit_fstyle = $additional_info_fstyle = ''; 

fix_kaswara_font_styles($prpl_name_fstyle, $additional_name_fstyle);
fix_kaswara_font_styles($prpl_price_fstyle, $additional_price_fstyle);
fix_kaswara_font_styles($prpl_unit_fstyle, $additional_unit_fstyle);
fix_kaswara_font_styles($prpl_info_fstyle, $additional_info_fstyle);



	if($prpl_hover_cl_enable == '1'){
		$prpl_cnt_back_h  		= kswr_shortcode_attribute_value('prpl_cnt_back_h ',$prpl_color_default_h, $prpl_cnt_back_h ,'pricingplan');
		$prpl_cnt_border_h  	= kswr_shortcode_attribute_value('prpl_cnt_border_h ',$prpl_color_default_h, $prpl_cnt_border_h ,'pricingplan');
		$prpl_name_color_h  	= kswr_shortcode_attribute_value('prpl_name_color_h ',$prpl_color_default_h, $prpl_name_color_h ,'pricingplan');
		$prpl_price_color_h  	= kswr_shortcode_attribute_value('prpl_price_color_h ',$prpl_color_default_h, $prpl_price_color_h ,'pricingplan');
		$prpl_unit_color_h  	= kswr_shortcode_attribute_value('prpl_unit_color_h ',$prpl_color_default_h, $prpl_unit_color_h ,'pricingplan');
		$prpl_info_color_h  	= kswr_shortcode_attribute_value('prpl_info_color_h ',$prpl_color_default_h, $prpl_info_color_h ,'pricingplan');
		//kswr_gradient_color_maker('--cnt-bg-colorh' ,$prpl_cnt_back_h,'--cnt-bg-colorh').
		$containerStyle .=' --name-colorh:'.$prpl_name_color_h.'; '.kswr_gradient_color_maker('--price-colorh' ,$prpl_price_color_h,'--price-colorh-gr').' '.kswr_gradient_color_maker('--unit-colorh' ,$prpl_unit_color_h,'--unit-colorh-gr').' --info-colorh:'.$prpl_info_color_h.'; '.kswr_gradient_border_maker($prpl_cnt_border_h,'--cnt-bor-colorh','hover');
	}

	$link = '';
	$href = vc_build_link($prpl_link);
 	if(trim($href['url']) != '')
 		$link = '<a href="'.esc_url($href['url']).'" target="'.esc_attr($href['target']).'" ></a>';
 	
 	$outPut = '<div class="kswr-pricingplan-container km-element-box-shadow kswr-theelement" data-translate="'.esc_attr($prpl_hover_translate).'" data-hover="'.esc_attr($prpl_hover_cl_enable).'" style="'.$containerStyle.'" data-boxshadow="'.esc_attr($prpl_bxshadow_enabled).'" data-boxshadow-hover="'.esc_attr($prpl_bxshadow_hover_enabled).'" data-boxshadow-style="'.esc_attr($prpl_bxshadow_style).'">
				 	<div class="kswr-pricingplan-bg kswr-pplan-bg" style="'.kswr_gradient_color_maker('background-color' ,$prpl_cnt_back).'"></div>
 					<div class="kswr-pricingplan-bg-hover kswr-pplan-bg" style="'.kswr_gradient_color_maker('background-color' ,$prpl_cnt_back_h).'"></div>
 					<div class="kswr-pricingplan-insider-normal">
						<div class="kswr-pricingplan-name kswr-shortcode-element ' .$additional_name_fstyle. '  " data-fontsettings="'.esc_attr($prpl_name_fsize).'" style="'.$nameStyle.'">'.$prpl_name.'</div>			
						<div class="kswr-pricingplan-price-cnt">
							<div class="kswr-pricingplan-price kswr-shortcode-element  ' .$additional_price_fstyle. '  " data-fontsettings="'.esc_attr($prpl_price_fsize).'" style="'.$priceStyle.'">'.$prpl_price.'</div>
							<div class="kswr-pricingplan-unit kswr-shortcode-element ' .$additional_unit_fstyle. '  " data-fontsettings="'.esc_attr($prpl_unit_fsize).'" style="'.$unitStyle.'">'.$prpl_unit.'</div>
						</div>			
						<div class="kswr-pricingplan-info kswr-shortcode-element ' .$additional_info_fstyle. ' " data-fontsettings="'.esc_attr($prpl_info_fsize).'" style="'.$infoStyle.'">'.$prpl_info.'</div>
 					</div>
 					<div class="kswr-pricingplan-insider-hover">
 						<div class="kswr-pricingplan-name kswr-shortcode-element ' .$additional_name_fstyle. '  " data-fontsettings="'.esc_attr($prpl_name_fsize).'" style="'.$nameStyleHover.'">'.$prpl_name.'</div>			
						<div class="kswr-pricingplan-price-cnt">
							<div class="kswr-pricingplan-price kswr-shortcode-element  ' .$additional_price_fstyle. '  " data-fontsettings="'.esc_attr($prpl_price_fsize).'" style="'.$priceStyleHover.'">'.$prpl_price.'</div>
							<div class="kswr-pricingplan-unit kswr-shortcode-element ' .$additional_unit_fstyle. '  " data-fontsettings="'.esc_attr($prpl_unit_fsize).'" style="'.$unitStyleHover.'">'.$prpl_unit.'</div>
						</div>			
						<div class="kswr-pricingplan-info kswr-shortcode-element ' .$additional_info_fstyle. ' " data-fontsettings="'.esc_attr($prpl_info_fsize).'" style="'.$infoStyleHover.'">'.$prpl_info.'</div>
 					</div>

 						
					
					'.$link.'		
				</div>';
 	return $outPut;
 }
add_shortcode( 'kswr_pricingplan', 'kswr_pricingplan_shortC' );


?>