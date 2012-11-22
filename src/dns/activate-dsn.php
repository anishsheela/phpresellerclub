<?php

require '../core/parameter.php';

/* function dns_activate
 * returns status
 * arguments:
 * dns_details
 * module: dns function:activate
 */

$dns_details = [
    "order-id" => ''
    ];

function dns_activate($dns_details) {
    $url = geturl("dns", "activate", $dns_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

 dns_activate($dns_details);
?>


