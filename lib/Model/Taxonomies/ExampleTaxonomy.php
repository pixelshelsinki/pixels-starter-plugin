<?php

namespace Pixels\ProjectName\Model\Taxonomies;

class ExampleTaxonomy extends AbstractTaxonomy {

  public function __construct() {

    // Set up tax name
    $this->set_name( 'example_category' );

    //Hook up example taxonomy
    add_action( 'init', array( $this, 'create' ) );
  } 
  
  /**
   * Create the taxonomy
   */
  public function create() {

    //Register taxonomy for Location
    $labels = array(
      'name'              => _x( 'Example', 'taxonomy general name', 'pixels-starter-plugin' ),
      'singular_name'     => _x( 'Example', 'taxonomy singular name', 'pixels-starter-plugin' ),
      'search_items'      => __( 'Search Example', 'pixels-starter-plugin' ),
      'all_items'         => __( 'All Examples', 'pixels-starter-plugin' ),
      'parent_item'       => __( 'Parent Examples', 'pixels-starter-plugin' ),
      'parent_item_colon' => __( 'Parent Example:', 'pixels-starter-plugin' ),
      'edit_item'         => __( 'Edit Example', 'pixels-starter-plugin' ),
      'update_item'       => __( 'Update Example', 'pixels-starter-plugin' ),
      'add_new_item'      => __( 'Add New Example', 'pixels-starter-plugin' ),
      'delete_item'       => __( 'Delete item', 'pixels-starter-plugin' ),
      'new_item_name'     => __( 'New Example', 'pixels-starter-plugin' ),
    );
    
    $args = array(
          'hierarchical'      => true,
          'labels'            => $labels,
          'show_ui'           => true,
          'show_admin_column' => true,
          'query_var'         => true,
          'has_archive'     => true,
          'rewrite'           => array( 'slug' => 'examples', 'with_front' => true )
    );

    //Register & connect to Example CPT
    register_taxonomy( 'example_category', 'example' , $args );
    register_taxonomy_for_object_type( 'example_category', 'example' );
    }
    
} //end ExampleTaxonomy