<?php 
/*------------------------------------------------
            TEAMMATE  SHORTCODE
------------------------------------------------*/
function kswr_teammate_shortcode() {
    vc_map( array(
        "name" => esc_html__( "Team Mate", "kaswara" ),
        'icon' => KASWARA_IMAGES.'small/teammate.jpg',  
        "category" => "Kaswara",                              
        "description" => esc_html__("Information module about a teammate", "kaswara"),                 
        "base" => "kswr_teammate",      
        "params" => array(
            array(
                "type" => "attach_image",
                "group" => "Information", 
                "heading" => esc_html__( "Picture", "kaswara" ),
                "param_name" => "tmmate_img"
            ),
            array(
                "type" => "dropdown", 
                 "group" => "Information",            
                "heading" => esc_html__("Style ", "kaswara"),
                "param_name" => "tmmate_style",
                "value" => array(
                    esc_html__("Normal","kaswara") => 'style1',
                    esc_html__("With Hover","kaswara") => 'style2',
                    esc_html__("Simple Style","kaswara") => 'style3',
                )
            ),
            array(
                "type" => "dropdown", 
                 "group" => "Information",            
                "heading" => esc_html__("Content Alignment ", "kaswara"),
                "dependency" => Array("element" => "tmmate_style","value" => array("style3")),                                  
                "param_name" => "tmmate_style3_align",
                "value" => array(
                    esc_html__("Center","kaswara") => 'center',
                    esc_html__("Left","kaswara") => 'left',
                    esc_html__("Right","kaswara") => 'right',
                )
            ),
            array(
                "type" => "textfield",
                 "group" => "Information", 
                "heading" => esc_html__( "Name", "kaswara" ),
                "param_name" => "tmmate_name"
            ),
            array(
                "type" => "textfield",
                 "group" => "Information", 
                "heading" => esc_html__( "Team mate Title", "kaswara" ),
                "param_name" => "tmmate_position"
            ),
             array(
                "type" => "textarea_html",
                 "group" => "Information", 
                "heading" => esc_html__( "Content", "kaswara" ),
                "param_name" => "content",
                "edit_field_class" => "ult_hide_editor_fullscreen vc_col-xs-12 vc_column wpb_el_type_textarea_html vc_wrapper-param-type-textarea_html vc_shortcode-param",  
            ),

            array(
                "type" => "kswr_message",
                "title" => esc_html__( "Link Color Settings", "kaswara" ),
                 "group" => "Social", 
                "param_name" => "tmmate_scl_color_sections",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Use Default Color", "kaswara" ),
                 "group" => "Social", 
                "param_name" => "tmmate_scl_color_def",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
             ),
            array(
                "type" => "colorpicker",
                 "group" => "Social", 
                "dependency" => Array("element" => "tmmate_scl_color_def","value" => array("0")),                                  
                "heading" => esc_html__( "Link Color", "kaswara" ),
                "param_name" => "tmmate_scl_color"
            ),
             array(
                'type' => 'dropdown',
                'heading' => esc_html__("Open Links in",'kaswara'),
                'param_name' => 'tmmate_openin',
                "group" => "Social",           
                'value' => array(
                    esc_html__("New Window",'kaswara') => '_blank',
                    esc_html__("Same Window",'kaswara') => '_self',
                ),
            ), 
            array(
                "type" => "textfield",
                 "group" => "Social", 
                "heading" => esc_html__( "Facebook Link", "kaswara" ),
                "param_name" => "tmmate_fb_link"
            ),
            array(
                "type" => "textfield",
                 "group" => "Social", 
                "heading" => esc_html__( "Twitter Link", "kaswara" ),
                "param_name" => "tmmate_tw_link"
            ),
            array(
                "type" => "textfield",
                 "group" => "Social", 
                "heading" => esc_html__( "Google+ Link", "kaswara" ),
                "param_name" => "tmmate_gplus_link"
            ),
            array(
                "type" => "textfield",
                 "group" => "Social", 
                "heading" => esc_html__( "Linkedin Link", "kaswara" ),
                "param_name" => "tmmate_lk_link"
            ),
            array(
                "type" => "textfield",
                 "group" => "Social", 
                "heading" => esc_html__( "Github Link", "kaswara" ),
                "param_name" => "tmmate_git_link"
            ),
            array(
                "type" => "textfield",
                 "group" => "Social", 
                "heading" => esc_html__( "Instagram Link", "kaswara" ),
                "param_name" => "tmmate_insta_link"
            ),

            

            array(
                "type" => "kswr_message",
                "group" => "Typography", 
                "title" => esc_html__( "Name Font Settings", "kaswara" ),            
                "param_name" => "tmmate_name_font_sections",
                "mtop" => "10px"
             ),
             array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Use Default Font Settings", "kaswara" ),
                "group" => "Typography", 
                "param_name" => "tmmate_name_font_def",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
             ), 
             array(
                "type" => "kswr_fontsize",
                "param_name" => "tmmate_name_ftsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "dependency" => Array("element" => "tmmate_name_font_def","value" => array("0")),                               
                "defaults"=> array("font-size" => "17px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
                "param_name" => "tmmate_name_ftstyle",
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "dependency" => Array("element" => "tmmate_name_font_def","value" => array("0")),                                  
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),            
            array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Use Default Name Color", "kaswara" ),
                 "group" => "Typography", 
                "param_name" => "tmmate_name_color_def",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
             ),
            array(
                "type" => "colorpicker",
                 "group" => "Typography", 
                "dependency" => Array("element" => "tmmate_name_color_def","value" => array("0")),                                  
                "heading" => esc_html__( "Name Color", "kaswara" ),
                "param_name" => "tmmate_name_color"
            ), 
             array(
                "type" => "kswr_message",
                "group" => "Typography", 
                "title" => esc_html__( "Position Font Settings", "kaswara" ),            
                "param_name" => "tmmate_position_font_sections",
                "mtop" => "10px"
             ),
             array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Use Default Font Settings", "kaswara" ),
                "param_name" => "tmmate_position_font_def",
                "group" => "Typography", 
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
             ), 
             array(
                "type" => "kswr_fontsize",
                "param_name" => "tmmate_position_ftsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "dependency" => Array("element" => "tmmate_position_font_def","value" => array("0")),                               
                "defaults"=> array("font-size" => "17px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
                "param_name" => "tmmate_position_ftstyle",
                "heading" => esc_html__( "Font Style", "kaswara" ),       
                "dependency" => Array("element" => "tmmate_position_font_def","value" => array("0")),                                  
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),    

             array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Use Default Position Color", "kaswara" ),
                 "group" => "Typography", 
                "param_name" => "tmmate_position_color_def",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
             ),
            array(
                "type" => "colorpicker",
                 "group" => "Typography", 
                "dependency" => Array("element" => "tmmate_position_color_def","value" => array("0")),                                  
                "heading" => esc_html__( "Name Position", "kaswara" ),
                "param_name" => "tmmate_position_color"
            ), 


        )
    ));
} 
add_action( 'init', 'kswr_teammate_shortcode' );

?>