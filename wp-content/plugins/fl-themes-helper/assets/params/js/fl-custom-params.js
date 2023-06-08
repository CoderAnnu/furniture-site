/*
    Slider Params
*/
( function( $ ) {
	"use strict";

	var $sliders = $( '.fl-vc-slider' );

	$sliders.each( function() {
		var $slider_wrap = $( this ),
			$slider      = $slider_wrap.children( '.fl-slider' ),
			$input       = $slider_wrap.siblings( '.fl-value' );

		$slider.slider( {
			animate: 'fast',
			min:     parseFloat( $slider.attr( 'data-min' ) ),
			max:     parseFloat( $slider.attr( 'data-max' ) ),
			step:    parseFloat( $slider.attr( 'data-step' ) ),
			value:   parseFloat( $slider.attr( 'data-value' ) ),
			range:   $slider_wrap.is( '.fl-fill' ) ? 'min' : false
		} );

		if ( $input.length ) {
			$slider.on( 'slide', function( event, ui ) {
				if ( ui.value === +ui.value && ui.value !== ( ui.value|0 )  ) {
					ui.value = ui.value.toFixed( 2 );
				}

				$input.val( ui.value );
			} );

			$input.on( 'change', function() {
				$slider.slider( 'value', $input.val() );

				var _value = $slider.slider( 'value' );
				if ( _value === +_value && _value !== ( _value|0 )  ) {
					_value = _value.toFixed( 2 );
				}

				$input.val( _value );
			} )
		}
	} );

} )( jQuery );

/*
    Preview
*/
( function( $ ) {
    "use strict";

    $('.fl_style,.list_style,.map_style,.title_style_text,.icon_box_style,.portfolio_style,.team_style').bind('change keyup', function(e) {
        $(this).parent().parent().parent().find('.fl_image_preview_select option').removeAttr("selected");
        $(this).parent().parent().parent().find('.preview-image-hide').hide();
        var current_selected = $(this).val();
        if(current_selected){
            $(this).parent().parent().parent().find('.fl_img_preview .'+current_selected).show();
            $(this).parent().parent().parent().find('.fl_image_preview_select option[class="'+current_selected+'"]').attr('selected', 'selected');
        }
    });

} )( jQuery );


// Switch
( function( $ ) {
    "use strict";


    $('.switch-option-enable').on('click',function(){
        if (!$(this).hasClass('selected')) {
            var c = $(this).parent().find('select');
            $(this).parent().find('.selected').removeClass('selected');
            $(this).addClass('selected');
            c.val(1).trigger('change');
        }
    });


    $('.switch-option-disable').on('click',function(){
        if (!$(this).hasClass("selected")) {
            var c = $(this).parent().find('select');
            $(this).parent().find('.selected').removeClass("selected");
            $(this).addClass("selected");
            c.val(0).trigger('change');
        }
    });

} )( jQuery );


// Text Align Params
( function( $ ) {
    "use strict";

    var $aligns = $( '.fl-param-text-align' );

    $aligns.each( function() {
        var $align  = $( this ),
            $input  = $align.siblings( '.fl-align-value' ),
            $radios = $align.find( '.fl-align-radio' );

        $align.on( 'change', '.fl-align-radio', function() {
            $input.val( $( this ).val() );
        } );

        $input.on( 'change', function() {
            $radios.filter( '[value="' + $input.val() + '"]' ).click();
        } );
    } );
} )( jQuery );



// image picker
( function( $ ) {
    "use strict";

    $( '.fl-radio-img-selected-param' ).imagepicker()

} )( jQuery );

