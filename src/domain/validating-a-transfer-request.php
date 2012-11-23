<?php

require '../core/parameter.php';

/* function validating_transfer_request
 * returns TRUE or FALSE
 * arguments:
 * domain_name
 * module: domains function: validate-transfer
 */

$domain_name =["domain-name" => 'sidhu.com'];

function validating_transfer_request($domain_name) {
    $url = geturl("domains", "validate-transfer", $domain_name);
    $json = getjson($url);
   echo $url;
        return $json;
   
}

validating_transfer_request($domain_name);

?>
