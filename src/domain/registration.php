<?php

/* Domain Registration  */

require '../core/parameter.php';



/*
 * function domain_registration
 * returns Success or Failure 
 * arguments:
 * registration_details
 * module: domains function: register
 */

$registration_details = [
    "domain-name" => 'sidhu.in',
    "years" => '1',
    "ns" => ['ns1.onlyfordemo.net'],
    "customer-id" => '8997525',
    "reg-contact-id" => '24981243',
    "admin-contact-id" => '24981243',
    "tech-contact-id" => '24981243',
    "billing-contact-id" => '24981243',
    "invoice-option" => 'KeepInvoice',
    "protect-privacy" => FALSE,
];

function domain_registration($registration_details) {
    $url = geturl("domains", "register", $registration_details);
    $json = getjson($url);

    return $json;
}

print_r(domain_registration($registration_details));
?>
