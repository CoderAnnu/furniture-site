<?php 
/*------------------------------------------------
            ICONBOXACTION  SHORTCODE
------------------------------------------------*/
function kswr_iconboxaction_shortcode() {
    vc_map( array(
        "name" => esc_html__( "Icon Box Action", "kaswara" ),
      	"category" => "Kaswara",                      
        "description" => esc_html__("Icon box ingfo with button", "kaswara"),                 
        'icon' => KASWARA_IMAGES.'small/interactiveiconbox.jpg',  
        "base" => "kswr_iconboxaction",      
        "params" => array(            
            array(
                "type" => "dropdown", 
                "group" => "General",            
                "heading" => esc_html__("Box Style", "kaswara"),
                "param_name" => "icbb_style",
                "value" => array(
                    esc_html__("Normal","kaswara") => 'effect1',
                    esc_html__("Hover Effect","kaswara") => 'effect2',
                    esc_html__("Icon in The Back","kaswara") => 'effect3'
                )
            ), 
            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Box Min Height", "kaswara" ),
                "group" => "General",
                "param_name" => "icbb_height",          
                "value" => 250
            ),
            
            array(
                "type" => "kswr_switcher",
                "group" => "General", 
                "heading" => esc_html__( "Use Picture", "kaswara" ),
                "param_name" => "icbb_image_enable",
                'default' => '0',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ), 
            array(
                "type" => "attach_image",
                'group' => 'General',
                "dependency" => Array("element" => "icbb_image_enable","value" => array('1')),            
                "heading" => esc_html__( "Upload Image", "kaswara" ),
                "param_name" => "icbb_image"
            ),
            array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Picture Width", "kaswara" ),
                "param_name" => "icbb_image_width",
                "dependency" => Array("element" => "icbb_image_enable","value" => array('1')),            
                "value" => 35,
                "group" => 'General' 
             ),
             array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Picture Height", "kaswara" ),
                "param_name" => "icbb_image_height",
                "dependency" => Array("element" => "icbb_image_enable","value" => array('1')),            
                "value" => 35,
                "group" => 'General' 
             ),
             array(
	            "type" => "kswr_iconchooser",
	            "class" => "",
                "dependency" => Array("element" => "icbb_image_enable","value" => array('0')),            
	            "heading" => esc_html__("Select Icon","kaswara"),          
	            "param_name" => "icbb_icon",
	            "value" => "",
	            "group" => "General",
	        ),
             array(
                "type" => "dropdown", 
                "group" => "General",            
                "heading" => esc_html__("Hover Style", "kaswara"),
                "param_name" => "icbb_icon_hover_style_3",
                "dependency" => Array("element" => "icbb_style","value" => array("effect3")),                
                "value" => array(
                    esc_html__("Scale Up","kaswara") => 'scaleup',
                    esc_html__("Scale Down","kaswara") => 'scaledown',
                    esc_html__("Move Up","kaswara") => 'moveup',
                    esc_html__("Move Down","kaswara") => 'movedown',
                )
            ), 
            array(
                "type" => "dropdown", 
                "group" => "General",            
                "heading" => esc_html__("Hover Style", "kaswara"),
                "param_name" => "icbb_icon_hover_style_2",
                "dependency" => Array("element" => "icbb_style","value" => array("effect2")),                
                "value" => array(
                    esc_html__("Scale","kaswara") => 'scale',
                    esc_html__("Translate","kaswara") => 'translate'
                )
            ), 

             array(
	            "type" => "kswr_message",  "group" => "General",
                "dependency" => Array("element" => "icbb_image_enable","value" => array('0')),            
	            "title" => esc_html__("Icon Settings","kaswara"),            	           
	            "param_name" => "icbb_icon_style_sections",
	            "mtop" => "10px"
	         ),
	        array(
	            "type" => "kswr_switcher",  "group" => "General",
                "dependency" => Array("element" => "icbb_image_enable","value" => array('0')),            
	            "heading" => esc_html__( "Use Default Settings", "kaswara" ),
	            "param_name" => "icbb_icon_style_def",
	            'default' => '1',
	            'on' => array('text' => 'ON','val' => '1' ),
	            'off'=> array('text' => 'OFF','val' => '0') 
	         ),  
            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Icon Size", "kaswara" ),
	            "dependency" => Array("element" => "icbb_icon_style_def","value" => array('0')),            
                "group" => "General",
                "param_name" => "icbb_icon_size",          
                "value" => 36
            ),           
            array(
                "type" => "colorpicker",
	            "dependency" => Array("element" => "icbb_icon_style_def","value" => array('0')),            
                "group" => "General", 
                "value" => "#bbb",
                "heading" => esc_html__( "Icon Color", "kaswara" ),
                "param_name" => "icbb_icon_color"           
            ),
            array(
                "type" => "colorpicker",
	            "dependency" => Array("element" => "icbb_icon_style_def","value" => array('0')),            
                "value" => "#bbb",
                "group" => "General", 
                "heading" => esc_html__( "Icon Color on Hover", "kaswara" ),
                "param_name" => "icbb_icon_hover_color"           
            ),            
           
            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Icon Area Border Bottom Height", "kaswara" ),
	            "dependency" => Array("element" => "icbb_icon_style_def","value" => array('0')),            
                "group" => "General",
                "param_name" => "icbb_icon_bb_height",          
                "value" => 0
            ), 
            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Icon Area Border Bottom Width", "kaswara" ),
	            "dependency" => Array("element" => "icbb_icon_style_def","value" => array('0')),            
                "group" => "General",
                "param_name" => "icbb_icon_bb_width",          
                "value" => 0
            ),                       
            array(
                "type" => "colorpicker",
	            "dependency" => Array("element" => "icbb_icon_style_def","value" => array('0')),            
                "value" => "#eee",
                "group" => "General", 
                "heading" => esc_html__( "Icon Area Border Bottomn Color", "kaswara" ),
                "param_name" => "icbb_icon_bb_color"           
            ),
            
            //Content Area
            array(
                "type" => "textfield",
                "group" => "Content", 
                "heading" => esc_html__( "Title", "kaswara" ),
                "param_name" => "icbb_title"
            ),    


            //Title Font Settings           
            array(
	            "type" => "kswr_message",
	            "title" => esc_html__( "Title Font Settings", "kaswara" ),
	            "group" => "Typography",                 
	            "param_name" => "icbb_title_font_sections",
	            "mtop" => "10px"
	         ),
	        array(
	            "type" => "kswr_switcher",
	            "heading" => esc_html__( "Use Default Font", "kaswara" ),
	            "group" => "Typography",                 
	            "param_name" => "icbb_title_font_def",
	            'default' => '1',
	            'on' => array('text' => 'ON','val' => '1' ),
	            'off'=> array('text' => 'OFF','val' => '0') 
	         ),         
	        array(
	            "type" => "kswr_fontsize",
	            "param_name" => "icbb_title_size",
	            "group" => "Typography",                 
	            "heading" => esc_html__( "Font Size", "kaswara" ),
	            "dependency" => Array("element" => "icbb_title_font_def","value" => array('0')),            
	            "defaults"=> array("font-size" => "17px","letter-spacing" => "","line-height" => ""),
	            'elements'  => array(
               		 esc_html__("Line Height","kaswara") => "line-height",
	                esc_html__("Font Size","kaswara") => "font-size",
	                esc_html__("Letter Spacing","kaswara") => "letter-spacing"           
	            )
	        ),  
	        array(
	            "type" => "kswr_fontstyle",
	            "param_name" => "icbb_title_style",
	            "heading" => esc_html__("Font Style","kaswara"),
	            "value" => "",
	            "dependency" => Array("element" => "icbb_title_font_def","value" => array('0')),
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
                "param_name" => "icbb_title_color" ,
                "value" => "#444"         
            ),      
			
			//Sub Title Font      
            array(
                "type" => "textfield",
                "group" => "Content", 
                "heading" => esc_html__( "Sub-Title", "kaswara" ),
                "param_name" => "icbb_subtitle"
            ),

            array(
	            "type" => "kswr_message",
	            "title" =>  esc_html__( "SubTitle Font Settings", "kaswara" ),            
	            "group" => "Typography",                 
	            "param_name" => "icbb_subtitle_font_sections",
	            "mtop" => "10px"
	         ),
	        array(
	            "type" => "kswr_switcher",
	            "heading" => esc_html__( "Use Default Font", "kaswara" ),
	            "group" => "Typography",                 
	            "param_name" => "icbb_subtitle_font_def",
	            'default' => '1',
	            'on' => array('text' => 'ON','val' => '1' ),
	            'off'=> array('text' => 'OFF','val' => '0') 
	         ),         
	        array(
	            "type" => "kswr_fontsize",
	            "param_name" => "icbb_subtitle_size",
	            "group" => "Typography",                 
	            "heading" => esc_html__( "Font Size", "kaswara" ),
	            "dependency" => Array("element" => "icbb_subtitle_font_def","value" => array('0')),            
	            "defaults"=> array("font-size" => "14px","letter-spacing" => "","line-height" => ""),
	            'elements'  => array(
              	   esc_html__("Line Height","kaswara") => "line-height",
	                esc_html__("Font Size","kaswara") => "font-size",
	                esc_html__("Letter Spacing","kaswara") => "letter-spacing"           
	            )
	        ),  
	        array(
	            "type" => "kswr_fontstyle",
	            "param_name" => "icbb_subtitle_style",
	            "heading" => esc_html__("Font Style","kaswara"),
	            "value" => "",
	            "dependency" => Array("element" => "icbb_subtitle_font_def","value" => array('0')),
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
                "heading" => esc_html__( "Sub-Title Color", "kaswara" ),
                "param_name" => "icbb_subtitle_color" ,
                "value" => "#888"         
            ),
            
            //Info Font Settings
            array(
                "type" => "textarea",
                "group" => "Content", 
                "heading" => esc_html__( "Info Text", "kaswara" ),
                "param_name" => "icbb_info"
            ),

             array(
	            "type" => "kswr_message",
	            "title" => esc_html__( "Info Font Settings", "kaswara" ),            
	            "group" => "Typography",                 
	            "param_name" => "icbb_info_font_sections",
	            "mtop" => "10px"
	         ),
	        array(
	            "type" => "kswr_switcher",
	            "heading" => esc_html__( "Use Default Font", "kaswara" ),
	            "group" => "Typography",                 
	            "param_name" => "icbb_info_font_def",
	            'default' => '1',
	            'on' => array('text' => 'ON','val' => '1' ),
	            'off'=> array('text' => 'OFF','val' => '0') 
	         ),         
	        array(
	            "type" => "kswr_fontsize",
	            "param_name" => "icbb_info_size",
	            "group" => "Typography",                 
	            "heading" => esc_html__( "Font Size", "kaswara" ),
	            "dependency" => Array("element" => "icbb_info_font_def","value" => array('0')),            
	            "defaults"=> array("font-size" => "14px","letter-spacing" => "", "line-height" => "",),
	            'elements'  => array(
	                esc_html__("Font Size","kaswara") => "font-size",
             	    esc_html__("Line Height","kaswara") => "line-height",
	                esc_html__("Letter Spacing","kaswara") => "letter-spacing"           
	            )
	        ),  
	        array(
	            "type" => "kswr_fontstyle",
	            "param_name" => "icbb_info_style",
	            "heading" => esc_html__("Font Style","kaswara"),
	            "value" => "",
	            "dependency" => Array("element" => "icbb_info_font_def","value" => array('0')),
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
                "heading" => esc_html__( "Info Color", "kaswara" ),
                "param_name" => "icbb_info_color" ,
                "value" => "#888"         
            ),

            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Title Area Border Bottom Height", "kaswara" ),
                "group" => "Content",
                "param_name" => "icbb_title_bb_height",          
                "value" => 0
            ), 
            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Title Area Border Bottom Width", "kaswara" ),
                "group" => "Content",
                "param_name" => "icbb_title_bb_width",          
                "value" => 0
            ),                       
            array(
                "type" => "colorpicker",
                "group" => "Content", 
                "heading" => esc_html__( "Title Area Border Bottom Color", "kaswara" ),
                "param_name" => "icbb_title_bb_color"           
            ),
            
            //Button Settings
            //icbb_button
            array(
                "type" => "textfield",
                "group" => "Button", 
                "heading" => esc_html__( "Button Text", "kaswara" ),
                "param_name" => "icbb_button_text",
                "value" => "Button Text"
            ),
            array(
                "type" => "vc_link",
                "group" => "Button", 
                "heading" => esc_html__( "Button Link", "kaswara" ),
                "param_name" => "icbb_button_link"
            ),

            
            array(
               "type" => "dropdown",
                "heading" => esc_html__( 'Enable Button Hover','kaswara'),
                "param_name" => "icbb_button_hover_enabled",           
                "dependency" => Array("element" => "icbb_style","value" => array("effect1","effect3")),                
                "value" => array(
                        "Yes" => "on",
                        "No" => "off",
                    ),         
                "group" => "Button",
            ),           
           array(
	            "type" => "kswr_message",
	            "title" => esc_html__("Button Font Settings", "kaswara" ),            
	            "group" => "Typography",                 
	            "param_name" => "icbb_button_font_section",
	            "mtop" => "10px"
	         ),
	        array(
	            "type" => "kswr_switcher",
	            "heading" => esc_html__( "Use Default Font", "kaswara" ),
	            "group" => "Typography",                 
	            "param_name" => "icbb_button_font_def",
	            'default' => '1',
	            'on' => array('text' => 'ON','val' => '1' ),
	            'off'=> array('text' => 'OFF','val' => '0') 
	         ),         
	        array(
	            "type" => "kswr_fontsize",
	            "param_name" => "icbb_button_size",
	            "group" => "Typography",                 
	            "heading" => esc_html__( "Font Size", "kaswara" ),
	            "dependency" => Array("element" => "icbb_button_font_def","value" => array('0')),            
	            "defaults"=> array("font-size" => "14px","letter-spacing" => "", "line-height" => "",),
	            'elements'  => array(
	                esc_html__("Font Size","kaswara") => "font-size",
             	    esc_html__("Line Height","kaswara") => "line-height",
	                esc_html__("Letter Spacing","kaswara") => "letter-spacing"           
	            )
	        ),  
	        array(
	            "type" => "kswr_fontstyle",
	            "param_name" => "icbb_button_style",
	            "heading" => esc_html__("Font Style","kaswara"),
	            "value" => "",
	            "dependency" => Array("element" => "icbb_button_font_def","value" => array('0')),
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
	            "title" => esc_html__("Button Settings","kaswara"),            
	            "group" => "Button",                 
	            "param_name" => "icbb_button_style_sections",
	            "mtop" => "10px"
	         ),
	        array(
	            "type" => "kswr_switcher",
	            "heading" => esc_html__( "Use Default Settings", "kaswara" ),
	            "group" => "Button",                 
	            "param_name" => "icbb_button_style_def",
	            'default' => '1',
	            'on' => array('text' => 'ON','val' => '1' ),
	            'off'=> array('text' => 'OFF','val' => '0') 
	         ),   
	         array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Button Height", "kaswara" ),
	            "dependency" => Array("element" => "icbb_button_style_def","value" => array('0')),                            
                "group" => "Button",
                "param_name" => "icbb_button_height",          
                "value" => 35
            ), 
            array(
                "type" => "colorpicker",
                "group" => "Button", 
                "heading" => esc_html__( "Text Color", "kaswara" ),
	            "dependency" => Array("element" => "icbb_button_style_def","value" => array('0')),                            
                "param_name" => "icbb_button_color",
                "value" => '#ddd'           
            ),
            array(
                "type" => "colorpicker",
                "group" => "Button", 
	            "dependency" => Array("element" => "icbb_button_style_def","value" => array('0')),                            
                "heading" => esc_html__( "Background Color", "kaswara" ),
                "param_name" => "icbb_button_bg",
                "value" => '#222'              
            ),
            array(
                "type" => "kswr_number",          
	            "dependency" => Array("element" => "icbb_button_style_def","value" => array('0')),                            
                "heading" => esc_html__( "Border Size", "kaswara" ),
                "group" => "Button",
                "param_name" => "icbb_button_border_size",          
                "value" => 1
            ), 
            array(
                "type" => "colorpicker",
                "group" => "Button", 
	            "dependency" => Array("element" => "icbb_button_style_def","value" => array('0')),                            
                "heading" => esc_html__( "Border Color", "kaswara" ),
                "param_name" => "icbb_button_border_color",
                "value" => '#1a1a1a'              
            ),
            
            array(
                "type" => "colorpicker",
                "group" => "Button", 
	            "dependency" => Array("element" => "icbb_button_style_def","value" => array('0')),                            
                "heading" => esc_html__( "Text Color (onHover)", "kaswara" ),
                "param_name" => "icbb_button_color_hover",
                "value" => '#fff'           
            ),
            array(
                "type" => "colorpicker",
                "group" => "Button", 
	            "dependency" => Array("element" => "icbb_button_style_def","value" => array('0')),                            
                "heading" => esc_html__( "Background Color (onHover)", "kaswara" ),
                "param_name" => "icbb_button_bg_hover",
                "value" => '#222'              
            ),
            array(
                "type" => "colorpicker",
                "group" => "Button", 
	            "dependency" => Array("element" => "icbb_button_style_def","value" => array('0')),                            
                "heading" => esc_html__( "Border Color (onHover)", "kaswara" ),
                "param_name" => "icbb_button_border_hover",
                "value" => '#000'              
            ),            

            
            //Margins
            array(
                "type" => "kswr_distance",
                "distance" => "padding",
                "heading" => "Icon Margins",
                "param_name" => "icbb_icon_padding",
                "defaults"=> array(
                    "top" => "0px",
                    "bottom" => "15px"
                ),
                'group' => 'Margins',
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom",
                )
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "padding",
                "heading" => "Title Margins",
                "param_name" => "icbb_title_padding",
                "defaults"=> array(
                    "top" => "0px",
                    "bottom" => "15px"
                ),
                'group' => 'Margins',
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom",
                )
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "padding",
                "heading" => "Info Margins",
                "param_name" => "icbb_info_padding",
                "defaults"=> array(
                    "top" => "0px",
                    "bottom" => "15px"
                ),
                'group' => 'Margins',
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom",
                )
            ), 
        )
    ));
} 
add_action( 'init', 'kswr_iconboxaction_shortcode' );



?>