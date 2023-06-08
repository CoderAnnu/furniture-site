<?php 
/*------------------------------------------------
         COUNT DOWN SHORTCODE
------------------------------------------------*/
function kswr_countdown_shortcode(){
    vc_map( array(
        "name" => esc_html__( "Count Down", "kaswara" ),
        "description" => esc_html__("Advanced count down timer.", "kaswara"),         
        'icon' => KASWARA_IMAGES.'small/countdown.jpg',  
        "category" => "Kaswara",        
        "base" => "kswr_countdown",      
        "params" => array(                   
            array(
                "type" => "kswr_datepicker",
                "heading" => esc_html__( "Pick a Date", "kaswara" ),
                "param_name" => "ctd_deadline",              
            ),      
            array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Element width", "kaswara" ),
                "param_name" => "ctd_elem_size",              
                "value" => 50,                
            ),  
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Choose Layout', 'kaswara' ),          
                'param_name' => 'ctd_layout',
                'value' => array(
                    esc_html__( 'Style 1','kaswara') => 'style1',                  
                    esc_html__( 'Style 2','kaswara') => 'style2',                  
                    esc_html__( 'Style 3','kaswara') => 'style3',                  
                )               
            ),  
            
            
            array(
                "type" => "kswr_number",
                "heading" => esc_html__( "Distance Between Elements", "kaswara" ),
                "param_name" => "ctd_distance_elem",              
                "value" => 8,                
            ),  
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Elements Align', 'kaswara' ),            
                'param_name' => 'ctd_elements_align',
                'value' => array(
                    esc_html__( 'Center','kaswara') => 'center',
                    esc_html__( 'Left','kaswara') => 'left',
                    esc_html__( 'Right','kaswara') => 'right',
                )               
            ),
            //Fonts 
            array(
                "type" => "kswr_fontsize",
                "param_name" => "ctd_digit_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Digit Font Size", "kaswara" ),            
                "defaults"=> array("font-size" => "21px", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
                'elements'  => array(
                   esc_html__("Font Size","kaswara") => "font-size",                 
                   esc_html__("Letter Spacing","kaswara") => "letter-spacing",                
                   esc_html__("Tablet Font Size","kaswara") => "--tablet-font-size",                
                   esc_html__("Phone Font Size","kaswara") => "--phone-font-size",        
                )
            ), 
             array(
                "type" => "kswr_fontstyle",
                "param_name" => "ctd_digit_fstyle",
                "heading" => esc_html__( "Digit Font Style", "kaswara" ),                     
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),

             array(
                "type" => "kswr_fontsize",
                "param_name" => "ctd_unit_fsize",
                "group" => "Typography",                 
                "heading" => esc_html__( "Unit Font Size", "kaswara" ),            
                "defaults"=> array("font-size" => "12px", "line-height" => "1.5em", "letter-spacing" => "", "--tablet-font-size" => "", "--phone-font-size" => ""),
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
                "param_name" => "ctd_unit_fstyle",
                "heading" => esc_html__( "Unit Font Style", "kaswara" ),                     
                "defaults"=> array("font-family" => "Inherit", "font-weight" => "inherit", "font-style" => ""),
                'elements'  => array(
                   esc_html__("Font Family","kaswara") => "font-family",
                   esc_html__("Font Weight","kaswara") => "font-weight",                
                   esc_html__("Font Style","kaswara") => "font-style",
                ),
                "group" => "Typography"
            ),
            //Enable or Disable Year Week ...
            array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Enable Years", "kaswara" ),
                "group" => "Content",                 
                "param_name" => "ctd_year_enable",
                'default' => 'false',
                'on' => array('text' => 'ON','val' => 'true' ),
                'off'=> array('text' => 'OFF','val' => 'false') 
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Year Singular", "kaswara" ),    
                "dependency" => Array("element" => "ctd_year_enable","value" => array("true")),        
                "value" => "Year",
                "param_name" => "ctd_year",
                "group" => "Content"   
            ),
             array(
                "type" => "textfield",
                "heading" => esc_html__( "Year Plural", "kaswara" ),          
                "dependency" => Array("element" => "ctd_year_enable","value" => array("true")),        
                "value" => "Years",
                "param_name" => "ctd_years",
                "group" => "Content"   
            ),

             array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Enable Months", "kaswara" ),
                "group" => "Content",                 
                "param_name" => "ctd_month_enable",
                'default' => 'false',
                'on' => array('text' => 'ON','val' => 'true' ),
                'off'=> array('text' => 'OFF','val' => 'false') 
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Month Singular", "kaswara" ),    
                "dependency" => Array("element" => "ctd_month_enable","value" => array("true")),        
                "value" => "Month",
                "param_name" => "ctd_month",
                "group" => "Content"   
            ),
             array(
                "type" => "textfield",
                "heading" => esc_html__( "Month Plural", "kaswara" ),          
                "dependency" => Array("element" => "ctd_month_enable","value" => array("true")),        
                "value" => "Months",
                "param_name" => "ctd_months",
                "group" => "Content"   
            ),
             //
              array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Enable Weeks", "kaswara" ),
                "group" => "Content",                 
                "param_name" => "ctd_week_enable",
                'default' => 'false',
                'on' => array('text' => 'ON','val' => 'true' ),
                'off'=> array('text' => 'OFF','val' => 'false') 
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Week Singular", "kaswara" ),    
                "dependency" => Array("element" => "ctd_week_enable","value" => array("true")),        
                "value" => "Week",
                "param_name" => "ctd_week",
                "group" => "Content"   
            ),
             array(
                "type" => "textfield",
                "heading" => esc_html__( "Week Plural", "kaswara" ),          
                "dependency" => Array("element" => "ctd_week_enable","value" => array("true")),        
                "value" => "Weeks",
                "param_name" => "ctd_weeks",
                "group" => "Content"   
            ),
             //
              array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Enable Days", "kaswara" ),
                "group" => "Content",                 
                "param_name" => "ctd_day_enable",
                'default' => 'true',
                'on' => array('text' => 'ON','val' => 'true' ),
                'off'=> array('text' => 'OFF','val' => 'false') 
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Day Singular", "kaswara" ),    
                "dependency" => Array("element" => "ctd_day_enable","value" => array("true")),        
                "value" => "Day",
                "param_name" => "ctd_day",
                "group" => "Content"   
            ),
             array(
                "type" => "textfield",
                "heading" => esc_html__( "Day Plural", "kaswara" ),          
                "dependency" => Array("element" => "ctd_day_enable","value" => array("true")),        
                "value" => "Days",
                "param_name" => "ctd_days",
                "group" => "Content"   
            ),

             //
              array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Enable Hours", "kaswara" ),
                "group" => "Content",                 
                "param_name" => "ctd_hour_enable",
                'default' => 'true',
                'on' => array('text' => 'ON','val' => 'true' ),
                'off'=> array('text' => 'OFF','val' => 'false') 
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Hour Singular", "kaswara" ),    
                "dependency" => Array("element" => "ctd_hour_enable","value" => array("true")),        
                "value" => "Hour",
                "param_name" => "ctd_hour",
                "group" => "Content"   
            ),
             array(
                "type" => "textfield",
                "heading" => esc_html__( "Hour Plural", "kaswara" ),          
                "dependency" => Array("element" => "ctd_hour_enable","value" => array("true")),        
                "value" => "Hours",
                "param_name" => "ctd_hours",
                "group" => "Content"   
            ),
             //
              array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Enable Minutes", "kaswara" ),
                "group" => "Content",                 
                "param_name" => "ctd_minute_enable",
                'default' => 'true',
                'on' => array('text' => 'ON','val' => 'true' ),
                'off'=> array('text' => 'OFF','val' => 'false') 
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Minute Singular", "kaswara" ),    
                "dependency" => Array("element" => "ctd_minute_enable","value" => array("true")),        
                "value" => "Minute",
                "param_name" => "ctd_minute",
                "group" => "Content"   
            ),
             array(
                "type" => "textfield",
                "heading" => esc_html__( "Minute Plural", "kaswara" ),          
                "dependency" => Array("element" => "ctd_minute_enable","value" => array("true")),        
                "value" => "Minutes",
                "param_name" => "ctd_minutes",
                "group" => "Content"   
            ),

             //
              array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Enable Seconds", "kaswara" ),
                "group" => "Content",                 
                "param_name" => "ctd_second_enable",
                'default' => 'true',
                'on' => array('text' => 'ON','val' => 'true' ),
                'off'=> array('text' => 'OFF','val' => 'false') 
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Second Singular", "kaswara" ),    
                "dependency" => Array("element" => "ctd_second_enable","value" => array("true")),        
                "value" => "Second",
                "param_name" => "ctd_second",
                "group" => "Content"   
            ),
             array(
                "type" => "textfield",
                "heading" => esc_html__( "Second Plural", "kaswara" ),          
                "dependency" => Array("element" => "ctd_second_enable","value" => array("true")),        
                "value" => "Seconds",
                "param_name" => "ctd_seconds",
                "group" => "Content"   
            ),


              //
              array(
                "type" => "kswr_switcher",
                "heading" => esc_html__( "Enable Milliseconds", "kaswara" ),
                "group" => "Content",                 
                "param_name" => "ctd_millisecond_enable",
                'default' => 'false',
                'on' => array('text' => 'ON','val' => 'true' ),
                'off'=> array('text' => 'OFF','val' => 'false') 
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Millisecond Singular", "kaswara" ),    
                "dependency" => Array("element" => "ctd_millisecond_enable","value" => array("true")),        
                "value" => "Millisecond",
                "param_name" => "ctd_millisecond",
                "group" => "Content"   
            ),
             array(
                "type" => "textfield",
                "heading" => esc_html__( "Millisecond Plural", "kaswara" ),          
                "dependency" => Array("element" => "ctd_millisecond_enable","value" => array("true")),        
                "value" => "Milliseconds",
                "param_name" => "ctd_milliseconds",
                "group" => "Content"   
            ),

            //Styling
             array(
                "type" => "kswr_message",
                "group" => "Styling",
                "title" => esc_html__( "Container Styling", "kaswara" ),       
                "param_name" => "container_styling",
                "mtop" => "10px"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => "Styling",            
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
                "heading" => esc_html__( "Container Background", "kaswara" ),
                "param_name" => "ctd_container_bg"
            ),
            array(
                "type" => "kswr_number",
                "group" => "Styling" ,  
                "heading" => esc_html__( "Container Border Radius", "kaswara" ),
                "param_name" => "ctd_container_radius",              
                "value" => 0,                
            ), 
             array(
                "type" => "kswr_border",
                "heading" => esc_html__( "Container Border", "kaswara" ),         
                "group" => "Styling", 
                'bordergradient' => 'enable',             
                "param_name" => "ctd_container_border"
             ),

            array(
                "type" => "kswr_message",
                "group" => "Styling",
                "title" => esc_html__( "Digit Styling", "kaswara" ),       
                "param_name" => "digit_styling",
                "mtop" => "10px"
            ),
             array(
                "type" => "kswr_gradient",
                "group" => "Styling",            
                "value" => '{"type":"color", "color1":"#333", "color2":"transparent", "direction":"to left"}',
                "heading" => esc_html__( "Digit Color", "kaswara" ),
                "param_name" => "ctd_digit_color"
            ), 
             array(
                "type" => "kswr_gradient",
                "group" => "Styling",            
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
                "heading" => esc_html__( "Digit Background", "kaswara" ),
                "param_name" => "ctd_digit_bg"
            ),    
            array(
                "type" => "kswr_number",
                "group" => "Styling" ,  
                "heading" => esc_html__( "Digit Background Size", "kaswara" ),
                "param_name" => "ctd_digit_bgsize",              
                "value" => 50,                
            ), 
            array(
                "type" => "kswr_border",
                "heading" => esc_html__( "Digit Border", "kaswara" ),         
                "group" => "Styling", 
                'bordergradient' => 'enable',             
                "param_name" => "ctd_digit_border"
             ),
             array(
                "type" => "kswr_number",
                "group" => "Styling" ,  
                "heading" => esc_html__( "Digit Border Radius", "kaswara" ),
                "param_name" => "ctd_digit_radius",              
                "value" => 0,                
            ), 
            array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "group" => "Styling" ,  
                "param_name" => "ctd_digit_margins",
                "heading" => esc_html__( "Digit Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),             
            ),
            array(
                "type" => "kswr_distance",
                "distance" => "padding",            
                "group" => "Styling" ,  
                "param_name" => "ctd_digit_paddings",
                "heading" => esc_html__( "Digit Paddings", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),             
            ),
            
            
            //Unit Color 
            array(
                "type" => "kswr_message",
                "group" => "Styling",
                "title" => esc_html__( "Unit Styling", "kaswara" ),       
                "param_name" => "digit_styling",
                "mtop" => "10px"
            ),
            array(
                "type" => "colorpicker",      
                "group" => "Styling" ,  
                "value" => "#888",
                "heading" => esc_html__( "Unit Color", "kaswara" ),
                "param_name" => "ctd_unit_color"
            ),
            array(
                "type" => "kswr_gradient",
                "group" => "Styling",            
                "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
                "heading" => esc_html__( "Unit Background", "kaswara" ),
                "param_name" => "ctd_unit_bg"
            ), 
            array(
                "type" => "kswr_distance",
                "group" => "Styling" ,  
                "distance" => "padding",            
                "param_name" => "ctd_unit_paddings",
                "heading" => esc_html__( "Unit Paddings", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),             
            ),
             array(
                "type" => "kswr_distance",
                "distance" => "margin",            
                "group" => "Styling" ,  
                "param_name" => "ctd_unit_margins",
                "heading" => esc_html__( "Unit Margins", "kaswara" ),
                "positions" => array(
                    esc_html__("Top","kaswara") => "top",
                    esc_html__("Left","kaswara") => "left",
                    esc_html__("Right","kaswara") => "right",
                    esc_html__("Bottom","kaswara") => "bottom"
                ),             
            ),



        )
    ));        
}
add_action( 'init', 'kswr_countdown_shortcode' ); 


?>