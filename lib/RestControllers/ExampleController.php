<?php

namespace Pixels\ProjectName\RestControllers;

// Services controllers use
//use \Pixels\ProjectName\Services\ExampleService;

/**
* ProjectName Example Controller class
* Handle /example/ rest endpoints
*
* @since 1.0
* @author Pixels
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ExampleController {

  /**
   * GET request to /projectname/v1/example
   *
   * @param WP_REST_Request $request content of the request
   * @return array $response
   */
  public static function post( \WP_REST_Request $request ) {
    /**
     * Handle POST endpoint
     * Use Services for further business logic
     */
  }

  /**
   * POST request to /projectname/v1/example
   *
   * @param WP_REST_Request $request content of the request
   * @return array $response
   */
  public static function post( \WP_REST_Request $request ) {
  	/**
     * Handle GET endpoint
     * Use Services for further business logic
     */
  }

} //end SearchAlertController 