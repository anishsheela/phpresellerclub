<?php

require '../core/parameter.php';

/* function domainforward_details
 * returns status
 * arguments:
 * domainforward_details
 * module: domainforward function:details
 */

$domainforward_details = [
    "order-id" => '4123'
    ];

function domainforward_details($domainforward_details) {
    $url = geturl("domainforward", "details", $domainforward_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

 domainforward_details($domainforward_details);
?>


