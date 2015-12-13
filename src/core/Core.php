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
    $head = $urlFullArray['head'];
    $protocol = $head['protocol'];
    $domain = $head['domain'];
    $section = $head['section'];
    $section2 = $head['section2'];
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
    if (NULL == $section2) {
      $url = "$protocol://$domain/api/$section/$apiName.$format?";
    }
    else {
      $url = "$protocol://$domain/api/$section/$section2/$apiName.$format?";
    }
    if (!empty($parameterString)) {
      if (!empty($authParameterString)) {
        $url .= $authParameterString . '&';
      }
      $url .= $parameterString;
    }
    return $url;
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

  public function validate($type, $subType, $parameters) {
    $validationFunction = $this->getValidationFunction($type, $subType);
    if (empty($validationFunction)) {
      throw new Exception('Invalid Validation', 1003);
    }
    else {
      if (method_exists($this, $validationFunction)) {
        return $this->$validationFunction($parameters);
      }
    }
  }

  private function getValidationFunction($type, $subType) {
    $validations = array();

    // Validators
    // Array Validators
    $validations['array']['contact'] = 'validateContact';
    $validations['array']['customer'] = 'validateCustomer';
    // Basic Validators
    $validations['string']['email'] = 'validateEmail';
    if (!empty($validations[$type][$subType])) {
      return $validations[$type][$subType];
    }
    else {
      return NULL;
    }
  }

  private function validateArray($inputArray, $mandatory, $optional = array()) {
    if (!is_array($inputArray)) {
      // Not even an array. Who does that :\ ?
      throw new Exception('Input is not an array', 1004);
      return FALSE;
    }
    foreach ($inputArray as $key => $value) {
      if (!(in_array($key, $mandatory) or in_array($key, $optional))) {
        // If its not in mandatory or optional,
        // then parameter is not valid.
        // We don't want outsiders here
        throw new Exception('There are invalid parameters', 1005);
        return FALSE;
      }
      // If the value in array is correct
      if (!(is_array($value) or is_string($value) or is_int($value) or is_bool($value))) {
        if (is_array($value)) {
          foreach ($value as $parameter) {
            if (!(is_string($parameter) or is_int($parameter) or is_bool($parameter))) {
              return FALSE;
            }
          }
        }
        throw new Exception('Input is not an array', 1006);
        return FALSE;
      }
      if (TRUE !== $this->validateItem($key, $value)) {
        throw new Exception('Item is invalid', 1007);
        return FALSE;
      }
    }

    // Check for mandatory elements
    foreach ($mandatory as $mandatory_item) {
      // If any of the mandatory array elements is not found, then array is invalid
      if (!isset($inputArray[$mandatory_item])) {
        return FALSE;
        throw new Exception('Mandatory items in array missing', '1005');
      }
    }
    return TRUE;
  }

  private function validateItem($itemName, $item) {
    $itemValidators = array(
      'email' => 'validateEmail',
    );
    if (!empty($itemValidators[$itemName]) && method_exists($this, $itemValidators[$itemName])) {
      $validatorFunction = $itemValidators[$itemName];
      return $this->$validatorFunction($item);
    }
    else {
      // It doesn't have item validator.
      // We give it the benifit of doubt.
      return TRUE;
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

  private function validateContact($contactDetails) {
    $mandatory = array(
      'name',
      'company',
      'email',
      'address-line-1',
      'city',
      'country',
      'zipcode',
      'phone-cc',
      'phone',
      'customer-id',
      'type',
    );
    $optional = array(
      'address-line-2',
      'address-line-3',
      'state',
      'fax-cc',
      'fax',
      'attr-name',
      'attr-value',
    );
    return $this->validateArray($contactDetails, $mandatory, $optional);
  }

  private function validateCustomer($customerDetails) {
    $mandatory = array(
      'username',
      'passwd',
      'name',
      'company',
      'address-line-1',
      'city',
      'state',
      'country',
      'zipcode',
      'phone-cc',
      'phone',
      'lang-pref',
    );
    $optional = array(
      'other-state',
      'address-line-2',
      'address-line-3',
      'alt-phone-cc',
      'alt-phone',
      'fax-cc',
      'fax',
      'mobile-cc',
      'mobile',
      'customer-id',
    );
    if ($this->validateArray($customerDetails, $mandatory, $optional)) {
      if ($this->validate('string', 'email', $customerDetails['username'])) {
        return TRUE;
      }
    }
    return FALSE;
  }

}
