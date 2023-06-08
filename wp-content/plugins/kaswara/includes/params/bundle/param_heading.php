<?php 
/*------------------------------------------------
                ALERTBOX SHORTCODE
------------------------------------------------*/
function kswr_heading_shortcode() {
   vc_map( array(
      "name" => esc_html__( "Heading", "kaswara" ),
      "category" => "Kaswara",              
     'icon' => KASWARA_IMAGES.'small/heading.jpg',  
      "base" => "kswr_heading",
      "description" => esc_html__("Heading text with sub-heading", "kaswara"),   
      "class" => "",      
      "params" => array(  
          
        array(
           'type' => 'dropdown',
            'heading' => esc_html__( 'Text Alignement', 'kaswara' ),    
            'group' => 'Content',
            'param_name' => 'head_align',
            'value' => array(
                esc_html__( 'Left','kaswara') => 'left',
                esc_html__( 'Center','kaswara') => 'center',
                esc_html__( 'Right','kaswara') => 'right',
            )               
        ),    
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Title", "kaswara" ),
            "param_name" => "head_title",            
            "group" => "Content"  ,
            "admin_label" => true   
        ),                
        array(
            "type" => "textarea_html",
            "heading" => esc_html__( "Sub-Content", "kaswara" ),
            "param_name" => "content",
            "value" => "",           
            "group" => "Content",
            "edit_field_class" => "ult_hide_editor_fullscreen vc_col-xs-12 vc_column wpb_el_type_textarea_html vc_wrapper-param-type-textarea_html vc_shortcode-param",  
        ),

        


        //Title Font
        array(
            "type" => "kswr_message",
            "group" => "Typography",
            "title" => esc_html__( "Title Font Settings", "kaswara" ),       
            "param_name" => "head_title_font_sections",
            "mtop" => "10px"
         ),
         array(
            "type" => "kswr_fontsize",
            "param_name" => "head_title_fsize",
            "group" => "Typography",              
            "heading" => esc_html__( "Font Size", "kaswara" ),      
            "defaults"=> array("font-size" => "19px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
            "param_name" => "head_title_fstyle",
            "heading" => esc_html__( "Font Style", "kaswara" ),             
            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
            'elements'  => array(
               esc_html__("Font Family","kaswara") => "font-family",
               esc_html__("Font Weight","kaswara") => "font-weight",                
               esc_html__("Font Style","kaswara") => "font-style",
            ),
            "group" => "Typography",
        ),
      array(
            "type" => "kswr_gradient",
            "heading" => esc_html__( "Title Color", "kaswara" ),
            "value" => '{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}',
            "param_name" => "head_title_color",            
            "group" => "Typography",
        ),  
      //Sub-Title Font
        array(
            "type" => "kswr_message",
            "group" => "Typography",
            "title" => esc_html__( "Sub-Title Font Settings", "kaswara" ),       
            "param_name" => "head_subtitle_font_sections",
            "mtop" => "10px"
         ),
         array(
            "type" => "kswr_fontsize",
            "param_name" => "head_subtitle_fsize",
            "group" => "Typography",              
            "heading" => esc_html__( "Font Size", "kaswara" ),      
            "defaults"=> array("font-size" => "14px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
            "param_name" => "head_subtitle_fstyle",
            "heading" => esc_html__( "Font Style", "kaswara" ),             
            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
            'elements'  => array(
               esc_html__("Font Family","kaswara") => "font-family",
               esc_html__("Font Weight","kaswara") => "font-weight",                
               esc_html__("Font Style","kaswara") => "font-style",
            ),
            "group" => "Typography",
        ),
      array(
            "type" => "colorpicker",
            "heading" => esc_html__( "Sub-Title Color", "kaswara" ),
            "param_name" => "head_subtitle_color",
            "value" => '#333',
            "group" => "Typography" 
        ),
        

      //MArgins
      array(
            "type" => "kswr_distance",
            "distance" => "margin",
            "heading" => esc_html__( "Title Paddings", "kaswara" ),
            "param_name" => "head_title_margins",
            "positions" => array(             
                esc_html__("Top","kaswara") => "top",
                esc_html__("Bottom","kaswara") => "bottom",             
            ),
            "group" => "Margins"
        ),
      array(
            "type" => "kswr_distance",
            "distance" => "margin",
            "heading" => esc_html__( "Sub-Title Paddings", "kaswara" ),
            "param_name" => "head_subtitle_margins",
            "positions" => array(             
                esc_html__("Top","kaswara") => "top",
                esc_html__("Bottom","kaswara") => "bottom",             
            ),
            "group" => "Margins"
        ),

    )

    ));       
}
add_action( 'init', 'kswr_heading_shortcode' );


?>