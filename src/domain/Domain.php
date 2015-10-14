<?php

require_once __DIR__ . '/../core/Core.php';

class Domain extends Core {
  public function checkAvailability($domainName, $tlds, $suggestAlternatives = FALSE) {
    
  }
  
  public function checkAvailabilityIdn($domainName, $tld, $idnLanguageCode) {
    
  }
  
  public function checkAvailabilityPremium($keyWord, $tlds, $options) {
    
  }
  
  public function domainSuggestions($keyWord, $tld = NULL, $exactMatch = FALSE) {
    
  }
  
  public function register($domainName, $tld, $options) {
    
  }
  
  public function transfer($domain, $options) {
    
  }
  
  public function submitAuthCode($orderId, $authCode) {
    
  }
  
  public function validateTransfer($domain) {
    
  }
  
  public function renew($orderid, $options) {
    
  }
  
  public function searchDomain($options, $page = 1, $count = 10) {
    
  }
  
  public function getDefaultNameServer($customerId) {
    
  }
  
  public function getOrderId($domain) {
    
  }
  
  public function getDomainDetailsByOrderId($orderId, $options) {
    
  }
  
  public function getDomainDetailsByDomain($orderId, $options) {
    
  }
  
  public function setNameServer($orderId, $ns) {
    
  }
  
  public function setChildNameServer($orderId, $cns, $ips) {
    
  }
  
  public function modifyChildNameServerHost($orderId, $oldCns, $newCns) {
    
  }
  
  public function modifyChildNameServerIp($orderId, $cns, $oldIp, $newIp) {
    
  }
  
  public function deleteChildNameServer($orderId, $cns, $ip) {
    
  }
  
  public function modifyDomainContacts($orderId, $contactIds) {
    
  }
  
  public function addPrivacyProtection($orderId, $invoiceOption) {
    
  }
  
  public function modifyPrivacyProtection($orderId, $protectPrivacy, $reason) {
    
  }
  
  public function modifyAuthCode($orderId, $authCode) {
    
  }
  
  public function modifyTheftProtection($orderId, $status) {
    // Involves 2 API calls
  }
  
  public function suspendDomain($orderId, $reason) {
    
  }
  
  public function unsuspendDomain($orderId) {
    
  }
  
  public function deleteDomain($orderId) {
    
  }
  
  public function restoreDomain($orderId, $invoiceOption) {
    
  }
}