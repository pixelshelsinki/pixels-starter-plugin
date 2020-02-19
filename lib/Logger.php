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

		if ( WP_ENV !== 'production' ) :
			$is_production = false;
		endif;

		return $is_production;
	}

	/**
	 * Dump given content to dom.
	 * Essentially <pre> wrapped var_dump.
	 *
	 * @param mixed $content to be printed.
	 */
	public static function dump( $content ) {
		if ( ! self::is_production() ) : ?>
			<pre>
				<?php
				// phpcs:ignore
				var_dump( $content );
				?>
			</pre>
			<?php
		endif;
	}

	/**
	 * Dump given content to dom & exit.
	 *
	 * @param mixed $content to be printed.
	 */
	public static function die( $content ) {
		if ( ! self::is_production() ) :
			// phpcs:ignore
			var_dump( $content );
			exit;
		endif;
	}
}
