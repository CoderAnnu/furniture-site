<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============     		S P A C E R  		  	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_spacer_shortC($atts) {  
	//Spacer Attributes
 	extract(shortcode_atts(array(						
		'spc_desk_height' 			=> '0',
		'spc_tablet_height' 		=> '0',
		'spc_tablet_sm_height'		=> '0',
		'spc_phone_height' 			=> '0',
		'spc_phone_sm_height' 		=> '0',
 	), $atts));

 	$containerStyle = '--spc-desk:'.$spc_desk_height.'px;';
	if(trim($spc_tablet_height) != ''){
		$containerStyle .= '--spc-tablet:'.$spc_tablet_height.'px;';
	}
	if(trim($spc_tablet_sm_height) != ''){
		$containerStyle .= '--spc-tablet-sm:'.$spc_tablet_sm_height.'px;';
	}
	if(trim($spc_phone_height) != ''){
		$containerStyle .= '--spc-phone:'.$spc_phone_height.'px;';
	}
	if(trim($spc_phone_sm_height) != ''){
		$containerStyle .= '--spc-phone-sm:'.$spc_phone_sm_height.'px;';
	}
 	
 	$outPut = '<div class="kswr-responsive-spacer" data-desk="'.$spc_desk_height.'px" data-tablet="'.$spc_tablet_height.'px" data-tablet-sm="'.$spc_tablet_sm_height.'px" data-phone="'.$spc_phone_height.'px" data-phone-sm="'.$spc_phone_sm_height.'px" style="'.$containerStyle.'"></div>';
 	return $outPut;
 }
add_shortcode( 'kswr_spacer', 'kswr_spacer_shortC' );


?>