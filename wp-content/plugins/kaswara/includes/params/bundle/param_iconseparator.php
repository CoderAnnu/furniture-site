<?php 

add_action( 'init', 'kswr_iconseparator_shortcode' );
function kswr_iconseparator_shortcode() {
    vc_map( array(
        "name" => esc_html__( "Icon Separator", "kaswara" ),
        "description" => esc_html__("Icon Seperator with effects", "kaswara"),                 
        'icon' => KASWARA_IMAGES.'small/iconseparat.jpg',  
     	"category" => "Kaswara",              
        "base" => "kswr_iconseparator",      
        "params" => array(                      
            array(
                "type" => "kswr_number",              
                "value" => 0,
                "heading" => esc_html__( "Line Height", "kaswara" ),
                "param_name" => "ics_height"
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Line Width ex (10px, 10%, 10em)", "kaswara" ),
                "param_name" => "ics_width"
            ),
             array(
                "type" => "colorpicker",             
                "heading" => esc_html__( "Line Color", "kaswara" ),
                "param_name" => "ics_color",
                'value' => "#333"
            ),
            array(
               "type" => "dropdown",
                "heading" => esc_html__( 'Line Alignement','kaswara'),
                "param_name" => "ics_alignement",           
                "value" => array(
                        "Center " => "center",
                        "Left " => "left",
                        "Right" => "right",
                ),                      
            ),
            array(
               "type" => "dropdown",
                "heading" => esc_html__( 'Style Effect','kaswara'),
                "param_name" => "ics_style",           
                "value" => array(
                        "None " => "none",
                        "From Center" => "from-center",
                        "From Left " => "from-left",
                        "From Right" => "from-right",
                        "From Top" => "from-top",
                        "From Bottom" => "from-bottom",
                ),                      
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "margin",
                "heading" => "Line Margins",
                "param_name" => "ics_margins",
                "defaults"=> array(
                    "top" => "0px",
                    "bottom" => "0px",
                    "left" => "0px",
                    "right" => "0px",
                ),                
                "positions" => array(
                   esc_html__("Top","kaswara") => "top",
                   esc_html__("Bottom","kaswara") => "bottom",
                   esc_html__("Left","kaswara") => "left",
                   esc_html__("Right","kaswara") => "right",
                )
            ),

             array(
                "type" => "kswr_iconchooser",
                "class" => "",
                "heading" =>esc_html__("Select Icon ","kaswara"),
                "param_name" => "ics_icon",
                "value" => "",
                "group" => "Icon",
            ),
            array(
                "type" => "kswr_number",
                "value" => 18,
                "group" => "Icon", 
                "max" => 250,
                "heading" => esc_html__( "Icon Size", "kaswara" ),
                "param_name" => "ics_icon_size"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Icon", 
                "value" => "#333",
                "heading" => esc_html__( "Icon Color", "kaswara" ),
                "param_name" => "ics_icon_color"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Icon", 
                "value" => "#fff",
                "heading" => esc_html__( "Icon Background Color", "kaswara" ),
                "param_name" => "ics_icon_back"
            ),
            array(
                "type" => "kswr_number",
                "value" => 25,
                "group" => "Icon", 
                "max" => 250,
                "heading" => esc_html__( "Icon Background size", "kaswara" ),
                "param_name" => "ics_icon_bgsize"
            ),

            array(
                "type" => "kswr_number",
                "value" => 0,
                "group" => "Icon", 
                "max" => 500,
                "min" => 0,
                "heading" => esc_html__( "Background Radius", "kaswara" ),
                "param_name" => "ics_icon_bgradius"
            ),
             array(
                "type" => "kswr_border",
                'bordergradient' => 'disable',
                "group" => "Icon", 
                "heading" => esc_html__( "Border Styling", "kaswara" ),                                      
                "param_name" => "ics_icon_bgborder"
             ),
             array(
                "type" => "kswr_switcher",
                "group" => "Icon", 
                "heading" => esc_html__( "Make Rotation", "kaswara" ),
                "description" => esc_html__( "Only if border radius 0", "kaswara" ),
                "param_name" => "ics_icon_rotate",
                'default' => 'false',
                'on' => array('text' => 'ON','val' => 'true' ),
                'off'=> array('text' => 'OFF','val' => 'false') 
            ), 

             array(
                "type" => "kswr_distance",
                "group" => "Icon", 
                "distance" => "margin",
                "heading" => esc_html__( "Icon Margins", "kaswara" ),
                "param_name" => "ics_icon_margin",
                "defaults"=> array(
                    "top" => "-9px"
                ), 
                "positions" => array(
                   esc_html__("Top","kaswara") => "top"
                ) 
            ) 


        )
    ));
}

?>