<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============    R A D I A L     P R O G R E S S   ============== 
   ==                                                              ==
   ==  															                               ==
\* ================================================================== */
function kswr_radialprogress_shortC($atts) {  
	
 	extract(shortcode_atts(array(						
    'rad_content_background_def'      => '1',
		'rad_content_background'          => '#fafafe',
    'rad_content_color_def'           => '1',
		'rad_content_color'               => '#444',
    'rad_content_fontsize_def'        => '1',
    'rad_content_fontsize'            => '',
    'rad_content_fontstyle_def'       => '1',
		'rad_content_fontstyle'           => '',
		'rad_percent'                     => '50',
    'rad_size_def'                    => '1',
		'rad_size'                        => '150',
    'rad_border_size_def'             => '1',
		'rad_border_size'                 => '7',
    'rad_border_color_def'            => '1',
		'rad_border_color'                => '#eee',
    'rad_color_def'                   => '1',
		'rad_color'                       => '#289fca',
    'radial_position_def'             => '1',
		'radial_position'                 => 'center',
    'rad_icon_enabled'                => 'off', 
    'rad_style'                       => 'style1', 
    'rad_icon'                        => '', 
    'rad_icon_size'                   => '24', 
    'rad_icon_color'                  => '#444', 
 	), $atts));

  $rad_content_background = kswr_shortcode_attribute_value('rad_content_background',$rad_content_background_def, $rad_content_background,'radialprogress');
  $rad_content_color = kswr_shortcode_attribute_value('rad_content_color',$rad_content_color_def, $rad_content_color,'radialprogress');
  $rad_content_fontsize = kswr_shortcode_attribute_value('rad_content_fontsize',$rad_content_fontsize_def, $rad_content_fontsize,'radialprogress');
  $rad_content_fontstyle = kswr_shortcode_attribute_value('rad_content_fontstyle',$rad_content_fontstyle_def, $rad_content_fontstyle,'radialprogress');
  $rad_size = kswr_shortcode_attribute_value('rad_size',$rad_size_def, $rad_size,'radialprogress');
  $rad_border_size = kswr_shortcode_attribute_value('rad_border_size',$rad_border_size_def, $rad_border_size,'radialprogress');
  $rad_border_color = kswr_shortcode_attribute_value('rad_border_color',$rad_border_color_def, $rad_border_color,'radialprogress');
  $rad_color = kswr_shortcode_attribute_value('rad_color',$rad_color_def, $rad_color,'radialprogress');
  $radial_position = kswr_shortcode_attribute_value('radial_position',$radial_position_def, $radial_position,'radialprogress');

  kswr_load_the_font_front($rad_content_fontstyle);


 	$maskClip = 'clip: rect(0px, '.$rad_size.'px, '.$rad_size.'px, '.($rad_size/2).'px) ';
 	$fillClip = 'clip: rect(0px, '.($rad_size/2).'px, '.$rad_size.'px, 0px)';
	$insetMargins = $rad_border_size.'px';
	$insetSize = 'calc(100% - '.($rad_border_size*2).'px)';
	$insetStyle = 'left:'.$insetMargins.'; top:'.$insetMargins.'; width:'.$insetSize.'; height:'.$insetSize.';';

  $radialStyle = $radialIconContainer = '';
  if($rad_icon_enabled == 'on'){
    $radialStyle = 'data-style="'.$rad_style.'"';
    $radialIconContainer = '<div class="km-radial-iconc" style="color:'.$rad_icon_color.'; font-size:'.$rad_icon_size.'px;"><i class="'.$rad_icon.'"></i></div>';
  }

  $icon_perc_content = $radialIconContainer.'<div class="km-rad-percentc kswr-shortcode-element" data-fontsettings="'.esc_attr($rad_content_fontsize).'" style="'.$rad_content_fontsize.''.$rad_content_fontstyle.'"><span class="perc-value">0</span> %</div>';
  
  if($rad_icon_enabled == 'on' && ($rad_style == 'style3' || $rad_style == 'style5'))
      $icon_perc_content = '<div class="km-rad-percentc kswr-shortcode-element" data-fontsettings="'.esc_attr($rad_content_fontsize).'" style="'.$rad_content_fontsize.''.$rad_content_fontstyle.'"><span class="perc-value">0</span> %</div>'.$radialIconContainer;

	$outPut = '<div class="km-radial-progressbar-container kswr-theelement" data-position="'.esc_attr($radial_position).'" '.$radialStyle.'><div class="km-radial-progressbar" data-progress="0" style="background-color:'.$rad_border_color.'; width: '.$rad_size.'px; height: '.$rad_size.'px;" data-value="'.esc_attr($rad_percent).'" >
    <div class="circle">
        <div class="mask full" style="'.$maskClip.';">
            <div class="fill" style="'.$fillClip.'; background-color: '.$rad_color.';"></div>
        </div>
        <div class="mask half" style="'.$maskClip.';">
            <div class="fill" style="'.$fillClip.'; background-color: '.$rad_color.';"></div>
            <div class="fill fix" style="'.$fillClip.'; background-color: '.$rad_color.';"></div>
        </div>        
    </div>
    <div class="inset" style="'.$insetStyle.'">
        <div class="percentage" style="background: '.$rad_content_background.'; color:'.$rad_content_color.'">
            <div class="numbers">
              '.$icon_perc_content.'
            </div>
        </div>
    </div>
</div></div>';
 	return $outPut;
 }
add_shortcode( 'kswr_radialprogress', 'kswr_radialprogress_shortC' );

?>