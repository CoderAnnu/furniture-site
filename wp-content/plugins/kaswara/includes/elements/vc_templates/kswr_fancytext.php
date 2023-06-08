<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============        F A N C Y    T E X T     	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_fancytext_shortC($atts) {  
	//Fancy Text Attributes
 	extract(shortcode_atts(array(						
		//Content
 		'fctxt_prefix' 				=> '',
 		'fctxt_suffix' 				=> '',
 		'fctxt_content' 			=> '',
 		//Config
 		'fctxt_align' 				=> 'left',
 		'fctxt_style'				=> 'typing',
		'fctxt_holdtime'			=> '2000',
		'fctxt_cursor'				=> 'true',
		'fctxt_typespeed'			=> '100',
		'fctxt_typeanimation'		=> 'none',

 		//Typography
 		'fctxt_prefix_fsize' 		=> '',
 		'fctxt_prefix_fstyle' 		=> '',
 		'fctxt_suffix_fsize' 		=> '',
 		'fctxt_suffix_fstyle' 		=> '',
 		'fctxt_content_fsize' 		=> '',
 		'fctxt_content_fstyle' 		=> '',
 		//Colors
 		'fctxt_prefix_color' 		=> '',
 		'fctxt_prefix_bg' 			=> '',
 		'fctxt_suffix_color' 		=> '',
 		'fctxt_suffix_bg' 			=> '',
 		'fctxt_content_color' 		=> '',
 		'fctxt_content_bg' 			=> '',
 		

 	), $atts));
 	$outPut = $containerStyle = $prefixStyle = $suffixStyle = $contentStyle = $wordsArray = '';

 	
 	
 	$additional_font_style = $additional_content_font_style = $additional_sub_font_style = ''; 	 	
 	 	
 	fix_kaswara_font_styles($fctxt_prefix_fstyle, $additional_font_style);
 	fix_kaswara_font_styles($fctxt_suffix_fstyle, $additional_sub_font_style);
 	fix_kaswara_font_styles($fctxt_content_fstyle, $additional_content_font_style);
 	
 	 	
 	
 	$containerStyle = 'text-align:'.$fctxt_align.';'; 
 	$prefixStyle = $fctxt_prefix_fsize.' '.$fctxt_prefix_fstyle.' '.kswr_gradient_color_maker('background-color' ,$fctxt_prefix_bg).' '.kswr_gradient_color_maker('color' ,$fctxt_prefix_color);
 	$suffixStyle = $fctxt_suffix_fsize.' '.$fctxt_suffix_fstyle.' '.kswr_gradient_color_maker('background-color' ,$fctxt_suffix_bg).' '.kswr_gradient_color_maker('color' ,$fctxt_suffix_color);
 	$contentStyle = $fctxt_content_fsize.' '.$fctxt_content_fstyle.' '.kswr_gradient_color_maker('background-color' ,$fctxt_content_bg).' color:'.$fctxt_content_color.';';

 	kswr_load_the_font_front($fctxt_prefix_fstyle);
	kswr_load_the_font_front($fctxt_suffix_fstyle);
	kswr_load_the_font_front($fctxt_content_fstyle);








 	$fctxt_content =  explode("\n", $fctxt_content); 
 	$wordsArray = '[';
 	foreach ($fctxt_content as $word) {
 		$wordsArray .= '"'.str_replace('<br />','',$word).'",';
 	}
 	$wordsArray = trim($wordsArray,",");
 	$wordsArray .= ']';
 	


 	$outPut = '<div class="kswr-fancytext-container kswr-theelement" style="'.$containerStyle.'">
					<span class="kswr-fancytext-prefix kswr-shortcode-element ' . $additional_font_style . '" data-fontsettings="'.esc_attr($fctxt_prefix_fsize).'" style="'.$prefixStyle.'">'.$fctxt_prefix.'</span> 
					<span class="kswr-fancytext kswr-shortcode-element ' . $additional_content_font_style . '" data-fontsettings="'.esc_attr($fctxt_content_fsize).'" style="'.$contentStyle.'" data-style="'.esc_attr($fctxt_style).'" data-holdtime="'.esc_attr($fctxt_holdtime).'" data-cursor="'.esc_attr($fctxt_cursor).'" data-typespeed="'.esc_attr($fctxt_typespeed).'" data-typeanimation="'.esc_attr($fctxt_typeanimation).'" data-words="'.esc_attr($wordsArray).'"></span>
					<span class="kswr-fancytext-suffix kswr-shortcode-element ' . $additional_sub_font_style . '" data-fontsettings="'.esc_attr($fctxt_suffix_fsize).'" style="'.$suffixStyle.'">'.$fctxt_suffix.'</span> 
				</div>';

 	return $outPut;
 }
add_shortcode( 'kswr_fancytext', 'kswr_fancytext_shortC' );


?>
