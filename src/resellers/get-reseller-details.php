<?php

require '../core/parameter.php';

/* function getting_reseller_details_by_resellerid
 * returns reseller details
 * arguments:
 * reseller_details
 * module: resellers function: details
 */

$reseller_details = ["reseller-id" => '433246'];

function getting_reseller_details_by_resellerid($reseller_details) {
    $url = geturl("resellers", "details", $reseller_details);
    $json = getjson($url);
   
    return $json;
}

 getting_reseller_details_by_resellerid($reseller_details);
?>
