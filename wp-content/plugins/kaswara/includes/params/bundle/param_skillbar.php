<?php 
function kswr_skillbar_shortcode() {
   vc_map( array(
      "name" => esc_html__( "Skill Bar", "kaswara" ),
      "base" => "kswr_skillbar",
      'icon' => KASWARA_IMAGES.'small/progressbar.jpg',  
      "category" => "Kaswara",      
      "description" => esc_html__("A percentage bar defining a person skill with load effect", "kaswara"),     
      "class" => "",      
      "params" => array(
        
         array(
            "type" => "textfield",
            "heading" => esc_html__( "Skill Title", "kaswara" ),
            "param_name" => "skl_skill",
            "admin_label" => true   
         ),
      
         array(
            "type" => "kswr_number",
            "heading" => esc_html__( "Skill Value (%)", "kaswara" ),
            "param_name" => "skl_percent",
            "admin_label" => true,   
         ),
         array(
            "type" => "kswr_message",
            "title" => esc_html__( "Style Settings", "kaswara" ),                      
            "param_name" => "skl_font_style_sections",
            "mtop" => "10px"
         ),
         array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Style", "kaswara" ),
            "param_name" => "skl_style_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
         array(
            "type" => "kswr_number",
            "heading" => esc_html__( "Bar Height", "kaswara" ),
            "param_name" => "skl_height",
            "dependency" => Array("element" => "skl_style_def","value" => array('0')),            
            "value" => 5,
         ),

         array(
            "type" => "colorpicker",
            "heading" => esc_html__( "Bar Background Color", "kaswara" ),
            "param_name" => "skl_bar_bg_color",
            "dependency" => Array("element" => "skl_style_def","value" => array('0')),
            "value" => '#f6f6f6', 
         ),
         array(
            "type" => "kswr_gradient",
            "heading" => esc_html__( "Bar Color", "kaswara" ),
            "param_name" => "skl_bar_color",
            "dependency" => Array("element" => "skl_style_def","value" => array('0')),            
            "value" => '{"type":"color", "color1":"#00AFD1", "color2":"#00AFD1", "direction":"to left"}', 
         ),

         array(
            "type" => "colorpicker",
            "heading" => esc_html__( "Skill Name Color", "kaswara" ),
            "param_name" => "skl_title_color",
            "dependency" => Array("element" => "skl_style_def","value" => array('0')),
            "value" => '#333'
         ),
        
        array(
            'type' => 'dropdown',
            'heading' => esc_html__("Bar Style",'kaswara'),
            'param_name' => 'skl_style',
            "dependency" => Array("element" => "skl_style_def","value" => array('0')),
            'value' => array(
                esc_html__("Style 1",'kaswara') => 'style_1',
                esc_html__("Style 2",'kaswara') => 'style_2',
                esc_html__("Style 3",'kaswara') => 'style_3',
            ),      
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__("Bar Strips",'kaswara'),
            'param_name' => 'skl_strips',
            "dependency" => Array("element" => "skl_style_def","value" => array('0')),            
            'value' => array(
                esc_html__("None",'kaswara') => 'none',
                esc_html__("Normal Strips",'kaswara') => 'normal',
                esc_html__("Moving Strips",'kaswara') => 'moving',
            ),      
        ),
        array(
            "type" => "kswr_number",          
            "heading" => esc_html__( "Bar Border Radius", "kaswara" ),
            "param_name" => "skl_radius",
            "dependency" => Array("element" => "skl_style_def","value" => array('0')),          
            "value" => 0,
         ),

        //Font Settings
        array(
            "type" => "kswr_message",
            "title" => esc_html__( "Font Settings", "kaswara" ), 
            "group" => "Typography",                 
            "param_name" => "skl_font_style_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Font Style", "kaswara" ),
            "group" => "Typography",                 
            "param_name" => "skl_font_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ), 

        array(
            "type" => "kswr_fontstyle",
            "param_name" => "skl_font_style",
            "heading" =>esc_html__("Font Style","kaswara"),
            "value" => "",
            "dependency" => Array("element" => "skl_font_def","value" => array('0')),
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
            "param_name" => "skl_font_sizes",
            "group" => "Typography",                 
            "heading" => esc_html__( "Font Size", "kaswara" ),
            "dependency" => Array("element" => "skl_font_def","value" => array('0')),            
            "defaults"=> array("font-size" => "17px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
            'elements'  => array(
               esc_html__("Font Size","kaswara") => "font-size",
               esc_html__("Line Height","kaswara") => "line-height",
               esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
               esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
               esc_html__("Phone Font Size","kaswara") => "--phone-font-size",                
            )
        ),  

      )
   
   ) );
}
add_action( 'init', 'kswr_skillbar_shortcode' );
?>