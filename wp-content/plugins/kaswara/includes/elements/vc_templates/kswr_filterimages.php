<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ============== F I L T E R   H O V E R    I M A G E ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */


if(!class_exists('Kaswara_filter_images'))
{
	class Kaswara_filter_images
	{
		function __construct()
		{
			add_action('init',array($this,'kaswara_filter_images_init'));
			add_shortcode('kswrfilter_images',array($this,'kaswara_filter_images_shortcode'));		
		}
		function kaswara_filter_images_init(){
			if(function_exists('vc_map')){
				vc_map(
					array(
						"name" => esc_html__("Filter Images","kaswara"),
 				       'icon' => KASWARA_IMAGES.'small/filterimages.jpg',  
						"base" => "kswrfilter_images",
						"class" => "",
      					"category" => "Kaswara",        
						"description" => esc_html__("Multiple images with filter menu.","kaswara"),
						"as_parent" => array('only' => 'kswr_hoverimage'), 
						"content_element" => true,
						"show_settings_on_create" => true,						
						"js_view" => 'VcColumnView',
						"params" => array(
							array(
				                "type" => "textfield",
				                "group" => "General", 
				                "heading" => esc_html__( "Categories", "kaswara" ),
				                "heading" => esc_html__( "Filter Categories separated with comma(,)", "kaswara" ),
				                "param_name" => "fili_categories"
				            ),				            				           
				            array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Filter Link Align', 'kaswara' ),
				                'group' => 'General',
				                'param_name' => 'fili_align',
				                'value' => array(
				                    esc_html__( 'Center','kaswara') => 'center',
				                    esc_html__( 'Left','kaswara') => 'left',
				                    esc_html__( 'Right','kaswara') => 'right',
				                )               
				            ),
				            array(
				                'type' => 'dropdown',
				                'heading' => esc_html__("Columns Number",'kaswara'),
				                'group' => 'General',
				                'param_name' => 'fili_columns_number',
				                'value' => array(                    
				                    esc_html__("4 Columns",'kaswara') => '4',
				                    esc_html__("1 Column",'kaswara')  => '1',
				                    esc_html__("2 Columns",'kaswara') => '2',
				                    esc_html__("3 Columns",'kaswara') => '3',
				                    esc_html__("5 Columns",'kaswara') => '5'
				                )            
				            ),
						      
						    array(
				                'type' => 'dropdown',
				                'heading' => esc_html__( 'Filter Style', 'kaswara' ),
				                'group' => 'Filter Section',
				                'param_name' => 'fili_style',
				                'value' => array(
				                    esc_html__( 'Style 3','kaswara') => 'style3',
				                    esc_html__( 'Style 1','kaswara') => 'style1',
				                    esc_html__( 'Style 2','kaswara') => 'style2',
				                    esc_html__( 'Style 4','kaswara') => 'style4',
				                    esc_html__( 'Style 5','kaswara') => 'style5',
				                )               
				            ),
				            
				            array(
						        "type" => "kswr_number",
				                'group' => 'Filter Section',
						        "value" => 13,
						        "heading" => esc_html__( "Link Font Size", "kaswara" ),						     
						        "param_name" => "fili_size"
						    ), 
						    array(
						        "type" => "kswr_number",
				                'group' => 'Filter Section',
						        "value" => 34,
						        "heading" => esc_html__( "Link Height", "kaswara" ),						     
						        "param_name" => "fili_height"
						    ), 

						    array(
						        "type" => "kswr_number",
				                'group' => 'Filter Section',
						        "value" => 0,
						        "min" => 0,
						        "max" => 3,
						        "heading" => esc_html__( "Font Spacing", "kaswara" ),						     
						        "param_name" => "fili_spacing"
						    ), 

						    array(
					            "type" => "colorpicker",
				                'group' => 'Filter Section',
					            "heading" => esc_html__( "Color", "kaswara" ),
					            "param_name" => "fili_color",
					            "value" => '#888', 
					        ),
					        array(
					            "type" => "colorpicker",
				                'group' => 'Filter Section',					            
					            "heading" => esc_html__( "Color onHover", "kaswara" ),
					            "param_name" => "fili_color_hover",
					            "value" => '#289fca', 
					        ),
					        array(
					            "type" => "colorpicker",
				                'group' => 'Filter Section',
					            "heading" => esc_html__( "Color Scheme", "kaswara" ),
					            "param_name" => "fili_scheme",
					            "value" => '#888', 
					        ),
					        array(
					            "type" => "colorpicker",
				                'group' => 'Filter Section',
					            "heading" => esc_html__( "Color Scheme onHover", "kaswara" ),
					            "param_name" => "fili_scheme_hover",
					            "value" => '#289fca', 
					        ),
							
						    array(
				                'type' => 'dropdown',
				                'group' => 'Filter Section',				                
				                'heading' => esc_html__( 'Font Weight', 'kaswara' ),
				                'group' => 'Filter Section',
				                'param_name' => 'fili_weight',
				                'value' => array(
				                    esc_html__( '500','kaswara') => '500',
				                    esc_html__( '300','kaswara') => '300',
				                    esc_html__( '400','kaswara') => '400',
				                    esc_html__( '600','kaswara') => '600',
				                    esc_html__( '700','kaswara') => '700',
				                )               
				            ),  
						    
						    array(
				                'type' => 'dropdown',
				                'group' => 'Filter Section',				                
				                'heading' => esc_html__( 'Font Style', 'kaswara' ),
				                'group' => 'Filter Section',
				                'param_name' => 'fili_transform',
				                'value' => array(
				                    esc_html__( 'Uppercase','kaswara') => 'uppercase',
				                    esc_html__( 'Capitalize','kaswara') => 'capitalize',
				                    esc_html__( 'Lowercase','kaswara') => 'lowercase',
				                )               
				            ), 
				            array(
					            "type" => "kswr_distance",
					            "distance" => "margin",
					            "heading" => "Filter Margins",
					            "param_name" => "fili_margins",
					            "positions" => array(
					                esc_html__("Top","kaswara") => "top",
					                esc_html__("Bottom","kaswara") => "bottom"
					            ),
					            "group" => "Filter Section"
					        ),
						)
					)
				);			
			}
		}
		
		function kaswara_filter_images_shortcode($atts,$content = null){				
			extract(shortcode_atts(array(								
				"fili_categories"			=> '',
				"fili_style"				=> 'style3',
				"fili_size"					=> '13',				
				"fili_height"				=> '34',				
				"fili_color"				=> '#888',				
				"fili_color_hover"			=> '#289fca',				
				"fili_scheme"				=> '#888',				
				"fili_scheme_hover"			=> '#289fca',				
				"fili_transform"			=> 'uppercase',				
				"fili_weight"				=> '500',				
				"fili_spacing"				=> '1',				
				"fili_align"				=> 'center',
				"fili_columns_number"		=> '4',	
				"fili_margins"				=> '',		
		 	), $atts));
			$outPut = $catsoutPut = '';
			$link_style = 'font-size:'.$fili_size.'px; color:'.$fili_color.'; text-transform:'.$fili_transform.'; font-weight:'.$fili_weight.'; letter-spacing:'.$fili_spacing.'px; --color-hover:'.$fili_color_hover.'; --scheme-color:'.$fili_scheme.'; --scheme-color-hover:'.$fili_scheme_hover.'; '.$fili_margins;			

			$classRandom = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,8);
			$settings = array(
				'shortcode' => 'filterimages',
				'classname' => '.km-filter-it-container-c-'.$classRandom,
				'--color-hover' => $fili_color_hover,
				'--scheme-color' => $fili_scheme,
				'--scheme-color-hover' => $fili_scheme_hover
			);
			kaswara_style_ms_maker($settings);
			
			$edge_border = '';
			if($fili_style == "style3"){
				$edge_border = '<div class="km-filter-it-link-edge filteri-edgeright"></div><div class="km-filter-it-link-edge filteri-edgeleft"></div>';
			}

			$categories = explode(',',$fili_categories); 
			if(is_array($categories)){
				foreach ($categories as $cat) {
					if(trim($cat) != "")
						$catsoutPut .=  '<div class="km-filteri-link km-filter-it-link" data-active="false" data-filter=".'.esc_attr($cat).'" style="height:'.$fili_height.'px; line-height:'.$fili_height.'px;">'.ucfirst($cat).''.$edge_border.'</div>';
				}
			}
			
			$outPut .= '<div class="km-filteri-image-c km-filter-it-container-c km-filter-it-container-c-'.$classRandom.'"  data-align="'.esc_attr($fili_align).'"  data-gutter="on" data-columns="'.esc_attr($fili_columns_number).'">
							<div class="km-filteri-cats" data-style="'.esc_attr($fili_style).'" style="text-align:'.$fili_align.'; '.$link_style.' ">
								<div class="km-filteri-link km-filter-it-link" data-filter=".km-filteri-item" data-active="true" style="height:'.$fili_height.'px; line-height:'.$fili_height.'px;">All'.$edge_border.'</div>
								'.$catsoutPut.'
							</div>
							<div class="km-filteri-items-list" data-columns="'.esc_attr($fili_columns_number).'">
							'.do_shortcode($content).'
							</div>
						</div>';
			return $outPut;				
		}

	
	}
}
if(class_exists('Kaswara_filter_images')){
	$Kaswara_filter_images = new Kaswara_filter_images;
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_kswrfilter_images extends WPBakeryShortCodesContainer {
    }
}


?>