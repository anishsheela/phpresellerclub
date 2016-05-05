<?php

/**
 * Class contains core abstractions
 */
class Core {

  /**
   * Create URL parameters from array
   * @param array $parameters
   * @return string Array converted into URL
   */
  public function createUrlParameters($parameters) {
    $parameterItems = array();
    foreach ($parameters as $key => $value) {
      if (is_array($value)) {
        foreach ($value as $item) {
          if ($this->_isValidUrlParameter($item)) {
            $parameterItems[] = $key . '=' . urlencode($item);
          }
        }
      }
      elseif ($this->_isValidUrlParameter($value)) {
        $parameterItems[] = $key . '=' . urlencode($value);
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
    $requestPath = $this->createRequestPath($urlFullArray);
    $parameterString = $this->createParameterString($urlFullArray);
    return $requestPath . '?' . $parameterString;
  }

  function createRequestPath($urlFullArray) {
    $head = $urlFullArray['head'];
    $protocol = $head['protocol'];
    $domain = $head['domain'];
    $section = $head['section'];
    $section2 = $head['section2'];
    $apiName = $head['api-name'];
    $format = $head['format'];

    if (NULL == $section2) {
      $requestPath = "$protocol://$domain/api/$section/$apiName.$format";
    }
    else {
      $requestPath = "$protocol://$domain/api/$section/$section2/$apiName.$format";
    }
    return $requestPath;
  }

  function createParameterString($urlFullArray) {
    $head = $urlFullArray['head'];
    $urlArray = $urlFullArray['content'];
    if (isset($head['auth-userid']) && isset($head['api-key'])) {
      $authParameter = array(
        'auth-userid' => $head['auth-userid'],
        'api-key' => $head['api-key'],
      );
      $authParameterString = $this->createUrlParameters($authParameter);
    }
    $parameterString = $this->createUrlParameters($urlArray);
    $parameters = '';
    if (!empty($parameterString)) {
      if (!empty($authParameterString)) {
        $parameters .= $authParameterString . '&';
      }
      $parameters .= $parameterString;
    }
    return $parameters;
  }

  public function callApi($method, $section, $apiName, $urlArray, $section2 = NULL) {
    $urlFullArray = array(
      'head' => array(
        'protocol' => 'https',
        'domain' => RESELLER_DOMAIN,
        'section' => $section,
        'section2' => $section2,
        'api-name' => $apiName,
        'format' => 'json',
        'auth-userid' => RESELLER_ID,
        'api-key' => RESELLER_API_KEY,
      ),
      'content' => $urlArray,
    );
    // Here, we have to check whether the URL is test or production.
    // As production URLs accept only POST requests for things that need
    // modifications. It was a bit tricky to find, but yes, its there...
    $curl = curl_init();
    if(METHOD_GET === $method) {
      $url = $this->createUrl($urlFullArray);
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    } else {
      // METHOD_POST
      $requestPath = $this->createRequestPath($urlFullArray);

      curl_setopt($curl, CURLOPT_URL, $requestPath);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

      curl_setopt($curl, CURLOPT_POST,TRUE);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

      // Set the request as a POST FIELD for curl.
      $parameterString = $this->createParameterString($urlFullArray);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $parameterString);
    }
    $json_result = curl_exec($curl);
    if (curl_errno($curl)) {
      // This means curl can't connect to server
      // It can be because IP is not whitelisted or
      // Connection not available or
      // Curl is not installed or
      // Dinosaurs are extinct.
      throw new Exception('Cannot connect to API server.', 1002);
    }
    curl_close($curl);
    $result_array = json_decode($json_result);
    return $result_array;
  }

  public function validate($type, $subType, $parameters) {
    $validator = new Validation();
    return $validator->validate($type, $subType, $parameters);
  }
}
