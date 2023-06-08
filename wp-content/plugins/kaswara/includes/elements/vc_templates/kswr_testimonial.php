<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==========     T E S T M O N I A L      M A T E    	   ========== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_testmonial_shortC($atts,$content) {  
	//TESTMONIAL Attributes
 	extract(shortcode_atts(array(						
		'style'  				=> 'style1',
		'position'				=> 'left',
		'content_color'			=> '#555',		
		'test_content_fstyle'	=>'',
		'test_content_fsize'		=>'',
		'picture_enable'		=> '1',
		'img'					=> '',
		'name'					=> '',		
		'test_name_fstyle'		=>'',
		'test_name_fsize'		=>'',
		'name_color'			=> '#444',
		'title'					=> '',		
		'test_title_fstyle'		=>'',
		'test_title_fsize'		=>'',
		'title_color'			=> '#888',
		'bg'					=> 'transparent',
		'testi_container_margin'=> '',
		'bubble_bg'				=> 'transparent',
		'tm_icon_color'			=> '#eee',
  		'tm_normal_layout'  	=> 'style1',  		
  		'testi_icon_padding'	=>'',
		'icon_size'				=>'32',
		'testi_content_padding'	=>'',		
		'testi_picture_padding'	=>'',
		'testi_info_padding'	=>'',
		'icon_style'			=>'km-icon-quote-',
		'icon_orientation'		=>'right',
		'testi_icon_border'		=>'',
		'icon_b_color'			=>'#eee',
		'testi_picture_border' => '',
		'picture_b_color'		=>'#eee',
		'testi_info_border'		=>'',
		'info_b_color'			=>'#eee',
  	), $atts));
  	
 	$title_font = $test_title_fsize .''. $test_title_fstyle;
 	$content_font =$test_content_fsize .''. $test_content_fstyle;
 	$name_font = $test_name_fsize .''. $test_name_fstyle;

 	kswr_load_the_font_front($test_title_fstyle);
	kswr_load_the_font_front($test_content_fstyle);
	kswr_load_the_font_front($test_name_fstyle);

	$additional_title_fstyle = $additional_content_fstyle = $additional_name_fstyle = ''; 

	fix_kaswara_font_styles($test_title_fstyle, $additional_title_fstyle);
	fix_kaswara_font_styles($test_content_fstyle, $additional_content_fstyle);
	fix_kaswara_font_styles($test_name_fstyle, $additional_name_fstyle);


  	$img_src = wp_get_attachment_image_src($img,'200x200');
  	//Inside eStyle   	
  	$content_style = 'style="color:'.$content_color.'; '.$content_font.' ';
  	$content_style .= 'background:'.$bubble_bg.'; border-color:'.$bubble_bg.';' ;
  	$name_style = 'style="color:'.$name_color.';'.$name_font.'"';
  	$title_style = 'style="color:'.$title_color.'; '.$title_font.'"';
  	//Array With The Same 
  	$styleWithInfoBottom = array('style1','style2','style3');
  	$outPut = '';

  	//Check if Style 1 for The Extra Styles
  	$child_data = ($style == 'style1') ? 'data-childstyle="'.$tm_normal_layout.'"' : '';
  	
  	//Checking for the childstyle
  	$isChild1 = $isChild2 = $isChild3 = $isChild4 = $isChild5 =  false; 
  	$iconPaddings =  $contentPaddings  = $picturePaddings = $infoPaddings = $iconBorder = $pictureBorder = $infoBorder = '';
  	if($style == "style1"){
	  	$isChild1 = ($tm_normal_layout == "style1") ? true : false; 
	  	$isChild2 = ($tm_normal_layout == "style2") ? true : false; 
	  	$isChild3 = ($tm_normal_layout == "style3") ? true : false; 
	  	$isChild4 = ($tm_normal_layout == "style4") ? true : false; 
	  	$isChild5 = ($tm_normal_layout == "style5") ? true : false; 
  		$iconPaddings = 'font-size:'.$icon_size.'px;'.$testi_icon_padding;
  		$contentPaddings = $testi_content_padding;
  		$picturePaddings = $testi_picture_padding;
  		$infoPaddings = $testi_info_padding;
  		$iconBorder	= kswr_testimonial_borders('icon', $testi_icon_border, $icon_b_color);
  		//kswr_testimonial_borders($type,$borders,$bWidth, $bColor)
		$pictureBorder	= kswr_testimonial_borders('picture', $testi_picture_border, $picture_b_color);
		$infoBorder	= kswr_testimonial_borders('info', $testi_info_border ,$info_b_color);
		
	}

	$content_style .= $contentPaddings .'"';
  
  	//Moved Things !!
	$picture = '';
	if($picture_enable == '1')
		$picture = '<div class="km-testimonial-pic" style="'.$picturePaddings .'">'.$pictureBorder.'<img src="'.esc_url($img_src[0]).'" alt="km-testimonial-pic"></div>';		
  	
  	$info = '<div class="km-testimonial-name-info" style="'.$infoPaddings.'" >'.$infoBorder.'<span class="km-testimonial-name kswr-shortcode-element ' .$additional_name_fstyle. '  " data-fontsettings="'.esc_attr($test_name_fsize).'" '.$name_style.'>'.$name.'</span><span class="km-testimonial-info kswr-shortcode-element ' .$additional_title_fstyle. '  " data-fontsettings="'.esc_attr($test_title_fsize).'" '.$title_style.'>'.$title.'</span></div>';
	$style1_icon = '<div class="km-testimonial-icon" style="color:'.$tm_icon_color.';'.$iconPaddings.'">'.$iconBorder.'<i class="'.$icon_style.''.$icon_orientation.'"></i></div>';

	



	//Begin OutPut
	$outPut .= '<div class="km-testimonial" data-style="'.esc_attr($style).'" data-pic-position="'.esc_attr($position).'" style="background:'.$bg.'; '.$testi_container_margin.'"  '.$child_data.'>
					<div class="km-testimonial-content kswr-shortcode-element ' .$additional_content_fstyle. '  " data-fontsettings="'.esc_attr($test_content_fsize).'" '.$content_style.' >';
	
	if($isChild1 || $isChild5)	$outPut .= $style1_icon;
	if($isChild2)	$outPut .= $picture.' '.$info;
	if($isChild3)	$outPut .= $style1_icon.' '.$info;
	if($isChild4)	$outPut .= $picture;


	

	$outPut .= ($style == 'style3') ? '
	<div class="km-testimonial-content-icon" style="color:'.$tm_icon_color.';" data-position="left"><i class="'.esc_attr($icon_style).'left"></i></div>
				<div class="km-testimonial-content-icon" style="color:'.$tm_icon_color.';" data-position="right"><i class="'.esc_attr($icon_style).'right"></i></div>' 
				: '';

		
	$outPut .= '<span class="testimonial-content-span">'.do_shortcode($content) .'</span></div>';				
	
	if( ($isChild1 || $isChild5) || $style == "style2" || $style == "style3"){
		$outPut .= $picture.' '.$info;		
	}			

	if($isChild2)	$outPut .= $style1_icon;
	if($isChild3)	$outPut .= $picture;
	if($isChild4)	$outPut .= $style1_icon.' '.$info;



	$outPut .=	'</div>';	//Closed Big Div
 	return $outPut;
 }
add_shortcode( 'kswr_testmonial', 'kswr_testmonial_shortC' );






function kswr_testimonial_borders($type,$borders,$bColor){
	$result = '';
	$borders = explode(';',$borders);	
	$borderTop = $borderBottom = $borderWidth = $borderThrough = '0px';
	foreach ($borders as $singleBorder) {
		$singleBorder = explode(':',$singleBorder);	
		switch ($singleBorder[0]) {
			case 'border-top':
				$borderTop =  $singleBorder[1];				
				break;
			case 'border-bottom':
				$borderBottom =  $singleBorder[1];				
				break;
			case 'border-through':
				$borderThrough =  $singleBorder[1];				
				break;
			case 'border-width':
				$borderWidth =  $singleBorder[1];				
				break;			
		}		
	}
	$result .= ($borderTop != '0px') ?
			   '<div class="km-testimonial-border km-testimonial-border-top" style="width:'.$borderWidth.'; background:'.$bColor.'; height:'.$borderTop.';"></div>' : '';
		
	$result .= ($borderBottom != '0px') ?
				   '<div class="km-testimonial-border km-testimonial-border-bottom" style="width:'.$borderWidth.'; background:'.$bColor.'; height:'.$borderBottom.';"></div>' : '';
		
	$result .= ($type =="picture" && ($borderThrough != '0px')) ?
				   '<div class="km-testimonial-border km-testimonial-border-through" style="width:'.$borderWidth.'; background:'.$bColor.'; height:'.$borderThrough.';"></div>' : '';

	return $result;
}


?>