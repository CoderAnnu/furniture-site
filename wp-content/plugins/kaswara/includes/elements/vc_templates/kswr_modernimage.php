<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============      M O D E R N    I M A G E    	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_modernimage_shortC($atts) {  
	//Modern Image Attributes
 	extract(shortcode_atts(array(				
 		'mdim_style'					=>	'mercury',
 		'mdim_imagesize'				=>	'full',
 		'mdim_image'					=>	'',
		'mdim_link'						=>	'',
		'mdim_classes'					=>	'',
		'mdim_title'					=>	'',
		'mdim_titlefont'				=>	'font-size:20px;line-height:;letter-spacing:;--tablet-font-size:;--phone-font-size:;',
		'mdim_titlefontstyle'			=>	'',
		'mdim_titlecolor'				=>	'#fff',
		'mdim_subtitle'					=>	'',
		'mdim_subtitlefont'				=>	'font-size:14px;line-height:;letter-spacing:;--tablet-font-size:;--phone-font-size:;',
		'mdim_subtitlefontstyle'		=>	'',
		'mdim_subtitlecolor'			=>	'#ccc',
		'mdim_titlepadding'				=>	'6',
		'mdim_contentshoweffect'		=>	'fade',
		'mdim_overlaycolor'				=>	'rgba(0, 0, 0, 0.7)',
		'mdim_overlayshoweffect'		=>	'fade',
		'mdim_overlayframe'				=>	'disabled',
		'mdim_colorscheme'				=>	'#fff',
		'mdim_boxshadow'				=>	'enabled',
		'mdim_3dhover'					=>	'disabled',
		'mdim_imageeffect'				=>	'none',
		'mdim_columnposition'			=>	'center',
		'mdim_rowposition'				=>	'middle',
		'mdim_bordersize'				=>	'medium',
 	), $atts));
 	$imageLink ='';
 	$imageUrl = wp_get_attachment_image_src($mdim_image,'full')[0];
 	if($mdim_imagesize != 'full' && $mdim_imagesize != '' )
 	 	$imageUrl =	kaswara_image_maker($imageUrl, $mdim_imagesize, '', 'url'); 

 	$href = vc_build_link($mdim_link); 	
 	if(trim($href['url']) != '') $imageLink = '<a class="syn-full-link" href="'.esc_url($href['url']).'" target="'.esc_attr($href['target']).'" ></a>';

 	kswr_load_the_font_front($mdim_titlefontstyle);
 	kswr_load_the_font_front($mdim_subtitlefontstyle);

$additional_titlefontstyle = $subtitlefontstyle = ''; 

fix_kaswara_font_styles($mdim_titlefontstyle, $additional_titlefontstyle);
fix_kaswara_font_styles($mdim_subtitlefontstyle, $subtitlefontstyle);

 	$elementOptions = array(
 		'customclasses'			=> 'syn-hvimage-single '.$mdim_classes,
 		'title'					=> $mdim_title,
		'titlefont'				=> $mdim_titlefont,
		'titlefontstyle'		=> $mdim_titlefontstyle,
		'titlecolor'			=> $mdim_titlecolor,
		'subtitle'				=> $mdim_subtitle,
		'subtitlefont'			=> $mdim_subtitlefont,
		'subtitlefontstyle'		=> $mdim_subtitlefontstyle,
		'subtitlecolor'			=> $mdim_subtitlecolor,
		'titlepadding'			=> $mdim_titlepadding,
		'contentshoweffect'		=> $mdim_contentshoweffect,
		'overlaycolor'			=> $mdim_overlaycolor,
		'overlayshoweffect'		=> $mdim_overlayshoweffect,
		'colorscheme'			=> $mdim_colorscheme,
		'boxshadow'				=> $mdim_boxshadow,
		'3dhover'				=> $mdim_3dhover,
		'imageeffect'			=> $mdim_imageeffect,
		'columnposition'		=> $mdim_columnposition,
		'rowposition'			=> $mdim_rowposition,
		'overlayframe'			=> $mdim_overlayframe,
		'bordersize'			=> $mdim_bordersize,
		'titlefontstyleclasses'			=> $additional_titlefontstyle,
		'subtitlefontstyleclasses'			=> $subtitlefontstyle
 	);
 	$outPut = '';
 	switch ($mdim_style) {
 		case 'mercury':
 			$outPut = kswr_modernimage_mecury($elementOptions,$imageUrl,$imageLink);
 		break;
 		case 'venus':
 			$outPut = kswr_modernimage_venus($elementOptions,$imageUrl,$imageLink);
 		break;
		case 'neptune':
			$outPut = kswr_modernimage_neptune($elementOptions,$imageUrl,$imageLink);
		break;	
		case 'uranus':
			$outPut = kswr_modernimage_uranus($elementOptions,$imageUrl,$imageLink);
		break;	
		case 'pluto':
			$outPut = kswr_modernimage_pluto($elementOptions,$imageUrl,$imageLink);
		break;	 	
 	}

 	return $outPut;
 }
add_shortcode( 'kswr_modernimage', 'kswr_modernimage_shortC' );





?>