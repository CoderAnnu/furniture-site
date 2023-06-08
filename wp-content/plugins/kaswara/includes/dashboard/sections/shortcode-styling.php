<?php 	include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/fields/fields-bundle.php');  ?>
<!-- Import & Export -->
<div class="kswr-sc-styling-imp-container">
	<div class="kswr-sc-styling-imp-btn" onclick="kswr_shortcode_style_action('import');">
		<i class="km-icon-upload" style="color:#00bcd4;"></i> <?php echo esc_html__('Import','kaswara'); ?>
	</div>
	<div class="kswr-sc-styling-imp-btn" onclick="kswr_shortcode_style_action('export');">
		<i class="km-icon-download" style="color:#f44336;"></i> <?php echo esc_html__('Export','kaswara'); ?>
	</div>
</div>

<div class="kswr-back-popup" id="kswr-impexp-container" data-element="import" data-situation="hidden" style="width: 475px; height: 350px; left: calc(50% - 230px);">
   <div class="kswr-back-popup-closer" onclick="kswr_close_back_popup();">x</div>
   <div class="kswr-sc-import-ctn">
	    <div class="kswr-back-popup-title"><?php echo esc_html__('IMPORT STYLES','kaswara'); ?></div>
		<div class="kswr-back-popup-ctn" style="height: 350px;">
			<textarea class="kswr-sc-imp-area" id="kswr-sc-import-area" placeholder="<?php echo esc_html__('Paste json style here','kaswara'); ?>"></textarea>
			<div class="kswr-sc-import-btn-ctn">
				<div class="kswr-btn-ac thatgreen" onclick="kswr_shortcode_import_styling();">
					<span><i class="km-icon-upload"></i></span> <?php echo esc_html__('Upload Style','kaswara'); ?>
				</div>
			</div>
		</div>
   </div>
   <div class="kswr-sc-export-ctn">
	    <div class="kswr-back-popup-title"><?php echo esc_html__('EXPORT STYLES','kaswara'); ?></div>
		<div class="kswr-back-popup-ctn" style="height: 350px;">
			<textarea class="kswr-sc-imp-area" id="kswr-sc-export-area"></textarea>
		</div>
   </div>
	
</div>


<div class="kswr-shortcode-styling-ct kswara-ct">	
	<div class="kswr-shortcode-styling-closer" onclick="kswr_hide_shortcode_styling();">x</div>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/skillbar_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/radialprogress_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/socialshare_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/findus_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/videomodal_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/modalwindow_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/button_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/alertbox_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/bfimage_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/teammate_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/iconboxaction_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/interactiveiconbox_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/dropcaps_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/singleicon_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/iconboxinfo_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/infolist_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/counter_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/pricingplan_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/cardflip_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/3dcardflip_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/verticalskillbar_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/modernflipbox_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/imagebanner_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/hoverinfobox_form.php'); ?>
	<?php include_once(KASWARA_PLUGIN_PATH.'includes/dashboard/shortcode-styling/forms/modalanything_form.php'); ?>	
</div>
<div class="kswr-shortcode-styling-chooser">
<?php 
	$shortcodeStyling = array(
		array('img'=> KASWARA_IMAGES.'progressbar.jpg', 'name' => 'Skill Bar', 'id' => 'skillbar'),
		array('img'=> KASWARA_IMAGES.'radial.jpg', 'name' => 'Radial Progress', 'id' => 'radialprogress'),
		array('img'=> KASWARA_IMAGES.'findus.jpg', 'name' => 'Social Share', 'id' => 'socialshare'),
		array('img'=> KASWARA_IMAGES.'findus.jpg', 'name' => 'Find Us', 'id' => 'findus'),
		array('img'=> KASWARA_IMAGES.'video.jpg', 'name' => 'Video Modal', 'id' => 'videomodal'),
		array('img'=> KASWARA_IMAGES.'modal.jpg', 'name' => 'Modal Window', 'id' => 'modalwindow'),
		array('img'=> KASWARA_IMAGES.'button.jpg', 'name' => 'Button', 'id' => 'button'),
		array('img'=> KASWARA_IMAGES.'alert.jpg', 'name' => 'Alert Box', 'id' => 'alertbox'),
		array('img'=> KASWARA_IMAGES.'beforeafterimage.jpg', 'name' => 'Before After Image', 'id' => 'bfimage'),
		array('img'=> KASWARA_IMAGES.'teammate.jpg', 'name' => 'Team Mate', 'id' => 'teammate'),
		array('img'=> KASWARA_IMAGES.'interactiveiconbox.jpg', 'name' => 'Iconbox Action', 'id' => 'iconboxaction'),
		array('img'=> KASWARA_IMAGES.'interactiveiconbox.jpg', 'name' => 'Interactive Iconbox', 'id' => 'interactiveiconbox'),
		array('img'=> KASWARA_IMAGES.'drop-caps.jpg', 'name' => 'Drop Caps', 'id' => 'dropcaps'),
		array('img'=> KASWARA_IMAGES.'icon.jpg', 'name' => 'Single Icon', 'id' => 'singleicon'),
		array('img'=> KASWARA_IMAGES.'infobox.jpg', 'name' => 'Iconbox Info', 'id' => 'iconboxinfo'),
		array('img'=> KASWARA_IMAGES.'infolist.jpg', 'name' => 'Info List', 'id' => 'infolist'),
		array('img'=> KASWARA_IMAGES.'counter.jpg', 'name' => 'Counter', 'id' => 'counter'),
		array('img'=> KASWARA_IMAGES.'modernpricebox.jpg', 'name' => 'Pricing Plan', 'id' => 'pricingplan'),
		array('img'=> KASWARA_IMAGES.'cardflip.jpg', 'name' => 'Card Flip', 'id' => 'cardflip'),
		array('img'=> KASWARA_IMAGES.'flip.jpg', 'name' => '3D Card Flip', 'id' => '3dcardflip'),
		array('img'=> KASWARA_IMAGES.'verticalprogress.jpg', 'name' => 'Vertical Skillbar', 'id' => 'verticalskillbar'),
		array('img'=> KASWARA_IMAGES.'cardflip.jpg', 'name' => 'Modern Flip Box', 'id' => 'modernflipbox'),
		array('img'=> KASWARA_IMAGES.'imagebanner.jpg', 'name' => 'Image Banner', 'id' => 'imagebanner'),
		array('img'=> KASWARA_IMAGES.'hover.jpg', 'name' => 'Hover Infobox', 'id' => 'hoverinfobox'),
		array('img'=> KASWARA_IMAGES.'modal-any.jpg', 'name' => 'Modal Anything', 'id' => 'modalanything'),
	);
	foreach ($shortcodeStyling as $elem) {
	?>
		<div class="ksw-shortcode-styling-item" data-id="<?php echo esc_attr($elem['id']); ?>" onclick="kswr_show_shortcode_styling(this)">
			<div class="ksw-shortcode-styling-img"><img src="<?php echo esc_url($elem['img']); ?>"></div>
			<div class="ksw-shortcode-styling-title"><?php echo $elem['name']; ?></div>
		</div>	
	<?php } ?>
</div>
