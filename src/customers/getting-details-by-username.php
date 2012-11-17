<?php

require '../core/parameter.php';

/* function getting_customer_details_by_username
 * returns customer details
 * arguments:
 * customer_details
 * module: customers function: details
 */

$customer_details = ["username" => 'sidu@helloinfinity.com'];

function getting_customer_details_by_username($customer_details) {
    $url = geturl("customers", "details", $customer_details);
    $json = getjson($url);
 
    return $json;
}

 getting_customer_details_by_username($customer_details);
?>
