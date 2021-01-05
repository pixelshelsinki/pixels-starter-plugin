<?php
/**
 * Class for DI container.
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName;

// Contracts.
use Pixels\ProjectName\DependencyInjection\Contracts\DependencyInjectionInterface;
use Pixels\ProjectName\Services\Contracts\ServiceInterface;

use Pixels\ProjectName\DependencyInjection\Exceptions\ServiceNotFoundException;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Container for service access.
 */
class DependencyInjection implements DependencyInjectionInterface {

	/**
	 * Service array.
	 *
	 * @param array
	 */
	protected $services = array();

	/**
	 * Store service into container.
	 */
	public function set( string $key, ServiceInterface $service ) {
		$this->services[ $key ] = $service;
	}

	/**
	 * Get service instance from the container.
	 */
	public function get( string $key ) : ServiceInterface {
		if ( array_key_exists( $key, $this->services ) ) :
			return $this->services[ $key ];
		endif;

		throw new ServiceNotFoundException( 'Service with key ' . $key . ' not found in the container' );
	}

}
