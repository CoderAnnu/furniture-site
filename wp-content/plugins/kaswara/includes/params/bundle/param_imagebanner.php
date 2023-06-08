<?php 
/*------------------------------------------------
         IMAGE BANNER SHORTCODE
------------------------------------------------*/

function kswr_imagebanner_shortcode(){
    vc_map( array(
        "name" => esc_html__( "Image Banner", "kaswara" ),
        "description" => esc_html__("Image banner with button", "kaswara"),         
        'icon' => KASWARA_IMAGES.'small/imagebanner.jpg',  
        "category" => "Kaswara",        
        "base" => "kswr_imagebanner",      
        "params" => array(     
            //General             
            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Banner Min-Height", "kaswara" ),
                'group' => 'General',
                "param_name" => "imban_height",
                "value" => 300
            ),
            array(
                "type" => "attach_image",
                'group' => 'General',
                "heading" => esc_html__( "Banner Background Image", "kaswara" ),
                "param_name" => "imban_img"
            ),
            array(
                "type" => "colorpicker",
                "group" => "General",            
                "value" => 'tranparent',              
                "heading" => esc_html__( "Banner Overlay Color", "kaswara" ),
                "param_name" => "imban_overlay"
            ),
            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Banner Overlay Opacity", "kaswara" ),
                'group' => 'General',
                'min' => 0, 'max' => 1,  'step' => '0.1',
                "param_name" => "imban_overlay_opac",
                "value" => 0
            ),
            
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Banner Elements Align', 'kaswara' ),
                'group' => 'General',
                'param_name' => 'imban_layout',                
                'value' => array(
                    esc_html__( 'Left','kaswara') => 'left',
                    esc_html__( 'Center','kaswara') => 'center',
                    esc_html__( 'Right','kaswara') => 'right',
                )               
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Banner Hover Style', 'kaswara' ),
                'group' => 'General',
                'param_name' => 'imban_hoverstyle',                
                'value' => array(
                     esc_html__( 'None','kaswara') => 'none',
                     esc_html__( 'Scale','kaswara') => 'scale',
                     esc_html__( 'Scale Rotate Left','kaswara') => 'scalerotateleft',
                     esc_html__( 'Scale Rotate Right','kaswara') => 'scalerotateright',
                     esc_html__( 'Move Left','kaswara') => 'moveleft',
                     esc_html__( 'Move Right','kaswara') => 'moveright',
                )               
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Banner Title", "kaswara" ),
                "param_name" => "imban_title",               
                "admin_label" => true,
                "group" => "General"   
            ),
            array(
                "type" => "colorpicker",
                "value" => "#333",
                "group" => "General", 
                "heading" => esc_html__( "Title Color", "kaswara" ),
                "param_name" => "imban_titlecolor"
            ), 
            array(
                "type" => "textarea",
                "heading" => esc_html__( "Banner Content", "kaswara" ),
                "param_name" => "imban_content",                               
                "group" => "General"   
            ),
            array(
                "type" => "colorpicker",
                "value" => "#777",
                "group" => "General", 
                "heading" => esc_html__( "Content Color", "kaswara" ),
                "param_name" => "imban_contentcolor"
            ), 
            //Typography
            array(
                "type" => "kswr_message",
                "group" => "Typography",
                "title" => esc_html__( "Font Settings", "kaswara" ),       
                "param_name" => "imban_font_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Use Default Font", "kaswara" ),
                "group" => "Typography",                 
                "param_name" => "imban_font_def",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ),
            array(
                "type" => "kswr_message",
                "group" => "Typography",
                "title" => esc_html__( "Title Font Settings", "kaswara" ),   
                "dependency" => Array("element" => "imban_font_def","value" => array('0')),                                
                "param_name" => "imban_titlefont_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_fontsize",
                "param_name" => "imban_title_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "dependency" => Array("element" => "imban_font_def","value" => array('0')),            
                "defaults"=> array("font-size" => "28px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
                "param_name" => "imban_title_fstyle",
                "heading" => esc_html__("Font Style","kaswara"),
                "value" => "",
                "dependency" => Array("element" => "imban_font_def","value" => array('0')),
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
                "dependency" => Array("element" => "imban_font_def","value" => array('0')),                                
                "param_name" => "imban_contentfont_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_fontsize",
                "param_name" => "imban_content_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "dependency" => Array("element" => "imban_font_def","value" => array('0')),            
                "defaults"=> array("font-size" => "20px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
                "param_name" => "imban_content_fstyle",
                "heading" => esc_html__("Font Style","kaswara"),
                "value" => "",
                "dependency" => Array("element" => "imban_font_def","value" => array('0')),
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                    esc_html__("Font Family","kaswara") => "font-family",
                    esc_html__("Font Weight","kaswara") => "font-weight",                
                    esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),

            //Margins
            array(
                "type" => "kswr_distance",
                "distance" => "margin",
                "heading" => esc_html__("Title Margins","kaswara"),
                "param_name" => "imban_title_marg",
                'group' => 'Distances',
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom",
                )
            ), 
            array(
                "type" => "kswr_distance",
                "distance" => "margin",
                "heading" => esc_html__("Content Margins","kaswara"),
                "param_name" => "imban_content_marg",
                'group' => 'Distances',
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom",
                )
            ), 
             array(
                "type" => "kswr_distance",
                "distance" => "margin",
                "heading" => esc_html__("Button Margins","kaswara"),
                "param_name" => "imban_button_marg",
                'group' => 'Distances',
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom",
                )
            ), 
             array(
                "type" => "kswr_distance",
                "distance" => "padding",
                "heading" => esc_html__("Container Paddings","kaswara"),
                "param_name" => "imban_container_padd",
                "defaults"=> array("top" => "50px","bottom" => "50px","left" => "50px","right" => "50px",),
                'group' => 'Distances',
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom",
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right",
                )
            ),
            
            //Button Settings    
            /*------------------------------------
            Button -----------------------
        ------------------------------------*/
        array(
            "type" => "vc_link",
            "heading" => esc_html__( "Link", "kaswara" ),
            "param_name" => "imban_btn_link",
            "value" => '',
            "group" => "Button"   
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Button Text", "kaswara" ),          
            "param_name" => "imban_btn_txt",
            "group" => "Button"   
        ),
        array(
            "type" => "dropdown",
             "heading" => esc_html__( 'Button Layout','kaswara'),
             "param_name" => "imban_btn_layout",           
             "value" => array(
                esc_html__('No Icon','kaswara') => 'noicon',
                esc_html__('With Icon','kaswara') => 'withicon',
                esc_html__('Just Icon','kaswara') => 'justicon',
            ),         
            "group" => "Button",
        ),
        array(
            "type" => "dropdown",
             "heading" => esc_html__( 'Button Hover Style','kaswara'),
             "param_name" => "imban_btn_style",           
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
            "group" => "Button",
        ),

        array(
            "type" => "dropdown",
             "heading" => esc_html__( 'Button Hover Action','kaswara'),
             "param_name" => "imban_btn_hover_action",           
             "value" => array(
                esc_html__('None','kaswara') => 'none',
                esc_html__('Zoom in','kaswara') => 'scaleup',
                esc_html__('Zoom Out','kaswara') => 'scaledown',
            ),         
            "group" => "Button",
        ),
        array(
            "type" => "kswr_iconchooser",
            "class" => "",
            "heading" =>esc_html__("Select Icon","kaswara"),
            "description" =>esc_html__("Only if Icon Enbaled","kaswara"),
            "param_name" => "imban_btn_icon",
            "value" => "",
            "group" => "Button",
        ),

        array(
            "type" => "kswr_message",
            "group" => "Button", 
            "title" => esc_html__( "Button Styling", "kaswara" ),
            "param_name" => "imban_btn_default_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "group" => "Button", 
            "heading" => esc_html__( "Use Default Styling", "kaswara" ),
            "param_name" => "imban_btn_default_style",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
        ),
       
        array(
            "type" => "kswr_switcher",
            "group" => "Button", 
            "heading" => esc_html__( "Enable Full Width Button", "kaswara" ),
            "param_name" => "imban_btn_full_width",
            'default' => 'false',
            'on' => array('text' => 'ON','val' => 'true' ),
            'off'=> array('text' => 'OFF','val' => 'false') 
        ),
        array(
            "type" => "kswr_number",
            "value" => 250,
            "group" => "Button", 
            "max" => 1200,
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),        
            "heading" => esc_html__( "Button Width (px)", "kaswara" ),
            "param_name" => "imban_btn_width"
        ),
        array(
            "type" => "kswr_number",
            "value" => 50,
            "group" => "Button", 
            "max" => 1200,
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),        
            "heading" => esc_html__( "Button Height (px)", "kaswara" ),
            "param_name" => "imban_btn_height"
        ),
        array(
            "type" => "kswr_number",
            "value" => 0,
            "group" => "Button", 
            "max" => 500,
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),        
            "heading" => esc_html__( "Border Radius (px)", "kaswara" ),
            "param_name" => "imban_btn_border_radius"
        ),

        array(
            "type" => "kswr_gradient",
            "group" => "Button",            
            "value" => '{"type":"color", "color1":"#111", "color2":"#111", "direction":"to left"}',
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Background Color", "kaswara" ),
            "param_name" => "imban_btn_bg"
        ),
        array(
            "type" => "kswr_gradient",
            "group" => "Button",            
            "value" => '{"type":"color", "color1":"#00AFD1", "color2":"#00AFD1", "direction":"to left"}',
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Hover Background Color", "kaswara" ),
            "param_name" => "imban_btn_bg_hover"
        ),

        array(
            "type" => "kswr_gradient",
            "group" => "Button",            
            "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Text Color", "kaswara" ),
            "param_name" => "imban_btn_clr"
        ),
        array(
            "type" => "kswr_gradient",
            "group" => "Button",            
            "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Hover Text Color", "kaswara" ),
            "param_name" => "imban_btn_clr_hover"
        ),
         array(
            "type" => "kswr_distance",
            "distance" => "margin",            
            "param_name" => "imban_btn_margins",
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Button Margins", "kaswara" ),
            "positions" => array(
                esc_html__("Top","kaswara") => "top",
                esc_html__("Bottom","kaswara") => "bottom"
            ),
            "group" => "Button"
        ),
        array(
            "type" => "kswr_distance",
            "distance" => "padding",            
            "param_name" => "imban_btn_paddings",
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Button Paddings", "kaswara" ),
            "positions" => array(
                esc_html__("Left","kaswara") => "left",
                esc_html__("Right","kaswara") => "right"
            ),
            "group" => "Button"
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__( 'Button Alignement','kaswara'),
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),                    
            "param_name" => "imban_btn_align",           
            "value" => array(
                "Left" => "left",
                "Center" => "center",
                "Right" => "right",
            ),         
            "group" => "Button",
        ),

        array(
            "type" => "kswr_message",
            "group" => "Button", 
            "title" => esc_html__( "Font Settings", "kaswara" ),
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),                                
            "param_name" => "imban_btn_font_sections",
            "mtop" => "10px"
         ),
         array(
            "type" => "kswr_fontsize",
            "param_name" => "imban_btn_ftsize",
            "group" => "Button",                 
            "heading" => esc_html__( "Font Size", "kaswara" ),
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),                               
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
            "param_name" => "imban_btn_ftstyle",
            "heading" => esc_html__( "Font Style", "kaswara" ),       
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),                                  
            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
            'elements'  => array(
               esc_html__("Font Family","kaswara") => "font-family",
               esc_html__("Font Weight","kaswara") => "font-weight",                
               esc_html__("Font Style","kaswara") => "font-style",
            ),
            "group" => "Button"
        ),

         array(
            "type" => "kswr_message",
            "group" => "Button", 
            "title" => esc_html__( "Border Settings", "kaswara" ),
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),                                
            "param_name" => "imban_btn_border_sections",
            "mtop" => "10px"
         ),
         array(
            "type" => "kswr_border",
            'bordergradient' => 'enable',
            "group" => "Button", 
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),        
            "heading" => esc_html__( "Border Styling", "kaswara" ),
            "param_name" => "imban_btn_bdr"
        ),
         array(
            "type" => "kswr_border",
            'bordergradient' => 'enable',
            "group" => "Button", 
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),        
            "heading" => esc_html__( "Border Styling onHover", "kaswara" ),
            "param_name" => "imban_btn_bdr_hover"
        ),
        

        array(
            "type" => "kswr_message",
            "group" => "Button", 
            "title" => esc_html__( "Icon Settings", "kaswara" ),
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),                                
            "param_name" => "imban_btn_icon_sections",
            "mtop" => "10px"
         ), 
        array(
            "type" => "dropdown",
            "heading" => esc_html__( 'Icon Position','kaswara'),
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),                    
            "param_name" => "imban_btn_icon_position",           
            "value" => array(
                "Left" => "left",             
                "Right" => "right",
            ),         
            "group" => "Button",
        ),
        
        array(
            "type" => "kswr_number",
            "value" => 26,
            "group" => "Button", 
            "max" => 500,
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),        
            "heading" => esc_html__( "Icon Size (px)", "kaswara" ),
            "param_name" => "imban_btn_icon_size"
        ),

        array(
            "type" => "kswr_gradient",
            "group" => "Button",            
            "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Icon Color", "kaswara" ),
            "param_name" => "imban_btn_icon_clr"
        ),
        array(
            "type" => "kswr_gradient",
            "group" => "Button",            
            "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Hover Icon Color", "kaswara" ),
            "param_name" => "imban_btn_icon_clr_hover"
        ),
        array(
            "type" => "kswr_distance",
            "distance" => "padding",            
            "param_name" => "imban_btn_icon_paddings",
            "dependency" => Array("element" => "imban_btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Icon Paddings", "kaswara" ),
            "positions" => array(
                esc_html__("Left","kaswara") => "left",
                esc_html__("Right","kaswara") => "right"
            ),
            "group" => "Button"
        ),
                 
        )
    ));        
}
add_action( 'init', 'kswr_imagebanner_shortcode' ); 



?>