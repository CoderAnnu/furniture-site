<div class="kswr-admin-container-features" data-situation="done">
	<?php kaswara_loading_area_insider(); ?>
	<div class="kswr-demo-list-chooser">
		<div class="kswr-demo-chooser-btn" onclick="kaswara_ajax_demos('https://raw.githubusercontent.com/SayenThemes/kaswara-templates/master/files/homes/home-demos.json',this)"><?php echo esc_html__('HOME DEMO PAGES','kaswara'); ?></div>
		<div class="kswr-demo-chooser-btn noactive" onclick="kaswara_ajax_demos('https://raw.githubusercontent.com/SayenThemes/kaswara-templates/master/files/elements/element-demos.json',this)"><?php echo esc_html__('ELEMENT EXAMPLES','kaswara'); ?></div>
	</div>
	<div class="kswr-demo-list" style=" padding-right: 20px; padding-top: 10px;">
	</div>
</div>

<script type="text/javascript">
	var demoHomeUrlKaswara = 'https://raw.githubusercontent.com/SayenThemes/kaswara-templates/master/files/homes/home-demos.json';
	jQuery(function($){
		$(document).ready(function() {
			kaswara_ajax_demos(demoHomeUrlKaswara,$('.kswr-demo-chooser-btn:first-of-type'));
		})
	});


	//Ajax Function to Get Demos
	function kaswara_ajax_demos(url,btnname){	
		if(jQuery.trim(url) != ''){
			jQuery('.kswr-demo-chooser-btn').addClass('noactive');
			jQuery(btnname).removeClass('noactive');
			jQuery('.kswr-admin-container-features').attr({'data-situation':'loading'}); 
			jQuery.ajax({
				type :"GET",
				url:url,
				success:function(data){
					jQuery('.kswr-demo-list').html('');
					if(data != ''){
						data = JSON.parse(data);
						data.forEach(function(demo){
							//Print demos to the page 
							jQuery('.kswr-demo-list').append('<div class="kswr-demo-item" data-demoname="'+demo.name+'" data-contenturl="'+demo.contentUrl+'"><img src="'+demo.thumbnail+'"><div class="kswr-demo-item-name">'+demo.name+'</div><div class="kswr-demo-item-actions"><a class="kswr-demo-item-button" onclick="kaswara_demo_importer(this);">Import Demo</a><a class="kswr-demo-item-button kswr-thexml" onclick="kaswara_demo_downloadxml(this);" >Download XML</a><a class="kswr-demo-item-preview" href="'+demo.previewUr+'" target="_blank">Preview</a></div></div>');		
						});	
					}
					kaswara_action_success();			
					jQuery('.kswr-admin-container-features').attr({'data-situation':'done'}); 
				}
			});
		}	
	}

</script>