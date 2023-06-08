<?php 

class kswr_global_section{

	function __construct($name = '', $id = '', $elements = '', $tabsname = array(), $sections = array()){		
		$this->name = $name ;
		$this->id = $id ;
		$this->elements = $elements ;
		$this->sections = $sections ;
		$this->tabsname = $tabsname ;
	}

	function render($inputs){
		$output = '';
		foreach ($inputs as $elem) {
			if($elem['type'] == 'text'){
				$text = new kswr_default_text($elem['values']);
				$output .= $text->render(); 
			}
			if($elem['type'] == 'textarea'){
				$textarea = new kswr_default_textarea($elem['values']);
				$output .= $textarea->render(); 
			}
			if($elem['type'] == 'uploader'){
				$uploader = new kswr_default_uploader($elem['values']);
				$output .= $uploader->render(); 
			}
			if($elem['type'] == 'uploader_multiple'){
				$uploader_multiple = new kswr_default_uploader_multiple($elem['values']);
				$output .= $uploader_multiple->render(); 
			}
			if($elem['type'] == 'colorpicker'){
				$colorpicker = new kswr_default_colorpicker($elem['values']);
				$output .= $colorpicker->render(); 
			}
			if($elem['type'] == 'gradientpicker'){
				$gradientpicker = new kswr_default_gradientpicker($elem['values']);
				$output .= $gradientpicker->render(); 
			}
			if($elem['type'] == 'switcher'){
				$switcher = new kswr_default_switcher($elem['values']);
				$output .= $switcher->render(); 
			}
			if($elem['type'] == 'number'){
				$number = new kswr_default_number($elem['values']);
				$output .= $number->render(); 
			}
			if($elem['type'] == 'select'){
				$select = new kswr_default_select($elem['values']);
				$output .= $select->render(); 
			}			
			if($elem['type'] == 'message'){
				$message = new kswr_default_message($elem['values']);
				$output .= $message->render(); 
			}
			if($elem['type'] == 'distance'){
				$distance = new kswr_default_distance($elem['values']);
				$output .= $distance->render(); 
			}					
			if($elem['type'] == 'slider'){
				$slider = new kswr_default_slider($elem['values']);
				$output .= $slider->render(); 
			}		
			if($elem['type'] == 'fontsize'){
				$fontsize = new kswr_default_fontsize($elem['values']);
				$output .= $fontsize->render(); 
			}	
			if($elem['type'] == 'fontstyle'){
				$fontstyle = new kswr_default_fontstyle($elem['values']);
				$output .= $fontstyle->render(); 
			}	
			if($elem['type'] == 'border'){
				$border = new kswr_default_border($elem['values']);
				$output .= $border->render(); 
			}				
					
		}

		echo $output;
	}


	//function to start the edit default section
	function create_maker(){
	?>
	<div class="kswr-shortcode-styling-section" data-situation="hidden" data-id="<?php echo $this->id; ?>">
		<div class="kswr-shortcode-styling-title" >
			<span><?php echo $this->name; ?></span>
			<div class="kswr-shortcode-showbtn"></div>
		</div>
				
		<div class="kswr-shortcode-styling-bottom">
			<div class="kswr-shortcode-styling-tabs">
		<?php foreach ($this->tabsname as $tab) { ?>
				<div class="kswr-shortcode-styling-tab" onclick="kswr_show_form_section(this);" data-tabid="<?php echo $tab['id']; ?>" data-situation="<?php echo $tab['situation']; ?>"><?php echo $tab['name']; ?></div>
		<?php } ?>
			</div>	
		<?php foreach ($this->sections as $section) { ?>
			<div class="kswr-shortcode-styling-form" data-tabid="<?php echo $section['id']; ?>" data-situation="<?php echo $section['situation']; ?>">
					<?php $this->render($section['form']);  ?>
			</div>
		<?php } ?>			
		<div class="kswr-shortcode-styling-submit">
			<div data-id="<?php echo $this->id; ?>" data-elements="<?php echo $this->elements; ?>" class="kswr-shortcode-styling-submit-btn btn-submit-blue" onclick="kswr_save_shortcode_styling(this);">Save Changes</div>
			<div class="kswr-shortcode-styling-cancel-btn" onclick="kswr_hide_shortcode_styling();">Cancel</div>
		</div>
		</div>		

	</div>
		<?php 
	}



}	

?>