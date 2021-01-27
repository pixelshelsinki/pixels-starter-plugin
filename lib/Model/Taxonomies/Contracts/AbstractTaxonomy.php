<?php
/**
 * Class for Abstract Taxonomy.
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName\Model\Taxonomies\Contracts;

// Inflector for default singular / plural labels.
use Symfony\Component\Inflector\Inflector;

/**
 * Abstract Taxonomy class
 * Inherited by all taxonomies we create
 * Offers basic structure for creation & utility functions
 */
abstract class AbstractTaxonomy {

	/**
	 * Name of taxonomy
	 *
	 * @var string
	 */
	protected $taxonomy;

	/**
	 * Post type(s)
	 *
	 * @var mixed
	 */
	protected $post_type;

	/**
	 * Taxonomy label singular
	 *
	 * @var string
	 */
	protected $tax_label_singular;

	/**
	 * Taxonomy label plural
	 *
	 * @var string
	 */
	protected $tax_label_plural;

	/**
	 * Taxonomy args / options
	 *
	 * @var array
	 */
	protected $args;

	/**
	 * Create the taxonomy
	 */
	public function create() {

		// Register & connect to CPT(s).
		register_taxonomy( $this->get_name(), $this->get_post_type(), $this->get_args() );
		register_taxonomy_for_object_type( $this->get_name(), $this->get_post_type() );
	}

	/**
	 * Set taxonoomy property name
	 *
	 * @param string $taxonomy name.
	 */
	protected function set_name( $taxonomy ) {
		$this->taxonomy = $taxonomy;
	}

	/**
	 * Get taxonoomy property name
	 *
	 * @return string $taxonomy name.
	 */
	protected function get_name() {
		return $this->taxonomy;
	}

	/**
	 * Set taxonomy name label
	 * --> Alternative to manually setting all labels
	 * --> Will populate label string with singular & plural forms
	 *
	 * @param string $label of post type, eg. "Example Category".
	 */
	protected function set_automatic_labels( $label ) {
		$this->set_tax_label_singular( $label );
		$this->set_tax_label_plural( Inflector::pluralize( $label ) );
		$this->set_labels();
	}

	/**
	 * Set singular / plural labels with manually given labels
	 *
	 * @param string $singular label of tax, eg. "Category".
	 * @param string $plural label of tax, eg. "Categories".
	 */
	protected function set_manual_labels( $singular, $plural ) {
		$this->set_tax_label_singular( $singular );
		$this->set_tax_label_plural( $plural );
		$this->set_labels();
	}

	/**
	 * Set tax singular label
	 *
	 * @param string $label label of taxonomy.
	 */
	protected function set_tax_label_singular( $label ) {
		$this->tax_label_singular = $label;
	}

	/**
	 * Set tax singular label
	 *
	 * @param string $label plural label of taxonomy.
	 */
	protected function set_tax_label_plural( $label ) {
		$this->tax_label_plural = $label;
	}

	/**
	 * Set taxonoomy post type(s)
	 *
	 * @param mixed $post_type either array or string.
	 */
	protected function set_post_type( $post_type ) {
		$this->post_type = $post_type;
	}

	/**
	 * Get taxonoomy post type name
	 *
	 * @return mixed $post_type string or array.
	 */
	protected function get_post_type() {
		return $this->post_type;
	}

	/**
	 * Set taxonoomy property args
	 *
	 * @param array $args name.
	 */
	protected function set_args( array $args ) {
		$this->args = $args;
	}

	/**
	 * Get taxonoomy args
	 *
	 * @return array $args of tax.
	 */
	protected function get_args() {
		return $this->args;
	}

	/**
	 * Set label strings for tax registration
	 */
	public function set_labels() {

		$labels = array(
			'name'              => sprintf(
				_x( '%s', 'taxonomy general name', 'pixels-starter-plugin' ),
				$this->tax_label_plural
			),
			'singular_name'     => sprintf( _x( '%s', 'taxonomy singular name', 'pixels-starter-plugin' ), $this->tax_label_plural ),
			'search_items'      => sprintf( __( 'Search %s ', 'pixels-starter-plugin' ), $this->tax_label_plural ),
			'all_items'         => sprintf( __( 'All %s', 'pixels-starter-plugin' ), $this->tax_label_plural ),
			'parent_item'       => sprintf( __( 'Parent %s', 'pixels-starter-plugin' ), $this->tax_label_plural ),
			'parent_item_colon' => sprintf( __( 'Parent %s:', 'pixels-starter-plugin' ), $this->tax_label_plural ),
			'edit_item'         => sprintf( __( 'Edit %s', 'pixels-starter-plugin' ), $this->tax_label_plural ),
			'update_item'       => sprintf( __( 'Update %s', 'pixels-starter-plugin' ), $this->tax_label_plural ),
			'add_new_item'      => sprintf( __( 'Add New %s', 'pixels-starter-plugin' ), $this->tax_label_plural ),
			'delete_item'       => sprintf( __( 'Delete %s', 'pixels-starter-plugin' ), $this->tax_label_plural ),
			'new_item_name'     => sprintf( __( 'New %s', 'pixels-starter-plugin' ), $this->tax_label_plural ),
		);

		$this->labels = $labels;
	}

	/**
	 * Return labels array
	 *
	 * @return array $labels of post.
	 */
	public function get_labels() {
		return $this->labels;
	}
}
