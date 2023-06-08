<?php 
/*------------------------------------------------
         FANCY TEXT SHORTCODE
------------------------------------------------*/

function kswr_fancytext_shortcode(){
    vc_map( array(
        "name" => esc_html__( "Fancy Text", "kaswara" ),
        "description" => esc_html__("Text slider and typing effects", "kaswara"),         
        'icon' => KASWARA_IMAGES.'small/fancy-text.jpg',  
        "category" => "Kaswara",        
        "base" => "kswr_fancytext",      
        "params" => array(                   
            //Content
            array(
                "type" => "textarea",
                "heading" => esc_html__( "Fancy Text", "kaswara" ),
                "description" => esc_html__( "Each word in a new line.", "kaswara" ),
                "param_name" => "fctxt_content",            
                "group" => "Content",
            ), 
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Text Prefix", "kaswara" ),
                "param_name" => "fctxt_prefix",            
                "group" => "Content",
            ), 
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Text Suffix", "kaswara" ),
                "param_name" => "fctxt_suffix",            
                "group" => "Content",
            ),  
            //Config
            array(
               'type' => 'dropdown',
                'heading' => esc_html__( 'Text Alignement', 'kaswara' ),    
                'group' => 'Config',
                'param_name' => 'fctxt_align',
                'value' => array(
                    esc_html__( 'Left','kaswara') => 'left',
                    esc_html__( 'Center','kaswara') => 'center',
                    esc_html__( 'Right','kaswara') => 'right',
                )               
            ),  
            array(
               'type' => 'dropdown',
                'heading' => esc_html__( 'Fancy Text Style', 'kaswara' ),    
                'group' => 'Config',
                'param_name' => 'fctxt_style',
                'value' => array(
                    esc_html__( 'Typing','kaswara') => 'typing',
                    esc_html__( 'Slide','kaswara') => 'slider',               
                )               
            ),    
            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Hold Time", "kaswara" ),
                'group' => 'Config',
                "param_name" => "fctxt_holdtime",
                "value" => 2000,
                "step" => 100
            ),
            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Typing Speed", "kaswara" ),
                'group' => 'Config',
                "param_name" => "fctxt_typespeed",
                "dependency" => Array("element" => "fctxt_style","value" => array('typing')),                            
                "value" => 100,
                "step" => 50
            ),
             array(
               'type' => 'dropdown',
                'heading' => esc_html__( 'Enable Cursor', 'kaswara' ),    
                'group' => 'Config',
                'param_name' => 'fctxt_cursor',
                'value' => array(
                    esc_html__( 'Yes','kaswara') => 'true',
                    esc_html__( 'No','kaswara') => 'false',               
                )               
            ), 
            array(
               'type' => 'dropdown',
                "dependency" => Array("element" => "fctxt_style","value" => array('typing')),                            
                'heading' => esc_html__( 'Typing Animation', 'kaswara' ),    
                'group' => 'Config',
                'param_name' => 'fctxt_typeanimation',
                'value' => array(
                    esc_html__( 'None','kaswara') => 'none',
                    esc_html__( 'Scale','kaswara') => 'scale',               
                    esc_html__( 'Tada','kaswara') => 'tada',               
                    esc_html__( 'Swing','kaswara') => 'swing',               
                    esc_html__( 'Shake','kaswara') => 'shake',               
                    esc_html__( 'Bounce','kaswara') => 'bounce',
                    esc_html__( 'Fade','kaswara') => 'fade',
                    esc_html__( 'Rotate Y','kaswara') => 'rotateY',
                    esc_html__( 'Rotate X','kaswara') => 'rotateX',
                    esc_html__( 'Bottom','kaswara') => 'bottom',
                    esc_html__( 'Top','kaswara') => 'top',               
                )               
            ),  

             //Typography
            array(
                "type" => "kswr_message",
                "group" => "Typography",
                "title" => esc_html__( "Fancy Text Font Settings", "kaswara" ),       
                "param_name" => "fctxt_contentfont_sections",
                "mtop" => "10px"
             ),
             array(
                "type" => "kswr_fontsize",
                "param_name" => "fctxt_content_fsize",
                "group" => "Typography",              
                "heading" => esc_html__( "Font Size", "kaswara" ),      
                "defaults"=> array("font-size" => "19px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
                   esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
                   esc_html__("Phone Font Size","kaswara") => "--phone-font-size",                
                )
            ), 
            array(
                "type" => "kswr_fontstyle",
                "param_name" => "fctxt_content_fstyle",
                "heading" => esc_html__( "Font Style", "kaswara" ),             
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography",
            ),
            array(
                "type" => "kswr_message",
                "group" => "Typography",
                "title" => esc_html__( "Prefix Font Settings", "kaswara" ),       
                "param_name" => "fctxt_prefixfont_sections",
                "mtop" => "10px"
             ),
             array(
                "type" => "kswr_fontsize",
                "param_name" => "fctxt_prefix_fsize",
                "group" => "Typography",              
                "heading" => esc_html__( "Font Size", "kaswara" ),      
                "defaults"=> array("font-size" => "19px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
                   esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
                   esc_html__("Phone Font Size","kaswara") => "--phone-font-size",                
                )
            ), 
            array(
                "type" => "kswr_fontstyle",
                "param_name" => "fctxt_prefix_fstyle",
                "heading" => esc_html__( "Font Style", "kaswara" ),             
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography",
            ),
            array(
                "type" => "kswr_message",
                "group" => "Typography",
                "title" => esc_html__( "Suffix Font Settings", "kaswara" ),       
                "param_name" => "fctxt_suffixfont_sections",
                "mtop" => "10px"
             ),
             array(
                "type" => "kswr_fontsize",
                "param_name" => "fctxt_suffix_fsize",
                "group" => "Typography",              
                "heading" => esc_html__( "Font Size", "kaswara" ),      
                "defaults"=> array("font-size" => "19px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
                   esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
                   esc_html__("Phone Font Size","kaswara") => "--phone-font-size",                
                )
            ), 
            array(
                "type" => "kswr_fontstyle",
                "param_name" => "fctxt_suffix_fstyle",
                "heading" => esc_html__( "Font Style", "kaswara" ),             
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography",
            ),
            //Colors
            array(
                "type" => "kswr_message",
                "group" => "Colors",
                "title" => esc_html__( "Fancy Text Colors", "kaswara" ),       
                "param_name" => "fctxt_contentcolor_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "colorpicker",
                "heading" => esc_html__( "Text Color", "kaswara" ),
                "value" => '#333',
                "param_name" => "fctxt_content_color",            
                "group" => "Colors",
            ), 
            array(
                "type" => "kswr_gradient",
                "heading" => esc_html__( "Background Color", "kaswara" ),
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
                "param_name" => "fctxt_content_bg",            
                "group" => "Colors",
            ), 
            array(
                "type" => "kswr_message",
                "group" => "Colors",
                "title" => esc_html__( "Prefix Text Colors", "kaswara" ),       
                "param_name" => "fctxt_prefixcolor_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_gradient",
                "heading" => esc_html__( "Text Color", "kaswara" ),
                "value" => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
                "param_name" => "fctxt_prefix_color",            
                "group" => "Colors",
            ), 
            array(
                "type" => "kswr_gradient",
                "heading" => esc_html__( "Background Color", "kaswara" ),
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
                "param_name" => "fctxt_prefix_bg",            
                "group" => "Colors",
            ), 
            array(
                "type" => "kswr_message",
                "group" => "Colors",
                "title" => esc_html__( "Suffix Text Colors", "kaswara" ),       
                "param_name" => "fctxt_suffixcolor_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_gradient",
                "heading" => esc_html__( "Text Color", "kaswara" ),
                "value" => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
                "param_name" => "fctxt_suffix_color",            
                "group" => "Colors",
            ), 
            array(
                "type" => "kswr_gradient",
                "heading" => esc_html__( "Background Color", "kaswara" ),
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
                "param_name" => "fctxt_suffix_bg",            
                "group" => "Colors",
            ),  
                
            
            

                              
        )
    ));        
}
add_action( 'init', 'kswr_fancytext_shortcode' ); 



?>