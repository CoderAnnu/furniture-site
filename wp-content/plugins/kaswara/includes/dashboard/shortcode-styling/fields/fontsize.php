<?php 
/**
* This is the text input for the Admin Panel You can call it using this construct class
* 
*/
class kswr_default_fontsize{
	function __construct($values = array()){
		$this->values = $values;
	}
	

	function render(){	
		 $output = $outputElements = '';
		  $elements = $this->values['elements'];
		  $defaults = ( is_array($this->values['defaults']) ) ? $this->values['defaults'] : array() ;
		  $arrayValues = array();
		  $arrayValues['font-size'] = ( array_key_exists('font-size',$defaults) ) ? $defaults['font-size'] : ''; 
		  $arrayValues['letter-spacing'] = ( array_key_exists('letter-spacing',$defaults) ) ? $defaults['letter-spacing'] : '';
		  $arrayValues['line-height'] = ( array_key_exists('line-height',$defaults) ) ? $defaults['line-height'] : '';     
		  $arrayValues['--tablet-font-size'] = ( array_key_exists('--tablet-font-size',$defaults) ) ? $defaults['--tablet-font-size'] : '';
		  $arrayValues['--phone-font-size'] = ( array_key_exists('--phone-font-size',$defaults) ) ? $defaults['--phone-font-size'] : '';	
     	
     	$title = (isset($this->values['title'])) ? $this->values['title'] : '';
		$description = (isset($this->values['description'])) ? $this->values['description'] : '';
		$name = (isset($this->values['name'])) ? $this->values['name'] : '';

		$required = (isset($this->values['required'])) ? $this->values['required'] :  array();	
		$dataRequired = "";
		if(!empty($required)){
			$requiredArray = kswr_default_overlay_section($required);
			$dataRequired ='data-required="'.esc_attr($requiredArray).'"';
		}
		$realValues = explode(";", $this->values['value']); 
	    foreach($realValues as $singleValue ){
	      $actualValueName = explode(":",$singleValue);
	      if(isset($actualValueName[1]))
	     	 $arrayValues[$actualValueName[0]] = $actualValueName[1]; 
	    }
	    //Starts The Output of The Element
	    $theValue = '';
	    foreach($elements as $elemName => $elemValue){
	        $outputElements .= '<div class="sy-fonts-elem"><span>'.$elemName.'</span><input type="text" data-name="'.$elemValue.'" value="'.$arrayValues[$elemValue].'" onchange="kswr_change_fontinput(this);" onkeyup="kswr_change_fontinput(this);" /></div>';
	        if($arrayValues[$elemValue] != '')
	          $theValue .= $elemValue.':'.$arrayValues[$elemValue].';';          
	    }
	    $output .= '<div class="sy-fonts-container"><div class="sy-fonts-info">'.__('Add (px, em, pt)','kaswwara').'</div> '.$outputElements.
	        '<input type="hidden" name="'.$this->values['name'].'" id="'.esc_attr($name).'" class="kswr-fonts-value '.$this->values['name'].'" value="'.$theValue.'" />';
	    $output .='</div>';
	    

		return '<div class="kmb-elem-attr" '.$dataRequired.'>
				<div class="kmb-elem-attr-name-desc kmb-elem-attr-name-desc-font">
					<h4>'.$title.'</h4>
					<span>'.$description.'</span>
				</div>
				<div class="kmb-elem-attr-input kmb-elem-attr-fsize">'.$output.'</div>
			</div>';

	}
}

?>