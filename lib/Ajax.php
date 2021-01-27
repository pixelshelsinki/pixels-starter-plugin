<?php
/**
 * Class for Ajax
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName;

// AJAX controllers.
use Pixels\ProjectName\Ajax\ExampleAjax;

/**
 * Ajax class
 *
 * --> Create handler instances Ajax endpoints
 */
class Ajax {

	/**
	 * ExampleAjax instance
	 *
	 * @var ExampleAjax
	 */
	private $example_ajax;

	/**
	 * Class constructor
	 */
	public function __construct() {

		// Initialize individual Ajax endpoints.
		$this->example_ajax = new ExampleAjax();

	}
}
