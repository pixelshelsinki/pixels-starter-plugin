<?php
/**
 * Class for ExampleController
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName\RestControllers;

use \WP_REST_Request;

// Services controllers use.
// use \Pixels\ProjectName\Services\ExampleService;.


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * ProjectName Example Controller class
 * Handle /example/ rest endpoints
 */
class ExampleController {

	/**
	 * GET request to /projectname/v1/example
	 *
	 * @param \WP_REST_Request $request content of the request.
	 * @return array $response to return.
	 */
	public function get( WP_REST_Request $request ) {
		$response = array();

		/**
		 * Handle GET endpoint
		 * Use Services for further business logic
		 */

		return $response;
	}

	/**
	 * POST request to /projectname/v1/example
	 *
	 * @param \WP_REST_Request $request content of the request.
	 * @return array $response to return.
	 */
	public function post( WP_REST_Request $request ) {
		$response = array();

		/**
		 * Handle POST endpoint
		 * Use Services for further business logic
		 */

		return $response;
	}

}
