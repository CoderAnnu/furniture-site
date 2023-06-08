<?php 
class Kaswara_row_background{
	function __construct(){	
		add_action('admin_init',array($this,'kaswara_row_background_init'));
		add_filter('vc_shortcode_output',array($this, 'kaswara_row_background_execute'),10,3);
	}
	function kaswara_row_background_execute($output, $obj, $attr) {
		if($obj->settings('base')=='vc_row' || $obj->settings('base')=='vc_row_inner') {
			$output .= $this->kaswara_row_background_printer($attr, '');
		}
		return $output;
	}

	public static function kaswara_row_background_printer($atts, $content){
		extract( shortcode_atts( array(
				'row_css_array'						=> '',
				'kswr_presponsive'					=>'kswr_pnone',
				'kswr_mresponsive'					=>'kswr_mnone',
				'kswr_bresponsive'					=>'kswr_bnone',
				'kswr_row_sep_enabled'				=>'off',
				'kswr_row_sep_height'				=>'100',
				'kswr_row_sep_width'				=>'1',
				'kswr_row_sep_color'				=>'#444',
				'kswr_row_sep_position'				=>'bottom',
				'kswr_row_sep_bottom_align'			=>'center',
				'kswr_row_sep_top_align'			=>'center',
				'kswr_row_bg_type'					=>'none',
				'kswr_row_bg_color'					=>'{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
				'kswr_row_bg_image'					=>'',
				'kswr_row_bg_image_img'				=>'',
				'kswr_row_parallax_type'			=>'fixed',
				'kswr_row_parallax_speed'			=>'0.3',
				'kswr_row_parallax_autospeed'		=>'75',
				'kswr_row_parallax_hor_moveto'		=>'left',
				'kswr_row_parallax_ver_moveto'		=>'top',	
				'kswr_row_bottom_decor_enabled'  	=> 'false',
				'kswr_row_bottom_decor_type'  		=> 'full-to-right',
				'kswr_row_bottom_decor_color'  		=> '#fff',
				'kswr_row_bottom_decor_size'		=> 'medium',
				'kswr_row_top_decor_enabled' 	 	=> 'false',
				'kswr_row_top_decor_type' 	 		=> 'full-to-right',
				'kswr_row_top_decor_color' 	 		=> '#fff',
				'kswr_row_top_decor_size'			=> 'medium',

			), $atts ) );
		$output = '';
		$kswrBackArray = array(
			'kswr_presponsive' =>$kswr_presponsive,
			'kswr_mresponsive' =>$kswr_mresponsive,
			'kswr_bresponsive' =>$kswr_bresponsive,
			'kswr_row_sep_enabled' =>$kswr_row_sep_enabled,
			'kswr_row_sep_height' =>$kswr_row_sep_height,
			'kswr_row_sep_width' =>$kswr_row_sep_width,
			'kswr_row_sep_color' =>$kswr_row_sep_color,
			'kswr_row_sep_position' =>$kswr_row_sep_position,
			'kswr_row_sep_bottom_align' =>$kswr_row_sep_bottom_align,
			'kswr_row_sep_top_align' =>$kswr_row_sep_top_align,
			'kswr_row_bg_type'	=>	$kswr_row_bg_type,
			'kswr_row_bg_color'	=>	$kswr_row_bg_color,
			'kswr_row_bg_image'	=>	$kswr_row_bg_image,
			'kswr_row_bg_image_img'	=> $kswr_row_bg_image_img,
			'kswr_row_parallax_type'	=>	$kswr_row_parallax_type,
			'kswr_row_parallax_speed'	=>	$kswr_row_parallax_speed,
			'kswr_row_parallax_autospeed'	=>	$kswr_row_parallax_autospeed,
			'kswr_row_parallax_hor_moveto'	=>	$kswr_row_parallax_hor_moveto,
			'kswr_row_parallax_ver_moveto'	=> $kswr_row_parallax_ver_moveto,
			'kswr_row_bottom_decor_enabled'	=>	$kswr_row_bottom_decor_enabled,
			'kswr_row_bottom_decor_type'	=>	$kswr_row_bottom_decor_type,
			'kswr_row_bottom_decor_size'	=>	$kswr_row_bottom_decor_size,
			'kswr_row_bottom_decor_color'	=>	$kswr_row_bottom_decor_color,
			'kswr_row_top_decor_enabled'	=>	$kswr_row_top_decor_enabled,
			'kswr_row_top_decor_type'	=>	$kswr_row_top_decor_type,
			'kswr_row_top_decor_size'	=>	$kswr_row_top_decor_size,
			'kswr_row_top_decor_color'	=>	$kswr_row_top_decor_color,
		);
		$backgroundKaswara = kswr_row_background_maker_row($kswrBackArray);
		$output .= $backgroundKaswara ;		
		return $output;
	}

	function kaswara_row_background_init(){
		//Custom ROW & COLUMNS Params for Kaswara Plugin
		$responsive_options_padding = array(
		    esc_html__( 'None', 'kaswara' ) => 'kswr_pnone',
		    esc_html__( 'Remove Padding Left', 'kaswara' ) => 'kswr_rm_pleft',
		    esc_html__( 'Remove Padding Right', 'kaswara' ) => 'kswr_rm_pright',
		    esc_html__( 'Remove Padding Left - Right', 'kaswara' ) => 'kswr_rm_pall'   
		);
		$responsive_options_margin = array(
		    esc_html__( 'None', 'kaswara' ) => 'kswr_mnone',
		    esc_html__( 'Remove Margin Left', 'kaswara' ) => 'kswr_rm_mleft',
		    esc_html__( 'Remove Margin Right', 'kaswara' ) => 'kswr_rm_mright',
		    esc_html__( 'Remove Margin Left - Right', 'kaswara' ) => 'kswr_rm_mall',   
		);
		$responsive_options_border = array(
		    esc_html__( 'None', 'kaswara' ) => 'kswr_bnone',
		    esc_html__( 'Remove Border Left', 'kaswara' ) => 'kswr_rm_bleft',
		    esc_html__( 'Remove Border Right', 'kaswara' ) => 'kswr_rm_bright',
		    esc_html__( 'Remove Border Left - Right', 'kaswara' ) => 'kswr_rm_ball',
		);
		$attributes_padding = array(
		    'type'          => 'dropdown',
		    'heading'       => esc_html__('Responsive Paddings Action','kaswara'),
		    'param_name'    => 'kswr_presponsive',
		    'group'         => 'Kaswara',
		    'value'         => $responsive_options_padding
		);
		$attributes_margin = array(
		    'type'          => 'dropdown',
		    'heading'       => esc_html__('Responsive Margins Action','kaswara'),
		    'param_name'    => 'kswr_mresponsive',
		    'group'         => 'Kaswara',
		    'value'         => $responsive_options_margin
		);
		$attributes_border = array(
		    'type'          => 'dropdown',
		    'heading'       => esc_html__('Responsive Borders Action','kaswara'),
		    'param_name'    => 'kswr_bresponsive',
		    'group'         => 'Kaswara',
		    'value'         => $responsive_options_border
		);
		//Row Vertical Line Seperator
		$attributes_line_separator = array(
		    array(
		       "type" => "dropdown",
		        "heading" => esc_html__( 'Enable Vertical Line Separator','kaswara'),
		        "param_name" => "kswr_row_sep_enabled",           
		        "value" => array(
		                "No" => "off",
		                "Yes" => "on",
		            ),                
		    ),
		    array(
		        "type" => "kswr_number",
		        "value" => 100,
		        "heading" => esc_html__( "Vertical Line Separator Height (px)", "kaswara" ),
		        "dependency" => Array("element" => "kswr_row_sep_enabled","value" => "on"), 
		        "param_name" => "kswr_row_sep_height"
		    ),    
		    array(
		        "type" => "kswr_number",
		        "value" => 1,
		        "heading" => esc_html__( "Vertical Line Separator Width (px)", "kaswara" ),
		        "dependency" => Array("element" => "kswr_row_sep_enabled","value" => "on"), 
		        "param_name" => "kswr_row_sep_width"
		    ),    
		    array(
		        "type" => "colorpicker",
		        "value" => "#444",
		        "dependency" => Array("element" => "kswr_row_sep_enabled","value" => "on"),        
		        "heading" => esc_html__( "Vertical Line Separator Color", "kaswara" ),
		        "param_name" => "kswr_row_sep_color"
		    ),
		    array(
		       "type" => "dropdown",
		        "heading" => esc_html__( 'Vertical Line Separator Position','kaswara'),
		        "param_name" => "kswr_row_sep_position",          
		        "dependency" => Array("element" => "kswr_row_sep_enabled","value" => "on"),   
		        "value" => array(
		            "Bottom" => "bottom",
		            "Top" => "top",
		            "Both" => "both",
		        ),                
		    ),
		     array(
		       "type" => "dropdown",
		        "heading" => esc_html__( 'Bottom Seperator Align','kaswara'),
		        "param_name" => "kswr_row_sep_bottom_align",          
		        "dependency" => Array("element" => "kswr_row_sep_enabled","value" => "on"),   
		        "value" => array(
		            "Center" => "center",
		            "Left" => "left",
		            "Right" => "right",
		        ),                
		    ),
		    array(
		       "type" => "dropdown",
		        "heading" => esc_html__( 'Top Seperator Align','kaswara'),
		        "param_name" => "kswr_row_sep_top_align",          
		        "dependency" => Array("element" => "kswr_row_sep_enabled","value" => "on"),   
		        "value" => array(
		            "Center" => "center",
		            "Left" => "left",
		            "Right" => "right",
		        ),                
		    )
		);

		$attributes_deco  = array(
			array(
                "type" => "kswr_message",
                "group" => "Kaswara",
                "title" => esc_html__( "Row Decoration Top", "kaswara" ), 
                "param_name" => "kswr_row_top_decor_message",
                "mtop" => "10px"
            ),
			array(
                "type" => "kswr_switcher",
                "group" => "Kaswara", 
                "heading" => esc_html__( "Enable Row Decoration Top", "kaswara" ),
                "param_name" => "kswr_row_top_decor_enabled",
                'default' => 'false',
                'on' => array('text' => 'ON','val' => 'true' ),
                'off'=> array('text' => 'OFF','val' => 'false') 
            ), 		    
		    array(
		       "type" => "dropdown",
		        "heading" => esc_html__( 'Row Decoration Type','kaswara'),
		        "group" => "Kaswara",
		        "dependency" => Array("element" => "kswr_row_top_decor_enabled","value" => array("true")),                    		        
		        "param_name" => "kswr_row_top_decor_type",           
		        "value" => array(		       
		            esc_html__('Full to Right', 'kaswara') => 'full-to-right',    		            
		            esc_html__('Full to Left', 'kaswara') => 'full-to-left',    		            
		            esc_html__('Middle Right', 'kaswara') => 'middle-right',    		            
		            esc_html__('Middle Left', 'kaswara') => 'middle-left',    		            
		            esc_html__('Both Sides Inside', 'kaswara') => 'both-side-inside',    		            
		            esc_html__('Both Sides Outside', 'kaswara') => 'both-side-outside',    		            
		        ),                
		    ),
		     array(
                "type" => "colorpicker",
                "group" => "Kaswara",
		        "dependency" => Array("element" => "kswr_row_top_decor_enabled","value" => array("true")),               
                "value" => "#fff",
                "heading" => esc_html__( "Background Color", "kaswara" ),
                "param_name" => "kswr_row_top_decor_color"
            ),
		     array(
		       "type" => "dropdown",
		        "heading" => esc_html__( 'Row Decoration Size','kaswara'),
		        "group" => "Kaswara",
		        "dependency" => Array("element" => "kswr_row_top_decor_enabled","value" => array("true")),                    		        
		        "param_name" => "kswr_row_top_decor_size",           
		        "value" => array(
		            esc_html__('Medium', 'kaswara') => 'medium',    		            		          
		            esc_html__('Small', 'kaswara') => 'small',    		            
		            esc_html__('Larg', 'kaswara') => 'large',    		            
		        ),                
		    ),
		     array(
                "type" => "kswr_message",
                "group" => "Kaswara",
                "title" => esc_html__( "Row Decoration bottom", "kaswara" ), 
                "param_name" => "kswr_row_bottom_decor_message",
                "mtop" => "10px"
            ),
			array(
                "type" => "kswr_switcher",
                "group" => "Kaswara", 
                "heading" => esc_html__( "Enable Row Decoration bottom", "kaswara" ),
                "param_name" => "kswr_row_bottom_decor_enabled",
                'default' => 'false',
                'on' => array('text' => 'ON','val' => 'true' ),
                'off'=> array('text' => 'OFF','val' => 'false') 
            ), 		    
		    array(
		       "type" => "dropdown",
		        "heading" => esc_html__( 'Row Decoration Type','kaswara'),
		        "group" => "Kaswara",
		        "dependency" => Array("element" => "kswr_row_bottom_decor_enabled","value" => array("true")),                    		        
		        "param_name" => "kswr_row_bottom_decor_type",           
		        "value" => array(		          
		            esc_html__('Full to Right', 'kaswara') => 'full-to-right',    		            
		            esc_html__('Full to Left', 'kaswara') => 'full-to-left',    		            
		            esc_html__('Middle Right', 'kaswara') => 'middle-right',    		            
		            esc_html__('Middle Left', 'kaswara') => 'middle-left',    		            
		            esc_html__('Both Sides Inside', 'kaswara') => 'both-side-inside',    		            
		            esc_html__('Both Sides Outside', 'kaswara') => 'both-side-outside',    		            
		        ),                
		    ),
		     array(
                "type" => "colorpicker",
                "group" => "Kaswara",
		        "dependency" => Array("element" => "kswr_row_bottom_decor_enabled","value" => array("true")),               
                "value" => "#fff",
                "heading" => esc_html__( "Background Color", "kaswara" ),
                "param_name" => "kswr_row_bottom_decor_color"
            ),
		     array(
		       "type" => "dropdown",
		        "heading" => esc_html__( 'Row Decoration Size','kaswara'),
		        "group" => "Kaswara",
		        "dependency" => Array("element" => "kswr_row_bottom_decor_enabled","value" => array("true")),                    		        
		        "param_name" => "kswr_row_bottom_decor_size",           
		        "value" => array(
		            esc_html__('Medium', 'kaswara') => 'medium',    		            		           
		            esc_html__('Small', 'kaswara') => 'small',    		            
		            esc_html__('Larg', 'kaswara') => 'large',    		            
		        ),                
		    ),
		    	



		);
		

		//Attributes for the row background
		$row_background_attr = array(
		    //Type of the Background
		    array(
		       "type" => "dropdown",
		        "heading" => esc_html__( 'Row Background Type','kaswara'),
		        "group" => "Kaswara",
		        "param_name" => "kswr_row_bg_type",           
		        "value" => array(
		            esc_html__('None', 'kaswara') => 'none',    
		            esc_html__('Background Color', 'kaswara') => 'color',    
		            esc_html__('Simple Image', 'kaswara') => 'simpleimage',    
		            esc_html__('Parallax Image', 'kaswara') => 'parallax',    		        
		        ),                
		    ),
		    //For Color
		    array(
		        "type" => "kswr_gradient",
		        "heading" => esc_html__( "Background Color", "kaswara" ),
		        "dependency" => Array("element" => "kswr_row_bg_type","value" => array("color")),                    
		        "value" => '{"type":"color", "color1":"transparent", "color2":"transparent", "direction":"to left"}',
		        "param_name" => "kswr_row_bg_color",            
		        "group" => "Kaswara",
		    ),  
		    //For Background Images
		    array(
		        "type" => "attach_image",
		        "dependency" => Array("element" => "kswr_row_bg_type","value" => array('simpleimage','parallax')),                         
		        'group' => 'Kaswara',
		        "heading" => esc_html__( "Upload Image", "kaswara" ),
		        "param_name" => "kswr_row_bg_image_img"
		    ),
		    array(
		        "type" => "kswr_background",
		        "group" => "Kaswara",
		        "heading" => esc_html__( "Background Image", "kaswara" ), 
		        "dependency" => Array("element" => "kswr_row_bg_type","value" => array('simpleimage','parallax')),                         
		        "param_name" => "kswr_row_bg_image",
		        "mtop" => "10px"
		    ),
		    //Parallax Type
		    array(
		       "type" => "dropdown",
		        "heading" => esc_html__( 'Parallax Type','kaswara'),
		        "group" => "Kaswara",
		        "dependency" => Array("element" => "kswr_row_bg_type","value" => array("parallax")),                    
		        "param_name" => "kswr_row_parallax_type",           
		        "value" => array(
		            esc_html__('Fixed', 'kaswara') => 'fixed',    
		            esc_html__('Vertical Parallax', 'kaswara') => 'vertical_prlx',    
		            esc_html__('Horizontal Parallax', 'kaswara') => 'horizontal_prlx',    
		            esc_html__('Auto Vertical Move', 'kaswara') => 'vertical_move',    
		            esc_html__('Auto Horizontal Move', 'kaswara') => 'horizontal_move',    
		            esc_html__('Mouse Follow', 'kaswara') => 'follow_mouse',                        
		        ),                
		    ),

		    array(
		        "type" => "kswr_number",          
		        "heading" => esc_html__( "Parallax Speed", "kaswara" ),
		        "dependency" => Array("element" => "kswr_row_parallax_type","value" => array("vertical_prlx","horizontal_prlx")),                    
		        'group' => 'Kaswara',
		        "param_name" => "kswr_row_parallax_speed",
		        "value" => 0.3,
		        "step" => 0.1,
		        "min" => 0,
		        "max" => 1
		    ),
		    array(
		        "type" => "kswr_number",          
		        "heading" => esc_html__( "Parallax Speed", "kaswara" ),
		        "dependency" => Array("element" => "kswr_row_parallax_type","value" => array("vertical_move","horizontal_move")),                    
		        'group' => 'Kaswara',
		        "param_name" => "kswr_row_parallax_autospeed",
		        "value" => 75,
		        "step" => 5,
		        "min" => 0,
		        "max" => 95
		    ),
		    array(
		       "type" => "dropdown",
		        "heading" => esc_html__( 'Move To ','kaswara'),
		        "group" => "Kaswara",
		        "dependency" => Array("element" => "kswr_row_parallax_type","value" => array("horizontal_move")),                    
		        "param_name" => "kswr_row_parallax_hor_moveto",           
		        "value" => array(
		            esc_html__('Left', 'kaswara') => 'left',    
		            esc_html__('Right', 'kaswara') => 'right',                                                
		        ),                
		    ),
		    array(
		       "type" => "dropdown",
		        "heading" => esc_html__( 'Move To ','kaswara'),
		        "group" => "Kaswara",
		        "dependency" => Array("element" => "kswr_row_parallax_type","value" => array("vertical_move")),                    
		        "param_name" => "kswr_row_parallax_ver_moveto",           
		        "value" => array(
		            esc_html__('Top', 'kaswara') => 'top',    
		            esc_html__('Bottom', 'kaswara') => 'bottom',                                                
		        ),                
		    ),
		);
		vc_add_params( 'vc_row', $row_background_attr );
		vc_add_params( 'vc_row', $attributes_line_separator );
		vc_add_param( 'vc_row', $attributes_padding );
		vc_add_param( 'vc_row', $attributes_border );
		vc_add_param( 'vc_row', $attributes_margin );
		vc_add_params( 'vc_row', $attributes_deco );
	
		vc_add_params( 'vc_row_inner', $row_background_attr );
		vc_add_param( 'vc_row_inner', $attributes_padding );
		vc_add_param( 'vc_row_inner', $attributes_border );
		vc_add_param( 'vc_row_inner', $attributes_margin );
	}

}
new Kaswara_row_background;
if ( !function_exists( 'kswr_theme_after_vc_row' ) ) {
	function kswr_theme_after_vc_row($atts, $content = null) {
		 return Kaswara_row_background::kaswara_row_background_printer($atts, $content);
	}
}
if ( !function_exists( 'kswr_theme_after_vc_row_inner' ) ) {
	function kswr_theme_after_vc_row_inner($atts, $content = null) {
		 return Kaswara_row_background::kaswara_row_background_printer($atts, $content);
	}
}

//Colum Classes

class Kaswara_column_settings{
	function __construct(){	
		add_action('admin_init',array($this,'kaswara_column_settings_init'));
		add_filter('vc_shortcode_output',array($this, 'kaswara_column_settings_execute'),10,3);
	}
	function kaswara_column_settings_execute($output, $obj, $attr) {
		if($obj->settings('base')=='vc_column' || $obj->settings('base')=='vc_column_inner') {
			$output .= $this->Kaswara_column_settings_printer($attr, '');
		}
		return $output;
	}
	public static function kaswara_column_settings_printer($atts, $content){
		$output = '';
		extract( shortcode_atts( array(				
			'kswr_presponsive'					=>'kswr_pnone',
			'kswr_mresponsive'					=>'kswr_mnone',
			'kswr_bresponsive'					=>'kswr_bnone',		
			'kswr_column_minheight_enable'		=> 'off',
			'kswr_column_minheight'				=> '0',																											
		), $atts ) );
		$output = '<div class="kswr-column-settings" data-minheight="'.esc_attr($kswr_column_minheight).'px" data-isminheight="'.esc_attr($kswr_column_minheight_enable).'" data-theclasses="'.esc_attr($kswr_presponsive).' '.esc_attr($kswr_mresponsive).' '.esc_attr($kswr_bresponsive).'"></div>';	
		return $output;
	}

	function kaswara_column_settings_init(){
		$responsive_options_padding = array(
		    esc_html__( 'None', 'kaswara' ) => 'kswr_pnone',
		    esc_html__( 'Remove Padding Left', 'kaswara' ) => 'kswr_rm_pleft',
		    esc_html__( 'Remove Padding Right', 'kaswara' ) => 'kswr_rm_pright',
		    esc_html__( 'Remove Padding Left - Right', 'kaswara' ) => 'kswr_rm_pall'   
		);
		$responsive_options_margin = array(
		    esc_html__( 'None', 'kaswara' ) => 'kswr_mnone',
		    esc_html__( 'Remove Margin Left', 'kaswara' ) => 'kswr_rm_mleft',
		    esc_html__( 'Remove Margin Right', 'kaswara' ) => 'kswr_rm_mright',
		    esc_html__( 'Remove Margin Left - Right', 'kaswara' ) => 'kswr_rm_mall',   
		);
		$responsive_options_border = array(
		    esc_html__( 'None', 'kaswara' ) => 'kswr_bnone',
		    esc_html__( 'Remove Border Left', 'kaswara' ) => 'kswr_rm_bleft',
		    esc_html__( 'Remove Border Right', 'kaswara' ) => 'kswr_rm_bright',
		    esc_html__( 'Remove Border Left - Right', 'kaswara' ) => 'kswr_rm_ball',
		);
		$attributes_padding = array(
		    'type'          => 'dropdown',
		    'heading'       => esc_html__('Responsive Paddings Action','kaswara'),
		    'param_name'    => 'kswr_presponsive',
		    'group'         => 'Kaswara',
		    'value'         => $responsive_options_padding
		);
		$attributes_margin = array(
		    'type'          => 'dropdown',
		    'heading'       => esc_html__('Responsive Margins Action','kaswara'),
		    'param_name'    => 'kswr_mresponsive',
		    'group'         => 'Kaswara',
		    'value'         => $responsive_options_margin
		);
		$attributes_border = array(
		    'type'          => 'dropdown',
		    'heading'       => esc_html__('Responsive Borders Action','kaswara'),
		    'param_name'    => 'kswr_bresponsive',
		    'group'         => 'Kaswara',
		    'value'         => $responsive_options_border
		);
		$attributes_min_height = array(
		    array(
		       "type" => "dropdown",
		        "heading" => esc_html__( 'Activate Min Height','kaswara'),
		        "param_name" => "kswr_column_minheight_enable",           
		        "value" => array(
		            "No" => "off",
		            "Yes" => "on",
		        ),                
		    ),
		    array(
		        "type" => "kswr_number",
		        "param_name" => "kswr_column_minheight",        
		        "heading" => esc_html__( "Column Min Height (px)", "kaswara" ),
		        "dependency" => Array("element" => "kswr_column_minheight_enable","value" => "on"), 
		    )
		);
		vc_add_param( 'vc_column', $attributes_padding );
		vc_add_param( 'vc_column', $attributes_border );
		vc_add_param( 'vc_column', $attributes_margin );
		vc_add_param( 'vc_column_inner', $attributes_padding );
		vc_add_param( 'vc_column_inner', $attributes_border );
		vc_add_param( 'vc_column_inner', $attributes_margin );
		vc_add_params( 'vc_column', $attributes_min_height );
		vc_add_params( 'vc_column_inner', $attributes_min_height );
	}




}

new Kaswara_column_settings;
if ( !function_exists( 'kswr_theme_after_vc_column' ) ) {
	function kswr_theme_after_vc_column($atts, $content = null) {
		 return Kaswara_column_settings::Kaswara_column_settings_printer($atts, $content);
	}
}
if ( !function_exists( 'kswr_theme_after_vc_column_inner' ) ) {
	function kswr_theme_after_vc_column_inner($atts, $content = null) {
		 return Kaswara_column_settings::Kaswara_column_settings_printer($atts, $content);
	}
}

?>