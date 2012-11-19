<?php

require '../core/parameter.php';


/* function adding_funds_to_customer
 * returns transaction_id
 * arguments:
 * customer_details
 * module: billing function: add-customer-fund
 */

$customer_details = [

    "customer-id" => '9011832',
    "amount" => '1000',
    "description" => 'Reniew',
    "transaction-type" => 'credit',
    "transaction-key" => 'gfdg45',
    "update-total-receipt" => 'TRUE'
];

function adding_funds_to_customer($customer_details) {
    $url = geturl("billing", "add-customer-fund", $customer_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

/*
 * 
 */

adding_funds_to_customer($customer_details);
?>
