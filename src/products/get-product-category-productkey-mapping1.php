<?php

require '../core/parameter.php';

/* function get_pc_pk
 * returns  category-keys mapping
 * arguments:
 * product_details
 * module: products function: category-keys-mapping
 */

$product_details = [
             
    ];

function get_pc_pk($product_details) {
    $url = geturl("products", "category-keys-mapping", $product_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

 get_pc_pk($product_details);
?>


