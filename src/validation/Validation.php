<?php

class Validation extends Core {

  /**
   * Validate a parameter array.
   * @param $type string Main validation type.
   * @param $subType string Sub validation type.
   * @param $parameters mixed Parameters to validate.
   * @return boolean TRUE is valid, else FALSE or exception.
   * @throws \Exception Invalid validation.
   */
  public function validate($type, $subType, $parameters) {
    $validationFunction = $this->getValidationFunction($type, $subType);
    if (NULL === $validationFunction) {
      throw new Exception('Invalid Validation', 1003);
    }
    else {
      if (method_exists($this, $validationFunction)) {
        return $this->$validationFunction($parameters);
      }
    }
  }

  /**
   * Get the name of the validation function.
   * @param $type string Main category of validation.
   * @param $subType string Validation function name.
   * @return string Name of validation function or NULL if not found.
   */
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

  /**
   * Validates an input array for an API.
   * @param $inputArray array The original array.
   * @param $mandatory array The mandatory elements to be present in the array.
   * @param array $optional Optional elements that can be in the array.
   * @return bool TRUE if array is valid, else exception.
   * @throws \Exception
   */
  private function validateArray($inputArray, $mandatory, $optional = array()) {
    if (!is_array($inputArray)) {
      // Not even an array. Who does that :\ ?
      throw new Exception('Input is not an array', 1004);
    }
    foreach ($inputArray as $key => $value) {
      if (!(in_array($key, $mandatory) or in_array($key, $optional))) {
        // If its not in mandatory or optional,
        // then parameter is not valid.
        // We don't want outsiders here.
        throw new Exception('There are invalid parameters', 1005);
      }
      // If the value in array is correct.
      if (!(is_array($value) or is_string($value) or is_int($value) or is_bool($value))) {
        if (is_array($value)) {
          foreach ($value as $parameter) {
            if (!(is_string($parameter) or is_int($parameter) or is_bool($parameter))) {
              return FALSE;
            }
          }
        }
        throw new Exception('Input is not an array', 1006);
      }
      if (TRUE !== $this->validateItem($key, $value)) {
        throw new Exception('Item is invalid', 1007);
      }
    }

    // Check for mandatory elements.
    foreach ($mandatory as $mandatory_item) {
      // If any of the mandatory array elements is not found, then array is invalid.
      if (!isset($inputArray[$mandatory_item])) {
        throw new Exception('Mandatory items in array missing', '1005');
      }
    }
    return TRUE;
  }

  /**
   * Validate an item using a validator function.
   * @param $itemValidator string Name of item's validator function.
   * @param $item mixed The item to be validated.
   * @return bool TRUE if valid, else FALSE.
   */
  private function validateItem($itemValidator, $item) {
    // We need to do something about this.
    $itemValidators = array(
      'email' => 'validateEmail',
    );
    if ( !empty($itemValidators[$itemValidator])
        && method_exists($this, $itemValidators[$itemValidator])) {
      $validatorFunction = $itemValidators[$itemValidator];
      return $this->$validatorFunction($item);
    }
    else {
      // It doesn't have item validator.
      // We give it the benefit of doubt.
      return TRUE;
    }
  }

  /**
   * Validate an email address.
   * @param $email string Email address
   * @return bool TRUE is valid, else FALSE
   */
  private function validateEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  /**
   * Validates a contact array.
   * @param $contactDetails array Contact Details array
   * @return bool TRUE if valid. Else, exception.
   * @throws \Exception
   */
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

  /**
   * Validates a customer array.
   * @param $customerDetails array Customer Details array.
   * @return bool TRUE if valid, else exception.
   * @throws \Exception
   */
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