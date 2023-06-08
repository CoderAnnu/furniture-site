<?php 

/**
* This is the Number for the Admin Panel You can call it using this construct class
* 
*/
class kswr_default_number{
	
	function __construct($values = array()){
		$this->values = $values;
	}

	function render(){		
		
		$value = (isset($this->values['value']) && $this->values['value'] != "" ) ? $this->values['value'] : $this->values['default'];		
		$title = (isset($this->values['title'])) ? $this->values['title'] : '';
		$name = (isset($this->values['name'])) ? $this->values['name'] : '';
		$description = (isset($this->values['description'])) ? $this->values['description'] : '';		
		
		$number_inputs ='';
		$number_inputs .= '<div class="kmb-elem-2 kmb-elem-nf">
					<div class="sy-number-chooser">							
						<input type="number" step="1" id="'.esc_attr($name).'" name="'.esc_attr($name).'" value="'.esc_attr($value).'"  class="input-text qty text" size="4">							
					</div>
		</div>';
		

		$required = (isset($this->values['required'])) ? $this->values['required'] :  array();	
		$dataRequired = "";
		if(!empty($required)){
			$requiredArray = kswr_default_overlay_section($required);
			$dataRequired ='data-required="'.esc_attr($requiredArray).'"';
		}

		return '<div class="kmb-elem-attr" '.$dataRequired.'>
				<div class="kmb-elem-attr-name-desc">
					<h4>'.$title.'</h4>
					<span>'.$description.'</span>
				</div>
				<div class="kmb-elem-attr-input">'.$number_inputs.'</div>
			</div>';

	}
}

?>