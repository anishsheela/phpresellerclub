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
    if (is_string($parameter) || is_int($parameter) || is_bool($parameter)) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  public function createUrl($urlFullArray) {
    $head = $urlFullArray['head'];
    $protocol = $head['protocol'];
    $domain = $head['domain'];
    $section = $head['section'];
    $apiName = $head['api-name'];
    $format = $head['format'];
    $urlArray = $urlFullArray['content'];
    if (isset($head['auth-userid']) && isset($head['api-key'])) {
      $authParameter = array(
        'auth-userid' => $head['auth-userid'],
        'api-key' => $head['api-key'],
      );
      $authParameterString = $this->createUrlParameters($authParameter);
    }
    $parameterString = $this->createUrlParameters($urlArray);
    $url = "$protocol://$domain/api/$section/$apiName.$format?";
    if (!empty($parameterString)) {
      if (!empty($authParameterString)) {
        $url .= $authParameterString . '&';
      }
      $url .= $parameterString;
    }
    return $url;
  }

  public function callApi($section, $apiName, $urlArray) {
    $urlFullArray = array(
      'head' => array(
        'protocol' => 'https',
        'domain' => RESELLER_DOMAIN,
        'section' => $section,
        'api-name' => $apiName,
        'format' => 'json',
        'auth-userid' => RESELLER_ID,
        'api-key' => RESELLER_API_KEY,
      ),
      'content' => $urlArray,
    );
    $url = $this->createUrl($urlFullArray);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $json_result = curl_exec($curl);
    if (curl_errno($curl)) {
      // This means curl can't connect to server
      // It can be because IP is not whitelisted
      // Or connection not available or
      // Curl is not installed
      throw new Exception('Cannot connect to API server.', 1002);
    }
    curl_close($curl);
    $result_array = json_decode($json_result);
    return $result_array;
  }

}
