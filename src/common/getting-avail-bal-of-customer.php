<?php

require '../core/parameter.php';

/* function  getting_available_balance_of_customer
 * returns Customer balance
 * arguments:
 * customer_details
 * module: billing function: customer-balance
 */

$customer_details = ["customer-id" => '9011832'];

function getting_available_balance_of_customer($customer_details) {
    $url = geturl("billing", "customer-balance", $customer_details);
    $json = getjson($url);
 echo $url;
    return $json;
}

getting_available_balance_of_customer($customer_details)
?>
