<?php 
/*------------------------------------------------
                ALERTBOX SHORTCODE
------------------------------------------------*/
function kswr_alertbox_shortcode() {
   vc_map( array(
      "name" => esc_html__( "Alert Box", "kaswara" ),
      "category" => "Kaswara",              
      'icon' => KASWARA_IMAGES.'small/alert.jpg',  
      "base" => "kswr_alertbox",
      "description" => esc_html__("Text alert box representing a type of message", "kaswara"),   
      "class" => "",      
      "params" => array(       
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Alert Title", "kaswara" ),
            "param_name" => "albx_title_text",
            "value" => esc_html__( "Title", "kaswara" ),
            "group" => "Box"  ,
            "admin_label" => true   
        ),
        array(
            "type" => "kswr_number",          
            "heading" => esc_html__( "Box Height (px)", "kaswara" ),
            "param_name" => "albx_height",
            "value" => 50,
            "group" => "Box" 
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__( "Alert Message", "kaswara" ),
            "param_name" => "albx_message_text",
            "value" => esc_html__( "Message", "kaswara" ), 
            "group" => "Box" ,
            "admin_label" => true   
        ),
         array(
            "type" => "kswr_iconchooser",
            "class" => "",
            "heading" =>esc_html__("Select Icon","kaswara"),          
            "param_name" => "albx_icon",
            "value" => "",
            "group" => "Box",
        ),

         array(
            "type" => "kswr_number",          
            "heading" => esc_html__( "Icon Size (px)", "kaswara" ),
            "param_name" => "albx_icon_size",
            "value" => 18,
            "group" => "Box" 
        ),
         array(
            "type" => "kswr_distance",
            "distance" => "padding",
            "heading" => esc_html__( "Icon Paddings", "kaswara" ),
            "param_name" => "albx_icon_padding",
            "positions" => array(             
                esc_html__("Left","kaswara") => "left",
                esc_html__("Right","kaswara") => "right",             
            ),
            "group" => "Box"
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__( "Text Color", "kaswara" ),
            "param_name" => "albx_color",
            "value" => '',
            "group" => "Box" 
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__( "Box Background Color", "kaswara" ),
            "param_name" => "albx_bg_color",
            "value" => '', 
            "group" => "Box" 
        ),

        array(
            "type" => "kswr_number",          
            "heading" => esc_html__( "Border Thickness", "kaswara" ),
            "param_name" => "albx_border_thickness",
            "value" => 0,
            "group" => "Box" 
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__( "Border Color", "kaswara" ),
            "param_name" => "albx_border_color",
            "value" => '', 
            "group" => "Box" 
        ),

        array(
            "type" => "kswr_number",          
            "heading" => esc_html__( "Border Radius (px)", "kaswara" ),
            "param_name" => "albx_radius",
            "value" => 0,
            "group" => "Box" 
        ),


        array(
            "type" => "kswr_distance",
            "distance" => "margin",
            "heading" =>  esc_html__( "Element Margins", "kaswara" ), 
            "param_name" => "albx_alb_margin",
            "positions" => array(
                esc_html__("Top","kaswara") => "top",
                esc_html__("Bottom","kaswara") => "bottom"
            ),
            "group" => "Distance"
        ),
        array(
            "type" => "kswr_distance",
            "distance" => "padding",
            "heading" =>  esc_html__( "Element Paddings", "kaswara" ), 
            "param_name" => "albx_alb_padding",
            "positions" => array(
                esc_html__("Top","kaswara") => "top",
                esc_html__("Left","kaswara") => "left",
                esc_html__("Right","kaswara") => "right",
                esc_html__("Bottom","kaswara") => "bottom"
            ),
            "group" => "Distance"
        ),

         array(
            "type" => "kswr_message",
            "title" => "Title Font Settings",            
            "group" => "Typography",                 
            "param_name" => "albx_title_font_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Font", "kaswara" ),
            "group" => "Typography",                 
            "param_name" => "albx_title_font_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),         
        array(
            "type" => "kswr_fontsize",
            "param_name" => "albx_title_ftsize",
            "group" => "Typography",                 
            "heading" => esc_html__( "Font Size", "kaswara" ),
            "dependency" => Array("element" => "albx_title_font_def","value" => array('0')),            
            "defaults"=> array("font-size" => "16px","letter-spacing" => ""),
            'elements'  => array(
               esc_html__("Font Size","kaswara") => "font-size",
               esc_html__("Letter Spacing","kaswara") => "letter-spacing"           
            )
        ),  
        array(
            "type" => "kswr_fontstyle",
            "param_name" => "albx_title_ftstyle",
            "heading" =>esc_html__("Font Style","kaswara"),
            "value" => "",
            "dependency" => Array("element" => "albx_title_font_def","value" => array('0')),
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
            "title" => "Message Font Settings",            
            "group" => "Typography",                 
            "param_name" => "albx_message_font_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Font", "kaswara" ),
            "group" => "Typography",                 
            "param_name" => "albx_message_font_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),         
        array(
            "type" => "kswr_fontsize",
            "param_name" => "albx_message_ftsize",
            "group" => "Typography",                 
            "heading" => esc_html__( "Font Size", "kaswara" ),
            "dependency" => Array("element" => "albx_message_font_def","value" => array('0')),            
            "defaults"=> array("font-size" => "13px","letter-spacing" => ""),
            'elements'  => array(
               esc_html__("Font Size","kaswara") => "font-size",
               esc_html__("Letter Spacing","kaswara") => "letter-spacing",               
            )
        ),  
        array(
            "type" => "kswr_fontstyle",
            "param_name" => "albx_message_ftstyle",
            "heading" =>esc_html__("Font Style","kaswara"),
            "value" => "",
            "dependency" => Array("element" => "albx_message_font_def","value" => array('0')),
            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
            'elements'  => array(
               esc_html__("Font Family","kaswara") => "font-family",
               esc_html__("Font Weight","kaswara") => "font-weight",                
               esc_html__("Font Style","kaswara") => "font-style",
            ),
            "group" => "Typography"
        ),

    )

    ));       
}
add_action( 'init', 'kswr_alertbox_shortcode' );


?>