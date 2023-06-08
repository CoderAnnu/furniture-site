<?php 
/*------------------------------------------------
         HOTSPOT SHORTCODE
------------------------------------------------*/

function kswr_hotspot_shortcode(){
    vc_map( array(
        "name" => esc_html__( "Hotspot Image", "kaswara" ),
        "description" => esc_html__("Image with Hotspot information.", "kaswara"),         
        'icon' => KASWARA_IMAGES.'small/hoverimage.jpg',  
        "category" => "Kaswara",        
        "base" => "kswr_hotspot",      
        "params" => array(                            
            array(
               'type' => 'dropdown',
                'heading' => esc_html__( 'Image Alignment', 'kaswara' ),    
                'group' => 'General',
                'param_name' => 'htsp_imagepalignment',
                'value' => array(
                    esc_html__( 'Center','kaswara') => 'center',
                    esc_html__( 'Left','kaswara') => 'left',
                    esc_html__( 'Right','kaswara') => 'right',
                )               
            ), 
            array(
                "type" => "kswr_hotspot",
                'group' => 'General',
                "param_name" => "htsp_data",
                "heading" => esc_html__( "Hotspot Image", "kaswara" ),
            ),
            //-----------Marker Styling
            array(
                "type" => "colorpicker",
                "heading" => esc_html__( "Marker Background", "kaswara" ),
                "param_name" => "htsp_markerbackground",
                "value" => '#2196f3',
                "group" => "Marker" 
            ),
            array(
                "type" => "colorpicker",
                "heading" => esc_html__( "Marker Inside Color", "kaswara" ),
                "param_name" => "htsp_markercolor",
                "value" => '#fff',
                "group" => "Marker" 
            ),
            array(
               'type' => 'dropdown',
                'heading' => esc_html__( 'Marker Style', 'kaswara' ),    
                'group' => 'Marker',
                'param_name' => 'htsp_markertype',
                'value' => array(
                    esc_html__( 'Single Color','kaswara') => 'singlecolor',
                    esc_html__( 'With Decoration','kaswara') => 'colordecoration',
                    esc_html__( 'Plus Sign','kaswara') => 'plussign',
                    esc_html__( 'Numbers','kaswara') => 'numbers',
                    esc_html__( 'Alphabet','kaswara') => 'alphabet',
                )               
            ), 
            array(
               'type' => 'dropdown',
                'heading' => esc_html__( 'Rounded Marker', 'kaswara' ),    
                'group' => 'Marker',
                'param_name' => 'htsp_markerrounded',
                'value' => array(
                    esc_html__( 'Yes, Please','kaswara') => 'enabled',
                    esc_html__( 'No','kaswara') => 'disabled',
                )               
            ), 
            array(
               'type' => 'dropdown',
                'heading' => esc_html__( 'Marker Animation', 'kaswara' ),    
                'group' => 'Marker',
                'param_name' => 'htsp_markeranimation',
                'value' => array(
                    esc_html__( 'Yes, Please','kaswara') => 'enabled',
                    esc_html__( 'No','kaswara') => 'disabled',
                )               
            ), 
            //-----------Tooltip Styling     
             array(
               'type' => 'dropdown',
                'heading' => esc_html__( 'Tooltip Content Alignment', 'kaswara' ),    
                'group' => 'Tooltip',
                'param_name' => 'htsp_tooltipalignment',
                'value' => array(
                    esc_html__( 'Left','kaswara') => 'left',
                    esc_html__( 'Center','kaswara') => 'center',
                    esc_html__( 'Right','kaswara') => 'right',
                )               
            ), 
            array(
                "type" => "colorpicker",
                "heading" => esc_html__( "Tooltip Background Color", "kaswara" ),
                "param_name" => "htsp_tooltipbackground",
                "value" => '#fff',
                "group" => "Tooltip" 
            ),  
            array(
                'type' => 'dropdown',
                'heading' => esc_html__("Tooltip Show Animation",'kaswara'),
                'group' => 'Tooltip',
                'param_name' => 'htsp_tooltipanimation',
                'value' => array(                    
                        'Fade' =>'fade',                                        
                        esc_html__('None','rahyass') =>'none',                                      
                        'Popup' =>'popup',
                        'Fade Up' =>'fadeup',                                       
                        'Fade Down' =>'fadedown',                                       
                        'Fade Left' =>'fadeleft',                                       
                        'Fade Right' =>'faderight',                                     
                        'Zoom Out' =>'zoomout',                                     
                        'Zoom In' =>'zoomin',                                       
                        'Slide Up' =>'slideup',                                     
                        'Slide Down' =>'slidedown',                                     
                        'Slide Left' =>'slideleft',                                     
                        'Slide Right' =>'slideright',                                       
                        'Fall Perspective' =>'fallperspective',                                     
                        'Fall Perspective 2' =>'fallperspectivebig',                                     
                        'Fly' =>'fly',                                      
                        'Flip' =>'flip',                                        
                )            
            ),     
            array(
               'type' => 'dropdown',
                'heading' => esc_html__( 'Show Tooltip On', 'kaswara' ),    
                'group' => 'Tooltip',
                'param_name' => 'htsp_tooltipshowevent',
                'value' => array(
                    esc_html__( 'Hover','kaswara') => 'hover',
                    esc_html__( 'Click','kaswara') => 'click',
                )               
            ),             
            array(
               'type' => 'dropdown',
                'heading' => esc_html__( 'Include Tooltip Triangle', 'kaswara' ),    
                'group' => 'Tooltip',
                'param_name' => 'htsp_tooltiptriangle',
                'value' => array(
                    esc_html__( 'No','kaswara') => 'disabled',
                    esc_html__( 'Yes, Please','kaswara') => 'enabled',
                )               
            ), 
            array(
               'type' => 'dropdown',
                'heading' => esc_html__( 'Enable Box Shadow', 'kaswara' ),    
                'group' => 'Tooltip',
                'param_name' => 'htsp_tooltipboxshadow',
                'value' => array(
                    esc_html__( 'Yes, Please','kaswara') => 'enabled',
                    esc_html__( 'No','kaswara') => 'disabled',
                )               
            ),        
            array(
                "type" => "kswr_fontsize",
                "param_name" => "htsp_titlefontsize",
                "heading" => esc_html__( "Title Font", "kaswara" ),      
                "group" => "Tooltip"  ,
                "defaults"=> array("font-size" => "16px", "line-height" => "", "letter-spacing" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
                )
            ), 
             array(
                "type" => "kswr_fontstyle",
                "param_name" => "htsp_titlefontstyle",
                "heading" => esc_html__( "Title Font Style", "kaswara" ),             
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "700", "font-style" => ""),
                "group" => "Tooltip",
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
            ), 
            array(
                "type" => "colorpicker",
                "heading" => esc_html__( "Title Color", "kaswara" ),
                "param_name" => "htsp_titlecolor",
                "value" => '#333',
                "group" => "Tooltip" 
            ), 
            array(
                "type" => "kswr_fontsize",
                "param_name" => "htsp_infofontsize",
                "heading" => esc_html__( "Info Font", "kaswara" ),      
                "group" => "Tooltip"  ,
                "defaults"=> array("font-size" => "13px", "line-height" => "", "letter-spacing" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
                )
            ),
            array(
                "type" => "colorpicker",
                "heading" => esc_html__( "Info Color", "kaswara" ),
                "param_name" => "htsp_infocolor",
                "value" => '#999',
                "group" => "Tooltip" 
            ), 
        )
    ));        
}
add_action( 'init', 'kswr_hotspot_shortcode' ); 
?>