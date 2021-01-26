<?php
/**
 * Class for Cron
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName;

// Example: use Cron handlers for individual cron actions.
use \Pixels\ProjectName\Cron\ExampleCron;

/**
 * ProjectName Cron class
 *
 * @author Pixels
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * --> Sets up needed cron schedules
 * --> Sets up needed cron events
 * --> Give cron events to handlers / services
 */
class Cron {


	/**
	 * Class constructor
	 */
	public function __construct() {

		// Create individual cron controllers.
		$this->example_cron = new ExampleCron();

		// Cron actions & schedules.
		add_filter( 'cron_schedules', array( $this, 'register_custom_schedules' ) );
	}

	/**
	 * Register custom cron schedules
	 *
	 * @param array $schedules of crons.
	 */
	public function register_custom_schedules( $schedules ) {

		// Example: add 15 min schedule.
		if ( ! isset( $schedules['15min'] ) ) {
			$schedules['15min'] = array(
				'interval' => 60 * 15,
				'display'  => __( 'Every 15 minutes', 'pixels-starter-plugin' ),
			);
		}

		return $schedules;
	}

	/**
	 * Clears scheduled crons in plugin deactivate
	 */
	public function clear_cron_schedules() {
		$this->example_cron->clear_crons();
	}
}
