<?php 

/*------------------------------------------------
                SOCIAL SHARE SHORTCODE
------------------------------------------------*/
function kswr_socialshare_shortcode() {
   vc_map( array(
      "name" => esc_html__( "Social Share", "kaswara" ),
      "category" => "Kaswara",
      'icon' => KASWARA_IMAGES.'small/findus.jpg',  
      "base" => "kswr_socialshare",
      "description" => esc_html__("Social share links with effects", "kaswara"),   
      "class" => "",      
      "params" => array(
        array(
            "type" => "kswr_message",
            "title" => esc_html__( "Icon Size Settings", "kaswara" ),
            "param_name" => "ss_size_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Icon Size", "kaswara" ),
            "param_name" => "ss_size_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
        array(
            "type" => "kswr_number",          
            "heading" => esc_html__( "Icon Size", "kaswara" ),
            "param_name" => "ss_size",
            "dependency" => Array("element" => "ss_size_def","value" => array('0')),            
            "value" => 26,
        ),

        array(
            "type" => "kswr_message",
            "title" => esc_html__( "Backgound Size Settings", "kaswara" ),
            "param_name" => "ss_backsize_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default background Size", "kaswara" ),
            "param_name" => "ss_backsize_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
        array(
            "type" => "kswr_number",          
            "heading" => esc_html__( "Backgound Size", "kaswara" ),
            "param_name" => "ss_backsize",
            "dependency" => Array("element" => "ss_backsize_def","value" => array('0')),                        
            "value" => 35,
        ),

        array(
            "type" => "kswr_message",
            "title" => esc_html__( "Icon Margins Settings", "kaswara" ),
            "param_name" => "ss_margins_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Margins", "kaswara" ),
            "param_name" => "ss_margins_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
        array(
            "type" => "kswr_number",          
            "heading" => esc_html__( "Icon Margins", "kaswara" ),
            "param_name" => "ss_margins",
            "dependency" => Array("element" => "ss_margins_def","value" => array('0')),                        
            "value" => 5,
        ),


        array(
            "type" => "kswr_message",
            "title" => esc_html__( "Border Radius Settings", "kaswara" ),
            "param_name" => "ss_borderradius_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Border Radius", "kaswara" ),
            "param_name" => "ss_borderradius_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
        array(
            "type" => "kswr_number",          
            "heading" => esc_html__( "Border Radius", "kaswara" ),
            "param_name" => "ss_borderradius",
            "dependency" => Array("element" => "ss_borderradius_def","value" => array('0')),                        
            "value" => 0,
        ),

        array(
            "type" => "kswr_message",
            "title" => esc_html__( "Hover Style Settings", "kaswara" ),
            "param_name" => "ss_style_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Hover Style", "kaswara" ),
            "param_name" => "ss_style_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__("Icon Style",'kaswara'),
            'param_name' => 'ss_style',
            "dependency" => Array("element" => "ss_style_def","value" => array('0')),                        
            'value' => array(
                esc_html__("Hover Color Scheme",'kaswara') => 'hoverColorScheme',
                esc_html__("Hover Background Scheme",'kaswara') => 'hoverBackScheme',
                esc_html__("Show From Background Bottom",'kaswara') => 'hoverShowBottom',
                esc_html__("Show From Background Left",'kaswara') => 'hoverShowLeft',
                esc_html__("Show From Background Top",'kaswara') => 'hoverShowTop',
                esc_html__("Show From Background Right",'kaswara') => 'hoverShowRight',
                esc_html__("Show From Background Scaled",'kaswara') => 'hoverShowScale',
                esc_html__("Show From Background Tada",'kaswara') => 'hoverShowTada',
            ),
        ), 


         array(
            "type" => "kswr_message",
            "title" => esc_html__( "Icon Background Color Settings", "kaswara" ),
            "param_name" => "ss_backcolor_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Icon Backgound Color", "kaswara" ),
            "param_name" => "ss_backcolor_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__( "Icon Backgound Color", "kaswara" ),
            "description" => esc_html__( "Only for some effects", "kaswara" ),            
            "param_name" => "ss_backcolor",
            "dependency" => Array("element" => "ss_backcolor_def","value" => array('0')),                        
            "value" => 'transparent',
        ),


         array(
            "type" => "kswr_message",
            "title" => esc_html__( "Icon Color Settings", "kaswara" ),
            "param_name" => "ss_iconcolor_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Icon Color", "kaswara" ),
            "param_name" => "ss_iconcolor_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__( "Icon Color", "kaswara" ),
            "description" => esc_html__( "Only for some effects", "kaswara" ),            
            "param_name" => "ss_iconcolor",
            "dependency" => Array("element" => "ss_iconcolor_def","value" => array('0')),                        
            "value" => '#888',
        ),

        array(
            "type" => "kswr_message",
            "title" => esc_html__( "Icon Hover Color Settings", "kaswara" ),
            "param_name" => "ss_iconhovercolor_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Hover Icon Color", "kaswara" ),
            "param_name" => "ss_iconhovercolor_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__( "Icon Hover Color", "kaswara" ),
            "description" => esc_html__( "Only for some effects", "kaswara" ),            
            "param_name" => "ss_iconhovercolor",
            "dependency" => Array("element" => "ss_iconhovercolor_def","value" => array('0')),                        
            "value" => '#fff',
        ),
         array(
            "type" => "textfield",
            "heading" => esc_html__( "Link to Share", "kaswara" ),
            "description" => esc_html__( "Leave empty to share the actual page", "kaswara" ),
            "param_name" => "ss_link",
            "value" => '',
        ),
         array(
            'type' => 'kswr_multiple_select',
            'heading' => esc_html__( 'Social Sites', 'kaswara' ),                
            'param_name' => 'ss_socialarray',
            'values' => array('facebook','twitter','google','linkedin','pinterest','reddit')
        ),

         array(
            "type" => "kswr_message",
            "title" => esc_html__( "Icon Alignement Settings", "kaswara" ),
            "param_name" => "ss_align_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Icon Alignement", "kaswara" ),
            "param_name" => "ss_align_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__("Icon Alignement",'kaswara'),
            'param_name' => 'ss_align',
            "dependency" => Array("element" => "ss_align_def","value" => array('0')),                        
            'value' => array(
                esc_html__("Left",'kaswara') => 'left',
                esc_html__("Center",'kaswara') => 'center',
                esc_html__("Right",'kaswara') => 'right',
            ),
        ), 
        
     )
    ));
}

add_action( 'init', 'kswr_socialshare_shortcode' );

?>