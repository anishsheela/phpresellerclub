<?php

require '../core/parameter.php';

/* function get_details
 * returns map with key as productkey and value
 * arguments:
 * product_details
 * module: products function: details
 */

$product_details = [
             
    ];

function get_details($product_details) {
    $url = geturl("products", "details", $product_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

 get_details($product_details);
?>


