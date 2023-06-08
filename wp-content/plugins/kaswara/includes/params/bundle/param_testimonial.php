<?php 
/*------------------------------------------------
            TESTMONIAL  SHORTCODE
------------------------------------------------*/
function kswr_testmonial_shortcode() {
    vc_map( array(
        "name" => esc_html__( "Testimonial", "kaswara" ),
        'icon' => KASWARA_IMAGES.'small/quotes.jpg',  
        "category" => "Kaswara",                
        "description" => esc_html__("Testimonial area with different layout and design", "kaswara"),                 
        "base" => "kswr_testmonial",      
        "params" => array(
        	array(
                "type" => "kswr_switcher",
                "group" => "Information", 
                "heading" => esc_html__( "Enable Picture Avatar", "kaswara" ),
                "param_name" => "picture_enable",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ),
             array(
                "type" => "attach_image",
                "dependency" => Array("element" => "picture_enable","value" => array('1')),            
                 "group" => "Information", 
                "heading" => esc_html__( "Thumbnail Avatar", "kaswara" ),
                "param_name" => "img"
            ),

            array(
                "type" => "dropdown", 
                 "group" => "Information",            
                "heading" => esc_html__("Style ", "kaswara"),
                "param_name" => "style",
                "value" => array(
                    esc_html__("Normal","kaswara") => 'style1',
                    esc_html__("Bubble","kaswara") => 'style2',
                    esc_html__("Modern","kaswara") => 'style3',
                )
            ),
            //Normal Style Effects 
            array(
                "type" => "dropdown", 
                 "group" => "Information",            
                "heading" => esc_html__("Normal Layout Style", "kaswara"),
                "dependency" => Array("element" => "style","value" => array("style1")),                
                "param_name" => "tm_normal_layout",
                "value" => array(
                    esc_html__("Style 1","kaswara") => 'style1',
                    esc_html__("Style 2","kaswara") => 'style2',
                    esc_html__("Style 3","kaswara") => 'style3',
                    esc_html__("Style 4","kaswara") => 'style4',
                    esc_html__("Style 5","kaswara") => 'style5',
                    //  esc_html__("Style 6","kaswara") => 'style6',
                )
            ),

            array(
                "type" => "dropdown",
                "group" => "Information", 
                "heading" => esc_html__( "Thumbnail Position", "kaswara" ),
                "description" => esc_html__( "Only for style Modern & Bubble ", "kaswara" ),
                "param_name" => "position", 
                "value" => array(
                    esc_html__("Left","kaswara") => 'left',
                    esc_html__("Right","kaswara") => 'right'
                ),
                "dependency" => Array("element" => "style","value" => array("style2","style3")),
            ),
            array(
                "type" => "textfield",
                 "group" => "Information", 
                "heading" => esc_html__( "Name", "kaswara" ),
                "param_name" => "name"
            ),
            array(
                "type" => "textfield",
                "group" => "Information", 
                "heading" => esc_html__( "Title", "kaswara" ),
                "param_name" => "title"
            ), 
            array(
                "type" => "textarea_html",
                "group" => "Information", 
                "heading" => esc_html__( "Content", "kaswara" ),
                "param_name" => "content",
                "edit_field_class" => "ult_hide_editor_fullscreen vc_col-xs-12 vc_column wpb_el_type_textarea_html vc_wrapper-param-type-textarea_html vc_shortcode-param",  
            ),

            //Name Font
             array(
                "type" => "kswr_message",
                "group" => "Typography",
                "title" => esc_html__( "Name Font Settings", "kaswara" ),       
                "param_name" => "test_name_text_typography",
                "mtop" => "10px"
            ),     

            array(
                "type" => "kswr_fontsize",
                "param_name" => "test_name_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),             
                "defaults"=> array("font-size" => "16px", "line-height" => "", "letter-spacing" => "",),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing"               
                )
            ), 
             array(
                "type" => "kswr_fontstyle",
                "param_name" => "test_name_fstyle",
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
                "type" => "colorpicker",
                "group" => "Typography", 
                "heading" => esc_html__( "Name Text Color", "kaswara" ),
                "param_name" => "name_color"
            ),
            
             array(
                "type" => "kswr_message",
                "group" => "Typography",
                "title" => esc_html__( "Title Font Settings", "kaswara" ),       
                "param_name" => "test_title_text_typography",
                "mtop" => "10px"
            ),     

            array(
                "type" => "kswr_fontsize",
                "param_name" => "test_title_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),             
                "defaults"=> array("font-size" => "12px", "line-height" => "", "letter-spacing" => "",),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing"               
                )
            ), 
             array(
                "type" => "kswr_fontstyle",
                "param_name" => "test_title_fstyle",
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
                "type" => "colorpicker",
                "group" => "Typography", 
                "heading" => esc_html__( "Title Color", "kaswara" ),
                "param_name" => "title_color"
            ),
           //Content FOnt ettings

             array(
                "type" => "kswr_message",
                "group" => "Typography",
                "title" => esc_html__( "Content Font Settings", "kaswara" ),       
                "param_name" => "test_content_text_typography",
                "mtop" => "10px"
            ),     

            array(
                "type" => "kswr_fontsize",
                "param_name" => "test_content_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),             
                "defaults"=> array("font-size" => "14px", "line-height" => "", "letter-spacing" => "",),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing"               
                )
            ), 
             array(
                "type" => "kswr_fontstyle",
                "param_name" => "test_content_fstyle",
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
                "type" => "colorpicker",
                "group" => "Typography", 
                "heading" => esc_html__( "Content Color", "kaswara" ),
                "param_name" => "content_color"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Colors", 
                "heading" => esc_html__( "Background Color", "kaswara" ),
                "param_name" => "bg",
                'value' => "transparent"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Colors", 
                "heading" => esc_html__( "Content Background", "kaswara" ),
                "param_name" => "bubble_bg", 
                'value' => "transparent", 
                //"dependency" => Array("element" => "style","value" => array("style2","style3")),
            ),
            array(
                "type" => "colorpicker",
                "group" => "Colors", 
                "heading" => esc_html__( "Icon Color", "kaswara" ),
                "param_name" => "tm_icon_color", 
                'value' => "#eee", 
            ),

            array(
                "type" => "dropdown",
                "group" => "Colors", 
                "heading" => esc_html__( "Icon Style", "kaswara" ),
                "description" => esc_html__( "Choose the quote icon", "kaswara" ),
                "param_name" => "icon_style", 
                "value" => array(
                    esc_html__("Normal","kaswara") => 'km-icon-quote-',
                    esc_html__("Rounded","kaswara") => 'km-icon-quotes-',
                ),         
            ),

             array(
                "type" => "dropdown",
                "group" => "Colors", 
                "heading" => esc_html__( "Icon Orientation", "kaswara" ),
                "description" => esc_html__( "Choose the quote icon orientation", "kaswara" ),
                "param_name" => "icon_orientation", 
                "value" => array(
                    esc_html__("Right","kaswara") => 'right',
                    esc_html__("Left","kaswara") => 'left',
                ),         
            ),

            array(
                "type" => "kswr_distance",
                "distance" => "margin",
                "heading" => "Container Margins",
                "param_name" => "testi_container_margin",
                'group' => 'Styling',
                "positions" => array(
                   esc_html__("Top","kaswara") => "top",
                   esc_html__("Bottom","kaswara") => "bottom",
                )
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "padding",
                "heading" => "Content Paddings",
                "param_name" => "testi_content_padding",
                "defaults"=> array(
                    "top" => "6px",
                    "bottom" => "6px"
                ),
                'group' => 'Styling',
                "dependency" => Array("element" => "style","value" => "style1"),                
                "positions" => array(
                   esc_html__("Top","kaswara") => "top",
                   esc_html__("Bottom","kaswara") => "bottom",
                )
            ), 
            array(
                "type" => "kswr_message",
                "title" => esc_html__('Icon Styling','kaswara'),
                "param_name" => "testii_text",
                "group" => "Styling",
                "mtop" => "10px",                
                "dependency" => Array("element" => "style","value" => "style1"),                                
            ),         
            array(
                "type" => "kswr_distance",
                "distance" => "padding",
                "heading" => "Icon Paddings",
                "param_name" => "testi_icon_padding",
                "defaults"=> array(
                    "top" => "6px",
                    "bottom" => "6px"
                ),
                'group' => 'Styling',
                "dependency" => Array("element" => "style","value" => "style1"),                
                "positions" => array(
                   esc_html__("Top","kaswara") => "top",
                   esc_html__("Bottom","kaswara") => "bottom",
                )
            ),

            array(
                "type" => "kswr_distance",
                "distance" => "border",
                "heading" => "Icon Borders",
                "param_name" => "testi_icon_border",
                'group' => 'Styling',
                "dependency" => Array("element" => "style","value" => "style1"),                
                "positions" => array(
                   esc_html__("Top","kaswara") => "top",
                   esc_html__("Bottom","kaswara") => "bottom",               
                   esc_html__("Width","kaswara") => "width",
                )
            ),
            array(
                "type" => "colorpicker",
                "group" => "Styling", 
                "heading" => esc_html__( "Icon Border Color", "kaswara" ),
                "dependency" => Array("element" => "style","value" => "style1"),                
                "param_name" => "icon_b_color",
                'value' => "#eee"
            ),
            array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Icon Size", "kaswara" ),
                "param_name" => "icon_size",
                "dependency" => Array("element" => "style","value" => "style1"),                
                "value" => 32,
                "group" => "Styling"   
            ),    
             array(
                "type" => "kswr_message",
                "title" => esc_html__('Picture Styling','kaswara'),
                "param_name" => "testipic_text",
                "group" => "Styling",
                "mtop" => "10px",                
                "dependency" => Array("element" => "style","value" => "style1"),                                
            ),           
            array(
                "type" => "kswr_distance",
                "distance" => "padding",
                "heading" => "Picture Paddings",
                "param_name" => "testi_picture_padding",
                "defaults"=> array(
                    "top" => "0px",
                    "bottom" => "0px"
                ),
                'group' => 'Styling',
                "dependency" => Array("element" => "style","value" => "style1"),                
                "positions" => array(
                   esc_html__("Top","kaswara") => "top",
                   esc_html__("Bottom","kaswara") => "bottom",
                )
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "border",
                "heading" => "Picture Borders",
                "param_name" => "testi_picture_border",
                "defaults"=> array(
                    "width" => "50%",
                ),
                'group' => 'Styling',
                "dependency" => Array("element" => "style","value" => "style1"),                
                "positions" => array(
                   esc_html__("Top","kaswara") => "top",
                   esc_html__("Bottom","kaswara") => "bottom",
                   esc_html__("Through","kaswara") => "through",
                   esc_html__("Width","kaswara") => "width",
                )
            ),

            array(
                "type" => "colorpicker",
                "group" => "Styling", 
                "heading" => esc_html__( "Picture Border Color", "kaswara" ),
                "dependency" => Array("element" => "style","value" => "style1"),                
                "param_name" => "picture_b_color",
                'value' => "#eee"
            ),
             array(
                "type" => "kswr_message",
                "title" => esc_html__('Information Styling','kaswara'),
                "param_name" => "testii_text",
                "group" => "Styling",
                "mtop" => "10px",
                "dependency" => Array("element" => "style","value" => "style1"),                                
            ),  
            array(
                "type" => "kswr_distance",
                "distance" => "padding",
                "heading" => "Info Paddings",
                "param_name" => "testi_info_padding",
                "defaults"=> array(
                    "top" => "6px",
                    "bottom" => "6px"
                ),
                'group' => 'Styling',
                "dependency" => Array("element" => "style","value" => "style1"),                
                "positions" => array(
                   esc_html__("Top","kaswara") => "top",
                   esc_html__("Bottom","kaswara") => "bottom",
                )
            ),

            array(
                "type" => "kswr_distance",
                "distance" => "border",
                "heading" => "Information Borders",
                "param_name" => "testi_info_border",
                'group' => 'Styling',
                "dependency" => Array("element" => "style","value" => "style1"),                
                "positions" => array(
                   esc_html__("Top","kaswara") => "top",
                   esc_html__("Bottom","kaswara") => "bottom",               
                   esc_html__("Width","kaswara") => "width",
                )
            ),
            array(
                "type" => "colorpicker",
                "group" => "Styling", 
                "heading" => esc_html__( "Information Border Color", "kaswara" ),
                "dependency" => Array("element" => "style","value" => "style1"),                
                "param_name" => "info_b_color",
                'value' => "#eee"
            ),


        )
    ));
} 
add_action( 'init', 'kswr_testmonial_shortcode' );

?>