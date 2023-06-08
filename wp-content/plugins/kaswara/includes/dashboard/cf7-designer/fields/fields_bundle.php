<?php 
//Kameleon (Maker / Designer & Builder) Fields Bundle
require_once(KASWARA_PLUGIN_PATH. 'includes/dashboard/cf7-designer/fields/global_section.php');
require_once(KASWARA_PLUGIN_PATH. 'includes/dashboard/cf7-designer/fields/colorpicker.php');
require_once(KASWARA_PLUGIN_PATH. 'includes/dashboard/cf7-designer/fields/slider.php');
require_once(KASWARA_PLUGIN_PATH. 'includes/dashboard/cf7-designer/fields/distance.php');
require_once(KASWARA_PLUGIN_PATH. 'includes/dashboard/cf7-designer/fields/select.php');
require_once(KASWARA_PLUGIN_PATH. 'includes/dashboard/cf7-designer/fields/message.php');

//Function To Print The Element Section
Function kaswaracf7_print_field_section($title, $description, $element){
	$outPut = '';
	$outPut ='<div class="km-builder-section">
				<div class="km-builder-title">
					<h3>'.$title.'</h3>
					<span>'.$description.'</span>
				</div>
				<div class="km-builder-element">
					<div class="km-builder-element-insider">
						'.$element.'
					</div>
				</div>
			</div>	';

	return $outPut;
}


?>