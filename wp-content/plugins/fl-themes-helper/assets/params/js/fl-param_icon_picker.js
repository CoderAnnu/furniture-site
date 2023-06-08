( function( $ ) {
    /*radio image*/
    vc.atts.fl_radio_image_select = {
        render: function (param, value) {
            return value;
        },
        init: function (param, $field) {
            $field.find('.wpb_vc_param_value').imagepicker();
        }
    };
} )( jQuery );