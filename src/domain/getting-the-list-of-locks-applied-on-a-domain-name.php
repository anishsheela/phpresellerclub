<?php

require '../core/parameter.php';

/* function getting_list_lock_on_domain_name
 * returns  Domain Registration Order
 * arguments:
 * order_details
 * module: domains function: locks
 */

$order_details =[
    
    "order-id" => ''
    
  ];

function getting_list_lock_on_domain_name($order_details) {
    $url = geturl("domains", "locks", $order_details);
    $json = getjson($url);
    echo $url;
        return $json;
   
}



getting_list_lock_on_domain_name($order_details);
?>
