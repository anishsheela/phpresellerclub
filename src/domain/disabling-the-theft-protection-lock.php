<?php

require '../core/parameter.php';

/* function disabling_theft_protection_lock
 * returns  execution details
 * arguments:
 * order_details
 * module: domains function: disable-theft-protection
 */

$order_details =[
    
    "order-id" => ''
    
  ];

function disabling_theft_protection_lock($order_details) {
    $url = geturl("domains", "disable-theft-protection", $order_details);
    $json = getjson($url);
    echo $url;
        return $json;
   
}



disabling_theft_protection_lock($order_details);
?>
