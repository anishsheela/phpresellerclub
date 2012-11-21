<?php

require '../core/parameter.php';

/* function  getting_the_reseller_cost_pricing
 * returns Reseller Cost Price List
 * arguments:
 * reseller_details
 * module: products function: reseller-cost-price
 */

$reseller_details = ["reseller-id" => '433246'];

function getting_the_reseller_cost_pricing($reseller_details) {
    $url = geturl("products", "reseller-cost-price", $reseller_details);
    $json = getjson($url);
   echo $url;
    return $json;
}

getting_the_reseller_cost_pricing($reseller_details);
?>
