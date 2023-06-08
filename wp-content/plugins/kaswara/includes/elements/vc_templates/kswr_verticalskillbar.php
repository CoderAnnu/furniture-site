<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ========      V E R T I C A L   S K I L L   B A R  	   ========== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_verticalskillbar_shortC($atts) {  
	//Vertical Skill Bar
 	extract(shortcode_atts(array(						
 		'vsklbr_name' 				=> '',
 		'vsklbr_value' 				=> '0',
 		'vsklbr_style_def'			=>	'1',
 		'vsklbr_namefsize' 			=> '16',
 		'vsklbr_namecolor' 			=> '#333',
 		'vsklbr_percentcolor' 		=> '#00AFD1',
 		'vsklbr_bar_bg_color' 		=> '#f5f5f5',
 		'vsklbr_bar_color' 			=> '{"type":"color", "color1":"#00AFD1", "color2":"#00AFD1", "direction":"to left"}',
 		'vsklbr_bar_height' 		=> '200',
 		'vsklbr_bar_width' 			=> '7',
 		'vsklbr_strips'				=> 'none',
 		'vsklbr_layout' 			=> 'none',
 		'vsklbr_percentpos' 		=> 'left',
 		'vsklbr_align' 				=> 'center',
 		'vsklbr_bord_radius' 		=> '0',
 		'vsklbr_border'				=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',

 	), $atts));
 	$outPut = $containerStyle = $barStyle = $skillBarStyle = $nameStyle = ''; 	
 	$vsklbr_namefsize		=   	kswr_shortcode_attribute_value('vsklbr_namefsize',$vsklbr_style_def, $vsklbr_namefsize,'verticalskillbar');
    $vsklbr_namecolor		=   	kswr_shortcode_attribute_value('vsklbr_namecolor',$vsklbr_style_def, $vsklbr_namecolor,'verticalskillbar');
    $vsklbr_percentcolor	=   	kswr_shortcode_attribute_value('vsklbr_percentcolor',$vsklbr_style_def, $vsklbr_percentcolor,'verticalskillbar');
    $vsklbr_bar_bg_color	=   	kswr_shortcode_attribute_value('vsklbr_bar_bg_color',$vsklbr_style_def, $vsklbr_bar_bg_color,'verticalskillbar');
    $vsklbr_bar_color		=   	kswr_shortcode_attribute_value('vsklbr_bar_color',$vsklbr_style_def, $vsklbr_bar_color,'verticalskillbar');
    $vsklbr_bar_height		=   	kswr_shortcode_attribute_value('vsklbr_bar_height',$vsklbr_style_def, $vsklbr_bar_height,'verticalskillbar');
    $vsklbr_bar_width		=   	kswr_shortcode_attribute_value('vsklbr_bar_width',$vsklbr_style_def, $vsklbr_bar_width,'verticalskillbar');
    $vsklbr_strips			=   	kswr_shortcode_attribute_value('vsklbr_strips',$vsklbr_style_def, $vsklbr_strips,'verticalskillbar');
    $vsklbr_layout			=   	kswr_shortcode_attribute_value('vsklbr_layout',$vsklbr_style_def, $vsklbr_layout,'verticalskillbar');
    $vsklbr_percentpos		=   	kswr_shortcode_attribute_value('vsklbr_percentpos',$vsklbr_style_def, $vsklbr_percentpos,'verticalskillbar');
    $vsklbr_align			=   	kswr_shortcode_attribute_value('vsklbr_align',$vsklbr_style_def, $vsklbr_align,'verticalskillbar');
    $vsklbr_bord_radius		=   	kswr_shortcode_attribute_value('vsklbr_bord_radius',$vsklbr_style_def, $vsklbr_bord_radius,'verticalskillbar');
    $vsklbr_border			=   	kswr_shortcode_attribute_value('vsklbr_border',$vsklbr_style_def, $vsklbr_border,'verticalskillbar');


 	$containerStyle = 'text-align: '.$vsklbr_align.'; --precent-color:'.$vsklbr_percentcolor.'; --bar-height:'.$vsklbr_bar_height.'px;';
 	$barStyle = 'background:'.$vsklbr_bar_bg_color.'; height:'.$vsklbr_bar_height.'px; width:'.$vsklbr_bar_width.'px;'.kswr_gradient_border_maker($vsklbr_border,'border').'border-radius:'.$vsklbr_bord_radius.'px;';
 	$skillBarStyle = kswr_gradient_color_maker('background-color' ,$vsklbr_bar_color);
 	$nameStyle = 'color:'.$vsklbr_namecolor.'; font-size:'.$vsklbr_namefsize.'px; margin-top:'.$vsklbr_bar_height.'px;';

 	if($vsklbr_layout == 'left' || $vsklbr_layout == 'right'){
 		$thename = str_split($vsklbr_name);
 		$vsklbr_name ='';
 		foreach($thename as $char){
 			$vsklbr_name .= $char."<br/>";
 		}
 	}


 	$outPut = '<div class="kswr-vsklbr-container" data-percent="'.esc_attr($vsklbr_value).'" data-layout="'.esc_attr($vsklbr_layout).'" data-strips="'.esc_attr($vsklbr_strips).'" data-percentpos="'.esc_attr($vsklbr_percentpos).'" style="'.$containerStyle.'" >
				<div class="kswr-vsklbr-insider">					
					<div class="kswr-vsklbr-bar-cnt" style="'.$barStyle.'">
						<div class="kswr-vsklbr-bar-value" style="'.$skillBarStyle.'">
								<div class="kswr-vsklbr-bar-precent" style="border-color:'.$vsklbr_percentcolor.'; color:'.$vsklbr_percentcolor.';">'.$vsklbr_value.'%</div>
								<div class="kswr-vsklbr-bar-strips"></div>
						</div>
					</div>
					<div class="kswr-vsklbr-name" style="'.$nameStyle.'">'.$vsklbr_name.'</div>					
				</div>
			</div>';
 
 	return $outPut;
 }
add_shortcode( 'kswr_verticalskillbar', 'kswr_verticalskillbar_shortC' );


?>