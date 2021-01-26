<?php
/**
 * Interface for Taxonomy.
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName\Model\Taxonomies\Contracts;

/**
 * Requires each taxonomy to have certain methods.
 */
interface TaxonomyInterface {

	/**
	 * Create taxonomy.
	 */
	public function create();

	/**
	 * Get arguments array for registration
	 */
	public function define_args();

	/**
	 * Set taxonomy labels.
	 */
	public function prepare_labels();
}
