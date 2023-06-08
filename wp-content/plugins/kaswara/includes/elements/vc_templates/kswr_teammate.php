<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============         T E A M     M A T E    	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_teammate_shortC($atts,$content) {  
	//Teammate Attributes
 	extract(shortcode_atts(array(						
		'tmmate_style'  				=> 'style1',
		'tmmate_style3_align'			=> 'center',
		'tmmate_name'  					=> '',
		'tmmate_name_color_def'			=> '1',
		'tmmate_name_color'				=> '#333',
			
		'tmmate_name_font_def'			=> '1',
		'tmmate_name_ftsize'			=>'',
		'tmmate_name_ftstyle'			=>'',
	
		'tmmate_position_font_def'		=> '1',
		'tmmate_position_ftsize'		=>'',
		'tmmate_position_ftstyle'		=>'',

		
		'tmmate_position' 				=> '',	
		'tmmate_position_color_def'		=> '1',
		'tmmate_position_color' 		=> '#888',
			
		'tmmate_scl_color_def'			=> '1',
 		'tmmate_scl_color'				=> '#666',
 		
 		'tmmate_fb_link'				=> '',
 		'tmmate_gplus_link'				=> '',
 		'tmmate_tw_link'				=> '',
 		'tmmate_lk_link'				=> '',
 		'tmmate_insta_link'				=> '',
 		'tmmate_git_link'				=> '',
 		'tmmate_img'					=> '',
 		'tmmate_openin'					=>'_blank'


  	), $atts));
	$outPut = $socialContainer = $name_font = $position_font = '';

 	$tmmate_name_ftsize = kswr_shortcode_attribute_value('tmmate_name_ftsize',$tmmate_name_font_def, $tmmate_name_ftsize,'teammate');
 	$tmmate_name_ftstyle = kswr_shortcode_attribute_value('tmmate_name_ftstyle',$tmmate_name_font_def, $tmmate_name_ftstyle,'teammate');
	$name_font =  $tmmate_name_ftsize.' '.$tmmate_name_ftstyle;

	$tmmate_position_ftsize = kswr_shortcode_attribute_value('tmmate_position_ftsize',$tmmate_position_font_def, $tmmate_position_ftsize,'teammate');
 	$tmmate_position_ftstyle = kswr_shortcode_attribute_value('tmmate_position_ftstyle',$tmmate_position_font_def, $tmmate_position_ftstyle,'teammate');
	$position_font =  $tmmate_position_ftsize.' '.$tmmate_position_ftstyle;

 	$tmmate_name_color = kswr_shortcode_attribute_value('tmmate_name_color',$tmmate_name_color_def, $tmmate_name_color,'teammate');
 	$tmmate_position_color = kswr_shortcode_attribute_value('tmmate_position_color',$tmmate_position_color_def, $tmmate_position_color,'teammate');
 	$tmmate_scl_color = kswr_shortcode_attribute_value('tmmate_scl_color',$tmmate_scl_color_def, $tmmate_scl_color,'teammate');
 
 	
 	kswr_load_the_font_front($tmmate_name_ftstyle);
	kswr_load_the_font_front($tmmate_position_ftstyle);

$additional_name_ftstyle = $additional_position_ftstyle = ''; 

fix_kaswara_font_styles($tmmate_name_ftstyle, $additional_name_ftstyle);
fix_kaswara_font_styles($tmmate_position_ftstyle, $additional_position_ftstyle);

	$socialContainer = '<div class="km-teammate-soc" style="color:'.$tmmate_scl_color.';">';	
	$socialContainer .= (trim($tmmate_fb_link) != "") ? '<a target="'.esc_attr($tmmate_openin).'" href="'.esc_url($tmmate_fb_link).'"><i class="km-icon-facebook-f"></i></a>' : '';	
	$socialContainer .= (trim($tmmate_tw_link) != "") ? '<a target="'.esc_attr($tmmate_openin).'" href="'.esc_url($tmmate_tw_link).'"><i class="km-icon-twitter"></i></a>' : '';	
	$socialContainer .= (trim($tmmate_gplus_link) != "") ? '<a target="'.esc_attr($tmmate_openin).'" href="'.esc_url($tmmate_gplus_link).'"><i class="km-icon-google-plus4"></i></a>' : '';	
	$socialContainer .= (trim($tmmate_lk_link) != "") ? '<a target="'.esc_attr($tmmate_openin).'" href="'.esc_url($tmmate_lk_link).'"><i class="km-icon-linkedin2"></i></a>' : '';	
	$socialContainer .= (trim($tmmate_insta_link) != "") ? '<a target="'.esc_attr($tmmate_openin).'" href="'.esc_url($tmmate_insta_link).'"><i class="km-icon-instagram2"></i></a>' : '';	
	$socialContainer .= (trim($tmmate_git_link) != "") ? '<a target="'.esc_attr($tmmate_openin).'" href="'.esc_url($tmmate_git_link).'"><i class="km-icon-github-alt"></i></a>' : '';						
	$socialContainer .='</div>';

  	$img_src = wp_get_attachment_image_src($tmmate_img,'full');

	$outPut = '<div class="km-teammate-container" data-style="'.esc_attr($tmmate_style).'" data-align="'.esc_attr($tmmate_style3_align).'">
			<div class="km-teammate-img">
				<div class="km-teammate-img-overlay"></div>
				<img src="'.$img_src[0].'">
			</div>	
			<div class="km-teammate-info">	
				<div class="km-teammate-np">
					<div class="km-teammate-name kswr-shortcode-element  ' .$additional_name_ftstyle. '" data-fontsettings="'.esc_attr($tmmate_name_ftsize).'" style="color:'.$tmmate_name_color.';'.$name_font.'">'.$tmmate_name.'</div>	
					<div class="km-teammate-position kswr-shortcode-element  ' .$additional_position_ftstyle. '" data-fontsettings="'.esc_attr($tmmate_position_ftsize).'" style="color:'.$tmmate_position_color.'; '.$position_font.'">'.$tmmate_position.'</div>					
				</div>';

		if($tmmate_style != 'style3') $outPut .= $socialContainer;				
		$outPut .=	'<div class="km-teammate-content">'.do_shortcode($content).'</div>';
		if($tmmate_style == 'style3') $outPut .= $socialContainer;						
		$outPut .=	'</div></div>';	
 	return $outPut;
 }
add_shortcode( 'kswr_teammate', 'kswr_teammate_shortC' );

?>