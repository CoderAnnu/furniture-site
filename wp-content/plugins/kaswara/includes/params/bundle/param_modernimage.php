<?php 
/*------------------------------------------------
            MODERN IMAGE  SHORTCODE
------------------------------------------------*/
/*
*/
function kswr_modernimage_shortcode(){
    vc_map( array(
        "name" => esc_html__( "Modern Image", "kaswara" ),
        "description" => esc_html__("Modern image with hover effects", "kaswara"),         
        'icon' => KASWARA_IMAGES.'small/hoverimage.jpg',  
        "category" => "Kaswara",        
        "base" => "kswr_modernimage",      
        "params" => array(                   
            //General Options
            array(
               'type' => 'dropdown',
                'heading' => esc_html__( 'Hover Style', 'kaswara' ),    
                'group' => 'General',
                'param_name' => 'mdim_style',
                'value' => array(
                    esc_html__( 'Mercury','kaswara') => 'mercury',
                    esc_html__( 'Venus','kaswara') => 'venus',
                    esc_html__( 'Neptune','kaswara') => 'neptune',
                    esc_html__( 'Uranus','kaswara') => 'uranus',
                    esc_html__( 'Pluto','kaswara') => 'pluto',                   
                )               
            ),    
            array(
                "type" => "attach_image",
                'group' => 'General',
                "heading" => esc_html__( "Background Image", "kaswara" ),
                "param_name" => "mdim_image"
            ),
             array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Image Cusotm Size', 'kaswara' ),
                'group' => 'General',
                'param_name' => 'mdim_imagesize',
                'value' => array(
                   esc_html__( 'Full Size','kaswara' )                     => 'full',
                   esc_html__( '(Grid Like)','kaswara' )                   => 'kaswara-modernimage-grid',                   
                   esc_html__( '(Masonry Like) Extra Small','kaswara' )    => 'kaswara-modernimage-masonryextrasmall',
                   esc_html__( '(Masonry Like) Small','kaswara' )          => 'kaswara-modernimage-masonrysmall',
                   esc_html__( '(Masonry Like) Medium','kaswara' )         => 'kaswara-modernimage-masonrymedium',
                   esc_html__( '(Masonry Like) Tall','kaswara' )           => 'kaswara-modernimage-masonrytall',
                   esc_html__( '(Metro Like) Square','kaswara')            => 'kaswara-modernimage-metrosquare',
                   esc_html__( '(Metro Like) Wide','kaswara')              => 'kaswara-modernimage-metrowide',                                          
                   esc_html__( '(Metro Like) Tall','kaswara')              => 'kaswara-modernimage-metrotall',
                )               
            ),
            array(
                "type" => "vc_link",
                "heading" => esc_html__( "Link", "kaswara" ),
                "param_name" => "mdim_link",
                "value" => '',
                "group" => "General"   
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Custom Classes", "kaswara" ),
                "param_name" => "mdim_classes",            
                "group" => "General"  ,               
            ),
            //Content
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Title", "kaswara" ),
                "param_name" => "mdim_title",            
                "group" => "Content"  ,
                "admin_label" => true   
            ),  
            array(
                "type" => "kswr_fontsize",
                "param_name" => "mdim_titlefont",
                "heading" => esc_html__( "Title Font Size", "kaswara" ),      
                "group" => "Content"  ,
                "defaults"=> array("font-size" => "20px", "line-height" => "", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
                "param_name" => "mdim_titlefontstyle",
                "heading" => esc_html__( "Title Font Style", "kaswara" ),             
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "700", "font-style" => ""),
                "group" => "Content",
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
            ), 
            array(
                "type" => "colorpicker",
                "heading" => esc_html__( "Title Color", "kaswara" ),
                "param_name" => "mdim_titlecolor",
                "value" => '#fff',
                "group" => "Content" 
            ),
            array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Title Padding", "kaswara" ),
                "param_name" => "mdim_titlepadding",              
                "value" => 6,
                "min" => 0,
                "max" => 30,
                "group" => 'Content' 
             ),  

             array(
                "type" => "textfield",
                "heading" => esc_html__( "SubTitle", "kaswara" ),
                "param_name" => "mdim_subtitle",            
                "group" => "Content"  ,
                "admin_label" => true   
            ),  
            array(
                "type" => "kswr_fontsize",
                "param_name" => "mdim_subtitlefont",
                "heading" => esc_html__( "SubTitle Font Size", "kaswara" ),      
                "group" => "Content"  ,
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
                "param_name" => "mdim_subtitlefontstyle",
                "heading" => esc_html__( "SubTitle Font Style", "kaswara" ),             
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "400", "font-style" => ""),
                "group" => "Content",
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
            ), 
            array(
                "type" => "colorpicker",
                "heading" => esc_html__( "SubTitle Color", "kaswara" ),
                "param_name" => "mdim_subtitlecolor",
                "value" => '#ccc',
                "group" => "Content" 
            ),
            
            //Styling
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Content Show Effect', 'kaswara' ),
                'group' => 'Styling',
                'param_name' => 'mdim_contentshoweffect',
                'value' => array(
                    esc_html__('Fade','kaswara') => 'fade' ,
                    esc_html__('Slide Left','kaswara') => 'slideleft' ,
                    esc_html__('Slide Top','kaswara') => 'slidetop' ,
                    esc_html__('Slide Right','kaswara') => 'slideright' ,
                    esc_html__('Slide Bottom','kaswara') => 'slidebottom' ,
                    esc_html__('Zoom In','kaswara') => 'zoomin' ,
                    esc_html__('Zoom Out','kaswara') => 'zoomout' ,
                    esc_html__('Reveal Top','kaswara') => 'revealtop' ,
                    esc_html__('Reveal Bottom','kaswara') => 'revealbottom' ,
                    esc_html__('Pop Up','kaswara') => 'popup' ,

                )               
            ),
            array(
                "type" => "colorpicker",
                "heading" => esc_html__( "Overlay Color", "kaswara" ),
                "param_name" => "mdim_overlaycolor",
                "value" => 'rgba(0, 0, 0, 0.7)',
                "group" => "Styling" 
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Overlay Show Effect', 'kaswara' ),
                'group' => 'Styling',
                'param_name' => 'mdim_overlayshoweffect',
                'value' => array(
                    esc_html__('Fade','kaswara') => 'fade',
                    esc_html__('Slide Left','kaswara') => 'slideleft',
                    esc_html__('Slide Top','kaswara') => 'slidetop',
                    esc_html__('Slide Right','kaswara') => 'slideright',
                    esc_html__('Slide Bottom','kaswara') => 'slidebottom',
                    esc_html__('Fade Left','kaswara') => 'fadeleft',
                    esc_html__('Fade Right','kaswara') => 'faderight',
                    esc_html__('Fade Top','kaswara') => 'fadetop',
                    esc_html__('Fade Bottom','kaswara') => 'fadebottom',
                    esc_html__('Zoom In','kaswara') => 'zoomin',
                    esc_html__('Rotate Zoom','kaswara') => 'rotatezoom',
                    //esc_html__('Follow Me','kaswara') => 'followme'
                )               
            ),     
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Enable Frame', 'kaswara' ),
                'group' => 'Styling',
                'param_name' => 'mdim_overlayframe',
                'value' => array(
                    esc_html__('No','kaswara') => 'disabled',
                    esc_html__('Yes Please','kaswara') => 'enabled',
                )               
            ),       
            array(
                "type" => "colorpicker",
                "heading" => esc_html__( "Color Scheme", "kaswara" ),
                "param_name" => "mdim_colorscheme",
                "value" => '#fff',
                "group" => "Styling" 
            ),            
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Enable Box Shadow onHover', 'kaswara' ),
                'group' => 'Styling',
                'param_name' => 'mdim_boxshadow',
                'value' => array(
                    esc_html__('Yes Please','kaswara') => 'enabled',
                    esc_html__('No','kaswara') => 'disabled',
                )               
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( '3D hover Effect', 'kaswara' ),
                'group' => 'Styling',
                'param_name' => 'mdim_3dhover',
                'value' => array(
                    esc_html__('No','kaswara') => 'disabled',
                    esc_html__('Yes Please','kaswara') => 'enabled',
                )               
            ),
            
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Content Rown Position', 'kaswara' ),
                'group' => 'Styling',
                'dependency' => Array("element" => "mdim_style","value" => array('mercury')),    
                'param_name' => 'mdim_rowposition',
                'value' => array(
                    esc_html__( 'Middle','kaswara') => 'middle',
                    esc_html__( 'Top','kaswara') => 'top',
                    esc_html__( 'Bottom','kaswara') => 'bottom',
              
                )               
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Content Column Position', 'kaswara' ),
                'group' => 'Styling',
                'param_name' => 'mdim_columnposition',
                'dependency' => Array("element" => "mdim_style","value" => array('mercury')),    
                'value' => array(
                    esc_html__( 'Center','kaswara') => 'center',
                    esc_html__( 'Left','kaswara') => 'left',
                    esc_html__( 'Right','kaswara') => 'right',
              
                )               
            ),           
            /*array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Image Effect', 'kaswara' ),
                'group' => 'Styling',
                'param_name' => 'mdim_imageeffect',
                'value' => array(
                    esc_html__('None','kaswara') => 'none',
                    esc_html__('Zoom In','kaswara') => 'zoomin',
                    esc_html__('Zoom In Rotate','kaswara') => 'zoominrotate',
                    esc_html__('Zoom Out','kaswara') => 'zoomout',
                    esc_html__('Zoom Out Rotate','kaswara') => 'zoomoutrotate',
                    esc_html__('Blur','kaswara') => 'blur',
                    esc_html__('Zoom Blur','kaswara') => 'zoomblur',
                    esc_html__('Zoom Follow','kaswara') => 'zoomfollow',
                    esc_html__('Zoom Blur Follow','kaswara') => 'zoomblurfollow',

                )               
            ),*/  
            
            
            
            
            
            

        )
    ));        
}
add_action( 'init', 'kswr_modernimage_shortcode' ); 



?>