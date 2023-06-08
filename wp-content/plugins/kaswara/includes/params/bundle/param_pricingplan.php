<?php 
/*------------------------------------------------
         PRICING PLAN
------------------------------------------------*/

function kswr_pricingplan_shortcode(){
    vc_map( array(
        "name" => esc_html__( "Pricing Plan", "kaswara" ),
        "description" => esc_html__("Minimalist pricing plan box", "kaswara"),         
        'icon' => KASWARA_IMAGES.'small/modernpricebox.jpg',  
        "category" => "Kaswara",        
        "base" => "kswr_pricingplan",      
        "params" => array(                 
            //Content
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Plan Name", "kaswara" ),
                "param_name" => "prpl_name",
                "admin_label" => true,
                "group" => "Content"               
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Plan Price", "kaswara" ),
                "admin_label" => true,
                "param_name" => "prpl_price",
                "description" => esc_html__( "Example: $50", "kaswara" ),

                "group" => "Content"               
            ),
             array(
                "type" => "textfield",
                "heading" => esc_html__( "Plan Unit", "kaswara" ),
                "description" => esc_html__( "Example: / month", "kaswara" ),
                "param_name" => "prpl_unit",
                "group" => "Content"               
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Plan Info", "kaswara" ),
                "param_name" => "prpl_info",
                "group" => "Content"               
            ),
            array(
                "type" => "vc_link",
                "heading" => esc_html__( "Plan Link Url", "kaswara" ),
                "param_name" => "prpl_link",
                "group" => "Content"               
            ),


            //Colors Style
            array(
                "type" => "kswr_switcher",
                "group" => "Colors", 
                "heading" => esc_html__( "Use Default Colors", "kaswara" ),
                "param_name" => "prpl_color_default",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ),
             array(
                "type" => "kswr_message",
                "dependency" => Array("element" => "prpl_color_default","value" => array("0")),                    
                "title" => esc_html__( "Name Color Settings", "kaswara" ),
                "param_name" => "prpl_namecolor_settings",
                "group" => "Colors", 
                "mtop" => "10px"
             ),
            array(
                "type" => "colorpicker",
                "group" => "Colors",            
                "value" => "#333",
                "dependency" => Array("element" => "prpl_color_default","value" => array("0")),                    
                "heading" => esc_html__( "Plan Name Color", "kaswara" ),
                "param_name" => "prpl_name_color"
            ),
            array(
                "type" => "kswr_message",
                "dependency" => Array("element" => "prpl_color_default","value" => array("0")),                    
                "title" => esc_html__( "Price Color Settings", "kaswara" ),
                "param_name" => "prpl_nameprice_settings",
                "group" => "Colors", 
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_gradient",
                "heading" => esc_html__( "Price Color", "kaswara" ),
                "dependency" => Array("element" => "prpl_color_default","value" => array("0")),                    
                "value" => '{"type":"color", "color1":"#279eca", "color2":"#279eca", "direction":"to left"}',
                "param_name" => "prpl_price_color",            
                "group" => "Colors",
            ),  
            array(
                "type" => "kswr_message",
                "dependency" => Array("element" => "prpl_color_default","value" => array("0")),                    
                "title" => esc_html__( "Unit Color Settings", "kaswara" ),
                "param_name" => "prpl_unitcolor_settings",
                "group" => "Colors", 
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_gradient",
                "heading" => esc_html__( "Unit Color", "kaswara" ),
                "dependency" => Array("element" => "prpl_color_default","value" => array("0")),                    
                "value" => '{"type":"color", "color1":"#279eca", "color2":"#279eca", "direction":"to left"}',
                "param_name" => "prpl_unit_color",            
                "group" => "Colors",
            ),  
            array(
                "type" => "kswr_message",
                "dependency" => Array("element" => "prpl_color_default","value" => array("0")),                    
                "title" => esc_html__( "Plan Color Settings", "kaswara" ),
                "param_name" => "prpl_plancolor_settings",
                "group" => "Colors", 
                "mtop" => "10px"
             ),
            array(
                "type" => "colorpicker",
                "group" => "Colors",            
                "value" => "#888",
                "dependency" => Array("element" => "prpl_color_default","value" => array("0")),                    
                "heading" => esc_html__( "Plan Info Color", "kaswara" ),
                "param_name" => "prpl_info_color"
            ),
            array(
                "type" => "kswr_message",
                "dependency" => Array("element" => "prpl_color_default","value" => array("0")),                    
                "title" => esc_html__( "Container Color Settings", "kaswara" ),
                "param_name" => "prpl_containercolor_settings",
                "group" => "Colors", 
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_gradient",
                "heading" => esc_html__( "Container Background Color", "kaswara" ),
                "dependency" => Array("element" => "prpl_color_default","value" => array("0")),                    
                "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
                "param_name" => "prpl_cnt_back",            
                "group" => "Colors",
            ),  
             array(
                "type" => "kswr_border",
                'bordergradient' => 'enable',
                "heading" => esc_html__( "Container Border Styling", "kaswara" ),         
                "dependency" => Array("element" => "prpl_color_default","value" => array("0")),                    
                "group" => "Colors",                 
                "param_name" => "prpl_cnt_border"
             ),
             

            
            //Hover Color Styles
             array(
                "type" => "kswr_message",
                "title" => esc_html__( "Hover Styling", "kaswara" ),
                "param_name" => "prpl_hover_styling",
                "group" => "Hover Style", 
                "mtop" => "10px"
             ),
             
              array(
                "type" => "kswr_switcher",
                "group" => "Hover Style", 
                "heading" => esc_html__( "Importance onHover", "kaswara" ),
                "param_name" => "prpl_hover_translate",
                'default' => 'on',
                'on' => array('text' => 'ON','val' => 'on' ),
                'off'=> array('text' => 'OFF','val' => 'off') 
            ),
              array(
                "type" => "kswr_switcher",
                "group" => "Hover Style", 
                "heading" => esc_html__( "Enable onHover Colors", "kaswara" ),
                "param_name" => "prpl_hover_cl_enable",
                'default' => '0',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ),
            array(
                "type" => "kswr_switcher",
                "group" => "Hover Style", 
                "heading" => esc_html__( "Use Default Colors", "kaswara" ),
                "dependency" => Array("element" => "prpl_hover_cl_enable","value" => array("1")),                    
                "param_name" => "prpl_color_default_h",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ),
            array(
                "type" => "kswr_message",
                "dependency" => Array("element" => "prpl_color_default_h","value" => array("0")),                    
                "title" => esc_html__( "Name Color Settings", "kaswara" ),
                "param_name" => "prpl_namecolorh_settings",
                "group" => "Hover Style", 
                "mtop" => "10px"
             ),
            array(
                "type" => "colorpicker",
                "group" => "Hover Style",            
                "value" => "#333",
                "dependency" => Array("element" => "prpl_color_default_h","value" => array("0")),                    
                "heading" => esc_html__( "Plan Name Color", "kaswara" ),
                "param_name" => "prpl_name_color_h"
            ),
            array(
                "type" => "kswr_message",
                "dependency" => Array("element" => "prpl_color_default_h","value" => array("0")),                    
                "title" => esc_html__( "Price Color Settings", "kaswara" ),
                "param_name" => "prpl_pricecolorh_settings",
                "group" => "Hover Style", 
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_gradient",
                "heading" => esc_html__( "Price Color", "kaswara" ),
                "dependency" => Array("element" => "prpl_color_default_h","value" => array("0")),                    
                "value" => '{"type":"color", "color1":"#279eca", "color2":"#279eca", "direction":"to left"}',
                "param_name" => "prpl_price_color_h",            
                "group" => "Hover Style",
            ),  
            array(
                "type" => "kswr_message",
                "dependency" => Array("element" => "prpl_color_default_h","value" => array("0")),                    
                "title" => esc_html__( "Unit Color Settings", "kaswara" ),
                "param_name" => "prpl_unitcolorh_settings",
                "group" => "Hover Style", 
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_gradient",
                "heading" => esc_html__( "Unit Color", "kaswara" ),
                "dependency" => Array("element" => "prpl_color_default_h","value" => array("0")),                    
                "value" => '{"type":"color", "color1":"#279eca", "color2":"#279eca", "direction":"to left"}',
                "param_name" => "prpl_unit_color_h",            
                "group" => "Hover Style",
            ),  
            array(
                "type" => "kswr_message",
                "dependency" => Array("element" => "prpl_color_default_h","value" => array("0")),                    
                "title" => esc_html__( "Plan Color Settings", "kaswara" ),
                "param_name" => "prpl_plancolorh_settings",
                "group" => "Hover Style", 
                "mtop" => "10px"
             ),
            array(
                "type" => "colorpicker",
                "group" => "Hover Style",            
                "value" => "#888",
                "dependency" => Array("element" => "prpl_color_default_h","value" => array("0")),                    
                "heading" => esc_html__( "Plan Info Color", "kaswara" ),
                "param_name" => "prpl_info_color_h"
            ),
            array(
                "type" => "kswr_message",
                "dependency" => Array("element" => "prpl_color_default_h","value" => array("0")),                    
                "title" => esc_html__( "Container Color Settings", "kaswara" ),
                "param_name" => "prpl_containercolorh_settings",
                "group" => "Hover Style", 
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_gradient",
                "heading" => esc_html__( "Container Background Color", "kaswara" ),
                "dependency" => Array("element" => "prpl_color_default_h","value" => array("0")),                    
                "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
                "param_name" => "prpl_cnt_back_h",            
                "group" => "Hover Style",
            ),  
             array(
                "type" => "kswr_border",
                'bordergradient' => 'enable',
                "heading" => esc_html__( "Container Border Styling", "kaswara" ),         
                "dependency" => Array("element" => "prpl_color_default_h","value" => array("0")),                    
                "group" => "Hover Style",                 
                "param_name" => "prpl_cnt_border_h"
             ),
           

            //Typography
             array(
                "type" => "kswr_message",
                "title" => esc_html__( "Font Settings", "kaswara" ),
                "param_name" => "prpl_font_settings",
                "group" => "Typography", 
                "mtop" => "10px"
             ),
              array(
                "type" => "kswr_switcher",
                "group" => "Typography", 
                "heading" => esc_html__( "Use Default Settings", "kaswara" ),
                "param_name" => "prpl_font_default",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ),

            array(
                "type" => "kswr_message",
                "title" => esc_html__( "Name Font Settings", "kaswara" ),
                "dependency" => Array("element" => "prpl_font_default","value" => array("0")),                                                
                "param_name" => "prpl_namefont_settings",
                "group" => "Typography", 
                "mtop" => "10px"
             ),

            array(
                "type" => "kswr_fontsize",
                "dependency" => Array("element" => "prpl_font_default","value" => array("0")),                                                
                "param_name" => "prpl_name_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "defaults"=> array("font-size" => "15px", "line-height" => "", "letter-spacing" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing"                
                )
            ), 

             array(
                "type" => "kswr_fontstyle",
                "param_name" => "prpl_name_fstyle",
                "dependency" => Array("element" => "prpl_font_default","value" => array("0")),                                                
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "700", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),

            array(
                "type" => "kswr_message",
                "title" => esc_html__( "Price Font Settings", "kaswara" ),
                "dependency" => Array("element" => "prpl_font_default","value" => array("0")),                                                
                "param_name" => "prpl_pricefont_settings",
                "group" => "Typography", 
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_fontsize",
                "dependency" => Array("element" => "prpl_font_default","value" => array("0")),                                                
                "param_name" => "prpl_price_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "defaults"=> array("font-size" => "25px", "line-height" => "", "letter-spacing" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing"                
                )
            ), 

             array(
                "type" => "kswr_fontstyle",
                "param_name" => "prpl_price_fstyle",
                "dependency" => Array("element" => "prpl_font_default","value" => array("0")),                                                
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "600", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),
            
             array(
                "type" => "kswr_message",
                "title" => esc_html__( "Unit Font Settings", "kaswara" ),
                "dependency" => Array("element" => "prpl_font_default","value" => array("0")),                                                
                "param_name" => "prpl_unitfont_settings",
                "group" => "Typography", 
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_fontsize",
                "dependency" => Array("element" => "prpl_font_default","value" => array("0")),                                                
                "param_name" => "prpl_unit_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "defaults"=> array("font-size" => "18px", "line-height" => "", "letter-spacing" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing"                
                )
            ), 

             array(
                "type" => "kswr_fontstyle",
                "param_name" => "prpl_unit_fstyle",
                "dependency" => Array("element" => "prpl_font_default","value" => array("0")),                                                
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "600", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),
            
            array(
                "type" => "kswr_message",
                "title" => esc_html__( "Info Font Settings", "kaswara" ),
                "dependency" => Array("element" => "prpl_font_default","value" => array("0")),                                                
                "param_name" => "prpl_infofont_settings",
                "group" => "Typography", 
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_fontsize",
                "dependency" => Array("element" => "prpl_font_default","value" => array("0")),                                                
                "param_name" => "prpl_info_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "defaults"=> array("font-size" => "14px", "line-height" => "", "letter-spacing" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing"                
                )
            ), 
             array(
                "type" => "kswr_fontstyle",
                "param_name" => "prpl_info_fstyle",
                "dependency" => Array("element" => "prpl_font_default","value" => array("0")),                                                
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),

             //Box Shadow
              array(
               "type" => "dropdown",
                "heading" => esc_html__( 'Enable Box Shadow','kaswara'),
                "param_name" => "prpl_bxshadow_enabled",           
                "value" => array(
                        "No" => "off",
                        "Yes" => "on",
                    ),         
                "group" => "Box Shadow",
            ),
             array(
               "type" => "dropdown",
                "heading" => esc_html__( 'Enable Box Shadow On Hover','kaswara'),
                "param_name" => "prpl_bxshadow_hover_enabled",          
                "value" => array(
                        "No" => "off",
                        "Yes" => "on",
                    ),         
                "group" => "Box Shadow",
            ),
            
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Box Shadow Style', 'kaswara' ),
                'group' => 'Box Shadow',
                'param_name' => 'prpl_bxshadow_style',                
                'value' => array(
                    esc_html__( 'Style 1','kaswara') => 'style1',
                    esc_html__( 'Style 2','kaswara') => 'style2',
                    esc_html__( 'Style 3','kaswara') => 'style3',
                    esc_html__( 'Style 4','kaswara') => 'style4',
                    esc_html__( 'Style 5','kaswara') => 'style5',
                    esc_html__( 'Style 6','kaswara') => 'style6',
                    esc_html__( 'Style 7','kaswara') => 'style7',
                    esc_html__( 'Style 8','kaswara') => 'style8',
                    esc_html__( 'Style 9','kaswara') => 'style9'
                )               
            ),
            array(
                "type" => "colorpicker",
                "value" => "rgba(0,0,0,0.8)",
                "group" => "Box Shadow", 
                "heading" => esc_html__( "Box Shadow Color", "kaswara" ),
                "param_name" => "prpl_bxshadow_color"
            ), 
            
            //Distances
              array(
                "type" => "kswr_distance",
                "distance" => "padding",            
                "param_name" => "prpl_cnt_paddings",
                "heading" => esc_html__( "Container Paddings", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Distances"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "prpl_cnt_margin",
                "heading" => esc_html__( "Container Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Distances"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "prpl_name_margin",
                "heading" => esc_html__( "Name Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Distances"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "prpl_price_margin",
                "heading" => esc_html__( "Price Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Distances"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "prpl_unit_margin",
                "heading" => esc_html__( "Unit Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Distances"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "prpl_info_margin",
                "heading" => esc_html__( "Info Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Distances"
            ),
        )
    ));        
}
add_action( 'init', 'kswr_pricingplan_shortcode' ); 



?>