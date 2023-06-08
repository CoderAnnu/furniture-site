<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============      H   O   T   S   P   O   T 	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_hotspot_shortC($atts) {  
	//Hotspot Attributes
 	extract(shortcode_atts(array(						
		'htsp_data'						=> '',	//Contains Image with the data
		'htsp_imagealignment'			=> 'center',
		//Marker Styling
		'htsp_markerbackground'			=> '#2196f3',
		'htsp_markercolor'				=> '#fff',
		'htsp_markertype'				=> 'singlecolor',
		'htsp_markerrounded'			=> 'enabled',
		'htsp_markeranimation'			=> 'enabled',
		//Tooltip Styling
		'htsp_tooltipalignment'			=> 'left',
		'htsp_tooltipbackground'		=> '#fff',
		'htsp_tooltipanimation'			=> 'fade',
		'htsp_tooltipshowevent'			=> 'hover',
		'htsp_tooltiptriangle'			=> 'disabled',
		'htsp_tooltipboxshadow'			=> 'enabled',
		'htsp_titlefontsize'			=> 'font-size:16px;line-height:;letter-spacing:;',
		'htsp_titlefontstyle'			=> 'font-family:inherit;font-weight:700;font-style:inherit;',
		'htsp_titlecolor'				=> '#333',
		'htsp_infofontsize'				=> 'font-size:13px;line-height:;letter-spacing:;',
		'htsp_infocolor'				=> '#999',
 	), $atts));
 	$outPut = $imageid = $image = $data = $dataJson = $markerJsonData = $tooltipJsonData ='';

	if($htsp_data != ''){
		$htsp_data = stripslashes($htsp_data);
		$htsp_data = str_replace("```" , ' ' ,$htsp_data);	
	 	$htsp_data = str_replace("``" , '"' ,$htsp_data); 
	 	$htsp_data = str_replace(": `" , ':""' ,$htsp_data); 
	 	$htsp_data = str_replace('{"}' , '[]' ,$htsp_data); 
	 	$htsp_data = str_replace('"data": { ' , '"data": [' ,$htsp_data); 
	 	$htsp_data = str_replace('}","{' , '},{' ,$htsp_data); 
	 	$htsp_data = str_replace('} } }' , '} ] }' ,$htsp_data); 		
		$htsp_data = json_decode( $htsp_data, true );	 	
	 	$imageid = $htsp_data['imageid'];
		$dataJson = json_encode($htsp_data['data']);
	}
	//echo $dataJson;
	
	
	

	if(trim($imageid) != '')
    	$image = '<img src="'.wp_get_attachment_image_src($imageid,'full')[0].'"/>';
        

    $markerJsonData = 'data-marker-data="'.esc_attr('{"markerBackground":"'.$htsp_markerbackground.'", "markerColor":"'.$htsp_markercolor.'", "markerType":"'.$htsp_markertype.'"}').'"';
    $tooltipJsonData = 'data-tooltip-data="'.esc_attr('{"tooltipBackground":"'.$htsp_tooltipbackground.'", "tooltipTitleFontSize":"'.$htsp_titlefontsize.'", "tooltipTitleFontStyle":"'.$htsp_titlefontstyle.'", "tooltipTitleColor":"'.$htsp_titlecolor.'", "tooltipInfoFontSize":"'.$htsp_infofontsize.'", "tooltipInfoColor":"'.$htsp_infocolor.'", "tooltipShowEvent":"'.$htsp_tooltipshowevent.'", "tooltipAnimation":"'.$htsp_tooltipanimation.'"}').'"';
   

 	$outPut = '<div class="syn-hotspot-container" data-hotspot="'.esc_attr($dataJson).'"  data-tooltip-triangle="'.esc_attr($htsp_tooltiptriangle).'"  data-align-child="'.esc_attr($htsp_tooltipalignment).'" data-tooltip-bxs="'.esc_attr($htsp_tooltipboxshadow).'" data-marker-animation="'.esc_attr($htsp_markeranimation).'" data-rounded-children="'.esc_attr($htsp_markerrounded).'" data-align="'.esc_attr($htsp_imagealignment).'" '.$markerJsonData.' '.$tooltipJsonData.' data-marker-type="'.esc_attr($htsp_markertype).'">
 		<div class="syn-hotspot-responsive-solver"></div>
 		<div class="syn-hotspot-insider">
 			<div class="syn-hotspot-imgwrapper">'.$image.'</div>
 		</div>
 	</div>';

 	return $outPut;
 }
add_shortcode( 'kswr_hotspot', 'kswr_hotspot_shortC' );

?>