<?php
/**
 * Class for Test Service
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName\Tests\Fixtures;

// Contracts.
use Pixels\ProjectName\Services\Contracts\ServiceInterface;

use \WP_Post;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Test service for unit tests.
 */
class DummyService implements ServiceInterface {
}
