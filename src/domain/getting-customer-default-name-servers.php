<?php

require '../core/parameter.php';

/* function getting_customer_default_nameserver
 * returns Default Name Servers
 * arguments:
 * customer_details
 * module: domains function: customer-default-ns
 */

$customer_details =["customer-id" => '8997525'];

function getting_customer_default_nameserver($customer_details) {
    $url = geturl("domains", "customer-default-ns", $customer_details);
    $json = getjson($url);
   echo $url;
        return $json;
   
}

getting_customer_default_nameserver($customer_details);

?>
