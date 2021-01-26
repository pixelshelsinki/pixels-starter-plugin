<?php
/**
 * Class for Test Cron Controller
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName\Tests\Fixtures;

// Contracts.
use Pixels\ProjectName\Cron\Contracts\CronControllerInterface;

use \WP_Post;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Test controller for unit tests.
 */
class DummyCronController implements CronControllerInterface {

	public $is_cleared = false;

	public function register_crons() {

	}

	public function clear_crons() {
		$this->is_cleared = true;
	}
}
