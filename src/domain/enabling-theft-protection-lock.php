<?php

require '../core/parameter.php';

/* function enabling_theft_protection_lock
 * returns  execution details
 * arguments:
 * order_details
 * module: domains function: enable-theft-protection
 */

$order_details =[
    
    "order-id" => ''
    
  ];

function enabling_theft_protection_lock($order_details) {
    $url = geturl("domains", "enable-theft-protection", $order_details);
    $json = getjson($url);
    echo $url;
        return $json;
   
}



enabling_theft_protection_lock($order_details);
?>
