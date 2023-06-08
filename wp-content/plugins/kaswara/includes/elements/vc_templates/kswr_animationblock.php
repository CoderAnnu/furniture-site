<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============       Animation Block Shortcode       ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */


if(!class_exists('Kaswara_animationblock'))
{
	class Kaswara_animationblock
	{
		function __construct()
		{
			add_action('init',array($this,'kaswara_animationblock_init'));
			add_shortcode('kswr_animationblock',array($this,'kaswara_animationblock_shortcode'));			
		}
		
		function kaswara_animationblock_init(){
			if(function_exists('vc_map')){
				//VC map for bundle container
				vc_map(
					array(
						"name" => esc_html__("Animation Block","kaswara"),
						"base" => "kswr_animationblock",
				        "description" => esc_html__("Animation container maker.", "kaswara"),         						
        				'as_parent' => array('except' => 'kswr_animationblock,kmsidebyside_element_container,kmsidebyside_left,kmsidebyside_right'),
 				       'icon' => KASWARA_IMAGES.'small/animation.jpg',  
						"class" => "",
      					"category" => "Kaswara",        
						"content_element" => true,
						"show_settings_on_create" => true,						
						"js_view" => 'VcColumnView',
						"params" => array(
							array(
				                "type" => "kswr_animationchooser",
				                "heading" => esc_html__( 'Animation Type','kaswara'),
				                "param_name" => "anch_type",          
				            ), 
				            array(
				                "type" => "kswr_number",
				                "heading" => esc_html__( "Animation Duration", "kaswara" ),
				                "description" => esc_html__( "This value is in seconds", "kaswara" ),
				                "param_name" => "anch_duration",
				                "value" => 1				               
				            ),
				            array(
				                "type" => "kswr_number",
				                "heading" => esc_html__( "Animation Delay", "kaswara" ),
				                "description" => esc_html__( "This value is in seconds", "kaswara" ),
				                "param_name" => "anch_delay",
				                "value" => 0
				             ),
				            array(
				                "type" => "kswr_switcher",
				                "heading" => esc_html__( "Re-Animate", "kaswara" ),
				                "description" => esc_html__( "Re-animate the block each time is on the viewport", "kaswara" ),
				                "param_name" => "anch_reanimate",
				                'default' => 'false',
				                'on' => array('text' => 'ON','val' => 'true' ),
				                'off'=> array('text' => 'OFF','val' => 'false') 
				            ), 
				            array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Number Of interations', 'kaswara' ),
				                'param_name' => 'anch_iteration',
				                'value' => array(
				                    esc_html__( 'Once','kaswara') => 'once',
				                    esc_html__( 'Custom','kaswara') => 'custom',
				                    esc_html__( 'Infinite','kaswara') => 'infinite',
				                )               
				            ),
				             array(
				                "type" => "kswr_number",
				                "heading" => esc_html__( "How many iterations?", "kaswara" ),
				                "param_name" => "anch_iteration_number",
				                "dependency" => Array("element" => "anch_iteration","value" => array('custom')),            
				                "value" => 2				               
				             ),				
				            

						)
					)
				);

			
				
			}
		}	

		function kaswara_animationblock_shortcode($atts,$content = null){				
			extract(shortcode_atts(array(						
				'anch_type'					=> 'bounce',
				'anch_duration'				=> '1',
				'anch_delay'				=> '0',
				'anch_iteration'			=> 'once',
				'anch_iteration_number'		=> '2',	
				'anch_reanimate'			=> 'false'			
		 	), $atts));
		 	$outPut = $cntStyle = '';
		 	
		 	$cntStyle = 'animation-duration: '.$anch_duration.'s; -webkit-animation-duration: '.$anch_duration.'s; animation-delay:'.$anch_delay.'s; -webkit-animation-delay:'.$anch_delay.'s;';


  			if($anch_iteration == 'custom')
	  			$cntStyle .= 'animation-iteration-count: '.$anch_iteration_number.'; -webkit-animation-iteration-count: '.$anch_iteration_number.';';
	  		if($anch_iteration == 'infinite')
	  			$cntStyle .= 'animation-iteration-count: infinite; -webkit-animation-iteration-count:infinite;';


		 	$outPut = '<div class="kswr-animationblock" data-reanimation="'.esc_attr($anch_reanimate).'" data-animation="'.esc_attr($anch_type).'"  style="'.$cntStyle.'"><div class="blockanimecont">'.do_shortcode($content).'</div></div>';
		 

		 	return $outPut;			
		}
	}
}
if(class_exists('Kaswara_animationblock')){
	$Kaswara_animation_block = new Kaswara_animationblock;
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_kswr_animationblock extends WPBakeryShortCodesContainer {
    }
}



?>