jQuery('body').find('.color-picker').minicolors({animationSpeed: 50,animationEasing: 'swing',change: null,changeDelay: 0,control: 'hue',
		dataUris: true,defaultValue: '',format: 'rgb',hide: null,hideSpeed: 100,inline: false,keywords: '', 
		letterCase: 'lowercase',opacity: true,position: 'bottom right',show: null,showSpeed: 100,theme: 'default',swatches: [],
		change: function(value, opacity) {
			var elem = jQuery(this);
			var type = elem.attr('data-type');
			if(jQuery.trim(type) == 'border'){
				var ctn = elem.parent('.vc-kswr-border-maker');
				var input = elem.parents('.minicolors').parents('.vc-kswr-border-maker').find('.kswr-bmaker-value');
				var typeName = elem.attr('data-name');
				var values = '';
				if(jQuery.trim(input.val()) != ''){
					values = JSON.parse(input.val());
				}else{
					values = JSON.parse('{"borderwidth":"0px", "bordercolor1":"transparent", "borderstyle":"none", "bordergradientdirection":"none", "bordercolor2":"transparent"}');		
				}
				values[typeName] = elem.val();
				input.val(JSON.stringify(values));			
			}


			if(jQuery.trim(type) == 'gradient'){
				var typeName = elem.attr('data-name');
				var input = elem.parent('.minicolors').parents('.kswr-gradient-chooser').find('.kswr-ch-gradient-value');
				var values = '';
				elem.attr('value',value);
				if(jQuery.trim(input.val()) != ''){
					values = JSON.parse(input.val());
				}else{
					values = JSON.parse('{type:"color", color1:"", color2:"", direction:"to left"}');		
				}
				values[typeName] = elem.val();
				input.val(JSON.stringify(values));	
			}
			if(jQuery.trim(type) == 'overlay'){
				var typeName = elem.attr('data-name');
				var input = elem.parent('.minicolors').parents('.vc-kswr-background-maker').find('.kswr-backmaker-value'); 
				var values = '';
				elem.attr('value',value);
				if(jQuery.trim(input.val()) != ''){
					values = JSON.parse(input.val());
				}else{
					values = JSON.parse('{"image":"", "repeat":"no-repeat", "position":"left top", "size":"cover", "overlay":"", "overlayopacity":"0"}');		
				}
				values[typeName] = elem.val();
				input.val(JSON.stringify(values));	
			}

	    }
	});


jQuery('body').find('.kswr-datepicker').flatpickr({
 	minDate: new Date(),enableTime: true,altInput: true, altFormat: "Y-m-d h:i K"
});

jQuery('body').find('.kswr-hotspot-insider').each(function(){
	jQuery(this).sayenhotspot({
		backend : true
	});
});