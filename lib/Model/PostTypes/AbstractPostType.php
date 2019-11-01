<?php
/**
 * Class for AbstractPostType
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName\Model\PostTypes;

// Inflector for default singular / plural labels.
use Symfony\Component\Inflector\Inflector;

/**
 * Abstract PostType class
 * Inherited by all post types we create
 * Offers basic structure for creation & utility functions
 */
abstract class AbstractPostType {

	/**
	 * Name of post type
	 *
	 * @var string
	 */
	protected $post_type;

	/**
	 * Post label singular
	 *
	 * @var string
	 */
	protected $post_label_singular;

	/**
	 * Post label plural
	 *
	 * @var string
	 */
	protected $post_label_plural;

	/**
	 * Labels / Strings of post
	 *
	 * @var array
	 */
	protected $labels;

	/**
	 * Post type args / options
	 *
	 * @var array
	 */
	protected $args;

	/**
	 * Create the post type
	 */
	public function create() {
		register_post_type( $this->get_name(), $this->get_args() );
	}

	/**
	 * Set post type name
	 *
	 * @param string $post_type name of post.
	 */
	protected function set_name( $post_type ) {
		$this->post_type = $post_type;
	}

	/**
	 * Set post name label
	 * --> Alternative to manually setting all labels
	 * --> Will populate label string with singular & plural forms
	 *
	 * @param string $label of post type, eg. "Example".
	 */
	protected function set_automatic_labels( $label ) {
		$this->set_post_label_singular( $label );
		$this->set_post_label_plural( Inflector::pluralize( $label ) );

		$this->set_labels();
	}

	/**
	 * Set singular / plural labels with manually given labels
	 *
	 * @param string $singular label of post type, eg. "Category".
	 * @param string $plural label of post type, eg. "Categories".
	 */
	protected function set_manual_labels( $singular, $plural ) {
		$this->set_post_label_singular( $singular );
		$this->set_post_label_plural( $plural );
		$this->set_labels();
	}

	/**
	 * Set post singular label
	 *
	 * @param string $label label of post type.
	 */
	protected function set_post_label_singular( $label ) {
		$this->post_label_singular = $label;
	}

	/**
	 * Set post singular label
	 *
	 * @param string $label plural label of post type.
	 */
	protected function set_post_label_plural( $label ) {
		$this->post_label_plural = $label;
	}

	/**
	 * Get post type property name
	 *
	 * @return string $post_type name of post.
	 */
	protected function get_name() {
		return $this->post_type;
	}

	/**
	 * Set post type args
	 *
	 * @param array $args of post type.
	 */
	protected function set_args( array $args ) {
		$this->args = $args;
	}

	/**
	 * Get post type args
	 *
	 * @return array $args of post.
	 */
	protected function get_args() {
		return $this->args;
	}

	/**
	 * Set labels array using prop labels
	 */
	public function set_labels() {

		$labels = array(
			'name'               => sprintf(
				_x( '%s', 'post type general name', 'pixels-starter-plugin' ),
				$this->post_label_singular
			),
			'singular_name'      => sprintf( _x( '%s', 'post type singular name', 'pixels-starter-plugin' ), $this->post_label_singular ),
			'menu_name'          => sprintf( _x( '%s', 'admin menu', 'pixels-starter-plugin' ), $this->post_label_plural ),
			'name_admin_bar'     => sprintf( _x( '%s', 'add new on admin bar', 'pixels-starter-plugin' ), $this->post_label_singular ),
			'add_new'            => sprintf( _x( 'Add New', 'add new item', 'pixels-starter-plugin' ), $this->post_label_singular ),
			'add_new_item'       => sprintf( __( 'Add New %s', 'pixels-starter-plugin' ), $this->post_label_singular ),
			'new_item'           => sprintf( __( 'New %s', 'pixels-starter-plugin' ), $this->post_label_singular ),
			'edit_item'          => sprintf( __( 'Edit %s', 'pixels-starter-plugin' ), $this->post_label_singular ),
			'view_item'          => sprintf( __( 'View %s', 'pixels-starter-plugin' ), $this->post_label_plural ),
			'all_items'          => sprintf( __( 'All %s', 'pixels-starter-plugin' ), $this->post_label_plural ),
			'search_items'       => sprintf( __( 'Search %s', 'pixels-starter-plugin' ), $this->post_label_plural ),
			'parent_item_colon'  => sprintf( __( 'Parent %s:', 'pixels-starter-plugin' ), $this->post_label_plural ),
			'not_found'          => sprintf( __( 'No %s found.', 'pixels-starter-plugin' ), $this->post_label_plural ),
			'not_found_in_trash' => sprintf( __( 'No %s found in Trash.', 'pixels-starter-plugin' ), $this->post_label_plural ),
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

	/**
	 * Return array of posts of current type
	 *
	 * @param bool $as_timber wp posts or timber posts.
	 * @return array $posts of current type.
	 */
	public static function get_posts( $as_timber = false ) {

		// Get posts.
		$args = array(
			'post_type'      => get_called_class()::get_instance()->get_name(),
			'post_status'    => 'publish',
			'posts_per_page' => -1,
		);

		$posts = get_posts( $args );

		// Return WP or Timber posts.
		if ( $as_timber ) :
			$posts_timber = array();

			// Make each term a Timber term.
			foreach ( $posts as $post ) :
				$posts_timber[] = new \Timber\Term( $post->ID );
			endforeach;

			return $posts_timber;
		endif;

		return $posts;
	}
}
