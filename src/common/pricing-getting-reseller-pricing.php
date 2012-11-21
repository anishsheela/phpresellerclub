<?php

require '../core/parameter.php';

/* function   getting_the_reseller_pricing
 * returns Reseller  Price List
 * arguments:
 * reseller_details
 * module: products function: reseller-price
 */

$reseller_details = ["reseller-id" => '433246'];

function getting_the_reseller_pricing($reseller_details) {
    $url = geturl("products", "reseller-price", $reseller_details);
    $json = getjson($url);
   //echo $url;
    return $json;
}

//getting_the_reseller_pricing($reseller_details);
?>
