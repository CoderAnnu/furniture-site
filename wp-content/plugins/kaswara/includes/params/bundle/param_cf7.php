<?php 
/*------------------------------------------------
         CONTACT FORM 7 SHORTCODE
------------------------------------------------*/
if(is_plugin_active('contact-form-7/wp-contact-form-7.php')){
    function kswr_cf7_shortcode(){
        vc_map( array(
            "name" => esc_html__( "Contat Form 7", "kaswara" ),
            "description" => esc_html__("Contact Form 7 Element", "kaswara"),         
            'icon' => KASWARA_IMAGES.'small/cf7.jpg',  
            "category" => "Kaswara",        
            "base" => "kswr_cf7",      
            "params" => array(                   
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__("Select Contact Form",'kaswara'),                  
                    'param_name' => 'cf7_id',
                    'value' => kaswara_cf7_forms()          
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__("Select CF7 Style",'kaswara'),                  
                    'param_name' => 'cf7_style',
                    'value' => kaswara_cf7_styles()          
                ),            
            )
        ));        
    }
   add_action( 'init', 'kswr_cf7_shortcode' ); 
}


?>