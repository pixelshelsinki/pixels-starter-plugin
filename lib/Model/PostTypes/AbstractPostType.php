<?php
/**
 * Class for AbstractPostType
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName\Model\PostTypes;

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
