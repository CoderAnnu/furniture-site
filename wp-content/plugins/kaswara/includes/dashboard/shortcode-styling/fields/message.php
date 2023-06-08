<?php 

/**
* This is the Message for the Admin Panel You can call it using this construct class
* 
*/
class  kswr_default_message{
	
	function __construct($values = array()){
		$this->values = $values;
	}

	function render(){		
		$description = (isset($this->values['description'])) ? $this->values['description'] : 'No Information Found';
		$required = (isset($this->values['required'])) ? $this->values['required'] :  array();	
		$dataRequired = "";
		if(!empty($required)){
			$requiredArray = kswr_default_overlay_section($required);
			$dataRequired ='data-required="'.esc_attr($requiredArray).'"';
		}

		return '<div class="kmb-elem-attr" '.$dataRequired.'><div class="options-note">'.$description.'</div></div>';
	
	}
	
}

?>