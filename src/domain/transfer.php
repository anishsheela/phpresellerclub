<?php

require '../core/parameter.php';

/* function transfer
 * returns  return details
 * arguments:
 * domain_details
 * module: domains function: restore
 */

$domain_details =[
        "domain-name" => 'sidhu',
        "auth-code" => '.com',
        "customer-id" => '',
        "reg-contact-id" => '',
        "admin-contact-id" => '',
        "tech-contact-id" => '',
        "billing-contact-id" => '',
        "invoice-option" => '',
        "protect-privacy" => TRUE,
        "ns" => ['',''],
        "attr-name" => '',
        "attr-value" =>''
    
     
      ];

function transfer($domain_details) {
    $url = geturl("domains", "restore", $domain_details);
    $json = getjson($url);
    echo $url;
        return $json;
   
}

transfer($domain_details);
?>
