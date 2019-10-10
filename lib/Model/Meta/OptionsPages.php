<?php

namespace Pixels\ProjectName\Model\Meta;

/**
 * Instantiates individual ACF options pages
 */
class OptionsPages {

  // Options pages.
  private $example;

   public function __construct() {

    add_filter('acf/init', array( $this, 'load_options_pages' ) );
  }
  
  /**
     * Load individual options pages
     * @since 1.0
     */

  public function load_options_pages() {

    // Load options pages.
    // $this->example = new OptionsPages\Example();

    } //end load_options_pages

} //end OptionsPages