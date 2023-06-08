<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============     S I N G L E     I C O N    	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_singleicon_shortC($atts) {  
	//Single Icon Attributes
 	extract(shortcode_atts(array(						
		'si_style_default'			=> '1',
		'si_bgsize' 				=> 	'35',	
		'si_border_radius'			=> 	'0',	
		'si_effect'					=> 	'none',	
		'si_rotation'				=> 	'false',	
		'si_icon'					=> 	'',	
		'si_iconsize' 				=> 	'18',	
	
		'si_ic_color' 				=> 	'{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',	
		'si_ic_color_hover'			=> 	'{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',	
		'si_back' 					=> 	'{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',	
		'si_back_hover'				=> 	'{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',	
		'si_border'					=> 	'{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',	
	

		'si_link' 					=> 	'',	
		'si_openlink'				=> 	'_self',	
		//Finish the 
		'si_elem_align'				=> 'left',
		'si_elem_margins'			=> '',

 	), $atts));
 	$outPut =''; 

 	$iconSettings = '';
 	$iconSettings = array(
 		'si_bgsize'			=> kswr_shortcode_attribute_value('si_bgsize',$si_style_default, $si_bgsize,'singleicon'),
		'si_border_radius'	=> kswr_shortcode_attribute_value('si_border_radius',$si_style_default, $si_border_radius,'singleicon'),
		'si_effect'			=> $si_effect,
		'si_rotation'		=> $si_rotation,
		'si_icon'			=> $si_icon,
		'si_iconsize'		=> kswr_shortcode_attribute_value('si_iconsize',$si_style_default, $si_iconsize,'singleicon'),
		'si_ic_color'		=> kswr_shortcode_attribute_value('si_ic_color',$si_style_default, $si_ic_color,'singleicon'),
		'si_ic_color_hover'	=> kswr_shortcode_attribute_value('si_ic_color_hover',$si_style_default, $si_ic_color_hover,'singleicon'),
		'si_back'			=> kswr_shortcode_attribute_value('si_back',$si_style_default, $si_back,'singleicon'),
		'si_back_hover'		=> kswr_shortcode_attribute_value('si_back_hover',$si_style_default, $si_back_hover,'singleicon'),
		'si_border'			=> kswr_shortcode_attribute_value('si_border',$si_style_default, $si_border,'singleicon'),
		'si_link'			=> $si_link,
		'si_openlink'		=> $si_openlink
 	);

 	$outPut .= '<div class="kswr-singleicon-container kswr-theelement" style="text-align:'.$si_elem_align.';'.$si_elem_margins.'">'.kaswara_icon_element_output($iconSettings).'</div>'; 


 	return $outPut;
 }
add_shortcode( 'kswr_singleicon', 'kswr_singleicon_shortC' );


?>