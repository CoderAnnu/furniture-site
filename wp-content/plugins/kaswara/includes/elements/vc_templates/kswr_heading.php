<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============            H E A D I N G		  	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_heading_shortC($atts,$content) {  
	//Heading With SubHeading
 	extract(shortcode_atts(array(						
		'head_align' 				=> 'left',	
		'head_title' 				=> '',	
		'head_title_fsize' 			=> '',	
		'head_title_fstyle' 		=> '',	
		'head_title_color'	 		=> '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',	
		'head_title_gr_direction'	=> 'top',	
		'head_title_margins'		=> '',	
		'head_subtitle_fsize' 		=> '',	
		'head_subtitle_fstyle' 		=> '',	
		'head_subtitle_color'	 	=> '#333',
		'head_subtitle_margins'		=> '',	
		

 	), $atts));

 	$additional_font_style = $additional_sub_font_style = ''; 	 	
 	 	
 	fix_kaswara_font_styles($head_title_fstyle, $additional_font_style);
 	fix_kaswara_font_styles($head_subtitle_fstyle, $additional_sub_font_style);
 	
 	$titleStyling = $head_title_fsize . ' '.$head_title_fstyle .' ' .$head_title_margins;	
	$titleStyling .= kswr_gradient_color_maker('color' ,$head_title_color);
	
	
	
	kswr_load_the_font_front($head_title_fstyle);
	kswr_load_the_font_front($head_subtitle_fstyle);
	
 	$subTitleStyling = $head_subtitle_fsize . ' '.$head_subtitle_fstyle .' ' .$head_subtitle_margins .'color:'.$head_subtitle_color.';';

 	$outPut = '<div class="kswr-heading-container kswr-theelement" style="text-align:'.$head_align.';">
				<div class="kswr-heading-title kswr-shortcode-element  ' . $additional_font_style . '" data-fontsettings="'.esc_attr($head_title_fsize).'" style="'.$titleStyling.'">'.$head_title.'</div>
				<div class="kswr-heading-content kswr-shortcode-element  ' . $additional_sub_font_style . '" data-fontsettings="'.esc_attr($head_subtitle_fsize).'" style="'.$subTitleStyling.'">'.do_shortcode($content).'</div>
			</div>';
 	return $outPut;
 }
add_shortcode( 'kswr_heading', 'kswr_heading_shortC' );


?>
