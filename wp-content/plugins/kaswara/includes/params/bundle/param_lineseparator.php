<?php 

add_action( 'init', 'kswr_lineseparator_shortcode' );
function kswr_lineseparator_shortcode() {
    vc_map( array(
        "name" => esc_html__( "Line Separator", "kaswara" ),
        "description" => esc_html__("Line Seperator with effects", "kaswara"),                 
        'icon' => KASWARA_IMAGES.'small/linesep.jpg',  
     	"category" => "Kaswara",              
        "base" => "kswr_lineseparator",      
        "params" => array(                      
            array(
                "type" => "kswr_number",              
                "value" => 0,
                "heading" => esc_html__( "Line Height", "kaswara" ),
                "param_name" => "ls_height"
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Line Width ex (10px, 10%, 10em)", "kaswara" ),
                "param_name" => "ls_width"
            ),
             array(
                "type" => "kswr_gradient",             
                "heading" => esc_html__( "Line Color", "kaswara" ),
                "param_name" => "ls_color",
                'value' => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}'
            ),
            array(
               "type" => "dropdown",
                "heading" => esc_html__( 'Line Alignement','kaswara'),
                "param_name" => "ls_alignement",           
                "value" => array(
                        "Center " => "center",
                        "Left " => "left",
                        "Right" => "right",
                ),                      
            ),
            array(
               "type" => "dropdown",
                "heading" => esc_html__( 'Style Effect','kaswara'),
                "param_name" => "ls_style",           
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
                "param_name" => "ls_margins",
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
        )
    ));
}

?>