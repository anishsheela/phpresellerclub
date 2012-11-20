<?php

require '../core/parameter.php';

/* function  getting_greedy_transaction
 * returns Customers Greedy Transaction
 * arguments:
 * reseller_details
 * module: billing function: reseller-greedy-transactions
 */

$reseller_details = ["reseller-id" => '433246'];

function getting_greedy_transaction($reseller_details) {
    $url = geturl("billing", "reseller-greedy-transactions", $reseller_details);
    $json = getjson($url);
 echo $url;
    return $json;
}
getting_greedy_transaction($reseller_details)
?>
