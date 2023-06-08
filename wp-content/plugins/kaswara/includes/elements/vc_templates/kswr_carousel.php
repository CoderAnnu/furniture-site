<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============      Carousel Slider Shortcode       ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */


if(!class_exists('kaswara_carouselslider'))
{
	class kaswara_carouselslider
	{
		function __construct()
		{
			add_action('init',array($this,'kaswara_carouselslider_init'));
			add_shortcode('kswr_carouselslider',array($this,'kaswara_carouselslider_shortcode'));			
		}
		
		function kaswara_carouselslider_init(){
			if(function_exists('vc_map')){
				//VC map for bundle container
				vc_map(
					array(
						"name" => esc_html__("Carousel Slider","kaswara"),
 				       'icon' => KASWARA_IMAGES.'small/carousel.jpg',  
						"base" => "kswr_carouselslider",
				        "description" => esc_html__("Advanced Carousel slider for any element.", "kaswara"),         						
        				'as_parent' => array('except' => 'kswr_carouselslider,kmsidebyside_element_container,kmsidebyside_left,kmsidebyside_right'),
						"class" => "",
      					"category" => "Kaswara",        
						"content_element" => true,
						"show_settings_on_create" => true,						
						"js_view" => 'VcColumnView',
						"params" => array(
				            //General
							array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Carousel Type', 'kaswara' ),
				                'param_name' => 'crsl_type',
				                'value' => array(
				                    esc_html__( 'Horizontal','kaswara') => 'horizontal',
				                    esc_html__( 'Vertical','kaswara') => 'vertical',
				                )               
				            ),
							array(
				                "type" => "kswr_number",
				                "heading" => esc_html__( "Animation Speed", "kaswara" ),
				                "param_name" => "crsl_speed",				                
				                "value" => 300				               
				             ),	
							array(
				                "type" => "kswr_number",
				                "heading" => esc_html__( "Autoplay Speed", "kaswara" ),
				                "param_name" => "crsl_autoplayspeed",				                
				                "value" => 5000        
				            ),	
							array(
					            "type" => "kswr_switcher",					          
					            "heading" => esc_html__( "Infinite Loop", "kaswara" ),
					            "param_name" => "crsl_infinite",
					            'default' => 'true',
					            'on' => array('text' => 'ON','val' => 'true' ),
					            'off'=> array('text' => 'OFF','val' => 'false') 
					        ),
							array(
					            "type" => "kswr_switcher",					          
					            "heading" => esc_html__( "Autoplay Slider", "kaswara" ),
					            "param_name" => "crsl_autoplay",
					            'default' => 'true',
					            'on' => array('text' => 'ON','val' => 'true' ),
					            'off'=> array('text' => 'OFF','val' => 'false') 
					        ),
					        array(
					            "type" => "kswr_switcher",					          
					            "heading" => esc_html__( "Adaptative Height", "kaswara" ),
					            "param_name" => "crsl_adaptiveheight",
					            'default' => 'true',
					            'on' => array('text' => 'ON','val' => 'true' ),
					            'off'=> array('text' => 'OFF','val' => 'false') 
					        ),
					        array(
					            "type" => "kswr_switcher",					          
					            "heading" => esc_html__( "Center Mode", "kaswara" ),
					            "param_name" => "crsl_centermode",
					            'default' => 'false',
					            'on' => array('text' => 'ON','val' => 'true' ),
					            'off'=> array('text' => 'OFF','val' => 'false') 
					        ),
					        array(
				                "type" => "kswr_number",
				                "dependency" => Array("element" => "crsl_centermode","value" => array('true')),            
				                "heading" => esc_html__( "Center Mode Padding", "kaswara" ),
				                "param_name" => "crsl_centerpadding",				                
				                "value" => 50        
				            ),	
				            array(
				                "type" => "kswr_number",
				                "dependency" => Array("element" => "crsl_centermode","value" => array('true')),            
				                "heading" => esc_html__( "Center Mode Padding Tablet", "kaswara" ),
				                "param_name" => "crsl_centerpadding_tablet",				                
				                "value" => 25        
				            ),	
				            array(
				                "type" => "kswr_number",
				                "dependency" => Array("element" => "crsl_centermode","value" => array('true')),            
				                "heading" => esc_html__( "Center Mode Padding Mobile", "kaswara" ),
				                "param_name" => "crsl_centerpadding_mobile",				                
				                "value" => 15        
				            ),	
				            
				             array(
				                "type" => "kswr_distance",
				                "distance" => "margin",            
				                "param_name" => "crsl_container_margin",
				                "heading" => esc_html__( "Container Margins", "kaswara" ),
				                "positions" => array(
				                    esc_html__("Top","kaswara") => "top",
				                    esc_html__("Bottom","kaswara") => "bottom"
				                ),				        
				            ),
				            //Slides
					        array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Slides To Scroll ', 'kaswara' ),
				                'param_name' => 'crsl_slidestoscroll_type',
				                'group' => 'Slides',
				                'value' => array(
				                    esc_html__( 'One By One','kaswara') => 'onebyone',
				                    esc_html__( 'Whole Section','kaswara') => 'section',
				                )               
				            ),
				             
				            array(
				                "type" => "kswr_number",				              
				                'group' => 'Slides',
				                "heading" => esc_html__( "Desktop Slides To Show", "kaswara" ),
				                "param_name" => "crsl_desk_slidestoshow",				                
				                "value" => 4        
				            ),
				            array(
				                "type" => "kswr_number",				              
				                'group' => 'Slides',
				                "heading" => esc_html__( "Tablet Slides To Show", "kaswara" ),
				                "param_name" => "crsl_tablet_slidestoshow",				                
				                "value" => 2       
				            ),
				            array(
				                "type" => "kswr_number",				              
				                'group' => 'Slides',
				                "heading" => esc_html__( "Phone Slides To Show", "kaswara" ),
				                "param_name" => "crsl_mobile_slidestoshow",				                
				                "value" => 1        
				            ),
				            array(
				                "type" => "kswr_number",				              
				                'group' => 'Slides',
				                "heading" => esc_html__( "Margin Between Each Slide ", "kaswara" ),
				                "param_name" => "crsl_slides_margin",				                
				                "value" => 10        
				            ),
				            //Navigations
				             array(
					            "type" => "kswr_switcher",					          
				                'group' => 'Navigation',
					            "heading" => esc_html__( "Enable Dot Navigation", "kaswara" ),
					            "param_name" => "crsl_dots_enable",
					            'default' => 'true',
					            'on' => array('text' => 'ON','val' => 'true' ),
					            'off'=> array('text' => 'OFF','val' => 'false') 
					        ),
				            array(
				                'type' => 'dropdown',
            					"dependency" => Array("element" => "crsl_dots_enable","value" => array("true")),        
				                'group' => 'Navigation',
				                'heading' => esc_html__( 'Dots Alignement', 'kaswara' ),
				                'param_name' => 'crsl_dots_align',
				                'value' => array(
				                    esc_html__( 'Center','kaswara') => 'center',
				                    esc_html__( 'Left','kaswara') => 'left',
				                    esc_html__( 'Right','kaswara') => 'right',
				                )               
				            ),
				            array(
				                'type' => 'dropdown',
				                'group' => 'Navigation',
            					"dependency" => Array("element" => "crsl_dots_enable","value" => array("true")),        
				                'heading' => esc_html__( 'Dots Style', 'kaswara' ),
				                'param_name' => 'crsl_dots_style',
				                'value' => array(
				                    esc_html__( 'Style 1','kaswara') => 'style1',
				                    esc_html__( 'Style 2','kaswara') => 'style2',
				                    esc_html__( 'Style 3','kaswara') => 'style3',
				                    esc_html__( 'Style 4','kaswara') => 'style4',
				                    esc_html__( 'Style 5','kaswara') => 'style5',
				                    esc_html__( 'Style 6','kaswara') => 'style6',
				                    esc_html__( 'Style 7','kaswara') => 'style7',
				                    esc_html__( 'Style 8','kaswara') => 'style8',
				                    esc_html__( 'Style 9','kaswara') => 'style9',
				                )               
				            ),
				            array(
					            "type" => "colorpicker",          
            					"dependency" => Array("element" => "crsl_dots_enable","value" => array("true")),        
					            "heading" => esc_html__( "Dots Color", "kaswara" ),
					            "param_name" => "crsl_dots_clr",
					            "value" => "#999",
					            "group" => "Navigation"       
					        ),
					        array(
					            "type" => "colorpicker",          
					            "heading" => esc_html__( "Dots Color Scheme", "kaswara" ),
            					"dependency" => Array("element" => "crsl_dots_enable","value" => array("true")),        
					            "param_name" => "crsl_dots_clr_ac",
					            "value" => "#00aef0",
					            "group" => "Navigation"       
					        ),        
					        array(
				                "type" => "kswr_number",				              
				                'group' => 'Navigation',
            					"dependency" => Array("element" => "crsl_dots_enable","value" => array("true")),        
				                "heading" => esc_html__( "Dots Size", "kaswara" ),
				                "param_name" => "crsl_dots_size",				                
				                "value" => 22     
				            ), 
					        array(
				                "type" => "kswr_number",				              
				                'group' => 'Navigation',
            					"dependency" => Array("element" => "crsl_dots_enable","value" => array("true")),        
				                "heading" => esc_html__( "Margin Between Dots", "kaswara" ),
				                "param_name" => "crsl_dots_margins",				                
				                "value" => 10     
				            ),    
				            array(
				                "type" => "kswr_number",				              
				                'group' => 'Navigation',
            					"dependency" => Array("element" => "crsl_dots_enable","value" => array("true")),        
				                "heading" => esc_html__( "Dots Area Margin TOp", "kaswara" ),
				                "param_name" => "crsl_dots_margin_top",				                
				                "value" => 15     
				            ),    		
					        	
				            //Arrows Navigation
				             array(
					            "type" => "kswr_switcher",					          
				                'group' => 'Navigation',
					            "heading" => esc_html__( "Enable Arrows Navigation", "kaswara" ),
					            "param_name" => "crsl_arrows_enable",
					            'default' => 'false',
					            'on' => array('text' => 'ON','val' => 'true' ),
					            'off'=> array('text' => 'OFF','val' => 'false') 
					        ),
				             array(
				                'type' => 'dropdown',
				                'group' => 'Navigation',
            					"dependency" => Array("element" => "crsl_arrows_enable","value" => array("true")),        
				                'heading' => esc_html__( 'Arrows Style', 'kaswara' ),
				                'param_name' => 'crsl_arrows_style',
				                'value' => array(
				                    esc_html__( 'Style 1','kaswara') => 'style1',
				                    esc_html__( 'Style 2','kaswara') => 'style2',
				                    esc_html__( 'Style 3','kaswara') => 'style3',
				                    esc_html__( 'Style 4','kaswara') => 'style4',
				                    esc_html__( 'Style 5','kaswara') => 'style5',
				                    esc_html__( 'Style 6','kaswara') => 'style6',
				                )               
				            ),
				             array(
				                "type" => "kswr_number",				              
				                'group' => 'Navigation',
            					"dependency" => Array("element" => "crsl_arrows_enable","value" => array("true")),        
				                "heading" => esc_html__( "Arrows Size", "kaswara" ),
				                "param_name" => "crsl_arrows_size",				                
				                "value" => 15     
				            ),
				             array(
				                "type" => "kswr_number",				              
				                'group' => 'Navigation',
            					"dependency" => Array("element" => "crsl_arrows_enable","value" => array("true")),        
				                "heading" => esc_html__( "Arrows Background Size", "kaswara" ),
				                "param_name" => "crsl_arrows_bgsize",				                
				                "value" => 35     
				            ),
				            array(
					            "type" => "colorpicker",          
            					"dependency" => Array("element" => "crsl_arrows_enable","value" => array("true")),        
					            "heading" => esc_html__( "Arrow Color", "kaswara" ),
					            "param_name" => "crsl_arrows_clr",
					            "value" => "#fff",
					            "group" => "Navigation"       
					        ),
					        array(
					            "type" => "colorpicker",          
            					"dependency" => Array("element" => "crsl_arrows_enable","value" => array("true")),        
					            "heading" => esc_html__( "Arrow Background Color", "kaswara" ),
					            "param_name" => "crsl_arrows_bgclr",
					            "value" => "#222",
					            "group" => "Navigation"       
					        ),
					        array(
					            "type" => "kswr_number",
					            "value" => 0,					          
					            "max" => 500,            		
					            "dependency" => Array("element" => "crsl_arrows_enable","value" => array("true")),        
					            "heading" => esc_html__( "Border Radius", "kaswara" ),
					            "param_name" => "crsl_arrows_br_radius",
					            "group" => "Navigation"       
					        ),

							array(
				                'type' => 'dropdown',
				                'group' => 'Navigation',
            					"dependency" => Array("element" => "crsl_arrows_enable","value" => array("true")),        
				                'heading' => esc_html__( 'Arrows Position', 'kaswara' ),
				                'param_name' => 'crsl_arrows_position',
				                'value' => array(
				                    esc_html__( 'Middle','kaswara') => 'middle',				                	
				                    esc_html__( 'Middle 2','kaswara') => 'middletwo',				                	
				                    esc_html__( 'Bottom Center','kaswara') => 'bottom_center',
				                    esc_html__( 'Bottom Left','kaswara') => 'bottom_left',
				                    esc_html__( 'Bottom Right','kaswara') => 'bottom_right',
				                    esc_html__( 'Top Center','kaswara') => 'top_center',
				                    esc_html__( 'Top Left','kaswara') => 'top_left',
				                    esc_html__( 'Top Right','kaswara') => 'top_right',
				                )               
				            ),
				            array(
				                "type" => "kswr_number",				              
				                'group' => 'Responsive',
				                "heading" => esc_html__( "Tablet Breakpoint", "kaswara" ),
				                "param_name" => "crsl_tablet_breakpoint",				                
				                "value" => 995        
				            ),
				            array(
				                "type" => "kswr_number",				              
				                'group' => 'Responsive',
				                "heading" => esc_html__( "Phone Breakpoint", "kaswara" ),
				                "param_name" => "crsl_phone_breakpoint",				                
				                "value" => 550        
				            ),
							
						)
					)
				);

			
				
			}
		}	

		function kaswara_carouselslider_shortcode($atts,$content = null){				
			extract(shortcode_atts(array(						
				'crsl_type'					=> 'horizontal',
				'crsl_speed' 				=> '300',
				'crsl_infinite'				=> 'true',
				'crsl_autoplay'				=> 'true',
				'crsl_autoplayspeed'		=> '5000',
				'crsl_adaptiveheight'		=> 'true',
				'crsl_centermode'			=> 'false',
				'crsl_centerpadding'		=> '50',
				'crsl_centerpadding_tablet'	=> '25',
				'crsl_centerpadding_mobile' => '15',
				//Slides TO Show
				'crsl_slidestoscroll_type'	=> 'onebyone',
				'crsl_slides_margin'		=> '25',
				'crsl_desk_slidestoshow'	=> '4',
				'crsl_tablet_slidestoshow'	=> '2',
				'crsl_mobile_slidestoshow'	=> '1',

				//Navigation Types
				'crsl_dots_enable'			=> 'true',
				'crsl_dots_align'			=> 'center',
				'crsl_dots_style'			=> 'style1',
				'crsl_dots_clr'				=> '#999',
				'crsl_dots_clr_ac'			=> '#00aef0',
				'crsl_dots_size'			=> '22',
				'crsl_dots_margins'			=> '10',
				'crsl_dots_margin_top'		=> '15',

				'crsl_arrows_enable'		=> 'false',
				'crsl_arrows_style' 		=> 'style1',
				'crsl_arrows_size'			=> '15',
				'crsl_arrows_bgsize'		=> '35',
				'crsl_arrows_clr'			=> '#fff',
				'crsl_arrows_bgclr'			=> '#222',
				'crsl_arrows_br_radius'		=> '0',
				'crsl_arrows_position'		=> 'middle',
				
				'crsl_container_margin' 	=>'',
				'crsl_tablet_breakpoint'	=>'995',	
				'crsl_phone_breakpoint'		=>'550',	


		 	), $atts));
			$outPut = $containerData = $containerStyle = '';
			
			$containerData = ' data-speed="'.esc_attr($crsl_speed).'" data-infinite="'.esc_attr($crsl_infinite).'" data-autoplay="'.esc_attr($crsl_autoplay).'" data-autoplayspeed="'.esc_attr($crsl_autoplayspeed).'" data-adaptiveheight="'.esc_attr($crsl_adaptiveheight).'" data-centermode="'.esc_attr($crsl_centermode).'" data-centerpadding="'.esc_attr($crsl_centerpadding).'px" data-centerpaddingtablet="'.esc_attr($crsl_centerpadding_tablet).'px" data-centerpaddingmobile="'.esc_attr($crsl_centerpadding_mobile).'px" data-slidestoshow-desk="'.esc_attr($crsl_desk_slidestoshow).'" data-slidestoshow-tablet="'.esc_attr($crsl_tablet_slidestoshow).'" data-slidestoshow-mobile="'.esc_attr($crsl_mobile_slidestoshow).'" data-dots="'.esc_attr($crsl_dots_enable).'" data-arrows="'.esc_attr($crsl_arrows_enable).'" data-tabletbreakpoint="'.esc_attr($crsl_tablet_breakpoint).'" data-phonebreakpoint="'.esc_attr($crsl_phone_breakpoint).'" ';

			$containerData .= 'data-dots-align="'.esc_attr($crsl_dots_align).'" data-dots-style="'.esc_attr($crsl_dots_style).'" data-arrows-style="'.esc_attr($crsl_arrows_style).'" data-arrows-position="'.esc_attr($crsl_arrows_position).'" ';
			
			if($crsl_type == 'vertical')
				$containerData .= 'data-vertical="true"';
			else
				$containerData .= 'data-vertical="false"';

			
			$containerStyle = $crsl_container_margin.' '. '--dots-size:'.esc_attr($crsl_dots_size).'px; --dots-area-margintop:'.esc_attr($crsl_dots_margin_top).'px; --dots-margins:'.esc_attr($crsl_dots_margins).'px; --dots-clr:'.esc_attr($crsl_dots_clr).'; --dots-active-clr:'.esc_attr($crsl_dots_clr_ac).'; --arrow-size:'.esc_attr($crsl_arrows_size).'px; --arrow-bgsize:'.esc_attr($crsl_arrows_bgsize).'px; --arrow-clr:'.esc_attr($crsl_arrows_clr).'; --arrow-back-clr:'.esc_attr($crsl_arrows_bgclr).'; --arrow-radius:'.esc_attr($crsl_arrows_br_radius).'px; --slides-margin:'.esc_attr($crsl_slides_margin).'px;';
		

			if(trim($crsl_slidestoscroll_type) == 'section')
				$containerData .= ' data-slidestoscroll-desk="'.esc_attr($crsl_desk_slidestoshow).'" data-slidestoscroll-tablet="'.esc_attr($crsl_tablet_slidestoshow).'" data-slidestoscroll-mobile="'.esc_attr($crsl_mobile_slidestoshow).'" ';
			if(trim($crsl_slidestoscroll_type) == 'onebyone')
				$containerData .= ' data-slidestoscroll-desk="1" data-slidesToScroll-tablet="1" data-slidestoscroll-mobile="1" ';

		 	$outPut = '<div class="kswr-slickslider-container" style="'.$containerStyle.'" '.$containerData.'>'.do_shortcode($content).'</div>';

		 	return $outPut;			
		}
	}
}
if(class_exists('kaswara_carouselslider')){
	$kaswara_animation_block = new kaswara_carouselslider;
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_kswr_carouselslider extends WPBakeryShortCodesContainer {
    }
}



?>