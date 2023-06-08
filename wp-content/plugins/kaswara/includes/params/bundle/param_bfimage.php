<?php 
/*------------------------------------------------
         Hover Image  SHORTCODE
------------------------------------------------*/

function kswr_beforeafterimage_shortcode() {
     vc_map( array(
        "name" => esc_html__( "Before / After Image", "kaswara" ),
        "category" => "Kaswara",                      
        "description" => esc_html__("Single Image with hover effect and link", "kaswara"),         
        'icon' => KASWARA_IMAGES.'small/beforeafterimage.jpg',  
        "base" => "kswr_beforeafterimage",      
        "params" => array(                   
            array(
                "type" => "attach_image",
                'group' => 'General',
                "heading" => esc_html__( "Before Image", "kaswara" ),
                "param_name" => "before_image"
            ),
            array(
                "type" => "attach_image",
                'group' => 'General',
                "heading" => esc_html__( "After Image", "kaswara" ),
                "param_name" => "after_image"
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Choose Orientation', 'kaswara' ),
                'group' => 'General',                
                'param_name' => 'bai_orientation',
                'value' => array(
                    esc_html__( 'Horizontal','kaswara') => 'horizontal',
                    esc_html__( 'Vertical','kaswara') => 'vertical'
                )               
            ),

             array(
                "type" => "kswr_message",
                "group" => "General", 
                "title" => esc_html__( "Color Scheme", "kaswara" ),
                "param_name" => "bai_colorscheme_sections",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "group" => "General", 
                "heading" => esc_html__( "Use Default Scheme", "kaswara" ),
                "param_name" => "bai_colorscheme_def",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ),
            array(
                "type" => "colorpicker",
                "value" => "#fff",
                "group" => "General", 
                "dependency" => Array("element" => "bai_colorscheme_def","value" => array("0")),        
                "heading" => esc_html__( "Handle Color Scheme", "kaswara" ),
                "param_name" => "bai_colorscheme"
            ), 
            array(
               "type" => "dropdown",
                "heading" => esc_html__( 'Enable Box Shadow','kaswara'),
                "param_name" => "bai_boxshadow_enabled",           
                "value" => array(
                        "No" => "off",
                        "Yes" => "on",
                    ),         
                "group" => "General",
            ),
             array(
               "type" => "dropdown",
                "heading" => esc_html__( 'Enable Box Shadow On Hover','kaswara'),
                "param_name" => "bai_boxshadow_hover_enabled",          
                "value" => array(
                        "Yes" => "on",
                        "No" => "off",
                    ),         
                "group" => "General",
            ),
            
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Box Shadow Style', 'kaswara' ),
                'group' => 'General',
                'param_name' => 'bai_boxshadow_style',                
                'value' => array(
                    esc_html__( 'Style 1','kaswara') => 'style1',
                    esc_html__( 'Style 2','kaswara') => 'style2',
                    esc_html__( 'Style 3','kaswara') => 'style3',
                    esc_html__( 'Style 4','kaswara') => 'style4',
                    esc_html__( 'Style 5','kaswara') => 'style5',
                    esc_html__( 'Style 6','kaswara') => 'style6',
                    esc_html__( 'Style 7','kaswara') => 'style7',
                    esc_html__( 'Style 8`','kaswara') => 'style8',
                    esc_html__( 'Style 9','kaswara') => 'style9'
                )               
            ),
            array(
                "type" => "colorpicker",
                "value" => "rgba(0,0,0,0.8)",
                "group" => "General", 
                "heading" => esc_html__( "Box Shadow Color", "kaswara" ),
                "param_name" => "bai_boxshadow_color"
            ), 

            array(
               "type" => "dropdown",
                "heading" => esc_html__( 'Enable Overlay','kaswara'),
                "param_name" => "bai_overlay_enabled",          
                "value" => array(
                        "Yes" => "on",
                        "No" => "off",
                    ),         
                "group" => "Overlay",
            ),

            array(
                "type" => "kswr_message",
                "group" => "Overlay", 
                "title" => esc_html__( "Overlay Settings", "kaswara" ),
                "dependency" => Array("element" => "bai_overlay_enabled","value" => array("on")),                  
                "param_name" => "bai_overlay_bg_sections",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "group" => "Overlay", 
                "heading" => esc_html__( "Use Default Overlay Color", "kaswara" ),
                "dependency" => Array("element" => "bai_overlay_enabled","value" => array("on")),                  
                "param_name" => "bai_overlay_bg_def",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ),
            array(
                "type" => "colorpicker",
                "value" => "rgba(0,0,0,0.5)",
                "group" => "Overlay", 
                "heading" => esc_html__( "Overlay Backgound", "kaswara" ),
                "dependency" => Array("element" => "bai_overlay_bg_def","value" => array("0")),        
                "param_name" => "bai_overlay_bg"
            ), 

            array(
                "type" => "kswr_message",
                "group" => "Overlay", 
                "title" => esc_html__( "Button Backgound Settings", "kaswara" ),
                "dependency" => Array("element" => "bai_overlay_enabled","value" => array("on")),                  
                "param_name" => "bai_overlay_button_bg_sections",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "group" => "Overlay", 
                "heading" => esc_html__( "Use Default Background", "kaswara" ),
                "dependency" => Array("element" => "bai_overlay_enabled","value" => array("on")),                  
                "param_name" => "bai_overlay_button_bg_def",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ),  
            array(
                "type" => "colorpicker",
                "value" => "#269ac1",
                "group" => "Overlay", 
                "heading" => esc_html__( "Before / After Backgound", "kaswara" ),
                "dependency" => Array("element" => "bai_overlay_button_bg_def","value" => array("0")),                  
                "param_name" => "bai_overlay_button_bg"
            ),         

             array(
                "type" => "kswr_message",
                "group" => "Overlay", 
                "title" => esc_html__( "Button Color Settings", "kaswara" ),
                "dependency" => Array("element" => "bai_overlay_enabled","value" => array("on")),                  
                "param_name" => "bai_overlay_button_color_sections",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "group" => "Overlay", 
                "heading" => esc_html__( "Use Default Color", "kaswara" ),
                "dependency" => Array("element" => "bai_overlay_enabled","value" => array("on")),                  
                "param_name" => "bai_overlay_button_color_def",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ),    
            array(
                "type" => "colorpicker",
                "value" => "#fff",
                "group" => "Overlay", 
                "heading" => esc_html__( "Before / After Color", "kaswara" ),
                "dependency" => Array("element" => "bai_overlay_button_color_def","value" => array("on")),                  
                "param_name" => "bai_overlay_button_color"
            ),

            array(
                "type" => "kswr_distance",
                "distance" => "margin",
                "heading" => esc_html__( "Element Margins", "kaswara" ),
                "param_name" => "bai_margin",
                "defaults"=> array(
                    "top" => "20px",
                    "bottom" => "50px"
                ),
                'group' => 'Margins',
                "positions" => array(
                   esc_html__("Top","kaswara") => "top",
                   esc_html__("Bottom","kaswara") => "bottom",
                )
            ),
            
            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Border (px)", "kaswara" ),
                'group' => 'Margins',
                "param_name" => "bai_border",
                "value" => 0
            ),
            array(
                "type" => "colorpicker",
                "value" => "transparent",
                "group" => "Margins", 
                "heading" => esc_html__( "Border Color", "kaswara" ),          
                "param_name" => "bai_border_color"
            ),
              
    
        )
    ));
}  
add_action( 'init', 'kswr_beforeafterimage_shortcode' );

?>