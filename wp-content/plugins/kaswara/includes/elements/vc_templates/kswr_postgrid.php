<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============       	 P   O   S   T      	   ============== 
   ==                  		 G   R   I   D				   		   ==
   ==  															   ==
\* ================================================================== */

function kswr_postgrid_shortC($atts) {  

	//Post Grid Attributes
 	extract(shortcode_atts(array(				
		'pg_number'						=> '8',
		'pg_columns_number'				=> 'syp-item-4',	
 		'pg_title_color'				=> '#444',
		'pg_title_style'				=> '',
		'pg_title_size'					=> '',	
		'pg_excerpt_style'				=> '',
		'pg_excerpt_size'				=> '',

 		'pg_excerpt_color'				=> '#777',
 		'pg_background'					=> '#fff',
 		'pg_border'						=> '#eee',
 		'pg_border_thickness'			=> 1,	
 		'pg_border_inside'				=> '#eee',
 		'pg_border_inside_thickness'	=> 1,
 		'pg_excerpt_num'				=> '150',
 		'pg_gutter'						=> 'true',
 		'pg_border_radius'				=> 0,
 		'pg_usrbradius'					=> 0,
 		'pg_style'						=> 'style1',
 		'pg_paddingleftright'			=> 0,
 		'pg_paddingtopbottom'			=> 0, 		
 		'pg_order'						=> 'DESC',
 		'pg_order_by'					=> 'date',
 		'pg_gr_type'					=> 'list',
		'pg_psingle_id'					=> ''
 	), $atts));
 	

	$query_options = array('post_type'=> 'post','posts_per_page' => $pg_number , 'paged'=> 1  ,'orderby'=> $pg_order_by , 'order' => $pg_order);		
	
	if($pg_gr_type == 'single'){
		$pg_columns_number = 'syp-item-1';
		$pId = explode("/", $pg_psingle_id);
		if(is_array($pId))
			$query_options = array('p' => $pId[0] , 'post_type'=> 'post' );
	}
	query_posts( $query_options );		
 	
	if($pg_gutter == 'true') $pg_columns_number.='-gutter';
 	$p_classes = 'syp-itemgrid '.$pg_columns_number.' km-masonry-item-hidden km-masonry-item syp-item';
	$gutter_v = ($pg_gutter == 'true') ? '25' : '0'; 	
	$center_style = ($pg_style == 'style2' || $pg_style == 'style3') ? 'padding:'.$pg_paddingtopbottom.'px '.$pg_paddingleftright.'px;' : '';

	$container_style = 'background:'.$pg_background.';'; 
	$title_font = $pg_title_size .' '. $pg_title_style;
	$title_style = 'color:'.$pg_title_color.';'.$title_font;

	$excerpt_font  = $pg_excerpt_size .' '. $pg_excerpt_style;
	$excerpt_style ='color:'.$pg_excerpt_color.';'.$excerpt_font;
	$date_style4 = '';
	if($pg_style == 'style1' || $pg_style == 'style2' || $pg_style == 'style3'){
		$container_style .= 'border-radius:'.$pg_border_radius.'px; border:'.$pg_border_thickness.'px solid '.$pg_border.';';
		$title_style .= 'border-bottom:'.$pg_border_inside_thickness.'px solid '.$pg_border_inside.';';
		$excerpt_style .=' border-bottom:'.$pg_border_inside_thickness.'px solid '.$pg_border_inside.';';	
	}


	
	kswr_load_the_font_front($pg_title_style);
	kswr_load_the_font_front($pg_excerpt_style);

 	$outPut = '<div class="syp-items-wrapper-post" data-gutter="'.$gutter_v.'">'; 	
	if ( have_posts() ) : 
		while ( have_posts() ) : the_post();
			
			$thumbnailContainer = '';
			$infoContainer = '';
			$userThumbnail = '';


			if($pg_style == 'style1' || $pg_style == 'style2'){
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()) ,'');	
				$thumbnailUrl = $thumb['0'];				
				$thumbnailContainer = '<div class="syp-itemgrid-link"><img src="'.esc_url($thumbnailUrl).'" alt="Image"/></div>';
				$userThumbnail = '<div class="syp-itemgrid-user" style="border-radius:'.$pg_usrbradius.'px; border-color:'.$pg_background.';">'.get_avatar( get_the_author_meta( 'ID' ), 80 ).'</div>';
				$infoContainer = '<div class="syp-itemgrid-info" style="border-color:'.$pg_border_inside.'; color:'.$pg_excerpt_color.'; padding-left:'.$pg_paddingleftright.'px">
									<div class="syp-itemgrid-author"><i class="fa fa-user"></i>'.esc_html__('By ','kaswara').''.get_the_author().'</div>
									<div class="syp-itemgrid-date"><i class="fa fa-calendar"></i>'.get_the_time("F jS, Y").'</div>
								</div>';
			}

			if($pg_style == 'style4'){
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()) ,'');	
				$thumbnailUrl = $thumb['0'];				
				$thumbnailContainer = '<div class="syp-itemgrid-link"><img src="'.esc_url($thumbnailUrl).'" alt="Image"/></div>';
				$userThumbnail = '<div class="syp-itemgrid-user" style="border-radius:'.$pg_usrbradius.'px; border-color:'.$pg_background.';">'.get_avatar( get_the_author_meta( 'ID' ), 80 ).'</div>';
				$date_style4 = '<div class="syp-itemgrid-date" style="color:'.$pg_excerpt_color.';"><i class="fa fa-calendar"></i>'.get_the_time("F j, Y").'</div>';
			}
			
			$authorContainer = '';	
			$dateSection = '';
			if($pg_style == 'style3'){
				$authorContainer = '<div class="syp-itemgrid-3-bottom" style="border-top:'.$pg_border_inside_thickness.'px solid'.$pg_border_inside.'; color:'.$pg_title_color.';">
									<div class="syp-itemgrid-3-image" style="border-radius:'.$pg_usrbradius.'px;">'
										.get_avatar( get_the_author_meta( 'ID' ), 80 ).
									'</div>
									<span>'.esc_html__('By ','kaswara').''.get_the_author().'</span>
								</div>';
				$dateSection  = '<div class="syp-itemgrid-date3"  style="color:'.$pg_title_color.';">'.get_the_time("M jS Y").'</div>';
			}
			


			$outPut .= '<div class="'.$p_classes.'" style="'.$container_style.'" data-style="'.esc_attr($pg_style).'">
							'.$thumbnailContainer.'								
							<div class="syp-itemgrid-center" style="'.$center_style.'">
								'.$userThumbnail.'
								'.$date_style4.'
								<div class="syp-itemgrid-title kswr-shortcode-element" data-fontsettings="'.esc_attr($pg_title_size).'" style="'.$title_style.'">		
									<a href="'.esc_url(get_the_permalink()).'">'.get_the_title().'</a>								
								</div>
								'.$dateSection.'
								<div class="syp-itemgrid-excerpt kswr-shortcode-element" data-fontsettings="'.esc_attr($pg_excerpt_size).'" style="'.$excerpt_style.'">
			 						'.substr(get_the_excerpt(), 0,$pg_excerpt_num).'
								</div>'.$authorContainer.'	
							</div>
							'.$infoContainer.'							
						</div>';

		endwhile; 
		wp_reset_query();
	endif; 	

	$outPut .= '</div>';
	
	return $outPut;
}

add_shortcode( 'kswr_postgrid', 'kswr_postgrid_shortC' );


?>