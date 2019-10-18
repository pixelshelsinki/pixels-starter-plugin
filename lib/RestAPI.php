<?php
namespace Pixels\ProjectName;

// Controllers
use Rest\ExampleController;

/**
 * ProjectName RestAPI class
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * --> Register custom rest routes
 * --> Assign routes to controllers
 */
class RestAPI {

  function __construct() {

    // Register custom endpoints
    add_action( 'rest_api_init', array( $this, 'register_rest_endpoints' ) );
  }

  /**
   * Add custom endpoints to WP
   * Assign endpoints to REST controllers
   */
  public function register_rest_endpoints() {

    // Create example endpoint
    register_rest_route( 'projectname/v1', 'example',
      array(
        array(
          'methods' => 'GET',
          'callback' => 'Pixels\ProjectName\RestControllers\ExampleController::get',
        ),
        array(
          'methods' => 'POST',
          'callback' => 'Pixels\ProjectName\RestControllers\ExampleController::post',
        )
      )
    );
  }
} // end RestAPI