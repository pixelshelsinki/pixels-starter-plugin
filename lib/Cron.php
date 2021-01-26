<?php
/**
 * Class for Cron
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName;

// Contracts.
use Pixels\ProjectName\Cron\Contracts\CronControllerInterface;

// Example: use Cron handlers for individual cron actions.
use Pixels\ProjectName\Cron\ExampleCron;


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
	 * Array of individual cron controllers.
	 *
	 * @var array
	 */
	public $controllers = array();

	/**
	 * Class constructor
	 */
	public function __construct() {

		// Create individual cron controllers.
		$this->add_controller( 'example_cron', new ExampleCron() );

		// Cron actions & schedules.
		add_filter( 'cron_schedules', array( $this, 'register_custom_schedules' ) );
	}

	/**
	 * Add new Cron Controller.
	 *
	 * @param string $name
	 * @param CronControllerInterface $controller
	 * @return void
	 */
	public function add_controller( string $name, CronControllerInterface $controller ) {
		$this->controllers[ $name ] = $controller;
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
		foreach( $this->controllers as $controller ) :
			$controller->clear_crons();
		endforeach;
	}
}
