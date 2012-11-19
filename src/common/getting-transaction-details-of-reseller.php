<?php

require '../core/parameter.php';

/* function  getting_transaction_details
 * returns Reseller Transaction List
 * arguments:
 * transaction_details
 * module: products function: customer-price
 */

$transaction_details = ["transaction-ids" => '9011832'];

function getting_transaction_details($transaction_details) {
    $url = geturl("billing", "reseller-transactions", $transaction_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

getting_transaction_details($transaction_details);
?>
