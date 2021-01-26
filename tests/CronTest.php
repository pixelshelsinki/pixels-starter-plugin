<?php
/**
 * Cron class unit tests.
 *
 * @package ProjectName.
 */

use PHPUnit\Framework\TestCase;

// SUT classes.
use Pixels\ProjectName\Cron;

// Contracts.
use Pixels\ProjectName\Cron\Contracts\CronControllerInterface;

// Fixtures
use Pixels\ProjectName\Tests\Fixtures\DummyCronController;

/**
 * Cron class unit tests.
 */
final class CronTest extends TestCase {

	/**
	 * Include doubles for wp functions & constants
	 */
	public static function setUpBeforeClass(): void {
		require_once __DIR__ . '/TestDoubles/constants.php';
		require_once __DIR__ . '/TestDoubles/add_filter.php';
		require_once __DIR__ . '/TestDoubles/add_action.php';
		require_once __DIR__ . '/TestDoubles/wp_clear_scheduled_hook.php';
	}

	/**
	 * Instance can be created.
	 */
	public function testCanCreateInstance() {

		$this->assertInstanceOf(
			Cron::class,
			new Cron(),
		);
    }
    
    /**
	 * Accepts CronControllerInterfaces.
	 */
	public function testAcceptsCronControllerInterfaces() {
        $handler    = new Cron();
        $controller = new DummyCronController();

        $handler->add_controller( 'dummy_controller', $controller );

		$this->assertInstanceOf(
			CronControllerInterface::class,
			$handler->controllers['dummy_controller'],
		);
    }
    
    /**
	 * Clears controllers.
	 */
	public function testClearsControllers() {
        $handler    = new Cron();
        $controller = new DummyCronController();

        $handler->add_controller( 'dummy_controller', $controller );

        $this->assertFalse( $controller->is_cleared );

        $handler->clear_cron_schedules();

		$this->assertTrue( $controller->is_cleared );
	}

}
