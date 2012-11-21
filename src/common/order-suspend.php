<?php

require '../core/parameter.php';

/* function suspend
 * returns Execution Details
 * arguments:
 * order_details
 * module: orders function: suspend
 */

$order_details = ["order-id" =>'154875',
                  "reason"  => 'Test'  
                 ];

function suspend($order_details) {
    $url = geturl("orders", "suspend", $order_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

suspend($order_details);
?>
