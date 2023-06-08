<?php

    if(!class_exists('Fl_Helping_Text_Setting'))
    {
        class Fl_Helping_Text_Setting
        {
            function __construct()
            {
                if(function_exists('vc_add_shortcode_param'))
                {
                    vc_add_shortcode_param( 'fl_font_setting', array( $this, 'fl_font_setting_form_field' ), FL_THEME_HELPER_ROOT_DIR . '/assets/params/js/fl-param_text_setting.js');
                }


            }

            /**
             * @param $settings
             * @param $value
             *
             * @return mixed|void
             */
            function fl_font_setting_form_field( $settings, $value ) {
                $font_container = new Fl_Helping_Text_Setting();

                return apply_filters( 'vc_font_container_render_filter', $font_container->render( $settings, $value ) );
            }

            /**
             * @param $settings
             * @param $value
             *
             * @return string
             */
            public function render( $settings, $value ) {
                $fields = array();
                $values = array();
                extract( $this->_fl_font_setting_parse_attributes( $settings['settings']['fields'], $value ) );

                $data   = array();
                $output = '<div class="vc_row crum_vc">';
                if ( ! empty( $fields ) ) {

                    if ( isset( $fields['font_size'] ) ) {
                        $data['font_size'] = '
                <div class="vc_col-sm-6 vc_column-with-padding">
                    <div class="wpb_element_label">' . esc_html__( 'Font size', 'fl_font_setting_form_field' ) . '</div>
                    <div class="crum-number-field-wrap vc_font_container_form_field-font_size-container">
                        <input type="number" min="0" step="1" class="fl_number_field wpb_vc_param_value vc_font_container_form_field-font_size-input fl_number_with_suffix" value="' . $values['font_size'] . '" />
                        <div class="fl_number_suffix">px</div>
                    </div>';

                        $data['font_size'] .= '</div>';
                    }
                    if ( isset( $fields['line_height'] ) ) {
                        $data['line_height'] = '
                <div class="vc_col-sm-6 vc_column-with-padding">
                    <div class="wpb_element_label">' . esc_html__( 'Line height', 'fl_font_setting_form_field' ) . '</div>
                    <div class="crum-number-field-wrap vc_font_container_form_field-line_height-container">
                        <input type="number" step="1" min="0" class="fl_number_field vc_font_container_form_field-line_height-input wpb_vc_param_value fl_number_with_suffix"  value="' . $values['line_height'] . '" />
                        <div class="fl_number_suffix">px</div>
                    </div>';
                        if ( isset( $fields['line_height_description'] ) && strlen( $fields['line_height_description'] ) > 0 ) {
                            $data['line_height'] .= '
                    <span class="vc_description clear">' . $fields['line_height_description'] . '</span>
                    ';
                        }
                        $data['line_height'] .= '</div>';
                    }
                    if ( isset( $fields['letter_spacing'] ) ) {
                        $data['letter_spacing'] = '
                <div class="vc_col-sm-6 vc_column-with-padding">
                    <div class="wpb_element_label">' . esc_html__( 'Letter spacing', 'fl_font_setting_form_field' ) . '</div>
                    <div class="crum-number-field-wrap vc_font_container_form_field-letter_spacing-container">
                        <input type="number" min="0" step="1" class="fl_number_field vc_font_container_form_field-letter_spacing-input wpb_vc_param_value fl_number_with_suffix" value="' . $values['letter_spacing'] . '" />
                        <div class="fl_number_suffix">px</div>
                    </div>';
                        if ( isset( $fields['letter_spacing_description'] ) && strlen( $fields['letter_spacing_description'] ) > 0 ) {
                            $data['line_height'] .= '
                    <span class="vc_description clear">' . $fields['letter_spacing_description'] . '</span>
                    ';
                        }
                        $data['letter_spacing'] .= '</div>';
                    }


                    if ( isset( $fields['font_style'] ) ) {

                        $data['font_style'] = ' <div class="vc_col-sm-6 vc_column-with-padding">';

                        $data['font_style'] .= '<div class="wpb_element_label">' . esc_html__( 'Font style', 'fl_font_setting_form_field' ) . '</div>';

                        $data['font_style'] .= '<div class="vc_font_container_form_field-font_style-container fl-font-style-container">';

                        if(isset($values['font_style_italic'])){
                            $data['font_style'] .= '<label class="checkbox-wrap">';
                            $data['font_style'] .= '<input type="checkbox" class="vc_font_container_form_field-font_style-checkbox italic" value="italic" ' . ( '1' === $values['font_style_italic'] ? 'checked' : '' ) . '>';

                            $data['font_style'] .= '<span class="vc_font_container_form_field-font_style-label italic"> ' . esc_html__( 'Italic', 'fl_font_setting_form_field' ) . '</span>';
                            $data['font_style'] .= '</label>';
                        }

                        if(isset($values['font_style_bold'])){
                            $data['font_style'] .= '<label class="checkbox-wrap">';
                            $data['font_style'] .= '<input type="checkbox" class="vc_font_container_form_field-font_style-checkbox bold" value="bold" ' . ( '1' === $values['font_style_bold'] ? 'checked' : '' ) . '>';

                            $data['font_style'] .= '<span class="vc_font_container_form_field-font_style-label bold"> ' . esc_html__( 'Bold', 'fl_font_setting_form_field' ) . '</span>';
                            $data['font_style'] .= '</label>';
                        }

                        if(isset($values['font_style_underline'])){
                            $data['font_style'] .= '<label class="checkbox-wrap">';
                            $data['font_style'] .= '<input type="checkbox" class="vc_font_container_form_field-font_style-checkbox underline" value="underline" ' . ( '1' === $values['font_style_underline'] ? 'checked' : '' ) . '>';

                            $data['font_style'] .= '<span class="vc_font_container_form_field-font_style-label underline">' . esc_html__( 'Underline', 'fl_font_setting_form_field' ) . '</span>';
                            $data['font_style'] .= '</label>';
                        }

                        if ( isset( $fields['font_style_description'] ) && strlen( $fields['font_style_description'] ) > 0 ) {
                            $data['font_style'] .= '
                    <span class="vc_description clear">' . $fields['font_style_description'] . '</span>
                    ';
                        }

                        $data['font_style'] .= '</div>';

                        $data['font_style'] .= '</div>';

                    }


                    $data = apply_filters( 'vc_font_container_output_data', $data, $fields, $values, $settings );

                    foreach ( $fields as $key => $field ) {
                        if ( isset( $data[ $key ] ) ) {
                            $output .= $data[ $key ];
                        }
                    }
                }
                $output .= '</div>';

                $output .= '<input name="' . $settings['param_name'] . '" class="wpb_vc_param_value  ' . $settings['param_name'] . ' ' . $settings['type'] . '_field" type="hidden" value="' . $value . '" />';

                return $output;
            }


            /**
             * @param $attr
             * @param $value
             *
             * @return array
             */
            public function _fl_font_setting_parse_attributes( $attr, $value ) {
                $fields = array();
                if ( isset( $attr ) ) {
                    foreach ( $attr as $key => $val ) {
                        if ( is_numeric( $key ) ) {
                            $fields[ $val ] = '';
                        } else {
                            $fields[ $key ] = $val;
                        }
                    }
                }

                $values = vc_parse_multi_attribute( $value, array(
                        'font_size'                  => isset( $fields['font_size'] ) ? $fields['font_size'] : '',
                        'font_style_italic'          => isset( $fields['font_style_italic'] ) ? $fields['font_style_italic'] : '',
                        'font_style_bold'            => isset( $fields['font_style_bold'] ) ? $fields['font_style_bold'] : '',
                        'font_style_underline'       => isset( $fields['font_style_underline'] ) ? $fields['font_style_underline'] : '',
                        'line_height'                => isset( $fields['line_height'] ) ? $fields['line_height'] : '',
                        'letter_spacing'             => isset( $fields['letter_spacing'] ) ? $fields['letter_spacing'] : '',
                    )
                );

                return array( 'fields' => $fields, 'values' => $values );
            }


        }
    }

    if(class_exists('Fl_Helping_Text_Setting'))
    {
        $Fl_Helping_Text_Setting = new Fl_Helping_Text_Setting();
    }
