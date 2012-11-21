<?php

require '../core/parameter.php';

/* function  getting_list_for_reseller
 * returns list of Payment Gateways
 * arguments:
 * payment_gateway_details
 * module: pg function: list-for-reseller
 */

$payment_gateway_details = [
    ];

function getting_list_for_reseller($payment_gateway_details) {
    $url = geturl("pg", "list-for-reseller", $payment_gateway_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

getting_list_for_reseller($payment_gateway_details);
?>

