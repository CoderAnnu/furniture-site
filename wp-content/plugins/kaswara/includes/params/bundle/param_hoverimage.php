<?php 
/*------------------------------------------------
         Hover Image  SHORTCODE
------------------------------------------------*/
function kswr_hoverimage_shortcode() {
     vc_map( array(
        "name" => esc_html__( "Hover Single Image", "kaswara" ),
        'icon' => KASWARA_IMAGES.'small/hoverimage.jpg',  
      	"category" => "Kaswara",                      
        "description" => esc_html__("Single Image with hover effect and link", "kaswara"),         
        "base" => "kswr_hoverimage",      
        "params" => array(                   
            array(
                "type" => "attach_image",
                'group' => 'General',
                "heading" => esc_html__( "Upload Image", "kaswara" ),
                "param_name" => "hover_image_image"
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Image Hover Style', 'kaswara' ),
                'group' => 'General',
                'param_name' => 'hover_image_style',
                'value' => array(
                    esc_html__( 'Style 1','kaswara') => 'style1',
                    esc_html__( 'Style 2','kaswara') => 'style2',
                    esc_html__( 'Style 3','kaswara') => 'style3',
                    esc_html__( 'Style 4','kaswara') => 'style4',
                    esc_html__( 'Style 5','kaswara') => 'style5'
                )               
            ),
            array(
               "type" => "dropdown",
                "heading" => esc_html__( 'Enable Box Shadow','kaswara'),
                "param_name" => "hover_image_bxshadow_enabled",           
                "value" => array(
                        "No" => "off",
                        "Yes" => "on",
                    ),         
                "group" => "General",
            ),
             array(
               "type" => "dropdown",
                "heading" => esc_html__( 'Enable Box Shadow On Hover','kaswara'),
                "param_name" => "hover_image_bxshadow_hover_enabled",          
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
                'param_name' => 'hover_image_bxshadow_style',                
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
                "group" => "General", 
                "heading" => esc_html__( "Box Shadow Color", "kaswara" ),
                "param_name" => "hover_image_bxshadow_color"
            ), 

            array(
                "type" => "colorpicker",
                "value" => "#fff",
                "group" => "General", 
                "heading" => esc_html__( "Element Backgound", "kaswara" ),
                "param_name" => "hover_image_background"
            ),  
            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Border Width", "kaswara" ),
                'group' => 'General',
                "param_name" => "hover_image_border_width",
                "value" => 0
            ),
            array(
                "type" => "colorpicker",
                "value" => "transparent",
                "group" => "General", 
                "heading" => esc_html__( "Border Color", "kaswara" ),
                "param_name" => "hover_image_border_color"
            ),  
             array(
               "type" => "dropdown",
                 "heading" => esc_html__( 'Enable Image Overlay','kaswara'),
                "param_name" => "hover_image_overlay_enabled",          
                "value" => array(
                        "Yes" => "on",
                        "No" => "off",
                    ),         
                "group" => "General",
            ),
            array(
                "type" => "colorpicker",
                "value" => "rgba(0,0,0,0.5)",
                "dependency" => Array("element" => "hover_image_overlay_enabled","value" => array("on")),                
                "group" => "General", 
                "heading" => esc_html__( "Image Overlay Backgound Color", "kaswara" ),
                "param_name" => "hover_image_overlay_bg"
            ),  
            array(
                "type" => "vc_link",
                "group" => "General", 
                "heading" => esc_html__( "Image Link", "kaswara" ),
                "param_name" => "hover_image_link"
            ),
            array(
                "type" => "textfield",
                "group" => "General", 
                "heading" => esc_html__( "Images Classes", "kaswara" ),
                "description" => esc_html__( "Add new classes sperated by (space)", "kaswara" ),
                "param_name" => "hover_image_classes"
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( 'Enable Button','kaswara'),
                "param_name" => "hover_image_button_enabled",         
                "value" => array(
                        "Yes" => "on",
                        "No" => "off",
                    ),         
                "group" => "Button",
            ),

            array(
                "type" => "colorpicker",
                "value" => "#fff",
                "group" => "Button", 
                "heading" => esc_html__( "Text Color", "kaswara" ),
                "dependency" => Array("element" => "hover_image_button_enabled","value" => array("on")),                                
                "param_name" => "hover_image_button_color"
            ), 
             array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Button Height (px)", "kaswara" ),
                "dependency" => Array("element" => "hover_image_button_enabled","value" => array("on")),                                
                'group' => 'Button',
                "param_name" => "hover_image_button_height",
                "value" => 32
            ),

             array(
                "type" => "colorpicker",
                "value" => "#121212",
                "group" => "Button", 
                "heading" => esc_html__( "Button Backgound Color", "kaswara" ),
                "dependency" => Array("element" => "hover_image_button_enabled","value" => array("on")),                                
                "param_name" => "hover_image_button_bg"
            ),  
            array(
                "type" => "textfield",
                "group" => "Button", 
                "value" => "Go Button",
                "heading" => esc_html__( "Button Text", "kaswara" ),
                "dependency" => Array("element" => "hover_image_button_enabled","value" => array("on")),                                
                "param_name" => "hover_image_button_text"
            ),
            
            array(
                "type" => "dropdown",
               "heading" => esc_html__( 'Enable Information Area','kaswara'),
                "param_name" => "hover_image_info_enabled",       
                "value" => array(
                        "Yes" => "on",
                        "No" => "off",
                    ),         
                "group" => "Information",
            ),
       

            array(
                "type" => "textfield",
                "group" => "Information", 
                "dependency" => Array("element" => "hover_image_info_enabled","value" => array("on")),                                                
                "heading" => esc_html__( "Title", "kaswara" ),
                "param_name" => "hover_image_title"
            ), 
            
            //Title Font 
            array(
	            "type" => "kswr_message",
                "dependency" => Array("element" => "hover_image_info_enabled","value" => array("on")),                                                
	            "group" => "Typography", 
	            "title" => esc_html__( "Title Font Settings", "kaswara" ),
	            "param_name" => "himg_title_font_sections",
	            "mtop" => "10px"
	         ),
	         array(
	            "type" => "kswr_fontsize",
                "dependency" => Array("element" => "hover_image_info_enabled","value" => array("on")),                                                
	            "param_name" => "himg_title_size",
	            "group" => "Typography",                 
	            "heading" => esc_html__( "Font Size", "kaswara" ),
	            "defaults"=> array("font-size" => "16px", "line-height" => "", "letter-spacing" => ""),
	            'elements'  => array(
	               esc_html__("Font Size","kaswara") => "font-size",
	               esc_html__("Line Height","kaswara") => "line-height",
	               esc_html__("Letter Spacing","kaswara") => "letter-spacing"                
	            )
	        ), 

	         array(
	            "type" => "kswr_fontstyle",
	            "param_name" => "himg_title_style",
                "dependency" => Array("element" => "hover_image_info_enabled","value" => array("on")),                                                
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
                "value" => "#333",
                "group" => "Typography",
                "dependency" => Array("element" => "hover_image_info_enabled","value" => array("on")),   
                "heading" => esc_html__( "Title Color", "kaswara" ),
                "param_name" => "hover_image_title_color"
            ), 
             array(
                "type" => "dropdown",
                "heading" => esc_html__( 'Enable SubTitle','kaswara'),
                "dependency" => Array("element" => "hover_image_info_enabled","value" => array("on")),  
                "param_name" => "hover_image_info_subtitle_enabled",    
                "value" => array(
                        "Yes" => "on",
                        "No" => "off",
                    ),         
                "group" => "Information",
            ),
            
            array(
                "type" => "textfield",
                "group" => "Information",                 
                "dependency" => Array("element" => "hover_image_info_enabled","value" => array("on")),  
                "heading" => esc_html__( "SubTitle", "kaswara" ),
                "param_name" => "hover_image_subtitle"
            ), 
            
             //SubTitle Font 
            array(
	            "type" => "kswr_message",
                "dependency" => Array("element" => "hover_image_info_enabled","value" => array("on")),                                                
	            "group" => "Typography", 
	            "title" => esc_html__( "Sub Title Font Settings", "kaswara" ),
	            "param_name" => "himg_subtitle_font_sections",
	            "mtop" => "10px"
	         ),
	         array(
	            "type" => "kswr_fontsize",
                "dependency" => Array("element" => "hover_image_info_enabled","value" => array("on")),                                                
	            "param_name" => "himg_subtitle_size",
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
	            "param_name" => "himg_subtitle_style",
                "dependency" => Array("element" => "hover_image_info_enabled","value" => array("on")),                                                
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
                "value" => "#777",
                "group" => "Typography", 
                "dependency" => Array("element" => "hover_image_info_enabled","value" => array("on")),  
                "heading" => esc_html__( "SubTitle Color", "kaswara" ),
                "param_name" => "hover_image_subtitle_color"
            ), 


            //Button Font 
            array(
	            "type" => "kswr_message",
                "dependency" => Array("element" => "hover_image_button_enabled","value" => array("on")),                                                
	            "group" => "Typography", 
	            "title" => esc_html__( "Button Font Settings", "kaswara" ),
	            "param_name" => "himg_button_font_sections",
	            "mtop" => "10px"
	         ),
	         array(
	            "type" => "kswr_fontsize",
                "dependency" => Array("element" => "hover_image_button_enabled","value" => array("on")),                                                
	            "param_name" => "himg_button_size",
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
	            "param_name" => "himg_button_style",
                "dependency" => Array("element" => "hover_image_button_enabled","value" => array("on")),                                                
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
                'type' => 'dropdown',
                'heading' => esc_html__( 'Text Align', 'kaswara' ),
                'group' => 'Information',
                "dependency" => Array("element" => "hover_image_info_enabled","value" => array("on")),  
                'param_name' => 'hover_image_info_align',
                'value' => array(
                    esc_html__( 'Center','kaswara') => 'center',
                    esc_html__( 'Left','kaswara') => 'left',
                    esc_html__( 'Right','kaswara') => 'right'
                )               
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "margin",
                "heading" => esc_html__("Element Margins","kaswara"),
                "param_name" => "hover_image_el_margin",
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

        )
    )
    );
 }

add_action( 'init', 'kswr_hoverimage_shortcode' );

?>