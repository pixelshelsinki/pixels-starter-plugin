<?php
/**
 * Class for Model
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName;

// Contracts.
use Pixels\ProjectName\Model\PostTypes\Contracts\PostTypeInterface;
use Pixels\ProjectName\Model\Taxonomies\Contracts\TaxonomyInterface;

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

	/**
	 * Post types.
	 *
	 * @var array.
	 */
	private $post_types = array();

	/**
	 * Taxonomies
	 *
	 * @var array.
	 */
	private $taxonomies = array();

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
		$this->add_post_type( 'example', new Model\PostTypes\Example() );

		// Taxonomies.
		$this->add_taxonomy( 'example_taxonomy', new Model\Taxonomies\ExampleTaxonomy() );

		// Fields.
		$this->meta_example = new Model\Meta\Fields\Example();

		// Misc.
		$this->options_pages = new Model\OptionsPages();
		$this->acf           = new Model\Meta\ACF();
	}

	/**
	 * Add Post Type.
	 *
	 * @param string $name
	 * @param PostTypeInterface $post_type
	 */
	public function add_post_type( string $name, PostTypeInterface $post_type ) {
		$this->post_types[ $name ] = $post_type;
	}

	/**
	 * Add Post Type.
	 *
	 * @param string $name
	 * @param TaxonomyInterface $post_type
	 */
	public function add_taxonomy( string $name, TaxonomyInterface $taxonomy ) {
		$this->taxonomies[ $name ] = $taxonomy;
	}

}
