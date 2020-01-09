<?php
/**
 * Class for ExampleAjax
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName\Ajax;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * ProjectName Example Ajax class
 *
 * @since 1.0
 * @author Pixels
 */
class ExampleAjax {

	/**
	 * Ajax endpoint name.
	 */
	const AJAX_ENDPOINT = 'example_endpoint';

	/**
	 * Nonce name used for this endpoint.
	 */
	const NONCE_NAME = 'example_endpoint';

	/**
	 * Class constructor
	 */
	public function __construct() {

		// Register endpoints.
		add_action( 'wp_ajax_nopriv_' . self::AJAX_ENDPOINT, array( $this, 'handle_request' ) );
		add_action( 'wp_ajax_' . self::AJAX_ENDPOINT, array( $this, 'handle_request' ) );
	}

	/**
	 * Handle AJAX request.
	 */
	public static function handle_request() {

		/**
		 * Access data with $_REQUEST array.
		 * Verify nonce from theme
		 * Send json reply
		 */

		// Nonce verification.
		if ( isset( $_REQUEST['nonce'] ) &&
			wp_verify_nonce( sanitize_key( $_REQUEST['nonce'] ), self::NONCE_NAME ) ) :

			// Business logic.
			wp_send_json( 'ok' );
		else :
			// Error handling.
			wp_send_jso( 'not ok' );
		endif;
	}

} //end ExampleAjax
