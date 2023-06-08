<?php



add_action('vc_base_register_front_css', 'fl_helping_vc_iconpicker_base_register_css');
add_action('vc_base_register_admin_css', 'fl_helping_vc_iconpicker_base_register_css');

if (!function_exists('fl_helping_vc_iconpicker_base_register_css')) {
	function fl_helping_vc_iconpicker_base_register_css()
	{
		wp_register_style('etline',      plugin_dir_url(__FILE__) . 'icon_assets/css/etline.min.css');
		wp_register_style('iconmoon',    plugin_dir_url(__FILE__) . 'icon_assets/css/iconmoon.min.css');
		wp_register_style('linearicons', plugin_dir_url(__FILE__) . 'icon_assets/css/linearicons.min.css');
        wp_register_style('elusive',     plugin_dir_url(__FILE__) . 'icon_assets/css/elusive.min.css');
        wp_register_style('flicon',      plugin_dir_url(__FILE__) . 'icon_assets/css/fl-icon.css');
        wp_register_style('iconic',      plugin_dir_url(__FILE__) . 'icon_assets/css/iconic.min.css');


        wp_register_style('essential',   plugin_dir_url(__FILE__) . 'icon_assets/css/essential.css');
        //
        wp_register_style('flquote', plugin_dir_url(__FILE__) . 'icon_assets/css/fl-quote-icon.min.css');
        wp_register_style('flvideo', plugin_dir_url(__FILE__) . 'icon_assets/css/fl-video-icon.min.css');
        wp_register_style('flclose', plugin_dir_url(__FILE__) . 'icon_assets/css/fl-close-icon.min.css');
        wp_register_style('flalert', plugin_dir_url(__FILE__) . 'icon_assets/css/fl-alert-icon.min.css');
	}
}


add_action('vc_backend_editor_enqueue_js_css', 'fl_helping_vc_iconpicker_editor_jscss');
add_action('vc_frontend_editor_enqueue_js_css', 'fl_helping_vc_iconpicker_editor_jscss');

if (!function_exists('fl_helping_vc_iconpicker_editor_jscss')) {
	function fl_helping_vc_iconpicker_editor_jscss()
	{
		wp_enqueue_style('etline');
		wp_enqueue_style('iconmoon');
		wp_enqueue_style('linearicons');
        wp_enqueue_style('elusive');
        wp_enqueue_style('flicon');
        wp_enqueue_style('iconic');
        wp_enqueue_style('essential');



        //
        wp_enqueue_style('flquote');
        wp_enqueue_style('flvideo');
        wp_enqueue_style('flclose');
        wp_enqueue_style('flalert');
    }
}


add_action('vc_enqueue_font_icon_element', 'fl_helping_enqueue_font_elusive');

if (!function_exists('fl_helping_enqueue_font_elusive')) {
	function fl_helping_enqueue_font_elusive($font)
	{
		switch ($font) {
			case 'elusive':
				wp_enqueue_style('elusive');
				break;
			case 'iconmoon':
				wp_enqueue_style('iconmoon');
				break;
            case 'etline':
                wp_enqueue_style('etline');
                break;
			case 'linearicons':
				wp_enqueue_style('linearicons');
				break;
            case 'flicon':
                wp_enqueue_style('flicon');
                break;
            case 'iconic':
                wp_enqueue_style('iconic');
                break;
            //
            case 'flquote':
                wp_enqueue_style('flquote');
                break;
            case 'flvideo':
                wp_enqueue_style('flvideo');
                break;
            case 'flclose':
                wp_enqueue_style('flclose');
                break;
            case 'flalert':
                wp_enqueue_style('flalert');
                break;
            case 'essential':
                wp_enqueue_style('essential');
                break;

        }
	}
}

add_filter('vc_iconpicker-type-linearicons', 'vc_iconpicker_type_linearicons');

if (!function_exists('vc_iconpicker_type_linearicons')) {
	function vc_iconpicker_type_linearicons($icons)
	{
		$linearicons_icons = array(
			array(
				'linearicons-font linearicons-home' => 'home'
			),
			array(
				'linearicons-font linearicons-apartment' => 'apartment'
			),
			array(
				'linearicons-font linearicons-pencil' => 'pencil'
			),
			array(
				'linearicons-font linearicons-magic-wand' => 'magic-wand'
			),
			array(
				'linearicons-font linearicons-drop' => 'drop'
			),
			array(
				'linearicons-font linearicons-lighter' => 'lighter'
			),
			array(
				'linearicons-font linearicons-poop' => 'poop'
			),
			array(
				'linearicons-font linearicons-sun' => 'sun'
			),
			array(
				'linearicons-font linearicons-moon' => 'moon'
			),
			array(
				'linearicons-font linearicons-cloud' => 'cloud'
			),
			array(
				'linearicons-font linearicons-cloud-upload' => 'cloud-upload'
			),
			array(
				'linearicons-font linearicons-cloud-download' => 'cloud-download'
			),
			array(
				'linearicons-font linearicons-cloud-sync' => 'cloud-sync'
			),
			array(
				'linearicons-font linearicons-cloud-check' => 'cloud-check'
			),
			array(
				'linearicons-font linearicons-database' => 'database'
			),
			array(
				'linearicons-font linearicons-lock' => 'lock'
			),
			array(
				'linearicons-font linearicons-cog' => 'cog'
			),
			array(
				'linearicons-font linearicons-trash' => 'trash'
			),
			array(
				'linearicons-font linearicons-dice' => 'dice'
			),
			array(
				'linearicons-font linearicons-heart' => 'heart'
			),
			array(
				'linearicons-font linearicons-star' => 'star'
			),
			array(
				'linearicons-font linearicons-star-half' => 'star-half'
			),
			array(
				'linearicons-font linearicons-star-empty' => 'star-empty'
			),
			array(
				'linearicons-font linearicons-flag' => 'flag'
			),
			array(
				'linearicons-font linearicons-envelope' => 'envelope'
			),
			array(
				'linearicons-font linearicons-paperclip' => 'paperclip'
			),
			array(
				'linearicons-font linearicons-inbox' => 'inbox'
			),
			array(
				'linearicons-font linearicons-eye' => 'eye'
			),
			array(
				'linearicons-font linearicons-printer' => 'printer'
			),
			array(
				'linearicons-font linearicons-file-empty' => 'file-empty'
			),
			array(
				'linearicons-font linearicons-file-add' => 'file-add'
			),
			array(
				'linearicons-font linearicons-enter' => 'enter'
			),
			array(
				'linearicons-font linearicons-exit' => 'exit'
			),
			array(
				'linearicons-font linearicons-graduation-hat' => 'graduation-hat'
			),
			array(
				'linearicons-font linearicons-license' => 'license'
			),
			array(
				'linearicons-font linearicons-music-note' => 'music-note'
			),
			array(
				'linearicons-font linearicons-film-play' => 'film-play'
			),
			array(
				'linearicons-font linearicons-camera-video' => 'camera-video'
			),
			array(
				'linearicons-font linearicons-camera' => 'camera'
			),
			array(
				'linearicons-font linearicons-picture' => 'picture'
			),
			array(
				'linearicons-font linearicons-book' => 'book'
			),
			array(
				'linearicons-font linearicons-bookmark' => 'bookmark'
			),
			array(
				'linearicons-font linearicons-user' => 'user'
			),
			array(
				'linearicons-font linearicons-users' => 'users'
			),
			array(
				'linearicons-font linearicons-shirt' => 'shirt'
			),
			array(
				'linearicons-font linearicons-store' => 'store'
			),
			array(
				'linearicons-font linearicons-cart' => 'cart'
			),
			array(
				'linearicons-font linearicons-tag' => 'tag'
			),
			array(
				'linearicons-font linearicons-phone-handset' => 'phone-handset'
			),
			array(
				'linearicons-font linearicons-phone' => 'phone'
			),
			array(
				'linearicons-font linearicons-pushpin' => 'pushpin'
			),
			array(
				'linearicons-font linearicons-map-marker' => 'map-marker'
			),
			array(
				'linearicons-font linearicons-map' => 'map'
			),
			array(
				'linearicons-font linearicons-location' => 'location'
			),
			array(
				'linearicons-font linearicons-calendar-full' => 'calendar-full'
			),
			array(
				'linearicons-font linearicons-keyboard' => 'keyboard'
			),
			array(
				'linearicons-font linearicons-spell-check' => 'spell-check'
			),
			array(
				'linearicons-font linearicons-screen' => 'screen'
			),
			array(
				'linearicons-font linearicons-smartphone' => 'smartphone'
			),
			array(
				'linearicons-font linearicons-tablet' => 'tablet'
			),
			array(
				'linearicons-font linearicons-laptop' => 'laptop'
			),
			array(
				'linearicons-font linearicons-laptop-phone' => 'laptop-phone'
			),
			array(
				'linearicons-font linearicons-power-switch' => 'power-switch'
			),
			array(
				'linearicons-font linearicons-bubble' => 'bubble'
			),
			array(
				'linearicons-font linearicons-heart-pulse' => 'heart-pulse'
			),
			array(
				'linearicons-font linearicons-construction' => 'construction'
			),
			array(
				'linearicons-font linearicons-pie-chart' => 'pie-chart'
			),
			array(
				'linearicons-font linearicons-chart-bars' => 'chart-bars'
			),
			array(
				'linearicons-font linearicons-gift' => 'gift'
			),
			array(
				'linearicons-font linearicons-diamond' => 'diamond'
			),
			array(
				'linearicons-font linearicons-linearicons' => 'linearicons'
			),
			array(
				'linearicons-font linearicons-dinner' => 'dinner'
			),
			array(
				'linearicons-font linearicons-coffee-cup' => 'coffee-cup'
			),
			array(
				'linearicons-font linearicons-leaf' => 'leaf'
			),
			array(
				'linearicons-font linearicons-paw' => 'paw'
			),
			array(
				'linearicons-font linearicons-rocket' => 'rocket'
			),
			array(
				'linearicons-font linearicons-briefcase' => 'briefcase'
			),
			array(
				'linearicons-font linearicons-bus' => 'bus'
			),
			array(
				'linearicons-font linearicons-car' => 'car'
			),
			array(
				'linearicons-font linearicons-train' => 'train'
			),
			array(
				'linearicons-font linearicons-bicycle' => 'bicycle'
			),
			array(
				'linearicons-font linearicons-wheelchair' => 'wheelchair'
			),
			array(
				'linearicons-font linearicons-select' => 'select'
			),
			array(
				'linearicons-font linearicons-earth' => 'earth'
			),
			array(
				'linearicons-font linearicons-smile' => 'smile'
			),
			array(
				'linearicons-font linearicons-sad' => 'sad'
			),
			array(
				'linearicons-font linearicons-neutral' => 'neutral'
			),
			array(
				'linearicons-font linearicons-mustache' => 'mustache'
			),
			array(
				'linearicons-font linearicons-alarm' => 'alarm'
			),
			array(
				'linearicons-font linearicons-bullhorn' => 'bullhorn'
			),
			array(
				'linearicons-font linearicons-volume-high' => 'volume-high'
			),
			array(
				'linearicons-font linearicons-volume-medium' => 'volume-medium'
			),
			array(
				'linearicons-font linearicons-volume-low' => 'volume-low'
			),
			array(
				'linearicons-font linearicons-volume' => 'volume'
			),
			array(
				'linearicons-font linearicons-mic' => 'mic'
			),
			array(
				'linearicons-font linearicons-hourglass' => 'hourglass'
			),
			array(
				'linearicons-font linearicons-undo' => 'undo'
			),
			array(
				'linearicons-font linearicons-redo' => 'redo'
			),
			array(
				'linearicons-font linearicons-sync' => 'sync'
			),
			array(
				'linearicons-font linearicons-history' => 'history'
			),
			array(
				'linearicons-font linearicons-clock' => 'clock'
			),
			array(
				'linearicons-font linearicons-download' => 'download'
			),
			array(
				'linearicons-font linearicons-upload' => 'upload'
			),
			array(
				'linearicons-font linearicons-enter-down' => 'enter-down'
			),
			array(
				'linearicons-font linearicons-exit-up' => 'exit-up'
			),
			array(
				'linearicons-font linearicons-bug' => 'bug'
			),
			array(
				'linearicons-font linearicons-code' => 'code'
			),
			array(
				'linearicons-font linearicons-link' => 'link'
			),
			array(
				'linearicons-font linearicons-unlink' => 'unlink'
			),
			array(
				'linearicons-font linearicons-thumbs-up' => 'thumbs-up'
			),
			array(
				'linearicons-font linearicons-thumbs-down' => 'thumbs-down'
			),
			array(
				'linearicons-font linearicons-magnifier' => 'magnifier'
			),
			array(
				'linearicons-font linearicons-cross' => 'cross'
			),
			array(
				'linearicons-font linearicons-menu' => 'menu'
			),
			array(
				'linearicons-font linearicons-list' => 'list'
			),
			array(
				'linearicons-font linearicons-chevron-up' => 'chevron-up'
			),
			array(
				'linearicons-font linearicons-chevron-down' => 'chevron-down'
			),
			array(
				'linearicons-font linearicons-chevron-left' => 'chevron-left'
			),
			array(
				'linearicons-font linearicons-chevron-right' => 'chevron-right'
			),
			array(
				'linearicons-font linearicons-arrow-up' => 'arrow-up'
			),
			array(
				'linearicons-font linearicons-arrow-down' => 'arrow-down'
			),
			array(
				'linearicons-font linearicons-arrow-left' => 'arrow-left'
			),
			array(
				'linearicons-font linearicons-arrow-right' => 'arrow-right'
			),
			array(
				'linearicons-font linearicons-move' => 'move'
			),
			array(
				'linearicons-font linearicons-warning' => 'warning'
			),
			array(
				'linearicons-font linearicons-question-circle' => 'question-circle'
			),
			array(
				'linearicons-font linearicons-menu-circle' => 'menu-circle'
			),
			array(
				'linearicons-font linearicons-checkmark-circle' => 'checkmark-circle'
			),
			array(
				'linearicons-font linearicons-cross-circle' => 'cross-circle'
			),
			array(
				'linearicons-font linearicons-plus-circle' => 'plus-circle'
			),
			array(
				'linearicons-font linearicons-circle-minus' => 'circle-minus'
			),
			array(
				'linearicons-font linearicons-arrow-up-circle' => 'arrow-up-circle'
			),
			array(
				'linearicons-font linearicons-arrow-down-circle' => 'arrow-down-circle'
			),
			array(
				'linearicons-font linearicons-arrow-left-circle' => 'arrow-left-circle'
			),
			array(
				'linearicons-font linearicons-arrow-right-circle' => 'arrow-right-circle'
			),
			array(
				'linearicons-font linearicons-chevron-up-circle' => 'chevron-up-circle'
			),
			array(
				'linearicons-font linearicons-chevron-down-circle' => 'chevron-down-circle'
			),
			array(
				'linearicons-font linearicons-chevron-left-circle' => 'chevron-left-circle'
			),
			array(
				'linearicons-font linearicons-chevron-right-circle' => 'chevron-right-circle'
			),
			array(
				'linearicons-font linearicons-crop' => 'crop'
			),
			array(
				'linearicons-font linearicons-frame-expand' => 'frame-expand'
			),
			array(
				'linearicons-font linearicons-frame-contract' => 'frame-contract'
			),
			array(
				'linearicons-font linearicons-layers' => 'layers'
			),
			array(
				'linearicons-font linearicons-funnel' => 'funnel'
			),
			array(
				'linearicons-font linearicons-text-format' => 'text-format'
			),
			array(
				'linearicons-font linearicons-text-format-remove' => 'text-format-remove'
			),
			array(
				'linearicons-font linearicons-text-size' => 'text-size'
			),
			array(
				'linearicons-font linearicons-bold' => 'bold'
			),
			array(
				'linearicons-font linearicons-italic' => 'italic'
			),
			array(
				'linearicons-font linearicons-underline' => 'underline'
			),
			array(
				'linearicons-font linearicons-strikethrough' => 'strikethrough'
			),
			array(
				'linearicons-font linearicons-highlight' => 'highlight'
			),
			array(
				'linearicons-font linearicons-text-align-left' => 'text-align-left'
			),
			array(
				'linearicons-font linearicons-text-align-center' => 'text-align-center'
			),
			array(
				'linearicons-font linearicons-text-align-right' => 'text-align-right'
			),
			array(
				'linearicons-font linearicons-text-align-justify' => 'text-align-justify'
			),
			array(
				'linearicons-font linearicons-line-spacing' => 'line-spacing'
			),
			array(
				'linearicons-font linearicons-indent-increase' => 'indent-increase'
			),
			array(
				'linearicons-font linearicons-indent-decrease' => 'indent-decrease'
			),
			array(
				'linearicons-font linearicons-pilcrow' => 'pilcrow'
			),
			array(
				'linearicons-font linearicons-direction-ltr' => 'direction-ltr'
			),
			array(
				'linearicons-font linearicons-direction-rtl' => 'direction-rtl'
			),
			array(
				'linearicons-font linearicons-page-break' => 'page-break'
			),
			array(
				'linearicons-font linearicons-sort-alpha-asc' => 'sort-alpha-asc'
			),
			array(
				'linearicons-font linearicons-sort-amount-asc' => 'sort-amount-asc'
			),
			array(
				'linearicons-font linearicons-hand' => 'hand'
			),
			array(
				'linearicons-font linearicons-pointer-up' => 'pointer-up'
			),
			array(
				'linearicons-font linearicons-pointer-right' => 'pointer-right'
			),
			array(
				'linearicons-font linearicons-pointer-down' => 'pointer-down'
			),
			array(
				'linearicons-font linearicons-pointer-left' => 'pointer-left'
			)
		);
		
		return array_merge($icons, $linearicons_icons);
		
	}
}


add_filter('vc_iconpicker-type-iconmoon', 'vc_iconpicker_type_iconmoon');

if (!function_exists('vc_iconpicker_type_iconmoon')) {
	function vc_iconpicker_type_iconmoon($icons)
	{
		$iconmoon_icons = array(
			array(
				'icnm icnm-home' => 'home'
			),
			array(
				'icnm icnm-home2' => 'home2'
			),
			array(
				'icnm icnm-home3' => 'home3'
			),
			array(
				'icnm icnm-office' => 'office'
			),
			array(
				'icnm icnm-newspaper' => 'newspaper'
			),
			array(
				'icnm icnm-pencil' => 'pencil'
			),
			array(
				'icnm icnm-pencil2' => 'pencil2'
			),
			array(
				'icnm icnm-quill' => 'quill'
			),
			array(
				'icnm icnm-pen' => 'pen'
			),
			array(
				'icnm icnm-blog' => 'blog'
			),
			array(
				'icnm icnm-eyedropper' => 'eyedropper'
			),
			array(
				'icnm icnm-droplet' => 'droplet'
			),
			array(
				'icnm icnm-paint-format' => 'paint-format'
			),
			array(
				'icnm icnm-image' => 'image'
			),
			array(
				'icnm icnm-images' => 'images'
			),
			array(
				'icnm icnm-camera' => 'camera'
			),
			array(
				'icnm icnm-headphones' => 'headphones'
			),
			array(
				'icnm icnm-music' => 'music'
			),
			array(
				'icnm icnm-play' => 'play'
			),
			array(
				'icnm icnm-film' => 'film'
			),
			array(
				'icnm icnm-video-camera' => 'video-camera'
			),
			array(
				'icnm icnm-dice' => 'dice'
			),
			array(
				'icnm icnm-pacman' => 'pacman'
			),
			array(
				'icnm icnm-spades' => 'spades'
			),
			array(
				'icnm icnm-clubs' => 'clubs'
			),
			array(
				'icnm icnm-diamonds' => 'diamonds'
			),
			array(
				'icnm icnm-bullhorn' => 'bullhorn'
			),
			array(
				'icnm icnm-connection' => 'connection'
			),
			array(
				'icnm icnm-podcast' => 'podcast'
			),
			array(
				'icnm icnm-feed' => 'feed'
			),
			array(
				'icnm icnm-mic' => 'mic'
			),
			array(
				'icnm icnm-book' => 'book'
			),
			array(
				'icnm icnm-books' => 'books'
			),
			array(
				'icnm icnm-library' => 'library'
			),
			array(
				'icnm icnm-file-text' => 'file-text'
			),
			array(
				'icnm icnm-profile' => 'profile'
			),
			array(
				'icnm icnm-file-empty' => 'file-empty'
			),
			array(
				'icnm icnm-files-empty' => 'files-empty'
			),
			array(
				'icnm icnm-file-text2' => 'file-text2'
			),
			array(
				'icnm icnm-file-picture' => 'file-picture'
			),
			array(
				'icnm icnm-file-music' => 'file-music'
			),
			array(
				'icnm icnm-file-play' => 'file-play'
			),
			array(
				'icnm icnm-file-video' => 'file-video'
			),
			array(
				'icnm icnm-file-zip' => 'file-zip'
			),
			array(
				'icnm icnm-copy' => 'copy'
			),
			array(
				'icnm icnm-paste' => 'paste'
			),
			array(
				'icnm icnm-stack' => 'stack'
			),
			array(
				'icnm icnm-folder' => 'folder'
			),
			array(
				'icnm icnm-folder-open' => 'folder-open'
			),
			array(
				'icnm icnm-folder-plus' => 'folder-plus'
			),
			array(
				'icnm icnm-folder-minus' => 'folder-minus'
			),
			array(
				'icnm icnm-folder-download' => 'folder-download'
			),
			array(
				'icnm icnm-folder-upload' => 'folder-upload'
			),
			array(
				'icnm icnm-price-tag' => 'price-tag'
			),
			array(
				'icnm icnm-price-tags' => 'price-tags'
			),
			array(
				'icnm icnm-barcode' => 'barcode'
			),
			array(
				'icnm icnm-qrcode' => 'qrcode'
			),
			array(
				'icnm icnm-ticket' => 'ticket'
			),
			array(
				'icnm icnm-cart' => 'cart'
			),
			array(
				'icnm icnm-coin-dollar' => 'coin-dollar'
			),
			array(
				'icnm icnm-coin-euro' => 'coin-euro'
			),
			array(
				'icnm icnm-coin-pound' => 'coin-pound'
			),
			array(
				'icnm icnm-coin-yen' => 'coin-yen'
			),
			array(
				'icnm icnm-credit-card' => 'credit-card'
			),
			array(
				'icnm icnm-calculator' => 'calculator'
			),
			array(
				'icnm icnm-lifebuoy' => 'lifebuoy'
			),
			array(
				'icnm icnm-phone' => 'phone'
			),
			array(
				'icnm icnm-phone-hang-up' => 'phone-hang-up'
			),
			array(
				'icnm icnm-address-book' => 'address-book'
			),
			array(
				'icnm icnm-envelop' => 'envelop'
			),
			array(
				'icnm icnm-pushpin' => 'pushpin'
			),
			array(
				'icnm icnm-location' => 'location'
			),
			array(
				'icnm icnm-location2' => 'location2'
			),
			array(
				'icnm icnm-compass' => 'compass'
			),
			array(
				'icnm icnm-compass2' => 'compass2'
			),
			array(
				'icnm icnm-map' => 'map'
			),
			array(
				'icnm icnm-map2' => 'map2'
			),
			array(
				'icnm icnm-history' => 'history'
			),
			array(
				'icnm icnm-clock' => 'clock'
			),
			array(
				'icnm icnm-clock2' => 'clock2'
			),
			array(
				'icnm icnm-alarm' => 'alarm'
			),
			array(
				'icnm icnm-bell' => 'bell'
			),
			array(
				'icnm icnm-stopwatch' => 'stopwatch'
			),
			array(
				'icnm icnm-calendar' => 'calendar'
			),
			array(
				'icnm icnm-printer' => 'printer'
			),
			array(
				'icnm icnm-keyboard' => 'keyboard'
			),
			array(
				'icnm icnm-display' => 'display'
			),
			array(
				'icnm icnm-laptop' => 'laptop'
			),
			array(
				'icnm icnm-mobile' => 'mobile'
			),
			array(
				'icnm icnm-mobile2' => 'mobile2'
			),
			array(
				'icnm icnm-tablet' => 'tablet'
			),
			array(
				'icnm icnm-tv' => 'tv'
			),
			array(
				'icnm icnm-drawer' => 'drawer'
			),
			array(
				'icnm icnm-drawer2' => 'drawer2'
			),
			array(
				'icnm icnm-box-add' => 'box-add'
			),
			array(
				'icnm icnm-box-remove' => 'box-remove'
			),
			array(
				'icnm icnm-download' => 'download'
			),
			array(
				'icnm icnm-upload' => 'upload'
			),
			array(
				'icnm icnm-floppy-disk' => 'floppy-disk'
			),
			array(
				'icnm icnm-drive' => 'drive'
			),
			array(
				'icnm icnm-database' => 'database'
			),
			array(
				'icnm icnm-undo' => 'undo'
			),
			array(
				'icnm icnm-redo' => 'redo'
			),
			array(
				'icnm icnm-undo2' => 'undo2'
			),
			array(
				'icnm icnm-redo2' => 'redo2'
			),
			array(
				'icnm icnm-forward' => 'forward'
			),
			array(
				'icnm icnm-reply' => 'reply'
			),
			array(
				'icnm icnm-bubble' => 'bubble'
			),
			array(
				'icnm icnm-bubbles' => 'bubbles'
			),
			array(
				'icnm icnm-bubbles2' => 'bubbles2'
			),
			array(
				'icnm icnm-bubble2' => 'bubble2'
			),
			array(
				'icnm icnm-bubbles3' => 'bubbles3'
			),
			array(
				'icnm icnm-bubbles4' => 'bubbles4'
			),
			array(
				'icnm icnm-user' => 'user'
			),
			array(
				'icnm icnm-users' => 'users'
			),
			array(
				'icnm icnm-user-plus' => 'user-plus'
			),
			array(
				'icnm icnm-user-minus' => 'user-minus'
			),
			array(
				'icnm icnm-user-check' => 'user-check'
			),
			array(
				'icnm icnm-user-tie' => 'user-tie'
			),
			array(
				'icnm icnm-quotes-left' => 'quotes-left'
			),
			array(
				'icnm icnm-quotes-right' => 'quotes-right'
			),
			array(
				'icnm icnm-hour-glass' => 'hour-glass'
			),
			array(
				'icnm icnm-spinner' => 'spinner'
			),
			array(
				'icnm icnm-spinner2' => 'spinner2'
			),
			array(
				'icnm icnm-spinner3' => 'spinner3'
			),
			array(
				'icnm icnm-spinner4' => 'spinner4'
			),
			array(
				'icnm icnm-spinner5' => 'spinner5'
			),
			array(
				'icnm icnm-spinner6' => 'spinner6'
			),
			array(
				'icnm icnm-spinner7' => 'spinner7'
			),
			array(
				'icnm icnm-spinner8' => 'spinner8'
			),
			array(
				'icnm icnm-spinner9' => 'spinner9'
			),
			array(
				'icnm icnm-spinner10' => 'spinner10'
			),
			array(
				'icnm icnm-spinner11' => 'spinner11'
			),
			array(
				'icnm icnm-binoculars' => 'binoculars'
			),
			array(
				'icnm icnm-search' => 'search'
			),
			array(
				'icnm icnm-zoom-in' => 'zoom-in'
			),
			array(
				'icnm icnm-zoom-out' => 'zoom-out'
			),
			array(
				'icnm icnm-enlarge' => 'enlarge'
			),
			array(
				'icnm icnm-shrink' => 'shrink'
			),
			array(
				'icnm icnm-enlarge2' => 'enlarge2'
			),
			array(
				'icnm icnm-shrink2' => 'shrink2'
			),
			array(
				'icnm icnm-key' => 'key'
			),
			array(
				'icnm icnm-key2' => 'key2'
			),
			array(
				'icnm icnm-lock' => 'lock'
			),
			array(
				'icnm icnm-unlocked' => 'unlocked'
			),
			array(
				'icnm icnm-wrench' => 'wrench'
			),
			array(
				'icnm icnm-equalizer' => 'equalizer'
			),
			array(
				'icnm icnm-equalizer2' => 'equalizer2'
			),
			array(
				'icnm icnm-cog' => 'cog'
			),
			array(
				'icnm icnm-cogs' => 'cogs'
			),
			array(
				'icnm icnm-hammer' => 'hammer'
			),
			array(
				'icnm icnm-magic-wand' => 'magic-wand'
			),
			array(
				'icnm icnm-aid-kit' => 'aid-kit'
			),
			array(
				'icnm icnm-bug' => 'bug'
			),
			array(
				'icnm icnm-pie-chart' => 'pie-chart'
			),
			array(
				'icnm icnm-stats-dots' => 'stats-dots'
			),
			array(
				'icnm icnm-stats-bars' => 'stats-bars'
			),
			array(
				'icnm icnm-stats-bars2' => 'stats-bars2'
			),
			array(
				'icnm icnm-trophy' => 'trophy'
			),
			array(
				'icnm icnm-gift' => 'gift'
			),
			array(
				'icnm icnm-glass' => 'glass'
			),
			array(
				'icnm icnm-glass2' => 'glass2'
			),
			array(
				'icnm icnm-mug' => 'mug'
			),
			array(
				'icnm icnm-spoon-knife' => 'spoon-knife'
			),
			array(
				'icnm icnm-leaf' => 'leaf'
			),
			array(
				'icnm icnm-rocket' => 'rocket'
			),
			array(
				'icnm icnm-meter' => 'meter'
			),
			array(
				'icnm icnm-meter2' => 'meter2'
			),
			array(
				'icnm icnm-hammer2' => 'hammer2'
			),
			array(
				'icnm icnm-fire' => 'fire'
			),
			array(
				'icnm icnm-lab' => 'lab'
			),
			array(
				'icnm icnm-magnet' => 'magnet'
			),
			array(
				'icnm icnm-bin' => 'bin'
			),
			array(
				'icnm icnm-bin2' => 'bin2'
			),
			array(
				'icnm icnm-briefcase' => 'briefcase'
			),
			array(
				'icnm icnm-airplane' => 'airplane'
			),
			array(
				'icnm icnm-truck' => 'truck'
			),
			array(
				'icnm icnm-road' => 'road'
			),
			array(
				'icnm icnm-accessibility' => 'accessibility'
			),
			array(
				'icnm icnm-target' => 'target'
			),
			array(
				'icnm icnm-shield' => 'shield'
			),
			array(
				'icnm icnm-power' => 'power'
			),
			array(
				'icnm icnm-switch' => 'switch'
			),
			array(
				'icnm icnm-power-cord' => 'power-cord'
			),
			array(
				'icnm icnm-clipboard' => 'clipboard'
			),
			array(
				'icnm icnm-list-numbered' => 'list-numbered'
			),
			array(
				'icnm icnm-list' => 'list'
			),
			array(
				'icnm icnm-list2' => 'list2'
			),
			array(
				'icnm icnm-tree' => 'tree'
			),
			array(
				'icnm icnm-menu' => 'menu'
			),
			array(
				'icnm icnm-menu2' => 'menu2'
			),
			array(
				'icnm icnm-menu3' => 'menu3'
			),
			array(
				'icnm icnm-menu4' => 'menu4'
			),
			array(
				'icnm icnm-cloud' => 'cloud'
			),
			array(
				'icnm icnm-cloud-download' => 'cloud-download'
			),
			array(
				'icnm icnm-cloud-upload' => 'cloud-upload'
			),
			array(
				'icnm icnm-cloud-check' => 'cloud-check'
			),
			array(
				'icnm icnm-download2' => 'download2'
			),
			array(
				'icnm icnm-upload2' => 'upload2'
			),
			array(
				'icnm icnm-download3' => 'download3'
			),
			array(
				'icnm icnm-upload3' => 'upload3'
			),
			array(
				'icnm icnm-sphere' => 'sphere'
			),
			array(
				'icnm icnm-earth' => 'earth'
			),
			array(
				'icnm icnm-link' => 'link'
			),
			array(
				'icnm icnm-flag' => 'flag'
			),
			array(
				'icnm icnm-attachment' => 'attachment'
			),
			array(
				'icnm icnm-eye' => 'eye'
			),
			array(
				'icnm icnm-eye-plus' => 'eye-plus'
			),
			array(
				'icnm icnm-eye-minus' => 'eye-minus'
			),
			array(
				'icnm icnm-eye-blocked' => 'eye-blocked'
			),
			array(
				'icnm icnm-bookmark' => 'bookmark'
			),
			array(
				'icnm icnm-bookmarks' => 'bookmarks'
			),
			array(
				'icnm icnm-sun' => 'sun'
			),
			array(
				'icnm icnm-contrast' => 'contrast'
			),
			array(
				'icnm icnm-brightness-contrast' => 'brightness-contrast'
			),
			array(
				'icnm icnm-star-empty' => 'star-empty'
			),
			array(
				'icnm icnm-star-half' => 'star-half'
			),
			array(
				'icnm icnm-star-full' => 'star-full'
			),
			array(
				'icnm icnm-heart' => 'heart'
			),
			array(
				'icnm icnm-heart-broken' => 'heart-broken'
			),
			array(
				'icnm icnm-man' => 'man'
			),
			array(
				'icnm icnm-woman' => 'woman'
			),
			array(
				'icnm icnm-man-woman' => 'man-woman'
			),
			array(
				'icnm icnm-happy' => 'happy'
			),
			array(
				'icnm icnm-happy2' => 'happy2'
			),
			array(
				'icnm icnm-smile' => 'smile'
			),
			array(
				'icnm icnm-smile2' => 'smile2'
			),
			array(
				'icnm icnm-tongue' => 'tongue'
			),
			array(
				'icnm icnm-tongue2' => 'tongue2'
			),
			array(
				'icnm icnm-sad' => 'sad'
			),
			array(
				'icnm icnm-sad2' => 'sad2'
			),
			array(
				'icnm icnm-wink' => 'wink'
			),
			array(
				'icnm icnm-wink2' => 'wink2'
			),
			array(
				'icnm icnm-grin' => 'grin'
			),
			array(
				'icnm icnm-grin2' => 'grin2'
			),
			array(
				'icnm icnm-cool' => 'cool'
			),
			array(
				'icnm icnm-cool2' => 'cool2'
			),
			array(
				'icnm icnm-angry' => 'angry'
			),
			array(
				'icnm icnm-angry2' => 'angry2'
			),
			array(
				'icnm icnm-evil' => 'evil'
			),
			array(
				'icnm icnm-evil2' => 'evil2'
			),
			array(
				'icnm icnm-shocked' => 'shocked'
			),
			array(
				'icnm icnm-shocked2' => 'shocked2'
			),
			array(
				'icnm icnm-baffled' => 'baffled'
			),
			array(
				'icnm icnm-baffled2' => 'baffled2'
			),
			array(
				'icnm icnm-confused' => 'confused'
			),
			array(
				'icnm icnm-confused2' => 'confused2'
			),
			array(
				'icnm icnm-neutral' => 'neutral'
			),
			array(
				'icnm icnm-neutral2' => 'neutral2'
			),
			array(
				'icnm icnm-hipster' => 'hipster'
			),
			array(
				'icnm icnm-hipster2' => 'hipster2'
			),
			array(
				'icnm icnm-wondering' => 'wondering'
			),
			array(
				'icnm icnm-wondering2' => 'wondering2'
			),
			array(
				'icnm icnm-sleepy' => 'sleepy'
			),
			array(
				'icnm icnm-sleepy2' => 'sleepy2'
			),
			array(
				'icnm icnm-frustrated' => 'frustrated'
			),
			array(
				'icnm icnm-frustrated2' => 'frustrated2'
			),
			array(
				'icnm icnm-crying' => 'crying'
			),
			array(
				'icnm icnm-crying2' => 'crying2'
			),
			array(
				'icnm icnm-point-up' => 'point-up'
			),
			array(
				'icnm icnm-point-right' => 'point-right'
			),
			array(
				'icnm icnm-point-down' => 'point-down'
			),
			array(
				'icnm icnm-point-left' => 'point-left'
			),
			array(
				'icnm icnm-warning' => 'warning'
			),
			array(
				'icnm icnm-notification' => 'notification'
			),
			array(
				'icnm icnm-question' => 'question'
			),
			array(
				'icnm icnm-plus' => 'plus'
			),
			array(
				'icnm icnm-minus' => 'minus'
			),
			array(
				'icnm icnm-info' => 'info'
			),
			array(
				'icnm icnm-cancel-circle' => 'cancel-circle'
			),
			array(
				'icnm icnm-blocked' => 'blocked'
			),
			array(
				'icnm icnm-cross' => 'cross'
			),
			array(
				'icnm icnm-checkmark' => 'checkmark'
			),
			array(
				'icnm icnm-checkmark2' => 'checkmark2'
			),
			array(
				'icnm icnm-spell-check' => 'spell-check'
			),
			array(
				'icnm icnm-enter' => 'enter'
			),
			array(
				'icnm icnm-exit' => 'exit'
			),
			array(
				'icnm icnm-play2' => 'play2'
			),
			array(
				'icnm icnm-pause' => 'pause'
			),
			array(
				'icnm icnm-stop' => 'stop'
			),
			array(
				'icnm icnm-previous' => 'previous'
			),
			array(
				'icnm icnm-next' => 'next'
			),
			array(
				'icnm icnm-backward' => 'backward'
			),
			array(
				'icnm icnm-forward2' => 'forward2'
			),
			array(
				'icnm icnm-play3' => 'play3'
			),
			array(
				'icnm icnm-pause2' => 'pause2'
			),
			array(
				'icnm icnm-stop2' => 'stop2'
			),
			array(
				'icnm icnm-backward2' => 'backward2'
			),
			array(
				'icnm icnm-forward3' => 'forward3'
			),
			array(
				'icnm icnm-first' => 'first'
			),
			array(
				'icnm icnm-last' => 'last'
			),
			array(
				'icnm icnm-previous2' => 'previous2'
			),
			array(
				'icnm icnm-next2' => 'next2'
			),
			array(
				'icnm icnm-eject' => 'eject'
			),
			array(
				'icnm icnm-volume-high' => 'volume-high'
			),
			array(
				'icnm icnm-volume-medium' => 'volume-medium'
			),
			array(
				'icnm icnm-volume-low' => 'volume-low'
			),
			array(
				'icnm icnm-volume-mute' => 'volume-mute'
			),
			array(
				'icnm icnm-volume-mute2' => 'volume-mute2'
			),
			array(
				'icnm icnm-volume-increase' => 'volume-increase'
			),
			array(
				'icnm icnm-volume-decrease' => 'volume-decrease'
			),
			array(
				'icnm icnm-loop' => 'loop'
			),
			array(
				'icnm icnm-loop2' => 'loop2'
			),
			array(
				'icnm icnm-infinite' => 'infinite'
			),
			array(
				'icnm icnm-shuffle' => 'shuffle'
			),
			array(
				'icnm icnm-arrow-up-left' => 'arrow-up-left'
			),
			array(
				'icnm icnm-arrow-up' => 'arrow-up'
			),
			array(
				'icnm icnm-arrow-up-right' => 'arrow-up-right'
			),
			array(
				'icnm icnm-arrow-right' => 'arrow-right'
			),
			array(
				'icnm icnm-arrow-down-right' => 'arrow-down-right'
			),
			array(
				'icnm icnm-arrow-down' => 'arrow-down'
			),
			array(
				'icnm icnm-arrow-down-left' => 'arrow-down-left'
			),
			array(
				'icnm icnm-arrow-left' => 'arrow-left'
			),
			array(
				'icnm icnm-arrow-up-left2' => 'arrow-up-left2'
			),
			array(
				'icnm icnm-arrow-up2' => 'arrow-up2'
			),
			array(
				'icnm icnm-arrow-up-right2' => 'arrow-up-right2'
			),
			array(
				'icnm icnm-arrow-right2' => 'arrow-right2'
			),
			array(
				'icnm icnm-arrow-down-right2' => 'arrow-down-right2'
			),
			array(
				'icnm icnm-arrow-down2' => 'arrow-down2'
			),
			array(
				'icnm icnm-arrow-down-left2' => 'arrow-down-left2'
			),
			array(
				'icnm icnm-arrow-left2' => 'arrow-left2'
			),
			array(
				'icnm icnm-circle-up' => 'circle-up'
			),
			array(
				'icnm icnm-circle-right' => 'circle-right'
			),
			array(
				'icnm icnm-circle-down' => 'circle-down'
			),
			array(
				'icnm icnm-circle-left' => 'circle-left'
			),
			array(
				'icnm icnm-tab' => 'tab'
			),
			array(
				'icnm icnm-move-up' => 'move-up'
			),
			array(
				'icnm icnm-move-down' => 'move-down'
			),
			array(
				'icnm icnm-sort-alpha-asc' => 'sort-alpha-asc'
			),
			array(
				'icnm icnm-sort-alpha-desc' => 'sort-alpha-desc'
			),
			array(
				'icnm icnm-sort-numeric-asc' => 'sort-numeric-asc'
			),
			array(
				'icnm icnm-sort-numberic-desc' => 'sort-numberic-desc'
			),
			array(
				'icnm icnm-sort-amount-asc' => 'sort-amount-asc'
			),
			array(
				'icnm icnm-sort-amount-desc' => 'sort-amount-desc'
			),
			array(
				'icnm icnm-command' => 'command'
			),
			array(
				'icnm icnm-shift' => 'shift'
			),
			array(
				'icnm icnm-ctrl' => 'ctrl'
			),
			array(
				'icnm icnm-opt' => 'opt'
			),
			array(
				'icnm icnm-checkbox-checked' => 'checkbox-checked'
			),
			array(
				'icnm icnm-checkbox-unchecked' => 'checkbox-unchecked'
			),
			array(
				'icnm icnm-radio-checked' => 'radio-checked'
			),
			array(
				'icnm icnm-radio-checked2' => 'radio-checked2'
			),
			array(
				'icnm icnm-radio-unchecked' => 'radio-unchecked'
			),
			array(
				'icnm icnm-crop' => 'crop'
			),
			array(
				'icnm icnm-make-group' => 'make-group'
			),
			array(
				'icnm icnm-ungroup' => 'ungroup'
			),
			array(
				'icnm icnm-scissors' => 'scissors'
			),
			array(
				'icnm icnm-filter' => 'filter'
			),
			array(
				'icnm icnm-font' => 'font'
			),
			array(
				'icnm icnm-ligature' => 'ligature'
			),
			array(
				'icnm icnm-ligature2' => 'ligature2'
			),
			array(
				'icnm icnm-text-height' => 'text-height'
			),
			array(
				'icnm icnm-text-width' => 'text-width'
			),
			array(
				'icnm icnm-font-size' => 'font-size'
			),
			array(
				'icnm icnm-bold' => 'bold'
			),
			array(
				'icnm icnm-underline' => 'underline'
			),
			array(
				'icnm icnm-italic' => 'italic'
			),
			array(
				'icnm icnm-strikethrough' => 'strikethrough'
			),
			array(
				'icnm icnm-omega' => 'omega'
			),
			array(
				'icnm icnm-sigma' => 'sigma'
			),
			array(
				'icnm icnm-page-break' => 'page-break'
			),
			array(
				'icnm icnm-superscript' => 'superscript'
			),
			array(
				'icnm icnm-subscript' => 'subscript'
			),
			array(
				'icnm icnm-superscript2' => 'superscript2'
			),
			array(
				'icnm icnm-subscript2' => 'subscript2'
			),
			array(
				'icnm icnm-text-color' => 'text-color'
			),
			array(
				'icnm icnm-pagebreak' => 'pagebreak'
			),
			array(
				'icnm icnm-clear-formatting' => 'clear-formatting'
			),
			array(
				'icnm icnm-table' => 'table'
			),
			array(
				'icnm icnm-table2' => 'table2'
			),
			array(
				'icnm icnm-insert-template' => 'insert-template'
			),
			array(
				'icnm icnm-pilcrow' => 'pilcrow'
			),
			array(
				'icnm icnm-ltr' => 'ltr'
			),
			array(
				'icnm icnm-rtl' => 'rtl'
			),
			array(
				'icnm icnm-section' => 'section'
			),
			array(
				'icnm icnm-paragraph-left' => 'paragraph-left'
			),
			array(
				'icnm icnm-paragraph-center' => 'paragraph-center'
			),
			array(
				'icnm icnm-paragraph-right' => 'paragraph-right'
			),
			array(
				'icnm icnm-paragraph-justify' => 'paragraph-justify'
			),
			array(
				'icnm icnm-indent-increase' => 'indent-increase'
			),
			array(
				'icnm icnm-indent-decrease' => 'indent-decrease'
			),
			array(
				'icnm icnm-share' => 'share'
			),
			array(
				'icnm icnm-new-tab' => 'new-tab'
			),
			array(
				'icnm icnm-embed' => 'embed'
			),
			array(
				'icnm icnm-embed2' => 'embed2'
			),
			array(
				'icnm icnm-terminal' => 'terminal'
			),
			array(
				'icnm icnm-share2' => 'share2'
			),
			array(
				'icnm icnm-mail' => 'mail'
			),
			array(
				'icnm icnm-mail2' => 'mail2'
			),
			array(
				'icnm icnm-mail3' => 'mail3'
			),
			array(
				'icnm icnm-mail4' => 'mail4'
			),
			array(
				'icnm icnm-amazon' => 'amazon'
			),
			array(
				'icnm icnm-google' => 'google'
			),
			array(
				'icnm icnm-google2' => 'google2'
			),
			array(
				'icnm icnm-google3' => 'google3'
			),
			array(
				'icnm icnm-google-plus' => 'google-plus'
			),
			array(
				'icnm icnm-google-plus2' => 'google-plus2'
			),
			array(
				'icnm icnm-google-plus3' => 'google-plus3'
			),
			array(
				'icnm icnm-hangouts' => 'hangouts'
			),
			array(
				'icnm icnm-google-drive' => 'google-drive'
			),
			array(
				'icnm icnm-facebook' => 'facebook'
			),
			array(
				'icnm icnm-facebook2' => 'facebook2'
			),
			array(
				'icnm icnm-instagram' => 'instagram'
			),
			array(
				'icnm icnm-whatsapp' => 'whatsapp'
			),
			array(
				'icnm icnm-spotify' => 'spotify'
			),
			array(
				'icnm icnm-telegram' => 'telegram'
			),
			array(
				'icnm icnm-twitter' => 'twitter'
			),
			array(
				'icnm icnm-vine' => 'vine'
			),
			array(
				'icnm icnm-vk' => 'vk'
			),
			array(
				'icnm icnm-renren' => 'renren'
			),
			array(
				'icnm icnm-sina-weibo' => 'sina-weibo'
			),
			array(
				'icnm icnm-rss' => 'rss'
			),
			array(
				'icnm icnm-rss2' => 'rss2'
			),
			array(
				'icnm icnm-youtube' => 'youtube'
			),
			array(
				'icnm icnm-youtube2' => 'youtube2'
			),
			array(
				'icnm icnm-twitch' => 'twitch'
			),
			array(
				'icnm icnm-vimeo' => 'vimeo'
			),
			array(
				'icnm icnm-vimeo2' => 'vimeo2'
			),
			array(
				'icnm icnm-lanyrd' => 'lanyrd'
			),
			array(
				'icnm icnm-flickr' => 'flickr'
			),
			array(
				'icnm icnm-flickr2' => 'flickr2'
			),
			array(
				'icnm icnm-flickr3' => 'flickr3'
			),
			array(
				'icnm icnm-flickr4' => 'flickr4'
			),
			array(
				'icnm icnm-dribbble' => 'dribbble'
			),
			array(
				'icnm icnm-behance' => 'behance'
			),
			array(
				'icnm icnm-behance2' => 'behance2'
			),
			array(
				'icnm icnm-deviantart' => 'deviantart'
			),
			array(
				'icnm icnm-500px' => '500px'
			),
			array(
				'icnm icnm-steam' => 'steam'
			),
			array(
				'icnm icnm-steam2' => 'steam2'
			),
			array(
				'icnm icnm-dropbox' => 'dropbox'
			),
			array(
				'icnm icnm-onedrive' => 'onedrive'
			),
			array(
				'icnm icnm-github' => 'github'
			),
			array(
				'icnm icnm-npm' => 'npm'
			),
			array(
				'icnm icnm-basecamp' => 'basecamp'
			),
			array(
				'icnm icnm-trello' => 'trello'
			),
			array(
				'icnm icnm-wordpress' => 'wordpress'
			),
			array(
				'icnm icnm-joomla' => 'joomla'
			),
			array(
				'icnm icnm-ello' => 'ello'
			),
			array(
				'icnm icnm-blogger' => 'blogger'
			),
			array(
				'icnm icnm-blogger2' => 'blogger2'
			),
			array(
				'icnm icnm-tumblr' => 'tumblr'
			),
			array(
				'icnm icnm-tumblr2' => 'tumblr2'
			),
			array(
				'icnm icnm-yahoo' => 'yahoo'
			),
			array(
				'icnm icnm-yahoo2' => 'yahoo2'
			),
			array(
				'icnm icnm-tux' => 'tux'
			),
			array(
				'icnm icnm-appleinc' => 'appleinc'
			),
			array(
				'icnm icnm-finder' => 'finder'
			),
			array(
				'icnm icnm-android' => 'android'
			),
			array(
				'icnm icnm-windows' => 'windows'
			),
			array(
				'icnm icnm-windows8' => 'windows8'
			),
			array(
				'icnm icnm-soundcloud' => 'soundcloud'
			),
			array(
				'icnm icnm-soundcloud2' => 'soundcloud2'
			),
			array(
				'icnm icnm-skype' => 'skype'
			),
			array(
				'icnm icnm-reddit' => 'reddit'
			),
			array(
				'icnm icnm-hackernews' => 'hackernews'
			),
			array(
				'icnm icnm-wikipedia' => 'wikipedia'
			),
			array(
				'icnm icnm-linkedin' => 'linkedin'
			),
			array(
				'icnm icnm-linkedin2' => 'linkedin2'
			),
			array(
				'icnm icnm-lastfm' => 'lastfm'
			),
			array(
				'icnm icnm-lastfm2' => 'lastfm2'
			),
			array(
				'icnm icnm-delicious' => 'delicious'
			),
			array(
				'icnm icnm-stumbleupon' => 'stumbleupon'
			),
			array(
				'icnm icnm-stumbleupon2' => 'stumbleupon2'
			),
			array(
				'icnm icnm-stackoverflow' => 'stackoverflow'
			),
			array(
				'icnm icnm-pinterest' => 'pinterest'
			),
			array(
				'icnm icnm-pinterest2' => 'pinterest2'
			),
			array(
				'icnm icnm-xing' => 'xing'
			),
			array(
				'icnm icnm-xing2' => 'xing2'
			),
			array(
				'icnm icnm-flattr' => 'flattr'
			),
			array(
				'icnm icnm-foursquare' => 'foursquare'
			),
			array(
				'icnm icnm-yelp' => 'yelp'
			),
			array(
				'icnm icnm-paypal' => 'paypal'
			),
			array(
				'icnm icnm-chrome' => 'chrome'
			),
			array(
				'icnm icnm-firefox' => 'firefox'
			),
			array(
				'icnm icnm-IE' => 'IE'
			),
			array(
				'icnm icnm-edge' => 'edge'
			),
			array(
				'icnm icnm-safari' => 'safari'
			),
			array(
				'icnm icnm-opera' => 'opera'
			),
			array(
				'icnm icnm-file-pdf' => 'file-pdf'
			),
			array(
				'icnm icnm-file-openoffice' => 'file-openoffice'
			),
			array(
				'icnm icnm-file-word' => 'file-word'
			),
			array(
				'icnm icnm-file-excel' => 'file-excel'
			),
			array(
				'icnm icnm-libreoffice' => 'libreoffice'
			),
			array(
				'icnm icnm-html-five' => 'html-five'
			),
			array(
				'icnm icnm-html-five2' => 'html-five2'
			),
			array(
				'icnm icnm-css3' => 'css3'
			),
			array(
				'icnm icnm-git' => 'git'
			),
			array(
				'icnm icnm-codepen' => 'codepen'
			),
			array(
				'icnm icnm-svg' => 'svg'
			),
			array(
				'icnm icnm-IcoMoon' => 'IcoMoon'
			),
			array(
				'icnm icnm-uni21' => 'uni21'
			),
			array(
				'icnm icnm-uni22' => 'uni22'
			),
			array(
				'icnm icnm-uni23' => 'uni23'
			),
			array(
				'icnm icnm-uni24' => 'uni24'
			),
			array(
				'icnm icnm-uni25' => 'uni25'
			),
			array(
				'icnm icnm-uni26' => 'uni26'
			),
			array(
				'icnm icnm-uni27' => 'uni27'
			),
			array(
				'icnm icnm-uni28' => 'uni28'
			),
			array(
				'icnm icnm-uni29' => 'uni29'
			),
			array(
				'icnm icnm-uni2A' => 'uni2A'
			),
			array(
				'icnm icnm-uni2B' => 'uni2B'
			),
			array(
				'icnm icnm-uni2C' => 'uni2C'
			),
			array(
				'icnm icnm-uni2D' => 'uni2D'
			),
			array(
				'icnm icnm-uni2E' => 'uni2E'
			),
			array(
				'icnm icnm-uni2F' => 'uni2F'
			),
			array(
				'icnm icnm-uni30' => 'uni30'
			),
			array(
				'icnm icnm-uni31' => 'uni31'
			),
			array(
				'icnm icnm-uni32' => 'uni32'
			),
			array(
				'icnm icnm-uni33' => 'uni33'
			),
			array(
				'icnm icnm-uni34' => 'uni34'
			),
			array(
				'icnm icnm-uni35' => 'uni35'
			),
			array(
				'icnm icnm-uni36' => 'uni36'
			),
			array(
				'icnm icnm-uni37' => 'uni37'
			),
			array(
				'icnm icnm-uni38' => 'uni38'
			),
			array(
				'icnm icnm-uni39' => 'uni39'
			),
			array(
				'icnm icnm-uni3A' => 'uni3A'
			),
			array(
				'icnm icnm-uni3B' => 'uni3B'
			),
			array(
				'icnm icnm-uni3C' => 'uni3C'
			),
			array(
				'icnm icnm-uni3D' => 'uni3D'
			),
			array(
				'icnm icnm-uni3E' => 'uni3E'
			),
			array(
				'icnm icnm-uni3F' => 'uni3F'
			),
			array(
				'icnm icnm-uni40' => 'uni40'
			),
			array(
				'icnm icnm-uni41' => 'uni41'
			),
			array(
				'icnm icnm-uni42' => 'uni42'
			),
			array(
				'icnm icnm-uni43' => 'uni43'
			),
			array(
				'icnm icnm-uni44' => 'uni44'
			),
			array(
				'icnm icnm-uni45' => 'uni45'
			),
			array(
				'icnm icnm-uni46' => 'uni46'
			),
			array(
				'icnm icnm-uni47' => 'uni47'
			),
			array(
				'icnm icnm-uni48' => 'uni48'
			),
			array(
				'icnm icnm-uni49' => 'uni49'
			),
			array(
				'icnm icnm-uni4A' => 'uni4A'
			),
			array(
				'icnm icnm-uni4B' => 'uni4B'
			),
			array(
				'icnm icnm-uni4C' => 'uni4C'
			),
			array(
				'icnm icnm-uni4D' => 'uni4D'
			),
			array(
				'icnm icnm-uni4E' => 'uni4E'
			),
			array(
				'icnm icnm-uni4F' => 'uni4F'
			),
			array(
				'icnm icnm-uni50' => 'uni50'
			),
			array(
				'icnm icnm-uni51' => 'uni51'
			),
			array(
				'icnm icnm-uni52' => 'uni52'
			),
			array(
				'icnm icnm-uni53' => 'uni53'
			),
			array(
				'icnm icnm-uni54' => 'uni54'
			),
			array(
				'icnm icnm-uni55' => 'uni55'
			),
			array(
				'icnm icnm-uni56' => 'uni56'
			),
			array(
				'icnm icnm-uni57' => 'uni57'
			),
			array(
				'icnm icnm-uni58' => 'uni58'
			),
			array(
				'icnm icnm-uni59' => 'uni59'
			),
			array(
				'icnm icnm-uni5A' => 'uni5A'
			),
			array(
				'icnm icnm-uni5B' => 'uni5B'
			),
			array(
				'icnm icnm-uni5C' => 'uni5C'
			),
			array(
				'icnm icnm-uni5D' => 'uni5D'
			),
			array(
				'icnm icnm-uni5E' => 'uni5E'
			),
			array(
				'icnm icnm-uni5F' => 'uni5F'
			),
			array(
				'icnm icnm-uni60' => 'uni60'
			),
			array(
				'icnm icnm-uni61' => 'uni61'
			),
			array(
				'icnm icnm-uni62' => 'uni62'
			),
			array(
				'icnm icnm-uni63' => 'uni63'
			),
			array(
				'icnm icnm-uni64' => 'uni64'
			),
			array(
				'icnm icnm-uni65' => 'uni65'
			),
			array(
				'icnm icnm-uni66' => 'uni66'
			),
			array(
				'icnm icnm-uni67' => 'uni67'
			),
			array(
				'icnm icnm-uni68' => 'uni68'
			),
			array(
				'icnm icnm-uni69' => 'uni69'
			),
			array(
				'icnm icnm-uni6A' => 'uni6A'
			),
			array(
				'icnm icnm-uni6B' => 'uni6B'
			),
			array(
				'icnm icnm-uni6C' => 'uni6C'
			),
			array(
				'icnm icnm-uni6D' => 'uni6D'
			),
			array(
				'icnm icnm-uni6E' => 'uni6E'
			),
			array(
				'icnm icnm-uni6F' => 'uni6F'
			),
			array(
				'icnm icnm-uni70' => 'uni70'
			),
			array(
				'icnm icnm-uni71' => 'uni71'
			),
			array(
				'icnm icnm-uni72' => 'uni72'
			),
			array(
				'icnm icnm-uni73' => 'uni73'
			),
			array(
				'icnm icnm-uni74' => 'uni74'
			),
			array(
				'icnm icnm-uni75' => 'uni75'
			),
			array(
				'icnm icnm-uni76' => 'uni76'
			),
			array(
				'icnm icnm-uni77' => 'uni77'
			),
			array(
				'icnm icnm-uni78' => 'uni78'
			),
			array(
				'icnm icnm-uni79' => 'uni79'
			),
			array(
				'icnm icnm-uni7A' => 'uni7A'
			),
			array(
				'icnm icnm-uni7B' => 'uni7B'
			),
			array(
				'icnm icnm-uni7C' => 'uni7C'
			),
			array(
				'icnm icnm-uni7D' => 'uni7D'
			),
			array(
				'icnm icnm-uni7E' => 'uni7E'
			),
			array(
				'icnm icnm-uniA9' => 'uniA9'
			)
		);
		
		return array_merge($icons, $iconmoon_icons);
		
	}
}

add_filter('vc_iconpicker-type-elusive', 'vc_iconpicker_type_elusive');

if (!function_exists('vc_iconpicker_type_elusive')) {
    function vc_iconpicker_type_elusive($icons)
    {

        $elusive_icons = array(
            array(
                'elus elus-address-book-alt' => 'address-book-alt'
            ),
            array(
                'elus elus-address-book' => 'address-book'
            ),
            array(
                'elus elus-adjust-alt' => 'adjust-alt'
            ),
            array(
                'elus elus-adjust' => 'adjust'
            ),
            array(
                'elus elus-adult' => 'adult'
            ),
            array(
                'elus elus-align-center' => 'align-center'
            ),
            array(
                'elus elus-align-justify' => 'align-justify'
            ),
            array(
                'elus elus-align-left' => 'align-left'
            ),
            array(
                'elus elus-align-right' => 'align-right'
            ),
            array(
                'elus elus-arrow-down' => 'arrow-down'
            ),
            array(
                'elus elus-arrow-left' => 'arrow-left'
            ),
            array(
                'elus elus-arrow-right' => 'arrow-right'
            ),
            array(
                'elus elus-arrow-up' => 'arrow-up'
            ),
            array(
                'elus elus-asl' => 'asl'
            ),
            array(
                'elus elus-asterisk' => 'asterisk'
            ),
            array(
                'elus elus-backward' => 'backward'
            ),
            array(
                'elus elus-ban-circle' => 'ban-circle'
            ),
            array(
                'elus elus-barcode' => 'barcode'
            ),
            array(
                'elus elus-behance' => 'behance'
            ),
            array(
                'elus elus-bell' => 'bell'
            ),
            array(
                'elus elus-blind' => 'blind'
            ),
            array(
                'elus elus-blogger' => 'blogger'
            ),
            array(
                'elus elus-bold' => 'bold'
            ),
            array(
                'elus elus-book' => 'book'
            ),
            array(
                'elus elus-bookmark-empty' => 'bookmark-empty'
            ),
            array(
                'elus elus-bookmark' => 'bookmark'
            ),
            array(
                'elus elus-braille' => 'braille'
            ),
            array(
                'elus elus-briefcase' => 'briefcase'
            ),
            array(
                'elus elus-broom' => 'broom'
            ),
            array(
                'elus elus-brush' => 'brush'
            ),
            array(
                'elus elus-bulb' => 'bulb'
            ),
            array(
                'elus elus-bullhorn' => 'bullhorn'
            ),
            array(
                'elus elus-calendar-sign' => 'calendar-sign'
            ),
            array(
                'elus elus-calendar' => 'calendar'
            ),
            array(
                'elus elus-camera' => 'camera'
            ),
            array(
                'elus elus-car' => 'car'
            ),
            array(
                'elus elus-caret-down' => 'caret-down'
            ),
            array(
                'elus elus-caret-left' => 'caret-left'
            ),
            array(
                'elus elus-caret-right' => 'caret-right'
            ),
            array(
                'elus elus-caret-up' => 'caret-up'
            ),
            array(
                'elus elus-cc' => 'cc'
            ),
            array(
                'elus elus-certificate' => 'certificate'
            ),
            array(
                'elus elus-check-empty' => 'check-empty'
            ),
            array(
                'elus elus-check' => 'check'
            ),
            array(
                'elus elus-chevron-down' => 'chevron-down'
            ),
            array(
                'elus elus-chevron-left' => 'chevron-left'
            ),
            array(
                'elus elus-chevron-right' => 'chevron-right'
            ),
            array(
                'elus elus-chevron-up' => 'chevron-up'
            ),
            array(
                'elus elus-child' => 'child'
            ),
            array(
                'elus elus-circle-arrow-down' => 'circle-arrow-down'
            ),
            array(
                'elus elus-circle-arrow-left' => 'circle-arrow-left'
            ),
            array(
                'elus elus-circle-arrow-right' => 'circle-arrow-right'
            ),
            array(
                'elus elus-circle-arrow-up' => 'circle-arrow-up'
            ),
            array(
                'elus elus-cloud-alt' => 'cloud-alt'
            ),
            array(
                'elus elus-cloud' => 'cloud'
            ),
            array(
                'elus elus-cog-alt' => 'cog-alt'
            ),
            array(
                'elus elus-cog' => 'cog'
            ),
            array(
                'elus elus-cogs' => 'cogs'
            ),
            array(
                'elus elus-comment-alt' => 'comment-alt'
            ),
            array(
                'elus elus-comment' => 'comment'
            ),
            array(
                'elus elus-compass-alt' => 'compass-alt'
            ),
            array(
                'elus elus-compass' => 'compass'
            ),
            array(
                'elus elus-credit-card' => 'credit-card'
            ),
            array(
                'elus elus-css' => 'css'
            ),
            array(
                'elus elus-dashboard' => 'dashboard'
            ),
            array(
                'elus elus-delicious' => 'delicious'
            ),
            array(
                'elus elus-deviantart' => 'deviantart'
            ),
            array(
                'elus elus-digg' => 'digg'
            ),
            array(
                'elus elus-download-alt' => 'download-alt'
            ),
            array(
                'elus elus-download' => 'download'
            ),
            array(
                'elus elus-dribbble' => 'dribbble'
            ),
            array(
                'elus elus-edit' => 'edit'
            ),
            array(
                'elus elus-eject' => 'eject'
            ),
            array(
                'elus elus-envelope-alt' => 'envelope-alt'
            ),
            array(
                'elus elus-envelope' => 'envelope'
            ),
            array(
                'elus elus-error-alt' => 'error-alt'
            ),
            array(
                'elus elus-error' => 'error'
            ),
            array(
                'elus elus-eur' => 'eur'
            ),
            array(
                'elus elus-exclamation-sign' => 'exclamation-sign'
            ),
            array(
                'elus elus-eye-close' => 'eye-close'
            ),
            array(
                'elus elus-eye-open' => 'eye-open'
            ),
            array(
                'elus elus-facebook' => 'facebook'
            ),
            array(
                'elus elus-facetime-video' => 'facetime-video'
            ),
            array(
                'elus elus-fast-backward' => 'fast-backward'
            ),
            array(
                'elus elus-fast-forward' => 'fast-forward'
            ),
            array(
                'elus elus-female' => 'female'
            ),
            array(
                'elus elus-file-alt' => 'file-alt'
            ),
            array(
                'elus elus-file-edit-alt' => 'file-edit-alt'
            ),
            array(
                'elus elus-file-edit' => 'file-edit'
            ),
            array(
                'elus elus-file-new-alt' => 'file-new-alt'
            ),
            array(
                'elus elus-file-new' => 'file-new'
            ),
            array(
                'elus elus-file' => 'file'
            ),
            array(
                'elus elus-film' => 'film'
            ),
            array(
                'elus elus-filter' => 'filter'
            ),
            array(
                'elus elus-fire' => 'fire'
            ),
            array(
                'elus elus-flag-alt' => 'flag-alt'
            ),
            array(
                'elus elus-flag' => 'flag'
            ),
            array(
                'elus elus-flickr' => 'flickr'
            ),
            array(
                'elus elus-folder-close' => 'folder-close'
            ),
            array(
                'elus elus-folder-open' => 'folder-open'
            ),
            array(
                'elus elus-folder-sign' => 'folder-sign'
            ),
            array(
                'elus elus-folder' => 'folder'
            ),
            array(
                'elus elus-font' => 'font'
            ),
            array(
                'elus elus-fontsize' => 'fontsize'
            ),
            array(
                'elus elus-fork' => 'fork'
            ),
            array(
                'elus elus-forward-alt' => 'forward-alt'
            ),
            array(
                'elus elus-forward' => 'forward'
            ),
            array(
                'elus elus-foursquare' => 'foursquare'
            ),
            array(
                'elus elus-friendfeed-rect' => 'friendfeed-rect'
            ),
            array(
                'elus elus-friendfeed' => 'friendfeed'
            ),
            array(
                'elus elus-fullscreen' => 'fullscreen'
            ),
            array(
                'elus elus-gbp' => 'gbp'
            ),
            array(
                'elus elus-gift' => 'gift'
            ),
            array(
                'elus elus-github-text' => 'github-text'
            ),
            array(
                'elus elus-github' => 'github'
            ),
            array(
                'elus elus-glass' => 'glass'
            ),
            array(
                'elus elus-glasses' => 'glasses'
            ),
            array(
                'elus elus-globe-alt' => 'globe-alt'
            ),
            array(
                'elus elus-globe' => 'globe'
            ),
            array(
                'elus elus-googleplus' => 'googleplus'
            ),
            array(
                'elus elus-graph-alt' => 'graph-alt'
            ),
            array(
                'elus elus-graph' => 'graph'
            ),
            array(
                'elus elus-group-alt' => 'group-alt'
            ),
            array(
                'elus elus-group' => 'group'
            ),
            array(
                'elus elus-guidedog' => 'guidedog'
            ),
            array(
                'elus elus-hand-down' => 'hand-down'
            ),
            array(
                'elus elus-hand-left' => 'hand-left'
            ),
            array(
                'elus elus-hand-right' => 'hand-right'
            ),
            array(
                'elus elus-hand-up' => 'hand-up'
            ),
            array(
                'elus elus-hdd' => 'hdd'
            ),
            array(
                'elus elus-headphones' => 'headphones'
            ),
            array(
                'elus elus-hearing-impaired' => 'hearing-impaired'
            ),
            array(
                'elus elus-heart-alt' => 'heart-alt'
            ),
            array(
                'elus elus-heart-empty' => 'heart-empty'
            ),
            array(
                'elus elus-heart' => 'heart'
            ),
            array(
                'elus elus-home-alt' => 'home-alt'
            ),
            array(
                'elus elus-home' => 'home'
            ),
            array(
                'elus elus-hourglass' => 'hourglass'
            ),
            array(
                'elus elus-idea-alt' => 'idea-alt'
            ),
            array(
                'elus elus-idea' => 'idea'
            ),
            array(
                'elus elus-inbox-alt' => 'inbox-alt'
            ),
            array(
                'elus elus-inbox-box' => 'inbox-box'
            ),
            array(
                'elus elus-inbox' => 'inbox'
            ),
            array(
                'elus elus-indent-left' => 'indent-left'
            ),
            array(
                'elus elus-indent-right' => 'indent-right'
            ),
            array(
                'elus elus-info-circle' => 'info-circle'
            ),
            array(
                'elus elus-instagram' => 'instagram'
            ),
            array(
                'elus elus-iphone-home' => 'iphone-home'
            ),
            array(
                'elus elus-italic' => 'italic'
            ),
            array(
                'elus elus-key' => 'key'
            ),
            array(
                'elus elus-laptop-alt' => 'laptop-alt'
            ),
            array(
                'elus elus-laptop' => 'laptop'
            ),
            array(
                'elus elus-lastfm' => 'lastfm'
            ),
            array(
                'elus elus-leaf' => 'leaf'
            ),
            array(
                'elus elus-lines' => 'lines'
            ),
            array(
                'elus elus-link' => 'link'
            ),
            array(
                'elus elus-linkedin' => 'linkedin'
            ),
            array(
                'elus elus-list-alt' => 'list-alt'
            ),
            array(
                'elus elus-list' => 'list'
            ),
            array(
                'elus elus-livejournal' => 'livejournal'
            ),
            array(
                'elus elus-lock-alt' => 'lock-alt'
            ),
            array(
                'elus elus-lock' => 'lock'
            ),
            array(
                'elus elus-magic' => 'magic'
            ),
            array(
                'elus elus-magnet' => 'magnet'
            ),
            array(
                'elus elus-male' => 'male'
            ),
            array(
                'elus elus-map-marker-alt' => 'map-marker-alt'
            ),
            array(
                'elus elus-map-marker' => 'map-marker'
            ),
            array(
                'elus elus-mic-alt' => 'mic-alt'
            ),
            array(
                'elus elus-mic' => 'mic'
            ),
            array(
                'elus elus-minus-sign' => 'minus-sign'
            ),
            array(
                'elus elus-minus' => 'minus'
            ),
            array(
                'elus elus-move' => 'move'
            ),
            array(
                'elus elus-music' => 'music'
            ),
            array(
                'elus elus-myspace' => 'myspace'
            ),
            array(
                'elus elus-network' => 'network'
            ),
            array(
                'elus elus-off' => 'off'
            ),
            array(
                'elus elus-ok-circle' => 'ok-circle'
            ),
            array(
                'elus elus-ok-sign' => 'ok-sign'
            ),
            array(
                'elus elus-ok' => 'ok'
            ),
            array(
                'elus elus-opensource' => 'opensource'
            ),
            array(
                'elus elus-paper-clip-alt' => 'paper-clip-alt'
            ),
            array(
                'elus elus-paper-clip' => 'paper-clip'
            ),
            array(
                'elus elus-path' => 'path'
            ),
            array(
                'elus elus-pause-alt' => 'pause-alt'
            ),
            array(
                'elus elus-pause' => 'pause'
            ),
            array(
                'elus elus-pencil-alt' => 'pencil-alt'
            ),
            array(
                'elus elus-pencil' => 'pencil'
            ),
            array(
                'elus elus-person' => 'person'
            ),
            array(
                'elus elus-phone-alt' => 'phone-alt'
            ),
            array(
                'elus elus-phone' => 'phone'
            ),
            array(
                'elus elus-photo-alt' => 'photo-alt'
            ),
            array(
                'elus elus-photo' => 'photo'
            ),
            array(
                'elus elus-picasa' => 'picasa'
            ),
            array(
                'elus elus-picture' => 'picture'
            ),
            array(
                'elus elus-pinterest' => 'pinterest'
            ),
            array(
                'elus elus-plane' => 'plane'
            ),
            array(
                'elus elus-play-alt' => 'play-alt'
            ),
            array(
                'elus elus-play-circle' => 'play-circle'
            ),
            array(
                'elus elus-play' => 'play'
            ),
            array(
                'elus elus-plurk-alt' => 'plurk-alt'
            ),
            array(
                'elus elus-plurk' => 'plurk'
            ),
            array(
                'elus elus-plus-sign' => 'plus-sign'
            ),
            array(
                'elus elus-plus' => 'plus'
            ),
            array(
                'elus elus-podcast' => 'podcast'
            ),
            array(
                'elus elus-print' => 'print'
            ),
            array(
                'elus elus-puzzle' => 'puzzle'
            ),
            array(
                'elus elus-qrcode' => 'qrcode'
            ),
            array(
                'elus elus-question-sign' => 'question-sign'
            ),
            array(
                'elus elus-question' => 'question'
            ),
            array(
                'elus elus-quote-alt' => 'quote-alt'
            ),
            array(
                'elus elus-quote-right-alt' => 'quote-right-alt'
            ),
            array(
                'elus elus-quote-right' => 'quote-right'
            ),
            array(
                'elus elus-quotes' => 'quotes'
            ),
            array(
                'elus elus-random' => 'random'
            ),
            array(
                'elus elus-record' => 'record'
            ),
            array(
                'elus elus-reddit' => 'reddit'
            ),
            array(
                'elus elus-redux' => 'redux'
            ),
            array(
                'elus elus-refresh' => 'refresh'
            ),
            array(
                'elus elus-remove-circle' => 'remove-circle'
            ),
            array(
                'elus elus-remove-sign' => 'remove-sign'
            ),
            array(
                'elus elus-remove' => 'remove'
            ),
            array(
                'elus elus-repeat-alt' => 'repeat-alt'
            ),
            array(
                'elus elus-repeat' => 'repeat'
            ),
            array(
                'elus elus-resize-full' => 'resize-full'
            ),
            array(
                'elus elus-resize-horizontal' => 'resize-horizontal'
            ),
            array(
                'elus elus-resize-small' => 'resize-small'
            ),
            array(
                'elus elus-resize-vertical' => 'resize-vertical'
            ),
            array(
                'elus elus-return-key' => 'return-key'
            ),
            array(
                'elus elus-retweet' => 'retweet'
            ),
            array(
                'elus elus-reverse-alt' => 'reverse-alt'
            ),
            array(
                'elus elus-road' => 'road'
            ),
            array(
                'elus elus-rss' => 'rss'
            ),
            array(
                'elus elus-scissors' => 'scissors'
            ),
            array(
                'elus elus-screen-alt' => 'screen-alt'
            ),
            array(
                'elus elus-screen' => 'screen'
            ),
            array(
                'elus elus-screenshot' => 'screenshot'
            ),
            array(
                'elus elus-search-alt' => 'search-alt'
            ),
            array(
                'elus elus-search' => 'search'
            ),
            array(
                'elus elus-share-alt' => 'share-alt'
            ),
            array(
                'elus elus-share' => 'share'
            ),
            array(
                'elus elus-shopping-cart-sign' => 'shopping-cart-sign'
            ),
            array(
                'elus elus-shopping-cart' => 'shopping-cart'
            ),
            array(
                'elus elus-signal' => 'signal'
            ),
            array(
                'elus elus-skype' => 'skype'
            ),
            array(
                'elus elus-slideshare' => 'slideshare'
            ),
            array(
                'elus elus-smiley-alt' => 'smiley-alt'
            ),
            array(
                'elus elus-smiley' => 'smiley'
            ),
            array(
                'elus elus-soundcloud' => 'soundcloud'
            ),
            array(
                'elus elus-speaker' => 'speaker'
            ),
            array(
                'elus elus-spotify' => 'spotify'
            ),
            array(
                'elus elus-stackoverflow' => 'stackoverflow'
            ),
            array(
                'elus elus-star-alt' => 'star-alt'
            ),
            array(
                'elus elus-star-empty' => 'star-empty'
            ),
            array(
                'elus elus-star' => 'star'
            ),
            array(
                'elus elus-step-backward' => 'step-backward'
            ),
            array(
                'elus elus-step-forward' => 'step-forward'
            ),
            array(
                'elus elus-stop-alt' => 'stop-alt'
            ),
            array(
                'elus elus-stop' => 'stop'
            ),
            array(
                'elus elus-stumbleupon' => 'stumbleupon'
            ),
            array(
                'elus elus-tag' => 'tag'
            ),
            array(
                'elus elus-tags' => 'tags'
            ),
            array(
                'elus elus-tasks' => 'tasks'
            ),
            array(
                'elus elus-text-height' => 'text-height'
            ),
            array(
                'elus elus-text-width' => 'text-width'
            ),
            array(
                'elus elus-th-large' => 'th-large'
            ),
            array(
                'elus elus-th-list' => 'th-list'
            ),
            array(
                'elus elus-th' => 'th'
            ),
            array(
                'elus elus-thumbs-down' => 'thumbs-down'
            ),
            array(
                'elus elus-thumbs-up' => 'thumbs-up'
            ),
            array(
                'elus elus-time-alt' => 'time-alt'
            ),
            array(
                'elus elus-time' => 'time'
            ),
            array(
                'elus elus-tint' => 'tint'
            ),
            array(
                'elus elus-torso' => 'torso'
            ),
            array(
                'elus elus-trash-alt' => 'trash-alt'
            ),
            array(
                'elus elus-trash' => 'trash'
            ),
            array(
                'elus elus-tumblr' => 'tumblr'
            ),
            array(
                'elus elus-twitter' => 'twitter'
            ),
            array(
                'elus elus-universal-access' => 'universal-access'
            ),
            array(
                'elus elus-unlock-alt' => 'unlock-alt'
            ),
            array(
                'elus elus-unlock' => 'unlock'
            ),
            array(
                'elus elus-upload' => 'upload'
            ),
            array(
                'elus elus-usd' => 'usd'
            ),
            array(
                'elus elus-user' => 'user'
            ),
            array(
                'elus elus-viadeo' => 'viadeo'
            ),
            array(
                'elus elus-video-alt' => 'video-alt'
            ),
            array(
                'elus elus-video-chat' => 'video-chat'
            ),
            array(
                'elus elus-video' => 'video'
            ),
            array(
                'elus elus-view-mode' => 'view-mode'
            ),
            array(
                'elus elus-vimeo' => 'vimeo'
            ),
            array(
                'elus elus-vkontakte' => 'vkontakte'
            ),
            array(
                'elus elus-volume-down' => 'volume-down'
            ),
            array(
                'elus elus-volume-off' => 'volume-off'
            ),
            array(
                'elus elus-volume-up' => 'volume-up'
            ),
            array(
                'elus elus-w3c' => 'w3c'
            ),
            array(
                'elus elus-warning-sign' => 'warning-sign'
            ),
            array(
                'elus elus-website-alt' => 'website-alt'
            ),
            array(
                'elus elus-website' => 'website'
            ),
            array(
                'elus elus-wheelchair' => 'wheelchair'
            ),
            array(
                'elus elus-wordpress' => 'wordpress'
            ),
            array(
                'elus elus-wrench-alt' => 'wrench-alt'
            ),
            array(
                'elus elus-wrench' => 'wrench'
            ),
            array(
                'elus elus-youtube' => 'youtube'
            ),
            array(
                'elus elus-zoom-in' => 'zoom-in'
            ),
            array(
                'elus elus-zoom-out' => 'zoom-out'
            )
        );


        return array_merge($icons, $elusive_icons);
    }
}


add_filter('vc_iconpicker-type-etline', 'vc_iconpicker_type_etline');

if (!function_exists('vc_iconpicker_type_etline')) {
    function vc_iconpicker_type_etline($icons)
    {
        $etline_icons = array(

            array(
                'etline-font etline-attachment' => 'attachment'
            ),
            array(
                'etline-font etline-bargraph' => 'bargraph'
            ),
            array(
                'etline-font etline-basket' => 'basket'
            ),
            array(
                'etline-font etline-beaker' => 'beaker'
            ),
            array(
                'etline-font etline-bike' => 'bike'
            ),
            array(
                'etline-font etline-book-open' => 'book-open'
            ),
            array(
                'etline-font etline-briefcase' => 'briefcase'
            ),
            array(
                'etline-font etline-browser' => 'browser'
            ),
            array(
                'etline-font etline-calendar' => 'calendar'
            ),
            array(
                'etline-font etline-camera' => 'camera'
            ),
            array(
                'etline-font etline-caution' => 'caution'
            ),
            array(
                'etline-font etline-chat' => 'chat'
            ),
            array(
                'etline-font etline-circle-compass' => 'circle-compass'
            ),
            array(
                'etline-font etline-clipboard' => 'clipboard'
            ),
            array(
                'etline-font etline-clock' => 'clock'
            ),
            array(
                'etline-font etline-cloud' => 'cloud'
            ),
            array(
                'etline-font etline-compass' => 'compass'
            ),
            array(
                'etline-font etline-desktop' => 'desktop'
            ),
            array(
                'etline-font etline-dial' => 'dial'
            ),
            array(
                'etline-font etline-document' => 'document'
            ),
            array(
                'etline-font etline-documents' => 'documents'
            ),
            array(
                'etline-font etline-download' => 'download'
            ),
            array(
                'etline-font etline-dribbble' => 'dribbble'
            ),
            array(
                'etline-font etline-edit' => 'edit'
            ),
            array(
                'etline-font etline-envelope' => 'envelope'
            ),
            array(
                'etline-font etline-expand' => 'expand'
            ),
            array(
                'etline-font etline-facebook' => 'facebook'
            ),
            array(
                'etline-font etline-flag' => 'flag'
            ),
            array(
                'etline-font etline-focus' => 'focus'
            ),
            array(
                'etline-font etline-gears' => 'gears'
            ),
            array(
                'etline-font etline-genius' => 'genius'
            ),
            array(
                'etline-font etline-gift' => 'gift'
            ),
            array(
                'etline-font etline-global' => 'global'
            ),
            array(
                'etline-font etline-globe' => 'globe'
            ),
            array(
                'etline-font etline-googleplus' => 'googleplus'
            ),
            array(
                'etline-font etline-grid' => 'grid'
            ),
            array(
                'etline-font etline-happy' => 'happy'
            ),
            array(
                'etline-font etline-hazardous' => 'hazardous'
            ),
            array(
                'etline-font etline-heart' => 'heart'
            ),
            array(
                'etline-font etline-hotairballoon' => 'hotairballoon'
            ),
            array(
                'etline-font etline-hourglass' => 'hourglass'
            ),
            array(
                'etline-font etline-key' => 'key'
            ),
            array(
                'etline-font etline-laptop' => 'laptop'
            ),
            array(
                'etline-font etline-layers' => 'layers'
            ),
            array(
                'etline-font etline-lifesaver' => 'lifesaver'
            ),
            array(
                'etline-font etline-lightbulb' => 'lightbulb'
            ),
            array(
                'etline-font etline-linegraph' => 'linegraph'
            ),
            array(
                'etline-font etline-linkedin' => 'linkedin'
            ),
            array(
                'etline-font etline-lock' => 'lock'
            ),
            array(
                'etline-font etline-magnifying-glass' => 'magnifying-glass'
            ),
            array(
                'etline-font etline-map' => 'map'
            ),
            array(
                'etline-font etline-map-pin' => 'map-pin'
            ),
            array(
                'etline-font etline-megaphone' => 'megaphone'
            ),
            array(
                'etline-font etline-mic' => 'mic'
            ),
            array(
                'etline-font etline-mobile' => 'mobile'
            ),
            array(
                'etline-font etline-newspaper' => 'newspaper'
            ),
            array(
                'etline-font etline-notebook' => 'notebook'
            ),
            array(
                'etline-font etline-paintbrush' => 'paintbrush'
            ),
            array(
                'etline-font etline-paperclip' => 'paperclip'
            ),
            array(
                'etline-font etline-pencil' => 'pencil'
            ),
            array(
                'etline-font etline-phone' => 'phone'
            ),
            array(
                'etline-font etline-picture' => 'picture'
            ),
            array(
                'etline-font etline-pictures' => 'pictures'
            ),
            array(
                'etline-font etline-piechart' => 'piechart'
            ),
            array(
                'etline-font etline-presentation' => 'presentation'
            ),
            array(
                'etline-font etline-pricetags' => 'pricetags'
            ),
            array(
                'etline-font etline-printer' => 'printer'
            ),
            array(
                'etline-font etline-profile-female' => 'profile-female'
            ),
            array(
                'etline-font etline-profile-male' => 'profile-male'
            ),
            array(
                'etline-font etline-puzzle' => 'puzzle'
            ),
            array(
                'etline-font etline-quote' => 'quote'
            ),
            array(
                'etline-font etline-recycle' => 'recycle'
            ),
            array(
                'etline-font etline-refresh' => 'refresh'
            ),
            array(
                'etline-font etline-ribbon' => 'ribbon'
            ),
            array(
                'etline-font etline-rss' => 'rss'
            ),
            array(
                'etline-font etline-sad' => 'sad'
            ),
            array(
                'etline-font etline-scissors' => 'scissors'
            ),
            array(
                'etline-font etline-scope' => 'scope'
            ),
            array(
                'etline-font etline-search' => 'search'
            ),
            array(
                'etline-font etline-shield' => 'shield'
            ),
            array(
                'etline-font etline-speedometer' => 'speedometer'
            ),
            array(
                'etline-font etline-strategy' => 'strategy'
            ),
            array(
                'etline-font etline-streetsign' => 'streetsign'
            ),
            array(
                'etline-font etline-tablet' => 'tablet'
            ),
            array(
                'etline-font etline-target' => 'target'
            ),
            array(
                'etline-font etline-telescope' => 'telescope'
            ),
            array(
                'etline-font etline-toolbox' => 'toolbox'
            ),
            array(
                'etline-font etline-tools' => 'tools'
            ),
            array(
                'etline-font etline-tools-2' => 'tools-2'
            ),
            array(
                'etline-font etline-trophy' => 'trophy'
            ),
            array(
                'etline-font etline-tumblr' => 'tumblr'
            ),
            array(
                'etline-font etline-twitter' => 'twitter'
            ),
            array(
                'etline-font etline-upload' => 'upload'
            ),
            array(
                'etline-font etline-video' => 'video'
            ),
            array(
                'etline-font etline-wallet' => 'wallet'
            ),
            array(
                'etline-font etline-wine' => 'wine'
            ),
        );

        return array_merge($icons, $etline_icons);

    }
}

add_filter('vc_iconpicker-type-flicon', 'vc_iconpicker_type_flicon');

if (!function_exists('vc_iconpicker_type_flicon')) {
    function vc_iconpicker_type_flicon($icons)
    {
        $flicon_icons = array(
            array(
                'fl-vc-custom-i-envelope'                      => 'fl-vc-custom-i-envelope'
            ),
            array(
                'fl-vc-custom-i-phone'                          => 'fl-vc-custom-i-phone'
            ),
            array(
                'fl-vc-custom-i-piker'                          => 'fl-vc-custom-i--piker'
            ),
            array(
                'fl-vc-custom-i-uniF100'                        => 'fl-vc-custom-i-uniF100'
            ),
            array(
                'fl-vc-custom-i-uniF101'                        => 'fl-vc-custom-i-uniF101'
            ),
            array(
                'fl-vc-custom-i-uniF102'                        => 'fl-vc-custom-i-uniF102'
            ),
            array(
                'fl-vc-custom-i-uniF103'                        => 'fl-vc-custom-i-uniF103'
            ),
            array(
                'fl-vc-custom-i-uniF104'                        => 'fl-vc-custom-i-uniF104'
            ),
            array(
                'fl-vc-custom-i-uniF105'                        => 'fl-vc-custom-i-uniF105'
            ),
            array(
                'fl-vc-custom-i-uniF106'                        => 'fl-vc-custom-i-uniF106'
            ),
            array(
                'fl-vc-custom-i-uniF107'                        => 'fl-vc-custom-i-uniF107'
            ),
            array(
                'fl-vc-custom-i-uniF108'                        => 'fl-vc-custom-i-uniF108'
            ),
            array(
                'fl-vc-custom-i-uniF109'                        => 'fl-vc-custom-i-uniF109'
            ),
            array(
                'fl-vc-custom-i-uniF10A'                        => 'fl-vc-custom-i-uniF10A'
            ),
            array(
                'fl-vc-custom-i-uniF10B'                        => 'fl-vc-custom-i-uniF10B'
            ),
            array(
                'fl-vc-custom-i-uniF10D'                        => 'fl-vc-custom-i-uniF10D'
            ),
            array(
                'fl-vc-custom-i-uniF10E'                        => 'fl-vc-custom-i-uniF10E'
            ),
            array(
                'fl-vc-custom-i-uniF10F'                        => 'fl-vc-custom-i-uniF10F'
            ),
            array(
                'fl-vc-custom-i-uniF110'                        => 'fl-vc-custom-i-uniF110'
            ),
            array(
                'fl-vc-custom-i-uniF111'                        => 'fl-vc-custom-i-uniF111'
            ),
            array(
                'fl-vc-custom-i-uniF112'                        => 'fl-vc-custom-i-uniF112'
            ),
            array(
                'fl-vc-custom-i-uniF114'                        => 'fl-vc-custom-i-uniF114'
            ),
            array(
                'fl-vc-custom-i-uniF115'                        => 'fl-vc-custom-i-uniF115'
            ),
            array(
                'fl-vc-custom-i-uniF116'                        => 'fl-vc-custom-i-uniF116'
            ),
            array(
                'fl-vc-custom-i-uniF117'                        => 'fl-vc-custom-i-uniF117'
            ),
            array(
                'fl-vc-custom-i-uniF118'                        => 'fl-vc-custom-i-uniF118'
            ),
            array(
                'fl-vc-custom-i-uniF119'                        => 'fl-vc-custom-i-uniF119'
            ),
            array(
                'fl-vc-custom-i-uniF11A'                        => 'fl-vc-custom-i-uniF11A'
            ),
            array(
                'fl-vc-custom-i-uniF11B'                        => 'fl-vc-custom-i-uniF11B'
            ),
            array(
                'fl-vc-custom-i-uniF11C'                        => 'fl-vc-custom-i-uniF11C'
            ),
            array(
                'fl-vc-custom-i-uniF11D'                        => 'fl-vc-custom-i-uniF11D'
            ),
            array(
                'fl-vc-custom-i-uniF11E'                        => 'fl-vc-custom-i-uniF11E'
            ),
            array(
                'fl-vc-custom-i-uniF11F'                        => 'fl-vc-custom-i-uniF11F'
            ),
            array(
                'fl-vc-custom-i-uniF120'                        => 'fl-vc-custom-i-uniF120'
            ),
            array(
                'fl-vc-custom-i-uniF121'                        => 'fl-vc-custom-i-uniF121'
            ),
            array(
                'fl-vc-custom-i-uniF122'                        => 'fl-vc-custom-i-uniF122'
            ),
            array(
                'fl-vc-custom-i-uniF123'                        => 'fl-vc-custom-i-uniF123'
            ),
            array(
                'fl-vc-custom-i-uniF124'                        => 'fl-vc-custom-i-uniF124'
            ),
            array(
                'fl-vc-custom-i-uniF125'                        => 'fl-vc-custom-i-uniF125'
            ),
            array(
                'fl-vc-custom-i-uniF126'                        => 'fl-vc-custom-i-uniF126'
            ),
            array(
                'fl-vc-custom-i-uniF127'                        => 'fl-vc-custom-i-uniF127'
            ),
            array(
                'fl-vc-custom-i-uniF128'                        => 'fl-vc-custom-i-uniF128'
            ),
            array(
                'fl-vc-custom-i-uniF129'                        => 'fl-vc-custom-i-uniF129'
            ),
            array(
                'fl-vc-custom-i-uniF12A'                        => 'fl-vc-custom-i-uniF12A'
            ),
            array(
                'fl-vc-custom-i-uniF12B'                        => 'fl-vc-custom-i-uniF12B'
            ),
            array(
                'fl-vc-custom-i-uniF12C'                        => 'fl-vc-custom-i-uniF12C'
            ),
            array(
                'fl-vc-custom-i-uniF12D'                        => 'fl-vc-custom-i-uniF12D'
            ),
            array(
                'fl-vc-custom-i-uniF12E'                        => 'fl-vc-custom-i-uniF12E'
            ),
            array(
                'fl-vc-custom-i-uniF12F'                        => 'fl-vc-custom-i-uniF12F'
            ),
            array(
                'fl-vc-custom-i-uniF130'                        => 'fl-vc-custom-i-uniF130'
            ),
            array(
                'fl-vc-custom-i-uniF131'                        => 'fl-vc-custom-i-uniF131'
            ),
            array(
                'fl-vc-custom-i-uniF133'                        => 'fl-vc-custom-i-uniF133'
            ),
            array(
                'fl-vc-custom-i-uniF134'                        => 'fl-vc-custom-i-uniF134'
            ),
            array(
                'fl-vc-custom-i-uniF135'                        => 'fl-vc-custom-i-uniF135'
            ),
            array(
                'fl-vc-custom-i-uniF136'                        => 'fl-vc-custom-i-uniF136'
            ),
            array(
                'fl-vc-custom-i-uniF137'                        => 'fl-vc-custom-i-uniF137'
            ),
            array(
                'fl-vc-custom-i-uniF138'                        => 'fl-vc-custom-i-uniF138'
            ),
            array(
                'fl-vc-custom-i-uniF139'                        => 'fl-vc-custom-i-uniF139'
            ),
            array(
                'fl-vc-custom-i-uniF13A'                        => 'fl-vc-custom-i-uniF13A'
            ),
            array(
                'fl-vc-custom-i-uniF13B'                        => 'fl-vc-custom-i-uniF13B'
            ),
            array(
                'fl-vc-custom-i-uniF13C'                        => 'fl-vc-custom-i-uniF13C'
            ),
            array(
                'fl-vc-custom-i-uniF13E'                        => 'fl-vc-custom-i-uniF13E'
            ),
            array(
                'fl-vc-custom-i-uniF13F'                        => 'fl-vc-custom-i-uniF13F'
            ),
            array(
                'fl-vc-custom-i-uniF140'                        => 'fl-vc-custom-i-uniF140'
            ),
            array(
                'fl-vc-custom-i-uniF141'                        => 'fl-vc-custom-i-uniF141'
            ),
            array(
                'fl-vc-custom-i-uniF142'                        => 'fl-vc-custom-i-uniF142'
            ),
            array(
                'fl-vc-custom-i-uniF143'                        => 'fl-vc-custom-i-uniF143'
            ),
            array(
                'fl-vc-custom-i-uniF144'                        => 'fl-vc-custom-i-uniF144'
            ),
            array(
                'fl-vc-custom-i-uniF145'                        => 'fl-vc-custom-i-uniF145'
            ),
            array(
                'fl-vc-custom-i-uniF146'                        => 'fl-vc-custom-i-uniF146'
            ),
            array(
                'fl-vc-custom-i-uniF147'                        => 'fl-vc-custom-i-uniF147'
            ),
            array(
                'fl-vc-custom-i-uniF148'                        => 'fl-vc-custom-i-uniF148'
            ),
            array(
                'fl-vc-custom-i-uniF149'                        => 'fl-vc-custom-i-uniF149'
            ),
            array(
                'fl-vc-custom-i-uniF14A'                        => 'fl-vc-custom-i-uniF14A'
            ),
            array(
                'fl-vc-custom-i-uniF14B'                        => 'fl-vc-custom-i-uniF14B'
            ),
            array(
                'fl-vc-custom-i-uniF14C'                        => 'fl-vc-custom-i-uniF14C'
            ),
            array(
                'fl-vc-custom-i-uniF14D'                        => 'fl-vc-custom-i-uniF14D'
            ),
            array(
                'fl-vc-custom-i-uniF14E'                        => 'fl-vc-custom-i-uniF14E'
            ),
            array(
                'fl-vc-custom-i-uniF14F'                        => 'fl-vc-custom-i-uniF14F'
            ),
            array(
                'fl-vc-custom-i-uniF150'                        => 'fl-vc-custom-i-uniF150'
            ),
            array(
                'fl-vc-custom-i-uniF151'                        => 'fl-vc-custom-i-uniF151'
            ),
            array(
                'fl-vc-custom-i-uniF152'                        => 'fl-vc-custom-i-uniF152'
            ),
            array(
                'fl-vc-custom-i-uniF153'                        => 'fl-vc-custom-i-uniF153'
            ),
            array(
                'fl-vc-custom-i-uniF154'                        => 'fl-vc-custom-i-uniF154'
            ),
            array(
                'fl-vc-custom-i-uniF155'                        => 'fl-vc-custom-i-uniF155'
            ),
            array(
                'fl-vc-custom-i-uniF157'                        => 'fl-vc-custom-i-uniF157'
            ),
            array(
                'fl-vc-custom-i-uniF158'                        => 'fl-vc-custom-i-uniF158'
            ),
            array(
                'fl-vc-custom-i-uniF159'                        => 'fl-vc-custom-i-uniF159'
            ),
            array(
                'fl-vc-custom-i-uniF15A'                        => 'fl-vc-custom-i-uniF15A'
            ),
            array(
                'fl-vc-custom-i-uniF15B'                        => 'fl-vc-custom-i-uniF15B'
            ),
            array(
                'fl-vc-custom-i-uniF15C'                        => 'fl-vc-custom-i-uniF15C'
            ),
            array(
                'fl-vc-custom-i-uniF15D'                        => 'fl-vc-custom-i-uniF15D'
            ),
            array(
                'fl-vc-custom-i-uniF15E'                        => 'fl-vc-custom-i-uniF15E'
            ),
            array(
                'fl-vc-custom-i-uniF15F'                        => 'fl-vc-custom-i-uniF15F'
            ),
            array(
                'fl-vc-custom-i-uniF160'                        => 'fl-vc-custom-i-uniF160'
            ),
            array(
                'fl-vc-custom-i-uniF161'                        => 'fl-vc-custom-i-uniF161'
            ),
            array(
                'fl-vc-custom-i-uniF162'                        => 'fl-vc-custom-i-uniF162'
            ),
            array(
                'fl-vc-custom-i-uniF163'                        => 'fl-vc-custom-i-uniF163'
            ),
            array(
                'fl-vc-custom-i-uniF113'                        => 'fl-vc-custom-i-uniF113'
            ),
            array(
                'fl-vc-custom-i-uniF156'                        => 'fl-vc-custom-i-uniF156'
            ),
            array(
                'fl-vc-custom-i-uniF13D'                        => 'fl-vc-custom-i-uniF13D'
            ),
            array(
                'fl-vc-custom-i-uniF10C'                        => 'fl-vc-custom-i-uniF10C'
            ),
            array(
                'fl-vc-custom-i-uniF132'                        => 'fl-vc-custom-i-uniF132'
            ),
        );


        return array_merge($icons, $flicon_icons);
    }
}


add_filter('vc_iconpicker-type-essential', 'vc_iconpicker_type_essential');

if (!function_exists('vc_iconpicker_type_essential')) {
    function vc_iconpicker_type_essential($icons)
    {
        $essential_icons = array(
            array(
                'essential-set-icon-add'                        =>'essential-set-icon-add'
            ),
            array(
                'essential-set-icon-add-1'                      =>'essential-set-icon-add-1'),
            array(
                'essential-set-icon-add-2'                      => 'essential-set-icon-add-2'),
            array(
                'essential-set-icon-add-3'                      => 'essential-set-icon-add-3'),
            array(
                'essential-set-icon-agenda'                     => 'essential-set-icon-agenda'),
            array(
                'essential-set-icon-alarm'                      => 'essential-set-icon-alarm'),
            array(
                'essential-set-icon-alarm-1'                    => 'essential-set-icon-alarm-1'),
            array(
                'essential-set-icon-alarm-clock'                => 'essential-set-icon-alarm-clock'),
            array(
                'essential-set-icon-alarm-clock-1'              => 'essential-set-icon-alarm-clock-1'),
            array(
                'essential-set-icon-albums'                     =>'essential-set-icon-albums'),
            array(
                'essential-set-icon-app'                        => 'essential-set-icon-app'),
            array(
                'essential-set-icon-archive'                    => 'essential-set-icon-archive'),
            array(
                'essential-set-icon-archive-1'                  => 'essential-set-icon-archive-1'),
            array(
                'essential-set-icon-archive-2'                  => 'essential-set-icon-archive-2'),
            array(
                'essential-set-icon-archive-3'                  => 'essential-set-icon-archive-3'),
            array(
                'essential-set-icon-attachment'                 => 'essential-set-icon-attachment'),
            array(
                'essential-set-icon-back'                       => 'essential-set-icon-back'),
            array(
                'essential-set-icon-battery'                    => 'essential-set-icon-battery'),
            array(
                'essential-set-icon-battery-1'                  => 'essential-set-icon-battery-1'),
            array(
                'essential-set-icon-battery-2'                  => 'essential-set-icon-battery-2'),
            array(
                'essential-set-icon-battery-3'                  => 'essential-set-icon-battery-3'),
            array(
                'essential-set-icon-battery-4'                  => 'essential-set-icon-battery-4'),
            array(
                'essential-set-icon-battery-5'                  => 'essential-set-icon-battery-5'),
            array(
                'essential-set-icon-battery-6'                  => 'essential-set-icon-battery-6'),
            array(
                'essential-set-icon-battery-7'                  => 'essential-set-icon-battery-7'),
            array(
                'essential-set-icon-battery-8'                  => 'essential-set-icon-battery-8'),
            array(
                'essential-set-icon-battery-9'                  => 'essential-set-icon-battery-9'),
            array(
                'essential-set-icon-binoculars'                 => 'essential-set-icon-binoculars'),
            array(
                'essential-set-icon-blueprint'                  => 'essential-set-icon-blueprint'),
            array(
                'essential-set-icon-bluetooth'                  => 'essential-set-icon-bluetooth'),
            array(
                'essential-set-icon-bluetooth-1'                => 'essential-set-icon-bluetooth-1'),
            array(
                'essential-set-icon-bookmark'                   => 'essential-set-icon-bookmark'),
            array(
                'essential-set-icon-bookmark-1'                 => 'essential-set-icon-bookmark-1'),
            array(
                'essential-set-icon-briefcase'                  => 'essential-set-icon-briefcase'),
            array(
                'essential-set-icon-broken-link'                => 'essential-set-icon-broken-link'),
            array(
                'essential-set-icon-calculator'                 => 'essential-set-icon-calculator'),
            array(
                'essential-set-icon-calculator-1'               => 'essential-set-icon-calculator-1'),
            array(
                'essential-set-icon-calendar' => 'essential-set-icon-calendar'),
            array(
                'essential-set-icon-calendar-1' => 'essential-set-icon-calendar-1'),
            array(
                'essential-set-icon-calendar-2' => 'essential-set-icon-calendar-2'),
            array(
                'essential-set-icon-calendar-3' => 'essential-set-icon-calendar-3'),
            array(
                'essential-set-icon-calendar-4' => 'essential-set-icon-calendar-1'),
            array(
                'essential-set-icon-calendar-5' => 'essential-set-icon-calendar-1'),
            array(
                'essential-set-icon-calendar-6' => 'essential-set-icon-calendar-1'),
            array(
                'essential-set-icon-calendar-7' => 'essential-set-icon-calendar-1'),
            array(
                'essential-set-icon-checked' => 'essential-set-icon-checked'),
            array(
                'essential-set-icon-checked-1' => 'essential-set-icon-checked'),
            array(
                'essential-set-icon-clock' => 'essential-set-icon-clock'),
            array(
                'essential-set-icon-clock-1' => 'essential-set-icon-clock-1'),
            array(
                'essential-set-icon-close' => 'essential-set-icon-close'),
            array(
                'essential-set-icon-cloud' => 'essential-set-icon-cloud'),
            array(
                'essential-set-icon-cloud-computing' => 'ssential-set-icon-cloud-computing'),
            array(
                'essential-set-icon-cloud-computing-1' => 'essential-set-icon-cloud-computing-1'),
            array(
                'essential-set-icon-cloud-computing-2' => 'essential-set-icon-cloud-computing-2'),
            array(
                'essential-set-icon-cloud-computing-3' => 'essential-set-icon-cloud-computing-3'),
            array(
                'essential-set-icon-cloud-computing-4' => 'essential-set-icon-cloud-computing-4'),
            array(
                'essential-set-icon-cloud-computing-5' => 'essential-set-icon-cloud-computing-5'),
            array(
                'essential-set-icon-command' => 'essential-set-icon-command'),
            array(
                'essential-set-icon-compact-disc' => 'essential-set-icon-compact-disc'),
            array(
                'essential-set-icon-compact-disc-1' => 'essential-set-icon-compact-disc'),
            array(
                'essential-set-icon-compact-disc-2' => 'essential-set-icon-compact-disc'),
            array(
                'essential-set-icon-compass' => 'essential-set-icon-compass'),
            array(
                'essential-set-icon-compose' => 'essential-set-icon-compose'),
            array(
                'essential-set-icon-controls' => 'essential-set-icon-controls'),
            array(
                'essential-set-icon-controls-1' => 'essential-set-icon-controls-1'),
            array(
                'essential-set-icon-controls-2' => 'essential-set-icon-controls-2'),
            array(
                'essential-set-icon-controls-3' => 'essential-set-icon-controls-3'),
            array(
                'essential-set-icon-controls-4' => 'essential-set-icon-controls-4'),
            array(
                'essential-set-icon-controls-5' => 'essential-set-icon-controls-5'),
            array(
                'essential-set-icon-controls-6' => 'essential-set-icon-controls-6'),
            array(
                'essential-set-icon-controls-7' => 'essential-set-icon-controls-7'),
            array(
                'essential-set-icon-controls-8' => 'essential-set-icon-controls-8'),
            array(
                'essential-set-icon-controls-9' => 'essential-set-icon-controls-9'),
            array(
                'essential-set-icon-database' => 'essential-set-icon-database'),
            array(
                'essential-set-icon-database-1' => 'essential-set-icon-database-1'),
            array(
                'essential-set-icon-database-2' => 'essential-set-icon-database-2'),
            array(
                'essential-set-icon-database-3' => 'essential-set-icon-database-3'),
            array(
                'essential-set-icon-diamond' => 'essential-set-icon-diamond'),
            array(
                'essential-set-icon-diploma' => 'essential-set-icon-diploma'),
            array(
                'essential-set-icon-dislike' => 'essential-set-icon-dislike'),
            array(
                'essential-set-icon-dislike-1' => 'essential-set-icon-dislike-1'),
            array(
                'essential-set-icon-divide' => 'essential-set-icon-divide'),
            array(
                'essential-set-icon-divide-1' => 'essential-set-icon-divide-1'),
            array(
                'essential-set-icon-division' => 'essential-set-icon-division'),
            array(
                'essential-set-icon-document' => 'essential-set-icon-document'),
            array(
                'essential-set-icon-download' => 'essential-set-icon-download'),
            array(
                'essential-set-icon-edit' => 'essential-set-icon-edit'),
            array(
                'essential-set-icon-edit-1' => 'essential-set-icon-edit-1'),
            array(
                'essential-set-icon-eject' => 'essential-set-icon-eject'),
            array(
                'essential-set-icon-eject-1' => 'essential-set-icon-eject-1'),
            array(
                'essential-set-icon-equal' => 'essential-set-icon-equal'),
            array(
                'essential-set-icon-equal-1' => 'essential-set-icon-equal-1'),
            array(
                'essential-set-icon-equal-2' => 'essential-set-icon-equal-2'),
            array(
                'essential-set-icon-error' => 'essential-set-icon-error'),
            array(
                'essential-set-icon-exit' => 'essential-set-icon-exit'),
            array(
                'essential-set-icon-exit-1' => 'essential-set-icon-exit-1'),
            array(
                'essential-set-icon-exit-2' => 'essential-set-icon-exit-2'),
            array(
                'essential-set-icon-eyeglasses' => 'essential-set-icon-eyeglasses'),
            array(
                'essential-set-icon-fast-forward' => 'essential-set-icon-fast-forward'),
            array(
                'essential-set-icon-fast-forward-1' => 'essential-set-icon-fast-forward-1'),
            array(
                'essential-set-icon-fax' => 'essential-set-icon-fax'),
            array(
                'essential-set-icon-file' => 'essential-set-icon-file'),
            array(
                'essential-set-icon-file-1' => 'essential-set-icon-file-1'),
            array(
                'essential-set-icon-file-2' => 'essential-set-icon-file-2'),
            array(
                'essential-set-icon-film' => 'essential-set-icon-film'),
            array(
                'essential-set-icon-fingerprint' => 'essential-set-icon-fingerprint'),
            array(
                'essential-set-icon-flag' => 'essential-set-icon-flag'),
            array(
                'essential-set-icon-flag-1' => 'essential-set-icon-flag-1'),
            array(
                'essential-set-icon-flag-2' => 'essential-set-icon-flag-2'),
            array(
                'essential-set-icon-flag-3' => 'essential-set-icon-flag-3'),
            array(
                'essential-set-icon-flag-4' => 'essential-set-icon-flag-4'),
            array(
                'essential-set-icon-focus' => 'essential-set-icon-focus'),
            array(
                'essential-set-icon-folder' => 'essential-set-icon-folder'),
            array(
                'essential-set-icon-folder-1' => 'essential-set-icon-folder-1'),
            array(
                'essential-set-icon-folder-10' => 'essential-set-icon-folder-10'),
            array(
                'essential-set-icon-folder-11' => 'essential-set-icon-folder-11'),
            array(
                'essential-set-icon-folder-12' => 'essential-set-icon-folder-12'),
            array(
                'essential-set-icon-folder-13' => 'essential-set-icon-folder-13'),
            array(
                'essential-set-icon-folder-14' => 'essential-set-icon-folder-14'),
            array(
                'essential-set-icon-folder-15' => 'essential-set-icon-folder-15'),
            array(
                'essential-set-icon-folder-16' => 'essential-set-icon-folder-16'),
            array(
                'essential-set-icon-folder-17' => 'essential-set-icon-folder-17'),
            array(
                'essential-set-icon-folder-18' => 'essential-set-icon-folder-18'),
            array(
                'essential-set-icon-folder-19' => 'essential-set-icon-folder-19'),
            array(
                'essential-set-icon-folder-2' => 'essential-set-icon-folder-2'),
            array(
                'essential-set-icon-folder-3' => 'essential-set-icon-folder-3'),
            array(
                'essential-set-icon-folder-4' => 'essential-set-icon-folder-4'),
            array(
                'essential-set-icon-folder-5' => 'essential-set-icon-folder-5'),
            array(
                'essential-set-icon-folder-6' => 'essential-set-icon-folder-6'),
            array(
                'essential-set-icon-folder-7' => 'essential-set-icon-folder-7'),
            array(
                'essential-set-icon-folder-8' => 'essential-set-icon-folder-8'),
            array(
                'essential-set-icon-folder-9' => 'essential-set-icon-folder-9'),
            array(
                'essential-set-icon-forbidden' => 'essential-set-icon-forbidden'),
            array(
                'essential-set-icon-funnel' => 'essential-set-icon-funnel'),
            array(
                'essential-set-icon-garbage' => 'essential-set-icon-garbage'),
            array(
                'essential-set-icon-garbage-1' => 'essential-set-icon-garbage-1'),
            array(
                'essential-set-icon-garbage-2' => 'essential-set-icon-garbage-2'),
            array(
                'essential-set-icon-gift' => 'essential-set-icon-gift'),
            array(
                'essential-set-icon-help' => 'essential-set-icon-help'),
            array(
                'essential-set-icon-hide' => 'essential-set-icon-hide'),
            array(
                'essential-set-icon-hold' => 'essential-set-icon-hold'),
            array(
                'essential-set-icon-home' => 'essential-set-icon-home'),
            array(
                'essential-set-icon-home-1' => 'essential-set-icon-home-1'),
            array(
                'essential-set-icon-home-2' => 'essential-set-icon-home-2'),
            array(
                'essential-set-icon-hourglass' => 'essential-set-icon-hourglass'),
            array(
                'essential-set-icon-hourglass-1' => 'essential-set-icon-hourglass-1'),
            array(
                'essential-set-icon-hourglass-2' => 'essential-set-icon-hourglass-2'),
            array(
                'essential-set-icon-hourglass-3' => 'essential-set-icon-hourglass-3'),
            array(
                'essential-set-icon-house' => 'essential-set-icon-house'),
            array(
                'essential-set-icon-id-card' => 'essential-set-icon-id-card'),
            array(
                'essential-set-icon-id-card-1' => 'essential-set-icon-id-card-1'),
            array(
                'essential-set-icon-id-card-2' => 'essential-set-icon-id-card-2'),
            array(
                'essential-set-icon-id-card-3' => 'essential-set-icon-id-card-3'),
            array(
                'essential-set-icon-id-card-4' => 'essential-set-icon-id-card-4'),
            array(
                'essential-set-icon-id-card-5' => 'essential-set-icon-id-card-5'),
            array(
                'essential-set-icon-idea' => 'essential-set-icon-idea'),
            array(
                'essential-set-icon-incoming' => 'essential-set-icon-incoming'),
            array(
                'essential-set-icon-infinity' => 'essential-set-icon-infinity'),
            array(
                'essential-set-icon-info' => 'essential-set-icon-info'),
            array(
                'essential-set-icon-internet' => 'essential-set-icon-internet'),
            array(
                'essential-set-icon-key' => 'essential-set-icon-key'),
            array(
                'essential-set-icon-lamp' => 'essential-set-icon-lamp'),
            array(
                'essential-set-icon-layers' => 'essential-set-icon-layers'),
            array(
                'essential-set-icon-layers-1' => 'essential-set-icon-layers-1'),
            array(
                'essential-set-icon-like' => 'essential-set-icon-like'),
            array(
                'essential-set-icon-like-1' => 'essential-set-icon-like-1'),
            array(
                'essential-set-icon-like-2' =>'essential-set-icon-like-2'),
            array(
                'essential-set-icon-link' =>'essential-set-icon-link'),
            array(
                'essential-set-icon-list' => 'essential-set-icon-list'),
            array(
                'essential-set-icon-list-1' => 'essential-set-icon-list-1'),
            array(
                'essential-set-icon-lock' => 'essential-set-icon-lock'),
            array(
                'essential-set-icon-lock-1' => 'essential-set-icon-lock-1'),
            array(
                'essential-set-icon-locked' => 'essential-set-icon-locked'),
            array(
                'essential-set-icon-locked-1' =>'essential-set-icon-locked-1'),
            array(
                'essential-set-icon-locked-2' => 'essential-set-icon-locked-2'),
            array(
                'essential-set-icon-locked-3' => 'essential-set-icon-locked-3'),
            array(
                'essential-set-icon-locked-4' => 'essential-set-icon-locked-4'),
            array(
                'essential-set-icon-locked-5' => 'essential-set-icon-locked-5'),
            array(
                'essential-set-icon-locked-6' =>'essential-set-icon-locked-6'),
            array(
                'essential-set-icon-login' =>'essential-set-icon-login'),
            array(
                'essential-set-icon-magic-wand' => 'essential-set-icon-magic-wand'),
            array(
                'essential-set-icon-magnet' =>'essential-set-icon-magnet'),
            array(
                'essential-set-icon-magnet-1' => 'essential-set-icon-magnet-1'),
            array(
                'essential-set-icon-magnet-2' =>'essential-set-icon-magnet-2'),
            array(
                'essential-set-icon-map' => 'essential-set-icon-map'),
            array(
                'essential-set-icon-map-1' => 'essential-set-icon-map-1'),
            array(
                'essential-set-icon-map-2' => 'essential-set-icon-map-2'),
            array(
                'essential-set-icon-map-location' => 'essential-set-icon-map-location'),
            array(
                'essential-set-icon-megaphone' => 'essential-set-icon-megaphone'),
            array(
                'essential-set-icon-megaphone-1' =>'essential-set-icon-megaphone-1'),
            array(
                'essential-set-icon-menu' =>'essential-set-icon-menu'),
            array(
                'essential-set-icon-menu-1' => 'essential-set-icon-menu-1'),
            array(
                'essential-set-icon-menu-2' => 'essential-set-icon-menu-2'),
            array(
                'essential-set-icon-menu-3' =>'essential-set-icon-menu-3'),
            array(
                'essential-set-icon-menu-4' => 'essential-set-icon-menu-4'),
            array(
                'essential-set-icon-microphone' => 'essential-set-icon-microphone'),
            array(
                'essential-set-icon-microphone-1' => 'essential-set-icon-microphone-1'),
            array(
                'essential-set-icon-minus' => 'essential-set-icon-minus'),
            array(
                'essential-set-icon-minus-1' =>'essential-set-icon-minus-1'),
            array(
                'essential-set-icon-more' =>'essential-set-icon-more'),
            array(
                'essential-set-icon-more-1' =>'essential-set-icon-more-1'),
            array(
                'essential-set-icon-more-2' =>'essential-set-icon-more-2'),
            array(
                'essential-set-icon-multiply' =>'essential-set-icon-multiply'),
            array(
                'essential-set-icon-multiply-1' => 'essential-set-icon-multiply-1'),
            array(
                'essential-set-icon-music-player' => 'essential-set-icon-music-player'),
            array(
                'essential-set-icon-music-player-1' => 'essential-set-icon-music-player-1'),
            array(
                'essential-set-icon-music-player-2' => 'essential-set-icon-music-player-2'),
            array(
                'essential-set-icon-music-player-3' => 'essential-set-icon-music-player-3'),
            array(
                'essential-set-icon-mute' => 'essential-set-icon-mute'),
            array(
                'essential-set-icon-muted' => 'essential-set-icon-muted'),
            array(
                'essential-set-icon-navigation' => 'essential-set-icon-navigation'),
            array(
                'essential-set-icon-navigation-1' => 'essential-set-icon-navigation-1'),
            array(
                'essential-set-icon-network' => 'essential-set-icon-network'),
            array(
                'essential-set-icon-newspaper' => 'essential-set-icon-newspaper'),
            array(
                'essential-set-icon-next' => 'essential-set-icon-next'),
            array(
                'essential-set-icon-note' => 'essential-set-icon-note'),
            array(
                'essential-set-icon-notebook' => 'essential-set-icon-notebook'),
            array(
                'essential-set-icon-notebook-1' => 'essential-set-icon-notebook-1'),
            array(
                'essential-set-icon-notebook-2' => 'essential-set-icon-notebook-2'),
            array(
                'essential-set-icon-notebook-3' => 'essential-set-icon-notebook-3'),
            array(
                'essential-set-icon-notebook-4' => 'essential-set-icon-notebook-4'),
            array(
                'essential-set-icon-notebook-5' => 'essential-set-icon-notebook-5'),
            array(
                'essential-set-icon-notepad' => 'essential-set-icon-notepad'),
            array(
                'essential-set-icon-notepad-1' => 'essential-set-icon-notepad-1'),
            array(
                'essential-set-icon-notepad-2' => 'essential-set-icon-notepad-2'),
            array(
                'essential-set-icon-notification' => 'essential-set-icon-notification'),
            array(
                'essential-set-icon-paper-plane' => 'essential-set-icon-paper-plane'),
            array(
                'essential-set-icon-paper-plane-1' => 'essential-set-icon-paper-plane-1'),
            array(
                'essential-set-icon-pause' => 'essential-set-icon-pause'),
            array(
                'essential-set-icon-pause-1' => 'essential-set-icon-pause-1'),
            array(
                'essential-set-icon-percent' => 'essential-set-icon-percent'),
            array(
                'essential-set-icon-percent-1' => 'essential-set-icon-percent-1'),
            array(
                'essential-set-icon-perspective' => 'essential-set-icon-perspective'),
            array(
                'essential-set-icon-photo-camera' => 'essential-set-icon-photo-camera'),
            array(
                'essential-set-icon-photo-camera-1' => 'essential-set-icon-photo-camera-1'),
            array(
                'essential-set-icon-photos' => 'essential-set-icon-photos'),
            array(
                'essential-set-icon-picture' => 'essential-set-icon-picture'),
            array(
                'essential-set-icon-picture-1' => 'essential-set-icon-picture-1'),
            array(
                'essential-set-icon-picture-2' => 'essential-set-icon-picture-2'),
            array(
                'essential-set-icon-pin' => 'essential-set-icon-pin'),
            array(
                'essential-set-icon-placeholder' => 'essential-set-icon-placeholder'),
            array(
                'essential-set-icon-placeholder-1' => 'essential-set-icon-placeholder-1'),
            array(
                'essential-set-icon-placeholder-2' => 'essential-set-icon-placeholder-2'),
            array(
                'essential-set-icon-placeholder-3' => 'essential-set-icon-placeholder-3'),
            array(
                'essential-set-icon-placeholders' => 'essential-set-icon-placeholders'),
            array(
                'essential-set-icon-play-button' => 'essential-set-icon-play-button'),
            array(
                'essential-set-icon-play-button-1' => 'essential-set-icon-play-button-1'),
            array(
                'essential-set-icon-plus' => 'essential-set-icon-plus'),
            array(
                'essential-set-icon-power' => 'essential-set-icon-power'),
            array(
                'essential-set-icon-previous' => 'essential-set-icon-previous'),
            array(
                'essential-set-icon-price-tag' => 'essential-set-icon-price-tag'),
            array(
                'essential-set-icon-print' => 'essential-set-icon-print'),
            array(
                'essential-set-icon-push-pin' => 'essential-set-icon-push-pin'),
            array(
                'essential-set-icon-radar' => 'essential-set-icon-radar'),
            array(
                'essential-set-icon-reading' => 'essential-set-icon-reading'),
            array(
                'essential-set-icon-record' => 'essential-set-icon-record'),
            array(
                'essential-set-icon-repeat' => 'essential-set-icon-repeat'),
            array(
                'essential-set-icon-repeat-1' => 'essential-set-icon-repeat-1'),
            array(
                'essential-set-icon-restart' => 'essential-set-icon-restart'),
            array(
                'essential-set-icon-resume' => 'essential-set-icon-resume'),
            array(
                'essential-set-icon-rewind' => 'essential-set-icon-rewind'),
            array(
                'essential-set-icon-rewind-1' => 'essential-set-icon-rewind-1'),
            array(
                'essential-set-icon-route' => 'essential-set-icon-route'),
            array(
                'essential-set-icon-save' => 'essential-set-icon-save'),
            array(
                'essential-set-icon-search' => 'essential-set-icon-search'),
            array(
                'essential-set-icon-search-1' => 'essential-set-icon-search-1'),
            array(
                'essential-set-icon-send' => 'essential-set-icon-send'),
            array(
                'essential-set-icon-server' => 'essential-set-icon-server'),
            array(
                'essential-set-icon-server-1' => 'essential-set-icon-server-1'),
            array(
                'essential-set-icon-server-2' => 'essential-set-icon-server-2'),
            array(
                'essential-set-icon-server-3' => 'essential-set-icon-server-3'),
            array(
                'essential-set-icon-settings' =>'essential-set-icon-settings'),
            array(
                'essential-set-icon-settings-1' => 'essential-set-icon-settings-1'),
            array(
                'essential-set-icon-settings-2' =>'essential-set-icon-settings-2'),
            array(
                'essential-set-icon-settings-3' =>'essential-set-icon-settings-3'),
            array(
                'essential-set-icon-settings-4' =>'essential-set-icon-settings-4'),
            array(
                'essential-set-icon-settings-5' =>'essential-set-icon-settings-5'),
            array(
                'essential-set-icon-settings-6' => 'essential-set-icon-settings-6'),
            array(
                'essential-set-icon-settings-7' =>'essential-set-icon-settings-7'),
            array(
                'essential-set-icon-settings-8' => 'essential-set-icon-settings-8'),
            array(
                'essential-set-icon-settings-9' =>'essential-set-icon-settings-9'),
            array(
                'essential-set-icon-share' =>'essential-set-icon-share'),
            array(
                'essential-set-icon-share-1' => 'essential-set-icon-share-1'),
            array(
                'essential-set-icon-share-2' =>'essential-set-icon-share-2'),
            array(
                'essential-set-icon-shuffle' => 'essential-set-icon-shuffle'),
            array(
                'essential-set-icon-shuffle-1' => 'essential-set-icon-shuffle-1'),
            array(
                'essential-set-icon-shutdown' => 'essential-set-icon-shutdown'),
            array(
                'essential-set-icon-sign' => 'essential-set-icon-sign'),
            array(
                'essential-set-icon-sign-1' => 'essential-set-icon-sign-1'),
            array(
                'essential-set-icon-skip' => 'essential-set-icon-skip'),
            array(
                'essential-set-icon-smartphone' => 'essential-set-icon-smartphone'),
            array(
                'essential-set-icon-smartphone-1' => 'essential-set-icon-smartphone-1'),
            array(
                'essential-set-icon-smartphone-10' => 'essential-set-icon-smartphone-10'),
            array(
                'essential-set-icon-smartphone-11' => 'essential-set-icon-smartphone-11'),
            array(
                'essential-set-icon-smartphone-2' => 'essential-set-icon-smartphone-2'),
            array(
                'essential-set-icon-smartphone-3' => 'essential-set-icon-smartphone-3'),
            array(
                'essential-set-icon-smartphone-4' => 'essential-set-icon-smartphone-4'),
            array(
                'essential-set-icon-smartphone-5' => 'essential-set-icon-smartphone-5'),
            array(
                'essential-set-icon-smartphone-6' => 'essential-set-icon-smartphone-6'),
            array(
                'essential-set-icon-smartphone-7' => 'essential-set-icon-smartphone-7'),
            array(
                'essential-set-icon-smartphone-8' => 'essential-set-icon-smartphone-8'),
            array(
                'essential-set-icon-smartphone-9' => 'essential-set-icon-smartphone-9'),
            array(
                'essential-set-icon-speaker' => 'essential-set-icon-speaker'),
            array(
                'essential-set-icon-speaker-1' => 'essential-set-icon-speaker-1'),
            array(
                'essential-set-icon-speaker-2' => 'essential-set-icon-speaker-2'),
            array(
                'essential-set-icon-speaker-3' => 'essential-set-icon-speaker-3'),
            array(
                'essential-set-icon-speaker-4' =>'essential-set-icon-speaker-4'),
            array(
                'essential-set-icon-speaker-5' => 'essential-set-icon-speaker-5'),
            array(
                'essential-set-icon-speaker-6' =>'essential-set-icon-speaker-6'),
            array(
                'essential-set-icon-speaker-7' =>'essential-set-icon-speaker-7'),
            array(
                'essential-set-icon-speaker-8' =>'essential-set-icon-speaker-8'),
            array(
                'essential-set-icon-spotlight' =>'essential-set-icon-spotlight'),
            array(
                'essential-set-icon-star' => 'essential-set-icon-star'),
            array(
                'essential-set-icon-star-1' =>'essential-set-icon-star-1'),
            array(
                'essential-set-icon-stop' =>'essential-set-icon-stop'),
            array(
                'essential-set-icon-stop-1' =>'essential-set-icon-stop-1'),
            array(
                'essential-set-icon-stopwatch' =>'essential-set-icon-stopwatch'),
            array(
                'essential-set-icon-stopwatch-1' =>'essential-set-icon-stopwatch-1'),
            array(
                'essential-set-icon-stopwatch-2' =>'essential-set-icon-stopwatch-2'),
            array(
                'essential-set-icon-stopwatch-3' =>'essential-set-icon-stopwatch-3'),
            array(
                'essential-set-icon-stopwatch-4' =>'essential-set-icon-stopwatch-4'),
            array(
                'essential-set-icon-street' =>'essential-set-icon-street'),
            array(
                'essential-set-icon-street-1' =>'essential-set-icon-street-1'),
            array(
                'essential-set-icon-substract' =>'essential-set-icon-substract'),
            array(
                'essential-set-icon-substract-1' =>'essential-set-icon-substract-1'),
            array(
                'essential-set-icon-success' =>'essential-set-icon-success'),
            array(
                'essential-set-icon-switch' =>'essential-set-icon-switch'),
            array(
                'essential-set-icon-switch-1' =>'essential-set-icon-switch-1'),
            array(
                'essential-set-icon-switch-2' =>'essential-set-icon-switch-2'),
            array(
                'essential-set-icon-switch-3' =>'essential-set-icon-switch-3'),
            array(
                'essential-set-icon-switch-4' =>'essential-set-icon-switch-4'),
            array(
                'essential-set-icon-switch-5' => 'essential-set-icon-switch-5'),
            array(
                'essential-set-icon-switch-6' => 'essential-set-icon-switch-6'),
            array(
                'essential-set-icon-switch-7' =>'essential-set-icon-switch-7'),
            array(
                'essential-set-icon-tabs' =>'essential-set-icon-tabs'),
            array(
                'essential-set-icon-tabs-1' => ''),
            array(
                'essential-set-icon-target' =>'essential-set-icon-target'),
            array(
                'essential-set-icon-television' =>'essential-set-icon-television'),
            array(
                'essential-set-icon-television-1' =>'essential-set-icon-television-1'),
            array(
                'essential-set-icon-time' =>'essential-set-icon-time'),
            array(
                'essential-set-icon-trash' =>'essential-set-icon-trash'),
            array(
                'essential-set-icon-umbrella' => 'essential-set-icon-umbrella'),
            array(
                'essential-set-icon-unlink' =>'essential-set-icon-unlink'),
            array(
                'essential-set-icon-unlocked' =>'essential-set-icon-unlocked'),
            array(
                'essential-set-icon-unlocked-1' =>'essential-set-icon-unlocked-1'),
            array(
                'essential-set-icon-unlocked-2' =>'essential-set-icon-unlocked-2'),
            array(
                'essential-set-icon-upload' =>'essential-set-icon-upload'),
            array(
                'essential-set-icon-user' =>'essential-set-icon-user'),
            array(
                'essential-set-icon-user-1' =>'essential-set-icon-user-1'),
            array(
                'essential-set-icon-user-2' => 'essential-set-icon-user-2'),
            array(
                'essential-set-icon-user-3' =>'essential-set-icon-user-3'),
            array(
                'essential-set-icon-user-4' =>'essential-set-icon-user-4'),
            array(
                'essential-set-icon-user-5' => 'essential-set-icon-user-5'),
            array(
                'essential-set-icon-user-6' =>'essential-set-icon-user-6'),
            array(
                'essential-set-icon-user-7' => 'essential-set-icon-user-7'),
            array(
                'essential-set-icon-users' =>'essential-set-icon-users'),
            array(
                'essential-set-icon-users-1' => 'essential-set-icon-users-1'),
            array(
                'essential-set-icon-video-camera' =>'essential-set-icon-video-camera'),
            array(
                'essential-set-icon-video-camera-1' => 'essential-set-icon-video-camera-1'),
            array(
                'essential-set-icon-video-player' =>'essential-set-icon-video-player'),
            array(
                'essential-set-icon-video-player-1' =>'essential-set-icon-video-player-1'),
            array(
                'essential-set-icon-video-player-2' =>'essential-set-icon-video-player-2'),
            array(
                'essential-set-icon-view' =>'essential-set-icon-view'),
            array(
                'essential-set-icon-view-1' =>'essential-set-icon-view-1'),
            array(
                'essential-set-icon-view-2' =>'essential-set-icon-view-2'),
            array(
                'essential-set-icon-volume-control' =>'essential-set-icon-volume-control'),
            array(
                'essential-set-icon-volume-control-1' => 'essential-set-icon-volume-control-1'),
            array(
                'essential-set-icon-warning' =>'essential-set-icon-warning'),
            array(
                'essential-set-icon-wifi' => 'essential-set-icon-wifi'),
            array(
                'essential-set-icon-wifi-1' => 'essential-set-icon-wifi-1'),
            array(
                'essential-set-icon-windows' =>'essential-set-icon-windows'),
            array(
                'essential-set-icon-windows-1' =>'essential-set-icon-windows-1'),
            array(
                'essential-set-icon-windows-2' => 'essential-set-icon-windows-2'),
            array(
                'essential-set-icon-windows-3' => 'essential-set-icon-windows-3'),
            array(
                'essential-set-icon-windows-4' => 'essential-set-icon-windows-4'),
            array(
                'essential-set-icon-wireless-internet' =>'essential-set-icon-wireless-internet'),
            array(
                'essential-set-icon-worldwide' =>'essential-set-icon-worldwide'),
            array(
                'essential-set-icon-worldwide-1' => 'essential-set-icon-worldwide-1'),
            array(
                'essential-set-icon-zoom-in' => 'essential-set-icon-zoom-in'),
            array(
                'essential-set-icon-zoom-out' => 'essential-set-icon-zoom-out'),

        );


        return array_merge($icons,$essential_icons);
    }
}





add_filter('vc_iconpicker-type-iconic', 'vc_iconpicker_type_iconic');

if (!function_exists('vc_iconpicker_type_iconic')) {
    function vc_iconpicker_type_iconic($icons)
    {
        $iconic_icons = array(
            array(
                'iconic-font iconic-search' => 'search'
            ),
            array(
                'iconic-font iconic-mail' => 'mail'
            ),
            array(
                'iconic-font iconic-heart' => 'heart'
            ),
            array(
                'iconic-font iconic-heart-empty' => 'heart-empty'
            ),
            array(
                'iconic-font iconic-star' => 'star'
            ),
            array(
                'iconic-font iconic-user' => 'user'
            ),
            array(
                'iconic-font iconic-video' => 'video'
            ),
            array(
                'iconic-font iconic-picture' => 'picture'
            ),
            array(
                'iconic-font iconic-camera' => 'camera'
            ),
            array(
                'iconic-font iconic-ok' => 'ok'
            ),
            array(
                'iconic-font iconic-ok-circle' => 'ok-circle'
            ),
            array(
                'iconic-font iconic-cancel' => 'cancel'
            ),
            array(
                'iconic-font iconic-cancel-circle' => 'cancel-circle'
            ),
            array(
                'iconic-font iconic-plus' => 'plus'
            ),
            array(
                'iconic-font iconic-plus-circle' => 'plus-circle'
            ),
            array(
                'iconic-font iconic-minus' => 'minus'
            ),
            array(
                'iconic-font iconic-minus-circle' => 'minus-circle'
            ),
            array(
                'iconic-font iconic-help' => 'help'
            ),
            array(
                'iconic-font iconic-info' => 'info'
            ),
            array(
                'iconic-font iconic-home' => 'home'
            ),
            array(
                'iconic-font iconic-link' => 'link'
            ),
            array(
                'iconic-font iconic-attach' => 'attach'
            ),
            array(
                'iconic-font iconic-lock' => 'lock'
            ),
            array(
                'iconic-font iconic-lock-empty' => 'lock-empty'
            ),
            array(
                'iconic-font iconic-lock-open' => 'lock-open'
            ),
            array(
                'iconic-font iconic-lock-open-empty' => 'lock-open-empty'
            ),
            array(
                'iconic-font iconic-pin' => 'pin'
            ),
            array(
                'iconic-font iconic-eye' => 'eye'
            ),
            array(
                'iconic-font iconic-tag' => 'tag'
            ),
            array(
                'iconic-font iconic-tag-empty' => 'tag-empty'
            ),
            array(
                'iconic-font iconic-download' => 'download'
            ),
            array(
                'iconic-font iconic-upload' => 'upload'
            ),
            array(
                'iconic-font iconic-download-cloud' => 'download-cloud'
            ),
            array(
                'iconic-font iconic-upload-cloud' => 'upload-cloud'
            ),
            array(
                'iconic-font iconic-quote-left' => 'quote-left'
            ),
            array(
                'iconic-font iconic-quote-right' => 'quote-right'
            ),
            array(
                'iconic-font iconic-quote-left-alt' => 'quote-left-alt'
            ),
            array(
                'iconic-font iconic-quote-right-alt' => 'quote-right-alt'
            ),
            array(
                'iconic-font iconic-pencil' => 'pencil'
            ),
            array(
                'iconic-font iconic-pencil-neg' => 'pencil-neg'
            ),
            array(
                'iconic-font iconic-pencil-alt' => 'pencil-alt'
            ),
            array(
                'iconic-font iconic-undo' => 'undo'
            ),
            array(
                'iconic-font iconic-comment' => 'comment'
            ),
            array(
                'iconic-font iconic-comment-inv' => 'comment-inv'
            ),
            array(
                'iconic-font iconic-comment-alt' => 'comment-alt'
            ),
            array(
                'iconic-font iconic-comment-inv-alt' => 'comment-inv-alt'
            ),
            array(
                'iconic-font iconic-comment-alt2' => 'comment-alt2'
            ),
            array(
                'iconic-font iconic-comment-inv-alt2' => 'comment-inv-alt2'
            ),
            array(
                'iconic-font iconic-chat' => 'chat'
            ),
            array(
                'iconic-font iconic-chat-inv' => 'chat-inv'
            ),
            array(
                'iconic-font iconic-location' => 'location'
            ),
            array(
                'iconic-font iconic-location-inv' => 'location-inv'
            ),
            array(
                'iconic-font iconic-location-alt' => 'location-alt'
            ),
            array(
                'iconic-font iconic-compass' => 'compass'
            ),
            array(
                'iconic-font iconic-trash' => 'trash'
            ),
            array(
                'iconic-font iconic-trash-empty' => 'trash-empty'
            ),
            array(
                'iconic-font iconic-doc' => 'iconic-doc'
            ),
            array(
                'iconic-font iconic-doc-inv' => 'doc-inv'
            ),
            array(
                'iconic-font iconic-doc-alt' => 'doc-alt'
            ),
            array(
                'iconic-font iconic-doc-inv-alt' => 'doc-inv-alt'
            ),
            array(
                'iconic-font iconic-article' => 'article'
            ),
            array(
                'iconic-font iconic-article-alt' => 'article-alt'
            ),
            array(
                'iconic-font iconic-book-open' => 'book-open'
            ),
            array(
                'iconic-font iconic-folder' => 'folder'
            ),
            array(
                'iconic-font iconic-folder-empty' => 'folder-empty'
            ),
            array(
                'iconic-font iconic-box' => 'box'
            ),
            array(
                'iconic-font iconic-rss' => 'rss'
            ),
            array(
                'iconic-font iconic-rss-alt' => 'rss-alt'
            ),
            array(
                'iconic-font iconic-cog' => 'cog'
            ),
            array(
                'iconic-font iconic-wrench' => 'wrench'
            ),
            array(
                'iconic-font iconic-share' => 'share'
            ),
            array(
                'iconic-font iconic-calendar' => 'calendar'
            ),
            array(
                'iconic-font iconic-calendar-inv' => 'calendar-inv'
            ),
            array(
                'iconic-font iconic-calendar-alt' => 'calendar-alt'
            ),
            array(
                'iconic-font iconic-mic' => 'mic'
            ),
            array(
                'iconic-font iconic-volume-off' => 'volume-off'
            ),
            array(
                'iconic-font iconic-volume-up' => 'volume-up'
            ),
            array(
                'iconic-font iconic-headphones' => 'headphones'
            ),
            array(
                'iconic-font iconic-clock' => 'clock'
            ),
            array(
                'iconic-font iconic-lamp' => 'lamp'
            ),
            array(
                'iconic-font iconic-block' => 'block'
            ),
            array(
                'iconic-font iconic-resize-full' => 'resize-full'
            ),
            array(
                'iconic-font iconic-resize-full-alt' => 'resize-full-alt'
            ),
            array(
                'iconic-font iconic-resize-small' => 'resize-small'
            ),
            array(
                'iconic-font iconic-resize-small-alt' => 'resize-small-alt'
            ),
            array(
                'iconic-font iconic-resize-vertical' => 'resize-vertical'
            ),
            array(
                'iconic-font iconic-resize-horizontal' => 'resize-horizontal'
            ),
            array(
                'iconic-font iconic-move' => 'move'
            ),
            array(
                'iconic-font iconic-popup' => 'popup'
            ),
            array(
                'iconic-font iconic-down' => 'down'
            ),
            array(
                'iconic-font iconic-left' => 'left'
            ),
            array(
                'iconic-font iconic-right' => 'right'
            ),
            array(
                'iconic-font iconic-up' => 'up'
            ),
            array(
                'iconic-font iconic-down-circle' => 'down-circle'
            ),
            array(
                'iconic-font iconic-left-circle' => 'left-circle'
            ),
            array(
                'iconic-font iconic-right-circle' => 'right-circle'
            ),
            array(
                'iconic-font iconic-up-circle' => 'up-circle'
            ),
            array(
                'iconic-font iconic-cw' => 'cw'
            ),
            array(
                'iconic-font iconic-loop' => 'loop'
            ),
            array(
                'iconic-font iconic-loop-alt' => 'loop-alt'
            ),
            array(
                'iconic-font iconic-exchange' => 'exchange'
            ),
            array(
                'iconic-font iconic-split' => 'split'
            ),
            array(
                'iconic-font iconic-arrow-curved' => 'arrow-curved'
            ),
            array(
                'iconic-font iconic-play' => 'play'
            ),
            array(
                'iconic-font iconic-play-circle2' => 'play-circle2'
            ),
            array(
                'iconic-font iconic-stop' => 'stop'
            ),
            array(
                'iconic-font iconic-pause' => 'pause'
            ),
            array(
                'iconic-font iconic-to-start' => 'to-start'
            ),
            array(
                'iconic-font iconic-to-end' => 'to-end'
            ),
            array(
                'iconic-font iconic-eject' => 'eject'
            ),
            array(
                'iconic-font iconic-target' => 'target'
            ),
            array(
                'iconic-font iconic-signal' => 'signal'
            ),
            array(
                'iconic-font iconic-award' => 'award'
            ),
            array(
                'iconic-font iconic-award-empty' => 'award-empty'
            ),
            array(
                'iconic-font iconic-list' => 'list'
            ),
            array(
                'iconic-font iconic-list-nested' => 'list-nested'
            ),
            array(
                'iconic-font iconic-bat-empty' => 'bat-empty'
            ),
            array(
                'iconic-font iconic-bat-half' => 'bat-half'
            ),
            array(
                'iconic-font iconic-bat-full' => 'bat-full'
            ),
            array(
                'iconic-font iconic-bat-charge' => 'bat-charge'
            ),
            array(
                'iconic-font iconic-mobile' => 'mobile'
            ),
            array(
                'iconic-font iconic-cd' => 'cd'
            ),
            array(
                'iconic-font iconic-equalizer' => 'equalizer'
            ),
            array(
                'iconic-font iconic-cursor' => 'cursor'
            ),
            array(
                'iconic-font iconic-aperture' => 'aperture'
            ),
            array(
                'iconic-font iconic-aperture-alt' => 'aperture-alt'
            ),
            array(
                'iconic-font iconic-steering-wheel' => 'steering-wheel'
            ),
            array(
                'iconic-font iconic-book' => 'book'
            ),
            array(
                'iconic-font iconic-book-alt' => 'book-alt'
            ),
            array(
                'iconic-font iconic-brush' => 'brush'
            ),
            array(
                'iconic-font iconic-brush-alt' => 'brush-alt'
            ),
            array(
                'iconic-font iconic-eyedropper' => 'eyedropper'
            ),
            array(
                'iconic-font iconic-layers' => 'layers'
            ),
            array(
                'iconic-font iconic-layers-alt' => 'layers-alt'
            ),
            array(
                'iconic-font iconic-sun' => 'sun'
            ),
            array(
                'iconic-font iconic-sun-inv' => 'sun-inv'
            ),
            array(
                'iconic-font iconic-cloud' => 'cloud'
            ),
            array(
                'iconic-font iconic-rain' => 'rain'
            ),
            array(
                'iconic-font iconic-flash' => 'flash'
            ),
            array(
                'iconic-font iconic-moon' => 'moon'
            ),
            array(
                'iconic-font iconic-moon-inv' => 'moon-inv'
            ),
            array(
                'iconic-font iconic-umbrella' => 'umbrella'
            ),
            array(
                'iconic-font iconic-chart-bar' => 'chart-bar'
            ),
            array(
                'iconic-font iconic-chart-pie' => 'chart-pie'
            ),
            array(
                'iconic-font iconic-chart-pie-alt' => 'chart-pie-alt'
            ),
            array(
                'iconic-font iconic-key' => 'key'
            ),
            array(
                'iconic-font iconic-key-inv' => 'key-inv'
            ),
            array(
                'iconic-font iconic-hash' => 'hash'
            ),
            array(
                'iconic-font iconic-at' => 'at'
            ),
            array(
                'iconic-font iconic-pilcrow' => 'pilcrow'
            ),
            array(
                'iconic-font iconic-dial' => 'dial'
            ),
        );


        return array_merge($icons, $iconic_icons);
    }
}


//fl-quote font

add_filter('vc_iconpicker-type-flquote', 'vc_iconpicker_type_flquote');

if (!function_exists('vc_iconpicker_type_flquote')) {
    function vc_iconpicker_type_flquote($icons)
    {
        $flquote_icons = array(
            array(
                'fl-quote-left-quotes-sign' => 'left-quotes-sign'
            ),
            array(
                'fl-quote-quote-circled' => 'quote-circled'
            ),
            array(
                'fl-quote-quote-right-alt' => 'quote-right-alt'
            ),
            array(
                'fl-quote-right-quotes-symbol' => 'right-quotes-symbol'
            ),
            array(
                'fl-quote-quote-left-1' => 'quote-left-1'
            ),
            array(
                'fl-quote-quote-left' => 'quote-left'
            ),
            array(
                'fl-quote-two-quotes' => 'two-quotes'
            ),
            array(
                'fl-quote-quote-right-1' => 'quote-right-1'
            ),
            array(
                'fl-quote-quote-right' => 'quote-right'
            ),
            array(
                'fl-quote-quote-1' => 'quote-1'
            ),
            array(
                'fl-quote-quote-left-alt' => 'quote-left-alt'
            ),
        );


        return array_merge($icons, $flquote_icons);
    }
}


//fl-video font

add_filter('vc_iconpicker-type-flvideo', 'vc_iconpicker_type_flvideo');

if (!function_exists('vc_iconpicker_type_flvideo')) {
    function vc_iconpicker_type_flvideo($icons)
    {
        $flvideo_icons = array(
            array(
                'fl-video-play-button-1' => 'video-play-button-1'
            ),
            array(
                'fl-video-play-button-2' => 'video-play-button-2'
            ),
            array(
                'fl-video-play-button-3' => 'video-play-button-3'
            ),
            array(
                'fl-video-play-button-4' => 'video-play-button-4'
            ),
            array(
                'fl-video-play-button-5' => 'video-play-button-5'
            ),
            array(
                'fl-video-play-button-round-2' => 'video-play-button-round-2'
            ),
            array(
                'fl-video-round-play-button' => 'video-round-play-button'
            ),
            array(
                'fl-video-play-button' => 'video-play-button'
            ),
            array(
                'fl-video-play' => 'video-play'
            ),
            array(
                'fl-video-play-circled2' => 'video-play-circled2'
            ),
            array(
                'fl-video-play-5' => 'video-play-5'
            ),
            array(
                'fl-video-play-circled-1' => 'video-play-circled-1'
            ),
            array(
                'fl-video-play-circled2-1' => 'video-play-circled2-1'
            ),
            array(
                'fl-video-play-1' => 'video-play-1'
            ),
            array(
                'fl-video-play-outline' => 'video-play-outline'
            ),
            array(
                'fl-video-play-2' => 'video-play-2'
            ),
            array(
                'fl-video-play-3' => 'video-play-3'
            ),
            array(
                'fl-video-play-circle2' => 'video-play-circle2'
            ),
            array(
                'fl-video-youtube-1' => 'video-youtube-1'
            ),
            array(
                'fl-video-googleplay' => 'video-googleplay'
            ),
            array(
                'fl-video-fl-icon-63' => 'video-fl-icon-63'
            ),
            array(
                'fl-video-video-5' => 'video-video-5'
            ),
            array(
                'fl-video-video-circled' => 'video-video-circled'
            ),
            array(
                'fl-video-play-4' => 'video-play-4'
            ),
            array(
                'fl-video-play-circled' => 'video-play-circled'
            ),
        );


        return array_merge($icons, $flvideo_icons);
    }
}


//fl-close font

add_filter('vc_iconpicker-type-flclose', 'vc_iconpicker_type_flclose');

if (!function_exists('vc_iconpicker_type_flclose')) {
    function vc_iconpicker_type_flclose($icons)
    {
        $flclose_icons = array(
            array(
                'fl-close-cancel-circled2'  => 'close-cancel-circled2'
            ),
            array(
                'fl-close-cancel'           => 'close-cancel'
            ),
            array(
                'fl-close-cancel-circled-1' => 'close-cancel-circled-1'
            ),
            array(
                'fl-close-cancel-outline'   => 'close-cancel-outline'
            ),
            array(
                'fl-close-cancel-4'         => 'close-cancel-4'
            ),
        );
        return array_merge($icons, $flclose_icons);
    }
}


//fl-alert font

add_filter('vc_iconpicker-type-flalert', 'vc_iconpicker_type_flalert');

if (!function_exists('vc_iconpicker_type_flalert')) {
    function vc_iconpicker_type_flalert($icons)
    {
        $flalert_icons = array(
            array(
                'fl-alert-attention-circled' => 'alert-attention-circled'
            ),
            array(
                'fl-alert-attention-1' => 'alert-attention-1'
            ),
            array(
                'fl-alert-exclamation' => 'alert-exclamation'
            ),
            array(
                'fl-alert-attention' => 'alert-attention'
            ),
            array(
                'fl-alert-alert' => 'alert-alert'
            ),
            array(
                'fl-alert-attention-2' => 'alert-attention-2'
            ),
            array(
                'fl-alert-attention-3' => 'alert-attention-3'
            ),
            array(
                'fl-alert-warning-empty' => 'alert-warning-empty'
            ),
            array(
                'fl-alert-attention-filled' => 'alert-attention-filled'
            ),
            array(
                'fl-alert-warning' => 'alert-warning'
            ),
            array(
                'fl-alert-attention-4' => 'alert-attention-4'
            ),
            array(
                'fl-alert-info-4' => 'alert-info-4'
            ),
            array(
                'fl-alert-attention-5' => 'alert-attention-5'
            ),
            array(
                'fl-alert-attention-alt-1' => 'alert-attention-alt-1'
            ),
            array(
                'fl-alert-attention-alt' => 'alert-attention-alt'
            ),
        );
        return array_merge($icons, $flalert_icons);
    }
}
