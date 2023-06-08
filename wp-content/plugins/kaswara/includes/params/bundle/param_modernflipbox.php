<?php 
/*------------------------------------------------
         CARD FLIP SHORTCODE
------------------------------------------------*/
function kswr_modernflipbox_shortcode(){
    vc_map( array(
        "name" => esc_html__( "Modern Flip Box", "kaswara" ),
        "description" => esc_html__("Flip box with modern look", "kaswara"),         
        'icon' => KASWARA_IMAGES.'small/flip.jpg',  
        "category" => "Kaswara",        
        "base" => "kswr_modernflipbox",      
        "params" => array(      

            //General     
            array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Element Min-Height", "kaswara" ),
                "param_name" => "mdnflb_minheight",              
                "value" => 300,
                "group" => 'General' 
             ),        
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Flip To ', 'kaswara' ),
                'group' => 'General',
                'param_name' => 'mdnflb_layout',
                'value' => array(
                    esc_html__( 'Left','kaswara') => 'toleft',
                    esc_html__( 'Right','kaswara') => 'toright',
                    esc_html__( 'Bottom','kaswara') => 'tobottom',
                    esc_html__( 'Top','kaswara') => 'totop',
                )               
            ),
            array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Container Border Radius", "kaswara" ),
                "param_name" => "mdnflb_container_radius",
                "value" => 0,
                "group" => 'General' 
             ),       
              array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Content Rown Position', 'kaswara' ),
                'group' => 'General',
                'param_name' => 'mdnflb_rowposition',
                'value' => array(
                    esc_html__( 'Middle','kaswara') => 'middle',
                    esc_html__( 'Top','kaswara') => 'top',
                    esc_html__( 'Bottom','kaswara') => 'bottom',
              
                )               
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Content Column Position', 'kaswara' ),
                'group' => 'General',
                'param_name' => 'mdnflb_columnposition',
                'value' => array(
                    esc_html__( 'Center','kaswara') => 'center',
                    esc_html__( 'Left','kaswara') => 'left',
                    esc_html__( 'Right','kaswara') => 'right',
              
                )               
            ),      
            //Front
            array(
                "type" => "kswr_message",
                "group" => "Front",
                "title" => esc_html__( "Front Section Settings", "kaswara" ),       
                "param_name" => "front_sections",
                "mtop" => "10px"
            ),
        
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Title", "kaswara" ),
                "param_name" => "mdnflb_front_title",            
                "group" => "Front",
                "admin_label" => true   
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Sub Title", "kaswara" ),
                "param_name" => "mdnflb_front_subtitle",            
                "group" => "Front",
            ), 
            array(
                "type" => "kswr_switcher",
                "group" => "Front", 
                "heading" => esc_html__( "Use Picture", "kaswara" ),
                "param_name" => "mdnflb_img_enable",
                'default' => '0',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ), 
            array(
                "type" => "attach_image",
                'group' => 'Front',
                "dependency" => Array("element" => "mdnflb_img_enable","value" => array('1')),            
                "heading" => esc_html__( "Upload Image", "kaswara" ),
                "param_name" => "mdnflb_img"
            ),
            array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Picture Width", "kaswara" ),
                "param_name" => "mdnflb_img_width",
                "dependency" => Array("element" => "mdnflb_img_enable","value" => array('1')),            
                "value" => 50,
                "group" => 'Front' 
             ),
             array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Picture Height", "kaswara" ),
                "param_name" => "mdnflb_img_height",
                "dependency" => Array("element" => "mdnflb_img_enable","value" => array('1')),            
                "value" => 50,
                "group" => 'Front' 
             ),
             array(
                "type" => "kswr_iconchooser",
                "class" => "",
                "heading" =>esc_html__("Select Icon","kaswara"),
                "dependency" => Array("element" => "mdnflb_img_enable","value" => array('0')),                            
                "description" =>esc_html__("Choose Your Icon","kaswara"),
                "param_name" => "mdnflb_icon",
                "value" => "",
                "group" => "Front",
            ),  
             //Front Styling
             array(
                "type" => "kswr_message",
                "group" => "Front",
                "title" => esc_html__( "Front Styling Settings", "kaswara" ),       
                "param_name" => "frontstyling_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_switcher",
                "group" => "Front", 
                "heading" => esc_html__( "Use Default Styling", "kaswara" ),
                "param_name" => "mdnflb_front_style_def",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ), 
            array(
                "type" => "colorpicker",
                "group" => "Front",   
                "dependency" => Array("element" => "mdnflb_front_style_def","value" => array('0')),           
                "value" => "#333",
                "heading" => esc_html__( "Title Color", "kaswara" ),
                "param_name" => "mdnflb_front_title_color"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Front",            
                "value" => "#888",
                "dependency" => Array("element" => "mdnflb_front_style_def","value" => array('0')),   
                "heading" => esc_html__( "Sub Title Color", "kaswara" ),
                "param_name" => "mdnflb_front_subtitle_color"
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Choose Background Type', 'kaswara' ),
                'group' => 'Front',
                "dependency" => Array("element" => "mdnflb_front_style_def","value" => array("0")),                    
                'param_name' => 'mdnflb_front_bg_type',
                'value' => array(
                    esc_html__( 'Color','kaswara') => 'color',
                    esc_html__( 'Background Image','kaswara') => 'image'
                )               
            ),
            array(
                "type" => "attach_image",
                "dependency" => Array("element" => "mdnflb_front_bg_type","value" => array('image')),                         
                'group' => 'Front',
                "heading" => esc_html__( "Upload Image", "kaswara" ),
                "param_name" => "mdnflb_front_backgroundimage_img"
            ),
             array(
                "type" => "kswr_background",
                "group" => "Front",
                "heading" => esc_html__( "Background Image Settings", "kaswara" ), 
                "dependency" => Array("element" => "mdnflb_front_bg_type","value" => array('image')),                         
                "param_name" => "mdnflb_front_backgroundimage",
                "mtop" => "10px"
            ),
             array(
                "type" => "kswr_gradient",
                "group" => "Front",            
                "value" => '{"type":"color", "color1":"#fafafa", "color2":"transparent", "direction":"to left"}',
                "dependency" => Array("element" => "mdnflb_front_bg_type","value" => array('color')),                         
                "heading" => esc_html__( "Container Background", "kaswara" ),
                "param_name" => "mdnflb_front_background"
            ),
            array(
                "type" => "kswr_border",
                'bordergradient' => 'enable',
                "heading" => esc_html__( "Container Border Styling", "kaswara" ),         
                "dependency" => Array("element" => "mdnflb_front_style_def","value" => array("0")),                    
                "group" => "Front",                 
                "param_name" => "mdnflb_front_border"
             ),
            array(
                "type" => "kswr_message",
                "group" => "Front",
                "title" => esc_html__( "Icon Styling Settings", "kaswara" ), 
                "dependency" => Array("element" => "mdnflb_front_style_def","value" => array("0")),                                          
                "param_name" => "icontyling_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Icon Size", "kaswara" ),
                "param_name" => "mdnflb_icon_size",
                "dependency" => Array("element" => "mdnflb_front_style_def","value" => array('0')),            
                "value" => 32,
                "group" => 'Front' 
             ),
            array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Icon Background Size", "kaswara" ),
                "param_name" => "mdnflb_icon_bgsize",
                "dependency" => Array("element" => "mdnflb_front_style_def","value" => array('0')),            
                "value" => 52,
                "group" => 'Front' 
             ),
             array(
                "type" => "kswr_gradient",
                "group" => "Front",            
                "value" => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
                "dependency" => Array("element" => "mdnflb_front_style_def","value" => array("0")),                    
                "heading" => esc_html__( "Icon Color", "kaswara" ),
                "param_name" => "mdnflb_icon_color"
            ),
              array(
                "type" => "kswr_gradient",
                "group" => "Front",            
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
                "dependency" => Array("element" => "mdnflb_front_style_def","value" => array("0")),                    
                "heading" => esc_html__( "Icon Background Color", "kaswara" ),
                "param_name" => "mdnflb_icon_bgcolor"
            ),

            array(
                "type" => "kswr_border",
                "heading" => esc_html__( "Icon Border Styling", "kaswara" ),         
                "dependency" => Array("element" => "mdnflb_front_style_def","value" => array("0")),                    
                "group" => "Front",                 
                "param_name" => "mdnflb_icon_br"
            ),
            array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Border Radius", "kaswara" ),
                "param_name" => "mdnflb_icon_br_radius",
                "dependency" => Array("element" => "mdnflb_front_style_def","value" => array('0')),            
                "value" => 0,
                "group" => 'Front' 
            ),  

            //Back
            array(
                "type" => "kswr_message",
                "group" => "Back",
                "title" => esc_html__( "Back Section Settings", "kaswara" ),       
                "param_name" => "back_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Title", "kaswara" ),
                "param_name" => "mdnflb_back_title",            
                "group" => "Back"
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Sub Title", "kaswara" ),
                "param_name" => "mdnflb_back_subtitle",            
                "group" => "Back",
            ), 
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Button Text", "kaswara" ),
                "param_name" => "mdnflb_back_button",            
                "group" => "Back",
            ),
            array(
                "type" => "vc_link",
                "heading" => esc_html__( "Button Link", "kaswara" ),
                "param_name" => "mdnflb_back_button_link",            
                "group" => "Back",
            ), 
            //Back Styling
             array(
                "type" => "kswr_message",
                "group" => "Back",
                "title" => esc_html__( "Back Styling Settings", "kaswara" ),       
                "param_name" => "backstyling_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_switcher",
                "group" => "Back", 
                "heading" => esc_html__( "Use Default Styling", "kaswara" ),
                "param_name" => "mdnflb_back_style_def",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ), 
            array(
                "type" => "colorpicker",
                "group" => "Back",   
                "dependency" => Array("element" => "mdnflb_back_style_def","value" => array('0')),           
                "value" => "#333",
                "heading" => esc_html__( "Title Color", "kaswara" ),
                "param_name" => "mdnflb_back_title_color"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Back",            
                "value" => "#888",
                "dependency" => Array("element" => "mdnflb_back_style_def","value" => array('0')),   
                "heading" => esc_html__( "Sub Title Color", "kaswara" ),
                "param_name" => "mdnflb_back_subtitle_color"
            ),
             array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Choose Background Type', 'kaswara' ),
                'group' => 'Back',
                "dependency" => Array("element" => "mdnflb_back_style_def","value" => array("0")),                    
                'param_name' => 'mdnflb_back_bg_type',
                'value' => array(
                    esc_html__( 'Color','kaswara') => 'color',
                    esc_html__( 'Background Image','kaswara') => 'image'
                )               
            ),
             array(
                "type" => "attach_image",
                "dependency" => Array("element" => "mdnflb_back_bg_type","value" => array('image')),                         
                'group' => 'Back',
                "heading" => esc_html__( "Upload Image", "kaswara" ),
                "param_name" => "mdnflb_back_backgroundimage_img"
            ),
             array(
                "type" => "kswr_background",
                "group" => "Back",
                "heading" => esc_html__( "Background Image Settings", "kaswara" ), 
                "dependency" => Array("element" => "mdnflb_back_bg_type","value" => array('image')),                         
                "param_name" => "mdnflb_back_backgroundimage",
                "mtop" => "10px"
            ),
             array(
                "type" => "kswr_gradient",
                "group" => "Back",            
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
                "dependency" => Array("element" => "mdnflb_back_bg_type","value" => array('color')),                         
                "heading" => esc_html__( "Container Background", "kaswara" ),
                "param_name" => "mdnflb_back_background"
            ),
            array(
                "type" => "kswr_border",
                'bordergradient' => 'enable',
                "heading" => esc_html__( "Container Border Styling", "kaswara" ),         
                "dependency" => Array("element" => "mdnflb_back_style_def","value" => array("0")),                    
                "group" => "Back",                 
                "param_name" => "mdnflb_back_border"
             ),
            array(
                "type" => "kswr_message",
                "group" => "Back",
                "dependency" => Array("element" => "mdnflb_back_style_def","value" => array('0')),            
                "title" => esc_html__( "Button Styling Settings", "kaswara" ),       
                "param_name" => "buttontyling_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Button Height (px)", "kaswara" ),
                "param_name" => "mdnflb_back_button_height",
                "dependency" => Array("element" => "mdnflb_back_style_def","value" => array('0')),            
                "value" => 45,
                "group" => 'Back' 
            ),
            array(
                "type" => "kswr_gradient",
                "group" => "Back",            
                "value" => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
                "dependency" => Array("element" => "mdnflb_back_style_def","value" => array("0")),                    
                "heading" => esc_html__( "Button Text Color", "kaswara" ),
                "param_name" => "mdnflb_back_button_color"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => "Back",            
                "value" => '{"type":"color", "color1":"#fafafa", "color2":"transparent", "direction":"to left"}',
                "dependency" => Array("element" => "mdnflb_back_style_def","value" => array("0")),                    
                "heading" => esc_html__( "Button Background Color", "kaswara" ),
                "param_name" => "mdnflb_back_button_bgcolor"
            ),
            array(
                "type" => "kswr_border",
                "heading" => esc_html__( "Button Border Styling", "kaswara" ),         
                "dependency" => Array("element" => "mdnflb_back_style_def","value" => array("0")),                    
                "group" => "Back",                 
                'bordergradient' => 'enable',
                "param_name" => "mdnflb_back_button_border"
            ),
            array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Button Border Radius", "kaswara" ),
                "param_name" => "mdnflb_back_button_br_radius",
                "dependency" => Array("element" => "mdnflb_back_style_def","value" => array('0')),            
                "value" => 0,
                "group" => 'Back' 
            ),
            
            // Font Section
            array(
                "type" => "kswr_message",
                "group" => "Typography",
                "title" => esc_html__( "Font Settings", "kaswara" ),       
                "param_name" => "font_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_switcher",
                "group" => "Typography", 
                "heading" => esc_html__( "Use Default Font Setings", "kaswara" ),
                "param_name" => "mdnflb_font_def",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ),
            //Front Font Settings 
            array(
                "type" => "kswr_message",
                "group" => "Typography",
                "dependency" => Array("element" => "mdnflb_font_def","value" => array('0')),            
                "title" => esc_html__( "Front Font Settings", "kaswara" ),       
                "param_name" => "frontfont_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_fontsize",
                "param_name" => "mdnflb_front_title_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Title Font Size", "kaswara" ),
                "dependency" => Array("element" => "mdnflb_font_def","value" => array("0")),                               
                "defaults"=> array("font-size" => "21px", "line-height" => "", "letter-spacing" => "",),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing"               
                )
            ), 
             array(
                "type" => "kswr_fontstyle",
                "param_name" => "mdnflb_front_title_fstyle",
                "heading" => esc_html__( "Title Font Style", "kaswara" ),       
                "dependency" => Array("element" => "mdnflb_font_def","value" => array("0")),                                  
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),
             array(
                "type" => "kswr_fontsize",
                "param_name" => "mdnflb_front_subtitle_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Sub Title Font Size", "kaswara" ),
                "dependency" => Array("element" => "mdnflb_font_def","value" => array("0")),                               
                "defaults"=> array("font-size" => "16px", "line-height" => "", "letter-spacing" => "",),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing"               
                )
            ), 
             array(
                "type" => "kswr_fontstyle",
                "param_name" => "mdnflb_front_subtitle_fstyle",
                "heading" => esc_html__( "Sub Title Font Style", "kaswara" ),       
                "dependency" => Array("element" => "mdnflb_font_def","value" => array("0")),                                  
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),

            //Back Font Settings 
            array(
                "type" => "kswr_message",
                "group" => "Typography",
                "dependency" => Array("element" => "mdnflb_font_def","value" => array('0')),            
                "title" => esc_html__( "Back Font Settings", "kaswara" ),       
                "param_name" => "backfont_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_fontsize",
                "param_name" => "mdnflb_back_title_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Title Font Size", "kaswara" ),
                "dependency" => Array("element" => "mdnflb_font_def","value" => array("0")),                               
                "defaults"=> array("font-size" => "21px", "line-height" => "", "letter-spacing" => "",),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing"               
                )
            ), 
             array(
                "type" => "kswr_fontstyle",
                "param_name" => "mdnflb_back_title_fstyle",
                "heading" => esc_html__( "Title Font Style", "kaswara" ),       
                "dependency" => Array("element" => "mdnflb_font_def","value" => array("0")),                                  
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),
             array(
                "type" => "kswr_fontsize",
                "param_name" => "mdnflb_back_subtitle_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Sub Title Font Size", "kaswara" ),
                "dependency" => Array("element" => "mdnflb_font_def","value" => array("0")),                               
                "defaults"=> array("font-size" => "16px", "line-height" => "", "letter-spacing" => "",),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing"               
                )
            ), 
             array(
                "type" => "kswr_fontstyle",
                "param_name" => "mdnflb_back_subtitle_fstyle",
                "heading" => esc_html__( "Sub Title Font Style", "kaswara" ),       
                "dependency" => Array("element" => "mdnflb_font_def","value" => array("0")),                                  
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),

              array(
                "type" => "kswr_fontsize",
                "param_name" => "mdnflb_back_button_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Button Font Size", "kaswara" ),
                "dependency" => Array("element" => "mdnflb_font_def","value" => array("0")),                               
                "defaults"=> array("font-size" => "13px", "line-height" => "", "letter-spacing" => "",),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing"               
                )
            ), 
             array(
                "type" => "kswr_fontstyle",
                "param_name" => "mdnflb_back_button_fstyle",
                "heading" => esc_html__( "Button Font Style", "kaswara" ),       
                "dependency" => Array("element" => "mdnflb_font_def","value" => array("0")),                                  
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),

             //Distances
             array(
                "type" => "kswr_message",
                "group" => "Distances",
                "title" => esc_html__( "Container Distances", "kaswara" ),       
                "param_name" => "container_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "padding",            
                "param_name" => "mdnflb_cnt_padding",
                "heading" => esc_html__( "Container Paddings", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Distances"
            ),
            
            //Front Margins 
            array(
                "type" => "kswr_message",
                "group" => "Distances",
                "title" => esc_html__( "Front Elements Margins", "kaswara" ),       
                "param_name" => "frontmargins_sections",
                "mtop" => "10px"
            ),
             array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "mdnflb_front_title_mr",
                "heading" => esc_html__( "Title Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Distances"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "mdnflb_front_subtitle_mr",
                "heading" => esc_html__( "Sub Title Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Distances"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "mdnflb_front_icon_mr",
                "heading" => esc_html__( "Icon Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Distances"
            ),

            //Back Margins
            array(
                "type" => "kswr_message",
                "group" => "Distances",
                "title" => esc_html__( "Front Elements Margins", "kaswara" ),       
                "param_name" => "backmargins_sections",
                "mtop" => "10px"
            ),
             array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "mdnflb_back_title_mr",
                "heading" => esc_html__( "Title Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Distances"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "mdnflb_back_subtitle_mr",
                "heading" => esc_html__( "Sub Title Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Distances"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "mdnflb_back_button_mr",
                "heading" => esc_html__( "Button Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Distances"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "padding",            
                "param_name" => "mdnflb_back_button_pd",
                "heading" => esc_html__( "Button Paddings", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Distances"
            ),


        )
    ));        
}
add_action( 'init', 'kswr_modernflipbox_shortcode' ); 
?>