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

  public function validate($data, $type = NULL, $subType = NULL, $parameters = NULL) {
    // For null type, it should be validated recursiveley
    if (is_array($data) and ( NULL === $type)) {
      foreach ($data as $item) {
        $data = $item['data'];
        $type = $item['type'];
        $subType = $item['sub-type'];
        $parameters = $item['parameters'];
        // Of the first time in my programmming career, I used a recursive function.
        $this->validate($data, $type, $subType, $parameters);
      }
    }
    else {
      $validations = array();
      $validations['string']['email'] = 'validateEmail';

      if (empty($validations[$type][$subType])) {
        throw new Exception('Invalid Validation', '1003');
      }
      else {
        $method = $validations[$type][$subType];
        if(method_exists($this, $method)) {
          return $this->$method($data);
        }
      }
    }
  }

  private function validateEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

}
