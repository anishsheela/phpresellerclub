<?php

require '../core/parameter.php';

/* function move
 * returns successful or unseccessful
 * arguments:
 * product_details
 * module: products function: move
 */

$product_details = [
    "domain-name" => '',
    "new-customer-id" => '',
    "default-contact" => 'oldcontact'
             
    ];

function move($product_details) {
    $url = geturl("products", "move", $product_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

 move($product_details);
?>


