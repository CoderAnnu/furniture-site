<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============       ICON   INFO   BOX   LIST       ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */


if(!class_exists('Kaswara_cardslider'))
{
	class Kaswara_cardslider
	{
		function __construct()
		{
			add_action('init',array($this,'kaswara_cardslider_init'));
			add_shortcode('kswr_cardslider',array($this,'kaswara_cardslider_shortcode'));		
			add_shortcode('kswr_cardslide_item',array($this,'kaswara_cardslide_item_shortcode'));		
		}
		
		function kaswara_cardslider_init(){
			if(function_exists('vc_map')){
				//VC map for bundle container
				vc_map(
					array(
						"name" => esc_html__("Image Card Slider","kaswara"),
						"base" => "kswr_cardslider",
						"class" => "",
 				       'icon' => KASWARA_IMAGES.'small/cards.jpg',  
      					"category" => "Kaswara",        
						"description" => esc_html__("Cool images slider with card effects.","kaswara"),
						"as_parent" => array('only' => 'kswr_cardslide_item'), 
						"content_element" => true,
						"show_settings_on_create" => true,						
						"js_view" => 'VcColumnView',
						"params" => array(
							array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Card Slider Layout ', 'kaswara' ),
				                'admin_label' => true,
				                'param_name' => 'imcgal_layout',
				                'value' => array(
				                    esc_html__( 'Top','kaswara') => 'top',
				                    esc_html__( 'Left','kaswara') => 'left',
				                    esc_html__( 'Right','kaswara') => 'right',
				                    esc_html__( 'Bottom','kaswara') =>'bottom',
				                )               
				            ),
				             array(
				                "type" => "kswr_distance",
				                "distance" => "margin",            
				                "param_name" => "imcgal_margin",
				                "heading" => esc_html__( "Icon Margins", "kaswara" ),
				                "positions" => array(
				                    esc_html__("Top","kaswara") => "top",                                    
				                    esc_html__("Bottom","kaswara") => "bottom"
				                ),				             
				            ),
				            array(
				                "type" => "textfield",
				                "heading" => esc_html__( "Custom Classes", "kaswara" ),
				                "decription" => esc_html__( "Custom classes seperated by space", "kaswara" ),
				                "param_name" => "imcgal_classes"            				             
				            ),

						)
					)
				);

				//VC map for Icon		
				vc_map( array(
			        "name" => esc_html__( "Card Element", "kaswara" ),
			        "description" => esc_html__("Single card image element.", "kaswara"),         
 				    'icon' => KASWARA_IMAGES.'small/image.jpg',  
			        "category" => "Kaswara",        
			        "as_child" => array('only' => 'kswr_cardslider'),
			        "base" => "kswr_cardslide_item",      
			        "params" => array( 			                 			                
			                array(
				                "type" => "attach_image",				                				              
				                "heading" => esc_html__( "Upload Image", "kaswara" ),
				                "param_name" => "imcgal_img"
				            ),
			                array(
				                "type" => "vc_link",
				                "heading" => esc_html__( "Element link", "kaswara" ),
				                "param_name" => "imcgal_link"            				             
				            ),			
				            array(
				                "type" => "textfield",
				                "heading" => esc_html__( "Custom Classes", "kaswara" ),
				                "decription" => esc_html__( "Custom classes seperated by space", "kaswara" ),
				                "param_name" => "imcgalsingle_classes"            				             
				            ),


			        )
			    )); 	
			}
		}	

		function kaswara_cardslider_shortcode($atts,$content = null){				
			extract(shortcode_atts(array(	
			'imcgal_layout'		=> 'top',
			'imcgal_classes' 	=> '',		
			'imcgal_margin'		=> ''														
		 	), $atts));
			$outPut = '<div class="kswr-imcgal-container kswr-theelement '.$imcgal_classes.'" style="'.$imcgal_margin.'" data-layout="'.esc_attr($imcgal_layout).'"><div class="kswr-imcgal-fakeone"></div><div class="kswr-imcgal-insider">'.do_shortcode($content).'</div></div>';
			return $outPut;				
		}

		function kaswara_cardslide_item_shortcode($atts,$content = null){				
			extract(shortcode_atts(array(
				'imcgal_img' 		=> '',
				'imcgal_link'		=> '',
				
				'imcgalsingle_classes' 	=> '',															
		 	), $atts));
		 	$imcgal_url = wp_get_attachment_image_src($imcgal_img,'full');
		 	$link = '';
		 	
		 	$href = vc_build_link($imcgal_link);
		 	if(trim($href['url']) != '')
 				$link = '<a href="'.esc_url($href['url']).'" target="'.esc_attr($href['target']).'" ></a>';

			$outPut = '<div class="kswr-imcgal-item kswr-theelement '.$imcgalsingle_classes.'" onclick="kswr_cards_gallery(this);"><img src="'.esc_url($imcgal_url[0]).'">'.$link.'</div>';			
			return $outPut;			
		}



	
	}
}
if(class_exists('Kaswara_cardslider')){
	$Kaswara_filter_images = new Kaswara_cardslider;
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_kswr_cardslider extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_kswr_cardslide_item extends WPBakeryShortCode {
    }
}


?>