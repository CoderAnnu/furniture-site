<?php 
/*------------------------------------------------
         HOVER INFO BOX SHORTCODE
------------------------------------------------*/

function kswr_hoverinfobox_shortcode(){
    vc_map( array(
        "name" => esc_html__( "Hover Info Box", "kaswara" ),
        "description" => esc_html__("Info box with cool background effects", "kaswara"),         
        'icon' => KASWARA_IMAGES.'small/hover.jpg',  
        "category" => "Kaswara",            
        "base" => "kswr_hoverinfobox",      
        "params" => array(                   
            //Content   
            array(
                "type" => "kswr_number",          
                "heading" => esc_html__( "Container Min Height", "kaswara" ),
                "group" => "Content",
                "param_name" => "hvbx_height",          
                "value" => 300
            ),
            array(
                "type" => "kswr_iconchooser",
                "heading" => esc_html__("Select Icon","kaswara"),          
                "param_name" => "hvbx_icon",
                "value" => "",
                "group" => "Content",
            ), 
            array(
                "type" => "textfield",
                "group" => "Content", 
                "heading" => esc_html__( "Title", "kaswara" ),
                "param_name" => "hvbx_title"
            ), 
            array(
                "type" => "textfield",
                "group" => "Content", 
                "heading" => esc_html__( "Sub - Title", "kaswara" ),
                "param_name" => "hvbx_subtitle"
            ),
             array(
                "type" => "textarea",
                "group" => "Content", 
                "heading" => esc_html__( "Content", "kaswara" ),
                "param_name" => "hvbx_content"
            ),
             array(
                "type" => "vc_link",
                "group" => "Content", 
                "heading" => esc_html__( "Apply Link", "kaswara" ),
                "param_name" => "hvbx_link"
            ),
             
             /*array(
                "type" => "dropdown", 
                "group" => "Content",            
                "heading" => esc_html__("Hover Style", "kaswara"),
                "param_name" => "hvbx_hoverstyle",
                "value" => array(
                    esc_html__("Fade","kaswara") => 'fade',
                )
            ), */

            //Sizes
            array(
                "type" => "kswr_message",  "group" => "Sizes",
                "title" => esc_html__("Sizes Settings","kaswara"),                          
                "param_name" => "hvbx_size_section",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "group" => "Sizes", 
                "heading" => esc_html__( "Use Default Settings", "kaswara" ),
                "param_name" => "hvbx_size_def",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ), 
             array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Icon Size ", "kaswara" ),
                "param_name" => "hvbx_icon_size",
                "dependency" => Array("element" => "hvbx_size_def","value" => array('0')),            
                "value" => 36,
                "group" => 'Sizes' 
            ),
             array(
                "type" => "kswr_message",  "group" => "Sizes",
                "dependency" => Array("element" => "hvbx_size_def","value" => array('0')),            
                "title" => esc_html__("Tile Font Settings","kaswara"),                          
                "param_name" => "hvbx_titlesize_section",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_fontsize",
                "param_name" => "hvbx_title_fsize",
                "group" => "Sizes",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "dependency" => Array("element" => "hvbx_size_def","value" => array('0')),            
                "defaults"=> array("font-size" => "22px","letter-spacing" => "","line-height" => ""),
                'elements'  => array(
                     esc_html__("Line Height","kaswara") => "line-height",
                    esc_html__("Font Size","kaswara") => "font-size",
                    esc_html__("Letter Spacing","kaswara") => "letter-spacing"           
                )
            ),  
            array(
                "type" => "kswr_fontstyle",
                "param_name" => "hvbx_title_fstyle",
                "heading" => esc_html__("Font Style","kaswara"),
                "value" => "",
                "dependency" => Array("element" => "hvbx_size_def","value" => array('0')),
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                    esc_html__("Font Family","kaswara") => "font-family",
                    esc_html__("Font Weight","kaswara") => "font-weight",                
                    esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Sizes"
            ),

            array(
                "type" => "kswr_message",  "group" => "Sizes",
                "dependency" => Array("element" => "hvbx_size_def","value" => array('0')),            
                "title" => esc_html__("SubTile Font Settings","kaswara"),                          
                "param_name" => "hvbx_subtitlesize_section",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_fontsize",
                "param_name" => "hvbx_subtitle_fsize",
                "group" => "Sizes",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "dependency" => Array("element" => "hvbx_size_def","value" => array('0')),            
                "defaults"=> array("font-size" => "14px","letter-spacing" => "","line-height" => ""),
                'elements'  => array(
                     esc_html__("Line Height","kaswara") => "line-height",
                    esc_html__("Font Size","kaswara") => "font-size",
                    esc_html__("Letter Spacing","kaswara") => "letter-spacing"           
                )
            ),  
            array(
                "type" => "kswr_fontstyle",
                "param_name" => "hvbx_subtitle_fstyle",
                "heading" => esc_html__("Font Style","kaswara"),
                "value" => "",
                "dependency" => Array("element" => "hvbx_size_def","value" => array('0')),
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                    esc_html__("Font Family","kaswara") => "font-family",
                    esc_html__("Font Weight","kaswara") => "font-weight",                
                    esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Sizes"
            ),
            array(
                "type" => "kswr_message",  "group" => "Sizes",
                "dependency" => Array("element" => "hvbx_size_def","value" => array('0')),            
                "title" => esc_html__("Content Font Settings","kaswara"),                          
                "param_name" => "hvbx_content_section",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_fontsize",
                "param_name" => "hvbx_content_fsize",
                "group" => "Sizes",                 
                "heading" => esc_html__( "Font Size", "kaswara" ),
                "dependency" => Array("element" => "hvbx_size_def","value" => array('0')),            
                "defaults"=> array("font-size" => "15px","letter-spacing" => "","line-height" => ""),
                'elements'  => array(
                     esc_html__("Line Height","kaswara") => "line-height",
                    esc_html__("Font Size","kaswara") => "font-size",
                    esc_html__("Letter Spacing","kaswara") => "letter-spacing"           
                )
            ),  
            array(
                "type" => "kswr_fontstyle",
                "param_name" => "hvbx_content_fstyle",
                "heading" => esc_html__("Font Style","kaswara"),
                "value" => "",
                "dependency" => Array("element" => "hvbx_size_def","value" => array('0')),
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                    esc_html__("Font Family","kaswara") => "font-family",
                    esc_html__("Font Weight","kaswara") => "font-weight",                
                    esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Sizes"
            ),
            
            //Normal Colors
             array(
                "type" => "kswr_message",  "group" => "Colors",
                "title" => esc_html__("Normal Colors Settings","kaswara"),                          
                "param_name" => "hvbx_color_section",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "group" => "Colors", 
                "heading" => esc_html__( "Use Default Settings", "kaswara" ),
                "param_name" => "hvbx_clr_r_def",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ),         
           array(
                "type" => "kswr_gradient",
                "group" => "Colors",            
                "value" => '{"type":"color", "color1":"#f7f7f7", "color2":"#f7f7f7", "direction":"to left"}',
                "dependency" => Array("element" => "hvbx_clr_r_def","value" => array("0")),                    
                "heading" => esc_html__( "Container Background", "kaswara" ),
                "param_name" => "hvbx_container_clr_r"
            ),
           array(
                'bordergradient' => 'noenable',
                "type" => "kswr_border",
                "heading" => esc_html__( "Border Styling", "kaswara" ),         
                "dependency" => Array("element" => "hvbx_clr_r_def","value" => array("0")),                    
                "group" => "Colors",                 
                "param_name" => "hvbx_container_br_r"
             ),
            array(
                "type" => "kswr_gradient",
                "group" => "Colors",            
                "value" => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
                "dependency" => Array("element" => "hvbx_clr_r_def","value" => array("0")),                    
                "heading" => esc_html__( "Icon Color", "kaswara" ),
                "param_name" => "hvbx_icon_clr_r"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Colors",            
                "dependency" => Array("element" => "hvbx_clr_r_def","value" => array("0")),                    
                "value" => "#333",
                "heading" => esc_html__( "Title Color", "kaswara" ),
                "param_name" => "hvbx_title_clr_r"
            ),
            
            array(
                "type" => "colorpicker",
                "group" => "Colors",            
                "dependency" => Array("element" => "hvbx_clr_r_def","value" => array("0")),                    
                "value" => "#888",
                "heading" => esc_html__( "SubTitle Color", "kaswara" ),
                "param_name" => "hvbx_subtitle_clr_r"
            ),
             array(
                "type" => "colorpicker",
                "group" => "Colors",            
                "dependency" => Array("element" => "hvbx_clr_r_def","value" => array("0")),                    
                "value" => "#555",
                "heading" => esc_html__( "Content Color", "kaswara" ),
                "param_name" => "hvbx_content_clr_r"
            ),
            
            
            
            
            

            //Hover COlors
             array(
                "type" => "kswr_message",  "group" => "Hover",
                "title" => esc_html__("Normal Colors Settings","kaswara"),                          
                "param_name" => "hvbx_colorhover_section",
                "mtop" => "10px"
             ),
            array(
                "type" => "kswr_switcher",
                "group" => "Hover", 
                "heading" => esc_html__( "Use Default Settings", "kaswara" ),
                "param_name" => "hvbx_clr_h_def",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ),         
           array(
                "type" => "kswr_gradient",
                "group" => "Hover",            
                "value" => '{"type":"color", "color1":"#269AD6", "color2":"#269AD6", "direction":"to left"}',
                "dependency" => Array("element" => "hvbx_clr_h_def","value" => array("0")),                    
                "heading" => esc_html__( "Container Background", "kaswara" ),
                "param_name" => "hvbx_container_clr_h"
            ),
           array(
                'bordergradient' => 'noenable',
                "type" => "kswr_border",
                "heading" => esc_html__( "Border Styling", "kaswara" ),         
                "dependency" => Array("element" => "hvbx_clr_h_def","value" => array("0")),                    
                "group" => "Hover",                 
                "param_name" => "hvbx_container_br_h"
             ),
            array(
                "type" => "kswr_gradient",
                "group" => "Hover",            
                "value" => '{"type":"color", "color1":"#fff", "color2":"#fff", "direction":"to left"}',
                "dependency" => Array("element" => "hvbx_clr_h_def","value" => array("0")),                    
                "heading" => esc_html__( "Icon Color", "kaswara" ),
                "param_name" => "hvbx_icon_clr_h"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Hover",            
                "dependency" => Array("element" => "hvbx_clr_h_def","value" => array("0")),                    
                "value" => "#fff",
                "heading" => esc_html__( "Title Color", "kaswara" ),
                "param_name" => "hvbx_title_clr_h"
            ),
            
            array(
                "type" => "colorpicker",
                "group" => "Hover",            
                "dependency" => Array("element" => "hvbx_clr_h_def","value" => array("0")),                    
                "value" => "#f4f4f4",
                "heading" => esc_html__( "SubTitle Color", "kaswara" ),
                "param_name" => "hvbx_subtitle_clr_h"
            ),
             array(
                "type" => "colorpicker",
                "group" => "Hover",            
                "dependency" => Array("element" => "hvbx_clr_h_def","value" => array("0")),                    
                "value" => "#fff",
                "heading" => esc_html__( "Content Color", "kaswara" ),
                "param_name" => "hvbx_content_clr_h"
            ),

            //Distances 
            array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Container Border Radius", "kaswara" ),
                "param_name" => "hvbx_container_br_radius",            
                "value" => 0,
                "group" => 'Distances' 
             ),
            array(
                "type" => "kswr_distance",
                "distance" => "padding",            
                "param_name" => "hvbx_container_paddins",
                "heading" => esc_html__( "Container Paddings", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Distances"
            ),
             array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "hvbx_icon_margin",
                "heading" => esc_html__( "Icon Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",                                    
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Distances"
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "hvbx_title_margin",
                "heading" => esc_html__( "Title Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",                                    
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Distances"
            ),
            
            array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "hvbx_subtitle_margin",
                "heading" => esc_html__( "Sub-Title Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",                                    
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Distances"
            ),
             array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "param_name" => "hvbx_content_margin",
                "heading" => esc_html__( "Content Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",                                    
                    esc_html__("Bottom","kaswara") => "bottom"
                ),
                "group" => "Distances"
            ),
            

        )
    ));        
}
add_action( 'init', 'kswr_hoverinfobox_shortcode' ); 



?>