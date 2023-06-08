<?php 
/*------------------------------------------------
                SOCIAL FIND US SHORTCODE
------------------------------------------------*/
function kswr_findus_shortcode() {
   vc_map( array(
      "name" => esc_html__( "Social Find Us", "kaswara" ),      
     "category" => "Kaswara",        
     'icon' => KASWARA_IMAGES.'small/findus.jpg',  
      "base" => "kswr_findus",
      "description" => esc_html__("Social findus links with effects", "kaswara"),   
      "class" => "",      
      "params" => array(
         array(
            "type" => "kswr_message",
            "title" => esc_html__( "Icon Size Settings", "kaswara" ),
            "param_name" => "sf_size_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Icon Size", "kaswara" ),
            "param_name" => "sf_size_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
        array(
            "type" => "kswr_number",          
            "heading" => esc_html__( "Icon Size", "kaswara" ),
            "param_name" => "sf_size",
            "dependency" => Array("element" => "sf_size_def","value" => array('0')),            
            "value" => 26,
        ),

        array(
            "type" => "kswr_message",
            "title" => esc_html__( "Backgound Size Settings", "kaswara" ),
            "param_name" => "sf_backsize_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default background Size", "kaswara" ),
            "param_name" => "sf_backsize_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
        array(
            "type" => "kswr_number",          
            "heading" => esc_html__( "Backgound Size", "kaswara" ),
            "param_name" => "sf_backsize",
            "dependency" => Array("element" => "sf_backsize_def","value" => array('0')),                        
            "value" => 35,
        ),

        array(
            "type" => "kswr_message",
            "title" => esc_html__( "Icon Margins Settings", "kaswara" ),
            "param_name" => "sf_margins_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Margins", "kaswara" ),
            "param_name" => "sf_margins_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
        array(
            "type" => "kswr_number",          
            "heading" => esc_html__( "Icon Margins", "kaswara" ),
            "param_name" => "sf_margins",
            "dependency" => Array("element" => "sf_margins_def","value" => array('0')),                        
            "value" => 5,
        ),


        array(
            "type" => "kswr_message",
            "title" => esc_html__( "Border Radius Settings", "kaswara" ),
            "param_name" => "sf_borderradius_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Border Radius", "kaswara" ),
            "param_name" => "sf_borderradius_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
        array(
            "type" => "kswr_number",          
            "heading" => esc_html__( "Border Radius", "kaswara" ),
            "param_name" => "sf_borderradius",
            "dependency" => Array("element" => "sf_borderradius_def","value" => array('0')),                        
            "value" => 0,
        ),

        array(
            "type" => "kswr_message",
            "title" => esc_html__( "Hover Style Settings", "kaswara" ),
            "param_name" => "sf_style_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Hover Style", "kaswara" ),
            "param_name" => "sf_style_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__("Icon Style",'kaswara'),
            'param_name' => 'sf_style',
            "dependency" => Array("element" => "sf_style_def","value" => array('0')),                        
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
            "param_name" => "sf_backcolor_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Icon Backgound Color", "kaswara" ),
            "param_name" => "sf_backcolor_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__( "Icon Backgound Color", "kaswara" ),
            "description" => esc_html__( "Only for some effects", "kaswara" ),            
            "param_name" => "sf_backcolor",
            "dependency" => Array("element" => "sf_backcolor_def","value" => array('0')),                        
            "value" => 'transparent',
        ),


         array(
            "type" => "kswr_message",
            "title" => esc_html__( "Icon Color Settings", "kaswara" ),
            "param_name" => "sf_iconcolor_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Icon Color", "kaswara" ),
            "param_name" => "sf_iconcolor_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__( "Icon Color", "kaswara" ),
            "description" => esc_html__( "Only for some effects", "kaswara" ),            
            "param_name" => "sf_iconcolor",
            "dependency" => Array("element" => "sf_iconcolor_def","value" => array('0')),                        
            "value" => '#888',
        ),

        array(
            "type" => "kswr_message",
            "title" => esc_html__( "Icon Hover Color Settings", "kaswara" ),
            "param_name" => "sf_iconhovercolor_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Hover Icon Color", "kaswara" ),
            "param_name" => "sf_iconhovercolor_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__( "Icon Hover Color", "kaswara" ),
            "description" => esc_html__( "Only for some effects", "kaswara" ),            
            "param_name" => "sf_iconhovercolor",
            "dependency" => Array("element" => "sf_iconhovercolor_def","value" => array('0')),                        
            "value" => '#fff',
        ),
         array(
            "type" => "kswr_message",
            "title" => esc_html__( "Icon Alignement Settings", "kaswara" ),
            "param_name" => "sf_align_sections",
            "mtop" => "10px"
         ),
        array(
            "type" => "kswr_switcher",
            "heading" => esc_html__( "Use Default Icon Alignement", "kaswara" ),
            "param_name" => "sf_align_def",
            'default' => '1',
            'on' => array('text' => 'ON','val' => '1' ),
            'off'=> array('text' => 'OFF','val' => '0') 
         ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__("Icon Alignement",'kaswara'),
            'param_name' => 'sf_align',
            "dependency" => Array("element" => "sf_align_def","value" => array('0')),                        
            'value' => array(
                esc_html__("Left",'kaswara') => 'left',
                esc_html__("Center",'kaswara') => 'center',
                esc_html__("Right",'kaswara') => 'right',
            ),
        ), 

        array(
            'type' => 'dropdown',
            'heading' => esc_html__("Open Links in",'kaswara'),
            'param_name' => 'sf_open_in',
            "group" => "Social Links",           
            'value' => array(
                esc_html__("New Window",'kaswara') => '_blank',
                esc_html__("Same Window",'kaswara') => '_self',
            ),
        ), 

        array(
            "type" => "textfield",
            "heading" => esc_html__( "Facebook Link", "kaswara" ),
            "param_name" => "sf_facebook",           
            "group" => "Social Links" 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Twitter Link", "kaswara" ),
            "param_name" => "sf_twitter",           
            "group" => "Social Links" 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Instagram Link", "kaswara" ),
            "param_name" => "sf_instagram",           
            "group" => "Social Links" 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "YouTube Link", "kaswara" ),
            "param_name" => "sf_youtube",           
            "group" => "Social Links" 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "LinkedIn Link", "kaswara" ),
            "param_name" => "sf_linkedin",           
            "group" => "Social Links" 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Google + Link", "kaswara" ),
            "param_name" => "sf_google",           
            "group" => "Social Links" 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Behance Link", "kaswara" ),
            "param_name" => "sf_behance",           
            "group" => "Social Links" 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Vimeo Link", "kaswara" ),
            "param_name" => "sf_vimeo",           
            "group" => "Social Links" 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Flickr Link", "kaswara" ),
            "param_name" => "sf_flickr",           
            "group" => "Social Links" 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Skype Link", "kaswara" ),
            "param_name" => "sf_skype",           
            "group" => "Social Links" 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Pinterest Link", "kaswara" ),
            "param_name" => "sf_pinterest",           
            "group" => "Social Links" 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Dribbble Link", "kaswara" ),
            "param_name" => "sf_dribbble",           
            "group" => "Social Links" 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Twitch Link", "kaswara" ),
            "param_name" => "sf_twitch",           
            "group" => "Social Links" 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "SoundCloud Link", "kaswara" ),
            "param_name" => "sf_soundcloud",           
            "group" => "Social Links" 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "GitHub Link", "kaswara" ),
            "param_name" => "sf_github",           
            "group" => "Social Links" 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Vine Link", "kaswara" ),
            "param_name" => "sf_vine",           
            "group" => "Social Links" 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Tumblr Link", "kaswara" ),
            "param_name" => "sf_tumblr",           
            "group" => "Social Links" 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "FourSquare Link", "kaswara" ),
            "param_name" => "sf_foursquare",           
            "group" => "Social Links" 
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( "RSS Link", "kaswara" ),
            "param_name" => "sf_rss",           
            "group" => "Social Links" 
        ),
        
     )
    ));
}

add_action( 'init', 'kswr_findus_shortcode' );


?>