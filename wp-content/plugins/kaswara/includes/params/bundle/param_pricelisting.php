<?php 
/*------------------------------------------------
        PRICE LISTING SHORTCODE
------------------------------------------------*/
function kswr_pricelisting_shortcode(){
    vc_map( array(
        "name" => esc_html__( "Price Listing", "kaswara" ),
        "description" => esc_html__("Simple price listing with info", "kaswara"),         
        "category" => "Kaswara",      
        'icon' => KASWARA_IMAGES.'small/pricelisting.jpg',  
        "base" => "kswr_pricelisting",      
        "params" => array(        
         	array(
                "type" => "attach_image",
                'group' => 'Content',
                "heading" => esc_html__( "Item Picture", "kaswara" ),
                "param_name" => "prcli_image"
            ),	
            array(
	            "type" => "kswr_number",
	            "group" => "Content", 
	            "value" => 80,
	            "max" => 200,
	            "min" => 20,
	            "heading" => esc_html__( "Picture Width (px)", "kaswara" ),
	            "param_name" => "prcli_imagewidth"
	        ),
            array(
	            "type" => "kswr_number",
	            "group" => "Content", 
	            "value" => 80,
	            "max" => 200,
	            "min" => 20,
	            "heading" => esc_html__( "Picture Height (px)", "kaswara" ),
	            "param_name" => "prcli_imageheight"
	        ),
        	array(
                "type" => "textfield",
                "heading" => esc_html__( "Title", "kaswara" ),
                "group" => "Content",
                "param_name" => "prcli_title",            
                "admin_label" => true   
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Price", "kaswara" ),
                "param_name" => "prcli_price", 
                "group" => "Content",                
                "admin_label" => true   
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Info Content", "kaswara" ),
                "param_name" => "prcli_info", 
                "group" => "Content",                
                "admin_label" => true   
            ),
            array(
                "type" => "colorpicker",
                "group" => "Content",             
                "value" => "#ccc",
                "heading" => esc_html__( "Separator Color", "kaswara" ),
                "param_name" => "prcli_sepcolor"
            ),
            array(
                "type" => "vc_link",
                "heading" => esc_html__( "Price Link(Optional)", "kaswara" ),
                "param_name" => "prcli_link",            
                "group" => "Content",
            ),   
			
			
			
            //Font Settings
            array(
                "type" => "kswr_fontsize",
                "param_name" => "prcli_topfontsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Title Font Size", "kaswara" ),             
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
                "param_name" => "prcli_topfontstyle",
                "heading" => esc_html__( "Title Font Style", "kaswara" ),                      
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "700", "font-style" => ""),
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
                "value" => "#333",
                "heading" => esc_html__( "Title Color", "kaswara" ),
                "param_name" => "prcli_titlecolor"
            ),
            array(
                "type" => "colorpicker",
                "group" => "Typography",             
                "value" => "#333",
                "heading" => esc_html__( "Price Color", "kaswara" ),
                "param_name" => "prcli_pricecolor"
            ),

			array(
                "type" => "kswr_fontsize",
                "param_name" => "prcli_infofont",
                "group" => "Typography",                 
                "heading" => esc_html__( "Info Font Size", "kaswara" ),             
                "defaults"=> array("font-size" => "13px", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
	            'elements'  => array(
	               esc_html__("Font Size","kaswara") => "font-size",
	               esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
	               esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
	               esc_html__("Phone Font Size","kaswara") => "--phone-font-size",                
	            )
            ),
			array(
                "type" => "colorpicker",
                "group" => "Typography",             
                "value" => "#aaa",
                "heading" => esc_html__( "Info Color", "kaswara" ),
                "param_name" => "prcli_infocolor"
            ),
        )
    ));        
}
add_action( 'init', 'kswr_pricelisting_shortcode' ); 
?>