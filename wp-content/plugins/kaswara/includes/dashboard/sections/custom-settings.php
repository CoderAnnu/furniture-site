<?php wp_enqueue_script('kswr-code-editor-script');?>

<div class="kswr-custom-settings-right">
	
	<div class="kswr-custom-settings-item">
		<div class="kswr-custom-settings-item-title"><?php echo esc_html__('Google Maps Api','kaswara'); ?>
			<div class="kswr-codeeditor-icon" style="background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaWQ9IkxhZ2VyXzEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDEyOCAxMjg7IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB4bWw6c3BhY2U9InByZXNlcnZlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48c3R5bGUgdHlwZT0idGV4dC9jc3MiPgoJLnN0MHtmaWxsOiNGNUY1RjU7fQoJLnN0MXtmaWxsOiNFQTQzMzU7fQoJLnN0MntmaWxsOiNGQkJDMDU7fQoJLnN0M3tmaWxsOiM0Mjg1RjQ7fQoJLnN0NHtmaWxsOiMzNEE4NTM7fQo8L3N0eWxlPjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik02NCwxNGMtMjcuNiwwLTUwLDIyLjQtNTAsNTBzMjIuNCw1MCw1MCw1MHM1MC0yMi40LDUwLTUwUzkxLjYsMTQsNjQsMTR6Ii8+PGc+PGc+PHBhdGggY2xhc3M9InN0MSIgZD0iTTU2LjMsNDAuMmM1LjQtMS44LDExLjQtMS44LDE2LjgsMC4yYzIuOSwxLjEsNS43LDIuOCw4LDUuMWMtMC44LDAuOC0xLjYsMS42LTIuNCwyLjQgICAgYy0xLjUsMS41LTMuMSwzLjEtNC42LDQuNmMtMS41LTEuNS0zLjQtMi42LTUuNC0zLjFjLTIuMy0wLjctNC45LTAuOC03LjMtMC4zYy0yLjgsMC43LTUuNCwyLjEtNy41LDQuMWMtMS42LDEuNi0yLjksMy44LTMuNiw1LjkgICAgYy0yLjgtMi4xLTUuNC00LjItOC4yLTYuNEM0NS4xLDQ2LjksNTAuMyw0Mi4zLDU2LjMsNDAuMnoiLz48L2c+PGc+PHBhdGggY2xhc3M9InN0MiIgZD0iTTQwLDU5YzAuNS0yLjEsMS4xLTQuMiwyLjEtNi40YzIuOCwyLjEsNS40LDQuMiw4LjIsNi40Yy0xLjEsMy4xLTEuMSw2LjUsMCw5LjhjLTIuOCwyLjEtNS40LDQuMi04LjIsNi40ICAgIEMzOS43LDcwLjEsMzguOSw2NC40LDQwLDU5eiIvPjwvZz48Zz48cGF0aCBjbGFzcz0ic3QzIiBkPSJNNjQuNSw1OS4yYzcuOCwwLDE1LjcsMCwyMy41LDBjMC44LDQuNCwwLjcsOS0wLjcsMTMuMmMtMS4xLDMuOS0zLjMsNy41LTYuNCwxMC41Yy0yLjYtMi4xLTUuMi00LjEtOC02LjIgICAgYzIuNi0xLjgsNC40LTQuNiw1LjEtNy43Yy00LjYsMC05LjEsMC0xMy42LDBDNjQuNSw2NS43LDY0LjUsNjIuNCw2NC41LDU5LjJ6Ii8+PC9nPjxnPjxwYXRoIGNsYXNzPSJzdDQiIGQ9Ik00Mi4xLDc1LjJjMi44LTIuMSw1LjQtNC4yLDguMi02LjRjMSwzLjEsMy4xLDUuOSw1LjcsNy43YzEuNiwxLjEsMy42LDIsNS42LDIuNGMyLDAuMywzLjksMC4zLDYsMCAgICBjMi0wLjMsMy45LTEuMSw1LjYtMi4xYzIuNiwyLjEsNS4yLDQuMSw4LDYuMmMtMi45LDIuNi02LjQsNC40LTEwLjMsNS40Yy00LjIsMS04LjcsMS0xMi43LTAuMmMtMy4zLTAuOC02LjQtMi40LTkuMS00LjYgICAgQzQ2LjIsODEuMiw0My44LDc4LjMsNDIuMSw3NS4yeiIvPjwvZz48L2c+PC9zdmc+);"></div>
		</div>
		<div class="kswr-custom-settings-item-bottom">
			<input type="text" id="kswr-gmap-api" value="<?php echo kaswara_get_single_option('googlemapsapi'); ?>" class="kswr-custom-settings-input" placeholder="<?php echo esc_html__('Google Maps Api Key','kaswara'); ?>">
		</div>
	</div>
	<div class="kswr-custom-settings-item kswr-custom-settings-item2">		
		<div class="kswr-custom-tips-title"><?php echo esc_html__('What is Custom Code ?','kaswara'); ?></div>				
		<div class="kswr-custom-tips-help">		
			<?php echo esc_html__('You can use the custom code settings to add some CSS or JavaScript code. The code you will add can override all the default plugin code. When updating the plugin you don\'t need to worry all your saved code will still there even if you delete the plugin and re-install again all your custom changes are kept.','kaswara'); ?> 
		</div>
	</div>
	<div class="kswr-custom-settings-item kswr-custom-settings-item2">		
		<div class="kswr-custom-tips-title"><?php echo esc_html__('Google Maps Api Key !','kaswara'); ?></div>				
		<div class="kswr-custom-tips-help">		
			<?php echo esc_html__('In order to use the Google Maps shortcode element you must create & provide a Google Map Api Key. Follow this','kaswara'); ?> <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">tutorial</a> <?php echo esc_html__('to learn how to create a new map JavaScript key.','kaswara'); ?>
		</div>
	</div>
	<div class="kswr-custom-settings-item kswr-custom-settings-item2">		
		<div class="kswr-custom-tips-title"><?php echo esc_html__('5 Stars Rating !','kaswara'); ?></div>				
		<div class="kswr-custom-tips-help">		
			<?php echo esc_html__('We are doing our best to provide the best products and services for our client. A 5 stars rating would be much appreciated and will keep us doing our best','kaswara'); ?> <a href="https://codecanyon.net/item/kaswara-modern-visual-composer-addons/19341477" target="_blank">rate now</a>.
		</div>
	</div>

</div>
<div class="kswr-codeeditor-c">
	<div class="kswr-codeeditor-sec">
		<div class="kswr-codeeditor-icon" style="background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGlkPSJMYWdlcl8xIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAxMjggMTI4OyIgdmVyc2lvbj0iMS4xIiB2aWV3Qm94PSIwIDAgMTI4IDEyOCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PGc+PGc+PGc+PGNpcmNsZSBjeD0iNjQiIGN5PSI2NCIgcj0iNTAiIHN0eWxlPSJmaWxsOiMzM0E5REM7Ii8+PC9nPjwvZz48cGF0aCBkPSJNOTAsNDJsLTgsNDBsLTI0LjEsOEwzNyw4MmwyLjEtMTAuN0g0OGwtMC45LDQuNGwxMi43LDQuOGwxNC42LTQuOGwyLTEwLjJINDAuMmwxLjctOC45aDM2LjMgICBsMS4xLTUuN0g0My4xbDEuOC04LjlDNDQuOSw0Miw5MCw0Miw5MCw0MnoiIHN0eWxlPSJmaWxsOiNGRkZGRkY7Ii8+PC9nPjwvc3ZnPg==);">	
		</div>
		<div class="kswr-codeeditor-css kswr-codeeditor-area" id="kswr-codeeditor-css"></div>
	</div>
	<div class="kswr-codeeditor-sec" style="margin-bottom: 10px;">
		<div class="kswr-codeeditor-icon" style="background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGlkPSJMYWdlcl8xIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAxMjggMTI4OyIgdmVyc2lvbj0iMS4xIiB2aWV3Qm94PSIwIDAgMTI4IDEyOCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PGc+PGc+PGc+PGNpcmNsZSBjeD0iNjQiIGN5PSI2NCIgcj0iNTAiIHN0eWxlPSJmaWxsOiNGMERCNEY7Ii8+PC9nPjwvZz48ZyBpZD0iTGF5ZXJfMV8xXyI+PGc+PGc+PHBhdGggZD0iTTQ4LjQsNDQuNmg4Ljd2MjQuNWMwLDExLTUuMywxNC45LTEzLjcsMTQuOWMtMi4xLDAtNC43LTAuMy02LjQtMC45bDEtNy4xICAgICAgYzEuMiwwLjQsMi44LDAuNyw0LjUsMC43YzMuNywwLDYtMS43LDYtNy42TDQ4LjQsNDQuNkw0OC40LDQ0LjZ6IiBzdHlsZT0iZmlsbDojMzIzMzMwOyIvPjxwYXRoIGQ9Ik02NC44LDc0LjRjMi4zLDEuMiw2LDIuNCw5LjcsMi40YzQsMCw2LjEtMS43LDYuMS00LjNjMC0yLjQtMS44LTMuOC02LjUtNS40ICAgICAgYy02LjQtMi4zLTEwLjctNS45LTEwLjctMTEuNkM2My40LDQ5LDY5LDQ0LDc4LjEsNDRjNC40LDAsNy42LDAuOSw5LjksMmwtMiw3Yy0xLjUtMC43LTQuMy0xLjgtOC0xLjhjLTMuOCwwLTUuNiwxLjgtNS42LDMuNyAgICAgIGMwLDIuNSwyLjEsMy42LDcuMiw1LjVjNi44LDIuNSwxMCw2LjEsMTAsMTEuNmMwLDYuNS00LjksMTItMTUuNiwxMmMtNC40LDAtOC44LTEuMi0xMS0yLjRMNjQuOCw3NC40eiIgc3R5bGU9ImZpbGw6IzMyMzMzMDsiLz48L2c+PC9nPjwvZz48L2c+PC9zdmc+);">
			
		</div>
		<div class="kswr-codeeditor-js kswr-codeeditor-area" id="kswr-codeeditor-js"></div>
	</div>
	<div class="kswr-custom-save">
		<div class="kswr-custom-insider">
			<div class="kswr-custom-save-button" onclick="kswr_save_custom_code();"><?php echo esc_html__('Save Custom Code','kaswara'); ?></div>
			<div class="kswr-custom-save-sit" data-situation="none">
				<div class="kswr-custom-save-loading"></div>
				<div class="kswr-custom-save-done">&#10003;</div>
			</div>	
		</div>
	</div>
</div>
