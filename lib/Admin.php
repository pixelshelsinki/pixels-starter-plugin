<?php
/**
 * Class for Admin related functionalities.
 *
 * @package ProjectName.
 */

namespace Pixels\ProjectName;

use Pixels\ProjectName\Admin\OptionsPages;

/**
 * Admin class
 *
 * --> Create instances that edit admin views.
 */
class Admin {

	/**
	 * OptionsPages instance
	 *
	 * @var OptionsPages
	 */
	private $options_pages;

	/**
	 * Class constructor
	 */
	public function __construct() {

		// Hook uo options pages.
		$this->options_pages = new OptionsPages();

	}
}
