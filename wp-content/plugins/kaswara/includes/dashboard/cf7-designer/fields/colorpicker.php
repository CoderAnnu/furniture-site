<?php 
//ColorPicker Field
class kaswara_field_colorpicker{
	function __construct($values = array()){
		$this->values = $values;
	}
	function render(){
		$element = '';		
		$value = (isset($this->values['value'])) ? $this->values['value'] : $this->values['default'];
		$cssName = (isset($this->values['cssName'])) ? $this->values['cssName'] : '';
		$cssSufix = (isset($this->values['cssSufix'])) ? $this->values['cssSufix'] : '';
		$title = (isset($this->values['title'])) ? $this->values['title'] : '';
		$description = (isset($this->values['description'])) ? $this->values['description'] : '';
		$elementType = (isset($this->values['elementType'])) ? $this->values['elementType'] : 'none';


		$element = '<div  class="kmb-elem-attr-color">
						<input type="text" class="form-control color-picker kmcf7_maker_inp" data-element-type="'.$elementType.'" onchange="km_cf7_onfield_change(this)" value="'.$value.'" data-cssname="'.$cssName.'" data-csssufix="'.$cssSufix.'"/>
					</div>';
		return kaswaracf7_print_field_section($title, $description, $element);			
	}

}

?>