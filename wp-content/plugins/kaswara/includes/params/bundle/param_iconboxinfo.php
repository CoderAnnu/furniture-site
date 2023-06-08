<?php 
/*------------------------------------------------
         ICON BOX INFO SHORTCODE
------------------------------------------------*/

function kswr_iconboxinfo_shortcode(){
    vc_map( array(
        "name" => esc_html__( "Icon Box Info", "kaswara" ),
        "description" => esc_html__("Icon box with title and content", "kaswara"),         
        'icon' => KASWARA_IMAGES.'small/infobox.jpg',  
        "category" => "Kaswara",        
        "base" => "kswr_iconboxinfo",      
        "params" => array(      
            //Content Section
            #Title Settings
            array(
                "type" => "kswr_message",
                "group" => "Content", 
                "title" => esc_html__( "Content Settings", "kaswara" ),
                "param_name" => "ibi_content_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Title Text", "kaswara" ),
                "param_name" => "ibi_title",
                "value" => '',
                "group" => "Content"   
            ),
            array(
                "type" => "colorpicker",
                "group" => "Content",            
                "value" => "#333",
                "heading" => esc_html__( "Title Color", "kaswara" ),
                "param_name" => "ibi_title_color"
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Sub-Title Text", "kaswara" ),
                "param_name" => "ibi_subtitle",
                "value" => '',
                "group" => "Content"   
            ),
            array(
                "type" => "colorpicker",
                "group" => "Content",            
                "value" => "#777",
                "heading" => esc_html__( "Sub-Title Color", "kaswara" ),
                "param_name" => "ibi_subtitle_color"
            ),
            array(
                "type" => "textarea_html",
                "heading" => esc_html__( "Content", "kaswara" ),
                "param_name" => "content",
                "value" => "",           
                "group" => "Content",
                "edit_field_class" => "ult_hide_editor_fullscreen vc_col-xs-12 vc_column wpb_el_type_textarea_html vc_wrapper-param-type-textarea_html vc_shortcode-param",  
            ),
            array(
                "type" => "colorpicker",
                "group" => "Content",            
                "value" => "#555",
                "heading" => esc_html__( "Content Color", "kaswara" ),
                "param_name" => "ibi_content_color"
            ),
            //Layout Settings
             array(
                "type" => "kswr_message",
                "group" => "Content", 
                "title" => esc_html__( "Layout Settings", "kaswara" ),
                "param_name" => "ibi_layout_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "dropdown",
                 "heading" => esc_html__( 'Layout Style','kaswara'),
                 "param_name" => "ibi_layout",   
                 "default" => "icontop",        
                 "value" => array(
                    esc_html__('Icon Top','kaswara') => 'icontop',               
                    esc_html__('Icon Left Side','kaswara') => 'iconleft',               
                    esc_html__('Icon Right Side','kaswara') => 'iconright',               
                    esc_html__('Icon Left Heading','kaswara') => 'iconheadingleft',               
                    esc_html__('Icon Right Heading','kaswara') => 'iconheadingright',               
                ),         
                "group" => "Content",
            ),
            array(
                "type" => "dropdown",
                 "heading" => esc_html__( 'Text Alignment','kaswara'),
                 "param_name" => "ibi_align",           
                "dependency" => Array("element" => "ibi_layout","value" => array("icontop")),                               
                 "value" => array(
                    esc_html__('Center','kaswara') => 'center',
                    esc_html__('Left','kaswara') => 'left',
                    esc_html__('Right','kaswara') => 'right'            
                ),         
                "group" => "Content",
            ),
            

            //Content Font Settings
            array(
                "type" => "kswr_message",
                "group" => "Content", 
                "title" => esc_html__( "Font Settings", "kaswara" ),
                "param_name" => "ibi_font_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_switcher",
                "group" => "Content", 
                "heading" => esc_html__( "Use Default Font Settings", "kaswara" ),
                "param_name" => "ibi_font_default",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ), 
            //Title
            array(
                "type" => "kswr_message",
                "group" => "Content", 
                "dependency" => Array("element" => "ibi_font_default","value" => array("0")),                               
                "title" => esc_html__( "Title Font Settings", "kaswara" ),
                "param_name" => "ibi_titlefont_sections",
                "mtop" => "10px"
            ),
             array(
                "type" => "kswr_fontsize",
                "param_name" => "ibi_title_fsize",
                "group" => "Content",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "dependency" => Array("element" => "ibi_font_default","value" => array("0")),                               
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
                "param_name" => "ibi_title_fstyle",
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "dependency" => Array("element" => "ibi_font_default","value" => array("0")),                                  
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Content"
            ),
             //Subtitle
             array(
                "type" => "kswr_message",
                "group" => "Content", 
                "dependency" => Array("element" => "ibi_font_default","value" => array("0")),                               
                "title" => esc_html__( "Sub-Title Font Settings", "kaswara" ),
                "param_name" => "ibi_subtitlefont_sections",
                "mtop" => "10px"
            ),
             array(
                "type" => "kswr_fontsize",
                "param_name" => "ibi_subtitle_fsize",
                "group" => "Content",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "dependency" => Array("element" => "ibi_font_default","value" => array("0")),                               
                "defaults"=> array("font-size" => "12px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
                "param_name" => "ibi_subtitle_fstyle",
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "dependency" => Array("element" => "ibi_font_default","value" => array("0")),                                  
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Content"
            ),

             //Content
             array(
                "type" => "kswr_message",
                "group" => "Content", 
                "dependency" => Array("element" => "ibi_font_default","value" => array("0")),                               
                "title" => esc_html__( "Content Font Settings", "kaswara" ),
                "param_name" => "ibi_contentfont_sections",
                "mtop" => "10px"
            ),
             array(
                "type" => "kswr_fontsize",
                "param_name" => "ibi_content_fsize",
                "group" => "Content",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "dependency" => Array("element" => "ibi_font_default","value" => array("0")),                               
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
                "param_name" => "ibi_content_fstyle",
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "dependency" => Array("element" => "ibi_font_default","value" => array("0")),                                  
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Content"
            ),


            //Icon Section
              array(
                "type" => "kswr_switcher",
                "group" => "Icon", 
                "heading" => esc_html__( "Use Picture", "kaswara" ),
                "param_name" => "ibi_image_enable",
                'default' => '0',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ), 
            array(
                "type" => "attach_image",
                'group' => 'Icon',
                "dependency" => Array("element" => "ibi_image_enable","value" => array('1')),            
                "heading" => esc_html__( "Upload Image", "kaswara" ),
                "param_name" => "ibi_image"
            ),
            array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Picture Width", "kaswara" ),
                "param_name" => "ibi_image_width",
                "dependency" => Array("element" => "ibi_image_enable","value" => array('1')),            
                "value" => 35,
                "group" => 'Icon' 
             ),
             array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Picture Height", "kaswara" ),
                "param_name" => "ibi_image_height",
                "dependency" => Array("element" => "ibi_image_enable","value" => array('1')),            
                "value" => 35,
                "group" => 'Icon' 
             ),
            
            array(
                "type" => "kswr_iconchooser",
                "class" => "",
                "heading" =>esc_html__("Select Icon","kaswara"),
                "description" =>esc_html__("Choose Your Icon","kaswara"),
                "dependency" => Array("element" => "ibi_image_enable","value" => array('0')),                            
                "param_name" => "ibi_icon",
                "value" => "",
                "group" => "Icon",
            ),                             
            array(
                "type" => "dropdown",
                 "heading" => esc_html__( 'Icon Hover Effect','kaswara'),
                 "dependency" => Array("element" => "ibi_image_enable","value" => array('0')),                                             
                 "param_name" => "ibi_effect",           
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
                "dependency" => Array("element" => "ibi_image_enable","value" => array('0')),                                             
                "group" => "Icon", 
                "heading" => esc_html__( "Magic Rotation", "kaswara" ),
                "description" => esc_html__( "Only if border radius 0", "kaswara" ),
                "param_name" => "ibi_rotation",
                'default' => 'false',
                'on' => array('text' => 'ON','val' => 'true' ),
                'off'=> array('text' => 'OFF','val' => 'false') 
            ), 
             //
             array(
                "type" => "kswr_message",
                "group" => "Icon", 
                "title" => esc_html__( "Icon Styling Styling", "kaswara" ),
                "dependency" => Array("element" => "ibi_image_enable","value" => array('0')),                                            
                "param_name" => "ibi_style_default_sections",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "group" => "Icon", 
                "heading" => esc_html__( "Use Default Icon Styling", "kaswara" ),
                "dependency" => Array("element" => "ibi_image_enable","value" => array('0')),                            
                "param_name" => "ibi_style_default",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ),           
            array(
                "type" => "kswr_number",
                "value" => 18,
                "group" => "Icon", 
                "max" => 1200,
                "dependency" => Array("element" => "ibi_style_default","value" => array("0")),        
                "heading" => esc_html__( "Icon Size", "kaswara" ),
                "param_name" => "ibi_iconsize"
            ),
            array(
                "type" => "kswr_number",
                "value" => 25,
                "group" => "Icon", 
                "max" => 2200,
                "dependency" => Array("element" => "ibi_style_default","value" => array("0")),        
                "heading" => esc_html__( "Icon Background Size", "kaswara" ),
                "param_name" => "ibi_bgsize"
            ),
            array(
                "type" => "kswr_number",
                "value" => 0,
                "group" => "Icon", 
                "max" => 500,
                "dependency" => Array("element" => "ibi_style_default","value" => array("0")),        
                "heading" => esc_html__( "Icon Border Radius", "kaswara" ),
                "param_name" => "ibi_border_radius"
            ),

            array(
                "type" => "kswr_gradient",
                "group" => "Icon",            
                "value" => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
                "dependency" => Array("element" => "ibi_style_default","value" => array("0")),                    
                "heading" => esc_html__( "Icon Color", "kaswara" ),
                "param_name" => "ibi_ic_color"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => "Icon",            
                "value" => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
                "dependency" => Array("element" => "ibi_style_default","value" => array("0")),                    
                "heading" => esc_html__( "Icon Color onHover", "kaswara" ),
                "param_name" => "ibi_ic_color_hover"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => "Icon",            
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
                "dependency" => Array("element" => "ibi_style_default","value" => array("0")),                    
                "heading" => esc_html__( "Icon Background", "kaswara" ),
                "param_name" => "ibi_back"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => "Icon",            
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
                "dependency" => Array("element" => "ibi_style_default","value" => array("0")),                    
                "heading" => esc_html__( "Icon Background onHover", "kaswara" ),
                "param_name" => "ibi_back_hover"
            ),
            array(
                'bordergradient' => 'enable',
                "type" => "kswr_border",
                "heading" => esc_html__( "Border Styling", "kaswara" ),         
                "dependency" => Array("element" => "ibi_style_default","value" => array("0")),                    
                "group" => "Icon",                 
                "param_name" => "ibi_border"
             ),

            //Margins
            array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "ibi_icon_margins",
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
                "param_name" => "ibi_title_margins",
                "heading" => esc_html__( "Title Margins", "kaswara" ),
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
                "param_name" => "ibi_subtitle_margins",
                "heading" => esc_html__( "Sub-Title Margins", "kaswara" ),
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
                "param_name" => "ibi_content_margins",
                "heading" => esc_html__( "Content Margins", "kaswara" ),
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
add_action( 'init', 'kswr_iconboxinfo_shortcode' ); 



?>