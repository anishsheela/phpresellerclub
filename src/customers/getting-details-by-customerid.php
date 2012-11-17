<?php

require '../core/parameter.php';

/* function getting_customer_details_by_customerid
 * returns customer details
 * arguments:
 * customer_details
 * module: customers function: details-by-id
 */

$customer_details = ["customer-id" => '8997525'];

function getting_customer_details_by_customerid($customer_details) {
    $url = geturl("customers", "details-by-id", $customer_details);
    $json = getjson($url);
   
    return $json;
}

 getting_customer_details_by_customerid($customer_details);
?>
