<?php

require '../core/parameter.php';


/* function adding_miscellaneous_into_reseller
 * returns Invoice ID 
 * arguments:
 * invoice_details
 * module: billing function: add-reseller-misc-invoice
 */

$invoice_details = [
    "order-id" => '1',
    "reseller-id" => '433246',
    "selling-amount" => '100.50',
    "description" => 'ghh',
    "invoice-date" => '12454455',
    "invoice-due-date" => '12548756',
    "invoice-deletion-date" => '154875',
    "transaction-key" => 'ghgh',
    "accounting-amount" => '',
    "conversion-rate" => '',
    "payment-reminder-days" => '',
    "greedy" => 'FALSE'
];

function adding_miscellaneous_into_reseller($invoice_details) {
    $url = geturl("billing", "add-reseller-misc-invoice", $invoice_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

adding_miscellaneous_into_reseller($invoice_details);
?>
