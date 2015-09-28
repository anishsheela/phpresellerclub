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
      if (is_array($value)) {
        foreach ($value as $item) {
          if ($this->_isValidUrlParameter($item)) {
            $parameterItems[] = $key . '=' . $item;
          }
        }
      }
      elseif ($this->_isValidUrlParameter($value)) {
        $parameterItems[] = $key . '=' . $value;
      }
      else {
        throw new Exception("Invalid URL Array", 1001);
      }
    }
    return implode('&', $parameterItems);
  }

  private function _isValidUrlParameter($parameter) {
    if (is_string($parameter) or is_int($parameter) or is_bool($parameter)) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }
  
  public function createUrl($urlArray) {
    // TODO: Replace with configuration when availability check is done
    $domain = 'https://test.httpapi.com';
    $section = $urlArray['head']['section'];
    $apiName = $urlArray['head']['api-name'];
    $parameterString = $this->createUrlParameters($urlArray['content']);
    return $domain . '/api/' . $section . '/' . $apiName . '.json?' . $parameterString;
  }

}
