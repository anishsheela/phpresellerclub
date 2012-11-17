<?php

require '../core/parameter.php';

/* function generate_token
 * returns Success or Failure 
 * arguments:
 * customer_details
 * module: customers function: generate-token
 */

$customer_details = [
    "username" => 'sidu@heloinfinity.com',
    "passwd" => '6946',
    "ip" => '127.0.0.1'
        
    ];



function generate_token($customer_details) {
    $url = geturl("customers", "generate-token", $customer_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

 generate_token($customer_details);
?>


