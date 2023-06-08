<?php 
/*------------------------------------------------
                BUTTON SHORTCODE
------------------------------------------------*/
function kswr_button_shortcode() {
   vc_map( array(
      "name" => esc_html__( "Advanced Button", "kaswara" ),      
      "description" => esc_html__("Advanced button with styling!", "kaswara"),        
      "category" => "Kaswara",        
      'icon' => KASWARA_IMAGES.'small/button.jpg',  
      "base" => "kswr_button",      
      "params" => array(
        array(
            "type" => "vc_link",
            "heading" => esc_html__( "Link", "kaswara" ),
            "param_name" => "btn_link",
            "value" => '',
            "group" => "General"   
        ),
        /*------------------------------------
        	BTN Stling -----------------------
        ------------------------------------*/
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Button Text", "kaswara" ),
            "admin_label" => true,
            "param_name" => "btn_txt",
            "group" => "General"   
        ),
        array(
            "type" => "dropdown",
             "heading" => esc_html__( 'Button Layout','kaswara'),
             "param_name" => "btn_layout",           
             "value" => array(
                esc_html__('No Icon','kaswara') => 'noicon',
                esc_html__('With Icon','kaswara') => 'withicon',
                esc_html__('Just Icon','kaswara') => 'justicon',
            ),         
            "group" => "General",
        ),
        array(
            "type" => "dropdown",
             "heading" => esc_html__( 'Button Hover Style','kaswara'),
             "param_name" => "btn_style",           
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
            "group" => "General",
        ),

        array(
            "type" => "dropdown",
             "heading" => esc_html__( 'Button Hover Action','kaswara'),
             "param_name" => "btn_hover_action",           
             "value" => array(
                esc_html__('None','kaswara') => 'none',
                esc_html__('Zoom in','kaswara') => 'scaleup',
                esc_html__('Zoom Out','kaswara') => 'scaledown',
            ),         
            "group" => "General",
        ),
        array(
            "type" => "kswr_iconchooser",
            "class" => "",
            "heading" =>esc_html__("Select Icon","kaswara"),
            "description" =>esc_html__("Only if Icon Enbaled","kaswara"),
            "param_name" => "btn_icon",
            "value" => "",
            "group" => "General",
        ),

        array(
            "type" => "kswr_message",
            "group" => "General", 
            "title" => esc_html__( "General Styling", "kaswara" ),
            "param_name" => "btn_default_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "group" => "General", 
            "heading" => esc_html__( "Use Default Styling", "kaswara" ),
            "param_name" => "btn_default_style",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
        ),
       
        array(
            "type" => "kswr_switcher",
            "group" => "General", 
            "heading" => esc_html__( "Enable Full Width Button", "kaswara" ),
            "param_name" => "btn_full_width",
            'default' => 'false',
            'on' => array('text' => 'ON','val' => 'true' ),
            'off'=> array('text' => 'OFF','val' => 'false') 
        ),
        array(
            "type" => "kswr_number",
            "value" => 250,
            "group" => "General", 
            "max" => 1200,
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),        
            "heading" => esc_html__( "Button Width (px)", "kaswara" ),
            "param_name" => "btn_width"
        ),
        array(
            "type" => "kswr_number",
            "value" => 50,
            "group" => "General", 
            "max" => 1200,
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),        
            "heading" => esc_html__( "Button Height (px)", "kaswara" ),
            "param_name" => "btn_height"
        ),
        array(
            "type" => "kswr_number",
            "value" => 0,
            "group" => "General", 
            "max" => 500,
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),        
            "heading" => esc_html__( "Border Radius (px)", "kaswara" ),
            "param_name" => "btn_border_radius"
        ),

        array(
            "type" => "kswr_gradient",
            "group" => "General",            
            "value" => '{"type":"color", "color1":"#111", "color2":"#111", "direction":"to left"}',
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Background Color", "kaswara" ),
            "param_name" => "btn_bg"
        ),
        array(
            "type" => "kswr_gradient",
            "group" => "General",            
            "value" => '{"type":"color", "color1":"#00AFD1", "color2":"#00AFD1", "direction":"to left"}',
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Hover Background Color", "kaswara" ),
            "param_name" => "btn_bg_hover"
        ),

        array(
            "type" => "kswr_gradient",
            "group" => "General",            
            "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Text Color", "kaswara" ),
            "param_name" => "btn_clr"
        ),
        array(
            "type" => "kswr_gradient",
            "group" => "General",            
            "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Hover Text Color", "kaswara" ),
            "param_name" => "btn_clr_hover"
        ),
         array(
            "type" => "kswr_distance",
            "distance" => "margin",            
            "param_name" => "btn_margins",
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Button Margins", "kaswara" ),
            "positions" => array(
                esc_html__("Top","kaswara") => "top",
                esc_html__("Bottom","kaswara") => "bottom"
            ),
            "group" => "General"
        ),
        array(
            "type" => "kswr_distance",
            "distance" => "padding",            
            "param_name" => "btn_paddings",
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Button Paddings", "kaswara" ),
            "positions" => array(
                esc_html__("Left","kaswara") => "left",
                esc_html__("Right","kaswara") => "right"
            ),
            "group" => "General"
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__( 'Button Alignement','kaswara'),
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),                    
            "param_name" => "btn_align",           
            "value" => array(
                "Left" => "left",
                "Center" => "center",
                "Right" => "right",
            ),         
            "group" => "General",
        ),

        array(
            "type" => "kswr_message",
            "group" => "General", 
            "title" => esc_html__( "Font Settings", "kaswara" ),
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),                                
            "param_name" => "btn_font_sections",
            "mtop" => "10px"
         ),
         array(
            "type" => "kswr_fontsize",
            "param_name" => "btn_ftsize",
            "group" => "General",                 
            "heading" => esc_html__( "Font Size", "kaswara" ),
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),                               
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
            "param_name" => "btn_ftstyle",
            "heading" => esc_html__( "Font Style", "kaswara" ),       
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),                                  
            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
            'elements'  => array(
               esc_html__("Font Family","kaswara") => "font-family",
               esc_html__("Font Weight","kaswara") => "font-weight",                
               esc_html__("Font Style","kaswara") => "font-style",
            ),
            "group" => "General"
        ),

         array(
            "type" => "kswr_message",
            "group" => "General", 
            "title" => esc_html__( "Border Settings", "kaswara" ),
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),                                
            "param_name" => "btn_border_sections",
            "mtop" => "10px"
         ),
         array(
            "type" => "kswr_border",
            'bordergradient' => 'enable',
            "group" => "General", 
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),        
            "heading" => esc_html__( "Border Styling", "kaswara" ),
            "param_name" => "btn_bdr"
        ),
         array(
            "type" => "kswr_border",
            'bordergradient' => 'enable',
            "group" => "General", 
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),        
            "heading" => esc_html__( "Border Styling onHover", "kaswara" ),
            "param_name" => "btn_bdr_hover"
        ),
        

        array(
            "type" => "kswr_message",
            "group" => "General", 
            "title" => esc_html__( "Icon Settings", "kaswara" ),
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),                                
            "param_name" => "btn_icon_sections",
            "mtop" => "10px"
         ), 
        array(
            "type" => "dropdown",
            "heading" => esc_html__( 'Icon Position','kaswara'),
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),                    
            "param_name" => "btn_icon_position",           
            "value" => array(
                "Left" => "left",             
                "Right" => "right",
            ),         
            "group" => "General",
        ),
        
        array(
            "type" => "kswr_number",
            "value" => 26,
            "group" => "General", 
            "max" => 500,
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),        
            "heading" => esc_html__( "Icon Size (px)", "kaswara" ),
            "param_name" => "btn_icon_size"
        ),

        array(
            "type" => "kswr_gradient",
            "group" => "General",            
            "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Icon Color", "kaswara" ),
            "param_name" => "btn_icon_clr"
        ),
        array(
            "type" => "kswr_gradient",
            "group" => "General",            
            "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Hover Icon Color", "kaswara" ),
            "param_name" => "btn_icon_clr_hover"
        ),
        array(
            "type" => "kswr_distance",
            "distance" => "padding",            
            "param_name" => "btn_icon_paddings",
            "dependency" => Array("element" => "btn_default_style","value" => array("0")),                    
            "heading" => esc_html__( "Icon Paddings", "kaswara" ),
            "positions" => array(
                esc_html__("Left","kaswara") => "left",
                esc_html__("Right","kaswara") => "right"
            ),
            "group" => "General"
        ),


      )
    )
   );
}

add_action( 'init', 'kswr_button_shortcode' );


?>