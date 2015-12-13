<?php

require_once __DIR__ . '/../core/Core.php';

class Domain extends Core {

  public function checkAvailability($domainName, $tlds, $suggestAlternatives = FALSE) {
    $avail = array(
      'domain-name' => $domainName,
      'tlds' => $tlds,
      'suggest-alternative' => $suggestAlternatives,
    );
    $apiOut = $this->callApi(METHOD_GET, 'domains', 'available', $avail);
    return $apiOut;
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
    $apiOut = $this->callApi(METHOD_GET, 'domains', 'idn-available', $avail);
    return $apiOut;
  }

  public function checkAvailabilityPremium($keyWord, $tlds, $options) {
    // TODO: Rewrite using new API call
    $options['key-word'] = $keyWord;
    $options['tlds'] = $tlds;
    $apiOut = $this->callApi(METHOD_GET, 'domains', 'available', $options, 'premium');
    return $apiOut;
  }

  public function domainSuggestions($keyWord, $tld = NULL, $exactMatch = FALSE) {
    // TODO: Rewrite using new API call
    $options['key-word'] = $keyWord;
    $options['tld-only'] = $tld;
    $options['exact-match'] = $exactMatch;
    $apiOut = $this->callApi(METHOD_GET, 'domains', 'suggest-names', $options, 'v5');
    return $apiOut;
  }

  public function register($domainName, $options) {
    $options['domain-name'] = $domainName;
    $apiOut = $this->callApi(METHOD_POST, 'domains', 'register', $options);
    return $apiOut;
  }

  public function transfer($domain, $options) {
    $options['domain'] = $domain;
    $apiOut = $this->callApi(METHOD_POST, 'domains', 'transfer', $options);
    return $apiOut;
  }

  public function submitAuthCode($orderId, $authCode) {
    $options = array(
      'order-id' => $orderId,
      'auth-code' => $authCode,
    );
    $apiOut = $this->callApi(METHOD_POST, 'domains', 'submit-auth-code', $options, 'transfer');
    return $apiOut;
  }

  public function validateTransfer($domain) {
    $options = array(
      'domain-name' => $domain,
    );
    $apiOut = $this->callApi(METHOD_GET, 'domains', 'validate-transfer', $options);
    return $apiOut;
  }

  public function renew($orderid, $options) {
    $options['order-id'] = $domain;
    $apiOut = $this->callApi(METHOD_POST, 'domains', 'renew', $options);
    return $apiOut;
  }

  public function searchDomain($options, $page = 1, $count = 10) {
    $options['no-of-records'] = $count;
    $options['page-no'] = $page;
    $apiOut = $this->callApi(METHOD_GET, 'domains', 'search', $options);
    return $apiOut;
  }

  public function getDefaultNameServer($customerId) {
    $options = array(
      'customer-id' => $customerId,
    );
    $apiOut = $this->callApi(METHOD_GET, 'domains', 'customer-default-ns', $options);
    return $apiOut;
  }

  public function getOrderId($domain) {
    $options = array(
      'domain' => $domain,
    );
    $apiOut = $this->callApi(METHOD_GET, 'domains', 'orderid', $options);
    return $apiOut;
  }

  public function getDomainDetailsByOrderId($orderId, $options) {
    // Since a parameter name is options, we are using variable as apiOptions
    $apiOptions = array(
      'order-id' => $orderId,
    );
    if (is_string($options)) {
      $apiOptions['options'] = $options;
    }
    else {
      $apiOptions['options'] = $apiOptions['options'];
    }
    $apiOut = $this->callApi(METHOD_GET, 'domains', 'details', $apioptions);
    return $apiOut;
  }

  public function getDomainDetailsByDomain($domain, $options) {
    // Since a parameter name is options, we are using variable as apiOptions
    $apiOptions = array(
      'domain-name' => $orderId,
    );
    if (is_string($options)) {
      $apiOptions['options'] = $options;
    }
    else {
      $apiOptions['options'] = $apiOptions['options'];
    }
    $apiOut = $this->callApi(METHOD_GET, 'domains', 'details-by-name', $apioptions);
    return $apiOut;
  }

  public function setNameServer($orderId, $ns) {
    $options = array(
      'order-id' => $orderId,
      'ns' => $ns,
    );
    $apiOut = $this->callApi(METHOD_POST, 'domains', 'modify-ns', $options);
    return $apiOut;
  }

  public function setChildNameServer($orderId, $cns, $ips) {
    $options = array(
      'order-id' => $orderId,
      'cns' => $cns,
      'ip' => $ips,
    );
    $apiOut = $this->callApi(METHOD_POST, 'domains', 'add-cns', $options);
    return $apiOut;
  }

  public function modifyChildNameServerHost($orderId, $oldCns, $newCns) {
    $options = array(
      'order-id' => $orderId,
      'old-cns' => $oldCns,
      'new-cns' => $newCns,
    );
    $apiOut = $this->callApi(METHOD_POST, 'domains', 'modify-cns-name', $options);
    return $apiOut;
  }

  public function modifyChildNameServerIp($orderId, $cns, $oldIp, $newIp) {
    $options = array(
      'order-id' => $orderId,
      'cns' => $cns,
      'old-ip' => $oldIp,
      'new-ip' => $newIp,
    );
    $apiOut = $this->callApi(METHOD_POST, 'domains', 'modify-cns-ip', $options);
    return $apiOut;
  }

  public function deleteChildNameServer($orderId, $cns, $ip) {
    $options = array(
      'order-id' => $orderId,
      'cns' => $cns,
      'ip' => $ip,
    );
    $apiOut = $this->callApi(METHOD_POST, 'domains', 'delete-cns-ip', $options);
    return $apiOut;
  }

  public function modifyDomainContacts($orderId, $contactIds) {
    $options['order-id'] = $orderId;
    $apiOut = $this->callApi(METHOD_POST, 'domains', 'modify-contact', $options);
    return $apiOut;
  }

  public function addPrivacyProtection($orderId, $invoiceOption) {
    $options = array(
      'order-id' => $orderId,
      'invoice-option' => $invoiceOption,
    );
    $apiOut = $this->callApi(METHOD_POST, 'domains', 'purchase-privacy', $options);
    return $apiOut;
  }

  public function modifyPrivacyProtection($orderId, $protectPrivacy, $reason) {
    $options = array(
      'order-id' => $orderId,
      'protect-privacy' => $protectPrivacy,
      'reason' => $reason,
    );
    $apiOut = $this->callApi(METHOD_POST, 'domains', 'modify-privacy-protection', $options);
    return $apiOut;
  }

  public function modifyAuthCode($orderId, $authCode) {
    $options = array(
      'order-id' => $orderId,
      'auth-code' => $authCode,
    );
    $apiOut = $this->callApi(METHOD_POST, 'domains', 'modify-auth-code', $options);
    return $apiOut;
  }

  public function modifyTheftProtection($orderId, $status) {
    // Involves 2 API calls
    if (TRUE == $status) {
      $options = array(
        'order-id' => $orderId,
      );
      $apiOut = $this->callApi(METHOD_POST, 'domains', 'enable-theft-protection', $options);
    }
    else {
      $options = array(
        'order-id' => $orderId,
      );
      $apiOut = $this->callApi(METHOD_POST, 'domains', 'disable-theft-protection', $options);
    }
    return $apiOut;
  }

  public function suspendDomain($orderId, $reason) {
    $options = array(
      'order-id' => $orderId,
      'reason' => $reason,
    );
    $apiOut = $this->callApi(METHOD_POST, 'orders', 'suspend', $options);
    return $apiOut;
  }

  public function unsuspendDomain($orderId) {
    $options = array(
      'order-id' => $orderId,
    );
    $apiOut = $this->callApi(METHOD_POST, 'orders', 'unsuspend', $options);
    return $apiOut;
  }

  public function deleteDomain($orderId) {
    $options = array(
      'order-id' => $orderId,
    );
    $apiOut = $this->callApi(METHOD_POST, 'domains', 'delete', $options);
    return $apiOut;
  }

  public function restoreDomain($orderId, $invoiceOption) {
    $options = array(
      'order-id' => $orderId,
      'invoice-option' => $invoiceOption
    );
    $apiOut = $this->callApi(METHOD_POST, 'domains', 'restore', $options);
    return $apiOut;
  }

}
