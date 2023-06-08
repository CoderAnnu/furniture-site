<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============   A N I M A T E D     H E A D I N G   ============= 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */
function kswr_animatedheading_shortC($atts) {  
	//Animated Heading  Attributes
 	extract(shortcode_atts(array(	
 		//General Setting					
		'anh_style'						=> 'normal',
		'anh_align'						=> 'left',
		'anh_direction'					=> 'left',
		'anh_title'						=> '',
		'anh_titlefont'					=> 'font-size:15px;line-height:;letter-spacing:;--tablet-font-size:;--phone-font-size:;',
		'anh_titlefontstyle'			=> '',
		'anh_titlecolor'				=> '#333',
		'anh_backgroundscheme'			=> '#168ae6',
		'anh_paddinglr'					=> 25,
		'anh_paddingtb'					=> 20,
		'anh_delay'						=> 0,
	), $atts));
    
    
    $additional_font_style = ''; 	 	
 	 	
 	fix_kaswara_font_styles($anh_titlefontstyle, $additional_font_style); 	
    
 	$outPut = $titleStyle = '';
 	
 	kswr_load_the_font_front($anh_titlefontstyle);



 	$titleStyle = 'padding:'.$anh_paddingtb.'px '.$anh_paddinglr.'px; color:'.$anh_titlecolor.';'.$anh_titlefont.''.$anh_titlefontstyle; 

 	$anh_delay = $anh_delay * 1000;
 	$outPut .= '<div class="kswr-animatedheading-ctn kswr-situation-bind" data-delay="'.esc_attr($anh_delay).'" data-align="'.esc_attr($anh_align).'" data-direction="'.esc_attr($anh_direction).'" data-style="'.esc_attr($anh_style).'" data-situation="hidden">
			<div class="kswr-animatedheading-insider">
				<div class="kswr-animatedheading-titlectn kswr-animatedheading-animated" style="background:'.$anh_backgroundscheme.';">
					<div class="kswr-animatedheading-titletext kswr-animatedheading-elem kswr-animatedheading-animated kswr-shortcode-element  ' . $additional_font_style . '" style="'.$titleStyle.'" data-fontsettings="'.esc_attr($anh_titlefont).'">'.$anh_title.'</div>';

	//Check if style reveal 				
	$outPut .= ($anh_style == 'reveal') ? '<div class="kswr-animatedheading-titleoverlay" style="background:'.$anh_backgroundscheme.';"></div>' : '';
	
	$outPut .= '</div>	
			</div>
		</div>';

 	return $outPut;
 }
add_shortcode( 'kswr_animatedheading', 'kswr_animatedheading_shortC' );
?>
