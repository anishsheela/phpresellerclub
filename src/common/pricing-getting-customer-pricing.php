<?php

require '../core/parameter.php';

/* function  getting_the_customer_pricing
 * returns Customer Price List
 * arguments:
 * customer_details
 * module: products function: customer-price
 */

$customer_details = ["customer-id" => '8997525'];

function getting_the_customer_pricing($customer_details) {
    $url = geturl("products", "customer-price", $customer_details);
    $json = getjson($url);

    return $json;
}

//getting_the_customer_pricing($customer_details);
?>
