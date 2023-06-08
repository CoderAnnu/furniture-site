<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============       Layered Images Shortcode       ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */


if(!class_exists('Kaswara_layeredimages'))
{
	class Kaswara_layeredimages
	{
		function __construct()
		{
			add_action('init',array($this,'kaswara_layeredimages_init'));
			add_shortcode('kswr_layeredimages',array($this,'kaswara_layeredimages_shortcode'));	
			//add_shortcode('kswr_layeredimages_singleimage',array($this,'Kaswara_layeredimages_singleimage_shortcode'));		
		}
		
		function kaswara_layeredimages_init(){
			if(function_exists('vc_map')){
				//VC map Layered Image
				vc_map(
					array(
						"name" => esc_html__("Layered Images","kaswara"),
						"base" => "kswr_layeredimages",
				        "description" => esc_html__("Layered Images container.", "kaswara"),         						
        				//'as_parent' => array('only' => 'kswr_layeredimages_singleimage'),
 				        'icon' => KASWARA_IMAGES.'small/filterimages.jpg',  
						"class" => "",
      					"category" => "Kaswara",        
						//"content_element" => true,
						"show_settings_on_create" => true,						
						//"js_view" => 'VcColumnView',
						"params" => array(		
						array(
				                "type" => "textfield",
				                "heading" => esc_html__( "CSS Class", "kaswara" ),
				                "description" => esc_html__( "Add custom CSS classes", "kaswara" ),
				                "param_name" => "lrimctn_classes"
				            ),	
				            array(
								'type' => 'css_editor',							
								'heading' => esc_html__( 'CSS box', 'kaswara' ),
								'param_name' => 'lrimctn_css',
								'group' => 'Design Options'
							),		
							array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Elements Align', 'kaswara' ),
				                'param_name' => 'lrimctn_align',
				                'value' => array(
				                    esc_html__( 'Center','kaswara') => 'center',
				                    esc_html__( 'Left','kaswara') => 'left',
				                    esc_html__( 'Right','kaswara') => 'right',
				                )               
				            ),		
				            array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Enable Parallax', 'kaswara' ),				             
				                'param_name' => 'lrimctn_parallaxenabled',
				                'value' => array(
				                    esc_html__( 'No','kaswara') => 'disabled',
				                    esc_html__( 'Yes, Please','kaswara') => 'enabled',				                    
				                )               
				            ),	

				            //Single Layer Image
				             array(
								'type'				=> 'param_group',
								'heading'			=> esc_html__('Layers', 'kaswara'),
				                'group' 			=> 'Layers',
								'param_name'		=> 'lrimctn_images',							
								'params'			=> array(
									array(
						                "type" => "attach_image",
						                "heading" => esc_html__( "Choose Image", "kaswara" ),
						                "param_name" => "lrsimg_image"
						            ),
									array(
						                "type" => "dropdown",
						                "heading" => esc_html__( 'Animation Type','kaswara'),
						                "param_name" => "lrsimg_type",  
						                'value' => array(
						                    'fadeIn'=>'fadeIn','fadeInDown'=>'fadeInDown','fadeInDownBig'=>'fadeInDownBig','fadeInLeft'=>'fadeInLeft','fadeInLeftBig'=>'fadeInLeftBig','fadeInRight'=>'fadeInRight','fadeInRightBig'=>'fadeInRightBig','fadeInUp'=>'fadeInUp','fadeInUpBig'=>'fadeInUpBig','bounce'=>'bounce','flash'=>'flash','pulse'=>'pulse','rubberBand'=>'rubberBand','shake'=>'shake','swing'=>'swing','tada'=>'tada','wobble'=>'wobble','jello'=>'jello','slideInUp'=>'slideInUp','slideInDown'=>'slideInDown','slideInLeft'=>'slideInLeft','slideInRight'=>'slideInRight','zoomIn'=>'zoomIn','zoomInDown'=>'zoomInDown','zoomInLeft'=>'zoomInLeft','zoomInRight'=>'zoomInRight','zoomInUp'=>'zoomInUp','bounceIn'=>'bounceIn','bounceInDown'=>'bounceInDown','bounceInLeft'=>'bounceInLeft','bounceInRight'=>'bounceInRight','bounceInUp'=>'bounceInUp','rotateIn'=>'rotateIn','rotateInDownLeft'=>'rotateInDownLeft','rotateInDownRight'=>'rotateInDownRight','rotateInUpLeft'=>'rotateInUpLeft','rotateInUpRight'=>'rotateInUpRight','flip'=>'flip','flipInX'=>'flipInX','flipInY'=>'flipInY','flipOutX'=>'flipOutX','flipOutY'=>'flipOutY','hinge'=>'hinge','rollIn'=>'rollIn','rollOut'=>'rollOut',				                   
						                )         
						            ), 
						            array(
						                "type" => "kswr_number",
						                "heading" => esc_html__( "Animation Duration", "kaswara" ),
						                "description" => esc_html__( "This value is in seconds", "kaswara" ),
						                "param_name" => "lrsimg_duration",
						                "value" => 1				               
						            ),
						            array(
						                "type" => "kswr_number",
						                "heading" => esc_html__( "Animation Delay", "kaswara" ),
						                "description" => esc_html__( "This value is in seconds", "kaswara" ),
						                "param_name" => "lrsimg_delay",
						                "value" => 0
						             ),
						            array(
						                "type" => "kswr_switcher",
						                "heading" => esc_html__( "Re-Animate", "kaswara" ),
						                "description" => esc_html__( "Re-animate the block each time is on the viewport", "kaswara" ),
						                "param_name" => "lrsimg_reanimate",
						                'default' => 'false',
						                'on' => array('text' => 'ON','val' => 'true' ),
						                'off'=> array('text' => 'OFF','val' => 'false') 
						            ), 
						            array(
						                'type' => 'dropdown',
						                'heading' => esc_html__( 'Number Of interations', 'kaswara' ),
						                'param_name' => 'lrsimg_iteration',
						                'value' => array(
						                    esc_html__( 'Once','kaswara') => 'once',
						                    esc_html__( 'Custom','kaswara') => 'custom',
						                    esc_html__( 'Infinite','kaswara') => 'infinite',
						                )               
						            ),
						             array(
						                "type" => "kswr_number",
						                "heading" => esc_html__( "How many iterations?", "kaswara" ),
						                "param_name" => "lrsimg_iteration_number",
						                "dependency" => Array("element" => "lrsimg_iteration","value" => array('custom')),            
						                "value" => 2				               
						             ),	
						             array(
						                'type' => 'dropdown',
						                'heading' => esc_html__( 'Enable Parallax', 'kaswara' ),
						                'description' => esc_html__( 'Only if you enable the parallax in parent too.', 'kaswara' ),
						                'param_name' => 'lrsimg_parallaxenabled',
						                'value' => array(
						                    esc_html__( 'No','kaswara') => 'disabled',
						                    esc_html__( 'Yes, Please','kaswara') => 'enabled',				                    
						                )               
						            ),
						            array(
						                "type" => "kswr_number",
						                "heading" => esc_html__( "Parallax Sensitive Value", "kaswara" ),
						                "param_name" => "lrsimg_parallaxsensitive",
						                "dependency" => Array("element" => "lrsimg_parallaxenabled","value" => array('enabled')),            
						                "value" => 1,
						                "min"	=> 0,				               
						                "max"	=> 5,				               
						             ),	
								)
							)
							
						)
					)
				);

				//VC map LayeredImages Section
				/*vc_map(
					array(
						"name" => esc_html__("Single Layer Image","kaswara"),
						"base" => "kswr_layeredimages_singleimage",
				        "description" => esc_html__("Single image for the layered images container.", "kaswara"),         						        				
						'as_child' => array('only' => 'kswr_layeredimages'),
 				       'icon' => KASWARA_IMAGES.'small/hoverimage.jpg',  
						"class" => "",
      					"category" => "Kaswara",        											
						"params" => array(
							

						)
					)
				);*/

			
				
			}
		}	

		function kaswara_layeredimages_shortcode($atts,$content = null){				
			extract(shortcode_atts(array(		
				'lrimctn_classes'	=> '',
				'lrimctn_css'		=> '',		
				'lrimctn_parallaxenabled'	=>	'disabled',
				'lrimctn_align'		=> 'center',
				'lrimctn_images'	=>	'',		
		 	), $atts));
		 	
		 	$outPut = $outPutLayers = '';
		 	$containerCustomClass = ($lrimctn_parallaxenabled =='enabled') ? 'syn-parallaxf-container' :'';
		 	$classes_c = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $lrimctn_classes . vc_shortcode_custom_css_class( $lrimctn_css, ' ' ), $atts );

		 	//OUtPut Layers
		 	$lrimctn_images = (array) vc_param_group_parse_atts($lrimctn_images);
			foreach ($lrimctn_images as $singlelayer) {
		 		$lrsimg_image_src = wp_get_attachment_image_src($singlelayer['lrsimg_image'],'full');				
				$customClasses = ($singlelayer['lrsimg_parallaxenabled'] == 'enabled') ? 'syn-parallaxf-item' : ''; 
				$outPut = $cntStyle = '';
				$cntStyle = 'animation-duration: '.$singlelayer['lrsimg_duration'].'s; -webkit-animation-duration: '.$singlelayer['lrsimg_duration'].'s; animation-delay:'.$singlelayer['lrsimg_delay'].'s; -webkit-animation-delay:'.$singlelayer['lrsimg_delay'].'s;';
  				if($singlelayer['lrsimg_iteration'] == 'custom')
	  				$cntStyle .= 'animation-iteration-count: '.$singlelayer['lrsimg_iteration_number'].'; -webkit-animation-iteration-count: '.$singlelayer['lrsimg_iteration_number'].';';
	  			if($singlelayer['lrsimg_iteration'] == 'infinite')
	  				$cntStyle .= 'animation-iteration-count: infinite; -webkit-animation-iteration-count:infinite;';
				$outPutLayers .= '<div class="kswr-layeredimages-single kswr-animationblock"  data-reanimation="'.esc_attr($singlelayer['lrsimg_reanimate']).'" data-animation="'.esc_attr($singlelayer['lrsimg_type']).'"  style="'.$cntStyle.'"><div class="blockanimecont '.$customClasses.'" data-parallax-sensitive="'.esc_attr($singlelayer['lrsimg_parallaxsensitive']).'" data-parallax-move="'.esc_attr($singlelayer['lrsimg_parallaxenabled']).'"><img src="'.$lrsimg_image_src[0].'" alt="blockanimecont"></div></div>';
		 	
		 	}




		 	$outPut = '<div data-align="'.esc_attr($lrimctn_align).'" class="kswr-layeredimages-container '.$containerCustomClass.' '.esc_attr($classes_c).'">'.$outPutLayers.'</div>';
		 	return $outPut;			
		}

		/*function Kaswara_layeredimages_singleimage_shortcode($atts,$content = null){
				extract(shortcode_atts(array(	
					'lrsimg_parallaxenabled'	=> 'disabled',
					'lrsimg_parallaxsensitive'	=>	'1'
					'lrsimg_image'				=> '',
					'lrsimg_type'				=> 'fadeIn',
					'lrsimg_duration'			=> '1',
					'lrsimg_delay'				=> '0',
					'lrsimg_reanimate'			=> 'once',
					'lrsimg_iteration'			=> '2',
					'lrsimg_iteration_number'	=> 'false'										
				), $atts));
				$lrsimg_image_src = wp_get_attachment_image_src($lrsimg_image,'full');				
				$customClasses = ($lrsimg_parallaxenabled == 'enabled') ? 'syn-parallaxf-item' : ''; 
				$outPut = $cntStyle = '';
				$cntStyle = 'animation-duration: '.$lrsimg_duration.'s; -webkit-animation-duration: '.$lrsimg_duration.'s; animation-delay:'.$lrsimg_delay.'s; -webkit-animation-delay:'.$lrsimg_delay.'s;';
  				if($lrsimg_iteration == 'custom')
	  				$cntStyle .= 'animation-iteration-count: '.$lrsimg_iteration_number.'; -webkit-animation-iteration-count: '.$lrsimg_iteration_number.';';
	  			if($lrsimg_iteration == 'infinite')
	  				$cntStyle .= 'animation-iteration-count: infinite; -webkit-animation-iteration-count:infinite;';

				$outPut = '<div class="kswr-layeredimages-single kswr-animationblock '.$customClasses.'" data-parallax-sensitive="'.esc_attr($lrsimg_parallaxsensitive).'" data-parallax-move="'.esc_attr($lrsimg_parallaxenabled).'" data-reanimation="'.esc_attr($lrsimg_reanimate).'" data-animation="'.esc_attr($lrsimg_type).'"  style="'.$cntStyle.'"><div class="blockanimecont"><img src="'.$lrsimg_image_src[0].'"></div></div>';
				return $outPut;
			}
		*/
	}
}
if(class_exists('Kaswara_layeredimages')){
	$Kaswara_animation_block = new Kaswara_layeredimages;
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_kswr_layeredimages extends WPBakeryShortCode {}    
}



?>