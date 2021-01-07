<?php
/**
 * Class for Examples Service
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName\Services;

// Contracts.
use Pixels\ProjectName\Services\Contracts\ServiceInterface;

// Repositories.
use Pixels\ProjectName\Repositories\Examples as ExampleRepository;

use \WP_Post;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Serve example related data
 */
class Examples implements ServiceInterface {

	/**
	 * Examples Repository.
	 *
	 * @param ExampleRepository
	 */
	protected $example_repository;

	/**
	 * Class constructor.
	 *
	 * @param ExampleRepository $examples instance.
	 */
	public function __construct( ExampleRepository $examples ) {
		$this->example_repository = $examples;
	}

}
