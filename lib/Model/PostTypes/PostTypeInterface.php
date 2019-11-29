<?php
/**
 * Interface for PostType
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName\Model\PostTypes;

/**
 * Requires each post type to have certain methods.
 */
interface PostTypeInterface {

	/**
	 * Get arguments array for registration
	 */
	public function define_args();
}
