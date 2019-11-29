<?php
/**
 * Class for Model
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * ProjectName Model class
 * --> Handle custom post types
 * --> Handle taxonomies
 * --> Handle meta fields
 *
 * @since 1.0
 * @author Pixels
 */
class Model {

	// Class properties.

	/**
	 * Post types.
	 *
	 * @var class
	 */
	private $cpt_example;

	/**
	 * Taxonomies
	 *
	 * @var class
	 */
	private $tax_example;

	/**
	 * Meta fields.
	 *
	 * @var class
	 */
	private $meta_example;

	/**
	 * Options pages.
	 *
	 * @var class
	 */
	private $options_pages;

	/**
	 * Common ACF.
	 *
	 * @var class
	 */
	private $acf;

	/**
	 * Class constructor
	 */
	public function __construct() {

		// Custom post types.
		$this->cpt_example = new Model\PostTypes\Example();

		// Taxonomies.
		$this->tax_example = new Model\Taxonomies\ExampleTaxonomy();

		// Fields.
		$this->meta_example = new Model\Meta\Fields\Example();

		// Misc.
		$this->options_pages = new Model\OptionsPages();
		$this->acf           = new Model\Meta\ACF();

	}

} //end Model.
