<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============     C O N T A C T     F O R M 7  	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_cf7_shortC($atts) {  
	//Contact Form 7 Attributes
 	extract(shortcode_atts(array(						
		'cf7_id' => '',
		'cf7_style' => 'default'
 	), $atts));

 	$styleName ='default'; $styleType ='qaswara'; $styleButton ='qaswara'; 
 	$style = $outPut =''; 
 	$classRandom = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,8);
 	$customClass = 'kameleon-cf7-container'.$classRandom;

 	$kmcf7_styles = kaswara_get_single_option('kmcf7_styles'); 
 	if(is_array($kmcf7_styles)){
 		if(array_key_exists($cf7_style,$kmcf7_styles)){
 			$styleName = $kmcf7_styles[$cf7_style]['styleName']; 
 			$styleType = $kmcf7_styles[$cf7_style]['styleType']; 
 			$styleButton =$kmcf7_styles[$cf7_style]['styleButton']; 
 			$style = $kmcf7_styles[$cf7_style]['theStyle']; 
 		} 		
 	}

 	if($styleName == "default"){
 		$style = '--kmcf7-btn-fontsize: 16px;--kmcf7-btn-align: center;--kmcf7-btn-width: 50%;--kmcf7-btn-letterspacing: 1px;--kmcf7-btn-height: 45px;--kmcf7-btn-mgtop: 15px;--kmcf7-btn-mgbottom: 15px;--kmcf7-btn-border-radius: 0;--kmcf7-btn-color: #ccc;--kmcf7-btn-border-width: 0;--kmcf7-btn-bg-color: #111;--kmcf7-btn-border-color: #1a1a1a;--kmcf7-btn-color-hover: #fff;--kmcf7-btn-bg-color-hover: #269AD6;--kmcf7-btn-border-color-hover: #2492CA;--qaswara-input-height:50px;--qaswara-input-margin-top:15px;--qaswara-input-margin-bottom:15px;--qaswara-input-font-size:15px;  --qaswara-input-color: #888;    --qaswara-color: #bbb;     --qaswara-font-size:15px;--qaswara-border-width: 1px;  --qaswara-border-color:#eee;--qaswara-border-active-color:#269AD6;--qaswara-textarea-height:250px;;';
 	}

 	$outPut .= '<div class="kameleon-cf7-container '.$customClass.'" data-classname=".'.$customClass.'" data-style-name="'.esc_attr($styleName).'"  data-style="'.$styleType.'" data-button-style="'.$styleButton.'" data-style-css="'.$style.'" style="'.$style.'">'.do_shortcode( '[contact-form-7 id="'.$cf7_id.'"]' ).'</div>';
 	return $outPut;
 }
add_shortcode( 'kswr_cf7', 'kswr_cf7_shortC' );



?>