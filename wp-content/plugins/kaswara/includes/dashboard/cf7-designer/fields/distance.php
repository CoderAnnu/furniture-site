<?php 
//Distance Field
class kaswara_field_distance{
	function __construct($values = array()){
		$this->values = $values;
	}
	function render(){
		$element = '';		
		$title = (isset($this->values['title'])) ? $this->values['title'] : 'No Title is given';
		$description = (isset($this->values['description'])) ? $this->values['description'] : 'No Description is given';		
		//Selector Css (Margin / Padding / Border)
		$type = (isset($this->values['selector'])) ? $this->values['selector'] : 'margin';		
		$value = $this->values['value'] ;
		$default =  $this->values['default'];

		$defaults = array(				
			'left' => (isset($default['left'])) ? $default['left'] : '0px' ,
			'right' => (isset($default['right'])) ? $default['right'] : '0px' , 
			'top' => (isset($default['top'])) ? $default['top'] : '0px' ,
			'bottom' => (isset($default['bottom'])) ? $default['bottom'] : '0px' ,

		);

		$options_output = '';
		
		$values = array(
			'left' => ( isset($value[$type.'-left']) ) ? $value[$type.'-left'] : $defaults['left'] ,
			'right' => ( isset($value[$type.'-right']) ) ? $value[$type.'-right'] : $defaults['right'] , 
			'top' => ( isset($value[$type.'-top']) ) ? $value[$type.'-top'] : $defaults['top'] ,
			'bottom' => ( isset($value[$type.'-bottom']) ) ? $value[$type.'-bottom'] : $defaults['bottom'] ,
		);

			

		$element = '';
		$element .= (isset($this->values['left']) && $this->values['left'] == false) ? '' : '<div class="km-dis-con"><i class="fa fa-arrow-left"></i><input type="number" value="'.str_replace('px','',$values['left']).'" min="0" onchange="changeNumberDistance(this);"><input type="hidden" value="'.esc_attr($values['left']).'" class="distance_input" ></div>';
		$element .= (isset($this->values['right']) && $this->values['right'] == false) ? '' : '<div class="km-dis-con"><i class="fa fa-arrow-right"></i><input type="number" value="'.str_replace('px','',$values['right']).'" min="0" onchange="changeNumberDistance(this);"><input type="hidden" value="'.esc_attr($values['right']).'" class="distance_input" ></div>';
		$element .= (isset($this->values['top']) && $this->values['top'] == false) ? '' : '<div class="km-dis-con"><i class="fa fa-arrow-up"></i><input type="number" value="'.str_replace('px','',$values['top']).'" min="0" onchange="changeNumberDistance(this);"><input type="hidden" value="'.esc_attr($values['top']).'" class="distance_input"></div>';
		$element .= (isset($this->values['bottom']) && $this->values['bottom'] == false) ? '' : '<div class="km-dis-con"><i class="fa fa-arrow-down"></i><input type="number" value="'.str_replace('px','',$values['bottom']).'" min="0" onchange="changeNumberDistance(this);"><input type="hidden" value="'.esc_attr($values['bottom']).'" class="distance_input"></div>';


		if($type == 'border'){
			$defaults['border-color'] = (isset($default['border-color'])) ? $default['border-color'] : ''; 	
			$defaults['border-style'] = (isset($default['border-style'])) ? $default['border-style'] : ''; 	
			
			$values['border-color'] =( isset($value['border-color']) ) ? $value['border-color'] : $defaults['border-color'] ;			
			$values['border-style'] =( isset($value['border-style']) ) ? $value['border-style'] : $defaults['border-style'] ;
			
			$options = array(
				'solid' => 'Solid',
				'dashed' => 'Dashed',
				'dotted' => 'Dotted',
				'double' => 'Double',
				'none' => 'None',						
			) ;

			$options_output .= '<option value="'.$values['border-style'].'">'.ucfirst($values['border-style']).'</option>';
			foreach ($options as $key => $val) {
				$options_output .= '<option value="'.$key.'">'.ucfirst($val).'</option>';
			}
			$element .=	'<div class="kmcf7-colorp-border" style="width:100%; float:left"><select class="kmb-row-back-type full-select full-select-small" >'.
						$options_output
					.'</select>';

			$element .= '<div class="kmb-elem-attr-color  kmb-elem-attr-color-small">
							<input type="text" class="form-control color-picker " value="'.esc_attr($values['border-color']).'" />					
						</div></div>';

		}


		
		return kaswaracf7_print_field_section($title, $description, $element);			
	}

}

?>