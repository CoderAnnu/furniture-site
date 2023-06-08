<?php 
/*------------------------------------------------
         REPLICA SECTION SHORTCODE
------------------------------------------------*/
function kswr_replicasection_shortcode(){
    vc_map( array(
        "name" => esc_html__( "Replica Section", "kaswara" ),
        "description" => esc_html__("Replica Section Element", "kaswara"),         
        'icon' => KASWARA_IMAGES.'small/replica-section.jpg',  
        "category" => "Kaswara",        
        "base" => "kswr_replicasection",      
        "params" => array(                   
            array(
                'type' => 'dropdown',
                'heading' => esc_html__("Choose Replica Section",'kaswara'),
                'group' => 'General',
                'param_name' => 'replica_section_id',              
                'value' => kswr_replica_section_list()           
            ),
        )
    ));        
}
add_action( 'init', 'kswr_replicasection_shortcode' ); 
?>