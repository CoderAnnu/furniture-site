var first = 0; var second = 80; var operation = 'pending';
var fontsArray = gfonts.gFontsList;
var fontsCollection = thatajax.gFontsCollection;

jQuery(function($){
	'use strict';
	$(document).ready(function(){		
		kswr_load_fonts(first, second);
	});	
});

function kswr_load_fonts(first, second){
	fontsArray.slice(first,second).forEach(function(value,index){
		kswr_append_font(value);			
	});	
}
function kswr_load_more_fonts(){
	first += 80;  	
	second += 80;  	
	kswr_load_fonts(first, second);
}

function kswr_search_font_name(input){
	first = 0; second = 80 ;
	var fontname = jQuery(input).val();
	if(jQuery.trim(fontname) != ""){		
		jQuery('.kswr-font-element-ct-new').html('');		
		var fontresults = jQuery.grep(fontsArray, function( value, index ) {	
		  return ( value.toLowerCase().startsWith(fontname.toLowerCase()) );
		});
		jQuery('.kswr-font-element-ct-new').html('');
		fontresults.forEach(function(value,index){
			kswr_append_font(value);			
		});			
	}else{
		jQuery('.kswr-font-element-ct-new').html('');				
		fontsArray.slice(first,second).forEach(function(value,index){
			kswr_append_font(value);			
		});	
	}

}

function kswr_append_font(font_family){
	jQuery('head').append('<link href="http://fonts.googleapis.com/css?family='+font_family+'" type="text/css" media="all" rel="stylesheet">')
	var thebutton = '<div class="kswr-use-button btn-submit-blue" data-operation="remove" data-font-name="'+font_family+'" onclick="kswr_add_font(this);">Remove</div>';
	if(fontsCollection.indexOf(font_family) === -1){
		thebutton = '<div class="kswr-use-button btn-submit-blue" data-operation="add" data-font-name="'+font_family+'" onclick="kswr_add_font(this);">Add</div>';
	}

	jQuery('.kswr-font-element-ct-new').append('<div class="kswr-font-element"><div class="kswr-font-top" style="font-family:'+font_family+';">ABC</div><div class="kswr-font-bottom"><span style="font-family:'+font_family+';">'+font_family+'</span>'+thebutton+'</div></div>');
	
}

function kswr_add_font(btn){
	btn = jQuery(btn);
	var fontname = btn.attr('data-font-name'); 
	var operation = btn.attr('data-operation'); 
	jQuery.ajax({
		type :"POST",
		url : thatajax.ajax_handler,
		data :{fontname:fontname,operation:operation ,action:'kaswaraNewFontOperation'},
		success:function(data){	
			if(operation == 'add'){
				btn.attr('data-operation','remove').html('remove'); 
				if(!Array.isArray(fontsCollection))
					fontsCollection = Array();
				fontsCollection.push(fontname);
			}					
			if(operation == 'remove'){
				btn.attr('data-operation','add').html('add'); 
				fontsCollection.splice( fontsCollection.indexOf(fontname),1);
			}	
		}
	});
}

function kswr_my_collection(btn){	
	jQuery('.kswr-font-element-ct-library').html('');
	btn = jQuery(btn);
	var sit = btn.attr('data-situation');
	if(sit == 'hidden'){
		fontsCollection.forEach(function(value,index){

			jQuery('.kswr-font-element-ct-library').append('<div class="kswr-font-element"><div class="kswr-font-top" style="font-family:'+value+';">ABC</div><div class="kswr-font-bottom"><span style="font-family:'+value+';">'+value+'</span><div class="kswr-use-button btn-submit-blue" data-operation="remove" data-font-name="'+value+'" onclick="kswr_add_font(this);">REMOVE</div></div></div>')
		});	
		jQuery('.kswr-font-element-ct-library').slideDown();		
		btn.attr('data-situation','shown');
	} 
	if(sit == 'shown'){
		jQuery('.kswr-font-element-ct-library').slideUp();		
		btn.attr('data-situation','hidden');
	} 

}
