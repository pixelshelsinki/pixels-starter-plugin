<?php

namespace Pixels\ProjectName\Model\Meta\OptionsPages;

class Example {

  /**
   * Register options page for example
   * @since 1.0
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