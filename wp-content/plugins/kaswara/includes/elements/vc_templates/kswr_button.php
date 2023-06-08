<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============          B   U  T   T   O   N  	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_button_shortC($atts,$content){  
	//Button Attributes
 	extract(shortcode_atts(array(	 		
 		'btn_link'					=>'',	
 		//The Button Attributes
 		'btn_default_style'			=> '1',
 		'btn_full_width'			=> 'false',
 		'btn_width'					=> '250',
		'btn_height'				=> '45',
		'btn_border_radius'			=> '0',
		'btn_align'					=> 'left',
		'btn_margins'				=> 'margin-top:0px; margin-bottom:0px;',
		
		///////////////////////////////////
		'btn_bg'					=> '{"type":"color", "color1":"#111", "color2":"#111", "direction":"to left"}',
		'btn_bg_hover'				=> '{"type":"color", "color1":"#00AFD1", "color2":"#00AFD1", "direction":"to left"}',
		'btn_clr'					=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'btn_clr_hover'				=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		///////////////////////////////////

		'btn_ftsize'				=> 'font-size:15px;line-height:;letter-spacing:;--tablet-font-size:;--phone-font-size:;',
		'btn_ftstyle'				=> 'font-family:inherit;font-weight:inherit;font-style:inherit;',
		'btn_style'					=> 'none',
		'btn_layout'				=> 'noicon',
		'btn_hover_action'			=> 'none',
		'btn_paddings'				=> 'padding-top:0px; padding-bottom:0px;',
		
		/////////////////////////////////////////////////////////
		'btn_bdr'					=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'btn_bdr_hover'				=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		/////////////////////////////////////////////////////////


		'btn_txt'					=> '',
		'btn_icon'					=> '',
		'btn_icon_position'			=> 'left',

		///////////////////////////////////////////////////
		'btn_icon_clr'				=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'btn_icon_clr_hover'		=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		//////////////////////////////////////////////////

		'btn_icon_size'				=> '26',
		'btn_icon_paddings'			=> 'padding-top:0px; padding-bottom:0px;',

 	), $atts));

 	$outPut = $btnLink = '';

  	$href = vc_build_link($btn_link);
 	if(trim($href['url']) != '')
 		$btnLink = '<a href="'.esc_url($href['url']).'" target="'.esc_attr($href['target']).'" ></a>';

 	$btnSettings ='';
  		$btnSettings = array(
  				'btn_trigger'=> 'link','btn_trigger_action' => $btnLink ,'btn_txt' => $btn_txt,'btn_icon' => $btn_icon,
  				'btn_full_width' => $btn_full_width,
  				'btn_width' => $btn_width,'btn_height' => $btn_height,
				'btn_bg' => $btn_bg,'btn_border_radius' => $btn_border_radius,
				'btn_align' => $btn_align,'btn_margins' => $btn_margins,
				'btn_bg_hover' => $btn_bg_hover,'btn_clr' => $btn_clr,
				'btn_clr_hover' => $btn_clr_hover,'btn_ftsize' => $btn_ftsize,'btn_ftstyle' => $btn_ftstyle,
				'btn_style' => $btn_style,'btn_layout' => $btn_layout,
				'btn_hover_action' => $btn_hover_action,'btn_paddings' => $btn_paddings,
				'btn_bdr' => $btn_bdr,
				'btn_bdr_hover' => $btn_bdr_hover,			
				'btn_icon_position' => $btn_icon_position,'btn_icon_clr' => $btn_icon_clr,
				'btn_icon_clr_hover' => $btn_icon_clr_hover,'btn_icon_size' => $btn_icon_size,'btn_icon_paddings' => $btn_icon_paddings
  		);
  		if($btn_default_style == '1'){
  			$btnSettings = array(
  				'btn_trigger'=> 'link','btn_trigger_action' => $btnLink ,
  				'btn_txt' => $btn_txt,
				'btn_icon' => $btn_icon,
  				'btn_full_width' => $btn_full_width,
  				'btn_width' => kswr_shortcode_form_values_front('button')['btn_width'],
				'btn_height' => kswr_shortcode_form_values_front('button')['btn_height'],
				'btn_bg' => kswr_shortcode_form_values_front('button')['btn_bg'],
				'btn_border_radius' => kswr_shortcode_form_values_front('button')['btn_border_radius'],
				'btn_align' => kswr_shortcode_form_values_front('button')['btn_align'],
				'btn_margins' => kswr_shortcode_form_values_front('button')['btn_margins'],
				'btn_bg_hover' => kswr_shortcode_form_values_front('button')['btn_bg_hover'],
				'btn_clr' => kswr_shortcode_form_values_front('button')['btn_clr'],
				'btn_clr_hover' => kswr_shortcode_form_values_front('button')['btn_clr_hover'],
				'btn_ftsize' => kswr_shortcode_form_values_front('button')['btn_ftsize'],
				'btn_ftstyle' => kswr_shortcode_form_values_front('button')['btn_ftstyle'],
				'btn_style' => $btn_style,
				'btn_layout' => $btn_layout,
				'btn_hover_action' => $btn_hover_action,
				'btn_paddings' => kswr_shortcode_form_values_front('button')['btn_paddings'],
				'btn_bdr' => kswr_shortcode_form_values_front('button')['btn_bdr'],			
				'btn_bdr_hover' => kswr_shortcode_form_values_front('button')['btn_bdr_hover'],
				'btn_icon_position' => kswr_shortcode_form_values_front('button')['btn_icon_position'],
				'btn_icon_clr' => kswr_shortcode_form_values_front('button')['btn_icon_clr'],
				'btn_icon_clr_hover' => kswr_shortcode_form_values_front('button')['btn_icon_clr_hover'],
				'btn_icon_size' => kswr_shortcode_form_values_front('button')['btn_icon_size'],
				'btn_icon_paddings' => kswr_shortcode_form_values_front('button')['btn_icon_paddings']
  			);
  		}
  		

	 	$outPut = kaswara_btn_element_output($btnSettings);





 	return $outPut;
}

add_shortcode( 'kswr_button', 'kswr_button_shortC' );
?>