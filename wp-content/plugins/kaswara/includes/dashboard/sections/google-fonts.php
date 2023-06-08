<?php wp_enqueue_script('kswr-gfont-manager');?>
<div class="kswr-fonts-container">
	<div style="width: 100%; float:left; box-sizing: border-box;">
		<div class="kswr-fonts-search">
			<input type="text" placeholder="Search for fonts" onkeyup="kswr_search_font_name(this)">
			<div class="kswr-library-fonts-button btn-submit-blue" data-situation="hidden" onclick="kswr_my_collection(this);"><?php echo esc_html__('My font library','kaswara'); ?></div>			
		</div>		
	</div>
	<div class="kswr-font-element-ct kswr-font-element-ct-library">

	</div>
	<div class="kswr-font-element-ct kswr-font-element-ct-new">
						
	</div>
	<div class="kswr-load-fonts-button btn-submit-blue" onclick="kswr_load_more_fonts();"><?php echo esc_html__('load more fonts','kaswara'); ?></div>	
</div>