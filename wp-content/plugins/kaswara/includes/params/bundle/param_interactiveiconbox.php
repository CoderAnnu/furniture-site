<?php 
/*------------------------------------------------
            INTERACTIVE ICON BOX  SHORTCODE
------------------------------------------------*/
function kswr_interactiveiconbox_shortcode() {
    vc_map( array(
        "name" => esc_html__( "Interactive Iconbox", "kaswara" ),
        'icon' => KASWARA_IMAGES.'small/interactiveiconbox.jpg',  
      	"category" => "Kaswara",                      
        "description" => esc_html__("Hover iconbox with title and information", "kaswara"),                 
        "base" => "kswr_interactiveiconbox",      
        "params" => array(                    
            array(
                "type" => "kswr_number",
                "group" => "General", 
                "value" => 220,
                "heading" => esc_html__( "Min Box Height", "kaswara" ),
                "param_name" => "iib_height"
            ),
            array(
               "type" => "textfield",
                "group" => "General", 
               "heading" => esc_html__( "Title", "kaswara" ),
               "param_name" => "iib_title"
            ),
            array(
               "type" => "textfield",
                "group" => "General", 
               "heading" => esc_html__( "Sub-Title", "kaswara" ),
               "param_name" => "iib_subtitle"
            ),
            array(
                "type" => "dropdown", 
                "group" => "General",            
                "heading" => esc_html__("Hover Style", "kaswara"),
                "param_name" => "iib_hover_style",
                "value" => array(
                    esc_html__("To Left","kaswara") => 'toleft',
                    esc_html__("To Top","kaswara") => 'totop',
                    esc_html__("To Right","kaswara") => 'toright',
                    esc_html__("To Bottom","kaswara") => 'tobottom',
                    esc_html__("Scale","kaswara") => 'toscale',
                )
            ),  
            array(
               "type" => "textarea",
                "group" => "General", 
               "heading" => esc_html__( "Content Text", "kaswara" ),
               "param_name" => "iib_info_content"
            ),
            
            //Icon Area
            array(
                "type" => "kswr_switcher",
                "group" => "Icon Area", 
                "heading" => esc_html__( "Use Picture", "kaswara" ),
                "param_name" => "iib_image_enable",
                'default' => '0',
                'on' => array('text' => 'ON','val' => '1' ),
                'off'=> array('text' => 'OFF','val' => '0') 
            ), 
            array(
                "type" => "attach_image",
                'group' => 'Icon Area',
                "dependency" => Array("element" => "iib_image_enable","value" => array('1')),            
                "heading" => esc_html__( "Upload Image", "kaswara" ),
                "param_name" => "iib_image"
            ),
            array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Picture Width", "kaswara" ),
                "param_name" => "iib_image_width",
                "dependency" => Array("element" => "iib_image_enable","value" => array('1')),            
                "value" => 35,
                "group" => 'Icon Area' 
             ),
             array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Picture Height", "kaswara" ),
                "param_name" => "iib_image_height",
                "dependency" => Array("element" => "iib_image_enable","value" => array('1')),            
                "value" => 35,
                "group" => 'Icon Area' 
             ),
             array(
                "type" => "kswr_iconchooser",
                "class" => "",
                "heading" =>esc_html__("Select Icon","kaswara"),   
                "dependency" => Array("element" => "iib_image_enable","value" => array('0')),            
                "param_name" => "iib_icon",
                "value" => "",
                "group" => "Icon Area",
            ),           
            array(
                "type" => "dropdown", 
                "group" => "Icon Area",            
                "heading" => esc_html__("Elements Alignement", "kaswara"),
                "param_name" => "iib_icon_align",
                "value" => array(
                    esc_html__("Left","kaswara") => 'left',
                    esc_html__("Center","kaswara") => 'center',
                    esc_html__("Right","kaswara") => 'Right',
                )
            ),              
            array(
                "type" => "kswr_number",
                "dependency" => Array("element" => "iib_image_enable","value" => array('0')),            
                "group" => "Icon Area", 
                "value" => 36,
                "heading" => esc_html__( "Icon Size", "kaswara" ),
                "param_name" => "iib_icon_size"
            ),
            array(
                "type" => "kswr_number",                
                "group" => "Icon Area", 
                "value" => 25,
                "heading" => esc_html__( "Icon / Image Padding", "kaswara" ),
                "param_name" => "iib_icon_padding"
            ),
            array(
                "type" => "kswr_gradient",
                "dependency" => Array("element" => "iib_image_enable","value" => array('0')),            
                "group" => "Icon Area", 
                "value" => '{"type":"color", "color1":"#555", "color2":"#555", "direction":"to left"}',
                "heading" => esc_html__( "Icon Color", "kaswara" ),
                "param_name" => "iib_icon_color"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => "Icon Area", 
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
                "heading" => esc_html__( "Area Background Color", "kaswara" ),
                "param_name" => "iib_icon_area_bg"
            ),  
          
          	//Title Font Settings
            array(
	            "type" => "kswr_message",
	            "title" => esc_html__("Title Font Settings", "kaswara" ),
	            "group" => "Typography",                 
	            "param_name" => "iib_title_font_sections",
	            "mtop" => "10px"
	         ),
	        array(
	            "type" => "kswr_switcher",
	            "heading" => esc_html__( "Use Default Font", "kaswara" ),
	            "group" => "Typography",                 
	            "param_name" => "iib_title_font_def",
	            'default' => '1',
	            'on' => array('text' => 'ON','val' => '1' ),
	            'off'=> array('text' => 'OFF','val' => '0') 
	         ),         
	        array(
	            "type" => "kswr_fontsize",
	            "param_name" => "iib_title_font_size",
	            "group" => "Typography",                 
	            "heading" => esc_html__( "Font Size", "kaswara" ),
	            "dependency" => Array("element" => "iib_title_font_def","value" => array('0')),            
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
	            "param_name" => "iib_title_font_style",
	            "heading" => esc_html__("Font Style","kaswara"),
	            "value" => "",
	            "dependency" => Array("element" => "iib_title_font_def","value" => array('0')),
	            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
	            'elements'  => array(
	                esc_html__("Font Family","kaswara") => "font-family",
	                esc_html__("Font Weight","kaswara") => "font-weight",                
	                esc_html__("Font Style","kaswara") => "font-style",
	            ),
	            "group" => "Typography"
	        ),

            array(
                "type" => "colorpicker",
                "group" => "Typography", 
                "value" => "#666",
                "heading" => esc_html__( "Title Color", "kaswara" ),
                "param_name" => "iib_title_color"
            ),

           //Subtitle Font Settings
            array(
	            "type" => "kswr_message",
	            "title" => esc_html__( "Sub Title Font Settings", "kaswara" ),            
	            "group" => "Typography",                 
	            "param_name" => "iib_subtitle_font_sections",
	            "mtop" => "10px"
	         ),
	        array(
	            "type" => "kswr_switcher",
	            "heading" => esc_html__( "Use Default Font", "kaswara" ),
	            "group" => "Typography",                 
	            "param_name" => "iib_subtitle_font_def",
	            'default' => '1',
	            'on' => array('text' => 'ON','val' => '1' ),
	            'off'=> array('text' => 'OFF','val' => '0') 
	         ),         
	        array(
	            "type" => "kswr_fontsize",
	            "param_name" => "iib_subtitle_font_size",
	            "group" => "Typography",                 
	            "heading" => esc_html__( "Font Size", "kaswara" ),
	            "dependency" => Array("element" => "iib_subtitle_font_def","value" => array('0')),            
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
	            "param_name" => "iib_subtitle_font_style",
	            "heading" => esc_html__("Font Style","kaswara"),
	            "value" => "",
	            "dependency" => Array("element" => "iib_subtitle_font_def","value" => array('0')),
	            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
	            'elements'  => array(
	                esc_html__("Font Family","kaswara") => "font-family",
	                esc_html__("Font Weight","kaswara") => "font-weight",                
	                esc_html__("Font Style","kaswara") => "font-style",
	            ),
	            "group" => "Typography"
	        ),
            array(
                "type" => "colorpicker",
                "group" => "Typography", 
                "value" => "#999",
                "heading" => esc_html__( "Sub-Title Color", "kaswara" ),
                "param_name" => "iib_subtitle_color"
            ),

             //Content Area            
            array(
                "type" => "dropdown", 
                "group" => "Content Area",            
                "heading" => esc_html__("Text Alignement", "kaswara"),
                "param_name" => "iib_info_align",
                "value" => array(
                    esc_html__("Left","kaswara") => 'left',
                    esc_html__("Center","kaswara") => 'center',
                    esc_html__("Right","kaswara") => 'Right',
                )
            ),  
            array(
                "type" => "kswr_gradient",
                "group" => "Content Area", 
                "value" => '{"type":"color", "color1":"#f9f9f9", "color2":"#f9f9f9", "direction":"to left"}',
                "heading" => esc_html__( "Background Color", "kaswara" ),
                "param_name" => "iib_info_area_bg"
            ),
            
             //Content Info Font 
            array(
	            "type" => "kswr_message",
	            "title" => esc_html__( "Content Font Settings", "kaswara" ),            
	            "group" => "Content Area",                 
	            "param_name" => "iib_info_font_sections",
	            "mtop" => "10px"
	         ),
	        array(
	            "type" => "kswr_switcher",
	            "heading" => esc_html__( "Use Default Font", "kaswara" ),
	            "group" => "Content Area",                 
	            "param_name" => "iib_info_font_def",
	            'default' => '1',
	            'on' => array('text' => 'ON','val' => '1' ),
	            'off'=> array('text' => 'OFF','val' => '0') 
	         ),         
	        array(
	            "type" => "kswr_fontsize",
	            "param_name" => "iib_info_font_size",
	            "group" => "Content Area",                 
	            "heading" => esc_html__( "Font Size", "kaswara" ),
	            "dependency" => Array("element" => "iib_info_font_def","value" => array('0')),            
	            "defaults"=> array("font-size" => "15px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
	            "param_name" => "iib_info_font_style",
	            "heading" => esc_html__("Font Style","kaswara"),
	            "value" => "",
	            "dependency" => Array("element" => "iib_info_font_def","value" => array('0')),
	            "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
	            'elements'  => array(
	                esc_html__("Font Family","kaswara") => "font-family",
	                esc_html__("Font Weight","kaswara") => "font-weight",                
	                esc_html__("Font Style","kaswara") => "font-style",
	            ),
	            "group" => "Content Area"
	        ),
            array(
                "type" => "colorpicker",
                "group" => "Content Area", 
                "value" => "#777",
                "heading" => esc_html__( "Text Color", "kaswara" ),
                "param_name" => "iib_info_color"
            ),
            
            //Distances
            array(
                "type" => "kswr_distance",
                "distance" => "padding",
                "heading" => esc_html__("Element Paddings","kaswara"),
                "param_name" => "iib_padding",
                "defaults"=> array("top" => "50px","bottom" => "50px","left" => "50px","right" => "50px",),
                'group' => 'Distances',
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom",
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right",
                )
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "margin",
                "heading" => esc_html__("Element Margins","kaswara"),
                "param_name" => "iib_margin",
                'group' => 'Distances',
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Bottom","kaswara") => "bottom",
                )
            ),          

        )
    ));
}
add_action( 'init', 'kswr_interactiveiconbox_shortcode' );


?>