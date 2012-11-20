<?php

require '../core/parameter.php';

/* function executing_order_without_payment
 * returns Executed Details
 * arguments:
 * transaction_details
 * module: products function: execute-order-without-payment
 */

$order_details = ["invoice-ids" => ['1','2','3'],
                  "cancel-invoice"  => 'FALSE' 
                    ];

function executing_order_without_payment($order_details) {
    $url = geturl("billing", "execute-order-without-payment", $order_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

executing_order_without_payment($order_details);
?>
