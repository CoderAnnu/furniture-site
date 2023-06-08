<?php 

class kswr_cf7_global_section{

	function __construct($values = array(),$elements = array()){
		$this->values = $values;
		$this->elements = $elements ;
	}

	function render(){
		$output = '';
		foreach ($this->elements as $elem) {
			if($elem['type'] == 'text'){
				$text = new kaswara_field_text($elem['values']);
				$output .= $text->render(); 
			}
			if($elem['type'] == 'textarea'){
				$textarea = new kaswara_field_textarea($elem['values']);
				$output .= $textarea->render(); 
			}
			if($elem['type'] == 'uploader'){
				$uploader = new kaswara_field_uploader($elem['values']);
				$output .= $uploader->render(); 
			}
			if($elem['type'] == 'uploader_multiple'){
				$uploader_multiple = new kaswara_field_uploader_multiple($elem['values']);
				$output .= $uploader_multiple->render(); 
			}
			if($elem['type'] == 'colorpicker'){
				$colorpicker = new kaswara_field_colorpicker($elem['values']);
				$output .= $colorpicker->render(); 
			}
			if($elem['type'] == 'switcher'){
				$switcher = new kaswara_field_switcher($elem['values']);
				$output .= $switcher->render(); 
			}
			if($elem['type'] == 'number'){
				$number = new kaswara_field_number($elem['values']);
				$output .= $number->render(); 
			}
			if($elem['type'] == 'select'){
				$select = new kaswara_field_select($elem['values']);
				$output .= $select->render(); 
			}
			if($elem['type'] == 'selectmodern'){
				$selectmodern = new kaswara_field_selectmodern($elem['values']);
				$output .= $selectmodern->render(); 
			}
			if($elem['type'] == 'message'){
				$message = new kaswara_field_message($elem['values']);
				$output .= $message->render(); 
			}
			if($elem['type'] == 'distance'){
				$distance = new kaswara_field_distance($elem['values']);
				$output .= $distance->render(); 
			}
			if($elem['type'] == 'background'){
				$background = new kaswara_field_background($elem['values']);
				$output .= $background->render(); 
			}		
			if($elem['type'] == 'slider'){
				$slider = new kaswara_field_slider($elem['values']);
				$output .= $slider->render(); 
			}			
		}

		echo $output;


	}

}	

?>