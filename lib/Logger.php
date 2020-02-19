<?php
/**
 * Class for Logger
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName;

/**
 * Logger class
 *
 * --> Contains shorthand logging methods
 * --> Dump, log to file or console.log.
 */
class Logger {

	/**
	 * Check if production environment.
	 * Disallow logs there.
	 *
	 * @return bool $is_production based on env.
	 */
	public static function is_production() {
		$is_production = true;

		if( WP_ENV !== 'production' );
			$is_production = false;
		endif;

		return $is_production;
	}
}
