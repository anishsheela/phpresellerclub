<?php

require '../core/parameter.php';

/* function execution status details
 * returns Success if executed successfully
 * arguments:
 * order_details
 * module: domains function: delete
 */

$order_details =[
        "order-id" => ''
        
      ];

function deleting_domain_name($order_details) {
    $url = geturl("domains", "delete", $order_details);
    $json = getjson($url);
    echo $url;
        return $json;
   
}

deleting_domain_name($order_details);
?>
