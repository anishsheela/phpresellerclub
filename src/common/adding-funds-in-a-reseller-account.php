<?php

require '../core/parameter.php';


/* function adding_funds_to_reseller
 * returns transaction_id
 * arguments:
 * reseller_details
 * module: billing function: add-reseller-fund
 */

$reseller_details = [

    "reseller-id" => '433246',
    "amount" => '100',
    "description" => 'Reniew',
    "transaction-type" => 'credit',
    "transaction-key" => 'hafdg45',
    "update-total-receipt" => 'TRUE'
];

function adding_funds_to_reseller($reseller_details) {
    $url = geturl("billing", "add-reseller-fund", $reseller_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

/*
 * 
 */

echo adding_funds_to_reseller($reseller_details);
?>
