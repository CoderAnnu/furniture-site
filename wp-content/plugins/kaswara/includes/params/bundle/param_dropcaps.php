<?php 
/*------------------------------------------------
          D R O P  C A P S     SHORTCODE
------------------------------------------------*/
function kswr_dropcaps_shortcode() {
    vc_map( array(
      "name" => esc_html__( "Drop Caps", "kaswara" ),
      "category" => "Kaswara",              
      'icon' => KASWARA_IMAGES.'small/drop-caps.jpg',  
      "base" => "kswr_dropcaps",
      "description" => esc_html__("Text With Drop Caps Styling", "kaswara"),   
      "class" => "",      
      "params" => array(       
        //Letter Settings Group
        array(
              "type" => "textfield",
              "heading" => esc_html__( "Cap Letter", "kaswara" ),
              "param_name" => "drpcp_letter",
              "group" => "Cap",
              "admin_label" => true   
         ),
        array(
            "type" => "kswr_message",
            "title" => esc_html__( "Letter Font Settings", "kaswara" ),         
            "group" => "Cap",                 
            "param_name" => "drpcp_letter_font_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Font", "kaswara" ),
            "group" => "Cap",                 
            "param_name" => "drpcp_letter_font_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ), 

        array(
            "type" => "kswr_fontstyle",
            "param_name" => "drpcp_letter_fstyle",
            "heading" =>esc_html__("Font Style","kaswara"),
            "value" => "",
            "dependency" => Array("element" => "drpcp_letter_font_def","value" => array('0')),
            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
            'elements'  => array(
               esc_html__("Font Family","kaswara") => "font-family",
               esc_html__("Font Weight","kaswara") => "font-weight",                
               esc_html__("Font Style","kaswara") => "font-style",
            ),
            "group" => "Cap"
        ),
        array(
            "type" => "kswr_fontsize",
            "param_name" => "drpcp_letter_fsize",
            "group" => "Cap",                 
            "heading" => esc_html__( "Font Size", "kaswara" ),
            "dependency" => Array("element" => "drpcp_letter_font_def","value" => array('0')),            
            "defaults"=> array("font-size" => "17px"),
            'elements'  => array(
               esc_html__("Font Size","kaswara") => "font-size"               
            )
        ), 
        //Content Settings
        array(
              "type" => "textarea",
              "heading" => esc_html__( "Content Text", "kaswara" ),
              "param_name" => "drpcp_content",
              "group" => "Content",
         ),
        array(
            "type" => "kswr_message",
            "title" => esc_html__( "Content Font Settings", "kaswara" ),         
            "group" => "Content",                 
            "param_name" => "drpcp_content_font_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Font", "kaswara" ),
            "group" => "Content",                 
            "param_name" => "drpcp_content_font_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ), 

        array(
            "type" => "kswr_fontstyle",
            "param_name" => "drpcp_content_fstyle",
            "heading" =>esc_html__("Font Style","kaswara"),
            "value" => "",
            "dependency" => Array("element" => "drpcp_content_font_def","value" => array('0')),
            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
            'elements'  => array(
               esc_html__("Font Family","kaswara") => "font-family",
               esc_html__("Font Weight","kaswara") => "font-weight",                
               esc_html__("Font Style","kaswara") => "font-style",
            ),
            "group" => "Content"
        ),
        array(
            "type" => "kswr_fontsize",
            "param_name" => "drpcp_content_fsize",
            "group" => "Content",                 
            "heading" => esc_html__( "Font Size", "kaswara" ),
            "dependency" => Array("element" => "drpcp_content_font_def","value" => array('0')),            
            "defaults"=> array("font-size" => "14px", "line-height" => "", "letter-spacing" => ""),
            'elements'  => array(
               esc_html__("Font Size","kaswara") => "font-size",
               esc_html__("Line Height","kaswara") => "line-height",
               esc_html__("Letter Spacing","kaswara") => "letter-spacing"               
            )
        ), 
        array(
            "type" => "colorpicker",
            "heading" => esc_html__( "Content Color", "kaswara" ),
            "param_name" => "drpcp_content_color",           
            "value" => '#333',
            "group" => 'Content' 
         ),

        //Background Styling
        array(
            "type" => "kswr_message",
            "title" => esc_html__( "Letter Styling Settings", "kaswara" ),         
            "group" => "Styling",                 
            "param_name" => "drpcp_letter_style_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Styling", "kaswara" ),
            "group" => "Styling",                 
            "param_name" => "drpcp_letter_style_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ), 
         array(
            "type" => "kswr_gradient",
            "group" => "Styling",            
            "value" => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
             "dependency" => Array("element" => "drpcp_letter_style_def","value" => array('0')),                      
            "heading" => esc_html__( "Letter Color", "kaswara" ),
            "param_name" => "drpcp_letter_color"
        ),
         array(
            "type" => "kswr_number",
            "heading" => esc_html__( "Background Size", "kaswara" ),
            "param_name" => "drpcp_letter_bgsize",
            "dependency" => Array("element" => "drpcp_letter_style_def","value" => array('0')),            
            "value" => 35,
            "group" => 'Styling' 
         ),
          array(
            "type" => "kswr_number",
            "heading" => esc_html__( "Border Radius", "kaswara" ),
            "param_name" => "drpcp_letter_br_radius",
            "dependency" => Array("element" => "drpcp_letter_style_def","value" => array('0')),            
            "value" => 0,
            "group" => 'Styling' 
         ),

          array(
                "type" => "kswr_distance",
                "distance" => "margin",
                "heading" => esc_html__( "Caps Margin", "kaswara" ),
                "dependency" => Array("element" => "drpcp_letter_style_def","value" => array('0')),            
                "param_name" => "drpcp_letter_margins",
                "defaults"=> array("top" => "0px","bottom" => "0px","left" => "0px","right" => "0px",),                
                "positions" => array(
                   esc_html__("Top","kaswara") => "top",
                   esc_html__("Bottom","kaswara") => "bottom",
                   esc_html__("Left","kaswara") => "left",
                   esc_html__("Right","kaswara") => "right",
                ),
                "group" => 'Styling' 
            ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__("Background Type",'kaswara'),
            "group" => "Styling",                 
            'param_name' => 'drpcp_letter_bgtype',           
            'value' => array(
                esc_html__("Color",'kaswara') => 'color',
                esc_html__("Image",'kaswara') => 'image'
            ),      
        ),
        array(
            "type" => "kswr_message",
            "title" => esc_html__( "For Background Color", "kaswara" ),         
            "group" => "Styling",                 
            "dependency" => Array("element" => "drpcp_letter_bgtype","value" => array('color')),            
            "param_name" => "drpcp_letter_bgcolor_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_gradient",
            "group" => "Styling",            
            "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
            "dependency" => Array("element" => "drpcp_letter_bgtype","value" => array('color')),                     
            "heading" => esc_html__( "Background Color", "kaswara" ),
            "description" => esc_html__( "Only default styling is OFF", "kaswara" ),
            "param_name" => "drpcp_letter_bgcolor"
        ),

        array(
            "type" => "kswr_message",
            "title" => esc_html__( "For Image Background", "kaswara" ),         
            "dependency" => Array("element" => "drpcp_letter_bgtype","value" => array('image')),  
            "group" => "Styling",                 
            "param_name" => "drpcp_letter_bgimage_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "attach_image",
            'group' => 'Styling',
            "heading" => esc_html__( "Upload Image", "kaswara" ),
            "description" => esc_html__( "Only default styling is OFF", "kaswara" ),
            "dependency" => Array("element" => "drpcp_letter_bgtype","value" => array('image')),  
            "param_name" => "drpcp_letter_bgimage"
        ),

        //Border Settings  
        array(
            "type" => "kswr_message",
            "title" => esc_html__( "Border Settings", "kaswara" ),         
            "group" => "Border Settings",                 
            "dependency" => Array("element" => "drpcp_letter_style_def","value" => array('0')),            
            "param_name" => "drpcp_letter_br_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Border Advanced", "kaswara" ),
            "group" => "Border Settings",                 
            "param_name" => "drpcp_letter_br_advanced",
            "dependency" => Array("element" => "drpcp_letter_style_def","value" => array('0')),            
            'default' => '0',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
        array(
            "type" => "kswr_border",
            "heading" => esc_html__( "Border Styling", "kaswara" ),         
            "group" => "Border Settings", 
            'bordergradient' => 'enable',
            "dependency" => Array("element" => "drpcp_letter_br_advanced","value" => array('0')),            
            "param_name" => "drpcp_letter_br_normal"
         ),
        array(
            "type" => "kswr_message",
            "title" => esc_html__( "Border Advanced", "kaswara" ),         
            "group" => "Border Settings",                 
            "dependency" => Array("element" => "drpcp_letter_br_advanced","value" => array('1')),            
            "param_name" => "drpcp_letter_br_advsections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_border",
            "heading" => esc_html__( "Border Top", "kaswara" ),         
            "group" => "Border Settings",                 
            "dependency" => Array("element" => "drpcp_letter_br_advanced","value" => array('1')),            
            "param_name" => "drpcp_letter_br_top",
            "mtop" => "10px"
         ),
         array(
            "type" => "kswr_border",
            "heading" => esc_html__( "Border Bottom", "kaswara" ),         
            "group" => "Border Settings",                 
            "dependency" => Array("element" => "drpcp_letter_br_advanced","value" => array('1')),            
            "param_name" => "drpcp_letter_br_bottom",
            "mtop" => "10px"
         ),
          array(
            "type" => "kswr_border",
            "heading" => esc_html__( "Border Left", "kaswara" ),         
            "group" => "Border Settings",                 
            "dependency" => Array("element" => "drpcp_letter_br_advanced","value" => array('1')),            
            "param_name" => "drpcp_letter_br_left",
            "mtop" => "10px"
         ),
          array(
            "type" => "kswr_border",
            "heading" => esc_html__( "Border Right", "kaswara" ),         
            "group" => "Border Settings",                 
            "dependency" => Array("element" => "drpcp_letter_br_advanced","value" => array('1')),            
            "param_name" => "drpcp_letter_br_right",
            "mtop" => "10px"
         ),


      )

    ));       
}
add_action( 'init', 'kswr_dropcaps_shortcode' );


?>