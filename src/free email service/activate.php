<?php

require '../core/parameter.php';

/* function activate
 * returns status
 * arguments:
 * product_details
 * module: mail function: activate
 */

$product_details = [
    "order-id" => ''
    ];

function activate($product_details) {
    $url = geturl("mail", "activate", $product_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

 activate($product_details);
?>


