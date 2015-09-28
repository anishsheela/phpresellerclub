<?php

/**
 * Class contains core abstractions
 */
class Core {

  /**
   * Create URL parameters from array
   * @param array $url_array
   * @return string Array converted into URL
   */
  public function create_url_parameters($parameters) {
    $parameter_items = array();
    foreach ($parameters as $key => $value) {
      $parameter_items[] = $key . '=' . $value;
    }
    return implode('&', $parameter_items);
  }

}
