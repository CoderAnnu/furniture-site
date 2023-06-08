<?php 

/**
* This is the Switcher input for the Admin Panel You can call it using this construct class
* 
*/
class kswr_default_switcher{
	
	function __construct($values = array()){
		$this->values = $values;
	}

	function render(){		

		$value = (isset($this->values['value']) && $this->values['value'] != "" ) ? $this->values['value'] : $this->values['default'];
		$title = (isset($this->values['title'])) ? $this->values['title'] : 'No Title is given';
		$id = (isset($this->values['id'])) ? $this->values['id'] : '';
		$description = (isset($this->values['description'])) ? $this->values['description'] : 'No Description is given';
		$name = (isset($this->values['name'])) ? $this->values['name'] : '';		
		$on = (isset($this->values['on'])) ? $this->values['on'] :  array('text' =>  'ON' , 'val' => 1 );
		$off = (isset($this->values['off'])) ? $this->values['off'] :  array('text' =>  'OFF' , 'val' =>  0 );
		$theClassSwitcher = 'sy-sw-controler ';

		$required = (isset($this->values['required'])) ? $this->values['required'] :  array();	
		$dataRequired = "";
		if(!empty($required)){
			$requiredArray = kswr_default_overlay_section($required);
			$dataRequired ='data-required="'.esc_attr($requiredArray).'"';
		}
		


		if($value == $on['val']){
			$theClassSwitcher .= ' sy-sw-controler_on'; 
		}elseif($value == $off['val']){
			$theClassSwitcher .= ' sy-sw-controler_off'; 
		}

		return '<div class="kmb-elem-attr" '.$dataRequired.'>
				<div class="kmb-elem-overlay"></div>
				<div class="kmb-elem-attr-name-desc">
					<h4>'.$title.'</h4>
					<span>'.$description.'</span>
				</div>
				<div class="kmb-elem-attr-input">
					<div class="sy-sw-wrap noselect">
						<div class="'.$theClassSwitcher.'" onclick="kswr_switchSySwitcher(this);"  data-value="'.$value.'" data-on="'.$on['val'].'" data-off="'.$off['val'].'">
							<input type="hidden" name="'.esc_attr($name).'" value="'.esc_attr($value).'" id="'.esc_attr($name).'">
							<div class="sy-sw-cursor"></div>
							<div class="sy-sw-label sy-sw-label_on">'.$on['text'].'</div>
							<div class="sy-sw-label sy-sw-label_off">'.$off['text'].'</div>
						</div>
					</div>

				</div>
			</div>';

	}
}

?>