<?php

require '../core/parameter.php';

/* function generating-temp_password
 * returns a temp password
 * arguments:
 * reseller_details
 * module: resellers function: temp-password
 */

$reseller_details = ["reseller-id" => '433246'];

function generating_temp_password($reseller_details) {
    $url = geturl("resellers", "temp-password", $reseller_details);
    $json = getjson($url);
    return $json;
}

  echo generating_temp_password($reseller_details);
?>
