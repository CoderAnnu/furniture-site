<?php 
/*------------------------------------------------
                MODAL WINDOW SHORTCODE
------------------------------------------------*/
function kswr_modalwindow_shortcode() {
   vc_map( array(
      "name" => esc_html__( "Modal Window", "kaswara" ),      
      "description" => esc_html__("A hidden window triggered when clicking a button!", "kaswara"),        
        'icon' => KASWARA_IMAGES.'small/modal.jpg',  
      "category" => "Kaswara",        
      "base" => "kswr_modalwindow",      
      "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Window Title", "kaswara" ),
            "param_name" => "mdlw_title",
            "value" => esc_html__( "Window Title", "kaswara" ), 
            "admin_label" => true,
            "group" => "Modal Window"   
        ),

        array(
            "type" => "textarea_html",
            "heading" => esc_html__( "Content", "kaswara" ),
            "param_name" => "content",
            "value" => "",           
            "group" => "Modal Window",
            "edit_field_class" => "ult_hide_editor_fullscreen vc_col-xs-12 vc_column wpb_el_type_textarea_html vc_wrapper-param-type-textarea_html vc_shortcode-param",  
        ),
        
        array(
            "type" => "colorpicker",          
            "heading" => esc_html__( "Backgound Color", "kaswara" ),
            "param_name" => "mdlw_bg_color",
            "value" => "",
            "group" => "Modal Window"       
        ),
        array(
            "type" => "colorpicker",          
            "heading" => esc_html__( "Overlay Backgound Color", "kaswara" ),
            "param_name" => "mdlw_overlay_bg",
            "value" => "rgba(0,0,0,0.7)",
            "group" => "Modal Window"       
        ),

        array(
            "type" => "colorpicker",          
            "heading" => esc_html__( "Text Color", "kaswara" ),
            "param_name" => "mdlw_color",
            "value" => '#fff',
            "group" => "Modal Window"       
        ),

         array(
            'type' => 'dropdown',
            'heading' => esc_html__("Modal Window Effect",'kaswara'),
            'param_name' => 'mdlw_effect',
            'value' => array(
                esc_html__("Fade in / Scale",'kaswara') => 'km-effect-1',
                esc_html__("Slide in (right)",'kaswara') => 'km-effect-2',
                esc_html__("Slide in (bottom)",'kaswara') => 'km-effect-3',
                esc_html__("Newspaper",'kaswara') => 'km-effect-4',
                esc_html__("Fall",'kaswara') => 'km-effect-5',
                esc_html__("Side Fall",'kaswara') => 'km-effect-6',
                esc_html__("Sticky Up",'kaswara') => 'km-effect-7',
                esc_html__("3D Flip (horizontal)",'kaswara') => 'km-effect-8',
                esc_html__("3D Flip (vertical)",'kaswara') => 'km-effect-9',
                esc_html__("3D Sign",'kaswara') => 'km-effect-10',
                esc_html__("Super Scaled",'kaswara') => 'km-effect-11',
                esc_html__("Just Me",'kaswara') => 'km-effect-12',
                esc_html__("3D Slit",'kaswara') => 'km-effect-13',
                esc_html__("3D Rotate Bottom",'kaswara') => 'km-effect-14',
                esc_html__("3D Rotate In Left",'kaswara') => 'km-effect-15',
                esc_html__("Blur",'kaswara') => 'km-effect-16'            
            ),
            "group" => "Modal Window"       
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Close Button Text", "kaswara" ),
            "param_name" => "mdlw_close_text",           
            "value" => esc_html__( "Close Me !", "kaswara" ), 
            "group" => "Modal Window"   
        ),  


        /*------------------------------------
        	Button Trigger -----------------------
        ------------------------------------*/
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Button Text", "kaswara" ),
            "admin_label" => true,
            "param_name" => "mdlw_btn_txt",
            "group" => "Button Trigger"   
        ),
        array(
            "type" => "dropdown",
             "heading" => esc_html__( 'Button Layout','kaswara'),
             "param_name" => "mdlw_btn_layout",           
             "value" => array(
                esc_html__('No Icon','kaswara') => 'noicon',
                esc_html__('With Icon','kaswara') => 'withicon',
                esc_html__('Just Icon','kaswara') => 'justicon',
            ),         
            "group" => "Button Trigger",
        ),
        array(
            "type" => "dropdown",
             "heading" => esc_html__( 'Button Hover Style','kaswara'),
             "param_name" => "mdlw_btn_style",           
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
            "group" => "Button Trigger",
        ),

        array(
            "type" => "dropdown",
             "heading" => esc_html__( 'Button Hover Action','kaswara'),
             "param_name" => "mdlw_btn_hover_action",           
             "value" => array(
                esc_html__('None','kaswara') => 'none',
                esc_html__('Zoom in','kaswara') => 'scaleup',
                esc_html__('Zoom Out','kaswara') => 'scaledown',
            ),         
            "group" => "Button Trigger",
        ),
        array(
            "type" => "kswr_iconchooser",
            "class" => "",
            "heading" =>esc_html__("Select Icon","kaswara"),
            "description" =>esc_html__("Only if Icon Enbaled","kaswara"),
            "param_name" => "mdlw_btn_icon",
            "value" => "",
            "group" => "Button Trigger",
        ),

        array(
            "type" => "kswr_message",
            "group" => "Button Trigger", 
            "title" => esc_html__( "Button Trigger Styling", "kaswara" ),
            "param_name" => "mdlw_btn_default_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "group" => "Button Trigger", 
            "heading" => esc_html__( "Use Default Styling", "kaswara" ),
            "param_name" => "mdlw_btn_default_style",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
        ),
       
        array(
            "type" => "kswr_switcher",
            "group" => "Button Trigger", 
            "heading" => esc_html__( "Enable Full Width Button", "kaswara" ),
            "param_name" => "mdlw_btn_full_width",
            'default' => 'false',
            'on' => array('text' => 'ON','val' => 'true' ),
            'off'=> array('text' => 'OFF','val' => 'false') 
        ),
        array(
            "type" => "kswr_number",
            "value" => 250,
            "group" => "Button Trigger", 
            "max" => 1200,
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),        
            "heading" => esc_html__( "Button Width (px)", "kaswara" ),
            "param_name" => "mdlw_btn_width"
        ),
        array(
            "type" => "kswr_number",
            "value" => 50,
            "group" => "Button Trigger", 
            "max" => 1200,
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),        
            "heading" => esc_html__( "Button Height (px)", "kaswara" ),
            "param_name" => "mdlw_btn_height"
        ),
        array(
            "type" => "kswr_number",
            "value" => 0,
            "group" => "Button Trigger", 
            "max" => 500,
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),        
            "heading" => esc_html__( "Border Radius (px)", "kaswara" ),
            "param_name" => "mdlw_btn_border_radius"
        ),

        array(
            "type" => "kswr_gradient",
            "group" => "Button Trigger",            
            "value" => '{"type":"color", "color1":"#111", "color2":"#111", "direction":"to left"}',
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Background Color", "kaswara" ),
            "param_name" => "mdlw_btn_bg"
        ),
        array(
            "type" => "kswr_gradient",
            "group" => "Button Trigger",            
            "value" => '{"type":"color", "color1":"#00AFD1", "color2":"#00AFD1", "direction":"to left"}',
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Hover Background Color", "kaswara" ),
            "param_name" => "mdlw_btn_bg_hover"
        ),

        array(
            "type" => "kswr_gradient",
            "group" => "Button Trigger",            
            "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Text Color", "kaswara" ),
            "param_name" => "mdlw_btn_clr"
        ),
        array(
            "type" => "kswr_gradient",
            "group" => "Button Trigger",            
            "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Hover Text Color", "kaswara" ),
            "param_name" => "mdlw_btn_clr_hover"
        ),
         array(
            "type" => "kswr_distance",
            "distance" => "margin",            
            "param_name" => "mdlw_btn_margins",
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Button Margins", "kaswara" ),
            "positions" => array(
                esc_html__("Top","kaswara") => "top",
                esc_html__("Bottom","kaswara") => "bottom"
            ),
            "group" => "Button Trigger"
        ),
        array(
            "type" => "kswr_distance",
            "distance" => "padding",            
            "param_name" => "mdlw_btn_paddings",
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Button Paddings", "kaswara" ),
            "positions" => array(
                esc_html__("Left","kaswara") => "left",
                esc_html__("Right","kaswara") => "right"
            ),
            "group" => "Button Trigger"
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__( 'Button Alignement','kaswara'),
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),                    
            "param_name" => "mdlw_btn_align",           
            "value" => array(
                "Left" => "left",
                "Center" => "center",
                "Right" => "right",
            ),         
            "group" => "Button Trigger",
        ),

        array(
            "type" => "kswr_message",
            "group" => "Button Trigger", 
            "title" => esc_html__( "Font Settings", "kaswara" ),
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),                                
            "param_name" => "mdlw_btn_font_sections",
            "mtop" => "10px"
         ),
         array(
            "type" => "kswr_fontsize",
            "param_name" => "mdlw_btn_ftsize",
            "group" => "Button Trigger",                 
            "heading" => esc_html__( "Font Size", "kaswara" ),
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),                               
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
            "param_name" => "mdlw_btn_ftstyle",
            "heading" => esc_html__( "Font Style", "kaswara" ),       
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),                                  
            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
            'elements'  => array(
               esc_html__("Font Family","kaswara") => "font-family",
               esc_html__("Font Weight","kaswara") => "font-weight",                
               esc_html__("Font Style","kaswara") => "font-style",
            ),
            "group" => "Button Trigger"
        ),

         array(
            "type" => "kswr_message",
            "group" => "Button Trigger", 
            "title" => esc_html__( "Border Settings", "kaswara" ),
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),                                
            "param_name" => "mdlw_btn_border_sections",
            "mtop" => "10px"
         ),
         array(
            "type" => "kswr_border",
            'bordergradient' => 'enable',
            "group" => "Button Trigger", 
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),        
            "heading" => esc_html__( "Border Styling", "kaswara" ),
            "param_name" => "mdlw_btn_bdr"
        ),
         array(
            "type" => "kswr_border",
            'bordergradient' => 'enable',
            "group" => "Button Trigger", 
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),        
            "heading" => esc_html__( "Border Styling onHover", "kaswara" ),
            "param_name" => "mdlw_btn_bdr_hover"
        ),
        

        array(
            "type" => "kswr_message",
            "group" => "Button Trigger", 
            "title" => esc_html__( "Icon Settings", "kaswara" ),
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),                                
            "param_name" => "mdlw_btn_icon_sections",
            "mtop" => "10px"
         ), 
        array(
            "type" => "dropdown",
            "heading" => esc_html__( 'Icon Position','kaswara'),
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),                    
            "param_name" => "mdlw_btn_icon_position",           
            "value" => array(
                "Left" => "left",             
                "Right" => "right",
            ),         
            "group" => "Button Trigger",
        ),
        
        array(
            "type" => "kswr_number",
            "value" => 26,
            "group" => "Button Trigger", 
            "max" => 500,
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),        
            "heading" => esc_html__( "Icon Size (px)", "kaswara" ),
            "param_name" => "mdlw_btn_icon_size"
        ),

        array(
            "type" => "kswr_gradient",
            "group" => "Button Trigger",            
            "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Icon Color", "kaswara" ),
            "param_name" => "mdlw_btn_icon_clr"
        ),
        array(
            "type" => "kswr_gradient",
            "group" => "Button Trigger",            
            "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Hover Icon Color", "kaswara" ),
            "param_name" => "mdlw_btn_icon_clr_hover"
        ),
        array(
            "type" => "kswr_distance",
            "distance" => "padding",            
            "param_name" => "mdlw_btn_icon_paddings",
            "dependency" => Array("element" => "mdlw_btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Icon Paddings", "kaswara" ),
            "positions" => array(
                esc_html__("Left","kaswara") => "left",
                esc_html__("Right","kaswara") => "right"
            ),
            "group" => "Button Trigger"
        ),


      )
    )
   );
}

add_action( 'init', 'kswr_modalwindow_shortcode' );


?>