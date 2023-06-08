<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============      L I N E      S E P A R AT O R     ============ 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */
function kswr_lineseparator_shortC($atts) {  
	
 	extract(shortcode_atts(array(						
		'ls_width'  => '',		
		'ls_height' => '',		
		'ls_alignement' => 'center',		
		'ls_margins' => '',		
		'ls_style' => 'none',		
		'ls_color' => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',		
 	), $atts));

	$insiderStyle = ''; 	
 	if($ls_alignement == 'center')
 		$insiderStyle .= '    float: left;margin-left: 50%;transform: translateX(-50%);';
 	else
 		$insiderStyle .= 'float:'.$ls_alignement.';';

 	$insiderStyle .= 'width:'.$ls_width.'; height:'.$ls_height.'px; text-align:'.$ls_alignement.';';

	$outPut = '<div class="km-line-sep-container" style="height:'.$ls_height.'px; '.$ls_margins.' text-align:'.$ls_alignement.';" data-style="'.$ls_style.'">
				<div class="km-line-sep-insider" style="'.$insiderStyle.'">
					<div class="km-line-sep-fill" style="'.kswr_gradient_color_maker('background-color' ,$ls_color).'"></div>
				</div>
			</div>';
 	return $outPut;
 }
add_shortcode( 'kswr_lineseparator', 'kswr_lineseparator_shortC' );

?>