<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============         A L E R T     B O X    	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_alertbox_shortC($atts) {  
	//AlertBox Attributes
 	extract(shortcode_atts(array(				
 		'albx_height'				=> 50,		
		'albx_bg_color'  			=> '#f6f6f6',
		'albx_color'  				=> '#777',
		'albx_radius'				=> '0',
		'albx_icon'					=> '',
		'albx_icon_size'			=> '18px',
		'albx_title_text' 			=> '',	
		'albx_message_text' 		=> '',
		'albx_border_thickness'		=> '',
		'albx_border_color'	 		=> '',
		'albx_alb_margin'			=> '',
		'albx_alb_padding'			=> '',
		'albx_icon_padding'			=> '',
		
		'albx_title_font_def'		=> '1',
		'albx_title_ftsize'			=>'',
		'albx_title_ftstyle'		=>'',

		'albx_message_font_def' 	=> '1',
		'albx_message_ftsize'		=>'',
		'albx_message_ftstyle'		=>'',
 	), $atts));

 	$albx_title_ftsize = kswr_shortcode_attribute_value('albx_title_ftsize',$albx_title_font_def, $albx_title_ftsize,'alertbox');
 	$albx_title_ftstyle = kswr_shortcode_attribute_value('albx_title_ftstyle',$albx_title_font_def, $albx_title_ftstyle,'alertbox');
 	$albx_message_ftsize = kswr_shortcode_attribute_value('albx_message_ftsize',$albx_message_font_def, $albx_message_ftsize,'alertbox');
 	$albx_message_ftstyle = kswr_shortcode_attribute_value('albx_message_ftstyle',$albx_message_font_def, $albx_message_ftstyle,'alertbox');
 	
 	kswr_load_the_font_front($albx_title_ftstyle);
	kswr_load_the_font_front($albx_message_ftstyle);

	$additional_title_ftstyle = $additional_message_ftstyle = ''; 

	fix_kaswara_font_styles($albx_title_ftstyle, $additional_title_ftstyle);
	fix_kaswara_font_styles($albx_message_ftstyle, $additional_message_ftstyle);


 	$icon_output = ($albx_icon != null && $albx_icon !="") ? '<div style="float:left"><i class="km-icon-alert '.$albx_icon.'" style="font-size:'.$albx_icon_size.'px; '.$albx_icon_padding.'"></i></div>' : '';  
 	$box_style = 'background-color: '.$albx_bg_color.'; color:'.$albx_color.'; border-radius: '.$albx_radius.'px; border: '.$albx_border_thickness.'px solid '.$albx_border_color.';';
 	$box_style .=  $albx_alb_margin.''.$albx_alb_padding;
 	
 	$outPut = '<div class="km-alert-box kswr-theelement" style="'.$box_style.'">
					<div class="km-alert-box-text" style="height:'.$albx_height.'px; line-height:'.$albx_height.'px;">
						'.$icon_output.'
						<span class="km-alert-title kswr-shortcode-element ' .$additional_title_ftstyle. ' " data-fontsettings="'.esc_attr($albx_title_ftsize).'" style="'.$albx_title_ftsize .' '.$albx_title_ftstyle.'">'.$albx_title_text.'</span>
						<span class="km-alert-message kswr-shortcode-element ' .$additional_message_ftstyle. ' " data-fontsettings="'.esc_attr($albx_message_ftsize).'" style="'.$albx_message_ftsize .' '.$albx_message_ftstyle.'">'.$albx_message_text.'</span>
					</div>
					<!--<a class="km-alert-box-close" onclick="close_alert(this);"><i class="km-icon-times"></i></a>-->	
				</div>';

 	return $outPut;
 }
add_shortcode( 'kswr_alertbox', 'kswr_alertbox_shortC' );


?>