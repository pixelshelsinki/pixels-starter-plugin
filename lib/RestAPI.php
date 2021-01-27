<?php
/**
 * Class for RestAPI
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName;

// Controllers.
use Pixels\ProjectName\RestControllers\ExampleController;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * ProjectName RestAPI class
 * --> Register custom rest routes
 * --> Assign routes to controllers
 */
class RestAPI {

	/**
	 * Namespace for plugin REST endpoints
	 */
	const REST_NAMESPACE = 'projectname/v1/';

	/**
	 * ExampleController instance.
	 *
	 * @var ExampleController.
	 */
	protected $example_controller;

	/**
	 * Class constructor
	 */
	public function __construct() {

		// Create controllers.
		$this->example_controller = new ExampleController();

		// Register custom endpoints.
		add_action( 'rest_api_init', array( $this, 'register_rest_endpoints' ) );
	}

	/**
	 * Add custom endpoints to WP
	 * Assign endpoints to REST controllers
	 */
	public function register_rest_endpoints() {

		// Create example endpoint.
		register_rest_route(
			self::REST_NAMESPACE,
			'example',
			array(
				array(
					'methods'  => 'GET',
					'callback' => array( $this->example_controller, 'get' ),
				),
				array(
					'methods'  => 'POST',
					'callback' => array( $this->example_controller, 'post' ),
				),
			)
		);
	}
} // end RestAPI
