<?php
/**
 * Class for ExampleCron
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName\Cron;

// Contracts.
use Pixels\ProjectName\Cron\Contracts\CronControllerInterface;

// Services.
// use \Pixels\ProjectName\Services\ExampleService;.

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * ProjectName ExampleCron class
 * Handle cron actions assigned in main cron class
 */
class ExampleCron implements CronControllerInterface {

	/**
	 * Cron name constant.
	 */
	const CRON_NAME = 'pixels_cron_name';

	public function __construct() {

		// Register cron action.
		add_action( 'init', array( $this, 'register_crons' ) );

		// Hook class method to cron action.
		add_action( self::CRON_NAME, array( $this, 'example' ) );
	}

	/**
	 * Register Cron events
	 */
	public function register_crons() {

		// Register cron action.
		if ( ! wp_next_scheduled( self::CRON_NAME ) ) {
			wp_schedule_event( time(), 'daily', self::CRON_NAME );
		}
	}

	/**
	 * Clear cron schedules.
	 * Called on deactivate.
	 *
	 * @return void
	 */
	public function clear_crons() {
		wp_clear_scheduled_hook( self::CRON_NAME );
	}

	/**
	 * Description of cron action
	 */
	public function example() {
		/**
		 * Handle cron action
		 * Call services for further business logic
		 */
	}
}
