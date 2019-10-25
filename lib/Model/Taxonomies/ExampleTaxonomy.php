<?php

namespace Pixels\ProjectName\Model\Taxonomies;

use Pixels\ProjectName\Model\TraitSingleton;

class ExampleTaxonomy extends AbstractTaxonomy {

  // Trait that allows singleton behavior
  use TraitSingleton;

  public function __construct() {

    // Set up tax
    $this->set_name( 'example_category' );
    $this->set_post_type( 'example' );
    $this->set_args( $this->define_args() );

    //Hook up example taxonomy
    add_action( 'init', array( $this, 'create' ) );
  }

  /**
   * Get arguments for tax registration
   *
   * @return array $labels
   */  
  public static function define_args() {

    $args = array(
      'hierarchical'      => true,
      'labels'            => self::define_labels(),
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'has_archive'       => true,
      'rewrite'           => array( 
        'slug' => 'examples', 
        'with_front' => true
      )
    );

    return $args;
  }

  /**
   * Get label strings for tax registration
   *
   * @return array $labels
   */  
  public static function define_labels() {

    $labels = array(
      'name'              => _x( 'Example Tax', 'taxonomy general name', 'pixels-starter-plugin' ),
      'singular_name'     => _x( 'Example Tax', 'taxonomy singular name', 'pixels-starter-plugin' ),
      'search_items'      => __( 'Search Example ', 'pixels-starter-plugin' ),
      'all_items'         => __( 'All Examples', 'pixels-starter-plugin' ),
      'parent_item'       => __( 'Parent Examples', 'pixels-starter-plugin' ),
      'parent_item_colon' => __( 'Parent Example:', 'pixels-starter-plugin' ),
      'edit_item'         => __( 'Edit Example', 'pixels-starter-plugin' ),
      'update_item'       => __( 'Update Example', 'pixels-starter-plugin' ),
      'add_new_item'      => __( 'Add New Example', 'pixels-starter-plugin' ),
      'delete_item'       => __( 'Delete item', 'pixels-starter-plugin' ),
      'new_item_name'     => __( 'New Example', 'pixels-starter-plugin' ),
    );

    return $labels;
  }  
    
} //end ExampleTaxonomy