<?php
require_once KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/fields/fields-bundle.php';
$path_to_elements = KASWARA_PLUGIN_PATH."includes/elements/";

$shortCodesArray = explode(',',kswr_get_enabled_shortcodes());

if(in_array('skillbar',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_skillbar.php';
if(in_array('radialprogress',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_radialprogress.php';
if(in_array('socialshare',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_socialshare.php';
if(in_array('findus',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_findus.php';
if(in_array('videomodal',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_videomodal.php';
if(in_array('modalwindow',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_modalwindow.php';
if(in_array('button',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_button.php';
if(in_array('alertbox',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_alertbox.php';
if(in_array('bfimage',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_bfimage.php';
if(in_array('teammate',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_teammate.php';
if(in_array('lineseparator',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_lineseparator.php';
if(in_array('iconseparator',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_iconseparator.php';
if(in_array('iconboxaction',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_iconboxaction.php';
if(in_array('interactiveiconbox',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_interactiveiconbox.php';
if(in_array('postgrid',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_postgrid.php';
if(in_array('hoverimage',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_hoverimage.php';
if(in_array('sidebyside',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_sidebyside.php';
if(in_array('filterimages',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_filterimages.php';
if(in_array('twopichover',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_twopichover.php';
if(in_array('dropcaps',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_dropcaps.php';
if(in_array('heading',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_heading.php';
if(in_array('singleicon',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_singleicon.php';
if(in_array('iconbundle',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_iconbundle.php';
if(in_array('iconboxinfo',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_iconboxinfo.php';
if(in_array('infolist',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_infolist.php';
if(in_array('counter',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_counter.php';
if(in_array('pricingplan',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_pricingplan.php';
if(in_array('cardflip',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_cardflip.php';
if(in_array('3dcardflip',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_3dcardflip.php';
if(in_array('verticalskillbar',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_verticalskillbar.php';
if(in_array('modernflipbox',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_modernflipbox.php';
if(in_array('imagebanner',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_imagebanner.php';
if(in_array('hoverinfobox',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_hoverinfobox.php';
if(in_array('spacer',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_spacer.php';
if(in_array('fancytext',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_fancytext.php';
if(in_array('testimonial',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_testimonial.php';
if(in_array('animationblock',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_animationblock.php';
if(in_array('modalanything',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_modalanything.php';
if(in_array('cardslider',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_cardslider.php';
if(in_array('pricebox',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_pricebox.php';
if(in_array('carousel',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_carousel.php';
if(in_array('countdown',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_countdown.php';
if(in_array('layeredimages',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_layeredimages.php';	
if(in_array('replicasection',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_replicasection.php';
if(in_array('kswr_rows_columns',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_rows_columns.php';
if(in_array('pilingsection',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_pilingsection.php';
if(in_array('googlemaps',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_googlemaps.php';	
if(in_array('modernimage',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_modernimage.php';	
if(in_array('pricelisting',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_pricelisting.php';	
if(in_array('customgallery',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_customgallery.php';	
if(in_array('hotspot',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_hotspot.php';	
	
if(in_array('animatedheading',$shortCodesArray))	
	require_once $path_to_elements.'vc_templates/kswr_animatedheading.php';	




if(is_plugin_active('contact-form-7/wp-contact-form-7.php')){
	if(in_array('cf7',$shortCodesArray))	
		require_once $path_to_elements.'vc_templates/kswr_cf7.php';	
}


//Function to see what values is used for the shortcode is it the default ones or dr unique
function kswr_shortcode_attribute_value($attName,$isDefaultActive, $realValue,$shortcodeName){
	$resultValue = $realValue;
	if($isDefaultActive == 1)
		$resultValue = kswr_shortcode_form_values_front($shortcodeName)[$attName];

	return $resultValue;
}

//Function to Get the Form Values if exists els it Will get default ones
function kswr_shortcode_form_values_front($shortcodeName){
	$shortcodeDefaults = kaswara_get_single_option($shortcodeName);
	if($shortcodeDefaults == '' || !is_array($shortcodeDefaults))
		$shortcodeDefaults = kswr_shortcode_form_default($shortcodeName);

	return $shortcodeDefaults;
}


function kaswara_social_share_modern($socialArray, $sa,$type,$socialArrayLinks = array(),$customClasses = '',$open_in ='_self'){
	$outPut = '';
	$actualSocialLinks = $findUsKeys =  array();
	$iconStyle = 'width:'.$sa['backsize'].'px; height:'.$sa['backsize'].'px; line-height:'.$sa['backsize'].'px; font-size:'.$sa['size'].'px; border-radius:'.$sa['borderradius'].'px;';
	$shareLink = '';
	if($type == 'share')
		$shareLink = (trim($sa['link']) !="") ? $sa['link'] : get_the_permalink();
	foreach (kaswara_social_list_config() as $key => $value) {
		if( $type == 'share' && in_array($key, $socialArray) )
			array_push($actualSocialLinks,kaswara_social_list_config()[$key]);
		if( $type == 'findus' && array_key_exists($key, $socialArray) ){
			array_push($actualSocialLinks,kaswara_social_list_config()[$key]);			
		}
		
	}

	$newStyle = '';
	switch ($sa['align']) {
		case 'center':
			$newStyle = 'margin:0 '.esc_attr($sa['margins']).'px;';		
			break;
		case 'left':
			$newStyle = 'margin-right:'.esc_attr($sa['margins']).'px;';		
			break;
		case 'right':
			$newStyle = 'margin-left:'.esc_attr($sa['margins']).'px;';		
			break;	
	}
	$trans = floatval(0.2);
	if(!empty($actualSocialLinks)){
		$outPut .= '<div class="km-socials-share-modern kswr-style-changer" data-newStyle="'.$newStyle.'" data-action="nothing" data-target="thischildren" data-todo="add" data-children-name=".km-socials-share-modern-item" data-style="'.esc_attr($sa['style']).'" data-align="'.esc_attr($sa['align']).'" style="--icon-margins: '.esc_attr($sa['margins']).'px;" >';	
			foreach ($actualSocialLinks as $socialLink):
				$transitiontime = '';			
				$trans = floatval($trans)+ floatval(0.1);
				$transitiontime = '--icon-transition-time:'.$trans.'s;';
				
				$outPut .= '<div class="km-socials-share-modern-item '.$customClasses.'" style="'.$iconStyle.' '.$transitiontime.'">
				<div class="km-socials-m-back km-socials-m-back-color" style="background:'.esc_attr($sa['backColor']).'; border-radius:'.esc_attr($sa['borderradius']).'px;"></div>
				<div class="km-socials-m-back km-socials-m-back-colorscheme" style="background:'.esc_attr($socialLink[1]).'; border-radius:'.esc_attr($sa['borderradius']).'px;"></div>
				<i class="km-socials-m-icon km-socials-m-icon-color '.esc_attr($socialLink[2]).'"  style="color:'.esc_attr($sa['iconColor']).';"></i>
				<i class="km-socials-m-icon km-socials-m-icon-hovercolor '.esc_attr($socialLink[2]).'"  style="color:'.esc_attr($sa['iconHoverColor']).';"></i>
				<i class="km-socials-m-icon km-socials-m-icon-colorscheme '.esc_attr($socialLink[2]).'"  style="color:'.esc_attr($socialLink[1]).';"></i>';
				if ($sa['style'] == "hoverShowTada"):
					$outPut .= '<div class="kameleon-eff-8-tada eff8-top"><div style="background: '.esc_attr($socialLink[1]).';" class="eff8-insider eff8-insider-one"></div></div>							
						<div class="kameleon-eff-8-tada eff8-top-left"><div style="background: '.esc_attr($socialLink[1]).';" class="eff8-insider eff8-insider-one"></div></div>							
						<div class="kameleon-eff-8-tada eff8-top-right"><div style="background: '.esc_attr($socialLink[1]).';" class="eff8-insider eff8-insider-one"></div></div>							
						<div class="kameleon-eff-8-tada eff8-bottom"><div style="background: '.esc_attr($socialLink[1]).';" class="eff8-insider eff8-insider-two"></div></div>							
						<div class="kameleon-eff-8-tada eff8-bottom-left"><div style="background: '.esc_attr($socialLink[1]).';" class="eff8-insider eff8-insider-two"></div></div>							
						<div class="kameleon-eff-8-tada eff8-bottom-right"><div style="background: '.esc_attr($socialLink[1]).';" class="eff8-insider eff8-insider-two"></div></div>							
						<div class="kameleon-eff-8-tada eff8-center-right"><div style="background: '.esc_attr($socialLink[1]).';" class="eff8-center-insider eff8-insider-three"></div></div>							
						<div class="kameleon-eff-8-tada eff8-center-left"><div style="background: '.esc_attr($socialLink[1]).';" class="eff8-center-insider eff8-insider-four"></div></div>';
				endif; 
				if($type == 'share')
					$outPut .= 	'<a href="'.kaswara_social_share_link($socialLink[0]).''.esc_url($shareLink).'"></a></div>';	
				if($type == 'findus')
					$outPut .= 	'<a href="'.$socialArray[$socialLink[0]].'" target="'.$open_in.'"></a></div>';	

			 endforeach;					
		 $outPut .= '</div>' ; 
	}			
	return $outPut;
}

//Social Profile Array
function kaswara_social_list_config(){
	return array(
		'facebook'		=>	array('facebook'	,	'#3b5998' ,	'km-icon-facebook'	),
		'twitter'		=>	array('twitter'		, 	'#55acee' ,	'km-icon-twitter'		),
		'instagram'		=>	array('instagram'	, 	'#125688' ,	'km-icon-instagram2'	),
		'youtube'		=>	array('youtube'		, 	'#bb0000' ,	'km-icon-youtube3'		),
		'linkedin'		=>	array('linkedin'	, 	'#007bb5' ,	'km-icon-linkedin2'	),
		'google'		=>	array('google'		,	'#dd4b39' ,	'km-icon-google-plus'	),
		'behance'		=>	array('behance'		,	'#1769ff' ,	'km-icon-behance'		),
		'vimeo'			=>	array('vimeo'		,	'#aad450' ,	'km-icon-vimeo'		),
		'flickr'		=>	array('flickr'		,	'#ff0084' ,	'km-icon-flickr'		),
		'skype'			=>	array('skype'		,	'#00aff0' ,	'km-icon-skype'		),
		'pinterest'		=>	array('pinterest'	, 	'#cb2027' ,	'km-icon-pinterest-p'	),
		'dribbble'		=>	array('dribbble'	, 	'#ea4c89' ,	'km-icon-dribbble'	),
		'twitch'		=>	array('twitch'		,	'#6441a5' ,	'km-icon-twitch'		),
		'soundcloud'	=>	array('soundcloud'	, 	'#ff8800' ,	'km-icon-soundcloud'	),
		'github'		=>	array('github'		,	'#000000' ,	'km-icon-github-alt'	),
		'vine'			=>	array('vine'		,	'#00bf8f' ,	'km-icon-vine'		),
		'tumblr'		=>	array('tumblr'		,	'#32506d' ,	'km-icon-tumblr'		),
		'foursquare'	=>	array('foursquare'	, 	'#0072b1' ,	'km-icon-foursquare'	),
		'rss'			=>	array('rss'			,	'#ff6600' ,	'km-icon-rss'			),
	);
}

function kaswara_social_share_link($socialLink){
	$slar = array(
		'facebook' 	=> 'http://www.facebook.com/sharer.php?m2w&s=100&u=',
		'twitter'	=> 'https://twitter.com/share?url=',
		'google'	=> 'https://plus.google.com/share?url=',	
		'linkedin'  => 'http://www.linkedin.com/shareArticle?mini=true&url=',
		'pinterest'	=> 'http://pinterest.com/pin/create/button/?url=',
		'reddit'	=> 'http://reddit.com/submit?url='
	);
	return $slar[$socialLink];
}


//Return Button
function kaswara_btn_element_output($settings){
	$output = '';
	if(is_array($settings)){
		$containerStyle = 'text-align:'.$settings['btn_align'].';'.$settings['btn_margins'];
		$btn_width = 'width:'.$settings['btn_width'].'px;';
		
		if(isset($settings['btn_full_width']) && $settings['btn_full_width'] == 'true')
			$btn_width = 'width:100%;';

		$btnStyle = $btn_width.' --btn-height:'.$settings['btn_height'].'px;  height:'.$settings['btn_height'].'px; border-radius:'.$settings['btn_border_radius'].'px; '.$settings['btn_paddings'] ;
		
		$bgRstyle =  kswr_gradient_color_maker('background' ,$settings['btn_bg']).''. kswr_gradient_border_maker($settings['btn_bdr'],'border');
		$bgHstyle =  kswr_gradient_color_maker('background' ,$settings['btn_bg_hover']).''. kswr_gradient_border_maker($settings['btn_bdr_hover'],'border');
		

$additional_font_style = ''; 
$btnfstyle = $settings['btn_ftstyle'];
fix_kaswara_font_styles($settings['btn_ftstyle'], $additional_font_style);


		kswr_load_the_font_front($settings['btn_ftstyle']);
		if($settings['btn_layout'] != 'justicon')
			$btnStyle .= ' line-height:'.$settings['btn_height'].'px;';

		$txtFont = $settings['btn_ftsize'] .' '.$settings['btn_ftstyle'];
		$txtRStyle = kswr_gradient_color_maker('color' ,$settings['btn_clr']).''.$txtFont;
		$txtHStyle = kswr_gradient_color_maker('color' ,$settings['btn_clr_hover']).''.$txtFont;

		$iconStyle = 'font-size: '.$settings['btn_icon_size'].'px; ';

		$triggerJS = $triggerLink ='';
		if($settings['btn_trigger'] == 'javascript'){
			$triggerJS =  $settings['btn_trigger_action'];
		}
		if($settings['btn_trigger'] == 'link'){
			$triggerLink =  $settings['btn_trigger_action'];
		}

		//The Padding Style for buttons
		$spanStyle = $paddinIcon =''; 
		if($settings['btn_layout'] == 'withicon'){
			$paddinIcon = kaswara_padding_chooser($settings['btn_icon_paddings'],'padding-left','padding-left');
			$spanStyle = kaswara_padding_chooser($settings['btn_icon_paddings'],'padding-right','padding-left');
			if($settings['btn_icon_position'] =='right'){
				$paddinIcon = kaswara_padding_chooser($settings['btn_icon_paddings'],'padding-right','padding-right');
				$spanStyle = kaswara_padding_chooser($settings['btn_icon_paddings'],'padding-left','padding-right');
			}
		}
		$iconStyle .= $paddinIcon;

		$output = '<div class="kswr-button-container kswr-shortcode-element kswr-theelement" style="'.$containerStyle.'" data-icon-position="'.esc_attr($settings['btn_icon_position']).'" data-button-style="'.esc_attr($settings['btn_style']).'" data-layout="'.esc_attr($settings['btn_layout']).'" data-hover-action="'.esc_attr($settings['btn_hover_action']).'">
				<div class="kswr-button-insider" style="'.$btnStyle.'" '.$triggerJS.'>				
					<div class="kswr-button-txt kswr-button-txt-r kswr-shortcode-element" data-fontsettings="'.esc_attr($settings['btn_ftsize']).'" style="'.$txtRStyle.'"><span style="'.$spanStyle.'">'.$settings['btn_txt'].'</span><div class="kswr-button-icon kswr-button-icon-r" style="'.$iconStyle.'"><i style="'.kswr_gradient_color_maker('color' ,$settings['btn_icon_clr']).'" class="'.$settings['btn_icon'].'"></i></div></div>
					<div class="kswr-button-txt kswr-button-txt-h kswr-shortcode-element" data-fontsettings="'.esc_attr($settings['btn_ftsize']).'" style="'.$txtHStyle.'"><span style="'.$spanStyle.'">'.$settings['btn_txt'].'</span> <div class="kswr-button-icon kswr-button-icon-h" style="'.$iconStyle.'"><i style="'.kswr_gradient_color_maker('color' ,$settings['btn_icon_clr_hover']).'" class="'.esc_attr($settings['btn_icon']).'"></i></div></div>
					<div class="kswr-button-bg kswr-button-bg-r ' .$additional_font_style. ' " style="'.$bgRstyle.'"></div>
					<div class="kswr-button-bg kswr-button-bg-h ' .$additional_font_style. ' " style="'.$bgHstyle.'"></div>	
					'.$triggerLink.'			
				</div>			
			</div>';		
	}

	return $output;

}
function kaswara_padding_chooser($padding,$type,$thepad){
	$result = '';
	$paddingsArray = explode(';',$padding);
	foreach($paddingsArray as $pd){
		if($pd != ''){
			$thePad = explode(':',$pd);
			if($thePad[0] == $type )
				$result = $thepad .':'.$thePad[1].';';
		}
			
	}	
	return $result;
}


//Return Icon With Hover Effect
function kaswara_icon_element_output($settings){
	$outPut = '';

	if(is_array($settings)){ 
		$classRandom = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,8);
		$ss = array(
			'shortcode' => 'kswrtheicon',
			'classname' => '.kswr-icon-thatc-'.$classRandom,
			'--hover-bg'  => kswr_pseudo_border_color_maker($settings['si_back_hover'])
		);
		kaswara_style_ms_maker($ss);

		$theLink  = '' ;
		if(trim($settings['si_link']) != ""){
			$theLink  = '<a href="'.esc_url($settings['si_link']).'" target="'.esc_attr($settings['si_openlink']).'"></a>';
		}
		$outPut .= '<div class="kswr-icon-container kswr-icon-thatc kswr-icon-thatc-'.$classRandom.'" data-rotation="'.esc_attr($settings['si_rotation']).'" data-hover="'.esc_attr($settings['si_effect']).'" style="width:'.$settings['si_bgsize'].'px; height: '.$settings['si_bgsize'].'px; line-height:'.$settings['si_bgsize'].'px;  border-radius: '.$settings['si_border_radius'].'px; --hover-bg:'.kswr_pseudo_border_color_maker($settings['si_back_hover']).'; ">
				<div class="kswr-icon-ic kswr-icon-ic-r kswr-icon-r" style=" font-size:'.$settings['si_iconsize'].'px;"><i  style="'.kswr_gradient_color_maker('color' ,$settings['si_ic_color']).'" class="'.esc_attr($settings['si_icon']).'"></i></div>
				<div class="kswr-icon-ic kswr-icon-ic-h kswr-icon-h" style="font-size:'.$settings['si_iconsize'].'px;"><i style="'.kswr_gradient_color_maker('color' ,$settings['si_ic_color_hover']).'" class="'.esc_attr($settings['si_icon']).'"></i></div>
				<div class="kswr-icon-bg kswr-icon-bg-r kswr-icon-r" style="'.kswr_gradient_color_maker('background' ,$settings['si_back']).''.kswr_gradient_border_maker($settings['si_border'],'border').'"></div>
				<div class="kswr-icon-bg kswr-icon-bg-h kswr-icon-h" style="'.kswr_gradient_color_maker('background' ,$settings['si_back_hover']).'"></div>
				'.$theLink.'
			</div>';


	}

	return $outPut;
}

//function to know return the color or gradient 
//{"type":"color", "color1":"#333", "color2":"#333", "direction":"to left"}
function kswr_gradient_color_maker($type , $settings, $checker = 'background'){
	$values = $result = '';
	$values = json_decode($settings,true);	
	if(!is_array($values)){
		$settings = str_replace("``" , '"' ,$settings);
		$values = json_decode($settings,true);			
	}
	if(is_array($values)){
		$result = $type.':'.$values['color1'].';';
		if($values['type'] == 'gradient' ){
			$result .= $checker.' : linear-gradient('.$values['direction'].','.$values['color1'].','.$values['color2'].');';
			if($type == 'color' && $checker == 'background')
				$result .= ' -webkit-background-clip: text;-webkit-text-fill-color: transparent; background-clip: text; text-fill-color: transparent;';	
			if($type == 'color' && $checker != 'background')			
				$result .= $checker.'-clip: text;'.$checker.'-fillcolor: transparent;';	
		}
		if($type == 'color' && $checker == 'background' && $values['type'] != 'gradient')			
			$result .= $checker.'-clip: inherit;'.$checker.'-color: inherit; -webkit-text-fill-color:'.$values['color1'].';';
	}   	   
	return $result;
}

//function to return the border color before
function kswr_pseudo_border_color_maker($settings){
	$values = $result = '';
	$values = json_decode($settings,true);	
	if(!is_array($values)){
		$settings = str_replace("``" , '"' ,$settings);
		$values = json_decode($settings,true);			
	}
	if(is_array($values)){
		$result = $values['color1'];
	}
	return $values['color1'];
}


function kaswara_border_valuer_return($settings){
	$values = $result = '';
	$values = json_decode($settings,true);	
	if(!is_array($values)){
		$settings = str_replace("``" , '"' ,$settings);
		$values = json_decode($settings,true);			
	}
	return $values;
}

//Function To return the Color or Gradient Color for borders
function kswr_gradient_border_maker($settings,$type, $ishover = 'nohover'){
	$values = $result = '';
	$values = json_decode($settings,true);	
	if(!is_array($values)){
		$settings = str_replace("``" , '"' ,$settings);
		$values = json_decode($settings,true);			
	}

	if(is_array($values)){
		if( $values['bordergradientdirection'] == 'none' || trim($values['bordergradientdirection']) == ''){
			$result = $type.':'.$values['borderwidth'].' '.$values['borderstyle'].' '.$values['bordercolor1'].';'.$type.'-width:'.$values['borderwidth'].';';
		}
		else if($values['bordergradientdirection'] != 'none' && trim($values['bordergradientdirection']) != '' && $ishover == 'nohover')
			$result = 'border-width:'.$values['borderwidth'].'; border-style:'.$values['borderstyle'].'; -webkit-border-image:-webkit-linear-gradient('.$values['bordergradientdirection'].', '.$values['bordercolor1'].' 0%, '.$values['bordercolor2'].' 100%); border-image:linear-gradient('.$values['bordergradientdirection'].', '.$values['bordercolor1'].' 0%, '.$values['bordercolor2'].' 100%); border-image-slice:1;';
		else if($values['bordergradientdirection'] != 'none' && trim($values['bordergradientdirection']) != '' && $ishover == 'hover')
			$result = $type.'-border-width:'.$values['borderwidth'].'; '.$type.'-border-style:'.$values['borderstyle'].'; '.$type.'-border-image:linear-gradient('.$values['bordergradientdirection'].', '.$values['bordercolor1'].' 0%, '.$values['bordercolor2'].' 100%); '.$type.'-border-image-webkit:-webkit-linear-gradient('.$values['bordergradientdirection'].', '.$values['bordercolor1'].' 0%, '.$values['bordercolor2'].' 100%);';
	}	
	return $result;
}

//function to know return the Background
//{"image":"", "repeat":"no-repeat", "position":"left top", "size":"cover", "overlay":"", "overlayopacity":"0"}
/*function kswr_background_maker($bgimage,$settings){
	$values = $result = '';
	$values = json_decode($settings,true);	
	if($bgimage != ''){
		$img_src = wp_get_attachment_image_src($bgimage,'full');
		$result .= 'background-image:url('.$img_src[0].');';
	}
	if(!is_array($values)){
		$settings = str_replace("``" , '"' ,$settings);
		$values = json_decode($settings,true);			
	}
	if(is_array($values)){
		$result .= 'background-repeat:'.$values['repeat'].'; background-position:'.$values['position'].'; background-size:'.$values['size'].'; --overlay-color:'.$values['overlay'].';--overlay-opacity:'.$values['overlayopacity'].';';
	}
	return $result;
}*/

function kswr_background_maker($bgimage,$settings){
	$values = $theimage = $result = '';
	$values = json_decode($settings,true);	
	if($bgimage != ''){
		$img_src = wp_get_attachment_image_src($bgimage,'full');
		$theimage .= 'background-image:url('.$img_src[0].');';
	}
	if(!is_array($values)){
		$settings = str_replace("``" , '"' ,$settings);
		$values = json_decode($settings,true);			
	}
	if(is_array($values)){
		//Shady
		$result .= '<div class="kswr-element-back-overlay" style="'.$theimage.'background-repeat:'.$values['repeat'].'; background-position:'.$values['position'].'; background-size:'.$values['size'].';"><div class="kswr-elem-overlay-opac" style="background-color:'.$values['overlay'].';opacity:'.$values['overlayopacity'].';"></div></div>'; 
		
	}
	return $result;
}



//Border Simple Maker 
function kswr_border_simple_maker($bordersArray , $borderColor){
	$result = '';
	$bordersArray = explode(';',$bordersArray);
	foreach($bordersArray as $br){
		if(trim($br) != ''){
			$theVbr = explode(':',$br);
			$result .= $theVbr[0].'-width:'.$theVbr[1].';';
		}
	}	
	$result .= 'border-color:'.$borderColor.'; border-style:solid; ';
	return $result;
}

//function to return the Row Background Sections
function kswr_row_background_maker($settings){
	$result = '';
	if(is_array($settings)){
		switch ($settings['kswr_row_bg_type']) {
			case 'color':
					$result = '<div class="kswr-row-background" style="'.kswr_gradient_color_maker('background-color' ,$settings['kswr_row_bg_color']).'"></div>';
				break;		
			case 'simpleimage':
					$result = '<div class="kswr-row-background">'.kswr_background_maker($settings['kswr_row_bg_image_img'],$settings['kswr_row_bg_image']).'</div>';
				break;
			case 'parallax':	
				if($settings['kswr_row_parallax_type'] == 'follow_mouse'){
					$result = '<div class="kswr-row-background kswr-row-parallax" data-parallaxtype="'.esc_attr($settings['kswr_row_parallax_type']).'"><div class="kswr-row-parallax-followmouse" data-parallaxspeed="'.esc_attr($settings['kswr_row_parallax_speed']).'"  data-parallaxtype="'.esc_attr($settings['kswr_row_parallax_type']).'" data-vertmoveto="'.esc_attr($settings['kswr_row_parallax_ver_moveto']).'" data-horizmoveto="'.esc_attr($settings['kswr_row_parallax_hor_moveto']).'" data-parallaxautospeed="'.esc_attr($settings['kswr_row_parallax_autospeed']).'" style="--move-speed:'.esc_attr($settings['kswr_row_parallax_autospeed']).'s;">'.kswr_background_maker($settings['kswr_row_bg_image_img'],$settings['kswr_row_bg_image']).'</div></div>';
				}else{
					$result = '<div class="kswr-row-background kswr-row-parallax" data-parallaxspeed="'.esc_attr($settings['kswr_row_parallax_speed']).'"  data-parallaxtype="'.esc_attr($settings['kswr_row_parallax_type']).'" data-vertmoveto="'.esc_attr($settings['kswr_row_parallax_ver_moveto']).'" data-horizmoveto="'.esc_attr($settings['kswr_row_parallax_hor_moveto']).'" data-parallaxautospeed="'.esc_attr($settings['kswr_row_parallax_autospeed']).'" style="--move-speed:'.esc_attr($settings['kswr_row_parallax_autospeed']).'s;">'.kswr_background_maker($settings['kswr_row_bg_image_img'],$settings['kswr_row_bg_image']).'</div>';
				}
				
				break;

		}		
	}	
	return $result;
}


//function to return the Row Background Sections
function kswr_row_background_maker_row($settings){
	$isArray = is_array($settings);
	if($isArray)
		$theAttrClasses = $settings['kswr_presponsive'].' '.$settings['kswr_mresponsive'].' '.$settings['kswr_bresponsive'];	

	$result = '<div class="kswr-row-element-back" data-classes="'.esc_attr($theAttrClasses).'">';
	if(isset($settings['kswr_row_top_decor_enabled']) &&  $settings['kswr_row_top_decor_enabled'] == 'true'){
		$result .= '<div class="kswr-row-deco" style="background-color:'.esc_attr($settings['kswr_row_top_decor_color']).';" data-position="top" data-decoration="'.esc_attr($settings['kswr_row_top_decor_type']).'" data-size="'.esc_attr($settings['kswr_row_top_decor_size']).'" ></div>';
		if($settings['kswr_row_top_decor_type'] == 'both-side-inside' || $settings['kswr_row_top_decor_type'] ==  'both-side-outside')
			$result .= '<div class="kswr-row-deco" data-half="right" style="background-color:'.esc_attr($settings['kswr_row_top_decor_color']).';" data-position="top" data-decoration="'.esc_attr($settings['kswr_row_top_decor_type']).'" data-size="'.esc_attr($settings['kswr_row_top_decor_size']).'" ></div>';
	}


	if($isArray){
		if($settings['kswr_row_sep_enabled'] == 'on' && ($settings['kswr_row_sep_position'] =="top" || $settings['kswr_row_sep_position'] =="both"))
		$result .= '<div class="kswr-row-ver-separator-container kswr-row-ver-separator-container-top" data-align="'.$settings['kswr_row_sep_top_align'].'"><div class="kswr-row-ver-separator" style="height:'.$settings['kswr_row_sep_height'].'px; bottom:'.-(intval($settings['kswr_row_sep_height'])/2).'px; width:'.$settings['kswr_row_sep_width'].'px; background:'.$settings['kswr_row_sep_color'].'; "></div></div>';


	
		switch ($settings['kswr_row_bg_type']) {
			case 'color':
					$result .= '<div class="kswr-row-background" style="'.kswr_gradient_color_maker('background-color' ,$settings['kswr_row_bg_color']).'"></div>';
				break;		
			case 'simpleimage':
					$result .= '<div class="kswr-row-background">'.kswr_background_maker($settings['kswr_row_bg_image_img'],$settings['kswr_row_bg_image']).'</div>';
				break;
			case 'parallax':	
				if($settings['kswr_row_parallax_type'] == 'follow_mouse'){
					
					$result .= '<div class="kswr-row-background kswr-row-parallax" data-parallaxtype="'.esc_attr($settings['kswr_row_parallax_type']).'"><div class="kswr-row-parallax-followmouse" data-parallaxspeed="'.esc_attr($settings['kswr_row_parallax_speed']).'"  data-parallaxtype="'.esc_attr($settings['kswr_row_parallax_type']).'" data-vertmoveto="'.esc_attr($settings['kswr_row_parallax_ver_moveto']).'" data-horizmoveto="'.esc_attr($settings['kswr_row_parallax_hor_moveto']).'" data-parallaxautospeed="'.esc_attr($settings['kswr_row_parallax_autospeed']).'" style="--move-speed:'.esc_attr($settings['kswr_row_parallax_autospeed']).'s;">'.kswr_background_maker($settings['kswr_row_bg_image_img'],$settings['kswr_row_bg_image']).'</div></div>';
				}else{
					$result .= '<div class="kswr-row-background kswr-row-parallax" data-parallaxspeed="'.esc_attr($settings['kswr_row_parallax_speed']).'"  data-parallaxtype="'.esc_attr($settings['kswr_row_parallax_type']).'" data-vertmoveto="'.esc_attr($settings['kswr_row_parallax_ver_moveto']).'" data-horizmoveto="'.esc_attr($settings['kswr_row_parallax_hor_moveto']).'" data-parallaxautospeed="'.esc_attr($settings['kswr_row_parallax_autospeed']).'" style="--move-speed:'.esc_attr($settings['kswr_row_parallax_autospeed']).'s;">'.kswr_background_maker($settings['kswr_row_bg_image_img'],$settings['kswr_row_bg_image']).'</div>';
				}
				
				break;

		}		
		if($settings['kswr_row_sep_enabled'] == 'on' && ($settings['kswr_row_sep_position'] =="bottom" || $settings['kswr_row_sep_position'] =="both"))
		$result .= '<div class="kswr-row-ver-separator-container kswr-row-ver-separator-container-bottom" data-align="'.$settings['kswr_row_sep_bottom_align'].'"><div class="kswr-row-ver-separator" style="height:'.$settings['kswr_row_sep_height'].'px; top:'.-(intval($settings['kswr_row_sep_height'])/2).'px; width:'.$settings['kswr_row_sep_width'].'px; background:'.$settings['kswr_row_sep_color'].'; "></div></div>';
	}
	//End Settings

	if(isset($settings['kswr_row_bottom_decor_enabled']) &&  $settings['kswr_row_bottom_decor_enabled'] == 'true'){
		$result .= '<div class="kswr-row-deco" style="background-color:'.esc_attr($settings['kswr_row_bottom_decor_color']).';" data-position="bottom" data-decoration="'.esc_attr($settings['kswr_row_bottom_decor_type']).'" data-size="'.esc_attr($settings['kswr_row_bottom_decor_size']).'" ></div>';
		if($settings['kswr_row_bottom_decor_type'] == 'both-side-inside' || $settings['kswr_row_bottom_decor_type'] ==  'both-side-outside')
			$result .= '<div class="kswr-row-deco" data-half="right" style="background-color:'.esc_attr($settings['kswr_row_bottom_decor_color']).';" data-position="bottom" data-decoration="'.esc_attr($settings['kswr_row_bottom_decor_type']).'" data-size="'.esc_attr($settings['kswr_row_bottom_decor_size']).'" ></div>';
	}
	
	$result .="</div>";
	return $result;
}




//add_action('wp_head','kaswara_custom_code_printer');
//add_action('wp_footer', 'kaswara_style_ms_printer');
$msStyles = array();  
//Style Maker for IE and edge
/*
	THINGS TO VERIFY
	InfoList

*/

/*
	Things I'm done with
	iconboxaction
	filterimages
	all the icons shit
*/


function kaswara_style_ms_printer(){		
	global $msStyles;	
	$styleArrat = json_encode($msStyles) ;
	$theOutput = '<script type="text/javascript">
			jQuery(document).ready(function(){		
				var styleOutPut = "";
			if (/MSIE 10/i.test(navigator.userAgent) || /MSIE 9/i.test(navigator.userAgent) || /rv:11.0/i.test(navigator.userAgent) ||  /Edge\/\d./i.test(navigator.userAgent) ){					
					var msStyles = '.$styleArrat.';		
					if(msStyles instanceof Array){
						msStyles.forEach(function(shortcode) {
							switch(shortcode["shortcode"]){
								case "iconboxaction":
									styleOutPut += shortcode["classname"]+":hover .km-iconboxb-iconc{color:"+shortcode["--icon-hover-color"]+"!important;}"+shortcode["classname"]+" .km-iconboxb-button:hover{background: "+shortcode["--button-hover-bg"]+"!important; color:"+shortcode["--button-hover-color"]+"!important; border-color:"+shortcode["--button-hover-border-color"]+"!important;}";
									break;
								case "filterimages":
									styleOutPut += shortcode["classname"]+ ".km-filter-it-link:hover,"+shortcode["classname"]+" .km-filter-it-link[data-active=\"true\"],"+shortcode["classname"]+" .km-filteri-cats[data-style=\"style5\"] .km-filter-it-link:hover,"+ shortcode["classname"]+" .km-filteri-cats[data-style=\"style5\"] .km-filter-it-link[data-active=\"true\"]{color: "+shortcode["--color-hover"]+";}"+shortcode["classname"]+" .km-filteri-cats[data-style=\"style3\"] .km-filter-it-link:before,"+shortcode["classname"]+" .km-filteri-cats[data-style=\"style4\"] .km-filter-it-link:before{background: "+shortcode["--scheme-color"]+";}"+ shortcode["classname"]+" .km-filteri-cats[data-style=\"style1\"] .km-filter-it-link:hover:after, "+shortcode["classname"]+" .km-filteri-cats[data-style=\"style1\"] .km-filter-it-link[data-active=\"true\"]:after,"+ shortcode["classname"]+" .km-filteri-cats[data-style=\"style3\"] .km-filter-it-link:hover:after, "+shortcode["classname"]+" .km-filteri-cats[data-style=\"style3\"] .km-filter-it-link[data-active=\"true\"]:after,"+ shortcode["classname"]+" .km-filteri-cats[data-style=\"style2\"] .km-filter-it-link:hover:before,"+shortcode["classname"]+" .km-filteri-cats[data-style=\"style2\"] .km-filter-it-link[data-active=\"true\"]:before,"+ shortcode["classname"]+" .km-filteri-cats[data-style=\"style3\"] .km-filter-it-link:hover:before,"+shortcode["classname"]+" .km-filteri-cats[data-style=\"style3\"] .km-filter-it-link[data-active=\"true\"]:before,"+ shortcode["classname"]+" .km-filteri-cats[data-style=\"style4\"] .km-filter-it-link:hover:before,"+shortcode["classname"]+" .km-filteri-cats[data-style=\"style4\"] .km-filter-it-link[data-active=\"true\"]:before,"+ shortcode["classname"]+" .km-filteri-cats[data-style=\"style5\"] .km-filter-it-link:hover,"+shortcode["classname"]+" .km-filteri-cats[data-style=\"style5\"] .km-filter-it-link[data-active=\"true\"],"+shortcode["classname"]+" .km-filteri-cats[data-style=\"style3\"] .km-filter-it-link:hover .km-filter-it-link-edge,"+ shortcode["classname"]+" .km-filteri-cats[data-style=\"style3\"] .km-filter-it-link[data-active=\"true\"] .km-filter-it-link-edge{ background:"+shortcode["--scheme-color-hover"]+";}";
								break;	
								case "kswrtheicon":
									styleOutPut += shortcode["classname"]+"[data-hover=\"sasuki\"]  .kswr-icon-bg-h:before,"+shortcode["classname"]+"[data-hover=\"hiroshi\"]  .kswr-icon-bg-h:before,"+shortcode["classname"]+"[data-hover=\"haruki\"]  .kswr-icon-bg-h:before,"+shortcode["classname"]+"[data-hover=\"murawa\"]  .kswr-icon-bg-h:before,"+shortcode["classname"]+"[data-hover=\"sisawa\"]  .kswr-icon-bg-h:before{border-color:"+shortcode["--hover-bg"]+"!important;}";
								break;
								
							}
						});
						jQuery("style[data-type=\'ms-style\']").append(styleOutPut);							
					}	

				}
			});	
	</script>';
	echo $theOutput;	
}

function kaswara_style_ms_maker($settings){
	global $msStyles;
	if(!is_array($msStyles))
		$msStyles = array();	
	array_push($msStyles , $settings);
}





?>
