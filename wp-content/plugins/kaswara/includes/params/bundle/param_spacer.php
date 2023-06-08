<?php 
/*------------------------------------------------
        SPACER SHORTCODE
------------------------------------------------*/

function kswr_spacer_shortcode(){
    vc_map( array(
        "name" => esc_html__( "Spacer Section", "kaswara" ),
        "description" => esc_html__("Responsive empty space.", "kaswara"),         
        'icon' => KASWARA_IMAGES.'small/spacer.jpg',  
        "category" => "Kaswara",        
        "base" => "kswr_spacer",      
        "params" => array(
                array(
                    "type" => "kswr_number",
                    "class" => "",
                    "heading" => "<i class='dashicons dashicons-desktop'></i> Desktop",
                    "param_name" => "spc_desk_height",
                    "admin_label" => true,
                    "value" => 0,
                ),
                array(
                    "type" => "kswr_number",
                    "class" => "",
                    "heading" => "<i class='dashicons dashicons-tablet' style='transform: rotate(90deg);'></i> Tablet",
                    "param_name" => "spc_tablet_height",
                ),
                array(
                    "type" => "kswr_number",
                    "class" => "",
                    "heading" => "<i class='dashicons dashicons-tablet'></i> Tablet",
                    "param_name" => "spc_tablet_sm_height",
                ),
                array(
                    "type" => "kswr_number",
                    "class" => "",
                    "heading" => "<i class='dashicons dashicons-smartphone' style='transform: rotate(90deg);'></i> Phone",
                    "param_name" => "spc_phone_height",
                ),    
                array(
                    "type" => "kswr_number",
                    "class" => "",
                    "heading" => "<i class='dashicons dashicons-smartphone'></i> Phone",
                    "param_name" => "spc_phone_sm_height",                 
                ),
        )
    ));        
}
add_action( 'init', 'kswr_spacer_shortcode' ); 



?>