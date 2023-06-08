<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============         	 S K I L L B A R    	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */


function kswr_skillbar_shortC($atts) {  
	//SkillBar Attributes
 	extract(shortcode_atts(array(
 		'skl_style_def'				=> '1',
		'skl_style' 				=> 'style_1', 		
		'skl_strips'				=> 'none',
		'skl_percent'				=> '0',
		'skl_bar_bg_color' 			=> '#f6f6f6',
		'skl_bar_color'  			=> '{"type":"color", "color1":"#00AFD1", "color2":"#00AFD1", "direction":"to left"}',
		'skl_radius'				=> '0',
		'skl_skill' 				=> '',
		'skl_height' 				=> '5',
		'skl_title_color' 			=> '#333',		
		'skl_font_style'			=> '',
		'skl_font_sizes'			=> '',
		'skl_font_def'				=> '1',
 	), $atts));
 	
 	$skl_style = kswr_shortcode_attribute_value('skl_style',$skl_style_def, $skl_style,'skillbar');
 	$skl_strips = kswr_shortcode_attribute_value('skl_strips',$skl_style_def, $skl_strips,'skillbar');
 	$skl_bar_bg_color = kswr_shortcode_attribute_value('skl_bar_bg_color',$skl_style_def, $skl_bar_bg_color,'skillbar');
 	$skl_height = kswr_shortcode_attribute_value('skl_height',$skl_style_def, $skl_height,'skillbar');
 	$skl_radius = kswr_shortcode_attribute_value('skl_radius',$skl_style_def, $skl_radius,'skillbar');
 	$skl_title_color = kswr_shortcode_attribute_value('skl_title_color',$skl_style_def, $skl_title_color,'skillbar');
 	$skl_font_style = kswr_shortcode_attribute_value('skl_font_style',$skl_font_def, $skl_font_style,'skillbar');
 	$skl_font_sizes = kswr_shortcode_attribute_value('skl_font_sizes',$skl_font_def, $skl_font_sizes,'skillbar');

 	$title_font =  $skl_font_style.''.$skl_font_sizes;
 	kswr_load_the_font_front($skl_font_style);

$additional_font_style = ''; 
fix_kaswara_font_styles($skl_font_style, $additional_font_style);

 	$outPut = '<div class="km-progressbar-container" data-style="'.esc_attr($skl_style).'" data-strips="'.esc_attr($skl_strips).'" data-percent="'.esc_attr($skl_percent).'">';
	if($skl_style != "style_3"):
		$outPut .= '<div class="km-progressbar-info">
						<div class="km-progressbar-tooltip">'.$skl_percent.'%</div>
						<div class="km-progressbar-title kswr-shortcode-element ' .$additional_font_style. ' " data-fontsettings="'.esc_attr($skl_font_sizes).'" style="color:'.$skl_title_color.'; '.$title_font.'">'.$skl_skill.'</div>			
					</div>';
	endif;
	$outPut .= '<div class="km-progressbar" style="background-color:'.$skl_bar_bg_color.'; line-height: '.$skl_height.'px; height: '.$skl_height.'px; border-radius: '.$skl_radius.'px;">';
	
	if($skl_style == "style_3"):
		$outPut .= '<div class="km-progressbar-title">'.$skl_skill.'</div>';
	endif;
	
	$outPut .= '<div class="km-progressbar-thebar" style="'.kswr_gradient_color_maker('background-color' ,$skl_bar_color).' border-radius: '.$skl_radius.';px;"><div class="km-progressbar-thestrips"></div>';
	
	if($skl_style == "style_3"):
		$outPut .= '<div class="km-progressbar-tooltip" style="color:#fff;">'.$skl_percent.'%</div>';
	endif;

	$outPut .= '</div>
		</div>
	</div>';
	return $outPut;
}

add_shortcode( 'kswr_skillbar', 'kswr_skillbar_shortC' );

?>