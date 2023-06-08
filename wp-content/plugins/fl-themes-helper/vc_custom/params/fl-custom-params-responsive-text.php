<?php

    if(!class_exists('Fl_Helping_Responsive_Text'))
    {
        class Fl_Helping_Responsive_Text
        {
            function __construct()
            {


                if(function_exists('vc_add_shortcode_param'))
                {
                    vc_add_shortcode_param('fl_responsive_text', array($this, 'fl_responsive_text_callback'), FL_THEME_HELPER_ROOT_DIR . '/assets/params/js/fl-param_responsive_text.js');
                }


            }

            function fl_responsive_text_callback($settings, $value)
            {
                $dependency = '';
                $unit = $settings['unit'];
                $medias = $settings['media'];

                if(is_numeric($value)){
                    $value = "desktop:".$value.'px;';
                }


                $uid = 'fl-helping-responsive-'. rand(1000, 9999);

                $html  = '<div class="fl-helping-responsive-wrapper" id="'.$uid.'" >';
                $html .= '<div class="fl-helping-responsive-items" >';

                foreach($medias as $key => $default_value ) {
                    //$html .= $key;
                    switch ($key) {
                        case 'Desktop':
                            $class = 'optional';
                            $data_id  = strtolower((preg_replace('/\s+/', '_', $key)));
                            $icon_class = "<i class='fa fa-laptop'></i>";
                            $html .= $this->fl_responsive_text_param_media($class, $icon_class, $key, $default_value ,$unit, $data_id);
                            break;
                        case 'Tablet':
                            $class = 'optional';
                            $data_id  = strtolower((preg_replace('/\s+/', '_', $key)));
                            $icon_class = "<i class='fa fa-tablet'></i>";
                            $html .= $this->fl_responsive_text_param_media($class, $icon_class, $key, $default_value ,$unit, $data_id);
                            break;
                        case 'Mobile':
                            $class = 'optional';
                            $data_id  = strtolower((preg_replace('/\s+/', '_', $key)));
                            $icon_class = "<i class='fa fa-mobile'></i>";
                            $html .= $this->fl_responsive_text_param_media($class, $icon_class, $key, $default_value ,$unit, $data_id);
                            break;
                    }
                }
                $html .= '  </div>';
                $html .= '  <input type="hidden" data-unit="'.esc_attr( $unit ).'"  name="'.esc_attr( $settings['param_name'] ).'" class="wpb_vc_param_value fl-helping-responsive-value '. esc_attr( $settings['param_name'] ).' '.esc_attr( $settings['type'] ).'_field" value="'.esc_attr( $value ).'" '.$dependency.' />';
                $html .= '</div>';

                return $html;
            }

            function fl_responsive_text_param_media($class, $icon_class, $key, $default_value, $unit, $data_id) {

                 $unit_html = "<div class='fl_number_suffix'>";
                 $unit_html .= $unit;
                 $unit_html .= "</div>";


                $tooltipVal  = str_replace('_', ' ', $data_id);
                $html  = '  <div class="fl-responsive-item '.esc_attr( $class ).' '.esc_attr( $data_id ).' vc_col-sm-4">';
                $html .= '    <div class="fl-icon">';
                $html .= '    	<div class="fl-tooltip '.esc_attr( $class ).' '.esc_attr( $data_id ).'">'.$icon_class.ucwords($tooltipVal).' </div>';
                $html .= '     </div>';
                $html .= '    <input type="number" class="fl-responsive-input fl_number_with_suffix fl_number_field" data-default="'.esc_attr( $default_value ) .'" data-unit="'.esc_attr( $unit ).'" data-id="'.esc_attr( $data_id ).'" />'.$unit_html;
                $html .= '  </div>';
                return $html;
            }


        }
    }

    if(class_exists('Fl_Helping_Responsive_Text'))
    {
        $Fl_Helping_Responsive_Text = new Fl_Helping_Responsive_Text();
    }
