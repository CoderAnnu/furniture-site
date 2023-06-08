<?php 
/* ================================================================== *\
   ==                                                              ==
   ==                                                              ==
   ==============       COMPOSER NEW FIELDS TYPES       ============== 
   ==                                                              ==
   ==                                                              ==
\* ================================================================== */

/*------------------------------------------------
        Number Spinner Field
------------------------------------------------*/
if(defined('WPB_VC_VERSION')) {  
   
    vc_add_shortcode_param( 'kswr_iconchooser', 'kswr_iconchooser_field' );
    function kswr_iconchooser_field( $settings, $value ) {
        $output = '';
        $output .= '<div class="my_param_block"><div class="kswr-icon-chooser">
              <div class="kswr-icon-search">  
                <div class="kswr-the-icon-choosed"><i class="'.esc_attr($value).'"></i></div>
                  <input class="kswr-icon-search-input" type="text" onkeyup="kswr_icon_search(this)" placeholder="'.esc_html__("Search Icon","kaswara").'">
              </div>
              <div class="kswr-icon-set">
              <input type="hidden" name="'.esc_attr($settings['param_name']).'" class="wpb_vc_param_value '.esc_attr($settings['param_name']).' '.esc_attr($settings['type']).'_field" value="'.esc_attr($value).'" />'.kswr_display_font_list();
        $output .='</div></div></div>'; 
        return $output;
    } 


    function kswr_display_font_list(){
        $icons = '';
        $icons .= '<div class="kswr-the-icon" title="" onclick="kswr_choose_icon(this);" data-class="" data-name=""><i class=""></i></div>';

        foreach (kswr_get_font_array() as $font) {
            $icons .= '<div class="kswr-the-icon" title="'.esc_attr($font['name']).'" onclick="kswr_choose_icon(this);" data-class="'.esc_attr($font['class']).'" data-name="'.esc_attr($font['name']).'"><i class="'.esc_attr($font['class']).'"></i></div>';
        }
        return $icons;
    }

    vc_add_shortcode_param( 'kswr_fontsize', 'kswr_fontsize_field' );
    function kswr_fontsize_field( $settings, $value ) {
        $dependency = $output = $outputElements = '';
        $elements = $settings['elements'];
        $defaults = ( is_array($settings['defaults']) ) ? $settings['defaults'] : array() ;
        $arrayValues = array();
        $arrayValues['font-size'] = ( array_key_exists('font-size',$defaults) ) ? $defaults['font-size'] : ''; 
        $arrayValues['letter-spacing'] = ( array_key_exists('letter-spacing',$defaults) ) ? $defaults['letter-spacing'] : '';
        $arrayValues['line-height'] = ( array_key_exists('line-height',$defaults) ) ? $defaults['line-height'] : '';     
        $arrayValues['--tablet-font-size'] = ( array_key_exists('--tablet-font-size',$defaults) ) ? $defaults['--tablet-font-size'] : '';
        $arrayValues['--phone-font-size'] = ( array_key_exists('--phone-font-size',$defaults) ) ? $defaults['--phone-font-size'] : '';
          
            $realValues = explode(";", $value); 
            foreach($realValues as $singleValue ){
                $actualValueName = explode(":",$singleValue);
                $arrayValues[$actualValueName[0]] = $actualValueName[1]; 
            }
            //Starts The Output of The Element
            $theValue = '';
            foreach($elements as $elemName => $elemValue){
                $outputElements .= '<div class="sy-fonts-elem"><span>'.$elemName.'</span><input type="text" data-name="'.esc_attr($elemValue).'" value="'.$arrayValues[$elemValue].'" onchange="kswr_change_fontinput(this);" onkeyup="kswr_change_fontinput(this);" /></div>';
                if($arrayValues[$elemValue] != '')
                    $theValue .= $elemValue.':'.$arrayValues[$elemValue].';';          
              }
            $output .= '<div class="sy-fonts-container" '.$dependency.'><div class="sy-fonts-info">'.__('Add (px, em, pt)','kaswwara').'</div> '.$outputElements.
                '<input type="hidden" name="'.esc_attr($settings['param_name']).'" class="wpb_vc_param_value kswr-fonts-value '.esc_attr($settings['param_name']).' '.esc_attr($settings['type']).'_field" value="'.esc_attr($theValue).'" />';
            $output .='</div>';
            return $output;  
    }


vc_add_shortcode_param( 'kswr_fontstyle', 'kswr_fontstyle_field' );
function kswr_fontstyle_field( $settings, $value ) {
  $dependency = $output = $outputElements = '';
  $elements = $settings['elements'];
  $defaults = ( is_array($settings['defaults']) ) ? $settings['defaults'] : array() ;
  $arrayValues = array();
  $arrayValues['font-family'] = ( array_key_exists('font-family',$defaults) ) ? $defaults['font-family'] : ''; 
  $arrayValues['font-weight'] = ( array_key_exists('font-weight',$defaults) ) ? $defaults['font-weight'] : '';
  $arrayValues['font-style'] = ( array_key_exists('font-style',$defaults) ) ? $defaults['font-style'] : '';


  $realValues = explode(";", $value); 
  foreach($realValues as $singleValue ){
    $actualValueName = explode(":",$singleValue);
    $arrayValues[$actualValueName[0]] = $actualValueName[1]; 
  }
  //Starts The Output of The Element
  $theValue = '';
  foreach($elements as $elemName => $elemValue){
  $outputElements .= '<div class="sy-fonts-elem"><span>'.$elemName.'</span>
      <select data-name="'.esc_attr($elemValue).'" value="'.$arrayValues[$elemValue].'" onchange="kswr_change_fontinput(this);" onkeyup="kswr_change_fontinput(this);">';
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
   $output .= '<div class="sy-fonts-container" '.$dependency.'>'.$outputElements.
        '<input type="hidden" name="'.esc_attr($settings['param_name']).'" class="wpb_vc_param_value kswr-fonts-value '.esc_attr($settings['param_name']).' '.esc_attr($settings['type']).'_field" value="'.esc_attr($theValue).'" />';
      $output .='</div>';
      return $output;  
}


function kswr_get_font_options_arrays($cssName){
  $array_result = array();
  if($cssName == 'font-family'){
    $gFontArray = kaswara_get_single_option('gfonts');
    if(!is_array($gFontArray))
      $gFontArray = array();
    array_unshift($gFontArray, "Title font");
    array_unshift($gFontArray, "Theme font");    
    array_unshift($gFontArray, "Inherit");
    
    $array_result = $gFontArray;
  }
  if($cssName == 'font-weight'){
    $array_result = array('inherit'=>'inherit','100'=>'100','200'=>'200','300'=>'300','400'=>'400','500'=>'500','600'=>'600','700'=>'700','800'=>'800','900'=>'900');
  }
  if($cssName == 'font-style'){
    $array_result = array('inherit'=>'inherit','italic'=>'italic','normal'=>'normal');
  }

  return $array_result;

}



  vc_add_shortcode_param( 'kswr_distance', 'kswr_distance_field' );
  function kswr_distance_field( $settings, $value ) {
      $dependency = '';
      $positions = $settings['positions'];
      $distance = $settings['distance'];
      $defaults = ( is_array($settings['defaults']) ) ? $settings['defaults'] : array() ;
      
      $arrayValues = array();
      $arrayValues['top'] = ( array_key_exists('top',$defaults) ) ? $defaults['top'] : '0px'; 
      $arrayValues['bottom'] = ( array_key_exists('bottom',$defaults) ) ? $defaults['bottom'] : '0px';
      $arrayValues['left'] = ( array_key_exists('left',$defaults) ) ? $defaults['left'] : '0px';
      $arrayValues['right'] = ( array_key_exists('right',$defaults) ) ? $defaults['right'] : '0px'; 
      $arrayValues['width'] = ( array_key_exists('width',$defaults) ) ? $defaults['width'] : '0px'; 
      $arrayValues['through'] = ( array_key_exists('through',$defaults) ) ? $defaults['through'] : '0px'; 

      $allDistances = explode(";", $value);              
      $marginValue = '';        
      foreach($allDistances as $singleDistance ){
        $actualDistance = explode(":",$singleDistance);
        $actualPos = explode("-",$actualDistance[0]);
        if($distance.'-'.$actualPos[1] == $actualDistance[0])
          $arrayValues[$actualPos[1]] = $actualDistance[1];          
      }

      $inputHtml = '';
      
      $theValue = '';
      foreach($positions as $key => $position){
        $inputHtml .= $key.' <input type="text" style="width:50px;padding:3px" data-distance-name="'.esc_attr($distance).'" data-posdistance="'.esc_attr($position).'" value="'.$arrayValues[$position].'" class="kswr-'.$distance.'-inputs" onkeyup="kswr_change_distanceinput(this);"/> &nbsp;&nbsp;';
        $theValue .=  $distance.'-'.$position.':'.$arrayValues[$position].';';
      }

      $html = '<div class="kaswara-margins" '.$dependency.'>
            <input type="hidden" name="'.esc_attr($settings['param_name']).'" class="wpb_vc_param_value kswr-'.esc_attr($distance).'-value '.esc_attr($settings['param_name']).' '.esc_attr($settings['type']).'_field" value="'.esc_attr($theValue).'" />';
      $html .= $inputHtml;      
      $html .= '</div>';
      return $html;
  }

  vc_add_shortcode_param( 'kswr_number', 'kswr_number_field' );
  function kswr_number_field( $settings, $value ) {
    $dependency = '';
    $step = 1;
    if(isset($settings['step']))
      $step = $settings['step'];

     return '<div class="my_param_block" '.$dependency.'>'
               .' <div class="sy-number-chooser sy-num-vc">
                    <input type="number" step="'.$step.'" max="'.esc_attr( $settings['max'] ).'" min="'.esc_attr( $settings['min'] ).'" class="wpb_vc_param_value wpb-textinput ' .
                       esc_attr( $settings['param_name'] ) . ' ' .
                       esc_attr( $settings['type'] ) . '_field qty text"  size="4" name="'.esc_attr( $settings['param_name'] ).'" value="'. esc_attr( $value ) .'"   />                    
                  </div>
              </div>'; 
  }

  vc_add_shortcode_param( 'kswr_datepicker', 'kswr_datepicker_field' , KASWARA_PLUGIN_URL.'includes/params/bundle/vc_extend/vc_extend.js' );
  function kswr_datepicker_field( $settings, $value ) {
    $dependency = '';
    $step = 1;
    if(isset($settings['step']))
      $step = $settings['step'];

     return '<div class="my_param_block" '.$dependency.'>'
               .' <div class="sy-datepicker-chooser sy-datepicker-vc">
                    <input type="text" class="wpb_vc_param_value wpb-textinput ' .
                       esc_attr( $settings['param_name'] ) . ' ' .
                       esc_attr( $settings['type'] ) . '_field text kswr-datepicker"  name="'.esc_attr( $settings['param_name'] ).'" value="'. esc_attr( $value ) .'"   />                    
                  </div>
              </div>'; 
  }



  vc_add_shortcode_param( 'kswr_message', 'kswr_message_field' );
  function kswr_message_field( $settings, $value ) {
    $dependency = '';
     return '<div class="my_param_block">
               <div class="kswr-message-vc" style="margin-top:'.esc_attr($settings['mtop']).';">'.$settings['title'].'</div>
               <input type="hidden"  class="wpb_vc_param_value wpb-textinput ' .
                       esc_attr( $settings['param_name'] ) . ' ' .
                       esc_attr( $settings['type'] ) . '_field qty text"  size="4" name="'.esc_attr( $settings['param_name'] ).'" value="'. esc_attr( $value ) .'"   />   
              </div>'; 
  }

  vc_add_shortcode_param( 'kswr_switcher', 'kswr_switcher_field' );
  function kswr_switcher_field( $settings, $value ) {
      $dependency = $output = '';
      $on = (isset($settings['on'])) ? $settings['on'] :  array('text' =>  'ON' , 'val' => 1 );
      $off = (isset($settings['off'])) ? $settings['off'] :  array('text' =>  'OFF' , 'val' =>  0 );
      
      if($value == '') $value  = $settings['default'];

      $theClassSwitcher = 'sy-sw-controler ';
      if($value == $on['val']){
        $theClassSwitcher .= ' sy-sw-controler_on'; 
      }elseif($value == $off['val']){
        $theClassSwitcher .= ' sy-sw-controler_off'; 
      }

      $output .= '<div class="my_param_block" '.$dependency.'>
          <div class="sy-sw-wrap noselect">
                <div class="'.esc_attr($theClassSwitcher).'" onclick="kswr_switchSySwitcher(this);"  data-value="'.esc_attr($value).'" data-on="'.esc_attr($on['val']).'" data-off="'.esc_attr($off['val']).'">
                  <input type="hidden" class="wpb_vc_param_value wpb-textinput ' .
                       esc_attr( $settings['param_name'] ) . ' ' .
                       esc_attr( $settings['type'] ) . '_field qty text"  size="4" name="'.esc_attr( $settings['param_name'] ).'" value="'. esc_attr( $value ) .'"   />  
                  <div class="sy-sw-cursor"></div>
                  <div class="sy-sw-label sy-sw-label_on">'.$on['text'].'</div>
                  <div class="sy-sw-label sy-sw-label_off">'.$off['text'].'</div>
                </div>
              </div>
      </div>'; 
      return $output;
  }


  vc_add_shortcode_param( 'kswr_search', 'kswr_item_search' );
  function kswr_item_search( $settings, $value ) {
    $dependency = '';
    $arrayValue = explode('/', $value);
    $title = "";
    if(is_array($arrayValue) && isset($arrayValue[1]))
      $title = $arrayValue[1];    
    
    return '<div class="sy-sitem-search" '.$dependency.'>
                <input type="hidden" name="'.esc_attr($settings['param_name']).'" class="wpb_vc_param_value sy-sitem-sid" value="'.esc_attr($value).'"/>          
                <input type="text" name="" class="sy-sitem-sinput" value="'.esc_attr($title).'" onkeydown="kswr_item_composer_search(this,\''.$settings['item_type'].'\');"/>
                <div class="sy-sitem-result"></div>
            </div>'; 
  }

   vc_add_shortcode_param( 'kswr_multiple_select', 'kswr_multiple_select_field' );
    function kswr_multiple_select_field( $settings, $value ) {
      $choices = $settings['values'];
      $choices_output = '';
      $arrayValues = explode(',',$value);
      foreach ($choices as $choice) {      
        if(in_array($choice, $arrayValues))
          $choices_output .='<option value="'.esc_attr($choice).'" selected>'.ucfirst($choice).'</option>';
        else
          $choices_output .='<option value="'.esc_attr($choice).'">'.ucfirst($choice).'</option>';
      }
       return '<div class="sy-sitem-select-multiple">
       <input class="kswr-multiple-select-val wpb_vc_param_value" name="'.esc_attr($settings['param_name']).'" type="hidden" value="'.esc_attr($value).'"/>
       <select class="kswr-multiple-select" onchange="kswr_multiple_select_change(this);" multiple>'.$choices_output.'</select>              
            </div>'; 
    }


   vc_add_shortcode_param( 'kswr_border', 'kswr_border_field' , KASWARA_PLUGIN_URL.'includes/params/bundle/vc_extend/vc_extend.js' );
  function kswr_border_field( $settings, $value ) {
     $output = $borderwidth = $bordercolor1 = $bordercolor2 =  $borderStylesOutput = $dependency = $gradientOptions = $gradientOutput = '';
     $borderstyle = $bordergradientdirection = 'none'; 
     
     if($value != ''){
      $theValues = json_decode($value,true);
      $borderwidth = $theValues['borderwidth']; $bordercolor1 = $theValues['bordercolor1']; $borderstyle = $theValues['borderstyle']; 
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


     if(isset($settings['bordergradient']) && $settings['bordergradient'] == 'enable'){
      $bordergradientdirection = $theValues['bordergradientdirection']; $bordercolor2 = $theValues['bordercolor2'];
       $gradientOutput .= '<div class="kswr-grad-ch-s"><span>'.esc_html__('Gradient','kaswara').'</span><select class="kswr-bmaker-gradient" onchange="kswr_change_br(this)" data-name="bordergradientdirection">';            
        foreach ($gradientsArray as $key => $theRName) {
           $is = '';  if($bordergradientdirection == $key) $is = 'selected'; 
           $gradientOutput .= '<option value="'.$key.'" '.$is.'>'.$theRName.'</option>';
        }
       $gradientOutput .= '</select></div>';
       $disp = 'none';
       if(isset($bordergradientdirection) && $bordergradientdirection!= '' && $bordergradientdirection != 'none') $disp = 'block';
       $gradientOutput .= '<div style="display:'.$disp.';" class="kswr-grad-ch-s borderthecolor2"><span>'.esc_html__('Color 2','kaswara').'</span><input type="text" class="kswr-bmaker-color color-picker" data-type="border" data-name="bordercolor2" value="'.$bordercolor2.'"  /></div>' ;                                    
      
     }



     return '<div class="my_param_block" '.$dependency.'>
                <div class="vc-kswr-border-maker">
                 <input type="hidden" class="wpb_vc_param_value wpb-textinput ' .
                       esc_attr( $settings['param_name'] ) . ' ' .
                       esc_attr( $settings['type'] ) . '_field  text kswr-bmaker-value" name="'.esc_attr( $settings['param_name'] ).'" value="'.esc_attr($value).'"   /> 
                    <div class="kswr-grad-ch-s"><span>'.esc_html__('Size','kaswara').'</span><input type="text" placeholder="1px" class="kswr-bmaker-width" value="'.$borderwidth.'" onkeyup="kswr_change_br(this)" data-name="borderwidth" /></div>'.$borderStylesOutput.
                    '<div class="kswr-grad-ch-s"><span>'.esc_html__('Color','kaswara').'</span><input type="text" class="kswr-bmaker-color color-picker" data-type="border" data-name="bordercolor1" value="'.$bordercolor1.'"  /></div> 
                    '.$gradientOutput.'                                     
                </div>
               </div>'; 
}    

  vc_add_shortcode_param( 'kswr_gradient', 'kswr_gradient_field' , KASWARA_PLUGIN_URL.'includes/params/bundle/vc_extend/vc_extend.js' );
  function kswr_gradient_field( $settings, $value ) {
    $dependency =  $color1 = $color2 = $typeOptions = $gradientOptions = $display = '';
    $type = 'color'; $direction = 'to bottom';

    if($value != ''){
      $theValues = json_decode($value,true);
      $type = $theValues['type']; $direction = $theValues['direction']; $color1 = $theValues['color1']; $color2 = $theValues['color2']; 
    }

    $typesArray = array('color' => 'Single Color','gradient' => 'Gradient');
    $gradientsArray =  array('to bottom' => 'To Bottom','to left' => 'To Left', 'to right' => 'To Right', 'to top'=>'To Top' , 'to top left'=>'To Top Left' ,  'to top right'=>'To Top Right' , 'to bottom left'=>'To Bottom Left' , 'to bottom right'=>'To Bottom Right' );

    foreach ($typesArray as $key => $theRName) {
         $is = '';  if($type == $key) $is = 'selected'; 
         $typeOptions .= '<option value="'.esc_attr($key).'" '.$is.'>'.$theRName.'</option>';
      }
       foreach ($gradientsArray as $key => $theRName) {
         $is = '';  if($direction == $key) $is = 'selected'; 
         $gradientOptions .= '<option value="'.esc_attr($key).'" '.$is.'>'.$theRName.'</option>';
      }

      if( $type  == 'color') $display = 'none';


     return '<div class="my_param_block" '.$dependency.'><div class="kswr-gradient-chooser"><input type="hidden" class="wpb_vc_param_value kswr-ch-gradient-value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' . esc_attr( $settings['type'] ) . '_field qty text"  size="4" name="'.esc_attr( $settings['param_name'] ).'" value="'. esc_attr( $value ) .'"   /><div class="kswr-ch-gradient-left kswr-ch-gradient-section"><div class="kswr-grad-ch-s"><span>'.esc_html__('Type','kaswara').'</span><select class="kswr-ch-grad-type" onchange="kswr_change_gradient(this);" data-name="type">'.$typeOptions.'</select></div><div class="kswr-grad-ch-s"><span>'.esc_html__('Color 1','kaswara').'</span>
                    <input type="text" class="kswr-ch-gradient-color kswr-ch-gradient-color1 color-picker" data-type="gradient" data-name="color1" value="'.$color1.'" /></div></div>
                  <div class="kswr-ch-gradient-right kswr-ch-gradient-section" style="display:'.$display.';"><div class="kswr-grad-ch-s"><span>'.esc_html__('Color 2','kaswara').'</span><input type="text" class="kswr-ch-gradient-color kswr-ch-gradient-color2 color-picker" data-type="gradient" data-name="color2" value="'.$color2.'"/></div><div class="kswr-grad-ch-s"><span>'.esc_html__('Direction','kaswara').'</span><select class="kswr-ch-grad-type" onchange="kswr_change_gradient(this);" data-name="direction">'.$gradientOptions.'</select></div></div></div></div>'; 
  }

  vc_add_shortcode_param( 'kswr_background', 'kswr_background_field' );
  function kswr_background_field( $settings, $value ) {
      
      $output = $repeatOptions = $positionOptions = $sizeOptions = $image = $repeat = $position = $size = $overlay = $overlayopacity = '';
       if($value != ''){
          $theValues = json_decode($value,true);
          $repeat = $theValues['repeat']; $position = $theValues['position']; $size =  $theValues['size']; $overlay =  $theValues['overlay']; $overlayopacity =  $theValues['overlayopacity']; 
         
     }
     $repeatArray = array('no-repeat' => 'No Repeat','repeat' => 'Repeat' ,'repeat-x' => 'Repeat X', 'repeat-y' => 'Repeat Y' ,'inherit' => 'Inherit' ,'initial' => 'Initial');
     $positionsArray = array('left top' => 'Left Top', 'left center' => 'Left Center', 'left bottom' => 'Left Bottom', 'right top' => 'Right Top', 'right center' => 'Right Center', 'right bottom' => 'Right Bottom', 'center top' => 'Center Top', 'center center' => 'Center Center', 'center bottom' => 'Center Bottom' );
     $sizeOptions = array('inherit' => 'Inherit', 'cover' => 'Cover', 'contain' => 'Contain');

     foreach ($positionsArray as $key => $theRName) {
         $is = '';  if($position == $key) $is = 'selected'; 
         $positionOptions .= '<option value="'.esc_attr($key).'" '.$is.'>'.$theRName.'</option>';
      }
      foreach ($repeatArray as $key => $theRName) {
         $is = '';  if($repeat == $key) $is = 'selected'; 
         $repeatOptions .= '<option value="'.esc_attr($key).'" '.$is.'>'.$theRName.'</option>';
      }
      foreach ($sizeOptions as $key => $theRName) {
         $is = '';  if($size == $key) $is = 'selected'; 
         $sizeOptions .= '<option value="'.esc_attr($key).'" '.$is.'>'.$theRName.'</option>';
      }


      $output .= '<div class="my_param_block" '.$dependency.'> <div class="vc-kswr-background-maker">
                 <input type="hidden" class="wpb_vc_param_value wpb-textinput ' .
                       esc_attr( $settings['param_name'] ) . ' ' .
                       esc_attr( $settings['type'] ) . '_field  text kswr-backmaker-value" name="'.esc_attr( $settings['param_name'] ).'" value="'.esc_attr($value).'" /> 
                       
                       <div class="kswr-back-ch-s"><span>'.esc_html__('Repeat','kaswara').'</span><select onchange="kswr_change_background(this);" data-name="repeat">'.$repeatOptions.'</select></div>
                       <div class="kswr-back-ch-s"><span>'.esc_html__('Position','kaswara').'</span><select onchange="kswr_change_background(this);" data-name="position">'.$positionOptions.'</select></div>
                       <div class="kswr-back-ch-s"><span>'.esc_html__('Cover','kaswara').'</span><select onchange="kswr_change_background(this);" data-name="size">'.$sizeOptions.'</select></div><div class="kswr-backmaker-top">
                       <div class="kswr-back-ch-s kswr-backmaker-overl"><span>'.esc_html__('Overlay','kaswara').'</span><input type="text" class="kswr-ch-back-color color-picker" data-type="overlay" data-name="overlay" value="'.$overlay.'" /></div>
                       <div class="kswr-back-ch-s kswr-backmaker-overlopac"><span>'.esc_html__('Overlay Opacity','kaswara').'</span><input type="number" onchange="kswr_change_background(this);" step="0.1" max="1" min="0" class="kswr-ch-back-overlayopacity" data-name="overlayopacity" value="'.$overlayopacity.'" /></div>
                       </div>';

      $output .= '</div></div>';
  return $output;
} 

vc_add_shortcode_param( 'kswr_animationchooser', 'kswr_animationchooser_field' );
  function kswr_animationchooser_field( $settings, $value ) {
    $output = $selection = '';
    $attentionSeeker = array('bounce','flash','pulse','rubberBand','shake','swing','tada','wobble','jello');      
    $fadingEntrance = array('fadeIn','fadeInDown','fadeInDownBig','fadeInLeft','fadeInLeftBig','fadeInRight','fadeInRightBig','fadeInUp','fadeInUpBig'); 
    $fadingExit = array('fadeOut','fadeOutDown','fadeOutDownBig','fadeOutLeft','fadeOutLeftBig','fadeOutRight','fadeOutRightBig','fadeOutUp','fadeOutUpBig'); 
    $slidingEntrance = array('slideInUp','slideInDown','slideInLeft','slideInRight');
    $slidingExit = array('slideOutUp','slideOutDown','slideOutLeft','slideOutRight');
    $zoomEntrance = array('zoomIn','zoomInDown','zoomInLeft','zoomInRight','zoomInUp');
    $zoomExit = array('zoomOut','zoomOutDown','zoomOutLeft','zoomOutRight','zoomOutUp');
    $bouncingEntrance = array('bounceIn','bounceInDown','bounceInLeft','bounceInRight','bounceInUp'); 
    $bouncingExit = array('bounceOut','bounceOutDown','bounceOutLeft','bounceOutRight','bounceOutUp'); 
    $rotatingEntrance = array('rotateIn','rotateInDownLeft','rotateInDownRight','rotateInUpLeft','rotateInUpRight'); 
    $rotatingExit = array('rotateOut','rotateOutDownLeft','rotateOutDownRight','rotateOutUpLeft','rotateOutUpRight');
    $lightSpeed = array('arraylightSpeedIn','lightSpeedOut'); 
    $flippers = array('flip','flipInX','flipInY','flipOutX','flipOutY'); 
    $specials = array('hinge','rollIn','rollOut');

$selection .= '<optgroup label="Attention Seeker">';
    foreach($attentionSeeker as $animation){
      $isSelected = ''; if($animation == $value) $isSelected = 'selected';
      $selection .='<option for="'.esc_attr($animation).'" '.$isSelected.'>'.$animation.'</option> '; 
    }
    $selection .= '</optgroup><optgroup label="Fading Entrance">';
    foreach($fadingEntrance as $animation){
      $isSelected = ''; if($animation == $value) $isSelected = 'selected';
      $selection .='<option for="'.esc_attr($animation).'" '.$isSelected.'>'.$animation.'</option> ' ;
    }
    $selection .= '</optgroup><optgroup label="Fading Exit">';
    foreach($fadingExit as $animation){
      $isSelected = ''; if($animation == $value) $isSelected = 'selected';
      $selection .='<option for="'.esc_attr($animation).'" '.$isSelected.'>'.$animation.'</option> '; 
    }
    $selection .= '</optgroup><optgroup label="Sliding Entrance">';
    foreach($slidingEntrance as $animation){
      $isSelected = ''; if($animation == $value) $isSelected = 'selected';
      $selection .='<option for="'.esc_attr($animation).'" '.$isSelected.'>'.$animation.'</option> ' ;
    }
    $selection .= '</optgroup><optgroup label="Sliding Exit">';
    foreach($slidingExit as $animation){
      $isSelected = ''; if($animation == $value) $isSelected = 'selected';
      $selection .='<option for="'.esc_attr($animation).'" '.$isSelected.'>'.$animation.'</option> ' ;
    }
    $selection .= '</optgroup><optgroup label="Zoom Entrance">';
    foreach($zoomEntrance as $animation){
      $isSelected = ''; if($animation == $value) $isSelected = 'selected';
      $selection .='<option for="'.esc_attr($animation).'" '.$isSelected.'>'.$animation.'</option> ' ;
    }
    $selection .= '</optgroup><optgroup label="Zoom Exit">';
    foreach($zoomExit as $animation){
      $isSelected = ''; if($animation == $value) $isSelected = 'selected';
      $selection .='<option for="'.esc_attr($animation).'" '.$isSelected.'>'.$animation.'</option> ' ;
    }
    $selection .= '</optgroup><optgroup label="Bouncing Entrance">';
    foreach($bouncingEntrance as $animation){
      $isSelected = ''; if($animation == $value) $isSelected = 'selected';
      $selection .='<option for="'.esc_attr($animation).'" '.$isSelected.'>'.$animation.'</option> ' ;
    }
    $selection .= '</optgroup><optgroup label="Bouncing Exit">';
    foreach($bouncingExit as $animation){
      $isSelected = ''; if($animation == $value) $isSelected = 'selected';
      $selection .='<option for="'.esc_attr($animation).'" '.$isSelected.'>'.$animation.'</option> ' ;
    }
    $selection .= '</optgroup><optgroup label="Rotating Entrance">';
    foreach($rotatingEntrance as $animation){
      $isSelected = ''; if($animation == $value) $isSelected = 'selected';
      $selection .='<option for="'.esc_attr($animation).'" '.$isSelected.'>'.$animation.'</option> ' ;
    }
    $selection .= '</optgroup><optgroup label="Rotating Exit">';
    foreach($rotatingExit as $animation){
      $isSelected = ''; if($animation == $value) $isSelected = 'selected';
      $selection .='<option for="'.esc_attr($animation).'" '.$isSelected.'>'.$animation.'</option> ' ;
    }
    $selection .= '</optgroup><optgroup label="Light Speed">';
    foreach($lightSpeed as $animation){
      $isSelected = ''; if($animation == $value) $isSelected = 'selected';
      $selection .='<option for="'.esc_attr($animation).'" '.$isSelected.'>'.$animation.'</option> ' ;
    }
    $selection .= '</optgroup><optgroup label="Flippers">';
    foreach($flippers as $animation){
      $isSelected = ''; if($animation == $value) $isSelected = 'selected';
      $selection .='<option for="'.esc_attr($animation).'" '.$isSelected.'>'.$animation.'</option> ' ;
    }
    $selection .= '</optgroup><optgroup label="Specials">';
    foreach($specials as $animation){
      $isSelected = ''; if($animation == $value) $isSelected = 'selected';
      $selection .='<option for="'.esc_attr($animation).'" '.$isSelected.'>'.$animation.'</option> ' ;
    }
     $selection .= '</optgroup>';

    $output .= '<div class="my_param_block"><select name="'.esc_attr($settings['param_name']).'" class="wpb_vc_param_value '.$settings['param_name'].' '.$settings['type'].'_field" value="'.esc_attr($value).'">'.$selection.'</select></div>'; 
    return $output;
} 


//Hotspot Param    
    vc_add_shortcode_param( 'kswr_hotspot', 'kswr_hotspot_field' , KASWARA_PLUGIN_URL.'includes/params/bundle/vc_extend/vc_extend.js' );
    function kswr_hotspot_field( $settings, $value ) {
        $output = $imageid = $data = $thumbnail = $previewimage = '';
        if($value != ''){
            $value = str_replace("``" , '"' ,$value);                                   
            $theValues = json_decode($value,true);
            $imageid = $theValues['imageid']; $data = $theValues['data'];
        }
        if(trim($imageid) != ''){
            $thumbnail = '<img src="'.wp_get_attachment_image_src($imageid,'thumbnail')[0].'"/>';
            $previewimage = '<img src="'.wp_get_attachment_image_src($imageid,'full')[0].'"/>';
        }

        $data = json_decode($data, true);
        foreach ($data as $elm) {
            $elm = json_decode($elm, true);            
        }
        $output .= '<div class="hotpot-param-ctn syn-elem-parent my_param_block" '.$dependency.'>'; 
        //Image Chooser
        $output .= '<div class="kswr-hotspotparam-smallpreview">'.$thumbnail.'</div><div class="kswr-hotspotparam-chooser" onclick="kswr_choose_hotspotimage(this)"><i class="km-icon-plus"></i></div>';
        //Hotspot maker
        $output .= '<div class="kswr-hotspotparam-preview"><div class="kswr-hotspot-insider"><div class="syn-hotspot-imgwrapper">'.$previewimage.'</div></div></div>';
        $output .= '<input type="hidden" class="syn-fake-input wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field  text kswr-backmaker-value" name="'.esc_attr( $settings['param_name'] ).'" value="'.esc_attr($value).'" />';

        $output .= '</div>';

        return $output;
    }


}



?>
