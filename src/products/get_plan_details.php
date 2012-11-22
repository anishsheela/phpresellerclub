<?php

require '../core/parameter.php';

/* function get_details
 * returns details of all the product plan of the reseller
 * arguments:
 * product_details
 * module: products function: plan-details
 */

$product_details = [
             
    ];

function get_details($product_details) {
    $url = geturl("products", "plan-details", $product_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

 get_details($product_details);
?>


