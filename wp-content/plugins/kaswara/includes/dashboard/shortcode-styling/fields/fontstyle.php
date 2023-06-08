<?php 
/**
* This is the text input for the Admin Panel You can call it using this construct class
* 
*/
class kswr_default_fontstyle{
	function __construct($values = array()){
		$this->values = $values;
	}
	

	function render(){	
		$output = $outputElements = '';
    	$elements = $this->values['elements'];
      	$defaults = ( is_array($this->values['defaults']) ) ? $this->values['defaults'] : array() ;
     	$title = (isset($this->values['title'])) ? $this->values['title'] : '';
		$description = (isset($this->values['description'])) ? $this->values['description'] : '';
		$name = (isset($this->values['name'])) ? $this->values['name'] : '';


		$arrayValues = array();
		$arrayValues['font-weight'] = ( array_key_exists('font-weight',$defaults) ) ? $defaults['font-weight'] : ''; 
		$arrayValues['font-style'] = ( array_key_exists('font-style',$defaults) ) ? $defaults['font-style'] : '';
		$arrayValues['font-family'] = ( array_key_exists('font-family',$defaults) ) ? $defaults['font-family'] : '';
		
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
		  $outputElements .= '<div class="sy-fonts-elem"><span>'.$elemName.'</span>
		      <select data-name="'.$elemValue.'" value="'.$arrayValues[$elemValue].'" onchange="kswr_change_fontinput(this);" onkeyup="kswr_change_fontinput(this);">';
		      foreach (kswr_get_font_options_arrays($elemValue) as $key => $value) {
		        if($arrayValues[$elemValue] == $value)
		         $outputElements .= '<option value="'.$value.'" selected>'.$value.'</option>';
		        else
		         $outputElements .= '<option value="'.$value.'">'.$value.'</option>';

		      }      
		        
		  $outputElements .= '</select></div>';
		    if($arrayValues[$elemValue] != '')
		            $theValue .= $elemValue.':'.$arrayValues[$elemValue].';';          
		  
		  }
   $output .= '<div class="sy-fonts-container" >'.$outputElements.
        '<input type="hidden" name="'.$name.'" id="'.esc_attr($name).'" class="wpb_vc_param_value kswr-fonts-value '.$name.'" value="'.$theValue.'" />';
      $output .='</div>';

		return '<div class="kmb-elem-attr" '.$dataRequired.'>
				<div class="kmb-elem-attr-name-desc kmb-elem-attr-name-desc-font">
					<h4>'.$title.'</h4>
					<span>'.$description.'</span>
				</div>
				<div class="kmb-elem-attr-input kmb-elem-attr-fstyle ">'.$output.'</div>
			</div>';

	}
}

?>