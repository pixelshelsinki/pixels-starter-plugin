<?php
/**
 * Class for ExampleTaxonomy
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName\Model\Taxonomies;

use Pixels\ProjectName\Model\TraitSingleton;

/**
 * Registers ExampleTaxonomy tax
 */
class ExampleTaxonomy extends AbstractTaxonomy {

	// Trait that allows singleton behavior.
	use TraitSingleton;

	/**
	 * Constant do define if post labels should be translatable
	 * --> If true, define labels as translatable strings
	 * --> If false, autocreate labels from one word
	 */
	const TRANSLATE_LABELS = false;

	/**
	 * Class constructor
	 */
	public function __construct() {

		// Set up tax.
		$this->set_name( 'example_category' );
		$this->set_post_type( 'example' );

		/**
		 * Set labels
		 */
		if ( self::TRANSLATE_LABELS ) :
			// If you need to translate labels.
			$singular = __( 'Example Category', 'pixels-starter-plugin' );
			$plural   = __( 'Example Categories', 'pixels-starter-plugin' );

			$this->set_manual_labels( $singular, $plural );
		else :
			// Automatically generate labels from one word.
			$this->set_automatic_labels( 'Example Category' );
		endif;

		$this->set_args( $this->define_args() );

		// Hook up example taxonomy.
		add_action( 'init', array( $this, 'create' ) );
	}

	/**
	 * Get arguments for tax registration
	 *
	 * @return array $labels
	 */
	public function define_args() {

		// Check if we're using manual or automatic labels.
		if ( null === $this->tax_label_singular && null === $this->tax_label_plural ) :
			$labels = $this->define_labels();
		else :
			$labels = $this->get_labels();
		endif;

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'has_archive'       => true,
			'rewrite'           => array(
				'slug'       => 'examples',
				'with_front' => true,
			),
		);

		return $args;
	}

	/**
	  * OPTIONAL: Set labels manually for registration
	 * If you need to set everything manually,
	 * comment out the IF block in constructor
	 *
	 * @return array $labels
	 */
	public function define_labels() {

		$labels = array(
			'name'              => _x( 'Example Tax', 'taxonomy general name', 'pixels-starter-plugin' ),
			'singular_name'     => _x( 'Example Tax', 'taxonomy singular name', 'pixels-starter-plugin' ),
			'search_items'      => __( 'Search Example ', 'pixels-starter-plugin' ),
			'all_items'         => __( 'All Examples', 'pixels-starter-plugin' ),
			'parent_item'       => __( 'Parent Examples', 'pixels-starter-plugin' ),
			'parent_item_colon' => __( 'Parent Example:', 'pixels-starter-plugin' ),
			'edit_item'         => __( 'Edit Example', 'pixels-starter-plugin' ),
			'update_item'       => __( 'Update Example', 'pixels-starter-plugin' ),
			'add_new_item'      => __( 'Add New Example', 'pixels-starter-plugin' ),
			'delete_item'       => __( 'Delete item', 'pixels-starter-plugin' ),
			'new_item_name'     => __( 'New Example', 'pixels-starter-plugin' ),
		);

		return $labels;
	}

} //end ExampleTaxonomy
