<?php

require '../core/parameter.php';

/* function delete_customer
 * returns True or False
 * arguments:
 * customer_details
 * module: customers function: delete
 */

$customer_details = ["customer-id" => '8997525'];

function delete_customer($customer_details) {
    $url = geturl("customers", "delete", $customer_details);
    $json = getjson($url);
    
    return $json;
}

  echo delete_customer($customer_details);
?>
