<?php 

/**
* This is the Margin, Padding & Border Distance for the Admin Panel You can call it using this construct class
* 
*/
class kswr_default_distance{
	
	function __construct($values = array()){
		$this->values = $values;
	}

	function render(){
		$output = '';
		$title = (isset($this->values['title'])) ? $this->values['title'] : '';
		$description = (isset($this->values['description'])) ? $this->values['description'] : '';		
		$name = (isset($this->values['name'])) ? $this->values['name'] : '';
	
		$required = (isset($this->values['required'])) ? $this->values['required'] :  array();	
		$dataRequired = "";
		if(!empty($required)){
			$requiredArray = kswr_default_overlay_section($required);
			$dataRequired ='data-required="'.esc_attr($requiredArray).'"';
		}

		$positions = $this->values['positions'];
		$distance = $this->values['distance'];
		$defaults = ( is_array($this->values['default']) ) ? $this->values['default'] : array() ;      
		$arrayValues = array();
		$arrayValues['top'] = ( array_key_exists('top',$defaults) ) ? $defaults['top'] : '0px'; 
		$arrayValues['bottom'] = ( array_key_exists('bottom',$defaults) ) ? $defaults['bottom'] : '0px';
		$arrayValues['left'] = ( array_key_exists('left',$defaults) ) ? $defaults['left'] : '0px';
		$arrayValues['right'] = ( array_key_exists('right',$defaults) ) ? $defaults['right'] : '0px'; 
		$arrayValues['width'] = ( array_key_exists('width',$defaults) ) ? $defaults['width'] : '0px'; 
		$arrayValues['through'] = ( array_key_exists('through',$defaults) ) ? $defaults['through'] : '0px'; 
		
		$allDistances = explode(";", $this->values['value']);              
		
		$marginValue = '';        
		foreach($allDistances as $singleDistance ){
	        $actualDistance = explode(':',$singleDistance);
	        $actualPos = explode('-',$actualDistance[0]);

	        if(isset($actualPos[1]) && $distance.'-'.$actualPos[1] == $actualDistance[0])
	          $arrayValues[$actualPos[1]] = $actualDistance[1];          
	    }

	    $inputHtml = '';  $theValue = '';
	    foreach($positions as $key => $position){
	    	$inputHtml .= $key.' <input type="text" style="width:50px;padding:3px" data-distance-name="'.$distance.'" data-posdistance="'.$position.'" value="'.$arrayValues[$position].'" class="kswr-'.$distance.'-inputs" onkeyup="kswr_change_distanceinput(this);"/> &nbsp;&nbsp;';
	        $theValue .=  $distance.'-'.$position.':'.$arrayValues[$position].';';
		}

	    $output .= '<div class="ultimate-margins">
	            <input type="hidden" id="'.esc_attr($name).'" name="'.$this->values['name'].'" class="kswr-'.$distance.'-value '.$this->values['name'].'" value="'.$theValue.'" />';
	    $output .= $inputHtml;      
	    $output .= '</div>';
	      

		return '<div class="kmb-elem-attr" '.$dataRequired.'>
					<div class="kmb-elem-attr-name-desc">
						<h4>'.$title.'</h4>
						<span>'.$description.'</span>
					</div>
					<div class="kmb-elem-attr-input">
						'.$output.'
					</div>
				</div>';

	}
}

?>