<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============      V I D E O   M O D A L      	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_videomodal_shortC($atts,$content){  
	//Modal Video Box Attributes
 	extract(shortcode_atts(array(								
		'modalv_effect'					=> 'km-effect-1',		 		
 		'modalv_overlay_bg_def'			=> '1',
 		'modalv_overlay_bg'				=> 'rgba(0,0,0,0.7)',
 		'modalv_iframe'					=> '',
 		'modalv_iframew_def'			=> '1',
 		'modalv_iframew'				=> '750',
 		'modalv_iframeh_def'			=> '1',
 		'modalv_iframeh'				=> '450',
 		'modalv_close_color_def'		=> '1',
 		'modalv_close_color'			=> '#eee',
 		'modalv_close_bg_def'			=> '1',
 		'modalv_close_bg'				=> '#111',
 		'modalv_tgr_image'				=> '',
 		'modalv_tgr_imagew'				=> '',
 		'modalv_tgr_imageh'				=> '',
 		'modalv_tgr_imagealign'			=> '',
 		'modalv_tgr_imagemargin'		=> '',
 		
 		'modalv_trigger_type'			=> 'image',
 		//The Button Attributes
 		//The Button Attributes 	
 		'modalv_btn_default_style'		=> '1',
 		'modalv_btn_full_width'			=> 'false', 	
 		'modalv_btn_width'				=> '250',
		'modalv_btn_height'				=> '45',
		'modalv_btn_border_radius'		=> '0',
		'modalv_btn_align'				=> 'left',
		'modalv_btn_margins'			=> 'margin-top:0px; margin-bottom:0px;',	
		'modalv_btn_bg'					=> '{"type":"color", "color1":"#111", "color2":"#111", "direction":"to left"}',
		'modalv_btn_bg_hover'			=> '{"type":"color", "color1":"#00AFD1", "color2":"#00AFD1", "direction":"to left"}',
		'modalv_btn_clr'				=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'modalv_btn_clr_hover'			=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'modalv_btn_ftsize'				=> 'font-size:15px;line-height:;letter-spacing:;--tablet-font-size:;--phone-font-size:;',
		'modalv_btn_ftstyle'			=> 'font-family:inherit;font-weight:inherit;font-style:inherit;',
		'modalv_btn_style'				=> 'none',
		'modalv_btn_layout'				=> 'noicon',
		'modalv_btn_hover_action'		=> 'none',
		'modalv_btn_paddings'			=> 'padding-top:0px; padding-bottom:0px;',
		'modalv_btn_bdr'				=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'modalv_btn_bdr_hover'			=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',	
		'modalv_btn_txt'				=> '',
		'modalv_btn_icon'				=> '',
		'modalv_btn_icon_position'		=> 'left',
		'modalv_btn_icon_clr'			=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'modalv_btn_icon_clr_hover'		=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'modalv_btn_icon_size'			=> '26',
		'modalv_btn_icon_paddings'		=> 'padding-top:0px; padding-bottom:0px;',
 	), $atts));
 	$img_src = wp_get_attachment_image_src($modalv_tgr_image,'full');
 	$outPut = $videoembed = $trigger = '';
 	
 	$modalv_overlay_bg = kswr_shortcode_attribute_value('modalv_overlay_bg',$modalv_overlay_bg_def, $modalv_overlay_bg,'videomodal');
	$modalv_iframew = kswr_shortcode_attribute_value('modalv_iframew',$modalv_iframew_def, $modalv_iframew,'videomodal');
	$modalv_iframeh = kswr_shortcode_attribute_value('modalv_iframeh',$modalv_iframeh_def, $modalv_iframeh,'videomodal');
	$modalv_close_color = kswr_shortcode_attribute_value('modalv_close_color',$modalv_close_color_def, $modalv_close_color,'videomodal');
	$modalv_close_bg = kswr_shortcode_attribute_value('modalv_close_bg',$modalv_close_bg_def, $modalv_close_bg,'videomodal');


 	//Auto Generated Id 
 	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
 	$modal_id = substr(str_shuffle($chars),0,8);

 	$trigger_style = 'height:'.$modalv_tgr_imageh.'px; width:'.$modalv_tgr_imagew.'px;'.$modalv_tgr_imagemargin; 
 	$modalv_style =  'min-height:'.$modalv_iframeh.'px; width:'.$modalv_iframew.'px;';
 	$closer_style = 'color:'.$modalv_close_color.'; background:'.$modalv_close_bg.';';

 	global $wp_embed;
	if ( is_object( $wp_embed ) ) {
		$videoembed = $wp_embed->run_shortcode( '[embed]' . $modalv_iframe . '[/embed]' );
	}

	if($modalv_trigger_type == 'image'){		
	 	$trigger = '<div class="km-modal-video-tgr-container" data-position="'.$modalv_tgr_imagealign.'"><div onclick="kswr_show_modalwindow(this);"  class="km-trigger km-modal-video-tgr"  data-modal="'.$modal_id.'" style="'.$trigger_style.'"><img alt="video-modal" src="'.esc_url($img_src[0]).'"/></div></div>';
	}

	if($modalv_trigger_type == 'button'){		
		$btnSettings ='';
  		$btnSettings = array(
  				'btn_trigger'=> 'javascript','btn_trigger_action' => 'onclick="kswr_show_modalwindow(this);" data-modal="'.esc_attr($modal_id).'" ','btn_txt' => $modalv_btn_txt,'btn_icon' => $modalv_btn_icon,
	  			'btn_full_width' => $modalv_btn_full_width,  			  				  				
  				'btn_width' => $modalv_btn_width,'btn_height' => $modalv_btn_height,
				'btn_bg' => $modalv_btn_bg,'btn_border_radius' => $modalv_btn_border_radius,
				'btn_align' => $modalv_btn_align,'btn_margins' => $modalv_btn_margins,
				'btn_bg_hover' => $modalv_btn_bg_hover,'btn_clr' => $modalv_btn_clr,
				'btn_clr_hover' => $modalv_btn_clr_hover,'btn_ftsize' => $modalv_btn_ftsize,'btn_ftstyle' => $modalv_btn_ftstyle,
				'btn_style' => $modalv_btn_style,'btn_layout' => $modalv_btn_layout,
				'btn_hover_action' => $modalv_btn_hover_action,'btn_paddings' => $modalv_btn_paddings,
				'btn_bdr' => $modalv_btn_bdr,
				'btn_bdr_hover' => $modalv_btn_bdr_hover,			
				'btn_icon_position' => $modalv_btn_icon_position,'btn_icon_clr' => $modalv_btn_icon_clr,
				'btn_icon_clr_hover' => $modalv_btn_icon_clr_hover,'btn_icon_size' => $modalv_btn_icon_size,'btn_icon_paddings' => $modalv_btn_icon_paddings
  		);
  		if($modalv_btn_default_style == '1'){
  			$btnSettings = array(
  				'btn_trigger'=> 'javascript','btn_trigger_action' => 'onclick="kswr_show_modalwindow(this);" data-modal="'.esc_attr($modal_id).'" ',
  				'btn_txt' => $modalv_btn_txt,
				'btn_icon' => $modalv_btn_icon,
	  			'btn_full_width' => $modalv_btn_full_width,  			  				
  				'btn_width' => kswr_shortcode_form_values_front('videomodal')['modalv_btn_width'],
				'btn_height' => kswr_shortcode_form_values_front('videomodal')['modalv_btn_height'],
				'btn_bg' => kswr_shortcode_form_values_front('videomodal')['modalv_btn_bg'],
				'btn_border_radius' => kswr_shortcode_form_values_front('videomodal')['modalv_btn_border_radius'],
				'btn_align' => kswr_shortcode_form_values_front('videomodal')['modalv_btn_align'],
				'btn_margins' => kswr_shortcode_form_values_front('videomodal')['modalv_btn_margins'],
				'btn_bg_hover' => kswr_shortcode_form_values_front('videomodal')['modalv_btn_bg_hover'],
				'btn_clr' => kswr_shortcode_form_values_front('videomodal')['modalv_btn_clr'],
				'btn_clr_hover' => kswr_shortcode_form_values_front('videomodal')['modalv_btn_clr_hover'],
				'btn_ftsize' => kswr_shortcode_form_values_front('videomodal')['modalv_btn_ftsize'],
				'btn_ftstyle' => kswr_shortcode_form_values_front('videomodal')['modalv_btn_ftstyle'],
				'btn_style' => $modalv_btn_style,
				'btn_layout' => $modalv_btn_layout,
				'btn_hover_action' => $modalv_btn_hover_action,
				'btn_paddings' => kswr_shortcode_form_values_front('videomodal')['modalv_btn_paddings'],
				'btn_bdr' => kswr_shortcode_form_values_front('videomodal')['modalv_btn_bdr'],			
				'btn_bdr_hover' => kswr_shortcode_form_values_front('videomodal')['modalv_btn_bdr_hover'],
				'btn_icon_position' => kswr_shortcode_form_values_front('videomodal')['modalv_btn_icon_position'],
				'btn_icon_clr' => kswr_shortcode_form_values_front('videomodal')['modalv_btn_icon_clr'],
				'btn_icon_clr_hover' => kswr_shortcode_form_values_front('videomodal')['modalv_btn_icon_clr_hover'],
				'btn_icon_size' => kswr_shortcode_form_values_front('videomodal')['modalv_btn_icon_size'],
				'btn_icon_paddings' => kswr_shortcode_form_values_front('videomodal')['modalv_btn_icon_paddings']
  			);
  		}

	 	$trigger = kaswara_btn_element_output($btnSettings);
	}


 	
 	$outPut .= $trigger.'<div class="km-overlay" onclick="kswr_close_modalwindow(event);" data-modal="'.esc_attr($modal_id).'"  style="background-color:'.$modalv_overlay_bg.';"><div class="km-modal-video-closer" style="'.$closer_style.'" onclick="kswr_close_modalwindow();">&#x2715;</div><div onclick="kswr_prevent_default(event)" class="km-modal km-modal-video '.esc_attr($modalv_effect).'" style="'.$modalv_style.'" id="'.esc_attr($modal_id).'" ><div class="km-content" >'.$videoembed.'</div></div></div>';

 	

 
 	
 	return $outPut;
}

add_shortcode( 'kswr_videomodal', 'kswr_videomodal_shortC' );
?>