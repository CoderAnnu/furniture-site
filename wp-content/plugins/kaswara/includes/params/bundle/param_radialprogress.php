<?php 
/*------------------------------------------------
            RADIAL PROGRESS  SHORTCODE
------------------------------------------------*/
function kswr_radialprogress_shortcode() {
    vc_map( array(
        "name" => esc_html__( "Radial Progress", "kaswara" ),
        'icon' => KASWARA_IMAGES.'small/radial.jpg',  
        "category" => "Kaswara",        
        "description" => esc_html__("A Percentage radial progress with percentage animation", "kaswara"),                 
        "base" => "kswr_radialprogress",      
        "params" => array(                      
            array(
                "type" => "kswr_number",
                "group" => "Content", 
                "max" => 100,
                "value" => 50,
                "heading" => esc_html__( "Percentage Value", "kaswara" ),
                "param_name" => "rad_percent"
            ),
            array(
               "type" => "dropdown",
                "heading" => esc_html__( 'Enable Icon','kaswara'),
                "param_name" => "rad_icon_enabled",           
                "value" => array(
                        "No" => "off",
                        "Yes" => "on",
                    ),         
                "group" => "Content",
            ),
            array(
               "type" => "dropdown",
                "heading" => esc_html__( 'Radial Style','kaswara'),
                "param_name" => "rad_style",           
                "value" => array(
                        "Icon Only " => "style1",
                        "Icon Top " => "style2",
                        "Icon Bottom" => "style3",
                        "Icon Letf" => "style4",
                        "Icon Right" => "style5",
                    ),      
                "dependency" => Array("element" => "rad_icon_enabled","value" => "on"),        
                "group" => "Content",
            ),
            array(
                "type" => "kswr_iconchooser",
                "class" => "",
                "heading" =>esc_html__("Select Icon ","kaswara"),
                "param_name" => "rad_icon",
                "value" => "",
                "dependency" => Array("element" => "rad_icon_enabled","value" => "on"),                       
                "group" => "Content",
            ),
            array(
                "type" => "kswr_number",
                "value" => 26,
                "group" => "Content", 
                "max" => 250,
                "dependency" => Array("element" => "rad_icon_enabled","value" => "on"),        
                "heading" => esc_html__( "Icon Size", "kaswara" ),
                "param_name" => "rad_icon_size"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Content", 
                "value" => "#444",
                "dependency" => Array("element" => "rad_icon_enabled","value" => "on"),        
                "heading" => esc_html__( "Icon Color", "kaswara" ),
                "param_name" => "rad_icon_color"
            ),

            array(
                "type" => "kswr_message",
                "group" => "Content",                                 
                "title" => esc_html__("Content Background Settings","kaswara"),            
                "param_name" => "rad_content_background_sections",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "group" => "Content",                                 
                "heading" => esc_html__( "Use Default Background Color", "kaswara" ),
                "param_name" => "rad_content_background_def",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
             ),
            array(
                "type" => "colorpicker",
                "param_name" => "rad_content_background",
                "group" => "Content", 
                "value" => "#fafafe",
                "dependency" => Array("element" => "rad_content_background_def","value" => array('0')),
                "heading" => esc_html__( "Content Background Color", "kaswara" ),
            ),


            array(
                "type" => "kswr_message",
                "group" => "Content",                                 
                "title" => esc_html__("Content Font Color Settings","kaswara"),            
                "param_name" => "rad_content_color_sections",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Use Default Color", "kaswara" ),
                "param_name" => "rad_content_color_def",
                'default' => '1',
                "group" => "Content",                                 
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
             ),
            array(
                "type" => "colorpicker",
                "value" => "#444",
                "group" => "Content", 
                "heading" => esc_html__( "Content Font Color", "kaswara" ),
                "dependency" => Array("element" => "rad_content_color_def","value" => array('0')),
                "param_name" => "rad_content_color"
            ),  

            array(
                "type" => "kswr_message",
                "title" => "Font Style Settings",            
                "group" => "Content",                 
                "param_name" => "rad_content_fontstyle_sections",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Use Default Font Style", "kaswara" ),
                "group" => "Content",                 
                "param_name" => "rad_content_fontstyle_def",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
             ), 
            array(
                "type" => "kswr_fontstyle",
                "param_name" => "rad_content_fontstyle",
                "heading" => esc_html__( "Content Font Style", "kaswara" ),
                "value" => "",
                "dependency" => Array("element" => "rad_content_fontstyle_def","value" => array('0')),
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Content"
            ),
             
             array(
                "type" => "kswr_message",
                "group" => "Content",                 
                "title" => "Font Size Settings",            
                "param_name" => "rad_content_fontsize_sections",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Use Default Font Size", "kaswara" ),
                "group" => "Content",                 
                "param_name" => "rad_content_fontsize_def",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
             ),

             array(
                "type" => "kswr_fontsize",
                "param_name" => "rad_content_fontsize",
                "group" => "Content",                 
                "heading" => esc_html__( "Content Font Size", "kaswara" ),
                "dependency" => Array("element" => "rad_content_fontsize_def","value" => array('0')),            
                "defaults"=> array("font-size" => "16px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",
                   esc_html__("Line Height","kaswara") => "line-height",
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
                   esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
                   esc_html__("Phone Font Size","kaswara") => "--phone-font-size",                
                )
            ),           
            
            array(
                "type" => "kswr_message",
                "group" => "Radial Circle", 
                "title" => esc_html__( "Circle Size Settings", "kaswara" ),
                "param_name" => "rad_size_sections",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Use Default Size", "kaswara" ),
                "param_name" => "rad_size_def",
                    "group" => "Radial Circle", 
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
             ), 
            array(
                "type" => "kswr_number",
                "group" => "Radial Circle", 
                "value" => 150,
                "max" => 650,
                "dependency" => Array("element" => "rad_size_def","value" => array('0')),
                "heading" => esc_html__( "Circle Size", "kaswara" ),
                "param_name" => "rad_size"
            ),

            array(
                "type" => "kswr_message",
                "group" => "Radial Circle", 
                "title" => esc_html__( "Border Size Settings", "kaswara" ),
                "param_name" => "rad_border_sizesections",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Use Default Size", "kaswara" ),
                "param_name" => "rad_border_size_def",
                    "group" => "Radial Circle", 
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
             ), 
            array(
                "type" => "kswr_number",
                "group" => "Radial Circle", 
                "value" => 7,
                "max" => 90,
                "dependency" => Array("element" => "rad_border_size_def","value" => array('0')),
                "heading" => esc_html__( "Circle Border Size", "kaswara" ),
                "param_name" => "rad_border_size"
            ),

            array(
                "type" => "kswr_message",
                "group" => "Radial Circle", 
                "title" => esc_html__( "Border Color Settings", "kaswara" ),
                "param_name" => "rad_border_color_sections",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Use Default Border Color", "kaswara" ),
                "param_name" => "rad_border_color_def",
                "group" => "Radial Circle", 
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
             ), 
            array(
                "type" => "colorpicker",
                "value" => "#eee",
                "group" => "Radial Circle", 
                "heading" => esc_html__( "Border Color", "kaswara" ),
                "dependency" => Array("element" => "rad_border_color_def","value" => array('0')),
                "param_name" => "rad_border_color"
            ),


            array(
                "type" => "kswr_message",
                "group" => "Radial Circle", 
                "title" => esc_html__( "Radial Color Settings", "kaswara" ),
                "param_name" => "rad_color_sections",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Use Default Radial Color", "kaswara" ),
                "param_name" => "rad_color_def",
                "group" => "Radial Circle", 
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
             ), 
            array(
                "type" => "colorpicker",
                "value" => "#289fca",
                "group" => "Radial Circle", 
                "dependency" => Array("element" => "rad_color_def","value" => array('0')),
                "heading" => esc_html__( "Radial Border Color", "kaswara" ),
                "param_name" => "rad_color"
            ),

            
            array(
                "type" => "kswr_message",
                "group" => "Radial Circle", 
                "title" => esc_html__( "Alignement Settings", "kaswara" ),
                "param_name" => "radial_position_sections",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Use Default Alignement", "kaswara" ),
                "param_name" => "radial_position_def",
                "group" => "Radial Circle", 
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
             ), 

            array(
                "type" => "dropdown", 
                "group" => "Radial Circle",            
                "heading" => esc_html__("Alignement ", "kaswara"),
                "param_name" => "radial_position",
                "dependency" => Array("element" => "radial_position_def","value" => array('0')),
                "value" => "center",
                "value" => array(
                    esc_html__("Center","kaswara") => 'center',
                    esc_html__("Left","kaswara") => 'left',
                    esc_html__("Right","kaswara") => 'right',
                )

            ),
        )
    ));
} 
add_action( 'init', 'kswr_radialprogress_shortcode' );

?>