( function( $ ) {
    /*radio advanced*/
    vc.atts.fl_radio_advanced = {
        init: function (param, $field) {
            $field.find('input[type="radio"]').on('click', function () {
                $(this).parents('li').addClass('active').siblings().removeClass('active');
                $field.find('input[type="hidden"]').val($(this).val()).trigger('change');
            });
        }
    };
} )( jQuery );