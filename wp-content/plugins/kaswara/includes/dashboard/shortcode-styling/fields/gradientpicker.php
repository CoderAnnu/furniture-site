<?php 

/**
* This is the text input for the Admin Panel You can call it using this construct class
* 
*/
class kswr_default_gradientpicker{
	
	function __construct($values = array()){
		$this->values = $values;
	}

	function render(){
		$class = (isset($this->values['class'])) ? $this->values['class'] : '';
		$value = (isset($this->values['value']) && $this->values['value'] != "" ) ? $this->values['value'] : $this->values['default'];		
		$title = (isset($this->values['title'])) ? $this->values['title'] : '';
		$description = (isset($this->values['description'])) ? $this->values['description'] : '';
		$name = (isset($this->values['name'])) ? $this->values['name'] : '';
		$display = '';
		$color1 = $color2 = $typeOptions = $gradientOptions =  '';
	    $type = 'color'; $direction = 'to bottom';

	    if($value != ''){
	      $theValues = json_decode($value,true);
	      $type = $theValues['type']; $direction = $theValues['direction']; $color1 = $theValues['color1']; $color2 = $theValues['color2']; 
	    }

	    $typesArray = array('color' => 'Single Color','gradient' => 'Gradient');
	    $gradientsArray = array('to bottom' => 'To Bottom','to left' => 'To Left', 'to right' => 'To Right', 'to top'=>'To Top' , 'to top left'=>'To Top Left' ,  'to top right'=>'To Top Right' , 'to bottom left'=>'To Bottom Left' , 'to bottom right'=>'To Bottom Right' );

	    foreach ($typesArray as $key => $theRName) {
	       $is = '';  if($type == $key) $is = 'selected'; 
	       $typeOptions .= '<option value="'.$key.'" '.$is.'>'.$theRName.'</option>';
	    }
	     foreach ($gradientsArray as $key => $theRName) {
	       $is = '';  if($direction == $key) $is = 'selected'; 
	       $gradientOptions .= '<option value="'.$key.'" '.$is.'>'.$theRName.'</option>';
	    }

		$required = (isset($this->values['required'])) ? $this->values['required'] :  array();	
		$dataRequired = "";
		if(!empty($required)){
			$requiredArray = kswr_default_overlay_section($required);
			$dataRequired ='data-required="'.esc_attr($requiredArray).'"';
		}
		if( $type  == 'color') $display = 'none';
		return '<div class="kmb-elem-attr" '.$dataRequired.'>
				<div class="kmb-elem-attr-name-desc">
					<h4>'.$title.'</h4>
					<span>'.$description.'</span>
				</div>
				<div class="kmb-elem-attr-input">
					<div class="kswr-gradient-chooser"><input type="hidden" class="wpb_vc_param_value kswr-ch-gradient-value wpb-textinput qty text"  size="4" id="'.esc_attr($name).'"  name="'.esc_attr($name).'" value="'. esc_attr( $value ) .'"   /><div class="kswr-ch-gradient-left kswr-ch-gradient-section"><div class="kswr-grad-ch-s"><span>'.esc_html__('Type','kaswara').'</span><select class="kswr-ch-grad-type" onchange="kswr_change_gradient(this);" data-name="type">'.$typeOptions.'</select></div><div class="kswr-grad-ch-s"><span>'.esc_html__('Color 1','kaswara').'</span>
                    <input type="text" class="kswr-ch-gradient-color kswr-ch-gradient-color1 color-picker" data-type="gradient" data-name="color1" value="'.$color1.'" /></div></div>
                  <div class="kswr-ch-gradient-right kswr-ch-gradient-section" style="display:'.$display.';"><div class="kswr-grad-ch-s"><span>'.esc_html__('Color 2','kaswara').'</span><input type="text" class="kswr-ch-gradient-color kswr-ch-gradient-color2 color-picker" data-type="gradient" data-name="color2" value="'.$color2.'"/></div><div class="kswr-grad-ch-s"><span>'.esc_html__('Direction','kaswara').'</span><select class="kswr-ch-grad-type" onchange="kswr_change_gradient(this);" data-name="direction">'.$gradientOptions.'</select></div></div></div>
				</div>
			</div>';

	}
}

?>