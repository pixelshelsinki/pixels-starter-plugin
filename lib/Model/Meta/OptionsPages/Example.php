<?php
/**
 * Class for Example
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName\Model\Meta\OptionsPages;

/**
 * Register options page for example
 *
 * @since 1.0
 */
class Example {

	/**
	 * Class constructor
	 */
	public function __construct() {
		acf_add_options_sub_page(
			array(
				'page_title'  => 'Example Settings',
				'menu_title'  => 'Example',
				'parent_slug' => 'themes.php',
			)
		);
	}

} //end Example
