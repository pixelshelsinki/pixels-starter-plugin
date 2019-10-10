<?php

namespace Pixels\ProjectName\Model\Meta;

/**
 * ACF class
 * --> Handle ACF related settings
 * --> Add custom meta save point
 * --> Add custom meta load point
 */
class ACF {

  public function __construct() {
    add_filter('acf/settings/load_json', array( $this, 'add_acf_json_load_point' ), 99 );
    add_filter('acf/settings/save_json', array( $this, 'add_acf_json_save_point' ), 99 );
  }

  /**
  * Register custom load point for ACF meta
  */
  public function add_acf_json_load_point( $paths ) {
    $paths[] = __DIR__ . '/Migrations/';
    return $paths;
  } //end add_acf_json_loadpoint

  /**
  * Register custom save oint for ACF meta
  */
  public function add_acf_json_save_point( $path ) {
    $path = __DIR__ . '/Migrations/';
    return $path;
  } //end add_acf_json_loadpoint

} //end ACF