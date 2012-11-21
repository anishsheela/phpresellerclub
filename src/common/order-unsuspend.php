<?php

require '../core/parameter.php';

/* function unsuspend
 * returns Execution Details
 * arguments:
 * order_details
 * module: orders function: unsuspend
 */

$order_details = ["order-id" =>'154875'
                 ];

function unsuspend($order_details) {
    $url = geturl("orders", "unsuspend", $order_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

unsuspend($order_details);
?>
