<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============       F I N D   U S   S H A R E       ============== 
   ==                                                              ==
   ==  															   ==
\* ================================================================== */

function kswr_findus_shortC($atts) {  

 	extract(shortcode_atts(array(						
		'sf_size_def'				=>'1',
		'sf_size'					=> '26',
		'sf_backsize_def'			=>'1',
		'sf_backsize'				=> '35',
		'sf_borderradius_def'		=>'1',
		'sf_borderradius'			=> '0',
		'sf_style_def'				=>'1',
		'sf_style'					=> 'hoverColorScheme',
		'sf_backcolor_def'			=>'1',
		'sf_backcolor'				=> 'transparent',
		'sf_iconcolor_def'			=>'1',
		'sf_iconcolor'				=> '#888',
		'sf_iconhovercolor_def'		=>'1',
		'sf_iconhovercolor'			=> '#fff',
		'sf_link'					=> '',
		'sf_socialarray'			=> '',
		'sf_align_def'				=>'1',
		'sf_align'					=> 'left',		
		'sf_margins_def'			=>'1',
		'sf_margins'				=> '5',	
		'sf_facebook'			=>'',
		'sf_twitter'			=>'',
		'sf_instagram'			=>'',
		'sf_youtube'			=>'',
		'sf_linkedin'			=>'',
		'sf_google'				=>'',
		'sf_behance'			=>'',
		'sf_vimeo'				=>'',
		'sf_flickr'				=>'',
		'sf_skype'				=>'',
		'sf_pinterest'			=>'',
		'sf_dribbble'			=>'',
		'sf_twitch'				=>'',
		'sf_soundcloud'			=>'',
		'sf_github'				=>'',
		'sf_vine'				=>'',
		'sf_tumblr'				=>'',
		'sf_foursquare'			=>'',
		'sf_rss'				=>'',	
		'sf_open_in'			=>'_blank'
 	), $atts));

 	$sf_size = kswr_shortcode_attribute_value('sf_size',$sf_size_def, $sf_size,'findus');
 	$sf_backsize = kswr_shortcode_attribute_value('sf_backsize',$sf_backsize_def, $sf_backsize,'findus');
 	$sf_borderradius = kswr_shortcode_attribute_value('sf_borderradius',$sf_borderradius_def, $sf_borderradius,'findus');
 	$sf_style = kswr_shortcode_attribute_value('sf_style',$sf_style_def, $sf_style,'findus');
 	$sf_backcolor = kswr_shortcode_attribute_value('sf_backcolor',$sf_backcolor_def, $sf_backcolor,'findus');
 	$sf_iconcolor = kswr_shortcode_attribute_value('sf_iconcolor',$sf_iconcolor_def, $sf_iconcolor,'findus');
 	$sf_iconhovercolor = kswr_shortcode_attribute_value('sf_iconhovercolor',$sf_iconhovercolor_def, $sf_iconhovercolor,'findus');
 	$sf_align = kswr_shortcode_attribute_value('sf_align',$sf_align_def, $sf_align,'findus');
 	$sf_margins = kswr_shortcode_attribute_value('sf_margins',$sf_margins_def, $sf_margins,'findus');




 	$sa = array(
 		'backsize'			=>	$sf_backsize,
		'size'				=>	$sf_size,
		'borderradius'		=>	$sf_borderradius,
		'style'				=>	$sf_style,
		'backColor'			=>	$sf_backcolor,
		'iconColor'			=>	$sf_iconcolor,
		'iconHoverColor'	=>	$sf_iconhovercolor,
		'link'				=>	$sf_link,
		'align'				=>  $sf_align,
		'margins'			=>  $sf_margins,
 	);
	$socialArray = array();	
	$socialArray = kswr_add_social_aray($socialArray,$sf_facebook,'facebook');
	$socialArray = kswr_add_social_aray($socialArray,$sf_twitter,'twitter');
	$socialArray = kswr_add_social_aray($socialArray,$sf_instagram,'instagram');
	$socialArray = kswr_add_social_aray($socialArray,$sf_youtube,'youtube');
	$socialArray = kswr_add_social_aray($socialArray,$sf_linkedin,'linkedin');
	$socialArray = kswr_add_social_aray($socialArray,$sf_google,'google');
	$socialArray = kswr_add_social_aray($socialArray,$sf_behance,'behance');
	$socialArray = kswr_add_social_aray($socialArray,$sf_vimeo,'vimeo');
	$socialArray = kswr_add_social_aray($socialArray,$sf_flickr,'flickr');
	$socialArray = kswr_add_social_aray($socialArray,$sf_skype,'skype');
	$socialArray = kswr_add_social_aray($socialArray,$sf_pinterest,'pinterest');
	$socialArray = kswr_add_social_aray($socialArray,$sf_dribbble,'dribbble');
	$socialArray = kswr_add_social_aray($socialArray,$sf_twitch,'twitch');
	$socialArray = kswr_add_social_aray($socialArray,$sf_soundcloud,'soundcloud');
	$socialArray = kswr_add_social_aray($socialArray,$sf_github,'github');
	$socialArray = kswr_add_social_aray($socialArray,$sf_vine,'vine');
	$socialArray = kswr_add_social_aray($socialArray,$sf_tumblr,'tumblr');
	$socialArray = kswr_add_social_aray($socialArray,$sf_foursquare,'foursquare');
	$socialArray = kswr_add_social_aray($socialArray,$sf_rss,'rss');
	
	return kaswara_social_share_modern($socialArray, $sa,'findus',array(),'km-item-bind-view km-item-bind-hidden',$sf_open_in);

 }
add_shortcode( 'kswr_findus', 'kswr_findus_shortC' );


function kswr_add_social_aray($arraySoc = array() , $socialLink, $name){
	if(trim($socialLink) != '')
		$arraySoc[$name] = $socialLink;
	return $arraySoc;	
}

?>