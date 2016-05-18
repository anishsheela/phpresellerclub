<?php

namespace Resellerclub;

require_once __DIR__ . '/../core/Core.php';

class Domain extends Core {

  public function checkAvailability($domainName, $tlds, $suggestAlternatives = FALSE) {
    $avail = array(
      'domain-name' => $domainName,
      'tlds' => $tlds,
      'suggest-alternative' => $suggestAlternatives,
    );
    $this->defaultValidate($avail);
    return $this->callApi(METHOD_GET, 'domains', 'available', $avail);
  }

  public function checkAvailabilityIdn($domainName, $tld, $idnLanguageCode) {
    $punyDomain = array();
    if (is_array($domainName)) {
      foreach ($domainName as $domain) {
        // Convert domain to puny code so that it can be
        // handled in ASCII itself
        $punyDomain[] = idn_to_ascii($domain);
      }
    }
    else {
      $punyDomain[] = idn_to_ascii($domainName);
    }
    $avail = array(
      'domain-name' => $punyDomain,
      'tlds' => $tld,
      'idn-languagecode' => $idnLanguageCode,
    );
    $this->defaultValidate($avail);
    return $this->callApi(METHOD_GET, 'domains', 'idn-available', $avail);
  }

  public function checkAvailabilityPremium($keyWord, $tlds, $options) {
    $options['key-word'] = $keyWord;
    $options['tlds'] = $tlds;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'domains', 'available', $options, 'premium');
  }

  public function domainSuggestions($keyWord, $tld = NULL, $exactMatch = FALSE) {
    $options['key-word'] = $keyWord;
    $options['tld-only'] = $tld;
    $options['exact-match'] = $exactMatch;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'domains', 'suggest-names', $options, 'v5');
  }

  public function register($domainName, $options) {
    $options['domain-name'] = $domainName;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'domains', 'register', $options);
  }

  public function transfer($domain, $options) {
    $options['domain'] = $domain;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'domains', 'transfer', $options);
  }

  public function submitAuthCode($orderId, $authCode) {
    $options = array(
      'order-id' => $orderId,
      'auth-code' => $authCode,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'domains', 'submit-auth-code', $options, 'transfer');
  }

  public function validateTransfer($domain) {
    $options = array(
      'domain-name' => $domain,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'domains', 'validate-transfer', $options);
  }

  public function renew($orderid, $options) {
    $options['order-id'] = $orderid;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'domains', 'renew', $options);
  }

  public function searchDomain($options, $page = 1, $count = 10) {
    $options['no-of-records'] = $count;
    $options['page-no'] = $page;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'domains', 'search', $options);
  }

  public function getDefaultNameServer($customerId) {
    $options = array(
      'customer-id' => $customerId,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'domains', 'customer-default-ns', $options);
  }

  public function getOrderId($domain) {
    $options = array(
      'domain' => $domain,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'domains', 'orderid', $options);
  }

  public function getDomainDetailsByOrderId($orderId, $options) {
    // Since a parameter name is options, we are using variable as apiOptions
    $apiOptions = array(
      'order-id' => $orderId,
    );
    if (is_string($options)) {
      $apiOptions['options'] = $options;
    }
    $this->defaultValidate($apiOptions);
    return $this->callApi(METHOD_GET, 'domains', 'details', $apiOptions);
  }

  public function getDomainDetailsByDomain($domain, $options) {
    // Since a parameter name is options, we are using variable as apiOptions
    $apiOptions = array(
      'domain-name' => $domain,
    );
    if (is_string($options)) {
      $apiOptions['options'] = $options;
    }
    $this->defaultValidate($apiOptions);
    return $this->callApi(METHOD_GET, 'domains', 'details-by-name', $apiOptions);
  }

  public function setNameServer($orderId, $ns) {
    $options = array(
      'order-id' => $orderId,
      'ns' => $ns,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'domains', 'modify-ns', $options);
  }

  public function setChildNameServer($orderId, $cns, $ips) {
    $options = array(
      'order-id' => $orderId,
      'cns' => $cns,
      'ip' => $ips,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'domains', 'add-cns', $options);
  }

  public function modifyChildNameServerHost($orderId, $oldCns, $newCns) {
    $options = array(
      'order-id' => $orderId,
      'old-cns' => $oldCns,
      'new-cns' => $newCns,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'domains', 'modify-cns-name', $options);
  }

  public function modifyChildNameServerIp($orderId, $cns, $oldIp, $newIp) {
    $options = array(
      'order-id' => $orderId,
      'cns' => $cns,
      'old-ip' => $oldIp,
      'new-ip' => $newIp,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'domains', 'modify-cns-ip', $options);
  }

  public function deleteChildNameServer($orderId, $cns, $ip) {
    $options = array(
      'order-id' => $orderId,
      'cns' => $cns,
      'ip' => $ip,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'domains', 'delete-cns-ip', $options);
  }

  public function modifyDomainContacts($orderId, $contactIds) {
    //TODO: Check
    $options['order-id'] = $orderId;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'domains', 'modify-contact', $options);
  }

  public function addPrivacyProtection($orderId, $invoiceOption) {
    $options = array(
      'order-id' => $orderId,
      'invoice-option' => $invoiceOption,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'domains', 'purchase-privacy', $options);
  }

  public function modifyPrivacyProtection($orderId, $protectPrivacy, $reason) {
    $options = array(
      'order-id' => $orderId,
      'protect-privacy' => $protectPrivacy,
      'reason' => $reason,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'domains', 'modify-privacy-protection', $options);
  }

  public function modifyAuthCode($orderId, $authCode) {
    $options = array(
      'order-id' => $orderId,
      'auth-code' => $authCode,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'domains', 'modify-auth-code', $options);
  }

  public function modifyTheftProtection($orderId, $status) {
    // Involves 2 API calls
    if (TRUE == $status) {
      $options = array(
        'order-id' => $orderId,
      );
      $this->defaultValidate($options);
      return $this->callApi(METHOD_POST, 'domains', 'enable-theft-protection', $options);
    }
    else {
      $options = array(
        'order-id' => $orderId,
      );
      $this->defaultValidate($options);
      return $this->callApi(METHOD_POST, 'domains', 'disable-theft-protection', $options);
    }
  }

  public function suspendDomain($orderId, $reason) {
    $options = array(
      'order-id' => $orderId,
      'reason' => $reason,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'orders', 'suspend', $options);
  }

  public function unsuspendDomain($orderId) {
    $options = array(
      'order-id' => $orderId,
    );
    $this->defaultValidate($options);
    return$this->callApi(METHOD_POST, 'orders', 'unsuspend', $options);
  }

  public function deleteDomain($orderId) {
    $options = array(
      'order-id' => $orderId,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'domains', 'delete', $options);
  }

  public function restoreDomain($orderId, $invoiceOption) {
    $options = array(
      'order-id' => $orderId,
      'invoice-option' => $invoiceOption
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'domains', 'restore', $options);
  }

}
