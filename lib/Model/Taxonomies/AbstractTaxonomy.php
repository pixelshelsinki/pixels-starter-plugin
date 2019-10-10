<?php

namespace Pixels\ProjectName\Model\Taxonomies;

abstract class AbstractTaxonomy {

  /**
   * Name of taxonomy
   *
   * @var string
   */
  public $taxonomy;


  /**
   * Set taxonoomy property name
   *
   * @param string $taxonomy name
   */
  protected function set_name( $taxonomy ) {
    $this->taxonomy = $taxonomy;
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
      'taxonomy'   => $this->taxonomy,
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
