<?php
namespace AIOSEO\Plugin\Common\Traits;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Admin trait.
 *
 * @since 4.3.6
 */
trait Admin {
	/**
	 * Outputs the element we can mount our footer promotion standalone Vue app on.
	 * Also enqueues the assets.
	 *
	 * @since 4.3.6
	 *
	 * @return void
	 */
	public function addFooterPromotion() {
		echo wp_kses_post( '<div id="aioseo-footer-links"></div>' );

		aioseo()->core->assets->load( 'src/vue/standalone/footer-links/main.js' );
	}
}