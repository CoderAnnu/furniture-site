<?php 
//Select Field
class kaswara_field_select{
	function __construct($values = array()){
		$this->values = $values;
	}
	function render(){
		$element = '';		
		$value = (isset($this->values['value']) && $this->values['value'] != "" ) ? $this->values['value'] : $this->values['default'];	
		$title = (isset($this->values['title'])) ? $this->values['title'] : '';
		$description = (isset($this->values['description'])) ? $this->values['description'] : '';		
		$options = (isset($this->values['options'])) ? $this->values['options'] : array();
		$cssName = (isset($this->values['cssName'])) ? $this->values['cssName'] : '';
		$cssSufix = (isset($this->values['cssSufix'])) ? $this->values['cssSufix'] : '';
		$elementType = (isset($this->values['elementType'])) ? $this->values['elementType'] : 'none';

		$element .= '<select class="kmb-row-back-type full-select kmcf7_maker_inp" data-element-type="'.$elementType.'"  onchange="km_cf7_onfield_change(this)" data-cssname="'.$cssName.'" data-csssufix="'.$cssSufix.'">';
		//$element .= '<option value="'.esc_attr($value).'">'.esc_attr($options[$value]).'</option>';
		foreach ($options as $key => $val) {
			$selected = '';
			if($value == $key)
				$selected ='selected';

			$element .= '<option value="'.esc_attr($key).'" '.$selected.'>'.esc_attr($val).'</option>';
		}


		$required = (isset($this->values['required'])) ? $this->values['required'] :  array();	
		$dataRequired = "";
		if(!empty($required)){
			$requiredArray = kameleon_overlay_section($required);
			$dataRequired ='data-required="'.esc_attr($requiredArray).'"';
		}
		$element .= '</select>';
		return kaswaracf7_print_field_section($title, $description, $element);			
	}

}

?>