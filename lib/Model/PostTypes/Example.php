<?php
/**
 * Class for Example Post Type.
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName\Model\PostTypes;

use Pixels\ProjectName\Model\TraitSingleton;

/**
 * Register Example class
 * Extends AbstractPostType
 */
class Example extends AbstractPostType implements PostTypeInterface {

	/**
	 * Constant do define if post labels should be translatable
	 * --> If true, define labels as translatable strings
	 * --> If false, autocreate labels from one word
	 */
	const TRANSLATE_LABELS = false;

	// Trait that allows singleton behavior.
	use TraitSingleton;

	/**
	 * Class constructor
	 */
	public function __construct() {

		// Set up post type slug.
		$this->set_name( 'example' );

		// Set labels.
		$this->prepare_labels();

		// Define args.
		$this->set_args( $this->define_args() );

		// Hook up Example cpt.
		add_action( 'init', array( $this, 'create' ) );
	}

	/**
	 * Prepare base labels to props.
	 * Behavior depends on TRANSLATE_LABELS const.
	 */
	public function prepare_labels() {

		if ( self::TRANSLATE_LABELS ) :
			// If you need to translate labels.
			$singular = __( 'Example', 'pixels-starter-plugin' );
			$plural   = __( 'Examples', 'pixels-starter-plugin' );

			$this->set_manual_labels( $singular, $plural );
		else :
			// Automatically generate labels from one word.
			$this->set_automatic_labels( 'Example' );
		endif;

	}

	/**
	 * Get arguments array for registration
	 *
	 * @return array $args of post.
	 */
	public function define_args() {

		// Check if we're using manual or automatic labels.
		if ( null === $this->post_label_singular && null === $this->post_label_plural ) :
			$labels = $this->define_labels();
		else :
			$labels = $this->get_labels();
		endif;

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_nav_menus'  => true,
			'query_var'          => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
		);

		return $args;
	}

	/**
	 * OPTIONAL: Set labels manually for registration
	 * If you need to set everything manually, comment out the IF block in constructor
	 *
	 * @return array $labels of post.
	 */
	public function define_labels() {

		$labels = array(
			'name'               => _x( 'Examples', 'post type general name', 'pixels-starter-plugin' ),
			'singular_name'      => _x( 'Example', 'post type singular name', 'pixels-starter-plugin' ),
			'menu_name'          => _x( 'Examples', 'admin menu', 'pixels-starter-plugin' ),
			'name_admin_bar'     => _x( 'Example', 'add new on admin bar', 'pixels-starter-plugin' ),
			'add_new'            => _x( 'Add New', 'add new item', 'pixels-starter-plugin' ),
			'add_new_item'       => __( 'Add New Example', 'pixels-starter-plugin' ),
			'new_item'           => __( 'New Example', 'pixels-starter-plugin' ),
			'edit_item'          => __( 'Edit Example', 'pixels-starter-plugin' ),
			'view_item'          => __( 'View Example', 'pixels-starter-plugin' ),
			'all_items'          => __( 'All Examples', 'pixels-starter-plugin' ),
			'search_items'       => __( 'Search Examples', 'pixels-starter-plugin' ),
			'parent_item_colon'  => __( 'Parent Examples:', 'pixels-starter-plugin' ),
			'not_found'          => __( 'No Examples found.', 'pixels-starter-plugin' ),
			'not_found_in_trash' => __( 'No Examples found in Trash.', 'pixels-starter-plugin' ),
		);

		return $labels;
	}
} //end Example
