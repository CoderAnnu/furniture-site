<?php 
//Message Field
class kaswara_field_message{
	function __construct($values = array()){
		$this->values = $values;
	}
	function render(){
		$title = (isset($this->values['title'])) ? $this->values['title'] : '';
		return '<div class="km-builder-section-full">
				<span class="km-builder-mtitle">'.$title .'</span>						
				</div>';
		
	}

}

?>