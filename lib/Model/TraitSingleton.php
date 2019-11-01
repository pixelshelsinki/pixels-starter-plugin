<?php
/**
 * Class for Example
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName\Model;

/**
 * Singleton trait for Models
 * Allows us to call CTP & Tax class static methods
 * without access to their instances
 *
 * @since 1.0
 * @author Pixels
 */
trait TraitSingleton {

	/**
	 * Stored singleton instance
	 *
	 * @var Class
	 */
	private static $instance;

	/**
	 * Gets the singleton instance
	 *
	 * @return instance of self
	 */
	public static function get_instance() {

		if ( ! isset( self::$instance ) ) :
			$reflection     = new \ReflectionClass( __CLASS__ );
			self::$instance = $reflection->newInstanceArgs( func_get_args() );
		endif;

		return self::$instance;
	}
}
