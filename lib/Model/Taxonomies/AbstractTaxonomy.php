<?php

namespace Pixels\ProjectName\Model\Taxonomies;

/**
 * Abstract Taxonomy class
 * Inherited by all taxonomies we create
 * Offers basic structure for creation & utility functions
 */
abstract class AbstractTaxonomy {

  /**
   * Name of taxonomy
   *
   * @var string
   */
  protected $taxonomy;

  /**
   * Post type(s)
   *
   * @var mixed
   */
  protected $post_type;

  /**
   * Taxonomy args / options
   *
   * @var array
   */
  protected $args;

  /**
   * Create the taxonomy
   */
  public function create() {
    
    //Register & connect to CPT(s)
    register_taxonomy( $this->get_name(), $this->get_post_type() , $this->get_args() );
    register_taxonomy_for_object_type( $this->get_name(), $this->get_post_type() );
  }

  /**
   * Set taxonoomy property name
   *
   * @param string $taxonomy name
   */
  protected function set_name( $taxonomy ) {
    $this->taxonomy = $taxonomy;
  }

  /**
   * Get taxonoomy property name
   *
   * @return string $taxonomy name
   */
  protected function get_name() {
    return $this->taxonomy;
  }

  /**
   * Set taxonoomy post type(s)
   *
   * @param mixed $post_type either array or string
   */
  protected function set_post_type( $post_type ) {
    $this->post_type = $post_type;
  }

  /**
   * Get taxonoomy post type name
   *
   * @return mixed $post_type string or array
   */
  protected function get_post_type() {
    return $this->post_type;
  }

  /**
   * Set taxonoomy property args
   *
   * @param array $args name
   */
  protected function set_args( array $args ) {
    $this->args = $args;
  }

  /**
   * Get taxonoomy args
   *
   * @return array $args of tax
   */
  protected function get_args() {
    return $this->args;
  }

  /**
   * Return array of taxonomy terms
   *
   * @param bool $as_timber wp terms or timber terms
   * @return array $terms
   */
  public static function get_terms( $as_timber = false ) {

    // Get tax terms.
    $args = array(
      'taxonomy'   => get_called_class()::get_instance()->get_name(),
      'hide_empty' => true,
    );

    $terms = get_terms( $args );

    // Return WP or Timber terms
    if( $as_timber ):
      $terms_timber = array();

      // Make each term a Timber term.
      foreach ( $terms as $term ) :
        $terms_timber[] = new \Timber\Term( $term->term_id );
      endforeach;

      return $terms_timber;
    endif;

    return $terms;
  }
}
