<?php
/**
 * Cron Controller Interface
 *
 * @package ProjectName
 */

namespace Pixels\ProjectName\Cron\Contracts;

/**
 * Cron Controller interface
 */
interface CronControllerInterface {

	public function register_crons();

	public function clear_crons();
}
