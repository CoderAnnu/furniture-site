<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============     	G O O G L E     M A P S   	   ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */


class Kaswara_Google_maps{
	
	function __construct()	{
		add_action("init",array($this,"kaswara_google_maps_params"));
		add_shortcode("kswr_googlemaps",array($this,"kswr_googlemaps_shortC"));
		add_action('wp_enqueue_scripts', array($this, 'kaswara_google_map_api'),1);
		
	}

	function kaswara_google_map_api(){
		$urlApi = 'https://maps.googleapis.com/maps/api/js';
		$apiKey = kaswara_get_single_option('googlemapsapi');
		if(trim($apiKey) != "")	$urlApi .=	'?key='.$apiKey;
		wp_register_script("kswr_googleapis",$urlApi,null,null,false);
	}
	function kaswara_google_maps_params(){
		vc_map( array(
	        "name" => esc_html__( "Google Maps", "kaswara" ),
	        "description" => esc_html__("Advance Google maps element", "kaswara"),         
	        'icon' => KASWARA_IMAGES.'small/gmap.jpg',  	        
	        "category" => "Kaswara",        
	        "base" => "kswr_googlemaps",      
	        "params" => array(                   
	            //Options
	            array(
	                "type" => "kswr_number",          
	                "heading" => esc_html__( "Map Height (px)", "kaswara" ),                
	                'group' => 'Options',
	                "param_name" => "kgmaps_minheight",
	                "value" => 350
	            ),
	            array(
	                "type" => "textfield",
	                "group" => "Options",            
	                "heading" => esc_html__( "Latitude", "kaswara" ),
	                "param_name" => "kgmaps_latitude"
	            ),
	            array(
	                "type" => "textfield",
	                "group" => "Options",            
	                "heading" => esc_html__( "Longitude", "kaswara" ),
	                "param_name" => "kgmaps_longitude"
	            ),

	            array(
	               "type" => "dropdown",
	               "heading" => esc_html__( 'Map Zoom Value','kaswara'),
	                "param_name" => "kgmaps_zoom",       
	                "value" => array(
	                        "18" => "18","0" => "0",
	                        "1" => "1","2" => "2",
	                        "3" => "3","4" => "4",
	                        "5" => "5","6" => "6",
	                        "7" => "7","8" => "8",
	                        "9" => "9","10" => "10",
	                        "11" => "11","12" => "12",
	                        "13" => "13","14" => "14",
	                        "15" => "15","16" => "16",
	                        "17" => "17",
	                    ),         
	                "group" => "Options",
	            ),
	            array(
	               "type" => "dropdown",
	               "heading" => esc_html__( 'Map Style Type','kaswara'),
	                "param_name" => "kgmaps_type",       
	                "value" => array(
	                     esc_html__("Roadmap","kaswara") => "ROADMAP",
	                     esc_html__("Satellite","kaswara") => "SATELLITE",
	                     esc_html__("Hybrid","kaswara") => "HYBRID",
	                     esc_html__("Terrain","kaswara") => "TERRAIN",
	                ),         
	                "group" => "Options",
	            ),
	            array(
	                "type" => "kswr_switcher",
	                "group" => "Options", 
	                "heading" => esc_html__( "Zoom in mouse wheel scroll", "kaswara" ),
	                "param_name" => "kgmaps_zoommouse",
	                'default' => 'true',
	                'on' => array('text' => 'ON','val' => 'true' ),
	                'off'=> array('text' => 'OFF','val' => 'false') 
	            ), 
	            array(
	                "type" => "kswr_switcher",
	                "group" => "Options", 
	                "heading" => esc_html__( "Enable Street View Control", "kaswara" ),
	                "param_name" => "kgmaps_streetviewcontrol",
	                'default' => 'false',
	                'on' => array('text' => 'ON','val' => 'true' ),
	                'off'=> array('text' => 'OFF','val' => 'false') 
	            ), 
	            array(
	                "type" => "kswr_switcher",
	                "group" => "Options", 
	                "heading" => esc_html__( "Enable Map Type Control", "kaswara" ),
	                "param_name" => "kgmaps_maptypecontrol",
	                'default' => 'false',
	                'on' => array('text' => 'ON','val' => 'true' ),
	                'off'=> array('text' => 'OFF','val' => 'false') 
	            ), 
	            array(
	                "type" => "kswr_switcher",
	                "group" => "Options", 
	                "heading" => esc_html__( "Enable Pan Control", "kaswara" ),
	                "param_name" => "kgmaps_pancontrol",
	                'default' => 'false',
	                'on' => array('text' => 'ON','val' => 'true' ),
	                'off'=> array('text' => 'OFF','val' => 'false') 
	            ), 
	            array(
	                "type" => "kswr_switcher",
	                "group" => "Options", 
	                "heading" => esc_html__( "Enable Zoom Control", "kaswara" ),
	                "param_name" => "kgmaps_zoomcontrol",
	                'default' => 'false',
	                'on' => array('text' => 'ON','val' => 'true' ),
	                'off'=> array('text' => 'OFF','val' => 'false') 
	            ),             

	            //Styling
	            array(
	                "type" => "kswr_border",
	                "heading" => esc_html__( "Container Border", "kaswara" ),         
	                "group" => "Styling", 
	                'bordergradient' => 'enable',             
	                "param_name" => "kgmaps_borders"
	            ),
	            array(
	                "type" => "kswr_distance",
	                "distance" => "margin",            
	                "group" => "Styling" ,  
	                "param_name" => "kgmaps_margins",
	                "heading" => esc_html__( "Container Margins", "kaswara" ),
	                "positions" => array(
	                    esc_html__("Top","kaswara") => "top",
	                    esc_html__("Left","kaswara") => "left",
	                    esc_html__("Right","kaswara") => "right",
	                    esc_html__("Bottom","kaswara") => "bottom"
	                ),             
	            ),
	            array(
	                "type" => "kswr_distance",
	                "distance" => "padding",            
	                "group" => "Styling" ,  
	                "param_name" => "kgmaps_paddings",
	                "heading" => esc_html__( "Container Paddins", "kaswara" ),
	                "positions" => array(
	                    esc_html__("Top","kaswara") => "top",
	                    esc_html__("Left","kaswara") => "left",
	                    esc_html__("Right","kaswara") => "right",
	                    esc_html__("Bottom","kaswara") => "bottom"
	                ),             
	            ),          
	            array(
	                "type" => "kswr_switcher",
	                "group" => "Styling", 
	                "heading" => esc_html__( "Use Default Marker", "kaswara" ),
	                "param_name" => "kgmaps_defaultmarker",
	                'default' => 'true',
	                'on' => array('text' => 'ON','val' => 'true' ),
	                'off'=> array('text' => 'OFF','val' => 'false') 
	            ),
	            
	            array(
	                "type" => "attach_image",
	                'group' => 'Styling',
	                "dependency" => Array("element" => "kgmaps_defaultmarker","value" => array('false')),            
	                "heading" => esc_html__( "Upload Marker Icon", "kaswara" ),
	                "param_name" => "kgmaps_markericon"
	            ),

	            array(
	                "type" => "textarea_raw_html",
	                "heading" => esc_html__( "Map JSON style", "kaswara" ), 
	                "description" => 'Explore some unique styles <a href="https://snazzymaps.com/explore" target="_blank" >here</a>',
	                "param_name" => "kgmaps_jsonstyle",            
	                "group" => "Styling",
	            ),    
	           
	        )
	    )); 
	}
	function kswr_googlemaps_shortC($atts) {  
		//Google Maps Attributes
	 	extract(shortcode_atts(array(						
			'kgmaps_minheight'				=>	'350',
			'kgmaps_latitude'				=>	'',
			'kgmaps_longitude'				=>	'',
			'kgmaps_zoom'					=>	'18',
			'kgmaps_type'					=>	'ROADMAP',
			'kgmaps_zoommouse'				=>	'true',
			'kgmaps_borders'				=>	'{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}',
			'kgmaps_margins'				=>	'',
			'kgmaps_paddings'				=>	'',
			'kgmaps_defaultmarker'			=>	'true',
			'kgmaps_streetviewcontrol'		=> 'false',
			'kgmaps_maptypecontrol'			=> 'false',
			'kgmaps_pancontrol'				=> 'false',
			'kgmaps_zoomcontrol'			=> 'false',
			'kgmaps_markericon'			=>	'',
			'kgmaps_jsonstyle'			=>	'',
			
	 	), $atts));

	 	$outPut = $containerStyle = $marker_icon =  '';
	 	$containerStyle = 'min-height:'.$kgmaps_minheight.'px;'.$kgmaps_paddings.' '.$kgmaps_margins.' '.kswr_gradient_border_maker($kgmaps_borders,'border');
	 	$map_id = 'kswrmap_'.uniqid();
	 	$marker_id = 'kswrmapmarker_'.$map_id;
	 	if($kgmaps_defaultmarker == false || $kgmaps_defaultmarker == 'false')
	 		$marker_icon = wp_get_attachment_image_src($kgmaps_markericon,'full')[0];


		


			//jQuery("head").append(\'<script async defer data-typegmape="kaswara-googlempas"] src="https://maps.googleapis.com/maps/api/js?key='.$kswrMapKey.'&callback=initMap"></script>\');
	 	$kswrMapKey = kaswara_get_single_option('gmapkey');
	 	$mapApiURl =  "https://maps.googleapis.com/maps/api/js?sensor=false";

	 	$outPut = '<div id="'.$map_id.'" class="kswr_gmap" style="'.$containerStyle.'"></div>
		 	<script type="text/javascript">
		 	"use strict";
		 	jQuery(function($){		
				$(document).ready(function(){				
				var checkDrag = $(document).width() > 850 ? true : false;
				try{
					var gmapSettings = {
						zoom : '.$kgmaps_zoom.',
						center: new google.maps.LatLng('.$kgmaps_latitude.', '.$kgmaps_longitude.'),
						scrollwheel: '.$kgmaps_zoommouse.',
						draggable: checkDrag,
						mapTypeId: google.maps.MapTypeId.'.$kgmaps_type.',
						scaleControl: true,
						streetViewControl: '.$kgmaps_streetviewcontrol.',
						mapTypeControl: '.$kgmaps_maptypecontrol.',
						panControl: '.$kgmaps_pancontrol.',
						zoomControl: '.$kgmaps_zoomcontrol.',
					}
					var theMapContainer'.$map_id.' = new google.maps.Map(document.getElementById("'.$map_id.'"),gmapSettings);';

					if(trim($kgmaps_jsonstyle) != ''){
						$outPut .= 'var mapStyle = '.rawurldecode(base64_decode(strip_tags($kgmaps_jsonstyle))).';
									var theStyledMap = new google.maps.StyledMapType(mapStyle,{name: "Styled Map"});
									theMapContainer'.$map_id.'.mapTypes.set("map_style", theStyledMap);
									theMapContainer'.$map_id.'.setMapTypeId("map_style");';

					}

					$outPut .= 'var marker_'.$marker_id.' = new google.maps.Marker({
								position: new google.maps.LatLng('.$kgmaps_latitude.', '.$kgmaps_longitude.'),
								animation:  google.maps.Animation.DROP,
								map: theMapContainer'.$map_id.',
								icon: "'.$marker_icon.'"
							});
						google.maps.event.addListener( marker_'.$marker_id.', "click", "toggleBounce");'; 
					 

				$outPut .= '}catch(e){}
			});	
			});
		
		</script>';
	 	return $outPut;
	 }
}


new Kaswara_Google_maps;
if(class_exists('WPBakeryShortCode')){
	class WPBakeryShortCode_kaswara_google_map extends WPBakeryShortCode {
	}
}









			



?>