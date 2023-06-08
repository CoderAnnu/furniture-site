<?php 
/**
* This is the text input for the Admin Panel You can call it using this construct class
* 
*/
class kswr_default_text{
	
	function __construct($values = array()){
		$this->values = $values;
	}

	function render(){				
		$type = (isset($this->values['type']) && $this->values['type'] != "" ) ? $this->values['type'] : 'text';		
		$value = (isset($this->values['value']) && $this->values['value'] != "" ) ? $this->values['value'] : $this->values['default'];		
		$title = (isset($this->values['title'])) ? $this->values['title'] : '';
		$description = (isset($this->values['description'])) ? $this->values['description'] : '';
		$name = (isset($this->values['name'])) ? $this->values['name'] : '';
			

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
				<div class="kmb-elem-attr-input">
					<input class="full-input" id="'.esc_attr($name).'" type="'.esc_attr($type).'" name="'.esc_attr($name).'" value="'.esc_attr(stripslashes($value)).'" />
				</div>
			</div>';

	}
}

?>