<?php 

/**
* This is the Border for the Admin Panel You can call it using this construct class
* 
*/
class kswr_default_border{
	
	function __construct($values = array()){
		$this->values = $values;
	}

	function render(){		
		$class = (isset($this->values['class'])) ? $this->values['class'] : '';
		$value = $this->values['value'];
		$title = (isset($this->values['title'])) ? $this->values['title'] : '';
		$description = (isset($this->values['description'])) ? $this->values['description'] : '';
		$name = (isset($this->values['name'])) ? $this->values['name'] : '';
		$required = (isset($this->values['required'])) ? $this->values['required'] :  array();	
		$bordergradient = (isset($this->values['bordergradient'])) ? $this->values['bordergradient'] :  'disable';	
	
		$thevalues = array('borderwidth' =>'','bordercolor1'	=> '','borderstyle'	=> '','bordergradientdirection' => '','bordercolor2'	=> '');
		$dataRequired = "";
		if(!empty($required)){
			$requiredArray = kswr_default_overlay_section($required);
			$dataRequired ='data-required="'.esc_attr($requiredArray).'"';
		}


		$output = $borderwidth = $bordercolor1 = $bordercolor2 =  $borderStylesOutput = $dependency = $gradientOptions = $gradientOutput = '';
	     $borderstyle = $bordergradientdirection = 'none'; 

	    if($value != ''){
		    $thevalues = json_decode($value,true);	
 		    $borderwidth = $thevalues['borderwidth']; 
 		    $bordercolor1 = $thevalues['bordercolor1']; $borderstyle = $thevalues['borderstyle']; 
	    }
	  
	    $gradientsArray =  array('none' => 'None', 'to bottom' => 'To Bottom','to left' => 'To Left', 'to right' => 'To Right', 'to top'=>'To Top' , 'to top left'=>'To Top Left' ,  'to top right'=>'To Top Right' , 'to bottom left'=>'To Bottom Left' , 'to bottom right'=>'To Bottom Right' );

	     $borderSyles = array('none','solid','dashed','dotted','ridge','outset');
	     $borderStylesOutput .= '<div class="kswr-grad-ch-s"><span>'.esc_html__('Style','kaswara').'</span><select class="kswr-bmaker-style" onchange="kswr_change_br(this)" data-name="borderstyle">';       
	     foreach ($borderSyles as $bStyle) {
	        $isSelected = '';
	        if($bStyle == $borderstyle) $isSelected = 'selected';
	        $borderStylesOutput .= '<option value="'.esc_attr($bStyle).'" '.$isSelected.'>'.$bStyle.'</option>';
	     }
	     $borderStylesOutput .= '</select></div>';


	    if($bordergradient == 'enable'){
		      $gradientOutput .= '<div class="kswr-grad-elwi">';
		      $bordergradientdirection = $thevalues['bordergradientdirection']; $bordercolor2 = $thevalues['bordercolor2'];
		       $gradientOutput .= '<div class="kswr-grad-ch-s"><span>'.esc_html__('Gradient','kaswara').'</span><select class="kswr-bmaker-gradient" onchange="kswr_change_br(this)" data-name="bordergradientdirection">';            
		        foreach ($gradientsArray as $key => $theRName) {
		           $is = '';  if($bordergradientdirection == $key) $is = 'selected'; 
		           $gradientOutput .= '<option value="'.esc_attr($key).'" '.$is.'>'.$theRName.'</option>';
		        }
		       $gradientOutput .= '</select></div>';
		       $disp = 'none';
		       if($bordergradientdirection != 'none') $disp = 'block';
		       $gradientOutput .= '<div style="display:'.$disp.';" class="kswr-grad-ch-s borderthecolor2"><span>'.esc_html__('Color 2','kaswara').'</span><input type="text" class="kswr-bmaker-color color-picker" data-type="border" data-name="bordercolor2" value="'.$bordercolor2.'"  /></div>' ;                                    
	      	$gradientOutput .= '</div>';
	     }


	    $output = '<div class="vc-kswr-border-maker">
                 <input type="hidden" id="'.esc_attr($name).'" name="'.esc_attr($name).'" class="wpb_vc_param_value kswr-bmaker-value" value="'.esc_attr($value).'" />
                    <div class="kswr-grad-ch-s"><span>'.esc_html__('Size','kaswara').'</span><input type="text" class="kswr-bmaker-width" value="'.$borderwidth.'" onkeyup="kswr_change_br(this)" data-name="borderwidth" /></div>'.$borderStylesOutput.
                    '<div class="kswr-grad-ch-s"><span>'.esc_html__('Color','kaswara').'</span><input type="text" class="kswr-bmaker-color color-picker" data-type="border" data-name="bordercolor1" value="'.$bordercolor1.'"  /></div> 
                    '.$gradientOutput.'                                     
                </div>';


	    return '<div class="kmb-elem-attr" '.esc_attr($dataRequired).'>
				<div class="kmb-elem-attr-name-desc">
					<h4>'.$title.'</h4>
					<span>'.$description.'</span>
				</div>
				<div class="kmb-elem-attr-input">'.$output.'</div>
			</div>';           
	}
	
}

?>