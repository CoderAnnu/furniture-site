(function($) {
    "use strict";
    // VC Responsive CSS Editor Parameter JS
    vc.atts.fl_responsive_css_editor = {
        parse: function(param) {
            var $field = this.content().find('.wpb_vc_param_value[name=' + param.param_name + ']');
            var $field_wrap = $field.parent();
            var data_array = {};
            var output_map;
            var output;

            // Desktop values
            data_array.margin_top_desktop = $field_wrap.find('[data-name="margin-top-desktop"]').val();
            data_array.margin_right_desktop = $field_wrap.find('[data-name="margin-right-desktop"]').val();
            data_array.margin_bottom_desktop = $field_wrap.find('[data-name="margin-bottom-desktop"]').val();
            data_array.margin_left_desktop = $field_wrap.find('[data-name="margin-left-desktop"]').val();

            data_array.border_top_desktop = $field_wrap.find('[data-name="border-top-desktop"]').val();
            data_array.border_right_desktop = $field_wrap.find('[data-name="border-right-desktop"]').val();
            data_array.border_bottom_desktop = $field_wrap.find('[data-name="border-bottom-desktop"]').val();
            data_array.border_left_desktop = $field_wrap.find('[data-name="border-left-desktop"]').val();

            data_array.padding_top_desktop = $field_wrap.find('[data-name="padding-top-desktop"]').val();
            data_array.padding_right_desktop = $field_wrap.find('[data-name="padding-right-desktop"]').val();
            data_array.padding_bottom_desktop = $field_wrap.find('[data-name="padding-bottom-desktop"]').val();
            data_array.padding_left_desktop = $field_wrap.find('[data-name="padding-left-desktop"]').val();

            data_array.background_position_desktop = $field_wrap.find('[data-name="background-position-desktop"]').val();
            data_array.hide_image_desktop = $field_wrap.find('[data-name="hide-image-desktop"]').val();
            data_array.height_desktop = $field_wrap.find('[data-name="height-desktop"]').val();
            data_array.width_desktop = $field_wrap.find('[data-name="width-desktop"]').val();

            // Tablet values
            data_array.margin_top_tablet = $field_wrap.find('[data-name="margin-top-tablet"]').val();
            data_array.margin_right_tablet = $field_wrap.find('[data-name="margin-right-tablet"]').val();
            data_array.margin_bottom_tablet = $field_wrap.find('[data-name="margin-bottom-tablet"]').val();
            data_array.margin_left_tablet = $field_wrap.find('[data-name="margin-left-tablet"]').val();

            data_array.border_top_tablet = $field_wrap.find('[data-name="border-top-tablet"]').val();
            data_array.border_right_tablet = $field_wrap.find('[data-name="border-right-tablet"]').val();
            data_array.border_bottom_tablet = $field_wrap.find('[data-name="border-bottom-tablet"]').val();
            data_array.border_left_tablet = $field_wrap.find('[data-name="border-left-tablet"]').val();

            data_array.padding_top_tablet = $field_wrap.find('[data-name="padding-top-tablet"]').val();
            data_array.padding_right_tablet = $field_wrap.find('[data-name="padding-right-tablet"]').val();
            data_array.padding_bottom_tablet = $field_wrap.find('[data-name="padding-bottom-tablet"]').val();
            data_array.padding_left_tablet = $field_wrap.find('[data-name="padding-left-tablet"]').val();

            data_array.background_position_tablet = $field_wrap.find('[data-name="background-position-tablet"]').val();
            data_array.hide_image_tablet = $field_wrap.find('[data-name="hide-image-tablet"]').val();
            data_array.height_tablet = $field_wrap.find('[data-name="height-tablet"]').val();
            data_array.width_tablet = $field_wrap.find('[data-name="width-tablet"]').val();

            // Mobile values
            data_array.margin_top_mobile = $field_wrap.find('[data-name="margin-top-mobile"]').val();
            data_array.margin_right_mobile = $field_wrap.find('[data-name="margin-right-mobile"]').val();
            data_array.margin_bottom_mobile = $field_wrap.find('[data-name="margin-bottom-mobile"]').val();
            data_array.margin_left_mobile = $field_wrap.find('[data-name="margin-left-mobile"]').val();

            data_array.border_top_mobile = $field_wrap.find('[data-name="border-top-mobile"]').val();
            data_array.border_right_mobile = $field_wrap.find('[data-name="border-right-mobile"]').val();
            data_array.border_bottom_mobile = $field_wrap.find('[data-name="border-bottom-mobile"]').val();
            data_array.border_left_mobile = $field_wrap.find('[data-name="border-left-mobile"]').val();

            data_array.padding_top_mobile = $field_wrap.find('[data-name="padding-top-mobile"]').val();
            data_array.padding_right_mobile = $field_wrap.find('[data-name="padding-right-mobile"]').val();
            data_array.padding_bottom_mobile = $field_wrap.find('[data-name="padding-bottom-mobile"]').val();
            data_array.padding_left_mobile = $field_wrap.find('[data-name="padding-left-mobile"]').val();

            data_array.background_position_mobile = $field_wrap.find('[data-name="background-position-mobile"]').val();
            data_array.hide_image_mobile = $field_wrap.find('[data-name="hide-image-mobile"]').val();
            data_array.height_mobile = $field_wrap.find('[data-name="height-mobile"]').val();
            data_array.width_mobile = $field_wrap.find('[data-name="width-mobile"]').val();

            output_map = _.map(data_array, function(value, key) {
                if (_.isString(value) && 0 < value.length) {
                    // if user have not entered pixel value
                    if( !( key == 'hide_image_desktop' || key == 'hide_image_tablet' || key == 'hide_image_mobile' ) && $.isNumeric( value ) ) {
                        value = value + 'px';
                    }
                    return key + ':' + encodeURIComponent(value);
                }
            });
            output = $.grep(output_map, function(value) {
                return _.isString(value) && 0 < value.length;
            }).join('|');
            return output;
        },
        init: function(param, $field) {
            $('h3.fl-helping-responsive-css-heading', $field).click(function(e) {
                var selected_tab = $(this).attr('data-device');
                $(this).parent().parent().find('.active').removeClass('active');
                $(this).addClass('active');
                $(this).parents('.fl-helping-responsive-css-container').find('.'+selected_tab).addClass('active');
            });
        }
    };

})(jQuery);