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
 * --> Can not be run in production.
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
	 * Log using error_log.
	 * Leaves "PixelsLogger" entry for easier search in long file.
	 *
	 * @param mixed $content to be logged.
	 */
	public static function log( $content ) {
		if ( ! self::is_production() ) :
			// phpcs:ignore
			error_log( print_r( 'PixelsLogger ' . gmdate( 'Y-m-d H:i:s' ), 1 ) );
			// phpcs:ignore
			error_log( var_export( $content, 1 ) );
		endif;
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

	/**
	 * Print content using JS console.log
	 *
	 * @param mixed $content to be printed.
	 */
	public static function console( $content ) {
		if ( ! self::is_production() ) :
			?>
			<script>
				console.log( <?php echo wp_json_encode( $content ); ?> );
			</script>
			<?php
		endif;
	}
}
