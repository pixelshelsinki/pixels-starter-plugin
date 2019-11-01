<?php
/**
 * Class for Example
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName\Model\PostTypes;

use Pixels\ProjectName\Model\TraitSingleton;

/**
 * Register Example class
 * Extends AbstractPostType
 */
class Example extends AbstractPostType {

	// Trait that allows singleton behavior.
	use TraitSingleton;

	/**
	 * Class constructor
	 */
	public function __construct() {

		// Set up post type options.
		$this->set_name( 'example' );
		$this->set_args( $this->define_args() );

		// Hook up Example cpt.
		add_action( 'init', array( $this, 'create' ) );
	}

	/**
	 * Get arguments array for registration
	 *
	 * @return array $args of post.
	 */
	public function define_args() {

		$args = array(
			'labels'             => $this->define_labels(),
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
	 * Get labels array for registration
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
