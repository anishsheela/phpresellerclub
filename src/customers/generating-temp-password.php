<?php

require '../core/parameter.php';

/* function generating-temp_password
 * returns True or False
 * arguments:
 * customer_details
 * module: customers function: temp-password
 */

$customer_details = ["customer-id" => '8997525'];

function generating_temp_password($customer_details) {
    $url = geturl("customers", "temp-password", $customer_details);
    $json = getjson($url);
    
    return $json;
}

  echo generating_temp_password($customer_details);
?>
