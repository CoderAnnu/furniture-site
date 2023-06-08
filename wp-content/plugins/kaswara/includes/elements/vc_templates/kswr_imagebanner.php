<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============      I M A G E     B A N N ER 	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_imagebanner_shortC($atts) {  
	//Image Banner Attributes
 	extract(shortcode_atts(array(		
 		'imban_height'				=> '300',				
		'imban_img' 				=> '',
		'imban_overlay'				=> '',
		'imban_overlay_opac' 		=> '',
		'imban_layout' 				=> 'left',
		'imban_hoverstyle'			=> 'none',
		'imban_title'				=> '',
		'imban_content' 			=> '',
		'imban_font_def'			=> '',
		'imban_titlecolor'			=> '',
		'imban_contentcolor' 		=> '',
		'imban_title_fsize'			=> '',
		'imban_title_fstyle'		=> '',
		'imban_content_fsize'		=> '',
		'imban_content_fstyle'		=> '',
		//Paddings And Margins
		'imban_title_marg'			=> '',
		'imban_content_marg'		=> '',
		'imban_container_padd'		=> '',
		'imban_button_marg'			=> '',
		//Button Lin
		'imban_btn_link'				=>'',	 		
		//The Button Attributes 	
 		'imban_btn_default_style'		=> '1',
 		'imban_btn_full_width'			=> 'false',
 		'imban_btn_width'				=> '250',
		'imban_btn_height'				=> '45',
		'imban_btn_border_radius'		=> '0',
		'imban_btn_align'				=> 'left',
		'imban_btn_margins'				=> 'margin-top:0px; margin-bottom:0px;',	
		'imban_btn_bg'					=> '{"type":"color", "color1":"#111", "color2":"#111", "direction":"to left"}',
		'imban_btn_bg_hover'			=> '{"type":"color", "color1":"#00AFD1", "color2":"#00AFD1", "direction":"to left"}',
		'imban_btn_clr'					=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'imban_btn_clr_hover'			=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'imban_btn_ftsize'				=> 'font-size:15px;line-height:;letter-spacing:;--tablet-font-size:;--phone-font-size:;',
		'imban_btn_ftstyle'				=> 'font-family:inherit;font-weight:inherit;font-style:inherit;',
		'imban_btn_style'				=> 'none',
		'imban_btn_layout'				=> 'noicon',
		'imban_btn_hover_action'		=> 'none',
		'imban_btn_paddings'			=> 'padding-top:0px; padding-bottom:0px;',
		'imban_btn_bdr'					=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
		'imban_btn_bdr_hover'			=> '{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',	
		'imban_btn_txt'					=> '',
		'imban_btn_icon'				=> '',
		'imban_btn_icon_position'		=> 'left',
		'imban_btn_icon_clr'			=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'imban_btn_icon_clr_hover'		=> '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
		'imban_btn_icon_size'			=> '26',
		'imban_btn_icon_paddings'		=> 'padding-top:0px; padding-bottom:0px;',
 	), $atts));

 	$outPut = $btnLink = $containerStyle = $titleStyle = $contentStyle = '';
 	//
 	
	$imban_title_fsize = kswr_shortcode_attribute_value('imban_title_fsize',$imban_font_def, $imban_title_fsize,'imagebanner');
	$imban_title_fstyle = kswr_shortcode_attribute_value('imban_title_fstyle',$imban_font_def, $imban_title_fstyle,'imagebanner');
	$imban_content_fsize = kswr_shortcode_attribute_value('imban_content_fsize',$imban_font_def, $imban_content_fsize,'imagebanner');
	$imban_content_fstyle = kswr_shortcode_attribute_value('imban_content_fstyle',$imban_font_def, $imban_content_fstyle,'imagebanner');
 
 	kswr_load_the_font_front($imban_title_fstyle);
	kswr_load_the_font_front($imban_content_fstyle);

	$additional_title_fstyle = $additional_content_fstyle = ''; 

	fix_kaswara_font_styles($imban_title_fstyle, $additional_title_fstyle);
	fix_kaswara_font_styles($imban_content_fstyle, $additional_content_fstyle);

 	$img_src = wp_get_attachment_image_src($imban_img,'full');
 	$containerStyle = 'text-align:'.$imban_layout.';min-height:'.$imban_height.'px;'.$imban_container_padd;
 	$titleStyle = 'color:'.$imban_titlecolor.';'.$imban_title_fsize.''.$imban_title_fstyle.''.$imban_title_marg;
 	$contentStyle = 'color:'.$imban_contentcolor.';'.$imban_content_fsize.''.$imban_content_fstyle.''.$imban_content_marg;

 	$href = vc_build_link($imban_btn_link);
 	if(trim($href['url']) != '')
 		$btnLink = '<a href="'.esc_url($href['url']).'" target="'.esc_attr($href['target']).'" ></a>';

 	$btnSettings ='';
  		$btnSettings = array(
  				'btn_trigger'=> 'link','btn_trigger_action' => $btnLink ,'btn_txt' => $imban_btn_txt,'btn_icon' => $imban_btn_icon,
  				'btn_width' => $imban_btn_width,'btn_height' => $imban_btn_height,
				'btn_bg' => $imban_btn_bg,'btn_border_radius' => $imban_btn_border_radius,
				'btn_align' => $imban_btn_align,'btn_margins' => $imban_btn_margins,
				'btn_bg_hover' => $imban_btn_bg_hover,'btn_clr' => $imban_btn_clr,
				'btn_clr_hover' => $imban_btn_clr_hover,'btn_ftsize' => $imban_btn_ftsize,'btn_ftstyle' => $imban_btn_ftstyle,
				'btn_style' => $imban_btn_style,'btn_layout' => $imban_btn_layout,
				'btn_hover_action' => $imban_btn_hover_action,'btn_paddings' => $imban_btn_paddings,
				'btn_bdr' => $imban_btn_bdr,
				'btn_full_width' => $imban_btn_full_width,
				'btn_bdr_hover' => $imban_btn_bdr_hover,			
				'btn_icon_position' => $imban_btn_icon_position,'btn_icon_clr' => $imban_btn_icon_clr,
				'btn_icon_clr_hover' => $imban_btn_icon_clr_hover,'btn_icon_size' => $imban_btn_icon_size,'btn_icon_paddings' => $imban_btn_icon_paddings
  		);
  		if($imban_btn_default_style == '1'){
  			$btnSettings = array(
  				'btn_trigger'=> 'link','btn_trigger_action' => $btnLink ,
  				'btn_txt' => $imban_btn_txt,
				'btn_icon' => $imban_btn_icon,
				'btn_full_width' => $imban_btn_full_width,				
  				'btn_width' => kswr_shortcode_form_values_front('imagebanner')['imban_btn_width'],
				'btn_height' => kswr_shortcode_form_values_front('imagebanner')['imban_btn_height'],
				'btn_bg' => kswr_shortcode_form_values_front('imagebanner')['imban_btn_bg'],
				'btn_border_radius' => kswr_shortcode_form_values_front('imagebanner')['imban_btn_border_radius'],
				'btn_align' => kswr_shortcode_form_values_front('imagebanner')['imban_btn_align'],
				'btn_margins' => kswr_shortcode_form_values_front('imagebanner')['imban_btn_margins'],
				'btn_bg_hover' => kswr_shortcode_form_values_front('imagebanner')['imban_btn_bg_hover'],
				'btn_clr' => kswr_shortcode_form_values_front('imagebanner')['imban_btn_clr'],
				'btn_clr_hover' => kswr_shortcode_form_values_front('imagebanner')['imban_btn_clr_hover'],
				'btn_ftsize' => kswr_shortcode_form_values_front('imagebanner')['imban_btn_ftsize'],
				'btn_ftstyle' => kswr_shortcode_form_values_front('imagebanner')['imban_btn_ftstyle'],
				'btn_style' => $imban_btn_style,
				'btn_layout' => $imban_btn_layout,
				'btn_hover_action' => $imban_btn_hover_action,
				'btn_paddings' => kswr_shortcode_form_values_front('imagebanner')['imban_btn_paddings'],
				'btn_bdr' => kswr_shortcode_form_values_front('imagebanner')['imban_btn_bdr'],			
				'btn_bdr_hover' => kswr_shortcode_form_values_front('imagebanner')['imban_btn_bdr_hover'],
				'btn_icon_position' => kswr_shortcode_form_values_front('imagebanner')['imban_btn_icon_position'],
				'btn_icon_clr' => kswr_shortcode_form_values_front('imagebanner')['imban_btn_icon_clr'],
				'btn_icon_clr_hover' => kswr_shortcode_form_values_front('imagebanner')['imban_btn_icon_clr_hover'],
				'btn_icon_size' => kswr_shortcode_form_values_front('imagebanner')['imban_btn_icon_size'],
				'btn_icon_paddings' => kswr_shortcode_form_values_front('imagebanner')['imban_btn_icon_paddings']
  			);
  		}
	 	$trigger = kaswara_btn_element_output($btnSettings);

	 	


	 	

	 	$outPut = '<div class="kswr-imban-container kswr-theelement" data-layout="'.esc_attr($imban_layout).'" data-hoverstyle="'.esc_attr($imban_hoverstyle).'" style="'.$containerStyle.'">
	 			<div class="kswr-imban-overlay" style="background-color:'.$imban_overlay.';opacity:'.$imban_overlay_opac.';"></div>
	 			<div class="kswr-imban-img" style="background-image:url('.$img_src[0].'); "></div>
				<div class="kswr-imban-title kswr-shortcode-element ' .$additional_title_fstyle. '  " data-fontsettings="'.esc_attr($imban_title_fsize).'" style="'.$titleStyle.'">'.$imban_title.'</div>
				<div class="kswr-imban-info kswr-shortcode-element ' .$additional_content_fstyle. '  " data-fontsettings="'.esc_attr($imban_content_fsize).'" style="'.$contentStyle.'">'.$imban_content.'</div>
				<div class="kswr-imban-button" style="'.$imban_button_marg.'">'.$trigger.'</div>
			</div>';


 	return $outPut;
 }
add_shortcode( 'kswr_imagebanner', 'kswr_imagebanner_shortC' );


?>