<?php
/**
 * Class for Example Repository
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName\Repositories;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Repository for accessing Example related data.
 */
class Examples {

	/**
	 * Content type this Repository deals with.
	 *
	 * @var string.
	 */
	const POST_TYPE = 'example';

	/**
	 * Get all examples.
	 */
	public function get_all() : array {
		$args = array(
			'post_type'      => self::POST_TYPE,
			'post_status'    => 'publish',
			'posts_per_page' => -1,
		);

		$posts = get_posts( $args );

		return $posts;
	}

	/**
	 * Get Example by id.
	 */
	public function get( int $id ) : ?WP_Post {
		return get_post( $id );
	}
}
