<?php
/**
 * DI Interface
 *
 * @package ProjectName
 */

namespace Pixels\ProjectName\DependencyInjection\Contracts;

use Pixels\ProjectName\Services\Contracts\ServiceInterface;

/**
 * DI interface
 */
interface DependencyInjectionInterface {

	public function get( string $key );
	public function set( string $key, ServiceInterface $service );
}
