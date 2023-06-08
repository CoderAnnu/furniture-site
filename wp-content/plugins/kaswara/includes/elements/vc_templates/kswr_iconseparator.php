<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============      I C O N      S E P A R AT O R     ============ 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */
function kswr_iconseparator_shortC($atts) {  
	
 	extract(shortcode_atts(array(						
		'ics_icon'  		=> '',		
		'ics_icon_size'  	=> '18',	
		'ics_icon_bgsize'	=> '25', 
		'ics_icon_color'  	=> '#333',		
		'ics_icon_back'  	=> '#fff',		
		'ics_width'  		=> '',		
		'ics_height' 		=> '',		
		'ics_alignement' 	=> 'center',		
		'ics_margins' 		=> '',		
		'ics_style' 		=> 'none',		
		'ics_color' 		=> '#333',	
		'ics_icon_margin'	=> '',	
		'ics_icon_bgradius'	=> '0',
 		'ics_icon_bgborder'	=>'',
 		'ics_icon_rotate'	=>'false',
 	), $atts));


 	$icon_content = '<div class="km-line-sep-icon" data-rotation="'.$ics_icon_rotate.'" style="'.kswr_gradient_border_maker($ics_icon_bgborder,'border').'border-radius:'.$ics_icon_bgradius.'px;'.$ics_icon_margin.' width:'.$ics_icon_bgsize.'px; height:'.$ics_icon_bgsize.'px; line-height:'.$ics_icon_bgsize.'px; background:'.$ics_icon_back.'; "><i class="'.$ics_icon.'" style="font-size:'.$ics_icon_size.'px; color:'.$ics_icon_color.';"></i></div>';

	$insiderStyle = ''; 	
 	if($ics_alignement == 'center')
 		$insiderStyle .= '    float: left;margin-left: 50%;transform: translateX(-50%);';
 	else
 		$insiderStyle .= 'float:'.$ics_alignement.';';

 	$insiderStyle .= 'width:'.$ics_width.'; height:'.$ics_height.'px; text-align:'.$ics_alignement.';';

	$outPut = '<div class="km-line-sep-container kswr-theelement" data-align="'.esc_attr($ics_alignement).'" style="height:'.$ics_height.'px; '.$ics_margins.' text-align:'.$ics_alignement.';" data-style="'.esc_attr($ics_style).'">
				<div class="km-line-sep-insider" style="'.$insiderStyle.'">
					'.$icon_content.'
					<div class="km-line-sep-fill" style="background:'.$ics_color.';"></div>
				</div>
			</div>';
 	return $outPut;
 }
add_shortcode( 'kswr_iconseparator', 'kswr_iconseparator_shortC' );

?>