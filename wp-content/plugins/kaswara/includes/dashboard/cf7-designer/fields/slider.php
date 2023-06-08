<?php 
//Slider Field
class kaswara_field_slider{
	function __construct($values = array()){
		$this->values = $values;
	}
	function render(){
		$element = '';		
		$value = (isset($this->values['value']) && $this->values['value'] != "" ) ? $this->values['value'] : $this->values['default'] ;		
		$title = (isset($this->values['title'])) ? $this->values['title'] : '';
		$description = (isset($this->values['description'])) ? $this->values['description'] : '';			
		$min = (isset($this->values['min'])) ? $this->values['min'] : 0;
		$max = (isset($this->values['max'])) ? $this->values['max'] : 300;
		$cssName = (isset($this->values['cssName'])) ? $this->values['cssName'] : '';
		$cssSufix = (isset($this->values['cssSufix'])) ? $this->values['cssSufix'] : '';
		$element = '';
		$elementType = (isset($this->values['elementType'])) ? $this->values['elementType'] : 'none';

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

		$element .= '<div class="km-slider-range-container"><input type="number" step="1" min="'.$min.'" max="'.$max.'" size="4" data-element-type="'.$elementType.'" onchange="km_cf7_onfield_change(this)"  data-cssname="'.$cssName.'" data-csssufix="'.$cssSufix.'" data-type="number" onkeyup="kaswara_change_range(this)"  value="'.esc_attr($value).'"  class="km-slider-input kmcf7_maker_inp" min="'.$min.'" max="'.$max.'" size="4">
		<div class="km-slider-range-parent"><div class="km-slider-range-filled" ></div>
		<input type="range" step="1" value="'.esc_attr($value).'" data-type="slider"  data-element-type="'.$elementType.'" class="km-slider-range kmcf7_maker_inp"  min="'.$min.'" max="'.$max.'" size="4"  data-cssname="'.$cssName.'" oninput="kaswara_change_range(this)" onchange="kaswara_change_range(this)"></div></div>';


		return kaswaracf7_print_field_section($title, $description, $element);			
	}

}

?>