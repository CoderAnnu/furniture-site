( function( $ ) {
    /*hotspot*/
    vc.atts.fl_hotspot_param = {
        init: function (param, $field) {
            if(!$field.prev().data('vc-shortcode-param-name') || !$field.prev().data('vc-shortcode-param-name') == 'image') {
                return false;
            }

            var imgSrc = '',
                $imgInput = $field.prev().find('input[name="image"]'),
                previewImage = function() {
                    if($field.prev().find('img').length > 0) {
                        var id = $field.find('.fl_hotspot_ls_var').attr('id');
                        imgSrc = $field.prev().find('img').attr('src');
                        imgSrc = imgSrc.replace('-150x150', '', imgSrc);
                        if($field.find('img.fl-hotspot-image').length > 0) {
                            $field.find('img.fl-hotspot-image').attr('src', imgSrc);
                        } else {
                            $field.find('.fl-hotspot-image-holder').append('<img src="'+imgSrc+'" alt="Preview image" class="fl-hotspot-image" />');
                        }
                        $field.find('.fl-hotspot-image-holder').hotspot({
                            mode:			'admin',
                            LS_Variable:	'#'+id,
                            popupTitle:		$field.find('.fl-hotspot-image-holder').data('popup-title') ? $field.find('.fl-hotspot-image-holder').data('popup-title') : 'Save',
                            saveText:		$field.find('.fl-hotspot-image-holder').data('save-text') ? $field.find('.fl-hotspot-image-holder').data('save-text') : 'Save',
                            closeText:		$field.find('.fl-hotspot-image-holder').data('close-text') ? $field.find('.fl-hotspot-image-holder').data('close-text') : 'Close',
                            dataStuff: [
                                {
                                    'property': 'Title',
                                    'default': 'Please enter title here'
                                },
                                {
                                    'property': 'Message',
                                    'default': 'Please enter content here'
                                }
                            ]
                        });
                    }
                };

            previewImage();
            $imgInput.change(function() {
                previewImage();
            });
        },
    };
} )( jQuery );