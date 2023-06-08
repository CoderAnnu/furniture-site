<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============     R E P L I C A     S E C T I O N  	   ===========
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_replicasection_shortC($atts) {  	
 	extract(shortcode_atts(array(						
		'replica_section_id' => 'none'
 	), $atts));
 	$theoutPut = '';
 	if(trim($replica_section_id) != '' &&  trim($replica_section_id) != 'none'){
 		$query_options = array('p' => $replica_section_id , 'post_type'=> 'replica_section' );
		query_posts( $query_options );	
		if ( have_posts() ) : 
			while ( have_posts() ) : the_post();
				the_content();
			endwhile;
		endif;	
 	}
 	wp_reset_query();
 }
add_shortcode( 'kswr_replicasection', 'kswr_replicasection_shortC' );

?>