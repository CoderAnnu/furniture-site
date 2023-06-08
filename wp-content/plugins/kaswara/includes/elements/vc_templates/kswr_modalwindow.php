<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============       M O D A L    W I N D O W   	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_modalwindow_shortC($atts,$content){  
	//ModalBox Attributes
 	extract(shortcode_atts(array(						
		'mdlw_bg_color'  				=> '#f6f6f6',
		'mdlw_color'  					=> '#777',		
		'mdlw_title' 					=> '',	
		'mdlw_effect'					=> 'km-effect-1',		
 		'mdlw_close_text'				=> 'Close Me!', 		
 		'mdlw_overlay_bg'				=> 'rgba(0,0,0,0.7)',
 		//The Button Attributes 	
 		'mdlw_btn_default_style'		=> '1',
 		'mdlw_btn_full_width'			=> 'false',
 		'mdlw_btn_width'				=> '250',
		'mdlw_btn_height'				=> '45',
		'mdlw_btn_border_radius'		=> '0',
		'mdlw_btn_align'				=> 'left',
		'mdlw_btn_margins'				=> 'margin-top:0px; margin-bottom:0px;',	
		'mdlw_btn_bg'					=> '{"type":"color", "color1":"#111", "color2":"#111", "direction":"to left"}',
		'mdlw_btn_bg_hover'				=> '{"type":"color", "color1":"#00AFD1", "color2":"#00AFD1", "direction":"to left"}',
		'mdlw_btn_clr'					=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'mdlw_btn_clr_hover'			=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'mdlw_btn_ftsize'				=> 'font-size:15px;line-height:;letter-spacing:;--tablet-font-size:;--phone-font-size:;',
		'mdlw_btn_ftstyle'				=> 'font-family:inherit;font-weight:inherit;font-style:inherit;',
		'mdlw_btn_style'				=> 'none',
		'mdlw_btn_layout'				=> 'noicon',
		'mdlw_btn_hover_action'			=> 'none',
		'mdlw_btn_paddings'				=> 'padding-top:0px; padding-bottom:0px;',
		'mdlw_btn_bdr'					=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'mdlw_btn_bdr_hover'			=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',	
		'mdlw_btn_txt'					=> '',
		'mdlw_btn_icon'					=> '',
		'mdlw_btn_icon_position'		=> 'left',
		'mdlw_btn_icon_clr'				=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'mdlw_btn_icon_clr_hover'		=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'mdlw_btn_icon_size'			=> '26',
		'mdlw_btn_icon_paddings'		=> 'padding-top:0px; padding-bottom:0px;',

 	), $atts));

 	//Auto Generated Id 
 	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
 	$modal_id = substr(str_shuffle($chars),0,6);
 	$outPut = $modal_outPut = $modal_style = $trigger = '';
 	
 	$btnSettings ='';
  		$btnSettings = array(
  				'btn_trigger'=> 'javascript','btn_trigger_action' => 'onclick="kswr_show_modalwindow(this);" data-modal="'.$modal_id.'" ','btn_txt' => $mdlw_btn_txt,'btn_icon' => $mdlw_btn_icon,
  				'btn_full_width' => $mdlw_btn_full_width,  				
  				'btn_width' => $mdlw_btn_width,'btn_height' => $mdlw_btn_height,
				'btn_bg' => $mdlw_btn_bg,'btn_border_radius' => $mdlw_btn_border_radius,
				'btn_align' => $mdlw_btn_align,'btn_margins' => $mdlw_btn_margins,
				'btn_bg_hover' => $mdlw_btn_bg_hover,'btn_clr' => $mdlw_btn_clr,
				'btn_clr_hover' => $mdlw_btn_clr_hover,'btn_ftsize' => $mdlw_btn_ftsize,'btn_ftstyle' => $mdlw_btn_ftstyle,
				'btn_style' => $mdlw_btn_style,'btn_layout' => $mdlw_btn_layout,
				'btn_hover_action' => $mdlw_btn_hover_action,'btn_paddings' => $mdlw_btn_paddings,
				'btn_bdr' => $mdlw_btn_bdr,
				'btn_bdr_hover' => $mdlw_btn_bdr_hover,			
				'btn_icon_position' => $mdlw_btn_icon_position,'btn_icon_clr' => $mdlw_btn_icon_clr,
				'btn_icon_clr_hover' => $mdlw_btn_icon_clr_hover,'btn_icon_size' => $mdlw_btn_icon_size,'btn_icon_paddings' => $mdlw_btn_icon_paddings
  		);
  		if($mdlw_btn_default_style == '1'){
  			$btnSettings = array(
  				'btn_trigger'=> 'javascript','btn_trigger_action' => 'onclick="kswr_show_modalwindow(this);" data-modal="'.$modal_id.'"',
  				'btn_txt' => $mdlw_btn_txt,
				'btn_icon' => $mdlw_btn_icon,
  				'btn_full_width' => $mdlw_btn_full_width,
  				
  				'btn_width' => kswr_shortcode_form_values_front('modalwindow')['mdlw_btn_width'],
				'btn_height' => kswr_shortcode_form_values_front('modalwindow')['mdlw_btn_height'],
				'btn_bg' => kswr_shortcode_form_values_front('modalwindow')['mdlw_btn_bg'],
				'btn_border_radius' => kswr_shortcode_form_values_front('modalwindow')['mdlw_btn_border_radius'],
				'btn_align' => kswr_shortcode_form_values_front('modalwindow')['mdlw_btn_align'],
				'btn_margins' => kswr_shortcode_form_values_front('modalwindow')['mdlw_btn_margins'],
				'btn_bg_hover' => kswr_shortcode_form_values_front('modalwindow')['mdlw_btn_bg_hover'],
				'btn_clr' => kswr_shortcode_form_values_front('modalwindow')['mdlw_btn_clr'],
				'btn_clr_hover' => kswr_shortcode_form_values_front('modalwindow')['mdlw_btn_clr_hover'],
				'btn_ftsize' => kswr_shortcode_form_values_front('modalwindow')['mdlw_btn_ftsize'],
				'btn_ftstyle' => kswr_shortcode_form_values_front('modalwindow')['mdlw_btn_ftstyle'],
				'btn_style' => $mdlw_btn_style,
				'btn_layout' => $mdlw_btn_layout,
				'btn_hover_action' => $mdlw_btn_hover_action,
				'btn_paddings' => kswr_shortcode_form_values_front('modalwindow')['mdlw_btn_paddings'],
				'btn_bdr' => kswr_shortcode_form_values_front('modalwindow')['mdlw_btn_bdr'],			
				'btn_bdr_hover' => kswr_shortcode_form_values_front('modalwindow')['mdlw_btn_bdr_hover'],
				'btn_icon_position' => kswr_shortcode_form_values_front('modalwindow')['mdlw_btn_icon_position'],
				'btn_icon_clr' => kswr_shortcode_form_values_front('modalwindow')['mdlw_btn_icon_clr'],
				'btn_icon_clr_hover' => kswr_shortcode_form_values_front('modalwindow')['mdlw_btn_icon_clr_hover'],
				'btn_icon_size' => kswr_shortcode_form_values_front('modalwindow')['mdlw_btn_icon_size'],
				'btn_icon_paddings' => kswr_shortcode_form_values_front('modalwindow')['mdlw_btn_icon_paddings']
  			);
  		}

	 	$trigger = kaswara_btn_element_output($btnSettings);




	$outPut .= $trigger; 	
 	$modal_style .= 'background-color:'.$mdlw_bg_color.'; color:'.$mdlw_color.';';
 	$outPut .= '<div class="km-overlay" onclick="kswr_close_modalwindow(event);" data-modal="'.esc_attr($modal_id).'"  style="background-color:'.$mdlw_overlay_bg.';"><div class="km-modal '.$mdlw_effect.'" id="'.esc_attr($modal_id).'" ><div class="km-content" onclick="kswr_prevent_default(event)" style="'.$modal_style.'"><h3>'.$mdlw_title.'</h3><div>'.trim(do_shortcode($content),'"').'</div><button class="km-close btn-kswr" onclick="kswr_close_modalwindow();">'.$mdlw_close_text.'</button></div></div></div>';
 	
 	return $outPut;
}

add_shortcode( 'kswr_modalwindow', 'kswr_modalwindow_shortC' );
?>