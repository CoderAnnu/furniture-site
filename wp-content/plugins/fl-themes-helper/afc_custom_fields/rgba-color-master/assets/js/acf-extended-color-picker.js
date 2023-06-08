(function($){
	
	acf.fields.extended_color_picker = acf.field.extend({
		
		type: 'extended-color-picker',
		$input: null,
		$transparent: null,
		
		actions: {
			'ready':	'initialize',
			'append':	'initialize'
		},
		
		focus: function(){
			
			this.$input = this.$field.find('input[type="text"]');

			this.$transparent = 'url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAIAAAHnlligAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAHJJREFUeNpi+P///4EDBxiAGMgCCCAGFB5AADGCRBgYDh48CCRZIJS9vT2QBAggFBkmBiSAogxFBiCAoHogAKIKAlBUYTELAiAmEtABEECk20G6BOmuIl0CIMBQ/IEMkO0myiSSraaaBhZcbkUOs0HuBwDplz5uFJ3Z4gAAAABJRU5ErkJggg==)';
			
		},
		
		initialize: function(){
			
			// reference
			var $input = this.$input,
				$transparent = this.$transparent;

			var eventTarget,
				colorResultTarget,
				hiddenTarget,
				valueTarget;

			// args
			var args = {
				
				defaultColor: false,
				palettes: acf._e('extended_color_picker', 'palette'),
				hide: true,
				change: function(event) {
					// timeout is required to ensure the $input val is correct
					setTimeout(function(){
						
						eventTarget = $(event.target).parents('[data-target="target"]');
														
						hiddenTarget = eventTarget.find('.hiddentarget');
							
						valueTarget = eventTarget.find('.valuetarget');

						acf.val( hiddenTarget, valueTarget.val() );
						
					}, 1);
				},
				clear: function(event) {
					// timeout is required to ensure the $input val is correct
					setTimeout(function(){
						
						eventTarget = $(event.target).parents('[data-target="target"]');
							
						colorResultTarget = eventTarget.find('.wp-color-result');
						
						hiddenTarget = eventTarget.find('.hiddentarget');
						
						valueTarget = eventTarget.find('.valuetarget');
						
						colorResultTarget.css({
							'background-image' : $transparent,
							'background-color' : 'transparent'
						});

						acf.val( hiddenTarget, valueTarget.val() );
						
					}, 1);
				}
				
			}
	 			
	 		// iris
			this.$input.wpColorPicker(args);
			
		}
		
	});
	
})(jQuery);
