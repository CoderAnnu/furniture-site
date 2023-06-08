<?php 
/*------------------------------------------------
         SINGLE ICON  SHORTCODE
------------------------------------------------*/

function kswr_counter_shortcode(){
    vc_map( array(
        "name" => esc_html__( "Counter", "kaswara" ),
        "description" => esc_html__("Counter up element with some style!", "kaswara"),         
        'icon' => KASWARA_IMAGES.'small/counter.jpg',  
        "category" => "Kaswara",        
        "base" => "kswr_counter",      
        "params" => array( 
            //General
            array(
                "type" => "dropdown",
                "param_name" => "cnt_layout",
                "heading" => esc_html__( "Element Layout", "kaswara" ),
                "value" => array(
                    esc_html__("Center","kaswara") => "center",
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right"
                ),
                "group" => "General"
            ),
             array(
                "type" => "dropdown",
                "param_name" => "cnt_align",
                "heading" => esc_html__( "Container Alignment", "kaswara" ),
                "value" => array(
                    esc_html__("Center","kaswara") => "center",
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right"
                ),
                "group" => "General"
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Counter Title", "kaswara" ),
                "param_name" => "cnt_title",
                "admin_label" => true,
                "value" => '',
                "group" => "General"   
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Counter Value", "kaswara" ),
                "param_name" => "cnt_value",
                "admin_label" => true,
                "value" => '',
                "group" => "General"   
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Counter Prefix", "kaswara" ),
                "param_name" => "cnt_prefix",
                "value" => '',
                "group" => "General"   
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Counter Suffix", "kaswara" ),
                "param_name" => "cnt_suffix",
                "value" => '',
                "group" => "General"   
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Counter Separator", "kaswara" ),
                "param_name" => "cnt_separator",
                "value" => ',',
                "group" => "General"   
            ),
             array(
                "type" => "textfield",
                "heading" => esc_html__( "Counter Decimal", "kaswara" ),
                "param_name" => "cnt_decimal",
                "value" => '.',
                "group" => "General"   
            ),
             array(
                "type" => "kswr_number",
                "value" => 3,
                "group" => "General", 
                "max" => 120,
                "min" => 0,
                "heading" => esc_html__( "Animation Speed", "kaswara" ),
                "param_name" => "cnt_duration"
            ),
            //Icon
              array(
                "type" => "kswr_switcher",
                "group" => "Icon", 
                "heading" => esc_html__( "Use Picture", "kaswara" ),
                "param_name" => "cnt_image_enable",
                'default' => '0',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ), 
            array(
                "type" => "attach_image",
                'group' => 'Icon',
                "dependency" => Array("element" => "cnt_image_enable","value" => array('1')),            
                "heading" => esc_html__( "Upload Image", "kaswara" ),
                "param_name" => "cnt_image"
            ),
            array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Picture Width", "kaswara" ),
                "param_name" => "cnt_image_width",
                "dependency" => Array("element" => "cnt_image_enable","value" => array('1')),            
                "value" => 35,
                "group" => 'Icon' 
             ),
             array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Picture Height", "kaswara" ),
                "param_name" => "cnt_image_height",
                "dependency" => Array("element" => "cnt_image_enable","value" => array('1')),            
                "value" => 35,
                "group" => 'Icon' 
             ),
             array(
                "type" => "kswr_iconchooser",
                "class" => "",
                "heading" =>esc_html__("Select Icon","kaswara"),
                "dependency" => Array("element" => "cnt_image_enable","value" => array('0')),                            
                "description" =>esc_html__("Choose Your Icon","kaswara"),
                "param_name" => "cnt_icon",
                "value" => "",
                "group" => "Icon",
            ),                             
            array(
                "type" => "dropdown",
                "dependency" => Array("element" => "cnt_image_enable","value" => array('0')),                            
                 "heading" => esc_html__( 'Icon Hover Effect','kaswara'),
                 "param_name" => "cnt_effect",           
                 "value" => array(
                    esc_html__('None','kaswara') => 'none',
                    esc_html__('Fade','kaswara') => 'fade',                   
                    esc_html__('Zoom in','kaswara') => 'zoomin',
                    esc_html__('Zoom out','kaswara') => 'zoomout',
                    esc_html__('Sasuki','kaswara') => 'sasuki',
                    esc_html__('Hiroshi','kaswara') => 'hiroshi',
                    esc_html__('Haruki','kaswara') => 'haruki',
                    esc_html__('Haruki','kaswara') => 'haruki',
                    esc_html__('Murawa','kaswara') => 'murawa',
                    esc_html__('Sisawa','kaswara') => 'sisawa',          
                ),         
                "group" => "Icon",
            ),
            array(
                "type" => "kswr_switcher",
                "dependency" => Array("element" => "cnt_image_enable","value" => array('0')),                            
                "group" => "Icon", 
                "heading" => esc_html__( "Magic Rotation", "kaswara" ),
                "description" => esc_html__( "Only if border radius 0", "kaswara" ),
                "param_name" => "cnt_rotation",
                'default' => 'false',
                'on' => array('text' => 'ON','val' => 'true' ),
                'off'=> array('text' => 'OFF','val' => 'false') 
            ), 
             //
             array(
                "type" => "kswr_message",
                "group" => "Icon", 
                "dependency" => Array("element" => "cnt_image_enable","value" => array('0')),                            
                "title" => esc_html__( "Icon Styling Styling", "kaswara" ),
                "param_name" => "cnt_style_default_sections",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "group" => "Icon", 
                "dependency" => Array("element" => "cnt_image_enable","value" => array('0')),                            
                "heading" => esc_html__( "Use Default Icon Styling", "kaswara" ),
                "param_name" => "cnt_style_default",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ),           
            array(
                "type" => "kswr_number",
                "value" => 18,
                "group" => "Icon", 
                "max" => 1200,
                "dependency" => Array("element" => "cnt_style_default","value" => array("0")),        
                "heading" => esc_html__( "Icon Size", "kaswara" ),
                "param_name" => "cnt_iconsize"
            ),
            array(
                "type" => "kswr_number",
                "value" => 25,
                "group" => "Icon", 
                "max" => 2200,
                "dependency" => Array("element" => "cnt_style_default","value" => array("0")),        
                "heading" => esc_html__( "Icon Background Size", "kaswara" ),
                "param_name" => "cnt_bgsize"
            ),
            array(
                "type" => "kswr_number",
                "value" => 0,
                "group" => "Icon", 
                "max" => 500,
                "dependency" => Array("element" => "cnt_style_default","value" => array("0")),        
                "heading" => esc_html__( "Icon Border Radius", "kaswara" ),
                "param_name" => "cnt_border_radius"
            ),

            array(
                "type" => "kswr_gradient",
                "group" => "Icon",            
                "value" => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
                "dependency" => Array("element" => "cnt_style_default","value" => array("0")),                    
                "heading" => esc_html__( "Icon Color", "kaswara" ),
                "param_name" => "cnt_ic_color"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => "Icon",            
                "value" => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
                "dependency" => Array("element" => "cnt_style_default","value" => array("0")),                    
                "heading" => esc_html__( "Icon Color onHover", "kaswara" ),
                "param_name" => "cnt_ic_color_hover"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => "Icon",            
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
                "dependency" => Array("element" => "cnt_style_default","value" => array("0")),                    
                "heading" => esc_html__( "Icon Background", "kaswara" ),
                "param_name" => "cnt_back"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => "Icon",            
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
                "dependency" => Array("element" => "cnt_style_default","value" => array("0")),                    
                "heading" => esc_html__( "Icon Background onHover", "kaswara" ),
                "param_name" => "cnt_back_hover"
            ),
            array(
                "type" => "kswr_border",
                'bordergradient' => 'enable',
                "heading" => esc_html__( "Border Styling", "kaswara" ),         
                "dependency" => Array("element" => "cnt_style_default","value" => array("0")),                    
                "group" => "Icon",                 
                "param_name" => "cnt_border"
             ),

            //Font Settings
            array(
                "type" => "kswr_message",
                "group" => "Typography", 
                "title" => esc_html__( "Font Settings", "kaswara" ),
                "param_name" => "cnt_font_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_switcher",
                "group" => "Typography", 
                "heading" => esc_html__( "Use Default Font Settings", "kaswara" ),
                "param_name" => "cnt_font_default",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ), 
            //Title
            array(
                "type" => "kswr_message",
                "group" => "Typography", 
                "title" => esc_html__( "Title Font Settings", "kaswara" ),
                "param_name" => "cnt_titlefont_sections",
                "mtop" => "10px"
            ),
             array(
                "type" => "kswr_fontsize",
                "param_name" => "cnt_title_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "dependency" => Array("element" => "cnt_font_default","value" => array("0")),                               
                "defaults"=> array("font-size" => "16px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
                "param_name" => "cnt_title_fstyle",
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "dependency" => Array("element" => "cnt_font_default","value" => array("0")),                                  
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Typography",            
                "value" => "#333",
                "heading" => esc_html__( "Title Color", "kaswara" ),
                "param_name" => "cnt_title_color"
            ),
            //Value
            array(
                "type" => "kswr_message",
                "group" => "Typography", 
                "title" => esc_html__( "Value Font Settings", "kaswara" ),
                "param_name" => "cnt_valuefont_sections",
                "mtop" => "10px"
            ),
             array(
                "type" => "kswr_fontsize",
                "param_name" => "cnt_value_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "dependency" => Array("element" => "cnt_font_default","value" => array("0")),                               
                "defaults"=> array("font-size" => "26px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
                "param_name" => "cnt_value_fstyle",
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "dependency" => Array("element" => "cnt_font_default","value" => array("0")),                                  
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Typography",            
                "value" => "#333",
                "heading" => esc_html__( "Value Color", "kaswara" ),
                "param_name" => "cnt_value_color"
            ),
            //Prefix
            array(
                "type" => "kswr_message",
                "group" => "Typography", 
                "title" => esc_html__( "Prefix Font Settings", "kaswara" ),
                "param_name" => "cnt_prefixfont_sections",
                "mtop" => "10px"
            ),
             array(
                "type" => "kswr_fontsize",
                "param_name" => "cnt_prefix_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "dependency" => Array("element" => "cnt_font_default","value" => array("0")),                               
                "defaults"=> array("font-size" => "15px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
                "param_name" => "cnt_prefix_fstyle",
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "dependency" => Array("element" => "cnt_font_default","value" => array("0")),                                  
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Typography",            
                "value" => "#333",
                "heading" => esc_html__( "Prefix Color", "kaswara" ),
                "param_name" => "cnt_prefix_color"
            ),
            //Suffix
            array(
                "type" => "kswr_message",
                "group" => "Typography", 
                "title" => esc_html__( "Suffix Font Settings", "kaswara" ),
                "param_name" => "cnt_suffixfont_sections",
                "mtop" => "10px"
            ),
             array(
                "type" => "kswr_fontsize",
                "param_name" => "cnt_suffix_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "dependency" => Array("element" => "cnt_font_default","value" => array("0")),                               
                "defaults"=> array("font-size" => "15px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
                "param_name" => "cnt_suffix_fstyle",
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "dependency" => Array("element" => "cnt_font_default","value" => array("0")),                                  
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Typography",            
                "value" => "#333",
                "heading" => esc_html__( "Suffix Color", "kaswara" ),
                "param_name" => "cnt_suffix_color"
            ),


            //Margins
            array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "cnt_icon_margins",
                "heading" => esc_html__( "Icon Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Margins"
            ),
             array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "cnt_value_margins",
                "heading" => esc_html__( "Value Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Margins"
            ),
              array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "cnt_title_margins",
                "heading" => esc_html__( "Title Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Margins"
            ),
            



        )
    ));        
}
add_action( 'init', 'kswr_counter_shortcode' ); 
?>