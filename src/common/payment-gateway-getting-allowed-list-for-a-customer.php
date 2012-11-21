

<?php

require '../core/parameter.php';

/* function  getting_allowes_list
 * returns list of allowed Payment Gateways
 * arguments:
 * payment_gateway_details
 * module: pg function: allowedlist-for-customer
 */

$payment_gateway_details = [
    "customer-id" => '9011832',
    "payment-type" => 'AddFund'
                           
                           ];

function getting_allowes_list($payment_gateway_details) {
    $url = geturl("pg", "allowedlist-for-customer", $payment_gateway_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

getting_allowes_list($payment_gateway_details);
?>
