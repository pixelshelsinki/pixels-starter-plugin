<?php
/**
 * Interface for PostType
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName\Model\PostTypes\Contracts;

/**
 * Requires each post type to have certain methods.
 */
interface PostTypeInterface {

	/**
	 * Create post type.
	 */
	public function create();

	/**
	 * Get arguments array for registration
	 */
	public function define_args();

	/**
	 * Set post type labels.
	 */
	public function prepare_labels();
}
