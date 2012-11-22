<?php

require '../core/parameter.php';

/* function check_availability
 * returns True or False
 * arguments:
 * product_details
 * module: products function: availability
 */

$product_details = [
    "domain-name" => 'heloinfinity.com',
    "product-key" => '6946'
          
    ];



function check_availability($product_details) {
    $url = geturl("products", "availability", $product_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

 check_availability($product_details);
?>


