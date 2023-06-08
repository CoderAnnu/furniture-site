<?php 
	$kmcf7_myStyles = kaswara_get_single_option('kmcf7_styles'); 	
?>
<div class="kmcf7m-top">
	<div class="kmcf7m-process-container" data-step="1">
		<div class="kmcf7m-process-progress">
			<div class="kmcf7m-process-progress-insider"></div>
		</div>	

		<div class="kmcf7m-process-element kmcf7m-pp-step-1 pps1 pps2 pps3 pps4 pps5 pps6" data-situation="active">
			<div class="kmcf7m-process-element-insider">
				<div class="kmcf7m-pe-ba"><i class="km-icon-anchor2"></i></div>				
			</div>
			<div class="kmcf7m-pe-tooltip"><?php echo esc_html__('First Step','kaswara'); ?></div>
		</div>

		<div class="kmcf7m-process-element kmcf7m-pp-step-2 pps2 pps3 pps4 pps5 pps6" data-situation="noactive" onclick="kmcf7m_go_tostep(2)">
			<div class="kmcf7m-process-element-insider">
				<div class="kmcf7m-pe-ba"><i class="km-icon-adjustments"></i></div>				
			</div>
			<div class="kmcf7m-pe-tooltip"><?php echo esc_html__('Style Chooser','kaswara'); ?></div>
		</div>

		<div class="kmcf7m-process-element kmcf7m-pp-step-3 pps3 pps4 pps5 pps6" data-situation="noactive" onclick="kmcf7m_go_tostep(3)">
			<div class="kmcf7m-process-element-insider">
				<div class="kmcf7m-pe-ba"><i class="km-icon-tools"></i></div>				
			</div>
			<div class="kmcf7m-pe-tooltip"><?php echo esc_html__('Form Styler','kaswara'); ?></div>
		</div>

		<div class="kmcf7m-process-element kmcf7m-pp-step-4 pps4 pps5 pps6" data-situation="noactive" onclick="kmcf7m_go_tostep(4)">
			<div class="kmcf7m-process-element-insider">
				<div class="kmcf7m-pe-ba"><i class="km-icon-layers2"></i></div>				
			</div>
			<div class="kmcf7m-pe-tooltip"><?php echo esc_html__('Button Type','kaswara'); ?></div>
		</div>

		<div class="kmcf7m-process-element kmcf7m-pp-step-5 pps5 pps6" data-situation="noactive" onclick="kmcf7m_go_tostep(5)">
			<div class="kmcf7m-process-element-insider">
				<div class="kmcf7m-pe-ba"><i class="km-icon-pencil4"></i></div>				
			</div>
			<div class="kmcf7m-pe-tooltip"><?php echo esc_html__('Button Styler','kaswara'); ?></div>
		</div>	
		<div class="kmcf7m-process-element kmcf7m-pp-step-6 pps6" data-situation="noactive" onclick="kmcf7m_go_tostep(6)">
			<div class="kmcf7m-process-element-insider">
				<div class="kmcf7m-pe-ba"><i class="km-icon-ribbon"></i></div>				
			</div>
			<div class="kmcf7m-pe-tooltip"><?php echo esc_html__('Finish','kaswara'); ?></div>
		</div>	

		<div class="kmcf7m-process-element kmcf7m-process-link">
			<a href="http://kswrdoc.sayenthemes.com/" target="_blank"></a>
			<div class="kmcf7m-process-element-insider">
				<div class="kmcf7m-pe-ba"><i class="km-icon-notebook"></i></div>				
			</div>
			<div class="kmcf7m-pe-tooltip"><?php echo esc_html__('Documentation','kaswara'); ?></div>
		</div>	
		<div class="kmcf7m-process-element kmcf7m-process-link">
			<a href="https://youtu.be/yovvSfsL_Kw" target="_blank"></a>
			<div class="kmcf7m-process-element-insider">
				<div class="kmcf7m-pe-ba"><i class="km-icon-video"></i></div>				
			</div>
			<div class="kmcf7m-pe-tooltip"><?php echo esc_html__('Watch Turorial','kaswara'); ?></div>
		</div>	


	</div>
</div>
<div class="kswr-back-popup" id="kswr-cf7-impexp-container" data-element="export" data-situation="hidden" style="width: 475px; height: 350px; left: calc(50% - 230px);">
   <div class="kswr-back-popup-closer" onclick="kswr_close_back_popup();">x</div>
   <div class="kswr-sc-import-ctn">
	    <div class="kswr-back-popup-title" style="font-size: 17px; letter-spacing: 4px;"><?php echo esc_html__('IMPORT FORM STYLES','kaswara'); ?></div>
		<div class="kswr-back-popup-ctn" style="height: 350px;">
			<textarea class="kswr-sc-imp-area" id="kswr-cf7-import-area" placeholder="<?php echo esc_html__('Paste json style here','kaswara'); ?>"></textarea>
			<div class="kswr-sc-import-btn-ctn">
				<div class="kswr-btn-ac thatgreen" onclick="kswr_cf7_import_styling();">
					<span><i class="km-icon-upload"></i></span> <?php echo esc_html__('Upload Style','kaswara'); ?>
				</div>
			</div>
		</div>
   </div>
   <div class="kswr-sc-export-ctn">
	    <div class="kswr-back-popup-title" style="font-size: 17px; letter-spacing: 4px;"><?php echo esc_html__('EXPORT FORM STYLES','kaswara'); ?></div>
		<select class="kswr-back-popup-select" id="kswr-cf7-expimp-style" onchange="kswr_cf7_exportstyle(this);">
			<option value=""><?php echo esc_html__('Choose what to export?','kaswara'); ?></option>
			<option value="all"><?php echo esc_html__('All form styles','kaswara'); ?></option>
			<?php foreach (kaswara_cf7_styles() as $fstyle => $fvalue):
					if($fvalue != 'default'): ?>
				<option value="<?php echo $fvalue; ?>"><?php echo $fstyle; ?></option>
			<?php endif;
					endforeach; ?>
		</select>
		<div class="kswr-back-popup-ctn" style="height: 282px;">
			<textarea class="kswr-sc-imp-area" id="kswr-cf7-export-area"></textarea>
		</div>
   </div>	
</div>

<div class="kmcf7m-top-actions" data-situation="begin">
		<div class="kmcf7m-impexp-actions">
			<div class="kswr-cf7-impexp-btn" onclick="kswr_cf7_impexp_style_action('import');">
				<i class="km-icon-upload" style="color:#00bcd4;"></i> <?php echo esc_html__('Import','kaswara'); ?>
			</div>
			<div class="kswr-cf7-impexp-btn" onclick="kswr_cf7_impexp_style_action('export');">
				<i class="km-icon-download" style="color:#f44336;"></i> <?php echo esc_html__('Export','kaswara'); ?>
			</div>	
		</div>
		<span class="top-spanmsg"><?php echo esc_html__('Be different, Create unique form styles!','kaswara'); ?></span>
		<div class="kmcf7m-top-action-begin">
			<div class="kmcf7m-top-act-ele" data-situation="hidden">			
				<div class="kmcf7m-top-act-ele-inp"><input type="text" id="kmcf7m-stylename" placeholder="Style Name" /></div>
				<div class="kmcf7m-top-action-button kmcf7m-ac-btn action thatgreen" data-action="new" data-realicon="+" onclick="kmcf7m_show_input(this);"><span><i class="km-icon-add"></i></span><div class="kmcf7m-pe-tooltip"><?php echo esc_html__('New Style','kaswara'); ?></div></div>			
			</div>
			<div class="kmcf7m-top-act-ele" data-situation="hidden">
				<div class="kmcf7m-top-act-ele-inp">
					<select id="kmcf7m-mystyles-select">
						<option value="none"><?php echo esc_html__('Choose from your styles','kaswara'); ?></option>
						<?php 
							if(is_array($kmcf7_myStyles) && !empty($kmcf7_myStyles)): 
								foreach($kmcf7_myStyles as $myStyleID => $myStyle): 
									if($myStyleID != '')
									echo '<option value="'.$myStyleID.'" data-button-css="'.$myStyle['buttonCSS'].'" data-styleid="'.$myStyleID.'" data-stylename="'.$myStyle['styleName'].'"  data-styletype="'.$myStyle['styleType'].'" data-stylebutton="'.$myStyle['styleButton'].'" data-thestyle="'.$myStyle['theStyle'].'">'.$myStyle['styleName'].'</option>';
								endforeach; 
							endif;
						?>
					</select>
				</div>
				<div class="kmcf7m-top-action-button kmcf7m-ac-btn action thatgreen" data-action="edit" data-realicon="<i class='km-icon-pencil'></i>" onclick="kmcf7m_show_input(this);"><span><i class="km-icon-pencil2"></i></span><div class="kmcf7m-pe-tooltip"><?php echo esc_html__('Edit Style','kaswara'); ?></div></div>			
			</div>
		</div>
		<div class="kmcf7m-top-action-end">
			<div class="kmcf7m-top-action-button red" onclick="km_cf7_delete_style();"><span><i class="km-icon-trash"></i></span><div class="kmcf7m-pe-tooltip"><?php echo esc_html__('Delete','kaswara'); ?></div></div>		
			<div class="kmcf7m-top-action-button full blue" data-begin="no" onclick="km_cf7_save_style('save',this);"><?php echo esc_html__('Save','kaswara'); ?></div>
			<div class="kmcf7m-top-action-button full greysolid" data-begin="yes" onclick="km_cf7_save_style('save',this);"><?php echo esc_html__('Finish','kaswara'); ?></div>
			<div class="kmcf7m-top-action-button full grey" onclick="kmcf7m_actual_situation('begin');"><?php echo esc_html__('Cancel','kaswara'); ?></div>
		</div>		
	</div>


<div class="kmcf7m-container">	
	<div class="kmcf7m-left kmcf7m-des-section">		
		<div class="km-builder-element-container">								
			
			<div class="km-builder-style-f km-builder-cr-element kmcf7m-ele1" data-situation="shown">
				<div class="km-builder-style-first-title">
					<span><?php echo esc_html__('Create a New Style or Edit an Existing One!','kaswara'); ?></span>
				</div>
			</div>
			
			<div class="km-builder-style-chooser km-builder-cr-element kmcf7m-ele2" data-situation="hidden">
				<div class="km-builder-style-title"><?php echo esc_html__('Choose a style for the contact form!','kaswara'); ?></div>				
				<?php 
					$styletypes = kaswara_cf7_styletypes();
					foreach ($styletypes as $styleTypeName => $styleType) {
						?>
							<div class="km-builder-style-element styletype" data-situation="none" data-stylename="<?php echo $styleTypeName; ?>" onclick="km_cf7_style_type_chooser(this)" data-defaultstyle="<?php echo $styleType['defaultStyle']; ?>">
								<span><?php echo $styleTypeName; ?></span>
							</div>
						<?php 
					}
				?>
			</div>
			<div class="km-builder-form-styler km-builder-cr-element kmcf7m-ele3" data-situation="hidden">
			
			</div>
			<div class="km-builder-button-chooser km-builder-cr-element kmcf7m-ele4" data-situation="hidden">
				<div class="km-builder-style-title"><?php echo esc_html__('Choose a style for the submit form Button!','kaswara'); ?></div>
				<?php 
					$buttontypes = kaswara_cf7_buttontypes();
					foreach ($buttontypes as $buttonTypeName => $buttonType) {
						?>
							<div class="km-builder-style-element buttontype" data-situation="none" data-buttonname="<?php echo $buttonTypeName; ?>" onclick="km_cf7_button_type_chooser(this)">
								<span><?php echo $buttonType['name']; ?></span>
							</div>
						<?php 
					}
				?>
			</div>
			<div id="kmcf7-button-styler-form" class="km-builder-button-styler km-builder-cr-element kmcf7m-ele5" data-situation="hidden">
				<?php 
					kswrcf7_buttonStylerSection();
				 ?>			
			</div>
			<div class="km-builder-form-save km-builder-cr-element kmcf7m-ele6" data-situation="hidden">
				<div class="kmcf7m-form-save-button kmcf7m-button blue" data-begin="no" onclick="km_cf7_save_style('save',this);"><?php echo esc_html__('Save Form Style','kaswara'); ?></div>
				<div class="kmcf7m-form-save-message"><?php echo esc_html__('You can now save the form style.You can also modify this style later!','kaswara'); ?><br/><?php echo esc_html__('This style is ready to be used in Visual Composer.','kaswara'); ?></div>
			</div>
		
		</div>
	</div>

	<div class="kmcf7m-right kmcf7m-des-section" id="kmcf7m-right">
		<div class="kmcf7m-form-title">
			<div class="kswr-color-container-small">
				<!--<div class="kswr-color-tooltip">
					<?php echo esc_html__('This will not be applied on the final result','kaswara').'<br/>'.esc_html__('It\'s just for simulation purpose!','kaswara'); ?>
				</div>-->
				<input class="color-picker" value="#fff" onchange="kaswara_change_bg_color(this,'#kmcf7m-right');" />
			</div>
			<?php echo esc_html__('Form Live Preview','kaswara'); ?><span id="kmcf7m-curentstyle"></span>
		</div>
		<div class="kameleon-cf7-container" id="kameleon-cf7-container" data-style-name=""  data-style="qaswara" data-button-style="qaswara" style="">			
			<div class="km_cf7-input-container">
				<input type="text" name="first-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required km_cf7-input" id="kmcf7-first-name" aria-required="true" aria-invalid="false" onfocus="km_cf7_designer_focus_plugin(this)" onblur="km_cf7_designer_blur_plugin()">
				<label class="km_cf7-label" for="kmcf7-first-name" data-content="Full Name">
					<span class="km_cf7_label-content" data-content="Full Name">Full Name</span>
				</label>
			</div>			

			<div class="km_cf7-input-container">
				<input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required km_cf7-input" id="kmcf7-email" aria-required="true" aria-invalid="false" onfocus="km_cf7_designer_focus_plugin(this)" onblur="km_cf7_designer_blur_plugin()">
				<label class="km_cf7-label" for="kmcf7-email" data-content="Email">
					<span class="km_cf7_label-content" data-content="Email">Email</span>
				</label>
				
			</div>

			<div class="km_cf7-input-container cf7area km_cf7-textarea-container">
				<textarea class="wpcf7-form-control wpcf7-textarea km_cf7-input km_cf7-textarea" aria-invalid="false" onfocus="km_cf7_designer_focus_plugin(this)" onblur="km_cf7_designer_blur_plugin()" id="kmcf7-message"></textarea>		
				<label class="km_cf7-label" for="kmcf7-message" data-content="Message">
					<span class="km_cf7_label-content" data-content="Message">Message</span>
				</label>
			</div>
			<div class="km_cf7-submit-container">
				<div class="km_cf7-submit-insider">
					<input type="submit" value="Send Message" class="wpcf7-form-control wpcf7-submit km_cf7-button">
					<div class="km_cf7-submit-btn-txt km_cf7-btn-txt-r">Send Message</div>
					<div class="km_cf7-submit-btn-txt km_cf7-btn-txt-h">Send Message</div>
					<div class="km_cf7-btn-bg-r"></div><div class="km_cf7-btn-bg-h"></div>
				</div>
			</div>
			


		</div>
	</div>
</div>
<style type="text/css">
	body{overflow-x: hidden; overflow-y: scroll;} #footer-upgrade{display: none;}
</style>