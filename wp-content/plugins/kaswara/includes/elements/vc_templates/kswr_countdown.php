<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============     C O U N  T      D O W N   	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_countdown_shortC($atts) {  
	//Countdonw Form 7 Attributes
 	extract(shortcode_atts(array(						
		'ctd_deadline'  			=> '',
		'ctd_digit_fsize'  			=> '',
		'ctd_digit_fstyle' 			=> '',
		'ctd_unit_fsize'  			=> '',
		'ctd_unit_fstyle'  			=> '',
		
		'ctd_digit_color'  			=> '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',//gradient
		'ctd_unit_color'  			=> '#888',
		
		'ctd_unit_bg'	  			=> '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',//gradient
		'ctd_digit_bg'  			=> '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',//gradient
		'ctd_container_bg'			=> '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',	//gradient
		'ctd_container_border'		=> '', //border gradient
		'ctd_digit_bgsize'			=> '50',
		'ctd_digit_margins'			=> '',
		'ctd_unit_margins'			=> '',
		'ctd_digit_border'			=> '',
		'ctd_digit_radius'			=> '0',
		'ctd_container_radius'		=> '0',

		'ctd_layout' 	 			=> 'style1',
		'ctd_elem_size' 			=> '40',
		'ctd_digit_paddings'			=> '',
		'ctd_unit_paddings'			=> '',
		'ctd_distance_elem' 		=> '8',
		'ctd_elements_align'		=> 'center',
		'ctd_years'		  			=> 'Years',
		'ctd_year'		  			=> 'Year',
		'ctd_months'	  			=> 'Months',
		'ctd_month'	  				=> 'Month',
		'ctd_weeks'		  			=> 'Weeks',
		'ctd_week'		  			=> 'Week',
		'ctd_days'		  			=> 'Days',
		'ctd_day'		  			=> 'Day',
		'ctd_hours'					=> 'Hours',
		'ctd_hour'					=> 'Hour',
		'ctd_minutes'				=> 'Minutes',
		'ctd_minute'				=> 'Minute',
		'ctd_seconds'	  			=> 'Seconds',
		'ctd_second'	  			=> 'Second',
		'ctd_milliseconds' 			=> 'Milliseconds',
		'ctd_millisecond'  			=> 'Millisecond',
		//The Ones That are enabled
		'ctd_year_enable'			=> 'false',
		'ctd_month_enable'			=> 'false',
		'ctd_week_enable'			=> 'false',
		'ctd_day_enable'		  	=> 'true',
		'ctd_hour_enable'			=> 'true',
		'ctd_minute_enable'			=> 'true',
		'ctd_second_enable'	  		=> 'true',
		'ctd_millisecond_enable'  	=> 'false',

 	), $atts));
 	$outPut = $outPutElements = $countDownElements = $containerStyle = $elemStyle = $digitStyle = $digitInsiderStyle= $unitStyle = '';

 	$digitInsiderStyle = kswr_gradient_color_maker('color' ,$ctd_digit_color);
 	$digitStyle = 'width:'.$ctd_digit_bgsize.'px;height:'.$ctd_digit_bgsize.'px;line-height:calc('.$ctd_digit_bgsize.'px - 4px);border-radius:'.$ctd_digit_radius.'px;'.$ctd_digit_fsize .''. $ctd_digit_fstyle .kswr_gradient_color_maker('background-color' ,$ctd_digit_bg).''.$ctd_digit_paddings.''.$ctd_digit_margins.''.kswr_gradient_border_maker($ctd_digit_border,'border');

 	$unitStyle = $ctd_unit_fsize .''. $ctd_unit_fstyle .'color:'. $ctd_unit_color .'; '.kswr_gradient_color_maker('background-color' ,$ctd_unit_bg).''.$ctd_unit_paddings.''.$ctd_unit_margins;





 	$elemStyle = 'border-radius:'.$ctd_container_radius.'px;min-width:'.$ctd_elem_size.'px;'. kswr_gradient_color_maker('background-color' ,$ctd_container_bg).''.kswr_gradient_border_maker($ctd_container_border,'border');
 	$containerStyle = '--elems-distance:'.$ctd_distance_elem.'px; text-align:'.$ctd_elements_align.';';
 	kswr_load_the_font_front($ctd_digit_fstyle);
 	kswr_load_the_font_front($ctd_unit_fstyle);

 	$additional_digit_fstyle = $additional_unit_fstyle = ''; 
 	
fix_kaswara_font_styles($ctd_digit_fstyle, $additional_digit_fstyle);
fix_kaswara_font_styles($ctd_unit_fstyle, $additional_unit_fstyle);


 	if($ctd_year_enable =='true'){
		$outPutElements .= kswr_coutdown_printer($ctd_layout , $elemStyle, 'years', $ctd_years, $ctd_year, $ctd_digit_fsize, $digitStyle, $digitInsiderStyle, $unitStyle, $ctd_unit_fsize, $additional_digit_fstyle,  $additional_unit_fstyle);		
		$countDownElements .= 'YEARS';
 	}
	if($ctd_month_enable =='true'){
		$outPutElements .= kswr_coutdown_printer($ctd_layout , $elemStyle, 'months', $ctd_months, $ctd_month, $ctd_digit_fsize, $digitStyle, $digitInsiderStyle, $unitStyle, $ctd_unit_fsize, $additional_digit_fstyle,  $additional_unit_fstyle);		
		$countDownElements .= ',MONTHS';
	}
	if($ctd_week_enable =='true'){
		$outPutElements .= kswr_coutdown_printer($ctd_layout , $elemStyle, 'weeks', $ctd_weeks, $ctd_week, $ctd_digit_fsize, $digitStyle, $digitInsiderStyle, $unitStyle, $ctd_unit_fsize, $additional_digit_fstyle,  $additional_unit_fstyle);		
		$countDownElements .= ',WEEKS';
	}
	if($ctd_day_enable =='true'){
		$outPutElements .= kswr_coutdown_printer($ctd_layout , $elemStyle, 'days', $ctd_days, $ctd_day, $ctd_digit_fsize, $digitStyle, $digitInsiderStyle, $unitStyle, $ctd_unit_fsize, $additional_digit_fstyle,  $additional_unit_fstyle);		
		$countDownElements .= ',DAYS';
	}
	if($ctd_hour_enable =='true'){
		$outPutElements .= kswr_coutdown_printer($ctd_layout , $elemStyle, 'hours', $ctd_hours, $ctd_hour, $ctd_digit_fsize, $digitStyle, $digitInsiderStyle, $unitStyle, $ctd_unit_fsize, $additional_digit_fstyle,  $additional_unit_fstyle);		
		$countDownElements .= ',HOURS';		
	}
	if($ctd_minute_enable =='true'){
		$outPutElements .= kswr_coutdown_printer($ctd_layout , $elemStyle, 'minutes', $ctd_minutes, $ctd_minute, $ctd_digit_fsize, $digitStyle, $digitInsiderStyle, $unitStyle, $ctd_unit_fsize, $additional_digit_fstyle,  $additional_unit_fstyle);
		$countDownElements .= ',MINUTES';		
	}
	if($ctd_second_enable =='true'){
		$outPutElements .= kswr_coutdown_printer($ctd_layout , $elemStyle, 'seconds', $ctd_seconds, $ctd_second, $ctd_digit_fsize, $digitStyle, $digitInsiderStyle, $unitStyle, $ctd_unit_fsize, $additional_digit_fstyle,  $additional_unit_fstyle);
		$countDownElements .= ',SECONDS';		
	}
	if($ctd_millisecond_enable =='true'){
		$outPutElements .= kswr_coutdown_printer($ctd_layout , $elemStyle, 'milliseconds', $ctd_milliseconds, $ctd_millisecond, $ctd_digit_fsize, $digitStyle, $digitInsiderStyle, $unitStyle, $ctd_unit_fsize, $additional_digit_fstyle,  $additional_unit_fstyle);
		$countDownElements .= ',MILLISECONDS';		
	}

	$date = DateTime::createFromFormat('Y-m-d h:i', $ctd_deadline);
	$ctd_deadline = $date->format('Y-m-d h:i');

 	$outPut .= '<div class="kswr-countdown-container kswr-theelement" data-countdown="'.esc_attr($countDownElements).'" data-layout="'.esc_attr($ctd_layout).'" data-align="'.esc_attr($ctd_elements_align).'" data-deadline="'.esc_attr($ctd_deadline).'" style="'.$containerStyle.'">'.$outPutElements.'</div>';
 	return $outPut;
 }
add_shortcode( 'kswr_countdown', 'kswr_countdown_shortC' );


function kswr_coutdown_printer($layout , $elemStyle, $type, $typePlural, $typeSingular, $digFSize, $digStyle, $digitInsiderStyle, $uniStyle, $uniFSzie, $add_digit_fstyle, $add_unit_fstyle ){
	$result = $dig = $uni = '';
	$result = '<div style="'.$elemStyle.'" class="kswr-countdown-elem" data-type="'.$type.'" data-plural="'.esc_attr($typePlural).'" data-singular="'.esc_attr($typeSingular).'">';
	$dig = '<div class="kswr-countdown-digit kswr-shortcode-element ' .esc_attr($add_digit_fstyle). ' " data-fontsettings="'.esc_attr($digFSize).'" style="'.$digStyle.'"><span style="'.esc_attr($digitInsiderStyle).'"></span></div>';
	$uni = '<div style="'.$uniStyle.'" class="kswr-countdown-unit kswr-shortcode-element ' .esc_attr($add_unit_fstyle). ' " data-fontsettings="'.esc_attr($uniFSzie).'"><span></span></div>';
	if($layout == 'style2')
		$result .= $uni .''. $dig;
	else
		$result .= $dig .''. $uni;

	$result .= '</div>';

	return $result;
}



?>