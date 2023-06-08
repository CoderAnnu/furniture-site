<?php 

/**
* This is the Select Options for the Admin Panel You can call it using this construct class
* 
*/
class kswr_default_select{
	
	function __construct($values = array()){
		$this->values = $values;
	}

	function render(){		
		$value = (isset($this->values['value']) && $this->values['value'] != "" ) ? $this->values['value'] : $this->values['default'];	
		$title = (isset($this->values['title'])) ? $this->values['title'] : 'No Title is given';
		$description = (isset($this->values['description'])) ? $this->values['description'] : 'No Description is given';
		$name = (isset($this->values['name'])) ? $this->values['name'] : '';
		$options = (isset($this->values['options'])) ? $this->values['options'] : array();


		$options_output = '';		
		foreach ($options as $key => $val) {
			$iselected ='';
			if($key == $value)
				$iselected = 'selected';
			$options_output .= '<option value="'.esc_attr($key).'" '.$iselected.'>'.esc_attr($val).'</option>';
		}


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
				<div class="kmb-elem-attr-input"><select id="'.esc_attr($name).'" class="kmb-row-back-type full-select" name="'.esc_attr($name).'" >'.
						$options_output
					.'</select>
				</div>
			</div>';

	}
}

?>