<?php

require '../core/parameter.php';

/* function restoring_domain_name
 * returns  execution status 
 * arguments:
 * order_details
 * module: domains function: restore
 */

$order_details =[
        "order-id" => '5655',
        "invoice-option" => 'KeepInvoice'
      ];

function restoring_domain_name($order_details) {
    $url = geturl("domains", "restore", $order_details);
    $json = getjson($url);
    echo $url;
        return $json;
   
}

restoring_domain_name($order_details);
?>
