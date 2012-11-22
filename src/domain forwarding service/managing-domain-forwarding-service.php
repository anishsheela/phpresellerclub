<?php

require '../core/parameter.php';

/* function domainforward_manage
 * returns success  if the settings updated successfully
 * arguments:
 * domainforward_manage
 * module: domainforward function:manage
 */

$domainforward_manage = [
    "order-id" => '4123',
    "forward-to" => '',
    "url-masking" =>'',
    "meta-tags" =>'',
    "noframes" => '',
    "sub-domain-forwarding" => TRUE,
    "path-forwarding" => TRUE
    
    
    ];

function domainforward_manage($domainforward_manage) {
    $url = geturl("domainforward", "manage", $domainforward_manage);
    $json = getjson($url);
    echo $url;
    return $json;
}

 domainforward_manage($domainforward_manage);
?>


