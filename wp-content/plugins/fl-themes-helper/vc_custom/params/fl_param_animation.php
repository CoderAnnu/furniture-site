<?php

if ( function_exists( 'vc_add_shortcode_param' ) ) {
    vc_add_shortcode_param( 'fl_animator', 'fl_animator_param_settings_field');
}

function fl_animator_param_settings_field($settings, $value){
    $json         = fl_get_animation_json();
    $jsonIterator = json_decode($json,true);
    $class        = isset($settings['class']) ? $settings['class'] : '';
    $param_name   = isset($settings['param_name']) ? $settings['param_name'] : '';
    $type         = isset($settings['type']) ? $settings['type'] : '';

    $animators = '<select name="'. esc_attr( $param_name ).'" class="wpb_vc_param_value ' . esc_attr( $param_name ) . ' ' . esc_attr( $type ) . ' ' . esc_attr( $class ) . '">';

    foreach ($jsonIterator as $key => $val) {
        if(is_array($val)) {
            $labels = str_replace('_',' ', $key);
            $animators .= '<optgroup label="'.ucwords( esc_attr__($labels,'fl-themes-helper') ).'">';
            foreach($val as $label => $style){
                $label = str_replace('_',' ', $label);
                if($label == $value)
                    $animators .= '<option selected value="'. esc_attr( $label ).'">'. esc_html__( $label,'fl-themes-helper' ) .'</option>';
                else
                    $animators .= '<option value="'. esc_attr( $label ) .'">'. esc_html__($label,'fl-themes-helper') .'</option>';
            }
        } else {
            if($key == $value)
                $animators .= '<option selected value="'. esc_attr( $key ).'">'. esc_html__( $key,'fl-themes-helper' ) .'</option>';
            else
                $animators .= "<option value=".esc_attr( $key ).">". esc_html__($key,'fl-themes-helper') ."</option>";
        }
    }
    $animators .= '<select>';

    $output = '';
    $output .= '<div class="fl_animate_select vc_col-sm-6">';
    $output .= $animators;
    $output .= '</div>';
    $output .= '<div class="fl_animation_preview vc_col-sm-6"> <span id="fl_animate">Animate it</span></div>';
    $output .= '<script type="text/javascript">
					jQuery(document).ready(function(){
						var animator = jQuery(".'. esc_attr( $param_name ).'");
						var target_animation = jQuery("#fl_animate");
						animator.on("change",function(){
							var anim = jQuery(this).val();
							target_animation.removeClass().addClass(anim + " animated").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function(){jQuery(this).removeClass();
							});
						}); 
                        target_animation.on("click",function() {   
                            var anim = animator.val();
						       target_animation.removeClass().addClass(anim + " animated").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function(){jQuery(this).removeClass();
                            });  
						}); 
					});
				</script>';
    return $output;
}