<?php

require '../core/parameter.php';

/* function  getting_available_balance_of_reseller
 * returns Reseller balance
 * arguments:
 * reseller_details
 * module: billing function: reseller-balance
 */

$reseller_details = ["reseller-id" => '433246'];

function getting_available_balance_of_reseller($reseller_details) {
    $url = geturl("billing", "reseller-balance", $reseller_details);
    $json = getjson($url);
 echo $url;
    return $json;
}

getting_available_balance_of_reseller($reseller_details)
?>
