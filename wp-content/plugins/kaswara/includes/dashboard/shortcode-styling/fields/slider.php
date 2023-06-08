<?php 

/**
* This is the Slider for the Admin Panel You can call it using this construct class
* 
*/
class kswr_default_slider{
	
	function __construct($values = array()){
		$this->values = $values;
	}

	function render(){		
		
		$value = (isset($this->values['value']) && $this->values['value'] != "" ) ? $this->values['value'] : $this->values['default'] ;		
		$title = (isset($this->values['title'])) ? $this->values['title'] : 'No Title is given';
		$description = (isset($this->values['description'])) ? $this->values['description'] : 'No Description is given';			
		$min = (isset($this->values['min'])) ? $this->values['min'] : 0;
		$max = (isset($this->values['max'])) ? $this->values['max'] : 300;
		$name = (isset($this->values['name']) && $this->values['name'] != "" ) ? $this->values['name'] : "";		


		$number_inputs = '';

		$rangePer = 0;
		$percentMinCalculate = $min * 100 /  ($max-$min);	
		if($min <= 0)
			$percentMinCalculate = (-$min * 100) /  ($max-$min);	
		if($value <= 0)
			$rangePer = $percentMinCalculate + (intval($value) * 100 )/  ($max-$min); 
		if($value > 0 && $min <= 0 )
			$rangePer = $percentMinCalculate+intval((intval($value) * 100 )/  ($max-$min)); 
		if($value > 0 && $min > 0 )
		$rangePer = intval((intval($value) * 100 )/  ($max-$min)) - $percentMinCalculate; 

		$typeRange = "slider";
		
		$number_inputs .= '<div class="km-slider-range-container"><input type="number" step="1" min="'.$min.'" max="'.$max.'" size="4"  data-type="number" onkeyup="kaswara_change_range(this)" id="'.esc_attr($name).'" name="'.esc_attr($name).'" value="'.esc_attr($value).'"  class="km-slider-input" min="'.$min.'" max="'.$max.'" size="4">
		<div class="km-slider-range-parent"><div class="km-slider-range-filled" ></div>
		<input type="range" step="1" value="'.esc_attr($value).'" data-type="slider" class="km-slider-range" min="'.$min.'" max="'.$max.'" size="4"  oninput="kaswara_change_range(this)" onchange="kaswara_change_range(this)"></div></div>';
		

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