<?php 
/*------------------------------------------------
         PRICE BOX SHORTCODE
------------------------------------------------*/
function kswr_pricebox_shortcode(){
    vc_map( array(
        "name" => esc_html__( "Price Box", "kaswara" ),
        "description" => esc_html__("Price box tables element with multiple styles", "kaswara"),         
        'icon' => KASWARA_IMAGES.'small/pricebox.jpg',  
        "category" => "Kaswara",        
        "base" => "kswr_pricebox",      
        "params" => array(                   
            //Content
            array(
                "type" => "dropdown",
                 "heading" => esc_html__( 'Price Box Style','kaswara'),
                 "param_name" => "prbx_style",           
                 "value" => array(
                    esc_html__('Style 1','kaswara') => 'style1',
                    esc_html__('Style 2','kaswara') => 'style2',
                    esc_html__('Style 3','kaswara') => 'style3',
                    esc_html__('Style 4','kaswara') => 'style4',
                    esc_html__('Style 5','kaswara') => 'style5',
                    esc_html__('Style 6','kaswara') => 'style6',
                    esc_html__('Style 7','kaswara') => 'style7',                                      
                ),         
                "group" => "Content",
            ),
            array(//Shady
                "type" => "kswr_number",
                "dependency" => Array("element" => "prbx_style","value" => array('style3','style4','style7')),                    
                "value" => 150,
                "group" => "Content", 
                "max" => 500,      
                "heading" => esc_html__( "Price Round Size", "kaswara" ),
                "param_name" => "prbx_price_round_size"
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Package Name", "kaswara" ),
                "param_name" => "prbx_name",              
                "group" => "Content",
                "admin_label" => true   
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Package Subtilte", "kaswara" ),
                "param_name" => "prbx_subtitle",              
                "group" => "Content",            
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Package Price", "kaswara" ),
                "description" => esc_html__( "example : 50", "kaswara" ),
                "param_name" => "prbx_price",              
                "group" => "Content",            
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Package Currency", "kaswara" ),
                "description" => esc_html__( "example : $", "kaswara" ),
                "param_name" => "prbx_currency",              
                "group" => "Content",            
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Package Unit", "kaswara" ),
                "description" => esc_html__( "example : /month", "kaswara" ),
                "param_name" => "prbx_unit",              
                "group" => "Content",            
            ),
            array(
                "type" => "textarea_html",
                "heading" => esc_html__( "Content Info", "kaswara" ),
                "description" => esc_html__( "Each info in new line", "kaswara" ),
                "param_name" => "content",
                "value" => "",           
                "group" => "Content",
                "edit_field_class" => "ult_hide_editor_fullscreen vc_col-xs-12 vc_column wpb_el_type_textarea_html vc_wrapper-param-type-textarea_html vc_shortcode-param",  
            ),
            
            //Typography
            array(
                "type" => "kswr_message",
                "group" => "Typography", 
                "title" => esc_html__( "Name Font Settings", "kaswara" ),
                "param_name" => "prbx_name_f_section",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_fontsize",
                "param_name" => "prbx_name_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "defaults"=> array("font-size" => "15px", "line-height" => "", "letter-spacing" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing",                                 
                )
            ), 

             array(
                "type" => "kswr_fontstyle",
                "param_name" => "prbx_name_fstyle",
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),
            array(
                "type" => "kswr_message",
                "group" => "Typography", 
                "title" => esc_html__( "Subtitle Font Settings", "kaswara" ),
                "param_name" => "prbx_subtitle_f_section",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_fontsize",
                "param_name" => "prbx_subtitle_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "defaults"=> array("font-size" => "13px", "line-height" => "", "letter-spacing" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing",                                 
                )
            ), 

             array(
                "type" => "kswr_fontstyle",
                "param_name" => "prbx_subtitle_fstyle",
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),
            
            array(
                "type" => "kswr_message",
                "group" => "Typography", 
                "title" => esc_html__( "Price Font Settings", "kaswara" ),
                "param_name" => "prbx_price_f_section",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_fontsize",
                "param_name" => "prbx_price_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "defaults"=> array("font-size" => "21px", "line-height" => "", "letter-spacing" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing",                                 
                )
            ), 
            array(
                "type" => "kswr_fontstyle",
                "param_name" => "prbx_price_fstyle",
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),
            array(
                "type" => "kswr_message",
                "group" => "Typography", 
                "title" => esc_html__( "Currency Font Settings", "kaswara" ),
                "param_name" => "prbx_currency_f_section",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_fontsize",
                "param_name" => "prbx_currency_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "defaults"=> array("font-size" => "13px", "line-height" => "", "letter-spacing" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing",                                 
                )
            ), 
            array(
                "type" => "kswr_fontstyle",
                "param_name" => "prbx_currency_fstyle",
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),
            array(
                "type" => "kswr_message",
                "group" => "Typography", 
                "title" => esc_html__( "Unit Font Settings", "kaswara" ),
                "param_name" => "prbx_unit_f_section",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_fontsize",
                "param_name" => "prbx_unit_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "defaults"=> array("font-size" => "12px", "line-height" => "", "letter-spacing" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing",                                 
                )
            ), 
            array(
                "type" => "kswr_fontstyle",
                "param_name" => "prbx_unit_fstyle",
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),
            array(
                "type" => "kswr_message",
                "group" => "Typography", 
                "title" => esc_html__( "Content Font Settings", "kaswara" ),
                "param_name" => "prbx_content_f_section",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_fontsize",
                "param_name" => "prbx_content_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "defaults"=> array("font-size" => "14px", "line-height" => "", "letter-spacing" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing",                                 
                )
            ), 
            array(
                "type" => "kswr_fontstyle",
                "param_name" => "prbx_content_fstyle",
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),

            //Colors
            array(
                "type" => "colorpicker",
                "group" => "Color",                   
                "value" => "#333",
                "heading" => esc_html__( "Name Color", "kaswara" ),
                "param_name" => "prbx_name_clr"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Color",                   
                "value" => "#333",
                "heading" => esc_html__( "Subtitle Color", "kaswara" ),
                "param_name" => "prbx_subtitle_clr"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Color",                   
                "value" => "#333",
                "heading" => esc_html__( "Price Color", "kaswara" ),
                "param_name" => "prbx_price_clr"
            ), 
            array(
                "type" => "colorpicker",
                "group" => "Color",                   
                "value" => "#333",
                "heading" => esc_html__( "Currency Color", "kaswara" ),
                "param_name" => "prbx_currency_clr"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Color",                   
                "value" => "#333",
                "heading" => esc_html__( "Unit Color", "kaswara" ),
                "param_name" => "prbx_unit_clr"
            ), 
            array(
                "type" => "colorpicker",
                "group" => "Color",                   
                "value" => "#333",
                "heading" => esc_html__( "Content Color", "kaswara" ),
                "param_name" => "prbx_content_clr"
            ),

            //Backgrounds
            array(
                "type" => "kswr_gradient",
                "group" => "Backgrounds",            
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',               
                "heading" => esc_html__( "Container Background Color", "kaswara" ),
                "param_name" => "prbx_container_background"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => "Backgrounds",            
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',               
                "heading" => esc_html__( "Name Area Background", "kaswara" ),
                "param_name" => "prbx_name_ar_bg"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => "Backgrounds",            
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',               
                "heading" => esc_html__( "Price Area Background", "kaswara" ),
                "param_name" => "prbx_price_ar_bg"
            ),
            array(//Shady
                "dependency" => Array("element" => "prbx_style","value" => array('style3','style4','style7')),                    
                "type" => "kswr_gradient",
                "group" => "Backgrounds",            
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',               
                "heading" => esc_html__( "Price Round Area Background", "kaswara" ),
                "param_name" => "prbx_price_round_bg"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => "Backgrounds",            
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',               
                "heading" => esc_html__( "Content Area Background", "kaswara" ),
                "param_name" => "prbx_content_ar_bg"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => "Backgrounds",            
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',               
                "heading" => esc_html__( "Button Area Background", "kaswara" ),
                "param_name" => "prbx_button_ar_bg"
            ),

            //Borders
            array(
                "type" => "kswr_message",
                "group" => "Borders", 
                "title" => esc_html__( "Container Borders", "kaswara" ),
                "param_name" => "prbx_container_border",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_border",
                'bordergradient' => 'enable',
                "group" => "Borders",                
                "heading" => esc_html__( "Border Styling", "kaswara" ),
                "param_name" => "prbx_container_br"
            ),

            array(
                "type" => "kswr_message",
                "group" => "Borders", 
                "title" => esc_html__( "Name Area Borders", "kaswara" ),
                "param_name" => "prbx_name_border",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "border",            
                "param_name" => "prbx_name_ar_br",            
                "heading" => esc_html__( "Border Width", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Borders"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Borders",                   
                "value" => "transparent",
                "heading" => esc_html__( "Border Color", "kaswara" ),
                "param_name" => "prbx_name_ar_br_clr"
            ),

            array(
                "type" => "kswr_message",
                "group" => "Borders", 
                "title" => esc_html__( "Price Area Borders", "kaswara" ),
                "param_name" => "prbx_price_border",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "border",            
                "param_name" => "prbx_price_ar_br",            
                "heading" => esc_html__( "Border Width", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Borders"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Borders",                   
                "value" => "transparent",
                "heading" => esc_html__( "Border Color", "kaswara" ),
                "param_name" => "prbx_price_ar_br_clr"
            ),


            array(//Shady
                "type" => "kswr_message",
                "dependency" => Array("element" => "prbx_style","value" => array('style3','style4','style7')),                    
                "group" => "Borders", 
                "title" => esc_html__( "Price Round Area Borders", "kaswara" ),
                "param_name" => "prbx_priceround_border",
                "mtop" => "10px"
            ),
            array(//Shady
                "type" => "kswr_distance",
                "dependency" => Array("element" => "prbx_style","value" => array('style3','style4','style7')),                    
                "distance" => "border",            
                "param_name" => "prbx_price_round_br",            
                "heading" => esc_html__( "Border Width", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Borders"
            ),
            array(//Shady
                "type" => "colorpicker",
                "dependency" => Array("element" => "prbx_style","value" => array('style3','style4','style7')),                    
                "group" => "Borders",                   
                "value" => "transparent",
                "heading" => esc_html__( "Border Color", "kaswara" ),
                "param_name" => "prbx_price_round_br_clr"
            ),

            array(
                "type" => "kswr_message",
                "group" => "Borders", 
                "title" => esc_html__( "Content Area Borders", "kaswara" ),
                "param_name" => "prbx_content_border",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "border",            
                "param_name" => "prbx_content_ar_br",            
                "heading" => esc_html__( "Border Width", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Borders"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Borders",                   
                "value" => "transparent",
                "heading" => esc_html__( "Border Color", "kaswara" ),
                "param_name" => "prbx_content_ar_br_clr"
            ),

            array(
                "type" => "kswr_message",
                "group" => "Borders", 
                "title" => esc_html__( "Button Area Borders", "kaswara" ),
                "param_name" => "prbx_buttonarea_border",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "border",            
                "param_name" => "prbx_button_ar_br",            
                "heading" => esc_html__( "Border Width", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Borders"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Borders",                   
                "value" => "transparent",
                "heading" => esc_html__( "Border Color", "kaswara" ),
                "param_name" => "prbx_button_ar_br_clr"
            ),

            array(
               "type" => "dropdown",
                "heading" => esc_html__( 'Enable Box Shadow','kaswara'),
                "param_name" => "prbx_boxshadow_enabled",           
                "value" => array(
                    "No" => "off",
                    "Yes" => "on",
                ),         
                "group" => "Borders",
            ),
             array(
               "type" => "dropdown",
                "heading" => esc_html__( 'Enable Box Shadow On Hover','kaswara'),
                "param_name" => "prbx_boxshadow_hover_enabled",          
                "value" => array(
                    "No" => "off",
                    "Yes" => "on",
                ),         
                "group" => "Borders",
            ),
            
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Box Shadow Style', 'kaswara' ),
                'group' => 'Borders',
                'param_name' => 'prbx_boxshadow_style',                
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
                "group" => "Borders", 
                "heading" => esc_html__( "Box Shadow Color", "kaswara" ),
                "param_name" => "prbx_boxshadow_color"
            ), 

            //Paddings
            array(
                "type" => "kswr_distance",
                "distance" => "padding",            
                "param_name" => "prbx_name_paddings",            
                "heading" => esc_html__( "Name Area paddings", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Paddings"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "padding",            
                "param_name" => "prbx_price_paddings",            
                "heading" => esc_html__( "Price Area paddings", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Paddings"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "padding",            
                "param_name" => "prbx_content_ar_paddings",            
                "heading" => esc_html__( "Content Area paddings", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Paddings"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "padding",            
                "param_name" => "prbx_button_ar_paddings",            
                "heading" => esc_html__( "Button Area paddings", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Paddings"
            ),

            //---------------------------------------
            //BUTTON
            //---------------------------------------
            array(
                "type" => "vc_link",
                "heading" => esc_html__( "Link", "kaswara" ),
                "param_name" => "prbx_btn_link",
                "value" => '',
                "group" => 'Button',
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Button Text", "kaswara" ),
                "admin_label" => true,
                "param_name" => "prbx_btn_txt",
                "group" => 'Button',
            ),
            array(
                "type" => "dropdown",
                 "heading" => esc_html__( 'Button Layout','kaswara'),
                 "param_name" => "prbx_btn_layout",           
                 "value" => array(
                    esc_html__('No Icon','kaswara') => 'noicon',
                    esc_html__('With Icon','kaswara') => 'withicon',
                    esc_html__('Just Icon','kaswara') => 'justicon',
                ),         
                "group" => 'Button',
            ),
            array(
                "type" => "dropdown",
                 "heading" => esc_html__( 'Button Hover Style','kaswara'),
                 "param_name" => "prbx_btn_style",           
                 "value" => array(
                    esc_html__('None','kaswara') => 'none',
                    esc_html__('Fade','kaswara') => 'qaswara',
                    esc_html__('Push Left','kaswara') => 'pushleft',
                    esc_html__('Push Right','kaswara') => 'pushright',
                    esc_html__('Push Top','kaswara') => 'pushtop',
                    esc_html__('Push Bottom','kaswara') => 'pushbottom',
                    esc_html__('Fill Left','kaswara') => 'fillleft',
                    esc_html__('Fill Right','kaswara') => 'fillright',
                    esc_html__('Fill Top','kaswara') => 'filltop',
                    esc_html__('Fill Bottom','kaswara') => 'fillbottom',
                    esc_html__('Scale Down','kaswara') => 'scaledown',
                    esc_html__('Scale Up','kaswara') => 'scaleup',
                    esc_html__('Rotate Left','kaswara') => 'rotateleft',
                    esc_html__('Rotate Right','kaswara') => 'rotateright',
                    esc_html__('Rotate Bottom','kaswara') => 'rotatebottom',
                    esc_html__('Rotate Top','kaswara') => 'rotatetop',        
                ),         
                "group" => 'Button',
            ),

            array(
                "type" => "dropdown",
                 "heading" => esc_html__( 'Button Hover Action','kaswara'),
                 "param_name" => "prbx_btn_hover_action",           
                 "value" => array(
                    esc_html__('None','kaswara') => 'none',
                    esc_html__('Zoom in','kaswara') => 'scaleup',
                    esc_html__('Zoom Out','kaswara') => 'scaledown',
                ),         
                "group" => 'Button',
            ),
            array(
                "type" => "kswr_iconchooser",
                "class" => "",
                "heading" =>esc_html__("Select Icon","kaswara"),
                "description" =>esc_html__("Only if Icon Enbaled","kaswara"),
                "param_name" => "prbx_btn_icon",
                "value" => "",
                "group" => 'Button',
            ),

            array(
                "type" => "kswr_message",
                "group" => 'Button',
                "title" => esc_html__( "General Styling", "kaswara" ),
                "param_name" => "prbx_btn_default_sections",
                "mtop" => "10px"
             ),           
            array(
                "type" => "kswr_number",
                "value" => 75,
                "group" => 'Button',
                "max" => 1200,
                "heading" => esc_html__( "Button Width (px)", "kaswara" ),
                "param_name" => "prbx_btn_width"
            ),
            array(
                "type" => "kswr_number",
                "value" => 28,
                "group" => 'Button',
                "max" => 1200,
                "heading" => esc_html__( "Button Height (px)", "kaswara" ),
                "param_name" => "prbx_btn_height"
            ),
            array(
                "type" => "kswr_number",
                "value" => 0,
                "group" => 'Button',
                "max" => 500,
                "heading" => esc_html__( "Border Radius (px)", "kaswara" ),
                "param_name" => "prbx_btn_border_radius"
            ),

            array(
                "type" => "kswr_gradient",
                "group" => 'Button',
                "value" => '{"type":"color", "color1":"#111", "color2":"#111", "direction":"to left"}',
                "heading" => esc_html__( "Background Color", "kaswara" ),
                "param_name" => "prbx_btn_bg"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => 'Button',
                "value" => '{"type":"color", "color1":"#111", "color2":"#111", "direction":"to left"}',
                "heading" => esc_html__( "Hover Background Color", "kaswara" ),
                "param_name" => "prbx_btn_bg_hover"
            ),

            array(
                "type" => "kswr_gradient",
                "group" => 'Button',
                "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
                "heading" => esc_html__( "Text Color", "kaswara" ),
                "param_name" => "prbx_btn_clr"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => 'Button',
                "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
                "heading" => esc_html__( "Hover Text Color", "kaswara" ),
                "param_name" => "prbx_btn_clr_hover"
            ),
             array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "prbx_btn_margins",
                "heading" => esc_html__( "Button Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => 'Button',
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "padding",            
                "param_name" => "prbx_btn_paddings",
                "heading" => esc_html__( "Button Paddings", "kaswara" ),
                "positions" => array(
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right"
                ),
                "group" => 'Button',
            ),

            array(
                "type" => "dropdown",
                "heading" => esc_html__( 'Button Alignement','kaswara'),
                "param_name" => "prbx_btn_align",           
                "value" => array(
                    "Left" => "left",
                    "Center" => "center",
                    "Right" => "right",
                ),         
                "group" => 'Button',
            ),

            array(
                "type" => "kswr_message",
                "group" => 'Button',
                "title" => esc_html__( "Font Settings", "kaswara" ),
                "param_name" => "prbx_btn_font_sections",
                "mtop" => "10px"
             ),
             array(
                "type" => "kswr_fontsize",
                "param_name" => "prbx_btn_ftsize",
                "group" => 'Button',
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "defaults"=> array("font-size" => "12px", "line-height" => "", "letter-spacing" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing",              
                )
            ), 

             array(
                "type" => "kswr_fontstyle",
                "param_name" => "prbx_btn_ftstyle",
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => 'Button',
            ),

             array(
                "type" => "kswr_message",
                "group" => 'Button',
                "title" => esc_html__( "Border Settings", "kaswara" ),
                "param_name" => "prbx_btn_border_sections",
                "mtop" => "10px"
             ),
             array(
                "type" => "kswr_border",
                'bordergradient' => 'enable',
                "group" => 'Button',
                "heading" => esc_html__( "Border Styling", "kaswara" ),
                "param_name" => "prbx_btn_bdr"
            ),
             array(
                "type" => "kswr_border",
                'bordergradient' => 'enable',
                "group" => 'Button',
                "heading" => esc_html__( "Border Styling onHover", "kaswara" ),
                "param_name" => "prbx_btn_bdr_hover"
            ),
            

            array(
                "type" => "kswr_message",
                "group" => 'Button',
                "title" => esc_html__( "Icon Settings", "kaswara" ),
                "param_name" => "prbx_btn_icon_sections",
                "mtop" => "10px"
             ), 
            array(
                "type" => "dropdown",
                "heading" => esc_html__( 'Icon Position','kaswara'),
                "param_name" => "prbx_btn_icon_position",           
                "value" => array(
                    "Left" => "left",             
                    "Right" => "right",
                ),         
                "group" => 'Button',
            ),
            
            array(
                "type" => "kswr_number",
                "value" => 26,
                "group" => 'Button',
                "max" => 500,
                "heading" => esc_html__( "Icon Size (px)", "kaswara" ),
                "param_name" => "prbx_btn_icon_size"
            ),

            array(
                "type" => "kswr_gradient",
                "group" => 'Button',
                "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
                "heading" => esc_html__( "Icon Color", "kaswara" ),
                "param_name" => "prbx_btn_icon_clr"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => 'Button',
                "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
                "heading" => esc_html__( "Hover Icon Color", "kaswara" ),
                "param_name" => "prbx_btn_icon_clr_hover"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "padding",            
                "param_name" => "prbx_btn_icon_paddings",
                "heading" => esc_html__( "Icon Paddings", "kaswara" ),
                "positions" => array(
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right"
                ),
                "group" => 'Button',
            ),



        )
    ));        
}
add_action( 'init', 'kswr_pricebox_shortcode' ); 



?>