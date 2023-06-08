<?php 
/*------------------------------------------------
         SINGLE ICON  SHORTCODE
------------------------------------------------*/

function kswr_singleicon_shortcode(){
    vc_map( array(
        "name" => esc_html__( "Single Icon", "kaswara" ),
        "description" => esc_html__("Single icon with hover effect.", "kaswara"),         
        'icon' => KASWARA_IMAGES.'small/icon.jpg',  
        "category" => "Kaswara",        
        "base" => "kswr_singleicon",      
        "params" => array( 

             array(
                "type" => "kswr_iconchooser",
                "class" => "",
                "heading" =>esc_html__("Select Icon","kaswara"),
                "description" =>esc_html__("Choose Your Icon","kaswara"),
                "param_name" => "si_icon",
                "value" => "",
                "group" => "General",
            ),                             
            array(
                "type" => "dropdown",
                 "heading" => esc_html__( 'Icon Hover Effect','kaswara'),
                 "param_name" => "si_effect",           
                 "value" => array(
                    esc_html__('None','kaswara') => 'none',
                    esc_html__('Fade','kaswara') => 'fade',                   
                    esc_html__('Zoom in','kaswara') => 'zoomin',
                    esc_html__('Zoom out','kaswara') => 'zoomout',
                    esc_html__('Sasuki','kaswara') => 'sasuki',
                    esc_html__('Hiroshi','kaswara') => 'hiroshi',
                    esc_html__('Haruki','kaswara') => 'haruki',                   
                    esc_html__('Murawa','kaswara') => 'murawa',
                    esc_html__('Sisawa','kaswara') => 'sisawa',          
                ),         
                "group" => "General",
            ),
             //
             array(
                "type" => "kswr_message",
                "group" => "General", 
                "title" => esc_html__( "Icon Styling Styling", "kaswara" ),
                "param_name" => "si_style_default_sections",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "group" => "General", 
                "heading" => esc_html__( "Magic Rotation", "kaswara" ),
                "description" => esc_html__( "Only if border radius 0", "kaswara" ),
                "param_name" => "si_rotation",
                'default' => 'false',
                'on' => array('text' => 'ON','val' => 'true' ),
                'off'=> array('text' => 'OFF','val' => 'false') 
            ), 
            array(
                "type" => "kswr_switcher",
                "group" => "General", 
                "heading" => esc_html__( "Use Default Icon Styling", "kaswara" ),
                "param_name" => "si_style_default",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ),           
            array(
                "type" => "kswr_number",
                "value" => 18,
                "group" => "General", 
                "max" => 1200,
                "dependency" => Array("element" => "si_style_default","value" => array("0")),        
                "heading" => esc_html__( "Icon Size", "kaswara" ),
                "param_name" => "si_iconsize"
            ),
            array(
                "type" => "kswr_number",
                "value" => 25,
                "group" => "General", 
                "max" => 2200,
                "dependency" => Array("element" => "si_style_default","value" => array("0")),        
                "heading" => esc_html__( "Icon Background Size", "kaswara" ),
                "param_name" => "si_bgsize"
            ),
            array(
                "type" => "kswr_number",
                "value" => 0,
                "group" => "General", 
                "max" => 500,
                "dependency" => Array("element" => "si_style_default","value" => array("0")),        
                "heading" => esc_html__( "Icon Border Radius", "kaswara" ),
                "param_name" => "si_border_radius"
            ),

            array(
                "type" => "kswr_gradient",
                "group" => "General",            
                "value" => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
                "dependency" => Array("element" => "si_style_default","value" => array("0")),                    
                "heading" => esc_html__( "Icon Color", "kaswara" ),
                "param_name" => "si_ic_color"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => "General",            
                "value" => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
                "dependency" => Array("element" => "si_style_default","value" => array("0")),                    
                "heading" => esc_html__( "Icon Color onHover", "kaswara" ),
                "param_name" => "si_ic_color_hover"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => "General",            
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',   
                "dependency" => Array("element" => "si_style_default","value" => array("0")),                    
                "heading" => esc_html__( "Icon Background", "kaswara" ),
                "param_name" => "si_back"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => "General",            
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',   
                "dependency" => Array("element" => "si_style_default","value" => array("0")),                    
                "heading" => esc_html__( "Icon Background onHover", "kaswara" ),
                "param_name" => "si_back_hover"
            ),
            array(
                "type" => "kswr_border",
                'bordergradient' => 'enable',
                'bordergradient' => 'enable',
                "heading" => esc_html__( "Border Styling", "kaswara" ),         
                "dependency" => Array("element" => "si_style_default","value" => array("0")),                    
                "group" => "General",                 
                "param_name" => "si_border"
             ),

            array(
                "type" => "textfield",
                "heading" => esc_html__( "Icon Link", "kaswara" ),
                "param_name" => "si_link",
                "value" => '',
                "group" => "General"   
            ),
            array(
                "type" => "dropdown",
                 "heading" => esc_html__( 'Open Link in','kaswara'),
                 "param_name" => "si_openlink",           
                 "value" => array(
                    esc_html__('Same Window','kaswara') => '_self',
                    esc_html__('New tab','kaswara') => '_blank'            
                ),         
                "group" => "General",
            ),
            //Icon Distance    
            array(
                "type" => "dropdown",
                 "heading" => esc_html__( 'Icon Alignment','kaswara'),
                 "param_name" => "si_elem_align",           
                 "value" => array(
                    esc_html__('Left','kaswara') => 'left',
                    esc_html__('Center','kaswara') => 'center',
                    esc_html__('Right','kaswara') => 'right'            
                ),         
                "group" => "Margins",
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "si_elem_margins",
                "heading" => esc_html__( "Icon Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Margins"
            ),




        )
    ));        
}
add_action( 'init', 'kswr_singleicon_shortcode' ); 
?>