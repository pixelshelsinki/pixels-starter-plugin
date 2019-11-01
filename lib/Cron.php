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
 * @since 1.0
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
	 * Constants for crons
	 */
	const EXAMPLE_CRON = 'pixels_cron_name';

	/**
	 * Class constructor
	 */
	public function __construct() {

		// Cron actions & schedules.
		add_action( 'init', array( $this, 'register_crons' ) );
		add_filter( 'cron_schedules', array( $this, 'register_custom_schedules' ) );

		// Hook individual services to cron actions.
		add_action( self::EXAMPLE_CRON, 'Pixels\ProjectName\Cron\ExampleCron::example' );
	}

	/**
	 * Register Cron events
	 */
	public function register_crons() {

		// Description of cron.
		if ( ! wp_next_scheduled( self::EXAMPLE_CRON ) ) {
			wp_schedule_event( time(), 'daily', self::EXAMPLE_CRON );
		}
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
		wp_clear_scheduled_hook( self::EXAMPLE_CRON );
	}
}
