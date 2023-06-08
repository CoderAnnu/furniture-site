(function( $ ) {
	'use strict';
	$(document).on('click', '.sl-button', function() {
		var button = $(this);
		var post_id = button.attr('data-post-id');
		var security = button.attr('data-nonce');
		var iscomment = button.attr('data-iscomment');
		var allbuttons;
		if ( iscomment === '1' ) { /* Comments can have same id */
			allbuttons = $('.sl-comment-button-'+post_id);
		} else {
			allbuttons = $('.sl-button-'+post_id);
		}
		var loader = allbuttons.next('#sl-loader');
		if (post_id !== '') {
			$.ajax({
				type: 'POST',
				url: simpleLikes.ajaxurl,
				data : {
					action : 'process_simple_like',
					post_id : post_id,
					nonce : security,
					is_comment : iscomment,
				},
				beforeSend:function(){
					loader.html('&nbsp;<div class="loader">Loading...</div>');
				},
				success: function(response){
                    var count = response.count;
					var icon = response.icon;
					allbuttons.html(icon+count);
					if(response.status === 'unliked') {
						var like_text = simpleLikes.like;
						allbuttons.prop(like_text,'title');
						allbuttons.removeClass('liked');
					} else {
						var unlike_text = simpleLikes.unlike;
						allbuttons.prop(unlike_text,'title');
						allbuttons.addClass('liked');
					}
					loader.empty();					
				}
			});
			
		}
		return false;
	});
})( jQuery );
