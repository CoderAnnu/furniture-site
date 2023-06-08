<?php 
/*------------------------------------------------
       ANIMATED HEADING SHORTCODE
------------------------------------------------*/

function kswr_animatedheading_shortcode() {
   	vc_map(array(
      	"name" => esc_html__( "Animated Heading", "kaswara" ),      
      	"description" => esc_html__("Heading with advanced animation & effects.", "kaswara"),        
      	"category" => "Kaswara",        
      	'icon' => KASWARA_IMAGES.'small/fancy-text.jpg',  
      	"base" => "kswr_animatedheading",      
      	"params" => array(
      		array(
	            "type" => "dropdown",
	            "heading" => esc_html__( 'Animation Style','kaswara'),
	            "param_name" => "anh_style",           
	            "value" => array(
	                esc_html__('Normal','kaswara') => 'normal',
	                esc_html__('Reveal','kaswara') => 'reveal',
	            ),         
	        ),
	        array(
	            "type" => "kswr_number",
	            "value" => 0,
	            "max" => 10,
	            "min" => 0,
	            "step" => 0.1,
	            "heading" => esc_html__( "Animation Delay (sec)", "kaswara" ),
	            "param_name" => "anh_delay"
	        ),	
	        array(
	            "type" => "dropdown",
	            "heading" => esc_html__( 'Heading Alignment','kaswara'),
	            "param_name" => "anh_align",           
	            "value" => array(
	                esc_html__('Left','kaswara') => 'left',
	                esc_html__('Center','kaswara') => 'center',
	                esc_html__('Right','kaswara') => 'right',
	            ),         
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => esc_html__( 'Animation Direction','kaswara'),
	            "param_name" => "anh_direction",           
	            "value" => array(
	                esc_html__('Left','kaswara') => 'left',
	                esc_html__('Top','kaswara') => 'top',
	                esc_html__('Right','kaswara') => 'right',
	                esc_html__('Bottom','kaswara') => 'bottom',
	            ),         
	        ),
	        array(
                "type" => "colorpicker",
                "value" => "#168ae6",
                "heading" => esc_html__( "Background ColorScheme", "kaswara" ),
                "param_name" => "anh_backgroundscheme"
            ),
	        array(
	            "type" => "textfield",
	            "heading" => esc_html__( "Heading Title", "kaswara" ),
	            "admin_label" => true,
	            "param_name" => "anh_title",	          
	        ),
	        array(
	            "type" => "kswr_fontsize",
	            "param_name" => "anh_titlefont",	        
	            "heading" => esc_html__( "Title Font", "kaswara" ),	         
                "group" => "Typography",
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
                "param_name" => "anh_titlefontstyle",
                "heading" => esc_html__( "Title Font Style", "kaswara" ),                      
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
                "value" => "#333",
                "heading" => esc_html__( "Title Color", "kaswara" ),
                "param_name" => "anh_titlecolor"
            ),
            
	      
	        array(
	            "type" => "kswr_number",
	            "value" => 25,
	            "max" => 200,
	            "heading" => esc_html__( "Heading Padding Left - Right", "kaswara" ),
	            "param_name" => "anh_paddinglr"
	        ),	
	        array(
	            "type" => "kswr_number",
	            "value" => 20,
	            "max" => 200,
	            "heading" => esc_html__( "Heading Padding Top - Bottom", "kaswara" ),
	            "param_name" => "anh_paddingtb"
	        ),	
      	)
    ));
}

add_action( 'init', 'kswr_animatedheading_shortcode' );
?>