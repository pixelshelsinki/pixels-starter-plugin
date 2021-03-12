<?php
/**
 * Plugin Name: Pixels ProjectName plugin
 * Description: ProjectName plugin level features
 * Author: Pixels Helsinki
 * Version: 1.0.0
 * Text Domain: pixels-starter-plugin
 * Domain Path: /languages/
 *
 * @author    Pixels Helsinki
 * @category
 * @copyright Copyright (c) 2021
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 * @package ProjectName
 */

namespace Pixels\ProjectName;

// Composer autoload.
require_once __DIR__ . '/vendor/autoload.php';

// Contracts.
use Pixels\ProjectName\Services\Contracts\ServiceInterface;

// Repositories.
use Pixels\ProjectName\Repositories\Examples as ExampleRepository;

// Services.
use Pixels\ProjectName\Services\Examples as ExampleService;

/**
 * App class
 * Bootstraps rest of the plugin
 */
final class App {

	/**
	 * Variable to enable debug mode.
	 * In debug mode method "debug" is run on every page load
	 *
	 * @var bool
	 */
	const DEBUG_MODE = false;

	/**
	 * DI Container.
	 *
	 * @var DependencyInjectionContainer.
	 */
	public static $container;

	/**
	 * Admin instance
	 *
	 * @var admin
	 */
	private $admin;

	/**
	 * Model instance
	 *
	 * @var Model
	 */
	private $model;

	/**
	 * REST instance
	 *
	 * @var RestAPI
	 */
	private $rest;

	/**
	 * Ajax instance
	 *
	 * @var Ajax
	 */
	private $ajax;

	/**
	 * Cron instance
	 *
	 * @var Cron
	 */
	private $cron;

	/**
	 * Main class constructor
	 *
	 * @since 1.0
	 */
	public function __construct() {

		// Class instances.
		$this->admin = new Admin();
		$this->model = new Model();
		$this->rest  = new RestAPI();
		$this->ajax  = new Ajax();
		$this->cron  = new Cron();

		// Service container.
		static::$container = new DependencyInjection();

		$this->create_services();

		// Load plugin translations.
		add_action( 'init', array( $this, 'load_plugin_textdomain' ), 100 );

		// Clear crons on deactivate.
		register_deactivation_hook( __FILE__, array( $this->cron, 'clear_cron_schedules' ) );

		// Debug action, always run on page load.
		if ( self::DEBUG_MODE ) :
			add_action( 'wp', array( $this, 'debug' ) );
		endif;
	}

	/**
	 * Load translation for the theme.
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'pixels-starter-plugin', false, basename( dirname( __FILE__ ) ) . '/languages' );
	}

	/**
	 * Create all service class instances here.
	 * Expose them via di container.
	 */
	private function create_services() {
		// Repositories.
		$example_repository = new ExampleRepository();

		// Services.
		$example_service = new ExampleService( $example_repository );

		static::$container->set( 'examples', $example_service );
	}

	/**
	 * Return service form the container.
	 */
	public static function get_service( string $service_name ) : ServiceInterface {
		return static::$container->get( $service_name );
	}

	/**
	 * Debug / dump problems on pageload
	 * Only run if debug is enabled
	 */
	public function debug() {
	}

} // end App


new App();
