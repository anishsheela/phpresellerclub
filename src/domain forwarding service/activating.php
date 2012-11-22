<?php

require '../core/parameter.php';

/* function domainforward_activate
 * returns status
 * arguments:
 * domainforward_details
 * module: domainforward function:activate
 */

$domainforward_details = [
    "order-id" => '4123'
    ];

function domainforward_activate($domainforward_details) {
    $url = geturl("domainforward", "activate", $domainforward_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

 domainforward_activate($domainforward_details);
?>


