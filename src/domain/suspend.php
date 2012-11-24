<?php

require '../core/parameter.php';

/* function suspend
 * returns Success if executed successfully
 * arguments:
 * order_details
 * module: orders function: suspend
 */

$order_details =[
        "order-id" => '5655',
        "reason" => ''
      ];

function suspend($order_details) {
    $url = geturl("orders", "suspend", $order_details);
    $json = getjson($url);
    echo $url;
        return $json;
   
}

suspend($order_details);
?>
