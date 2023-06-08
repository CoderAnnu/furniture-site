(function($) {
	"use strict";
	$(document).ready(function() {
		$('body').on('click','.upload_image_button',function(e) {
			var custom_uploader, attachment;
			var $self;
			$self = $(this);
			e.preventDefault();
			//If the uploader object has already been created, reopen the dialog
			if (custom_uploader) {
				custom_uploader.open();
				return;
			}

			//Extend the wp.media object
			custom_uploader = wp.media.frames.file_frame = wp.media({
				title: 'Choose Image',
				button: {
					text: 'Choose Image'
				},
				multiple: false
			});

			//When a file is selected, grab the URL and set it as the text field's value
			custom_uploader.on('select', function() {
				attachment = custom_uploader.state().get('selection').first().toJSON();
				$self.siblings('.upload_image').val(attachment.url);
				$self.siblings('.image_uploaded').attr('src',attachment.url).css('display','block');
				custom_uploader.close();
			});

			//Open the uploader dialog
			custom_uploader.open();
		});
		$('body').on('click','.remove_image_button',function(e) {
			var $self = $(this);
			e.preventDefault();
			var $self = $(this);
			$self.siblings('.upload_image').val('');
			$self.siblings('.image_uploaded').attr('src','').css('display','none');
		});
		$('.edit-menu-item-_empelza_mega_menu_enabled').each(function() {
			var $self = $(this);
			var $image_select = $self.parent().parent().siblings('.field-_empelza_mega_menu_image');
			var $image_position = $self.parent().parent().siblings('.field-_empelza_mega_menu_bg_position');
			var $image_repeat = $self.parent().parent().siblings('.field-_empelza_mega_menu_bg_repeat');
			var $columns_limit = $self.parent().parent().siblings('.field-_empelza_mega_menu_limit_columns');
			if($self.val() == 0) {
				$image_select.hide();
				$image_position.hide();
				$image_repeat.hide();
				$columns_limit.hide();
			}
			$self.change(function() {
				if($self.val() == 1) {
					$image_select.show();
					$image_position.show();
					$image_repeat.show();
					$columns_limit.show();
				}else {
					$image_select.hide();
					$image_position.hide();
					$image_repeat.hide();
					$columns_limit.hide();
				}
			});
		});


		// Icon Picker Mega Menu
        $('.fl-mega-menu-icons-picker').fontIconPicker({
            emptyIcon			: false,
            hasSearch			: true,
            iconsPerPage      	: 54
        });

	});

    $( document ).ajaxComplete(function() {

        $('.fl-mega-menu-icons-picker').fontIconPicker({
            emptyIcon			: false,
            hasSearch			: true,
            iconsPerPage      	: 54
        });


        $('body').on('click','.upload_image_button',function(e) {
            var custom_uploader, attachment;
            var $self;
            $self = $(this);
            e.preventDefault();
            //If the uploader object has already been created, reopen the dialog
            if (custom_uploader) {
                custom_uploader.open();
                return;
            }

            //Extend the wp.media object
            custom_uploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: false
            });

            //When a file is selected, grab the URL and set it as the text field's value
            custom_uploader.on('select', function() {
                attachment = custom_uploader.state().get('selection').first().toJSON();
                $self.siblings('.upload_image').val(attachment.url);
                $self.siblings('.image_uploaded').attr('src',attachment.url).css('display','block');
                custom_uploader.close();
            });

            //Open the uploader dialog
            custom_uploader.open();
        });
        $('body').on('click','.remove_image_button',function(e) {
            var $self = $(this);
            e.preventDefault();
            var $self = $(this);
            $self.siblings('.upload_image').val('');
            $self.siblings('.image_uploaded').attr('src','').css('display','none');
        });
        $('.edit-menu-item-_empelza_mega_menu_enabled').each(function() {
            var $self = $(this);
            var $image_select = $self.parent().parent().siblings('.field-_empelza_mega_menu_image');
            var $image_position = $self.parent().parent().siblings('.field-_empelza_mega_menu_bg_position');
            var $image_repeat = $self.parent().parent().siblings('.field-_empelza_mega_menu_bg_repeat');
            var $columns_limit = $self.parent().parent().siblings('.field-_empelza_mega_menu_limit_columns');
            if($self.val() == 0) {
                $image_select.hide();
                $image_position.hide();
                $image_repeat.hide();
                $columns_limit.hide();
            }
            $self.change(function() {
                if($self.val() == 1) {
                    $image_select.show();
                    $image_position.show();
                    $image_repeat.show();
                    $columns_limit.show();
                }else {
                    $image_select.hide();
                    $image_position.hide();
                    $image_repeat.hide();
                    $columns_limit.hide();
                }
            });
        });
    });


    // Activate Theme Function JSON
    $('a.activation-theme').on("click", function(e) {
        if(!$(this).data('activationtheme'))return;
        var $input = $(this).siblings('input');
        var value = $input.val();
        var body = $('body');
        var title = body.find('.box-title .title.activation').removeClass('true').addClass();
        var badge = body.find('.box-title .dashboard-badge.activation').removeClass('true').addClass();
        var str = JSON.stringify(value);
        var data = {
            action: 'theme_activation',
            code: value,
            nonce_code : pixAjax.nonce
        };
        $input.parent().parent().css('opacity', '0.6');
        $.post( pixAjax.url, data, function(response) {
            $input.parent().parent().css('opacity', '1');
            if(response == 1){
                location.reload();
            }else{
                alert('Error: check your code and try again');
            }


        });
    });
    $('a.delete_key').on("click", function(e) {
        if(!$(this).data('key_activate'))return;
        var $input = $(this).parent().find('.activation-input');
        var body = $('body');
        var title = body.find('.box-title .title.activation').removeClass('true').addClass();
        var badge = body.find('.box-title .dashboard-badge.activation').removeClass('true').addClass();
        var data = {
            action: 'delete_key_activation',
            nonce_code : pixAjax.nonce
        };
        $.post( pixAjax.url, data, function(response) {
            if(response == 1){
                $input.val('');
                alert('The key deactivated');
                location.reload();
            }else{
                alert('Deactivate the key failed');
            }
        });
    });
    $('a.pix_hide_notice').on("click", function(e) {
        var $div = $(this).closest('#pix_admin_notice');
        var data = {
            action: 'pix_hide_admin_notice',
            nonce_code : pixAjax.nonce
        };
        $.post( pixAjax.url, data, function(response) {
            $div.detach();
            if(response == 1){

            }else{
            }
        });
    });
    $('a.adm_notice_stblock').on("click", function(e) {

        var $div = $(this).parent('#pix_admin_notice');
        var data = {
            action: 'pix_hide_notice_stblock',
            nonce_code : pixAjax.nonce
        };
        $.post( pixAjax.url, data, function(response) {
            if(response == 1){

            }else{
            }
        });
    });

})(jQuery);
