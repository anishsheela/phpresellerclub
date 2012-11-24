<?php

require '../core/parameter.php';

/* function cancelling_transfer
 * returns Success if executed successfully
 * arguments:
 * order_details
 * module: domains function: cancel-transfer
 */

$order_details =[
        "order-id" => ''
      ];

function cancelling_transfer($order_details) {
    $url = geturl("domains", "cancel-transfer", $order_details);
    $json = getjson($url);
    echo $url;
        return $json;
   
}

cancelling_transfer($order_details);
?>
