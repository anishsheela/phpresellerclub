<?php

require '../core/parameter.php';


/* function getting_customer_transaction_details
 * returns Transaction Details
 * arguments:
 * transaction_details
 * module: pg function: customer-transactions
 */

$transaction_details = [
    "payment-type-id" => '1',
    "transaction-ids" => ['1'],
    "customer-ids" => ['1'],
    "transaction-type" => 'addfund',
    "start-date" => '12454455',
    "end-date" => '12454455',
    "status" => 'Settled',
    "no-of-records" => '2',
    "page-no" => '1'
   
];

function getting_customer_transaction_details($transaction_details) {
    $url = geturl("pg", "customer-transactions", $transaction_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

getting_customer_transaction_details($transaction_details);
?>
