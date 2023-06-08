<?php 
/*------------------------------------------------
         VERTICAL SKILL BAR SHORTCODE
------------------------------------------------*/

function kswr_verticalskillbar_shortcode(){
    vc_map( array(
        "name" => esc_html__( "Vertical Skill Bar", "kaswara" ),
        "description" => esc_html__("Skill bar in a vertical layout!", "kaswara"),         
        'icon' => KASWARA_IMAGES.'small/verticalprogress.jpg',  
        "category" => "Kaswara",        
        "base" => "kswr_verticalskillbar",      
        "params" => array(                   
            //Content
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Skill Name", "kaswara" ),
                "param_name" => "vsklbr_name",
                "admin_label" => true,
                "value" => '',
                "group" => "Content"   
            ),
            array(
                "type" => "kswr_number",
                "value" => 0,
                "group" => "Content", 
                "max" => 100,
                "min" => 0,
                "heading" => esc_html__( "Skill Value %", "kaswara" ),
                "param_name" => "vsklbr_value"
            ),
            //Style 
             array(
                "type" => "kswr_message",
                "group" => "Styling",                
                "title" => esc_html__( "Bar Styling Settings", "kaswara" ),
                "param_name" => "vsklbr_sections",
                "mtop" => "10px"
             ),
             array(
                "type" => "kswr_switcher",
                "group" => "Styling", 
                "heading" => esc_html__( "Use Default Styling", "kaswara" ),
                "param_name" => "vsklbr_style_def",
                'default' => '1',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ),
             array(
                "type" => "kswr_message",
                "group" => "Styling",                
                "title" => esc_html__( "Skill Name Styling", "kaswara" ),
                "dependency" => Array("element" => "vsklbr_style_def","value" => array('0')),                            
                "param_name" => "vsklbr_skillname_sections",
                "mtop" => "10px"
             ),
             array(
                "type" => "kswr_number",
                "value" => 16,
                "group" => "Styling", 
                "max" => 100,
                "min" => 0,
                "heading" => esc_html__( "Name Font Size", "kaswara" ),
                "dependency" => Array("element" => "vsklbr_style_def","value" => array('0')),                            
                "param_name" => "vsklbr_namefsize"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Styling",            
                "value" => "#333",
                "dependency" => Array("element" => "vsklbr_style_def","value" => array('0')),                            
                "heading" => esc_html__( "Name Color", "kaswara" ),
                "param_name" => "vsklbr_namecolor"
            ),
            array(
                "type" => "kswr_message",
                "group" => "Styling",                
                "title" => esc_html__( "Bar Colors Styling", "kaswara" ),
                "dependency" => Array("element" => "vsklbr_style_def","value" => array('0')),                            
                "param_name" => "vsklbr_skillbar_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Styling",            
                "value" => "#00AFD1",
                "dependency" => Array("element" => "vsklbr_style_def","value" => array('0')),                            
                "heading" => esc_html__( "Percent Value Color", "kaswara" ),
                "param_name" => "vsklbr_percentcolor"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Styling",            
                "value" => "#f6f6f6",
                "dependency" => Array("element" => "vsklbr_style_def","value" => array('0')),                            
                "heading" => esc_html__( "Bar Background Color", "kaswara" ),
                "param_name" => "vsklbr_bar_bg_color"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => "Styling",            
                "value" => '{"type":"color", "color1":"#00AFD1", "color2":"#00AFD1", "direction":"to left"}',
                "dependency" => Array("element" => "vsklbr_style_def","value" => array("0")),                    
                "heading" => esc_html__( "Bar Value Background", "kaswara" ),
                "param_name" => "vsklbr_bar_color"
            ),
            array(
                "type" => "kswr_message",
                "group" => "Styling",                
                "title" => esc_html__( "Bar Size", "kaswara" ),
                "dependency" => Array("element" => "vsklbr_style_def","value" => array('0')),                            
                "param_name" => "vsklbr_barsize_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_number",
                "value" => 200,
                "group" => "Styling", 
                "heading" => esc_html__( "Bar Height (px)", "kaswara" ),
                "dependency" => Array("element" => "vsklbr_style_def","value" => array('0')),                            
                "param_name" => "vsklbr_bar_height"
            ),
            array(
                "type" => "kswr_number",
                "value" =>  6,
                "group" => "Styling", 
                "heading" => esc_html__( "Bar Width (px)", "kaswara" ),
                "dependency" => Array("element" => "vsklbr_style_def","value" => array('0')),                            
                "param_name" => "vsklbr_bar_width"
            ),
             array(
                "type" => "kswr_number",
                "value" =>  0,
                "group" => "Styling", 
                "heading" => esc_html__( "Bar Border Radius (px)", "kaswara" ),
                "dependency" => Array("element" => "vsklbr_style_def","value" => array('0')),                            
                "param_name" => "vsklbr_bord_radius"
            ),
            array(
                "type" => "kswr_border",            
                "heading" => esc_html__( "Border Styling", "kaswara" ),         
                "dependency" => Array("element" => "vsklbr_style_def","value" => array("0")),                    
                "group" => "Styling",                 
                "param_name" => "vsklbr_border"
             ),
            array(
                "type" => "kswr_message",
                "group" => "Styling",                
                "title" => esc_html__( "Layout Styling", "kaswara" ),
                "dependency" => Array("element" => "vsklbr_style_def","value" => array('0')),                            
                "param_name" => "vsklbr_layout_sections",
                "mtop" => "10px"
            ),
            array(
                "type" => "dropdown",
                "param_name" => "vsklbr_align",
                "dependency" => Array("element" => "vsklbr_style_def","value" => array("0")),                    
                "heading" => esc_html__( "Elements Align ", "kaswara" ),
                "value" => array(
                    esc_html__("Center","kaswara") => "center",
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right"
                ),
                "group" => "Styling"
            ),
            array(
                "type" => "dropdown",
                "param_name" => "vsklbr_percentpos",
                "dependency" => Array("element" => "vsklbr_style_def","value" => array("0")),                    
                "heading" => esc_html__( "Percent Position ", "kaswara" ),
                "value" => array(                    
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right"
                ),
                "group" => "Styling"
            ),
            array(
                "type" => "dropdown",
                "param_name" => "vsklbr_layout",
                "dependency" => Array("element" => "vsklbr_style_def","value" => array("0")),                    
                "heading" => esc_html__( "Layout Style ", "kaswara" ),
                "value" => array(                    
                    esc_html__("Normal","kaswara") => "none",
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right",
                    esc_html__("Rotate Left","kaswara") => "centerleft",
                    esc_html__("Rotate Right","kaswara") => "centerright",
                    
                ),
                "group" => "Styling"
            ),

             array(
                'type' => 'dropdown',
                'heading' => esc_html__("Bar Strips",'kaswara'),
                'param_name' => 'vsklbr_strips',
                "dependency" => Array("element" => "vsklbr_style_def","value" => array('0')),            
                'value' => array(
                    esc_html__("None",'kaswara') => 'none',
                    esc_html__("Normal Strips",'kaswara') => 'normal',
                    esc_html__("Moving Strips",'kaswara') => 'moving',
                ),      
                "group" => "Styling"
            ),            

        )
    ));        
}
add_action( 'init', 'kswr_verticalskillbar_shortcode' ); 
?>