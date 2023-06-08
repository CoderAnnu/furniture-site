<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============         D R O P      C A P S         ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_dropcaps_shortC($atts) {  
	
 	extract(shortcode_atts(array(										
 		'drpcp_letter' 					=> '', 		
 		'drpcp_letter_font_def'			=> '1',
 		'drpcp_letter_fstyle' 			=> '',
 		'drpcp_letter_fsize' 			=> '',
 		'drpcp_letter_margins' 			=> '',
 		'drpcp_letter_bgtype'			=> 'color',
 		'drpcp_letter_style_def'		=> '1',
 		'drpcp_letter_color'			=> '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
 		'drpcp_letter_bgsize'			=> '', 		
 		'drpcp_letter_bgimage'			=> '',
 		
 		'drpcp_letter_bgcolor'			=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
 		//To BE deleted
 		'drpcp_letter_bg_grdcolor1'		=> '#fff',
 		'drpcp_letter_bg_grdcolor2'		=> '#fff',
 		'drpcp_letter_bg_grddirection'	=> 'left',
 		
 		'drpcp_letter_br_radius'		=> '0', 		
 		'drpcp_letter_br_advanced'		=> '0',
 		'drpcp_letter_br_normal'		=> '', 		
 		'drpcp_letter_br_top'			=> '',
 		'drpcp_letter_br_bottom'		=> '',
 		'drpcp_letter_br_left'			=> '',
 		'drpcp_letter_br_right'			=> '',
 		'drpcp_content'					=> '',
 		'drpcp_content_font_def'		=> '1',
 		'drpcp_content_fstyle'			=> '',
 		'drpcp_content_fsize'			=> '',
 		'drpcp_content_color'			=> '',

 	), $atts));

 	$letterCntStyle = $contentStyle = '';

 	//Letter Area Style 
 	$drpcp_letter_fstyle = kswr_shortcode_attribute_value('drpcp_letter_fstyle',$drpcp_letter_font_def, $drpcp_letter_fstyle,'dropcaps');
 	$drpcp_letter_fsize = kswr_shortcode_attribute_value('drpcp_letter_fsize',$drpcp_letter_font_def, $drpcp_letter_fsize,'dropcaps'); 	
 	//Font Added 
 	$letterCntStyle .= $drpcp_letter_fstyle .' '.$drpcp_letter_fsize;

 	$drpcp_letter_color =	kswr_shortcode_attribute_value('drpcp_letter_color',$drpcp_letter_style_def, $drpcp_letter_color,'dropcaps');
	$drpcp_letter_bgsize =	kswr_shortcode_attribute_value('drpcp_letter_bgsize',$drpcp_letter_style_def, $drpcp_letter_bgsize,'dropcaps');
	$drpcp_letter_margins =	kswr_shortcode_attribute_value('drpcp_letter_margins',$drpcp_letter_style_def, $drpcp_letter_margins,'dropcaps');
	$drpcp_letter_br_radius =	kswr_shortcode_attribute_value('drpcp_letter_br_radius',$drpcp_letter_style_def, $drpcp_letter_br_radius,'dropcaps');
	kswr_load_the_font_front($drpcp_letter_fstyle);

	$additional_letter_fstyle = $additional_content_fstyle = ''; 
	fix_kaswara_font_styles($drpcp_letter_fstyle, $additional_letter_fstyle);
	fix_kaswara_font_styles($drpcp_content_fstyle, $additional_content_fstyle);

	//Color And Size Added 
	$letterCntStyle .= 'border-radius: '.$drpcp_letter_br_radius.'px; width:'.$drpcp_letter_bgsize.'px; height:'.$drpcp_letter_bgsize.'px; line-height:'.$drpcp_letter_bgsize.'px; '.$drpcp_letter_margins;
	

	//Background Type
	switch ($drpcp_letter_bgtype) {
		case 'color':
				$drpcp_letter_bgcolor =	kswr_shortcode_attribute_value('drpcp_letter_bgcolor',$drpcp_letter_style_def, $drpcp_letter_bgcolor,'dropcaps');
				$letterCntStyle .= kswr_gradient_color_maker('background-color' ,$drpcp_letter_bgcolor);
			break;
		case 'image':				
				$drpcp_letter_bgimage =  wp_get_attachment_image_src($drpcp_letter_bgimage,'full');
				$letterCntStyle .= 'background:url('.$drpcp_letter_bgimage[0].');' ;
			break;	
	}
	
	

	
	switch ($drpcp_letter_br_advanced) {
		case '0':
			$drpcp_letter_br_normal = kswr_shortcode_attribute_value('drpcp_letter_br_normal',$drpcp_letter_style_def, $drpcp_letter_br_normal,'dropcaps');			
			$letterCntStyle .= kswr_gradient_border_maker($drpcp_letter_br_normal,'border');
		break;
		case '1':	
			$drpcp_letter_br_top =	kswr_shortcode_attribute_value('drpcp_letter_br_top',$drpcp_letter_style_def, $drpcp_letter_br_top,'dropcaps');
			$drpcp_letter_br_bottom =	kswr_shortcode_attribute_value('drpcp_letter_br_bottom',$drpcp_letter_style_def, $drpcp_letter_br_bottom,'dropcaps');
			$drpcp_letter_br_left =	kswr_shortcode_attribute_value('drpcp_letter_br_left',$drpcp_letter_style_def, $drpcp_letter_br_left,'dropcaps');
			$drpcp_letter_br_right =	kswr_shortcode_attribute_value('drpcp_letter_br_right',$drpcp_letter_style_def, $drpcp_letter_br_right,'dropcaps');
			$letterCntStyle .= kswr_gradient_border_maker($drpcp_letter_br_top,'border-top').' '.kswr_gradient_border_maker($drpcp_letter_br_left,'border-left').' '.kswr_gradient_border_maker($drpcp_letter_br_bottom,'border-bottom').' '.kswr_gradient_border_maker($drpcp_letter_br_right,'border-right');
		break;

	}
	
	
	

 	//Content Style 
 	$drpcp_content_fstyle = kswr_shortcode_attribute_value('drpcp_content_fstyle',$drpcp_content_font_def, $drpcp_content_fstyle,'dropcaps');
 	$drpcp_content_fsize = kswr_shortcode_attribute_value('drpcp_content_fsize',$drpcp_content_font_def, $drpcp_content_fsize,'dropcaps'); 	
 	$contentStyle = $drpcp_content_fstyle .' '. $drpcp_content_fsize .' '. $drpcp_content_color;

 	$outPut = '<div class="kswr-drpcp-container kswr-theelement">
					<div class="kswr-drpcp-letter kswr-shortcode-element ' .$additional_letter_fstyle. ' " data-fontsettings="'.esc_attr($drpcp_letter_fsize).'" style="'.$letterCntStyle.'"><span style="'.kswr_gradient_color_maker('color' ,$drpcp_letter_color).'">'.$drpcp_letter.'</span></div>				
					<span class="kswr-shortcode-element ' .$additional_content_fstyle. ' " data-fontsettings="'.esc_attr($drpcp_content_fsize).'" style="'.$contentStyle.'">'.$drpcp_content.'</span>	
				</div>';

 	return $outPut;
 }
add_shortcode( 'kswr_dropcaps', 'kswr_dropcaps_shortC' );


?>