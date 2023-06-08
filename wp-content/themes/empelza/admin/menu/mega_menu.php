<?php
if ( ! function_exists( 'empelza_fontawesome_menu_icons' ) ) :
    function empelza_fontawesome_menu_icons() {
        $menu_font = array("disable",
            "fa fa-500px","fa fa-address-book","fa fa-address-book-o","fa fa-address-card","fa fa-address-card-o","fa fa-adjust","fa fa-adn","fa fa-align-center","fa fa-align-justify","fa fa-align-left","fa fa-align-right",
            "fa fa-amazon","fa fa-ambulance","fa fa-american-sign-language-interpreting","fa fa-anchor","fa fa-android","fa fa-angellist","fa fa-angle-double-down","fa fa-angle-double-left","fa fa-angle-double-right","fa fa-angle-double-up",
            "fa fa-angle-down","fa fa-angle-left","fa fa-angle-right","fa fa-angle-up","fa fa-apple","fa fa-archive","fa fa-area-chart","fa fa-arrow-circle-down","fa fa-arrow-circle-left","fa fa-arrow-circle-o-down","fa fa-arrow-circle-o-left",
            "fa fa-arrow-circle-o-right","fa fa-arrow-circle-o-up","fa fa-arrow-circle-right","fa fa-arrow-circle-up","fa fa-arrow-down","fa fa-arrow-left","fa fa-arrow-right","fa fa-arrow-up","fa fa-arrows","fa fa-arrows-alt","fa fa-arrows-h",
            "fa fa-arrows-v","fa fa-assistive-listening-systems","fa fa-asterisk","fa fa-at","fa fa-audio-description","fa fa-backward","fa fa-balance-scale","fa fa-ban","fa fa-bandcamp","fa fa-bar-chart","fa fa-barcode","fa fa-bars","fa fa-bath",
            "fa fa-battery-empty","fa fa-battery-full","fa fa-battery-half","fa fa-battery-quarter","fa fa-battery-three-quarters","fa fa-bed","fa fa-beer","fa fa-behance","fa fa-behance-square","fa fa-bell","fa fa-bell-o","fa fa-bell-slash",
            "fa fa-bell-slash-o","fa fa-bicycle","fa fa-binoculars","fa fa-birthday-cake","fa fa-bitbucket","fa fa-bitbucket-square","fa fa-black-tie","fa fa-blind","fa fa-bluetooth","fa fa-bluetooth-b","fa fa-bold","fa fa-bolt","fa fa-bomb","fa fa-book",
            "fa fa-bookmark","fa fa-bookmark-o","fa fa-braille","fa fa-briefcase","fa fa-btc","fa fa-bug","fa fa-building","fa fa-building-o","fa fa-bullhorn","fa fa-bullseye","fa fa-bus","fa fa-buysellads","fa fa-calculator","fa fa-calendar",
            "fa fa-calendar-check-o","fa fa-calendar-minus-o","fa fa-calendar-o","fa fa-calendar-plus-o","fa fa-calendar-times-o","fa fa-camera","fa fa-camera-retro","fa fa-car","fa fa-caret-down","fa fa-caret-left","fa fa-caret-right",
            "fa fa-caret-square-o-down","fa fa-caret-square-o-left","fa fa-caret-square-o-right","fa fa-caret-square-o-up","fa fa-caret-up","fa fa-cart-arrow-down","fa fa-cart-plus","fa fa-cc","fa fa-cc-amex","fa fa-cc-diners-club",
            "fa fa-cc-discover","fa fa-cc-jcb","fa fa-cc-mastercard","fa fa-cc-paypal","fa fa-cc-stripe","fa fa-cc-visa","fa fa-certificate","fa fa-chain-broken","fa fa-check","fa fa-check-circle","fa fa-check-circle-o","fa fa-check-square",
            "fa fa-check-square-o","fa fa-chevron-circle-down","fa fa-chevron-circle-left","fa fa-chevron-circle-right","fa fa-chevron-circle-up","fa fa-chevron-down","fa fa-chevron-left","fa fa-chevron-right","fa fa-chevron-up","fa fa-child",
            "fa fa-chrome","fa fa-circle","fa fa-circle-o","fa fa-circle-o-notch","fa fa-circle-thin","fa fa-clipboard","fa fa-clock-o","fa fa-clone","fa fa-cloud","fa fa-cloud-download","fa fa-cloud-upload","fa fa-code","fa fa-code-fork","fa fa-codepen",
            "fa fa-codiepie","fa fa-coffee","fa fa-cog","fa fa-cogs","fa fa-columns","fa fa-comment","fa fa-comment-o","fa fa-commenting","fa fa-commenting-o","fa fa-comments","fa fa-comments-o","fa fa-compass","fa fa-compress","fa fa-connectdevelop",
            "fa fa-contao","fa fa-copyright","fa fa-creative-commons","fa fa-credit-card","fa fa-credit-card-alt","fa fa-crop","fa fa-crosshairs","fa fa-css3","fa fa-cube","fa fa-cubes","fa fa-cutlery","fa fa-dashcube","fa fa-database","fa fa-deaf",
            "fa fa-delicious","fa fa-desktop","fa fa-deviantart","fa fa-diamond","fa fa-digg","fa fa-dot-circle-o","fa fa-download","fa fa-dribbble","fa fa-dropbox","fa fa-drupal","fa fa-edge","fa fa-eercast","fa fa-eject","fa fa-ellipsis-h","fa fa-ellipsis-v",
            "fa fa-empire","fa fa-envelope","fa fa-envelope-o","fa fa-envelope-open","fa fa-envelope-open-o","fa fa-envelope-square","fa fa-envira","fa fa-eraser","fa fa-etsy","fa fa-eur","fa fa-exchange","fa fa-exclamation","fa fa-exclamation-circle",
            "fa fa-exclamation-triangle","fa fa-expand","fa fa-expeditedssl","fa fa-external-link","fa fa-external-link-square","fa fa-eye","fa fa-eye-slash","fa fa-eyedropper","fa fa-facebook","fa fa-facebook-official","fa fa-facebook-square",
            "fa fa-fast-backward","fa fa-fast-forward","fa fa-fax","fa fa-female","fa fa-fighter-jet","fa fa-file","fa fa-file-archive-o","fa fa-file-audio-o","fa fa-file-code-o","fa fa-file-excel-o","fa fa-file-image-o","fa fa-file-o","fa fa-file-pdf-o",
            "fa fa-file-powerpoint-o","fa fa-file-text","fa fa-file-text-o","fa fa-file-video-o","fa fa-file-word-o","fa fa-files-o","fa fa-film","fa fa-filter","fa fa-fire","fa fa-fire-extinguisher","fa fa-firefox","fa fa-first-order","fa fa-flag",
            "fa fa-flag-checkered","fa fa-flag-o","fa fa-flask","fa fa-flickr","fa fa-floppy-o","fa fa-folder","fa fa-folder-o","fa fa-folder-open","fa fa-folder-open-o","fa fa-font","fa fa-font-awesome","fa fa-fonticons","fa fa-fort-awesome","fa fa-forumbee",
            "fa fa-forward","fa fa-foursquare","fa fa-free-code-camp","fa fa-frown-o","fa fa-futbol-o","fa fa-gamepad","fa fa-gavel","fa fa-gbp","fa fa-genderless","fa fa-get-pocket","fa fa-gg","fa fa-gg-circle","fa fa-gift","fa fa-git","fa fa-git-square",
            "fa fa-github","fa fa-github-alt","fa fa-github-square","fa fa-gitlab","fa fa-glass","fa fa-glide","fa fa-glide-g","fa fa-globe","fa fa-google","fa fa-google-plus","fa fa-google-plus-official","fa fa-google-plus-square","fa fa-google-wallet",
            "fa fa-graduation-cap","fa fa-gratipay","fa fa-grav","fa fa-h-square","fa fa-hacker-news","fa fa-hand-lizard-o","fa fa-hand-o-down","fa fa-hand-o-left","fa fa-hand-o-right","fa fa-hand-o-up","fa fa-hand-paper-o","fa fa-hand-peace-o",
            "fa fa-hand-pointer-o","fa fa-hand-rock-o","fa fa-hand-scissors-o","fa fa-hand-spock-o","fa fa-handshake-o","fa fa-hashtag","fa fa-hdd-o","fa fa-header","fa fa-headphones","fa fa-heart","fa fa-heart-o","fa fa-heartbeat","fa fa-history",
            "fa fa-home","fa fa-hospital-o","fa fa-hourglass","fa fa-hourglass-end","fa fa-hourglass-half","fa fa-hourglass-o","fa fa-hourglass-start","fa fa-houzz","fa fa-html5","fa fa-i-cursor","fa fa-id-badge","fa fa-id-card","fa fa-id-card-o",
            "fa fa-ils","fa fa-imdb","fa fa-inbox","fa fa-indent","fa fa-industry","fa fa-info","fa fa-info-circle","fa fa-inr","fa fa-instagram","fa fa-internet-explorer","fa fa-ioxhost","fa fa-italic","fa fa-joomla","fa fa-jpy","fa fa-jsfiddle","fa fa-key",
            "fa fa-keyboard-o","fa fa-krw","fa fa-language","fa fa-laptop","fa fa-lastfm","fa fa-lastfm-square","fa fa-leaf","fa fa-leanpub","fa fa-lemon-o","fa fa-level-down","fa fa-level-up","fa fa-life-ring","fa fa-lightbulb-o","fa fa-line-chart",
            "fa fa-link","fa fa-linkedin","fa fa-linkedin-square","fa fa-linode","fa fa-linux","fa fa-list","fa fa-list-alt","fa fa-list-ol","fa fa-list-ul","fa fa-location-arrow","fa fa-lock","fa fa-long-arrow-down","fa fa-long-arrow-left",
            "fa fa-long-arrow-right","fa fa-long-arrow-up","fa fa-low-vision","fa fa-magic","fa fa-magnet","fa fa-male","fa fa-map","fa fa-map-marker","fa fa-map-o","fa fa-map-pin","fa fa-map-signs","fa fa-mars","fa fa-mars-double","fa fa-mars-stroke",
            "fa fa-mars-stroke-h","fa fa-mars-stroke-v","fa fa-maxcdn","fa fa-meanpath","fa fa-medium","fa fa-medkit","fa fa-meetup","fa fa-meh-o","fa fa-mercury","fa fa-microchip","fa fa-microphone","fa fa-microphone-slash","fa fa-minus",
            "fa fa-minus-circle","fa fa-minus-square","fa fa-minus-square-o","fa fa-mixcloud","fa fa-mobile","fa fa-modx","fa fa-money","fa fa-moon-o","fa fa-motorcycle","fa fa-mouse-pointer","fa fa-music","fa fa-neuter","fa fa-newspaper-o",
            "fa fa-object-group","fa fa-object-ungroup","fa fa-odnoklassniki","fa fa-odnoklassniki-square","fa fa-opencart","fa fa-openid","fa fa-opera","fa fa-optin-monster","fa fa-outdent","fa fa-pagelines","fa fa-paint-brush","fa fa-paper-plane",
            "fa fa-paper-plane-o","fa fa-paperclip","fa fa-paragraph","fa fa-pause","fa fa-pause-circle","fa fa-pause-circle-o","fa fa-paw","fa fa-paypal","fa fa-pencil","fa fa-pencil-square","fa fa-pencil-square-o","fa fa-percent","fa fa-phone",
            "fa fa-phone-square","fa fa-picture-o","fa fa-pie-chart","fa fa-pied-piper","fa fa-pied-piper-alt","fa fa-pied-piper-pp","fa fa-pinterest","fa fa-pinterest-p","fa fa-pinterest-square","fa fa-plane","fa fa-play","fa fa-play-circle",
            "fa fa-play-circle-o","fa fa-plug","fa fa-plus","fa fa-plus-circle","fa fa-plus-square","fa fa-plus-square-o","fa fa-podcast","fa fa-power-off","fa fa-print","fa fa-product-hunt","fa fa-puzzle-piece","fa fa-qq","fa fa-qrcode","fa fa-question",
            "fa fa-question-circle","fa fa-question-circle-o","fa fa-quora","fa fa-quote-left","fa fa-quote-right","fa fa-random","fa fa-ravelry","fa fa-rebel","fa fa-recycle","fa fa-reddit","fa fa-reddit-alien","fa fa-reddit-square","fa fa-refresh",
            "fa fa-registered","fa fa-renren","fa fa-repeat","fa fa-reply","fa fa-reply-all","fa fa-retweet","fa fa-road","fa fa-rocket","fa fa-rss","fa fa-rss-square","fa fa-rub","fa fa-safari","fa fa-scissors","fa fa-scribd","fa fa-search","fa fa-search-minus",
            "fa fa-search-plus","fa fa-sellsy","fa fa-server","fa fa-share","fa fa-share-alt","fa fa-share-alt-square","fa fa-share-square","fa fa-share-square-o","fa fa-shield","fa fa-ship","fa fa-shirtsinbulk","fa fa-shopping-bag","fa fa-shopping-basket",
            "fa fa-shopping-cart","fa fa-shower","fa fa-sign-in","fa fa-sign-language","fa fa-sign-out","fa fa-signal","fa fa-simplybuilt","fa fa-sitemap","fa fa-skyatlas","fa fa-skype","fa fa-slack","fa fa-sliders","fa fa-slideshare","fa fa-smile-o",
            "fa fa-snapchat","fa fa-snapchat-ghost","fa fa-snapchat-square","fa fa-snowflake-o","fa fa-sort","fa fa-sort-alpha-asc","fa fa-sort-alpha-desc","fa fa-sort-amount-asc","fa fa-sort-amount-desc","fa fa-sort-asc","fa fa-sort-desc",
            "fa fa-sort-numeric-asc","fa fa-sort-numeric-desc","fa fa-soundcloud","fa fa-space-shuttle","fa fa-spinner","fa fa-spoon","fa fa-spotify","fa fa-square","fa fa-square-o","fa fa-stack-exchange","fa fa-stack-overflow","fa fa-star",
            "fa fa-star-half","fa fa-star-half-o","fa fa-star-o","fa fa-steam","fa fa-steam-square","fa fa-step-backward","fa fa-step-forward","fa fa-stethoscope","fa fa-sticky-note","fa fa-sticky-note-o","fa fa-stop","fa fa-stop-circle",
            "fa fa-stop-circle-o","fa fa-street-view","fa fa-strikethrough","fa fa-stumbleupon","fa fa-stumbleupon-circle","fa fa-subscript","fa fa-subway","fa fa-suitcase","fa fa-sun-o","fa fa-superpowers","fa fa-superscript","fa fa-table",
            "fa fa-tablet","fa fa-tachometer","fa fa-tag","fa fa-tags","fa fa-tasks","fa fa-taxi","fa fa-telegram","fa fa-television","fa fa-tencent-weibo","fa fa-terminal","fa fa-text-height","fa fa-text-width","fa fa-th","fa fa-th-large","fa fa-th-list",
            "fa fa-themeisle","fa fa-thermometer-empty","fa fa-thermometer-full","fa fa-thermometer-half","fa fa-thermometer-quarter","fa fa-thermometer-three-quarters","fa fa-thumb-tack","fa fa-thumbs-down","fa fa-thumbs-o-down",
            "fa fa-thumbs-o-up","fa fa-thumbs-up","fa fa-ticket","fa fa-times","fa fa-times-circle","fa fa-times-circle-o","fa fa-tint","fa fa-toggle-off","fa fa-toggle-on","fa fa-trademark","fa fa-train","fa fa-transgender","fa fa-transgender-alt",
            "fa fa-trash","fa fa-trash-o","fa fa-tree","fa fa-trello","fa fa-tripadvisor","fa fa-trophy","fa fa-truck","fa fa-try","fa fa-tty","fa fa-tumblr","fa fa-tumblr-square","fa fa-twitch","fa fa-twitter","fa fa-twitter-square","fa fa-umbrella",
            "fa fa-underline","fa fa-undo","fa fa-universal-access","fa fa-university","fa fa-unlock","fa fa-unlock-alt","fa fa-upload","fa fa-usb","fa fa-usd","fa fa-user","fa fa-user-circle","fa fa-user-circle-o","fa fa-user-md","fa fa-user-o",
            "fa fa-user-plus","fa fa-user-secret","fa fa-user-times","fa fa-users","fa fa-venus","fa fa-venus-double","fa fa-venus-mars","fa fa-viacoin","fa fa-viadeo","fa fa-viadeo-square","fa fa-video-camera","fa fa-vimeo","fa fa-vimeo-square","fa fa-vine",
            "fa fa-vk","fa fa-volume-control-phone","fa fa-volume-down","fa fa-volume-off","fa fa-volume-up","fa fa-weibo","fa fa-weixin","fa fa-whatsapp","fa fa-wheelchair","fa fa-wheelchair-alt","fa fa-wifi","fa fa-wikipedia-w","fa fa-window-close",
            "fa fa-window-close-o","fa fa-window-maximize","fa fa-window-minimize","fa fa-window-restore","fa fa-windows","fa fa-wordpress","fa fa-wpbeginner","fa fa-wpexplorer","fa fa-wpforms","fa fa-wrench","fa fa-xing","fa fa-xing-square",
            "fa fa-y-combinator","fa fa-yahoo","fa fa-yelp","fa fa-yoast","fa fa-youtube","fa fa-youtube-play","fa fa-youtube-square"
        );
        return $menu_font;
    }
endif;

if ( ! defined( 'ABSPATH' ) ) { exit; }
if (!class_exists('EMPELZA_Mega_menu')) {
	class EMPELZA_Mega_menu {

		var $_options;

		public function __construct() {
			$this->_options = self::options();
			$this->_add_filters();
		}

		public static function options() {
            $icon_ListMenu = empelza_fontawesome_menu_icons();


			return array(
			    '_empelza_mega_menu_icon'	=> array(
                    'type'      => 'select_icon',
                    'label'     => esc_html__('Select Icon', 'empelza'),
                    'default'   => 0,
                    'options'   => $icon_ListMenu,
                    'size'      => 'wide',
                ),
				'_empelza_mega_menu_image'	=> array(
						'type' => 'upload',
						'label' => esc_html__('Image', 'empelza'),
						'default' => '',
						'size' => 'wide',
						'depth' => '0',  
						'class' => 'empelza-show-only-depth-0',
					),
				
				'_empelza_mega_menu_bg_position'	=> array(
						'type' => 'select',
						'label' => esc_html__( 'Background position', 'empelza' ),
						'default' => 0,
						'options' => array(
								'left top'              => esc_html__('Left top', 'empelza'),
								'left center'           => esc_html__('Left center', 'empelza'),
								'left bottom'           => esc_html__('Left bottom', 'empelza'),
								'right top'             => esc_html__('Right top', 'empelza'),
								'right center'          => esc_html__('Right center', 'empelza'),
								'right bottom'          => esc_html__('Right bottom', 'empelza'),
								'center top'            => esc_html__('Center top', 'empelza'),
								'center center'         => esc_html__('Center center', 'empelza'),
								'center bottom'         => esc_html__('Center bottom', 'empelza')
							),
						'size' => 'thin',
						'depth' => '0',
						'class' => 'empelza-show-only-depth-0',
					),
				'_empelza_mega_menu_bg_repeat'	=> array(
						'type' => 'select',
						'label' => esc_html__( 'Background repeat', 'empelza' ),
						'default' => 'no-repeat',
						'options' => array(
								'no-repeat'         => esc_html__( 'No-repeat', 'empelza' ),
								'repeat'            => esc_html__( 'Repeat', 'empelza' ),
								'repeat-x'          => esc_html__( 'Repeat-x', 'empelza' ),
								'repeat-y'          => esc_html__( 'Repeat-y', 'empelza' ),
							),
						'size' => 'thin',
						'depth' => '0',
						'class' => 'empelza-show-only-depth-0',
					),
				'_empelza_mega_menu_enabled'	=> array(
						'type' => 'select',
						'label' => esc_html__( 'Enable mega menu', 'empelza' ),
						'default' => 0,
						'options' => array(
						    1=> esc_html__( 'Yes', 'empelza' ),
                            0=> esc_html__( 'No', 'empelza' )),
						'size' => 'thin',
						'depth' => '0',
						'class' => 'empelza-show-only-depth-0 empelza-mega-menu',
					),
				'_empelza_full_width_menu_enabled'	=> array(
						'type' => 'select',
						'label' => esc_html__( 'Enable full-width menu', 'empelza' ),
						'default' => 0,
						'options' => array(
						    1=> esc_html__( 'Yes', 'empelza' ),
                            0=> esc_html__( 'No', 'empelza' )),
						'size' => 'thin',
						'depth' => '0',
						'class' => 'empelza-show-only-depth-0',
				),
				'_empelza_mega_menu_limit_columns'	=> array(
						'type' => 'select',
						'label' => esc_html__( 'Limit Max columns number', 'empelza' ),
						'default' => 0,
						'options' => array(
								''	=>	esc_html__( 'None', 'empelza' ),
								1	=>	esc_html__( 'One columns', 'empelza' ),
								2	=>	esc_html__( 'Two columns', 'empelza' ),
								3	=>	esc_html__( 'Three columns', 'empelza' ),
                                4	=>	esc_html__( 'Four columns', 'empelza' ),
                                5	=>	esc_html__( 'Five columns', 'empelza' ),
							),
						'size' => 'thin',
						'depth' => '0',
						'class' => 'empelza-show-only-depth-0 empelza-columns-limit',
					),
			);
		}




		private function _add_filters() {
			# Add custom options to menu
			add_filter('wp_setup_nav_menu_item', array($this, 'add_custom_options'));

			# Update custom menu options
			add_action('wp_update_nav_menu_item', array($this, 'update_custom_options'), 10, 3);

			# Set edit menu walker
			add_filter('wp_edit_nav_menu_walker', array($this, 'apply_edit_walker_class'), 10, 2);
			
			# Mega menu javascript
			add_action('admin_enqueue_scripts', array( $this, 'empelza_mega_menu_admin_scripts' ), 80);
		}
		
		
 
		function empelza_mega_menu_admin_scripts() {
			wp_enqueue_media();
		}
		

		/**
		 * Register custom options and load options values
		 * 
		 * @param obj $item Menu Item
		 * @return obj Menu Item
		 */
		public function add_custom_options($item) {

			foreach($this->_options as $option => $params) {
				$item->$option = get_post_meta($item->ID, $option, true);
				if ($item->$option===false) {
					$item->$option = $params['default'];
				}
			}

			return $item;
		}

		public function update_custom_options($menu_id, $menu_item_id, $args) {
			foreach($this->_options as $option => $params) {
				$key = 'menu-item-'. $option;
				
				//$option_value = $params['default']; // ???
				$option_value = '';
				
				if (isset($_REQUEST[$key], $_REQUEST[$key][$menu_item_id])) {
					$option_value = $_REQUEST[$key][$menu_item_id];
				}
				
				update_post_meta($menu_item_id, $option, $option_value );
			}
		}




		public function apply_edit_walker_class( $walker, $menu_id ) {
			return EMPELZA_EDIT_MENU_WALKER_CLASS;
		}
	}
}
