(function ($) {
  vc.atts.fl_font_setting = {
        parse: function (param) {
            var $field = this.content().find('.wpb_vc_param_value[name=' + param.param_name + ']');
            var $block = $field.parent();
            var options = {},
                string_pieces,
                string;
            options.font_size = $block.find('.vc_font_container_form_field-font_size-input').val();
            options.line_height = $block.find('.vc_font_container_form_field-line_height-input').val();
            options.letter_spacing = $block.find('.vc_font_container_form_field-letter_spacing-input').val();
            options.font_style_italic = $block.find('.vc_font_container_form_field-font_style-checkbox.italic').prop('checked') ? "1" : "";
            options.font_style_bold = $block.find('.vc_font_container_form_field-font_style-checkbox.bold').prop('checked') ? "1" : "";
            options.font_style_underline = $block.find('.vc_font_container_form_field-font_style-checkbox.underline').prop('checked') ? "1" : "";
            string_pieces = _.map(options, function (value, key) {
                if (_.isString(value) && 0 < value.length) {
                    return key + ':' + encodeURIComponent(value);
                }
            });
            string = $.grep(string_pieces, function (value) {
                return _.isString(value) && 0 < value.length;
            }).join('|');
            return string;
        }
    };

})(window.jQuery);