<?php 
/*------------------------------------------------
                ALERTBOX SHORTCODE
------------------------------------------------*/
function kswr_twopichover_shortcode() {
   vc_map( array(
      "name" => esc_html__( "Image Swap", "kaswara" ),
      "category" => "Kaswara",              
      'icon' => KASWARA_IMAGES.'small/twohoverpic.jpg',  
      "base" => "kswr_twopichover",
      "description" => esc_html__("2 pictures with nice hover effects", "kaswara"),   
      "class" => "",      
      "params" => array(     
         array(
            "type" => "attach_image",
            'group' => 'General',
            "heading" => esc_html__( "Picture One", "kaswara" ),
            "param_name" => "tph_image_one"
        ),  
         array(
            "type" => "attach_image",
            'group' => 'General',
            "heading" => esc_html__( "Picture Two", "kaswara" ),
            "param_name" => "tph_image_two"
        ),  
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Hover Style', 'kaswara' ),
            'group' => 'General',
            'param_name' => 'tph_style',
            'value' => array(
               esc_html__( 'Style 1','kaswara') => 'fade',
               esc_html__( 'Style 2','kaswara') => 'pushleft',
               esc_html__( 'Style 3','kaswara') => 'pushright',
               esc_html__( 'Style 4','kaswara') => 'pushtop',
               esc_html__( 'Style 5','kaswara') => 'pushbottom',
               esc_html__( 'Style 6','kaswara') => 'fromleft',
               esc_html__( 'Style 7','kaswara') => 'fromright',
               esc_html__( 'Style 8','kaswara') => 'zoomin',
               esc_html__( 'Style 9','kaswara') => 'zoomout',
               esc_html__( 'Style 10','kaswara') => 'zoom',
            )               
        ),
        array(
            "type" => "textfield",
            "group" => "General", 
            "heading" => esc_html__( "Additional Classes", "kaswara" ),
            "description" => esc_html__( "Add new classes sperated by (space)", "kaswara" ),
            "param_name" => "tph_container_classes"
        ),
        array(
            "type" => "kswr_number",          
            "heading" => esc_html__( "Border Width", "kaswara" ),
            'group' => 'Styling',
            "param_name" => "tph_border_width",
            "value" => 0
        ),
        array(
            "type" => "colorpicker",
            "value" => "transparent",
            "group" => "Styling", 
            "heading" => esc_html__( "Border Color", "kaswara" ),
            "param_name" => "tph_border_color"
        ),     
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Border Style', 'kaswara' ),
            'group' => 'Styling',
            'param_name' => 'tph_border_style',
            'value' => array(
               esc_html__( 'None','kaswara') => 'none',
               esc_html__( 'Solid','kaswara') => 'solid',
               esc_html__( 'Dotted','kaswara') => 'dotted',
               esc_html__( 'Dashed','kaswara') => 'dashed',
               esc_html__( 'Double','kaswara') => 'double',
               esc_html__( 'Groove','kaswara') => 'groove',
            )               
        ), 
        //Box Shadow
         array(
               "type" => "dropdown",
                "heading" => esc_html__( 'Enable Box Shadow','kaswara'),
                "param_name" => "tph_bxshadow_enabled",           
                "value" => array(
                        "No" => "off",
                        "Yes" => "on",
                    ),         
                "group" => "Styling",
            ),
             array(
               "type" => "dropdown",
                "heading" => esc_html__( 'Enable Box Shadow On Hover','kaswara'),
                "param_name" => "tph_bxshadow_hover_enabled",          
                "value" => array(
                        "Yes" => "on",
                        "No" => "off",
                    ),         
                "group" => "Styling",
            ),
            
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Box Shadow Style', 'kaswara' ),
                'group' => 'Styling',
                'param_name' => 'tph_bxshadow_style',                
                'value' => array(
                    esc_html__( 'Style 1','kaswara') => 'style1',
                    esc_html__( 'Style 2','kaswara') => 'style2',
                    esc_html__( 'Style 3','kaswara') => 'style3',
                    esc_html__( 'Style 4','kaswara') => 'style4',
                    esc_html__( 'Style 5','kaswara') => 'style5',
                    esc_html__( 'Style 6','kaswara') => 'style6',
                    esc_html__( 'Style 7','kaswara') => 'style7',
                    esc_html__( 'Style 8`','kaswara') => 'style8',
                    esc_html__( 'Style 9','kaswara') => 'style9'
                )               
            ),
            array(
                "type" => "colorpicker",
                "value" => "rgba(0,0,0,0.8)",
                "group" => "Styling", 
                "heading" => esc_html__( "Box Shadow Color", "kaswara" ),
                "param_name" => "tph_bxshadow_color"
            ), 
        
            array(
                "type" => "vc_link",
                "heading" => esc_html__( "Link", "kaswara" ),
                "param_name" => "tph_link",
                "value" => '',
                "group" => "General"   
            ),
        
     )

    ));       
}
add_action( 'init', 'kswr_twopichover_shortcode' );


?>