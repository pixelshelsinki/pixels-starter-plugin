<?php

namespace Pixels\ProjectName;

/**
 * ProjectName Model class
 * @since 1.0
 * @author Pixels
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * --> Handle custom post types
 * --> Handle taxonomies
 * --> Handle meta fields
 */

class Model {

  //Class properties.

  // Post types.
  private $cpt_example;

  // Taxonomies.
  private $tax_example;

  // Meta fields.

  // Common ACF
  private $options_pages;
  private $acf;

  function __construct() {

    // Custom post types.
    $this->cpt_person       = new Model\PostTypes\Example();

    // Taxonomies.
    $this->product_brand    = new Model\Taxonomies\ExampleTaxonomy();

    // Fields.

    // Misc.
    $this->options_pages    = new Model\Meta\OptionsPages();
    $this->acf              = new Model\Meta\ACF();

  }

} //end Model.