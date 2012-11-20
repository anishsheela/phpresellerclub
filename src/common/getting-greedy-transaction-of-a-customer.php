<?php

require '../core/parameter.php';

/* function  getting_greedy_transaction
 * returns Customers Greedy Transaction
 * arguments:
 * customer_details
 * module: billing function: customer-greedy-transactions
 */

$customer_details = ["customer-id" => '9011832'];

function getting_greedy_transaction($customer_details) {
    $url = geturl("billing", "customer-greedy-transactions", $customer_details);
    $json = getjson($url);
 echo $url;
    return $json;
}
getting_greedy_transaction($customer_details)
?>
