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
  public function createUrlParameters($parameters) {
    $parameterItems = array();
    foreach ($parameters as $key => $value) {
      $parameterItems[] = $key . '=' . $value;
    }
    return implode('&', $parameterItems);
  }

}
