<?php
/**
 * Class for Cron
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName;

/**
 * Ajax class
 *
 * --> Register custom ajax endpoints
 * --> Assign handlers to endpoints
 */
class Ajax {

	/**
	 * Class constructor
	 */
	public function __construct() {

		// Register endpoints.
		add_action( 'wp_ajax_nopriv_example_endpoint', array( $this, 'example_handler' ) );
		add_action( 'wp_ajax_example_endpoint', array( $this, 'example_handler' ) );
	}

	/**
	 * Handle example_endpoint AJAX request.
	 */
	public function example_handler() {
		wp_send_json( 'ok' );
	}
}
