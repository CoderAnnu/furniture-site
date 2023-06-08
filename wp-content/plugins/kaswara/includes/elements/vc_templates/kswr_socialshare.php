<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============       S O C I A L    S H A R E       ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_socialshare_shortC($atts) {  

 	extract(shortcode_atts(array(						
		'ss_size_def'				=>'1',
		'ss_size'					=> '26',
		'ss_backsize_def'			=>'1',
		'ss_backsize'				=> '35',
		'ss_borderradius_def'		=>'1',
		'ss_borderradius'			=> '0',
		'ss_style_def'				=>'1',
		'ss_style'					=> 'hoverColorScheme',
		'ss_backcolor_def'			=>'1',
		'ss_backcolor'				=> 'transparent',
		'ss_iconcolor_def'			=>'1',
		'ss_iconcolor'				=> '#888',
		'ss_iconhovercolor_def'		=>'1',
		'ss_iconhovercolor'			=> '#fff',
		'ss_link'					=> '',
		'ss_socialarray'			=> '',
		'ss_align_def'				=>'1',
		'ss_align'					=> 'left',		
		'ss_margins_def'			=>'1',
		'ss_margins'				=> '5',		
 	), $atts));

 	$ss_size = kswr_shortcode_attribute_value('ss_size',$ss_size_def, $ss_size,'socialshare');
 	$ss_backsize = kswr_shortcode_attribute_value('ss_backsize',$ss_backsize_def, $ss_backsize,'socialshare');
 	$ss_borderradius = kswr_shortcode_attribute_value('ss_borderradius',$ss_borderradius_def, $ss_borderradius,'socialshare');
 	$ss_style = kswr_shortcode_attribute_value('ss_style',$ss_style_def, $ss_style,'socialshare');
 	$ss_backcolor = kswr_shortcode_attribute_value('ss_backcolor',$ss_backcolor_def, $ss_backcolor,'socialshare');
 	$ss_iconcolor = kswr_shortcode_attribute_value('ss_iconcolor',$ss_iconcolor_def, $ss_iconcolor,'socialshare');
 	$ss_iconhovercolor = kswr_shortcode_attribute_value('ss_iconhovercolor',$ss_iconhovercolor_def, $ss_iconhovercolor,'socialshare');
 	$ss_align = kswr_shortcode_attribute_value('ss_align',$ss_align_def, $ss_align,'socialshare');
 	$ss_margins = kswr_shortcode_attribute_value('ss_margins',$ss_margins_def, $ss_margins,'socialshare');



 	$sa = array(
 		'backsize'			=>	$ss_backsize,
		'size'				=>	$ss_size,
		'borderradius'		=>	$ss_borderradius,
		'style'				=>	$ss_style,
		'backColor'			=>	$ss_backcolor,
		'iconColor'			=>	$ss_iconcolor,
		'iconHoverColor'	=>	$ss_iconhovercolor,
		'link'				=>	$ss_link,
		'align'				=>  $ss_align,
		'margins'			=>  $ss_margins,
 	);
	$socialArray =	explode(',',$ss_socialarray);
	return kaswara_social_share_modern($socialArray, $sa,'share', array(), 'km-item-bind-view km-item-bind-hidden');
 }
add_shortcode( 'kswr_socialshare', 'kswr_socialshare_shortC' );


?>