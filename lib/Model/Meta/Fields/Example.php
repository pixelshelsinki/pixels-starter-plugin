<?php
/**
 * Class for Example
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName\Model\Meta\Fields;

/**
 * Register ACF fields for Example
 * Occasionally we need to register fields via PHP
 */
class Example {

	/**
	 * Class constructor
	 */
	public function __construct() {

		// Add order meta fields.
		add_action( 'acf/init', array( $this, 'add_fields' ) );

		// Optional: Render text content or infos after certain fields.
		add_action( 'acf/render_field/type=text', array( $this, 'add_human_readable_texts' ), 10, 1 );

	}

	/**
	 * Register fields
	 */
	public function add_fields() {

		acf_add_local_field_group(
			array(
				'key'      => 'example_group',
				'title'    => 'Settings',
				'fields'   => array(
					array(
						'key'   => 'example_field_key',
						'label' => 'Example field',
						'name'  => 'example_field',
						'type'  => 'text',
					),
				),
				'location' => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'example',
						),
					),
				),
			)
		);

	}

	/**
	 * Display text after ACF field
	 * Possible use case: we store ID's in fields, but want to display titles for admins
	 *
	 * @param array $field from ACF.
	 */
	public function add_human_readable_texts( $field ) {

		// Example field.
		if ( 'example_field_key' === $field['key'] ) :
			echo 'Custom text after field';
		endif;

	}
} //end Example
