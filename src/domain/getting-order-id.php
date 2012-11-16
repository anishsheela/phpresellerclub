<?php

require '../core/parameter.php';

/* function domain_getting_order_id
 * returns order_id
 * arguments:
 * domain_name
 * module: domains function: orderid
 */

$domain_name =["domain-name" => 'sidhu.com'];

function domain_get_order_id($domain_name) {
    $url = geturl("domains", "orderid", $domain_name);
    $json = getjson($url);
    if (is_integer($json))
        return $json;
    else {
        return 0;
    }
}


?>
