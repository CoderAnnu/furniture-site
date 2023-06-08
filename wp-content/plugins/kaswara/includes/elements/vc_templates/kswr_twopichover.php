<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============   T W O   P I C T U R E   H O V E R   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_twopichover_shortC($atts) {  
	
 	extract(shortcode_atts(array(								
		'tph_image_one'						=> '',
		'tph_image_two' 					=> '',
 		'tph_style'							=> 'fade',
 		'tph_border_width'					=> '0',
 		'tph_border_color'					=> 'transparent',
 		'tph_border_style'					=> 'solid',
 		'tph_container_classes'				=> '',
 		"tph_bxshadow_enabled"				=>	'off',
		"tph_bxshadow_hover_enabled"		=>	'on',
		"tph_bxshadow_style"				=>	'style2',
		"tph_bxshadow_color"				=>	'rgba(0,0,0,0.5)',	
		'tph_link'							=> '',
		
 	), $atts));

 	$tph_image_one = wp_get_attachment_image_src($tph_image_one,'full');
 	$tph_image_two = wp_get_attachment_image_src($tph_image_two,'full');

 	$containerStyle = 'border: '.$tph_border_width.'px '.$tph_border_style.' '.$tph_border_color.';';
	$link = '';
	
  	$href = vc_build_link($tph_link);
	if(trim($href['url']) != '')
 		$link = '<a class="kswr-tph-link" href="'.$href['url'].'" target="'.$href['target'].'" ></a>';

	

 	$outPut = '<div class="kswr-tph-container km-element-box-shadow '.esc_attr($tph_container_classes).'" data-hover-style="'.esc_attr($tph_style).'" style="--box-shadow-color:'.$tph_bxshadow_color.'; color:'.$tph_bxshadow_color.'; '.$containerStyle.'" 
 	 data-boxshadow="'.esc_attr($tph_bxshadow_enabled).'" data-boxshadow-hover="'.esc_attr($tph_bxshadow_hover_enabled).'" data-boxshadow-style="'.esc_attr($tph_bxshadow_style).'">
			<img src="'.esc_url($tph_image_one[0]).'" class="kswr-tph-img1" >
			<div class="kswr-tph-img2" style="background-image: url('.esc_url($tph_image_two[0]).')"></div>
			'.$link.'
		</div>';

 	return $outPut;
 }
add_shortcode( 'kswr_twopichover', 'kswr_twopichover_shortC' );


?>