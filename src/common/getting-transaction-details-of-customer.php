<?php

require '../core/parameter.php';

/* function  getting_transaction_details
 * returns Customer Transaction List
 * arguments:
 * transaction_details
 * module: products function: customer-price
 */

$transaction_details = ["transaction-ids" => '44888535'];

function getting_transaction_details($transaction_details) {
    $url = geturl("billing", "customer-transactions", $transaction_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

getting_transaction_details($transaction_details);
?>
