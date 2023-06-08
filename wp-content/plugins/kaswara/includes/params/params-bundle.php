<?php
$path_to_composer = KASWARA_PLUGIN_PATH."includes/params/";
require_once $path_to_composer.'editor-fields.php';
$shortCodesArray = explode(',',kswr_get_enabled_shortcodes());

if(in_array('skillbar',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_skillbar.php';
if(in_array('radialprogress',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_radialprogress.php';
if(in_array('socialshare',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_socialshare.php';
if(in_array('findus',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_findus.php';
if(in_array('videomodal',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_videomodal.php';
if(in_array('modalwindow',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_modalwindow.php';
if(in_array('button',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_button.php';
if(in_array('alertbox',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_alertbox.php';
if(in_array('bfimage',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_bfimage.php';
if(in_array('teammate',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_teammate.php';
if(in_array('lineseparator',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_lineseparator.php';
if(in_array('iconseparator',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_iconseparator.php';
if(in_array('iconboxaction',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_iconboxaction.php';
if(in_array('interactiveiconbox',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_interactiveiconbox.php';
if(in_array('postgrid',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_postgrid.php';
if(in_array('cf7',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_cf7.php';
if(in_array('hoverimage',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_hoverimage.php';
if(in_array('twopichover',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_twopichover.php';
if(in_array('dropcaps',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_dropcaps.php';
if(in_array('heading',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_heading.php';
if(in_array('singleicon',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_singleicon.php';
if(in_array('iconboxinfo',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_iconboxinfo.php';
if(in_array('counter',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_counter.php';
if(in_array('pricingplan',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_pricingplan.php';
if(in_array('cardflip',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_cardflip.php';
if(in_array('3dcardflip',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_3dcardflip.php';
if(in_array('verticalskillbar',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_verticalskillbar.php';
if(in_array('modernflipbox',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_modernflipbox.php';
if(in_array('imagebanner',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_imagebanner.php';
if(in_array('hoverinfobox',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_hoverinfobox.php';
if(in_array('spacer',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_spacer.php';
if(in_array('fancytext',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_fancytext.php';
if(in_array('testimonial',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_testimonial.php';
if(in_array('pricebox',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_pricebox.php';
if(in_array('countdown',$shortCodesArray))
	require_once $path_to_composer.'bundle/param_countdown.php';
if(in_array('animatedheading',$shortCodesArray))		
	require_once $path_to_composer.'bundle/param_animatedheading.php';
if(in_array('modernimage',$shortCodesArray))		
	require_once $path_to_composer.'bundle/param_modernimage.php';
if(in_array('pricelisting',$shortCodesArray))		
	require_once $path_to_composer.'bundle/param_pricelisting.php';
if(in_array('hotspot',$shortCodesArray))		
	require_once $path_to_composer.'bundle/param_hotspot.php';


if(in_array('replicasection',$shortCodesArray))		
	require_once $path_to_composer.'bundle/param_replicasection.php';



function kswr_load_the_font_front($font_style){
	$the_font = explode(";", $font_style);
	$the_fname = '';
	foreach ($the_font as $value) {
		$thefont = explode(":",$value);	
		foreach ($thefont as $fname) {
		 	if($fname == 'font-family')
		 		$the_fname = $thefont[1];
		 } 
	}
	if($the_fname != 'default'  && $the_fname != 'Default' && $the_fname != 'Inherit' && $the_fname != 'inherit'){		
	/*?>
		<script type="text/javascript">
			jQuery(document).ready(function(){		
	 			if(!jQuery('link[data-fname="<?php echo $the_fname; ?>"]').length)		
	 			jQuery('head').append('<link href="http://fonts.googleapis.com/css?family=<?php echo $the_fname; ?>" type="text/css" data-fname="<?php echo $the_fname; ?>" media="all" rel="stylesheet">');
			});	
		</script>
	<?php */
	}
}



?>
