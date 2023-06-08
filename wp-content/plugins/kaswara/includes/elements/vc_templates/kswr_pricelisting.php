<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============      P R I C E    L I S T I N G  	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_pricelisting_shortC($atts) {  
	//Price Listing Attributes
 	extract(shortcode_atts(array(			
 		'prcli_image'					=> '',	
 		'prcli_imageheight'				=> 80,	
 		'prcli_imagewidth'				=> 80,	
		'prcli_title' 					=> '',
		'prcli_topfontsize' 			=> '',
		'prcli_topfontstyle' 			=> '',
		'prcli_titlecolor' 				=> '#333',
		'prcli_price' 					=> '',
		'prcli_pricecolor' 				=> '#333',
		'prcli_info'					=> '',
		'prcli_infofont' 				=> '',
		'prcli_infocolor' 				=> '#aaa',
		'prcli_sepcolor'				=> '#ccc',
		'prcli_link' 					=> '',
 	), $atts));
 	$outPut = $titleStyle = $infoStyle = '';
 	kswr_load_the_font_front($prcli_topfontstyle);

$additional_topfontstyle = ''; 

fix_kaswara_font_styles($prcli_topfontstyle, $additional_topfontstyle);

 	
 	$titleStyle = 'color:'.$prcli_titlecolor.';'.$prcli_topfontsize .' '. $prcli_topfontstyle;
 	$infoStyle = 'color:'.$prcli_infocolor.';'.$prcli_infofont;

 	$title = $prcli_title;
 	$href = vc_build_link($prcli_link);
 	if(trim($href['url']) != '')
 		$title = '<a href="'.esc_url($href['url']).'" target="'.esc_attr($href['target']).'" >'.$prcli_title.'</a>';
 	
 	$contentStyle = '';
 	$imageSection = $containerHeight = '';
 	if(trim($prcli_image) != ''){
 		$imageSrc = wp_get_attachment_image_src($prcli_image,'full');
 		$imageSection = '<div class="kswr-pricing-img"><img src="'.esc_url($imageSrc[0]).'" alt="'.$title.'" style="width:'.$prcli_imagewidth.'px;height:'.$prcli_imageheight.'px;"/></div>';
 		$containerHeight = 'height:'.$prcli_imageheight.'px;';
 		$contentStyle = 'style="width:calc(100% - '.intval($prcli_imagewidth + 20).'px); float:left;"';
 	}

 	$outPut = '<div class="kswr-pricing-list kswr-full-section" data-align="left"  style="'.$containerHeight.'">
				'.$imageSection.'			
				<div class="kswr-pricing-content" '.$contentStyle.'>
					<div class="kswr-pricing-top kswr-shortcode-element ' .$additional_topfontstyle. '" data-fontsettings="'.esc_attr($prcli_topfontsize).'" style="'.$titleStyle.'">
						<div class="kswr-pricing-title">'.$title.'</div>
						<div class="kswr-pricing-line kswr-bxsizing" style="border-color:'.$prcli_sepcolor.';"></div>
						<div class="kswr-pricing-price" style="color:'.$prcli_pricecolor.';">'.$prcli_price.'</div>
					</div>
					<div class="kswr-pricing-bottom kswr-shortcode-element" data-fontsettings="'.esc_attr($prcli_infofont).'" style="'.$infoStyle.'">
						<span class="kswr-pricing-info">'.$prcli_info.'</span>
					</div>
				</div>
			</div>';

 	return $outPut;
 }
add_shortcode( 'kswr_pricelisting', 'kswr_pricelisting_shortC' );


?>